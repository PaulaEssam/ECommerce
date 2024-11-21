@extends('layouts.app')
@section('title')
<title>{{$getPage->title}} - E-commerce</title>
@endsection
@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('{{url('public/assets-home/images/page-header-bg.jpg')}}')">
        <div class="container">
            <h1 class="page-title">{{$getPage->title}}</h1>
        </div>
    </div>
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{url('blog')}}">Blog</a></li>
            </ol>
        </div>
    </nav>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="entry-container max-col-2" data-layout="fitRows">
                        @foreach($getBlog as $blog)
                            <div class="entry-item col-sm-6">
                                <article class="entry entry-grid">
                                    <figure class="entry-media">
                                        <a href="{{url('blog/'.$blog->slug)}}">
                                            <img src="{{url('uploaded_files/blog/'.$blog->image_name)}}" alt="{{$blog->title}}" style="max-height: 300px;">
                                        </a>
                                    </figure><!-- End .entry-media -->

                                    <div class="entry-body">
                                        <div class="entry-meta">
                                            <a href="#">{{date('M d-Y', strtotime($blog->created_at))}}</a>
                                            <span class="meta-separator">|</span>
                                            <a href="#">{{$blog->getCommentCount()}} Comments</a>
                                        </div>

                                        <h2 class="entry-title">
                                            <a href="{{url('blog/'.$blog->slug)}}">{{$blog->title}}</a>
                                        </h2>

                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>

                    <div>
                        {{$getBlog->links('pagination::bootstrap-5')}}
                    </div>
                </div>

                <aside class="col-lg-3">
                    @include('blog.side_bar')
                </aside>
            </div>
        </div>
    </div>
</main>

@endsection

@section('script')

@endsection
