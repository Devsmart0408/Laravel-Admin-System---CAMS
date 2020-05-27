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
                            <p class="text-muted mb-4 mt-3">Enter your new password below</p>
                        </div>
                        @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div><br>@endif
                        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div><br>@endif

                        <form action="{{ route('password.update') }}" method="post">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group mb-3">
                                <label for="emailaddress">Email address</label>
                                <input class="form-control @if($errors->has('email')) is-invalid @endif" name="email" type="email" id="emailaddress" placeholder="Enter your email" />
                                @if($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label for="emailaddress">Password</label>
                                <input class="form-control @if($errors->has('password')) is-invalid @endif" name="password" type="password" id="password" placeholder="Enter password" />
                                @if($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label for="emailaddress">Password Confirmation</label>
                                <input class="form-control @if($errors->has('password_confirmation')) is-invalid @endif" name="password_confirmation" type="password" id="password_confirmation" placeholder="Enter Confirm password" />
                                @if($errors->has('password_confirmation'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>


                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit"> Reset Password </button>
                            </div>
                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted">Back to <a href="/login" class="text-muted font-weight-medium ml-1">Log in</a></p>
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