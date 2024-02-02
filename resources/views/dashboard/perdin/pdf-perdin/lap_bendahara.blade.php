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

        p, td {
            font-size: 18px;
        }
    </style>
</head>
<body style="font-family: Times, serif; margin: 30px;">
    <div style="float: left;">
        <img src="data:image/png;base64,{{ $imgLogo }}" width="80">
    </div>
    <div style="text-align: center;">
        <h2>
			PEMERINTAH PROVINSI BANTEN <br>
			BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH
		</h2>
		<small>
			KAWASAN PUSAT PEMERINTAHAN PROVINSI BANTEN (KP3B) <br>
			Jl. Syech Nawawi Al- Bantani, Palima Serang Telp./Fax. (0254) 267019, 267008, 267009
		</small>
    </div>

    <hr style="
    border-top: 3px solid;
    border-bottom: 1px solid;
    padding: 1px 0;
    margin: 10px 0;
    ">

    <div style="margin: 20px;">
        <table style="margin-bottom: 20px;">
            <tr>
                <td>Dari</td>
                <td>: Pengguna Anggaran</td>
            </tr>
            <tr>
                <td>Untuk</td>
                <td>: Bendahara Pengeluaran</td>
            </tr>
        </table>

        <h3 style="text-decoration: underline; font-weight: bold; text-align: center;">SURAT PERINTAH</h3>

        <table style="margin-top: 20px; margin-bottom: 20px;">
            <tr>
                <td>Berikan/Keluarkan uang sebesar</td>
                <td>: Rp.</td>
                <td>{{ number_format($total_uang, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td colspan="3">({{ ucwords($kwitansi_perdin->terbilang($total_uang)) }} Rupiah)</td>
            </tr>
        </table>
        <table style="margin-top: 20px; margin-bottom: 20px;">
            <tr>
                <td>Kepada</td>
                <td>:</td>
                <td>{{ $kwitansi_perdin->data_perdin->pegawai_diperintah->nama }} dkk</td>
            </tr>
            <tr>
                <td>Keperluan</td>
                <td>:</td>
                <td>
                    <p>Belanja {{ $kwitansi_perdin->data_perdin->jenis_perdin->nama }} untuk {{ $kwitansi_perdin->data_perdin->maksud }}</p>
                    <p>{{ $kwitansi_perdin->data_perdin->tujuan->nama }} pada Tanggal {{ Carbon\Carbon::parse($kwitansi_perdin->data_perdin->tgl_berangkat)->isoFormat('D MMMM YYYY') }}</p>
                    <p>Kode Rekening {{ $kwitansi_perdin->no_rek }}</p>
                    <p>Kegiatan {{ $kwitansi_perdin->kegiatan_sub->kegiatan->nama }}</p>
                    <p>Sub Kegiatan {{ $kwitansi_perdin->kegiatan_sub->nama }}</p>
                </td>
            </tr>
        </table>

        <div style="text-align: center;">
            <span style="padding-right: 120px">Serang,</span> {{ now()->isoFormat('YYYY') }}
            <h4>Pengguna Anggaran</h4>
            <img src="data:image/png;base64,{{ $ttd_kepala->fileTtdEncoded ?? $ttd_kepala }}" alt="{{ $ttd_kepala->nama ?? '' }}" height="70">
            <p style="text-decoration: underline; font-weight: bold;">{{ $ttd_kepala->pegawai->nama ?? '' }}</p>
            <p>NIP.{{ $ttd_kepala->pegawai->nip ?? '' }}</p>
        </div>
    </div>
</body>
</html>