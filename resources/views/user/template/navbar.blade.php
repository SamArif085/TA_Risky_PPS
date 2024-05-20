<!-- Spinner Start -->
<div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
</div>
<!-- Spinner End -->


<!-- Topbar Start -->
<div class="container-fluid bg-dark text-light p-0">
    <div class="row gx-0 d-none d-lg-flex">
        <div class="col-lg-7 px-5 text-start">
            <div class="h-100 d-inline-flex align-items-center me-4">
                <small class="fa fa-map-marker-alt text-primary me-2"></small>
                <small>Jl. Raya PLP Curug, P.O.BOX 509, Tangerang 15820</small>
            </div>
            <div class="h-100 d-inline-flex align-items-center">
                <small class="far fa-envelope text-primary me-2"></small>
                <small>ppi@ppicurug.ac.id</small>
            </div>
        </div>
        <div class="col-lg-5 px-5 text-end">
            <div class="h-100 d-inline-flex align-items-center me-4">
                <small class="fa fa-phone-alt text-primary me-2"></small>
                <small>(021) 5982205</small>
            </div>
            <div class="h-100 d-inline-flex align-items-center mx-n2">
                <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href=""><i
                        class="fab fa-facebook-f"></i></a>
                <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href=""><i
                        class="fab fa-twitter"></i></a>
                <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href=""><i
                        class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-square btn-link rounded-0" href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
    <a href="/" class="navbar-brand d-flex align-items-center border-end px-4 px-lg-5">
        <h2 class="m-0"><img class="me-2" src="{{ asset('file/logo/Politeknik_Penerbangan_Surabaya.webp') }}" alt=""
                width="100"></h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="/" class="nav-item nav-link active">Home</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Profile</a>
                <div class="dropdown-menu bg-light m-0">
                    <a href="{{ route('sejarah') }}" class="dropdown-item">Sejarah</a>
                    <a href="{{ route('visimisi') }}" class="dropdown-item">Visi Misi</a>
                    <a href="{{ route('profile-lulusan') }}" class="dropdown-item">Profile Lulusan</a>
                    <a href="{{ route('video-profile-lulusan') }}" class="dropdown-item">Video Profile</a>
                    <a href="#" class="dropdown-item">Akreditasi</a>
                    <a href="#" class="dropdown-item">Serifikasi</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Akademik</a>
                <div class="dropdown-menu bg-light m-0">
                    <a href="{{ url('landing-kurikulum') }}" class="dropdown-item">Kurikulum</a>
                    <a href="{{ route('kalender') }}" class="dropdown-item">Kalender</a>
                    <a href="{{ route('staff-pengajar') }}" class="dropdown-item">Staff Pengajar</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Fasilitas</a>
                <div class="dropdown-menu bg-light m-0">
                    <a href="{{ url('landing-laboratorium') }}" class="dropdown-item">Laboratorium</a>
                    <a href="{{ url('landing-kelas') }}" class="dropdown-item">Kelas</a>
                    <a href="{{ url('landing-penunjang') }}" class="dropdown-item">Fasilitas Penunjang</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Keturunan</a>
                <div class="dropdown-menu bg-light m-0">
                    <a href="#" class="dropdown-item">Data Taruna</a>
                    <a href="{{ route('taruna') }}" class="dropdown-item">Prestasi</a>
                    <a href="{{ route('himpunan-taruna') }}" class="dropdown-item">Himpunan Taruna</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Research</a>
                <div class="dropdown-menu bg-light m-0">
                    <a href="{{ route('landing-penelitian') }}" class="dropdown-item">Penelitian</a>
                    <a href="{{ route('pkm') }}" class="dropdown-item">Pengabdian Kepada Masyarakat</a>
                    <a href="{{ route('jurnal') }}" class="dropdown-item">Publikasi Ilmiah</a>
                </div>
            </div>
            <a href="#" class="nav-item nav-link"><i class="fas fa-download"></i> Unduh</a>
        </div>
        <a href="{{ route('login') }}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Get Started<i
                class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>
<!-- Navbar End -->
