<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h4 class="font-weight-bold mb-0">{{ $subtitle }}</h4>
            </div>
        </div>
    </div>
</div>

<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo text-center">
                            <img src="{{ asset('file/logo/Politeknik_Penerbangan_Surabaya.webp') }}" alt="logo"
                                width="100">
                        </div>
                        <h4 class="text-center">Setting User</h4>
                        <form class="pt-3" action="{{ route('settingUser.submit', $user->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control form-control-lg" id="username"
                                    placeholder="Username" name="username" value="{{ $user->username }}" autofocus
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" class="form-control form-control-lg" id="password"
                                    placeholder="Masukan new password disini" name="password">
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
