@extends('admin.layouts.app')

@section('title')
<title>Edit Category - E-commerce</title>
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
        <h1>Edit Category</h1>
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

                    <form action="{{route('update_category',$category->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Category Name </label>
                            <input type="text" class="form-control"  name="name" placeholder="Category Name" value="{{$category->name}}">
                        </div>

                        <div class="form-group">
                            <label>Slug </label>
                            <input type="text" class="form-control"  name="slug" placeholder="Category Slug Ex. URL" value="{{$category->slug}}">
                        </div>

                        <div class="form-group">
                            <label>Status </label>
                            <select class="form-control" name="status">
                                <option value="0" {{$category->status == 0 ? 'selected' : ''}}>Active</option>
                                <option value="1" {{$category->status == 1 ? 'selected' : ''}}>In Active</option>
                            </select>
                        </div>
                        <hr>

                        <div class="form-group">
                            <label>Image </label>
                            <input type="file" class="form-control"  name="image_name" accept="image/*">
                            @if (!empty($category->image_name))
                                <img src="{{url('uploaded_files/category/'.$category->image_name)}}" width="100" height="100">
                            @endif
                        </div>

                        <hr>
                        <div class="form-group">
                            <label>Meta Title </label>
                            <input type="text" class="form-control" name="meta_title"  placeholder="Meta Name" value="{{$category->meta_title}}">
                        </div>

                        <div class="form-group">
                                <label>Meta Description </label>
                                <textarea name="meta_desc" class="form-control" placeholder="Meta Description" cols="30" rows="10">{{$category->meta_desc}}</textarea>
                        </div>

                        <div class="form-group">
                                    <label>Meta Keywords</label>
                                    <input type="text" class="form-control" name="meta_key" placeholder="Meta Keywords" value="{{$category->meta_key}}">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
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
