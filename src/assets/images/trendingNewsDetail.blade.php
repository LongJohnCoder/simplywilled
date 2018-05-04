@extends('layouts.app')

@section('seoContent')

<title>{{($blog->seo_title != "")? $blog->seo_title: $blog->title}}</title>
<meta name="description" content="{{$blog->meta_description}}">
<meta name="keywords" content="{{$blog->meta_keywords}}">

<meta property="og:url"                content="{{route('TrendingNewsDetailPage', ['slug'=>$blog->slug])}}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="{{$blog->title}}" />
<meta property="og:description"        content="{{trim_word($blog->body, 140)}}" />
<meta property="og:image"              content="{!! url($blog->image) !!}" />

@endsection


@section('content')

<div class="wrapper">
    <div class="trending_main">
        <span class="single_post"><img src="{!! url($blog->image) !!}" alt="{{$blog->title}}"></span>
        <h1 class="why_do_need_will">{{$blog->title}}</h1>
        <ul class="trending_sub_left_ul">
            <li>
                <span class="news_owl"><img src="{!! asset('images/news_owl.png') !!}" alt="Owl"></span>
                <span class="by_simply_willed_text">By Simply<span>Willed</span></span>
            </li>
            <li>
                <span class="by_simply_willed_text">{{$blog->created_at->format('d M, Y')}}</span>
                </li>
            <li>
              <span class="by_simply_willed_text">{{sizeof($blog->blogComments()->where('status', 'approved')->get())}} comments</span>
            </li>
        </ul>
        <ul class="trending_right_ul">
            <li><a href="javascript:void(0)">Share:</a></li>
            <li><a href="https://twitter.com/share?url={{route('TrendingNewsDetailPage', ['slug'=>$blog->slug])}}&text={{$blog->title}}" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
            <li><a href="http://www.facebook.com/sharer.php?u={{route('TrendingNewsDetailPage', ['slug'=>$blog->slug])}}" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
            <li><a href="https://plus.google.com/share?url={{route('TrendingNewsDetailPage', ['slug'=>$blog->slug])}}" target="_blank"><i class="fa fa-google-plus-official" aria-hidden="true"></i></a></li>
            <li><a href="https://pinterest.com/pin/create/bookmarklet/?media={!! url($blog->image) !!}&url={{route('TrendingNewsDetailPage', ['slug'=>$blog->slug])}}&description={{$blog->title}}" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
            <li><a href="http://wordpress.com/press-this.php?u={{route('TrendingNewsDetailPage', ['slug'=>$blog->slug])}}&t={{$blog->title}}&s={{trim_word($blog->body, 140)}}&i={!! url($blog->image) !!}" target="_blank"><i class="fa fa-wordpress" aria-hidden="true"></i></a></li>
            <li><a href="http://www.linkedin.com/shareArticle?url={{route('TrendingNewsDetailPage', ['slug'=>$blog->slug])}}&title={{$blog->title}}" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
        </ul>
        
        <div class="content_area">
        	{!!$blog->body!!}
        </div>
        
        <div class="scope-comment-section">
			<span class="scope-comment-heading">COMMENTS</span>
			<ul class="scope-ul-comment-section-main">
				@forelse($blog->blogComments()->where('status', 'approved')->get() as $comment)
                <li>

                    <span class="scope-ul-image" ><img src="{!! asset('images/Favion.png') !!}" alt="{{$comment->name}}"></span>

                    <div class="scope-left-list">

                        <span class="scope-ul-list-heading">{{$comment->name}} / {{$comment->created_at->format('d M Y')}}</span>

                        <p class="scope-ul-list-pragraph">{{$comment->message}}</p>

                        <a class="scope-ul-button scroll_class" href="#comment_box">Reply</a>

                    </div>

                </li>
                @empty
                <li class="comments_text">No Comment</li>
                @endforelse
            </ul>
        </div>
        <form id="comment_box" action="{{route('TrendingNewsCommentPost')}}" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="post_id" value="{{$blog->id}}">
            <div class="from_main2">
                <h3 class="post_comment_text">POST a COMMENT:</h3>
                <ul class="form2_ul">
                    <li>
                        <input type=type="text" name="name" placeholder="Your Name" value="{{ old('name') }}" required>
                    </li>
                    <li>
                        <input type="email"  name="email" placeholder="Your Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="{{ old('email') }}" required>
                    </li>
                    <li>
                        <textarea placeholder="Your Comment" name="message" required>{{ old('message') }}</textarea>
                    </li>
                </ul>
                <input type="submit" value="Submit" class="form2_submit">
            </div>
        </form>
    </div>
</div>
<div class="about_sec4">
    <div class="wrapper">
        <h1 class="about_state_planning_text">Estate Planning Made Simple &amp; Affordable.</h1>
        <h4 class="select_plan">Select your plan now and Keep your loved ones safe!</h4>
    </div>
</div>

<a href="{{route('CustomerRegistrationPage')}}" class="sticky_get_started_btn">Get Started</a>

@endsection



@section('jsSource')

@endsection