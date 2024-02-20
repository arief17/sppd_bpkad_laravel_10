@extends('layouts.main')

@section('container')

<!-- row -->
<div class="row row-sm">
	@foreach($totals as $total)
	<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
		<div class="card overflow-hidden sales-card {{$total['class']}}">
			<div class="px-3 pt-3 pb-2">
				<div class="">
					<h6 class="mb-3 tx-12 text-white">{{ $total['title'] }}</h6>
				</div>
				<div class="pb-0 mt-0">
					<div class="d-flex">
						<div class="">
							<h4 class="tx-20 fw-bold mb-1 text-white">{{ $total['total'] }}</h4>
							<p class="mb-0 tx-12 text-white op-7">Dibandingkan bulan lalu</p>
						</div>
						<span class="float-end my-auto ms-auto">
							<i class="fas fa-arrow-circle-up text-white"></i>
							<span class="text-white op-7"> +{{ $total['difference'] }}</span>
						</span>
					</div>
				</div>
			</div>
			<span id="{{ $total['chart_id'] }}" class="pt-1">{{ implode(',', $total['chart_data']) }}</span>
		</div>
	</div>
	@endforeach

	<div class="col-12">
		<div class="card mg-b-20">
			<div class="card-body">
				<div class="main-content-label mg-b-5">
					Jumlah Perjalanan Dinas
				</div>
				<p class="mg-b-20">Jumlah Perjalanan dinas masing-masing bidang.</p>
				<div class="morris-wrapper-demo" id="morrisBar2"></div>
			</div>
		</div>
	</div>
</div>
<!-- row closed -->

@endsection

@section('js')
<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

<!-- JQuery min js -->
<script src="/assets/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Bundle js -->
<script src="/assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!--Internal  Morris js -->
<script src="/assets/plugins/raphael/raphael.min.js"></script>
<script src="/assets/plugins/morris.js/morris.min.js"></script>

<!--Internal Chart Morris js -->
<script>
	$(function() {
		'use strict';

		new Morris.Bar({
			element: 'morrisBar2',
			data: {!! $morrisData !!},
			xkey: 'bidang',
			ykeys: ['perdin'],
			labels: ['Jumlah Perdin'],
			barColors: ['#6D6EF3'],
			gridTextSize: 11,
			hideHover: 'auto',
			resize: true,
			redraw: true,
			xLabelAngle: 50,
		});
	});
</script>

<!--Internal  Chart.bundle js -->
<script src="/assets/plugins/chart.js/Chart.bundle.min.js"></script>

<!-- Moment js -->
<script src="/assets/plugins/moment/moment.js"></script>

<!--Internal Sparkline js -->
<script src="/assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

<!--Internal  Perfect-scrollbar js -->
<script src="/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/assets/plugins/perfect-scrollbar/p-scroll.js"></script>

<!-- Eva-icons js -->
<script src="/assets/js/eva-icons.min.js"></script>

<!-- Sticky js -->
<script src="/assets/js/sticky.js"></script>
<script src="/assets/js/modal-popup.js"></script>

<!-- Left-menu js-->
<script src="/assets/plugins/side-menu/sidemenu.js"></script>

<!--Internal  index js -->
<script src="/assets/js/index.js"></script>

<!--themecolor js-->
<script src="/assets/js/themecolor.js"></script>

<!-- custom js -->
<script src="/assets/js/custom.js"></script>
@endsection