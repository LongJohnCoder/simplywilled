<!DOCTYPE html>
<html>
<head>
	<title>Health Care Power of Attorney</title>
	<style>
	#footer { position: fixed; left: 0px; bottom: -130px; right: 0px; height: 150px;
	text-align: center; font-size: 12px; font-family: Times New Roman, serif; border-top: 1px solid #000;
	padding-top: 5px;
	}
	 #footer .page:after { content: counter(page, none); }

	</style>
</head>
<body>
	<script type="text/php">
			if ( isset($pdf) ) {
					$pdf->page_text(282, 767,  "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10);
			}
	</script>
	<div id="footer">
		<div style="">
			Advance Directive of <br>{{$tellUsAboutYou['fullname']}}<br>
		</div>
	</div>
<div>
	<div class="docPage">
  <div id="doc" class="docPageInner" style="page-break-after: always;">
    <p  style="text-align:center;margin-top: 0.06in; margin-bottom: 0.13in; line-height: 0.28in; page-break-before: auto; page-break-after: auto">
      <span  style="font-size: 17pt"><b>CONNECTICUT ADVANCE
        DIRECTIVES</b></span></p>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

    </p>
    <p  style="text-align:center;margin-top: 0.06in; margin-bottom: 0.06in; line-height: 0.23in">
      <span  style="font-size: 13pt"><b>INTRODUCTION</b></span></p>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

    </p>
    <p style="margin-bottom: 0in; line-height: 115%">To any physician who
      is treating me, this document contains the following:&nbsp;</p>
    <p style="margin-bottom: 0in; line-height: 0.25in">

    </p>

      	<p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%; margin-top: 0;">
        <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;My
        Appointment of a Health Care Representative;</span></span></span></span></span></p>
      	<br>
      	<p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%; margin-top: 0;">
        <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;My
        Living Will or Health Care Instructions;</span></span></span></span></span></p>

    <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;My
      Document of Anatomical Gift; and,</span></span></span></span></span></p>
    <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The
      Designation of My Conservator of the Person for My Future Incapacity.</span></span></span></span></span></p>
    <p  style="text-align: justify;margin-bottom: 0in; line-height: 0.2in">

    </p>
    <p style="margin-bottom: 0in; line-height: 115%">As my physician, you
      may rely on these health care instructions and decisions made by my
      health care representative or conservator of my person, if I am
      unable to make a decision for myself.</p>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">
<br><br>
    </p>

      <p  style="text-align:center; margin-top: 0.06in; margin-bottom: 0.06in; line-height: 0.23in; margin-top: 0;">
        <span  style="font-size: 13pt"><b>I. APPOINTMENT OF HEALTH CARE
          REPRESENTATIVE</b></span></p>

    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

    </p>
    <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
        <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">I,
        <span style="text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}}</span>,
        appoint my @if(strtolower($healthFinance['relation']) == 'other') <span style="font-family:'Times New Roman, serif'">{{ucwords(strtolower($healthFinance['relationOther']))}}, </span>
    		@else
    			<span style="font-family:'Times New Roman, serif'">{{ucwords(strtolower($healthFinance['relation']))}},</span>
    		@endif

        <span style="text-transform: capitalize">{{$healthFinance['fullname']}}</span> of


        <span style="text-transform: capitalize"> {{$healthFinance['address']}}</span> in

        <span style="text-transform: capitalize"> {{$healthFinance['city']}},</span>

        <span style="text-transform: capitalize"> {{$healthFinance['state']}}</span>

        <span style="text-transform: capitalize"> {{$healthFinance['zip']}}</span>


        (Tel: <span> {{$healthFinance['phone']}} </span> ), as my health care representative. If my
        attending physician determines that I am unable to understand and
        appreciate the nature and consequences of health care decisions and
        unable to reach and communicate an informed decision regarding
        treatment, my health care representative is authorized to make any
        and all health care decisions for me, including the decision to
        accept or refuse any treatment, service or procedure used to diagnose
        or treat my physical or mental condition and the decision to provide,
        withhold or withdraw life support systems, except as otherwise
        provided by law which excludes, for example, psychosurgery or shock
        therapy.</span></span></span></span></span></p>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

    </p>
    <p style="margin-bottom: 0in; line-height: 115%">I direct my health
      care representative to make decisions on my behalf in accordance with
      my wishes, as stated in this document or as otherwise known to my
      health care representative. In the event my wishes are not clear or a
      situation arises that I did not anticipate, my health care
      representative may make a decision in my best interests, based upon
      what is known of my wishes.&nbsp;</p>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

    </p>
  </div>

  {{--
  <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif; margin-top: 20px;">
    <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null && userDetails.tellUsAboutYou.fullname !== undefined"> Advance Directives of {{userDetails.tellUsAboutYou.fullname}} </span>
    <br>Page 1 of 7
  </div>
  --}}
</div>
<!-- !Page 1 -->

<!-- Page 2 -->
<div class="docPage">
  <div class="docPageInner" style="page-break-after: always;">

    @if($healthFinance['anyBackupAgent'] === 'true')
    <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
        <span style="display: inline-block; border: none; padding: 0in">
          <span style="font-family:Times New Roman, serif">
            <span  style="font-size: 12pt"><span style="background: #ffffff">
              <span color="#000000">
                If said health care representative is unwilling or unable to serve as my health care representative, or if I revoke this appointment or authority to act as my health care representative, then I appoint my


                <span style="text-transform: capitalize">
                	@if(strtolower($healthFinance['backupRelation']) == 'other')
		            	<span style="font-family:'Times New Roman, serif'">{{ucwords(strtolower($healthFinance['backupRelationOther']))}},</span>
		          	@else
		            	<span style="font-family:'Times New Roman, serif'">{{ucwords(strtolower($healthFinance['backupRelation']))}},</span>
		          	@endif
                </span>

                <span style="text-transform: capitalize">{{$healthFinance['backupFullname']}},</span> of

                <span style="text-transform: capitalize"> {{$healthFinance['backupAddress']}}</span> in

                <span style="text-transform: capitalize"> {{$healthFinance['backupCity']}},</span>

                <span style="text-transform: capitalize"> {{$healthFinance['backupState']}}</span>

                <span style="text-transform: capitalize"> {{$healthFinance['backupZip']}}</span>

                (Tel: <span> {{$healthFinance['backupphone']}} </span> ) as my alternate health care representative.
              </span>
            </span>
          </span>
        </span>
      </span>
    </p>
    @endif

    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

    </p>
    <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">I
      further instruct that as required by law my attending physician
      disclose to my health care representative protected health
      information regarding my ability to understand and appreciate the
      nature and consequences of health care decisions and to reach and
      communicate an informed decision regarding treatment at the
      representative’s request made at anytime after I sign this form.</span></span></span></span></span></p>
    <p style="margin-bottom: 0.06in; line-height: 115%"><u>HIPAA WAIVER</u><span style="text-decoration: none">:</span></p>
    <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">Subject
      to any limitations in this document, my health care representative
      has the power and authority to do all of the following:&nbsp;</span></span></span></span></span></p>
    <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">(1)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Request,
      review, and receive, to the extent I could do so individually, any
      information, verbal or written, regarding my physical or mental
      health, including, but not limited to, my individually identifiable
      health information or other medical records. This release authority
      applies to any information governed by the Health Insurance
      Portability and Accountability Act of 1996 (HIPAA), 42 U.S.C. 1320d
      and 45 CFR 160-164. I hereby authorize any physician, health care
      professional, dentist, health plan, hospital, clinic, laboratory,
      pharmacy, or other covered health care provider, any insurance
      company, and the Medical Information Bureau, Inc. or other health
      care clearinghouse that has provided treatment or services to me, or
      that has paid for or is seeking payment from me for such services, to
      give, disclose, and release to my health care representative, without
      restriction, all of my individually identifiable health information
      and medical records regarding any past, present, or future medical or
      mental health condition. This authority given my health care
      representative shall supersede any other agreement which I may have
      made with my health care providers to restrict access to or
      disclosure of my individually identifiable health information. This
      authority given my health care representative shall be effective
      immediately, has no expiration date and shall expire only in the
      event that I revoke the authority in writing and deliver it to my
      health care provider.</span></span></span></span></span></p>
    <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">(2)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Execute
      on my behalf any releases or other documents that may be required in
      order to obtain this information; and</span></span></span></span></span></p>
    <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">(3)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Consent
      to the disclosure of this information.</span></span></span></span></span></p>
    <p style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in; line-height: 115%">
<br>
<br>
    </p>
    <ol type="I" start="2">
      <p  style="text-align:center;margin-top: 0.06in; margin-bottom: 0.06in; line-height: 0.23in">
        <span  style="font-size: 13pt"><b>II. LIVING WILL or HEALTH CARE
          INSTRUCTIONS</b></span></p>
    </ol>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

    </p>
    <p style="margin-bottom: 0in; line-height: 115%">If the time comes
      when I am incapacitated to the point when I can no longer actively
      take part in decisions for my own life, and am unable to direct my
      physician as to my own medical care, I wish this statement to stand
      as a statement of my wishes.&nbsp;</p>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

    </p>
  </div>

  {{--
  <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif; margin-top: 20px;">
    <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null && userDetails.tellUsAboutYou.fullname !== undefined"> Advance Directives of {{userDetails.tellUsAboutYou.fullname}} </span>
    <br>Page 2 of 7
  </div>
  --}}
</div>
<!-- !Page 2 -->

<!-- Page 3 -->
<div class="docPage">
  <div class="docPageInner" style="page-break-after: always;">

    <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">I,
      <span>{{strtoupper($tellUsAboutYou['fullname'])}}</span>,
      the author of this document, request that, if my condition is deemed
      terminal or if I am determined to be permanently unconscious, I be
      allowed to die and not be kept alive through life support systems.</span></span></span></span></span></p>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

    </p>
    <p style="margin-bottom: 0in; line-height: 115%">By terminal
      condition, I mean that I have an incurable or irreversible medical
      condition which, without the administration of life support systems,
      will, in the opinion of my attending physician, result in death
      within a relatively short time. By permanently unconscious I mean
      that I am in a permanent coma or persistent vegetative state which is
      an irreversible condition in which I am at no time aware of myself or
      the environment and show no behavioral response to the environment.</p>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

    </p>
    <p style="margin-bottom: 0in; line-height: 115%">1.  Listed below are
      my instructions regarding particular types of life support systems.
      This list is not all-inclusive. My general statement that I not be
      kept alive through life support systems provided to me is limited
      only where I have indicated that I desire a particular treatment to
      be provided.&nbsp;</p>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

    </p>
    <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">a.
      <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>  (Initial) I DO NOT want
      ANY life support systems of any kind; OR </span></span></span></span></span>
    </p>
    <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

    </p>
    <p  style="text-align:left;margin-bottom: 0in; line-height: 115%"><i>b.
      <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>  (Initial) I DO NOT want
      any life support systems EXCEPT the following:  (MARK THE BOX TO
      INDICATE YOUR SELECTION): </i>
    </p>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

    </p>
    <table cellpadding="0" cellspacing="0" style="margin: 20px 0 20px 50px;">

      <tr valign="top">
        <td width="" style="border: 1px solid #000; padding: 0 20px;">
          <p  style="text-align: center"><u>PROVIDE</u></p>
        </td>
        <td width="" style="border: 1px solid #000; border-left: 0; padding: 0 20px;">
          <p  style="text-align: center"><u>WITHHOLD</u></p>
        </td>
        <td width="" style="border: 1px solid #000; border-left: 0; padding-left: 20px;">
          <p><u>TREATMENT</u></p>
        </td>
      </tr>
      <tr valign="top">
        <td width="" style="border: none; padding: 0in; border-left: 1px solid #000; border-bottom: 1px solid #000;">
          <p  style="text-align: center">
          <span style="display:inline-block; width:14px; height:14px; border:1px solid #000; margin: 0 0 0 48px;"></span>
          </p>
        </td>
        <td width="" style="border: none; padding: 0in; border-left: 1px solid #000; border-bottom: 1px solid #000;">
          <p  style="text-align: center">
            <span style="display:inline-block; width:14px; height:14px; border:1px solid #000; margin: 0 0 0 48px;"></span>
          </p>
        </td>
        <td width="" style="border: none; padding-left: 20px; border: 1px solid #000; border-top: 0;">
          <p  style="text-align:left;margin-bottom: 0in">

          </p>
          <p style="font-variant: normal; letter-spacing: normal; font-style: normal">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">Cardiopulmonary
      Resuscitation</span></span></span></span></span></p>
        </td>
      </tr>
      <tr valign="top">
        <td width="" style="border: none; padding: 0in; border-left: 1px solid #000; border-bottom: 1px solid #000;">
          <p  style="text-align: center">
            <span style="display:inline-block; width:14px; height:14px; border:1px solid #000; margin: 0 0 0 48px;"></span>
          </p>
        </td>
        <td width="" style="border: none; padding: 0in; border-left: 1px solid #000; border-bottom: 1px solid #000;">
          <p  style="text-align: center">
            <span style="display:inline-block; width:14px; height:14px; border:1px solid #000; margin: 0 0 0 48px;"></span>
          </p>
        </td>
        <td width="" style="border: none; padding: 0in; border: 1px solid #000; border-top: 0; padding-left: 20px;">
          <p  style="text-align:left;margin-bottom: 0in">

          </p>
          <p style="font-variant: normal; letter-spacing: normal; font-style: normal">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">Artificial
      Respiration (including a respirator)</span></span></span></span></span></p>
        </td>
      </tr>
      <tr valign="top">
        <td width="" style="border: none; padding: 0in; border-left: 1px solid #000; border-bottom: 1px solid #000;">
          <p  style="text-align: center">
            <span style="display:inline-block; width:14px; height:14px; border:1px solid #000; margin: 0 0 0 48px;"></span>
          </p>
        </td>
        <td width="" style="border: none; padding: 0in; border-left: 1px solid #000; border-bottom: 1px solid #000;">
          <p  style="text-align: center">
            <span style="display:inline-block; width:14px; height:14px; border:1px solid #000; margin: 0 0 0 48px;"></span>
          </p>
        </td>
        <td width="" style="border: none; padding: 0in; border: 1px solid #000; border-top: 0; padding: 0 20px;">
          <p  style="text-align:left;margin-bottom: 0in">

          </p>
          <p style="font-variant: normal; letter-spacing: normal; font-style: normal">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">Artificial
      means of providing nutrition and hydration</span></span></span></span></span></p>
        </td>
      </tr>
    </table>
    <p style="margin-bottom: 0in; line-height: 0.19in">

    </p>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

    </p>
    <p style="margin-bottom: 0in; line-height: 115%">2. Other specific
      requests and instructions:
      ____________________________________________</p>
    <p style="margin-bottom: 0in; line-height: 115%">______________________________________________________________________________</p>
    <p style="margin-bottom: 0in; line-height: 115%">______________________________________________________________________________</p>
    <p style="margin-bottom: 0in; line-height: 115%">______________________________________________________________________________</p>
    <p style="margin-bottom: 0in; line-height: 115%">______________________________________________________________________________</p>
    <p style="margin-bottom: 0in; line-height: 115%">______________________________________________________________________________</p>
    <p style="margin-bottom: 0in; line-height: 0.16in">

    </p>
    <p style="margin-bottom: 0in; line-height: 115%">3. <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
      (Initial) I DO want sufficient pain medication to maintain my
      physical comfort. I do not intend any direct taking of my life, but
      only that my dying not be unreasonably prolonged.</p>
    <p style="margin-bottom: 0in; line-height: 0.16in">

    </p>
    <!--<div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif; margin-top: 20px;">
      Advance Directives of«CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»
      Page 1 of 12
    </div>-->
  </div>

  {{--
  <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif; margin-top: 20px;">
    <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null && userDetails.tellUsAboutYou.fullname !== undefined"> Advance Directives of {{userDetails.tellUsAboutYou.fullname}} </span>
    <br>Page 3 of 7
  </div>
  --}}
</div>
<!-- !Page 3 -->


<!-- Page 4 -->
<div class="docPage">
  <div class="docPageInner" style="page-break-after: always;">
    <ol type="I" start="3">
      <p  style="text-align:center;margin-top: 0.06in; margin-bottom: 0.06in; line-height: 0.23in">
        <span  style="font-size: 13pt"><b>DOCUMENT OF ANATOMICAL
          GIFT</b></span></p>
    </ol>
    <p style="margin-bottom: 0in; line-height: 0.16in">

    </p>
    <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="background: #ffffff"><span color="#000000">
       <span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt">(Initial)
      I make <b>no </b>anatomical gift at this time. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></span></span></span></p>
    <p  style="text-align:left;margin-left: 3.38in; text-indent: -3.38in; margin-bottom: 0in; line-height: 0.16in">


    </p>
    <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">OR</span></span></span></span></span></p>
    <p style="margin-bottom: 0in; line-height: 0.16in">

    </p>
    <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="background: #ffffff"><span color="#000000">
       <span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt">(Initial)
      I hereby make the following anatomical gift, if medically acceptable,
      to take effect upon my death.</span></span></span></span></span></p>
    <p style="margin-left: 0.38in; margin-bottom: 0in; line-height: 115%">


    </p>
    <p style="margin-left: 0.38in; margin-bottom: 0in; line-height: 115%">
      <i>I give: (check one)</i></p>
    <p style="margin-left: 0.75in; margin-bottom: 0in; line-height: 0.16in">
      <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:3px 5px;"></span>&nbsp; <span  style="font-size: 11pt">(a) any needed
      organs or parts</span></p>
    <p style="margin-left: 0.75in; margin-bottom: 0in; line-height: 0.16in">
      <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:3px 5px;"></span>&nbsp; <span  style="font-size: 11pt">(b) only the
      following organs or parts:</span></p>
    <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">___________________________________________________________</span></span></span></span></span></p>
    <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">___________________________________________________________</span></span></span></span></span></p>
    <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">___________________________________________________________</span></span></span></span></span></p>
    <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">to
      be donated for: <i>(check one)</i></span></span></span></span></span></p>
    <p style="margin-left: 1.13in; margin-bottom: 0in; line-height: 0.15in">
      <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:3px 5px;"></span> <span  style="font-size: 11pt">any of the purposes stated
      in subsection (a) of sec. 19a-279f of the Connecticut general
      statutes; or</span></p>
    <p style="margin-left: 1.13in; margin-bottom: 0in; line-height: 0.15in">
      <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:3px 5px;"></span>  <span  style="font-size: 11pt">these limited purposes:</span></p>
    <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">____________________________________________________</span></span></span></span></span></p>
    <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">____________________________________________________</span></span></span></span></span></p>
    <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">____________________________________________________</span></span></span></span></span></p>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

    </p>
    <ol type="I" start="4">
      <p  style="text-align:center;margin-top: 0.06in; margin-bottom: 0.06in; line-height: 0.23in">
        <span  style="font-size: 13pt"><b>DESIGNATION OF A
          CONSERVATOR OF THE PERSON</b></span></p>
    </ol>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

    </p>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in"><i>(Initial
      only your selection below): </i>
    </p>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

    </p>
    <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">A.
      <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </u> (Initials) By my
      initials here I choose NOT to designate a person to be appointed as
      my conservator. </span></span></span></span></span>
    </p>
    <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

    </p>
    <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">OR</span></span></span></span></span></p>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

    </p>
    <p style="margin-bottom: 0in; line-height: 115%">B.  <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </u> (Initials) If a conservator of my person should need to be
      appointed, I designate my then acting health care representative as
      hereinabove appointed.
    </p>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

    </p>
    <p style="margin-bottom: 0in; line-height: 115%">OR
    </p>
  </div>

  {{--
  <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif; margin-top: 20px;">
    <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null && userDetails.tellUsAboutYou.fullname !== undefined"> Advance Directives of {{userDetails.tellUsAboutYou.fullname}} </span>
    <br>Page 4 of 7
  </div>
  --}}
