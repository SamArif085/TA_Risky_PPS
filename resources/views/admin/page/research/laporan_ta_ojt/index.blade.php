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
                                <th>Angkatan</th>
                                <th>Kategori</th>
                                <th>Nama</th>
                                <th>Judul</th>
                                <th>File</th>
                                <th>tahun</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item['Angkatan']['angkatan'] }}</td>
                                <td>
                                    @if ($item['kategori'] == 1)
                                    Laporan Tugas Akhir
                                    @elseif ($item['kategori'] == 2)
                                    Laporan OJT
                                    @else
                                    Category Kosong
                                    @endif
                                </td>
                                <td>{{ $item['nama'] }}</td>
                                <td class="truncated-text" title="{{ $item['judul'] }}">{{ $item['judul']
                                    }}</td>
                                <td>
                                    @if ($item['file'])
                                    @php
                                    $fileExtension = pathinfo($item['file'], PATHINFO_EXTENSION);
                                    @endphp
                                    @if ($fileExtension == 'pdf')
                                    <a href="{{ asset($item['file']) }}" class="btn btn-primary">Download PDF</a>
                                    @elseif (in_array($fileExtension, ['doc', 'docx']))
                                    <a href="{{ asset($item['file']) }}" class="btn btn-primary">Download DOCX</a>
                                    @else
                                    <span>No file available</span>
                                    @endif
                                    @else
                                    <span>No file available</span>
                                    @endif
                                </td>
                                <td>{{ $item['tahun'] }}</td>
                                <td>
                                    <a href="{{ route($routeName . '.edit', $item['id']) }}"
                                        class="btn btn-sm btn-primary"><i class="ti-pencil"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger"
                                        onclick="Sertifikasi.delete({{ $item['id'] }})"><i class="ti-trash"></i>
                                    </button>
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
