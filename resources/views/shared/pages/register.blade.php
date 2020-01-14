<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="apple-touch-icon" sizes="180x180" href="https://laravel.com/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://laravel.com/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://laravel.com/img/favicon/favicon-16x16.png">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{ url('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i') }}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ url('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-light">

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card o-hidden border-0 shadow-lg" style="margin-top: 20%">
                    <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                        <div class="row">
                            {{-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> --}}
                            <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                </div>
                                <form class="user" method="POST" action="{{ url('/register') }}">
                                    @csrf

                                    <div class="form-group">

                                        <input 
                                            type="text" 
                                            class="form-control form-control-user {{ (isset(session('error')['first_name'])) ? 'is-invalid' : '' }}" 
                                            value="{{ old('first_name') }}" 
                                            name="first_name" 
                                            id="first_name" 
                                            placeholder="Firstname"
                                        />

                                        <div class="invalid-feedback">
                                            {{ (isset(session('error')['first_name'])) ? session('error')['first_name'][0] : '' }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input 
                                            type="text" 
                                            class="form-control form-control-user {{ (isset(session('error')['last_name'])) ? 'is-invalid' : '' }}" 
                                            value="{{ old('last_name') }}" 
                                            name="last_name" 
                                            id="last_name" 
                                            placeholder="Lastname"
                                        />
                                        <div class="invalid-feedback">
                                            {{ (isset(session('error')['last_name'])) ? session('error')['last_name'][0] : '' }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input 
                                            type="text" 
                                            class="form-control form-control-user {{ (isset(session('error')['contact_no'])) ? 'is-invalid' : '' }}" 
                                            value="{{ old('contact_no') }}" 
                                            name="contact_no" 
                                            id="contact_no" 
                                            placeholder="Contact No."
                                        />
                                        <div class="invalid-feedback">
                                            {{ (isset(session('error')['contact_no'])) ? session('error')['contact_no'][0] : '' }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input 
                                            type="email" 
                                            class="form-control form-control-user {{ (isset(session('error')['email'])) ? 'is-invalid' : '' }}" 
                                            value="{{ old('email') }}" 
                                            name="email" 
                                            id="email" 
                                            placeholder="Email"
                                        />
                                        <div class="invalid-feedback">
                                            {{ (isset(session('error')['email'])) ? session('error')['email'][0] : '' }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input 
                                                type="password" 
                                                class="form-control form-control-user {{ (isset(session('error')['password'])) ? 'is-invalid' : '' }}" 
                                                name="password" 
                                                id="password" 
                                                placeholder="Password"
                                            />
                                            <div class="invalid-feedback">
                                                {{ (isset(session('error')['password'])) ? session('error')['password'][0] : '' }}
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <input 
                                                type="password" 
                                                class="form-control form-control-user {{ (isset(session('error')['password_confirmation'])) ? 'is-invalid' : '' }}" 
                                                name="password_confirmation" 
                                                id="password_confirmation" 
                                                placeholder="Repeat Password"
                                            />
                                            <div class="invalid-feedback">
                                                {{ (isset(session('error')['password_confirmation'])) ? session('error')['password_confirmation'][0] : '' }}
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Register Account
                                    </button>
                                {{-- <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a> --}}
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ url('/login') }}">Already have an account? Login!</a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ url('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ url('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ url('assets/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