</div>
<!-- !Page 4 -->

<!-- Page 5 -->
<div class="docPage">
  <div class="docPageInner" style="">

    <p style="margin-bottom: 0in; line-height: 115%">B.  <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </u> (Initials) If a conservator of my person should need to be
      appointed, I designate
      <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>,
      whose address is <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
      be appointed my conservator in any jurisdiction.</p>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

    </p>
    <p style="margin-bottom: 0in; line-height: 115%">C.  No bond shall be
      required of my conservator in any jurisdiction.</p>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

    </p>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

    </p>
    <ol type="I" start="5">
      <p  style="margin-top: 0.06in; margin-bottom: 0.06in; line-height: 0.23in">
        <span  style="font-size: 13pt"><b>CAPACITY TO EXECUTE
          DOCUMENT - SIGNATURE</b></span></p>
    </ol>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

    </p>
    <p style="margin-bottom: 0in; line-height: 0.16in">

    </p>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

    </p>
    <p style="margin-bottom: 0in; line-height: 115%">These requests,
      appointments, and designations are made after careful reflection,
      while I am of sound mind. Any party receiving a duly executed copy or
      facsimile of this document may rely upon it unless such party has
      received actual notice of my revocation of it.</p>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">
<br>
    </p>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">
<br>
    </p>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">_______________________________________<span style="text-decoration: none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date:
      </span><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></p>
    <p style="margin-bottom: 0.08in; line-height: 115%">
      <span>{{strtoupper($tellUsAboutYou['fullname'])}}</span>
    </p>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">
