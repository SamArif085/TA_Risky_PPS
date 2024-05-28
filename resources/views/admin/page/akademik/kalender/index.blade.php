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
    <div class="col-12 mb-4 ">
        <div>
            <a href="{{ route($routeName . '.add') }}" class="btn btn-primary float-right"><i class="ti-plus"></i>
                Tambah</a>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive pt-3">
                    <table class="table table-bordered" id="data-table">
                        <thead class="text-center">
                            <tr>
                                <th scope="col" rowspan="2">No</th>
                                <th scope="col" rowspan="2">Angkatan</th>
                                <th scope="col" rowspan="2">Kegiatan</th>
                                <th scope="col" colspan="2">jadwal Pelaksanaan</th>
                                <th scope="col" rowspan="2">Catatan</th>
                                <th scope="col" rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th scope="col">Awal</th>
                                <th scope="col">Akhir</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item['angkatan']['angkatan']}}</td>
                                <td>{{ $item['kegiatan']}}</td>
                                <td>{{ $item['tgl_jadwal_awal']}}</td>
                                <td>{{ $item['tgl_jadwal_akhir']}}</td>
                                <td>{{ $item['catatan']}}</td>
                                <td>
                                    <a href="{{ route($routeName. '.edit', $item['id']) }}"
                                        class="btn btn-sm btn-primary"><i class="ti-pencil"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger"
                                        onclick="AddKurikulum.delete({{ $item['id'] }})"><i class="ti-trash"></i>
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
    let AddKurikulum = {
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
