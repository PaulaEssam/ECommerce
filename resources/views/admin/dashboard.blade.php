@extends('admin.layouts.app')
@section('title')
<title>Dashboard - E-commerce</title>
@endsection
@section('style')

@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
            </div>
        </div>
        </div>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-list-alt"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Orders</span>
                                <span class="info-box-number">{{$getTotalOrders}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-list-alt"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Today Orders</span>
                                <span class="info-box-number">{{$getTotalTodayOrders}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Amount</span>
                                <span class="info-box-number">${{number_format($getTotalAmount,2)}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Today Amount</span>
                                <span class="info-box-number">${{number_format($getTotalTodayAmount,2)}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Customers</span>
                                <span class="info-box-number">{{$getTotalUsers}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Today Customers</span>
                                <span class="info-box-number">{{$getTotalTodayUsers}}</span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Sales</h3>
                                    <select name="" id="" class="form-control ChangeYear" style="width: 100px;">
                                        @for($i=2021; $i<= date('Y'); $i++)
                                            <option {{$year == $i ? 'selected' : '' ;}} value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg">${{number_format($totalAmount,2)}}</span>
                                        <span>Sales Over Time</span>
                                    </p>
                                </div>

                                <div class="position-relative mb-4">
                                    <canvas id="sales-chart-order" height="200"></canvas>
                                </div>

                                <div class="d-flex flex-row justify-content-end">
                                    <span class="mr-2">
                                        <i class="fas fa-square text-primary"></i> Customers
                                    </span>

                                    <span class="mr-2">
                                        <i class="fas fa-square text-gray"></i> Orders
                                    </span>

                                    <span>
                                        <i class="fas fa-square text-danger"> </i> Amount
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->

                        <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Latest Orders</h3>
                        </div>
                        <div class="card-body table-responsive p-0">

                            <table class="table table-striped table-valign-middle">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
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
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getLatestOrders  as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->first_name }} {{$order->last_name}}</td>
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
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
<script src="{{ url('public/assets/dist/js/pages/dashboard3.js')}}"></script>
<script>

    $('.ChangeYear').change(function(){
        var year = $(this).val();
        location.href = "{{url('admin/dashboard?year=')}}" + year ;
    });


        var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
        }

    var mode = 'index'
    var intersect = true

    var $salesChart = $('#sales-chart-order')
    // eslint-disable-next-line no-unused-vars
    var salesChart = new Chart($salesChart, {
    type: 'bar',
    data: {
        labels: ['January','February','March','April','May','June','July','August','September','October','November','December'],
        datasets: [
            {
                backgroundColor: '#007bff',
                borderColor: '#007bff',
                data: [{{$getTotalCustomerMoths}}]
            },
            {
                backgroundColor: '#ced4da',
                borderColor: '#ced4da',
                data: [{{$getTotalOrderMonths}}]
            },
            {
                backgroundColor: 'red',
                borderColor: 'red',
                data: [{{$getTotalOrderAmountMonths}}]
            },
        ]
    },
    options: {
        maintainAspectRatio: false,
        tooltips: {
            mode: mode,
            intersect: intersect
        },
        hover: {
            mode: mode,
            intersect: intersect
        },
        legend: {
            display: false
        },
        scales: {
        yAxes: [{
            // display: false,
            gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
            },
            ticks: $.extend({
            beginAtZero: true,
                // Include a dollar sign in the ticks
                callback: function (value) {
                    if (value >= 1000) {
                        value /= 1000
                        value += 'k'
                    }
                    return '$' + value
                }
            }, ticksStyle)
        }],
        xAxes: [{
            display: true,
            gridLines: {
                display: false
            },
            ticks: ticksStyle
        }]
        }
    }
    })
</script>
@endsection
