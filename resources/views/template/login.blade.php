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
                            <h4>Hello! let's get started</h4>
                            <h6 class="fw-light">Login to continue.</h6>

                                {{-- Flash Message --}}
                                @if (session()->has('success'))
                                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                    {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                @if (session()->has('loginError'))
                                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                    {{ session('loginError') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                            <form class="pt-3" action="/login" method="POST">
                                @csrf

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}" autofocus required>

                                    @error('email')
                                        <div class="invalid-feedback mb-3">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn mt-3" type="submit">Login</button>
                                </div>

                                <div class="text-start my-3 fw-light">
                                Don't have an account? 
                                    <a href="/register" class="text-primary">Create</a>
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