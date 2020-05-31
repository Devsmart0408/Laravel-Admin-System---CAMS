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
                    <li class="breadcrumb-item"><a href="{{url('/cases')}}">Cases</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
            <h4 class="page-title">Edit a Case</h4>
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
                            <a id="demo-btn-addrow" href="{{ route('cases.index') }}" class="btn btn-primary"><i class="mdi mdi-keyboard-backspace mr-2"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{route('cases.update', $res_data->id)}}">
                    @csrf
                    @method('PATCH')
                <div class="card-box">
                    <h4 class="card-title">Case Information</h4>
                    @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div><br>@endif
                    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div><br>@endif
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputFirstname" class="col-form-label">Name</label>
                            <input class="form-control @if($errors->has('name')) is-invalid @endif"
                                    type="text" name="name" id="inputFirstname" value="{{ $res_data->name }}" placeholder="Name" />
                            @if($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="opening_balance" class="col-form-label">Opening Balance</label>
                            <input class="form-control @if($errors->has('opening_balance')) is-invalid @endif"
                                    type="number" step="0.00001" name="opening_balance" id="opening_balance" value="{{ $res_data->opening_balance }}" placeholder="Opening Balance" />
                            @if($errors->has('opening_balance'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('opening_balance') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputCompanyname" class="col-form-label">Current Balance</label>
                            <input class="form-control @if($errors->has('current_balance')) is-invalid @endif"
                                    type="number" step="0.00001" name="current_balance" id="current_balance" value="{{ $res_data->current_balance }}" placeholder="Current Balance" />
                            @if($errors->has('current_balance'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('current_balance') }}</strong>
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
@endsection

@section('script-bottom')
<!-- init js -->
@endsection