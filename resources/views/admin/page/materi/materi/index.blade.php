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
        <a href="{{ route($routeName) }}" class="btn btn-light text-right mb-2">Back</a>
        <div class="card">
            <div class="card-body">
                <ul>
                    @foreach ($data as $item)
                    <li><b>Kode Matkul</b> : {{ $item['kode_matkul']['kode'] }}</li>
                    <li><b>Nama Materi</b> : {{ $item['kode_matkul']['mata_kuliah'] }}</li>
                    <li><b>Semester</b> : {{ $item['semester']['semester'] }}</li>
                    @endforeach
                </ul>
                <br>
                <div class="row">
                    <div class="col-9 m-auto">
                        <h4>File Materi</h4>
                    </div>
                    <div class="col-3 m-auto text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambah Materi
                        </button>
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
                                        <th>Action</th>
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
                                        <td>
                                            @if (Auth::user()->role == '2')
                                            <button type="button" data-toggle="modal"
                                                data-target="#exampleModal{{ $items['id'] }}"
                                                class="btn btn-sm btn-primary"><i class="ti-pencil"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger"
                                                onclick="ModulMateri.delete({{ $items['id'] }})"><i
                                                    class="ti-trash"></i></button>
                                            @endif
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="exampleModal{{ $items['id'] }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Materi</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form class="forms-sample" action="{{ route('materi.submit') }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group mb-3">
                                                                    <label for="nama_materi">Nama Materi</label>
                                                                    <input type="hidden" name="id" id="id"
                                                                        value="{{ $items['id'] }}">
                                                                    <input type="hidden" name="id_pengambilan_mk_dos"
                                                                        id="id_pengambilan_mk_dos"
                                                                        value="{{ $id_pengambilan_mk_dos }}">
                                                                    <input type="text" class="form-control"
                                                                        id="nama_materi" name="nama_materi"
                                                                        placeholder="Masukan nama materi..."
                                                                        value="{{ $items['nama_materi'] }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group mb-3">
                                                                    <label for="file_materi">Upload File Materi</label>
                                                                    <input type="file" class="form-control"
                                                                        id="file_materi" name="file_materi"
                                                                        accept=".pdf,.docx,.pptx,.xlsx">
                                                                </div>
                                                                <br>
                                                                <div class="text-right">
                                                                    <a href="{{ asset($items['file_materi']) }}">
                                                                        <i class="ti-download"></i>
                                                                        {{ $items['nama_materi'] }}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Materi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="forms-sample" action="{{ route('materi.submit') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label for="nama_materi">Nama Materi</label>
                                <input type="hidden" name="id" id="id" value="">
                                <input type="hidden" name="id_pengambilan_mk_dos" id="id_pengambilan_mk_dos"
                                    value="{{ $id_pengambilan_mk_dos }}">
                                <input type="text" class="form-control" id="nama_materi" name="nama_materi"
                                    placeholder="Masukan nama materi..." required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label for="file_materi">Upload File Materi</label>
                                <input type="file" class="form-control" id="file_materi" name="file_materi"
                                    accept=".pdf,.docx,.pptx,.xlsx">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('script')
<script>
    let ModulMateri = {
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
