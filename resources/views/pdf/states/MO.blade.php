<!DOCTYPE html>
<html>
<head>
	<title>Health Care Power of Attorney</title>
  <style type="text/css">
    .checkBox{
      display: inline-block;
      border: 1px solid #000;
      width: 10px;
      height: 10px;
      margin-right: 5px;
    }
  </style>
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
		Durable Power of Attorney for Health Care / Health Care Directive of <br>{{$tellUsAboutYou['fullname']}}<br>
	</div>
</div>

<div>
	<!-- Page 1 -->

<div>
  <div style="page-break-after: always;">
    <p  style="margin-bottom: 0.13in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 14pt"><b>DURABLE
      POWER OF ATTORNEY FOR HEALTH CARE</b></span></span></p>
    <p  style="margin-bottom: 0.13in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 14pt"><b>AND/OR
      HEALTH CARE DIRECTIVE OF</b></span></span></p>
    <p  style="margin-bottom: 0.08in;  orphans: 0; widows: 0; text-align:center;">
      <span style="font-family:'Times New Roman, serif'"><span size="3" style="font-size: 13pt"><b>
        <span>{{strtoupper($tellUsAboutYou['fullname'])}}</span>

      </b></span></span></p>
      <p  style="margin-bottom: 0in;  text-align:center;">
    	<span>
    		<span style="font-family:'Times New Roman, serif'">
      			<span style="text-transform: capitalize">{{$tellUsAboutYou['address']}}, {{ucwords(strtolower($tellUsAboutYou['city']))}}, {{ucwords(strtolower($tellUsAboutYou['state']))}}</span>
    		</span>
    	</span>
      </p>


    <p  style="margin-bottom: 0in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 14pt"><b>PART
      I. DURABLE POWER OF ATTORNEY FOR HEALTH CARE</b></span></span></p>
    <p  style="margin-bottom: 0in;  text-align:center;"><span style="font-family:'Times New Roman, serif'">(If
      you </span><span style="font-family:'Times New Roman, serif'"><i><b>DO NOT WISH</b></i></span><span style="font-family:'Times New Roman, serif'">
      to name someone to serve as your decision-making Agent,</span></p>
    <p  style="margin-bottom: 0.09in;  text-align:center;"><span style="font-family:'Times New Roman, serif'">mark
      an “X” through Part I and continue on to Part II.)</span></p>
    <p  style="margin-bottom: 0in; "><br/>
      <br/>

    </p>
    <p  style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
      <span ><span style="font-family:'Times New Roman, serif'">1.
      </span></span><span ><span style="font-family:'Times New Roman, serif'"><b>Selection
      of Agent</b></span></span><span ><span style="font-family:'Times New Roman, serif'">.
      I, </span></span><span style="font-family:'Times New Roman, serif'"><b>
      <span>{{strtoupper($tellUsAboutYou['fullname'])}},</span>

      </b></span><span ><span style="font-family:'Times New Roman, serif'">currently a resident of </span></span><span ><span style="font-family:'Times New Roman, serif'">________________</span></span><span ><span style="font-family:'Times New Roman, serif'">County,
      Missouri, appoint my</span></span><span size="3" style="font-size: 12pt">
			@if(strtolower($healthFinance['relation']) == 'other')
				<span style="font-family:'Times New Roman, serif'">{{ucwords(strtolower($healthFinance['relationOther']))}},</span>
			@else
				<span style="font-family:'Times New Roman, serif'" >{{ucwords(strtolower($healthFinance['relation']))}},</span>
			@endif
		</span><span style="font-family:'Times New Roman, serif';"> {{ucwords($healthFinance['fullname'])}} </span>of <span style="font-family:'Times New Roman, serif';text-transform: capitalize"> {{$healthFinance['address']}} </span>in <span style="font-family:'Times New Roman, serif';"> {{ucwords(strtolower($healthFinance['city']))}},</span> <span style="font-family:'Times New Roman, serif';"> {{ucwords(strtolower($healthFinance['state']))}} </span><span style="font-family:'Times New Roman, serif';text-transform: capitalize"> {{$healthFinance['zip']}} (Tel: <span> {{$healthFinance['phone']}} </span> ) as my TRUE AND LAWFUL attorney-in-fact (“Agent”&quot;).</span>
      </p>

    <p style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'">2.
      </span><span style="font-family:'Times New Roman, serif'"><b>Alternate Agent</b></span><span style="font-family:'Times New Roman, serif'">.
      </span>

      <span>
      	@if($healthFinance['anyBackupAgent'] === 'true')

      <span style="font-family:'Times New Roman, serif'">If
      my Agent resigns or is not able or available to make health care
      decisions for me, or if an Agent named by me is divorced from me or
      is my spouse and legally separated from me, I appoint my</span>

  		<span size="3" style="font-size: 12pt">
  			@if(strtolower($healthFinance['backupRelation'] == 'other'))
  				<span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupRelationOther']}},</span>
  			@else
  				<span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupRelation']}},</span>
  			@endif
  		</span><span style="font-family:'Times New Roman, serif';text-transform: capitalize"> {{$healthFinance['backupFullname']}} </span> of

      	<span style="font-family:'Times New Roman, serif';text-transform: capitalize"> {{$healthFinance['backupAddress']}} </span> in

      	<span style="font-family:'Times New Roman, serif';text-transform: capitalize"> {{ucwords(strtolower($healthFinance['backupCity']))}},</span>

      	<span style="font-family:'Times New Roman, serif';text-transform: capitalize"> {{ucwords(strtolower($healthFinance['backupState']))}}</span>

      	<span style="font-family:'Times New Roman, serif';text-transform: capitalize"> {{$healthFinance['backupZip']}}</span>

      	<span style="font-family:'Times New Roman, serif'">(Tel: <span> {{$healthFinance['backupphone']}} </span> ), to serve as my alternate Agent and to have the same powers as my Agent.<!--</span>--></span>
        @endif

        @if($healthFinance['anyBackupAgent'] == 'false')
        <span style="font-family:'Times New Roman, serif'">
        	<span>
        		<span style="font-family:'Times New Roman, serif'"></span>
        	</span>
        	<span>
        		<span style="font-family:'Times New Roman, serif'"></span>
        	</span>
        	<span>
        		<span style="font-family:'Times New Roman, serif'"> I decline to name an Alternate Agent.</span>
  			</span>
  			<span>
  				<span style="font-family:'Times New Roman, serif'"></span>
  			</span>
  		</span>
  		@endif

  		<span>
  			<span style="font-family:'Times New Roman, serif'"></span>
  		</span>

      </span>
    </p>  

    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'">3.
      </span><span style="font-family:'Times New Roman, serif'"><b>Durability</b></span><span style="font-family:'Times New Roman, serif'">.
      This is a Durable Power of Attorney, and the authority of my Agent,
      when effective, shall not terminate or be void or voidable if I am or
      become disabled or incapacitated or in the event of later uncertainty
      as to whether I am dead or alive.</span></p>

    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'">4.
        </span><span style="font-family:'Times New Roman, serif'"><b>Effective Date</b></span><span style="font-family:'Times New Roman, serif'">.
        This Durable Power of Attorney is effective when I am incapacitated
        and unable to make and communicate a health-care decision as
        certified by </span><span style="font-family:'Times New Roman, serif'"><i><b>(check
        one of the following boxes)</b></i></span><span style="font-family:'Times New Roman, serif'">:</span></p>
        <p  style="margin-bottom: 0in; "><br/>

    </p>

    <p  style="margin-bottom: 0in;  text-align:center;"><span class="checkBox"></span>
      <span style="font-family:'Times New Roman, serif'; display: inline-block;"> one physician 	</span><span style="font-family:'Times New Roman, serif'; display: inline-block; padding: 0 20px;"><b>OR</b></span><span style="font-family:'Times New Roman, serif'">
      </span>

     <span class="checkBox"></span>
      <span style="font-family:'Times New Roman, serif'; display: inline-block;"> two physicians.</span>
  	</p>



    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0.09in; "><span style="font-family:'Times New Roman, serif'">5.
      </span><span style="font-family:'Times New Roman, serif'"><b>Agent’s Powers</b></span><span style="font-family:'Times New Roman, serif'">.
      I grant to my Agent full authority to:</span></p>
    <p  style="margin-left: 0.56in; text-indent: -0.19in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'">A. 	Give consent to, prohibit, or
      withdraw any type of health care, long-term care, hospice or
      palliative care, medical care, treatment, or procedure, either in my
      residence or a facility outside of my residence, even if my death may
      result, including, but not limited to, an out of hospital
      do-not-resuscitate order, with the following specific authorization:&nbsp;</span></p>
  </div>

  <!-- <span style="border-top: 1px solid #000;"><strong>INITIALS</strong></span> -->
