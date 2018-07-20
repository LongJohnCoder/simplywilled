<!DOCTYPE html>
<html>
<head>
	<title></title>
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
	<!-- Page 1-->
<div style="page-break-after: always;">
  <div>
    <p  style="margin-bottom: 0.25in;  text-align:center;">
      <span size="4" style="font-size: 13pt"><span size="4" style="font-size: 16pt"><b>ADVANCE
      HEALTH CARE DIRECTIVE</b></span></span></p>
    <p  style="margin-bottom: 0.25in;  text-align:center;"><span size="4" style="font-size: 13pt"><span size="4" style="font-size: 16pt"><b>of</b></span></span></p>
    <p class="western"  style="margin-bottom: 0.08in;  text-align: center;">
      <b>
        <span style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</span>
        </b></p>
    <p  style="margin-bottom: 0.19in; "><br/>
      <br/>

    </p>
    <p  style="margin-bottom: 0.19in;  text-align:center;"><span size="2" style="font-size: 9pt"><span size="4" style="font-size: 14pt"><b>GENERAL
      INSTRUCTIONS</b></span></span></p>
    <p  style="margin-bottom: 0.06in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">You
      should read this form carefully before filling it in. You should fill
      it in completely. If there are health care decisions you do not want
      to make, you should strike the wording of that decision rather than
      leave it blank. You may not change the qualifications for witnesses
      or agents, even if you cross out the wording. You should write
      legibly.</span></span></p>
    <p  style="margin-bottom: 0.06in; "><br/>
      <br/>

    </p>
    <p  style="margin-bottom: 0.06in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">After
      you have filled out the form completely, you should sign the form
      before a notary public. Although signing before a notary public is
      not legally required, it is advisable. It is advisable because the
      notary, as well as your witnesses, can testify as to your competence
      when you sign the directive, if your competence becomes an issue.
      Notaries, who are registered with the State, are often easier to
      locate later than witnesses.</span></span></p>
    <p  style="margin-bottom: 0.06in; "><br/>
      <br/>

    </p>
    <p  style="margin-bottom: 0.06in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">You
      should retain your original Advance Health care Directive, and give
      copies to your doctor, agent, spouse, family members, and close
      friends, if you desire. You should explain to each person who
      receives a copy of your health care directive what choices you made
      on the form, and why. This will help if, while you lack competence,
      there arises a need to make a health care decision that is not
      explicitly set forth on your advance health care directive form.</span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">This
      form does not contain all of the types of health care decisions you
      are legally entitled to make. For example, the form does not give you
      the opportunity to nominate a guardian, in the event you become
      incompetent and need one. Also, the form does not give you the
      opportunity to designate a primary care physician, or another person,
      to certify that you lack the capacity to make your own decisions on
      health care. Finally, the form does not include a provision that
      accommodates a person’s religious or moral beliefs. If you would
      like to exercise these options, you should talk to an attorney. If
      anything on the form conflicts with your religious beliefs, you
      should contact your clergy.</span></span></p>
  </div>

  {{--
  <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif; margin-top: 20px;" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null && userDetails.tellUsAboutYou.fullname !== undefined">
    <span style="text-transform: capitalize"> Advance Health Care Directive of {{userDetails.tellUsAboutYou.fullname}} </span>
    <br>Page 1 of 11
  </div>
  <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;" *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null ">
    Advance Health Care Directive of <br> «CLIENT FULL NAME» <br>
    Page 1 of 11
  </div>
  --}}
</div>
<!-- Page 1-->


