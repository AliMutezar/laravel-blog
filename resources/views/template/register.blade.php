@extends('template.main')
@section('container')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <a class="navbar-brand fw-bolder" href="/">Logo</a>
                            </div>
                            <h4>Hello! let's create account</h4>
                            <h6 class="fw-light">Register and feel the sensation.</h6>

                            <form class="pt-3" action="/register" method="POST">
                                @csrf

                                <div class="form-group">
                                    <input type="text" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" placeholder="Your fullname" autofocus required>

                                    @error('name')
                                        <div class="invalid-feedback mb-3">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-lg @error('username') is-invalid @enderror" id="username" value="{{ old('username') }}" placeholder="Your username" required>
                                    @error('username')
                                        <div class="invalid-feedback mb-3">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}" required>

                                    @error('email')
                                        <div class="invalid-feedback mb-3">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                                    @error('password')
                                        <div class="invalid-feedback mb-3">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn mt-3" type="submit">Create Account</button>
                                </div>

                                <div class="text-start my-3 fw-light">
                                Already registed ?! <a href="/login" class="text-primary">Login</a>
                                </div>
                                <div class="text-start fw-light">
                                    <a href="/" class="text-primary text-decoration-none"> 
                                        <i class="mdi mdi-arrow-left me-2"></i>Back to home
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection