@extends('layouts.app')

@section('seoContent')

<title>SimplyWilled Online Estate Planning Made Simple</title>
<meta name="description" content="SimplyWilled is the simplest way to make your last will and testament healthcare power of attorney and power of attorney online. It takes less than 10 minutes and you're done.">
<meta name="keywords" content="will, online will, how to write a will, how to make a will, writing a will, creating a will, revocable trust, making a will, free will forms, wills online, last will testament, estate planning, will maker, free last will and testament, free wills, simple will form, estate plan, free will template">

@endsection

@section('cssSource')

<link href="{!! asset('css/flexslider.css') !!}" media="all" type="text/css" rel="stylesheet">

{{--<link rel="stylesheet" href="{!! asset('css/jquery-ui.css') !!}" />--}}

@endsection

@section('content')

<div class="heaser_sec2_slider">
    <div class="slider">
        <div class="flexslider">
            <ul class="slides">
                <li>
                    <div class="index_banner index_banner2">
                        <div class="wrapper">
                            <h1 class="state_planning_text">It's Your Nest Egg Protect It</h1>
                            <h1 class="made_simple_text">With SimplyWilled</h1>
                            <ul class="index_banner_ul">
                                <li>Save Time</li>
                                <li>Save Money</li>
                            </ul>
                            <span class="ecforceable_btn">
                                <span class="state_img sprite_sheet"></span>
                                <h3 class="enforceable_text">Enforceable In All 50 States</h3>
                            </span>
                            <div class="banner_owl_main">
                            	<a href="{{route('CustomerRegistrationPage')}}" class="get_start_btn"><i class="fa fa-chevron-right" aria-hidden="true"></i> Get Started</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="index_banner index_banner3">
                        <div class="wrapper">
                            <h1 class="state_planning_text">Estate Planning Made</h1>
                            <h1 class="made_simple_text">Simple and Affordable</h1>
                            <ul class="index_banner_ul">
                                <li>All from the comfort of your home!</li>
                            </ul>
                            <span class="ecforceable_btn">
                                <span class="state_img sprite_sheet"></span>
                                <h3 class="enforceable_text">Enforceable In All 50 States</h3>
                            </span>
                            <div class="banner_owl_main">
                            	<a href="{{route('CustomerRegistrationPage')}}" class="get_start_btn"><i class="fa fa-chevron-right" aria-hidden="true"></i> Get Started</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="index_banner index_banner4">
                        <div class="wrapper">
                            <h1 class="state_planning_text">Protect Your Assets</h1>
                            <h1 class="made_simple_text">And Your Loved Ones</h1>
                            <ul class="index_banner_ul">
                                <li>It’s secure & it takes less than 10 minutes</li>
                            </ul>
                            <span class="ecforceable_btn">
                                <span class="state_img sprite_sheet"></span>
                                <h3 class="enforceable_text">Enforceable In All 50 States</h3>
                            </span>
                            <div class="banner_owl_main">
                            	<a href="{{route('CustomerRegistrationPage')}}" class="get_start_btn"><i class="fa fa-chevron-right" aria-hidden="true"></i> Get Started</a>
                            </div>
                        </div>
                    </div>
                </li>
                {{--<li>
                    <div class="index_banner">
                        <div class="wrapper">
                            <h1 class="state_planning_text">Online Estate Planning </h1>
                            <h1 class="made_simple_text">Made Simple!</h1>
                            <ul class="index_banner_ul">
                                <li>Secure</li>
                                <li>Affordable</li>
                                <li>Simple</li>
                            </ul>
                            <span class="ecforceable_btn">
                                <span class="state_img"><img src="{!! asset('images/state-img.png') !!}" alt="states"></span>
                                <h3 class="enforceable_text">Enforceable In All 50 States</h3>
                            </span>
                            <div class="banner_owl_main">
                            	<a href="{{route('CustomerRegistrationPage')}}" class="get_start_btn"><i class="fa fa-chevron-right" aria-hidden="true"></i> Get Started</a>
                            </div>
                        </div>
                    </div>
                </li>--}}
            </ul>
        </div>
    </div>
