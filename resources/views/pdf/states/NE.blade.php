<!DOCTYPE html>
<html>
<head>
	<title>Health Care Power of Attorney</title>
</head>
<body>
<div>
	<!-- Page 1-->
<div class="docPage" style="margin: 0; box-sizing: border-box; padding: 0px;">
  <div class="docPageInner" style="box-sizing: border-box; height: 875px;">
    <p  style="margin-bottom: 0.13in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 13pt"><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>N</b></span></span></span><span size="4" style="font-size: 16pt"><b>EBRASKA
      </b></span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>P</b></span></span></span><span size="4" style="font-size: 16pt"><b>OWER
      OF </b></span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>A</b></span></span></span><span size="4" style="font-size: 16pt"><b>TTORNEY</b></span></span></span></p>
    <p  style="margin-bottom: 0.13in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 13pt"><span size="4" style="font-size: 16pt"><b>FOR
      </b></span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>H</b></span></span></span><span size="4" style="font-size: 16pt"><b>EALTH
      </b></span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>C</b></span></span></span><span size="4" style="font-size: 16pt"><b>ARE</b></span></span></span></p>
    <p  style="margin-bottom: 0in; ">

    	<span>
    		<span style="font-family:'Times New Roman, serif'">I
      appoint my 
      	<span size="3" style="font-size: 12pt">
			@if(strtolower($healthFinance['relation']) == 'other')
				<span style="font-family:'Times New Roman, serif'">{{$healthFinance['relationOther']}}, </span>
			@else
				<span style="font-family:'Times New Roman, serif'" >{{$healthFinance['relation']}}, </span>
			@endif
		</span>
      

      <span style="text-transform: capitalize"> {{$healthFinance['fullname']}} </span> of
      

      <span style="text-transform: capitalize"> {{$healthFinance['address']}} </span> in
      

      <span style="text-transform: capitalize"> {{$healthFinance['city']}} ,</span>
      

      <span style="text-transform: capitalize"> {{$healthFinance['state']}} </span>
      

      <span style="text-transform: capitalize"> {{$healthFinance['zip']}} </span> 
      
      (Tel: <span> {{$healthFinance['phone']}} </span> as my attorney-in-fact for health care.

      
      
      @if($healthFinance['anyBackupAgent'] === 'true')
      <span>
      If said agent is
      unable, unwilling or unavailable to act, or if I revoke this
      appointment or authority to act, then I designate 
  		</span>
      <span>
      	<span>
      		<span style="font-family:'Times New Roman, serif'">my</span>
      	</span>
      </span>
      

		@if(strtolower($healthFinance['backupRelation'] == 'other'))
			<span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupRelationOther']}}, </span>
		@else
			<span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupRelation']}}, </span>
		@endif
      

      <span style="text-transform: capitalize"> {{$healthFinance['backupFullname']}} </span> of
      
      <span style="text-transform: capitalize"> {{$healthFinance['backupAddress']}} </span> in
      
      <span style="text-transform: capitalize"> {{$healthFinance['backupCity']}} ,</span>
      
      <span style="text-transform: capitalize"> {{$healthFinance['backupState']}} </span>

      <span style="text-transform: capitalize"> {{$healthFinance['backupZip']}} </span>
      
      (Tel: <span> {{$healthFinance['backupphone']}} </span> ),
    
      @endif  
   		</span>

   	<span style="font-family:'Times New Roman, serif'">I authorize
      my attorney in fact appointed by this document to make health care
      decisions for me when I am determined to be incapable of making my
      own health care decisions. I have read the warning which accompanies
      this document and understand the consequences of executing a power of
      attorney for health care.</span></span>
    </p>
    
    
    <p  style="text-indent: 0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">I
      direct that my attorney in fact comply with the following
      instructions and/or limitations (optional):</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
    <p style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="text-indent: 0.38in; margin-bottom: 0.03in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">I
      direct that my attorney in fact comply with the following
      instructions on life-sustaining treatment:  </span><span size="3" style="font-size: 12pt"><b>(optional;
      if desired, INITIAL one of the below choices)</b></span></span></span></p>
    <p  style="text-indent: 0.38in; margin-bottom: 0.03in; ">
      <br/>

    </p>
    <p  style="margin-left: 0.94in; text-indent: -0.56in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________</span><span size="3" style="font-size: 12pt">&nbsp;
      </span><span size="3" style="font-size: 12pt">I authorize my
      attorney-in-fact to consent to the withholding or withdrawing of
      life-sustaining procedures</span></span></span></p>
    <p  style="margin-left: 0.94in; text-indent: -0.56in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________</span><span size="3" style="font-size: 12pt">&nbsp;
      </span><span size="3" style="font-size: 12pt">I want my life to be
      prolonged to the greatest extent possible without regard to my
      condition, the chances I have for recovery or the cost of the
      procedures.</span></span></span></p>
    <p  style="text-indent: 0.38in; margin-bottom: 0.03in; ">
      <br/>

    </p>
    <p  style="text-indent: 0.38in; margin-bottom: 0.03in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">I
      direct that my attorney in fact comply with the following
      instructions on artificially administered nutrition and hydration:
      </span><span size="3" style="font-size: 12pt"><b>(optional; if
      desired, INITIAL one of the below choices)</b></span></span></span></p>
    <p  style="text-indent: 0.38in; margin-bottom: 0.03in; ">
      <br/>

    </p>
    <p  style="margin-left: 0.94in; text-indent: -0.56in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________</span><span size="3" style="font-size: 12pt">&nbsp;
      </span><span size="3" style="font-size: 12pt">I authorize my
      attorney-in-fact to consent to the withholding or withdrawing of
      artificially administered nutrition or hydration</span></span></span></p>
    <p style="margin-left: 0.94in; text-indent: -0.56in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________</span><span size="3" style="font-size: 12pt">&nbsp;
      </span><span size="3" style="font-size: 12pt">I want artificial
      nutrition and hydration provided to me in order to prolong my life.</span></span></span></p>
    <p style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">My
      attorney in fact has the full and immediate power and authority to do
      all of the following:</span><span size="3" style="font-size: 12pt">&nbsp;</span></span></span></p>
  </div>
  
</div>
<!-- Page 1-->


<!-- Page 2-->
<div>
  <div style="page-break-after: always;">
    <p  style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(a)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">Request,
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
      give, disclose, and release to my attorney in fact, without
      restriction, all of my individually identifiable health information
      and medical records regarding any past, present, or future medical or
      mental health condition. This authority given my attorney in fact
      shall supersede any other agreement which I may have made with my
      health care providers to restrict access to or disclosure of my
      individually identifiable health information. This authority given my
      attorney in fact shall be effective immediately, has no expiration
      date and shall expire only in the event that I revoke the authority
      in writing and deliver it to my health care provider.</span></span></span></p>
    <p  style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in; ">
      <br/>

    </p>
    <p  style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(b)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">Execute
      on my behalf any releases or other documents that may be required in
      order to obtain this information; and</span></span></span></p>
    <p  style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in; ">
      <br/>

    </p>
    <p  style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(c)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">Consent
      to the disclosure of this information.</span></span></span></p>
  </div>
  
</div>
<!-- Page 2-->

<!-- Page 3-->
<div>
  <div style="page-break-after: always;">
    <p  style="margin-bottom: 0in;  text-align:center;">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>SIGNATURE
      AND ACKNOWLEDGEMENT</b></span></span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>I
      HAVE READ THIS POWER OF ATTORNEY FOR HEALTH CARE. I UNDERSTAND THAT
      IT ALLOWS ANOTHER PERSON TO MAKE LIFE AND DEATH DECISIONS FOR ME IF I
      AM INCAPABLE OF MAKING SUCH DECISIONS. I ALSO UNDERSTAND THAT I CAN
      REVOKE THIS POWER OF ATTORNEY FOR HEALTH CARE AT ANY TIME BY
      NOTIFYING MY ATTORNEY IN FACT, MY PHYSICIAN, OR THE FACILITY IN WHICH
      I AM A PATIENT OR RESIDENT. I ALSO UNDERSTAND THAT I CAN REQUIRE IN
      THIS POWER OF ATTORNEY FOR HEALTH CARE THAT THE FACT OF MY INCAPACITY
      IN THE FUTURE BE CONFIRMED BY A SECOND PHYSICIAN.</b></span></span></span></p>
    <p style="margin-bottom: 0in; "><br/>

    </p>
    <p style="margin-bottom: 0in; "><br/>

    </p>
    <p style="margin-bottom: 0in; "><br/>

    </p>
    <p style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">______________________________________________</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">Dated:</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">______________________</span></span></span></p>
    <p  style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
      <span ><span style="font-family:'Times New Roman, serif'"><b>(signature)
      </b></span></span><span style="font-family:'Times New Roman, serif'"><b>
        <span style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</span>
        
      </b>
  	</span>
  	</p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span ><span size="3" style="font-size: 12pt">STATE
      OF NEBRASKA	</span></span><span ><span size="3" style="font-size: 12pt">	</span></span><span ><span size="3" style="font-size: 12pt">)</span></span></span></span></span></p>
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">				</span><span size="3" style="font-size: 12pt; display: inline-block; padding-left: 180px;">)
      ss.</span><span size="3" style="font-size: 12pt">&nbsp;</span></span></span></p>
    <p  style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span ><span size="3" style="font-size: 12pt">COUNTY
      ________________</span></span><span ><span size="3" style="font-size: 12pt">	</span></span><span ><span size="3" style="font-size: 12pt">)</span></span></span></span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">On this ______ day of </span><span style="font-family:'Times New Roman, serif'">_______________________</span><span style="font-family:'Times New Roman, serif'">,
    </span><span style="font-family:'Times New Roman, serif'">__________________</span><span style="font-family:'Times New Roman, serif'">,
    before me, a notary public, personally came </span>


    <span style="font-family:'Times New Roman, serif'">
    
    <span style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</span>
    </span><span style="font-family:'Times New Roman, serif'">,
    personally to me known to be the identical person whose name is
    affixed to the above power of attorney for health care as principal,
    and I declare that </span>
    <span><span style="font-family:'Times New Roman, serif'"><span>{{$genderTxt3}}</span>
    </span></span>

    <span style="font-family:'Times New Roman, serif'">»
    appears in sound mind and not under duress or undue influence, that
    </span>
    <span>
    	<span style="font-family:'Times New Roman, serif'">
    		<span>{{$genderTxt3}}</span>
    	</span>
    </span>

    <span style="font-family:'Times New Roman, serif'"> acknowledges the execution of the same to be </span>

    <span>
    	<span style="font-family:'Times New Roman, serif'">
      	<span >{{$genderTxt4}}</span>
    </span>
	</span>

	<span style="font-family:'Times New Roman, serif'">
    voluntary act and deed, and that I am not the attorney in fact or
    successor attorney in fact designated by this power of attorney for
    health care.</span></p>
    
    <p style="margin-bottom: 0in; "><br/>

    </p>
    <p style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">Witness
      my hand and notarial seal.  </span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">______________________________________
       NOTARY PUBLIC</span></span></span></p>
  </div>
  
