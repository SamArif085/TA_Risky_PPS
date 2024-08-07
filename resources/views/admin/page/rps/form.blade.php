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
                        <label for="nama">Nama RPS</label>
                        <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama"
                            value="{{ $judulForm == 'Tambah' ? '' : $data->nama }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="file">File RPS</label>
                        <input type="file" class="form-control-file" id="file" name="file">
                    </div>
                    <button type="submit" id="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