<!-- Page 2-->
<div style="page-break-after: always;">
  <div>
    <p class="western" style="margin-bottom: 0in; ">IF
      YOU HAVE QUESTIONS ABOUT THIS FORM, YOU SHOULD SEEK LEGAL ADVICE
      BEFORE COMPLETING AND SIGNING IT.
    </p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0.13in;  text-align:center;"><span size="2" style="font-size: 9pt"><span size="4" style="font-size: 14pt"><b>PART
      I: POWER OF ATTORNEY FOR HEALTH CARE</b></span></span></p>
    <p  style="margin-bottom: 0.09in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">Your
      agent may make any health care decision that you could have made
      while you had the capacity to make health care decisions. You may
      appoint an alternate agent to make health care decisions for you if
      your first agent is not willing, able and reasonably available to
      make decisions for you. Unless the persons you name as agent and
      alternate agent are related to you by blood, neither may own, operate
      or be employed by any residential long-term care institution where
      you are receiving care.</span></span></p>
    <p  style="margin-bottom: 0.09in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">If
      you wish to appoint an agent to make health care decisions for you
      under these circumstances and conditions, you must fill out the
      section below. You may cross out any wording you do not want.</span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span ><span size="2"><span ><span size="3" style="font-size: 12pt"><b>A.
      DESIGNATION OF AGENT</b></span></span><span ><span size="3" style="font-size: 12pt">:
      I designate my </span></span>

      <span>
      	@if(strtolower($healthFinance['relation']) == 'other')
			<span style="font-family:'Times New Roman, serif'">{{ucwords(strtolower($healthFinance['relationOther']))}}, </span>
		@else
			<span style="font-family:'Times New Roman, serif'">{{ucwords(strtolower($healthFinance['relation']))}}, </span>
		@endif
      </span>

      <span size="3" style="font-size: 12pt;text-transform: capitalize"> {{$healthFinance['fullname']}}, </span> of


      <span size="3" style="font-size: 12pt;text-transform: capitalize"> {{$healthFinance['address']}} </span> in



      <span size="3" style="font-size: 12pt;text-transform: capitalize"> {{$healthFinance['city']}},</span>

      <span size="3" style="font-size: 12pt;text-transform: capitalize"> {{$healthFinance['state']}}, </span>

      <span size="3" style="font-size: 12pt;text-transform: capitalize"> {{$healthFinance['zip']}}, </span>


      (Tel: <span> {{$healthFinance['phone']}} </span> ),
      as my agent to make health care decisions for me.
      </span></span></p>


    @if($healthFinance['anyBackupAgent'] === 'true')
    <p class="western" style="margin-bottom: 0in; " *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.anyBackupAgent === 'true'">

    	<span >If said agent is not living, willing or able and reasonably available,
      then I designate my </span>

	    @if(strtolower($healthFinance['backupRelation']) == 'other')
	    	<span style="font-family:'Times New Roman, serif'">{{ucwords(strtolower($healthFinance['backupRelationOther']))}}, </span>
	  	@else
	    	<span style="font-family:'Times New Roman, serif'">{{ucwords(strtolower($healthFinance['backupRelation']))}}, </span>
	  	@endif

      <span style="font-size: 12pt;text-transform: capitalize"> {{strtoupper($healthFinance['backupFullname'])}} </span> of

      <span style="font-size: 12pt;text-transform: capitalize"> {{strtoupper($healthFinance['backupAddress'])}} </span> in

      <span style="font-size: 12pt;text-transform: capitalize"> {{strtoupper($healthFinance['backupCity'])}},</span>

      <span style="font-size: 12pt;text-transform: capitalize"> {{strtoupper($healthFinance['backupState'])}}, </span>

      <span style="font-size: 12pt;text-transform: capitalize"> {{$healthFinance['backupZip']}}, </span>

      <span style="font-size: 12pt;"> (Tel: <span> {{$healthFinance['backupphone']}} </span> ),

      as my alternate agent to make health care decisions for me.</span>
  	</p>
  	@endif
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0.09in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>B.
      AGENT’S AUTHORITY</b></span><span size="3" style="font-size: 12pt">:
      My agent is authorized to: </span><span size="3" style="font-size: 12pt"><i>(INITIAL
      ALL THAT APPLY)</i></span></span></p>
    <p class="western" style="margin-bottom: 0.08in; ">_____
      Provide for my admission to, or discharge from, a medical, hospital,
      nursing, residential, mental health or similar facility
    </p>
    <p class="western" style="margin-bottom: 0.08in; ">_____
      Enter into agreements for my care at home or in a facility
    </p>
    <p class="western" style="margin-bottom: 0.08in; ">_____
      Employ and discharge medical personnel, including physicians,
      psychiatrists, dentists, nurses, and therapists
    </p>
    <p class="western" style="margin-bottom: 0.08in; ">_____
      Consent to, refuse, or withdraw consent to any and all types of
      medical care, treatment, surgical procedures, diagnostic procedures,
      medication, and the use of mechanical or other procedures that affect
      any bodily function, including administration of drugs or procedure
      intended to relieve pain, even though such use may lead to physical
      damage, addiction, or hasten the moment of (but not intentionally
      cause) my death.
    </p>
    <p class="western" style="margin-bottom: 0.08in; ">_____
      Consent to and arrange for the administration of pain-relieving drugs
    </p>
    <p class="western" style="margin-bottom: 0.08in; ">_____
      Consent to psychiatric treatment
    </p>
    <p class="western" style="margin-bottom: 0.08in; ">_____
      Sign medical releases for medical personnel who provide treatment to
      me pursuant to instructions given by my Agent
    </p>
    <p class="western" style="margin-bottom: 0.08in; ">_____
      Sign, authorize or revoke a Delaware Medical Orders for Scope of
      Treatment (“DMOST”) or similar document under the laws of other
      States unless prohibited by the terms of the DMOST or other document.</p>

    <p  style="margin-bottom: 0.13in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>C.
      WHEN AGENT’S AUTHORITY BECOMES EFFECTIVE</b></span><span size="3" style="font-size: 12pt">:
      My agent’s authority becomes effective when my primary or attending
      physician determines I lack the capacity to make my own health care
      decisions.</span> </span>
    </p>
    <p  style="margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>D.
      AGENT’S OBLIGATION</b></span><span size="3" style="font-size: 12pt">:
      My agent shall make health care decisions for me in accordance with
      this power of attorney for health care, any instructions I give in
      this form, and my other wishes to the extent known to my agent. To
      the extent my wishes are unknown, health care decisions by my agent
      shall conform as closely as possible to what I would have done or
      intended under the circumstances. If my agent is unable to determine
      what I would have done or intended under the circumstances, my agent
      will make health care decisions for me in accordance with what my
      agent determines to be my best interest. In determining my best
      interest, my agent shall consider my personal values to the extent
      known to my agent.</span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>E.
       AUTHORIZATION TO RELEASE MEDICAL INFORMATION.</b></span><span size="3" style="font-size: 12pt">
       </span><span size="3" style="font-size: 12pt">I authorize and
      request any physician, health-care professional, health-care
      provider, and medical care facility (collectively, “health-care
      providers”) to provide to my Agent information, oral or written,
      relating to my physical and mental condition and the diagnosis,
      prognosis, care, and treatment thereof upon the request of my Agent I
      have appointed under this instrument, including, but not limited to,
      health information as defined and described in the Health Insurance
      Portability and Accountability Act of 1996 (Public Law 104- 191, 110
      Stat. 2024, generally referred to as “HIPAA”), the regulations
      promulgated thereunder and any other state or local laws and rules.
      Information disclosed by a health-care provider may be re-disclosed
      and may no longer be subject to the privacy rules provided by Section
      164 of Title 45 of the Code of Federal Regulations. It is my intent
      by this authorization for my Agent to be considered a personal
      representative under privacy regulations related to protected health
      information and for my Agent to be entitled to all health information
      in the same manner as if I personally were making the request. This
      authorization and request shall also be considered a consent to the
      release of such information under current laws, rules, and
      regulations as well as under future laws, rules, and regulations and
      amendments to such laws, rules, and regulations to include but not be
      limited to the express grant of authority to personal representatives
      as provided by Regulation Section 164.502(g) of Title 45 of the Code
      of Federal Regulations and the medical information privacy laws and
      regulations.</span></span></p>
  </div>

  {{--
  <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif; margin-top: 20px;" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null && userDetails.tellUsAboutYou.fullname !== undefined">
    <span style="text-transform: capitalize"> Advance Health Care Directive of {{userDetails.tellUsAboutYou.fullname}} </span>
    <br>Page 3 of 11
  </div>
  <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;" *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null ">
    Advance Health Care Directive of <br> «CLIENT FULL NAME» <br>
    Page 3 of 11
  </div>
  --}}
