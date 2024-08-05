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
                    <input type="hidden" name="id" id="id" value="{{ $judulForm == 'Tambah' ? '' : $data->id }}">
                    <div class="form-group mb-3">
                        <label for="Nama Dosen">Nama Dosen</label>
                        <input type="text" class="form-control" id="nama_dosen" placeholder="Nama Dosen"
                            name="nama_dosen" value="{{ $judulForm == 'Tambah' ? '' : $data->nama_dosen }}">
                    </div>
                    @if ($judulForm == 'Tambah')
                    <div class="form-group mb-3">
                        <label for="NIP Dosen">NIP Dosen</label>
                        <input type="text" class="form-control" id="no_induk" placeholder="NIP Dosen" name="no_induk"
                            value="{{ $judulForm == 'Tambah' ? '' : $data->no_induk }}">
                    </div>
                    @endif
                    <div class="form-group mb-3">
                        <label for="Instagram">Jenis Dosen</label>
                        <select name="jenis_dosen" id="jenis_dosen" class="select2 form-control"
                            data-allow-clear="true">
                            <option value="">Pilih Jenis</option>
                            @foreach ($jenisDosen as $item)
                            <option value="{{ $item['id'] }}" {{ $judulForm=='Tambah' ? '' :
                                ($data['JenisDosen']['id']==$item['id'] ? 'selected' : '' ) }}>
                                {{ $item['nama_jenis'] }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="Jabatan">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" placeholder="jabatan" name="jabatan"
                            value="{{ $judulForm == 'Tambah' ? '' : $data->jabatan }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Facebook">Facebook</label>
                        <input type="text" class="form-control" id="fb" placeholder="Facebook" name="fb"
                            value="{{ $judulForm == 'Tambah' ? '' : $data->fb }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Twitter">Twitter</label>
                        <input type="text" class="form-control" id="twitter" placeholder="Twitter" name="twitter"
                            value="{{ $judulForm == 'Tambah' ? '' : $data->twitter }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Instagram">Instagram</label>
                        <input type="text" class="form-control" id="ig" placeholder="Instagram" name="ig"
                            value="{{ $judulForm == 'Tambah' ? '' : $data->ig }}">
                    </div>
                    <div class="form-group mb-3">
                        <label>File upload</label>
                        <input type="file" id="file" name="file" class="form-control-file">
                        @if (isset($judulForm) && $judulForm == 'Edit')
                        <img src="{{ isset($data->foto_dosen) ? asset($data->foto_dosen) : '' }}"
                            class="img-thumbnail mt-2" width="50%">
                        @endif
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
