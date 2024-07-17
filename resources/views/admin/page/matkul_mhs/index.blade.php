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
                                <th>Semester</th>
                                <th>Matkul</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            @if ($item['angkatan'] == Auth::user()->angkatan)
                            @foreach ($item['matkul'] as $items)
                            @php
                            $isDisabled = false;
                            foreach ($riwayat_absen as $item1) {
                            if ($item1['matkul']['mata_kuliah'] == $items['mata_kuliah']) {
                            $isDisabled = true;
                            break;
                            }
                            }
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item['semester']['semester'] }}</td>
                                <td>{{ $items['mata_kuliah'] }}</td>
                                <td>
                                    @if ($isDisabled)
                                    <button class="btn btn-sm btn-primary" disabled>
                                        <i class="ti-pencil"></i> Presensi
                                    </button>
                                    @else
                                    <a href="{{ route('presensi_mhs', ['kode_matkul' => $items['kode'], 'angkatan' => $item['angkatan'], 'semester' => $item['semester']['semester']]) }}"
                                        class="btn btn-sm btn-primary"><i class="ti-pencil"></i> Presensi
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @endif
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
