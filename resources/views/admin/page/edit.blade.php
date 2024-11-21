@extends('admin.layouts.app')

@section('title')
<title>Edit Page Code - E-commerce</title>
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
        <h1>Edit Page </h1>
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

                    <form action="{{route('updatePage',$page->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Page Name </label>
                            <input type="text" class="form-control"  name="name" placeholder="Page Name" value="{{$page->name}}">
                        </div>

                        <div class="form-group">
                            <label>Slug </label>
                            <input type="text" class="form-control"  name="slug" placeholder="Page Slug Ex. URL" value="{{$page->slug}}">
                        </div>

                        <div class="form-group">
                            <label>Title </label>
                            <input type="text" class="form-control" name="title"  placeholder="Title" value="{{$page->title}}">
                        </div>

                        <div class="form-group">
                            <label>Image </label>
                            <input type="file" class="form-control" name="image" accept="image/*">
                            @if(!empty($page->getImage()))
                                <img src="{{$page->getImage()}}" alt="" width="100" height="100">
                            @endif
                        </div>

                        <div class="form-group">
                            <label> Description </label>
                            <textarea name="description" class="form-control" placeholder="Description" cols="30" rows="10">{{$page->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Meta Title </label>
                            <input type="text" class="form-control" name="meta_title"  placeholder="Meta Name" value="{{$page->meta_title}}">
                        </div>

                        <div class="form-group">
                                <label>Meta Description </label>
                                <textarea name="meta_description" class="form-control" placeholder="Meta Description" cols="30" rows="10">{{$page->meta_description}}</textarea>
                        </div>

                        <div class="form-group">
                                    <label>Meta Keywords</label>
                                    <input type="text" class="form-control" name="meta_keywords" placeholder="Meta Keywords" value="{{$page->meta_keywords}}">
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
