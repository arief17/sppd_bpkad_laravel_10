@extends('layouts.main')

@section('container')

<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card box-shadow-0 ">
            <div class="card-header">
                @if(session()->has('failedSave'))
                <div class="alert alert-danger mg-b-0 mb-5" role="alert">
                    <button aria-label="Close" class="close" data-bs-dismiss="alert" type="button">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Peringatan!</strong> <br>
                    {{ session('failedSave') }}
                </div>
                @endif
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mb-1">{{ $title }}</h4>
                    <a class="btn btn-secondary btn-sm" href="{{ route('data-perdin.index', 'baru') }}">
                        <i class="fa fa-reply"></i>
                    </a>
                </div>
            </div>
            <div class="card-body pt-0">
                <form action="{{ route('data-perdin.update', $data_perdin->slug) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="row row-sm">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="surat_dari">Surat Dari</label>
                                <input name="surat_dari" value="{{ old('surat_dari', $data_perdin->surat_dari) }}" type="text" class="form-control @error('surat_dari') is-invalid @enderror" id="surat_dari" placeholder="Masukan surat_dari">
                                @error('surat_dari')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nomor_surat">Nomor Surat</label>
                                <input name="nomor_surat" value="{{ old('nomor_surat', $data_perdin->nomor_surat) }}" type="text" class="form-control @error('nomor_surat') is-invalid @enderror" id="nomor_surat" placeholder="Masukan nomor_surat">
                                @error('nomor_surat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="tgl_surat">Tanggal Surat</label>
                                <input name="tgl_surat" value="{{ old('tgl_surat', $data_perdin->tgl_surat) }}" type="date" class="form-control @error('tgl_surat') is-invalid @enderror" id="tgl_surat" placeholder="Masukan tgl_surat">
                                @error('tgl_surat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="perihal">Perihal</label>
                        <textarea name="perihal" class="form-control @error('perihal') is-invalid @enderror" id="perihal" placeholder="Masukan perihal" rows="3">{{ old('perihal', $data_perdin->perihal) }}</textarea>
                        @error('perihal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <hr style="border-top: 3px solid black" class="my-4">

                    <div class="row row-sm">
						<div class="col-sm-4">
							<div class="form-group">
								<label for="tanda_tangan_id" class="form-label">Pejabat yang memberi perintah <span class="text-danger">*</span></label>
								<select name="tanda_tangan_id" id="tanda_tangan_id" class="form-control form-select select2 @error('tanda_tangan_id') is-invalid @enderror">
									<option value="">Pilih Pejabat</option>
									@foreach ($ttd_pemberi_perintahs as $ttd_pemberi_perintah)
									<option value="{{ $ttd_pemberi_perintah->id }}" @selected(old('ttd_pemberi_perintah_id', $data_perdin->tanda_tangan_id) == $ttd_pemberi_perintah->id)>
										{{ $ttd_pemberi_perintah->pegawai->jabatan->nama }}
									</option>
									@endforeach
								</select>
								@error('tanda_tangan_id')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="pptk_id" class="form-label">PPTK <span class="text-danger">*</span></label>
								<select name="pptk_id" id="pptk_id" class="form-control form-select select2 @error('pptk_id') is-invalid @enderror">
									<option value="">Pilih PPTK</option>
									@foreach ($ttd_pptks as $ttd_pptk)
									<option value="{{ $ttd_pptk->id }}" @selected(old('ttd_pptk_id', $data_perdin->pptk_id) == $ttd_pptk->id)>
										{{ $ttd_pptk->pegawai->nama }}
									</option>
									@endforeach
								</select>
								@error('pptk_id')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>
                        <div class="col-sm-4">
							<div class="form-group">
								<label for="pa_kpa_id" class="form-label">KPA/PA <span class="text-danger">*</span></label>
								<select name="pa_kpa_id" id="pa_kpa_id" class="form-control form-select select2 @error('pa_kpa_id') is-invalid @enderror">
									<option value="">Pilih KPA/PA</option>
									@foreach ($ttd_pa_kpas as $ttd_pa_kpa)
									<option value="{{ $ttd_pa_kpa->id }}" @selected(old('pa_kpa_id', $data_perdin->pa_kpa_id) == $ttd_pa_kpa->id)>
										{{ $ttd_pa_kpa->pegawai->nama }} | {{ $ttd_pa_kpa->jenis_ttd_f }}
									</option>
									@endforeach
								</select>
								@error('pa_kpa_id')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>
					</div>
                    <div class="form-group">
                        <label for="maksud">Maksud Perjalanan Dinas</label>
                        <textarea name="maksud" class="form-control @error('maksud') is-invalid @enderror" id="maksud" placeholder="Masukan maksud" rows="3">{{ old('maksud', $data_perdin->maksud) }}</textarea>
                        @error('maksud')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="row row-sm">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="lama" class="form-label">Lamanya Perjalanan Dinas</label>
                                <select name="lama" id="lama" class="form-control form-select select2 @error('lama') is-invalid @enderror">
                                    <option value="">Pilih Lama Hari</option>
                                    @foreach ($lamas as $lama)
                                    <option value="{{ $lama->lama_hari }}" @selected(old('lama', $data_perdin->lama) == $lama->lama_hari)>
                                        {{ $lama->lama_hari }} hari
                                    </option>
                                    @endforeach
                                </select>
                                @error('lama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="tgl_berangkat">Tanggal Berangkat</label>
                                <input name="tgl_berangkat" value="{{ old('tgl_berangkat', $data_perdin->tgl_berangkat) }}" type="date" class="form-control @error('tgl_berangkat') is-invalid @enderror" id="tgl_berangkat" placeholder="Masukan tgl_berangkat">
                                @error('tgl_berangkat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="tgl_kembali">Tanggal Kembali</label>
                                <input readonly name="tgl_kembali" value="{{ old('tgl_kembali', $data_perdin->tgl_kembali) }}" type="date" class="form-control @error('tgl_kembali') is-invalid @enderror" id="tgl_kembali" placeholder="Masukan tgl_kembali">
                                @error('tgl_kembali')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="alat_angkut_id" class="form-label">Alat Angkut</label>
                                <select name="alat_angkut_id" id="alat_angkut_id" class="form-control form-select select2 @error('alat_angkut_id') is-invalid @enderror">
                                    <option value="">Pilih Alat Angkut</option>
                                    @foreach ($alat_angkuts as $alat_angkut)
                                    <option value="{{ $alat_angkut->id }}" @selected(old('alat_angkut_id', $data_perdin->alat_angkut_id) == $alat_angkut->id)>
                                        {{ $alat_angkut->nama }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('alat_angkut_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="kedudukan" class="form-label">Tempat Kedudukan</label>
                                <select name="kedudukan" id="kedudukan" class="form-control form-select @error('kedudukan') is-invalid @enderror" disabled>
                                    <option value="Kota Serang">Kota Serang</option>
                                </select>
                                @error('kedudukan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="jenis_perdin_id" class="form-label">Jenis Perdin</label>
                                <select name="jenis_perdin_id" id="jenis_perdin_id" class="form-control form-select @error('jenis_perdin_id') is-invalid @enderror">
                                    <option value="">Pilih Jenis Perdin</option>
                                    @foreach ($jenis_perdins as $jenis_perdin)
                                    <option value="{{ $jenis_perdin->id }}" @selected(old('jenis_perdin_id', $data_perdin->jenis_perdin_id) == $jenis_perdin->id)>
                                        {{ $jenis_perdin->nama }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('jenis_perdin_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="tujuan_id" class="form-label">Tujuan</label>
                                <select name="tujuan_id" id="tujuan_id" class="form-control form-select select2 @error('tujuan_id') is-invalid @enderror">
                                    <option value="">Pilih Tujuan</option>
                                    @foreach ($data_perdin->jenis_perdin->wilayahs as $tujuan)
                                    <option value="{{ $tujuan->id }}" @selected(old('tujuan_id', $data_perdin->tujuan_id) == $tujuan->id)>
                                        {{ $tujuan->nama }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('tujuan_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="kabupaten_id" class="form-label">Kabupaten <span class="text-danger">*</span></label>
								<select name="kabupaten_id" id="kabupaten_id" class="form-control form-select select2 @error('kabupaten_id') is-invalid @enderror">
									<option value="">Pilih Kabupaten</option>
                                    @foreach ($data_perdin->tujuan->kabupatens as $kabupaten)
                                    <option value="{{ $kabupaten->id }}" @selected(old('kabupaten_id', $data_perdin->kabupaten_id) == $kabupaten->id)>
                                        {{ $kabupaten->nama }}
                                    </option>
                                    @endforeach
								</select>
								@error('kabupaten_id')
								<div class="invalid-feedback">
                                    {{ $message }}
								</div>
								@enderror
							</div>
						</div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="tujuan_lain_id" class="form-label">Tujuan Lain</label>
                                <select name="tujuan_lain_id" id="tujuan_lain_id" class="form-control form-select select2 @error('tujuan_lain_id') is-invalid @enderror">
                                    <option value="">Pilih Tujuan Lain</option>
                                    @foreach ($data_perdin->jenis_perdin->wilayahs as $tujuan)
                                    <option value="{{ $tujuan->id }}" @selected(old('tujuan_lain_id', $data_perdin->tujuan_lain_id) == $tujuan->id)>
                                        {{ $tujuan->nama }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('tujuan_lain_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
							<div class="form-group">
								<label for="kabupaten_lain_id" class="form-label">Kabupaten Lain <span class="text-danger">*</span></label>
								<select name="kabupaten_lain_id" id="kabupaten_lain_id" class="form-control form-select select2 @error('kabupaten_lain_id') is-invalid @enderror">
									<option value="">Pilih Kabupaten Lain</option>
                                    @foreach ($data_perdin->tujuan->kabupatens as $kabupaten)
                                    <option value="{{ $kabupaten->id }}" @selected(old('kabupaten_lain_id', $data_perdin->kabupaten_lain_id) == $kabupaten->id)>
                                        {{ $kabupaten->nama }}
                                    </option>
                                    @endforeach
								</select>
								@error('kabupaten_lain_id')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>
                    </div>

                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <textarea name="lokasi" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" placeholder="Masukan lokasi" rows="3">{{ old('lokasi', $data_perdin->lokasi) }}</textarea>
                        @error('lokasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="pegawai_diperintah_id" class="form-label">Pegawai Yang Diperintahkan</label>
                                <select name="pegawai_diperintah_id" id="pegawai_diperintah_id" class="form-control form-select select2 @error('pegawai_diperintah_id') is-invalid @enderror" disabled>
                                    <option value="">Pilih Pegawai Yang Diperintahkan</option>
                                    @foreach ($pegawais as $pegawai)
                                    <option value="{{ $pegawai->id }}" @selected(old('pegawai_diperintah_id', $data_perdin->pegawai_diperintah_id) == $pegawai->id)>
                                        {{ $pegawai->nama }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('pegawai_diperintah_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="pegawai_mengikuti_id" class="form-label">Pegawai Yang Mengikuti</label>
                                <select name="pegawai" id="pegawai_mengikuti_id" class="form-control form-select select2 @error('pegawai_mengikuti_id') is-invalid @enderror" disabled>
                                    <option value="">Pilih Pegawai Yang Mengikuti</option>
                                    @foreach ($pegawais as $pegawai)
                                    <option value="{{ $pegawai->id }}">{{ $pegawai->nama }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="pegawai_mengikuti_id" id="selected_pegawais">

                                @error('pegawai_mengikuti_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="table-responsive">
                        <table class="table mg-b-0 text-md-nowrap">
                            <thead>
                                <tr>
                                    <th style="width: 1%">No</th>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Jabatan</th>
                                    <th>Uang Harian</th>
                                    <th>Keterangan</th>
                                    <th style="width: 1%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="pegawai-list"></tbody>
                            <tfoot id="pegawai-total"></tfoot>
                        </table>
                    </div>
                    <hr>

                    <hr>

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

<script>
    var selected_pegawai = @json($selected_pegawai);
</script>

<!-- Data Perdin -->
<script src="/assets/js/data-perdin.js"></script>

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