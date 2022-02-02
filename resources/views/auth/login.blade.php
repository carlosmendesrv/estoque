<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}" defer></script>
    <script src="{{ asset('assets/libs/bootstrap/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('assets/libs/metismenu/metismenu.min.js') }}" defer></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}" defer></script>
    <script src="{{ asset('assets/libs/node-waves/node-waves.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/app.min.js') }}" defer></script>
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">
    {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
</head>
<body>
<div>
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-lg-4">
                <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                    <div class="w-100">
                        <div class="row justify-content-center">
                            <div class="col-lg-9">
                                <div>
                                    <div class="text-center">
                                        <div>
                                            <a href="#" class="logo"><img
                                                    src="https://d21wiczbqxib04.cloudfront.net/bMmozjxfCDqWIiTyUSR7KSF0mAI=/600x0/smart/https://osuper-ecommerce-campeao.s3-sa-east-1.amazonaws.com/b01d772a-Logo-Campeao-redu.png"
                                                    height="50" alt="logo"></a>
                                        </div>
                                        <h4 class="font-size-18 mt-4">Seja Bem Vindo !</h4>
                                        <p class="text-muted">Acesso Restrito</p>
                                    </div>

                                    <div class="p-2 mt-5">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div class="form-group auth-form-group-custom mb-4">
                                                <i class="ri-user-2-line auti-custom-input-icon"></i>
                                                <label for="email">Endereço de Email</label>
                                                <input id="email" type="email"
                                                       class="form-control @error('email') is-invalid @enderror"
                                                       name="email"
                                                       value="{{ old('email') }}" required autocomplete="email"
                                                       autofocus>

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="form-group auth-form-group-custom mb-4">
                                                <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                                <label for="password">Senha</label>
                                                <input type="password"
                                                       class="form-control @error('password') is-invalid @enderror"
                                                       name="password" required
                                                       autocomplete="current-password" id="password">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                 </span>
                                                @enderror
                                            </div>

                                            <div class="mt-4 text-center">
                                                <button class="btn btn-primary w-md waves-effect waves-light"
                                                        type="submit">Entrar
                                                </button>
                                            </div>

                                        </form>
                                    </div>

                                    <div class="mt-5 text-center">
                                           2021 - <script>document.write(new Date().getFullYear())</script>
                                             Desenvolvido por <b>NewTech</b>
                                             com <i class="mdi mdi-heart text-danger"></i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="authentication-bg">
                    <div class="bg-overlay"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
