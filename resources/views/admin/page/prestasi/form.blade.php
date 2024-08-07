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
                            <input type="hidden" name="id" id="id"
                                value="{{ $judulForm == 'Tambah' ? '' : $data->id }}">
                            <input type="hidden" name="id_user" id="id_user" value="{{ Auth::user()->id }}">
                            <div class="form-group mb-3">
                                <label for="angkatan">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" readonly
                                    value="{{ Auth::user()->nama_lengkap }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="angkatan">Angkatan</label>
                                <input type="text" class="form-control" readonly value="{{ Auth::user()->angkatan }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="angkatan">NIT</label>
                                <input type="text" class="form-control" readonly value="{{ Auth::user()->no_induk }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="jenis_prestasi">Jenis Prestasi</label>
                                <select name="jenis_prestasi" id="jenis_prestasi" class="select2 form-control" required
                                    data-allow-clear="true">
                                    <option value="">Pilih</option>
                                    <option value="1">Akademik</option>
                                    <option value="2">Non Akademik</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="file">File Sertifikat</label>
                                    <input type="file" class="form-control-file" id="file" name="file" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="tingkat">Tingkat Lomba</label>
                                <select name="tingkat" id="tingkat" class="form-control" required>
                                    <option value="">Pilih tingkat</option>
                                    <option value="1">Kota</option>
                                    <option value="2">Provinsi</option>
                                    <option value="3">Nasional</option>
                                    <option value="4">Internasional</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="Nama Lomba">Nama Lomba</label>
                                <input type="text" class="form-control" placeholder="Nama Lomba" id="nama" name="nama"
                                    required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="Pelaksanaan Lomba">Pelaksanaan Lomba</label>
                                <input type="date" placeholder="Pelaksanaan Lomba" class="form-control" id="pelaksanaan"
                                    name="pelaksanaan" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="restasi yang dicapai">Prestasi yang dicapai</label>
                                <input type="text" placeholder="Prestasi yang dicapai" class="form-control" id="juara"
                                    name="juara" required>
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
