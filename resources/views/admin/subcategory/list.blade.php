@extends('admin.layouts.app')

@section('title')
<title>Sub-Categories - E-commerce</title>
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
        <h1>Sub Category List</h1>
        </div>
        <div class="col-sm-6" style="text-align: right">
            <a href="{{route('add_subCategory')}}" class="btn btn-primary">Add New Sub Category</a>
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
                <h3 class="card-title">Sub Category List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Sub Category Name</th>
                        <th>Category Name</th>
                        <th>Slug</th>
                        <th>Meta Title</th>
                        <th>Meta Description</th>
                        <th>Meta Keywprds</th>
                        <th>Created by</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($subCats as $sub)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $sub->name }}</td>
                                <td>{{ $sub->category->name }}</td>
                                <td>{{ $sub->slug }}</td>
                                <td>{{ $sub->meta_title }}</td>
                                <td>{{ $sub->meta_desc }}</td>
                                <td>{{ $sub->meta_key }}</td>
                                <td>{{ $sub->user->name }}</td>
                                <td>{{ $sub->status == 0 ? 'Active' : 'In Active' }}</td>
                                <td>
                                    <a href="{{route('edit_subCategory',$sub->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('delete_subCategory',$sub->id)}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div>
            {{$subCats->links('pagination::bootstrap-5')}}
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
