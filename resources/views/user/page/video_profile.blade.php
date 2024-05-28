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
                <h4>Video Profile Prodi TNU</h4>
            </center>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach ($link as $key => $video)
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $key == 0 ? 'active' : '' }}" id="tab-{{ $video->id }}"
                        data-bs-toggle="tab" data-bs-target="#video-{{ $video->id }}" type="button" role="tab"
                        aria-controls="video-{{ $video->id }}" aria-selected="{{ $key == 0 ? 'true' : 'false' }}">{{
                        $video->judul_video }}</button>
                </li>
                @endforeach
            </ul>
            <div class="tab-content" id="myTabContent">
                @foreach ($link as $key => $video)
                <div class="tab-pane fade{{ $key == 0 ? ' show active' : '' }}" id="video-{{ $video->id }}"
                    role="tabpanel" aria-labelledby="tab-{{ $video->id }}">
                    @if($video->video_id)
                    <div class="ratio ratio-16x9">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $video->video_id }}"
                            title="{{ $video->judul_video }}" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                        </iframe>
                    </div>
                    @else
                    <p>Invalid video URL</p>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