</div>
<!-- Page 3-->

<!-- Page 4-->
<div>
  <div style="page-break-after: always;">
    <p  style="margin-bottom: 0.13in;  text-align:center;">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt"><span size="3" style="font-size: 12pt"><b>DECLARATION
      OF WITNESSES</b></span></span></span></p>
    <p  style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">We declare that the principal,
      </span><span style="font-family:'Times New Roman, serif'">

        <span style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</span>
        
      ,</span><span style="font-family:'Times New Roman, serif'">
      is personally known to us, that the principal signed or acknowledged
      </span>
      
      <span>
      	<span size="3" style="font-size: 12pt">{{$genderTxt4}}</span>
      </span>

      <span style="font-family:'Times New Roman, serif'">»
      signature on this power of attorney for health care in our presence,
      that the principal appears to be of sound mind and not under duress
      or undue influence, and that neither of us nor the principal’s
      attending physician is the person appointed as attorney in fact by
      this document.</span></p>
    	
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">Witnessed
      by:</span></span></span></p>
    
    <p  style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt"><b>WITNESS
      1</b></span></span></span><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">:
      ________________________________	Dated: ___________________</span></span></span></p>
    <p  style="margin-bottom: 0in; margin-top: 0;"><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">[signature]</span></span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">____________________________________</span></span></span></p>
    <p  style="margin-bottom: 0in; margin-top: 0;"><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">	[name
      printed]</span></span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">____________________________________</span></span></span></p>
    <p  style="margin-bottom: 0in; margin-top: 0;"><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">	[street
      address]</span></span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">____________________________________</span></span></span></p>
    <p  style="margin-bottom: 0in; margin-top: 0;"><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">	[city,
      state]</span></span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt"><b>WITNESS
      2: </b></span></span></span><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">________________________________	Dated:
      ___________________</span></span></span></p>
    <p  style="margin-bottom: 0in; margin-top: 0;"><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">[signature]</span></span></span></p>
    <p  style="margin-bottom: 0in; "><br/>
    
    </p>
    <p  style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">____________________________________</span></span></span></p>
    <p  style="margin-bottom: 0in; margin-top: 0;"><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">	[name
      printed]</span></span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">____________________________________</span></span></span></p>
    <p  style="margin-bottom: 0in; margin-top: 0;"><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">	[street
      address]</span></span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">____________________________________</span></span></span></p>
    <p  style="margin-bottom: 0in; margin-top: 0;"><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">	[city,
      state]</span></span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="2" style="font-size: 11pt">	</span><span size="2" style="font-size: 11pt">____________________________________</span></span></span></p>
    <p  style="margin-bottom: 0in; margin-top: 0;"><span style="font-family:'Times New Roman, serif'"><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 11pt">	</span><span size="2" style="font-size: 11pt">[city,
      state]</span></span></span></p>
  </div>
  
