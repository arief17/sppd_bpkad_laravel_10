@extends('layouts.main')

@section('container')

<div class="row row-sm">
	<div class="col-xl-12">
		<div class="card box-shadow-0 ">
			<div class="card-header d-flex justify-content-between">
				<h4 class="card-title mb-1">{{ $title }}</h4>
				<a class="btn btn-secondary btn-sm" href="{{ route('data-perdin.show', $kwitansi_perdin->data_perdin->slug) }}">
					<i class="fa fa-reply"></i>
				</a>
			</div>
			<div class="card-body pt-0">
				<form action="{{ route('kwitansi-perdin.update', $kwitansi_perdin->id) }}" method="post">
					@csrf
					@method('put')

					<div class="table-responsive">
						<table class="table mg-b-0 text-md-nowrap border-bottom">
							<tr>
								<th style="white-space: nowrap; width: 15%">Surat Dari:</th>
								<td style="width:35%">{{ $kwitansi_perdin->data_perdin->surat_dari }}</td>
								<th style="white-space: nowrap; width: 15%">No:</th>
								<td style="width:35%">{{ $kwitansi_perdin->data_perdin->nomor_surat }}</td>
							</tr>
							<tr>
								<th style="white-space: nowrap; width: 15%">Perihal:</th>
								<td style="width:35%">{{ $kwitansi_perdin->data_perdin->perihal }}</td>
								<th style="white-space: nowrap; width: 15%">Tanggal Surat:</th>
								<td style="width:35%">{{ $kwitansi_perdin->data_perdin->tgl_surat }}</td>
							</tr>
							<tr>
								<th style="white-space: nowrap; width: 15%">Alat Angkut:</th>
								<td style="width:35%">{{ $kwitansi_perdin->data_perdin->alat_angkut->nama }}</td>
								<th style="white-space: nowrap; width: 15%">Kegiatan:</th>
								<td style="width:35%">{{ $kwitansi_perdin->kegiatan_sub->nama ?? '' }}</td>
							</tr>
							<tr>
								<th style="white-space: nowrap; width: 15%">Tanggal Bayar:</th>
								<td style="width:35%">
									<input name="tgl_bayar" value="{{ old('tgl_bayar', $kwitansi_perdin->tgl_bayar) }}" type="date" class="form-control @error('tgl_bayar') is-invalid @enderror" id="tgl_bayar" placeholder="Masukan Tanggal Bayar">
									@error('tgl_bayar')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
									@enderror
								</td>
								<th style="white-space: nowrap; width: 15%">&nbsp;</th>
								<td style="width:35%">
									&nbsp;
								</td>
							</tr>
							<tr>
								<th style="white-space: nowrap; width: 15%">Sub Kegiatan:</th>
								<td style="width:35%">
									<div class="form-group">
										<select name="kegiatan_sub_id" id="kegiatan_sub_id" class="form-control form-select select2 @error('kegiatan_sub_id') is-invalid @enderror">
											<option value="">Pilih Sub Kegiatan</option>
											@foreach ($kegiatan_subs as $kegiatan_sub)
											<option value="{{ $kegiatan_sub->id }}" @selected(old('kegiatan_sub_id', $kwitansi_perdin->kegiatan_sub_id) == $kegiatan_sub->id)>
												{{ $kegiatan_sub->nama }}
											</option>
											@endforeach
										</select>
										@error('kegiatan_sub_id')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
										@enderror
									</div>
								</td>
								<th style="white-space: nowrap; width: 15%">Nomor Rekening:</th>
								<td style="width:35%">
									<input name="no_rek" value="{{ old('no_rek', $kwitansi_perdin->no_rek ?? $kwitansi_perdin->data_perdin->jenis_perdin->no_rek) }}" type="text" class="form-control @error('no_rek') is-invalid @enderror" id="no_rek" placeholder="Masukan Nomor Rekening">
									@error('no_rek')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
									@enderror
								</td>
							</tr>
						</table>
					</div>
					<hr>
					<div class="table-responsive">
						<table id="pegawai_table" class="table mg-b-0 text-md-nowrap border-bottom">
							<thead>
								<tr>
									<th class="border-bottom-0" style="width: 1%">No</th>
									<th class="border-bottom-0">Nama</th>
									<th class="border-bottom-0">NIP</th>
									<th class="border-bottom-0">Pangkat</th>
									<th class="border-bottom-0">Uang Harian</th>
									<th class="border-bottom-0">Uang Transport</th>
									<th class="border-bottom-0">Uang Tiket</th>
									<th class="border-bottom-0">Uang Penginapan</th>
									<th class="border-bottom-0">Total</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($kwitansi_perdin->pegawais as $pegawai)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $pegawai->nama }}</td>
									<td>{{ $pegawai->nip }}</td>
									<td>{{ $pegawai->pangkat->nama ?? '-'}}</td>
									<td>
										<input name="uang_harian[{{ $pegawai->id }}]" value="{{ old('uang_harian.' . $pegawai->id, $pegawai->pivot->uang_harian) }}" type="number" class="form-control @error('uang_harian.' . $pegawai->id) is-invalid @enderror" placeholder="Masukan Uang Harian" required>
										@error('uang_harian.' . $pegawai->id)
										<div class="invalid-feedback">
											{{ $message }}
										</div>
										@enderror
									</td>
									<td>
										<input name="uang_transport[{{ $pegawai->id }}]" value="{{ old('uang_transport.' . $pegawai->id, $pegawai->pivot->uang_transport) }}" type="number" class="form-control @error('uang_transport.' . $pegawai->id) is-invalid @enderror" placeholder="Masukan Uang Transport" required>
										@error('uang_transport.' . $pegawai->id)
										<div class="invalid-feedback">
											{{ $message }}
										</div>
										@enderror
									</td>
									<td>
										<input name="uang_tiket[{{ $pegawai->id }}]" value="{{ old('uang_tiket.' . $pegawai->id, $pegawai->pivot->uang_tiket) }}" type="number" class="form-control @error('uang_tiket.' . $pegawai->id) is-invalid @enderror" placeholder="Masukan Uang Tiket" required>
										@error('uang_tiket.' . $pegawai->id)
										<div class="invalid-feedback">
											{{ $message }}
										</div>
										@enderror
									</td>
									<td>
										<input name="uang_penginapan[{{ $pegawai->id }}]" value="{{ old('uang_penginapan.' . $pegawai->id, $pegawai->pivot->uang_penginapan) }}" type="number" class="form-control @error('uang_penginapan.' . $pegawai->id) is-invalid @enderror" placeholder="Masukan Uang Tiket" required>
										@error('uang_penginapan.' . $pegawai->id)
										<div class="invalid-feedback">
											{{ $message }}
										</div>
										@enderror
									</td>
									<td>0</td>
								</tr>
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th colspan="4" class="text-end">Total :</th>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
								</tr>
							</tfoot>
						</table>
					</div>

					<div class="row row-sm p-3">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="bbm">BBM</label>
								<input name="bbm" value="{{ old('bbm', $kwitansi_perdin->bbm) }}" type="text" class="form-control @error('bbm') is-invalid @enderror" id="bbm" placeholder="Masukan bbm">
								@error('bbm')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="tol">TOL</label>
								<input name="tol" value="{{ old('tol', $kwitansi_perdin->tol) }}" type="text" class="form-control @error('tol') is-invalid @enderror" id="tol" placeholder="Masukan tol">
								@error('tol')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>
					</div>

					<div class="d-flex justify-content-between mb-0 mt-3">
						<div>
							<button type="submit" class="btn btn-primary me-3">Simpan</button>
							<button type="reset" class="btn btn-secondary">Batal</button>
						</div>
						@if ($kwitansi_perdin->data_perdin->status->kwitansi)
						<a class="modal-effect btn btn-secondary" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#kwitansi-{{ $kwitansi_perdin->id }}" onclick="loadContent('{{ route('kwitansi-pdf', $kwitansi_perdin->id) }}', 'kwitansi-iframe-{{ $kwitansi_perdin->id }}')">
							<i class="fa fa-file"></i>
							Cetak Kwitansi
						</a>
						@endif
					</div>
					@include('dashboard.perdin.status-perdin.kwitansi')
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

