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
    protected $signature = 'app:update-availability';

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
        $today = now();
        $data_perdin = DataPerdin::where('tgl_kembali', '<=', $today)->get();

        if ($data_perdin->isNotEmpty()) {
            foreach ($data_perdin as $perdin) {
                $perdin->pegawai_diperintah->ketentuan->update(['tersedia' => 1]);

                foreach ($perdin->pegawai_mengikuti as $pegawai) {
                    $pegawai->ketentuan->update(['tersedia' => 1]);
                }
            }

            $this->info('Ketersediaan pegawai telah diperbarui');
        } else {
            $data_perdin = DataPerdin::where('tgl_kembali', '>=', $today)->get();

            foreach ($data_perdin as $perdin) {
                $perdin->pegawai_diperintah->ketentuan->update(['tersedia' => 0]);

                foreach ($perdin->pegawai_mengikuti as $pegawai) {
                    $pegawai->ketentuan->update(['tersedia' => 0]);
                }
            }

            $this->info('Tidak ada perjalanan dinas yang perlu diperbarui');
        }
    }
}
