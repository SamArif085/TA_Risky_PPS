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
                <h4>JURNAL DOSEN</h4>
            </center>
            <ul class="nav nav-tabs" id="myTabDosen" role="tablist">
                @php
                $uniqueDosen = $link->where('id_jenis_jurnal', '!=', 2)->unique('nama'); // Filter jurnal bukan taruna
                @endphp
                @foreach($uniqueDosen as $dosen)
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="dosen-tab-{{ $dosen->id }}"
                        data-bs-toggle="tab" data-bs-target="#dosen-panel-{{ $dosen->id }}" type="button" role="tab"
                        aria-controls="dosen-panel-{{ $dosen->id }}"
                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                        {{ $dosen->nama }}
                    </button>
                </li>
                @endforeach
            </ul>
            <div class="tab-content" id="myTabDosenContent">
                @foreach($uniqueDosen as $dosen)
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="dosen-panel-{{ $dosen->id }}"
                    role="tabpanel" aria-labelledby="dosen-tab-{{ $dosen->id }}">
                    <div class="accordion" id="dosen-accordion-{{ $dosen->id }}">
                        @foreach($link->where('nama', $dosen->nama)->where('id_jenis_jurnal', '!=', 2) as $jurnal)
                        <!-- Filter jurnal bukan taruna -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="dosen-heading-{{ $jurnal->id }}">
                                <button class="accordion-button text-dark" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#dosen-collapse-{{ $jurnal->id }}" aria-expanded="true"
                                    aria-controls="dosen-collapse-{{ $jurnal->id }}">
                                    {{ $jurnal->judul_jurnal }}
                                </button>
                            </h2>
                            <div id="dosen-collapse-{{ $jurnal->id }}" class="accordion-collapse collapse"
                                aria-labelledby="dosen-heading-{{ $jurnal->id }}"
                                data-bs-parent="#dosen-accordion-{{ $dosen->id }}">
                                <div class="accordion-body">
                                    <strong><a href="{{ $jurnal->link_jurnal }}" target="_blank">Open Link</a></strong>
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
                <h4>JURNAL TARUNA</h4>
            </center>
            <ul class="nav nav-tabs" id="myTabTaruna" role="tablist">
                @php
                $uniqueTaruna = $link->where('id_jenis_jurnal', 2)->unique('nama'); // Filter hanya jurnal taruna
                @endphp
                @foreach($uniqueTaruna as $taruna)
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="taruna-tab-{{ $taruna->id }}"
                        data-bs-toggle="tab" data-bs-target="#taruna-panel-{{ $taruna->id }}" type="button" role="tab"
                        aria-controls="taruna-panel-{{ $taruna->id }}"
                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                        {{ $taruna->nama }}
                    </button>
                </li>
                @endforeach
            </ul>
            <div class="tab-content" id="myTabTarunaContent">
                @foreach($uniqueTaruna as $taruna)
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="taruna-panel-{{ $taruna->id }}"
                    role="tabpanel" aria-labelledby="taruna-tab-{{ $taruna->id }}">
                    <div class="accordion" id="taruna-accordion-{{ $taruna->id }}">
                        @foreach($link->where('nama', $taruna->nama)->where('id_jenis_jurnal', 2) as $jurnal)
                        <!-- Filter hanya jurnal taruna -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="taruna-heading-{{ $jurnal->id }}">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#taruna-collapse-{{ $jurnal->id }}" aria-expanded="true"
                                    aria-controls="taruna-collapse-{{ $jurnal->id }}">
                                    {{ $jurnal->judul_jurnal }}
                                </button>
                            </h2>
                            <div id="taruna-collapse-{{ $jurnal->id }}" class="accordion-collapse collapse"
                                aria-labelledby="taruna-heading-{{ $jurnal->id }}"
                                data-bs-parent="#taruna-accordion-{{ $taruna->id }}">
                                <div class="accordion-body">
                                    <strong><a href="{{ $jurnal->link_jurnal }}" target="_blank">Open Link</a></strong>
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
