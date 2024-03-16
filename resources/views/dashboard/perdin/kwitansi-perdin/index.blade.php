@extends('layouts.main')

@section('container')

<div class="row row-sm">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<div class="d-flex align-items-center">
					<h3 class="card-title">{{ $title }}</h3>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table border-top-0 table-bordered border-bottom" id="responsive-datatable">
						<thead>
							<tr class="text-center">
								<th class="border-bottom-0" style="width: 1%">No</th>
								<th class="border-bottom-0" style="width: 1%">Aksi</th>
								<th class="border-bottom-0">Petugas</th>
								<th class="border-bottom-0">Maksud</th>
								<th class="border-bottom-0">Tanggal Berangkat</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($kwitansi_perdins as $kwitansi_perdin)
							<tr>
								<td class="text-center">{{ $loop->iteration }}</td>
								<td class="text-nowrap">
									@if ($kwitansi_perdin->data_perdin->status->kwitansi)
									<a class="modal-effect btn btn-secondary btn-sm" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#lap-bendahara-{{ $kwitansi_perdin->id }}" onclick="loadContent('{{ route('lap-bendahara-pdf', $kwitansi_perdin->id) }}', 'lap_bendahara-iframe-{{ $kwitansi_perdin->id }}')">
										Laporan Bendahara
									</a>
									<a class="modal-effect btn btn-secondary btn-sm" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#rincian-sppd-{{ $kwitansi_perdin->id }}" onclick="loadContent('{{ route('rincian-sppd-pdf', $kwitansi_perdin->id) }}', 'rincian_sppd-iframe-{{ $kwitansi_perdin->id }}')">
										Rincian SPPD
									</a>
									<a class="modal-effect btn btn-secondary btn-sm" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#sptjb-{{ $kwitansi_perdin->id }}" onclick="loadContent('{{ route('sptjb-pdf', $kwitansi_perdin->id) }}', 'sptjb-iframe-{{ $kwitansi_perdin->id }}')">
										SPTJB
									</a>
									@else
									<button class="not-bayar btn btn-danger btn-sm">Laporan Bendahara</button>
									<button class="not-bayar btn btn-danger btn-sm">Rincian SPPD</button>
									<button class="not-bayar btn btn-danger btn-sm">SPTJB</button>
									@endif
								</td>
								<td>{{ $kwitansi_perdin->data_perdin->pegawai_diperintah->nama }}</td>
								<td>{{ $kwitansi_perdin->data_perdin->maksud }}</td>
								<td>{{ $kwitansi_perdin->data_perdin->tgl_berangkat }}</td>
								@if ($kwitansi_perdin->data_perdin->status->kwitansi)
								@include('dashboard.perdin.status-perdin.lap_bendahara')
								@include('dashboard.perdin.status-perdin.rincian_sppd')
								@include('dashboard.perdin.status-perdin.sptjb')
								@endif
							</tr>
							@endforeach
						</tbody>
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

<script>
	$('.not-bayar').click(function(e) {
		Swal.fire({
			title: 'Belum bayar',
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

<!-- P-scroll js -->
<script src="/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/assets/plugins/perfect-scrollbar/p-scroll.js"></script>

<!-- Internal Select2.min js -->
<script src="/assets/plugins/select2/js/select2.min.js"></script>

<!-- DATA TABLE JS-->
<script src="/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
<script src="/assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
<script src="/assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
<script src="/assets/plugins/datatable/js/jszip.min.js"></script>
<script src="/assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
<script src="/assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
<script src="/assets/plugins/datatable/js/buttons.html5.min.js"></script>
<script src="/assets/plugins/datatable/js/buttons.print.min.js"></script>
<script src="/assets/plugins/datatable/js/buttons.colVis.min.js"></script>
<script src="/assets/plugins/datatable/dataTables.responsive.min.js"></script>
<script src="/assets/plugins/datatable/responsive.bootstrap5.min.js"></script>

<!--Internal  Datatable js -->
<script src="/assets/js/table-data.js"></script>

<!-- Rating js-->
<script src="/assets/plugins/ratings-2/jquery.star-rating.js"></script>
<script src="/assets/plugins/ratings-2/star-rating.js"></script>

<!-- Sidebar js -->
<script src="/assets/plugins/side-menu/sidemenu.js"></script>

<!-- Right-sidebar js -->
<script src="/assets/plugins/sidebar/sidebar.js"></script>
<script src="/assets/plugins/sidebar/sidebar-custom.js"></script>

<!-- Sticky js -->
<script src="/assets/js/sticky.js"></script>

<!-- eva-icons js -->
<script src="/assets/js/eva-icons.min.js"></script>

<!--themecolor js-->
<script src="/assets/js/themecolor.js"></script>

<!-- custom js -->
<script src="/assets/js/custom.js"></script>

@endsection