<div class="modal fade" id="kwitansi-{{ $kwitansi_perdin->id }}">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content modal-content-demo">
			<div class="modal-header">
				<h6 class="modal-title">Kwitansi (ID.Reg : {{ $kwitansi_perdin->id }})</h6>
				<button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<iframe id="kwitansi-iframe-{{ $kwitansi_perdin->id }}" width="100%" height="500px"></iframe>
			</div>
		</div>
	</div>
</div>
