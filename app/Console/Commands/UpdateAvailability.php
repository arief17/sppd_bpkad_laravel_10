<?php

namespace App\Console\Commands;

use App\Models\DataPerdin;
use Illuminate\Console\Command;

class UpdateAvailability extends Command
{
    /**
    * The name and signature of the console command.
    *
    * @var string
    */
    protected $signature = 'availability:update';

    /**
    * The console command description.
    *
    * @var string
    */
    protected $description = 'Perbarui Ketersediaan pegawai berdasarkan tanggal kembali perjalanan dinas';

    /**
    * Execute the console command.
    */
    public function handle()
    {
        $today = now('Asia/Jakarta')->toDateString();
        $data_perdin_selesai = DataPerdin::whereDate('tgl_berangkat', '>', $today)->whereDate('tgl_kembali', '<=', $today)->get();

        if ($data_perdin_selesai->isNotEmpty()) {
            foreach ($data_perdin_selesai as $perdin) {
                $perdin->pegawai_diperintah->ketentuan->update(['tersedia' => 1]);

                foreach ($perdin->pegawai_mengikuti as $pegawai) {
                    $pegawai->ketentuan->update(['tersedia' => 1]);
                }
            }
        }

        $data_perdin_proses = DataPerdin::whereDate('tgl_berangkat', '<=', $today)->whereDate('tgl_kembali', '>', $today)->get();

        $pegawai_selesai_ids = $data_perdin_selesai->pluck('pegawai_diperintah.id')->merge($data_perdin_selesai->pluck('pegawai_mengikuti.*.id'))->unique();

        if ($data_perdin_proses->isNotEmpty()) {
            foreach ($data_perdin_proses as $perdin) {
                if (!$pegawai_selesai_ids->contains($perdin->pegawai_diperintah->id)) {
                    $perdin->pegawai_diperintah->ketentuan->update(['tersedia' => 0]);
                }

                foreach ($perdin->pegawai_mengikuti as $pegawai) {
                    if (!$pegawai_selesai_ids->contains($pegawai->id)) {
                        $pegawai->ketentuan->update(['tersedia' => 0]);
                    }
                }
            }
        }

        $this->info('Ketersediaan pegawai telah diperbarui');
    }
}
