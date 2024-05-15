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
                                <label for="id_jenis_dosen">Jenis Dosen</label>
                                <select name="id_jenis_dosen" id="id_jenis_dosen" class="select2 form-control"
                                    data-allow-clear="true">
                                    <option value="">Pilih Jenis Dosen</option>

                                    @foreach ($dataJenisDosen as $item)
                                    <option value="{{ $item['id'] }}" {{ $judulForm=='Tambah' ? '' :
                                        ($data['JenisDosen']['id']==$item['id'] ? 'selected' : '' ) }}>
                                        {{ $item['nama_jenis'] }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <input type="hidden" name="id" id="id"
                                value="{{ $judulForm == 'Tambah' ? '' : $data->id }}">
                            <div class="form-group mb-3">
                                <label for="nama_dosen">Nama Dosen</label>
                                <input type="text" class="form-control" id="nama_dosen" placeholder="Nama Dosen"
                                    name="nama_dosen" value="{{ $judulForm == 'Tambah' ? '' : $data->nama_dosen }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="jabatan">Jabatan Dosen</label>
                                <input type="text" class="form-control" id="jabatan" placeholder="Jabatan Dosen"
                                    name="jabatan" value="{{ $judulForm == 'Tambah' ? '' : $data->jabatan }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="fb">Facebook</label>
                                <input type="text" class="form-control" id="fb" placeholder="Facebook" name="fb"
                                    value="{{ $judulForm == 'Tambah' ? '' : $data->fb }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="twitter">Twitter</label>
                                <input type="text" class="form-control" id="twitter" placeholder="Twitter"
                                    name="twitter" value="{{ $judulForm == 'Tambah' ? '' : $data->twitter }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="ig">Instagram</label>
                                <input type="text" class="form-control" id="ig" placeholder="Instagram" name="ig"
                                    value="{{ $judulForm == 'Tambah' ? '' : $data->ig }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label>File upload</label>
                                <input type="file" id="file" name="file" class="form-control-file">
                                {{-- isset page_name == edit, tampilkan gambarnya --}}
                                @if (isset($judulForm) && $judulForm == 'Edit')
                                <img src="{{ isset($data->foto_dosen) ? asset($data->foto_dosen) : '' }}" class="img-thumbnail mt-2"
                                    width="50%">
                                @endif
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
