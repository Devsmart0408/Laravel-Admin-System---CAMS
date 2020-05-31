@extends('layouts.master')
@section('css')
@endsection
@section('breadcrumb')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{url('/customers')}}">Currency Transactions</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/customers')}}">Customers</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>
            <h4 class="page-title">Create a Customer</h4>
        </div>
    </div>
</div>
<!-- end page title -->
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card-box">
            <div class="mb-2">
                <div class="row">
                    <div class="col-12 text-sm-center form-inline">
                        <div class="form-group mr-2">
                            <a id="demo-btn-addrow" href="{{ route('customers.index') }}" class="btn btn-primary"><i class="mdi mdi-keyboard-backspace mr-2"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{route('customers.store')}}" enctype="multipart/form-data">
                <div class="card-box">
                    <h4 class="card-title">Personal Information</h4>
                    @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div><br>@endif
                    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div><br>@endif
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                @csrf
                                <label for="inputFirstname" class="col-form-label">First Name</label>
                                <input class="form-control @if($errors->has('first_name')) is-invalid @endif"
                                       type="text" name="first_name" id="inputFirstname" value="{{ old('first_name') }}" placeholder="First Name" />
                                @if($errors->has('first_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="last_name" class="col-form-label">Last Name</label>
                                <input class="form-control @if($errors->has('last_name')) is-invalid @endif"
                                       type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" placeholder="Last Name" />
                                @if($errors->has('last_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputCompanyname" class="col-form-label">Company Name</label>
                                <input class="form-control @if($errors->has('company_name')) is-invalid @endif"
                                       type="text" name="company_name" id="company_name" value="{{ old('company_name') }}" placeholder="Company Name" />
                                @if($errors->has('company_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('company_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="customer_code" class="col-form-label">Customer Code</label>
                                <input class="form-control @if($errors->has('customer_code')) is-invalid @endif"
                                       type="text" name="customer_code" id="customer_code" value="{{ old('customer_code') }}" placeholder="Customer Code" />
                                @if($errors->has('customer_code'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('customer_code') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="phone" class="col-form-label">Phone</label>
                                <input class="form-control @if($errors->has('phone')) is-invalid @endif"
                                       type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Phone" />
                                @if($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="fax" class="col-form-label">Fax</label>
                                <input class="form-control @if($errors->has('fax')) is-invalid @endif"
                                       type="text" name="fax" id="fax" value="{{ old('fax') }}" placeholder="Fax" />
                                @if($errors->has('fax'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('fax') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="mobile" class="col-form-label">Mobile</label>
                                <input class="form-control @if($errors->has('mobile')) is-invalid @endif"
                                       type="text" name="mobile" id="mobile" value="{{ old('mobile') }}" placeholder="Mobile" />
                                @if($errors->has('mobile'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('mobile') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email" class="col-form-label">Email</label>
                                <input class="form-control @if($errors->has('email')) is-invalid @endif"
                                       type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email" />
                                @if($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-form-label">Birthday</label>
                                <div class="input-group">
                                    <input type="text" name="birthday" id="birthday" value="{{ old('birthday') }}" class="form-control" @if($errors->has('birthday')) is-invalid @endif" 
                                            data-provide="datepicker" data-date-autoclose="true" data-date-format="yyyy-mm-dd">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="ti-calendar"></i></span>
                                    </div>
                                    @if($errors->has('birthday'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="eco_ben" class="col-form-label">Economic Beneficiary</label>
                                <input class="form-control @if($errors->has('eco_ben')) is-invalid @endif"
                                       type="text" name="eco_ben" id="eco_ben" value="{{ old('eco_ben') }}" placeholder="Economic Beneficiary" />
                                @if($errors->has('eco_ben'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('eco_ben') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="address" class="col-form-label">Address</label>
                                <input class="form-control @if($errors->has('address')) is-invalid @endif"
                                       type="text" name="address" id="address" value="{{ old('address') }}" placeholder="Address" />
                                @if($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="city" class="col-form-label">City</label>
                                <input class="form-control @if($errors->has('city')) is-invalid @endif"
                                       type="text" name="city" id="city" value="{{ old('city') }}" placeholder="City" />
                                @if($errors->has('city'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="country" class="col-form-label">Country</label>
                                <input class="form-control @if($errors->has('country')) is-invalid @endif"
                                       type="text" name="country" id="country" value="{{ old('country') }}" placeholder="Country" />
                                @if($errors->has('country'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('country') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="password" class="col-form-label">Password</label>
                                <input class="form-control @if($errors->has('password')) is-invalid @endif"
                                       type="password" name="password" id="password" value="{{ old('password') }}" placeholder="password" />
                                @if($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    <h4 class="card-title mt-3">Primary Information</h4>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="name_id" class="col-form-label">Name On ID</label>
                                <input class="form-control @if($errors->has('name_id')) is-invalid @endif"
                                        type="text" name="name_id" id="name_id" value="{{ old('name_id') }}" placeholder="Name On ID" />
                                @if($errors->has('name_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="id_type" class="col-form-label">ID Type</label>
                                <input class="form-control @if($errors->has('id_type')) is-invalid @endif"
                                        type="text" name="id_type" id="id_type" value="{{ old('id_type') }}" placeholder="ID Type" />
                                @if($errors->has('id_type'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('id_type') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="id_number" class="col-form-label">ID Number</label>
                                <input class="form-control @if($errors->has('id_number')) is-invalid @endif"
                                        type="text" name="id_number" id="id_number" value="{{ old('id_number') }}" placeholder="ID Number" />
                                @if($errors->has('id_number'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('id_number') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="place_issue" class="col-form-label">Place of Issue</label>
                                <input class="form-control @if($errors->has('place_issue')) is-invalid @endif"
                                       type="text" name="place_issue" id="place_issue" value="{{ old('place_issue') }}" placeholder="Place Of Issue" />
                                @if($errors->has('place_issue'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('place_issue') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <label for="place_birthday" class="col-form-label">Place of Birth</label>
                                <input class="form-control @if($errors->has('place_birthday')) is-invalid @endif"
                                       type="text" name="place_birthday" id="place_birthday" value="{{ old('place_birthday') }}" placeholder="Place of Birthday" />
                                @if($errors->has('place_birthday'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('place_birthday') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <label for="national" class="col-form-label">Natinoality</label>
                                <input class="form-control @if($errors->has('national')) is-invalid @endif"
                                       type="text" name="national" id="national" value="{{ old('national') }}" placeholder="national" />
                                @if($errors->has('national'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('national') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <label class="col-form-label">Expire Date</label>
                                <div class="input-group">
                                    <input type="text" name="expire_date" id="expire_date" value="{{ old('expire_date') }}" class="form-control" @if($errors->has('expire_date')) is-invalid @endif" 
                                            data-provide="datepicker" data-date-autoclose="true" data-date-format="yyyy-mm-dd">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="ti-calendar"></i></span>
                                    </div>
                                    @if($errors->has('expire_date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('expire_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="id_img" class="col-form-label">Upload ID Image</label>
                                <input class="form-control @if($errors->has('id_img')) is-invalid @endif"
                                       type="file" name="id_img" id="id_img"  />
                                @if($errors->has('id_img'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('id_img') }}</strong>
                                </span>
                                @endif
                                <img src="" id="id-img-tag" style="width:100%;margin-top: 10px"/>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="company_img" class="col-form-label">Company Image</label>
                                <input class="form-control @if($errors->has('company_img')) is-invalid @endif"
                                       type="file" name="company_img" id="company_img"  />
                                @if($errors->has('company_img'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('company_img') }}</strong>
                                </span>
                                @endif
                                <img src="" id="company-img-tag" style="width:100%;margin-top: 10px"/>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="mix_img" class="col-form-label">Upload Mixed Image</label>
                                <input class="form-control @if($errors->has('mix_img')) is-invalid @endif"
                                       type="file" name="mix_img" id="mix_img" />
                                @if($errors->has('mix_img'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('mix_img') }}</strong>
                                </span>
                                @endif
                                <img src="" id="mix-img-tag" style="width:100%;margin-top: 10px"/>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div><!-- end col -->
</div>

@endsection
@section('script')
<script type="text/javascript">
    function readURL(input, img_id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#' + img_id).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#id_img").change(function(){
        readURL(this, "id-img-tag");
    });
    $("#mix_img").change(function(){
        readURL(this, "mix-img-tag");
    });
    $("#company_img").change(function(){
        readURL(this, "company-img-tag");
    });

</script>
@endsection

@section('script-bottom')
<!-- init js -->
@endsection