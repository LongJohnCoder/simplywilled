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
		Health Care Directive of <br>{{$tellUsAboutYou['fullname']}}<br>
	</div>
</div>

<div>

	<!-- Page 1 -->
<div>
  <div style="page-break-after: always;">
    <p  style="margin-bottom: 0in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 13pt"><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>N</b></span></span></span><span size="4" style="font-size: 16pt"><b>ORTH
      </b></span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>D</b></span></span></span><span size="4" style="font-size: 16pt"><b>AKOTA</b></span></span></span></p>
    <p  style="margin-bottom: 0in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 13pt"><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>H</b></span></span></span><span size="4" style="font-size: 16pt"><b>EALTH
      </b></span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>C</b></span></span></span><span size="4" style="font-size: 16pt"><b>ARE
      </b></span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>D</b></span></span></span><span size="4" style="font-size: 16pt"><b>IRECTIVE</b></span></span></span></p>

    <p  style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
      I, <span style="font-family:'Times New Roman, serif'"><b>
        <span style="text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}}, </span>
        </b></span>
      understand this document allows me to do ONE OR ALL of the following:</p>

    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>PART
      I</b></span><span size="3" style="font-size: 12pt">: Name another
      person (called the health care agent) to make health care decisions
      for me if I am unable to make and communicate health care decisions
      for myself. My health care agent must make health care decisions for
      me based on the instructions I provide in this document (Part II), if
      any, the wishes I have made known to him or her, or my agent must act
      in my best interest if I have not made my health care wishes known.</span></span></span></p>

    <p  style="margin-bottom: 0in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>AND/OR</b></span></span></span></p>

    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>PART
      II</b></span><span size="3" style="font-size: 12pt">: Give health
      care instructions to guide others making health care decisions for
      me. If I have named a health care agent, these instructions are to be
      used by the agent. These instructions may also be used by my health
      care providers, others assisting with my health care and my family,
      in the event I cannot make and communicate decisions for myself.</span></span></span></p>

    <p  style="margin-bottom: 0in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>AND/OR</b></span></span></span></p>

    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>PART
      III</b></span><span size="3" style="font-size: 12pt">: Allows me to
      make an organ and tissue donation upon my death by signing a document
      of anatomical gift.</span></span></span></p>

    <p  style="margin-bottom: 0in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="4" style="font-size: 14pt"><b>PART
      I: APPOINTMENT OF HEALTH CARE AGENT</b></span></span></span></p>
    <p  style="margin-bottom: 0in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="4" style="font-size: 14pt"><b>This
      is who I want to make health care decisions for me if I am unable to
      make and communicate health care decisions for myself.</b></span></span></span></p>
    <p  style="margin-bottom: 0in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span style="font-family:'Times New Roman, serif'"><span size="1" style="font-size: 8pt"><span size="4" style="font-size: 14pt"><i>(I
      know I can change my agent or alternate agent at any time and I know
      I do not have to appoint an agent or an alternate agent)</i></span></span></span></span></span></p>

    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="1" style="font-size: 8pt"><span size="3" style="font-size: 12pt"><b>NOTE:</b></span><span size="3" style="font-size: 12pt">
      If you appoint an agent, you should discuss this health care
      directive with your agent and give your agent a copy. If you do not
      wish to appoint an agent, you may leave Part I blank and go to Part
      II and/or Part III. None of the following may be designated as your
      agent: your treating health care provider, a non-relative employee of
      your treating health care provider, an operator of a long-term care
      facility, or a non-relative employee of a long-term care facility.</span></span></span></p>

    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">When
      I am unable to make and communicate health care decisions for myself,
      I trust and appoint my

		<span>
			<span size="3" style="font-size: 12pt">
				@if(strtolower($healthFinance['relation']) == 'other')
					<span style="font-family:'Times New Roman, serif'">{{ucwords(strtolower($healthFinance['relationOther']))}}, </span>
				@else
					<span style="font-family:'Times New Roman, serif'" >{{ucwords(strtolower($healthFinance['relation']))}}, </span>
				@endif
			</span>
		</span>



      <span style="text-transform: capitalize">{{ucwords(strtolower($healthFinance['fullname']))}}</span> to
      make health care decisions for me. This person is called my health
      care agent.</span></span></span></p>

    <p  style="margin-left: 1.5in; text-indent: -1.13in; margin-bottom: 0in; ">
      <span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span ><span size="3" style="font-size: 12pt">Telephone
      number:</span></span><span ><span size="3" style="font-size: 12pt">	</span></span>

      	<span>
      		<span size="3" style="font-size: 12pt">
         		<span>{{$healthFinance['phone']}}</span>
        	</span>
    	</span>
    </span></span></span></p>

    <p  style="margin-left: 1.5in; text-indent: -1.13in; margin-bottom: 0in; ">
      <span>
      	<span style="font-family:'Times New Roman, serif'">
      		<span size="2" style="font-size: 9pt">
      			<span>
      				<span size="3" style="font-size: 12pt">Address:
        <span style="text-transform: capitalize">{{$healthFinance['address']}}</span>


      </span></span></span></span></span>
    </p>
    <p  style="margin-left: 1.5in; margin-bottom: 0in; ">
      <span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt">

      	<span size="3" style="font-size: 12pt">

        	<span style="text-transform: capitalize"> {{ucwords(strtolower($healthFinance['city']))}}, </span>

        	<span style="text-transform: capitalize"> {{ucwords(strtolower($healthFinance['state']))}} </span>

        	<span style="text-transform: capitalize"> {{$healthFinance['zip']}} </span>

        </span>
    </span></span></span></p>
  </div>



