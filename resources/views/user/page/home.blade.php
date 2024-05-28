<!-- Carousel Start -->
<div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="{{ asset('file/images/gerbang-poltekbangsby23-2.png') }}" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7 text-center">
                                <h1 class="display-2 text-light mb-5 animated slideInDown">
                                    Welcome to Air Navigation Engineering Polytechnic of Surabaya
                                </h1>
                                <a href="#" class="btn btn-primary py-sm-3 px-sm-5 me-3">Learn More</a>
                                <a href="#" class="btn btn-light py-sm-3 px-sm-5">Our Courses</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100"
                    src="{{ asset('file/images/1670981478-WhatsApp Image 2022-12-13 at 19.29.30.jpeg') }}" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <h1 class="display-2 text-light mb-5 animated slideInDown">Safe Driving Is Our Top
                                    Priority</h1>
                                <a href="" class="btn btn-primary py-sm-3 px-sm-5">Learn More</a>
                                <a href="" class="btn btn-light py-sm-3 px-sm-5 ms-3">Our Courses</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->


<!-- About Start -->
<div class="container-xxl py-6">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="position-relative overflow-hidden ps-5 pt-5 h-100" style="min-height: 400px;">
                    @foreach ($link as $key => $item)
                    <img class="position-absolute w-100 h-100" src="{{ asset($item['file']) }}" alt=""
                        style="object-fit: cover;">
                    <img class="position-absolute top-0 start-0 bg-white pe-3 pb-3" src="{{ asset($item['file']) }}"
                        alt="" style="width: 200px; height: 200px;">
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-100">
                    <h6 class="text-primary text-uppercase mb-2">VISI DAN MISI</h6>
                    <h1 class="display-6 mb-4">VISI</h1>
                    <p>
                        Menjadi Program Studi Vokasi Penerbangan yang unggul dan berdaya saing global dibidang teknologi
                        rekayasa navigasi udara yang diakui secara nasional dan internasional pada tahun 2027</p>
                    <h1 class="display-6 mb-4">MISI</h1>
                    <p>
                        1. Menyelenggarakan pendidikan vokasional untuk menghasilkan lulusan yang beretika, handal, dan
                        kompeten dibidang teknologi rekayasa navigasi udara. <br>
                        2. Melaksanakan penelitian teknologi terapan yang dapat memberikan kontribusi aktif dalam
                        pengembangan ilmu pengetahuan dibidang teknologi rekayasa navigasi udara.<br>
                        3. Menyelenggarakan kegiatan pengabdian kepada masyarakat dibidang teknologi rekayasa navigasi
                        udara untuk mendorong pengembangan potensi masyarakat yang dibutuhkan.
                    </p>

                    <div class="row g-4">
                        <div class="col-sm-6">
                            <a class="btn btn-primary py-3 px-5" href="">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Courses Start -->
<div class="container-xxl courses my-6 py-6 pb-0">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h6 class="text-primary text-uppercase mb-2">About Us</h6>
            <h1 class="display-6 mb-4">Profile Teknik Navigasi Udara</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="courses-item d-flex flex-column bg-white overflow-hidden h-100">
                    <img class="img-fluid" src="{{ asset('file/logo/Politeknik_Penerbangan_Surabaya.webp') }}" alt=""
                        width="100">
                    <div class="p-4">
                        <h5 class="mb-3">Teknik Navigasi Udara</h5>
                        <p class="mb-4">Program Studi Teknik Navigasi Udara adalah program studi yang berada di bawah
                            naungan Politeknik Penerbangan Surabaya. Program Studi Teknik Navigasi Udara merupakan
                            program studi yang berfokus pada pengembangan teknologi navigasi udara yang berbasis pada
                            teknologi informasi dan komunikasi. Program Studi Teknik Navigasi Udara memiliki visi untuk
                            menjadi program studi vokasi penerbangan yang unggul dan berdaya saing global dibidang
                            teknologi rekayasa navigasi udara yang diakui secara nasional dan internasional pada tahun
                            2027.</p>
                        <a class="btn btn-primary py-3 px-5" href="">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Courses End -->

