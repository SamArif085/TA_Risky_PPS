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
                <form class="forms-sample" action="{{ route('upload_penilaian.submit') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <input type="hidden" name="id" id="id"
                                    value="{{ $judulForm == 'Tambah' ? '' : $data->id }}">
                                <label for="angkatan">Angkatan</label>
                                <select name="angkatan" class="form-control" id="angkatan" required>
                                    <option value="">Pilih</option>
                                    @foreach($angkatan as $s)
                                    <option value="{{ $s['angkatan'] }}" {{ $judulForm=='Edit' && $data->angkatan ==
                                        $s['angkatan'] ? 'selected' : '' }}>
                                        {{ $s['angkatan'] }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="tipe">Tipe Tugas</label>
                                <select name="tipe" class="form-control" id="tipe" required>
                                    <option value="">Pilih</option>
                                    @foreach($dataTugas as $item)
                                    <option value="{{$item}}" {{ $judulForm=='Edit' && $data->tipe == $item ? 'selected'
                                        :
                                        '' }}>
                                        {{$item}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="file">Upload File Penilaian</label>
                                <input type="file" class="form-control" id="file" name="file"
                                    accept=".pdf,.docx,.pptx,.xlsx" @if ($judulForm=='Tambah' ) required @endif>
                            </div>
                        </div>
                        <div class="col-6 m-auto">
                            @if (isset($data->file) && $data->file != null)
                            <a href="{{ asset($data->file) }}" target="_blank">Download File</a>
                            @endif
                        </div>

                    </div>
                    <button type="submit" id="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('upload_penilaian') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

@section('script')

<script>
    // let ModulMateri = {
    //     ubahNamaMatkul : () =>{
    //         let kodeMatkul = $('#kode_matkul').val();
    //         console.log(kodeMatkul);

    //     }
    // }
</script>


@endsection
