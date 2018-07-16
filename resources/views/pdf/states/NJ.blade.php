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
		Advance Health Care Directive (Proxy and Living Will) of <br>{{$tellUsAboutYou['fullname']}}<br>
	</div>
</div>

<div>
	<div class="docPage" style="margin: 0; box-sizing: border-box; padding: 0px;">
    <div class="docPageInner" style="box-sizing: border-box; height: 875px; page-break-after: always;">
      <p  style="margin-bottom: 0in;  text-align:center;">

        <span size="4" style="font-size: 14pt">
          <span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>N</b></span></span></span><span size="4" style="font-size: 16pt"><b>EW
        </b></span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>J</b></span></span></span><span size="4" style="font-size: 16pt"><b>ERSEY</b></span></span></p>
        <p  style="margin-bottom: 0in;  text-align:center;"><span size="4" style="font-size: 14pt"><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>A</b></span></span></span><span size="4" style="font-size: 16pt"><b>DVANCE
        </b></span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>H</b></span></span></span><span size="4" style="font-size: 16pt"><b>EALTH
        </b></span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>C</b></span></span></span><span size="4" style="font-size: 16pt"><b>ARE
        </b></span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>D</b></span></span></span><span size="4" style="font-size: 16pt"><b>IRECTIVE</b></span></span></p>


        <p  style="margin-left: 0.19in; text-indent: -0.19in; margin-top: 0.13in; margin-bottom: 0.13in;  text-align:center;">
        <span size="2" style="font-size: 10pt"><span size="4" style="font-size: 14pt"><b>PART
        I</b></span></span></p>
        <p  style="margin-bottom: 0in;  text-align:center;"><span size="2" style="font-size: 10pt"><span size="3" style="font-size: 12pt"><b>PROXY
        DIRECTIVE – (DURABLE POWER OF ATTORNEY FOR HEALTH CARE)</b></span></span></p>
        <p  style="margin-bottom: 0in;  text-align:center;"><span size="2" style="font-size: 10pt"><span size="3" style="font-size: 12pt"><b>DESIGNATION
        OF A HEALTH CARE </b></span><span size="3" style="font-size: 12pt"><b>REPRESENTATIVE</b></span></span></p>

        <p class="western"  style="margin-bottom: 0in; border: 1px solid #00000a; padding: 0.1in 0.06in; ">
        I understand that as a competent adult, I have the right to make
        decisions about my health care. There may come a time when I am
        unable, due to physical or mental incapacity, to make my own health
        care decision. In these circumstances, those caring for me will need
        direction and they will turn to someone who knows my values and
        health care wishes. By writing this durable power of attorney for
        health care I appoint a health care representative with the legal
        authority to make health care decisions on my behalf and to consult
        with my physician and others. I direct that this document become part
        of my permanent medical records.</p>



        <ol type="A">
        <li>
          <p  style="margin-bottom: 0in;  margin-top: 0;">
          <span face="Calibri, serif">
            <span style="font-family:'Times New Roman, serif'">I, </span>
            <span style="font-family:'Times New Roman, serif'"> </span>

            <span>
              <span style="font-family:'Times New Roman, serif'">
                  <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>

              </span>

              <span style="font-family:'Times New Roman, serif'">, hereby designate
              and appoint my </span>

              <span>
                  	@if(strtolower($healthFinance['relation']) == 'other')
						<span style="font-family:'Times New Roman, serif'">{{$healthFinance['relationOther']}}, </span>
					@else
						<span style="font-family:'Times New Roman, serif'" >{{$healthFinance['relation']}}, </span>
					@endif
              </span>

              <span>
                  <span style="font-family:'Times New Roman, serif'">{{$healthFinance['fullname']}}</span>

              </span>

            <span style="font-family:'Times New Roman, serif'">, of </span>

            <span>
                <span style="font-family:'Times New Roman, serif'">{{$healthFinance['address']}}, </span>
            </span>

            <span style="font-family:'Times New Roman, serif'"> in </span>

            <span>
                <span style="font-family:'Times New Roman, serif'">{{$healthFinance['city']}}, </span>
            </span>

            <span style="font-family:'Times New Roman, serif'">, </span>

            <span>
                <span style="font-family:'Times New Roman, serif'">{{$healthFinance['state']}}, </span>
            </span>

            <span style="font-family:'Times New Roman, serif'"> </span>

            <span>
                <span style="font-family:'Times New Roman, serif'">{{$healthFinance['zip']}}, </span>
            </span>

            <span style="font-family:'Times New Roman, serif'"> (Tel: </span>
            <span>
                <span style="font-family:'Times New Roman, serif'">{{$healthFinance['phone']}}</span>
            </span>

            <span style="font-family:'Times New Roman, serif'">), </span>

              <span style="font-family:'Times New Roman, serif'">as my health care
              representative to make any and all health care decisions for me,
              including decisions to accept or to refuse any treatment, service or
              procedure used to diagnose or treat my physical or mental condition
              and decisions to provide, withhold or withdraw life-sustaining
              measures. I direct my representative to make decisions on my behalf
              in accordance with my wishes as stated in this document, or as
              otherwise known to him or her. In the event my wishes are not clear,
              my representative is authorized to make decisions in my best
              interest, based on what is known of my wishes.</span>


            </span>
          </span>
          </p>
        </li>
        </ol>


        	@if($healthFinance['anyBackupAgent'] == 'true')
                <p style="margin-bottom: 0in; ">

                  <span size="2" style="font-size: 9pt">
                    <span size="3" style="font-size: 12pt">If said representative is not available or becomes ineligible to act, or
                      if I revoke this appointment or authority to act as my
                      representative, then I designate my </span>
						<span>
						@if(strtolower($healthFinance['backupRelation']) == 'other')
							<span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupRelationOther']}}, </span>
						@else
							<span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupRelation']}}, </span>
						@endif
						</span>

                    <span size="3" style="font-size: 12pt">, </span>

                    <span>
                        <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupFullname']}}</span>
                    </span>

                    <span size="3" style="font-size: 12pt">, of </span>

                    <span>
                        <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupAddress']}}, </span>
                    </span>

                    <span size="3" style="font-size: 12pt"> in </span>

                    <span>
                        <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupCity']}}, </span>

                    </span>

                    <span size="3" style="font-size: 12pt">, </span>
                    <span>
                        <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupState']}}, </span>
                    </span>

                    <span size="3" style="font-size: 12pt"> </span>

                    <span>
                        <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupZip']}}, </span>
                    </span>

                    <span size="3" style="font-size: 12pt">(Tel: </span>

                    <span>
                        <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupphone']}}</span>
                    </span>

                    <span size="3" style="font-size: 12pt">), as my alternate representative to make health care decisions for me
                      as authorized in this document.</span>

                    <span size="3" style="font-size: 12pt">&nbsp;</span>
                </span></p>
            @endif


        <p class="western"  style="margin-bottom: 0in; ">
        This durable power of attorney for health care shall take effect in
        the event I become unable to make my own health care decisions, as
        determined by the physician who has primary responsibility for my
        care, and any necessary confirming determinations.  Unless I revoke
        it, this proxy shall remain in effect indefinitely.  I revoke any
        prior advance health care directive and any prior health care proxy.&nbsp;</p>
    </div>

    {{--
    <div *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null"
    style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
    Advance Health Care Directive <span style="text-transform: capitalize">{{userDetails.tellUsAboutYou.fullname}}</span><br>
      Page 1 of 9
    </div>

    <div *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null" style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
      Advance Health Care Directive CLIENT FIRST NAME CLIENT MIDDLE NAME CLIENT LAST NAME<br>
      Page 1 of 9
    </div>
    --}}