<!-- Team Start -->
<div class="container-xxl py-6">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h6 class="text-primary text-uppercase mb-2">Galery</h6>
            <h1 class="display-6 mb-4">Kegiatan Prodi TNU</h1>
        </div>
        <div class="row g-0 team-items">
            <div class="col-lg-auto col-md-auto wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item position-relative">
                    <div class="position-relative">
                        <img class="img-fluid" src="{{ asset('file/images/g1.jpg') }}" alt="">
                        <div class="team-social text-center">
                            <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                    class="fa fa-eye"></i></a>
                        </div>
                    </div>
                    <div class="bg-light text-center p-4">
                        <h5 class="mt-2">Acara Malam Keakraban TNU 2022</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-auto col-md-auto wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item position-relative">
                    <div class="position-relative">
                        <img class="img-fluid" src="{{ asset('file/images/g2.jpg') }}" alt="">
                        <div class="team-social text-center">
                            <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                    class="fa fa-eye"></i></a>
                        </div>
                    </div>
                    <div class="bg-light text-center p-4">
                        <h5 class="mt-2">Praktikum VHF A/G</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-auto col-md-auto wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item position-relative">
                    <div class="position-relative">
                        <img class="img-fluid" src="{{ asset('file/images/g3.jpg') }}" alt="">
                        <div class="team-social text-center">
                            <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                    class="fa fa-eye"></i></a>
                        </div>
                    </div>
                    <div class="bg-light text-center p-4">
                        <h5 class="mt-2">Pengabdian Kepada Masyarakat</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-auto col-md-auto wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item position-relative">
                    <div class="position-relative">
                        <img class="img-fluid" src="{{ asset('file/images/g4.jpg') }}" alt="">
                        <div class="team-social text-center">
                            <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                    class="fa fa-eye"></i></a>
                        </div>
                    </div>
                    <div class="bg-light text-center p-4">
                        <h5 class="mt-2">Fasilitas Laboratorium DVOR</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->