</div>
<!-- Page 3-->


<!-- Page 4-->
<div style="page-break-after: always;">
  <div>
    <p  style="margin-top: 0.06in; margin-bottom: 0.13in;  text-align:center;">
      <span size="2" style="font-size: 9pt"><span size="4" style="font-size: 14pt"><b>PART
      II. INSTRUCTIONS FOR HEALTH CARE DECISIONS</b></span></span></p>
    <p  style="margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">If
      you are an adult who is mentally competent, you have the right to
      accept or refuse medical or surgical treatment, if such refusal is
      not contrary to existing public health laws. You may give advance
      instructions for medical or surgical treatment that you want or do
      not want. These instructions will become effective if you lose the
      capacity to accept or refuse medical or surgical treatment. You may
      limit your instructions to take effect only if you are in a specified
      medical condition. If you give an instruction that you do not want
      your life prolonged, that instruction will only take effect if you
      are in a “qualifying condition.” </span></span>
    </p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p class="western"  style="margin-bottom: 0in; ">
      This form offers you ability to specify how you wish to be treated if
      you are diagnosed with one or more of three “Qualifying
      Conditions.” &quot;Qualifying condition'' means the existence of
      one or more of the following conditions in the patient, certified in
      writing in the patient's medical record by the attending physician
      and by at least one other physician who, when the condition in
      question is &quot;permanently unconscious'' shall be a
      board-certified neurologist and/or neurosurgeon:</p>
    <p class="western"  style="margin-bottom: 0in; ">
      <br/>

    </p>
    <p class="western"  style="margin-left: 0.5in; margin-bottom: 0in; ">
      (1) &quot;Permanently unconscious'' or &quot;permanent
      unconsciousness'' means a medical condition that has existed for at
      least 4 weeks and that has been diagnosed in accordance with
      currently accepted medical standards and with reasonable medical
      certainty as total and irreversible loss of consciousness and
      capacity for interaction with the environment. The term includes,
      without limitation, a persistent vegetative state or irreversible
      coma.
    </p>
    <p class="western"  style="margin-left: 0.5in; margin-bottom: 0in; ">
      <br/>

    </p>
    <p class="western"  style="margin-left: 0.5in; margin-bottom: 0in; ">
      (2) &quot;Terminal condition'' means any disease, illness or
      condition sustained by any human being for which there is no
      reasonable medical expectation of recovery and which, as a medical
      probability, will result in the death of such human being regardless
      of the use or discontinuance of medical treatment implemented for the
      purpose of sustaining life or the life processes.
    </p>
    <p class="western"  style="margin-left: 0.5in; margin-bottom: 0in; ">
      <br/>

    </p>
    <p class="western"  style="margin-left: 0.5in; margin-bottom: 0in; ">
      (3) &quot;Serious illness or frailty'' means a condition based on
      which the health-care practitioner would not be surprised if the
      patient died within the next year.</p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>

    <p class="western"  style="margin-bottom: 0in; ">
      <b>About your options: </b>It is important to read each option fully
      before choosing. Please note that you may to choose only one option
      under each qualifying condition but you may choose a different option
      under a different qualifying condition. You will also have the
      opportunity to write-in any other medical instructions.
    </p>
    <p class="western" style="margin-bottom: 0in; "><br/>

    </p>

    <p  style="margin-bottom: 0.09in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>A.
      END OF LIFE INSTRUCTIONS</b></span></span></p>
    <ul style="padding-left: 30px;">
      <li>
        <p  style="margin-bottom: 0in; margin-top: 0;">
          <u>After you have read all options, write your INITIALS on the line
            next to the option you have selected that represents your choice for
            treatment instructions.  You may only select one option. </u>
        </p>
      </li>
    </ul>
  </div>

  {{--
  <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif; margin-top: 20px;" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null && userDetails.tellUsAboutYou.fullname !== undefined">
    <span style="text-transform: capitalize"> Advance Health Care Directive of {{userDetails.tellUsAboutYou.fullname}} </span>
    <br>Page 4 of 11
  </div>
  <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;" *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null ">
    Advance Health Care Directive of <br> «CLIENT FULL NAME» <br>
    Page 4 of 11
  </div>
  --}}
</div>
<!-- Page 4-->


