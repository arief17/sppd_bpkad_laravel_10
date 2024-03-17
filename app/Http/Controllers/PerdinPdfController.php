<?php

namespace App\Http\Controllers;

use App\Models\Bendahara;
use App\Models\KwitansiPerdin;
use App\Models\TandaTangan;
use Illuminate\Support\Facades\App;
use App\Models\DataPerdin;
use App\Models\LaporanPerdin;
use Barryvdh\DomPDF\Facade\Pdf;

class PerdinPdfController extends Controller
{
    public function spt($slug)
    {
        App::setLocale('id');
        $data_perdin = DataPerdin::where('slug', $slug)->first();

        $imgLogo = base64_encode(file_get_contents(public_path('assets/img/logo-banten2.png')));

        $pdf = Pdf::loadView('dashboard.perdin.pdf-perdin.spt', [
            'data_perdin' => $data_perdin,
            'imgLogo' => $imgLogo,
        ]);

        $pdf->setPaper(array(0,0,609.4488,935.433), 'portrait');

        return $pdf->stream();
    }

    public function visum1($slug)
    {
        App::setLocale('id');
        $data_perdin = DataPerdin::where('slug', $slug)->first();

        $ttd_kepala = TandaTangan::whereHas('pegawai.jabatan', function ($query) {
            $query->where('nama', 'like', '%Kepala Badan%');
        })->first();

        $ttd_kepala = $ttd_kepala ?? 'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=';

        $imgLogo = base64_encode(file_get_contents(public_path('assets/img/logo-banten2.png')));

        $pdf = Pdf::loadView('dashboard.perdin.pdf-perdin.visum1', [
            'data_perdin' => $data_perdin,
            'imgLogo' => $imgLogo,
            'ttd_kepala' => $ttd_kepala,
        ]);

        $pdf->setPaper(array(0,0,609.4488,935.433), 'portrait');

        return $pdf->stream();
    }
    public function visum2($slug)
    {
        App::setLocale('id');
        $data_perdin = DataPerdin::where('slug', $slug)->first();
        $ttd_kepala = TandaTangan::where('jenis_ttd', 'kepala_badan')->first();

        $ttd_kepala = $ttd_kepala ?? 'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=';

        $imgLogo = base64_encode(file_get_contents(public_path('assets/img/logo-banten2.png')));

        $pdf = Pdf::loadView('dashboard.perdin.pdf-perdin.visum2', [
            'data_perdin' => $data_perdin,
            'imgLogo' => $imgLogo,
            'ttd_kepala' => $ttd_kepala
        ]);

        $pdf->setPaper(array(0,0,609.4488,935.433), 'portrait');

        return $pdf->stream();
    }
    public function lap($id)
    {
        App::setLocale('id');
        $laporan_perdin = LaporanPerdin::where('id', $id)->first();

        $imgLogo = base64_encode(file_get_contents(public_path('assets/img/logo-banten2.png')));

        $pdf = Pdf::loadView('dashboard.perdin.pdf-perdin.lap', [
            'laporan_perdin' => $laporan_perdin,
            'imgLogo' => $imgLogo,
        ]);

        $pdf->setPaper(array(0,0,609.4488,935.433), 'portrait');

        return $pdf->stream();
    }
    public function lap_bendahara($id)
    {
        App::setLocale('id');
        $kwitansi_perdin = KwitansiPerdin::where('id', $id)->first();
        $bendahara = Bendahara::latest()->first();
        $ttd_kepala = TandaTangan::whereHas('pegawai.jabatan', function ($query) {
            $query->where('nama', 'like', '%Kepala Badan%');
        })->first();

        $ttd_kepala = $ttd_kepala ?? 'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=';

        $total_uang = 0;
        foreach ($kwitansi_perdin->pegawais as $pegawai) {
            $total_uang += $pegawai->pivot->uang_harian + $pegawai->pivot->uang_transport + $pegawai->pivot->uang_tiket + $pegawai->pivot->uang_penginapan;
        }

        $total_uang += $kwitansi_perdin->bbm + $kwitansi_perdin->tol;

        $imgLogo = base64_encode(file_get_contents(public_path('assets/img/logo-banten2.png')));

        $pdf = Pdf::loadView('dashboard.perdin.pdf-perdin.lap_bendahara', [
            'kwitansi_perdin' => $kwitansi_perdin,
            'imgLogo' => $imgLogo,
            'bendahara' => $bendahara,
            'ttd_kepala' => $ttd_kepala,
            'total_uang' => $total_uang,
        ]);

        $pdf->setPaper(array(0,0,609.4488,935.433), 'portrait');

        return $pdf->stream();
    }
    public function kwitansi($id)
    {
        App::setLocale('id');
        $kwitansi_perdin = KwitansiPerdin::where('id', $id)->first();
        $bendahara = Bendahara::latest()->first();

        $imgLogo = base64_encode(file_get_contents(public_path('assets/img/logo-banten2.png')));

        $pdf = Pdf::loadView('dashboard.perdin.pdf-perdin.kwitansi', [
            'kwitansi_perdin' => $kwitansi_perdin,
            'imgLogo' => $imgLogo,
            'bendahara' => $bendahara,
        ]);

        $pdf->setPaper(array(0,0,609.4488,935.433), 'portrait');

        return $pdf->stream();
    }

    public function rincian_sppd($id)
    {
        App::setLocale('id');
        $kwitansi_perdin = KwitansiPerdin::where('id', $id)->first();
        $bendahara = Bendahara::latest()->first();

        $imgLogo = base64_encode(file_get_contents(public_path('assets/img/logo-banten2.png')));

        $pdf = Pdf::loadView('dashboard.perdin.pdf-perdin.rincian_sppd', [
            'kwitansi_perdin' => $kwitansi_perdin,
            'imgLogo' => $imgLogo,
            'bendahara' => $bendahara,
        ]);

        $pdf->setPaper(array(0,0,609.4488,935.433), 'portrait');

        return $pdf->stream();
    }

    public function sptjb($id)
    {
        App::setLocale('id');
        $kwitansi_perdin = KwitansiPerdin::where('id', $id)->first();

        $imgLogo = base64_encode(file_get_contents(public_path('assets/img/logo-banten2.png')));

        $pdf = Pdf::loadView('dashboard.perdin.pdf-perdin.sptjb', [
            'kwitansi_perdin' => $kwitansi_perdin,
            'imgLogo' => $imgLogo,
        ]);

        $pdf->setPaper(array(0,0,609.4488,935.433), 'portrait');

        return $pdf->stream();
    }

    public function ttd_visum($nama, $nip, $jabatan)
    {
        $pdf = Pdf::loadView('dashboard.perdin.pdf-perdin.ttd_visum', [
            'nama' => $nama,
            'nip' => $nip,
            'jabatan' => $jabatan,
        ]);

        $pdf->setPaper(array(0,0,609.4488,935.433), 'portrait');

        return $pdf->stream();
    }
}
