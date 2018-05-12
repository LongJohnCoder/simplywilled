@extends('layouts.app')

@section('seoContent')

<title>Welcome to Trending News Page, your source for helpful estate planning articles and guides</title>
<meta name="description" content="Brush up on the latest estate planning news, articles and estate information so you are up to speed on everything you need to know to plan your estate.">
<meta name="keywords" content="best way to make a will, when to make a will, where to make a will, best way to make, best way to do a will, free will blog, dying with a will, two scenarios, die with a will, what happens when you are dying, florida estate law no will, no will where does money go, willing yourself to die, what happens if, husband dies without a will, leaving a will to one person, what happens if your husband dies without a will, what happens if you die at home, dying will, what happens without a will">

@endsection


@section('content')

<div class="inner_banner">
    <div class="wrapper">
        <h1 class="banner_heading_one">Brush Up On Your Estate Planning Knowledge</h1>
        <h3 class="banner_heading_two">With These Helpful Articles And Guides.</h3>
    </div>
</div>
<div class="trending_main border_top_green">
    <div class="wrapper">
        <div class="trending_left">
            <ul class="trending_ul">
            	@forelse($blogs as $blog)
                    <li>
                        <a href="{{route('TrendingNewsDetailPage', ['slug'=>$blog->slug])}}" class="trending_img"><img src="{!! url($blog->image) !!}" alt="{{$blog->title}}"></a>
                        <h1 class="news_heading">{{$blog->title}}</h1>
                        <ul class="trending_sub_left_ul">
                            <li>
                                <span class="news_owl sprite_sheet"><!--<img src="{!! asset('images/news_owl.png') !!}" alt="simply willed admin">--></span>
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
                        <p class="legal_requirement">{{trim_word($blog->body, 140)}}</p>
                        <a href="{{route('TrendingNewsDetailPage', ['slug'=>$blog->slug])}}" class="news_read_more"><i class="fa fa-chevron-right" aria-hidden="true"></i> Read More</a>
                    </li>
                @empty
                	<li>No Record</li>
                @endforelse
            </ul>
            {{ $blogs->links("layouts.customPagination") }}
        </div>
        <div class="trending_right_main">
            <h2 class="subscribe_text_main"><span class="subscribe_text">SUBSCRIBE</span></h2>
            <form action="{{route('NewsletterSubscriptionPost')}}" method="post">
            	{!! csrf_field() !!}
                <div class="subscribe_form_main">
                    <input type="email" name="email" placeholder="Your email address" class="subscribe_mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="{{ old('email') }}" required>
                    <input type="submit" class="subscribe_submit_btn" value="Subscribe">
                </div>
            </form>
            <h2 class="subscribe_text_main"><span class="subscribe_text">CATEGORIES</span></h2>
            <ul class="cat_ul">
            	@foreach($categories as $category)
                	<li><a href="{{route('TrendingNewsCategoryPage', ['slug'=>$category->slug])}}">{{$category->name}} &nbsp;<span>({{sizeof($category->blog)}})</span></a></li>
                @endforeach
            </ul>
            <h2 class="subscribe_text_main"><span class="subscribe_text">POPULAR POSTS </span></h2>
            <ul class="post_ul">
            	@forelse($popularBlogs as $popularBlog)
                	<li>
                        <a href="{{route('TrendingNewsDetailPage', ['slug'=>$popularBlog->slug])}}" class="post_img"><img src="{!! url($popularBlog->image) !!}" alt="{{$popularBlog->title}}"></a>
                        <div class="post_right_main">
                            <a href="{{route('TrendingNewsDetailPage', ['slug'=>$popularBlog->slug])}}" class="post_heading">{{$popularBlog->title}}</a>
                            <h4 class="healthcare_text">{{$popularBlog->blogCategory[0]->name}}</h4>
                        </div>
                    </li>
                @empty
                	<li>No Record</li>
                @endforelse
            </ul>
            <h2 class="subscribe_text_main"><span class="subscribe_text">RECENT POSTS </span></h2>
            <ul class="post_ul">
            	@forelse($recentBlogs as $recentBlog)
                	<li>
                        <a href="{{route('TrendingNewsDetailPage', ['slug'=>$recentBlog->slug])}}" class="post_img"><img src="{!! url($recentBlog->image) !!}" alt="{{$recentBlog->title}}"></a>
                        <div class="post_right_main">
                            <a href="{{route('TrendingNewsDetailPage', ['slug'=>$recentBlog->slug])}}" class="post_heading">{{$recentBlog->title}}</a>
                            <h4 class="healthcare_text">{{$recentBlog->blogCategory[0]->name}}</h4>
                        </div>
                    </li>
                @empty
                	<li>No Record</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
<div class="about_sec4">
    <div class="wrapper">
        <h1 class="about_state_planning_text">Estate Planning Made Simple &amp; Affordable.</h1>
        <h4 class="select_plan">Select your plan now and Keep your loved ones safe!</h4>
    </div>
</div>

@endsection