</div>
<!-- Page 1 -->

<!-- Page 2 -->
<div class="docPage" style="margin: 0; box-sizing: border-box; padding: 0px;">
  <div class="docPageInner" style="box-sizing: border-box; height: 870px; page-break-after: always;">
    <p  style="margin-left: 0.56in; text-indent: -0.19in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><i><b>(INITIAL ONE of the
      following to indicate your choice)</b></i></span></p>

    <p  style="margin-left: 1.31in; text-indent: -0.56in; margin-bottom: 0.06in; ">
      <span style="font-family:'Times New Roman, serif'">_______	I wish to AUTHORIZE my
      Agent to direct a health care provider to withhold or withdraw
      artificially supplied nutrition and hydration (including tube feeding
      of food and water); or,</span></p>
    <p  style="margin-left: 1.31in; text-indent: -0.56in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'">_______	I DO NOT AUTHORIZE my
      Agent to direct a health care provider to withhold or withdraw
      artificially supplied nutrition and hydration (including tube feeding
      of food and water);</span></p>
    <p  style="margin-left: 0.56in; text-indent: -0.19in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'">B.	Make all necessary
      arrangements for health care services on my behalf and to hire and
      fire medical personnel responsible for my care;</span></p>
    <p  style="margin-left: 0.56in; text-indent: -0.19in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'">C.	Move me into, or out of, any
      health care or assisted living/residential care facility or my home
      (even if against medical advice) to obtain compliance with the
      decisions of my Agent;</span></p>
    <p  style="margin-left: 0.56in; text-indent: -0.19in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'">D.	Take any other action
      necessary to do what I authorize here, including, but not limited to,
      granting any waiver or release from liability required by any health
      care provider and taking any legal action at the expense of my estate
      to enforce this Durable Power of Attorney for Health Care;</span></p>
    <p  style="margin-left: 0.56in; text-indent: -0.19in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'">E.	Receive information regarding
      my health care, obtain copies of and review my medical records,
      consent to the disclosure of my medical records, and act as my
      “personal representative” as defined in the regulations [45
      C.F.R. 164.502(g)] enacted pursuant to the Health Insurance
      Portability and Accountability Act of 1996 (“HIPAA”);</span></p>
    <p  style="margin-left: 0.56in; text-indent: -0.19in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'">F.	With respect to anatomical
      gifts of my body or any part (i.e., organs or tissues), please
      initial your desired choice below:</span></p>

    <p  style="margin-left: 0.75in; text-indent: -0.56in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'">_______ </span><span style="font-family:'Times New Roman, serif'"><b>(INITIAL)</b></span><span style="font-family:'Times New Roman, serif'"><i>
      </i></span><span style="font-family:'Times New Roman, serif'">AUTHORIZATION OF
      ANATOMICAL GIFTS. I wish to AUTHORIZE my Agent to make an anatomical
      gift of my body or part (organ or tissue).</span></p>
    <table width="100%" cellpadding="5" cellspacing="0" style="font-size: 16px; border: 1px solid #000; margin: 10px 0;">
      <!--<col width="241">
      <col width="344">-->
      <tr valign="top">
        <td width="" style="border: none; padding: 0 5px; border-bottom: 1px solid #000; border-right: 1px solid #000;">
          <p ><span style="font-family:'Times New Roman, serif'">My
			donations are for the following purposes: (check one)</span></p>
        </td>
        <td width="" style="border: none; padding: 0 5px; border-bottom: 1px solid #000;">
          <p ><span style="font-family:'Times New Roman, serif'">GIFT
			SPECIFICATIONS: (check one)</span></p>
        </td>
      </tr>
      <tr valign="top">
        <td width="" style="border: none; padding: 0 5px; border-bottom: 1px solid #000; border-right: 1px solid #000;">
          <p  style="margin-left: 0.38in"><span class="checkBox"></span> <span style="font-family:'Times New Roman, serif'">Transplantation</span></p>
        </td>
        <td width="" style="border: none; padding: 0 5px; border-bottom: 1px solid #000;">
          <p ><span style="font-family:'Times New Roman, serif'">I would
			like to donate</span></p>
        </td>
      </tr>
      <tr valign="top">
        <td width="" style="border: none; padding: 0 5px; border-bottom: 1px solid #000; border-right: 1px solid #000;">
          <p  style="margin-left: 0.38in"><span class="checkBox"></span> <span style="font-family:'Times New Roman, serif'">Therapy</span></p>
        </td>
        <td width="" style="border: none; padding: 0 5px; border-bottom: 1px solid #000;">
          <p  style="margin-left: 0.01in"><span class="checkBox"></span> <span style="font-family:'Times New Roman, serif'">Any
			needed organ and tissues, as allowed by law</span></p>
        </td>
      </tr>
      <tr valign="top">
        <td width="" style="border: none; padding: 0 5px; border-bottom: 1px solid #000; border-right: 1px solid #000;">
          <p  style="margin-left: 0.38in; margin-bottom: 0.09in">
            <span class="checkBox"></span> <span style="font-family:'Times New Roman, serif'">Research</span></p>
          <p  style="margin-left: 0.38in"><span class="checkBox"></span> <span style="font-family:'Times New Roman, serif'">Education</span></p>
        </td>
        <td width="" style="border: none; padding: 0 5px; border-bottom: 1px solid #000; border-right: 1px solid #000;">
          <p  style="margin-left: 0.19in; text-indent: -0.19in; margin-bottom: 0in">
            <span class="checkBox"></span> <span style="font-family:'Times New Roman, serif'">Any needed organs and
			tissues as allowed by law, <br>with the following restrictions</span></p>
          <p ><span style="font-family:'Times New Roman, serif'">___________________________________________</span></p>
        </td>
      </tr>
      <tr valign="top">
        <td width="" style="border: none; padding: 0 5px; border-bottom: 1px solid #000; border-right: 1px solid #000;">
          <p  style="margin-left: 0.38in"><span class="checkBox"></span> <span style="font-family:'Times New Roman, serif'">All
			the above</span></p>
        </td>
        <td width="" style="border: none; padding: 0 5px; border-bottom: 1px solid #000;">
          <p style="margin-top: 0;"><span style="font-family:'Times New Roman, serif'">____________________________________</span></p>
        </td>
      </tr>
    </table>
    <p  style="margin-left: 0.75in; text-indent: -0.56in; margin-top: 0in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'">_______	PROHIBITION OF ANATOMICAL
      GIFTS. I DO NOT AUTHORIZE my Agent to make an anatomical gift of my
      body or any part (organ or tissue).</span></p>
  </div>

