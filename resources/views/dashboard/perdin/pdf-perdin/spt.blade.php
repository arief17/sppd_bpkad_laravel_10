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

		p, td {
			font-size: 17px;
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

	<div style="margin: 20px 60px 0 60px;">

		<div style="text-align: center;">
			<div style="display: inline-block; text-align: left;">
				<p style="text-decoration: underline; font-weight: bold; margin: 0;">SURAT PERINTAH TUGAS</p>
				<p style="margin: 0;">No. </p>
			</div>
		</div>
		<p style="margin: 10px 0; text-indent: 50px; text-align: justify;">
			@if ($data_perdin->surat_dari)
			<span style="text-transform: capitalize">
				Berdasarkan surat dari {{ $data_perdin->surat_dari }} nomor {{ $data_perdin->nomor_surat }} tanggal {{ Carbon\Carbon::parse($data_perdin->tgl_surat)->isoFormat('D MMMM YYYY') }} perihal {{ $data_perdin->perihal }}.
			</span>
			@endif
			Dengan ini, <span style="text-transform: capitalize">{{ strtolower($data_perdin->tanda_tangan->pegawai->jabatan->nama) }}.</span>
		</p>
		<p style="text-align: center;">MEMERINTAHKAN:</p>

		<table style="width: 100%;">
			<tr>
				<td>Kepada</td>
				<td colspan="2">:</td>
			</tr>

			<tr>
				<td style="text-align: right;">1. </td>
				<td>Nama</td>
				<td>: <b>{{ $data_perdin->pegawai_diperintah->nama }}</b></td>
			</tr>
			<tr>
				<td></td>
				<td>NIP</td>
				<td>: {{ $data_perdin->pegawai_diperintah->nip }}</td>
			</tr>
			<tr>
				<td></td>
				<td>Jabatan</td>
				<td style="padding-bottom: 30px">: {{ $data_perdin->pegawai_diperintah->jabatan->nama }}</td>
			</tr>
			@foreach ($data_perdin->pegawai_mengikuti as $pegawai)
			<tr>
				<td style="text-align: right;">{{ $loop->iteration + 1 }}. </td>
				<td>Nama</td>
				<td>: <b>{{ $pegawai->nama }}</b></td>
			</tr>
			<tr>
				<td></td>
				<td>NIP</td>
				<td>: {{ $pegawai->nip }}</td>
			</tr>
			<tr>
				<td></td>
				<td>Jabatan</td>
				<td style="padding-bottom: 30px">: {{ $pegawai->jabatan->nama }}</td>
			</tr>
			@endforeach


			<tr>
				<td>Untuk</td>
				<td colspan="2">: {{ $data_perdin->maksud }}</td>
			</tr>
			<tr>
				<td rowspan="4"></td>
				<td>Hari</td>
				<td>: {{ Carbon\Carbon::parse($data_perdin->tgl_berangkat)->isoFormat('dddd') }}</td>
				<tr>
					<td>Tanggal</td>
					<td>: {{ Carbon\Carbon::parse($data_perdin->tgl_berangkat)->isoFormat('D MMMM YYYY') }}</td>
				</tr>
				<tr>
					<td>Tempat</td>
					<td>: {{ $data_perdin->lokasi }}</td>
				</tr>
			</tr>
		</table>

		<p style="margin: 30px 0; text-indent: 50px">Demikian Surat Perintah Tugas ini dibuat, untuk dilaksanakan dengan penuh rasa tanggung jawab.</p>

		<div style="float: right;">
			<div style="text-align: center;">
				<h4 style="margin-top: 20px; text-transform: uppercase">
					{!! $data_perdin->ttdFormated !!} <br>
				</h4>
				<img src="data:image/png;base64,{{ $data_perdin->tanda_tangan->fileTtdEncoded }}" alt="{{ $data_perdin->tanda_tangan->nama }}" height="70">
				<p style="text-decoration: underline; font-weight: bold;">{{ $data_perdin->tanda_tangan->pegawai->nama }}</p>
				<p>NIP.{{ $data_perdin->tanda_tangan->pegawai->nip }}</p>
			</div>
		</div>
	</div>
</body>
</html>