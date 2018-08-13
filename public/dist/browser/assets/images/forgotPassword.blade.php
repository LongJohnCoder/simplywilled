@extends('layouts.app')

@section('seoContent')

<title>Forgot Password | SimplyWilled.com</title>
<meta name="description" content="Forgot password? Enter your email address and we will email you instructions on how to reset your password.">
<meta name="keywords" content="legal requirements of a will, willing app, www willing com mutualofomaha, willings, requirements of a will, willing com, willing wifes, willing, dying with a will, can a spouse be excluded from a will, last will app, requirements for a valid will, make a free will online, free will creator, will without witnesses, codicil or new will, free will creation, when is a will valid, how many witnesses for a will">

@endsection

@section('jsSource')
<script>
// forgot password user
function resetPassword(_id){
	if($('#'+_id).is('[disabled=disabled]')){
		return false;
	}else{
		$('#'+_id).attr('disabled','disabled');
		$("#response_div").hide();
		$("#response_loader").fadeIn();
		var dataString = $('#resetPasswordForm').serialize();
		$.ajax({
			type: "POST",
			url: "{{ route('ForgotPassRequest') }}",
			data: dataString,
			cache: false,
			success: function(result){
				$("#response_loader").hide();
				if($.trim(result.result) == 'success'){
					$("#response_div").text(result.message);
					$("#response_div").fadeIn();
					setTimeout(function(){ window.location.href = "{{route('LoginPage')}}"; }, 2000);
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
            <h1 class="login_text">Forgot Password</h1>
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
                        <p>It takes less than 10 minutes and your done. Try it today and see how simple preparing your estate plan online can be.</p>
                    </div>
                </li>
            </ul>            
        </div>
        <div class="confirm_right">
            <div class="confirmed_form_top">
                <h1 class="form_heading">Forgot your password?</h1>
                <p class="form_pera">We'll help you reset it.</p>
            </div>
            <div class="confirmed_form_white_sec">
                <form id="resetPasswordForm">
                    {{ csrf_field() }}
                    <input type="email" name="email" placeholder="Email Address" class="email_form">
                    <div class="ajax_response" id="response_div"></div>
                    <div class="loader_parent" id="response_loader">
                    	<span class="loader"></span>
                    </div>
                    <div class="get_start_main">
                        <div class="clicking_left">
                            <a href="{{route('LoginPage')}}" class="already_account">Back to login</a>
                            <a href="{{route('CustomerRegistrationPage')}}" class="already_account">Don’t have account </a>
                       </div>
                        <a href="javascript:void(0)" onClick="resetPassword(this.id)" id="resetPasswordBtn" class="login_btn"><i class="fa fa-chevron-right" aria-hidden="true"></i> Reset</a>
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