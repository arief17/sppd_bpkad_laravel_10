<html>
<head>
	<style>
		* {
			margin: 0;
			padding: 0;
		}

		.gap-t td, th {
			padding: 1px 5px;
			vertical-align: top;
		}

		p, td {
			font-size: 12px;
		}

        .t-price td {
            border-top: 1px solid black;
            border-bottom: 1px solid black;
        }

        .col-1 {
            float: left;
            padding: 10px;
        }

        .col-2 {
            float: left;
            width: 50%;
            padding: 10px;
        }

        .col-3 {
            float: left;
            padding: 10px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }
	</style>
</head>
<body style="font-family: Times, serif; margin: 30px;">
	@foreach ($kwitansi_perdin->pegawais as $index => $pegawai)

	<div>
		<div class="row">
			<div class="col-1">
				<img src="data:image/png;base64,{{ $imgLogo }}" width="80">
			</div>
			<div class="col-2">
				<h5>
					PEMERINTAH PROVINSI BANTEN <br>
					BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH
				</h5>
				<small>
					Kawasan Pusat Pemerintahan Provinsi Banten (KP3B) <br>
					Jl. Syech Nawawi Al- Bantani, Palima - Serang <br>
					Telp./Fax. (0254) 267019, 267008, 267009
				</small>
			</div>
			<div class="col-3">
				<table>
					<tr>
						<td colspan="2">Kesatu/Kedua/Ketiga/Keempat/Kelima</td>
					</tr>
					<tr>
						<td style="width: 100px;">Tanggal</td>
						<td>:________________</td>
					</tr>
					<tr>
						<td>Kode Pos (Nomor)</td>
						<td>:________________</td>
					</tr>
					<tr>
						<td>Rekening</td>
						<td>:{{ $kwitansi_perdin->data_perdin->jenis_perdin->no_rek }}</td>
					</tr>
				</table>
			</div>
		</div>

		<hr style="
		border-top: 3px solid;
		border-bottom: 1px solid;
		padding: 1px 0;
		margin: 10px 0 5px 0;
		">

		<div style="text-align: center; margin: 0 0 5px 0;">
			<h4 style="text-decoration: underline; word-spacing: 5px;">KWITANSI (TANDA PEMBAYARAN)</h4>
		</div>

		<table class="gap-t" style="width: 100%; border-collapse: collapse;">
			<tr>
				<td style="white-space: nowrap;">Sudah Terima Dari</td>
				<td>: Kuasa Pengguna Anggaran Badan Pengelolaan Keuangan Dan Aset Daerah Provinsi Banten</td>
			</tr>
			<tr>
				<td style="white-space: nowrap;">Banyaknya</td>
				<td style="text-transform: capitalize">: {{ $kwitansi_perdin->terbilang($pegawai->pivot->uang_harian + $pegawai->pivot->uang_transport + $pegawai->pivot->uang_tiket + $pegawai->pivot->uang_penginapan + $kwitansi_perdin->bbm + $kwitansi_perdin->tol) }} Rupiah</td>
			</tr>
			<tr>
				<td style="white-space: nowrap;">Rp.</td>
				<td>: {{ number_format($pegawai->pivot->uang_harian + $pegawai->pivot->uang_transport + $pegawai->pivot->uang_tiket + $pegawai->pivot->uang_penginapan + $kwitansi_perdin->bbm + $kwitansi_perdin->tol, 0, ',', '.') }}</td>
			</tr>
			<tr>
				<td style="white-space: nowrap;">Yaitu untuk</td>
				<td>: {{ $kwitansi_perdin->data_perdin->maksud }} di {{ $kwitansi_perdin->data_perdin->kabupaten->nama }} {{ $kwitansi_perdin->data_perdin->kabupaten_lain ? 'dan ' . $kwitansi_perdin->data_perdin->kabupaten_lain->nama : '' }} Tgl {{ Carbon\Carbon::parse($kwitansi_perdin->data_perdin->tgl_berangkat)->isoFormat('D MMMM YYYY') }}, Sesuai SPT No: {{ $kwitansi_perdin->data_perdin->no_spt }}</td>
			</tr>

			<tr><td><br></td><td><br></td></tr>
			<tr>
				<td style="margin-top: 50px"></td>
				<td>
					<table class="gap-t t-price" style="width: 100%; border-collapse: collapse;">
						<tr>
							<td>Uang Harian</td>
							<td>= Rp.</td>
							<td>{{ number_format($pegawai->pivot->uang_harian, 0, ',', '.') }}</td>

							<td>Nomor Rekening:</td>
							<td>{{ $kwitansi_perdin->data_perdin->jenis_perdin->no_rek }}</td>
							<td>Bank Banten</td>
						</tr>
						<tr>
							<td>Uang Transport</td>
							<td>= Rp.</td>
							<td colspan="4">{{ number_format($pegawai->pivot->uang_transport + $pegawai->pivot->uang_tiket + $kwitansi_perdin->bbm + $kwitansi_perdin->tol, 0, ',', '.') }}</td>
						</tr>
						<tr>
							<td>Uang Akomodasi</td>
							<td>= Rp.</td>
							<td colspan="4">{{ number_format($pegawai->pivot->uang_penginapan, 0, ',', '.') }}</td>
						</tr>
						<tr>
							<td>Jumlah</td>
							<td>= Rp.</td>
							<td colspan="4">{{ number_format($pegawai->pivot->uang_harian + $pegawai->pivot->uang_transport + $pegawai->pivot->uang_tiket + $pegawai->pivot->uang_penginapan, 0, ',', '.') }}</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>

		<table class="gap-t" style="width: 100%; border-collapse: collapse; margin-top: 30px; border: 1px solid black;">
			<tr>
				<td style="text-align: center; border-right: 1px solid black;">
					MENGETAHUI/MENYETUJUI <br>
					{{ strtoupper($kwitansi_perdin->data_perdin->pa_kpa->jenis_ttd_f) }}
				</td>
				<td style="text-align: center; border-right: 1px solid black;">
					BENDAHARA <br>
					PENGELUARAN PEMBANTU
				</td>
				<td style="text-align: center;">
					<div style="text-align: center;">
						<span style="padding-right: 30px;">Serang, </span> {{ now()->isoFormat('MMMM YYYY') }} <br>
						<span style="border-top: 1px solid black; padding: 0 50px">Yang menerima,</span>
					</div>
				</td>
			</tr>
			<tr>
				<td style="border-right: 1px solid black;"></td>
				<td style="border-right: 1px solid black;"></td>
				<td style="padding-bottom: 60px; border-right: 1px solid black;">
					<table>
						<tr>
							<td>Nama</td>
							<td>: {{ $pegawai->nama ?? '-' }}</td>
						</tr>
						<tr>
							<td>NIP</td>
							<td>: {{ $pegawai->nip ?? '-' }}</td>
						</tr>
						<tr>
							<td>Pangkat/Jabatan</td>
							<td>: {{ $pegawai->pangkat->nama ?? '-' }}</td>
						</tr>
						<tr>
							<td>Satuan kerja</td>
							<td>: BPKAD Provinsi Banten</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td style="text-align: center; border-right: 1px solid black;">
					<span style="text-decoration: underline;">{{ $kwitansi_perdin->data_perdin->pa_kpa->pegawai->nama }}</span><br>
					NIP. {{ $kwitansi_perdin->data_perdin->pa_kpa->pegawai->nip }}
				</td>
				<td style="text-align: center; border-right: 1px solid black;">
					<span style="text-decoration: underline;">{{ $bendahara->pegawai->nama ?? '-' }}</span><br>
					NIP. {{ $bendahara->pegawai->nip ?? '-' }}
				</td>
				<td style="text-align: center; border-right: 1px solid black;">
					<span style="text-decoration: underline;">{{ $pegawai->nama ?? '-' }}</span><br>
					NIP. {{ $pegawai->nip ?? '-' }}
				</td>
			</tr>
		</table>
	</div>

	@if ($index % 2 === 0)
        <hr style="margin: 20px 0; border: 1px dashed black;">
    @endif

	@endforeach
</body>
</html>