<html>
<head>
	<style>
		* {
			margin: 0;
			padding: 0;
		}

		.gap-t td {
			padding: 5px;
			border: 1px solid black;
			vertical-align: top;
		}

		p, td {
			font-size: 15px;
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

	<table style="width: 100%;">
		<tr>
			<td style="width: 50%;"></td>
			<td style="width: 1%; white-space: nowrap; padding-right: 10px;">Lembar Ke</td>
			<td>:</td>
		</tr>
		<tr>
			<td></td>
			<td>Kode No.</td>
			<td>:</td>
		</tr>
		<tr>
			<td></td>
			<td>Nomor</td>
			<td>: <span style="padding-right: 50px;">000.1.2.3/</span>/SEK-BPKAD/2024</td>
		</tr>
	</table>

	<div style="margin: 5px 0;">

		<div style="text-align: center; margin: 0 0 10px 0;">
			<h4 style="text-decoration: underline;">SURAT PERJALANAN DINAS (SPD)</h4>
		</div>

		<div style="border: 1px solid black; padding: 2px;">
			<table class="gap-t" style="width: 100%; border-collapse: collapse; border: 1px solid black;">
				<tr>
					<td style="text-align: center; width: 1%">1</td>
					<td colspan="2">Pengguna Anggaran/Kuasa Pengguna Anggaran</td>
					<td style="border-right: 0;"></td>
					<td colspan="2" style="border-left: 0; text-transform: capitalize;">{{ ($data_perdin->pa_kpa->jenis_ttd == 'pengguna_anggaran') ? 'Pengguna Anggaran' : 'Kuasa Pengguna Anggaran' }}</td>
				</tr>
				<tr>
					<td style="text-align: center; width: 1%">2</td>
					<td colspan="2">Nama/NIP Pegawai yang diperintah mengadakan perjalanan dinas</td>
					<td style="border-right: 0;"></td>
					<td colspan="2" style="border-left: 0;">
						{{ $data_perdin->pegawai_diperintah->nama }} <br> {{ $data_perdin->pegawai_diperintah->nip }}
					</td>
				</tr>
				<tr>
					<td rowspan="4" style="text-align: center; width: 1%">3</td>
					<td style="width: 1%; border-right: 0; border-bottom: 0;">a. </td>
					<td style="border-left: 0; border-bottom: 0;">Pangkat dan Golongan ruang gaji menurut PP No.30 Tahun 2015</td>
					<td style="width: 1%; border-right: 0; border-bottom: 0;">a. </td>
					<td colspan="2" style="border-left: 0; border-bottom: 0;">{{ $data_perdin->pegawai_diperintah->pangkat->nama ?? '' }}</td>
				</tr>
				<tr>
					<td style="width: 1%; border-right: 0; border-bottom: 0; border-top: 0;">b. </td>
					<td style="border-left: 0; border-bottom: 0; border-top: 0;">Jabatan/Instansi</td>
					<td style="width: 1%; border-right: 0; border-bottom: 0; border-top: 0;">b. </td>
					<td colspan="2" style="border-left: 0; border-bottom: 0; border-top: 0;">{{ $data_perdin->pegawai_diperintah->jabatan->nama }}</td>
				</tr>
				<tr>
					<td style="width: 1%; border-right: 0; border-bottom: 0; border-top: 0;">c. </td>
					<td style="border-left: 0; border-bottom: 0; border-top: 0;">Tingkat Biaya Perjalanan Dinas</td>
					<td style="width: 1%; border-right: 0; border-bottom: 0; border-top: 0;">c. </td>
					<td colspan="2" style="border-left: 0; border-bottom: 0; border-top: 0;">Uang Harian : Rp. {{ number_format($data_perdin->pegawai_diperintah->kwitansi_perdins()->first()->pivot->uang_harian, 0, '.', '.') }}</td>
				</tr>
				<tr>
					<td style="width: 1%; border-right: 0; border-top: 0;"></td>
					<td style="border-left: 0; border-top: 0;"></td>
					<td style="width: 1%; border-right: 0; border-top: 0;"></td>
					<td colspan="2" style="border-left: 0; border-top: 0;">Transport : Rp. {{ number_format($data_perdin->pegawai_diperintah->kwitansi_perdins()->first()->pivot->uang_transport, 0, '.', '.') }}</td>
				</tr>

				<tr>
					<td style="text-align: center; width: 1%">4</td>
					<td colspan="2">Maksud Perjalanan Dinas</td>
					<td style="border-right: 0; width: 1%;">-</td>
					<td colspan="2" style="border-left: 0;">{{ $data_perdin->maksud }}</td>
				</tr>
				<tr>
					<td style="text-align: center; width: 1%">5</td>
					<td colspan="2">Alat angkutan yang di Pergunakan</td>
					<td style="border-right: 0; width: 1%;"></td>
					<td colspan="2" style="border-left: 0;">{{ $data_perdin->alat_angkut->nama }}</td>
				</tr>

				<tr>
					<td rowspan="2" style="text-align: center; width: 1%">6</td>
					<td style="width: 1%; border-right: 0; border-bottom: 0;">a. </td>
					<td style="border-left: 0; border-bottom: 0;">Tempat Berangkat</td>
					<td style="width: 1%; border-right: 0; border-bottom: 0;">a. </td>
					<td colspan="2" style="border-left: 0; border-bottom: 0;">{{ $data_perdin->kedudukan }}</td>
				</tr>
				<tr>
					<td style="width: 1%; border-right: 0; border-top: 0;">b. </td>
					<td style="border-left: 0; border-top: 0;">Tempat Tujuan</td>
					<td style="width: 1%; border-right: 0; border-top: 0;">b. </td>
					<td colspan="2" style="border-left: 0; border-top: 0;">{{ $data_perdin->kabupaten->nama ?? '' }}</td>
				</tr>

				<tr>
					<td rowspan="3" style="text-align: center; width: 1%">7</td>
					<td style="width: 1%; border-right: 0; border-bottom: 0;">a. </td>
					<td style="border-left: 0; border-bottom: 0;">Lamanya Perjalanan Dinas</td>
					<td style="width: 1%; border-right: 0; border-bottom: 0;">a. </td>
					<td colspan="2" style="border-left: 0; border-bottom: 0;">{{ $data_perdin->kwitansi_perdin->terbilang($data_perdin->lama) }} hari</td>
				</tr>
				<tr>
					<td style="width: 1%; border-right: 0; border-bottom: 0; border-top: 0;">b. </td>
					<td style="border-left: 0; border-bottom: 0; border-top: 0;">Tanggal Berangkat</td>
					<td style="width: 1%; border-right: 0; border-bottom: 0; border-top: 0;">b. </td>
					<td colspan="2" style="border-left: 0; border-bottom: 0; border-top: 0;">{{ Carbon\Carbon::parse($data_perdin->tgl_berangkat)->isoFormat('D MMMM YYYY') }}</td>
				</tr>
				<tr>
					<td style="width: 1%; border-right: 0; border-top: 0;">c. </td>
					<td style="border-left: 0; border-top: 0;">Tanggal harus kembali/tiba ditempat baru*</td>
					<td style="width: 1%; border-right: 0; border-top: 0;">c. </td>
					<td colspan="2" style="border-left: 0; border-top: 0;">{{ Carbon\Carbon::parse($data_perdin->tgl_kembali)->isoFormat('D MMMM YYYY') }}</td>
				</tr>

				<tr>
					<td rowspan="{{ $data_perdin->pegawai_mengikuti->count() + 1 }}" style="text-align: center; width: 1%">8</td>
					<td colspan="2" style="text-align: center;">Pengikut: Nama</td>
					<td colspan="2" style="text-align: center;">Tanggal Lahir</td>
					<td style="text-align: center;">Keterangan</td>
				</tr>
				@foreach ($data_perdin->pegawai_mengikuti as $pengikut)
				<tr>
					<td colspan="2">{{ $pengikut->nama }}</td>
					<td colspan="2">{{ $pengikut->tgl_lahir ?? '' }}</td>
					<td>{{ $pengikut->jabatan->nama ?? '' }}</td>
				</tr>
				@endforeach

				<tr>
					<td rowspan="3" style="text-align: center; width: 1%">9</td>
					<td colspan="2" style="border-bottom: 0; padding-bottom: 0;">Pembebanan Anggaran</td>
					<td colspan="3" style="border-bottom: 0; padding-bottom: 0;"></td>
				</tr>
				<tr>
					<td style="width: 1%; border-right: 0; border-top: 0; border-bottom: 0; vertical-align: top;">a. </td>
					<td style="border-left: 0; border-top: 0; border-bottom: 0; vertical-align: top;">Instansi</td>
					<td style="width: 1%; border-right: 0; border-top: 0; border-bottom: 0; vertical-align: top;">a. </td>
					<td colspan="2" style="border-left: 0; border-top: 0; border-bottom: 0; vertical-align: top;">Badan Pengelolaan Keuangan Dan Aset Daerah</td>
				</tr>
				<tr>
					<td style="width: 1%; border-right: 0; border-top: 0; vertical-align: top;">b. </td>
					<td style="border-left: 0; border-top: 0; vertical-align: top;">Mata Anggaran</td>
					<td style="width: 1%; border-right: 0; border-top: 0; vertical-align: top;">b. </td>
					<td colspan="2" style="border-left: 0; border-top: 0; vertical-align: top;">{{ $data_perdin->jenis_perdin->no_rek }}</td>
				</tr>
				<tr>
					<td style="text-align: center; width: 1%">10</td>
					<td colspan="2">Keterangan Lain-lain</td>
					<td style="border-right: 0; width: 1%;">:</td>
					<td colspan="2" style="border-left: 0;"></td>
				</tr>
			</table>
		</div>
        <p>*) <i>coret yang tidak perlu</i></p>

        <table style="width: 100%;">
			<tr>
				<td style="width: 50%"></td>
				<td>
                    <table>
                        <tr>
                            <td>Dikeluarkan di</td>
                            <td>: Serang</td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>: {{ now()->isoFormat('D MMMM YYYY') }}</td>
                        </tr>
                    </table>

                    <div style="padding: 3px;">
						@if ($data_perdin->pa_kpa)
                        <p>{{ ($data_perdin->pa_kpa->jenis_ttd == 'pengguna_anggaran') ? 'Pengguna Anggaran' : 'Kuasa Pengguna Anggaran' }}</p>
                        <img src="data:image/png;base64,{{ $data_perdin->pa_kpa->fileTtdEncoded }}" alt="{{ $data_perdin->pa_kpa->nama }}" height="70">
                        <p>{{ $data_perdin->pa_kpa->pegawai->nama }}</p>
                        <p>{{ $data_perdin->pa_kpa->pegawai->pangkat->nama ?? '' }}</p>
                        <p>NIP {{ $data_perdin->pa_kpa->pegawai->nip ?? '' }}</p>
						@endif
                    </div>
                </td>
			</tr>
		</table>
	</div>
</body>
</html>
