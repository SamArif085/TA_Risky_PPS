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
        <div class="col-3">
            <div class="list-group" id="list-tab" role="tablist">
                @foreach ($link as $key => $item)
                <a class="list-group-item list-group-item-action {{ $key == 0 ? 'active' : '' }}"
                    id="list-{{ $item['id'] }}-list" data-bs-toggle="list" href="#list-{{ $item['id'] }}"
                    role="tab" aria-controls="list-{{ $item['id'] }}">{{ $item['nama'] }}</a>
                @endforeach
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content" id="nav-tabContent">
                @foreach ($link as $key => $item)
                <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}" id="list-{{ $item['id'] }}"
                    role="tabpanel" aria-labelledby="list-{{ $item['id'] }}-list">
                    <h4>{{ $item['nama'] }}</h4>
                    <p>{{ $item['keterangan'] }}</p>
                    <img src="{{ asset($item['file']) }}" alt="Gambar Akreditasi" class="img-fluid">
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
