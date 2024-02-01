<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bidang;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    public function rekap_pegawai() {
        $pegawais = Pegawai::all();
        $rekaps = [];

        foreach ($pegawais as $pegawai) {
            $nama = $pegawai->nama;
            $jumlah_sppd = $pegawai->ketentuan->jumlah_perdin;
            $jumlah_uang = 0;

            foreach ($pegawai->kwitansi_perdins as $kwitansi) {
                $jumlah_uang += $kwitansi->pivot->uang_harian +
                                $kwitansi->pivot->uang_transport +
                                $kwitansi->pivot->uang_tiket +
                                $kwitansi->pivot->uang_penginapan;
            }

            $rekaps[] = (object) [
                'nama' => $nama,
                'jumlah_sppd' => $jumlah_sppd,
                'jumlah_uang' => $jumlah_uang,
            ];
        }

        return view('dashboard.perdin.rekap-data.index', [
            'title' => 'Daftar Rekap Data Pegawai',
            'rekaps' => $rekaps,
        ]);
    }

    public function rekap_bidang() {
        $bidangs = Bidang::with('pegawais')->get();
        $rekaps = [];

        foreach ($bidangs as $bidang) {
            $nama = $bidang->nama;
            $jumlah_sppd = 0;
            $jumlah_uang = 0;

            foreach ($bidang->pegawais as $pegawai) {
                $jumlah_sppd += $pegawai->ketentuan->jumlah_perdin ?? 0;

                foreach ($pegawai->kwitansi_perdins as $kwitansi) {
                    $jumlah_uang += $kwitansi->pivot->uang_harian +
                                    $kwitansi->pivot->uang_transport +
                                    $kwitansi->pivot->uang_tiket +
                                    $kwitansi->pivot->uang_penginapan;
                }
            }

            $rekaps[] = (object) [
                'nama' => $nama,
                'jumlah_sppd' => $jumlah_sppd,
                'jumlah_uang' => $jumlah_uang,
            ];
        }

        return view('dashboard.perdin.rekap-data.index', [
            'title' => 'Daftar Rekap Data Bidang',
            'rekaps' => $rekaps,
        ]);
    }
}