</div>
<!-- Page 1 -->

<!-- Page 2 -->
<div>
  <div>

    @if($healthFinance['anyBackupAgent'] === 'true')


      <p  style="margin-bottom: 0in; ">

      	<span style="font-family:'Times New Roman, serif'">
      		<span size="2" style="font-size: 9pt">
      			<span size="3" style="font-size: 12pt">
      				APPOINTMENT OF ALTERNATE HEALTH CARE AGENT: If my health care agent is not reasonably available, I trust and appoint my


    	<span size="3" style="font-size: 12pt">
			@if(strtolower($healthFinance['backupRelation'] == 'other'))
									<span style="font-family:'Times New Roman, serif'">{{ucwords(strtolower($healthFinance['backupRelationOther']))}}, </span>
								@else
									<span style="font-family:'Times New Roman, serif'">{{ucwords(strtolower($healthFinance['backupRelation']))}}, </span>
								@endif
    	</span>


        <span style="text-transform: capitalize"> {{ucwords(strtolower($healthFinance['fullname']))}} </span>
        to make health care decisions for me. This person is my alternate health
        care agent.</span></span></span>
       </p>

      <p  style="margin-left: 1.5in; text-indent: -1.13in; margin-bottom: 0in; ">
        <br/>

      </p>


      	<p style="margin-left: 1.5in; text-indent: -1.13in; margin-bottom: 0in; ">
        <span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt">
        <span>

        	<span size="3" style="font-size: 12pt">Telephone number:
          	<span>{{$healthFinance['backupphone']}}</span>

          	</span>
        </span></span></span></span>
    	</p>

      	<p style="margin-left: 1.5in; text-indent: -1.13in; margin-bottom: 0in; ">
        <span>
        	<span style="font-family:'Times New Roman, serif'">
        		<span size="2" style="font-size: 9pt">
        			<span>
        				<span size="3" style="font-size: 12pt">Address:
          				<span> {{$healthFinance['backupAddress']}} </span>
        				</span>
        			</span>
        		</span>
        	</span>
        </span>
    	</p>

      	<p style="margin-left: 1.5in; text-indent: -1.13in; margin-bottom: 0in; ">
          <span>
          	<span style="font-family:'Times New Roman, serif'">
          		<span size="2" style="font-size: 9pt">
          			<span>
          				<span size="3" style="font-size: 12pt">	</span>
          			</span>
          			<span size="3" style="font-size: 12pt">
			            <span style="text-transform: capitalize">{{ucwords(strtolower($healthFinance['backupCity']))}}, </span>

			            <span style="text-transform: capitalize">{{ucwords(strtolower($healthFinance['backupState']))}} </span>

			            <span style="text-transform: capitalize">{{$healthFinance['backupZip']}} </span>

          			</span>
          		</span>
          	</span>
          </span>
      </p>

    @endif



    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in;  text-align:center;">
    	<span style="font-family:'Times New Roman, serif'">
    		<span size="2" style="font-size: 9pt">
    			<span size="4" style="font-size: 14pt">
    				<b>This is what I want my health care agent to be able to do if I am unable
      to make and communicate health care decisions for myself.</b>
  				</span>

  				<span size="4" style="font-size: 14pt"></span>
  			</span>
  		</span>
    </p>
    <p  style="margin-bottom: 0in;  text-align:center;">

    	<span style="font-family:'Times New Roman, serif'">
    		<span size="2" style="font-size: 9pt">
    			<span style="font-family:'Times New Roman, serif'">
    				<span size="1" style="font-size: 8pt">
    					<span size="4" style="font-size: 14pt"><i>(I know I can change these choices)</i>
    					</span>
    				</span>
    			</span>
    		</span>
    	</span>
    </p>

    <p style="margin-bottom: 0in; "><br/></p>

    <p style="margin-bottom: 0in; ">
    	<span style="font-family:'Times New Roman, serif'">
    		<span size="2" style="font-size: 9pt">
    			<span size="3" style="font-size: 12pt">My health care agent is automatically given the powers listed below in
      (A) through (D). My health care agent must follow my health care
      instructions in this document or any other instructions I have given
      to my agent. If I have not given health care instructions, then my
      agent must act in my best interest.</span>
  			</span>
  		</span>
  	</p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">Whenever
      I am unable to make and communicate health care decisions for myself,
      my health care agent has the power to:</span></span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(A)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">Make
      any health care decision for me. This includes the power to give,
      refuse, or withdraw consent to any care, treatment, service, or
      procedures. This includes deciding whether to stop or not start
      health care that is keeping me or might keep me alive and deciding
      about mental health treatment.</span></span></span></p>
    <p  style="margin-bottom: 0.09in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(B)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">Choose
      my health care providers.</span></span></span></p>
    <p  style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(C)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">Choose
      where I live and receive care and support when those choices relate
      to my health care needs.</span></span></span></p>
    <p  style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(D)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">Review
      my medical records and have the same rights that I would have to give
      my medical records to other people as follows:</span></span></span></p>
    <p  style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0in; ">
      <br/>

    </p>
    <p  style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(i)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">Request,
      review, and receive any information, verbal or written, regarding my
      physical or mental health, including, but not limited to, all of my
      individually identifiable health information and health care facility
      records. This release authority applies to any information governed
      by the Health Insurance Portability and Accountability Act of 1996
      (HIPAA), 42 U.S.C. 1320d and 45 CFR 160-164. I hereby authorize any
      physician, health care professional, dentist, health plan, hospital,
      clinic, laboratory, pharmacy, or other covered health care provider,
      any insurance company, and the Medical Information Bureau, Inc. or
      other health care clearinghouse that has provided treatment or
      services to me, or that has paid for or is seeking payment from me
      for such services, to give, disclose, and release to my agent,
      without restriction, all of my individually identifiable health
      information and medical records regarding any past, present, or
      future medical or mental health condition. This authority given my
      agent shall supersede any other agreement which I may have made with
      my health care providers to restrict access to or disclosure of my
      individually identifiable health information. This authority given my
      agent shall be effective immediately, has no expiration date and
      shall expire only in the event that I revoke the authority in writing
      and deliver it to my health care provider.</span></span></span></p>


  </div>


