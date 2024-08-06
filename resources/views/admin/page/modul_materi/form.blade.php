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
                <form class="forms-sample" action="{{ route('modul_materi.submit') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <input type="hidden" name="id" id="id"
                                    value="{{ $judulForm == 'Tambah' ? '' : $data->id }}">
                                <label for="Semester">Semester</label>
                                <select name="semester" class="form-control" id="semester" required>
                                    <option value="">Pilih</option>
                                    @foreach($semester as $s)
                                    <option value="{{ $s['semester'] }}" {{ $judulForm=='Edit' && $data->semester ==
                                        $s['semester'] ? 'selected' : '' }}>
                                        {{ $s['semester'] }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="kode_matkul">Kode matkul</label>
                                {{-- {{ dd($data->kode_matkul .'-'.$data->nama_materi); }} --}}
                                <select name="kode_matkul" class="form-control" id="kode_matkul" required>
                                    <option value="">Pilih</option>
                                    @foreach($dataMatkul as $item)
                                    <option value="{{$item['kode']}} - {{$item['mata_kuliah']}}" {{ $judulForm=='Edit'
                                        && $data->kode_matkul .'-'.$data->nama_materi == $item['kode'] .' - '.
                                        $item['mata_kuliah']? 'selected' :
                                        '' }}>
                                        {{$item['kode']}} - {{$item['mata_kuliah']}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="file_materi">Upload File Materi</label>
                                <input type="file" class="form-control" id="file_materi" name="file_materi"
                                    accept=".pdf,.docx,.pptx,.xlsx" @if ($judulForm == 'Tambah') required @endif>
                            </div>
                        </div>
                        <div class="col-6 m-auto">
                            @if (isset($data->file_materi) && $data->file_materi != null)
                            <a href="{{ asset($data->file_materi) }}" target="_blank">Download File</a>
                            @endif
                        </div>

                    </div>
                    <button type="submit" id="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('modul_materi') }}" class="btn btn-light">Cancel</a>
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