</div>
<!-- Page 4-->


<!-- Page 5-->
<div class="docPage" style="margin: 0; box-sizing: border-box; padding: 0px;">
  <div class="docPageInner" style="box-sizing: border-box; height: 875px;">
    <p  style="margin-bottom: 0in;  text-align:center;">
      <span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 13pt"><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 18pt"><span size="4" style="font-size: 14pt"><b>N</b></span></span></span><span size="4" style="font-size: 14pt"><b>EBRASKA
      LIVING WILL </b></span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 18pt"><span size="4" style="font-size: 14pt"><b>D</b></span></span></span><span size="4" style="font-size: 14pt"><b>ECLARATION</b></span></span></span></p>
    
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">If
      I should lapse into a persistent vegetative state or have an
      incurable and irreversible condition that, without the administration
      of life-sustaining treatment, will, in the opinion of my attending
      physician, cause my death within a relatively short time and I am no
      longer able to make decisions regarding my medical treatment, I
      direct my attending physician, pursuant to the Rights of the
      Terminally Ill Act, to withhold or withdraw life-sustaining treatment
      that is not necessary for my comfort or to alleviate pain.</span></span></span></p>
    
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">If
      I am in the condition(s) described above I direct the followingt:
      </span><span size="3" style="font-size: 12pt">(</span><span size="3" style="font-size: 12pt"><b>INITIAL</b></span><span size="3" style="font-size: 12pt">
      all options that apply)</span></span></span></p>
    <p  style="margin-left: 0.94in; text-indent: -0.56in; margin-bottom: 0.06in; margin-top: 0;">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">_______</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">I
      DO NOT want cardiopulmonary resuscitation (CPR).</span></span></span></p>
    <p  style="margin-left: 0.94in; text-indent: -0.56in; margin-bottom: 0.06in; margin-top: 0;">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">_______</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">I
      DO NOT want mechanical respiration.</span></span></span></p>
    <p  style="margin-left: 0.94in; text-indent: -0.56in; margin-bottom: 0.06in; margin-top: 0;">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">_______</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">I
      DO NOT want tube feeding.</span></span></span></p>
    <p  style="margin-left: 0.94in; text-indent: -0.56in; margin-bottom: 0.06in; margin-top: 0;">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">_______</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">I
      DO NOT want tube hydration.</span></span></span></p>
    <p  style="margin-left: 0.94in; text-indent: -0.56in; margin-bottom: 0.06in; margin-top: 0;">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">_______</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">I
      DO NOT want antibiotics.</span></span></span></p>
    <p  style="margin-left: 0.94in; text-indent: -0.56in; margin-bottom: 0in; margin-top: 0;">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">_______</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">I
      </span><span size="3" style="font-size: 12pt">DO</span><span size="3" style="font-size: 12pt"><b>
      </b></span><span size="3" style="font-size: 12pt">want maximum pain
      relief, even if it may hasten my death.</span></span></span></p>
    
    <p  style="margin-bottom: 0.09in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">Other
      directions (if any):</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
    
    <p  style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span ><span size="3" style="font-size: 12pt">Signed
      this </span></span><span ><span size="3" style="font-size: 12pt">________</span></span><span ><span size="3" style="font-size: 12pt">
      day of  </span></span><span ><span size="3" style="font-size: 12pt">_______________________</span></span><span ><span size="3" style="font-size: 12pt">,
      </span></span><span ><span size="3" style="font-size: 12pt">__________________</span></span><span ><span size="3" style="font-size: 12pt">.</span></span></span></span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-left: 0.5in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">_______________________________________</span></span></span></p>
    <p  style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>
          <span style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</span>
        </b>
    	</span>
    	</p>
    <p  style="text-indent: 0.5in; margin-bottom: 0in; ">
      <span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span ><span size="3" style="font-size: 12pt"></span></span><span ><span size="3" style="font-size: 12pt">
        <span style="text-transform: capitalize">{{$tellUsAboutYou['address']}}</span>
        
      </span></span><span ><span size="3" style="font-size: 12pt">,
      </span></span></span></span></span>
    </p>
    
    <p  style="text-indent: 0.5in; margin-bottom: 0in; ">
      <span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span ><span size="3" style="font-size: 12pt"></span></span><span ><span size="3" style="font-size: 12pt">
        <span style="text-transform: capitalize">{{$tellUsAboutYou['city']}}</span>
      </span>
  	</span>

      <span><span size="3" style="font-size: 12pt">,
      </span></span><span ><span size="3" style="font-size: 12pt">
        <span style="text-transform: capitalize">{{$tellUsAboutYou['state']}}</span>
        
      </span></span><span ><span size="3" style="font-size: 12pt">.</span></span></span></span></span></p>
    
    
    <p  style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span ><span size="3" style="font-size: 12pt">STATE
      OF NEBRASKA	</span></span><span ><span size="3" style="font-size: 12pt">	</span></span><span ><span size="3" style="font-size: 12pt">)</span></span></span></span></span></p>
    <p  style="margin-left: 1in; text-indent: 0.5in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">		</span><span size="3" style="font-size: 12pt">)
      ss.</span><span size="3" style="font-size: 12pt">&nbsp;</span></span></span></p>
    <p  style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span ><span size="3" style="font-size: 12pt">COUNTY
      OF ________________</span></span><span ><span size="3" style="font-size: 12pt">	</span></span><span ><span size="3" style="font-size: 12pt">)</span></span></span></span></span></p>
    
    <p  style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">The declarant </span><span style="font-family:'Times New Roman, serif'">
      <span style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</span>
    </span></p>
    <p style="margin-bottom: 0in; "> <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">voluntarily
        signed this writing in my presence.</span></span></span></p>
    
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">______________________________________</span></span></span></p>
    <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">NOTARY
      PUBLIC</span></span></span></p>
  </div>
