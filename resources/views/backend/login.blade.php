<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign In</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="{{ 'https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' }}"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style>
        .login-image {
            background: url("{{ asset('img/mosque.jpg') }}");
            background-position: center;
            background-size: cover;
        }

    </style>

</head>

<body class="bg-gradient-success">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center mt-lg-5 mt-sm-2 mt-md-2">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">{{ __('Sign In') }}</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="email">{{ __('E-Mail Address') }}</label>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                id="exampleInputEmail" aria-describedby="emailHelp" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus
                                                placeholder="Your email">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">{{ __('Password') }}</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password"
                                                id="exampleInputPassword" placeholder="Your password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="custom-control-label"
                                                    for="remember">{{ __('Remember Me') }}</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-block">
                                            {{ __('Sign In') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
