@extends('layouts.main')

@section('container')

<div class="row row-sm">
	<div class="col-xl-6">
		<div class="card box-shadow-0 ">
			<div class="card-header">
				@if(session()->has('failedSave'))
				<div class="alert alert-danger mg-b-0 mb-5" role="alert">
					<button aria-label="Close" class="close" data-bs-dismiss="alert" type="button">
						<span aria-hidden="true">×</span>
					</button>
					<strong>Gagal Impor!</strong> <br>
					{!! session('failedSave') !!}
				</div>
				@endif
				<div class="d-flex justify-content-between">
					<h4 class="card-title mb-1">{{ $title }}</h4>
					<div>
						<a href="/assets/pegawai-import-format.xlsx" class="modal-effect btn btn-info btn-sm" download="Contoh Format Import Pegawai">
							<i class="fa fa-download"></i>
							Format
						</a>
						<a class="modal-effect btn btn-success btn-sm" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#pegawai-import">
							<i class="fa fa-upload"></i>
							Import
						</a>
						<a class="btn btn-secondary btn-sm" href="{{ route('pegawai.index') }}">
							<i class="fa fa-reply"></i>
						</a>
					</div>
				</div>
			</div>
			@include('dashboard.master.pegawai.import')
			<div class="card-body pt-0">
				<form action="{{ route('pegawai.store') }}" method="post">
					@csrf

					<div class="form-group">
						<label for="jabatan_id" class="form-label">Jabatan</label>
						<select name="jabatan_id" id="jabatan_id" class="form-control form-select select2 @error('jabatan_id') is-invalid @enderror">
							<option value="">Pilih Jabatan</option>
							@foreach ($jabatans as $jabatan)
							<option value="{{ $jabatan->id }}" @selected(old('jabatan_id') == $jabatan->id)>
								{{ $jabatan->nama }}
							</option>
							@endforeach
						</select>
						@error('jabatan_id')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="nama">Nama</label>
						<input name="nama" value="{{ old('nama') }}" type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukan nama">
						@error('nama')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div id="nip_hide" class="form-group">
						<label for="nip">NIP</label>
						<input name="nip" value="{{ old('nip') }}" type="number" class="form-control @error('nip') is-invalid @enderror" id="nip" placeholder="Masukan nip">
						@error('nip')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input name="email" value="{{ old('email') }}" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukan email">
						@error('email')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="no_hp">Handphone</label>
						<input name="no_hp" value="{{ old('no_hp') }}" type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Masukan no_hp">
						@error('no_hp')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div id="seksi_hide" class="form-group">
						<label for="seksi_id" class="form-label">Seksi</label>
						<select name="seksi_id" id="seksi_id" class="form-control form-select select2 @error('seksi_id') is-invalid @enderror">
							<option value="">Pilih Seksi</option>
							@foreach ($seksis as $seksi)
							<option value="{{ $seksi->id }}" @selected(old('seksi_id') == $seksi->id)>
								{{ $seksi->nama }}
							</option>
							@endforeach
						</select>
						@error('seksi_id')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div id="bidang_hide" class="form-group">
						<label for="bidang_id" class="form-label">Bidang</label>
						<select name="bidang_id" id="bidang_id" class="form-control form-select select2 @error('bidang_id') is-invalid @enderror">
							<option value="">Pilih Bidang</option>
							@foreach ($bidangs as $bidang)
							<option value="{{ $bidang->id }}" @selected(old('bidang_id') == $bidang->id)>
								{{ $bidang->nama }}
							</option>
							@endforeach
						</select>
						@error('bidang_id')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div id="pangkat_hide" class="form-group">
						<label for="pangkat_id" class="form-label">Pangkat</label>
						<select name="pangkat_id" id="pangkat_id" class="form-control form-select select2 @error('pangkat_id') is-invalid @enderror">
							<option value="">Pilih Pangkat</option>
							@foreach ($pangkats as $pangkat)
							<option value="{{ $pangkat->id }}" @selected(old('pangkat_id') == $pangkat->id)>
								{{ $pangkat->nama }}
							</option>
							@endforeach
						</select>
						@error('pangkat_id')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div id="golongan_hide" class="form-group">
						<label for="golongan_id" class="form-label">Golongan</label>
						<select name="golongan_id" id="golongan_id" class="form-control form-select select2 @error('golongan_id') is-invalid @enderror">
							<option value="">Pilih Golongan</option>
							@foreach ($golongans as $golongan)
							<option value="{{ $golongan->id }}" @selected(old('golongan_id') == $golongan->id)>
								{{ $golongan->nama }}
							</option>
							@endforeach
						</select>
						@error('golongan_id')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<div class="form-check">
							<input class="form-check-input @error('pptk') is-invalid @enderror" type="checkbox" name="pptk" value="1" id="pptk" @checked(old('pptk'))>
							<label class="form-check-label" for="pptk">
								PPTK
							</label>
							@error('pptk')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
						</div>
					</div>

					<div class="form-group mb-0 mt-3 justify-content-end">
						<button type="submit" class="btn btn-primary">Simpan</button>
						<button type="reset" class="btn btn-secondary ms-3">Batal</button>
					</div>
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

<script>
	function updateVisibility(selectedJabatan) {
		let jabatan = selectedJabatan.trim().toLowerCase();

		if (jabatan.includes('kepala badan')) {
			$('#seksi_hide').hide();
			$('#bidang_hide').hide();
			$('#pangkat_hide').show();
			$('#golongan_hide').show();
			$('#nip_hide').show();

			$('#seksi_id').removeAttr('required').val('');
			$('#bidang_id').removeAttr('required').val('');
			$('#pangkat_id').attr('required', 'required');
			$('#golongan_id').attr('required', 'required');
			$('#nip').attr('required', 'required');

		} else if (jabatan.includes('kepala bidang')) {
			$('#seksi_hide').hide();
			$('#bidang_hide').show();
			$('#pangkat_hide').show();
			$('#golongan_hide').show();
			$('#nip_hide').show();

			$('#seksi_id').removeAttr('required').val('');
			$('#bidang_id').attr('required', 'required');
			$('#pangkat_id').attr('required', 'required');
			$('#golongan_id').attr('required', 'required');
			$('#nip').attr('required', 'required');

		} else if (jabatan.includes('non asn')) {
			$('#seksi_hide').show();
			$('#bidang_hide').show();
			$('#pangkat_hide').hide();
			$('#golongan_hide').hide();
			$('#nip_hide').hide();

			$('#seksi_id').attr('required', 'required');
			$('#bidang_id').attr('required', 'required');
			$('#pangkat_id').removeAttr('required').val('');
			$('#golongan_id').removeAttr('required').val('');
			$('#nip').removeAttr('required').val('');

		} else {
			$('#seksi_hide').show();
			$('#bidang_hide').show();
			$('#pangkat_hide').show();
			$('#golongan_hide').show();
			$('#nip_hide').show();

			$('#seksi_id').attr('required', 'required');
			$('#bidang_id').attr('required', 'required');
			$('#golongan_id').attr('required', 'required');
			$('#pangkat_id').attr('required', 'required');
			$('#nip').attr('required', 'required');
		}
	}

	updateVisibility($('#jabatan_id option:selected').text());

	$('#jabatan_id').on('change', function() {
		updateVisibility($('#jabatan_id option:selected').text());
	});
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