</div>
<!-- Page 2 -->

<!-- Page 3 -->
<div>
  <div style="page-break-after: always;">
    <p  style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(ii)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">Execute
      on my behalf any releases or other documents that may be required in
      order to obtain this information;</span></span></span></p>

    <p  style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(iii)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">Consent
      to the further disclosure of this information if necessary;</span></span></span></p>

    <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">If
      I </span><span size="3" style="font-size: 12pt"><b>DO NOT</b></span><span size="3" style="font-size: 12pt">
      want my health care agent to have a power listed above in (A) through
      (D) OR if I want to </span><span size="3" style="font-size: 12pt"><b>LIMIT</b></span><span size="3" style="font-size: 12pt">
      any power in (A) through (D), I MUST say that here:</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.06in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>

    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">My
      health care agent is </span><span size="3" style="font-size: 12pt"><b>NOT</b></span><span size="3" style="font-size: 12pt">
      automatically given the powers listed below in (1) and (2). If I </span><span size="3" style="font-size: 12pt"><b>WANT</b></span><span size="3" style="font-size: 12pt">
      my agent to have any of the powers in (1) and (2), I must </span><span size="3" style="font-size: 12pt"><b>INITIAL</b></span><span size="3" style="font-size: 12pt">
      the line in front of the power; then my agent </span><span size="3" style="font-size: 12pt"><b>WILL
      HAVE</b></span><span size="3" style="font-size: 12pt"> that power.</span></span></span></p>

    <p  style="margin-left: 0.75in; text-indent: -0.75in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">_____</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">(1)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">To
      decide whether to donate any parts of my body, including organs,
      tissues, and</span></span></span></p>
    <p  style="margin-left: 0.25in; text-indent: 0.5in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">eyes,
      when I die.</span></span></span></p>

    <p  style="margin-left: 0.75in; text-indent: -0.75in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">_____</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">(2)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">To
      decide what will happen with my body when I die (burial, cremation).
      I specifically direct that such decision shall be made in accordance
      with any separate written instructions I may leave for my Final
      Disposition, and that such authority provided herein shall be second
      to the authority of any representative I appoint in such document, if
      different from the agent I appoint in this Directive.</span></span></span></p>

    <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">If
      I want to say anything more about my health care agent's powers or
      limits on the powers, I can say it here:</span></span></span></p>
    <p  style="margin-bottom: 0.06in; line-height: 200%"><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">																																___________________________________________________________________________<br>
					___________________________________________________________________________<br>
					___________________________________________________________________________<br>
					___________________________________________________________________________<br>
					___________________________________________________________________________<br>
					___________________________________________________________________________<br>
					___________________________________________________________________________<br>
					</span></span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
  </div>


</div>
<!-- Page 3 -->


