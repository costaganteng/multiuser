<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Selamat Datang kembali!</h1>
                        </div>
                        <form action="{{ route('login.aksi') }}" method="POST" class="user">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger mb-4">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <input name="email" type="email" class="form-control form-control-user" placeholder="Masukkan alamat email..." required>
                            </div>
                            <div class="form-group">
                                <input name="password" type="password" class="form-control form-control-user" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input name="remember" type="checkbox" class="custom-control-input" id="customCheck">
                                    <label class="custom-control-label" for="customCheck">Ingatkan saya</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Masokk..</button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="{{ route('register') }}">Buat Akun!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>

</html>
