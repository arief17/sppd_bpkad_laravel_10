<div class="modal fade" id="visum2-{{ $data_perdin->slug }}">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content modal-content-demo">
			<div class="modal-header">
				<h6 class="modal-title">Surat Perintah Tugas (ID.Reg : {{ $data_perdin->id }})</h6>
				<button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<iframe id="visum2-iframe-{{ $data_perdin->slug }}" width="100%" height="500px"></iframe>
			</div>
			<div class="modal-footer">
				<button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
			</div>
		</div>
	</div>
</div>