<!-- Page 4 -->
<div>
  <div>
    <p  style="margin-bottom: 0in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="4" style="font-size: 14pt"><b>PART
    II: HEALTH CARE INSTRUCTIONS</b></span></span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="1" style="font-size: 8pt"><span size="3" style="font-size: 12pt"><b>NOTE:</b></span><span size="3" style="font-size: 12pt">
      Complete this Part II if you wish to give health care instructions.
      If you appointed an agent in Part I, completing this Part II is
      optional but would be very helpful to your agent. However, if you
      chose not to appoint an agent in Part I, you MUST complete, at a
      minimum, Part II (B) if you wish to make a valid health care
      directive.</span></span></span></p>

    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">These
      are instructions for my health care when I am unable to make and
      communicate health care decisions for myself. These instructions must
      be followed (so long as they address my needs).</span></span></span></p>

    <p  style="margin-bottom: 0in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><span size="1" style="font-size: 8pt"><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>(A)
      THESE ARE MY BELIEFS AND VALUES ABOUT MY HEALTH CARE</b></span></span></span></span></span></p>
    <p  style="margin-bottom: 0in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><span size="1" style="font-size: 8pt"><span size="3" style="font-size: 12pt">(I
      know I can change these choices or leave any of them blank)</span></span></span></p>

    <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">I
      want you to know these things about me to help you make decisions
      about my health care: My goals for my health care:</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 10pt">_______________________________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 10pt">_______________________________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 10pt">_______________________________________________________________________________________________</span></span></span></p>

    <p style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'">My
      fears about my health care:</span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 10pt">_______________________________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 10pt">_______________________________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 10pt">_______________________________________________________________________________________________</span></span></span></p>

    <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">My
      spiritual or religious beliefs and traditions:</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 10pt">_______________________________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 10pt">_______________________________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 10pt">_______________________________________________________________________________________________</span></span></span></p>

    <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">My
      beliefs about when life would be no longer worth living:</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 10pt">_______________________________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 10pt">_______________________________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 10pt">_______________________________________________________________________________________________</span></span></span></p>

    <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">My
      thoughts about how my medical condition might affect my family:</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 10pt">_______________________________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 10pt">_______________________________________________________________________________________________</span></span></span></p>
  </div>


</div>
<!-- Page 4 -->



<!-- Page 5 -->
<div>
  <div style="page-break-after: always;">
    <p  style="margin-bottom: 0in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><span size="1" style="font-size: 8pt"><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>(B)</b></span></span></span><span size="3" style="font-size: 12pt"><b>
      </b></span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>THIS
      IS WHAT I WANT AND DO NOT WANT FOR MY HEALTH CARE.</b></span></span></span></span></span></p>
    <p  style="margin-bottom: 0in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><span size="1" style="font-size: 8pt"><span size="4" style="font-size: 14pt">(I
      know I can change these choices or leave any of them blank)</span></span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">Many
      medical treatments may be used to try to improve my medical condition
      or to prolong my life. Examples include artificial breathing by a
      machine connected to a tube in the lungs, artificial feeding or
      fluids through tubes, attempts to start a stopped heart, surgeries,
      dialysis, antibiotics, and blood transfusions. Most medical
      treatments can be tried for a while and then stopped if they do not
      help.</span></span></span></p>

    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="1" style="font-size: 8pt"><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">I
      have these views about my health care in these situations: </span></span></span></span></span>
    </p>
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="1" style="font-size: 8pt"><span size="3" style="font-size: 12pt">(Note:
      You can discuss general feelings, specific treatments, or leave any
      of them blank)</span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">.</span></span></span></span></span></p>

    <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">If
      I had a reasonable chance of recovery and were temporarily unable to
      make and communicate health care decisions for myself, I would want:</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.06in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>

    <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">If
      I were dying and unable to make and communicate health care decisions
      for myself, I would want:</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.06in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>

    <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">If
      I were permanently unconscious and unable to make and communicate
      health care decisions for myself, I would want:</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.06in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>

    <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">If
      I were completely dependent on others for my care and unable to make
      and communicate health care decisions for myself, I would want:</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.06in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
  </div>

</div>
<!-- Page 5 -->



<!-- Page 6 -->
<div>
  <div style="page-break-after: always;">
    <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">In
    all circumstances, my doctors will try to keep me comfortable and
    reduce my pain. This is how I feel about pain relief if it would
    affect my alertness or if it could shorten my life:</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.06in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>

    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>OPTIONAL.</b></span><span size="3" style="font-size: 12pt">
     If you choose to make either of the following statements, please
    </span><span size="3" style="font-size: 12pt"><b>INITIAL</b></span><span size="3" style="font-size: 12pt">
    on the line to the left of such statement below:</span></span></span></p>

    <p  style="margin-left: 0.75in; text-indent: -0.5in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">_____</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">(1)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">If
      I become permanently incapacitated and unconscious, with no
      reasonable expectation of recovery, I direct that no life-sustaining
      treatment, including a respirator and artificial nutrition, be given
      me except that oral fluids and medication may be mercifully
      administered to me to alleviate suffering even though this may
      shorten my remaining life.</span></span></span></p>

    <p  style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">_____(2)
      I desire that my life be prolonged to the greatest possible extent
      without regard for my physical or mental condition, chance of
      recovery, likelihood of suffering, or expense and authorize my agent
      to consent to whatever medical procedures are necessary to accomplish
      this end.  I trust my agent, who knows my desires well, and in whose
      judgment I have absolute faith to exercise discretionary decisions in
      a manner that would be satisfactory to me.</span><span size="3" style="font-size: 12pt">&nbsp;</span></span></span></p>

    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">Notwithstanding
      anything herein to the contrary, I direct that treatment for
      alleviation of pain or discomfort be provided at all times, even if
      it hastens my death.</span></span></span></p>

    <p style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">There
      are other things that I want or do not want for my health care, if
      possible:</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.06in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">Who
      I would like to be my doctor:</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.06in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>

    <p  style="margin-left: 0.38in; margin-bottom: 0.06in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">Where
      I would like to live to receive health care:</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.06in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
  </div>
