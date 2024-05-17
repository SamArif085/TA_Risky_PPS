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
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun Kegiatan</th>
                                <th>Nama</th>
                                <th>Rincian Kegiatan</th>
                                <th>Foto Kegiatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item['tahun']['tahun'] }}</td>
                                <td>{{ $item['nama'] }}</td>
                                <td>{{ $item['rincian_kegiatan'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $item['id'] }}">
                                        Lihat Detail Gambar
                                    </button>
                                </td>
                                <td>
                                    <a href="{{ route($routeName . '.edit', $item['id']) }}"
                                        class="btn btn-sm btn-primary"><i class="ti-pencil"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger"
                                        onclick="Sertifikasi.delete({{ $item['id'] }})"><i
                                            class="ti-trash"></i></button>
                                </td>
                            </tr>
                            <div class="modal fade" id="exampleModal{{ $item['id'] }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Gambar</h5>
                                        </div>
                                        <div class="modal-body">
                                            @if(isset($item['foto']))
                                            @foreach ($item['foto'] as $foto)
                                            <img class="img-fluid" src="{{ asset($foto['gambar']) }}" alt=""
                                                width="100%">
                                            @endforeach
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    let Sertifikasi = {
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
                                _token: '{{ csrf_token() }}'
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
