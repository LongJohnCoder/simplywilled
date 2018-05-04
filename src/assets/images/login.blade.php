@extends('layouts.app')

@section('seoContent')

<title>SimplyWilled.com online login page</title>
<meta name="description" content="Login to SimplyWilled.com and see how easy online estate planning can be.">
<meta name="keywords" content="Login, get started, how to make an estate plan online, DIY last will, Make your will online, write your wishes, how to make a will">

@endsection

@section('jsSource')
<script>
// sign in user
function signInUser(_id){
	if($('#'+_id).is('[disabled=disabled]')){
		return false;
	}else{
		$('#'+_id).attr('disabled','disabled');
		$("#response_div").hide();
		$("#response_loader").fadeIn();
		var dataString = $('#signInForm').serialize();
		$.ajax({
			type: "POST",
			url: "{{ route('LoginRequest') }}",
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
            <h1 class="login_text">LOGIN TO YOUR <span>SECURED ACCOUNT</span></h1>
            <ul class="protect_loved_ul2">
                <li>
                    <span class="loved_img2 sprite_sheet"></span>
                    <div class="protect_loved_right2">
                        <h2>PROTECT YOUR LOVED ONES</h2>
                        <p>Name guardians and list beneficiaries so those you love are in good hands.</p>
                    </div>
                </li>
                <li>
                    <span class="loved_img2 sprite_sheet"></span>
                    <div class="protect_loved_right2">
                        <h2>PROTECT YOUR ASSETS</h2>
                        <p>Ensure the assets you’ve worked hard for pass to the ones you love.</p>
                    </div>
                </li>
                <li>
                    <span class="loved_img2 sprite_sheet"></span>
                    <div class="protect_loved_right2">
                        <h2>SAVE TIME &amp; MONEY</h2>
                        <p>It takes less than 10 minutes and you're done. Try it today and see how simple preparing your estate plan online can be.</p>
                    </div>
                </li>
            </ul>            
        </div>
        <div class="confirm_right">
            <div class="confirmed_form_top">
                <h1 class="form_heading">Welcome Back</h1>
                <p class="form_pera">Log In to access your account.</p>
            </div>
            <div class="confirmed_form_white_sec">
                <form id="signInForm">
                    {{ csrf_field() }}
                    <input type="email" name="email" placeholder="Email Address" class="email_form">
                    <input type="password" name="password" placeholder="Password" class="email_form">
                    <div class="ajax_response" id="response_div"></div>
                    <div class="loader_parent" id="response_loader">
                    	<span class="loader"></span>
                    </div>
                    <div class="get_start_main">
                        <div class="clicking_left">
                            <a href="{{route('CustomerRegistrationPage')}}" class="already_account">Don’t have account?</a>
                            <a href="{{route('ForgotPassPage')}}" class="already_account">Forgot your password?</a>
                       </div>
                       <a href="javascript:void(0)" onClick="signInUser(this.id)" id="signInBtn" class="login_btn"><i class="fa fa-chevron-right" aria-hidden="true"></i> Login</a>
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