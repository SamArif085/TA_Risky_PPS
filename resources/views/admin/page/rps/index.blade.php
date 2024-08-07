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
    @if (Auth::user()->role == 2)
    <div class="col-12 mb-4">
        <a href="{{ route($routeName.'.add') }}" class="btn btn-primary float-right"><i class="ti-plus"></i> Tambah</a>
    </div>
    @endif
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive pt-3">
                    <table class="table table-bordered" id="data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>RPS</th>
                                <th>File</th>
                                <th>Status</th>
                                @if (Auth::user()->role == 2)
                                <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item['nama'] }}</td>
                                <td>
                                    <a href="{{ asset($item['file']) }}">
                                        <i class="ti-download"></i>
                                        {{ $item['file'] }}
                                    </a>
                                </td>
                                <td>
                                    @if (Auth::user()->role == 1)
                                    @if ($item['status'] == 0)
                                    <button class="btn btn-sm btn-danger" onclick="RPS.reject({{ $item['id'] }})"><i
                                            class="ti-close"></i>
                                    </button>
                                    <button class="btn btn-sm btn-primary" onclick="RPS.approve({{ $item['id'] }})"> <i
                                            class="ti-check"></i>
                                    </button>
                                    @elseif ($item['status'] == 1)
                                    <span class="badge badge-success">Disetujui</span>
                                    @elseif ($item['status'] == 2)
                                    <span class="badge badge-danger">Ditolak</span>
                                    @endif
                                    @if ($item['id_acc'] != null)
                                    <br>
                                    {{-- diacc oleh : <b>{{ $item['user_acc']['name'] }}</b> --}}
                                    @endif
                                    @endif
                                    @if (Auth::user()->role == 2)
                                    @if ($item['status'] == 0)
                                    <span class="badge badge-warning">Menunggu</span>
                                    @elseif ($item['status'] == 1)
                                    <span class="badge badge-success">Disetujui</span>
                                    @elseif ($item['status'] == 2)
                                    <span class="badge badge-danger">Ditolak</span>
                                    @endif
                                    @if ($item['id_acc'] != null)
                                    <br>
                                    diacc oleh : <b>{{ $item['user_acc']['name'] }}</b>
                                    @endif
                                    @endif
                                </td>
                                @if (Auth::user()->role == 2)
                                <td>
                                    <a href="{{ route($routeName . '.edit', $item['id']) }}"
                                        class="btn btn-sm btn-primary {{ in_array($item['status'], [1, 2]) ? 'disabled' : '' }}"><i
                                            class="ti-pencil"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger" onclick="RPS.delete({{ $item['id'] }})" {{
                                        in_array($item['status'], [1, 2]) ? 'disabled' : '' }}>
                                        <i class="ti-trash"></i>
                                    </button>
                                </td>
                                @endif
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
    let RPS = {
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
            reject: (id) => {
                let url = '{{ route($routeName . '.reject') }}';
                Swal.fire({
                    title: "Konfirmasi reject ?",
                    text: `Apakah Anda yakin akan mengreject data ini ?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, reject!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: {
                                id: id,
                                status: 2,
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
            approve: (id) => {
                let url = '{{ route($routeName . '.approve') }}';
                Swal.fire({
                    title: "Konfirmasi approve ?",
                    text: `Apakah Anda yakin akan mengapprove data ini ?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, approve!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: {
                                id: id,
                                status: 1,
                                id_acc: `{{ Auth::user()->id }}`,
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