<!-- Page 5-->
<div style="page-break-after: always;">
  <div>
    <p class="western" style="margin-bottom: 0in; "><b>Qualifying
      Condition 1: Terminally Ill. </b>
    </p>

    <p class="western"  style="margin-bottom: 0in; ">
      _____ Option 1: My Agent will make decisions on my behalf: In the
      event I become terminally ill and I am unable to understand, make or
      communicate my wishes, I direct that my Agent make all medical
      decisions on my behalf.
    </p>

    <p class="western"  style="margin-bottom: 0in; ">
      _____ Option 2: Prolong Life: In the event I become terminally ill
      and I am unable to understand, make or communicate my wishes, I
      direct that my life be prolonged as long as possible using all
      possible treatments within the limits of generally accepted
      health-care standards, with the following exceptions (initial those
      treatments – if any – you do not want, even if they could prolong
      your life):
    </p>

    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      I DO NOT WANT the treatments initialed below:</p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      _____ heart-lung resuscitation (CPR)
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      _____ ventilator (breathing machine)
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      _____ dialysis (kidney machine)
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      _____ surgery
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      _____ blood transfusions
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      _____ chemotherapy or radiation treatment
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      _____ artificial nutrition or hydration through a conduit (tube
      feeding)
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      _____ antibiotics</p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p class="western"  style="margin-bottom: 0in; ">
      _____ Option 3: Do not Prolong Life: In the event I become terminally
      ill and am unable to understand, make or communicate my wishes, I
      direct that no life sustaining measures be taken, with the following
      exceptions (initial those treatments – if any – you do want, even
      if they could sustain your life):
    </p>

    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      I DO WANT the treatments initialed below:
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      _____ heart-lung resuscitation (CPR)
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      _____ ventilator (breathing machine)</p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      _____ dialysis (kidney machine)
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      _____ surgery
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      _____ blood transfusions
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      _____ chemotherapy or radiation treatment
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      _____ artificial nutrition or hydration through a conduit (tube
      feeding)
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      _____ antibiotics</p>
  </div>

  {{--
  <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif; margin-top: 20px;" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null && userDetails.tellUsAboutYou.fullname !== undefined">
    <span style="text-transform: capitalize"> Advance Health Care Directive of {{userDetails.tellUsAboutYou.fullname}} </span>
    <br>Page 5 of 11
  </div>
  <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;" *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null ">
    Advance Health Care Directive of <br> «CLIENT FULL NAME» <br>
    Page 5 of 11
  </div>
  --}}
</div>
<!-- Page 5-->

<!-- Page 6-->
<div style="page-break-after: always;">
  <div>
    <p class="western"  style="margin-bottom: 0in; ">
      <b>Qualifying Condition 2: Permanently Unconscious.</b> After you
      have read all options, write your initials on the line next to the
      option you have selected that represents your choice for treatment
      instructions. You may only select ONE option.
    </p>

    <p class="western"  style="margin-bottom: 0in; ">
      _____ Option 1: My Agent will make decisions on my behalf: In the
      event I become permanently unconscious and I am unable to understand,
      make or communicate my wishes, I direct that my Agent make all
      medical decisions on my behalf.
    </p>

    <p class="western"  style="margin-bottom: 0in; ">
      _____ Option 2: Prolong Life: In the event I become permanently
      unconscious and am unable to understand, make or communicate my
      wishes, I direct that my life be prolonged as long as possible using
      all possible treatments within the limits of generally accepted
      health-care standards, with the following exceptions (initial those
      treatments -- if any -- you do not want, even if they could prolong
      your life):
    </p>

    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      <span size="2" style="">I DO NOT WANT the treatments
      initialed below: </span>
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      <span size="2" style="">_____ heart-lung resuscitation
      (CPR)</span></p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0; ">
       <span size="2" style="">_____ ventilator (breathing
      machine) </span>
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      <span size="2" style="">_____ dialysis (kidney
      machine) </span>
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      <span size="2" style="">_____ surgery</span></p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      <span size="2" style="">_____ blood transfusions </span>
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      <span size="2" style="">_____ chemotherapy or
      radiation treatment </span>
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      <span size="2" style="">_____ artificial nutrition or
      hydration through a conduit (tube feeding) </span>
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      <span size="2" style="">_____ antibiotics </span>
    </p>

    <p class="western"  style="margin-bottom: 0in; ">
      _____ Option 3: Do Not Prolong Life: In the event I become
      permanently unconscious and am unable to understand, make or
      communicate my wishes, I direct that no life sustaining measures be
      taken, with the following exceptions (initial those treatments -- if
      any -- you do want, even if they could sustain your life):</p>

    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      <span size="2" style="">I DO WANT the treatments
      initialed below: </span>
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      <span size="2" style="">_____ heart-lung resuscitation
      (CPR) </span>
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      <span size="2" style="">_____ ventilator (breathing
      machine) </span>
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      <span size="2" style="">_____ dialysis (kidney
      machine) </span>
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      <span size="2" style="">_____ surgery </span>
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      <span size="2" style="">_____ blood transfusions </span>
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      <span size="2" style="">_____ chemotherapy or
      radiation treatment</span></p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      <span size="2" style="">_____ artificial nutrition or
      hydration through a conduit (tube feeding) </span>
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      <span size="2" style="">_____ antibiotics</span></p>
  </div>

  {{--
  <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif; margin-top: 20px;" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null && userDetails.tellUsAboutYou.fullname !== undefined">
    <span style="text-transform: capitalize"> Advance Health Care Directive of {{userDetails.tellUsAboutYou.fullname}} </span>
    <br>Page 6 of 11
  </div>
  <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;" *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null ">
    Advance Health Care Directive of <br> «CLIENT FULL NAME» <br>
    Page 6 of 11
  </div>
  --}}
</div>
<!-- Page 6-->

