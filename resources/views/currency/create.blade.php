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
                    <li class="breadcrumb-item"><a href="{{url('/currency')}}">Currency</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>
            <h4 class="page-title">Create a Currency</h4>
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
                            <a id="demo-btn-addrow" href="{{ route('currency.index') }}" class="btn btn-primary"><i class="mdi mdi-keyboard-backspace mr-2"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{route('currency.store')}}">
                    @csrf
                <div class="card-box">
                    <h4 class="card-title">Currency Information</h4>
                    @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div><br>@endif
                    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div><br>@endif
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="flag_img" class="col-form-label">Upload Flag</label>
                            <input class="form-control @if($errors->has('flag_img')) is-invalid @endif"
                                type="file" name="flag_img" id="flag_img" />
                            @if($errors->has('flag_img'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('flag_img') }}</strong>
                            </span>
                            @endif
                            <img src="" id="flag_img_tag" style="width:100%;margin-top: 10px"/>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputFirstname" class="col-form-label">Name</label>
                            <input class="form-control @if($errors->has('name')) is-invalid @endif"
                                    type="text" name="name" id="inputFirstname" value="{{ old('name') }}" placeholder="Name" />
                            @if($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputFirstname" class="col-form-label">Currency Code</label>
                            <input class="form-control @if($errors->has('code')) is-invalid @endif"
                                    type="text" name="code" id="inputFirstcode" value="{{ old('code') }}" placeholder="Code" />
                            @if($errors->has('code'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('code') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputFirstname" class="col-form-label">Buy Code</label>
                            <input class="form-control @if($errors->has('buy_code')) is-invalid @endif"
                                    type="text" name="buy_code" id="inputFirstbuy_code" value="{{ old('buy_code') }}" placeholder="Buy Code" />
                            @if($errors->has('buy_code'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('buy_code') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputFirstname" class="col-form-label">Sell Code</label>
                            <input class="form-control @if($errors->has('sell_code')) is-invalid @endif"
                                    type="text" name="sell_code" id="inputFirstsell_code" value="{{ old('sell_code') }}" placeholder="Sell Code" />
                            @if($errors->has('sell_code'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('sell_code') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="opening_balance" class="col-form-label">Opening Balance</label>
                            <input class="form-control @if($errors->has('opening_balance')) is-invalid @endif"
                                    type="number" step="0.00001" name="opening_balance" id="opening_balance" value="{{ old('opening_balance') }}" placeholder="Opening Balance" />
                            @if($errors->has('opening_balance'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('opening_balance') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="opening_avg_rate" class="col-form-label">Opening Average Rate</label>
                            <input class="form-control @if($errors->has('opening_avg_rate')) is-invalid @endif"
                                    type="number" step="0.00001" name="opening_avg_rate" id="opening_avg_rate" value="{{ old('opening_avg_rate') }}" placeholder="Opening Average Rate" />
                            @if($errors->has('opening_avg_rate'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('opening_avg_rate') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputCompanyname" class="col-form-label">Current Balance</label>
                            <input class="form-control @if($errors->has('current_balance')) is-invalid @endif"
                                    type="number"  step="0.00001" name="current_balance" id="current_balance" value="{{ old('current_balance') }}" placeholder="Current Balance" />
                            @if($errors->has('current_balance'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('current_balance') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="last_avg_rate" class="col-form-label">Last Average Rate</label>
                            <input class="form-control @if($errors->has('last_avg_rate')) is-invalid @endif"
                                    type="number" step="0.00001" name="last_avg_rate" id="last_avg_rate" value="{{ old('last_avg_rate') }}" placeholder="Last Average Rate" />
                            @if($errors->has('last_avg_rate'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('last_avg_rate') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="calc_type" class="col-form-label">Calculation Type</label>
                            <select name="calc_type" class="selectpicker show-tick @if($errors->has('calc_type')) is-invalid @endif"" data-style="btn-light">
                                <option value="Multiplication">Multiplication</option>
                                <option value="Division">Division</option>
                                <option value="Special">Division Special</option>
                            </select>
                            @if($errors->has('calc_type'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('calc_type') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <h5>Decimal Options</h5>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="bs_amount_dec_limit" class="col-form-label">Buy/Sell Amount</label>
                            <input class="form-control @if($errors->has('bs_amount_dec_limit')) is-invalid @endif"
                                    type="number" name="bs_amount_dec_limit" id="bs_amount_dec_limit" value="{{ old('bs_amount_dec_limit') }}" placeholder="Buy/Sell Amount" />
                            @if($errors->has('bs_amount_dec_limit'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('bs_amount_dec_limit') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-md-3">
                            <label for="avg_rate_dec_limit" class="col-form-label">Average Rate</label>
                            <input class="form-control @if($errors->has('avg_rate_dec_limit')) is-invalid @endif"
                                    type="number" name="avg_rate_dec_limit" id="avg_rate_dec_limit" value="{{ old('avg_rate_dec_limit') }}" placeholder="Average Rate" />
                            @if($errors->has('avg_rate_dec_limit'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('avg_rate_dec_limit') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-md-3">
                            <label for="balance_dec_limit" class="col-form-label">Balance</label>
                            <input class="form-control @if($errors->has('balance_dec_limit')) is-invalid @endif"
                                    type="number" name="balance_dec_limit" id="balance_dec_limit" value="{{ old('balance_dec_limit') }}" placeholder="Balance" />
                            @if($errors->has('balance_dec_limit'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('balance_dec_limit') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-md-3">
                            <label for="last_avg_rate_dec_limit" class="col-form-label">Last Average Rate</label>
                            <input class="form-control @if($errors->has('last_avg_rate_dec_limit')) is-invalid @endif"
                                    type="number" name="last_avg_rate_dec_limit" id="last_avg_rate_dec_limit" value="{{ old('last_avg_rate_dec_limit') }}" placeholder="Last Average Rate" />
                            @if($errors->has('last_avg_rate_dec_limit'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('last_avg_rate_dec_limit') }}</strong>
                            </span>
                            @endif
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
<script>
    function readURL(input, img_id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#' + img_id).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#flag_img").change(function(){
        readURL(this, "flag_img_tag");
    });
</script>
@endsection

@section('script-bottom')
<!-- init js -->
@endsection