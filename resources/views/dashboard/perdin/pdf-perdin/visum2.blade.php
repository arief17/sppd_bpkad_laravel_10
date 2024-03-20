<html>
<head>
	<style>
		* {
			margin: 0;
			padding: 0;
		}

		.gap-t td {
			padding: 0.5px;
		}

		p, td {
			font-size: 14px;
			vertical-align: top;
		}
	</style>
</head>
<body style="font-family: Times, serif; margin: 20px;">
	<table class="gap-t" style="border-collapse: collapse; border: 1px solid black;">
		<tr>
			<td style="border: 1px solid black; width: 1%; text-align: center;"></td>
			<td style="border: 1px solid black; width: 48%;"></td>
			<td style="border: 1px solid black; width: 1%; text-align: center; border-right: 0; padding: 3px 5px">I.</td>
			<td style="border: 1px solid black; width: 48%; border-left: 0;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="5" style="text-align: center; width: 1%;"></td>
						<td style="white-space: nowrap; width: 1%;">Berangkat dari</td>
						<td>: {{ $data_perdin->kedudukan }}</td>
					</tr>
					<tr>
						<td colspan="2">(Tempat Kedudukan)</td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%;">Ke</td>
						<td style="white-space: nowrap;">: {{ $data_perdin->kabupaten->nama ?? '' }}</td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%;">Pada Tanggal</td>
						<td>: {{ Carbon\Carbon::parse($data_perdin->tgl_berangkat)->isoFormat('D MMMM YYYY') }}</td>
					</tr>
					{{-- <tr>
						<td colspan="3" style="white-space: nowrap; text-transform: capitalize;">Kepala {{ strtolower($data_perdin->pptk->pegawai->bidang->nama ?? '') }}</td>
					</tr> --}}
					<tr>
						<td colspan="3">Selaku Pejabat Pelaksana Teknis Kegiatan</td>
					</tr>
					<tr>
						<td></td>
						<td colspan="2">
							<img src="data:image/png;base64,{{ $data_perdin->pptk->fileTtdEncoded ?? 'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=' }}" alt="{{ $data_perdin->pptk->pegawai->nama ?? '' }}" height="60">
							<p>{{ $data_perdin->pptk->pegawai->nama ?? '-' }}</p>
							<p>NIP {{ $data_perdin->pptk->pegawai->nip ?? '-' }}</p>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
            <td style="border: 1px solid black; width: 1%; text-align: center;">II.</td>
			<td style="border: 1px solid black; width: 48%;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="5" style="text-align: center; width: 1%;"></td>
						<td style="white-space: nowrap; width: 1%;">Tiba di</td>
						<td>: {{ $data_perdin->kabupaten->nama ?? '' }}</td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%;">Pada Tanggal</td>
						<td>: {{ Carbon\Carbon::parse($data_perdin->tgl_berangkat)->isoFormat('D MMMM YYYY') }}</td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2">
							<p style="padding-top: 50px;">
								(...............................................................................) <br>
								NIP
							</p>
						</td>
					</tr>
				</table>
			</td>
            <td style="border: 1px solid black; width: 1%; text-align: center; border-right: 0;"></td>
			<td style="border: 1px solid black; width: 48%; border-left: 0;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="5" style="text-align: center; width: 1%;"></td>
						<td style="white-space: nowrap; width: 1%;">Berangkat dari</td>
						<td>: {{ $data_perdin->kabupaten->nama ?? '' }}</td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%;">Ke</td>
						<td>: {{ $data_perdin->kedudukan }}</td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%;">Pada Tanggal</td>
						<td>: {{ Carbon\Carbon::parse($data_perdin->tgl_kembali)->isoFormat('D MMMM YYYY') }}</td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2">
							<p style="padding-top: 50px;">
								(...............................................................................) <br>
								NIP
							</p>
						</td>
					</tr>
				</table>
			</td>
		</tr>

		<tr>
            <td style="border: 1px solid black; width: 1%; text-align: center;">III.</td>
			<td style="border: 1px solid black; width: 48%;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="5" style="text-align: center; width: 1%;"></td>
						<td style="white-space: nowrap; width: 1%;">Tiba di</td>
						<td>: {{ $data_perdin->kabupaten_lain->nama ?? '' }}</td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%;">Pada Tanggal</td>
						<td>:</td>
					</tr>
					<tr>
						<td>Kepada</td>
						<td colspan="2">:</td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2">
							<p style="padding-top: 50px;">
								(...............................................................................) <br>
								NIP
							</p>
						</td>
					</tr>
				</table>
			</td>
            <td style="border: 1px solid black; width: 1%; text-align: center; border-right: 0;"></td>
			<td style="border: 1px solid black; width: 48%; border-left: 0;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="5" style="text-align: center; width: 1%;"></td>
						<td style="white-space: nowrap; width: 1%;">Berangkat dari</td>
						<td>:</td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%;">Ke</td>
						<td>:</td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%;">Pada Tanggal</td>
						<td>:</td>
					</tr>
					<tr>
						<td>Kepada</td>
						<td colspan="2">:</td>
					</tr>
					<tr>
						<td colspan="2">
							<p style="padding-top: 50px;">
								(...............................................................................) <br>
								NIP
							</p>
						</td>
					</tr>
				</table>
			</td>
		</tr>

		<tr>
            <td style="border: 1px solid black; width: 1%; text-align: center;">IV.</td>
			<td style="border: 1px solid black; width: 48%;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="5" style="text-align: center; width: 1%;"></td>
						<td style="white-space: nowrap; width: 1%;">Tiba di</td>
						<td>: </td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%;">Pada Tanggal</td>
						<td>: </td>
					</tr>
					<tr>
						<td>Kepada</td>
						<td colspan="2">:</td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2">
							<p style="padding-top: 50px;">
								(...............................................................................) <br>
								NIP
							</p>
						</td>
					</tr>
				</table>
			</td>
            <td style="border: 1px solid black; width: 1%; text-align: center; border-right: 0;"></td>
			<td style="border: 1px solid black; width: 48%; border-left: 0;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="5" style="text-align: center; width: 1%;"></td>
						<td style="white-space: nowrap; width: 1%;">Berangkat dari</td>
						<td>: </td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%;">Ke</td>
						<td>: </td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%;">Pada Tanggal</td>
						<td>: </td>
					</tr>
					<tr>
						<td>Kepada</td>
						<td colspan="2">:</td>
					</tr>
					<tr>
						<td colspan="2">
							<p style="padding-top: 50px;">
								(...............................................................................) <br>
								NIP
							</p>
						</td>
					</tr>
				</table>
			</td>
		</tr>

		<tr>
            <td style="border: 1px solid black; width: 1%; text-align: center;">V.</td>
			<td style="border: 1px solid black; width: 48%;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="5" style="text-align: center; width: 1%;"></td>
						<td style="white-space: nowrap; width: 1%;">Tiba di</td>
						<td>: </td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%;">Pada Tanggal</td>
						<td>: </td>
					</tr>
					<tr>
						<td>Kepada</td>
						<td colspan="2">:</td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2">
							<p style="padding-top: 50px;">
								(...............................................................................) <br>
								NIP
							</p>
						</td>
					</tr>
				</table>
			</td>
            <td style="border: 1px solid black; width: 1%; text-align: center; border-right: 0;"></td>
			<td style="border: 1px solid black; width: 48%; border-left: 0;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="5" style="text-align: center; width: 1%;"></td>
						<td style="white-space: nowrap; width: 1%;">Berangkat dari</td>
						<td>: </td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%;">Ke</td>
						<td>: </td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%;">Pada Tanggal</td>
						<td>: </td>
					</tr>
					<tr>
						<td>Kepada</td>
						<td colspan="2">:</td>
					</tr>
					<tr>
						<td colspan="2">
							<p style="padding-top: 50px;">
								(...............................................................................) <br>
								NIP
							</p>
						</td>
					</tr>
				</table>
			</td>
		</tr>

		<tr>
            <td style="border: 1px solid black; width: 1%; text-align: center;">VI.</td>
			<td style="border: 1px solid black; width: 48%;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="5" style="text-align: center; width: 1%;"></td>
						<td style="white-space: nowrap; width: 1%;">Tiba di</td>
						<td>: {{ $data_perdin->kedudukan }}</td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%;">Pada Tanggal</td>
						<td>: {{ Carbon\Carbon::parse($data_perdin->tgl_kembali)->isoFormat('D MMMM YYYY') }}</td>
					</tr>
					<tr>
						<td colspan="2">
							<b style="text-transform: capitalize">{{ strtolower($data_perdin->tanda_tangan->pegawai->jabatan->nama) }}</b>

							<img src="data:image/png;base64,{{ $data_perdin->tanda_tangan->fileTtdEncoded }}" alt="{{ $data_perdin->tanda_tangan->nama }}" height="70">
							<p style="font-weight: bold">{{ $data_perdin->tanda_tangan->pegawai->nama }}</p>
                            <p>{{ $data_perdin->tanda_tangan->pegawai->pangkat->nama ?? '' }}</p>
							<p>NIP {{ $data_perdin->tanda_tangan->pegawai->nip }}</p>
						</td>
					</tr>
				</table>
			</td>
            <td style="border: 1px solid black; width: 1%; text-align: center; border-right: 0;"></td>
			<td style="border: 1px solid black; width: 48%; border-left: 0;">
				<p>Telah diperiksa dengan keterangan bahwa perjalanan tersebut diatas dilakukan atas perintahnya dan semata-mata untuk kepentingan jabatan dalam waktu yang sesingkat-singkatnya.</p>
			</td>
		</tr>

        <tr>
            <td style="border: 1px solid black; width: 1%; text-align: center;">VII.</td>
			<td style="border: 1px solid black;" colspan="3">
				<table style="width: 100%;">
					<tr>
						<td style="text-align: center; width: 1%;"></td>
						<td>Catatan Lain-lain</td>
					</tr>
				</table>
			</td>
		</tr>

        <tr>
            <td style="border: 1px solid black; width: 1%; text-align: center;">VIII.</td>
			<td style="border: 1px solid black;" colspan="3">
				<table style="width: 100%;">
					<tr>
						<td rowspan="2" style="text-align: center; width: 1%;"></td>
						<td>PERHATIAN :</td>
					</tr>
					<tr>
						<td>Pengguna Anggaran/Kuasa Pengguna Anggaran yang menertibkan SPD, pejabat/pegawai/pihak lain yang melakukan perjalanan dinas, para pejabat yang mengesahkan tanggal berangkat/tiba serta bendahara pengeluaran bertanggung jawab berdasarkan peraturan-peraturan Keuangan Daerah apabila negara menderita rugi akibat kesalahan, kelalaian dan kealpaannya.</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>
