<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ isset($title) ? $title : '' }}</title>

    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('template-landing-page/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template-landing-page/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template-landing-page/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template-landing-page/css/style.css') }}" rel="stylesheet">

    @include('utils.head')
</head>

<body>
    @include('user.template.navbar')
    {!! isset($konten) ? $konten : '' !!}
    @include('user.template.footer')
</body>

</html>




@include('utils.scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('template-landing-page/lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('template-landing-page/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('template-landing-page/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('template-landing-page/lib/owlcarousel/owl.carousel.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('template-landing-page/js/main.js') }}"></script>
<script src="{{ isset($js) ? $js : '' }}"></script>
@yield('script')
<script>
    $(document).ready(function () {
    $('#kegiatanCarousel').carousel({
        interval: 3000,
        pause: 'hover',
        wrap: true
    });
});

$(document).ready(function () {
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        dots: false,
        autoplay: false,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2
            },
            768: {
                items: 3
            },
            992: {
                items: 4
            }
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var teamItems = document.querySelectorAll('.team-item .a img');

    teamItems.forEach(function(img) {
        img.addEventListener('load', function() {
            if (this.naturalWidth > this.naturalHeight) {
                this.classList.add('landscape');
                this.classList.remove('portrait');
            } else {
                this.classList.add('portrait');
                this.classList.remove('landscape');
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var teamItems = document.querySelectorAll('.team-item .bg-light.b');

    teamItems.forEach(function(item) {
        var textContainer = item.querySelector('h5');
        var text = textContainer.textContent.trim();
        var maxWidth = 20;
        var words = text.split(' ');
        var lines = [];
        var currentLine = '';

        words.forEach(function(word, index) {
            if (currentLine.length + word.length <= maxWidth || index === 0) {
                currentLine += (currentLine ? ' ' : '') + word;
            } else {
                lines.push(currentLine);
                currentLine = word;
            }
        });

        lines.push(currentLine);

        textContainer.innerHTML = lines.join('<br>');
    });
});

function getTextWidth(text, font) {
    var canvas = getTextWidth.canvas || (getTextWidth.canvas = document.createElement('canvas'));
    var context = canvas.getContext('2d');
    context.font = font;
    var metrics = context.measureText(text);
    return metrics.width;
}

</script>
