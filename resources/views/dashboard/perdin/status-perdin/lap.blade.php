<div class="modal fade" id="lap-{{ $data_perdin->laporan_perdin_id ?? $laporan_perdin->id }}">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content modal-content-demo">
			<div class="modal-header">
				<h6 class="modal-title">Laporan (ID.Reg : {{ $data_perdin->id ?? $laporan_perdin->id }})</h6>
				<button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				@if ($laporan_perdin->data_perdin->status->approve)
				<iframe id="lap-iframe-{{ $laporan_perdin->id }}" width="100%" height="500px"></iframe>
				@endif
			</div>
		</div>
	</div>
</div>