<!-- Page 7-->
<div style="page-break-after: always;">
  <div>
    <p class="western"  style="margin-bottom: 0in; ">
      <b>Qualifying Condition 3: Serious Illness or Frailty.</b> NOTE:
      Whether you elect to complete this section or not, when you develop a
      “serious illness or frailty” as defined at the beginning of this
      section, you or if you are unable, your agent can meet with your
      qualified health-care provider and execute a Delaware Medical Order
      for Life Sustaining Treatment which will create a medical order
      specifying your wishes for life sustaining treatment. After you have
      read all options, write your initials on the line next to the option
      you have selected that represents your choice for treatment
      instructions. <u>You may only select ONE option</u>.
    </p>

    <p class="western"  style="margin-bottom: 0in; ">
      _____ Option 1: My Agent will make decisions on my behalf: In the
      event I have a “serious illness or frailty” and I am unable to
      understand, make or communicate my wishes, I direct that my Agent
      make all medical decisions on my behalf.
    </p>

    <p class="western"  style="margin-bottom: 0in; ">
      _____ Option 2: Prolong Life: In the event I have a “serious
      illness or frailty” and I am unable to understand, make or
      communicate my wishes, I direct that my life be prolonged as long as
      possible using all possible treatments within the limits of generally
      accepted health-care standards, with the following exceptions
      (initial those treatments -- if any -- you do not want, even if they
      could prolong your life):
    </p>

    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      <span size="2" style="">I DO NOT WANT the treatments
      initialed below: </span>
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      <span size="2" style="">_____ heart-lung resuscitation
      (CPR) </span>
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in;  margin-top:10px;">
      <span size="2" style="">_____ ventilator (breathing
      machine) </span>
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in;  margin-top:10px;">
      <span size="2" style="">_____ dialysis (kidney
      machine) </span>
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in;  margin-top:10px;">
      <span size="2" style="">_____ surgery </span>
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in;  margin-top:10px;">
      <span size="2" style="">_____ blood transfusions </span>
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in;  margin-top:10px;">
      <span size="2" style="">_____ chemotherapy or
      radiation treatment </span>
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in;  margin-top:10px;">
      <span size="2" style="">_____ artificial nutrition or
      hydration through a conduit (tube feeding) </span>
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in;  margin-top:10px;">
      <span size="2" style="">_____ antibiotic </span>
    </p>

    <p class="western"  style="margin-bottom: 0in; ">
      _____ Option 3: Not to Prolong Life: In the event I have a “serious
      illness or frailty” and I am unable to understand, make or
      communicate my wishes, I direct that no life sustaining measures be
      taken, with the following exceptions (initial those treatments -- if
      any -- you do want, even if they could sustain your life):</p>

    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; ">
      <span size="2" style="">I DO WANT the treatments
      initialed below: </span>
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; margin-top:10px;">
      <span size="2" style="">_____ heart-lung resuscitation
      (CPR) </span>
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in;  margin-top:10px;">
      <span size="2" style="">_____ ventilator (breathing
      machine) </span>
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in;  margin-top:10px;">
      <span size="2" style="">_____ dialysis (kidney
      machine) </span>
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in;  margin-top:10px;">
      <span size="2" style="">_____ surgery </span>
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in;  margin-top:10px;">
      <span size="2" style="">_____ blood transfusions </span>
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in;  margin-top:10px;">
      <span size="2" style="">_____ chemotherapy or
      radiation treatment </span>
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in;  margin-top:10px;">
      <span size="2" style="">_____ artificial nutrition or
      hydration through a conduit (tube feeding) </span>
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in;  margin-top:10px;">
      <span size="2" style="">_____ antibiotics</span></p>
  </div>

  {{--
  <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif; margin-top: 20px;" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null && userDetails.tellUsAboutYou.fullname !== undefined">
    <span style="text-transform: capitalize"> Advance Health Care Directive of {{userDetails.tellUsAboutYou.fullname}} </span>
    <br>Page 7 of 11
  </div>
  <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;" *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null ">
    Advance Health Care Directive of <br> «CLIENT FULL NAME» <br>
    Page 7 of 11
  </div>
  --}}
</div>
<!-- Page 7-->


<!-- Page 8-->
<div style="page-break-after: always;">
  <div>
    <p  style="margin-bottom: 0.13in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>B.
      RELIEF FROM PAIN</b></span><span size="3" style="font-size: 12pt">:
      </span><span size="3" style="font-size: 12pt">(</span><span size="3" style="font-size: 12pt"><u>Initial
      ONE choice below</u></span><span size="3" style="font-size: 12pt">) </span></span>
    </p>
    <p  style="margin-bottom: 0.13in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________I
      wish to be treated to relieve pain or provide comfort, and I
      understand that such treatment might shorten my life or suppress my
      appetite or breathing. </span></span>
    </p>
    <p  style="margin-bottom: 0.13in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________I
      do not wish to be treated to relieve pain or provide comfort.</span></span></p>
    <p  style="margin-bottom: 0.13in; "><br/>
      <br/>

    </p>
    <p  style="margin-bottom: 0.09in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>C.
      OTHER MEDICAL INSTRUCTION</b></span><span size="3" style="font-size: 12pt">:
      If you wish to add to the instructions you have given above, you may
      do so here.</span></span></p>
    <p  style="margin-bottom: 0.09in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">______________________________________________________________________________</span></span></p>
    <p  style="margin-bottom: 0.09in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">______________________________________________________________________________</span></span></p>
    <p  style="margin-bottom: 0.09in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">______________________________________________________________________________</span></span></p>
    <p  style="margin-bottom: 0.09in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">______________________________________________________________________________ ______________________________________________________________________________</span></span></p>
    <p  style="margin-bottom: 0.09in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">______________________________________________________________________________</span></span></p>
    <p  style="margin-bottom: 0.09in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">______________________________________________________________________________</span></span></p>
    <p  style="margin-bottom: 0.09in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">______________________________________________________________________________</span></span></p>
    <p  style="margin-bottom: 0.09in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">______________________________________________________________________________</span></span></p>
    <p  style="margin-bottom: 0.09in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">______________________________________________________________________________</span></span></p>
    <p  style="margin-bottom: 0.09in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">______________________________________________________________________________</span></span></p>
    <p  style="margin-bottom: 0.09in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">______________________________________________________________________________</span></span></p>
    <p  style="margin-bottom: 0.09in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">______________________________________________________________________________</span></span></p>
    <p  style="margin-bottom: 0.09in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">______________________________________________________________________________</span></span></p>
    <p  style="margin-bottom: 0.09in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">______________________________________________________________________________</span></span></p>
    <p  style="margin-bottom: 0.09in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">______________________________________________________________________________</span></span></p>
    <p  style="margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">______________________________________________________________________________</span></span></p>
    <p  style="margin-bottom: 0in;  text-align:center;"><span size="1" style="font-size: 7pt"><span size="3" style="font-size: 12pt">(use
      additional sheets if necessary)</span></span></p>
  </div>

  {{--
  <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif; margin-top: 20px;" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null && userDetails.tellUsAboutYou.fullname !== undefined">
    <span style="text-transform: capitalize"> Advance Health Care Directive of {{userDetails.tellUsAboutYou.fullname}} </span>
    <br>Page 8 of 11
  </div>
  <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;" *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null ">
    Advance Health Care Directive of <br> «CLIENT FULL NAME» <br>
    Page 8 of 11
  </div>
  --}}
