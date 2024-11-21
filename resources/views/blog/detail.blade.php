@extends('layouts.app')
@section('title')
<title>{{$getBlog->title}} - E-commerce</title>
@endsection
@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('{{url('public/assets-home/images/page-header-bg.jpg')}}')">
        <div class="container">
            <h1 class="page-title">{{$getBlog->title}}</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('blog')}}">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$getBlog->title}}</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            @include('admin.layouts.messages')
            <br>
            <div class="row">
                <div class="col-lg-9">
                    <article class="entry single-entry">
                        <figure class="entry-media">
                            <img src="{{url('uploaded_files/blog/'.$getBlog->image_name)}}" alt="{{$getBlog->title}}">
                        </figure>

                        <div class="entry-body">
                            <div class="entry-meta">
                                <a href="#">{{date('M d-Y', strtotime($getBlog->created_at))}}</a>
                                <span class="meta-separator">|</span>
                                <a href="#">{{$getBlog->getCommentCount()}} Comments</a>
                                @if (!empty($getBlog->getCategory))
                                    <span class="meta-separator">|</span>
                                    <a href="{{url('blog/category'.$getBlog->getCategory->slug)}}">{{$getBlog->getCategory->name}}</a>
                                @endif
                            </div>
                            <br> <br>
                            <div class="entry-content editor-content">
                                {!! $getBlog->description !!}
                            </div>
                        </div>


                    </article>
                @if(!empty($getRelatedPost->count()))
                    <div class="related-posts">
                        <h3 class="title">Related Posts</h3><!-- End .title -->

                        <div class="owl-carousel owl-simple" data-toggle="owl"
                            data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":1
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    }
                                }
                            }'>
                            @foreach ($getRelatedPost as $blog)
                                <article class="entry entry-grid">
                                    <figure class="entry-media">
                                        <a href="{{url('blog/'.$blog->slug)}}">
                                            <img src="{{url('uploaded_files/blog/'.$blog->image_name)}}" alt="{{$blog->title}}">
                                        </a>
                                    </figure>

                                    <div class="entry-body">
                                        <div class="entry-meta">
                                            <a href="{{url('blog/'.$blog->slug)}}">{{date('M d-Y',strtotime($blog->created_at))}}</a>
                                            <span class="meta-separator">|</span>
                                            <a href="{{url('blog/'.$blog->slug)}}">{{$blog->getCommentCount()}} Comments</a>
                                        </div>

                                        <h2 class="entry-title">
                                            <a href="{{url('blog/'.$blog->slug)}}">{{$blog->title}}</a>
                                        </h2>
                                        @if (!empty($blog->getCategory))
                                            <div class="entry-cats">
                                                <a href="{{url('blog/category'.$blog->getCategory->slug)}}">{{$blog->getCategory->name}}</a>
                                            </div>
                                        @endif

                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                @endif
                    <div class="comments">
                        <h3 class="title">{{$getBlog->getCommentCount()}} Comments</h3>

                        <ul>
                            @foreach ($getBlog->getComments as $comment)
                            <li>
                                <div class="comment">
                                    <div class="comment-body">
                                        <div class="comment-user">
                                            <h4><a href="#">{{$comment->getUser->name}}</a></h4>
                                            <span class="comment-date">{{date('M d-Y h:i: a',strtotime($comment->created_at))}}</span>
                                        </div>

                                        <div class="comment-content">
                                            <p>{{$comment->comment}}</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="reply">
                        <div class="heading">
                            <h3 class="title">Leave A Comment</h3>
                        </div>

                        <form action="{{url('blog/submit_comment')}}" method="POST">
                            @csrf
                            <input type="hidden" name="blog_id" value="{{$getBlog->id}}">
                            <label for="reply-message" class="sr-only">Comment</label>
                            <textarea name="comment" id="reply-message" cols="30" rows="4" class="form-control" required placeholder="Comment *"></textarea>
                            @if (!empty(Auth::check()))
                                <button type="submit" class="btn btn-outline-primary-2">
                                    <span>POST COMMENT</span>
                                    <i class="icon-long-arrow-right"></i>
                                </button>
                            @else
                                <a href="#signin-modal" data-toggle="modal" class="btn btn-outline-primary-2">
                                    <span>POST COMMENT</span>
                                    <i class="icon-long-arrow-right"></i>
                                </a>
                            @endif
                        </form>
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
