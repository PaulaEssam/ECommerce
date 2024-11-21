<div class="products">
    @include('product.filter_list')
</div>
<div class="more-container text-center">
    <a href="{{url($getCategory->slug) }}" class="btn btn-outline-darker btn-more"><span>Load more from this category</span><i class="icon-long-arrow-down"></i></a>
</div>
