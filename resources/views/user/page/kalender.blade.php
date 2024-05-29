<div class="container-fluid page-header py-6 my-6 mt-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center">
        <h1 class="display-4 text-white animated slideInDown mb-4">{{ isset($title) ? $title : '' }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">{{ isset($title) ? $title : '' }}
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <center>
                <h1>Kalender Pendidikan Program Studi TNU</h1>
            </center>
            <div class="accordion" id="accordionExample">
                @foreach($link as $angkatan => $group)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading-{{ $angkatan }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse-{{ $angkatan }}" aria-expanded="false"
                            aria-controls="collapse-{{ $angkatan }}">
                            PROGRAM DIPLOMA IV TEKNIK NAVIGASI UDARA {{ $group['name'] }}
                        </button>
                    </h2>
                    <div id="collapse-{{ $angkatan }}" class="accordion-collapse collapse"
                        aria-labelledby="heading-{{ $angkatan }}" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div>
                                <h2 class="text-center">Kalender Akademik</h2>
                                <h4 class="text-center">Tahun Ajaran {{ $group['tahun'] }}</h4>
                            </div>
                            <div class="mb-5 mt-3">
                                <div class=""
                                    style="border: 1px solid #ddd; padding: 5px; background-color: #f2f2f2; margin-bottom: -1px;">
                                    <h5 class="text-center mt-1">Semester GANJIL {{ $group['tahun'] }} ({{
                                        $group['semesterGanjil'] }})</h5>
                                </div>
                                <table class="table table-bordered">
                                    <thead class="text-center">
                                        <tr>
                                            <th scope="col" rowspan="2">No</th>
                                            <th scope="col" rowspan="2">Kegiatan</th>
                                            <th scope="col" colspan="2">Jadwal Pelaksanaan</th>
                                        </tr>
                                        <tr>
                                            <th>Awal</th>
                                            <th>Akhir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $semesterDisplayedGanjil = false; @endphp
                                        @foreach($group['items'] as $item)
                                        @if($item['item']->ganjil_genap == 1)
                                        @if(!$semesterDisplayedGanjil)
                                        @php $semesterDisplayedGanjil = true; @endphp
                                        @endif
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $item['item']->kegiatan }}</td>
                                            <td class="text-center">{{ $item['item']->tgl_jadwal_awal }}</td>
                                            <td class="text-center">{{ $item['item']->tgl_jadwal_akhir }}</td>
                                        </tr>
                                        @endif @endforeach
                                    </tbody>
                                </table>
                                <div>
                                    {!! nl2br(e($group['catatansemesterGanjil'])) !!}
                                </div>
                            </div>
                            <div class="mb-5 mt-3">
                                <div class=""
                                    style="border: 1px solid #ddd; padding: 5px; background-color: #f2f2f2; margin-bottom: -1px;">
                                    <h5 class="text-center mt-1">Semester GENAP {{ $group['tahun'] }} ({{
                                        $group['semesterGenap'] }})</h5>
                                </div>
                                <table class="table table-bordered">
                                    <thead class="text-center">
                                        <tr>
                                            <th scope="col" rowspan="2">No</th>
                                            <th scope="col" rowspan="2">Kegiatan</th>
                                            <th scope="col" colspan="2">Jadwal Pelaksanaan</th>
                                        </tr>
                                        <tr>
                                            <th>Awal</th>
                                            <th>Akhir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $semesterDisplayedGenap = false; $genapCounter = 0; @endphp
                                        @foreach($group['items'] as $item)
                                        @if($item['item']->ganjil_genap == 2)
                                        @if(!$semesterDisplayedGenap)
                                        @php $semesterDisplayedGenap = true; @endphp
                                        @endif
                                        <tr>
                                            <td class="text-center">{{ ++$genapCounter }}</td>
                                            <td>{{ $item['item']->kegiatan }}</td>
                                            <td class="text-center">{{ $item['item']->tgl_jadwal_awal }}</td>
                                            <td class="text-center">{{ $item['item']->tgl_jadwal_akhir }}</td>
                                        </tr>
                                        @endif @endforeach
                                    </tbody>
                                </table>
                                <div>
                                    {!! nl2br(e($group['catatansemesterGenap'])) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