<!--   <span style="border-top: 1px solid #000;"><strong>INITIALS</strong></span> -->
</div>
<!-- Page 2 -->

<!-- Page 3 -->
<div class="docPage" style="margin: 0; box-sizing: border-box; padding: 0px;">
  <div class="docPageInner" style="box-sizing: border-box; height: 870px; page-break-after: always;">
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'">6.
      </span><span style="font-family:'Times New Roman, serif'"><b>Agent’s Financial
      Liability and Compensation</b></span><span style="font-family:'Times New Roman, serif'">.
      My Agent acting under this Durable Power of Attorney will incur no
      personal financial liability. My Agent shall not be entitled to
      compensation for services performed under this Durable Power of
      Attorney, but my Agent shall be entitled to reimbursement for all
      reasonable expenses incurred as a result of carrying out any
      provision hereof.</span></p>
    <p  style="margin-bottom: 0in;  text-align:center;">————————————</p>
    <p  style="margin-bottom: 0.03in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 14pt"><b>PART
      II. HEALTH CARE DIRECTIVE</b></span></span></p>

    <p  style="margin-bottom: 0.09in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><i><b>(If
      you DO NOT WISH to make a health care directive but only wish to have
      an Agent make your decisions without the directive, be sure that you
      have completed Part I, mark an “X” through this page and continue
      to Part III.)</b></i></span></p>
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'">1.
      I make this HEALTH CARE DIRECTIVE (“Directive”) to exercise my
      right to determine the course of my health care and to provide clear
      and convincing proof of my choices and instructions about my
      treatment.</span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0.09in; "><span style="font-family:'Times New Roman, serif'">2.
      If I am persistently unconscious or there is no reasonable
      expectation of my recovery from a seriously incapacitating or
      terminal illness or condition, I direct that all of the
      life-prolonging procedures that I have initialed below be withheld or
      withdrawn. </span><span style="font-family:'Times New Roman, serif'"><b>(INITIAL ANY
      CHOICES YOU WISH TO APPLY)</b></span></p>
    <p  style="margin-left: 0.75in; text-indent: -0.62in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'">_______	artificially supplied
      nutrition and hydration (including tube feeding of food and water)</span></p>
    <p  style="margin-left: 0.75in; text-indent: -0.62in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'">_______	surgery or other invasive
      procedures	</span></p>
    <p  style="margin-left: 0.75in; text-indent: -0.62in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'">_______	heart-lung resuscitation
      (CPR)&nbsp;</span></p>
    <p  style="margin-left: 0.75in; text-indent: -0.62in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'">_______	antibiotics	</span></p>
    <p  style="margin-left: 0.75in; text-indent: -0.62in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'">_______	dialysis</span></p>
    <p  style="margin-left: 0.75in; text-indent: -0.62in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'">_______	mechanical ventilator
      (respirator)</span></p>
    <p  style="margin-left: 0.75in; text-indent: -0.62in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'">_______	chemotherapy</span></p>
    <p  style="margin-left: 0.75in; text-indent: -0.62in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'">_______	radiation therapy</span></p>
    <p  style="margin-left: 0.75in; text-indent: -0.62in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'">_______	other procedures
      specified by me (insert) __________________________________</span></p>
    <p  style="margin-left: 0.75in; text-indent: -0.62in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'">_______	all other
      “life-prolonging” medical or surgical procedures that are merely
      intended to keep me alive without reasonable hope of improving my
      condition or curing my illness or injury</span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'">3.
      However, if my physician believes that any life-prolonging procedure
      may lead to a recovery significant to me as communicated by me or my
      Agent to my physician, then I direct my physician to try the
      treatment for a reasonable period of time. If it does not cause my
      condition to improve, I direct the treatment to be withdrawn even if
      it shortens my life. I also direct that I be given medical treatment
      to relieve pain or to provide comfort, even if such treatment might
      shorten my life, suppress my appetite or my breathing, or be
      habit-forming.</span></p>
  </div>
