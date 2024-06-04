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
                <h4>Dosen Tetap</h4>
            </center>
        </div>
    </div>
    <div class="row">
        <?php foreach ($dosenTetap as $dosen) : ?>
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="team-item position-relative">
                <div class="position-relative">
                    <?php if ($dosen['foto_dosen']) : ?>
                    <img class="img-fluid" src="{{ asset($dosen['foto_dosen']) }}" alt="">
                    <?php else : ?>
                    <img class="img-fluid" src="{{ asset('file-dosen/default-profile.png') }}" alt="">
                    <?php endif; ?>
                    <div class="team-social text-center">
                        <a class="btn btn-square btn-outline-primary border-2 m-1" href="{{ $dosen['fb'] }}"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-primary border-2 m-1" href="{{ $dosen['twitter'] }}"><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-primary border-2 m-1" href="{{ $dosen['ig'] }}"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="bg-light text-center p-4">
                    <h5 class="mt-2">{{ $dosen['nama_dosen'] }}</h5>
                    <span>{{ $dosen['jabatan'] }}</span>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <center>
                <h4>Dosen Teknisi</h4>
            </center>
        </div>
    </div>
    <div class="row">
        <?php foreach ($dosenTeknisi as $dosen) : ?>
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="team-item position-relative">
                <div class="position-relative">
                    <?php if ($dosen['foto_dosen']) : ?>
                    <img class="img-fluid" src="{{ asset($dosen['foto_dosen']) }}" alt="">
                    <?php else : ?>

                    <img class="img-fluid" src="{{ asset('template-landing-page/img/placeholder.jpg') }}" alt="">
                    <?php endif; ?>
                    <div class="team-social text-center">
                        <a class="btn btn-square btn-outline-primary border-2 m-1" href="{{ $dosen['fb'] }}"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-primary border-2 m-1" href="{{ $dosen['twitter'] }}"><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-primary border-2 m-1" href="{{ $dosen['ig'] }}"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="bg-light text-center p-4">
                    <h5 class="mt-2">{{ $dosen['nama_dosen'] }}</h5>
                    <span>{{ $dosen['jabatan'] }}</span>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
