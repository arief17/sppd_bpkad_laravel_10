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
								<th class="border-bottom-0">Surat Dari</th>
								<th class="border-bottom-0">Tanggal Surat</th>
								<th class="border-bottom-0">Maksud</th>
								<th class="border-bottom-0">Petugas</th>
								<th class="border-bottom-0">Tanggal Berangkat</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($laporan_perdins as $laporan_perdin)
							<tr class="text-center">
								<td>{{ $loop->iteration }}</td>
								<td class="text-nowrap">
									@if ($laporan_perdin->data_perdin->status->lap)
										@if ($laporan_perdin->file_laporan && file_exists(storage_path('app/' . $laporan_perdin->file_laporan)))
											<a class="modal-effect btn btn-secondary btn-sm" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#lap-input-{{ $laporan_perdin->id }}" onclick="loadContent('data:application/pdf;base64,{{ base64_encode(file_get_contents(storage_path('app/' . $laporan_perdin->file_laporan))) }}', 'lap_input-iframe-{{ $laporan_perdin->id }}')">
												Laporan yang diinput
											</a>
										@else
											<button class="not-laporan btn btn-danger btn-sm">Laporan yang diinput</button>
										@endif

										<a class="modal-effect btn btn-secondary btn-sm" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#lap-{{ $laporan_perdin->id }}" onclick="loadContent('{{ route('lap-pdf', $laporan_perdin->id) }}', 'lap_cetak-iframe-{{ $laporan_perdin->id }}')">
											Laporan perdin
										</a>
									@else
										<button class="not-laporan btn btn-danger btn-sm">Laporan yang diinput</button>
										<button class="not-laporan btn btn-danger btn-sm">Laporan perdin</button>
									@endif
								</td>
								<td>{{ $laporan_perdin->data_perdin->surat_dari ?? '' }}</td>
								<td>{{ $laporan_perdin->data_perdin->tgl_surat ?? '' }}</td>
								<td>{{ $laporan_perdin->data_perdin->maksud }}</td>
								<td>{{ $laporan_perdin->data_perdin->pegawai_diperintah->nama }}</td>
								<td>{{ $laporan_perdin->data_perdin->tgl_berangkat }}</td>

								@if ($laporan_perdin->data_perdin->status->lap)
									@include('dashboard.perdin.status-perdin.lap_cetak')
									@if ($laporan_perdin->file_laporan)
										@include('dashboard.perdin.status-perdin.lap_input')
									@endif
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
	$('.not-laporan').click(function(e) {
		Swal.fire({
			title: 'Belum ada laporan',
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