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
                                <label for="semester">Semester</label>
                                <select name="semester" id="semester" class="select2 form-control"
                                    data-allow-clear="true">
                                    <option value="">Pilih Semester</option>
                                    @foreach ($dataSemester as $item)
                                    <option value="{{ $item['id'] }}" {{ $judulForm=='Tambah' ? '' :
                                        ($data['semester']['semester']==$item['semester'] ? 'selected' : '' ) }}>
                                        {{ $item['semester'] }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <input type="hidden" name="id" id="id"
                                value="{{ $judulForm == 'Tambah' ? '' : $data->id }}">
                            <div class="form-group mb-3">
                                <label for="kode">Kode</label>
                                <input type="text" class="form-control" id="kode" placeholder="Kode" name="kode"
                                    value="{{ $judulForm == 'Tambah' ? '' : $data->kode }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="mata_kuliah">Mata Kuliah</label>
                                <input type="text" class="form-control" id="mata_kuliah" placeholder="Mata Kuliah"
                                    name="mata_kuliah" value="{{ $judulForm == 'Tambah' ? '' : $data->mata_kuliah }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="teori">Teori</label>
                                <input type="number" class="form-control" id="teori" placeholder="Teori" name="teori"
                                    value="{{ $judulForm == 'Tambah' ? 0 : $data->teori }}"
                                    onchange="AddKurikulum.total()">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="praktik">Praktik</label>
                                <input type="number" class="form-control" id="praktik" placeholder="Praktik"
                                    name="praktik" value="{{ $judulForm == 'Tambah' ? 0 : $data->praktek }}"
                                    onchange="AddKurikulum.total()">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="total">Total</label>
                                <input type="text" class="form-control" id="total" placeholder="Total" name="total"
                                    value="{{ $judulForm == 'Tambah' ? 0 : $data->total }}" readonly>
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
<script>
    let AddKurikulum = {
        // buatkan total dari input teori dan praktik
        total: () => {
            let teori = $('#teori').val();
            let praktik = $('#praktik').val();
            let total = parseInt(teori) + parseInt(praktik);
            $('#total').val(total);
        }
    }
</script>
@endsection