</div>




<div class="docPage" style="margin: 0; box-sizing: border-box; padding:0px;">
    <div class="docPageInner" style="box-sizing: border-box; height: 875px; page-break-after: always;">
      <ol type="A" start="2">
        <li>
        <p style="margin-bottom: 0in; margin-top: 0;">
        <span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'"><b>SPECIFIC
        DIRECTIONS:</b></span><span style="font-family:'Times New Roman, serif'"> </span><span style="font-family:'Times New Roman, serif'"><b>Please
        initial the statement below which best expresses your wishes</b></span><span style="font-family:'Times New Roman, serif'">.</span></span></p>
        </li>
        </ol>

        <p style="margin-left: 0.5in; margin-bottom: 0in; ">
        <span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">_____
        My health care representative is authorized to direct that
        artificially provided fluids and nutrition, such as by feeding tube
        or intravenous infusion, be withheld or withdrawn. </span></span>
        </p>

        <p style="margin-left: 0.5in; margin-bottom: 0in; "><span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'"><b>OR
        </b></span></span>
        </p>

        <p style="margin-left: 0.5in; margin-bottom: 0in; "><span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">_____
        My health care representative does not have this authority, and I
        direct that artificially provided fluids and nutrition be provided to
        preserve my life, to the extent medically appropriate.</span></span></p>

        <ol type="A" start="3">
        <li>
        <p style="margin-bottom: 0in; margin-top: 0;"><span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'"><b>ADDITIONAL
        INSTRUCTIONS: (If you have any additional specific instructions
        concerning your care you may use the space below or attach an
        additional statement.)</b></span><span style="font-family:'Times New Roman, serif'">
        ______________________________________________________________________ ______________________________________________________________________ ______________________________________________________________________</span></span></p>
        </li>
        </ol>
        <p style="margin-bottom: 0in; "><span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">______________________________________________________________________ ______________________________________________________________________ ______________________________________________________________________</span></span></p>
        <p  style="margin-bottom: 0.09in; "><br/>
        <br/>

        </p>
        <ol type="A" start="4">
        <li>
        <p  style="margin-bottom: 0in; ">
        <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>HIPAA
        WAIVER AND MEDICAL RECORDS RELEASE.</b></span><span size="3" style="font-size: 12pt">
        In addition to the above-described powers, my health care
        representative has the power and authority to do all of the
        following:</span><span size="3" style="font-size: 12pt">&nbsp;</span></span></p>
        </li>
        </ol>
        <p  style="margin-left: 0.5in; margin-bottom: 0in; ">
        <br/>

        </p>
        <p  style="margin-left: 0.5in; margin-bottom: 0in; ">
        <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">1.</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">Request,
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
        give, disclose, and release to my representative, without
        restriction, all of my individually identifiable health information
        and medical records regarding any past, present, or future medical or
        mental health condition. This authority given my representative shall
        supersede any other agreement which I may have made with my health
        care providers to restrict access to or disclosure of my individually
        identifiable health information. This authority given my
        representative shall be effective immediately, has no expiration date
        and shall expire only in the event that I revoke the authority in
        writing and deliver it to my health care provider;</span></span></p>
    </div>

    {{--
    <div *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null"
    style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
    Advance Health Care Directive <span style="text-transform: capitalize">{{userDetails.tellUsAboutYou.fullname}}</span><br>
      Page 2 of 9
    </div>

    <div *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null" style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
      Advance Health Care Directive CLIENT FIRST NAME CLIENT MIDDLE NAME CLIENT LAST NAME<br>
      Page 2 of 9
    </div>
    --}}