<br>
    </p>

    <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">Subscribed
      and sworn to before me by <b>
          <span>{{strtoupper($tellUsAboutYou['fullname'])}}</span>,
      </b> on this <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>day
      of <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>,
      <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     </u>.</span></span></span></span></span></p>
    <p  style="text-align:left;margin-top: 0.06in; margin-bottom: 0.06in; line-height: 115%">



    </p>
    <p style="margin-bottom: 0in; line-height: 115%">______________________________________</p>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in"><b>NOTARY
      PUBLIC</b></p>
    <p style="margin-left: 1.13in; margin-bottom: 0in; line-height: 0.16in">


    </p>
    <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">My
      <b>c</b>ommission expires: _________________</span></span></span></span></span></p>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

    </p>
  </div>

  {{--
  <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif; margin-top: 20px;">
    <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null && userDetails.tellUsAboutYou.fullname !== undefined"> Advance Directives of {{userDetails.tellUsAboutYou.fullname}} </span>
    <br>Page 5 of 7
  </div>
  --}}
</div>
<!-- !Page 5 -->

<!-- Page 6 -->
<!-- <div class="docPage">
  <div class="docPageInner" style="">


    <p  style="text-align:center;margin-bottom: 0.13in; line-height: 115%">


    </p>
    <p  style="text-align:center;margin-bottom: 0.13in; line-height: 115%">


    </p>
    <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

    </p>
  </div>

  {{--
  <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif; margin-top: 20px;">
    <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null && userDetails.tellUsAboutYou.fullname !== undefined"> Advance Directives of {{userDetails.tellUsAboutYou.fullname}} </span>
    <br>Page 6 of 7
  </div>
  --}}
