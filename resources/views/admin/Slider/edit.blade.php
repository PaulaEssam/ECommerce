@extends('admin.layouts.app')

@section('title')
<title>Edit Slider - E-commerce</title>
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
        <h1>Edit Slider</h1>
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

                    <form action="{{url('admin/slider/update/'.$Slider->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="card-body">
                        <div class="form-group">
                        <label>Slider Title </label>
                        <input type="text" class="form-control"  name="title" placeholder="Slider Title" value="{{$Slider->title}}">
                        </div>

                        <div class="form-group">
                            <label>Image </label>
                            <input type="file" class="form-control" name="image" >
                            @if (!empty($Slider->image_name))
                                <img src="{{url('uploaded_files/slider/'.$Slider->image_name)}}" alt="{{$Slider->title}}" width="100" height="100">
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Button Name </label>
                            <input type="text" class="form-control"  name="btn_name" placeholder="Button Name" value="{{$Slider->button_name}}">
                        </div>

                        <div class="form-group">
                            <label>Button Link </label>
                            <input type="text" class="form-control"  name="btn_link" placeholder="Button Link" value="{{$Slider->button_link}}">
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