</div>
<!-- Page 6 -->



<!-- Page 7 -->
<div>
  <div style="page-break-after: always;">
    <p  style="margin-left: 0.38in; margin-bottom: 0.06in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">Where
      I would like to die and other wishes I have about dying:</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.06in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0in; ">
      <br/>

    </p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.06in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">My
      wishes about what happens to my body when I die (cremation, burial):</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">See
      the document entitled &quot;Burial Instructions&quot; executed
      concurrently herewith.</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0in; ">
      <br/>

    </p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.06in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">Any
      other things:</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.06in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="4" style="font-size: 14pt"><b>PART
    III: MAKING AN ANATOMICAL GIFT</b></span></span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">I
      would like to be an organ donor at the time of my death. I have told
      my family my decision and ask my family to honor my wishes. I wish to
      donate the following (</span><span size="3" style="font-size: 12pt"><b>INITIAL</b></span><span size="3" style="font-size: 12pt">
      one statement):</span></span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0.09in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">_____
      Any needed organs and tissue.</span></span></span></p>
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">_____
    Only the following organs and tissue:
    ________________________________________</span></span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="4" style="font-size: 14pt"><b>PART
    IV: MAKING THE DOCUMENT LEGAL</b></span></span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">PRIOR
    DESIGNATIONS REVOKED. I revoke any prior health care directive.</span></span></span></p>
  </div>
</div>
<!-- Page 7 -->



<!-- Page 8 -->
<div>
  <div style="page-break-after: always;">
    <p  style="margin-bottom: 0in;  text-align:center;">
      <span style="font-family:'Times New Roman, serif'"><span size="1" style="font-size: 8pt"><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="4" style="font-size: 14pt"><b>DATE
      AND SIGNATURE OF PRINCIPAL.</b></span></span></span></span></span></p>
    <p  style="margin-bottom: 0in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><span size="1" style="font-size: 8pt"><span size="4" style="font-size: 14pt"><b>(YOU
      MUST DATE AND SIGN THIS HEALTH CARE DIRECTIVE)</b></span></span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>

    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">I
    sign my name to this Health Care Directive Form on this </span><span size="3" style="font-size: 12pt">________</span><span size="3" style="font-size: 12pt">
    day of </span><span size="3" style="font-size: 12pt">____________</span><span size="3" style="font-size: 12pt">,
    </span></span></span>
    </p>

    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">at
      </span><span size="3" style="font-size: 12pt">_______________________</span><span size="3" style="font-size: 12pt">,
      </span><span size="3" style="font-size: 12pt">______________________</span><span size="3" style="font-size: 12pt">.</span></span></span></p>
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(city)<span style="padding-left: 180px;"></span>(state)</span></span></span></p>

    <p  style="margin-left: 0.5in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">_______________________________________</span></span></span></p>
    <p  style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
	    <span style="font-family:'Times New Roman, serif'"><b>
	        <span style="text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}}</span>

	        </b>
	    </span>
	</p>

    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(THIS
      HEALTH CARE DIRECTIVE WILL NOT BE VALID UNLESS IT IS SIGNED IS
      NOTARIZED OR BY TWO (2) QUALIFIED WITNESSES WHO ARE PRESENT WHEN YOU
      SIGN OR ACKNOWLEDGE YOUR SIGNATURE. IF YOU HAVE ATTACHED ANY
      ADDITIONAL PAGES TO THIS FORM, YOU MUST DATE AND SIGN EACH OF THE
      ADDITIONAL PAGES AT THE SAME TIME YOU DATE AND SIGN THIS HEALTH CARE
      DIRECTIVE.)</span></span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>

    <p  style="margin-bottom: 0.06in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>NOTARY
      PUBLIC OR STATEMENT OF WITNESSES</b></span></span></span></p>
    <p  style="margin-bottom: 0.06in; "><br/>
      <br/>

    </p>
    <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">This
      document must be (1) notarized or (2) witnessed by two qualified
      adult witnesses. The person notarizing this document may be an
      employee of a health care or long-term care provider providing your
      care. At least one witness to the execution of the document must not
      be a health care or long-term care provider providing you with direct
      care or an employee of the health care or long-term care provider
      providing you with direct care. None of the following may be used as
      a notary or witnesses:</span></span></span></p>
    <ol>
      <li>
      <p  style="margin-bottom: 0.06in; margin-top: 0;">
        <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">A
        person you designate as your agent or alternative agent;</span></span></span></p>
      </li>
      <li>
      <p  style="margin-bottom: 0.06in; margin-top: 0;">
        <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">Your
        spouse;</span></span></span></p>
      </li>
      <li>
      <p  style="margin-bottom: 0.06in; margin-top: 0;">
        <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">A
        person related to you by blood, marriage or adoption;</span></span></span></p>
      </li>
      <li>
      <p  style="margin-bottom: 0.06in; margin-top: 0;">
        <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">A
        person entitled to inherit any part of your estate upon your death;
        or</span></span></span></p>
      </li>
      <li>
      <p  style="margin-bottom: 0in; margin-top: 0;">
        <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">A
        person who has, at the time of executing this document, any claim
        against your estate.</span></span></span></p>
      </li>
    </ol>
  </div>