</div>


<div>
    <div style="page-break-after: always;">
      <p style="margin-left: 0.5in; margin-bottom: 0in; ">
        <span size="2" style="font-size: 9pt">
          <span size="3" style="font-size: 12pt">2.</span>

          <span size="3" style="font-size: 12pt">	</span>

          <span size="3" style="font-size: 12pt">Execute
        on my behalf any releases or other documents that may be required in
        order to obtain this information; and</span></span></p>
        <p  style="margin-left: 0.5in; margin-bottom: 0in; ">
        <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">3.</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">Consent
        to the disclosure of this information.</span></span></p>

        <ol type="A" start="5">
        <li>
        <p  style="margin-bottom: 0in; margin-top: 0;">
        <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>NOMINATION
        OF GUARDIAN.</b></span><span size="3" style="font-size: 12pt">  If a
        guardian of the person is to be appointed for me, I nominate the
        representative whom I named in this form in the order designated to
        act as such guardian.</span><span size="3" style="font-size: 12pt">&nbsp;</span></span></p>
        </li>
        </ol>

        <ol type="A" start="6">
        <li>
        <p  style="margin-bottom: 0in; margin-top: 0;">
        <span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'"><b>COPIES:</b></span><span style="font-family:'Times New Roman, serif'">
          </span><span style="font-family:'Times New Roman, serif'">Persons dealing with my
        health care representative may rely fully on a photocopy of this
        document as though the photocopy was an original.</span><span style="font-family:'Times New Roman, serif'">&nbsp;
        </span><span style="font-family:'Times New Roman, serif'">The original or a copy of
        this document has been given to my health care representative and to
        the following: </span></span>
        </p>
        </li>
        </ol>

        <p class="western" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
        1. name 	___________________________________
        </p>
        <p class="western" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
        address 	_________________________________
        </p>
        <p class="western" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
        city 		________________________ state _______
        </p>
        <p class="western" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
        telephone 	__________________________
        </p>
        <p class="western" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
        <br/>

        </p>
        <p class="western" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
        2. name 	___________________________________
        </p>
        <p class="western" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
        address		 _________________________________
        </p>
        <p class="western" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
        city		 ________________________ state _______
        </p>
        <p class="western" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
        telephone 	__________________________</p>
        <p  style="margin-bottom: 0in; "><br/>

        </p>

        <p  style="margin-left: 0.19in; text-indent: -0.19in; margin-top: 0.13in; margin-bottom: 0.13in;  text-align:center;">
        <span size="2" style="font-size: 10pt"><span size="4" style="font-size: 14pt"><b>PART
        II</b></span></span></p>
        <p  style="margin-bottom: 0.13in;  text-align:center;"><span size="2" style="font-size: 10pt"><span size="3" style="font-size: 12pt"><b>INSTRUCTION
        DIRECTIVE (LIVING WILL)</b></span></span></p>

        <p class="western"  style="margin-bottom: 0in; border: 1px solid #00000a; padding: 0.05in 0.06in; ">
        I understand that as a competent adult I have the right to make
        decisions about my health care. There may come a time when I am
        unable, due to physical or mental incapacity, to make my own health
        care decisions. In these circumstances, those caring for me will need
        direction concerning my care and they will require information about
        my values and health care wishes. In order to provide the guidance
        and authority needed to make decisions on my behalf:</p>

        <ol type="A">
        <li>
        <p  style="margin-bottom: 0.08in;  orphans: 0; widows: 0; margin-top: 0;">
        <span face="Calibri, serif">
          <span style="font-family:'Times New Roman, serif'">I,</span>
          <span style="font-family:'Times New Roman, serif'"></span>

          <span>

            <span style="font-family:'Times New Roman, serif'">
                <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
            </span>

            <span style="font-family:'Times New Roman, serif'">hereby declare and
            make known to my family, physician, and others, my instructions and
            wishes for my future health care. I direct that all health care
            decisions, including decisions to accept or refuse any treatment,
            service or procedure used to diagnose, treat or care for my physical
            or mental condition and decisions to provide, withhold or withdraw
            life-sustaining measures, be made in accordance with my wishes as
            expressed in this document. This instruction directive shall take
            effect in the event I become unable to make my own health care
            decisions, as determined by the physician who has primary
            responsibility for my care, and any necessary confirming
            determinations. I direct that this document become part of my
            permanent medical records.</span>
          </span>
        </span>
        </p>
          </li>
          </ol>


    </div>

    {{--
    <div *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null"
    style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
    Advance Health Care Directive <span style="text-transform: capitalize">{{userDetails.tellUsAboutYou.fullname}}</span><br>
      Page 3 of 9
    </div>

    <div *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null" style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
      Advance Health Care Directive CLIENT FIRST NAME CLIENT MIDDLE NAME CLIENT LAST NAME<br>
      Page 3 of 9
    </div>
    --}}
