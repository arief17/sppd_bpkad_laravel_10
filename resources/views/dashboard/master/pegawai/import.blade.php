<div class="modal fade" id="pegawai-import">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Import Pegawai Excel</h6>
                <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('pegawai.import') }}" method="post" enctype="multipart/form-data" class="d-inline">
                <div class="modal-body">
                    @csrf

                    <input name="pegawai_import_file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" class="form-control @error('pegawai_import_file') is-invalid @enderror" type="file" id="pegawai_import_file" required>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-success" type="submit">Simpan</button>
                    <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
