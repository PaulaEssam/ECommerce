@extends('admin.layouts.app')

@section('title')
<title>Add Blog - E-commerce</title>
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
        <h1>Add New Blog</h1>
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

                    <form action="{{url('admin/blog/insert')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Title <span style="color:red">*</span></label>
                            <input type="text" class="form-control" required name="title" placeholder="Title">
                        </div>

                        <div class="form-group">
                            <label>Category Name <span style="color:red">*</span></label>
                            <select name="bolg_category_id" required class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Image <span style="color:red">*</span></label>
                            <input type="file" class="form-control" required name="image_name" accept="image/*">
                        </div>

                        <div class="form-group">
                            <label>Description </label>
                            <textarea name="description" class="form-control" placeholder=" Description" cols="30" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                        <label>Status <span style="color:red">*</span></label>
                        <select class="form-control" name="status" required>
                            <option value="0">Active</option>
                            <option value="1">In Active</option>
                        </select>
                        </div>
                        <hr>



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