</div>
<!-- Page 5-->

<!-- Page 6-->
<div class="docPage" style="margin: 0; box-sizing: border-box; padding:0px;">
  <div class="docPageInner" style="box-sizing: border-box; height: 875px;">
    <p  style="margin-bottom: 0in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>WITNESSES</b></span></span></span></p>
    <p style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0.08in;  orphans: 0; widows: 0"><a name="_GoBack"></a>
      <span style="font-family:'Times New Roman, serif'">The declarant </span><span style="font-family:'Times New Roman, serif'">
        <span style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</span>
        
      </span><span style="font-family:'Times New Roman, serif'">
        voluntarily signed this writing in my presence.</span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'"><b>WITNESS
      1</b></span></span><span ><span style="font-family:'Times New Roman, serif'">:
      ________________________________	Dated: ___________________</span></span></p>
    <p  style="margin-bottom: 0in; margin-top: 0;"><span ><span style="font-family:'Times New Roman, serif'">[signature]</span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'">____________________________________</span></span></p>
    <p  style="margin-bottom: 0in; margin-top: 0;"><span ><span style="font-family:'Times New Roman, serif'">	[name
        printed]</span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'">____________________________________</span></span></p>
    <p  style="margin-bottom: 0in; margin-top: 0;"><span ><span style="font-family:'Times New Roman, serif'">	[street
        address]</span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; margin-top: 0;"><span ><span style="font-family:'Times New Roman, serif'">____________________________________</span></span></p>
    <p  style="margin-bottom: 0in; margin-top: 0;"><span ><span style="font-family:'Times New Roman, serif'">	[city,
      state]</span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'"><b>WITNESS
      2: </b></span></span><span ><span style="font-family:'Times New Roman, serif'">________________________________	Dated:
      ___________________</span></span></p>
    <p  style="margin-bottom: 0in; margin-top: 0;"><span ><span style="font-family:'Times New Roman, serif'">[signature]</span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'">____________________________________</span></span></p>
    <p  style="margin-bottom: 0in; margin-top: 0;"><span ><span style="font-family:'Times New Roman, serif'">	[name
      printed]</span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'">____________________________________</span></span></p>
    <p  style="margin-bottom: 0in; margin-top: 0;"><span ><span style="font-family:'Times New Roman, serif'">	[street
      address]</span></span></p>
    <p  style="margin-bottom: 0in; "><br/>

    </p>
    <p  style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'">____________________________________</span></span></p>
    <p  style="margin-bottom: 0in; margin-top: 0;"><span ><span style="font-family:'Times New Roman, serif'">	[city,
      state]</span></span></p>
  </div>
</div>
<!-- Page 6-->

</div>
</body>
</html>