<!--
  <span style="border-top: 1px solid #000;"><strong>INITIALS</strong></span> -->
</div>
<!-- Page 3 -->


<!-- Page 4 -->
<div class="docPage" style="margin: 0; box-sizing: border-box; padding: 0px;">
  <div class="docPageInner" style="box-sizing: border-box; height: 870px; page-break-after: always;">
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'">4.
      If I have already consented to be on the Missouri organ and tissue
      donor registry or my Agent has authorized the donation of my organs
      or tissues, I realize it may be necessary to maintain my body
      artificially after my death until my organs or tissues can be
      removed.</span></p>

    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><b>IF
      I HAVE NOT DESIGNATED AN AGENT IN THE DURABLE POWER OF ATTORNEY, PART
      II OF THIS DOCUMENT IS MEANT TO BE IN FULL FORCE AND EFFECT AS MY
      HEALTH CARE DIRECTIVE.</b></span></p>
    <p  style="margin-bottom: 0in;  text-align:center;">————————————</p>
    <p  style="margin-bottom: 0in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><b>PART
      III. GENERAL PROVISIONS INCLUDED IN THE DURABLE POWER</b></span></p>
    <p  style="margin-bottom: 0in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><b>OF
      ATTORNEY FOR HEALTH CARE AND HEALTH CARE DIRECTIVE</b></span></p>

    <p  style="margin-bottom: 0.09in; "><span style="font-family:'Times New Roman, serif'">1.
      </span><span style="font-family:'Times New Roman, serif'"><b>Relationship Between
      Durable Power of Attorney for Health Care and Health Care Directive</b></span><span style="font-family:'Times New Roman, serif'">.
      If I have executed both the Durable Power of Attorney for Health Care
      and Health Care Directive, I encourage my Agent to:</span></p>
    <p  style="margin-left: 0.56in; text-indent: -0.19in; margin-bottom: 0.06in; ">
      <span style="font-family:'Times New Roman, serif'">A.	First, follow my choices as
      expressed in the above Directive or otherwise from knowing me or
      having had various discussions with me about making decisions
      regarding life-prolonging procedures.</span></p>
    <p  style="margin-left: 0.56in; text-indent: -0.19in; margin-bottom: 0.06in; ">
      <span style="font-family:'Times New Roman, serif'">B.	Second, if my Agent does not
      know my choices for the specific decision at hand, but my Agent has
      evidence of my preferences, my Agent can determine how I would
      decide. My Agent should consider my values, religious beliefs, past
      decisions, and past statements. </span><span style="font-family:'Times New Roman, serif'"><i>The
      aim is to choose as I would choose, even if it is not what my Agent
      would choose for himself or herself.</i></span></p>
    <p  style="margin-left: 0.56in; text-indent: -0.19in; margin-bottom: 0.06in; ">
      <span style="font-family:'Times New Roman, serif'">C.	Third, if my Agent has little
      or no knowledge of choices I would make, then my Agent and the
      physicians will have to make a decision based on what a reasonable
      person in the same situation would decide. I have confidence in my
      Agent’s ability to make decisions in my best interest if my Agent
      does not have enough information to follow my preferences.</span></p>
    <p  style="margin-left: 0.56in; text-indent: -0.19in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'">D.	Finally, if the Durable Power
      of Attorney for Health Care is determined to be ineffective, or if my
      Agent is not able to serve, the Health Care Directive is intended to
      be used on its own as firm instructions to my health care providers
      regarding life-prolonging procedures.</span></p>

    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'">2.
      </span><span style="font-family:'Times New Roman, serif'"><b>Protection of Third
      Parties Who Rely on My Agent</b></span><span style="font-family:'Times New Roman, serif'">.
      No person who relies in good faith upon any representations by my
      Agent shall be liable to me, my estate, my heirs or assigns, for
      recognizing the Agent’s authority.</span></p>

    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'">3.
      </span><span style="font-family:'Times New Roman, serif'"><b>Revocation of Prior
      Durable Power of Attorney for Health Care or Health Care Directive</b></span><span style="font-family:'Times New Roman, serif'">.
      I revoke any prior Living Will, Declaration or Health Care Directive
      executed by me. If I have appointed an Agent in a prior durable power
      of attorney, I revoke any health care terms contained in that durable
      power of attorney.&nbsp;</span></p>
  </div>

