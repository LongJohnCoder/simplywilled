@extends('layouts.app')

@section('seoContent')

@if(Request::route()->getName() == 'ConfirmedRequestPage')
	<title>Conﬁrmed!</title>
@elseif(Request::route()->getName() == 'DeclinedRequestPage')
	<title>Declined</title>
@else
	<title>Join SimplyWilled.com today and see how simple online estate planning can be</title>
	<meta name="description" content="Get started now and see how simple making your online last will and testament, selecting guardians, naming powers of attorney and protecting your assets can be">
    <meta name="keywords" content="Sign up to make a last will and testament, how to make a last will and testament, DIY Will,
Revocable trust online, online estate planning, get started, sign up">

@endif

@endsection

@section('cssSource')

<!-- oneall social -->
<script type="text/javascript">
 var oa = document.createElement('script');
 oa.type = 'text/javascript'; oa.async = true;
 oa.src = '//simplywilledcom.api.oneall.com/socialize/library.js'
 var s = document.getElementsByTagName('script')[0];
 s.parentNode.insertBefore(oa, s)
</script>

@endsection

@section('jsSource')
<script>
// sign up user
function signUpUser(_id){
	if($('#'+_id).is('[disabled=disabled]')){
		return false;
	}else{
		$('#'+_id).attr('disabled','disabled');
		$("#response_div").hide();
		$("#response_loader").fadeIn();
		var dataString = $('#signUpForm').serialize();
		$.ajax({
			type: "POST",
			url: "{{ route('RegistrationRequest') }}",
			data: dataString,
			cache: false,
			success: function(result){
				$("#response_loader").hide();
				if($.trim(result.result) == 'success'){
					$("#response_div").text(result.message);
					$("#response_div").fadeIn();
					setTimeout(function(){ window.location.href = result.redirect; }, 2000);
				}else {
					$("#response_div").text(result.message);
					$("#response_div").fadeIn();
				}
			},
			error: function (data) {
				$("#response_loader").hide();
				$.each(data.responseJSON, function (key, value) {
					$("#response_div").text(value);
					$("#response_div").fadeIn();
					return false;
				});
			}
		});
		$('#'+_id).removeAttr('disabled');
		return;
	}
}
</script>
@endsection

@section('content')

<div class="confirmd_main grey_bg border_top_green">
    <div class="wrapper">
        <div class="confirm_left">
        	@if(Request::route()->getName() == 'ConfirmedRequestPage' || Request::route()->getName() == 'DeclinedRequestPage')
            	@if(Request::route()->getName() == 'ConfirmedRequestPage')
            		<h1 class="confirmed_text">CONFIRMED!</h1>
                	<p class="agree_to_be_responsible">You have agreed to be resposible for carrying out {{Request::get("client-name")}}'s wishes.</p>
                @else
                	<h1 class="confirmed_text" style="color:#ef2c43;">Declined!</h1>
                	<p class="agree_to_be_responsible">You have declined to be resposible for carrying out {{Request::get("client-name")}}'s wishes.</p>
                @endif
                <h2 class="last_will_text">Have you made your last will?</h2>
                <p class="wishes_text">Try SimplyWilled today and make sure your wishes are know.</p>
                <h2 class="have_ques_text">Have a question?</h2>
                <h3 class="email_text">Email: <a href="mailto:info@simplywilled.com">info@simplywilled.com</a></h3>
            @else
                <h1 class="login_text">SIGN UP TO CREATE <span>YOUR ACCOUNT</span></h1>
                <ul class="protect_loved_ul2">
                    <li>
                        <span class="loved_img2"><img src="{!! asset('images/protect-img.png') !!}" alt="protect"></span>
                        <div class="protect_loved_right2">
                            <h2>PROTECT YOUR LOVED ONES</h2>
                            <p>Name guardians and list beneficiaries so those you love are in good hands.</p>
                        </div>
                    </li>
                    <li>
                        <span class="loved_img2"><img src="{!! asset('images/assets.png') !!}" alt="assets"></span>
                        <div class="protect_loved_right2">
                            <h2>PROTECT YOUR ASSETS</h2>
                            <p>Ensure the assets you’ve worked hard for pass to the ones you love.</p>
                        </div>
                    </li>
                    <li>
                        <span class="loved_img2"><img src="{!! asset('images/save-time.png') !!}" alt="save time"></span>
                        <div class="protect_loved_right2">
                            <h2>SAVE TIME &amp; MONEY</h2>
                            <p>It takes less than 10 minutes and you're done. Try it today and see how simple preparing your estate plan online can be.</p>
                        </div>
                    </li>
                </ul>
            @endif
        </div>
        <div class="confirm_right">
            <div class="confirmed_form_top">
                <h1 class="form_heading">Join SimplyWilled</h1>
                <p class="form_pera">SimplyWilled is the easiest way to make your estate plan online. Sign up below to get started.</p>
            </div>
            
            {{--<div id="oa_social_login"></div>
			<script type="text/javascript">
             var _oneall = _oneall || [];
             _oneall.push(['social_login', 'set_callback_uri', 'http://127.0.0.1:8000/social-oneall-callback?_token={{csrf_token()}}']);
             _oneall.push(['social_login', 'set_providers', ['facebook', 'google', 'linkedin', 'twitter', 'instagram']]);
             _oneall.push(['social_login', 'set_custom_css_uri', 'https://secure.oneallcdn.com/css/api/themes/beveled_connect_w208_h30_wc_v1.css']);
             _oneall.push(['social_login', 'set_grid_sizes', [1,]]);
             _oneall.push(['social_login', 'do_render_ui', 'oa_social_login']);
            </script>--}}
            
            <div class="confirmed_form_white_sec">
                <form id="signUpForm">
                	{{ csrf_field() }}
                    <input type="email" name="email" placeholder="Email Address" class="email_form">
                    <input type="password" name="password" placeholder="Password" class="email_form">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" class="email_form">
                    <div class="ajax_response" id="response_div"></div>
                    <div class="loader_parent" id="response_loader">
                    	<span class="loader"></span>
                    </div>
                    <div class="get_start_main">
                    	<div class="clicking_left">
                            <span class="by_clicking_btn">By clicking the button, I agree to the <a href="{{route('TermsOfServicePage')}}" target="_blank">Terms of Service</a>, <a href="{{route('TermsOfUsePage')}}" target="_blank">Terms of Use</a> and <a href="{{route('PrivacyPolicyPage')}}" target="_blank">Privacy Policy</a>.</span>                            
                       </div>
                        <a href="javascript:void(0)" id="signUpBtn" onClick="signUpUser(this.id)" class="form_start_btn"><i class="fa fa-chevron-right" aria-hidden="true"></i> Get Started</a>
                        <a href="{{route('LoginPage')}}" class="already_account"><i class="fa fa-chevron-right" aria-hidden="true"></i>Already have an account?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="about_sec4 grey_bg">
    <div class="wrapper">
        <h1 class="about_state_planning_text">Estate Planning Made Simple & Affordable.</h1>
        <h4 class="select_plan">Select your plan now and Keep your loved ones safe!</h4>
    </div>
</div>

@endsection