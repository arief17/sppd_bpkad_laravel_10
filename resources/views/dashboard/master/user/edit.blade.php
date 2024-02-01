@extends('layouts.main')

@section('container')

<div class="row row-sm">
	<div class="col-xl-6">
		<div class="card box-shadow-0 ">
			<div class="card-header d-flex justify-content-between">
				<h4 class="card-title mb-1">{{ $title }}</h4>
				<a class="btn btn-secondary btn-sm" href="{{ route('user.index') }}">
					<i class="fa fa-reply"></i>
				</a>
			</div>
			<div class="card-body pt-0">
				<form action="{{ route('user.show', $user->username) }}" method="post">
					@csrf
					@method('put')

					<div class="form-group">
						<label for="username">Username</label>
						<input name="username" value="{{ old('username', $user->username) }}" type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Masukan username">
						@error('username')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input name="password" value="{{ old('password') }}" type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukan password user...">
						@error('password')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="password_confirmation">Password konfirmasi</label>
						<input name="password_confirmation" value="{{ old('password_confirmation') }}" type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation" placeholder="Masukan password konfirmasi user...">
						@error('password')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="level_admin_id" class="form-label">Level Admin</label>
						<select name="level_admin_id" id="level_admin_id" class="form-control form-select @error('level_admin_id') is-invalid @enderror">
							<option value="">Pilih Level Admin</option>
							@foreach ($level_admins as $level_admin)
							<option value="{{ $level_admin->id }}" @selected(old('level_admin_id', $user->level_admin_id) == $level_admin->id)>
								{{ $level_admin->nama }}
							</option>
							@endforeach
						</select>
						@error('level_admin_id')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="bidang_id" class="form-label">Bidang</label>
						<select name="bidang_id" id="bidang_id" class="form-control form-select select2 @error('bidang_id') is-invalid @enderror">
							<option value="">Pilih Bidang</option>
							@foreach ($bidangs as $bidang)
							<option value="{{ $bidang->id }}" @selected(old('bidang_id', $user->bidang_id) == $bidang->id)>
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
					<div class="form-group">
						<label for="jabatan_id" class="form-label">Jabatan</label>
						<select name="jabatan_id" id="jabatan_id" class="form-control form-select select2 @error('jabatan_id') is-invalid @enderror">
							<option value="">Pilih Jabatan</option>
							@foreach ($jabatans as $jabatan)
							<option value="{{ $jabatan->id }}" @selected(old('jabatan_id', $user->jabatan_id) == $jabatan->id)>
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