<!--   <span style="border-top: 1px solid #000;"><strong>INITIALS</strong></span> -->
</div>
<!-- Page 4 -->


<!-- Page 5 -->
<div>
  <div style="page-break-after: always;">
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'">4.
      </span><span style="font-family:'Times New Roman, serif'"><b>Validity</b></span><span style="font-family:'Times New Roman, serif'">.
      This document is intended to be valid in any jurisdiction in which it
      is presented. The provisions of this document are separable, so that
      the invalidity of one or more provisions shall not affect any others.
      A copy of this document shall be as valid as the original.</span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><b>IF
      YOU HAVE COMPLETED THE ENTIRE DOCUMENT OR ONLY THE DIRECTIVE (PART
      II), YOU MUST SIGN THIS DOCUMENT IN THE PRESENCE OF TWO WITNESSES.</b></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="text-indent: 0.5in; margin-bottom: 0in; line-height: 200%">
      <br/>

    </p>
    <p  style="text-indent: 0.5in; margin-bottom: 0in; line-height: 200%">
      <span style="font-family:'Times New Roman, serif'">IN WITNESS WHEREOF, I signed this
      document on this </span><span style="font-family:'Times New Roman, serif'">_____________</span><span style="font-family:'Times New Roman, serif'">
      day of </span>
    </p>
    <p  style="margin-bottom: 0in; line-height: 200%"><span style="font-family:'Times New Roman, serif'">_____________________________</span><span style="font-family:'Times New Roman, serif'">,
      </span><span style="font-family:'Times New Roman, serif'">__________________</span><span style="font-family:'Times New Roman, serif'">.</span></p>

    <p  style="margin-left: 0.5in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'">_______________________________________</span></p>
    <p  style="margin-bottom: 0.08in; margin-left: 0.5in; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>
        <span>{{strtoupper($tellUsAboutYou['fullname'])}}</span>

      </b>
  	  </span>
  	</p>


    <p  style="margin-bottom: 0in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><b>NOTARY
      ACKNOWLEDGMENT</b></span></p>
    <p  style="margin-bottom: 0in;  text-align:center;"><span style="font-family:'Times New Roman, serif'">(Only
      required if Part I or entire document completed.)</span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'">STATE
      OF MISSOURI		)</span></span></p>
    <p  style="margin-left: 1in; text-indent: 0.5in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'">		) ss.&nbsp;</span></p>
    <p  style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'">COUNTY
      OF ________________	)</span></span></p>
    <p  style="margin-bottom: 0.08in;  orphans: 0; widows: 0"><a name="_GoBack"></a>
      <span style="font-family:'Times New Roman, serif'">On this ____ day of </span><span style="font-family:'Times New Roman, serif'">___________________</span><span style="font-family:'Times New Roman, serif'">,
        </span><span style="font-family:'Times New Roman, serif'">______________</span><span style="font-family:'Times New Roman, serif'">,
        before me, personally </span><span style="font-family:'Times New Roman, serif'">


        <span>{{strtoupper($tellUsAboutYou['fullname'])}}</span>

        </span><span style="font-family:'Times New Roman, serif'">,
        to me known to be the person described in and who executed the
        foregoing instrument, and acknowledged that </span>

        <span>
        	<span style="font-family:'Times New Roman, serif'">
        		<span>{{$genderTxt4}} executed the same as {{$genderTxt4}} free act and deed.</span>
        	</span>
        </span>
        </p>
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><b>IN
      WITNESS WHEREOF</b></span><span style="font-family:'Times New Roman, serif'">, I
      have hereunto set my hand and affixed my official seal in the County
      or City and state aforementioned, on the day and year first above
      written.</span></p>

    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'">	______________________________________</span></p>
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'">	NOTARY
      PUBLIC</span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'">	______________________________________</span></p>
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'">	Printed
      Name</span></p>
  </div>

  <!-- <span style="border-top: 1px solid #000;"><strong>INITIALS</strong></span> -->
