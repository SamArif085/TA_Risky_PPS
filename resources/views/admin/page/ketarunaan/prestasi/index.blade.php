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
    <div class="col-12 mb-4">
        <a href="{{ route($routeName . '.add') }}" class="btn btn-primary float-right"><i class="ti-plus"></i>
            Tambah</a>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive pt-3">
                    <table class="table table-bordered" id="data-table">
                        <thead class="text-center">
                            <tr>
                                <th scope="col" rowspan="2">No</th>
                                <th scope="col" rowspan="2">Akademik</th>
                                <th scope="col" rowspan="2">Nama Kegiatan</th>
                                <th scope="col" rowspan="2">Waktu Perolehan</th>
                                <th scope="col" colspan="3">Tingkat</th>
                                <th scope="col" rowspan="2">Prestasi yang dicapai</th>
                            </tr>
                            <tr>
                                <th scope="col">Lokal</th>
                                <th scope="col">Nasional</th>
                                <th scope="col">Internasional</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item['master_akademik']['nama']}}</td>
                                <td>{{ $item['kegiatan']}}</td>
                                <td>{{ $item['waktu_perolehan'] }}</td>

                                <td class="text-center">{!! $item['lokal'] == null ? '-' : '<i class="ti-check"></i>'
                                    !!}</td>
                                <td class="text-center">{!! $item['nasional'] == null ? '-' : '<i class="ti-check"></i>'
                                    !!}</td>
                                <td class="text-center">{!! $item['internasional'] == null ? '-' : '<i
                                        class="ti-check"></i>' !!}</td>
                                <td class="text-center">
                                    <a href="{{ route($routeName. '.edit', $item['id']) }}"
                                        class="btn btn-sm btn-primary"><i class="ti-pencil"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger"
                                        onclick="AddPrestasi.delete({{ $item['id'] }})"><i class="ti-trash"></i>
                                    </button>
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
    let AddPrestasi = {
            delete: (id) => {
                let url = '{{ route($routeName . '.delete') }}';
                Swal.fire({
                    title: "Konfirmasi Hapus ?",
                    text: `Apakah Anda yakin akan menghapus data ini ?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: {
                                id: id,
                            },
                            success: function(response) {
                                if (response.code == 200) {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Berhasil",
                                        text: response.message,
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            location.reload();
                                        }
                                    });
                                } else {
                                    Swal.fire({
                                        icon: "error",
                                        title: "Gagal",
                                        text: response.message,
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            location.reload();
                                        }
                                    });
                                }
                            },
                        });
                    }
                });
            },
        };
        $(document).ready(function() {
            $('#data-table').DataTable();
        });
</script>
@endsection
