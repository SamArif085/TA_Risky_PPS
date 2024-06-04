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
                        <label for="Judul Kegiatan">Judul Kegiatan</label>
                        <input type="text" class="form-control" id="nama" placeholder="Judul Kegiatan" name="nama"
                            value="{{ $judulForm == 'Tambah' ? '' : $data->nama }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>File upload</label>
                        <input type="file" id="file" name="file" class="form-control-file">
                        @if (isset($judulForm) && $judulForm == 'Edit')
                        <img src="{{ isset($data->foto) ? asset($data->foto) : '' }}" class="img-thumbnail mt-2"
                            width="50%">
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
