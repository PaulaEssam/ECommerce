<div class="sidebar">
    <div class="widget widget-search">
        <h3 class="widget-title">Search</h3><!-- End .widget-title -->

        <form action="{{url('blog')}}" method="GET">
            <label for="ws" class="sr-only">Search in blog</label>
            <input type="text" class="form-control" name="search" id="ws" placeholder="Search in blog" required value="{{Request::get('search')}}">
            <button type="submit" class="btn"><i class="icon-search"></i><span class="sr-only">Search</span></button>
        </form>
    </div><!-- End .widget -->

    <div class="widget widget-cats">
        <h3 class="widget-title">Categories</h3><!-- End .widget-title -->

        <ul>
            @foreach($getBlogCategory as $category)
            <li><a href="{{url('blog/category/'.$category->slug)}}">{{$category->name}}<span>{{$category->getCountBlog()}}</span></a></li>
            @endforeach

        </ul>
    </div><!-- End .widget -->

    <div class="widget">
        <h3 class="widget-title">Popular Posts</h3><!-- End .widget-title -->

        <ul class="posts-list">
            @foreach($getPopular as $popular)
                <li>
                    <figure>
                        <a href="{{url('blog/'.$popular->slug)}}">
                            <img src="{{url('uploaded_files/blog/'.$popular->image_name)}}" alt="{{$popular->title}}">
                        </a>
                    </figure>

                    <div>
                        <span>{{date('M d-Y',strtotime($popular->created_at))}}</span>
                        <h4><a href="{{url('blog/'.$popular->slug)}}">{{$popular->title}}.</a></h4>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

</div>
