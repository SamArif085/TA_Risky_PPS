<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item mb-3">
            <a class="nav-link" href="{{ url('dashboard') }}">
                <i class="ti-shield menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <p class="mx-2">Master</p>
        <li class="nav-item mb-3">
            <a class="nav-link" data-toggle="collapse" href="#menu-master" aria-expanded="false"
                aria-controls="menu-master">
                <i class="ti-palette menu-icon"></i>
                <span class="menu-title">Master Menu</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="menu-master">
                <ul class="nav flex-column sub-menu">
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('master.kurikulum') }}">
                            <span class="menu-title">Kurikulum</span>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('semester') }}">
                            <span class="menu-title">Semester</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('angkatan') }}">
                            <span class="menu-title">Angkatan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dosen') }}">
                            <span class="menu-title">Dosen</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('jenisDosen') }}">
                            <span class="menu-title">Jenis Dosen</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('masterAkademik') }}">
                            <span class="menu-title">Master Akademik</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tahunKegiatan') }}">
                            <span class="menu-title">Tahun Kegiatan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('jenisJurnal') }}">
                            <span class="menu-title">Jenis Jurnal</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kegiatan-prodi') }}">
                            <span class="menu-title">Kegiatan Prodi</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <p class="mx-2">Landing Page</p>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#menu1" aria-expanded="false" aria-controls="menu1">
                <i class="ti-palette menu-icon"></i>
                <span class="menu-title">Profile</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="menu1">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('akreditasi') }}">
                            <span class="menu-title">Akreditasi</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sertifikasi') }}">
                            <span class="menu-title">Sertifikasi</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('video-profile') }}">Video Profile</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#menu2" aria-expanded="false" aria-controls="menu2">
                <i class="ti-palette menu-icon"></i>
                <span class="menu-title">Akademik</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="menu2">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('akademik/kurikulum') }}">Kurikulum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('akademik/kalender') }}">Kalender</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('akademik/staff-pengajar') }}">Staff Pengajar</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#menu3" aria-expanded="false" aria-controls="menu3">
                <i class="ti-palette menu-icon"></i>
                <span class="menu-title">Fasilitas</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="menu3">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('laboratorium') }}">Laboratorium</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kelas') }}">Kelas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('penunjang') }}">Fasilitas Penunjang</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#menu4" aria-expanded="false" aria-controls="menu4">
                <i class="ti-palette menu-icon"></i>
                <span class="menu-title">Ketarunaan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="menu4">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ketarunaan/data-taruna') }}">Data Taruna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ketarunaan/prestasi') }}">Prestasi</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="pages/ui-features/typography.html">Himpunan Taruna</a>
                    </li> --}}
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#menu5" aria-expanded="false" aria-controls="menu5">
                <i class="ti-palette menu-icon"></i>
                <span class="menu-title">Research</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="menu5">
                <ul class="nav flex-column sub-menu">
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('penelitian') }}">Penelitian</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('laporan/TA-OJT') }}">Laporan Tugas Akhir <br> & OJT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pengabdian/masyarakat') }}">Pengabdian Kepada <br>
                            Masyarakat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('publikasi/ilmiah') }}">Publikasi Ilmiah</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
