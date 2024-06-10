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
                        <label for="Kategori">Angkatan</label>
                        <select name="angkatan" id="angkatan" class="select2 form-control" data-allow-clear="true"
                            required>
                            <option value="">Pilih Angkatan</option>
                            @foreach ($dataAngkatan as $item)
                            <option value="{{ $item['id'] }}" {{ $judulForm=='Tambah' ? '' :
                                ($data['Angkatan']['id']==$item['id'] ? 'selected' : '' ) }}>
                                {{ $item['angkatan'] }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="Kategori">Kategori</label>
                        <select class="form-control" name="kategori" id="kategori" required>
                            <option value="" {{ empty($data) ? 'selected' : '' }}>Pilih</option>
                            <option value="1" {{ (!empty($data) && isset($data['kategori']) && $data['kategori']==1)
                                ? 'selected' : '' }}>Laporan Tugas Akhir</option>
                            <option value="2" {{ (!empty($data) && isset($data['kategori']) && $data['kategori']==2)
                                ? 'selected' : '' }}>Laporan OJT</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="Nama">Nama</label>
                        <input type="text" class="form-control" id="namas" placeholder="Nama" name="nama"
                            value="{{ $judulForm == 'Tambah' ? '' : $data->nama }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="judul">Judul</label>
                        <textarea class="form-control" id="judul" name="judul" rows="5" placeholder="Judul Artikel"
                            required>{{ $judulForm == 'Tambah' ? '' : $data->judul }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="judul">Tahun</label>
                        <input type="text" class="form-control" id="year" placeholder="Nama" name="year"
                            value="{{ $judulForm == 'Tambah' ? '' : $data->tahun }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>File upload</label>
                        <input type="file" id="file" name="file" class="form-control-file">
                        <div class="form-control mt-3">@if (isset($judulForm) && $judulForm == 'Edit')
                            {{ $data->file }}
                            @endif
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
{{-- <script>
    const yearDropdown = document.getElementById('year');
    const currentYear = new Date().getFullYear();
    for (let year = 2000; year <= currentYear; year++) {
        const option = document.createElement('option');
        option.value = year;
        option.text = year;
        yearDropdown.add(option);
    }

    const selectedYear = "{{ $data->tahun ?? '' }}";
    if (selectedYear !== '') {
        yearDropdown.value = selectedYear;
    }
</script> --}}
@endsection
