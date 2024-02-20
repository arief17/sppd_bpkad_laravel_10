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
	<table class="gap-t" style="border-collapse: collapse; border-right: 1px solid black;">
		<tr>
			<td style="width: 1%; vertical-align: top; padding-top: 3px;">I.</td>
			<td style="border: 1px solid black; border-right: 0; width: 49%;"></td>
			<td style="border: 1px solid black; width: 50%;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="5" style="vertical-align: top; width: 1%;">&nbsp;</td>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">Berangkat dari</td>
						<td>: {{ $data_perdin->kedudukan }}</td>
					</tr>
					<tr>
						<td colspan="2">(Tempat Kedudukan)</td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">Ke</td>
						<td style="white-space: nowrap;">: {{ $data_perdin->kabupaten->nama ?? '' }}</td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">Pada Tanggal</td>
						<td>: {{ Carbon\Carbon::parse($data_perdin->tgl_berangkat)->isoFormat('D MMMM YYYY') }}</td>
					</tr>
					<tr>
						<td colspan="3" style="border-bottom: 1px solid black;"></td>
					</tr>
					<tr>
						<td></td>
						<td colspan="2">Pejabat Pelaksana Teknis Kegiatan</td>
					</tr>
					<tr>
						<td></td>
						<td colspan="2">
							<img src="data:image/png;base64,{{ $data_perdin->pptk->fileTtdEncoded ?? 'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=' }}" alt="{{ $data_perdin->pptk->pegawai->nama ?? '' }}" height="60">
							<p style="text-decoration: underline; font-weight: bold;">{{ $data_perdin->pptk->pegawai->nama ?? '-' }}</p>
							<p>NIP.{{ $data_perdin->pptk->pegawai->nip ?? '-' }}</p>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td style="width: 1%; vertical-align: top; padding-top: 3px;">II.</td>
			<td style="border: 1px solid black; border-right: 0; width: 49%;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="5" style="vertical-align: top; width: 1%;"></td>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">Tiba di</td>
						<td>: {{ $data_perdin->tujuan->nama }}</td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">Pada Tanggal</td>
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
								NIP.
							</p>
						</td>
					</tr>
				</table>
			</td>
			<td style="border: 1px solid black; width: 50%;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="5" style="vertical-align: top; width: 1%; padding: 5px;"></td>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">Berangkat dari</td>
						<td>: {{ $data_perdin->tujuan->nama }}</td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">Ke</td>
						<td>: {{ $data_perdin->kedudukan }}</td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">Pada Tanggal</td>
						<td>: {{ Carbon\Carbon::parse($data_perdin->tgl_kembali)->isoFormat('D MMMM YYYY') }}</td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2">
							<p style="padding-top: 50px;">
								(...............................................................................) <br>
								NIP.
							</p>
						</td>
					</tr>
				</table>
			</td>
		</tr>

		<tr>
			<td style="width: 1%; vertical-align: top; padding-top: 3px;">III.</td>
			<td style="border: 1px solid black; border-right: 0; width: 49%;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="5" style="vertical-align: top; width: 1%;"></td>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">Tiba di</td>
						<td>: </td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">Pada Tanggal</td>
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
								NIP.
							</p>
						</td>
					</tr>
				</table>
			</td>
			<td style="border: 1px solid black; width: 50%;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="5" style="vertical-align: top; width: 1%; padding: 5px;"></td>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">Berangkat dari</td>
						<td>: </td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">Ke</td>
						<td>: </td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">Pada Tanggal</td>
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
								NIP.
							</p>
						</td>
					</tr>
				</table>
			</td>
		</tr>

		<tr>
			<td style="width: 1%; vertical-align: top; padding-top: 3px;">IV.</td>
			<td style="border: 1px solid black; border-right: 0; width: 49%;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="5" style="vertical-align: top; width: 1%;"></td>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">Tiba di</td>
						<td>: </td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">Pada Tanggal</td>
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
								NIP.
							</p>
						</td>
					</tr>
				</table>
			</td>
			<td style="border: 1px solid black; width: 50%;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="5" style="vertical-align: top; width: 1%; padding: 5px;"></td>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">Berangkat dari</td>
						<td>: </td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">Ke</td>
						<td>: </td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">Pada Tanggal</td>
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
								NIP.
							</p>
						</td>
					</tr>
				</table>
			</td>
		</tr>

		<tr>
			<td style="width: 1%; vertical-align: top; padding-top: 3px;">V.</td>
			<td style="border: 1px solid black; border-right: 0; width: 49%;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="5" style="vertical-align: top; width: 1%;"></td>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">Tiba di</td>
						<td>: </td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">Pada Tanggal</td>
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
								NIP.
							</p>
						</td>
					</tr>
				</table>
			</td>
			<td style="border: 1px solid black; width: 50%;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="5" style="vertical-align: top; width: 1%; padding: 5px;"></td>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">Berangkat dari</td>
						<td>: </td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">Ke</td>
						<td>: </td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">Pada Tanggal</td>
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
								NIP.
							</p>
						</td>
					</tr>
				</table>
			</td>
		</tr>

		<tr>
			<td style="width: 1%; vertical-align: top; padding-top: 3px;">VI.</td>
			<td style="border: 1px solid black; border-right: 0; width: 49%;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="5" style="vertical-align: top; width: 1%;"></td>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">Tiba di</td>
						<td>: {{ $data_perdin->kedudukan }}</td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">Pada Tanggal</td>
						<td>: {{ Carbon\Carbon::parse($data_perdin->tgl_kembali)->isoFormat('D MMMM YYYY') }}</td>
					</tr>
					<tr>
						<td colspan="2">
							<p>Sekretaris</p>

							<img src="data:image/png;base64,{{ $ttd_sekret->fileTtdEncoded ?? $ttd_sekret }}" alt="{{ $ttd_sekret->nama ?? '' }}" height="60">
							<p style="text-decoration: underline; font-weight: bold;">{{ $ttd_sekret->pegawai->nama ?? '' }}</p>
							<p>NIP.{{ $ttd_sekret->pegawai->nip ?? '' }}</p>
						</td>
					</tr>
				</table>
			</td>
			<td style="border: 1px solid black; width: 50%; vertical-align: top;">
				<p style="padding-left: 15px;">Telah diperiksa dengan keterangan bahwa perjalan tersebut atas perintahnya dan semata mata untuk kepentingan jabatan dalam waktu sesingkat-singkatnya</p>
			</td>
		</tr>
		<tr>
			<td style="width: 1%; vertical-align: top; padding-top: 3px;">VII.</td>
			<td style="border: 1px solid black; border-right: 0; width: 49%;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="2" style="vertical-align: top; width: 1%;"></td>
						<td colspan="2">Catatan Lain-lain</td>
					</tr>
				</table>
			</td>
			<td style="border: 1px solid black; width: 50%;">
			</td>
		</tr>
	</table>

	<div style="margin-left: 30px;">
		<p style="margin-top: 10px;"><b>PERHATIAN</b></p>
		<p>Pejabat yang berwenang menertibkan SPPD, pegawai yang melakukan perjalanan dinas, para pejabat yang menentukan tanggal berangkat/tiba, serta bendaharawan, bertanggung jawab berdasarkan peraturan-peraturan keuangan negara, apabila menderita rugi akibat kesalahan, kelalaian dan kealpaannya.</p>
	</div>
</body>
</html>