</div>


<div>
  <div style="page-break-after: always;">
    <p  style="margin-bottom: 0in;  text-align:center;"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><u><b>Statement
      of My Wishes Concerning My Future Health Care</b></u></span></span></p>
      <p  style="margin-bottom: 0in; "><br/>

      </p>
      <p class="western"  style="margin-bottom: 0in; ">
      <i>In this Section, you are asked to provide instructions concerning
      your future health care. This will require making important and
      perhaps difficult choices. Before completing your directive, you
      should discuss these matters with your doctor, family members or
      others who may become responsible for your care. </i>
      </p>
      <p class="western"  style="margin-bottom: 0in; ">
      <br/>

      </p>
      <p class="western"  style="margin-bottom: 0in; ">
      <i>In Section B and C, you may state the circumstances in which
      various forms of medical treatment, including life-sustaining
      measures, should be provided, withheld or discontinued. If the
      options and choices below do not fully express your wishes, you
      should use Section D, and/or attach a statement to this document
      which would provide those responsible for your care with additional
      information you think would help them in making decisions about your
      medical treatment. Please familiarize yourself with all sections of
      Part One before completing your directive.</i></p>
      <p  style="margin-bottom: 0in; "><br/>

      </p>
      <ol type="A" start="2">
      <li>
      <p  style="margin-bottom: 0in; ">
      <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>GENERAL
      INSTRUCTIONS: </b></span><span size="3" style="font-size: 12pt"> </span><span size="3" style="font-size: 12pt">To
      inform those responsible for my care of my specific wishes, I make
      the following statement of personal views regarding my health care: </span></span>
      </p>
      </li>
      </ol>

      <p  style="margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>Initial
      ONE of the following two statements with which you agree:</b></span></span></p>

      <ol>
      <li>
      <p  style="margin-bottom: 0in; ">
      <span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">_____
      I direct that all medically appropriate measures be provided to
      sustain my life, regardless of my physical or mental condition </span></span>
      </p>
      </li>
      </ol>

      <p class="western"  style="margin-bottom: 0in; ">
      OR</p>

      <ol start="2">
      <li>
      <p  style="margin-bottom: 0in; ">
      <span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">_____
      There are circumstances in which I would not want my life to be
      prolonged by further medical treatment. In these circumstances,
      life-sustaining measures should not be initiated and if they have
      been, they should be discontinued. I recognize that this is likely
      to hasten my death. In the following, I specify the circumstances in
      which I would choose to forego life-sustaining measures.</span></span></p>
      </li>
      </ol>

      <p class="western"  style="margin-left: 0.5in; margin-bottom: 0in; ">
      <i><b>If you have initialed statement 2 immediately above, please
      initial each of the statements (a, b, c) with which you agree: </b></i>
      </p>

      <ol type="a">
      <li>
      <p  style="margin-bottom: 0in; ">
      <span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">______
      I realize that there may come a time when I am diagnosed as having
      an incurable and irreversible illness, disease, or condition. If
      this occurs, and my attending physician and at least one additional
      physician who has personally examined me determine that my condition
      is terminal, I direct that life-sustaining measures which would
      serve only to artificially prolong my dying be withheld or
      discontinued. I also direct that I be given all medically
      appropriate care necessary to make me comfortable and to relieve
      pain. </span></span>
      </p>
      </li>
      </ol>
  </div>
  {{--
  <div *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null"
    style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
    Advance Health Care Directive <span style="text-transform: capitalize">{{userDetails.tellUsAboutYou.fullname}}</span><br>
      Page 4 of 9
    </div>

    <div *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null" style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
      Advance Health Care Directive CLIENT FIRST NAME CLIENT MIDDLE NAME CLIENT LAST NAME<br>
      Page 4 of 9
    </div>
    --}}
</div>