</div>
<!-- Page 8-->

<!-- Page 9-->
<div style="page-break-after: always;">
  <div>
    <p class="western"  style="margin-bottom: 0in;  text-align:center; ">
      <span size="4" style="font-size: 14pt"><b>PART III. ANATOMICAL GIFT
      DECLARATION (Optional)</b></span></p>

    <p  style="text-indent: 0.38in; margin-bottom: 0in; margin-top: 0;">
      <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">I
      hereby make the following anatomical gift(s) to take effect upon my
      death. The marks in the appropriate squares and words filled into the
      blanks below indicate my desires:</span></span></p>
    <p  style="margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">I
      give</span><span size="3" style="font-size: 12pt">	</span></span></p>
    <p  style="margin-bottom: 0in; "><span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span>
      <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">my
      body;</span><span size="3" style="font-size: 12pt">	</span></span></p>
    <p  style="margin-bottom: 0in; "><span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span>
      <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">any
      needed organs or parts;</span></span></p>
    <p  style="margin-bottom: 0in; "><span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span>
      <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">the
      following organs or parts _________________________________________</span></span></p>

    <p  style="margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">to</span><span size="3" style="font-size: 12pt">	</span></span></p>
    <p  style="margin-bottom: 0in; "><span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span>
      <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">the
      physician in attendance at my death;</span><span size="3" style="font-size: 12pt">	</span></span></p>
    <p  style="margin-bottom: 0in; "><span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span>
      <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">the
      hospital in which I die;</span><span size="3" style="font-size: 12pt">&nbsp;</span></span></p>
    <p  style="margin-bottom: 0in; "><span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span>
      <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">the
      following named physician, hospital, storage bank or other medical
      institution:</span></span></p>
    <p  style="margin-left: 0.5in; margin-bottom: 0.09in; ">
      <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 10pt">_____________________________________________________________</span></span></p>
    <p  style="text-indent: 0.5in; margin-bottom: 0in; ">
      <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">for
      the following purpose(s):</span></span></p>
    <p  style="margin-left: 0.5in; margin-bottom: 0in; ">
        <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">	</span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 18pt"><span size="3" style="font-size: 12pt"><span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span>
        </span></span></span><span size="3" style="font-size: 12pt">any
        purpose authorized by law;</span><span size="3" style="font-size: 12pt">	</span></span></p>
    <p  style="margin-left: 0.5in; text-indent: 0.5in; margin-bottom: 0in; ">
      <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span> <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">transplantation;</span></span></p>
    <p  style="margin-left: 0.5in; margin-bottom: 0in; ">
        <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">	</span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 18pt"><span size="3" style="font-size: 12pt"><span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span>
        </span></span></span><span size="3" style="font-size: 12pt">therapy;</span><span size="3" style="font-size: 12pt">	</span></span></p>
    <p  style="margin-left: 0.5in; text-indent: 0.5in; margin-bottom: 0in; ">
      <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span> <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">research;</span></span></p>
    <p  style="margin-left: 0.5in; margin-bottom: 0in; ">
      <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">	</span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 18pt"><span size="3" style="font-size: 12pt"><span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span>
      </span></span></span><span size="3" style="font-size: 12pt">medical
      education.</span></span></p>


    <p class="western"  style="margin-bottom: 0in;  text-align:center;">
      <span size="4" style="font-size: 14pt"><b>A</b></span><span size="4" style="font-size: 14pt"><b>DMINISTRATIVE
      PROVISIONS</b></span></p>

    <p class="western"  style="margin-bottom: 0in; margin-top: 0;">
      <b>A. REVOCATION, REMOVAL, AMENDMENT, OR RESIGNATION:</b>  I
      understand that, if I am mentally competent, I may revoke all or part
      of this document by writing down my revocation instructions and
      signing them. I do not need an attorney, health care provider or
      witnesses to do so, although I understand that it is best to have two
      witnesses sign after my signature. I further understand that it is
      best to give a copy of such written revocation instructions to my
      agents and health care providers. (Note: while you can revoke all or
      part of this document as described above, adding to your Advance
      Heath Care Directive requires completing a new form or writing signed
      by two qualified witnesses.) I understand that I may also revoke this
      health care directive in any manner that communicates an intent to
      revoke done in the presence of two competent persons, one of whom is
      a health care provider. I further understand that any revocation that
      is not in writing shall be memorialized in writing and signed and
      dated by both witnesses, and made a part of my medical record. I
      understand that, if I have designated my spouse as my agent, a decree
      of annulment, divorce, dissolution of marriage or a filing of a
      petition for divorce revokes that designation unless otherwise
      specified in the decree or in a power of attorney for health care. I
      understand that the initiation of emergency treatment shall be
      presumed to represent a suspension of an advance health-care
      directive while receiving such emergency treatment. Also, I
      understand that, upon written notification to me or to anyone who is
      caring for me or has custody of me, one or more of my health-care
      Agents may resign.</p>
  </div>

  {{--
  <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif; margin-top: 20px;" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null && userDetails.tellUsAboutYou.fullname !== undefined">
    <span style="text-transform: capitalize"> Advance Health Care Directive of {{userDetails.tellUsAboutYou.fullname}} </span>
    <br>Page 9 of 11
  </div>
  <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;" *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null ">
    Advance Health Care Directive of <br> «CLIENT FULL NAME» <br>
    Page 9 of 11
  </div>
  --}}
