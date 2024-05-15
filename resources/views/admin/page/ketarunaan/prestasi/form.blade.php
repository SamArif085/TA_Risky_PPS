<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h4 class="font-weight-bold mb-0">{{ $subtitle }}</h4>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form {{ $judulForm }}</h4>
                <form class="forms-sample"
                    action="{{ $judulForm == 'Tambah' ? route($routeName . '.submit') : route($routeName . '.submit', $data->id) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="id_master_akademik">Akademik</label>
                                <select name="id_master_akademik" id="id_master_akademik" class="select2 form-control"
                                    data-allow-clear="true">
                                    <option value="">Pilih akademik</option>

                                    @foreach ($dataAkademik as $item)
                                    <option value="{{ $item['id'] }}" {{ $judulForm=='Tambah' ? '' :
                                        ($data['MasterAkademik']['id']==$item['id'] ? 'selected' : '' ) }}>
                                        {{ $item['nama'] }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <input type="hidden" name="id" id="id"
                                value="{{ $judulForm == 'Tambah' ? '' : $data->id }}">
                            <div class="form-group mb-3">
                                <label for="kegiatan">Kegiatan</label>
                                <input type="text" class="form-control" id="kegiatan" placeholder="Kegiatan"
                                    name="kegiatan" value="{{ $judulForm == 'Tambah' ? '' : $data->kegiatan }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="waktu_perolehan">Waktu Perolahan</label>
                                <input type="date" class="form-control" id="waktu_perolehan"
                                    placeholder="Waktu Perolahan" name="waktu_perolehan"
                                    value="{{ $judulForm == 'Tambah' ? '' : $data->waktu_perolehan }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="perstasi_yg_dicapai">Prestasi yang dicapai</label>
                                <input type="text" class="form-control" id="perstasi_yg_dicapai"
                                    placeholder="Prestasi yang dicapai" name="perstasi_yg_dicapai"
                                    value="{{ $judulForm == 'Tambah' ? '' : $data->perstasi_yg_dicapai }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="col-sm-auto col-form-label">Tingkat Prestasi</label>
                            <div class="form-group row">
                                <div class="col-sm-auto">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="prestasi" id="prestasi"
                                                value="lokal" {{ $judulForm=='Tambah' ? '' : ($data['lokal']==1
                                                ? 'checked' : '' ) }}>
                                            Lokal
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="prestasi" id="prestasi"
                                                value="nasional" {{ $judulForm=='Tambah' ? '' : ($data['nasional']==1
                                                ? 'checked' : '' ) }}>
                                            Nasional
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="prestasi" id="prestasi"
                                                value="internasional" {{ $judulForm=='Tambah' ? '' :
                                                ($data['internasional']==1 ? 'checked' : '' ) }}>
                                            Internasional
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route($routeName . '') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

@section('script')
@endsection