</div>
<!-- Page 8 -->



<!-- Page 9 -->
<div>
  <div style="page-break-after: always;">
    <p  style="margin-bottom: 0in;  text-align:center;">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt"><span size="3" style="font-size: 12pt"><b>Option
      1: Notary Public</b></span></span></span></p>
    <p style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">STATE
      OF NORTH DAKOTA</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">)</span></span></span></p>
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">					</span><span size="3" style="font-size: 12pt">:ss</span></span></span></p>
    <p  style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span ><span size="3" style="font-size: 12pt">COUNTY
    ________________</span></span><span ><span size="3" style="font-size: 12pt">	</span></span><span ><span size="3" style="font-size: 12pt">)</span></span></span></span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">In my presence on this </span><span style="font-family:'Times New Roman, serif'">________</span><span style="font-family:'Times New Roman, serif'">
      day of </span><span style="font-family:'Times New Roman, serif'">_____________________</span><span style="font-family:'Times New Roman, serif'">,
      </span><span style="font-family:'Times New Roman, serif'">_______________</span><span style="font-family:'Times New Roman, serif'">,
      </span><span style="font-family:'Times New Roman, serif'">
      <span style="text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}}</span>

      </span>

      <span style="font-family:'Times New Roman, serif'">
      acknowledged </span><span >

      	<span style="font-family:'Times New Roman, serif'">

      		<span>{{$genderTxt4}}</span>
      	</span></span><span style="font-family:'Times New Roman, serif'">
      signature on this document or acknowledged that </span>

      <span>
      	<span style="font-family:'Times New Roman, serif'">
      		<span>{{$genderTxt3}}</span>
      	</span>
      </span>

      <span style="font-family:'Times New Roman, serif'">»
      directed the person signing this document to sign on </span><span ><span style="font-family:'Times New Roman, serif'"><span>{{$genderTxt4}}</span></span></span><span style="font-family:'Times New Roman, serif'">
      behalf.</span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-left: 2.25in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">_________________________________________</span></span></span></p>
    <p  style="margin-left: 2.25in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">(signature
      of the notary public)</span></span></span></p>
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">	</span></span></span></p>
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">My
      commission expires _______________.</span></span></span></p>
  </div>
</div>
<!-- Page 9 -->