</div> -->
<!-- !Page 6 -->

<!-- Page 7 -->
<div class="docPage">
  <div class="docPageInner">
    <p  style="text-align:center;margin-bottom: 0.13in; line-height: 115%; page-break-before: always">
      <b>WITNESSES’ STATEMENTS</b></p>
    <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">This
      document was signed in our presence by <b>
          <span>{{strtoupper($tellUsAboutYou['fullname'])}}</span>,
      </b>the author of this document, who
      appeared to be eighteen years of age or older, of sound mind and able
      to understand the nature and consequences of health care decisions at
      the time this document was signed. The author appeared to be under no
      improper influence. We have subscribed this document in the author's
      presence and at <span>{{$genderTxt4}}</span>
      request and in the presence of each other.</span></span></span></span></span></p>

    <p  style="text-align:left;text-indent: -0.38in; margin-bottom: 0in; line-height: 115%">
<br><br>
    </p>

    <p align="justify" style="margin-bottom: 0in; line-height: 0.2in"><span  style="">__________________________________________(WITNESS
              1)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_______________</span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in"><span  style="">NAME:
            <span style="padding-left:430px; display: inline-block;"></span>
              DATE</span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in"><span  style="">ADDRESS:</span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in"><span  style="">CITY/STATE:</span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">