<!-- Team Start -->
<div class="container-xxl py-6">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h6 class="text-primary text-uppercase mb-2">STAF PENGAJAR</h6>
            <h1 class="display-6 mb-4">Dosen Program Studi Teknik Navigasi Udara</h1>
        </div>
        <div class="row g-0 team-items">
            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item text-center">
                        <div class="position-relative mb-5">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="team-item position-relative">
                                        <div class="position-relative">
                                            <img class="img-fluid"
                                                src="{{ asset('template-landing-page/img/team-1.jpg') }}" alt="">
                                            <div class="team-social text-center">
                                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                                        class="fab fa-facebook-f"></i></a>
                                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                                        class="fab fa-twitter"></i></a>
                                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                                        class="fab fa-instagram"></i></a>
                                            </div>
                                        </div>
                                        <div class="bg-light text-center p-4">
                                            <h5 class="mt-2">Full Name</h5>
                                            <span>Trainer</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="team-item position-relative">
                                        <div class="position-relative">
                                            <img class="img-fluid"
                                                src="{{ asset('template-landing-page/img/team-2.jpg') }}" alt="">
                                            <div class="team-social text-center">
                                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                                        class="fab fa-facebook-f"></i></a>
                                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                                        class="fab fa-twitter"></i></a>
                                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                                        class="fab fa-instagram"></i></a>
                                            </div>
                                        </div>
                                        <div class="bg-light text-center p-4">
                                            <h5 class="mt-2">Full Name</h5>
                                            <span>Trainer</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                                    <div class="team-item position-relative">
                                        <div class="position-relative">
                                            <img class="img-fluid"
                                                src="{{ asset('template-landing-page/img/team-3.jpg') }}" alt="">
                                            <div class="team-social text-center">
                                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                                        class="fab fa-facebook-f"></i></a>
                                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                                        class="fab fa-twitter"></i></a>
                                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                                        class="fab fa-instagram"></i></a>
                                            </div>
                                        </div>
                                        <div class="bg-light text-center p-4">
                                            <h5 class="mt-2">Full Name</h5>
                                            <span>Trainer</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                                    <div class="team-item position-relative">
                                        <div class="position-relative">
                                            <img class="img-fluid"
                                                src="{{ asset('template-landing-page/img/team-4.jpg') }}" alt="">
                                            <div class="team-social text-center">
                                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                                        class="fab fa-facebook-f"></i></a>
                                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                                        class="fab fa-twitter"></i></a>
                                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                                        class="fab fa-instagram"></i></a>
                                            </div>
                                        </div>
                                        <div class="bg-light text-center p-4">
                                            <h5 class="mt-2">Full Name</h5>
                                            <span>Trainer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item text-center">
                        <div class="position-relative mb-5">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="team-item position-relative">
                                        <div class="position-relative">
                                            <img class="img-fluid"
                                                src="{{ asset('template-landing-page/img/team-1.jpg') }}" alt="">
                                            <div class="team-social text-center">
                                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                                        class="fab fa-facebook-f"></i></a>
                                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                                        class="fab fa-twitter"></i></a>
                                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                                        class="fab fa-instagram"></i></a>
                                            </div>
                                        </div>
                                        <div class="bg-light text-center p-4">
                                            <h5 class="mt-2">Full Name</h5>
                                            <span>Trainer</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="team-item position-relative">
                                        <div class="position-relative">
                                            <img class="img-fluid"
                                                src="{{ asset('template-landing-page/img/team-2.jpg') }}" alt="">
                                            <div class="team-social text-center">
                                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                                        class="fab fa-facebook-f"></i></a>
                                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                                        class="fab fa-twitter"></i></a>
                                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                                        class="fab fa-instagram"></i></a>
                                            </div>
                                        </div>
                                        <div class="bg-light text-center p-4">
                                            <h5 class="mt-2">Full Name</h5>
                                            <span>Trainer</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                                    <div class="team-item position-relative">
                                        <div class="position-relative">
                                            <img class="img-fluid"
                                                src="{{ asset('template-landing-page/img/team-3.jpg') }}" alt="">
                                            <div class="team-social text-center">
                                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                                        class="fab fa-facebook-f"></i></a>
                                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                                        class="fab fa-twitter"></i></a>
                                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                                        class="fab fa-instagram"></i></a>
                                            </div>
                                        </div>
                                        <div class="bg-light text-center p-4">
                                            <h5 class="mt-2">Full Name</h5>
                                            <span>Trainer</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                                    <div class="team-item position-relative">
                                        <div class="position-relative">
                                            <img class="img-fluid"
                                                src="{{ asset('template-landing-page/img/team-4.jpg') }}" alt="">
                                            <div class="team-social text-center">
                                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                                        class="fab fa-facebook-f"></i></a>
                                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                                        class="fab fa-twitter"></i></a>
                                                <a class="btn btn-square btn-outline-primary border-2 m-1" href=""><i
                                                        class="fab fa-instagram"></i></a>
                                            </div>
                                        </div>
                                        <div class="bg-light text-center p-4">
                                            <h5 class="mt-2">Full Name</h5>
                                            <span>Trainer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Team End -->


<!-- Testimonial Start -->
<div class="container-xxl py-6">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h6 class="text-primary text-uppercase mb-2">FASILITAS PRODI TNU</h6>
            <h1 class="display-6 mb-4">Beberapa Fasilitas Sarana dan Prasarana Penunjang</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item text-center">
                        <div class="position-relative mb-5">
                            <img class="img-fluid  mx-auto" src="{{ asset('file/images/lab_basic.jpg') }}" alt="">
                            <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle"
                                style="width: 60px; height: 60px;">

                            </div>
                        </div>
                        <p class="fs-4">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore
                            lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat.
                        </p>
                    </div>
                    <div class="testimonial-item text-center">
                        <div class="position-relative mb-5">
                            <img class="img-fluid mx-auto" src="{{ asset('file/images/lab_basic.jpg') }}" alt="">
                            <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle"
                                style="width: 60px; height: 60px;">
                                <i class="fa fa-quote-left fa-2x text-primary"></i>
                            </div>
                        </div>
                        <p class="fs-4">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore
                            lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->