<!-- Page 10 -->
<div>
  <div>
    <p  style="margin-bottom: 0in;  text-align:center;">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt"><span size="3" style="font-size: 12pt"><b>Option
      2: Two Witnesses</b></span></span></span></p>
    <p style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>Witness
      One:</b></span></span></span></p>
    <p  style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">(1)</span><span style="font-family:'Times New Roman, serif'">	</span><span style="font-family:'Times New Roman, serif'">In
        my presence on </span><span style="font-family:'Times New Roman, serif'">____________</span><span style="font-family:'Times New Roman, serif'">
        day of </span><span style="font-family:'Times New Roman, serif'">______________________</span><span style="font-family:'Times New Roman, serif'">,
        </span><span style="font-family:'Times New Roman, serif'">________________</span><span style="font-family:'Times New Roman, serif'">,
        </span><span style="font-family:'Times New Roman, serif'">
        <span style="text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}}</span>


        </span><span style="font-family:'Times New Roman, serif'">acknowledged </span>
        <span>
        	<span style="font-family:'Times New Roman, serif'">
        		<span>{{$genderTxt4}}</span>
        	</span>
        </span>

        <span style="font-family:'Times New Roman, serif'">
        signature on this document or acknowledged that </span>

        <span>
        	<span style="font-family:'Times New Roman, serif'">
        		<span>{{$genderTxt3}}</span>
        	</span>
        </span>
        <span style="font-family:'Times New Roman, serif'">
        directed the person signing this document to sign on </span>
        <span>
        	<span style="font-family:'Times New Roman, serif'">
        		<span>{{$genderTxt4}}</span>
        	</span>
        </span>
        <span style="font-family:'Times New Roman, serif'">
        behalf.</span></p>
    <p  style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0.06in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(2)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">I
      am at least eighteen years of age.</span></span></span></p>
    <p  style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0.06in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(3)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">If
      I am a health care provider or an employee of a health care provider
      giving direct care to the declarant, I must initial this box
      :[________ ]</span></span></span></p>
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">I
      certify that the information in (1) through (3) is true and correct.</span></span></span></p>

    <p class="western" style="margin-bottom: 0in; "><span ><b>WITNESS
      1</b></span><span >: </span><span >____________________</span><span style="padding-left: 50px;">	Dated:
      </span><span >______________________</span></p>
    <p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0in; margin-top: 0;">
      <span style="padding-left: 50px;">[signature]</span></p>
    <p class="western" align="justify" style="margin-bottom: 0in;  padding-top: 15px;">
      <span >____________________________</span><span >		</span><span style="padding-left: 122px;">______________________</span></p>
    <p class="western" align="justify" style="margin-bottom: 0in; margin-top: 0;">
      <span style="padding-left: 60px;">	[name printed]</span><span style="padding-left: 240px;">[street address]</span></p>
    <p class="western" align="justify" style="margin-bottom: 0in;  padding:25px 0 0 350px;">
      <span >							</span><span >______________________</span></p>
    <p class="western" align="justify" style="margin-bottom: 0in;  padding-left: 350px;margin-top: 0;">
      <span style="padding-left: 40px;">								[city, state, zip]</span></p>
    <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>Witness
      Two:</b></span></span></span></p>
    <p  style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
      (<span style="font-family:'Times New Roman, serif'">1)</span><span style="font-family:'Times New Roman, serif'">	</span><span style="font-family:'Times New Roman, serif'">In
      my presence on </span><span style="font-family:'Times New Roman, serif'">__________</span><span style="font-family:'Times New Roman, serif'">
      day of </span><span style="font-family:'Times New Roman, serif'">_________________</span><span style="font-family:'Times New Roman, serif'">,
      </span><span style="font-family:'Times New Roman, serif'">____________</span><span style="font-family:'Times New Roman, serif'">,
      </span>

      <span style="font-family:'Times New Roman, serif'">
      	<span style="text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}}</span>
      </span>

      <span style="font-family:'Times New Roman, serif'">
      acknowledged </span>

      <span>
      	<span style="font-family:'Times New Roman, serif'">

      		<span>{{$genderTxt4}}</span></span></span><span style="font-family:'Times New Roman, serif'">

      		signature on this document or acknowledged that </span>

      		<span>
      			<span style="font-family:'Times New Roman, serif'">
      				<span>{{$genderTxt3}}</span>
      			</span>
      		</span>
      		<span style="font-family:'Times New Roman, serif'">
      				directed the person signing this document to sign on
      		</span>
			<span>
				<span style="font-family:'Times New Roman, serif'">
					<span >{{$genderTxt4}}</span>
				</span>
			</span>
			<span style="font-family:'Times New Roman, serif'">
				behalf.
			</span>
      	</p>
    <p  style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(2)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">I
      am at least eighteen years of age.</span></span></span></p>
    <p  style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(3)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">If
      I am a health care provider or an employee of a health care provider
      giving direct care to the declarant, I must initial this box
      :[________ ]</span></span></span></p>
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">I
      certify that the information in (1) through (3) is true and correct.</span></span></span></p>


    <p class="western" style="margin-bottom: 0in; "><span ><b>WITNESS
      2</b></span><span >: </span><span >____________________</span><span style="padding-left: 50px;">	Dated:
      </span><span >______________________</span></p>
    <p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0in; margin-top: 0;">
      <span style="padding-left: 50px;">[signature]</span></p>
    <p class="western" align="justify" style="margin-bottom: 0in;  padding-top: 15px;">
      <span >____________________________</span><span >		</span><span style="padding-left: 122px;">______________________</span></p>
    <p class="western" align="justify" style="margin-bottom: 0.06in; margin-top: 0;">
      <span style="padding-left: 60px;">	[name printed]</span><span style="padding-left: 240px;">[street address]</span></p>
    <p class="western" align="justify" style="margin-bottom: 0in;  padding:25px 0 0 350px;">
      <span >							</span><span >______________________</span></p>
    <p class="western" align="justify" style="margin-bottom: 0in;  padding-left: 350px; margin-top: 0;">
      <span style="padding-left: 40px;">								[city, state, zip]</span></p>
  </div>

</div>
<!-- Page 10 -->



<!-- Page 11 -->
<div>
  <div style="page-break-after: always;">
    <p  style="margin-bottom: 0.09in;  text-align:center;">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>ACCEPTANCE
      OF APPOINTMENT OF POWER OF ATTORNEY</b></span></span></span></p>
    <p  style="text-indent: 0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">I
      accept this appointment and agree to serve as agent for health care
      decisions. I understand I have a duty to act consistently with the
      desires of the principal as expressed in this appointment. I
      understand that this document gives me authority over health care
      decisions for the principal only if the principal becomes incapable.
      I understand that I must act in good faith in exercising my authority
      under this power of attorney. I understand that the principal may
      revoke this power of attorney at any time in any manner.</span></span></span></p>
    <p  style="text-indent: 0.38in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">If
      I choose to withdraw during the time the principal is competent I
      must notify the principal of my decision. If I choose to withdraw
      when the principal is incapable of making the principal’s health
      care decisions, I must notify the principal’s physician.</span></span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">Dated:
      __________________</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">____________________________________</span></span></span></p>
    <p  style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span ><span size="3" style="font-size: 12pt">	</span></span><span ><span size="3" style="font-size: 12pt"><b>

      <span style="text-transform: capitalize"> {{$healthFinance['fullname']}} </span>
    </b></span></span></span></span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <!--<p  style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span ><span size="3" style="font-size: 12pt">«</span></span><span size="3" style="font-size: 12pt">IF
      Rx Alternate Agent?</span><span ><span size="3" style="font-size: 12pt">»</span></span></span></span></span></p>-->
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">Dated:
      __________________</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">____________________________________</span></span></span></p>
    <p style="margin-bottom: 0in; "><span >
    	<span style="font-family:'Times New Roman, serif'">
    		<span size="2" style="font-size: 9pt"><span ><span size="3" style="font-size: 12pt">	</span></span><span ><span size="3" style="font-size: 12pt"><b>
      		<span style="text-transform: capitalize">{{$healthFinance['backupFullname']}}</span>
    		</b></span></span></span>
    	</span></span>
    </p>
    <!--<p  style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span ><span size="3" style="font-size: 12pt">«</span></span><span size="3" style="font-size: 12pt">END
