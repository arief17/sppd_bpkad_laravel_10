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

        th {
            padding: 1px 7px 1px 7px;
        }

        p, td, th {
            font-size: 14px;
        }

        .table-border {
            width: 100%;
            border: 1px solid black;
            border-collapse: collapse;
        }

        .table-border th, .table-border td {
            border: 1px solid black;
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
    margin: 10px 0;
    ">

    <div style="margin: 20px;">
        <div style="text-align: center; margin-bottom: 30px">
            <p style="margin: 0; font-weight: bold; text-decoration: underline;">SURAT PERNYATAAN TANGGUNG JAWAB BELANJA</p>
		</div>

        <table style="margin-bottom: 20px;">
            <tr>
                <td style="width: 1%">1.</td>
                <td>Nama OPD</td>
                <td style="width: 1%;">:</td>
                <td style="width: 75%">Badan Pengelolaan Keuangan dan Aset Daerah Provinsi Banten</td>
            </tr>
            <tr>
                <td>2.</td>
                <td>Kode Stalker</td>
                <td>:</td>
                <td>{{ $kwitansi_perdin->no_rek }}</td>
            </tr>
            <tr>
                <td>3.</td>
                <td>No. DPA & Tgl</td>
                <td>:</td>
                <td>DPA/A.1/5.02.0.00.0.00.02.0000/001/2024// tanggal {{ $kwitansi_perdin->tgl_bayar }}</td>
            </tr>
            <tr>
                <td>4.</td>
                <td>Kegiatan</td>
                <td>:</td>
                <td>{{ $kwitansi_perdin->kegiatan_sub->kegiatan->nama }}</td>
            </tr>
            <tr>
                <td>5.</td>
                <td>Sub Kegiatan</td>
                <td>:</td>
                <td>{{ $kwitansi_perdin->kegiatan_sub->nama }}</td>
            </tr>
            <tr>
                <td>6.</td>
                <td>Jenis Belanja</td>
                <td>:</td>
                <td>{{ $kwitansi_perdin->data_perdin->jenis_perdin->nama }}</td>
            </tr>
        </table>

        <p style="margin-bottom: 20px;">
            Yang bertandatangan dibawah ini <span style="text-transform: capitalize"></span>{{ strtolower($kwitansi_perdin->data_perdin->tanda_tangan->pegawai->jabatan->nama) }} Badan Pengelolaan Keuangan dan Aset Daerah Provinsi Banten, menyatakan bahwa saya bertanggungjawab penuh atas segala pengeluaran yang dibayarkan kepada yang berhak menerima dengan perincian sebagai berikut:
        </p>

        <table class="table-border">
            <tr>
                <th rowspan="2">No.</th>
                <th rowspan="2">No. Rincian <br> Objek</th>
                <th rowspan="2">Penerima</th>
                <th rowspan="2">Uraian</th>
                <th rowspan="2">JUMLAH</th>
                <th colspan="2">PAJAK</th>
                <th rowspan="2">Jumlah</th>
            </tr>
            <tr>
                <th>PPN</th>
                <th>pph23</th>
            </tr>
            @foreach ($kwitansi_perdin->pegawais as $index => $pegawai)
                <tr>
                    <td style="text-align: center">{{ $loop->iteration }}</td>
                    <td>{{ $index == 0 ? $kwitansi_perdin->no_rek : '' }}</td>
                    <td>{{ $pegawai->nama ?? '-' }}</td>
                    @if ($index == 0)
                    <td rowspan="{{ count($kwitansi_perdin->pegawais) }}">
                        {{ $kwitansi_perdin->data_perdin->maksud }} di {{ $kwitansi_perdin->data_perdin->kabupaten->nama }} {{ $kwitansi_perdin->data_perdin->kabupaten_lain ? 'dan ' . $kwitansi_perdin->data_perdin->kabupaten_lain->nama : '' }} Tgl {{ Carbon\Carbon::parse($kwitansi_perdin->data_perdin->tgl_berangkat)->isoFormat('D MMMM YYYY') }}, Sesuai SPT No: {{ $kwitansi_perdin->data_perdin->no_spt }}
                    </td>
                    @endif
                    <td style="text-align: right">{{ number_format($pegawai->pivot->uang_harian + $pegawai->pivot->uang_transport + $pegawai->pivot->uang_tiket + $pegawai->pivot->uang_penginapan, 0, ',', '.') }}</td>
                    <td style="text-align: right">-</td>
                    <td style="text-align: right">-</td>
                    <td style="text-align: right">{{ number_format($pegawai->pivot->uang_harian + $pegawai->pivot->uang_transport + $pegawai->pivot->uang_tiket + $pegawai->pivot->uang_penginapan, 0, ',', '.') }}</td>
                </tr>
            @endforeach
            <tr>
                <th colspan="4">Jumlah</th>
                <th style="text-align: right">
                    {{ number_format($kwitansi_perdin->pegawais->sum(function($pegawai) {
                        return $pegawai->pivot->uang_harian +
                                $pegawai->pivot->uang_transport +
                                $pegawai->pivot->uang_tiket +
                                $pegawai->pivot->uang_penginapan;
                    }), 0, ',', '.') }}
                </th>
                <th style="text-align: right">-</th>
                <th style="text-align: right">-</th>
                <th style="text-align: right">
                    {{ number_format($kwitansi_perdin->pegawais->sum(function($pegawai) {
                        return $pegawai->pivot->uang_harian +
                                $pegawai->pivot->uang_transport +
                                $pegawai->pivot->uang_tiket +
                                $pegawai->pivot->uang_penginapan;
                    }), 0, ',', '.') }}
                </th>
            </tr>
        </table>

        <p style="margin-bottom: 20px; margin-top: 20px">
            Bukti - bukti pengeluaran yang sah dan lengkap tersebut diatas disimpan sesuai ketentuan yang berlaku  pada Badan Pengelolaan Keuangan dan Aset Daerah Provinsi Banten untuk kelengkapan administrasi dan keperluan pemeriksaan aparat pengawas fungsional.
        </p>
        <p style="margin-bottom: 20px;">
            Demikian surat pernyataan ini dibuat dengan sebenarnya.
        </p>

        <table style="width: 100%;">
			<tr>
				<td style="width: 50%"></td>
				<td>
					<div style="text-align: right;">
						<div style="display: inline-block; text-align: center;">
                            @if ($kwitansi_perdin->data_perdin->pa_kpa)
							<p style="margin-top: 20px;">
								<span style="padding-right: 50px;">Serang,</span> {{ now()->isoFormat('MMMM YYYY') }} <br>
                                {{ $kwitansi_perdin->data_perdin->pa_kpa->jenis_ttd_f }}
							</p>
							<img src="data:image/png;base64,{{ $kwitansi_perdin->data_perdin->pa_kpa->fileTtdEncoded }}" alt="{{ $kwitansi_perdin->data_perdin->pa_kpa->nama }}" height="70">
							<p>{{ $kwitansi_perdin->data_perdin->pa_kpa->pegawai->nama }}</p>
							<p>NIP {{ $kwitansi_perdin->data_perdin->pa_kpa->pegawai->nip }}</p>
                            @endif
						</div>
					</div>
				</td>
			</tr>
		</table>
    </div>
</body>
</html>