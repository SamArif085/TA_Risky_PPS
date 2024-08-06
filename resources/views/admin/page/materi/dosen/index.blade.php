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
                                <th>Kode Matkul</th>
                                <th>Nama Matkul</th>
                                <th>Semester</th>
                                {{-- <th>Angkatan</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item['kode_matkul']['kode'] }}</td>
                                <td>{{ $item['kode_matkul']['mata_kuliah'] }}</td>
                                <td>{{ $item['semester']['semester'] }}</td>
                                {{-- <td>{{ $item['relasi_pengambilan_m_k_mhs']['angkatan'] }}</td> --}}
                                <td class="text-center">
                                    <a href="{{ route($routeName . '.show', $item['id']) }}"
                                        class="btn btn-sm btn-primary"><i class="ti-eye"></i>
                                    </a>
                                </td>
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
<script>
    $(document).ready(function() {
            $('#data-table').DataTable();
        });s
</script>
@endsection
