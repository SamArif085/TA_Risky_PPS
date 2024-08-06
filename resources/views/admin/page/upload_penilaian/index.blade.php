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
        @if (Auth::user()->role == '2')
        <a href="{{ route($routeName . '.add') }}" class="btn btn-primary float-right"><i class="ti-plus"></i>
            Tambah</a>
        @endif
    </div>
    {{-- {{ dd($data); }} --}}
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive pt-3">
                    <table class="table table-bordered" id="data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Angkatan</th>
                                <th>Tipe</th>
                                <th>File Penilaian</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item['angkatan'] }}</td>
                                <td>{{ $item['tipe'] }}</td>
                                <td>
                                    @if (isset($item['file']) && $item['file'] != null)
                                    <a href="{{ asset($item['file']) }}" target="_blank">Download File</a>
                                    @endif
                                </td>
                                <td>
                                    @if (Auth::user()->role == '2')
                                    <a href="{{ route($routeName . '.edit', $item['id']) }}"
                                        class="btn btn-sm btn-primary"><i class="ti-pencil"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger"
                                        onclick="ModulMateri.delete({{ $item['id'] }})"><i
                                            class="ti-trash"></i></button>
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
            if ({{ Auth::user()->angkatan ? 1 : 0 }}) {
            let table = $('#data-table').DataTable();
            let nilai_search = "{{ Auth::user()->angkatan }}";
            // Set the initial search value to "TNU XVI"
            table.search(nilai_search).draw();

            // Disable the search box
            $('#data-table_filter input').prop('disabled', true);
            } else{
                $('#data-table').DataTable();
            }
        });
</script>
@endsection
