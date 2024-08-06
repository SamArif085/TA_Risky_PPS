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
        <a href="{{ route($routeName,Auth::user()->id) }}" class="btn btn-light text-right mb-2">Back</a>
        <div class="card">
            <div class="card-body">
                <ul>
                    @foreach ($data as $item)
                    <li><b>Kode Matkul</b> : {{ $item['kode_matkul']['kode'] }}</li>
                    <li><b>Nama Matkul</b> : {{ $item['kode_matkul']['mata_kuliah'] }}</li>
                    <li><b>Semester</b> : {{ $item['semester']['semester'] }}</li>
                    @endforeach
                </ul>
                <br>
                <div class="row">
                    <div class="col-12 ">
                        <h4>File Materi</h4>
                    </div>
                </div>
                <br>
                <ul>
                    <div class="row">
                        @foreach ($data as $item)
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="data-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Matkul</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($item['modul_materi'] as $items)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <a href="{{ asset($items['file_materi']) }}">
                                                <i class="ti-download"></i>
                                                {{ $items['nama_materi'] }}
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endforeach
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>



@section('script')

@endsection
