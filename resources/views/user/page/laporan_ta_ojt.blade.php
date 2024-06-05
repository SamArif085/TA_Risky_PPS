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
                <h4>Laporan Tugas Akhir</h4>
            </center>
            <ul class="nav nav-tabs" id="myTabtugasTa" role="tablist">
                @php
                $uniquetugasTa = $link->where('kategori', '!=', 2)->unique('angkatan');
                @endphp
                @foreach($uniquetugasTa as $tugasTA)
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="tugasTA-tab-{{ $tugasTA->id }}"
                        data-bs-toggle="tab" data-bs-target="#tugasTA-panel-{{ $tugasTA->angkatan }}" type="button" role="tab"
                        aria-controls="tugasTA-panel-{{ $tugasTA->angkatan }}"
                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                        {{ $tugasTA->Angkatan['angkatan'] }}
                    </button>
                </li>
                @endforeach
            </ul>
            <div class="tab-content" id="myTabtugasTaContent">
                @foreach($uniquetugasTa as $tugasTA)
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="tugasTA-panel-{{ $tugasTA->angkatan }}"
                    role="tabpanel" aria-labelledby="tugasTA-tab-{{ $tugasTA->id }}">
                    <div class="accordion" id="tugasTA-accordion-{{ $tugasTA->angkatan }}">
                        @foreach($link->where('angkatan', $tugasTA->angkatan)->where('kategori', '!=', 2) as $jurnal)
                        <!-- Filter jurnal bukan ojt -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="tugasTA-heading-{{ $jurnal->id }}">
                                <button class="accordion-button text-dark" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#tugasTA-collapse-{{ $jurnal->id }}" aria-expanded="true"
                                    aria-controls="tugasTA-collapse-{{ $jurnal->id }}">
                                    {{ $jurnal->nama }} - {{ $jurnal->judul }} - {{ $jurnal->tahun }}
                                </button>
                            </h2>
                            <div id="tugasTA-collapse-{{ $jurnal->id }}" class="accordion-collapse collapse"
                                aria-labelledby="tugasTA-heading-{{ $jurnal->id }}"
                                data-bs-parent="#tugasTA-accordion-{{ $tugasTA->angkatan }}">
                                <div class="accordion-body">
                                    <strong><a href="{{ $jurnal->file }}" target="_blank">Open Link</a></strong>
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

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <center>
                <h4>Laporan OJT</h4>
            </center>
            <ul class="nav nav-tabs" id="myTabojt" role="tablist">
                @php
                $uniqueojt = $link->where('kategori', 2)->unique('angkatan'); // Menggunakan 'angkatan' sebagai kriteria unik
                @endphp
                @foreach($uniqueojt as $ojt)
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="ojt-tab-{{ $ojt->id }}"
                        data-bs-toggle="tab" data-bs-target="#ojt-panel-{{ $ojt->angkatan }}" type="button" role="tab"
                        aria-controls="ojt-panel-{{ $ojt->angkatan }}"
                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                        {{ $ojt->Angkatan['angkatan'] }}
                    </button>
                </li>
                @endforeach
            </ul>
            <div class="tab-content" id="myTabojtContent">
                @foreach($uniqueojt as $ojt)
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="ojt-panel-{{ $ojt->angkatan }}"
                    role="tabpanel" aria-labelledby="ojt-tab-{{ $ojt->id }}">
                    <div class="accordion" id="ojt-accordion-{{ $ojt->angkatan }}">
                        @foreach($link->where('angkatan', $ojt->angkatan)->where('kategori', 2) as $jurnal)
                        <!-- Filter hanya jurnal ojt -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="ojt-heading-{{ $jurnal->id }}">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#ojt-collapse-{{ $jurnal->id }}" aria-expanded="true"
                                    aria-controls="ojt-collapse-{{ $jurnal->id }}">
                                    {{ $jurnal->nama }} - {{ $jurnal->judul }} - {{ $jurnal->tahun }}
                                </button>
                            </h2>
                            <div id="ojt-collapse-{{ $jurnal->id }}" class="accordion-collapse collapse"
                                aria-labelledby="ojt-heading-{{ $jurnal->id }}"
                                data-bs-parent="#ojt-accordion-{{ $ojt->angkatan }}">
                                <div class="accordion-body">
                                    <strong><a href="{{ $jurnal->file }}" target="_blank">Open Link</a></strong>
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
