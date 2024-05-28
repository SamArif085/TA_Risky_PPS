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
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th scope="col" rowspan="2">No</th>
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
                    @foreach($AkademiPerstasi as $achievement)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $achievement->kegiatan }}</td>
                        <td class="text-center">{{ $achievement->waktu_perolehan }}</td>
                        <td class="text-center">
                            {!! $achievement->lokal ? '<i class="fas fa-check"></i>' : '-' !!}
                        </td>
                        <td class="text-center">
                            {!! $achievement->nasional ? '<i class="fas fa-check"></i>' : '-' !!}
                        </td>
                        <td class="text-center">
                            {!! $achievement->internasional ? '<i class="fas fa-check"></i>' : '-' !!}
                        </td>
                        <td class="text-center">{{ $achievement->perstasi_yg_dicapai }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <th colspan="3" class="text-center">Total</th>
                        <th class="text-center">{{ $totalAkademi['lokal'] }}</th>
                        <th class="text-center">{{ $totalAkademi['nasional'] }}</th>
                        <th class="text-center">{{ $totalAkademi['internasional'] }}</th>
                        <th></th>
                    </tr>
                </tbody>
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
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th scope="col" rowspan="2">No</th>
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
                    @foreach($nonAkademiPerstasi as $achievement)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $achievement->kegiatan }}</td>
                        <td class="text-center">{{ $achievement->waktu_perolehan }}</td>
                        <td class="text-center">
                            {!! $achievement->lokal ? '<i class="fas fa-check"></i>' : '-' !!}
                        </td>
                        <td class="text-center">
                            {!! $achievement->nasional ? '<i class="fas fa-check"></i>' : '-' !!}
                        </td>
                        <td class="text-center">
                            {!! $achievement->internasional ? '<i class="fas fa-check"></i>' : '-' !!}
                        </td>
                        <td class="text-center">{{ $achievement->perstasi_yg_dicapai }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <th colspan="3" class="text-center">Total</th>
                        <th class="text-center">{{ $totalNonAkademi['lokal'] }}</th>
                        <th class="text-center">{{ $totalNonAkademi['nasional'] }}</th>
                        <th class="text-center">{{ $totalNonAkademi['internasional'] }}</th>
                        <th></th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
