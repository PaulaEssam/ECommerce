@extends('admin.layouts.app')

@section('title')
<title>Categories - E-commerce</title>
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
        <h1>Category List</h1>
        </div>
        <div class="col-sm-6" style="text-align: right">
            <a href="{{route('add_category')}}" class="btn btn-primary">Add New Category</a>
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
                <h3 class="card-title">Category List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Image</th>
                        <th>Meta Title</th>
                        <th>Meta Description</th>
                        <th>Meta Keywprds</th>
                        <th>Created by</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $cat)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $cat->name }}</td>
                                <td>{{ $cat->slug }}</td>
                                <td>
                                @if (!empty($cat->image_name ))
                                    <img src="{{url('uploaded_files/category/'.$cat->image_name )}}" alt="{{ $cat->name }}" width="100" height="100">
                                @else
                                    <p style="color: red">there is no image</p>
                                @endif
                                    </td>
                                <td>{{ $cat->meta_title }}</td>
                                <td>{{ $cat->meta_desc }}</td>
                                <td>{{ $cat->meta_key }}</td>
                                <td>{{ $cat->user->name }}</td>
                                <td>{{ $cat->status == 0 ? 'Active' : 'In Active' }}</td>
                                <td>
                                    <a href="{{route('edit_category',$cat->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('delete_category',$cat->id)}}" class="btn btn-danger">Delete</a>
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