</div>
<!-- Page 9-->

<!-- Page 10-->
<div style="page-break-after: always;">
  <div>
    <p  style="margin-top: 0.13in; margin-bottom: 0.13in; ">
      <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>B.
       EFFECT OF COPY</b></span><span size="3" style="font-size: 12pt">: A
      copy of this form has the same effect as the original.</span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p class="western" style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in;  text-align:center;"><span size="2" style="font-size: 9pt"><span size="4" style="font-size: 14pt"><b>SIGNATURE
      AND ACKNOWLEDGEMENT</b></span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">I
      understand the purpose and effect of this document.</span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">_________________________________	</span><span ><span size="3" style="font-size: 12pt"><b>DATE</b></span></span><span size="3" style="font-size: 12pt">
      _________________________ </span></span>
    </p>
    <p class="western"  style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
      <b>
        <span style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</span>
      </b>
  	</p>

    <p style="margin-bottom: 0in; "><span><span size="2" style="font-size: 9pt"><span ><span size="3" style="font-size: 12pt"></span></span><span ><span size="3" style="font-size: 12pt">
        <span style="text-transform: capitalize">{{$tellUsAboutYou['address']}}</span>,
    </span></span><span ><span size="3" style="font-size: 12pt"></span></span></span></span></p>

    <p  style="margin-bottom: 0in; ">
    <span>
    <span size="2">

        <span style="text-transform: capitalize">{{strtoupper($tellUsAboutYou['city'])}}</span> ,


        <span style="text-transform: capitalize">{{strtoupper($tellUsAboutYou['state'])}}</span>

        <span style="text-transform: capitalize">{{strtoupper($tellUsAboutYou['zip'])}}</span>

    </span></span></p>

    <p  style="margin-top: 0.13in; margin-bottom: 0.13in; ">
      <br/>
      <br/>

    </p>
    <p  style="margin-top: 0.13in; margin-bottom: 0.13in;  text-align:center;">
        <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>Notary
        Acknowledgement (Optional):</b></span></span></p>
    <p align="left" style="margin-top: 0.13in; margin-bottom: 0.13in; ">
      <br/>
      <br/>

    </p>
    <p align="left" style="margin-top: 0.13in; margin-bottom: 0.13in; ">
        <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">STATE
        OF DELAWARE	)</span></span></p>
    <p align="left" style="margin-top: 0.13in; margin-bottom: 0.13in; ">
        <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">				)
        ss</span></span></p>
    <p align="left" style="margin-top: 0.13in; margin-bottom: 0.13in; ">
        <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">COUNTY
        OF 			)</span></span></p>
    <p align="left" style="margin-top: 0.13in; margin-bottom: 0.13in; ">
      <br/>
      <br/>

    </p>
    <p class="western"  style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
      <span face="TimesNewRomanPSMT, serif"><span size="3" style="font-size: 13pt">On
      this </span></span><span face="TimesNewRomanPSMT, serif"><span size="3" style="font-size: 13pt">_______</span></span><span face="TimesNewRomanPSMT, serif"><span size="3" style="font-size: 13pt">
      day of </span></span><span face="TimesNewRomanPSMT, serif"><span size="3" style="font-size: 13pt">_____________________</span></span><span face="TimesNewRomanPSMT, serif"><span size="3" style="font-size: 13pt">,
      </span></span><span face="TimesNewRomanPSMT, serif"><span size="3" style="font-size: 13pt">___________</span></span><span face="TimesNewRomanPSMT, serif"><span size="3" style="font-size: 13pt">,
      before me appeared </span></span><b>
      <span style="text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}},</span>
      </b>

      <span face="TimesNewRomanPSMT, serif"><span size="3" style="font-size: 13pt">
       personally known to me (or proved to me on the basis of satisfactory
      evidence) to be the person whose name is subscribed to this
      instrument, and acknowledged that the person executed it. </span></span>
    </p>
    <p style="margin-top: 0.19in; margin-bottom: 0.19in; ">
      <span face="TimesNewRomanPSMT, serif"><span size="3" style="font-size: 13pt">Notary
      Seal </span></span>
    </p>
    <p style="margin-top: 0.19in; margin-bottom: 0.19in; ">
      <span face="TimesNewRomanPSMT, serif"><span size="3" style="font-size: 13pt">___________________________
      (signature of notary public) </span></span>
    </p>
    <p style="margin-top: 0.19in; margin-bottom: 0.19in; ">
      <span face="TimesNewRomanPSMT, serif"><span size="3" style="font-size: 13pt">My
      commission expires:</span></span></p>
  </div>


  {{--
  <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif; margin-top: 20px;" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null && userDetails.tellUsAboutYou.fullname !== undefined">
    <span style="text-transform: capitalize"> Advance Health Care Directive of {{userDetails.tellUsAboutYou.fullname}} </span>
    <br>Page 10 of 11
  </div>
  <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;" *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null ">
    Advance Health Care Directive of <br> «CLIENT FULL NAME» <br>
    Page 10 of 11
  </div>
  --}}

</div>
<!-- Page 10-->


