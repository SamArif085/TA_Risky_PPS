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
        <div class="col-12 mb-5">
            <center>
                <h1>Fasilitas Laboratorium Prodi TNU</h1>
            </center>
        </div>
    </div>
    @foreach ($tampilan as $data)
    <div class="row">
        @foreach ($data as $fasilitas)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
                <img src="{{ asset($fasilitas['foto']) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center mb-0">{{ $fasilitas['nama'] }}</h5>
                    <hr class="my-2">
                    <p class="card-text text-center">
                        <i class="fa fa-map-marker-alt me-3"></i>{{ $fasilitas['lokasi'] }}
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach
</div>
