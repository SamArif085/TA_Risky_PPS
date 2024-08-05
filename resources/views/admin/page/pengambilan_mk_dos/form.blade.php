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
                        <label for="Angkatan">Dosen Pengajar</label>
                        <select class="form-control" name="id_user" id="id_user">
                            <option value="">Pilih Dosen</option>
                            @foreach ($dosen as $item)
                            <option value="{{ $item['id'] }}" {{ $judulForm=='Tambah' ? '' : ($data->id_user ==
                                $item['id']? 'selected' : '' ) }}>
                                {{ $item['nama_lengkap'] }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="Semester">Mata Kuliah</label>
                        <select class="form-control" name="kode_matkul" id="kode_matkul">
                            <option value="">Pilih Mata Kuliah</option>
                            @foreach ($matakuliah as $item)
                            <option value="{{ $item['id'] }}" {{ $judulForm=='Tambah' ? '' : ($data->kode_matkul ==
                                $item['id']? 'selected' : '' ) }}>
                                {{ $item['kode'] }} - {{ $item['mata_kuliah'] }}
                            </option>
                            @endforeach
                        </select>
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
