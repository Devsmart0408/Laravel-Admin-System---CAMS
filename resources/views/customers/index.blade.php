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
                    <li class="breadcrumb-item active">Customers</li>
                </ol>
            </div>
            <h4 class="page-title">Customers</h4>
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
            <h4 class="header-title">Customers Management</h4>
            <p class="text-muted font-13 mb-4">
                customer management
            </p>
            <div class="mb-2">
                <div class="row">
                    <div class="col-12 text-sm-center form-inline">
                        <div class="form-group mr-2">
                            <a id="demo-btn-addrow" href="{{ route('customers.create') }}" class="btn btn-primary"><i class="mdi mdi-plus-circle mr-2"></i> Add Customer</a>
                        </div>
                    </div>
                </div>
            </div>
            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                <thead>
                    <tr>
                        <th data-sortable="false"></th>
                        <th data-sortable="false">Actions</th>
                        <th>Full Name</th>
                        <th>Company</th>
                        <th>Code</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Fax</th>
                        <th>Mobile</th>
                        <th>Birthday</th>
                        <th>Economic Beneficiary</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Name on ID</th>
                        <th>ID Type</th>
                        <th>ID Number</th>
                        <th>Expiry Date</th>
                        <th>Place Of Birthday</th>
                        <th>Place Of Issue</th>
                        <th>Nationality</th>
                        <th>ID Image</th>
                        <th>Company Image</th>
                        <th>Mix Image</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $item)
                    <tr>
                        <td></td>
                        <td>
                            <form action="{{ route('customers.destroy', $item->id) }}" method="post">
                            <a href="{{ route('customers.edit',$item->id)}}" class="btn btn-primary waves-effect waves-light">Edit</a>
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger waves-effect waves-light">Delete</button>
				            </form>
                        </td>
                        <td>{{$item->first_name.' '.$item->last_name}}</td>
                        <td>{{$item->company_name}}</td>
                        <td>{{$item->customer_code}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->fax}}</td>
                        <td>{{$item->mobile}}</td>
                        <td>{{$item->birthday}}</td>
                        <td>{{$item->eco_ben}}</td>
                        <td>{{$item->city}}</td>
                        <td>{{$item->country}}</td>
                        <td>{{$item->name_id}}</td>
                        <td>{{$item->id_type}}</td>
                        <td>{{$item->id_number}}</td>
                        <td>{{$item->expire_date}}</td>
                        <td>{{$item->place_birthday}}</td>
                        <td>{{$item->place_issue}}</td>
                        <td>{{$item->national}}</td>
                        <td><img src="{{ URL::to('/') }}/images/users/{{ $item->id_img }}" class="avatar-sm rounded-circle img-thumbnail"/></td>
                        <td><img src="{{ URL::to('/') }}/images/users/{{ $item->company_img }}" class="avatar-sm rounded-circle img-thumbnail"/></td>
                        <td><img src="{{ URL::to('/') }}/images/users/{{ $item->mix_img }}" class="avatar-sm rounded-circle img-thumbnail"/></td>
                        
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