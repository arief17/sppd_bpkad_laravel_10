<html>
<head>
	<style>
		* {
			margin: 0;
			padding: 0;
		}

		td {
			padding: 5px;
			vertical-align: top;
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

	<div style="margin: 0 60px 0 60px;">

		<div style="text-align: center;">
			<h3 style="text-decoration: underline;">Laporan Hasil Perjalanan Dinas</h3>
		</div>

		<table style="width: 100%;">
			<tr>
				<td style="vertical-align: top; width: 1%; font-weight: bold;">I.</td>
				<td colspan="3" style="font-weight: bold;">Pendahuluan</td>
			</tr>
			<tr>
                <td></td>
				<td style="width: 1%; font-weight: bold;">A. </td>
				<td colspan="2" style="font-weight: bold;">Dasar Perjalanan Dinas</td>
			</tr>
			<tr>
                <td></td>
                <td></td>
				<td colspan="2" style="text-transform: capitalize">
					Surat Perintah Tugas dari {{ strtolower($laporan_perdin->data_perdin->tanda_tangan->pegawai->jabatan->nama) }}
				</td>
			</tr>
			<tr>
                <td></td>
                <td></td>
				<td style="width: 1%;">Nomor</td>
				<td>: {{ $laporan_perdin->data_perdin->no_spt }}</td>
			</tr>
			<tr>
                <td></td>
                <td></td>
				<td style="width: 1%;">Tanggal</td>
				<td>: {{ Carbon\Carbon::parse($laporan_perdin->data_perdin->tgl_berangkat)->isoFormat('D MMMM YYYY') }}</td>
			</tr>
			<tr>
                <td></td>
				<td style="width: 1%; font-weight: bold;">B. </td>
				<td colspan="2" style="font-weight: bold;">Maksud dan Tujuan</td>
			</tr>
			<tr>
                <td></td>
                <td></td>
				<td colspan="2" style="text-align: justify">
					{!! nl2br($laporan_perdin->maksud) !!}
				</td>
			</tr>
			<tr>
				<td style="vertical-align: top; width: 1%; font-weight: bold;">II.</td>
				<td colspan="3" style="font-weight: bold;">Kegiatan yang dilaksanakan</td>
			</tr>
			<tr>
                <td></td>
				<td colspan="3" style="text-align: justify">
					{!! nl2br($laporan_perdin->kegiatan) !!}
				</td>
			</tr>
			<tr>
				<td style="vertical-align: top; width: 1%; font-weight: bold;">III.</td>
				<td colspan="3" style="font-weight: bold;">Hasil yang dicapai</td>
			</tr>
			<tr>
                <td></td>
				<td colspan="3" style="text-align: justify">
					{!! nl2br($laporan_perdin->hasil) !!}
				</td>
			</tr>
			<tr>
				<td style="vertical-align: top; width: 1%; font-weight: bold;">IV.</td>
				<td colspan="3" style="font-weight: bold;">Kesimpulan dan Saran</td>
			</tr>
			<tr>
                <td></td>
				<td colspan="3" style="text-align: justify">
					{!! nl2br($laporan_perdin->kesimpulan) !!}
				</td>
			</tr>
			<tr>
				<td style="vertical-align: top; width: 1%; font-weight: bold;">V.</td>
				<td colspan="3" style="font-weight: bold;">Penutup</td>
			</tr>
			<tr>
                <td></td>
				<td colspan="3" style="text-align: justify">
					Demikian laporan hasil perjalanan dinas, atas perhatiannya diucapkan terima kasih.
				</td>
			</tr>
		</table>

		<p style="margin: 30px 0 10px 0;">
			Serang, {{ now()->isoFormat('D MMMM YYYY') }} <br>
			Yang melaksanakan Tugas
		</p>

		<table style="width: 100%;">
			<tr>
				<td style="width: 1%;">1.</td>
				<td>
					{{ $laporan_perdin->data_perdin->pegawai_diperintah->nama }} <br>
					NIP.{{ $laporan_perdin->data_perdin->pegawai_diperintah->nip }}
				</td>
				<td style="vertical-align: bottom;">1........................................</td>
			</tr>
			@foreach ($laporan_perdin->data_perdin->pegawai_mengikuti as $pegawai)
			<tr>
				<td style="width: 1%;">{{ $loop->iteration + 1 }}.</td>
				<td>
					{{ $pegawai->nama }} <br>
					NIP.{{ $pegawai->nip }}
				</td>
				<td style="vertical-align: bottom;">{{ $loop->iteration + 1 }}........................................</td>
			</tr>
			@endforeach
		</table>
	</div>
</body>
</html>