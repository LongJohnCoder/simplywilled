@extends('layouts.app')

@section('seoContent')

<title>Contact Us | SimplyWilled.com</title>
<meta name="description" content="Contact SimplyWilled for customer support. SimplyWilled.com is the simplest way to create your personalized estate plan online.">
<meta name="keywords" content="how to make a will, do it yourself estate plan, diy will, last will and testament, revocable Trust online, online estate plan, estate advice, will information, what does in trust mean in a will, verbal will legally binding, is a notarized will a legal document, does a will have to be signed, making a valid will, inheritance rights of spouses, quick will online, is a notarized will legally binding, free will writing, last will and testament laws, signing wills requirements, requirements of a valid will, does a last will and testament need to be notarized, will for free, die with a will, free will writing software, will creation, ways of revoking a valid will, revoke a will, what constitutes a will, what constitutes a valid will, revoke will, electronic wills, free will making software, make a will online free, is a will legal if not signed">

@endsection


@section('content')

	<div class="inner_banner">
        <div class="wrapper">
            <h1 class="banner_heading_one">At SimplyWilled our mission is to make</h1>
            <h3 class="banner_heading_two">estate planning simple and affordable for everyone</h3>
        </div>
    </div>
    <div class="about_sec1 grey_bg border_top_green">
        <div class="wrapper">
            <div class="contact_new_main">
                <div class="contact_left">
                    <h1 class="contact_left_heading">Contact Us</h1>
                    <ul class="contact_social_main_ul">
                        <li>support@simplywilled.com</li>
                        <li>1-855-965-1789</li>
                    </ul>
                    <ul class="contact_social_media">
                        <li><a href="#" class="fb_hover"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="tw_hover"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="gplus_hover"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="pintrst_hover"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
                <div class="contact_right_sec">
                    <h1 class="get_touch_text">Get in Touch</h1>
                    <p class="get_in_tuch_sub_heading">Feel free to drop us a line below!</p>
                    <form method="post" id="contact_us_form">
                        {{ csrf_field() }}
                        <input type="text" placeholder="Your Name" name="name" class="get_in_tuch_field">
                        <input type="email" name="email" placeholder="Your Email" class="get_in_tuch_field">
                        <textarea placeholder="Message" class="get_in_tuch_textarea" name="message"></textarea>
                        <div class="ajax_response" id="response_div"></div>
                        <div class="loader_parent" id="response_loader">
                            <span class="loader"></span>
                        </div>
                        <p class="contactbtn_area" style="margin-top:10px;">
                        	<a href="javascript:void(0)" class="get_in_tuch_btn" id="contactUsBtn" onClick="contactUs(this.id)"><i class="fa fa-chevron-right" aria-hidden="true"></i> Send Message</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('jsSource')

<script>

// contact us
function contactUs(_id){
	if($('#'+_id).is('[disabled=disabled]')){
		return false;
	}else{
		$('#'+_id).attr('disabled','disabled');
		$("#response_div").hide();
		$("#response_loader").fadeIn();
		var dataString = $('#contact_us_form').serialize();
		$.ajax({
			type: "POST",
			url: "{{route('ContactUsPost')}}",
			data: dataString,
			cache: false,
			success: function(result){
				$("#response_loader").hide();
				if($.trim(result.result) == 'success'){
					$("#response_div").text(result.message);
					$("#response_div").fadeIn();
					setTimeout(function(){ window.location.href = "{{ route('ContactUsPage') }}"; }, 2000);
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