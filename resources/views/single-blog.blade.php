@extends('layouts.app')

@section('content')

<section class="blog-banner-area" id="blog">
    <div class="container h-100">
        <div class="blog-banner">
            <div class="text-center">
                <h1>Blog Details</h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
        </ol>
        </nav>
            </div>
        </div>
</div>
</section>
<!--================Blog Area =================-->

<section class="blog_area single-post-area py-80px section-margin--small">
<div class="container">
<div class="row">
        <div class="col-lg-8 posts-list">
                <div class="single-post row">
                        <div class="col-lg-12">
                        @if ($post->photo)
                                <div class="feature-img">
                                        <img class="img-fluid" src="{{ $post->photo }}" alt="">
                                </div>
                        @endif
                        </div>
                        <div class="col-lg-3  col-md-3">
                                <div class="blog_info text-right">
                                        
                                        <ul class="blog_meta list">
                                                <li>
                                                        <a href="#">Admin
                                                                <i class="lnr lnr-user"></i>
                                                        </a>
                                                </li>
                                                <li>
                                                        <a href="#"> {{ $post->created_at->format('Y-m-d') }}
                                                                <i class="lnr lnr-calendar-full"></i>
                                                        </a>
                                                </li>
                                                <li>
                                                        <a href="#">1.2M Views
                                                                <i class="lnr lnr-eye"></i>
                                                        </a>
                                                </li>
                                                <li>
                                                        <a href="#">{{ $commentCount }}Comments
                                                                <i class="lnr lnr-bubble"></i>
                                                        </a>
                                                </li>
                                        </ul>
                                        </div>
                        </div>
                        <div class="col-lg-9 col-md-9 blog_details">
                                <h2>{{ $post->title }}</h2>
                                <p class="excert">
                                {{ $post->description }}
                                </p>
                                </div>
                </div>
                                        <div class="comments-area">
                                                <h4>{{ $commentCount }} Comments</h4>
                                                
                                                <div class="comment-list">
                        @foreach($commentData as $comment)
                                <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                        <img src="{{ $comment['photo'] }}" alt="User Photo">
                                        </div>
                                        <div class="desc">
                                        <h5>
                                                {{ $comment['username'] }}
                                        </h5>
                                        </br>
                                        <p class="comment">
                                                {{ $comment['comment'] }}
                                        </p>
                                        </div>
                                </div>
                                </div>
                        </br>
                        @endforeach
                        </div>

                </div>
                @auth
                <div class="comment-form">
                        <h4>Leave a Reply</h4>
                        <form>
                                <div class="form-group form-inline">
                                        <div class="form-group col-lg-6 col-md-6 name">
                                                <input type="hidden" class="form-control" id="user_id"  value={{auth()->user()->id}}>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 email">
                                                <input type="hidden" class="form-control" id="post_id" name ="post_id" value= {{ $post->id }} >
                                        </div>
                                </div>
                                <input type="hidden" class="form-control" id="_token" name value={{ csrf_token() }}>

                                <div class="form-group">
                                        <textarea class="form-control mb-10" rows="5" name="comment" id="comment" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'"
                                                required=""></textarea>
                                </div>
                                <a href="#" class="button button-postComment button--active" id="commentButton">Comment</a>
                        </form>
                </div>
                @endauth
        </div>
        <div class="col-lg-4">
                <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget author_widget">
                                <img class="author_img rounded-circle" src="img/blog/author.png" alt="">
                                <h4>Charlie Barber</h4>
                                <p>Senior blog writer</p>
                                <p>Boot camps have its supporters andit sdetractors. Some people do not understand why you should
                                        have to spend money on boot camp when you can get. Boot camps have itssuppor ters andits
                                        detractors.
                                </p>
                                <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                                <h3 class="widget_title">Popular Posts</h3>
                         
                                @foreach($allpost as $pro)
                                <div class="media post_item">
                                        <img src="{{ $pro->photo }}"  alt="post" style="max-width:50px">
                                        <div class="media-body">
                                                <a href="{{ route('single-blog', $post->id) }}">
                                                        <h3>{{ $pro->title }}</h3>
                                                </a>
                                        </div>
                                </div>
                                @endforeach
                               
                               
                                <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget ads_widget">
                                <a href="#">
                                        <img class="img-fluid" src="img/blog/add.jpg" alt="">
                                </a>
                                <div class="br"></div>
                        </aside>
                        
                        <aside class="single-sidebar-widget newsletter_widget">
                                <h4 class="widget_title">Newsletter</h4>
                                <p>
                                        Here, I focus on a range of items and features that we use in life without giving them a second thought.
                                </p>
                                <div class="form-group d-flex flex-row">
                                        <div class="input-group">
                                                <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                                        </div>
                                                </div>
                                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email address" onfocus="this.placeholder = ''"
                                                        onblur="this.placeholder = 'Enter email'">
                                        </div>
                                        <a href="#" class="bbtns">Subcribe</a>
                                </div>
                                <p class="text-bottom">You can unsubscribe at any time</p>
                                <div class="br"></div>
                        </aside>
                        
                </div>
        </div>
</div>
        </div>
</section>
@endsection
  
@section('footer')
@include('layouts.footer')
@endsection