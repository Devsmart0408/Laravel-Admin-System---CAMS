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
                            <p class="text-muted mb-4 mt-3">Don't have an account? Create your own account, it takes less than a minute</p>
                        </div>

                        @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div><br>@endif
                        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div><br>@endif

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="fullname">Full Name</label>
                                <input class="form-control @if($errors->has('name')) is-invalid @endif"" type="text" name="name" id="fullname" value="{{ old('username') }}" placeholder="Enter your name" />
                                @if($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="emailaddress">Email address</label>
                                <input class="form-control @if($errors->has('email')) is-invalid @endif"" type="email" id="emailaddress" name="email" value="{{ old('email') }}" placeholder="Enter your email" />
                                @if($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control @if($errors->has('password')) is-invalid @endif"" type="password" name="password" id="password" placeholder="Enter your password" />
                                @if($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            
                            <div class="form-group mt-3 mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit"> Sign Up </button>
                            </div>

                        </form>

                        <!-- <div class="text-center">
                            <h5 class="mt-3 text-muted">Sign up using</h5>
                            <ul class="social-list list-inline mt-3 mb-0">
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github-circle"></i></a>
                                </li>
                            </ul>
                        </div> -->

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted">Already have account? <a href="pages-login" class="font-weight-medium ml-1">Sign In</a></p>
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