<br>
            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in"><span  style="">__________________________________________(WITNESS
              2)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_______________</span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in"><span  style="">NAME:<span style="padding-left:430px; display: inline-block;"></span>
              DATE</span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in"><span  style="">ADDRESS:</span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in"><span  style="">CITY/STATE:</span></p>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">
<br>
    </p>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">
<br>
    </p>
   <p style="margin-bottom: 0in; line-height: 115%">Subscribed and sworn
      to before me by_________________________________________
      and
    </p>
    <p style="margin-bottom: 0in; line-height: 115%">__________________________<span style="text-decoration: none">
      as witnesses, on this </span>_______________________________<span style="text-decoration: none">day
      of __________________, ____________. </span>
    </p>
    <p  style="text-align:left;margin-top: 0.06in; margin-bottom: 0.06in; line-height: 115%">

<br><br><br>

    </p>
    <p  style="text-align:left;margin-top: 0.06in; margin-bottom: 0.06in; line-height: 115%">



    </p>
    <p style="margin-bottom: 0in; line-height: 115%">______________________________________</p>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in"><b>NOTARY
      PUBLIC</b></p>
    <p style="margin-left: 1.13in; margin-bottom: 0in; line-height: 0.16in">


    </p>
    <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">My
      <b>c</b>ommission expires: _________________</span></span></span></span></span></p>
    <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

    </p>
    <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

    </p>
  </div>
  {{--
  <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif; margin-top: 20px;">
    <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null && userDetails.tellUsAboutYou.fullname !== undefined"> Advance Directives of {{userDetails.tellUsAboutYou.fullname}} </span>
    <br>Page 7 of 7
  </div>
  --}}
</div>
<!-- !Page 7 -->


</div>
</body>
</html>
