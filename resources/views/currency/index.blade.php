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
                    <li class="breadcrumb-item active">Currency</li>
                </ol>
            </div>
            <h4 class="page-title">Currency</h4>
        </div>
    </div>
</div>
<!-- end page title -->
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card-box">
            @if(session()->get('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                {{ session()->get('success') }}  
                </div><br />
             @endif
            <h4 class="header-title">Currency Management</h4>
            <p class="text-muted font-13 mb-4">
                Currency management
            </p>
            <div class="mb-2">
                <div class="row">
                    <div class="col-12 text-sm-center form-inline">
                        <div class="form-group mr-2">
                            <a id="demo-btn-addrow" href="{{ route('currency.create') }}" class="btn btn-primary"><i class="mdi mdi-plus-circle mr-2"></i> Add Currency</a>
                        </div>
                    </div>
                </div>
            </div>                

            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                <thead>
                    <tr>
                        <th data-sortable="false"></th>
                        <th data-sortable="false">Actions</th>
                        <th>Flag</th>
                        <th>Currency Name</th>
                        <th>Currency Code</th>
                        <th>Buy Code</th>
                        <th>Sell Code</th>
                        <th>Opening Balance</th>
                        <th>Opening Avg Rate</th>
                        <th>Current Balance</th>
                        <th>Last Avg Rate</th>
                        <th>Calculation Type</th>
                        <th>Buy Rate Limit From</th>
                        <th>Buy Rate Limit To</th>
                        <th>Sell Rate Limit From</th>
                        <th>Sell Rate Limit To</th>
                        <th>Buy/Sell Amount Decimal Limit</th>
                        <th>Average Rate Decimal Limit</th>
                        <th>Balance Decimal Limit</th>
                        <th>Last Average Rate Decimal Limit</th>
                        <th>Date Of Creation</th>
                        <th>Last Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($res_datas as $item)
                    <tr>
                        <td></td>
                        <td>
                            <form action="{{ route('currency.destroy', $item->id) }}" method="post">
                            <a href="{{ route('currency.edit',$item->id)}}" class="btn btn-primary waves-effect waves-light">Edit</a>
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger waves-effect waves-light">Delete</button>
                            </form>
                        </td>
                        <td><img src="{{ URL::to('/') }}/images/flag/{{ $item->flag_img }}" class="avatar-sm img-thumbnail"/></td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->code}}</td>
                        <td>{{$item->buy_code}}</td>
                        <td>{{$item->sell_code}}</td>
                        <td>{{number_format($item->opening_balance,5)}}</td>
                        <td>{{$item->opening_avg_rate}}</td>
                        <td>{{number_format($item->current_balance,5)}}</td>
                        <td>{{$item->last_avg_rate}}</td>
                        <td>{{$item->calc_type}}</td>
                        <td>{{$item->buy_rate_from}}</td>
                        <td>{{$item->buy_rate_to}}</td>
                        <td>{{$item->sell_rate_from}}</td>
                        <td>{{$item->sell_rate_to}}</td>
                        <td>{{$item->bs_amount_dec_limit}}</td>
                        <td>{{$item->avg_rate_dec_limit}}</td>
                        <td>{{$item->balance_dec_limit}}</td>
                        <td>{{$item->last_avg_rate_dec_limit}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->updated_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div><!-- end col -->
</div>
@endsection
@section('script')
@endsection
@section('script-bottom')
<!-- init js -->
@endsection