<div class="docPage" style="margin: 0; box-sizing: border-box; padding: 0px;">
    <div class="docPageInner" style="box-sizing: border-box; height: 875px; page-break-after: always;">
      <p class="western"  style="margin-left: 1in; margin-bottom: 0in; ">
        <i><b>In the space provided, write in the bracketed phrase with which
        you agree:</b></i>
        </p>

        <p class="western"  style="margin-left: 1in; margin-bottom: 0in; ">
        To me, terminal condition means that my physicians have determined
        that: (Initial ONE choice below)</p>

        <p class="western"  style="margin-left: 1.5in; margin-bottom: 0in; ">
        ______ (i) I will die within a few days,
        </p>
        <p class="western"  style="margin-left: 1.5in; margin-bottom: 0in; ">
        ______ (ii) I will die within a few weeks, OR
        </p>
        <p class="western"  style="margin-left: 1.5in; margin-bottom: 0in; ">
        ______ (iii) I have a life expectancy of approximately 6 months or
        less
        </p>
        <p class="western"  style="margin-left: 1.5in; margin-bottom: 0in; ">
        ______ (iv) I have a life expectancy of approximately 1 year or less
        </p>
        <p class="western"  style="margin-left: 0.75in; margin-bottom: 0in; ">
        <br/>

        </p>
        <p class="western"  style="margin-left: 0.75in; margin-bottom: 0in; ">
        <b>OR</b></p>

        <ol type="a" start="2">
        <li>
        <p  style="margin-bottom: 0in; ">
        <span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">______
        If there should come a time when I come </span><span style="font-family:'Times New Roman, serif'"><b>permanently
        unconscious</b></span><span style="font-family:'Times New Roman, serif'">, and it
        is determined by my attending physician and at least one additional
        physician with appropriate expertise who has personally examined me,
        that I have totally and irreversibly lost consciousness and my
        capacity for interaction with other people and my surroundings, I
        direct that life-sustaining measures be withheld or discontinued. I
        understand that I will not experience pain or discomfort in this
        condition, and I direct that I be given all my medically appropriate
        care necessary to provide for my personal hygiene and dignity.</span></span></p>
        </li>
        </ol>

        <p class="western"  style="margin-left: 0.75in; margin-bottom: 0in; ">
        <b>OR </b>
        </p>

        <ol type="a" start="3">
        <li>
        <p  style="margin-bottom: 0in; ">
        <span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">______
        I realize that there may come a time when I am diagnosed as having
        an </span><span style="font-family:'Times New Roman, serif'"><b>incurable and
        irreversible</b></span><span style="font-family:'Times New Roman, serif'"> illness,
        disease, or condition which may not be terminal. My condition may
        cause me to experience severe and progressive physical or mental
        deterioration and/or a permanent loss of capacities and faculties I
        value highly. If, in the course of my medical care, the burdens of
        continued life with treatment become greater than the benefits I
        experience, I direct that life-sustaining measures be withheld or
        discontinued. I also direct that I be given all medically
        appropriate care necessary to make me comfortable and to relieve
        pain. </span></span>
        </p>
        </li>
        </ol>

        <p  style="margin-left: 1.25in; margin-bottom: 0in; ">
        <span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">(</span><span style="font-family:'Times New Roman, serif'"><i>Paragraph
        c. covers a wide range of possible situations in which you may have
        experienced partial or complete loss of certain mental and physical
        capacities you value highly. If you wish, in the space provided below
        you may specify in more detail the conditions in which you would
        choose to forego life-sustaining measures. You might include a
        description of the faculties or capacities, which, if irretrievably
        lost would lead you to accept death rather than continue living. You
        may want to express any special concerns you have about particular
        medical conditions or treatments, or any other considerations which
        would provide further guidance to those who may become responsible
        for your care. If necessary, you may attach a separate statement to
        this document or use Section D to provide additional instructions.)</i></span><span style="font-family:'Times New Roman, serif'">
        </span></span>
        </p>
    </div>

    {{--
    <div *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null"
    style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
    Advance Health Care Directive <span style="text-transform: capitalize">{{userDetails.tellUsAboutYou.fullname}}</span><br>
      Page 5 of 9
    </div>

    <div *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null" style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
      Advance Health Care Directive CLIENT FIRST NAME CLIENT MIDDLE NAME CLIENT LAST NAME<br>
      Page 5 of 9
    </div>
    --}}
</div>


