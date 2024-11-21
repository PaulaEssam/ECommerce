@extends('admin.layouts.app')

@section('title')
<title>Admin - E-commerce</title>
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
                <h1>Admin List</h1>
                </div>
                <div class="col-sm-6" style="text-align: right">
                    <a href="{{route('add_admin')}}" class="btn btn-primary">Add New Admin</a>
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
                        <h3 class="card-title">Admin List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($admins as $admin)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$admin->name}}</td>
                                        <td>{{$admin->email}}</td>
                                        <td>{{$admin->status == 0 ? 'Active' : 'In Active'}}</td>
                                        <td>
                                            <a href="{{route('edit_admin',$admin->id)}}" class="btn btn-primary">Edit</a>
                                            <a href="{{route('delete_admin',$admin->id)}}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
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
