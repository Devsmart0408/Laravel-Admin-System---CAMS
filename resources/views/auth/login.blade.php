@extends('layouts.master-blank')
@section('content')
<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="text-center w-75 m-auto">
                            <a href="/">
                                <span><img src="{{ URL::asset('assets/images/logo-dark.png') }}" alt="" height="22"></span>
                            </a>
                            <p class="text-muted mb-4 mt-3">Enter your email address and password to access admin panel.</p>
                        </div>
                        @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div><br>@endif
                        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div><br>@endif
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="emailaddress">Email address</label>
                                <input class="form-control @if($errors->has('email')) is-invalid @endif" type="email" id="emailaddress" name="email" value="{{ old('email') }}" placeholder="Enter your email" autofocus />
                                @if($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input class="form-control @if($errors->has('password')) is-invalid @endif" type="password" name="password" id="password" placeholder="Enter your password">
                                @if($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
<!-- 
                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" id="checkbox-signin" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div> -->

                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                            </div>
                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->
                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p>
                            @if (Route::has('password.request'))
                            <a class="text-muted ml-1" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </p>
                        <p class="text-muted">Don't have an account? <a href="/register" class="text-primary font-weight-medium ml-1">Sign Up</a></p>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<footer class="footer footer-alt">
    {{date('Y') - 1}} - {{ date('Y') }} &copy; Minton theme by <a href="" class="text-muted">Coderthemes</a>
</footer>
@endsection