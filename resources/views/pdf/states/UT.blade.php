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
	    Medical Power of Attorney and Living Will Directive of <br>{{ucwords(strtolower($tellUsAboutYou['fullname']))}}<br>
	  </div>
	</div>
<div>
	<div>
    <div>
      <p  style="margin-bottom: 0in; line-height: 100%; text-align: center;"><span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 16pt"><b>Utah
        Advance Health Care Directive</b></span></span></p>
        <p  style="margin-bottom: 0.13in; line-height: 100%; text-align: center;"><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt"><i><b>(Pursuant
        to Utah Code Sections 75-2a-117, effective 2009)</b></i></span></span></p>

        <div style="border: 1px solid #00000a;">
        <p align="justify" style="margin-bottom: 0in; padding: 0.01in 0.06in; line-height: 100%">
        <span style="font-family:'Times New Roman, serif'"><b>Part I: </b></span><span style="font-family:'Times New Roman, serif'"><i><b>Allows
        you to name another person to make health care decisions for you when
        you cannot make decisions or speak for yourself.</b></i></span></p>
        <p align="justify" style="margin-bottom: 0in; padding: 0.01in 0.06in; line-height: 100%">
        <span style="font-family:'Times New Roman, serif'"><b>Part II: </b></span><span style="font-family:'Times New Roman, serif'"><i><b>Allows
        you to record your wishes about health care in writing.</b></i></span></p>
        <p align="justify" style="margin-bottom: 0in; padding: 0.01in 0.06in; line-height: 100%">
        <span style="font-family:'Times New Roman, serif'"><b>Part III: </b></span><span style="font-family:'Times New Roman, serif'"><i><b>Tells
        you how to revoke or change this directive.</b></i></span></p>
        <p align="justify" style="margin-bottom: 0in; padding: 0.01in 0.06in; line-height: 100%">
        <span style="font-family:'Times New Roman, serif'"><b>Part IV: </b></span><span style="font-family:'Times New Roman, serif'"><i><b>Makes
        your directive legal.</b></i></span></p>
        </div>

        <p  style="margin-bottom: 0in; line-height: 100%; text-align: center;"><span style="font-family:'Times New Roman, serif'"><b>My
        Personal Information</b></span></p>
        <p  style="margin-bottom: 0in; line-height: 100%; text-align: center;"><br/>

        </p>

        <div style="border: 1px solid #00000a;">
          <p align="justify" style="margin-top: 0.06in; margin-bottom: 0in; padding: 0.01in 0.06in; line-height: 100%">
          <span ><span style="font-family:'Times New Roman, serif'">Name:
            </span></span><span ><span style="font-family:'Times New Roman, serif'"><b></b></span></span><span >
              <span style="font-family:'Times New Roman, serif'">
                  <b style="text-transform: capitalize">{{ucwords(strtolower($tellUsAboutYou['fullname']))}}, </b>
              </span>
            </span>
          </p>

          <p align="justify" style="margin-bottom: 0in;  padding: 0.01in 0.06in; line-height: 100%">
          <span style="font-family:'Times New Roman, serif'">Address:	</span>

          <span>
            <span style="font-family:'Times New Roman, serif'" >{{$tellUsAboutYou['address']}},</span>
          </span>
          </p>

          <p align="justify" style="margin-bottom: 0in; padding: 0.01in 0.06in; line-height: 100%">
            <span style="font-family:'Times New Roman, serif'">Address:	</span>

            <span>
                <span style="text-transform: capitalize" style="font-family:'Times New Roman, serif'">{{ucwords(strtolower($tellUsAboutYou['city']))}},</span>
            </span>

            <span>
                <span style="text-transform: capitalize" style="font-family:'Times New Roman, serif'">{{$tellUsAboutYou['state']}},</span>&nbsp;
            </span>

            <span>
                <span style="font-family:'Times New Roman, serif'">{{$healthFinance['zip']}} </span>
            </span>
            <span style="font-family:'Times New Roman, serif'"></span>
          </p>

          <p align="justify" style="margin-bottom: 0in; padding: 0.01in 0.06in; line-height: 100%">
            <span>
              <span style="font-family:'Times New Roman, serif'">Telephone:	</span>
            </span>
            <span>
                <span style="font-family:'Times New Roman, serif'">{{$tellUsAboutYou['phone']}}</span>
            </span>
          </p>

          <p align="justify" style="margin-bottom: 0in; padding: 0.01in 0.06in; line-height: 100%">
            <span style="font-family:'Times New Roman, serif'">Date of Birth:	</span>
            <span>
                <span style="font-family:'Times New Roman, serif'">{{date('jS M, Y', strtotime($tellUsAboutYou['dob']))}} </span>
            </span>
          </p>
      </div>

        <p  style="margin-bottom: 0.09in; line-height: 100%; text-align: center;"><span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 14pt"><b>Part
        I: My Agent (</b></span></span><span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 14pt"><i><b>Health
        Care Power of Attorney</b></i></span></span><span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 14pt"><b>)</b></span></span></p>

        <p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><b>A.
        No Agent:</b></span></p>
        <p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><i>(If
        you do not want to name an agent, initial the line below, then go to
        Part II; do not name an agent in B. or C. below. You are not required
        to name an agent, and no one can force you to name an agent)</i></span></p>

        <p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">______	I
        do not want to choose an agent.</span></p>

        <p style="margin-bottom: 0.09in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><b>OR</b></span></p>

        <p style="margin-bottom: 0.09in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><b>B.
        My Agent. </b></span><span style="font-family:'Times New Roman, serif'">I want the
        following person to make health care decisions for me:</span></p>
        <p style="text-indent: 0.41in; margin-bottom: 0in; line-height: 100%">
          <span ><span style="font-family:'Times New Roman, serif'">Name:		</span></span>

          <span>
              <span style="font-family:'Times New Roman, serif'">{{$healthFinance['fullname']}}</span>
          </span>
        </p>

        <p style="text-indent: 0.38in; margin-bottom: 0in; line-height: 100%">
        <span>
          <span style="font-family:'Times New Roman, serif'">Relation:		</span>
        </span>

        <span>

            @if(strtolower($healthFinance['relation']) == 'other')
				<span style="font-family:'Times New Roman, serif'">{{ucwords(strtolower($healthFinance['relationOther']))}} </span>
			@else
				<span style="font-family:'Times New Roman, serif'" >{{$healthFinance['relation']}} </span>
			@endif
        </span>

        </p>

        <p style="text-indent: 0.38in; margin-bottom: 0in; line-height: 100%">
          <span>
            <span style="font-family:'Times New Roman, serif'">Phone #: </span>
          </span>

          <span>
              <span style="font-family:'Times New Roman, serif'">{{$healthFinance['phone']}}</span>
          </span>
        </p>

        <p style="text-indent: 0.38in; margin-bottom: 0in; line-height: 100%">
        <span>
          <span style="font-family:'Times New Roman, serif'">Address: </span>
        </span>

        <span>
            <span style="font-family:'Times New Roman, serif'">{{$healthFinance['address']}}, </span>
        </span>
        </p>
        <p style="margin-left: 1in; text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
        <span>
            <span style="font-family:'Times New Roman, serif'">{{ucwords(strtolower($healthFinance['city']))}}, </span>
        </span>

        <span>
            <span style="font-family:'Times New Roman, serif'">{{$healthFinance['state']}}</span>
        </span>

        <span>
          <span style="font-family:'Times New Roman, serif'">{{$healthFinance['zip']}}</span>
        </span>

        </p>
    </div>

  </div>


  <div>
    <div>

      <p align="justify" style="margin-bottom: 0.09in; line-height: 100%; page-break-before: always">
        <span style="font-family:'Times New Roman, serif'"><b>C. My Alternate Agent. </b></span><span style="font-family:'Times New Roman, serif'">If
        the person named above is unable or unwilling to make health care
        decisions for me, I appoint as alternate agent:</span></p>

        <!-- if alternate agent-->
        	@if($healthFinance['anyBackupAgent'] == 'true')
            <p style="text-indent: 0.38in; margin-bottom: 0in; line-height: 100%">
                <br/>

                </p>
                <p style="text-indent: 0.38in; margin-bottom: 0in; line-height: 100%">
                  <span>
                    <span style="font-family:'Times New Roman, serif'">Name:		</span>
                  </span>

                  <span>
                      <span style="font-family:'Times New Roman, serif'">{{ucwords(strtolower($healthFinance['backupFullname']))}}</span>
                  </span>
                </p>

                <p style="text-indent: 0.38in; margin-bottom: 0in; line-height: 100%">

                <span>
                  <span style="font-family:'Times New Roman, serif'">Relation: </span>
                </span>

                <span>
                    @if(strtolower($healthFinance['backupRelation']) == 'other')
						<span style="font-family:'Times New Roman, serif'">{{ucwords(strtolower($healthFinance['backupRelationOther']))}} </span>
					@else
						<span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupRelation']}} </span>
					@endif
                </span>

                </p>

                <p style="text-indent: 0.38in; margin-bottom: 0in; line-height: 100%">
                <span>
                  <span style="font-family:'Times New Roman, serif'">Phone #: </span>
                </span>

                <span>
                    <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupphone']}} </span>
                </span>

                </p>

                <p style="text-indent: 0.38in; margin-bottom: 0in; line-height: 100%">
                <span>
                  <span style="font-family:'Times New Roman, serif'">Address: </span>
                </span>

                <span>
                    <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupAddress']}}, </span>
                </span>

                </p>

                <p style="text-indent: 0.38in; margin-bottom: 0in; line-height: 100%">
                <span>
                  <span style="font-family:'Times New Roman, serif'">			</span>
                </span>

                <span>
                    <span style="font-family:'Times New Roman, serif'">{{ucwords(strtolower($healthFinance['backupCity']))}}, </span>
                </span>

                <span>
                    <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupState']}}</span>
                </span>

                <span>
                    <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupZip']}}</span>
                </span>

                </p>

		        <p align="justify" style="text-indent: 0.38in; margin-bottom: 0in; line-height: 100%">
		        <span style="font-family:'Times New Roman, serif'">Name:&nbsp;	</span><span style="font-family:'Times New Roman, serif'">________________________</span></p>
		        <p align="justify" style="text-indent: 0.38in; margin-bottom: 0in; line-height: 100%">
		        <span style="font-family:'Times New Roman, serif'">Relation:&nbsp;</span><span style="font-family:'Times New Roman, serif'">_________________________</span></p>
		        <p align="justify" style="text-indent: 0.38in; margin-bottom: 0in; line-height: 100%">
		        <span style="font-family:'Times New Roman, serif'">Phone #:&nbsp;</span><span style="font-family:'Times New Roman, serif'">_________________________</span></p>
		        <p align="justify" style="text-indent: 0.38in; margin-bottom: 0in; line-height: 100%">
		        <span style="font-family:'Times New Roman, serif'">Address:&nbsp;</span><span style="font-family:'Times New Roman, serif'">_________________________</span></p>
		        <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span ><span style="font-family:'Times New Roman, serif'"></span></span>
		        <span></span>
            @endif




        <span ><span style="font-family:'Times New Roman, serif'"></span></span></p>
        <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

        </p>
        <p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><b>D.
        My Agent’s Authority. </b></span><span style="font-family:'Times New Roman, serif'">If
        I cannot make decisions or speak for myself (in other words, after my
        physician or another authorized provider finds that I lack health
        care decision making capacity under Section 75-2a-104 of the Advance
        Health Care Directive Act), my agent has the power to make any health
        care decision I could have made such as, but not limited to: </span>
        </p>
        <ul style="margin-left: 60px;">
        <li>
        <p style="margin-bottom: 0in; margin-top: 0; line-height: 150%"><span style="font-family:'Times New Roman, serif';">Consent
        to, refuse, or withdraw any health care. This may include care to
        prolong my life such as food and fluids by tube, use of antibiotics,
        CPR (cardiopulmonary resuscitation), and dialysis, and mental health
        care, such as convulsive therapy and psychoactive medications. This
        authority is subject to any limits in paragraph F of Part I or in
        Part II of this directive. </span>
        </p>
        </li>
        <li>
        <p style="margin-bottom: 0in; margin-top: 0; line-height: 150%"><span style="font-family:'Times New Roman, serif'">Hire
        and fire health care providers. </span>
        </p>
        </li>
        <li>
        <p style="margin-bottom: 0in; margin-top: 0; line-height: 150%"><span style="font-family:'Times New Roman, serif'">Ask
        questions and get answers from health care providers. </span>
        </p>
        </li>
        <li>
        <p style="margin-bottom: 0in; margin-top: 0; line-height: 150%"><span style="font-family:'Times New Roman, serif'">Consent
        to admission or transfer to a health care provider or health care
        facility, including a mental health facility, subject to any limits
        in paragraphs E or F of Part I. </span>
        </p>
        </li>

        <li>
        <p style="margin-bottom: 0in; margin-top: 0; line-height: 150%"><span style="font-family:'Times New Roman, serif'">Get
        copies of my medical records. </span>
        </p>
        </li>
        <li>
        <p style="margin-bottom: 0in; margin-top: 0; line-height: 150%"><span style="font-family:'Times New Roman, serif'">Ask
        for consultations or second opinions. </span>
        </p>
        </li>
        </ul>
        <p style="margin-bottom: 0in; line-height: 100%"><br/>

        </p>
        <p style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">My
        agent cannot force health care against my will, even if a physician
        has found that I lack health care decision making capacity.</span></p>
    </div>

  </div>


  <div style="page-break-after: always;">
    <div>
      <p style="margin-left: 0.13in; text-indent: -0.13in; margin-bottom: 0.03in; line-height: 100%; page-break-before: always">
        <span style="font-family:'Times New Roman, serif'"><b>E. Other Authority. </b></span>
        </p>

        <p style="margin-bottom: 0.03in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">My
        agent has the powers below ONLY IF I initial above “YES” option
        that precedes the statement. </span><span style="font-family:'Times New Roman, serif'">I
        authorize my agent to:</span></p>

        <p style="margin-bottom: 0.06in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">_____YES
        _____NO	Get copies of my medical records at any time, even when I can speak for myself.</span></p>
        <p style="margin-bottom: 0in; line-height: 100%"><br/>

        </p>
        <p style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">_____YES
        _____NO	Admit me to a licensed health care facility, such as a
        hospital, nursing
        home, assisted  living, or other facility for long-term placement
        other than convalescent or recuperative care.&nbsp;</span></p>
				<br>
        <p style="margin-bottom: 0.06in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><b>F.
        Limits/Expansion of Authority. </b></span><span style="font-family:'Times New Roman, serif'">I
        wish to limit or expand the powers of my health care agent:</span></p>
        <p align="justify" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
        <span style="font-family:'Times New Roman, serif'">_________________________________________________________________________</span></p>
        <p align="justify" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
        <span style="font-family:'Times New Roman, serif'">_________________________________________________________________________</span></p>
        <p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
        <span style="font-family:'Times New Roman, serif'">_________________________________________________________________________</span></p>
        <p style="text-indent: 0.38in; margin-bottom: 0in; line-height: 100%">
        <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt"><i>(Attach
        additional sheets if needed.)</i></span></span></p>
        <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

        </p>
        <p style="margin-bottom: 0.06in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><b>G.
        Nomination of Guardian:</b></span></p>
        <p style="margin-bottom: 0.06in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><i>(Even
        though appointing an agent should help you to avoid a guardianship, a
        guardianship may still be necessary. Initial above &quot;YES&quot; if
        you want the court to appoint your agent to serve as your guardian,
        if a guardianship is ever necessary)</i></span></p>
        <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

        </p>
        <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">_____YES
        _____NO	I, being of sound mind and not acting under duress, fraud, undue
        influence, do&nbsp;hereby nominate my agent, or, if my agent is unable or unwilling to serve, I
        nominate my alternate agent to serve as my guardian in the event
        that, after the date of this instrument, I become incapacitated.&nbsp;</span></p>

        <p style="margin-bottom: 0.06in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><b>H.
        Consent to Participate in Medical Research:</b></span></p><br>
        <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">_____YES
        _____NO	I authorize my agent to consent to my participation in
        medical research or clinical trials, even
        if I will not benefit from the results.&nbsp;</span></p>
        <p style="margin-bottom: 0.06in; line-height: 100%; "><span style="font-family:'Times New Roman, serif'"><b>I.
        Organ Donation:</b></span></p>
        <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">_____YES
        _____NO	If I have not otherwise agreed to organ donation, my agent may consent to the donation of my
        organs for the purpose of organ transplantation.&nbsp;</span></p>
    </div>

  </div>


  <div>
    <div>
      <p  style="margin-bottom: 0.09in; line-height: 100%; text-align: center;">
        <span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 14pt"><b>Part
        II: My Health Care Wishes (</b></span></span><span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 14pt"><i><b>Living
        Will</b></i></span></span><span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 14pt"><b>)</b></span></span></p>
        <p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">I
        want my health care providers to follow the instructions I give them
        when I am being treated, even if my instructions conflict with these
        or other advance directives. My health care providers should always
        provide health care to keep me as comfortable and functional as
        possible.</span></p>
        <p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><i><b>Choose
        only one </b></i></span><span style="font-family:'Times New Roman, serif'"><i>of the
        following options by placing your initials before the numbered
        statement. </i></span><span style="font-family:'Times New Roman, serif'"><i><u>Do
        not initial more than one option</u></i></span><span style="font-family:'Times New Roman, serif'"><i>.
        If you do not wish to document end-of-life wishes, initial Option 4.
        You may draw a line through the options that you are not choosing.</i></span></p>

        <p  style="margin-bottom: 0.09in; line-height: 100%; text-align: center;"><span style="font-family:'Times New Roman, serif'"><b>OPTION
        1</b></span></p>
        <p style="margin-bottom: 0.09in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">(INITIALS)</span></p>
        <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><b>________	I
        choose to let my agent decide. </b></span><span style="font-family:'Times New Roman, serif'">I
        have chosen my agent carefully. I have talked with my agent	about my health
        care wishes. I trust my agent to make the health care decisions for
        me that I would make under the circumstances.</span></p>

        <p style="margin-bottom: 0.06in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><b>Additional
        comments:  </b></span><span style="font-family:'Times New Roman, serif'">__________________________________________________________</span></p>
        <p style="margin-bottom: 0.06in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">_____________________________________________________________________________</span><span style="font-family:'Times New Roman, serif'"><b>	</b></span></p>

        <p  style="margin-bottom: 0.09in; line-height: 100%; text-align: center;"><span style="font-family:'Times New Roman, serif'"><b>OPTION
        2</b></span></p>
        <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><b>________	I
        choose to prolong life. </b></span><span style="font-family:'Times New Roman, serif'">Regardless
        of my condition or prognosis, I want my health care team to try to
        prolong my life as long as possible within the limits of generally
        accepted health care standards.</span></p>
        <br/>
        <p style="margin-bottom: 0.06in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><b>Additional
        comments:  </b></span><span style="font-family:'Times New Roman, serif'">__________________________________________________________</span></p>
        <p style="margin-bottom: 0.06in; line-height: 100%">
        <span style="font-family:'Times New Roman, serif'">______________________________________________________________________________</span></p>

        <p  style="margin-bottom: 0.09in; line-height: 100%; text-align: center;"><span style="font-family:'Times New Roman, serif'"><b>OPTION
        3</b></span></p>
        <p align="justify" style="margin-left: 0.75in; text-indent: -0.75in; margin-bottom: 0in; line-height: 100%">
        <span style="font-family:'Times New Roman, serif'"><b>________	I choose not to
        receive care for the purpose of prolonging life, </b></span><span style="font-family:'Times New Roman, serif'">including
        food and fluids by tube, antibiotics, CPR, or dialysis being used to
        prolong my life. I always want comfort care and routine medical care
        that will keep me as comfortable and functional as possible, even if
        that care may prolong my life.</span></p>
        <p style="margin-bottom: 0.06in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><i><b>If
        you choose this option, you must also choose either (a) or (b),
        below.</b></i></span></p>

        <p style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><b>________	</b></span><span style="font-family:'Times New Roman, serif'">(a)
        I put no limit on the ability of my health care provider or agent to
        withdraw life-sustaining care.</span></p>
        <p style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><i><b>Go
        to next page. Do not choose options below.</b></i></span></p>
    </div>
  </div>


  <div>
    <div>
      <p align="justify" style="margin-left: 1in; text-indent: -1in; margin-bottom: 0in; line-height: 100%; page-break-before: always;">
        <span style="font-family:'Times New Roman, serif'"><b>________ 	</b></span><span style="font-family:'Times New Roman, serif'">(b)
        My health care provider should decline to provide life-sustaining
        care if at least one of the initialed conditions is met:  </span><span style="font-family:'Times New Roman, serif'"><i><b>You
        must initial at least one of the options below. You may choose more
        than one condition.</b></i></span></p>

        <p style="margin-left: 1.13in; margin-bottom: 0.06in; line-height: 150%">
        <span style="font-family:'Times New Roman, serif'"><b>________  </b></span><span style="font-family:'Times New Roman, serif'">I
        have a progressive illness that will cause death</span></p>
        <p style="margin-left: 1.13in; margin-bottom: 0.06in; line-height: 150%">
        <span style="font-family:'Times New Roman, serif'"><b>________  </b></span><span style="font-family:'Times New Roman, serif'">I
        am close to death and I am unlikely to recover</span></p>
        <p style="margin-left: 1.88in; text-indent: -0.75in; margin-bottom: 0.06in; line-height: 150%">
        <span style="font-family:'Times New Roman, serif'"><b>________	</b></span><span style="font-family:'Times New Roman, serif'">I
        cannot communicate and it is unlikely that my condition will improve</span></p>
        <p style="margin-left: 1.88in; text-indent: -0.75in; margin-bottom: 0.06in; line-height: 150%">
        <span style="font-family:'Times New Roman, serif'"><b>________	</b></span><span style="font-family:'Times New Roman, serif'">I
        do not recognize my friends or family and it is unlikely that my
        condition will improve</span></p>
        <p style="margin-left: 1.13in; margin-bottom: 0.06in; line-height: 150%">
        <span style="font-family:'Times New Roman, serif'"><b>________  </b></span><span style="font-family:'Times New Roman, serif'">I
        am in a persistent vegetative state</span></p>

        <p style="margin-bottom: 0.06in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><b>Additional
        comments:  </b></span><span style="font-family:'Times New Roman, serif'">_________________________________________________________</span></p>
        <p  style="margin-bottom: 0.09in; line-height: 100%; text-align: center;">
        <span style="font-family:'Times New Roman, serif'">_____________________________________________________________________________</span></p>

        <p  style="margin-bottom: 0.09in; line-height: 100%; text-align: center;"><span style="font-family:'Times New Roman, serif'"><b>OPTION
        4</b></span></p>
        <p align="justify" style="margin-left: 0.75in; text-indent: -0.75in; margin-bottom: 0in; line-height: 100%">
        <span style="font-family:'Times New Roman, serif'"><b>________	I do not wish to
        express preferences about health care wishes in this directive.</b></span></p>
        <p style="margin-left: 0.75in; text-indent: -0.75in; margin-bottom: 0.06in; line-height: 100%">
        <span style="font-family:'Times New Roman, serif'">	</span></p>

        <p style="margin-bottom: 0.06in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><b>Additional
        comments:  </b></span><span style="font-family:'Times New Roman, serif'">_________________________________________________________</span></p>
        <p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">_____________________________________________________________________________</span></p>

        <p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><i>Additional
        instructions about your health care wishes:</i></span></p>
        <p align="justify" style="margin-bottom: 0in; line-height: 150%"><span style="font-family:'Times New Roman, serif'">
        _____________________________________________________________________________<br>
        _____________________________________________________________________________<br>
        _____________________________________________________________________________<br>
        _____________________________________________________________________________<br>
        _____________________________________________________________________________<br>
        </span></p>
        <p style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt"><i>(Add
        additional sheets if needed.)</i></span></span></p>
    </div>

  </div>


  <div>
    <div>
      <p  style="margin-bottom: 0.09in; line-height: 100%; page-break-before: always; text-align: center;"><span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 14pt"><b>Part
        III: Revoking or Changing a Directive</b></span></span></p><br>
        <p style="margin-bottom: 0.06in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><b>I
        may revoke or change this directive by:</b></span></p>
        <p style="margin-left: 0.19in; text-indent: -0.19in; margin-bottom: 0.06in; line-height: 100%">
        <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">1.
        Writing “void” across the form, burning, tearing, or otherwise
        destroying or defacing this document or directing another person to
        do the same on my behalf;</span></span></p>
        <p style="margin-left: 0.19in; text-indent: -0.19in; margin-bottom: 0.06in; line-height: 100%">
        <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">2.
        Signing a written revocation of the directive, or directing another
        person to sign a revocation on my behalf;</span></span></p>
        <p style="margin-left: 0.19in; text-indent: -0.19in; margin-bottom: 0.06in; line-height: 100%">
        <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">3.
        Stating that I wish to revoke in the presence of a witness age 18
        years of age or older, who will not be appointed agent in a
        substitute directive and who will not become a default surrogate if
        the directive is revoked, and who signs and dates a written document
        confirming my statement; or</span></span></p>
        <p style="margin-left: 0.19in; text-indent: -0.19in; margin-bottom: 0in; line-height: 100%">
        <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">4.
        Drafting a new directive.</span></span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt"><b>
        (</b></span></span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt"><i><b>If
        you sign more than one Advance Health Care Directive, the most recent
        directive applies.)</b></i></span></span></p>
        <p style="margin-left: 0.19in; text-indent: -0.19in; margin-bottom: 0in; line-height: 100%">
        <br/>

        </p>
        <p  style="margin-bottom: 0.09in; line-height: 100%; text-align: center;"><span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 14pt"><b>Part
        IV: Making the Document Legal</b></span></span></p>
        <p align="justify" style="margin-bottom: 0.13in; line-height: 100%"><br/>
        <br/>

        </p>
        <p align="justify" style="margin-bottom: 0.13in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">I
        sign this directive voluntarily. I understand the choices I have
        made, and declare that I am emotionally and mentally competent to
        make this directive. My signature on this form revokes any living
        will or power of attorney form naming a health care agent that I have
        completed in the past.</span></p>
        <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

        </p>
        <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">DATE:
        </span><span style="font-family:'Times New Roman, serif'">_______________________</span><span style="font-family:'Times New Roman, serif'">
        </span>
        </p>
        <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

        </p>
        <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

        </p>
        <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">__________________________________________________</span></p>
        <p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'"><b></b></span>

        <span>
        	<span style="font-family:'Times New Roman, serif'">
        		<b style="text-transform: capitalize">{{strtoupper(strtolower($tellUsAboutYou['fullname']))}}</b>
        	</span>
        </span>
		</p>

        <p align="justify" style="margin-left: 2in; text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
        <span style="font-family:'Times New Roman, serif'"></span><span ><span style="font-family:'Times New Roman, serif'">{{ucwords(strtolower($tellUsAboutYou['city']))}}, </span></span><span style="font-family:'Times New Roman, serif'">
        </span>

        <span>
        	<span style="font-family:'Times New Roman, serif'">{{$tellUsAboutYou['state']}}, </span></span><span style="font-family:'Times New Roman, serif'">
        </span>

        <span style="font-family:'Times New Roman, serif'">_________________________</span><span style="font-family:'Times New Roman, serif'">
        County</span></p>
    </div>

  </div>


  <div>
    <div>
      <p align="justify" style="margin-bottom: 0.06in; line-height: 100%; page-break-before: always">
        <span style="font-family:'Times New Roman, serif'"><b>I have witnessed the signing
        of this directive, I am 18 years of age or older, and:</b></span></p>
        <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">1.	I
        am not related to the declarant by blood or marriage;</span></p>
        <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">2.	I
        am not entitled to any portion of the declarant's estate according to
        the laws of intestate succession of this state or under
        any will or codicil of the declarant;</span></p>
        <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">3.	I
        am not the beneficiary of a life insurance policy, trust, qualified
        plan, property or accounts held in POD, TOD, or co-ownership
        registration with the right of survivorship;</span></p>
        <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">4.	I
        am not financially responsible for the declarant's support or medical
        care;</span></p>
        <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">5.	I
        am not a health care provider who is providing care to the declarant
        or an administrator at a health care facility in
        which the declarant is receiving care; and</span></p>
        <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">6.	I
        am not the appointed agent or alternate agent.</span></p>
				<br>
              <p class="western" style="margin-bottom: 0in; line-height: 100%"><span ><b>WITNESS
        1</b></span><span >: </span><span >____________________</span><span style="padding-left: 50px;">	Dated:
        </span><span >______________________</span></p>
        <p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 100%">
        <span style="padding-left: 50px;">[signature]</span></p>
        <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%; padding-top: 15px;">
        <span >____________________________</span><span >		</span><span style="padding-left: 122px;">______________________</span></p>
        <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
        <span style="padding-left: 60px;">	[name printed]</span><span style="padding-left: 190;">[street address]</span></p>
        <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%; padding:25px 0 0 350px;">
        <span >							</span><span >______________________</span></p>
        <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%; padding-left: 350px;">
        <span style="padding-left: 40px;">								[city, state, zip]</span></p>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

        </p>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

        </p>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><span ><b>WITNESS
        2</b></span><span >: </span><span >____________________</span><span style="padding-left: 50px;">	Dated:
        </span><span >______________________</span></p>
        <p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 100%">
        <span style="padding-left: 50px;">[signature]</span></p>
        <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%; padding-top: 15px;">
        <span >____________________________</span><span >		</span><span style="padding-left: 122px;">______________________</span></p>
        <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
        <span style="padding-left: 60px;">	[name printed]</span><span style="padding-left: 190;">[street address]</span></p>
        <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%; padding:25px 0 0 350px;">
        <span >							</span><span >______________________</span></p>
        <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%; padding-left: 350px;">
        <span style="padding-left: 40px;">								[city, state, zip]</span></p>
    </div>

  </div>
</div>
</body>
</html>
