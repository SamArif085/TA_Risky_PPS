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