</div>
<div class="index_sec1 border_top_green">
    <div class="wrapper">
        <div class="sec1_left">
        <ul class="protect_loved_ul">
            <li>
                <span class="loved_img sprite_sheet"></span>
                <div class="protect_loved_right">
                    <h2>PROTECT YOUR LOVED ONES</h2>
                    <p>Name guardians and list beneficiaries so those you love are in good hands.</p>
                </div>
            </li>
            <li>
                <span class="loved_img sprite_sheet"></span>
                <div class="protect_loved_right">
                    <h2>PROTECT YOUR ASSETS</h2>
                    <p>Ensure the assets you’ve worked hard for pass to the ones you love.</p>
                </div>
            </li>
            <li>
                <span class="loved_img sprite_sheet"></span>
                <div class="protect_loved_right">
                    <h2>SAVE TIME & MONEY</h2>
                    <p>It takes less than 10 minutes and you're done. Try it today and see how simple preparing your estate plan online can be.</p>
                </div>
            </li>
        </ul>
        <span class="get_start_btn_main"><a href="{{route('CustomerRegistrationPage')}}"><i class="fa fa-chevron-right" aria-hidden="true"></i> Get Started</a></span>
        </div>
        <a href="javascript:void(0)" class="last_will_testament">
        	<img src="{!! asset('images/mainWillDocument.jpg') !!}" alt="print">
            <span class="will_testament_btn"><i class="fa fa-search"></i> View Sample</span>
        </a>
    </div>
</div>
<div class="index_sec2">
    <div class="wrapper">
        <span class="enforceable_estate">Enforceable Estate Documents <br><span>Customized For You</span> </span>
        <ul class="last_will_treatment_ul">
            <li>
                <span class="last_will_img sprite_sheet"></span>
                <div class="last_will_right_sec">
                    <h3>Last Will & Testament</h3>
                    <p>Draft a personalized Last Will & Testament so your wishes are known. Name your Personal Representative, list beneficiaries and appoint guardians for minor children.</p>
                </div>
            </li>
            <li>
                <span class="last_will_img sprite_sheet"></span>
                <div class="last_will_right_sec">
                    <h3>Revocable Living Trust</h3>
                    <p>Prepare a personalized revocable living trust so your estate is protected. Appoint a trustee, name beneficiaries and plan out how your estate should be distributed.</p>
                </div>
            </li>
            <li>
                <span class="last_will_img sprite_sheet"></span>
                <div class="last_will_right_sec">
                    <h3>Living Will</h3>
                    <p>State your wishes for medical treatment and end-of-life care, in the event of incapacity.</p>
                </div>
            </li>
            <li>
                <span class="last_will_img sprite_sheet"></span>
                <div class="last_will_right_sec">
                    <h3>Home Transfer Deed</h3>
                    <p>Prepare a real property transfer deed to fund your revocable living trust with any real estate you may own to avoid probate later.</p>
                </div>
            </li>
            <li>
                <span class="last_will_img sprite_sheet"></span>
                <div class="last_will_right_sec">
                    <h3>Financial Power of Attorney</h3>
                    <p>Complete a financial power of attorney and name an individual to oversee your financial affairs in the event you are incapacitated.</p>
                </div>
            </li>
            <li>
                <span class="last_will_img sprite_sheet"></span>
                <div class="last_will_right_sec">
                    <h3>Healthcare Power of Attorney</h3>
                    <p>A healthcare power of attorney and living will so your wishes are known in the event of a medical emergency.</p>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="index_sec7">
    <div class="wrapper">
        <h1 class="save_text">Our Average Customer <span>Saves 80%</span> <br>With SimplyWilled Estate Planning!</h1>
        <ul class="sec7_ul">
            <li>Safe</li>
            <li>Simple</li>
            <li>Smart</li>
        </ul>
        <span class="sec2_btn_main"><a href="{{route('CustomerRegistrationPage')}}"><i class="fa fa-chevron-right" aria-hidden="true"></i> Get Started</a></span>
    </div>
