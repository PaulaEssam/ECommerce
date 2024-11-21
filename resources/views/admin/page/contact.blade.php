@extends('admin.layouts.app')

@section('title')
<title>Contact - E-commerce</title>
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
        <h1>Contact List</h1>
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

            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Contact List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Login Name</th>
                        <th>Sent Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($getRecord as $info)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ !empty($info->login_name->name ) ? $info->login_name->name : '' }}</td>
                                <td>{{ $info->name }}</td>
                                <td>{{ $info->email }}</td>
                                <td>{{ $info->phone }}</td>
                                <td>{{ $info->subject }}</td>
                                <td>{{ $info->message }}</td>
                                <td>{{$info->created_at}}</td>
                                <td>
                                    <a href="{{route('delete_message',$info->id)}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            <div>
                {{$getRecord->links('pagination::bootstrap-5')}}
            </div>
        </div>
    </div>

    </div>
</section>
</div>
@endsection

@section('script')
{{-- <script src="{{ url('public/assets/dist/js/pages/dashboard3.js')}}"></script> --}}

@endsection
