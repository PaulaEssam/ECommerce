@extends('admin.layouts.app')

@section('title')
<title>Orders - E-commerce</title>
@endsection

@section('style')

@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Orders List (Total: {{$getRecord->total()}})</h1>
        </div>

    </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @include('admin.layouts.messages')
            <form action="" method="GET">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Orders Search</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" name="id" class="form-control" value="{{Request::get('id')}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="f_name" class="form-control" value="{{Request::get('f_name')}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="l_name" class="form-control" value="{{Request::get('l_name')}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="{{Request::get('email')}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="number" name="phone" class="form-control" min="0" value="{{Request::get('phone')}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" name="country" class="form-control" value="{{Request::get('country')}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" name="state" class="form-control" value="{{Request::get('state')}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" name="city" class="form-control" value="{{Request::get('city')}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>From Date</label>
                                    <input type="date" name="from_date" class="form-control" value="{{Request::get('from_date')}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>To Date</label>
                                    <input type="date" name="to_date" class="form-control" value="{{Request::get('to_date')}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-primary">Search</button>
                                    <a href="{{url('admin/orders/list')}}" class="btn btn-warning">Reset</a>
                                </div>
                            </div>
                    </div>
                </div>
            </form>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Orders List</h3>
                </div>

                <div class="card-body p-0" style="overflow: auto">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Company_name</th>
                        <th>Country</th>
                        <th>Address one</th>
                        <th>Address two</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Postcode</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Note</th>
                        <th>Discount Code</th>
                        <th>Discount Amount ($)</th>
                        <th>Shipping Amount ($)</th>
                        <th>Total Amount ($)</th>
                        <th>Payment Method</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($getRecord  as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->first_name }} {{$order->last_name}}</td>
                                <td>{{ $order->company_name }}</td>
                                <td>{{ $order->country }}</td>
                                <td>{{ $order->address_one }}</td>
                                <td>{{ $order->address_two }}</td>
                                <td>{{ $order->city }}</td>
                                <td>{{ $order->state }}</td>
                                <td>{{ $order->postcode }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->notes }}</td>
                                <td>{{ $order->discount_code }}</td>
                                <td>{{ number_format($order->discount_amount,2) }}</td>
                                <td>{{ number_format($order->shipping_amount,2) }}</td>
                                <td>{{ number_format($order->total_amount,2) }}</td>
                                <td>{{ $order->payment_method }}</td>
                                <td>
                                    <select name="" class="form-control ChangeStatus" id="{{$order->id}}" style="width:200px;">
                                        <option value="0" {{ $order->status == 0 ? 'selected': '' }}>Pending</option>
                                        <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Inprogress</option>
                                        <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>Delivered</option>
                                        <option value="3" {{ $order->status == 3 ? 'selected' : '' }}>Completed</option>
                                        <option value="4" {{ $order->status == 4 ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                </td>
                                <td>{{ date('d-m-Y h:i A',strtotime($order->created_at)) }}</td>
                                <td>
                                    <a href="{{route('order_details',$order->id)}}" class="btn btn-primary">View</a>
                                    <a href="{{route('order_delete',$order->id)}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <div>
            {{$getRecord->links('pagination::bootstrap-5')}}
        </div>
    </div>

    </div>
</section>
</div>
@endsection

@section('script')
{{-- <script src="{{ url('public/assets/dist/js/pages/dashboard3.js')}}"></script> --}}
<script>
    $('body').delegate('.ChangeStatus','change',function(){
        var status = $(this).val();
        var order_id = $(this).attr('id');
        $.ajax({
            type: 'GET',
            url: '{{ url("admin/order_status") }}',
            data: {
                status:status,
                order_id:order_id
            },
            dataType:"json",
            success: function(data){
                alert(data.message);
            }
        });

    });
</script>
@endsection
