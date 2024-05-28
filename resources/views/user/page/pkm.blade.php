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
                <h4>Kegiatan PKM</h4>
            </center>
            <div class="card">
                <div class="card-header">Pengertian</div>
                <div class="card-body">
                    <p>
                        Pengabdian Masyarakat merupakan suatu media yang menghubungkan dunia pendidikan dengan
                        Masyarakat sekitar. Politeknik Penerbangan Indonesia Curug akan memberikan kegiatan berupa
                        pelatihan kepada masyarakat sebagai bentuk hilirisasi pengajaran beberapa matakuliah yang dapat
                        dirasakan manfaatnya oleh Masyarakat disekitar kampus PPI Curug.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12">
            <center>
                <h4>Daftar Kegiatan PKM</h4>
            </center>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach($kegiatanByTahun as $tahun => $kegiatan)
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="tab-{{ $tahun }}"
                        data-bs-toggle="tab" data-bs-target="#content-{{ $tahun }}" type="button" role="tab"
                        aria-controls="content-{{ $tahun }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{
                        $tahun }}</button>
                </li>
                @endforeach
            </ul>
            <div class="tab-content" id="myTabContent">
                @foreach($kegiatanByTahun as $tahun => $kegiatan)
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="content-{{ $tahun }}"
                    role="tabpanel" aria-labelledby="tab-{{ $tahun }}">
                    <div class="accordion" id="accordion-{{ $tahun }}">
                        @foreach($kegiatan as $index => $item)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-{{ $tahun }}-{{ $index }}">
                                <button class="accordion-button {{ $index == 0 ? '' : 'collapsed' }}" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse-{{ $tahun }}-{{ $index }}"
                                    aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                    aria-controls="collapse-{{ $tahun }}-{{ $index }}">
                                    {{ $item->nama }}
                                </button>
                            </h2>
                            <div id="collapse-{{ $tahun }}-{{ $index }}" class="accordion-collapse collapse"
                                aria-labelledby="heading-{{ $tahun }}-{{ $index }}"
                                data-bs-parent="#accordion-{{ $tahun }}">
                                <div class="accordion-body">
                                    <div>
                                        <h4>Rincian Kegiatan</h4>
                                    </div>
                                    <p>{{ $item->rincian_kegiatan }}</p>
                                    @if($item->foto->isNotEmpty())
                                    <div class="img-konten">
                                        @foreach($item->foto as $foto)
                                        <img src="{{ asset($foto->gambar) }}" alt="Gambar Kegiatan"
                                            class="img-fluid small-img">
                                        @endforeach
                                    </div>
                                    @endif
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
