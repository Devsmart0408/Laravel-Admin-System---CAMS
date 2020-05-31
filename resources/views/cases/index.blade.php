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
                    <li class="breadcrumb-item active">Case</li>
                </ol>
            </div>
            <h4 class="page-title">Case</h4>
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
            <h4 class="header-title">Case Management</h4>
            <p class="text-muted font-13 mb-4">
                case management
            </p>
            @if ($count == 0)
                <div class="mb-2">
                    <div class="row">
                        <div class="col-12 text-sm-center form-inline">
                            <div class="form-group mr-2">
                                <a id="demo-btn-addrow" href="{{ route('cases.create') }}" class="btn btn-primary"><i class="mdi mdi-plus-circle mr-2"></i> Add Customer</a>
                            </div>
                        </div>
                    </div>
                </div>                
            @endif

            <table class="table table-striped dt-responsive nowrap">
                <thead>
                    <tr>
                        <th data-sortable="false"></th>
                        <th>Name</th>
                        <th>Opening Balance</th>
                        <th>Current Balance</th>
                        <th data-sortable="false">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cases as $item)
                    <tr>
                        <td></td>
                        <td>{{$item->name}}</td>
                        <td>{{number_format($item->opening_balance,5)}}</td>
                        <td>{{number_format($item->current_balance,5)}}</td>
                        <td>
                            <form action="{{ route('cases.destroy', $item->id) }}" method="post">
                            <a href="{{ route('cases.edit',$item->id)}}" class="btn btn-primary waves-effect waves-light">Edit</a>
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger waves-effect waves-light">Delete</button>
                            </form>
                        </td>
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