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
                                <label for="angkatan">Angkatan</label>
                                <select name="angkatan" id="angkatan" class="select2 form-control" required
                                    data-allow-clear="true">
                                    <option value="">Pilih Angkatan</option>
                                    @foreach ($dataAngkatan as $item)
                                    <option value="{{ $item['id'] }}" {{ $judulForm=='Tambah' ? '' :
                                        ($data['angkatan']['angkatan']==$item['angkatan'] ? 'selected' : '' ) }}>
                                        {{ $item['angkatan'] }}
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
                                    name="kegiatan" value="{{ $judulForm == 'Tambah' ? '' : $data->kegiatan }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="tgl_jadwal_awal">Tanggal Awal</label>
                                <input type="date" class="form-control" id="tgl_jadwal_awal" placeholder="Tanggal Awal"
                                    name="tgl_jadwal_awal"
                                    value="{{ $judulForm == 'Tambah' ? '' : $data->tgl_jadwal_awal }}" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="tgl_jadwal_akhir">Tanggal Akhir</label>
                                <input type="date" class="form-control" id="tgl_jadwal_akhir"
                                    placeholder="Tanggal Akhir" name="tgl_jadwal_akhir"
                                    value="{{ $judulForm == 'Tambah' ? '' : $data->tgl_jadwal_akhir }}" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="Ganjul atau Genap">Semester Ganjil atau Genap</label>
                                <select name="ganjil_genap" id="ganjil_genap" class="select2 form-control"
                                    data-allow-clear="true" required>
                                    <option value="">Pilih</option>
                                    <option value="1" {{ isset($data['ganjil_genap']) && $data['ganjil_genap']==1
                                        ? 'selected' : '' }}>Ganjil</option>
                                    <option value="2" {{ isset($data['ganjil_genap']) && $data['ganjil_genap']==2
                                        ? 'selected' : '' }}>Genap</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="catatan">Semester</label>
                                <select name="semester" id="semester" class="select2 form-control"
                                    data-allow-clear="true" required>
                                    <option value="">Pilih</option>
                                    @foreach ($semester as $item)
                                    <option value="{{ $item['id'] }}" {{ $judulForm=='Tambah' ? '' : ($item['id']
                                        ? 'selected' : '' ) }}>
                                        {{ $item['semester'] }}
                                    </option>
                                    @endforeach
                                </select>
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
