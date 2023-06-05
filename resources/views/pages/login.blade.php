<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SDN 02 Bengkulu</title>
    <link rel="stylesheet" href="{{ url('backend/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ url('backend/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ url('backend/vendors/base/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ url('backend/css/style.css') }}">
    <link rel="shortcut icon" href="{{ url('logo.png') }}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                @include('sweetalert::alert')
                <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left p-3">
                            <div class="brand-logo">
                                <img src="{{ url('logo-2.svg') }}" alt="logo">
                            </div>
                            <h4>Selamat Datang!!</h4>
                            <h6 class="font-weight-light">Masukkan email & password untuk lanjut</h6>
                            @if ($errors->all())
                                @foreach ($errors->all() as $item)
                                    <p class="text-danger text-small">{{ $item }}</p>
                                @endforeach
                            @endif
                            <form class="pt-3" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail">Username / Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-email text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg border-left-0" id="exampleInputEmail" placeholder="Username / Email" name="login" value="{{ old('login') }}" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-lock-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password" name="password" required>
                                    </div>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input" name="remember">
                                            Ingat Saya
                                        </label>
                                    </div>
                                </div>
                                <div class="my-3">
                                    <button type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 login-half-bg d-flex flex-row">
                        <p class="text-dark font-weight-bold text-center flex-grow align-self-end" style="font-size: 16px; color: #fff !important;">Copyright &copy;
                            SD Negeri 02 Bengkulu - 2023</p>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="{{ url('backend/vendors/base/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{ url('backend/js/off-canvas.js') }}"></script>
    <script src="{{ url('backend/js/hoverable-collapse.js') }}"></script>
    <script src="{{ url('backend/js/template.js') }}"></script>
    <!-- endinject -->
</body>

</html>
