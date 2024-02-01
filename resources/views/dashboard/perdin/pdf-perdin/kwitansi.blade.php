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

		ul {
			list-style-type: none;
			padding-left: 0;
		}

		ul li {
			padding-left: 10px;
			text-indent: -9px;
		}

		ul li::before {
			content: "\003A";
			margin-right: 1px;
		}
	</style>
</head>
<body style="font-family: Times, serif; margin: 30px;">
	@foreach ($kwitansi_perdin->pegawais as $index => $pegawai)

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
	margin: 10px 0 5px 0;
	">

	<div style="text-align: center; margin: 0 0 5px 0;">
		<h2 style="text-decoration: underline; word-spacing: 5px;">K U I T A N S I</h2>
	</div>

	<table class="gap-t" style="width: 100%; border-collapse: collapse;">
		<tr>
			<td style="white-space: nowrap;">SUDAH TERIMA DARI</td>
			<td colspan="5">: Bendahara Pengeluaran Badan Pengelolaan Keuangan Dan Aset Daerah Provinsi Banten</td>
		</tr>
		<tr>
			<td style="white-space: nowrap;">TERBILANG</td>
			<td colspan="5" style="text-transform: capitalize">: {{ $kwitansi_perdin->terbilang($pegawai->pivot->uang_harian + $pegawai->pivot->uang_transport + $pegawai->pivot->uang_tiket + $pegawai->pivot->uang_penginapan) }} Rupiah</td>
		</tr>
		<tr>
			<td style="white-space: nowrap;">UNTUK PEMBAYARAN</td>
			<td colspan="5">: Biaya perjalanan dinas Sdr {{ $pegawai->nama }} Ke {{ $kwitansi_perdin->data_perdin->tujuan->nama }} selama {{ $kwitansi_perdin->data_perdin->lama }} hari</td>
		</tr>
		<tr>
			<td></td>
			<td style="white-space: nowrap;">Sesuai SPPD Nomor</td>
			<td colspan="4">: {{ $kwitansi_perdin->data_perdin->no_spt }} tanggal {{ Carbon\Carbon::parse($kwitansi_perdin->data_perdin->tgl_berangkat)->isoFormat('D MMMM YYYY') }}</td>
		</tr>

		<tr>
			<td></td>
			<td>dengan perincian sbb</td>
			<td>:</td>
			<td style="white-space: nowrap;">
				<span style="margin: 0 20px 0 70px;">-</span>
				<span>Uang Harian</span>
			</td>
			<td>Rp.</td>
			<td style="text-align: right;">{{ number_format($pegawai->pivot->uang_harian, 2, ',', '.') }}</td>
		</tr>
		<tr>
			<td colspan="3"></td>
			<td style="white-space: nowrap;">
				<span style="margin: 0 20px 0 70px;">-</span>
				<span>Uang Transport</span>
			</td>
			<td>Rp.</td>
			<td style="text-align: right;">{{ number_format($pegawai->pivot->uang_transport, 2, ',', '.') }}</td>
		</tr>
		<tr>
			<td colspan="3"></td>
			<td style="white-space: nowrap;">
				<span style="margin: 0 20px 0 70px;">-</span>
				<span>Uang Akomodasi</span>
			</td>
			<td style="border-bottom: 1px solid black;">Rp.</td>
			<td style="text-align: right; border-bottom: 1px solid black;">{{ number_format($pegawai->pivot->uang_tiket + $pegawai->pivot->uang_penginapan, 2, ',', '.') }}</td>
		</tr>
		<tr>
			<td colspan="3"></td>
			<td style="white-space: nowrap;">
				<span style="margin: 0 20px 0 70px;">-</span>
				<span>Total</span>
			</td>
			<td>Rp.</td>
			<td style="text-align: right;">{{ number_format($pegawai->pivot->uang_harian + $pegawai->pivot->uang_transport + $pegawai->pivot->uang_tiket + $pegawai->pivot->uang_penginapan, 2, ',', '.') }}</td>
		</tr>

		<tr>
			<td style="white-space: nowrap;">Kegiatan</td>
			<td colspan="5">
				<ul>
					<li>
						{{ $kwitansi_perdin->kegiatan_sub->kegiatan->nama }}
					</li>
				</ul>
			</td>
		</tr>
		<tr>
			<td style="white-space: nowrap;">Sub Kegiatan</td>
			<td colspan="5">
				<ul>
					<li>
						{{ $kwitansi_perdin->kegiatan_sub->nama }}
					</li>
				</ul>
			</td>
		</tr>
		<tr>
			<td style="white-space: nowrap;">Kode Rekening</td>
			<td colspan="5">: {{ $kwitansi_perdin->no_rek }}</td>
		</tr>
		<tr>
			<td colspan="3"></td>
			<td colspan="3" style="text-align: center;">PPTK</td>
		</tr>
		<tr>
			<td style="white-space: nowrap;" colspan="3">
				JUMLAH
				<span style="padding: 0 20px 0 50px;">Rp.</span>
				{{ number_format($pegawai->pivot->uang_harian + $pegawai->pivot->uang_transport + $pegawai->pivot->uang_tiket + $pegawai->pivot->uang_penginapan, 2, ',', '.') }}
			</td>
			<td colspan="3" style="padding-top: 40px;"></td>
		</tr>
		<tr>
			<td colspan="3"></td>
			<td colspan="3" style="text-align: center;">
				<span style="text-decoration: underline;">{{ $kwitansi_perdin->pptk->nama }}</span><br>
				NIP. {{ $kwitansi_perdin->pptk->nip }}
			</td>
		</tr>
	</table>

	<table class="gap-t" style="width: 100%; border-collapse: collapse; margin-top: 30px;">
		<tr>
			<td style="text-align: center;">
				<span style="text-decoration: underline;">MENGETAHUI/SETUJU DIBAYAR</span><br>
				{!! $kwitansi_perdin->data_perdin->ttdFormated !!}
			</td>
			<td style="text-align: center;">
				<span style="text-decoration: underline;">LUNAS DIBAYAR</span><br>
				Bendahara Pengeluaran
			</td>
			<td style="text-align: center;">
				<span style="text-decoration: underline;">YANG MENERIMA</span><br>
			</td>
		</tr>
		<tr>
			<td style="padding-top: 40px;" colspan="3"></td>
		</tr>
		<tr>
			<td style="text-align: center;">
				<span style="text-decoration: underline;">{{ $kwitansi_perdin->data_perdin->tanda_tangan->pegawai->nama }}</span><br>
				NIP. {{ $kwitansi_perdin->data_perdin->tanda_tangan->pegawai->nip }}
			</td>
			<td style="text-align: center;">
				<span style="text-decoration: underline;">{{ $bendahara->pegawai->nama ?? '' }}</span><br>
				NIP. {{ $bendahara->pegawai->nip ?? '' }}
			</td>
			<td style="text-align: center;">
				<span style="text-decoration: underline;">{{ $pegawai->nama }}</span><br>
				NIP. {{ $pegawai->nip }}
			</td>
		</tr>
	</table>

	@if ($index % 2 === 0)
        <hr style="margin: 10px 0; border: 1px dashed black;"> {{-- Pemisah --}}
    @endif

	@endforeach
</body>
</html>