<html>
<head>
	<style>
		* {
			margin: 0;
			padding: 0;
		}

		td {
			padding: 1px 5px;
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
	margin: 10px 0 0 0;
	">

	<div style="margin: 30px 60px 0 60px;">

		<div style="text-align: center; margin-bottom: 30px">
            <p style="margin: 0;">SURAT TUGAS</p>
            <p style="margin: 0;">NOMOR................................</p>
		</div>

		<table style="width: 100%;">
            <tr>
                <td>Dasar</td>
                <td colspan="4">:
					@if ($data_perdin->surat_dari)
					<span style="text-transform: capitalize">
						Berdasarkan surat dari {{ $data_perdin->surat_dari }} nomor {{ $data_perdin->nomor_surat }} tanggal {{ Carbon\Carbon::parse($data_perdin->tgl_surat)->isoFormat('D MMMM YYYY') }} perihal {{ $data_perdin->perihal }}.
					</span>
					@endif
					Dengan ini, <span style="text-transform: capitalize">{{ strtolower($data_perdin->tanda_tangan->pegawai->jabatan->nama) }}.</span>
				</td>
            </tr>
            <tr>
                <td colspan="5">
                    <p style="text-align: center; padding: 30px 0px">MEMERINTAHKAN:</p>
                </td>
            </tr>
			<tr>
				<td style="width: 1px">Kepada</td>
				<td style="width: 1%">:</td>
				<td style="width: 1%">1. </td>
				<td>Nama</td>
				<td style="white-space: nowrap">: <b>{{ $data_perdin->pegawai_diperintah->nama }}</b></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td>Pangkat/golongan</td>
				<td>: {{ $data_perdin->pegawai_diperintah->pangkat->nama ?? '-' }}</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td>NIP</td>
				<td>: {{ $data_perdin->pegawai_diperintah->nip }}</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td>Jabatan</td>
				<td style="padding-bottom: 30px">: {{ $data_perdin->pegawai_diperintah->jabatan->nama ?? '-' }}</td>
			</tr>
			@foreach ($data_perdin->pegawai_mengikuti as $pegawai)
			<tr>
				<td></td>
				<td></td>
				<td>{{ $loop->iteration + 1 }}. </td>
				<td>Nama</td>
				<td style="white-space: nowrap">: <b>{{ $pegawai->nama }}</b></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td>Pangkat/golongan</td>
				<td>: {{ $pegawai->pangkat->nama ?? '-' }}</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td>NIP</td>
				<td>: {{ $pegawai->nip ?? '-' }}</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td>Jabatan</td>
				<td style="padding-bottom: 30px">: {{ $pegawai->jabatan->nama ?? '-' }}</td>
			</tr>
			@endforeach

			<tr>
				<td>Untuk</td>
				<td>:</td>
				<td colspan="3">{{ $data_perdin->maksud }}</td>
			</tr>
		</table>

		<table style="width: 100%;">
			<tr>
				<td style="width: 50%"></td>
				<td>
					<div style="text-align: center;">
						<div style="display: inline-block; text-align: left;">
							<p style="margin-top: 20px;">
								Serang,  {{ Carbon\Carbon::parse($data_perdin->tgl_berangkat)->isoFormat('D MMMM YYYY') }} <br>
								{{ implode(' ', array_slice(explode(' ', $data_perdin->tanda_tangan->pegawai->jabatan->nama), 0, 2)) }}
							</p>
							<img src="data:image/png;base64,{{ $data_perdin->tanda_tangan->fileTtdEncoded }}" alt="{{ $data_perdin->tanda_tangan->nama }}" height="70">
							<p style="text-decoration: underline; font-weight: bold;">{{ $data_perdin->tanda_tangan->pegawai->nama }}</p>
							<p>NIP.{{ $data_perdin->tanda_tangan->pegawai->nip }}</p>
						</div>
					</div>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>