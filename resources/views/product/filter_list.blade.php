<div class="products mb-3">
    <div class="row justify-content-center">
        @foreach ($getProduct as $product)
        @php
        //الفانكشن موجودة في البروداكت موديل
            $productImage = $product->getSingleImage($product->id);
        @endphp

            <div class="col-12 col-md-4 col-lg-4">
                <div class="product product-7 text-center">
                    <figure class="product-media">
                        <span class="product-label label-new">New</span>
                        <a href="{{url($product->slug)}}">
                            @if(!empty($productImage))
                                <img style="width: 100%; height: 250px;" src="{{url('uploaded_files/products/'.$productImage->image_name)}}" alt="{{$product->title}}" class="product-image">
                            @endif
                        </a>

                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            @if(!empty($subCategory->name))
                                <a href="{{url($product->category->slug . '/' .$product->subcategory->slug)}}">{{$product->subcategory->name}}</a>
                            @else
                            <a href="{{url($product->category->slug) }}">{{$product->category->name}}</a>
                            @endif
                        </div>
                        <h3 class="product-title"><a href="{{url($product->slug)}}">{{$product->title}}</a></h3>
                        <div class="product-price">
                            ${{number_format($product->price, 2)}}
                        </div>
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( 2 Reviews )</span>
                        </div><!-- End .rating-container -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
            </div>
        @endforeach
    </div>
</div>
{{--
<div>
    {{$getProduct->links('pagination::bootstrap-5')}}
</div> --}}