</div>
<!-- Page 5 -->

<!-- Page 6 -->
<div>
  <div>
    <p  style="margin-bottom: 0in;">
      <span style="font-family:'Times New Roman, serif'"><b>WITNESSES</b></span><span style="font-family:'Times New Roman, serif'">:
        The person who signed this document is of sound mind and voluntarily
        signed this document in our presence. Each of the undersigned
        witnesses is at least eighteen years of age.</span></p>
    <p  style="margin-bottom: 0.06in; "><br/>
      <br/>

    </p>
    <p  style="margin-bottom: 0.06in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt"><b>WITNESS
        1</b></span></span></span><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">:
        ________________________________	Dated: ___________________</span></span></span></p>
    <p  style="margin-bottom: 0.06in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">[signature]</span></span></span></p>

    <p  style="margin-bottom: 0.06in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">____________________________________</span></span></span></p>
    <p  style="margin-bottom: 0.06in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">	[name
      printed]</span></span></span></p>

    <p  style="margin-bottom: 0.06in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">____________________________________</span></span></span></p>
    <p  style="margin-bottom: 0.06in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">	[street
      address]</span></span></span></p>

    <p  style="margin-bottom: 0.06in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">____________________________________</span></span></span></p>
    <p  style="margin-bottom: 0.06in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">	[city,
      state]</span></span></span></p>
    <p  style="margin-bottom: 0.06in; "><br/>
      <br/>

    </p>
    <p  style="margin-bottom: 0.06in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt"><b>WITNESS
      2: </b></span></span></span><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">________________________________	Dated:
      ___________________</span></span></span></p>
    <p  style="margin-bottom: 0.06in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">[signature]</span></span></span></p>

    <p  style="margin-bottom: 0.06in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">____________________________________</span></span></span></p>
    <p  style="margin-bottom: 0.06in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">	[name
      printed]</span></span></span></p>

    <p  style="margin-bottom: 0.06in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">____________________________________</span></span></span></p>
    <p  style="margin-bottom: 0.06in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">	[street
      address]</span></span></span></p>

    <p  style="margin-bottom: 0.06in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">____________________________________</span></span></span></p>
    <p  style="margin-bottom: 0.06in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">	[city,
      state]</span></span></span></p>
  </div>

  <!-- <span style="border-top: 1px solid #000;"><strong>INITIALS</strong></span> -->
</div>
<!-- Page 6 -->

</div>

</body>
</html>
