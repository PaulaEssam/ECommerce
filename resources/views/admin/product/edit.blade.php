@extends('admin.layouts.app')

@section('title')
<title>Edit Product - E-commerce</title>
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
        <h1>Edit Product</h1>
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
                    @include('admin.layouts.messages')
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{route('update_product',$product->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Title <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" required name="title" placeholder="Product Title" value="{{$product->title}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>SKU <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" required name="sku" placeholder="SKU" value="{{$product->sku}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Category <span style="color:red">*</span></label>
                                    <select name="category_id" id="changeCategory" class="form-control" required>
                                        <option value="">Select Category...</option>
                                        @foreach($cats as $cat)
                                        <option value="{{$cat->id}}" {{$cat->id == $product->category_id ? 'selected' : ''}}>{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sub Category <span style="color:red">*</span></label>
                                    <select name="subcategory_id" id="getSubCategory" class="form-control" required>
                                        <option value="">Select Sub Category...</option>
                                        @foreach($subs as $sub)
                                        <option value="{{$sub->id}}" {{$sub->id == $product->sub_category_id ? 'selected' : ''}}>{{$sub->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Brand <span style="color:red">*</span></label>
                                    <select name="brand_id" class="form-control" required>
                                        <option value="">Select Brand...</option>
                                        @foreach($brands as $brand)
                                        <option value="{{$brand->id}}" {{$brand->id == $product->brand_id ? 'selected' : ''}}>{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Color Name <span style="color:red">*</span></label>
                                    @foreach ($colors as $color)
                                        @php
                                            $check = '';
                                        @endphp
                                        {{-- روح ع البروداكت موديل هتلاقي الفانكشن --}}
                                        @foreach ($product->getColor as $pcolor)
                                            @if ($pcolor->color_id == $color->id)
                                                @php
                                                    $check = 'checked';
                                                @endphp
                                            @endif
                                        @endforeach
                                        <div>
                                            <label><input {{$check}} type="checkbox" name="color_id[]" value="{{$color->id}}"> {{$color->name}} </label>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Price ($) <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" required name="price" placeholder="Price" value="{{ !empty($product->price) ? $product->price : '' }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Old Price ($) <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" required  name="old_price" placeholder="Old Price" value="{{ !empty($product->old_price) ? $product->old_price : '' }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Size<span style="color:red">*</span></label>
                                    <div>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Price ($)</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="AppendSize">
                                                @php
                                                    $i_s = 1;
                                                @endphp
                                        {{-- روح ع البروداكت موديل هتلاقي الفانكشن --}}
                                                @foreach ($product->getSize as $size)
                                                    <tr  id="DeleteSize{{$i_s}}">
                                                        <td><input type="text" value="{{$size->name}}" name="size[{{$i_s}}][name]" placeholder="Name" class="form-control"></td>
                                                        <td><input type="text" value="{{$size->price}}" name="size[{{$i_s}}][price]" placeholder="Price" class="form-control"></td>
                                                        <td style="width: 100px">
                                                            <a id="{{$i_s}}" class="btn btn-danger DeleteSize">Delete</a>
                                                        </td>
                                                    </tr>
                                                    @php
                                                        $i_s++;
                                                    @endphp
                                                @endforeach

                                                <tr>
                                                    <td><input type="text" name="size[100][name]" placeholder="Name" class="form-control"></td>
                                                    <td><input type="text" name="size[100][price]" placeholder="Price (numbers)" class="form-control"></td>
                                                    <td style="width: 100px">
                                                        <a class="btn btn-primary AddSize" >Add</a>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Image (you can choose multiple images)</label>
                                    <input type="file" multiple class="form-control" name="image[]" accept="image/*">
                                </div>
                            </div>
                        </div>

                        @if(!empty($product->getImage->count()))
                            <div class="row">
                                @foreach($product->getImage as $img)
                                    @if ($img->image_name)
                                        <div class="col-md-1" style="text-align: center">
                                            <img src="{{url('uploaded_files/products/'.$img->image_name)}}" alt="" width="100" height="100"
                                            style="border: 1px solid #ddd; padding: 5px; border-radius: 5px; margin: 5px;">
                                            <a href="{{route('deleteImageProduct',$img->id)}}" class="btn btn-danger btn-sm" >Delete</a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Short Description <span style="color:red">*</span></label>
                                    <textarea name="short_desc" required class="form-control" placeholder="Short Description" style="resize: none">{{$product->short_desc}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description <span style="color:red">*</span></label>
                                    <textarea name="desc" required class="form-control" placeholder="Description" style="resize: none">{{$product->desc}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Additional Info <span style="color:red">*</span></label>
                                    <textarea name="additional_info" required class="form-control" placeholder="Additional Info" style="resize: none">{{$product->additional_info}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Shipping Returns <span style="color:red">*</span></label>
                                    <textarea name="shipping_returns" required class="form-control" placeholder="Shipping Returns" style="resize: none">{{$product->shipping_returns}}</textarea>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Status </label>
                                        <select class="form-control" name="status">
                                            <option value="0" {{$product->status == 0 ? 'selected' : ''}}>Active</option>
                                            <option value="1" {{$product->status == 1 ? 'selected' : ''}}>In Active</option>
                                        </select>
                                    </div>
                            </div>
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
<script type="text/javascript">
    var i = 101 ;
    $('body').delegate('.AddSize', 'click', function(){
        var html = '<tr id="DeleteSize'+i+'">\n\
                        <td>\n\
                            <input type="text" name="size['+i+'][name]" placeholder="Name" class="form-control">\n\
                        </td>\n\
                        <td>\n\
                            <input type="text" name="size['+i+'][price]" placeholder="Price" class="form-control">\n\
                        </td>\n\
                        <td>\n\
                            <a id="'+i+'" class="btn btn-danger DeleteSize">Delete</a>\n\
                        </td>\n\
                    </tr>';
    i++;
        $('#AppendSize').append(html);
    });

    $('body').delegate('.DeleteSize', 'click', function(){
        var id = $(this).attr('id');
        $('#DeleteSize'+id).remove();
    });



    //ajax to show sub categories that belongs to category
    $('body').delegate('#changeCategory' ,'change', function(e){
        var cat_id = $(this).val();
        $.ajax({
            type: "POST",
            url: "{{route('get_sub_category')}}",
            data: {
                "cat_id": cat_id,
                "_token": "{{csrf_token()}}"

            },
            dataType: 'json',

            success: function(data){
                $('#getSubCategory').html(data.html);
            },
            error: function(data){
            },

        });
    });

</script>

@endsection
