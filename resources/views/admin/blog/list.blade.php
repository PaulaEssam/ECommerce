@extends('admin.layouts.app')

@section('title')
<title>Blog - E-commerce</title>
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
        <h1>Blog List</h1>
        </div>
        <div class="col-sm-6" style="text-align: right">
            <a href="{{url('admin/blog/add')}}" class="btn btn-primary">Add New Blog</a>
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
                <h3 class="card-title">Blog List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Meta Title</th>
                        <th>Meta Description</th>
                        <th>Meta Keywprds</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ url('uploaded_files/blog/'.$blog->image_name) }}" alt="" width="100" height="100" > </td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->slug }}</td>
                                <td>{{ $blog->slug }}</td>
                                <td>{{ $blog->meta_title }}</td>
                                <td>{{ $blog->meta_desc }}</td>
                                <td>{{ $blog->meta_key }}</td>
                                <td>{{ $blog->status == 0 ? 'Active' : 'In Active' }}</td>
                                <td>{{date('d-m-Y', strtotime( $blog->created_at ))}}</td>
                                <td>
                                    <a href="{{url('admin/blog/edit/'.$blog->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{url('admin/blog/delete/'.$blog->id)}}" class="btn btn-danger">Delete</a>
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
