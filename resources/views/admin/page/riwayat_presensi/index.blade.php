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
                <div class="table-responsive pt-3">
                    {{-- {{ dd($data); }} --}}
                    <table class="table table-bordered" id="data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Semester</th>
                                <th>Status Kehadiran</th>
                                <th>Waktu Masuk</th>
                                <th>Matkul</th>
                                <th>Kode Matkul</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item['tanggal'] }}</td>
                                <td>{{ $item['semester'] }}</td>
                                <td>{{ $item['status_kehadiran'] }}</td>
                                <td>{{ $item['waktu_masuk'] }}</td>
                                <td>{{ $item['matkul']['mata_kuliah'] }}</td>
                                <td>{{ $item['kode_matkul'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')

@endsection