</div>
{{--<div class="index_sec3">
    <div class="wrapper">
        <h1 class="attorney_At_law_text">Attorneys & Estate Planning Experts <br>Behind Every Choice That We Make</h1>
        <ul class="sec3_planning_ul">
            <li>
                <span class="planning_img"><img src="{!! asset('images/legal-mind.png') !!}" alt="Legal mind"></span>
                <h4>Renowned Legal Minds</h4>
                <p>Our service was designed by leading estate planning attorneys with decades of experience.</p>
            </li>
            <li>
                <span class="planning_img"><img src="{!! asset('images/customized.png') !!}" alt="customizes"></span>
                <h4>Customized For All 50 States</h4>
                <p>Your documents are customized in accordance with your state’s current laws.</p>
            </li>
            <li>
                <span class="planning_img"><img src="{!! asset('images/personalized.png') !!}" alt="personalized"></span>
                <h4>Personalized Just For You</h4>
                <p>Quickly create documents that are tailored to achieve your needs and objectives.</p>
            </li>
        </ul>
        <span class="sec3_btn_main"><a href="{{route('CustomerRegistrationPage')}}"><i class="fa fa-chevron-right" aria-hidden="true"></i> Get Started</a></span>
    </div>
</div>
<div class="index_sec4">
    <div class="wrapper">
        <h1 class="proprietary_text">Proprietary Technology To Keep <br>Your Information Safe</h1>
        <ul class="sec4_ul">
            <li>
                <span class="protection_img"><img src="{!! asset('images/protection-img.png') !!}" alt="protection"></span>
                <h3 class="protection_text">Data Protection</h3>
                <p class="protection_pera">Secure servers and SSL encryption protect your sensitive information from unauthorized access and use.</p>
            </li>
            <li>
                <span class="protection_img"><img src="{!! asset('images/privacy-img.png') !!}" alt="privacy"></span>
                <h3 class="protection_text">Privacy Protection</h3>
                <p class="protection_pera">Your private information is not disclosed to anyone, period.</p>
            </li>
            <li>
                <span class="protection_img"><img src="{!! asset('images/clock.png') !!}" alt="clock"></span>
                <h3 class="protection_text">Around The Clock Surveillance</h3>
                <p class="protection_pera">We are verified and monitored by the world’s leading security experts.</p>
            </li>
        </ul>
    </div>
</div>--}}
<div class="index_sec5" id="how_work">
    <div class="wrapper">
        <div class="video_main">
            <img src="{!! asset('images/video.png') !!}" alt="video img">
        </div>
        <div class="sec5_left_main">
            <h1 class="its_easy_text">It’s As Easy As <br><span>One, Two, Three!</span></h1>
            <ul class="sec5_easy_ul">
                <li>
                    <span class="print_img sprite_sheet"></span>
                    <div class="print_img_right_sec">
                        <h3>1. Click</h3>
                        <p>To get started, simply answer a few short questions using our easy to follow estate planning questionnaire.</p>
                    </div>
                </li>
                <li>
                    <span class="print_img sprite_sheet"></span>
                    <div class="print_img_right_sec">
                        <h3>2. Print</h3>
                        <p>Select the documents you want. When you’re ready instantly download and print your custom estate planning documents.</p>
                    </div>
                </li>
                <li>
                    <span class="print_img sprite_sheet"></span>
                    <div class="print_img_right_sec">
                        <h3>3. Execute</h3>
                        <p>Execute your custom estate plan using our simple instructions, and you’re done. It’s that simple.</p>
                    </div>
                </li>
            </ul>
        </div>        
    </div>
</div>
<div class="index_sec6_pkg">
    <div class="wrapper">
        <h1 class="pkg_heading">Simple Pricing <br><span>Everyone Can Afford</span></h1>
        @include('layouts.packagesSection')
    </div>
</div>

{{--<div class="wrapper">
    <div class="index_sec8">
            <h1 class="ask_owl_text">Have questions? <span>Ask the Owl.</span></h1>
            <p class="ask_owl_pera">If you need help while using SimplyWilled, feel free to click on the owl icon for helpful estate planning tips and suggestions.</p>
            <form method="get" action="{{route('AskTheOwlPage')}}">
                <div class="sec5_form_main">
                    <input type="text" id="askSearch" name="query" autocomplete="off" placeholder="Type your question" class="type_question_text" required>
                    <input type="submit" value="Ask The Owl!" class="ask_owl_submit_btn">
                    <div id="search_dropdown_container">
                    </div>
                </div>
            </form>
    </div>
</div>--}}
<div class="index_sec9_slider">
    <div class="wrapper">
        <h1 class="happy_user_text">Our Happy Customers </h1>
        <div class="sec9_flexiel_slider">
               <div class="slider">
        <div class="flexslider2">
            <ul class="slides">
                <li>
                    <span class="testimonial_img sprite_sheet"></span>
                    <p class="testimonial_pera">My husband and i had put off making our wills for years. With <strong>SimplyWilled</strong> we were able to make our wills and revocable trusts in less than 20 minutes.</p>
                    <h3 class="clients_name">Georgia W.</h3>
                </li>
                <li>
                    <span class="testimonial_img2 sprite_sheet"></span>
                    <p class="testimonial_pera">We love <strong>SimplyWilled,</strong> after talking to a few expensive lawyers we decided to use <strong>SimplyWilled.</strong> It made planning our estate simple and affordable.</p>
                    <h3 class="clients_name">Josh W.</h3>
                </li>
                <li>
                    <span class="testimonial_img3 sprite_sheet"></span>
                    <p class="testimonial_pera">I used <strong>SimplyWilled</strong> to make my single will package to make sure the ones I care about were covered.</p>
                    <h3 class="clients_name">Carter E.</h3>
                </li>
                <li>
                    <span class="testimonial_img4 sprite_sheet"></span>
                    <p class="testimonial_pera">As a newly wed couple with a growing family, thank you <strong>SimplyWilled</strong> for making planning our estate so simple.</p>
                    <h3 class="clients_name">Donna M.</h3>
                </li>
            </ul>
        </div>
    </div> 
        </div>
    </div>
