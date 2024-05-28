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
            <center class="mb-5">
                <h1>Data Taruna Aktif Program Studi Teknik Navigasi Udara</h1>
            </center>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach ($dataPerAngkatan as $angkatanId => $tarunas)
                @if (count($tarunas) > 0)
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="tab-{{ $angkatanId }}"
                        data-bs-toggle="tab" data-bs-target="#angkatan-{{ $angkatanId }}" type="button" role="tab"
                        aria-controls="angkatan-{{ $angkatanId }}"
                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $tarunas[0]->angkatan->angkatan
                        }}</button>
                </li>
                @endif
                @endforeach
            </ul>
            <div class="tab-content" id="myTabContent">
                @foreach ($dataPerAngkatan as $angkatan => $tarunas)
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="angkatan-{{ $angkatan }}"
                    role="tabpanel" aria-labelledby="tab-{{ $angkatan }}">
                    <div class="row">
                        @foreach ($tarunas as $taruna)
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-text">{{ $taruna->keterangan }}</h4>
                                    <div class="col-12">
                                        <img src="{{ asset($tarunas[0]->file) }}" class="img-fluid mb-4"
                                            alt="Full-width image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
