@extends('layouts.main')

@section('container')

<div class="row row-sm">
	<div class="col-xl-6">
		<div class="card">
			<div class="card-header d-flex justify-content-between">
				<h4 class="card-title mb-1">{{ $title }}</h4>
				<a class="btn btn-secondary btn-sm" href="{{ route('data-perdin.index', 'baru') }}">
					<i class="fa fa-reply"></i>
				</a>
			</div>
			<div class="card-body">
				<div class="mb-3">
					<div class="btn-group" role="group">
						@can('isApproval')
						<a class="modal-effect btn {{ $data_perdin->status->approve ? 'btn-success' : 'btn-danger' }} btn-sm" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#approve-{{ $data_perdin->slug }}">Approve</a>
						@else
						<button class="not-approval btn {{ $data_perdin->status->approve ? 'btn-success' : 'btn-danger' }} btn-sm">Approve</button>
						@endcan

						@if ($data_perdin->status->approve)
						<a class="modal-effect btn btn-success btn-sm" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#spt-{{ $data_perdin->slug }}" onclick="loadContent('{{ route('spt-pdf', $data_perdin->slug) }}', 'spt-iframe-{{ $data_perdin->slug }}')">SPT</a>
						<a class="modal-effect btn btn-success btn-sm" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#visum1-{{ $data_perdin->slug }}" onclick="loadContent('{{ route('visum1-pdf', $data_perdin->slug) }}', 'visum1-iframe-{{ $data_perdin->slug }}')">Visum 1</a>
						<a class="modal-effect btn btn-success btn-sm" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#visum2-{{ $data_perdin->slug }}" onclick="loadContent('{{ route('visum2-pdf', $data_perdin->slug) }}', 'visum2-iframe-{{ $data_perdin->slug }}')">Visum 2</a>
						<a class="btn {{ $data_perdin->status->lap ? 'btn-success' : 'btn-danger' }} btn-sm" href="{{ route('laporan-perdin.edit', $data_perdin->laporan_perdin_id) }}">Lap</a>
						@else
						<button class="not-approve btn btn-danger btn-sm">SPT</button>
						<button class="not-approve btn btn-danger btn-sm">Visum 1</button>
						<button class="not-approve btn btn-danger btn-sm">Visum 2</button>
						<button class="not-approve btn btn-danger btn-sm">Lap</button>
						@endif

						@if ($data_perdin->status->approve && $data_perdin->status->lap)
						<a class="btn {{ $data_perdin->status->kwitansi ? 'btn-success' : 'btn-danger' }} btn-sm" href="{{ route('kwitansi-perdin.edit', $data_perdin->kwitansi_perdin_id) }}">Kwitansi</a>
						@else
						<button class="not-laporan btn btn-danger btn-sm">Kwitansi</button>
						@endif
					</div>
					<div class="btn-group" role="group">
						<a class="btn btn-info btn-sm" href="{{ route('data-perdin.edit', $data_perdin->slug) }}">
							<i class="fas fa-pencil-alt"></i>
						</a>
						<form action="{{ route('data-perdin.destroy', $data_perdin->slug) }}" method="post" class="d-inline">
							@method('delete')
							@csrf
							<button type="button" class="btn btn-danger btn-sm" id='deleteData' data-title="{{ $data_perdin->maksud }}">
								<i class="fas fa-trash"></i>
							</button>
						</form>
					</div>
				</div>

				@include('dashboard.perdin.status-perdin.approve')
				@if ($data_perdin->status->approve)
				@include('dashboard.perdin.status-perdin.spt')
				@include('dashboard.perdin.status-perdin.visum1')
				@include('dashboard.perdin.status-perdin.visum2')
				@endif

				<div class="table-responsive">
					<table class="table mg-b-0 text-md-nowrap border-bottom">
						<tr>
							<th style="white-space: nowrap; width: 1%;">Surat Dari</th>
							<td>{{ $data_perdin->surat_dari }}</td>
						</tr>
						<tr>
							<th style="white-space: nowrap; width: 1%;">Tanggal Surat</th>
							<td>{{ $data_perdin->tgl_surat }}</td>
						</tr>
						<tr>
							<th style="white-space: nowrap; width: 1%;">Perihal</th>
							<td>{{ $data_perdin->perihal }}</td>
						</tr>
						<tr>
							<th style="white-space: nowrap; width: 1%;">Pegawai</th>
							<td>{{ $data_perdin->pegawai_diperintah->nama }}</td>
						</tr>
						<tr>
							<th style="white-space: nowrap; width: 1%;">Tanggal Berangkat</th>
							<td>{{ $data_perdin->tgl_berangkat }}</td>
						</tr>
						<tr>
							<th style="white-space: nowrap; width: 1%;">Lama</th>
							<td>{{ $data_perdin->lama }}</td>
						</tr>
						<tr>
							<th style="white-space: nowrap; width: 1%;">Lokasi</th>
							<td>{{ $data_perdin->lokasi }}</td>
						</tr>
						<tr>
							<th style="white-space: nowrap; width: 1%;">Jumlah Pegawai</th>
							<td>{{ $data_perdin->jumlah_pegawai }}</td>
						</tr>
						<tr>
							<th style="white-space: nowrap; width: 1%;">Jenis Perdin</th>
							<td>{{ $data_perdin->jenis_perdin->nama }}</td>
						</tr>
						<tr>
							<th style="white-space: nowrap; width: 1%;">User</th>
							<td>{{ $data_perdin->author->username }}</td>
						</tr>
					</table>
				</div>
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
	$(document).on('click', '#deleteData', function() {
		let title = $(this).data('title');

		Swal.fire({
			title: 'Hapus ' + title + '?',
			html: "Apakah kamu yakin ingin menghapus data perdin dengan maksud <b>" + title + "</b>? Data yang sudah dihapus tidak bisa dikembalikan!",
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

	$('.not-approve').click(function(e) {
		Swal.fire({
			title: 'Belum Approve',
			icon: 'warning',
			confirmButtonColor: '#3085d6',
			confirmButtonText: 'Ok',
		});
	});
	$('.not-laporan').click(function(e) {
		Swal.fire({
			title: 'Belum ada laporan',
			icon: 'warning',
			confirmButtonColor: '#3085d6',
			confirmButtonText: 'Ok',
		});
	});
	$('.not-approval').click(function(e) {
		Swal.fire({
			title: 'Hanya Approval yang bisa approve',
			icon: 'warning',
			confirmButtonColor: '#3085d6',
			confirmButtonText: 'Ok',
		});
	});

    function loadContent(url, iframeId) {
        var iframe = document.getElementById(iframeId);
        iframe.src = url;
    }
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