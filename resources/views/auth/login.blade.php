@extends('layout.template.auth')
@section('content')
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
        <div class="container px-4">
        <a class="navbar-brand" href="/">
            <img src="{{asset('Argon/assets/img/brand/white.png')}}" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
            <div class="row">
                {{-- <div class="col-6 collapse-brand">
                <a href="../index.html">
                    <img src="../assets/img/brand/blue.png">
                </a>
                </div>
                <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                    <span></span>
                    <span></span>
                </button>
                </div> --}}
            </div>
            </div>
            <!-- Navbar items -->
        </div>
        </div>
    </nav>
    <div class="header bg-gradient-primary py-7 py-lg-8">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-6">
                            <h1 class="text-white" style="font-size: 50px; font-weight: bold">Tanya.!n</h1>
                            <p class="text-lead text-light">Kamu bertanya, Kami menjawab</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
    </div>
    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-header bg-transparent pb-3">
                        <div class="signin-image">
                            <div class="btn-wrapper text-center">
                                <a href="/register" class="btn btn-neutral btn-icon">
                                  {{-- <span class="btn-inner--icon"><img src="../assets/img/icons/common/github.svg"></span> --}}
                                  <span class="btn-inner--text" style="text-align: center">Buat Akun baru</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="signin-content" style="text-align: center">            
                            <div class="signin-form">
                                <h2 class="form-title">Login </h2>
                                <form method="POST" action="/postlogin" class="register-form" id="login-form">
                                    @csrf
            
                                    <div class="form-group">
                                        <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                        <input type="text" name="email" id="email" placeholder="Email" value="{{old('email')}}">
                                    </div>
                                    @error('email')
                                    <div class="invalid-feedback mt-2">{{ $message }}</div>
                                    @enderror
            
                                    <div class="form-group">
                                        <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                        <input type="password" name="password" id="password" placeholder="Password"/>
                                    </div>
                                    @error('password')
                                    <div class="invalid-feedback mt-2">{{ $message }}</div>
                                    @enderror
            
                                    @if (session('status'))
                                        <div class="alert alert-danger">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <input type="checkbox" name="rememberMe" id="remember-me" class="agree-term"/>
                                        <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember
                                            me</label>
                                    </div>
                                    <div class="form-group form-button">
                                        <input type="submit" class="btn btn-primary form-submit" value="Log in"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <section class="sign-in" style="margin-top: 8%">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="{{asset('Admin/images/signin-image.jpg')}}" alt="sing up image"></figure>
                    <a href="/register" class="signup-image-link">Create an account</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Login </h2>

                    <form method="POST" action="/postlogin" class="register-form" id="login-form">
                        @csrf

                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="email" id="email" placeholder="Email" value="{{old('email')}}">
                        </div>
                        @error('email')
                        <div class="invalid-feedback mt-2" style="margin-top: -8%">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="password" placeholder="Password"/>
                        </div>
                        @error('password')
                        <div class="invalid-feedback mt-2" style="margin-top: -8%">{{ $message }}</div>
                        @enderror

                        @if (session('status'))
                            <div class="alert alert-danger" style="margin-top: -8%">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <input type="checkbox" name="rememberMe" id="remember-me" class="agree-term"/>
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember
                                me</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" class="form-submit" value="Log in"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> --}}
@endsection

