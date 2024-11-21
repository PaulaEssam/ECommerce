@extends('admin.layouts.app')

@section('title')
<title>Slider  - E-commerce</title>
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
        <h1>Slider List</h1>
        </div>
        <div class="col-sm-6" style="text-align: right">
            <a href="{{url('admin/slider/add')}}" class="btn btn-primary">Add New Slider</a>
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
                <h3 class="card-title">Slider List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Button Name</th>
                        <th>Button Link</th>
                        <th>Craeted Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($Slider as $slider)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if (!empty($slider->image_name))
                                        <img src="{{url('uploaded_files/slider/'.$slider->image_name )}}" alt="{{$slider->title }}" width="100" height="100">
                                    @else
                                    <p style="color: red;">there is no image</p>
                                    @endif
                                </td>
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->button_name }}</td>
                                <td>{{ $slider->button_link }}</td>
                                <td>{{ date('d-m-Y',strtotime($slider->created_at)) }}</td>
                                <td>
                                    <a href="{{url('admin/slider/edit/'.$slider->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{url('admin/slider/delete/'.$slider->id)}}" class="btn btn-danger">Delete</a>
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
