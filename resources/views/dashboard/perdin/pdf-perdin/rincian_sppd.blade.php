<html>
<head>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        td {
            padding: 1px 7px 1px 7px;
            vertical-align: top;
        }

        th {
            padding: 1px 7px 1px 7px;
        }

        p, td {
            font-size: 16px;
        }

        .table-border {
            width: 100%;
            border: 1px solid black;
            border-collapse: collapse;
        }

        .table-border th, .table-border td {
            border: 1px solid black;
        }
    </style>
</head>
<body style="font-family: Times, serif; margin: 30px;">
    <table>
        <tr>
            <td>
                <img src="data:image/png;base64,{{ $imgLogo }}" width="80">
            </td>
            <td style="width: 100%;">
                <div style="text-align: center;">
                    <p style="font-size: x-large;">PEMERINTAH PROVINSI BANTEN</p>
                    <h2 style="font-size: 23px">BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH</h2>
                    <small>
                        Kawasan Pusat Pemerintahan Provinsi Banten (KP3B) <br>
                        Jalan Syech Nawawi Al Bantani, Palima Serang Banten <br>
                        Laman : bpkad.bantenprov.go.id Pos-el : bpkad@bantenprov.go.id Kode Pos 42171
                    </small>
                </div>
            </td>
        </tr>
    </table>

    <hr style="
    border-top: 3px solid;
    border-bottom: 1px solid;
    padding: 1px 0;
    margin: 10px 0;
    ">

    <div style="margin: 20px;">
        <b style="padding-left: 10px">LAMPIRAN:</b>

        <div style="text-align: center; margin: 20px 0">
            <p style="margin: 0;">RINCIAN BIAYA PERJALANAN DINAS</p>
		</div>

        <table style="margin-bottom: 20px;">
            <tr>
                <td>Lampiran SPPD</td>
                <td style="width: 1%;">:</td>
                <td>{{ $kwitansi_perdin->data_perdin->no_spt }}</td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td>{{ $kwitansi_perdin->data_perdin->tgl_berangkat }}</td>
            </tr>
        </table>

        <table class="table-border">
            <tr style="background-color: rgba(0, 0, 0, 0.1)">
                <th style="width: 1%">NO</th>
                <th colspan="3">PERINCIAN BIAYA</th>
                <th>JUMLAH</th>
                <th style="width: 15%">KET</th>
            </tr>
            <tr>
                <th>1</th>
                <td colspan="3"><b>Uang Harian</b></td>
                <td>Rp <span style="text-align: right;">{{ number_format($kwitansi_perdin->pegawais->sum('pivot.uang_harian'), 0, ',', '.') }}</span></td>
                <td></td>
            </tr>
            @foreach ($kwitansi_perdin->pegawais as $index => $pegawai)
            <tr>
                <td></td>
                <td style="border-right: 0">{{ $pegawai->nama ?? '-' }}</td>
                <td style="border-right: 0; border-left: 0">{{ $pegawai->golongan->nama ?? '-' }}</td>
                <td style="border-left: 0">Rp {{ number_format($pegawai->pivot->uang_harian, 0, ',', '.') }}</td>
                <td></td>
                <td></td>
            </tr>
            @endforeach
            <tr>
                <th>2</th>
                <td colspan="3"><b>Uang Transportasi</b></td>
                <td>Rp <span style="text-align: right;">{{ number_format($kwitansi_perdin->pegawais->sum('pivot.uang_transport') + $kwitansi_perdin->pegawais->sum('pivot.uang_tiket') + $kwitansi_perdin->bbm + $kwitansi_perdin->tol, 0, ',', '.') }}</span></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2" style="border-right: 0">BBM</td>
                <td style="border-left: 0">Rp <span style="text-align: right;">{{ number_format($kwitansi_perdin->bbm, 0, ',', '.') }}</span></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2" style="border-right: 0">TOL</td>
                <td style="border-left: 0">Rp <span style="text-align: right;">{{ number_format($kwitansi_perdin->tol, 0, ',', '.') }}</span></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>3</th>
                <td colspan="3"><b>Uang Penginapan</b></td>
                <td>Rp <span style="text-align: right;">{{ number_format($kwitansi_perdin->pegawais->sum('pivot.uang_transport'), 0, ',', '.') }}</span></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3">Penginapan</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3" style="text-align: center">Jumlah</td>
                <td>
                    Rp {{ number_format($kwitansi_perdin->pegawais->sum(function($pegawai) {
                        return $pegawai->pivot->uang_harian +
                                $pegawai->pivot->uang_transport +
                                $pegawai->pivot->uang_tiket +
                                $pegawai->pivot->uang_penginapan;
                    }) + $kwitansi_perdin->bbm + $kwitansi_perdin->tol, 0, ',', '.') }}
                </td>
                <td></td>
            </tr>
        </table>

        <div style="margin-bottom: 20px; margin-top: 20px">
            <table style="width: 100%;">
                <tr>
                    <td>Telah dibayar sejumlah</td>
                    <td>Telah Menerima jumlah uang sebesar</td>
                </tr>
                <tr>
                    <td style="font-weight: bold">
                        Rp {{ number_format($kwitansi_perdin->pegawais->sum(function($pegawai) {
                            return $pegawai->pivot->uang_harian +
                                    $pegawai->pivot->uang_transport +
                                    $pegawai->pivot->uang_tiket +
                                    $pegawai->pivot->uang_penginapan;
                        }) + $kwitansi_perdin->bbm + $kwitansi_perdin->tol, 0, ',', '.') }}
                    </td>
                    <td>Yang Menerima</td>
                </tr>
                <tr>
                    <td style="text-align: center">Bendahara Pengeluaran Pembantu</td>
                    <td rowspan="4" style="text-align: center">
                        <table style="width: 100%; margin-left: -7px">
                            @foreach ($kwitansi_perdin->pegawais as $index => $pegawai)
                            <tr>
                                <td style="white-space: nowrap">Rp {{ number_format($pegawai->pivot->uang_harian + $pegawai->pivot->uang_transport + $pegawai->pivot->uang_tiket + $pegawai->pivot->uang_penginapan, 0, ',', '.') }}</td>
                                <td style="width: 1%; white-space: nowrap;">{{ $pegawai->nama ?? '-' }}</td>
                                <td style="text-align: right">..............................</td>
                            </tr>
                            <tr><td colspan="3">&nbsp;</td></tr>
                            <tr><td colspan="3">&nbsp;</td></tr>
                            @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-top: 60px;"></td>
                </tr>
                <tr>
                    <td style="text-align: center">
                        <p style="font-weight: bold; text-decoration: underline;">{{ $bendahara->pegawai->nama ?? '-' }}</p>
                        <p>NIP. {{ $bendahara->pegawai->nip ?? '-' }}</p>
                    </td>
                    <td></td>
                </tr>
            </table>
        </div>

        <div style="margin-bottom: 20px;">
            <table style="width: 100%;">
                <tr>
                    <td colspan="3">PENGHITUNGAN SPPD RAMPUNG</td>
                </tr>
                <tr>
                    <td>Ditetapkan sejumlah</td>
                    <td style="text-align: right;">Rp</td>
                    <td style="text-align: right;">
                        {{ number_format($kwitansi_perdin->pegawais->sum(function($pegawai) {
                            return $pegawai->pivot->uang_harian +
                                    $pegawai->pivot->uang_transport +
                                    $pegawai->pivot->uang_tiket +
                                    $pegawai->pivot->uang_penginapan;
                        }) + $kwitansi_perdin->bbm + $kwitansi_perdin->tol, 0, ',', '.') }}
                    </td>
                </tr>
                <tr>
                    <td>Yang telah dibayar semua</td>
                    <td style="text-align: right;">Rp</td>
                    <td style="text-align: right;">
                        {{ number_format($kwitansi_perdin->pegawais->sum(function($pegawai) {
                            return $pegawai->pivot->uang_harian +
                                    $pegawai->pivot->uang_transport +
                                    $pegawai->pivot->uang_tiket +
                                    $pegawai->pivot->uang_penginapan;
                        }) + $kwitansi_perdin->bbm + $kwitansi_perdin->tol, 0, ',', '.') }}
                    </td>
                </tr>
                <tr>
                    <td>Sisa kurang/lebih</td>
                    <td style="text-align: right;">Rp</td>
                    <td style="text-align: right;">-</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>