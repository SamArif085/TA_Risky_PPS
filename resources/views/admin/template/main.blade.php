<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ isset($title) ? $title : '' }}</title>
    <!-- plugins: template css -->
    <link rel="stylesheet" href="{{ asset('template-admin/vendors/ti-icons/css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('template-admin/vendors/base/vendor.bundle.base.css') }}" />
    <link rel="stylesheet" href="{{ asset('template-admin/css/style.css') }}" />
    <link rel="shortcut icon" href="{{ asset('template-admin/images/favicon.png') }}" />
    @include('utils.head')
</head>

<body>

    <div class="container-scroller">
        @include('admin.template.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('admin.template.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    {!! isset($konten) ? $konten : '' !!}
                </div>
                @include('admin.template.footer')
            </div>
        </div>
    </div>
</body>

</html>
@include('utils.scripts')

<script src="{{ asset('template-admin/vendors/base/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('template-admin/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('template-admin/js/off-canvas.js') }}"></script>
<script src="{{ asset('template-admin/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('template-admin/js/template.js') }}"></script>
<script src="{{ asset('template-admin/js/todolist.js') }}"></script>
<script src="{{ asset('template-admin/js/dashboard.js') }}"></script>
<script src="{{ asset('boostrap/bootstrap.js') }}"></script>

<script src="{{ isset($js) ? $js : '' }}"></script>
<script src="{{ asset('utils/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('utils/datatable/dataTables.bootstrap4.min.js') }}"></script>

@yield('script')