<div>
    <div style="page-break-after: always;">
      <p  style="margin-left: 1.25in; margin-bottom: 0in; ">
        <span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">Examples
        of conditions which I find unacceptable are: </span></span>
        </p>

        <p  style="margin-left: 1.25in; margin-bottom: 0in; line-height: 150%">
        <span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">________________________________________________</span></span></p>
        <p  style="margin-left: 1.25in; margin-bottom: 0in; line-height: 150%">
        <span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">________________________________________________</span></span></p>
        <p  style="margin-left: 1.25in; margin-bottom: 0in; line-height: 150%">
        <span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">________________________________________________</span></span></p>
        <p  style="margin-left: 1.25in; margin-bottom: 0in; line-height: 150%">
        <span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">________________________________________________</span></span></p>
        <p  style="margin-left: 1.25in; margin-bottom: 0in; line-height: 150%">
        <span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">________________________________________________</span></span></p>

        <p  style="margin-bottom: 0in; "><br/>

        </p>
        <ol type="A" start="3">
        <li>
        <p  style="margin-bottom: 0in; ">
        <span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'"><b>SPECIFIC
        INSTRUCTIONS: Artificially Provided Fluids and Nutrition;
        Cardiopulmonary Resuscitation (CPR).</b></span><span style="font-family:'Times New Roman, serif'">
        </span><span style="font-family:'Times New Roman, serif'"><i>Previously above, you
        provided general instructions regarding life-sustaining measures.
        Here you are asked to give specific instructions regarding two types
        of life-sustaining measures-artificially provided fluids and
        nutrition and cardiopulmonary resuscitation.</i></span><span style="font-family:'Times New Roman, serif'">
        </span></span>
        </p>
        </li>
        </ol>
        <p class="western" style="margin-left: 0.25in; margin-bottom: 0in; ">
        <br/>

        </p>
        <p class="western" style="margin-left: 0.25in; margin-bottom: 0in; ">
        <b>In the space provided, INITIAL the choice with which you agree: </b>
        </p>

        <ol>
        <li>
        <p style="margin-bottom: 0in; "><span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">In
        the circumstances I initialed previously above (in my choice a, b,
        or c in Section B “General Instructions”), I also direct that
        artificially provided fluids and nutrition, such as by feeding tube
        or intravenous infusion, </span></span>
        </p>
        </li>
        </ol>

        <p  style="margin-left: 0.5in; text-indent: 0.5in; margin-bottom: 0in; ">
        <span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">______
        (i) be withheld or withdrawn and that I be allowed to die</span></span></p>
        <p  style="margin-left: 0.5in; text-indent: 0.5in; margin-bottom: 0in; ">
        <br/>

        </p>
        <p  style="margin-left: 0.5in; text-indent: 0.5in; margin-bottom: 0in; ">
        <span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'"><b>OR</b></span></span></p>

        <p  style="margin-left: 0.5in; text-indent: 0.5in; margin-bottom: 0in; ">
        <span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">______
        (ii) be provided to the extent medically appropriate</span></span></p>

        <p style="margin-left: 0.25in; margin-bottom: 0in; ">
        <span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">2.</span>
        <span style="font-family:'Times New Roman, serif'">In the circumstances I initialed
        previously above (in my choice a, b, or c in Section B “General
        Instructions”)</span>, if I should suffer a cardiac arrest, I also
        direct that cardiopulmonary resuscitation (CPR) </span>
        </p>

        <p  style="margin-left: 0.5in; text-indent: 0.5in; margin-bottom: 0in; ">
        <span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">______
        (i) not be provided and that I be allowed to die</span></span></p>

        <p  style="margin-left: 0.5in; text-indent: 0.5in; margin-bottom: 0in; ">
        <span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'"><b>OR</b></span></span></p>
        <p  style="margin-left: 0.5in; text-indent: 0.5in; margin-bottom: 0in; ">
        <span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">______
        (ii) be provided to preserve my life, unless medically inappropriate
        or futile</span></span></p>
    </div>

    {{--
    <div *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null"
    style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
    Advance Health Care Directive <span style="text-transform: capitalize">{{userDetails.tellUsAboutYou.fullname}}</span><br>
      Page 6 of 9
    </div>

    <div *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null" style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
      Advance Health Care Directive CLIENT FIRST NAME CLIENT MIDDLE NAME CLIENT LAST NAME<br>
      Page 6 of 9
    </div>
    --}}
</div>


<div>
    <div style="page-break-after: always;">
      <p class="western"  style="margin-left: 0.25in; margin-bottom: 0in; ">
        3. If neither of the above statements adequately expresses your
        wishes concerning artificially provided fluids and nutrition or CPR,
        please explain your wishes below:</p>
        <p  style="margin-left: 1.25in; margin-bottom: 0in; line-height: 150%">
        <span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">________________________________________________</span></span></p>
        <p  style="margin-left: 1.25in; margin-bottom: 0in; line-height: 150%">
        <span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">________________________________________________</span></span></p>
        <p  style="margin-left: 1.25in; margin-bottom: 0in; line-height: 150%">
        <span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">________________________________________________</span></span></p>
        <p  style="margin-left: 1.25in; margin-bottom: 0in; line-height: 150%">
        <span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">________________________________________________</span></span></p>
        <p style="margin-left: 0.25in; margin-bottom: 0in; ">
        <br/>

        </p>

        <p  style="margin-bottom: 0in; "><span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">D)
        </span><span style="font-family:'Times New Roman, serif'"><b>ADDITIONAL
        INSTRUCTIONS:</b></span><span style="font-family:'Times New Roman, serif'"> </span><span style="font-family:'Times New Roman, serif'"><i>(You
        should provide any additional information about your health care
        preferences which is important to you and which may help those
        concerned with your care to implement your wishes. You may wish to
        direct your family members or your health care providers to consult
        with others, or you may wish to direct that your care be provided by
        a particular physician, hospital, nursing home, or at home. If you
        are or believe you may become pregnant, you may wish to state
        specific instructions. If you need more space than is provided here
        you may attach an additional statement to this directive.)</i></span></span></p>
        <p style="margin-bottom: 0in; "><br/>

        </p>
        <p style="margin-bottom: 0in; "><span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'"> ________________________________________________________________________ ________________________________________________________________________ ________________________________________________________________________</span></span></p>
        <p style="margin-bottom: 0in; "><span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">________________________________________________________________________ ________________________________________________________________________ ________________________________________________________________________</span></span></p>
        <p  style="margin-bottom: 0in; "><br/>

        </p>

        <p class="western"  style="margin-bottom: 0in; ">
        E) 	<b>BRAIN DEATH:</b> (The State of New Jersey recognizes the
        irreversible cessation of all functions of the entire brain,
        including the brain stem (also known as whole brain death), as a
        legal standard for the declaration of death. However, individuals who
        cannot accept this standard because of their personal religious
        beliefs may request that it not be applied in determining their
        death.)
        </p>

        <p class="western"  style="text-indent: 0.5in; margin-bottom: 0in; ">
        <b>Initial the following statement only if it applies to you: </b>
        </p>

        <p style="margin-left: 0.5in; margin-bottom: 0in; "><span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">______
        To declare my death on the basis of the whole brain death standard
        would violate my personal religious beliefs. I therefore wish my
        death to be declared solely on the basis of the traditional criteria
        of irreversible cessation of cardiopulmonary (heartbeat and
        breathing) function.</span></span></p>
        <p  style="margin-bottom: 0in; "><br/>

        </p>

        <p class="western"  style="margin-bottom: 0in; ">
        F) 	<b>AFTER DEATH - ANATOMICAL GIFTS: </b><i>(It is now possible to
        transplant human organs and tissue in order to save and improve the
        lives of others. Organs, tissues and other body parts are also used
        for therapy, medical research and education. This section allows you
        to indicate your desire to make an anatomical gift and if so, to
        provide instructions for any limitations or special uses.) </i>
        </p>
    </div>

    {{--
    <div *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null"
    style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
    Advance Health Care Directive <span style="text-transform: capitalize">{{userDetails.tellUsAboutYou.fullname}}</span><br>
      Page 7 of 9
    </div>
    <div *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null" style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
      Advance Health Care Directive CLIENT FIRST NAME CLIENT MIDDLE NAME CLIENT LAST NAME<br>
      Page 7 of 9
    </div>
    --}}
