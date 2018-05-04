@extends('layouts.app')

@section('seoContent')

<title>We believe in Simple Pricing that everyone can afford</title>
<meta name="description" content="Simple estate plan pricing that everyone can afford. Make your a custom Last Will, Healthcare Power of Attorney, Financial Power of Attorney online today.">
<meta name="keywords" content="Keyword, free will, will forms, free will form, forms for wills, free will documents, will form, will paperwork, free forms for wills, free legal, will forms, free forms for a will, will forms free, forms for a will, legal will form, free legal forms will, free will template, form for wills free, free simple will forms, legal will forms, free wills form, free will paperwork, free will papers">

@endsection


@section('content')

<div class="inner_banner">
    <div class="wrapper">
        <h1 class="banner_heading_one">Simple Pricing</h1>
        <h3 class="banner_heading_two">Everyone Can Afford</h3>
    </div>
</div>
<div class="index_sec6_pkg border_top_green">
    <div class="wrapper">
        <h1 class="pkg_heading" style="padding:30px 0;">&nbsp;</h1>
        @include('layouts.packagesSection')
    </div>
</div>
{{--<div class="pricing_sec2">
    <div class="wrapper">
        <span class="have_q_owl"><img src="{!! asset('images/have-q-owl.png') !!}" alt="Have Owl"></span>
        <div class="customer_average_text">
            <h1 class="average-text">Our Average Customer <span>Saves 80%</span></h1>
            <h1 class="state_planing_text">With SimplyWilled Estate Planning!</h1>
            <ul class="pricing_smart_ul">
                <li>Safe</li>
                <li>Simple</li>
                <li>Smart</li>
            </ul>
        </div>
    </div>
</div>
<div class="pricing_sec3">
    <div class="wrapper">
        <h1 class="protect_matter_text">Protect <br>What Matters Most</h1>
        <ul class="sec3_protet_ul">
            <li>
                <span class="protect_img"><img src="{!! asset('images/protect1.png') !!}" alt="Protect 1"></span>
                <h2 class="protect_heading">Protect Your Loved Ones</h2>
                <p class="protect_pera">Name guardians and list beneficiaries so those you love are in good hands.</p>
            </li>
            <li>
                <span class="protect_img"><img src="{!! asset('images/protect2.png') !!}" alt="Protect 2"></span>
                <h2 class="protect_heading">Protect Your Assets</h2>
                <p class="protect_pera">Ensure the assets you've worked hard for pass to the ones you love.</p>
            </li>
            <li>
                <span class="protect_img"><img src="{!! asset('images/protect3.png') !!}" alt="Protect 3"></span>
                <h2 class="protect_heading">Save Time & Money</h2>
                <p class="protect_pera">It take less than 10 minutes and you're done. Avoid the hassle of hiring expensive lawyers.</p>
            </li>
            <li>
                <span class="protect_img"><img src="{!! asset('images/protect4.png') !!}" alt="Protect 4"></span>
                <h2 class="protect_heading">Plan for a Medical Emergency</h2>
                <p class="protect_pera">Appoint a healthcare agent and financial power of attorney so your affairs are in order.</p>
            </li>
            <li>
                <span class="protect_img"><img src="{!! asset('images/protect5.png') !!}" alt="Protect 5"></span>
                <h2 class="protect_heading">Make Sure Your Wishes are Known</h2>
                <p class="protect_pera">Simple plain language documents that spell out your wishes so there are no complications.</p>
            </li>
        </ul>
    </div>
</div>--}}

@endsection

@section('jsSource')

<script type="text/javascript">
    $(document).ready(function(){
      
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
		
		// default open packages
		$('.expand_table').trigger('click');
	
	});
</script>

@endsection