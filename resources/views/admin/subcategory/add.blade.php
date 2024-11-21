@extends('admin.layouts.app')

@section('title')
<title>Add Sub-Category - E-commerce</title>
@endsection

@section('style')

@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-12">
        <h1>Add New Sub Category</h1>
        </div>
    </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    {{-- @include('admin.layouts.messages') --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{route('insert_subCategory')}}" method="post">
                        @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Select Category <span style="color:red">*</span></label>
                            <select name="category_id" class="form-control" required>
                                <option value="">Select Category...</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                                </select>
                        </div>

                        <div class="form-group">
                        <label>Sub Category Name <span style="color:red">*</span></label>
                        <input type="text" class="form-control" required name="name" placeholder="Sub Category Name">
                        </div>

                        <div class="form-group">
                        <label>Slug <span style="color:red">*</span></label>
                        <input type="text" class="form-control" required name="slug" placeholder="Sub Category Slug Ex. URL">
                        </div>

                        <div class="form-group">
                        <label>Status <span style="color:red">*</span></label>
                        <select class="form-control" name="status" required>
                            <option value="0">Active</option>
                            <option value="1">In Active</option>
                        </select>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Meta Title <span style="color:red">*</span></label>
                            <input type="text" class="form-control" name="meta_title" required placeholder="Meta Name">
                        </div>

                        <div class="form-group">
                                <label>Meta Description </label>
                                <textarea name="meta_desc" class="form-control" placeholder="Meta Description" cols="30" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                                    <label>Meta Keywords</label>
                                    <input type="text" class="form-control" name="meta_key" placeholder="Meta Keywords">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Add</button>
                    </div>
                    </form>
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
