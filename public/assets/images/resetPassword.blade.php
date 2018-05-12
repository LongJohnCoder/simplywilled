@extends('layouts.app')

@section('seoContent')

<title>Reset Password</title>

@endsection

@section('jsSource')
<script>
// sign in user
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
			url: "{{ route('ResetPassRequest') }}",
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
            <h1 class="login_text">Reset password</h1>
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
                <h1 class="form_heading">Reset your password?</h1>
                <p class="form_pera">We'll help you reset it.</p>
            </div>
            <div class="confirmed_form_white_sec">
                <form id="resetPasswordForm">
                    {{ csrf_field() }}
                    <input type="hidden" name="email_token" value="{{$token}}">
                    <input type="password" name="password" placeholder="Password*" class="email_form">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password*" class="email_form">
                    <div class="ajax_response" id="response_div"></div>
                    <div class="loader_parent" id="response_loader">
                    	<span class="loader"></span>
                    </div>
                    <div class="get_start_main">
                        <div class="clicking_left">
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