@section('js')
<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="ti-angle-double-up"></i></a>

<!-- JQuery min js -->
<script src="/assets/plugins/jquery/jquery.min.js"></script>

<!-- Sweet-alert js  -->
<script src="/assets/plugins/sweet-alert/sweetalert2.all.min.js"></script>

@if(session()->has('success'))
<script>
	$(document).ready(function() {
		var Toast = Swal.mixin({
			toast: true,
			position: 'top',
			showConfirmButton: false,
			timer: 5000,
			timerProgressBar: true,
			didOpen: (toast) => {
				toast.addEventListener('mouseenter', Swal.stopTimer)
				toast.addEventListener('mouseleave', Swal.resumeTimer)
			}
		});

		Toast.fire({
			icon: 'success',
			title: '{{ session('success') }}'
		});
	});
</script>
@endif

<script>
	function formatToRupiah(angka) {
		return new Intl.NumberFormat('id-ID', {
			style: 'currency',
			currency: 'IDR',
			minimumFractionDigits: 0
		}).format(angka);
	}

	$(document).ready(function() {
		function hitungTotalPerBaris(row) {
			let uangHarian = parseFloat(row.find('input[name^="uang_harian"]').val()) || 0;
			let uangTransport = parseFloat(row.find('input[name^="uang_transport"]').val()) || 0;
			let uangTiket = parseFloat(row.find('input[name^="uang_tiket"]').val()) || 0;
			let uangPenginapan = parseFloat(row.find('input[name^="uang_penginapan"]').val()) || 0;

			let total = uangHarian + uangTransport + uangTiket + uangPenginapan;
			row.find('td:last-child').text(formatToRupiah(total));
			return total;
		}

		function hitungTotalKeseluruhan() {
			let totalHarian = 0,
			totalTransport = 0,
			totalTiket = 0,
			totalPenginapan = 0;

			$('#pegawai_table tbody tr').each(function() {
				let rowTotal = hitungTotalPerBaris($(this));
				totalHarian += parseFloat($(this).find('input[name^="uang_harian"]').val()) || 0;
				totalTransport += parseFloat($(this).find('input[name^="uang_transport"]').val()) || 0;
				totalTiket += parseFloat($(this).find('input[name^="uang_tiket"]').val()) || 0;
				totalPenginapan += parseFloat($(this).find('input[name^="uang_penginapan"]').val()) || 0;
			});

			$('tfoot tr td:nth-child(2)').text(formatToRupiah(totalHarian));
			$('tfoot tr td:nth-child(3)').text(formatToRupiah(totalTransport));
			$('tfoot tr td:nth-child(4)').text(formatToRupiah(totalTiket));
			$('tfoot tr td:nth-child(5)').text(formatToRupiah(totalPenginapan));

			let totalKeseluruhan = totalHarian + totalTransport + totalTiket + totalPenginapan;
			$('tfoot tr td:last-child').text(formatToRupiah(totalKeseluruhan));
		}

		$('#pegawai_table tbody tr').each(function() {
			hitungTotalPerBaris($(this));
		});
		hitungTotalKeseluruhan();

		$('#pegawai_table tbody input').on('blur', function() {
			let row = $(this).closest('tr');
			hitungTotalPerBaris(row);
			hitungTotalKeseluruhan();
		});
	});

	function loadContent(url, iframeId) {
        var iframe = document.getElementById(iframeId);
        iframe.src = url;
    }
