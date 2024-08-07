<div class="container-fluid page-header py-6 my-6 mt-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center">
        <h1 class="display-4 text-white animated slideInDown mb-4">{{ $title }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">{{ $title }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <center>
                <h1 class="mb-5">Prestasi Taruna</h1>
                <h5 class="mt-5 mb-4">PRESTASI AKADEMIK</h5>
            </center>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table id="example" class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th scope="col" rowspan="2">No</th>
                        <th scope="col" rowspan="2">Nama Kegiatan</th>
                        <th scope="col" rowspan="2">Waktu Perolehan</th>
                        <th scope="col" colspan="4">Tingkat</th>
                        <!-- Menambahkan satu kolom lagi untuk "Internasional" -->
                        <th scope="col" rowspan="2">Prestasi yang dicapai</th>
                    </tr>
                    <tr>
                        <th scope="col">Kota</th>
                        <th scope="col">Provinsi</th>
                        <th scope="col">Nasional</th>
                        <th scope="col">Internasional</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($AkademiPerstasi as $achievement)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $achievement->nama_lomba }}</td>
                        <!-- Mengganti 'kegiatan' dengan 'nama_lomba' sesuai data -->
                        <td class="text-center">{{ $achievement->pelaksanaan_lomba }}</td>
                        <!-- Mengganti 'waktu_perolehan' dengan 'pelaksanaan_lomba' -->
                        <td class="text-center">
                            @if($achievement->tingkat_lomba == 1)
                            {!! $achievement->juara ? '<i class="fas fa-check"></i>' : '-' !!}
                            @else
                            -
                            @endif
                        </td>
                        <td class="text-center">
                            @if($achievement->tingkat_lomba == 2)
                            {!! $achievement->juara ? '<i class="fas fa-check"></i>' : '-' !!}
                            @else
                            -
                            @endif
                        </td>
                        <td class="text-center">
                            @if($achievement->tingkat_lomba == 3)
                            {!! $achievement->juara ? '<i class="fas fa-check"></i>' : '-' !!}
                            @else
                            -
                            @endif
                        </td>
                        <td class="text-center">
                            @if($achievement->tingkat_lomba == 4)
                            {!! $achievement->juara ? '<i class="fas fa-check"></i>' : '-' !!}
                            @else
                            -
                            @endif
                        </td>
                        <td class="text-center">{{ $achievement->juara }}</td>
                        <!-- Mengganti 'perstasi_yg_dicapai' dengan 'juara' sesuai data -->
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-center">Total</th>
                        <th class="text-center">{{ $totalAkademi['kota'] ?? 0 }}</th>
                        <th class="text-center">{{ $totalAkademi['provinsi'] ?? 0 }}</th>
                        <th class="text-center">{{ $totalAkademi['nasional'] ?? 0 }}</th>
                        <th class="text-center">{{ $totalAkademi['internasional'] ?? 0 }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <center>
                <h5 class="mt-5 mb-4">PRESTASI NON AKADEMIK</h5>
            </center>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table id="example1" class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th scope="col" rowspan="2">No</th>
                        <th scope="col" rowspan="2">Nama Kegiatan</th>
                        <th scope="col" rowspan="2">Waktu Perolehan</th>
                        <th scope="col" colspan="4">Tingkat</th>
                        <th scope="col" rowspan="2">Prestasi yang dicapai</th>
                    </tr>
                    <tr>
                        <th scope="col">Kota</th>
                        <th scope="col">Provinsi</th>
                        <th scope="col">Nasional</th>
                        <th scope="col">Internasional</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($nonAkademiPerstasi as $achievement)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $achievement->nama_lomba }}</td>
                        <td class="text-center">{{ $achievement->pelaksanaan_lomba }}</td>
                        <td class="text-center">
                            @if($achievement->tingkat_lomba == 1)
                            {!! $achievement->juara ? '<i class="fas fa-check"></i>' : '-' !!}
                            @else
                            -
                            @endif
                        </td>
                        <td class="text-center">
                            @if($achievement->tingkat_lomba == 2)
                            {!! $achievement->juara ? '<i class="fas fa-check"></i>' : '-' !!}
                            @else
                            -
                            @endif
                        </td>
                        <td class="text-center">
                            @if($achievement->tingkat_lomba == 3)
                            {!! $achievement->juara ? '<i class="fas fa-check"></i>' : '-' !!}
                            @else
                            -
                            @endif
                        </td>
                        <td class="text-center">
                            @if($achievement->tingkat_lomba == 4)
                            {!! $achievement->juara ? '<i class="fas fa-check"></i>' : '-' !!}
                            @else
                            -
                            @endif
                        </td>
                        <td class="text-center">{{ $achievement->juara }}</td>
                        <!-- Mengganti 'perstasi_yg_dicapai' dengan 'juara' sesuai data -->
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-center">Total</th>
                        <th class="text-center">{{ $nonAkademiPerstasi['kota'] ?? 0 }}</th>
                        <th class="text-center">{{ $nonAkademiPerstasi['provinsi'] ?? 0 }}</th>
                        <th class="text-center">{{ $nonAkademiPerstasi['nasional'] ?? 0 }}</th>
                        <th class="text-center">{{ $nonAkademiPerstasi['internasional'] ?? 0 }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>


@section('script')
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
    $(document).ready(function() {
        $('#example1').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>
@endsection
