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
	margin: 10px 0 0 0;
	">

	<div style="margin: 30px 60px 0 60px;">

		<div style="text-align: center; margin-bottom: 30px">
            <p style="margin: 0; font-size: 20px;">SURAT TUGAS</p>
            <p style="margin: 0;">
                <span style="padding-right: 150px;">Nomor : </span> 2024
            </p>
		</div>

		<table style="width: 100%;">
            <tr>
                <td>Dasar</td>
                <td>:</td>
                <td colspan="3">
					@if ($data_perdin->surat_dari)
					<span style="text-transform: capitalize">
						Surat undangan No {{ $data_perdin->nomor_surat }}
                        Tanggal {{ Carbon\Carbon::parse($data_perdin->tgl_surat)->isoFormat('D MMMM YYYY') }}
                        tentang {{ $data_perdin->perihal }}/DPA Tahun Anggaran 2024
                        No {{ $data_perdin->nomor_surat }}
                        Tanggal {{ Carbon\Carbon::parse($data_perdin->tgl_surat)->isoFormat('D MMMM YYYY') }}
                        {{ $data_perdin->kwitansi_perdin->kegiatan_sub ? 'Kegiatan' . $data_perdin->kwitansi_perdin->kegiatan_sub->kegiatan->nama . 'Sub Kegiatan' . $data_perdin->kwitansi_perdin->kegiatan_sub->nama : '' }},
					</span>
					@endif
                    Maka <span style="text-transform: capitalize">{{ strtolower($data_perdin->tanda_tangan->pegawai->jabatan->nama) }}</span>
				</td>
            </tr>
            <tr>
                <td colspan="5">
                    <p style="text-align: center; padding: 30px 0px; font-size: 20px;">MEMERINTAHKAN:</p>
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
				<td colspan="3">Melaksanakan Koordinasi {{ $data_perdin->maksud }} yang dilaksanakan pada:</td>
			</tr>
            <tr>
                <td></td>
                <td></td>
                <td>Hari</td>
                <td colspan="2">: {{ Carbon\Carbon::parse($data_perdin->tgl_berangkat)->isoFormat('dddd') }}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Tanggal</td>
                <td>: {{ Carbon\Carbon::parse($data_perdin->tgl_berangkat)->isoFormat('D MMMM YYYY') }}</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Tempat</td>
                <td colspan="2">: {{ $data_perdin->kabupaten->nama }}</td>
            </tr>
		</table>

        <p style="text-indent: 60px;">Demikian Surat Perintah Tugas ini dibuat, untuk dilaksanakan dengan penuh rasa tanggung jawab.</p>

		<table style="width: 100%;">
			<tr>
				<td style="width: 50%"></td>
				<td>
					<div style="text-align: center;">
						<div style="display: inline-block; text-align: left;">
							<p style="margin-top: 20px;">
								Serang,  {{ Carbon\Carbon::parse($data_perdin->tgl_berangkat)->isoFormat('D MMMM YYYY') }} <br>
								{{ $data_perdin->tanda_tangan->pegawai->jabatan->nama }}
							</p>
							<img src="data:image/png;base64,{{ $data_perdin->tanda_tangan->fileTtdEncoded }}" alt="{{ $data_perdin->tanda_tangan->nama }}" height="70">
							<p>{{ $data_perdin->tanda_tangan->pegawai->nama }}</p>
							<p>NIP {{ $data_perdin->tanda_tangan->pegawai->nip }}</p>
						</div>
					</div>
				</td>
			</tr>
		</table>
	</div>

	<div style="page-break-before: always;"></div>

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
	margin: 10px 0 0 0;
	">

	<div style="margin: 30px 60px 0 60px;">

		<div style="text-align: center; margin-bottom: 30px">
            <p style="margin: 0; font-size: 20px;">SURAT TUGAS</p>
            <p style="margin: 0;">
                <span style="padding-right: 150px;">Nomor : </span> 2024
            </p>
		</div>

		<table style="width: 100%;">
            <tr>
                <td>Dasar</td>
                <td>:</td>
                <td colspan="3">
					@if ($data_perdin->surat_dari)
					<span style="text-transform: capitalize">
						Surat undangan No {{ $data_perdin->nomor_surat }}
                        Tanggal {{ Carbon\Carbon::parse($data_perdin->tgl_surat)->isoFormat('D MMMM YYYY') }}
                        tentang {{ $data_perdin->perihal }}/DPA Tahun Anggaran 2024
                        No {{ $data_perdin->nomor_surat }}
                        Tanggal {{ Carbon\Carbon::parse($data_perdin->tgl_surat)->isoFormat('D MMMM YYYY') }}
                        {{ $data_perdin->kwitansi_perdin->kegiatan_sub ? 'Kegiatan' . $data_perdin->kwitansi_perdin->kegiatan_sub->kegiatan->nama . 'Sub Kegiatan' . $data_perdin->kwitansi_perdin->kegiatan_sub->nama : '' }},
					</span>
					@endif
                    Maka <span style="text-transform: capitalize">{{ strtolower($data_perdin->tanda_tangan->pegawai->jabatan->nama) }}</span>
				</td>
            </tr>
            <tr>
                <td colspan="5">
                    <p style="text-align: center; padding: 30px 0px; font-size: 20px;">MEMERINTAHKAN:</p>
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
				<td colspan="3">Melaksanakan Koordinasi {{ $data_perdin->maksud }} yang dilaksanakan pada:</td>
			</tr>
            <tr>
                <td></td>
                <td></td>
                <td>Hari</td>
                <td colspan="2">: {{ Carbon\Carbon::parse($data_perdin->tgl_berangkat)->isoFormat('dddd') }}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Tanggal</td>
                <td>: {{ Carbon\Carbon::parse($data_perdin->tgl_berangkat)->isoFormat('D MMMM YYYY') }}</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Tempat</td>
                <td colspan="2">: {{ $data_perdin->kabupaten->nama }}</td>
            </tr>
		</table>

        <p style="text-indent: 60px;">Demikian Surat Perintah Tugas ini dibuat, untuk dilaksanakan dengan penuh rasa tanggung jawab.</p>

		<table style="width: 100%; margin-top: 20px;">
			<tr>
				<td style="width: 50%">
                    <table style="width: 100%; border-collapse: collapse; border: 1px solid black;">
                        <tr>
                            <td colspan="3" style="text-align: center; border: 1px solid black;">Paraf Hirarki</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black;">Sekretaris Badan</td>
                            <td style="border: 1px solid black;">:</td>
                            <td style="width: 50%; border: 1px solid black;"></td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black;">Ka.Bidang Perencanaan Anggaran Daerah</td>
                            <td style="border: 1px solid black;">:</td>
                            <td style="border: 1px solid black;"></td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black;">Ka.Sub.Bid Perencanaan Anggaran</td>
                            <td style="border: 1px solid black;">:</td>
                            <td style="border: 1px solid black;"></td>
                        </tr>
                    </table>
                </td>
				<td>
					<div style="text-align: center;">
						<div style="display: inline-block; text-align: left;">
							<p>
								Serang,  {{ Carbon\Carbon::parse($data_perdin->tgl_berangkat)->isoFormat('D MMMM YYYY') }} <br>
								{{ $data_perdin->tanda_tangan->pegawai->jabatan->nama }}
							</p>
							<img src="data:image/png;base64,{{ $data_perdin->tanda_tangan->fileTtdEncoded }}" alt="{{ $data_perdin->tanda_tangan->nama }}" height="70">
							<p>{{ $data_perdin->tanda_tangan->pegawai->nama }}</p>
                            <p>{{ $data_perdin->tanda_tangan->pegawai->pangkat->nama ?? '' }}</p>
							<p>NIP {{ $data_perdin->tanda_tangan->pegawai->nip }}</p>
						</div>
					</div>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>