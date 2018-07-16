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
      Advance Health Care Directive of <br>{{$tellUsAboutYou['fullname']}}<br>
    </div>
  </div>
<div>


        <!-- Page 1 -->
        <div class="docPage">
          <div class="docPageInner">
            <p align="center" style="margin-bottom: 0in; line-height: 0.28in; page-break-before: auto; page-break-after: auto">
              <span  style="font-size: 17pt"><b>COLORADO MEDICAL DURABLE</b></span></p>
            <p align="center" style="margin-bottom: 0in; line-height: 0.28in"><span  style="font-size: 17pt"><b>POWER
              OF ATTORNEY FOR HEALTH CARE </b></span>
            </p>

            <p align="center" style="margin-bottom: 0in; line-height: 0.28in"><span  style="font-size: 17pt"><b>AND
              ADVANCE DIRECTIVE FOR </b></span>
            </p>

            <p align="center" style="margin-bottom: 0in; line-height: 0.28in"><span  style="font-size: 17pt"><b>MEDICAL
              / SURGICAL TREATMENT</b></span></p>
            <p align="center" style="margin-bottom: 0.13in; line-height: 0.33in">————————————</p>
            <p align="center" style="margin-bottom: 0in; line-height: 0.23in"><span  style="font-size: 13pt"><b>PART
              ONE.  MEDICAL DURABLE POWER OF ATTORNEY.</b></span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff">

              	<span color="#000000">I,
              		<span> {{$tellUsAboutYou['fullname']}} </span> hereby appoint my

	              	@if(strtolower($healthFinance['relation']) == 'other')
	      				<span style="font-family:'Times New Roman, serif'">{{ucwords(strtolower($healthFinance['relationOther']))}}, </span>
	      			@else
	      				<span style="font-family:'Times New Roman, serif'">{{ucwords(strtolower($healthFinance['relation']))}}, </span>
	      			@endif
          		</span>

          		<span> {{ucwords(strtolower($healthFinance['fullname']))}} </span>,
                of <span> {{$healthFinance['address']}} </span> in <span> {{ucwords(strtolower($healthFinance['city']))}} ,</span>
                <span> {{ucwords(strtolower($healthFinance['state']))}} </span>
              <span> {{$healthFinance['zip']}} </span>
              (Tel: <span> {{$healthFinance['phone']}} </span>), as my
              agent to make health care decisions for me if and when I am unable to
              make my own health care decisions. This gives my agent the power to
              consent to giving, withholding or stopping any health care treatment,
              service or diagnostic procedure. My agent also has the authority to
              talk with health care personnel, get information and sign forms
              necessary to carry out those decisions.  </span></span></span></span>
            </p>

            <p style="margin-bottom: 0in; line-height: 115%">

            </p>

            @if($healthFinance['anyBackupAgent'] == 'true')
	            <p style="margin-bottom: 0in; line-height: 115%">
	            	If said agent is not available, or is unable or unwilling to act, or if I revoke this
	              appointment or authority to act, then I designate my

		            @if(strtolower($healthFinance['backupRelation']) == 'other')
		            	<span style="font-family:'Times New Roman, serif'">{{ucwords(strtolower($healthFinance['backupRelationOther']))}}, </span>
		          	@else
		            	<span style="font-family:'Times New Roman, serif'">{{ucwords(strtolower($healthFinance['backupRelation']))}}, </span>
		          	@endif

	              <span> {{ucwords(strtolower($healthFinance['backupFullname']))}} ,</span>
	              of  <span> {{$healthFinance['backupAddress']}} </span> in
	              <span> {{ucwords(strtolower($healthFinance['backupCity']))}} ,</span>
	              <span> {{ucwords(strtolower($healthFinance['backupState']))}} </span>
	              <span> {{$healthFinance['backupZip']}} </span>

	              (Tel: <span> {{$healthFinance['backupphone']}} </span>) as my
	              alternate agent to make health care decisions for me as authorized by
	              this document.&nbsp;
	          	</p>

	            <p style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in; line-height: 115%">


	            </p>
            @endif

            <p style="margin-bottom: 0in; line-height: 115%">By this document I
              intend to create a Medical Durable Power of Attorney which shall take
              effect upon my incapacity to make my own health care decisions and
              shall continue during that incapacity.
            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">When making health
              care decisions for me, my agent should think about what action would
              be consistent with past conversation we have had, my treatment
              preferences as expressed in Part Two (if I have filled out Part Two),
              my religious and other beliefs and values, and how I have handled
              medical and other important issues in the past.  If what I would
              decide is still unclear, then my health care agent should make
              decisions for me that my health care agent believes are in my best
              interest, considering the benefits, burden, and risks of my current
              circumstances and treatment options.</p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">Additional
              Instructions:</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">________________________________________________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">________________________________________________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">________________________________________________________________________</span></span></span></span></span></p>
            <p align="center" style="margin-bottom: 0in; line-height: 115%"><i>(Add
              additional sheets if necessary.)</i></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
          </div>

          {{--
          <div *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null"
          style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
          Medical Durable Power of Attorney, Living Will, and Advance Directive by <br><span style="text-transform: capitalize">{{userDetails.tellUsAboutYou.fullname}}</span><br>
            Page 1 of 7
          </div>

          <div *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null" style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
              Medical Durable Power of Attorney, Living Will, and Advance Directive by <br>  CLIENT FIRST NAME CLIENT MIDDLE NAME CLIENT LAST NAME<br>
            Page 1 of 7
          </div>
          --}}

        </div>
        <!-- !Page 1 -->

        <!-- Page 2 -->
        <div class="docPage">
            <div class="docPageInner">
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000"><b>Revocation:
               </b>I revoke any prior medical power of attorney.</span></span></span></span></span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%"><b>HIPAA Waiver:</b>
              My agent shall have the following authority to request, review, and
              receive any information, verbal or written, regarding my physical or
              mental health, including, but not limited to, all of my individually
              identifiable health information and health care facility records.
              This release authority applies to any information governed by the
              Health Insurance Portability and Accountability Act of 1996 (HIPAA),
              42 U.S.C. 1320d and 45 CFR 160-164. I hereby authorize any physician,
              health care professional, dentist, health plan, hospital, clinic,
              laboratory, pharmacy, or other covered health care provider, any
              insurance company, and the Medical Information Bureau, Inc. or other
              health care clearinghouse that has provided treatment or services to
              me, or that has paid for or is seeking payment from me for such
              services, to give, disclose, and release to my agent, without
              restriction, all of my individually identifiable health information
              and medical records regarding any past, present, or future medical or
              mental health condition. This authority given my agent shall
              supersede any other agreement which I may have made with my health
              care providers to restrict access to or disclosure of my individually
              identifiable health information. This authority given my agent shall
              be effective immediately, has no expiration date and shall expire
              only in the event that I revoke the authority in writing and deliver
              it to my health care provider.</p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p align="center" style="margin-bottom: 0in; line-height: 0.23in"><span  style="font-size: 13pt"><b>PART
              TWO.  DECLARATION (LIVING WILL).</b></span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in"><i>(This
              form may be used to make your wishes known about what medical
              treatment or other care you would or would not want if you become too
              sick to speak for yourself. You are not required to have an advance
              directive. If you do have an advance directive, be sure that your
              doctor, family, and friends know you have one and know where it is
              located).</i></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-top: 0.09in; margin-bottom: 0.09in; line-height: 115%">
              <b><u>Definitions</u>:</b></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 100%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000"><i>Life-Sustaining
              Procedure</i><b>: </b>Any medical procedure or intervention that, if
              administered to a qualified patient, would serve only to prolong the
              dying process. &quot;Life-sustaining procedure&quot; shall not
              include any medical procedure or intervention for nutrition and
              hydration of the qualified patient or considered necessary by the
              attending physician to provide comfort or alleviate pain. However,
              artificial nutrition and hydration may be withdrawn or withheld
              pursuant to §15-18-104(3), C.R.S.</span></span></span></span></span></p>
            <p style="margin-bottom: 0.06in; line-height: 115%">


            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000"><i>Persistent
              Vegetative State</i>: A medical state in which an attending physician
              and another doctor, qualified to make such diagnosis, agree that
              within a reasonable degree of medical probability the patient can no
              longer think, feel anything, knowingly move, or be aware of being
              alive. The physicians must agree this condition will last
              indefinitely without hope for improvement and have monitored the
              patient long enough to make that decision. &quot;Persistent
              Vegetative State&quot; is defined by reference to the criteria and
              definitions employed by prevailing community medical standards of
              practice, and not by the definition above.</span></span></span></span></span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">
            </p>
          </div>

          {{--
          <div *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null"
          style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
          Medical Durable Power of Attorney, Living Will, and Advance Directive by <br><span style="text-transform: capitalize">{{userDetails.tellUsAboutYou.fullname}}</span><br>
            Page 2 of 7
          </div>

          <div *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null" style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
              Medical Durable Power of Attorney, Living Will, and Advance Directive by <br>  CLIENT FIRST NAME CLIENT MIDDLE NAME CLIENT LAST NAME<br>
            Page 2 of 7
          </div>
          --}}

        </div>
        <!-- !Page 2 -->

        <!-- Page 3 -->
        <div class="docPage">
            <div class="docPageInner">
            <p style="margin-bottom: 0in; line-height: 115%"><i>Terminal
              Condition</i>: An incurable or irreversible condition for which the
              administration of life sustaining procedures will serve only to
              postpone the moment of death.</p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">I,
              <span> {{$tellUsAboutYou['fullname']}} </span>,
              being of sound mind and at least eighteen years of age, direct
              that my life shall not be artificially prolonged under the
              circumstances set forth below and hereby declare that: </span></span></span></span></span>
            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">If at any time my
              attending physician and one other qualified physician certify in
              writing that: (a.) I have an injury, disease, or illness which is a
              terminal condition for which the administration of life-sustaining
              procedures will only serve to prolong the dying process and I am
              unable to make health care decisions, or (b.) I am in a persistent
              vegetative state, I direct that my agent shall comply with the
              following directives in making health care choices on my behalf:</p>
            <p style="margin-left: 0.38in; margin-bottom: 0in; line-height: 115%">


            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <ol type="A">
              <li>
              <p style="margin-bottom: 0in; line-height: 115%"><b>LIFE
                SUSTAINING PROCEDURES – I direct that, in accordance with Colorado
                law, life-sustaining procedures shall be: <i>(initial only the
                  option that applies)</i></b></p>
              </li>
            </ol>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">[&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Initials)
              I direct that life-sustaining procedures shall be withdrawn and/or
              withheld pursuant to the terms of this declaration, it being
              understood that life-sustaining procedures shall not include any
              medical procedure or intervention for nourishment considered
              necessary by the attending physician to provide comfort or alleviate
              pain.
            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">or</p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">[&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Initials)
              I direct that life-sustaining procedures shall be continued for a
              period of not less than days, and if there be no change in my
              condition which would indicate to my physicians that my prognosis has
              improved, then I direct that life-sustaining procedures shall be
              withdrawn and/or withheld pursuant to the terms of this declaration,
              it being understood that life-sustaining procedures shall not include
              any medical procedure or intervention for nourishment considered
              necessary by the attending physician to provide comfort or alleviate
              pain.
            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">or</p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">[&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Initials)
              I direct that life-sustaining procedures shall be continued
              indefinitely, regardless of my prognosis.</p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <ol type="A" start="2">
              <!--<li/>-->
              <p align="left" style="margin-bottom: 0in; line-height: 115%"><b>ARTIFICIAL
                NOURISHMENT – In the event that the only procedure I am being
                provided is artificial nourishment, I direct that one of the
                following actions be taken: <i>(initial the option that applies) </i></b>
              </p>
            </ol>
            <p align="left" style="margin-bottom: 0in; line-height: 115%">

            </p>
          </div>

          {{--
          <div *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null"
          style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
          Medical Durable Power of Attorney, Living Will, and Advance Directive by <br><span style="text-transform: capitalize">{{userDetails.tellUsAboutYou.fullname}}</span><br>
            Page 3 of 7
          </div>

          <div *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null" style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
              Medical Durable Power of Attorney, Living Will, and Advance Directive by <br>  CLIENT FIRST NAME CLIENT MIDDLE NAME CLIENT LAST NAME<br>
            Page 3 of 7
          </div>
          --}}

        </div>
        <!-- !Page 3 -->


        <!-- Page 4 -->
        <div class="docPage">
            <div class="docPageInner">

            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Initials)
              Artificial nourishment shall not be continued when it is the only
              procedure being provided;</span></span></span></span></span></p>
            <p align="left" style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">or
              </span></span></span></span></span>
            </p>
            <p align="left" style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Initials)
              Artificial nourishment shall be continued for _______ days when it is
              the only procedure being provided; </span></span></span></span></span>
            </p>
            <p align="left" style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">or
              </span></span></span></span></span>
            </p>
            <p align="left" style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Initials)
              Artificial nourishment shall be continued indefinitely when it is the
              only procedure being provided.</span></span></span></span></span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <ol type="A" start="3">
              <!--<li/>-->
              <p align="left" style="margin-top: 0.13in; margin-bottom: 0.09in; line-height: 115%">
                <b>ANATOMICAL GIFTS – I hereby authorize the following acts with
                  regard to donation of my organs, tissue, bone, corneas, and other
                  components of my body: <i>(initial only the option that applies)</i></b></p>
            </ol>
            <p align="left" style="margin-left: 0.5in; margin-top: 0.13in; margin-bottom: 0.09in; line-height: 115%">



            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Initials)
              I wish to be an organ and/or tissue donor, if medically feasible; </span></span></span></span></span>
            </p>
            <p style="margin-bottom: 0.06in; line-height: 115%">


            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">or</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; line-height: 115%">[&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Initials)
              I do not wish to be an organ and/or tissue donor.</p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <ol type="A" start="4">
             <!-- <li/>-->
              <p style="margin-bottom: 0.09in; line-height: 115%"><b>I
                FURTHER DIRECT THAT my agent comply with the following special
                provisions and/or limitations (optional):</b></p>
            </ol>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">If
              you do not have other directions, place your initials here:</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">_______
              No, I do not have any other directions.</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">Otherwise,
              if I am in the condition(s) described above I feel especially
              strongly about the following forms of treatment: <i>(Initial all
              those that apply)</i></span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Initials)
              I <u>do not</u> want cardiopulmonary resuscitation (CPR).</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Initials)
              I <u>do not</u> want mechanical respiration.</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Initials)
              I <u>do not</u> want antibiotics.</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Initials)
              I <u>do</u><b> </b>want maximum pain relief, even if it may hasten my
              death.</span></span></span></span></span></p>
            <p align="left" style="margin-top: 0.06in; margin-bottom: 0.06in; line-height: 115%">



            </p>
            <p align="left" style="margin-top: 0.06in; margin-bottom: 0.06in; line-height: 115%">
              <i>(Other instructions and/or limitations)</i></p>
          </div>

          {{--
          <div *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null"
          style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
          Medical Durable Power of Attorney, Living Will, and Advance Directive by <br><span style="text-transform: capitalize">{{userDetails.tellUsAboutYou.fullname}}</span><br>
            Page 4 of 7
          </div>

          <div *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null" style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
              Medical Durable Power of Attorney, Living Will, and Advance Directive by <br>  CLIENT FIRST NAME CLIENT MIDDLE NAME CLIENT LAST NAME<br>
            Page 4 of 7
          </div>
          --}}

        </div>
        <!-- !Page 4 -->

        <!-- Page 5 -->
        <div class="docPage">
            <div class="docPageInner" style="page-break-after: always;">
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">________________________________________________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">________________________________________________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">________________________________________________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">________________________________________________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">________________________________________________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">________________________________________________________________________</span></span></span></span></span></p>
            <p align="center" style="margin-bottom: 0in; line-height: 115%"><i>(Add
              additional sheets if necessary.)</i></p>
            <p align="left" style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">In the absence of my
              ability to give directions regarding the use of such life-sustaining
              procedures, it is my intention that this declaration shall be honored
              by my agent (if any), family, and physician(s) as the final
              expression of my legal right to refuse medical or surgical treatment
              and accept the consequences from such refusal.</p>
            <p align="left" style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p align="center" style="margin-left: 0.19in; text-indent: -0.19in; margin-top: 0.13in; margin-bottom: 0.09in; line-height: 115%">
              <b>Notification of Interested Parties</b></p>
            <p style="margin-bottom: 0in; line-height: 115%">In the event that I
              have a terminal condition, or I am diagnosed as being in a Persistent
              Vegetative State, <u>in addition</u> to my Agents under My Medical
              Power of Attorney, I direct my medical care providers to notify and
              discuss my medical situation with the individuals listed below. I
              hereby waive any requirements of Public Law 104-191 and supporting
              CFRs, otherwise known as the Health Insurance Portability and
              Accountability Act of 1996, as amended, or HIPAA, concerning release
              of medical information by my medical care providers to these
              individuals. This direction does NOT authorize these individuals to
              make medical decisions on my behalf, unless such person(s) also are
              my Agent under medical power of attorney. (This section shall be
              considered valid regardless of whether or not the categories of
              relationship and telephone number are completed.)</p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Relationship&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telephone
              Number</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">______________________________________________________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">______________________________________________________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; line-height: 115%">______________________________________________________________________________</p>
            <p align="center" style="margin-bottom: 0in; line-height: 115%"><i>(Add
              additional sheets if necessary.)</i></p>
            <p align="center" style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p align="center" style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p align="center" style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p align="center" style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p align="center" style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p align="center" style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p align="center" style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p align="center" style="margin-bottom: 0in; line-height: 115%"><b>[signature
              pages follow]</b></p>
            <p align="center" style="margin-bottom: 0in; line-height: 115%">

            </p>
          </div>

          {{--
          <div *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null"
          style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
          Medical Durable Power of Attorney, Living Will, and Advance Directive by <br><span style="text-transform: capitalize">{{userDetails.tellUsAboutYou.fullname}}</span><br>
            Page 5 of 7
          </div>

          <div *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null" style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
              Medical Durable Power of Attorney, Living Will, and Advance Directive by <br>  CLIENT FIRST NAME CLIENT MIDDLE NAME CLIENT LAST NAME<br>
            Page 5 of 7
          </div>
          --}}

        </div>
        <!-- !Page 5 -->

        <!-- Page 6 -->
        <div class="docPage">
            <div class="docPageInner" style="page-break-after: always;">

            <p align="center" style="margin-bottom: 0in; line-height: 0.23in"><span  style="font-size: 13pt"><b>
              <span lang="en">PART THREE.  EXECUTION.</span></b></span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p align="left" style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">BY
              SIGNING HERE I INDICATE THAT I UNDERSTAND THE PURPOSE AND EFFECT OF
              THIS DOCUMENT. </span></span></span></span></span>
            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">I
              sign my name to this form on this <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>day of
              <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(MONTH)</u>,</span></span></span></span></span></p>
            <p align="left" style="margin-bottom: 0in; line-height: 0.33in"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(YEAR)</u><span style="text-decoration: none">,
              in </span><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><span style="text-decoration: none">
              County in Colorado.</span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="text-indent: 0.5in; margin-bottom: 0in; line-height: 115%"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></p>
            <p style="text-indent: 0.5in; margin-bottom: 0.08in; line-height: 115%">
              <span> {{$tellUsAboutYou['fullname']}} </span>
             </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
            <span style="display: inline-block; border: none; padding: 0in">
              	<span style="font-family:Times New Roman, serif">
              		<span  style="font-size: 12pt">
              		<span style="background: #ffffff">
              			<span> {{$tellUsAboutYou['address']}} </span>
              		</span>
              		</span>
          		</span>
          	</span>
          	</p>

            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
            <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif">

            	<span  style="font-size: 12pt">
            		<span style="background: #ffffff">
            			<span color="#000000">
            				<span>{{ucwords(strtolower($tellUsAboutYou['city']))}} ,</span>

            				<span>{{ucwords(strtolower($tellUsAboutYou['state']))}}</span>

            				<span>{{ucwords(strtolower($tellUsAboutYou['zip']))}}</span>
            			</span>
            		</span>
            	</span>
            </span>
        	</span>
        	</p>

            <p style="margin-left: 0.5in; margin-bottom: 0in; line-height: 115%">
            	<span color="#0432ff">
            		<span>{{$tellUsAboutYou['phone']}}</span>
            	</span>
            </p>

            <p align="left" style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p align="center" style="margin-bottom: 0.09in; line-height: 0.23in">
            	<span  style="font-size: 13pt">
            		<b>WITNESSES</b>
            	</span>
            </p>

            <p style="margin-bottom: 0in; line-height: 115%">I declare that the
              person who signed or acknowledged this document is personally known
              to me, that <span>{{$genderTxt3}}</span>
              signed or acknowledged this Medical Durable Power of Attorney in my
              presence, and that <span>{{$genderTxt3}}</span>
              appears to be of sound mind and under no duress, fraud or undue
              influence. I am not the person appointed as the agent by this
              document, nor am I the declarant’s health care provider, or an
              employee of the declarant’s health care provider.  I did not sign
              this document for the declarant.  I have no claim, nor am I entitled
              to, any portion of the declarant’s estate.</p>

            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>

            <p align="left" style="margin-bottom: 0in; line-height: 115%">

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

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in"><span  style="">__________________________________________(WITNESS
              2)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_______________</span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in"><span  style="">NAME:<span style="padding-left:430px; display: inline-block;"></span>
              DATE</span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in"><span  style="">ADDRESS:</span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in"><span  style="">CITY/STATE:</span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p align="left" style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p align="center" style="margin-bottom: 0in; line-height: 115%">

            </p>
          </div>

          {{--
          <div *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null"
          style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
          Medical Durable Power of Attorney, Living Will, and Advance Directive by <br><span style="text-transform: capitalize">{{userDetails.tellUsAboutYou.fullname}}</span><br>
            Page 6 of 7
          </div>

          <div *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null" style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
              Medical Durable Power of Attorney, Living Will, and Advance Directive by <br>  CLIENT FIRST NAME CLIENT MIDDLE NAME CLIENT LAST NAME<br>
            Page 6 of 7
          </div>
          --}}

        </div>
        <!-- !Page 6 -->

        <!-- Page 7 -->
        <div class="docPage">
            <div class="docPageInner">

            <p align="center" style="margin-bottom: 0in; line-height: 0.23in"><span  style="font-size: 13pt"><b>NOTARY
              ACKNOWLEDGEMENT </b></span>
            </p>
            <p align="center" style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">STATE OF
              COLORADO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="background: #ffffff"><span color="#000000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt">)
              ss</span></span></span></span></span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in"><span style="text-decoration: none">COUNTY OF </span><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><span style="text-decoration: none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">Subscribed
                and sworn to before me by

                <span> {{ucwords(strtolower($tellUsAboutYou['fullname']))}} </span>, the declarant, and by
                _____________________________ and _____________________________, the
                witnesses, as the voluntary act and deed of the declarant on this
                <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>day
                of <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>,

                <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>.</span></span></span></span></span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">______________________________________</p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in"><b>NOTARY
              PUBLIC</b></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">My
              commission expires: _________________</span></span></span></span></span></p>
            <p align="center" style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p align="left" style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p align="left" style="margin-bottom: 0in; line-height: 115%">

            </p>
          </div>

          {{--
          <div *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null"
          style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
          Medical Durable Power of Attorney, Living Will, and Advance Directive by <br><span style="text-transform: capitalize">{{userDetails.tellUsAboutYou.fullname}}</span><br>
            Page 7 of 7
          </div>

          <div *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null" style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
              Medical Durable Power of Attorney, Living Will, and Advance Directive by <br>  CLIENT FIRST NAME CLIENT MIDDLE NAME CLIENT LAST NAME<br>
            Page 7 of 7
          </div>
          --}}

        </div>
        <!-- !Page 7 -->

</div>

</body>
</html>