IF</span><span ><span size="3" style="font-size: 12pt">»</span></span></span></span></span></p>-->
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>PRINCIPAL'S
      STATEMENT</b></span></span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="text-indent: 0.38in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">I
      have read a written explanation of the nature and effect of an
      appointment of a health care agent that is attached to my health care
      directive.</span></span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span ><span size="3" style="font-size: 12pt">Dated:
      </span></span><span ><span size="3" style="font-size: 12pt">_______________</span></span></span></span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="text-indent: 0.5in; margin-bottom: 0in; "><a name="_GoBack"></a>
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">_______________________________________</span></span></span></p>
    <p  style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
	    <span style="font-family:'Times New Roman, serif'">
	    	<b>
	        	<span style="text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}}</span>
	        </b>
	    </span>
	</p>
  </div>
</div>



<div>
  <div>
    <p  style="margin-bottom: 0in;  text-align:center;">
<span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>WARNING
TO PERSON EXECUTING THIS DOCUMENT</b></span></span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'"><span size="1" style="font-size: 8pt"><span size="3" style="font-size: 12pt">This
      is an important legal document which is authorized by the general
      laws of this state. Before executing this document, you should know
      these important facts:</span></span></span></p>
    <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'"><span size="1" style="font-size: 8pt"><span size="3" style="font-size: 12pt">You
      must be at least eighteen (18) years of age for this document to be
      legally valid and binding.</span></span></span></p>
    <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'"><span size="1" style="font-size: 8pt"><span size="3" style="font-size: 12pt">This
      document gives the person you designate as your agent (the attorney
      in fact) the power to make health care decisions for you. Your agent
      must act consistently with your desires as stated in this document or
      otherwise made known.</span></span></span></p>
    <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'"><span size="1" style="font-size: 8pt"><span size="3" style="font-size: 12pt">Except
      as you otherwise specify in this document, this document gives your
      agent the power to consent to your doctor not giving treatment or
      stopping treatment necessary to keep you alive.</span></span></span></p>
    <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'"><span size="1" style="font-size: 8pt"><span size="3" style="font-size: 12pt">Notwithstanding
      this document, you have the right to make medical and other health
      care decisions for yourself so long as you can give informed consent
      with respect to the particular decision.</span></span></span></p>
    <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'"><span size="1" style="font-size: 8pt"><span size="3" style="font-size: 12pt">This
      document gives your agent authority to consent, to refuse to consent,
      or to withdraw consent to any care, treatment, service, or procedure
      to maintain, diagnose, or treat a physical or mental condition. This
      power is subject to any statement of your desires and any limitation
      that you include in this document. You may state in this document any
      types of treatment that you do not desire. In addition, a court can
      take away the power of your agent to make health care decisions for
      you if your agent authorizes anything that is illegal, acts contrary
      to your known desires, or where your desires are not known, does
      anything that is clearly contrary to your best interests.</span></span></span></p>
    <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'"><span size="1" style="font-size: 8pt"><span size="3" style="font-size: 12pt">Unless
      you specify a specific period, this power will exist until you revoke
      it. Your agent’s power and authority ceases upon your death. You
      have the right to revoke the authority of your agent by notifying
      your agent or your treating doctor, hospital, or other health care
      provider orally or in writing of the revocation.</span></span></span></p>
    <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'"><span size="1" style="font-size: 8pt"><span size="3" style="font-size: 12pt">Your
      agent has the right to examine your medical records and to consent to
      their disclosure unless you limit this right in this document.</span></span></span></p>
    <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'"><span size="1" style="font-size: 8pt"><span size="3" style="font-size: 12pt">This
      document revokes any prior durable power of attorney for health care.</span></span></span></p>
    <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'"><span size="1" style="font-size: 8pt"><span size="3" style="font-size: 12pt">You
      should carefully read and follow the witnessing procedure described
      in this form. This document will not be valid unless you comply with
      the witnessing procedure.</span></span></span></p>
    <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'"><span size="1" style="font-size: 8pt"><span size="3" style="font-size: 12pt">If
      there is anything in this document that you do not understand, you
      should ask a lawyer to explain it to you.</span></span></span></p>
    <p  style="margin-bottom: 0.09in; "><span style="font-family:'Times New Roman, serif'"><span size="1" style="font-size: 8pt"><span size="3" style="font-size: 12pt">Your
    agent may need this document immediately in case of an emergency that
    requires a decision concerning your health care. Either keep this
    document where it is immediately available to your agent and
    alternate agents or give each of them an executed copy of this
    document. You should also give your doctor an executed copy of this
    document.</span></span></span></p>
  </div>
</div>


</div>

</body>
</html>