</div>


<div>
    <div style="page-break-after: always;">
      <p class="western"  style="text-indent: 0.5in; margin-bottom: 0in; margin-top: 0;">
        <b>Initial the statements which express your wishes: (OPTIONAL)</b></p>

        <ol>
        <li>
        <p style="margin-bottom: 0in; "> <span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">______
        I do not wish to make an anatomical upon my death.\</span></span></p>
        </li>
        </ol>

        <p class="western" style="margin-bottom: 0in; "><b>OR</b></p>

        <ol start="2">
        <li>
        <p style="margin-bottom: 0in; "><span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">______
        I wish to make the following anatomical gift to take effect upon my
        death: </span></span>
        </p>
        </li>
        </ol>

        <ol type="A">
        <li>
        <p style="margin-bottom: 0in; "><span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">______
        Any needed organs or body parts</span></span></p>
        </li>
        <li>
        <p style="margin-bottom: 0in; "><span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">______
        Only the following organs or parts, for the purposes of
        transplantation, therapy, medical research or education:</span></span></p>
        </li>
        </ol>
        <p  style="margin-left: 2.5in; margin-bottom: 0in; line-height: 0.16in">
        <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">___________________________________________</span></span></p>
        <p  style="margin-left: 2.5in; margin-bottom: 0in; line-height: 0.16in">
        <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">___________________________________________</span></span></p>
        <p  style="margin-left: 2.5in; margin-bottom: 0in; line-height: 0.16in">
        <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">___________________________________________</span></span></p>

        <ol type="A" start="3">
        <li>
        <p style="margin-bottom: 0in; "><span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">______My
        body for anatomical study, if needed.</span></span></p>
        </li>
        <li>
        <p style="margin-bottom: 0in; "><span face="Calibri, serif"><span style="font-family:'Times New Roman, serif'">______
        Special limitations, if any:</span></span></p>
        </li>
        </ol>
        <p  style="margin-left: 2.5in; margin-bottom: 0in; line-height: 0.16in">
        <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">___________________________________________</span></span></p>
        <p  style="margin-left: 2.5in; margin-bottom: 0in; line-height: 0.16in">
        <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">___________________________________________</span></span></p>
        <p  style="margin-left: 2.5in; margin-bottom: 0in; line-height: 0.16in">
        <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">___________________________________________</span></span></p>

        <p class="western"  style="margin-bottom: 0in; ">
        <br/>

        </p>
        <p class="western"  style="margin-bottom: 0in;  text-align:center;">
        <span size="4" style="font-size: 14pt"><b>PART III – SIGNATURE AND
        ACKNOWLEDGMENTS</b></span></p>

        <p class="western"  style="margin-bottom: 0in; ">
        By writing this Advance Directive for Health Care, I inform those who
        may become entrusted with my care of my health care wishes and intend
        to ease the burdens of decision making which this responsibility may
        impose.  I understand the purpose and effect of this document and
        sign it knowingly, voluntarily and after careful deliberation</p>


        <p class="western"  style="margin-bottom: 0in; ">
        Signed this _____________ day of ______________, ______.
        </p>
        <p class="western" style="margin-bottom: 0in; "><br/>

        </p>

        <p  style="margin-left: 0.5in; margin-bottom: 0in; ">
        <span ><span size="3" style="font-size: 12pt">_______________________________________</span></span></p>
        <p class="western"  style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
          <span>
              <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
          </span>
        </p>
        <p  style="margin-left: 0.5in; margin-bottom: 0in; ">
        <span>
          <span>
              <span style="font-family:'Times New Roman, serif'" >{{$tellUsAboutYou['address']}}</span>
          </span>
        </span>
        </p>
        <p  style="margin-left: 0.5in; margin-bottom: 0in; ">


        <p style="margin-left: 0.5in; margin-bottom: 0in; ">
        <span><span><span ><span size="3" style="font-size: 12pt"></span></span>

        <span style="text-transform: capitalize" style="font-family:'Times New Roman, serif'">{{$tellUsAboutYou['city']}}</span>


        <span style="text-transform: capitalize" style="font-family:'Times New Roman, serif'">{{$tellUsAboutYou['state']}}</span>&nbsp;

        <span ><span size="3" style="font-size: 12pt"></span></span><span ><span size="3" style="font-size: 12pt">&nbsp;
        </span></span><span ><span size="3" style="font-size: 12pt"></span></span>

        <span style="font-family:'Times New Roman, serif'">{{$tellUsAboutYou['zip']}}, </span>

        <span ><span size="3" style="font-size: 12pt"></span></span></span></span></p>
    </div>
    {{--
    <div *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null"
    style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
    Advance Health Care Directive <span style="text-transform: capitalize">{{userDetails.tellUsAboutYou.fullname}}</span><br>
      Page 8 of 9
    </div>

    <div *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null" style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
      Advance Health Care Directive CLIENT FIRST NAME CLIENT MIDDLE NAME CLIENT LAST NAME<br>
      Page 8 of 9
    </div>
    --}}
  </div>


