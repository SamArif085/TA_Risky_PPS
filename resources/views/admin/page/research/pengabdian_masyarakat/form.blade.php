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
                <form class="forms-sample" action="{{ route($routeName . '.submit') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{ $judulForm == 'Tambah' ? '' : $data->id }}">
                    <div class="form-group mb-3">
                        <label for="Tahun Kegiatan">Tahun Kegiatan</label>
                        <select name="id_tahun_kegiatan" id="id_tahun_kegiatan" class="select2 form-control"
                            data-allow-clear="true">
                            <option value="">Pilih Tahun</option>
                            @foreach ($tahun as $item)
                            <option value="{{ $item['id'] }}" {{ $judulForm=='Tambah' ? '' : ($data->id_tahun_kegiatan
                                == $item['id'] ? 'selected' : '' ) }}>
                                {{ $item['tahun'] }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama"
                            value="{{ $judulForm == 'Tambah' ? '' : $data->nama }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="rincian_kegiatan">Rincian Kegiatan</label>
                        <textarea class="form-control" id="rincian_kegiatan" name="rincian_kegiatan" rows="5"
                            placeholder="Rincian Kegiatan"
                            required>{{ $judulForm == 'Tambah' ? '' : $data->rincian_kegiatan }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label>File upload</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file" name="file[]" multiple>
                            <label class="custom-file-label" for="file">Choose files</label>
                        </div>
                        @if (isset($judulForm) && $judulForm == 'Edit')
                        @if (isset($data->Foto) && count($data->Foto) > 0)

                        <div class="row">
                            @foreach ($data->Foto as $image)
                            <div class="col-6 mt-2 d-flex">
                                <img src="{{ asset($image->gambar) }}" class="img-thumbnail" width="50%">
                                <div class="form-check form-check-danger">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="delete_images[]"
                                            value="{{ $image->id }}">
                                        Delete
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route($routeName) }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        bsCustomFileInput.init();

        $('#file').on('change', function() {
            var fileInput = document.getElementById('file');
            var label = fileInput.nextElementSibling;
            var fileNames = [];

            for (var i = 0; i < fileInput.files.length; i++) {
                fileNames.push(fileInput.files[i].name);
            }

            label.innerHTML = fileNames.join(', ');
        });
    });
</script>
@endsection
