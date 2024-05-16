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
                                <label for="id_angkatan">Angkatan</label>
                                <select name="id_angkatan" id="id_angkatan" class="select2 form-control"
                                    data-allow-clear="true">
                                    <option value="">Pilih Angkatan</option>

                                    @foreach ($dataAngkatan as $item)
                                    <option value="{{ $item['id'] }}" {{ $judulForm=='Tambah' ? '' :
                                        ($data['Angkatan']['id']==$item['id'] ? 'selected' : '' ) }}>
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
                                <label>File upload</label>
                                <input type="file" id="file" name="file" class="form-control-file">
                                {{-- isset page_name == edit, tampilkan gambarnya --}}
                                @if (isset($judulForm) && $judulForm == 'Edit')
                                <img src="{{ isset($data->file) ? asset($data->file) : '' }}" class="img-thumbnail mt-2"
                                    width="50%">
                                @endif
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
