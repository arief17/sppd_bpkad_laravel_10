@extends('layouts.main')

@section('container')

<div class="row row-sm">
	<div class="col-xl-6">
		<div class="card">
			<div class="card-header d-flex justify-content-between">
				<h4 class="card-title mb-1">{{ $title }}</h4>
				<a class="btn btn-secondary btn-sm" href="{{ route('uang-transport.index') }}">
					<i class="fa fa-reply"></i>
				</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table mg-b-0 text-md-nowrap border-bottom">
						<tr>
							<th style="white-space: nowrap; width: 1%;">Harga Tiket:</th>
							<td>{{ $uang_transport->harga_tiket }}</td>
						</tr>
						<tr>
							<th style="white-space: nowrap; width: 1%;">Wilayah:</th>
							<td>{{ $uang_transport->wilayah }}</td>
						</tr>
						<tr>
							<th style="white-space: nowrap; width: 1%;">Alat Angkut:</th>
							<td>{{ $uang_transport->uang_transport }}</td>
						</tr>
						<tr>
							<th style="white-space: nowrap; width: 1%;">Eselon I:</th>
							<td>Rp {{ number_format($uang_transport->eselon_i, 0, ',', '.') }}</td>
						</tr>
						<tr>
							<th style="white-space: nowrap; width: 1%;">Eselon II:</th>
							<td>Rp {{ number_format($uang_transport->eselon_ii, 0, ',', '.') }}</td>
						</tr>
						<tr>
							<th style="white-space: nowrap; width: 1%;">Eselon III</th>
							<td>Rp {{ number_format($uang_transport->eselon_iii, 0, ',', '.') }}</td>
						</tr>
						<tr>
							<th style="white-space: nowrap; width: 1%;">Eselon IV</th>
							<td>Rp {{ number_format($uang_transport->eselon_iv, 0, ',', '.') }}</td>
						</tr>
						<tr>
							<th style="white-space: nowrap; width: 1%;">Golongan IV</th>
							<td>Rp {{ number_format($uang_transport->golongan_iv, 0, ',', '.') }}</td>
						</tr>
						<tr>
							<th style="white-space: nowrap; width: 1%;">Golongan III</th>
							<td>Rp {{ number_format($uang_transport->golongan_iii, 0, ',', '.') }}</td>
						</tr>
						<tr>
							<th style="white-space: nowrap; width: 1%;">Golongan II</th>
							<td>Rp {{ number_format($uang_transport->golongan_ii, 0, ',', '.') }}</td>
						</tr>
						<tr>
							<th style="white-space: nowrap; width: 1%;">Golongan I</th>
							<td>Rp {{ number_format($uang_transport->golongan_i, 0, ',', '.') }}</td>
						</tr>
						<tr>
							<th style="white-space: nowrap; width: 1%;">Non ASN</th>
							<td>Rp {{ number_format($uang_transport->non_asn, 0, ',', '.') }}</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="card-footer">
				<a class="btn btn-info me-2" href="{{ route('uang-transport.edit', $uang_transport->slug) }}">
					<i class="fas fa-pencil-alt"></i>
					Edit
				</a>
				<form action="{{ route('uang-transport.destroy', $uang_transport->slug) }}" method="post" class="d-inline">
					@method('delete')
					@csrf
					<button type="button" class="btn btn-danger" id='deleteData' data-title="{{ $uang_transport->nama }}">
						<i class="fas fa-trash"></i>
						Delete
					</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

@section('js')

<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

<!-- JQuery min js -->
<script src="/assets/plugins/jquery/jquery.min.js"></script>

<!-- Sweet-alert js  -->
<script src="/assets/plugins/sweet-alert/sweetalert2.all.min.js"></script>

<script>
	$(document).on('click', '#deleteData', function() {
		let title = $(this).data('title');

		Swal.fire({
			title: 'Hapus ' + title + '?',
			html: "Apakah kamu yakin ingin menghapus <b>" + title + "</b>? Data yang sudah dihapus tidak bisa dikembalikan!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Hapus',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.isConfirmed) {
				$(this).closest('form').submit();
			}
		});
	});
</script>

<!-- Bootstrap Bundle js -->
<script src="/assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Moment js -->
<script src="/assets/plugins/moment/moment.js"></script>

<!-- Eva-icons js -->
<script src="/assets/js/eva-icons.min.js"></script>

<!-- P-scroll js -->
<script src="/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/assets/plugins/perfect-scrollbar/p-scroll.js"></script>

<!-- Sticky js -->
<script src="/assets/js/sticky.js"></script>

<!-- Rating js-->
<script src="/assets/plugins/ratings-2/jquery.star-rating.js"></script>
<script src="/assets/plugins/ratings-2/star-rating.js"></script>

<!-- Sidebar js -->
<script src="/assets/plugins/side-menu/sidemenu.js"></script>

<!-- Right-sidebar js -->
<script src="/assets/plugins/sidebar/sidebar.js"></script>
<script src="/assets/plugins/sidebar/sidebar-custom.js"></script>

<!-- eva-icons js -->
<script src="/assets/js/eva-icons.min.js"></script>

<!--themecolor js-->
<script src="/assets/js/themecolor.js"></script>

<!-- custom js -->
<script src="/assets/js/custom.js"></script>

@endsection