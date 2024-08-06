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
                                <th>Nama</th>
                                <th>NIT</th>
                                <th>Angkatan</th>
                                <th>Jenis Perstasi</th>
                                <th>Tingkat Lomba</th>
                                <th>Nama Lomba</th>
                                <th>Pelaksanaan Lomba</th>
                                <th>Sertifikat</th>
                                <th>Approve</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item['user']['nama_lengkap'] }}</td>
                                <td>{{ $item['user']['no_induk'] }}</td>
                                <td>{{ $item['user']['angkatan'] }}</td>
                                <td>
                                    @if($item['jenis_prestasi'] == 1)
                                    Akademik
                                    @elseif($item['jenis_prestasi'] == 2)
                                    Non Akademik
                                    @endif
                                </td>
                                <td>
                                    @if($item['tingkat_lomba'] == 1)
                                    Kota
                                    @elseif($item['tingkat_lomba'] == 2)
                                    Provinsi
                                    @elseif($item['tingkat_lomba'] == 3)
                                    Nasional
                                    @elseif($item['tingkat_lomba'] == 4)
                                    Internasional
                                    @endif
                                </td>
                                <td>{{ $item['nama_lomba'] }}</td>
                                <td>{{ $item['pelaksanaan_lomba'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal{{ $item['id'] }}">
                                        <i class="ti-eye"></i>
                                    </button>
                                    <div class="modal fade" id="exampleModal{{ $item['id'] }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Sertifikat
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <img class="modal-image" src="{{ asset($item['sertifikat']) }}"
                                                        alt=""
                                                        style="max-width: 500px; width: 100%; height: auto; border-radius: 0;">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if (Auth::user()->role == 1)
                                    @if ($item['status'] == 0)
                                    <button class="btn btn-sm btn-danger"
                                        onclick="Prestasi.reject({{ $item['id'] }})"><i class="ti-close"></i>
                                    </button>
                                    <button class="btn btn-sm btn-primary"
                                        onclick="Prestasi.approve({{ $item['id'] }})"> <i class="ti-check"></i>
                                    </button>
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
                                    @if (Auth::user()->role == 3)
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
    let Prestasi = {
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