</div>

<!--popup video-->
<div class="blue_div"></div>
<div class="blue_video">
    <span class="blue_icone"><i class="fa fa-times" aria-hidden="true"></i></span>
    <iframe id="iframeVideo" class="custom_lazyload" data-src="https://www.youtube.com/embed/DsOpMzQ65DI?rel=0&enablejsapi=1" allowfullscreen sandbox="allow-same-origin allow-scripts"></iframe>
</div>

<!--popup2 pdf -->
<div class="popup2_main">
	<span class="close_popup2"><i class="fa fa-times" aria-hidden="true"></i></span>
    <div class="popup2_sec1">
    	<span class="preview_doc">Preview Document - Last Will and Testament</span>
        <a href="{{route('CustomerRegistrationPage')}}" class="popup2_start_btn"><i class="fa fa-chevron-right" aria-hidden="true"></i> Get Started</a>
        <div class="popup_pdf_main">
        	<div class="pdf_img">
            	<img class="custom_lazyload b-lazy" data-src="{!! asset('images/mainWillDocument-1.png') !!}" alt="pdf">
            </div>
        </div>
    </div>
</div>


@endsection

@section('jsSource')

<!-- autocomplete search -->
{{--<script src="{!! asset('js/jquery-ui.min.js') !!}"></script>--}}

<script src="{!! asset('js/jquery.flexslider.js') !!}"></script>

<script type="text/javascript">
    $(document).ready(function(){
      
	  	// banner slider
	  	$('.flexslider').flexslider({
			animation: "slide",
			directionNav: false,
			controlNav: false,
		});
		
	  	//  slider2 testimonil
	  	$('.flexslider2').flexslider({
			animation: "slide",
			directionNav: true,
			controlNav: false,
		});
		// video popup show
		$('.video_main').click(function(e) {
			var bLazy = new Blazy();
			bLazy.load($('#iframeVideo'), true);
			$('#iframeVideo')[0].contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
			$('.blue_div, .blue_video').fadeIn(0);
		});
		
		// video popup hide
		$('.blue_div, .blue_icone').click(function(e) {
			$('#iframeVideo')[0].contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
			$('.blue_div, .blue_video').fadeOut(0);
		});
	
		// packages included show
		$('.expand_table').click(function(e) {
			$('.expand_table').hide();
			$('.hide_show_main_pkg').slideDown(500);
			$('.collaps_table').slideDown();
			$('.hide_btn').hide();
		});
		
		// packages included hide
		$('.collaps_table').click(function(e) {
			$('.collaps_table').hide();
			$('.hide_show_main_pkg').slideUp(500);
			$('.expand_table').slideDown();
			$('.hide_btn').show();
		});
		
		// autocomplete search
		{{--$('#askSearch').autocomplete({
			source: "{{route('AskTheOwlSearch')}}", 
			appendTo: '#search_dropdown_container'
		});--}}
		
		
		// popup 2 pdf 
		$('.last_will_testament').click(function(e) {
			var bLazy = new Blazy();
			bLazy.revalidate();
			$('.popup2_main, .blue_div').fadeIn();
			var windHeight=$(window).height();
			$('.popup_pdf_main').css('max-height', windHeight-200+'px');
		});
		$('.close_popup2, .blue_div').click(function(e) {
			$('.popup2_main, .blue_div').fadeOut();
		});
	
});
</script>

@endsection