</script>

<!--Internal  Datepicker js -->
<script src="/assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>

<!-- Bootstrap Bundle js -->
<script src="/assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Moment js -->
<script src="/assets/plugins/moment/moment.js"></script>

<!--Internal  jquery.maskedinput js -->
<script src="/assets/plugins/jquery.maskedinput/jquery.maskedinput.js"></script>

<!--Internal  spectrum-colorpicker js -->
<script src="/assets/plugins/spectrum-colorpicker/spectrum.js"></script>

<!-- Internal Select2.min js -->
<script src="/assets/plugins/select2/js/select2.min.js"></script>

<!--Internal Ion.rangeSlider.min js -->
<script src="/assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>

<!--Internal  jquery-simple-datetimepicker js -->
<script src="/assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>

<!-- Ionicons js -->
<script src="/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js"></script>

<!--Internal  pickerjs js -->
<script src="/assets/plugins/pickerjs/picker.min.js"></script>

<!--internal color picker js-->
<script src="/assets/plugins/colorpicker/pickr.es5.min.js"></script>
<script src="/assets/js/colorpicker.js"></script>

<!--Bootstrap-datepicker js-->
<script src="/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>

<!-- Rating js-->
<script src="/assets/plugins/ratings-2/jquery.star-rating.js"></script>
<script src="/assets/plugins/ratings-2/star-rating.js"></script>

<!-- P-scroll js -->
<script src="/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/assets/plugins/perfect-scrollbar/p-scroll.js"></script>

<!-- Sidebar js -->
<script src="/assets/plugins/side-menu/sidemenu.js"></script>

<!-- Right-sidebar js -->
<script src="/assets/plugins/sidebar/sidebar.js"></script>
<script src="/assets/plugins/sidebar/sidebar-custom.js"></script>

<!-- eva-icons js -->
<script src="/assets/js/eva-icons.min.js"></script>

<!-- Sticky js -->
<script src="/assets/js/sticky.js"></script>

<!--themecolor js-->
<script src="/assets/js/themecolor.js"></script>

<!-- custom js -->
<script src="/assets/js/custom.js"></script>

<!-- Internal form-elements js -->
<script src="/assets/js/form-elements.js"></script>
@endsection