<div>
    <div>
      <p  style="margin-bottom: 0in;  text-align:center;"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>WITNESS
        ACKNOWLEDGMENTS</b></span></span></p>
        <p  style="margin-bottom: 0in; "><br/>

        </p>
        <p class="western"  style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
        <span >I declare that </span><b></b>

        <span>
            <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>

        </span>

        <span>, signed the
        foregoing document in my presence, or asked another to sign this
        document on</span>

        <span>{{$genderTxt4}}</span>

        <span >behalf, and that </span>

        <span>{{$genderTxt3}}</span>

        <span> is personally known
        to me, and that </span>

        <span>{{$genderTxt3}}</span>

        <span >appears to be of sound
        mind and free of duress or undue influence. I am 18 years of age or
        older, and am not designated by this or any other document as the
        person’s health care representative, nor as an alternate health
        care representative.</span></p>
        <p  style="margin-bottom: 0in; "><br/>

        </p>

        <p class="western"  style="margin-bottom: 0.06in; ">
        <span ><b>WITNESS 1</b></span><span >:
        ________________________________	Dated: ___________________</span></p>
        <p class="western"  style="margin-bottom: 0.06in; ">
        <span >[signature]</span></p>

        <p class="western"  style="margin-bottom: 0.06in; ">
        <span >____________________________________</span></p>
        <p class="western"  style="margin-bottom: 0.06in; ">
        <span >	[name printed]</span></p>

        <p class="western"  style="margin-bottom: 0.06in; ">
        <span >____________________________________</span></p>
        <p class="western"  style="margin-bottom: 0.06in; ">
        <span >	[street address]</span></p>

        <p class="western"  style="margin-bottom: 0.06in; ">
        <span >____________________________________</span></p>
        <p class="western"  style="margin-bottom: 0.06in; ">
        <span >	[city, state]</span></p>
        <p class="western"  style="margin-bottom: 0.06in; ">
        <br/>

        </p>

        <p class="western"  style="margin-bottom: 0.06in; ">
        <span ><b>WITNESS 2:
        </b></span><span >________________________________	Dated:
        ___________________</span></p>
        <p class="western"  style="margin-bottom: 0.06in; ">
        <span >[signature]</span></p>

        <p class="western"  style="margin-bottom: 0.06in; ">
        <span >____________________________________</span></p>
        <p class="western"  style="margin-bottom: 0.06in; ">
        <span >	[name printed]</span></p>

        <p class="western"  style="margin-bottom: 0.06in; ">
        <span >____________________________________</span></p>
        <p class="western"  style="margin-bottom: 0.06in; ">
        <span >	[street address]</span></p>

        <p class="western"  style="margin-bottom: 0.06in; ">
        <span >____________________________________</span></p>
        <p class="western"  style="margin-bottom: 0.06in; ">
        <span >	[city, state]</span></p>
    </div>

    {{--
    <div *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null"
    style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
    Advance Health Care Directive <span style="text-transform: capitalize">{{userDetails.tellUsAboutYou.fullname}}</span><br>
      Page 9 of 9
    </div>

    <div *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null" style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
      Advance Health Care Directive CLIENT FIRST NAME CLIENT MIDDLE NAME CLIENT LAST NAME<br>
      Page 9 of 9
    </div>
    --}}
  </div>
</div>

</body>
</html>