<!-- Page 11-->
<div>
  <div>
    <p  style="margin-top: 0.13in; margin-bottom: 0.06in;  text-align:center;">
      <span size="4" style="font-size: 14pt"><b>STATEMENT OF WITNESSES</b></span></p>

    <p  style="margin-bottom: 0.03in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">SIGNED
      AND DECLARED by the above-named declarant as and for </span>

      <span>
      	<span size="3" style="font-size: 12pt">
      		<span>{{$genderTxt4}}</span>
      	</span>
      </span>

      <span size="3" style="font-size: 12pt">
      written declaration under 16 Del. C. §§2502, 2503, in our presence,
      who in </span>

      <span>
      	<span size="3" style="font-size: 12pt">
      		<span>{{$genderTxt4}}</span>
      	</span>
      </span>

      <span size="3" style="font-size: 12pt"> presence, at </span>

      <span>
      	<span size="3" style="font-size: 12pt">
      		<span>{{$genderTxt4}}</span>
      	</span>
      </span>

      <span size="3" style="font-size: 12pt">
      request, and in the presence of each other, have hereunto subscribed
      our names as witnesses, and state:</span>
  		</span>
  		</p>

    <p  style="margin-left: 0.38in; margin-bottom: 0.03in; ">
      <span size="2" style="font-size: 9pt">
      	<span size="3" style="font-size: 12pt">A.</span>
      	<span size="3" style="font-size: 12pt">	</span>
      	<span size="3" style="font-size: 12pt">That
      the Declarant is mentally competent.</span>
  		</span>
  	</p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.03in; ">
      <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">B.</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">That
      neither of us is prohibited by §2503 of Title 16 of the Delaware
      Code from being a witness. Neither of us:</span></span></p>
    <p  style="margin-left: 1.13in; text-indent: -0.38in; margin-bottom: 0.03in; ">
      <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">1.</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">Is
      related to the declarant by blood, marriage or adoption;</span></span></p>
    <p  style="margin-left: 1.13in; text-indent: -0.38in; margin-bottom: 0.03in; ">
      <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">2.</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">Is
      entitled to any portion of the estate of the declarant under any will
      of the declarant or codicil thereto then existing nor, at the time of
      the executing of the advance health care directive, is so entitled by
      operation of law then existing;</span></span></p>
    <p  style="margin-left: 1.13in; text-indent: -0.38in; margin-bottom: 0.03in; ">
        <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">3.</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">Has,
        at the time of the execution of the advance health-care directive, a
        present or inchoate claim against any portion of the estate of the
        declarant;</span></span></p>
    <p  style="margin-left: 1.13in; text-indent: -0.38in; margin-bottom: 0.03in; ">
        <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">4.</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">Has
        a direct financial responsibility for the declarant's medical care;</span></span></p>
    <p  style="margin-left: 1.13in; text-indent: -0.38in; margin-bottom: 0.03in; ">
        <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">5.</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">Has
        a controlling interest in or is an operator or an employee of a
        residential long-term health-care institution in which the declarant
        is a resident; or</span></span></p>
    <p  style="margin-left: 1.13in; text-indent: -0.38in; margin-bottom: 0.03in; ">
        <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">6.</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">Is
        under eighteen years of age.</span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.03in; ">
        <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">C.</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">That
        if the declarant is a resident of a sanitarium, rest home, nursing
        home, boarding home or related institution, one of the witnesses,
        _______________________, is at the time of the execution of the
        advance health-care directive, a patient advocate or ombudsman
        designated by the Division of Services for Aging and Adults with
        Physical Disabilities or the Public Guardian.</span></span></p>

      <p  style="margin-bottom: 0.03in; "><span size="2" style="font-size: 9pt"><span size="2" style="font-size: 11pt">WITNESS
        1: ________________________________	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dated: ___________________</span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.03in; ">

    </p>
    <p  style="margin-bottom: 0.03in; "><span size="2" style="font-size: 9pt"><span size="2" style="font-size: 11pt">____________________________________</span></span></p>
    <p  style="margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 11pt">[name
        printed]</span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.03in; ">

    </p>
    <p  style="margin-bottom: 0.03in; "><span size="2" style="font-size: 9pt"><span size="2" style="font-size: 11pt">____________________________________	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;____________________________________</span></span></p>
    <p  style="margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 11pt">[street
      address] <span style="padding-left: 250px;"></span>[city, state]</span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.03in; ">

    </p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.03in; ">


    </p>
    <p  style="margin-bottom: 0.03in; "><span size="2" style="font-size: 9pt"><span size="2" style="font-size: 11pt">WITNESS
        2: ________________________________	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dated: ___________________</span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.03in; ">


    </p>
    <p  style="margin-bottom: 0.03in; "><span size="2" style="font-size: 9pt"><span size="2" style="font-size: 11pt">____________________________________</span></span></p>
    <p  style="margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 11pt">[name
      printed]</span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.03in; ">


    </p>
    <p  style="margin-bottom: 0.03in; "><span size="2" style="font-size: 9pt"><span size="2" style="font-size: 11pt">____________________________________	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;____________________________________</span></span></p>
    <p  style="margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 11pt">[street
      address] <span style="padding-left: 250px;"></span>[city, state]</span></span></p>
  </div>

  {{--
  <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif; margin-top: 20px;" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null && userDetails.tellUsAboutYou.fullname !== undefined">
    <span style="text-transform: capitalize"> Advance Health Care Directive of {{userDetails.tellUsAboutYou.fullname}} </span>
    <br>Page 11 of 11
  </div>
  <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;" *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null ">
    Advance Health Care Directive of <br> «CLIENT FULL NAME» <br>
    Page 11 of 11
  </div>
  --}}
</div>
<!-- Page 11-->

</div>
</body>
</html>
