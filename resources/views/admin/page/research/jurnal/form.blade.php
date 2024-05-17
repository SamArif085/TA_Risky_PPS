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
                        <label for="Kategori">Kategori</label>
                        <select name="kategori" id="kategori" class="select2 form-control" data-allow-clear="true">
                            <option value="">Pilih Kategori</option>
                            @foreach ($jenisJurnal as $item)
                            <option value="{{ $item['id'] }}" {{ $judulForm=='Tambah' ? '' : ($data->id_jenis_jurnal ==
                                $item['id'] ? 'selected' : '') }}>
                                {{ $item['nama'] }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="Nama Dosen">Nama Dosen</label>
                        <select name="id_dosen" id="id_dosen" class="select2 form-control" data-allow-clear="true">
                            <option value="">Pilih Dosen</option>
                            @foreach ($dosen as $item)
                            <option value="{{ $item['id'] }}" {{ $judulForm=='Tambah' ? '' : ($item['id'] ? 'selected'
                                : '' ) }}>
                                {{ $item['nama_dosen'] }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="judul">Judul Artikel yang Disitasi (Jurnal/Buku, Volume, Tahun, Nomor,
                            Halaman)</label>
                        <textarea class="form-control" id="judul" name="judul" rows="5" placeholder="Judul Artikel"
                            required>{{ $judulForm == 'Tambah' ? '' : $data->judul_jurnal }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="Link Jurnal">Link Jurnal</label>
                        <input type="text" class="form-control" id="link" placeholder="Link Jurnal" name="link"
                            value="{{ $judulForm == 'Tambah' ? '' : $data->link_jurnal }}">
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
