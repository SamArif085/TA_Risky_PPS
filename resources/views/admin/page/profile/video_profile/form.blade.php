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
                    <input type="hidden" name="id" id="id"
                        value="{{ $judulForm == 'Tambah' ? '' : $data->id }}">
                    <div class="form-group mb-3">
                        <label for="judul_video">Judul</label>
                        <input type="text" class="form-control" id="judul_video" placeholder="Judul"
                            name="judul_video" value="{{ $judulForm == 'Tambah' ? '' : $data->judul_video }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="link_video">URL Video</label>
                        <input type="text" class="form-control" id="link_video" placeholder="URL Video"
                            name="link_video" value="{{ $judulForm == 'Tambah' ? '' : $data->link_video }}">
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
