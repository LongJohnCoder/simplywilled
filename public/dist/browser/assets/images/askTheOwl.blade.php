@extends('layouts.app')

@section('seoContent')

<title>Welcome to Our Library: Your Free Estate Planning Learning Center</title>
<meta name="description" content="Your online resource for helpful estate planning guides and tips. Browse our library and get the information you need to make your last will online today.">
<meta name="keywords" content="Keyword, Estate Planning Tips, online will, how to write a will, how to make a will, writing a will, creating a will, Estate Planning, questions, making a will, free will forms, wills online, Estate Planning Tips, make a will, will maker, free last will and testament, free wills, simple will form, online will maker, free will template">

@endsection


@section('cssSource')

<link href="{!! asset('css/responsive-tabs.css') !!}" media="all" type="text/css" rel="stylesheet">

<link rel="stylesheet" href="{!! asset('css/jquery-ui.css') !!}" />

@endsection



@section('content')

<div class="inner_banner">
    <div class="wrapper">
        <h1 class="banner_heading_one">Welcome To The SimplyWilled Library</h1>
        <h3 class="banner_heading_two">Your Free Learning Resource Center</h3>
    </div>
</div>

<div class="owl_border_main">
    <div class="wrapper">
        <div class="ask_the_owl_page_img">
            <span class="owl_table_pic"><img src="{!! asset('images/ask-owl-top.png') !!}" alt="ask"></span>
            <form method="get" action="{{route('AskTheOwlPage')}}">
                <div class="sec5_form_main2">
                    <input type="text" placeholder="Type your question" id="askSearch" name="query" autocomplete="off" class="type_question_text2" value="{{$queryPara}}" required>
                    <input type="submit" value="Ask The Owl!" class="ask_owl_submit_btn2">
                    <div id="search_dropdown_container">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="wrapper">
    <div class="owl-tabs">
    	@if($queryOwl == 'false')
        	<div id="horizontalTab">
            	<ul>
                    <li><span class="tab-heading-top">Topic</span></li>
                    
                    @foreach($faqCat as $key => $val)
                    	<li><a href="#{{str_slug($key)}}">{{$key}}</a></li>
                    @endforeach
        
                </ul>
                @foreach($faqCat as $key => $val)
                    <div id="{{str_slug($key)}}">
                        <dl class="faqs">
                            @foreach($val->faq()->get() as $faq)
                                <dt>{{$faq->question}}</dt>
                                <dd>{!!$faq->answer!!}</dd>
                            @endforeach
                        </dl>
                    </div>
                @endforeach
            </div>
        @else
        	<dl class="faqs">
				@foreach($faqCat as $faq)
                    <dt>{{$faq->question}}</dt>
                    <dd>{!!$faq->answer!!}</dd>
				@endforeach
            </dl>
        @endif
    </div>
</div>
<div class="about_sec4">
    <div class="wrapper">
        <h1 class="about_state_planning_text">Estate Planning Made Simple & Affordable.</h1>
        <h4 class="select_plan">Select your plan now and Keep your loved ones safe!</h4>
    </div>
</div>

@endsection

@section('jsSource')

<!-- autocomplete search -->
<script src="{!! asset('js/jquery-ui.min.js') !!}"></script>

<script src="{!! asset('js/jquery.responsiveTabs.js') !!}" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function () {
	
	// responsive tab
	$('#horizontalTab').responsiveTabs({
		rotate: false,
		startCollapsed: 'accordion',
		collapsible: 'accordion',
		setHash: false,
	});
	setTimeout(function(){
		$('#horizontalTab li:nth-child(2) a').trigger('click');
	},500);
			
	// faq show/hide		
	$(".faqs dd").hide();
	var clos_btn = 0;
	$(".faqs dt").click(function () {
		if(false == $(this).next().is(':visible')) { //hide current tab when click on other tab
			$('.faqs dd').slideUp(300);
			$(".faqs dt").removeClass('expanded');
		}
		$(this).next(".faqs dd").slideToggle(500);
		$(this).toggleClass("expanded");

	});
	
	// autocomplete search
	$('#askSearch').autocomplete({
		source: "{{route('AskTheOwlSearch')}}", 
		appendTo: '#search_dropdown_container'
	});
	
});
</script>

<script type="text/javascript">

/*getSupportHelp();

var apiUrl = "https://simplywilledhelp.zendesk.com/api/v2/";
var token = "RcxlLXX0kPm4eJ9fzNRkyuE4qdHD4qehJSCNVdpf";
var Oauth = "bed3702ba3cca6a0dc89d475bbcbe15176a36df2af2931732a48a77c920224f6";
function getSupportHelp(){
	var settings = {
	  "async": true,
	  "crossDomain": true,
	  "url": apiUrl+"help_center/articles/search.json?query={{$queryPara}}",
	  "method": "GET",
	  "headers": {
		"content-type": "application/json",
		"Authorization":'Bearer '+token
	  },
	  "processData": false,
	}
	$.ajax(settings).done(function (response){
		try {
			response = JSON.parse(JSON.stringify(response));
		} catch (e) {
			alert("Error: Wrong response.");
			return;
		}
		if(response.success == false){
			alert('error');
		}else{
			alert('Success');
		}
	}).fail(function(error){
		console.log(error);
		alert("Error: No response.");
	});

}*/

    </script>



@endsection