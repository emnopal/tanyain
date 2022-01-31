@extends('layout.template.auth')
@section('content')
    <!-- Sign up form -->
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
                                <a href="/login" class="btn btn-neutral btn-icon">
                                  {{-- <span class="btn-inner--icon"><img src="../assets/img/icons/common/github.svg"></span> --}}
                                  <span class="btn-inner--text" style="text-align: center">Login</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="signup-content" style="text-align: center">
                            <div class="signup-form">
                                <h2 class="form-title">Buat Akun baru</h2>
                                <form method="POST" action="/postregister" class="register-form" id="register-form">
                                    @csrf
                                    <input type="hidden" class="hidden" value="user" name="role">
                
                                    <div class="form-group">
                                        <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                        <input type="text" name="username" id="username" placeholder="Username"
                                        value="{{old('username')}}">
                                    </div>
                                    @error('username')
                                    <div class="invalid-feedback mt-2">{{ $message }}</div>
                                    @enderror
                
                                    <div class="form-group">
                                        <label for="nama"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                        <input type="text" name="nama" id="nama" placeholder="Nama"
                                        value="{{old('nama')}}">
                                    </div>
                                    @error('nama')
                                    <div class="invalid-feedback mt-2">{{ $message }}</div>
                                    @enderror
                
                                    <div class="form-group">
                                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                                        <input type="email" name="email" id="email" placeholder="Email"
                                        value="{{old('email')}}">
                                    </div>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                
                                    <div class="form-group">
                                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                        <input type="password" name="password" id="pass" placeholder="Password"/>
                                    </div>
                                    @error('password')
                                    <div class="invalid-feedback ">{{ $message }}</div>
                                    @enderror
                                    @if (session('status'))
                                        <div class="alert alert-danger">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                
                                    <div class="form-group">
                                        <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                        <input type="password" name="password2" id="re_pass" placeholder="Repeat your password"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" name="agreeterm" id="agree-term" class="agree-term"/>
                                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                                            statements in <a href="#" class="term-service">Terms of service</a></label>
                                    </div>
                
                                    @if (session('status1'))
                                        <div class="alert alert-danger">
                                            {{ session('status1') }}
                                        </div>
                                    @endif
                                    <div class="form-group form-button">
                                        <input type="submit" name="signup" id="signup" class="form-submit btn btn-primary" value="Register"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- <section class="signup" style="margin-top: 8%">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Sign up</h2>
                <form method="POST" action="/postregister" class="register-form" id="register-form">
                    @csrf
                    <input type="hidden" class="hidden" value="user" name="role">

                    <div class="form-group">
                        <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="username" id="username" placeholder="Username"
                        value="{{old('username')}}">
                    </div>
                    @error('username')
                    <div class="invalid-feedback mt-2" style="margin-top: -8%">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="nama"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="nama" id="nama" placeholder="Nama"
                        value="{{old('nama')}}">
                    </div>
                    @error('nama')
                    <div class="invalid-feedback mt-2" style="margin-top: -8%">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="Email"
                        value="{{old('email')}}">
                    </div>
                    @error('email')
                    <div class="invalid-feedback" style="margin-top: -8%">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" id="pass" placeholder="Password"/>
                    </div>
                    @error('password')
                    <div class="invalid-feedback " style="margin-top: -8%">{{ $message }}</div>
                    @enderror
                    @if (session('status'))
                        <div class="alert alert-danger" style="margin-top: -8%">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                        <input type="password" name="password2" id="re_pass" placeholder="Repeat your password"/>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="agreeterm" id="agree-term" class="agree-term"/>
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                            statements in <a href="#" class="term-service">Terms of service</a></label>
                    </div>

                    @if (session('status1'))
                        <div class="alert alert-danger text-danger" style="margin-top: -8%">
                            {{ session('status1') }}
                        </div>
                    @endif
                    <div class="form-group form-button">
                        <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                    </div>
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="{{asset('Admin/images/signup-image.jpg')}}" alt="sing up image"></figure>
                <a href="/" class="signup-image-link">I am already member</a>
            </div>
        </div>
    </div> 
    </section>--}}