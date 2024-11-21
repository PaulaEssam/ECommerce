@extends('admin.layouts.app')

@section('title')
<title>Edit Sub Category - E-commerce</title>
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
        <h1>Edit Sub Category</h1>
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

                    <form action="{{route('update_esubCategory',$subCat->id)}}" method="post">
                        @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Select Category</label>
                            <select name="category_id" class="form-control">
                                <option value="">Select Category...</option>
                                @foreach($categories as $category)
                                <option {{$category->id == $subCat->category_id  ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                                </select>
                        </div>

                        <div class="form-group">
                        <label>Sub Category Name </label>
                        <input type="text" class="form-control"  name="name" placeholder="Sub Category Name" value="{{$subCat->name}}">
                        </div>

                        <div class="form-group">
                        <label>Slug </label>
                        <input type="text" class="form-control"  name="slug" placeholder="Sub Category Slug Ex. URL" value="{{$subCat->slug}}">
                        </div>

                        <div class="form-group">
                        <label>Status </label>
                        <select class="form-control" name="status">
                            <option value="0" {{$subCat->status == 0 ? 'selected' : ''}}>Active</option>
                            <option value="1" {{$subCat->status == 1 ? 'selected' : ''}}>In Active</option>
                        </select>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Meta Title </label>
                            <input type="text" class="form-control" name="meta_title"  placeholder="Meta Name" value="{{$subCat->meta_title}}">
                        </div>

                        <div class="form-group">
                                <label>Meta Description </label>
                                <textarea name="meta_desc" class="form-control" placeholder="Meta Description" cols="30" rows="10">{{$subCat->meta_desc}}</textarea>
                        </div>

                        <div class="form-group">
                                    <label>Meta Keywords</label>
                                    <input type="text" class="form-control" name="meta_key" placeholder="Meta Keywords" value="{{$subCat->meta_key}}">
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
