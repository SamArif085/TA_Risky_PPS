<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Halaman Registrasi</title>
    <!-- plugins: template css -->
    <link rel="stylesheet" href="{{ asset('template-admin/vendors/ti-icons/css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('template-admin/vendors/base/vendor.bundle.base.css') }}" />
    <link rel="stylesheet" href="{{ asset('template-admin/css/style.css') }}" />
    <link rel="shortcut icon" href="{{ asset('template-admin/images/favicon.png') }}" />
    @include('utils.head')
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="{{ asset('file/logo/Politeknik_Penerbangan_Surabaya.webp') }}" alt="logo"
                                    width="100">
                            </div>
                            <h4>Hello! let's get started</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form class="pt-3" action="{{ url('registrasiStore') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="exampleInputEmail1"
                                        placeholder="Username" name="username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="Password" name="password">
                                </div>
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        href="{{ url('login-up') }}">DAFTAR</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    @include('utils.scripts')
    <script src="{{ asset('template-admin/vendors/base/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('template-admin/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('template-admin/js/off-canvas.js') }}"></script>
    <script src="{{ asset('template-admin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('template-admin/js/template.js') }}"></script>
    <script src="{{ asset('template-admin/js/todolist.js') }}"></script>
    <script src="{{ asset('template-admin/js/dashboard.js') }}"></script>



@if (session()->has('success'))
    <script>
        toastr.success(`{{ session('success') }}`);
    </script>
@endif
@if (session()->has('error'))
    <script>
        toastr.error(`{{ session('error') }}`);
        console.log(`{{ session('error') }}`);
    </script>
@endif
@if (count($errors) > 0)
    <script>
        toastr.error(`{{ $errors->first() }}`);
    </script>
@endif
    <!-- endinject -->
</body>

</html>
