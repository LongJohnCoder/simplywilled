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
			Durable Health Care Power of Attorney, Living Will, and Durable Mental Health Care Power of Attorney by <br>{{$tellUsAboutYou['fullname']}}<br>
		</div>
	</div>
<div>
	<!-- Page 1-->
<div style="text-align: justify">
  <div>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0; text-align: center;">
      <span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 14pt"><b>STATE
      OF ARIZONA</b></span></span></p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0; text-align: center;">
      <span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 14pt"><b>DURABLE
      HEALTH CARE POWER OF ATTORNEY</b></span></span></p>
    <p  style="margin-bottom: 0.13in; line-height: 100%; orphans: 0; widows: 0; text-align: center;">
      <span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 14pt"><b>Instructions
      and Form</b></span></span></p>
    <div style="border: 1px solid #000; padding: 5px 0; text-align: justify;">
      <p  style="margin-bottom: 0.08in; padding: 0.01in 0.06in; line-height: 100%; orphans: 0; widows: 0; text-align: justify;">
        <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt"><b>GENERAL
        INSTRUCTIONS: </b></span></span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">Use
        this Durable Health Care Power of Attorney form if you want to
        appoint a person to make future health care decisions for you so that
        if you become too ill or cannot make those decisions for yourself the
        person you choose and trust can make medical decisions for you. Talk
        to your family, friends, and others you trust about your choices.
        Also, it is a good idea to talk with professionals such as your
        doctor, clergyperson, and a lawyer before you sign this form. </span></span>
      </p>
      <p  style="margin-bottom: 0in; padding: 0.01in 0.06in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">Be
        sure you understand the importance of this document. If you decide
        this is the form you want to use, complete the form. </span></span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt"><b>Do
        not sign this form until </b></span></span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">your
        witness or a Notary Public is present to witness the signing. </span></span>
      </p>
    </div>
    <p style="margin-top: 0.13in; margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>1.	Information about me: </b></span><span style="font-family:'Times New Roman, serif'">(I
      am called the “Principal”)</span></p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <br/>
      <br/>

    </p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">My Name: 		</span>
        <span style="font-family:'Times New Roman, serif';text-transform: capitalize; padding-left:48px;">{{strtoupper($tellUsAboutYou['fullname'])}}</span>

        </p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">My Date of Birth: 	</span>
        <span style="font-family:'Times New Roman, serif';text-transform: capitalize">{{date('F j, Y', strtotime($tellUsAboutYou['dob']))}}</span>

        </p>
    <p  style="margin-bottom: 0.08in; line-height: 100%;">
      <span style="font-family:'Times New Roman, serif'; padding-right:33px;">My Address:         	</span>
      <span style="font-family:'Times New Roman, serif';text-transform: capitalize;">{{$tellUsAboutYou['address']}}</span>

      </p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; padding-left:125px;">
      <span style="font-family:'Times New Roman, serif'">
        <span style="font-family:'Times New Roman, serif';text-transform: capitalize">{{$tellUsAboutYou['city']}}</span>


        <span style="font-family:'Times New Roman, serif';text-transform: capitalize">{{$tellUsAboutYou['state']}}</span>

        <span style="font-family:'Times New Roman, serif';text-transform: capitalize">{{$tellUsAboutYou['zip']}}</span>

        </span></p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'; padding-right:23px; display:inline-block;">My Telephone:</span>
        <span style="font-family:'Times New Roman, serif';text-transform: capitalize">{{$tellUsAboutYou['phone']}}</span>

        <!--«</span><span ><span style="font-family:'Times New Roman, serif'">Client
      Telephone</span></span><span style="font-family:'Times New Roman, serif'">»--></p>
    <p  style="margin-top: 0.13in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <br/>
      <br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>2.	Selection of my health care
      representative: </b></span><span style="font-family:'Times New Roman, serif'">(Also
      called an “agent” or “surrogate”) I choose the following
      person to act as my representative to make health care decisions for
      me:</span></p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Name:  		</span>
      <span style="font-family:'Times New Roman, serif';text-transform: capitalize"> {{ucwords($healthFinance['fullname'])}} </span>
    </p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Telephone:  		</span>
      <span style="font-family:'Times New Roman, serif';text-transform: capitalize"> {{$healthFinance['phone']}} </span>
    </p>
    <p style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">Address:
		  </span>
      <span style="font-family:'Times New Roman, serif';text-transform: capitalize"> {{$healthFinance['address']}} </span>

    </p>
    <p style="margin-left: 0in; text-indent: 0.0in; margin-bottom: 0in; line-height: 100%">
      <span style="font-family:'Times New Roman, serif';text-transform: capitalize"> {{ucwords($healthFinance['city'])}},</span>

      <span style="font-family:'Times New Roman, serif';text-transform: capitalize"> {{ucwords($healthFinance['state'])}} </span>

      <span style="font-family:'Times New Roman, serif';text-transform: capitalize"> {{$healthFinance['zip']}} </span>
    </p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>

    @if(array_key_exists('anyBackupAgent', $healthFinance) && $healthFinance['anyBackupAgent'] == 'true')
    <div>
      <p style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'"></span>

        <span style="font-family:'Times New Roman, serif'">I
        choose the following person to act as an alternate representative to
        make health care decisions for me if my first representative is
        unavailable, unwilling, or unable to make decisions for me:</span></p>
      <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
        <br/>

      </p>
      <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'">Name:  		</span>
        <span style="font-family:'Times New Roman, serif';text-transform: capitalize"> {{$healthFinance['backupFullname']}} </span>
      </p>
      <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'">Telephone:  		</span>
        <span style="font-family:'Times New Roman, serif';text-transform: capitalize"> {{$healthFinance['backupphone']}} </span>
      </p>

      <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'">Address: 		 	</span>
        <span style="font-family:'Times New Roman, serif';text-transform: capitalize"> {{$healthFinance['backupAddress']}} </span>

      </p>
      <p style="margin-left: 0in; text-indent: 0.0in; margin-bottom: 0in; line-height: 100%">

        <span style="font-family:'Times New Roman, serif';text-transform: capitalize"> {{$healthFinance['backupCity']}}, </span>

        <span style="font-family:'Times New Roman, serif';text-transform: capitalize"> {{$healthFinance['backupState']}} </span>

        <span style="font-family:'Times New Roman, serif';text-transform: capitalize"> {{$healthFinance['backupZip']}} </span>
      </p>
      <br>
    </div>
    @endif

  </div>

</div>
<!-- Page 1-->


<!-- Page 2-->
<div>
  <div>
    <p style="margin-top: 0.13in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0"></p>
    <p  style="margin-top: 0.13in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>3.	I AUTHORIZE if I am unable
      to make medical care decisions for myself:</b></span></p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      

    </p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">I authorize my health care
      representative to make health care decisions for me when I cannot
      make or communicate my own health care decisions due to mental or
      physical illness, injury, disability, or incapacity. I want my
      representative to make all such decisions for me except those
      decisions that I have expressly stated in Part 4 below that I do not
      authorize him/her to make. If I am able to communicate in any manner,
      my representative should discuss my health care options with me. My
      representative should explain to me any choices he or she made if I
      am able to understand. This appointment is effective unless and until
      it is revoked by me or by an order of a court.</span></p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <br/>
      <br/>

    </p>
    <p  style="margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>The types of health care
      decisions I authorize to be made on my behalf include but are not
      limited to the following:</b></span></p>
    <p  style="margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
      <br/>
      <br/>

    </p>
    <ul style="margin-left: 20px;">
      <li>
      <p  style="margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0; margin-top: 0;">
        <span style="font-family:'Times New Roman, serif'">To consent or to refuse medical
        care, including diagnostic, surgical, or therapeutic procedures;</span></p>
      </li>
      <li>
      <p  style="margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0; margin-top: 0;">
        <span style="font-family:'Times New Roman, serif'">To authorize the physicians,
        nurses, therapists, and other health care providers of his/her
        choice to provide care for me, and to obligate my resources or my
        estate to pay reasonable compensation for these services;</span></p>
      </li>
      <li>
      <p  style="margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0; margin-top: 0;">
        <span style="font-family:'Times New Roman, serif'">To approve or deny my admittance
        to health care institutions, nursing homes, assisted living
        facilities, or other facilities or programs. By signing this form I
        understand that I allow my representative to make decisions about my
        mental health care except that generally speaking he or she cannot
        have me admitted to a structured treatment setting with
        24-hour-a-day supervision and an intensive treatment program –
        called a “level one” behavioral health facility – using just
        this form;</span></p>
      </li>
      <li>
      <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0; margin-top: 0px; margin-top: 0;">
        <span style="font-family:'Times New Roman, serif'">To have access to and control
        over my medical records and to have the authority to discuss those
        records with health care providers.</span></p>
      </li>
    </ul>
    <p  style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0; margin-top: 0px">
      <br/>

    </p>
    <p  style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0; margin-top: 0px">
      <br/>

    </p>
    <p  style=" margin-top: 0.13in; margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>4.	DECISIONS I EXPRESSLY DO
      NOT AUTHORIZE my Representative to make for me:</b></span></p>
    <p  style=" margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>	</b></span></p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>	</b></span><span style="font-family:'Times New Roman, serif'">I
      do not want my representative to make the following health care
      decisions for me (describe or write in “not applicable”):</span></p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">	</span><span style="font-family:'Times New Roman, serif'; line-height: 30px;">
      _____________________________________________________________________________<br>
      _____________________________________________________________________________<br>
      _____________________________________________________________________________<br>
      _____________________________________________________________________________<br>
      _____________________________________________________________________________<br>
      _____________________________________________________________________________
      </span></p>
  </div>

</div>
<!-- Page 2-->

<!-- Page 3-->
<div>
  <div>
    <p  style="margin-top: 0.13in; margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>5.	My specific desires about
      autopsy:</b></span></p>
    <p  style="margin-top: 0.08in; margin-bottom: 0.04in; border: 1px solid #00000a; padding: 0.01in 0.06in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 11pt">NOTE:
      Under Arizona law, an autopsy is not required unless the county
      medical examiner, the county attorney, or a superior court judge
      orders it to be performed. See the General Information document for
      more information about this topic. </span></span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt"><b>Initial
      or put a check mark by one of the following choices.</b></span></span></p>
    <p  style="margin-top: 0.08in; margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">_____ Upon my death I DO NOT
      consent to (want) an autopsy.</span></p>
    <p  style="margin-top: 0.08in; margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">_____ Upon my death I DO consent
      to (want) an autopsy.</span></p>
    <p  style="margin-top: 0.08in; margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">_____ My representative may give
      or refuse consent for an autopsy.</span></p>
    <p  style="margin-top: 0.13in; margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>6.	My specific desires about
      organ donation: (“anatomical gift”)</b></span></p>
    <p  style="margin-top: 0.08in; margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0; padding-left: 15px;">
      <span style="font-family:'Times New Roman, serif'">NOTE: Under Arizona law, you may
      donate all or part of your body. If you do not make a choice, your
      representative or family can make the decision when you die. You may
      indicate which organs or tissues you want to donate and where you
      want them donated. Initial or put a check mark by A or B below. If
      you select B, continue with your choices.</span></p>
    <p  style=" margin-top: 0.13in; margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>_____ A. </b></span><span style="font-family:'Times New Roman, serif'">I
        DO NOT WANT to make an organ or tissue donation, and I do not want
        this donation authorized on my behalf by my representative or my
        family.</span></p>
    <p  style=" margin-top: 0.13in; margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>_____ B. </b></span><span style="font-family:'Times New Roman, serif'">I
        DO WANT to make an organ or tissue donation when I die. Here are my
        directions:</span></p>
    <p  style="margin-top: 0.13in; margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>1. What organs/tissues I
      choose to donate: (</b></span><span style="font-family:'Times New Roman, serif'">Select
      a or b below)</span></p>
    <p  style="margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>_____ a. </b></span><span style="font-family:'Times New Roman, serif'">Any
        needed parts or organs.</span></p>
    <p  style="margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>_____ b. </b></span><span style="font-family:'Times New Roman, serif'">These
      parts or organs:</span></p>
    <p  style="margin-left: 0.87in; text-indent: -0.43in; margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">1)
      __________________________________________________________________</span></span></p>
    <p  style="margin-left: 0.87in; text-indent: -0.43in; margin-top: 0.04in; margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">2)
      __________________________________________________________________</span></span></p>
    <p  style="margin-left: 0.87in; text-indent: -0.43in; margin-top: 0.04in; margin-bottom: 0.04in; line-height: 150%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">3)
      __________________________________________________________________</span></span></p>
    <p  style="margin-top: 0.13in; margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>2. What purposes I donate
      organs/tissues for: </b></span><span style="font-family:'Times New Roman, serif'">(Select
      a, b, or c below)</span></p>
    <p  style="margin-top: 0.13in; margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>_____ a. </b></span><span style="font-family:'Times New Roman, serif'">Any
      legally authorized purpose (transplantation, therapy, medical and
      dental evaluation and research, and/or advancement of medical and
      dental science).</span></p>
    <p  style="margin-top: 0.13in; margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>_____ b. </b></span><span style="font-family:'Times New Roman, serif'">Transplant
      or therapeutic purposes only.</span></p>
    <p  style="margin-top: 0.13in; margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>_____ c. </b></span><span style="font-family:'Times New Roman, serif'">Other:
      _________________________________________________</span></p>
    <p  style="text-indent: 0in; margin-top: 0.13in; margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>3. What organization or person
      I want my parts or organs to go to:</b></span></p>
    <p  style="margin-top: 0.13in; margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>_____ a.</b></span><span style="font-family:'Times New Roman, serif'">
      I have already signed a written agreement or donor card regarding
      organ and tissue donation with the following individual or
      institution:</span></p>
    <p  style="margin-top: 0.08in; margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">(Name):
      ____________________________________________________________</span></p>
    <p  style="margin-top: 0.13in; margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>_____ b.</b></span><span style="font-family:'Times New Roman, serif'">
        I would like my tissues or organs to go to the following individual
        or institution:</span></p>
    <p  style="margin-top: 0.08in; margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">(Name)
      ____________________________________________________________</span></p>
    <p  style="margin-top: 0.13in; margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>_____ c.</b></span><span style="font-family:'Times New Roman, serif'">
	      I authorize my representative to make this decision.</span></p>
  </div>

</div>
<!-- Page 3-->

<!-- Page 4-->
<div>
  <div>
    <p  style=" margin-top: 0.13in; margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>7.	Funeral and Burial
      Disposition: (Optional)</b></span></p>
    <!--<p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">«</span><span ><span style="font-family:'Times New Roman, serif'">IF
      Cremate?</span></span><span style="font-family:'Times New Roman, serif'">»</span></p>-->

    <div>
    @if($finalArrangements['type'] == '1')
      <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'"><i>(Pursuant to §32-1365.01,
        Arizona Revised Statutes)</i></span></p>
      <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'">_______	I wish to be cremated.</span></p>
      <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'">_______	I have executed written
        &quot;Final Disposition Instructions&quot; and I direct that my agent
        and family follow these instructions for my disposition arrangements.</span></p>
    @endif
    </div>

    <div>
    @if($finalArrangements['type'] == '1')
    <!--<p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">«</span><span ><span style="font-family:'Times New Roman, serif'">ELSE
      IF !Cremate?</span></span><span style="font-family:'Times New Roman, serif'">»</span></p>-->
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><i>(Pursuant to §32-1365.01,
      Arizona Revised Statutes)</i></span></p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">_______	I wish to be buried (as
      opposed to cremated).</span></p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">_______	I have executed written
      &quot;Final Disposition Instructions&quot; and I direct that my agent
      and family follow these instructions for my disposition arrangements.</span></p>
    @endif
    </div>

    <!--<p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">«</span><span ><span style="font-family:'Times New Roman, serif'">END
      IF</span></span><span style="font-family:'Times New Roman, serif'">»</span></p>-->
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p  style="margin-top: 0.13in; margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>8.	About a Living Will:</b></span></p>
    <p  style="margin-top: 0.13in; margin-bottom: 0.04in; border: 1px solid #00000a; padding: 0.01in 0.06in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">NOTE:
      If you have a Living Will and a Durable Health Care Power of
      Attorney, you must attach the Living Will to this form. A Living Will
      form is available on the Attorney General (AG) web site. </span></span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt"><b>Initial
      or put a check mark by box A or B.</b></span></span></p>
    <p  style="margin-top: 0.13in; margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>_____ A</b></span><span style="font-family:'Times New Roman, serif'">.
      I have SIGNED AND ATTACHED a completed Living Will in addition to
      this Durable Health Care Power of Attorney to state decisions I have
      made about end of life health care if I am unable to communicate or
      make my own decisions at that time.</span></p>
    <p  style="margin-top: 0.13in; margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>_____ B. </b></span><span style="font-family:'Times New Roman, serif'">I
      have NOT SIGNED a Living Will.</span></p>
    <p  style="margin-top: 0.13in; margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
      <br/>
      <br/>

    </p>
    <p  style="margin-top: 0.13in; margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>9.	About a Prehospital Medical
      Care Directive or Do Not Resuscitate Directive:</b></span></p>
    <p  style="margin-top: 0.13in; margin-bottom: 0.04in; border: 1px solid #00000a; padding: 0.01in 0.06in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">NOTE:
      A form for the Prehospital Medical Care Directive or Do Not
      Resuscitate Directive is available on the AG Web site. </span></span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt"><b>Initial
      or put a check mark by box A or B.</b></span></span></p>
    <p  style="margin-top: 0.13in; margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>_____ A. </b></span><span style="font-family:'Times New Roman, serif'"><b>I
      and my doctor or health care provider HAVE SIGNED a Prehospital
      Medical Care Directive or Do Not Resuscitate Directive on paper with
      ORANGE background in the event that 911 or Emergency Medical
      Technicians or hospital emergency personnel are called and my heart
      or breathing has stopped.</b></span></p>
    <p  style="margin-top: 0.13in; margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>_____ B.</b></span><span style="font-family:'Times New Roman, serif'">
      I have NOT SIGNED a Prehospital Medical Care Directive or Do Not
      Resuscitate Directive.</span></p>
  </div>

</div>
<!-- Page 4-->

<!-- Page 5-->
<div>
  <div>
    <p  style=" margin-top: 0.13in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0; page-break-before: always">
      <span style="font-family:'Times New Roman, serif'"><b>10.	Additional information
      </b></span><span style="font-family:'Times New Roman, serif'">about my health care
      treatment needs (consider including mental or physical health
      history, dietary requirements, religious concerns, people to notify
      and any other matters that you feel are important):</span></p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
    <span style="font-family:'Times New Roman, serif'; line-height: 30px;">
      _____________________________________________________________________________<br>
      _____________________________________________________________________________<br>
      _____________________________________________________________________________<br>
      _____________________________________________________________________________<br>
      _____________________________________________________________________________<br>
      _____________________________________________________________________________
	    </span><span style="font-family:'Times New Roman, serif'">	</span></p>
    <p style="margin-bottom: 0.13in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt">(Add
      additional pages if necessary)</span></span></p>
    <p style="margin-bottom: 0.13in; line-height: 100%; orphans: 0; widows: 0">
      <br/>
      <br/>

    </p>
    <p style="margin-bottom: 0.13in; line-height: 100%; orphans: 0; widows: 0">
      <br/>
      <br/>

    </p>
    <p  style=" margin-top: 0.13in; margin-bottom: 0.13in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>11.	Nomination of Guardian</b></span></p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>_______ (Initial) </b></span><span style="font-family:'Times New Roman, serif'">If
      a guardian is to be appointed for me, I nominate my agent to serve as
      such guardian.</span></p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p  style="margin-top: 0.13in; margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>12.	HIPAA Waiver Of
      Confidentiality</b></span></p>
    <p  style="margin-left: 1.08in; text-indent: -1.08in; margin-top: 0.13in; margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>_______ (Initial) </b></span><span style="font-family:'Times New Roman, serif'">I
      intend for my agent to be treated as I would be with respect to my
      rights regarding the use and disclosure of my individually
      identifiable health information or other medical records. This
      release authority applies to any information governed by the Health
      Insurance Portability and Accountability Act of 1996 (aka “HIPAA”),
      42 USC 1320d and 45 CFR 160-164.</span></p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%; text-align: center;"><span style="font-family:'Times New Roman, serif'"><b>[signature
      pages follow]</b></span></p>
  </div>

</div>
<!-- Page 5-->

<!-- Page 6-->
<div>
  <div>
    <p  style="text-indent: -0.33in; margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0; text-align: center;">
      <span style="font-family:'Times New Roman, serif'"><b>SIGNATURE OR VERIFICATION</b></span></p>
    <p style="margin-top: 0.13in; margin-bottom: 0in; line-height: 126%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p style="margin-top: 0.13in; margin-bottom: 0in; line-height: 126%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>A.</b></span><span style="font-family:'Times New Roman, serif'">
        I am signing this Durable Health Care Power of Attorney as follows:</span></p>
    <p  style="margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">My Signature: </span><span style="font-family:'Times New Roman, serif'">_____________________________</span></p>
    <p  style="margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Date: </span><span style="font-family:'Times New Roman, serif'">______________________</span></p>
    <p  style="text-indent: -0.33in; margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <br/>
      <br/>

    </p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>B.</b></span><span style="font-family:'Times New Roman, serif'">
       I, </span>

      <span style="font-family:'Times New Roman, serif';text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}},</span>

      <span style="font-family:'Times New Roman, serif'">
      am physically unable to sign this Durable Health Care Power of
      Attorney, so a witness is verifying my desires as follows:</span></p>
    <p style="margin-top: 0.13in; margin-bottom: 0in; line-height: 126%; orphans: 0; widows: 0">

    </p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>Witness Verification</b></span><span style="font-family:'Times New Roman, serif'">:
        I believe that this Durable Health Care Power of Attorney accurately
        expresses the wishes communicated to me by </span>
        <span style="font-family:'Times New Roman, serif';">{{strtoupper($tellUsAboutYou['fullname'])}}. {{ucwords($genderTxt3)}} intends to adopt this Durable Health Care Power of Attorney at this time. {{ucwords($genderTxt3)}} is physically unable to sign or mark this document at this time. I verify that {{$genderTxt3}} directly indicated to me that the Durable Health Care Power of Attorney expresses {{$genderTxt4}} wishes and that {{$genderTxt4}} intends to adopt the Durable Health Care Power of Attorney at this time. I further affirm that {{$genderTxt3}} appears to be of sound mind and not under duress, fraud, or undue influence. {{ucwords($genderTxt3)}} is not related to me by blood, marriage, or adoption and is not a person for whom I directly provide care in a professional capacity. I have not been appointed as the representative to make medical decisions on {{$genderTxt4}} behalf.</span>

    <p  style="margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Witness Signature: </span><span style="font-family:'Times New Roman, serif'">__________________________________</span><span style="font-family:'Times New Roman, serif'">  Date: </span><span style="font-family:'Times New Roman, serif'">____________________</span></p>
    <p  style="margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <br/>
      <br/>

    </p>
    <p  style="margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Witness Name (printed) </span><span style="font-family:'Times New Roman, serif'">_______________________________________________________</span></p>
  </div>

</div>
<!-- Page 6-->

<!-- Page 7-->
<div>
  <div>
    <p  style="margin-top: 0.08in; margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0; text-align: center;">
      <span style="font-family:'Times New Roman, serif'"><b>SIGNATURE OF WITNESS</b></span><span style="font-family:'Times New Roman, serif'">
      </span><span style="font-family:'Times New Roman, serif'"><b>OR</b></span><span style="font-family:'Times New Roman, serif'"><b>
      NOTARY PUBLIC</b></span><span style="font-family:'Times New Roman, serif'">: </span>
    </p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p  style="margin-bottom: 0.08in; border: 1px solid #00000a; padding: 0.01in 0.06in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt"><b>NOTE:
      </b></span></span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">At
      least one adult witness OR a Notary Public must witness the signing
      of this document and then sign it. The witness or Notary Public
      CANNOT be anyone who is: (a) under the age of 18; (b) related to you
      by blood, adoption, or marriage; (c) entitled to any part of your
      estate; (d) appointed as your representative; or (e) involved in
      providing your health care at the time this document is signed.</span></span></p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>Witness:</b></span><span style="font-family:'Times New Roman, serif'">
        I certify that I witnessed the signing of this Durable Health Care
        Power of Attorney by </span>


        <span style="font-family:'Times New Roman, serif';text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}},</span>


        <span style="font-family:'Times New Roman, serif'">
        the Principal. </span>

        <span style="font-family:'Times New Roman, serif';text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}}</span>

        <span style="font-family:'Times New Roman, serif'">
        appeared to be of sound mind and under no pressure to make specific
        choices or sign the document. I understand the requirements of being
        a witness and I confirm the following:</span></p>
    <ul style="margin-left: 50px;">
      <li>
      <p  style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'">I am not currently designated to
        make medical decisions for this person.</span></p>
      </li>
      <li>
      <p  style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'">I am not directly involved in
        administering health care to this person.</span></p>
      </li>
      <li>
      <p  style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'">I am not entitled to any portion
        of this person's estate upon </span><span ><span style="font-family:'Times New Roman, serif'">{{$genderTxt4}}</span></span><span style="font-family:'Times New Roman, serif'">
        death under a will or by operation of law.</span></p>
      </li>
      <p  style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'">I am not related to this person
        by blood, marriage or adoption.</span></p>
    </ul>
    <p  style="margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Witness Signature: </span><span style="font-family:'Times New Roman, serif'">___________________________________</span><span style="font-family:'Times New Roman, serif'">  Date: </span><span style="font-family:'Times New Roman, serif'">____________________</span></p>
    <p  style="margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Witness Name (printed) </span><span style="font-family:'Times New Roman, serif'">________________________________________________________</span></p>
    <p  style="margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Address: </span><span style="font-family:'Times New Roman, serif'">____________________________________________________________________</span></p>
    <p style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">____________________________________________________________________________</span></p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>Notary Public (</b></span><span style="font-family:'Times New Roman, serif'">NOTE:
      If a witness signs your form, you DO NOT need a notary to sign):</span></p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt">STATE
      OF ARIZONA	<span style="padding-left:140px;">)</span></span></span></p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt">	<span style="padding-left:266px;">)</span>
      ss. </span></span>
    </p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt">COUNTY
      OF  	<span style="padding-left:187px;">)</span></span></span></p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt">The
        undersigned, being a Notary Public certified in Arizona, declares
        that </span></span>

        <span>
        <span  size="2"  style="font-family:'Times New Roman, serif';font-size: 10pt;text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}},</span>
        </span>


        <span style="font-family:'Times New Roman, serif'">
        	<span size="2" style="font-size: 10pt">
		        the person making this Durable Health Care Power of Attorney, has
		        dated and signed or marked it in my presence and appears to me to be
		        of sound mind and free from duress. I further declare I am not
		        related to </span>
		</span>

		<span>
			<span style="font-family:'Times New Roman, serif'">
				<span size="2" style="font-size: 10pt">
            		<span>{{$genderTxt4}}</span>
        		</span>
        	</span>
        </span>

        <span style="font-family:'Times New Roman, serif'">
        	<span size="2" style="font-size: 10pt">,
	        by blood, marriage or adoption, or a person designated to make
	        medical decisions on </span>
	    </span>

	    <span>
	    	<span style="font-family:'Times New Roman, serif'">
	    		<span size="2" style="font-size: 10pt">
          			<span>{{$genderTxt4}}</span>
        		</span>
        	</span>
        </span>

        <span style="font-family:'Times New Roman, serif'">
        	<span size="2" style="font-size: 10pt">
		        behalf. I am not directly involved in providing care as a
		        professional to </span>
		</span>

		<span>
			<span style="font-family:'Times New Roman, serif'">
				<span size="2" style="font-size: 10pt">
          			<span>{{$genderTxt}}.</span>
        		</span>
        	</span>
        </span>

        <span style="font-family:'Times New Roman, serif'">
        	<span size="2" style="font-size: 10pt">I am not entitled to any part of </span>
        </span>

        <span>
        	<span style="font-family:'Times New Roman, serif'">
        		<span size="2" style="font-size: 10pt">
          			<span>{{$genderTxt4}}</span>
        		</span>
        	</span>
        </span>

        <span style="font-family:'Times New Roman, serif'">
        	<span size="2" style="font-size: 10pt">
	        estate under a will now existing or by operation of law.. In the
	        event the person acknowledging this Durable Health Care Power of
	        Attorney is physically unable to sign or mark this document, I verify
	        that </span>
	    </span>

	    <span>
	    	<span style="font-family:'Times New Roman, serif'">
	    		<span size="2" style="font-size: 10pt">
          			<span>{{$genderTxt3}}</span>
        		</span>
        	</span>
        </span>

        <span style="font-family:'Times New Roman, serif'">
        	<span size="2" style="font-size: 10pt">»
		        directly indicated to me that the Durable Health Care Power of
		        Attorney expresses
		    </span>
		</span>

		<span>
			<span style="font-family:'Times New Roman, serif'">
				<span size="2" style="font-size: 10pt">
          			<span>{{$genderTxt4}}</span>
        		</span>
        	</span>
        </span>

        <span style="font-family:'Times New Roman, serif'">
        	<span size="2" style="font-size: 10pt"> wishes and that </span>
        </span>

        <span>
        	<span style="font-family:'Times New Roman, serif'">
        		<span size="2" style="font-size: 10pt">
          			<span>{{$genderTxt3}}</span>
        		</span>
        	</span>
        </span>

        <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt">
        intends to adopt the Durable Health Care Power of Attorney at this
        time.</span></span>
    </p>


    <p  style="margin-top: 0.15in; margin-bottom: 0in; line-height: 110%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt">WITNESS
      MY HAND AND SEAL this </span></span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt">
          __________</span></span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt">
      day of </span></span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt">_____________________________</span></span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt">,
      </span></span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt">_____________</span></span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt">.</span></span></p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt">Notary
      Public </span></span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt">_________________________________________</span></span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt">
       My Commission Expires: </span></span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt">__________________</span></span></p>
  </div>

</div>
<!-- Page 7-->

<!-- Page 8-->
<div style="page-break-after: always;">
  <div>
    <p  style="margin-bottom: 0in; line-height: 100%; text-align: center;">
      <span style="font-family:'Times New Roman, serif'"><b>OPTIONAL:</b></span></p>
    <p  style="margin-top: 0.08in; margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0; text-align: center;">
        <span style="font-family:'Times New Roman, serif'"><b>STATEMENT THAT YOU HAVE
        DISCUSSED</b></span></p>
    <p  style="margin-top: 0.04in; margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0; text-align: center;">
        <span style="font-family:'Times New Roman, serif'"><b>YOUR HEALTH CARE CHOICES FOR
        THE FUTURE</b></span></p>
    <p  style="margin-top: 0.04in; margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0; text-align: center;">
      <span style="font-family:'Times New Roman, serif'"><b>WITH YOUR PHYSICIAN</b></span></p>
    <p  style="margin-top: 0.08in; margin-bottom: 0in; border: 1px solid #00000a; padding: 0.01in 0.06in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>NOTE: Before deciding what
      health care you want for yourself, you may wish to ask your physician
      questions regarding treatment alternatives. This statement from your
      physician is not required by Arizona law. If you do speak with your
      physician, it is a good idea to have him or her complete this
      section. Ask your doctor to keep a copy of this form with your
      medical records.</b></span></p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">On this date I reviewed this
      document with the Principal and discussed any questions regarding the
      probable medical consequences of the treatment choices provided
      above. I agree to comply with the provisions of this directive, and I
      will comply with the health care decisions made by the representative
      unless a decision violates my conscience. In such case I will
      promptly disclose my unwillingness to comply and will transfer or try
      to transfer patient care to another provider who is willing to act in
      accordance with the representative's direction.</span></p>
    <p style="margin-top: 0.08in; margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Doctor Name (printed):
      _____________________________________________________</span></p>
    <p style="margin-top: 0.17in; margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Signature:
      _________________________________ Date: _________________________</span></p>
    <p style="margin-top: 0.08in; margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p style="margin-top: 0.08in; margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0;">
      <span style="font-family:'Times New Roman, serif'">Address:
      ________________________________________________________________</span></p>
  </div>

</div>
<!-- Page 8-->

<!-- Page 9-->
<div>
  <div>
    <p  style="margin-bottom: 0in; line-height: 100%; text-align: center;">
      <span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 14pt"><b>STATE
      OF ARIZONA</b></span></span></p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0; text-align: center;">
      <span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 14pt"><b>LIVING
      WILL (End of Life Care)</b></span></span></p>
    <p  style="margin-bottom: 0.17in; line-height: 100%; orphans: 0; widows: 0; text-align: center;">
      <span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 14pt"><b>Instructions
      and Form</b></span></span></p>
    <div style="border: 1px solid #000; padding-top: 7px;">
      <p  style="margin-bottom: 0.08in; padding: 0.01in 0.06in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'"><b>GENERAL INSTRUCTIONS</b></span><span style="font-family:'Times New Roman, serif'">:
          Use this Living Will form to make decisions now about your medical
          care if you are ever in a terminal condition, a persistent vegetative
          state or an irreversible coma. You should talk to your doctor about
          what these terms mean. The Living Will states what choices you would
          have made for yourself if you were able to communicate. It is your
          written directions to your health care representative if you have
          one, your family, your physician, and any other person who might be
          in a position to make medical care decisions for you. Talk to your
          family members, friends, and others you trust about your choices.
          Also, it is a good idea to talk with professionals such as your
          doctor, clergyperson and a lawyer before you complete and sign this
          Living Will.</span></p>
      <p  style="margin-bottom: 0in; padding: 0.01in 0.06in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'">If you decide this is the form
        you want to use, complete the form. Do not sign the Living Will until
        your witness or a Notary Public is present to watch you sign it.
        There are further instructions for you about signing on page 2.</span></p>
      <p  style="margin-top: 0.17in; margin-bottom: 0.13in; padding: 0.01in 0.06in; line-height: 100%; orphans: 0; widows: 0; text-align: center;">
        <span style="font-family:'Times New Roman, serif'"><b>IMPORTANT: If you have a
        Living Will and a Durable Health Care Power of Attorney, you must
        attach the Living Will to the Durable Health Care Power of Attorney.</b></span></p>
    </div>
    <p style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>1.	Information about me: </b></span><span style="font-family:'Times New Roman, serif'">(I
      am called the “Principal”)</span></p>

    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <br/>
      <br/>
    </p>

    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'">My Name: 		</span>
        <span style="font-family:'Times New Roman, serif';text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}}</span>
    </p>

    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">My Date of Birth: 	</span>
      <span style="font-family:'Times New Roman, serif';text-transform: capitalize">{{date('jS M, Y', strtotime($tellUsAboutYou['dob']))}}</span>
    </p>

    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">My Address:         	</span>

      <span style="font-family:'Times New Roman, serif';text-transform: capitalize">{{$tellUsAboutYou['address']}}</span>


    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif';text-transform: capitalize">{{$tellUsAboutYou['city']}}</span>,

      <span style="font-family:'Times New Roman, serif';text-transform: capitalize">{{$tellUsAboutYou['state']}}</span>,

      <span style="font-family:'Times New Roman, serif';text-transform: capitalize">{{$tellUsAboutYou['zip']}}</span>
    </p>

    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">My Telephone: 		</span>
      <span style="font-family:'Times New Roman, serif';text-transform: capitalize">{{$tellUsAboutYou['phone']}}</span>
    </p>
    <p  style="margin-top: 0.13in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <br/>
      <br/>

    </p>
    <p  style="margin-top: 0.13in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>2. My decisions about End of
      Life Care</b></span><span style="font-family:'Times New Roman, serif'">:</span></p>
    <p  style="margin-bottom: 0.13in; border: 1px solid #00000a; padding: 0.01in 0.06in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>NOTE</b></span><span style="font-family:'Times New Roman, serif'">:
        Here are some general statements about choices you have as to health
        care you want at the end of your life. They are listed in the order
        provided by Arizona law. You can initial any combination of
        Paragraphs A, B, C and D. If you initial Paragraph E, do not initial
        any other paragraphs. Read all of the statements carefully before
        initialing to indicate your choice. You can also write your own
        statement concerning life-sustaining treatments and other matters
        relating to your health care at Section 3 of this form.</span></p>
  </div>

</div>
<!-- Page 9-->

<!-- Page 10-->
<div>
  <div>
    <p  style="margin-top: 0.04in; margin-bottom: 0.13in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>______ A. Comfort Care Only</b></span><span style="font-family:'Times New Roman, serif'">:
      If I have a terminal condition I do not want my life to be prolonged,
      and I do not want life-sustaining treatment, beyond comfort care,
      that would serve only to artificially delay the moment of my death.
      (NOTE: “Comfort care” means treatment in an attempt to protect
      and enhance the quality of life without artificially prolonging
      life.)</span></p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>______ B. Specific Limitations
      on Medical Treatments I Want</b></span><span style="font-family:'Times New Roman, serif'">:
      (NOTE: </span><span style="font-family:'Times New Roman, serif'"><b>Initial or mark
      one or more choices</b></span><span style="font-family:'Times New Roman, serif'">,
      talk to your doctor about your choices.) If I have a terminal
      condition, or am in an irreversible coma or a persistent vegetative
      state that my doctors reasonably believe to be irreversible or
      incurable, I do want the medical treatment necessary to provide care
      that would keep me comfortable, but I do not want the following:</span></p>
    <p  style="margin-left: 0.5in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">______ 1.) Cardiopulmonary
      resuscitation, for example, the use of drugs, electric shock, and
      artificial breathing.</span></p>
    <p  style="text-indent: 0.5in; margin-bottom: 0.13in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">______ 2.) Artificially
      administered food and fluids.</span></p>
    <p  style="text-indent: 0.5in; margin-top: 0.08in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">______ 3.) To be taken to a
      hospital if it is at all avoidable.</span></p>
    <p  style="margin-bottom: 0.13in; line-height: 100%; orphans: 0; widows: 0">
      <br/>
      <br/>

    </p>
    <p  style="margin-bottom: 0.13in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>_______ C. Pregnancy</b></span><span style="font-family:'Times New Roman, serif'">:
      Regardless of any other directions I have given in this Living Will,
      if I am known to be pregnant I do not want life-sustaining treatment
      withheld or withdrawn if it is possible that the embryo/fetus will
      develop to the point of live birth with the continued application of
      life-sustaining treatment.</span></p>
    <p  style="margin-bottom: 0.13in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>_______ D. Treatment Until My
      Medical Condition is Reasonably Known</b></span><span style="font-family:'Times New Roman, serif'">:
      Regardless of the directions I have made in this Living Will, I do
      want the use of all medical care necessary to treat my condition
      until my doctors reasonably conclude that my condition is terminal or
      is irreversible and incurable, or I am in a persistent vegetative
      state.</span></p>
    <p  style="margin-bottom: 0.13in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>_______ E. Direction to
      Prolong My Life</b></span><span style="font-family:'Times New Roman, serif'">: I
      want my life to be prolonged to the greatest extent possible.</span></p>
    <p style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <br/>
      <br/>

    </p>
    <p style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>3. Other Statements Or Wishes
      I Want Followed For End of Life Care</b></span><span style="font-family:'Times New Roman, serif'">:</span></p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>NOTE</b></span><span style="font-family:'Times New Roman, serif'">:
        You can attach additional provisions or limitations on medical care
        that have not been included in this Living Will form. Initial or put
        a check mark by box A or B below. Be sure to include the attachment
        if you check B.</span></p>
    <p  style="margin-top: 0.13in; margin-bottom: 0.13in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>_______ A</b></span><span style="font-family:'Times New Roman, serif'">.
        I have not attached additional special provisions or limitations
        about End of Life Care I want.</span></p>
    <p  style="margin-bottom: 0.17in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>_______ B</b></span><span style="font-family:'Times New Roman, serif'">.
      I have attached additional special provisions or limitations about
      End of Life Care I want.</span></p>
  </div>


</div>
<!-- Page 10-->

<!-- Page 11-->
<div>
  <div>
    <p  style="margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0; text-align: center;">
      <span style="font-family:'Times New Roman, serif'"><b>SIGNATURE OR VERIFICATION</b></span></p>
    <p style="margin-top: 0.13in; margin-bottom: 0in; line-height: 126%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p style="margin-top: 0.13in; margin-bottom: 0in; line-height: 126%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>A.</b></span><span style="font-family:'Times New Roman, serif'">
        I am signing this Living Will as follows:</span></p>
    <p  style="margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">My Signature: </span><span style="font-family:'Times New Roman, serif'">__________________________________________</span></p>
    <p  style="margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Date: </span><span style="font-family:'Times New Roman, serif'">_________________________________________________</span></p>
    <p  style="text-indent: -0.33in; margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <br/>
      <br/>

    </p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>B.</b></span><span style="font-family:'Times New Roman, serif'">
       I, </span>

      <span style="font-family:'Times New Roman, serif';text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}},</span>

      <span style="font-family:'Times New Roman, serif'">
      am physically unable to sign this Living Will, so a witness is
      verifying my desires as follows:</span></p>
    <p style="margin-top: 0.13in; margin-bottom: 0in; line-height: 126%; orphans: 0; widows: 0">

    </p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'">I believe that this Living Will
        accurately expresses the wishes communicated to me by </span>
        <span style="font-family:'Times New Roman, serif';text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}},</span>


        <span style="font-family:'Times New Roman, serif'">
        the principal of this document. </span>

        <span>
        	<span style="font-family:'Times New Roman, serif'">
        		<span>{{ucwords($genderTxt3)}}</span>
        	</span>
        </span>

        <span style="font-family:'Times New Roman, serif'">
        intends to adopt this Living Will at this time. </span>

        <span>
        	<span style="font-family:'Times New Roman, serif'">
          		<span>{{ucwords($genderTxt3)}}</span>
        	</span>
        </span>

        <span style="font-family:'Times New Roman, serif'">
        is physically unable to sign or mark this document at this time. I
        verify that </span>

        <span>
        	<span style="font-family:'Times New Roman, serif'">
          		<span>{{$genderTxt3}}</span>
        	</span>
        </span>

        <span style="font-family:'Times New Roman, serif'">
        directly indicated to me that the Living Will expresses </span>

        <span>
        	<span style="font-family:'Times New Roman, serif'">
          		<span>{{$genderTxt4}}</span>
        	</span>
        </span>

        <span style="font-family:'Times New Roman, serif'">
        wishes and that </span>

        <span>
        	<span style="font-family:'Times New Roman, serif'">
          		<span>{{$genderTxt4}}</span>
        	</span>
        </span>

        <span style="font-family:'Times New Roman, serif'">
        intends to adopt the Living Will at this time. I further affirm that
        </span>

        <span>
        	<span style="font-family:'Times New Roman, serif'">
          		<span>{{$genderTxt4}}</span>
        	</span>
        </span>

        <span style="font-family:'Times New Roman, serif'">
        appears to be of sound mind and not under duress, fraud, or undue
        influence. </span>

        <span>
        	<span style="font-family:'Times New Roman, serif'">
          		<span>{{ucwords($genderTxt4)}}</span>
        	</span>
        </span>

        <span style="font-family:'Times New Roman, serif'">
        is not related to me by blood, marriage, or adoption and is not a
        person for whom I directly provide care in a professional capacity. I
        have not been appointed as the representative to make medical
        decisions on </span>

        <span>
        	<span style="font-family:'Times New Roman, serif'">
          		<span>{{$genderTxt3}}</span>
        	</span>
        </span>
        <span style="font-family:'Times New Roman, serif'">
        behalf.</span>
    </p>
    <p  style="margin-top: 0.13in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <br/>
      <br/>

    </p>
    <p  style="margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Witness Signature: </span><span style="font-family:'Times New Roman, serif'">__________________________________</span><span style="font-family:'Times New Roman, serif'">  Date: </span><span style="font-family:'Times New Roman, serif'">____________________</span></p>
    <p  style="margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <br/>
      <br/>

    </p>
    <p  style="margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Witness Name (printed) </span><span style="font-family:'Times New Roman, serif'">_______________________________________________________</span></p>
    <p style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p  style="margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Address  </span><span style="font-family:'Times New Roman, serif'">____________________________________________________________________</span></p>
  </div>
</div>
<!-- Page 11-->

<!-- Page 12-->
<div>
  <div>
    <p  style="margin-top: 0.08in; margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0; text-align: center;">
      <span style="font-family:'Times New Roman, serif'"><b>SIGNATURE OF WITNESS</b></span><span style="font-family:'Times New Roman, serif'">
      </span><span style="font-family:'Times New Roman, serif'"><b>OR</b></span><span style="font-family:'Times New Roman, serif'"><b>
      NOTARY PUBLIC</b></span><span style="font-family:'Times New Roman, serif'">: </span>
    </p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p  style="margin-bottom: 0.08in; border: 1px solid #00000a; padding: 0.01in 0.06in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt"><b>NOTE:
      </b></span></span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">At
      least one adult witness OR a Notary Public must witness the signing
      of this document and then sign it. The witness or Notary Public
      CANNOT be anyone who is: (a) under the age of 18; (b) related to you
      by blood, adoption, or marriage; (c) entitled to any part of your
      estate; (d) appointed as your representative; or (e) involved in
      providing your health care at the time this document is signed.</span></span></p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>

    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      	<span style="font-family:'Times New Roman, serif'"><b>Witness:</b></span>

      	<span style="font-family:'Times New Roman, serif'">
        I certify that I witnessed the signing of this Living Will by </span>

        <span style="font-family:'Times New Roman, serif';text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}},</span>

        <span style="font-family:'Times New Roman, serif'">
        the Principal. </span>

        <span style="font-family:'Times New Roman, serif';text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}}</span>


        <span style="font-family:'Times New Roman, serif'">
        appeared to be of sound mind and under no pressure to make specific
        choices or sign the document. I understand the requirements of being
        a witness and I confirm the following:</span></p>
    <ul style="padding-left: 50px;">
      <li>
      <p  style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'">I am not currently designated to
        make medical decisions for this person.</span></p>
      </li>
      <li>
      <p  style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'">I am not directly involved in
        administering health care to this person.</span></p>
      </li>
      <li>
      	<p style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'">I am not entitled to any portion
        of this person's estate upon </span>
        <span>
        	<span style="font-family:'Times New Roman, serif'">
        		<span>{{$genderTxt4}}</span>
      		</span>
      	</span>
      	<span style="font-family:'Times New Roman, serif'">
        death under a will or by operation of law.</span>
    	</p>
      </li>
      <p  style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'">I am not related to this person
        by blood, marriage or adoption.</span></p>
    </ul>
    <p  style="margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Witness Signature: </span><span style="font-family:'Times New Roman, serif'">_________________________________</span><span style="font-family:'Times New Roman, serif'">  Date: </span><span style="font-family:'Times New Roman, serif'">______________________</span></p>
    <p  style="margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Witness Name (printed) </span><span style="font-family:'Times New Roman, serif'">________________________________________________________</span></p>
    <p  style="margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Address: </span><span style="font-family:'Times New Roman, serif'">____________________________________________________________________</span></p>
    <p style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">____________________________________________________________________________</span></p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>Notary Public (</b></span><span style="font-family:'Times New Roman, serif'">NOTE:
        If a witness signs your form, you DO NOT need a notary to sign):</span></p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt">STATE
        OF ARIZONA	<span style="padding-left: 100px;"></span>)</span></span></p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt; padding-left: 227px;">	)
        ss. </span></span>
    </p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt">COUNTY
        OF  	<span style="padding-left: 148px;"></span>)</span></span></p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt">The
      undersigned, being a Notary Public certified in Arizona, declares
      that </span></span>

      <span>
      	<span style="font-family:'Times New Roman, serif'">
      		<span size="2" style="font-family:'Times New Roman, serif';text-transform: capitalize;font-size: 10pt">{{strtoupper($tellUsAboutYou['fullname'])}}</span>
      	</span>
      </span>

      <span style="font-family:'Times New Roman, serif'">
      	<span size="2" style="font-size: 10pt">,</span>
      </span>

      <span style="font-family:'Times New Roman, serif'">
      	<span size="2" style="font-size: 10pt">
	      the person making this Living Will, has dated and signed or marked it
	      in my presence and appears to me to be of sound mind and free from
	      duress. I further declare I am not related to </span>
	  </span>

	  <span>
	  	<span style="font-family:'Times New Roman, serif'">
	  		<span size="2" style="font-size: 10pt">
        		<span>{{$genderTxt}}</span>
      		</span>
      	</span>
      </span>

      <span style="font-family:'Times New Roman, serif'">
      	<span size="2" style="font-size: 10pt">, by blood, marriage or adoption, or a person designated to make
      	medical decisions on </span>
      </span>

      <span>
      	<span style="font-family:'Times New Roman, serif'">
      		<span size="2" style="font-size: 10pt">
        		<span>{{$genderTxt4}}</span>
      		</span>
      	</span>
      </span>

      <span style="font-family:'Times New Roman, serif'">
      	<span size="2" style="font-size: 10pt"> behalf. I am not directly involved in providing care as a
      	professional to </span>
      </span>

      <span>
      	<span style="font-family:'Times New Roman, serif'">
      		<span size="2" style="font-size: 10pt">
        		<span>{{$genderTxt}}.</span>
      		</span>
      	</span>
      </span>

      <span style="font-family:'Times New Roman, serif'">
      	<span size="2" style="font-size: 10pt">I am not entitled to any part of </span>
      </span>

      <span>
      	<span style="font-family:'Times New Roman, serif'">
      		<span size="2" style="font-size: 10pt">
      			<span>{{$genderTxt4}}</span>
      		</span>
      	</span>
      </span>

      <span style="font-family:'Times New Roman, serif'">
      	<span size="2" style="font-size: 10pt">
	      estate under a will now existing or by operation of law. In the event
	      the person acknowledging this Living Will is physically unable to
	      sign or mark this document, I verify that </span>
	  </span>

	  <span>
	  	<span style="font-family:'Times New Roman, serif'">
	  		<span size="2" style="font-size: 10pt">
        		<span>{{$genderTxt3}}</span>
      		</span>
      	</span>
      </span>

      <span style="font-family:'Times New Roman, serif'">
      	<span size="2" style="font-size: 10pt"> directly indicated to me that the Living Will expresses </span>
      </span>

      <span>
      	<span style="font-family:'Times New Roman, serif'">
      		<span size="2" style="font-size: 10pt">
        		<span>{{$genderTxt4}}</span>
      		</span>
      	</span>
      </span>

      <span style="font-family:'Times New Roman, serif'">
      	<span size="2" style="font-size: 10pt"> wishes and that </span>
      </span>

      <span>
      	<span style="font-family:'Times New Roman, serif'">
      		<span size="2" style="font-size: 10pt">
        		<span>{{$genderTxt3}}</span>
      		</span>
      	</span>
      </span>

      <span style="font-family:'Times New Roman, serif'">
      	<span size="2" style="font-size: 10pt">
      		intends to adopt the Living Will at this time.</span>
      </span>
      </p>

    <p  style="margin-top: 0.15in; margin-bottom: 0in; line-height: 110%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">
      	<span size="2" style="font-size: 10pt">WITNESS MY HAND AND SEAL this </span>
      </span>

      <span style="font-family:'Times New Roman, serif'">
      	<span size="2" style="font-size: 10pt">
      		___________________________
      	</span>
      </span>

      <span style="font-family:'Times New Roman, serif'">
      	<span size="2" style="font-size: 10pt"> day of </span>
      </span>

      <span style="font-family:'Times New Roman, serif'">
      	<span size="2" style="font-size: 10pt">_______________</span>
      </span>

      <span style="font-family:'Times New Roman, serif'">
      	<span size="2" style="font-size: 10pt">, </span>
      </span>

      <span style="font-family:'Times New Roman, serif'">
      	<span size="2" style="font-size: 10pt">__________</span>
      </span>

      <span style="font-family:'Times New Roman, serif'">
      	<span size="2" style="font-size: 10pt">.</span>
      </span>
  	</p>

    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>
    </p>

    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt">Notary
      Public </span></span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt">___________________________________</span></span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt">
       My Commission Expires: </span></span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt">________________________</span></span></p>
  </div>
</div>
<!-- Page 12-->

<!-- Page 13-->
<div>
  <div>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0; text-align: center;">
      <span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 14pt"><b>STATE
      OF ARIZONA</b></span></span></p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0; text-align: center;">
      <span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 14pt"><b>DURABLE
      MENTAL HEALTH CARE POWER OF ATTORNEY</b></span></span></p>
    <p  style="margin-bottom: 0.13in; line-height: 100%; orphans: 0; widows: 0; text-align: center;">
      <span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 14pt"><b>Instructions
      and Form</b></span></span></p>
    <p  style="margin-bottom: 0in; border: 1px solid #00000a; padding: 0.01in 0.06in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt"><b>GENERAL
      INSTRUCTIONS: </b></span></span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">Use
      this Durable Mental Health Care Power of Attorney form if you want to
      appoint a person to make future mental health care decisions for you
      if you become incapable of making those decisions for yourself. The
      decision about whether you are incapable can only be made by a
      specialist in neurology or an Arizona licensed psychiatrist or
      psychologist who will evaluate whether you can give informed consent.
      Be sure you understand the importance of this document. Talk to your
      family members, friends, and others you trust about your choices.
      Also, it is a good idea to talk with professionals such as your
      doctor, clergyperson, and a lawyer before you sign this form. If you
      decide this is the form you want to use, complete the form. Do not
      sign this form until your witness or a Notary Public is present to
      witness the signing. </span></span>
    </p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'"><b>1.	Information about me: </b></span><span style="font-family:'Times New Roman, serif'">(I
          am called the “Principal”)</span></p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'">My Name: 		</span>
        <span style="font-family:'Times New Roman, serif';text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}}</span>
    </p>


    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">My Date of Birth: 	</span>
      <span style="font-family:'Times New Roman, serif';text-transform: capitalize">{{date('jS M, Y', strtotime($tellUsAboutYou['dob']))}}</span>
    </p>


    <p style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">My Address:         	</span>
      <span style="font-family:'Times New Roman, serif';text-transform: capitalize">{{$tellUsAboutYou['address']}}</span>
    </p>

    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif';text-transform: capitalize">{{$tellUsAboutYou['city']}}</span>

      <span style="font-family:'Times New Roman, serif';text-transform: capitalize">{{$tellUsAboutYou['state']}}</span>,

      <span style="font-family:'Times New Roman, serif';text-transform: capitalize">{{$tellUsAboutYou['zip']}}</span>
  	</p>

    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">My Telephone: 		</span>
      <span style="font-family:'Times New Roman, serif';text-transform: capitalize">{{$tellUsAboutYou['phone']}}</span>
    </p>
    <p  style="margin-top: 0.13in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <br/>
      <br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>2.	Selection of my health care
      representative: </b></span><span style="font-family:'Times New Roman, serif'">(Also
      called an “agent” or “surrogate”) I choose the following
      person to act as my representative to make mental health care
      decisions for me:</span></p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Name:  		</span>

      <span style="font-family:'Times New Roman, serif';text-transform: capitalize"> {{$healthFinance['fullname']}} </span>
    </p>

    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Telephone:  		</span>

      <span style="font-family:'Times New Roman, serif';text-transform: capitalize"> {{$healthFinance['phone']}} </span>
    </p>
    <p style="margin-bottom: 0in; line-height: 100%">

    <span style="font-family:'Times New Roman, serif'">Address:</span>

    <span style="font-family:'Times New Roman, serif';text-transform: capitalize"> {{$healthFinance['address']}} </span>

    </p>
    <p style="margin-left: 0in; text-indent: 0.0in; margin-bottom: 0in; line-height: 100%">

      <span style="font-family:'Times New Roman, serif';text-transform: capitalize"> {{$healthFinance['city']}},</span>

      <span style="font-family:'Times New Roman, serif';text-transform: capitalize"> {{$healthFinance['state']}} </span>

      <span style="font-family:'Times New Roman, serif';text-transform: capitalize"> {{$healthFinance['zip']}} </span>


      </p>

    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>
    </p>

    <div>
    @if($healthFinance['anyBackupAgent'] === 'true')
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">I choose the following person to
      act as an alternate representative to make mental health care
      decisions for me if my first representative is unavailable,
      unwilling, or unable to make decisions for me:</span></p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Name:  		</span>
      <span style="font-family:'Times New Roman, serif';text-transform: capitalize"> {{$healthFinance['backupFullname']}} </span>
    </p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif';text-transform: capitalize">Telephone:  		</span>
      <span style="font-family:'Times New Roman, serif';text-transform: capitalize"> {{$healthFinance['backupphone']}} </span>
    </p>

    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      	<span style="font-family:'Times New Roman, serif'">Address: 		 	</span>
        <span style="font-family:'Times New Roman, serif';text-transform: capitalize"> {{$healthFinance['backupAddress']}} </span>
    </p>
    <p style="margin-left: 0in; text-indent: 0.0in; margin-bottom: 0in; line-height: 100%">

      <span style="font-family:'Times New Roman, serif';text-transform: capitalize"> {{$healthFinance['backupCity']}},</span>

      <span style="font-family:'Times New Roman, serif';text-transform: capitalize"> {{$healthFinance['backupState']}} </span>

      <span style="font-family:'Times New Roman, serif';text-transform: capitalize"> {{$healthFinance['backupZip']}} </span>

    </p>
    <br>
    @endif
    </div>

  </div>
</div>
<!-- Page 13-->

<!-- Page 14-->
<div>
  <div>
    <p  style="margin-top: 0.13in; margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>3.	Mental health treatments
      that I AUTHORIZE if I am unable to make decisions for myself:</b></span></p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Here are the mental health
      treatments I authorize my mental health care representative to make
      on my behalf if I become incapable of making my own mental health
      care decisions due to mental or physical illness, injury, disability,
      or incapacity. If my wishes are not clear from this Durable Mental
      Health Care Power of Attorney or are not otherwise known to my
      representative, my representative will, in good faith, act in
      accordance with my best interests. This appointment is effective
      unless and until it is revoked by me or by an order of a court. My
      representative is authorized to do the following </span><span style="font-family:'Times New Roman, serif'">which
      I have </span><span style="font-family:'Times New Roman, serif'"><b>initialed or
      marked:</b></span></p>
    <p  style="margin-top: 0.13in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">_______ </span><span style="font-family:'Times New Roman, serif'"><b>A.	About
        my records: </b></span><span style="font-family:'Times New Roman, serif'">To receive
        information regarding mental health treatment that is proposed for me
        and to receive, review, and consent to disclosure of any of my
        medical records related to that treatment.</span></p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">_______ </span><span style="font-family:'Times New Roman, serif'"><b>B.	About
        medications: </b></span><span style="font-family:'Times New Roman, serif'">To
        consent to the administration of any medications recommended by my
        treating physician.</span></p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">_______ </span><span style="font-family:'Times New Roman, serif'"><b>C.	About
        a structured treatment setting: </b></span><span style="font-family:'Times New Roman, serif'">To
        admit me to a structured treatment setting with 24 hour-a-day
        supervision and an intensive treatment program licensed by the
        Department of Health Services, which is called an inpatient
        psychiatric facility.</span></p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">_______ </span><span style="font-family:'Times New Roman, serif'"><b>D.	Other:</b></span><span style="font-family:'Times New Roman, serif'">	</span></p>
    <p  style="margin-left: 1in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
    <span style="font-family:'Times New Roman, serif'; line-height: 23px;">
      _________________________________________________________________<br>
      _________________________________________________________________<br>
      _________________________________________________________________<br>
      _________________________________________________________________<br>
      _________________________________________________________________
      </span><span style="font-family:'Times New Roman, serif'">.	</span></p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">		</span></p>
    <p  style=" margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'"><b>4.	Durable Mental health
        treatments that I expressly DO NOT AUTHORIZE if I am unable to make
        decisions for myself: </b></span><span style="font-family:'Times New Roman, serif'">(Explain
        or write in &quot;None&quot;)	</span></p>
    <p  style="margin-left: 1in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'; line-height: 23px;">
          _________________________________________________________________<br>
          _________________________________________________________________<br>
          _________________________________________________________________<br>
          _________________________________________________________________<br>
          _________________________________________________________________
          </span></p>
    <p  style="text-indent: -0.33in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <br/>
      <br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>5.	Revocability of this
      Durable Mental Health Care Power of Attorney:</b></span></p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'">This mental health care power of
        attorney or any portion of it may not be revoked and any designated
        agent may not be disqualified by me during times that I am found to
        be unable to give informed consent. However, at all other times I
        retain the right to revoke all or any portion of this mental health
        care power of attorney or to disqualify any agent designated by me in
        this document.</span></p>
  </div>
</div>
<!-- Page 14-->

<!-- Page 15-->
<div>
  <div>
    <p  style="margin-top: 0.13in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>6.	Additional information
      </b></span><span style="font-family:'Times New Roman, serif'">about my mental health
      care treatment needs (consider including mental or physical health
      history, dietary requirements, religious concerns, people to notify
      and any other matters that you feel are important):</span></p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'; line-height: 23px;">___________________________________________________________________________<br>
        ___________________________________________________________________________<br>
        ___________________________________________________________________________<br>
        ___________________________________________________________________________<br>
        ___________________________________________________________________________</span><span style="font-family:'Times New Roman, serif'">.	</span></p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt">(Add
      additional pages if necessary)</span></span></p>
    <p  style="margin-bottom: 0.13in; line-height: 100%; orphans: 0; widows: 0">
      <br/>
      <br/>

    </p>
    <p  style="margin-bottom: 0.13in; line-height: 100%; orphans: 0; widows: 0">
      <br/>
      <br/>

    </p>
    <p  style="margin-bottom: 0.13in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>HIPAA WAIVER OF
      CONFIDENTIALITY FOR MY AGENT/REPRESENTATIVE</b></span></p>
    <p  style="margin-left: 1.08in; text-indent: -1.08in; margin-top: 0.13in; margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">_______ </span><span style="font-family:'Times New Roman, serif'"><b>(Initial)
      </b></span><span style="font-family:'Times New Roman, serif'">I intend for my agent
      to be treated as I would be with respect to my rights regarding the
      use and disclosure of my individually identifiable health information
      or other medical records. This release authority applies to any
      information governed by the Health Insurance Portability and
      Accountability Act of 1996 (aka “HIPAA”), 42 USC 1320d and 45 CFR
      160-164.</span></p>
    <p  style="margin-top: 0.15in; margin-bottom: 0in; line-height: 117%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%; text-align: center;"><span style="font-family:'Times New Roman, serif'"><b>[signature
    pages follow]</b></span></p>
  </div>
</div>
<!-- Page 15-->

<!-- Page 16-->
<div>
  <div>
    <p  style="margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0; text-align: center;">
      <span style="font-family:'Times New Roman, serif'"><b>SIGNATURE OR VERIFICATION</b></span></p>
    <p style="margin-top: 0.13in; margin-bottom: 0in; line-height: 126%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p style="margin-top: 0.13in; margin-bottom: 0in; line-height: 126%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>A.</b></span><span style="font-family:'Times New Roman, serif'">
       I am signing this Durable Mental Health Care Power of Attorney as
      follows:</span></p>
    <p  style="margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">My Signature: </span><span style="font-family:'Times New Roman, serif'">__________________________________________</span></p>
    <p  style="margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Date: </span><span style="font-family:'Times New Roman, serif'">_________________________________________________</span></p>
    <p  style="text-indent: -0.33in; margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <br/>
      <br/>

    </p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">

      <span style="font-family:'Times New Roman, serif'"><b>B.</b></span><span style="font-family:'Times New Roman, serif'">
       I, </span>

      <span style="font-family:'Times New Roman, serif';text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}},</span>


      <span style="font-family:'Times New Roman, serif'">
      am physically unable to sign this Durable Mental Health Care Power of
      Attorney, so a witness is verifying my desires as follows:</span>
  	</p>
    <p style="margin-top: 0.13in; margin-bottom: 0in; line-height: 126%; orphans: 0; widows: 0">

    </p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>Witness Verification</b></span>

      <span style="font-family:'Times New Roman, serif'">:
      I believe that this Durable Mental Health Care Power of Attorney
      accurately expresses the wishes communicated to me by </span>

      <span style="font-family:'Times New Roman, serif';text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}}.</span>

      <span style="font-family:'Times New Roman, serif'"></span>

      <span>
      	<span style="font-family:'Times New Roman, serif'">
        	<span>{{ucwords($genderTxt)}}</span>
      	</span>
      </span>

      <span style="font-family:'Times New Roman, serif'">
      intends to adopt this Durable Mental Health Care Power of Attorney at
      this time. </span>

      <span>
      	<span style="font-family:'Times New Roman, serif'">
        	<span>{{ucwords($genderTxt)}}</span>
      	</span>
      </span>

      <span style="font-family:'Times New Roman, serif'"> is physically unable to sign or mark this document at this time. I
      verify that </span>

      <span>
      	<span style="font-family:'Times New Roman, serif'">
         	<span>{{$genderTxt}}</span>
      	</span>
      </span>


      <span style="font-family:'Times New Roman, serif'">
      directly indicated to me that the Durable Mental Health Care Power of
      Attorney expresses </span>

      <span>
      	<span style="font-family:'Times New Roman, serif'">
       		<span>{{$genderTxt4}}</span>
      	</span>
      </span>

      <span style="font-family:'Times New Roman, serif'">
      wishes and that </span>
      <span>
      	<span style="font-family:'Times New Roman, serif'">
       		<span>{{$genderTxt3}}</span>
      	</span>
      </span>

      <span style="font-family:'Times New Roman, serif'">
      intends to adopt the Durable Mental Health Care Power of Attorney at
      this time. I further affirm that </span><span ><span style="font-family:'Times New Roman, serif'">

       <span>{{$genderTxt3}}</span>
      </span></span><span style="font-family:'Times New Roman, serif'">
      appears to be of sound mind and not under duress, fraud, or undue
      influence. </span>

      <span>
      	<span style="font-family:'Times New Roman, serif'">
       		<span>{{ucwords($genderTxt3)}}</span>
      	</span>
      </span>

      <span style="font-family:'Times New Roman, serif'">
      is not related to me by blood, marriage, or adoption and is not a
      person for whom I directly provide care in a professional capacity. I
      have not been appointed as the representative to make medical
      decisions on </span>

      <span>
      	<span style="font-family:'Times New Roman, serif'">
       		<span>{{$genderTxt4}}</span>
      	</span>
      </span>

      <span style="font-family:'Times New Roman, serif'">
      behalf.</span></p>
    <p  style="margin-top: 0.13in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <br/>
      <br/>

    </p>
    <p  style="margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Witness Signature: </span><span style="font-family:'Times New Roman, serif'">_________________________________</span><span style="font-family:'Times New Roman, serif'">  Date: </span><span style="font-family:'Times New Roman, serif'">_______________________</span></p>
    <p  style="margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <br/>
      <br/>

    </p>
    <p  style="margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Witness Name (printed) </span><span style="font-family:'Times New Roman, serif'">								_________________________________________________________</span></p>
  </div>
</div>
<!-- Page 16-->

<!-- Page 17-->
<div>
  <div>
    <p  style="margin-top: 0.08in; margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0; text-align: center;">
      <span style="font-family:'Times New Roman, serif'"><b>SIGNATURE OF WITNESS</b></span><span style="font-family:'Times New Roman, serif'">
      </span><span style="font-family:'Times New Roman, serif'"><b>OR</b></span><span style="font-family:'Times New Roman, serif'"><b>
      NOTARY PUBLIC</b></span><span style="font-family:'Times New Roman, serif'">: </span>
    </p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p  style="margin-bottom: 0.08in; border: 1px solid #00000a; padding: 0.01in 0.06in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt"><b>NOTE:
      </b></span></span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">At
      least one adult witness OR a Notary Public must witness the signing
      of this document and then sign it. The witness or Notary Public
      CANNOT be anyone who is: (a) under the age of 18; (b) related to you
      by blood, adoption, or marriage; (c) entitled to any part of your
      estate; (d) appointed as your representative; or (e) involved in
      providing your health care at the time this document is signed.</span></span></p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>Witness:</b></span><span style="font-family:'Times New Roman, serif'">
      I certify that I witnessed the signing of this Durable Mental Health
      Care Power of Attorney by </span>

      <span style="font-family:'Times New Roman, serif';text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}},</span>

      <span style="font-family:'Times New Roman, serif'">
      the Principal. </span>

      <span style="font-family:'Times New Roman, serif';text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}}</span>


      <span style="font-family:'Times New Roman, serif'">
      appeared to be of sound mind and under no pressure to make specific
      choices or sign the document. I understand the requirements of being
      a witness and I confirm the following:</span></p>

    	<ul style="padding-left: 50px;">
      	<li>
      	<p style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
        	<span style="font-family:'Times New Roman, serif'">I am not currently designated to
        	make medical decisions for this person.</span></p>
      	</li>

      	<li>
      	<p style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'">I am not directly involved in
        administering health care to this person.</span></p>
      	</li>

      	<li>
      	<p  style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'">I am not entitled to any portion
        of this person's estate upon </span>
        <span>
        	<span style="font-family:'Times New Roman, serif'">
          		<span>{{$genderTxt4}}</span>
        	</span>
        </span>
        <span style="font-family:'Times New Roman, serif'">death under a will or by operation of law.</span>
    	</p>
      	</li>

      	<p style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'">I am not related to this person
        by blood, marriage or adoption.</span></p>
    </ul>
    <p  style="margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Witness Signature: </span><span style="font-family:'Times New Roman, serif'">________________________________</span><span style="font-family:'Times New Roman, serif'">  Date: </span><span style="font-family:'Times New Roman, serif'">______________________</span></p>
    <p  style="margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Witness Name (printed) </span><span style="font-family:'Times New Roman, serif'">________________________________________________________</span></p>
    <p  style="margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Address: </span><span style="font-family:'Times New Roman, serif'">____________________________________________________________________</span></p>
    <p style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">____________________________________________________________________________</span></p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
  </div>


</div>
<!-- Page 17-->

<!-- Page 18-->
<div>
  <div>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0;">
      <span style="font-family:'Times New Roman, serif'"><b>Notary Public (</b></span><span style="font-family:'Times New Roman, serif'">NOTE:
       If a witness signs your form, you DO NOT need a notary to sign):</span></p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">STATE OF ARIZONA	<span style="padding-left: 100px;"></span>)</span></p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">	<span style="padding-left: 200px; display:inline-block;"></span>) ss. </span>
    </p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">COUNTY OF  	<span style="padding-left: 157px;"></span>)</span></p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%"><a name="_GoBack"></a>
      <span style="font-family:'Times New Roman, serif'">The undersigned, being a Notary
      Public certified in Arizona, declares that {{strtoupper($tellUsAboutYou['fullname'])}},
      the person making this Durable Mental Health Care Power of Attorney,
      has dated and signed or marked it in my presence and appears to me to
      be of sound mind and free from duress. I further declare I am not
      related to {{$genderTxt}}, by blood, marriage or adoption, or a person designated to makemedical decisions on {{$genderTxt4}} behalf. I am not directly involved in providing care as a professional to {{$genderTxt4}}. I am not entitled to any part of {{$genderTxt}} estate under a will now existing or by operation of law.  In the
      event the person acknowledging this Durable Mental Health Care Power
      of Attorney is physically unable to sign or mark this document, I
      verify that {{$genderTxt3}} directly indicated to me that the Durable Mental Health Care Power of Attorney expresses {{$genderTxt4}} wishes and that {{$genderTxt3}} intends to adopt the Durable Mental Health Care Power of Attorney at this time.
      </span>
  	</p>

    <p style="margin-top: 0.15in; margin-bottom: 0in; line-height: 110%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">WITNESS MY HAND AND SEAL this </span>
      <span style="font-family:'Times New Roman, serif'">________</span>

      <span style="font-family:'Times New Roman, serif'"> day of </span>

      <span style="font-family:'Times New Roman, serif'">___________________</span>

      <span style="font-family:'Times New Roman, serif'">,</span>

      <span style="font-family:'Times New Roman, serif'">__________</span>

      <span style="font-family:'Times New Roman, serif'">.</span>
  	</p>

    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>
    </p>

    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Notary Public </span>
      <span style="font-family:'Times New Roman, serif'">_______________________________________</span></p><br>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">	</span></p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">My Commission Expires: </span><span style="font-family:'Times New Roman, serif'">_______________________________</span></p>
  </div>
</div>
<!-- Page 18-->

<!-- Page 19-->
<div>
  <div>
    <p  style="margin-top: 0.25in; margin-bottom: 0in; line-height: 100%; page-break-before: always; orphans: 0; widows: 0; text-align: center;">
      <span style="font-family:'Times New Roman, serif'"><b>OPTIONAL:</b></span></p>
    <p  style="margin-top: 0.08in; margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0; text-align: center;">
    <span style="font-family:'Times New Roman, serif'"><b>STATEMENT THAT YOU HAVE
    DISCUSSED</b></span></p>
    <p  style="margin-top: 0.04in; margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0; text-align: center;">
      <span style="font-family:'Times New Roman, serif'"><b>YOUR HEALTH CARE CHOICES FOR
      THE FUTURE</b></span></p>
    <p  style="margin-top: 0.04in; margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0; text-align: center;">
      <span style="font-family:'Times New Roman, serif'"><b>WITH YOUR PHYSICIAN</b></span></p>
    <p  style="margin-top: 0.08in; margin-bottom: 0in; border: 1px solid #00000a; padding: 0.01in 0.06in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'"><b>NOTE: Before deciding what
      health care you want for yourself, you may wish to ask your physician
      questions regarding treatment alternatives. This statement from your
      physician is not required by Arizona law. If you do speak with your
      physician, it is a good idea to have him or her complete this
      section. Ask your doctor to keep a copy of this form with your
      medical records.</b></span></p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">On this date I reviewed this
      document with the Principal and discussed any questions regarding the
      probable medical consequences of the treatment choices provided
      above. I agree to comply with the provisions of this directive, and I
      will comply with the health care decisions made by the representative
      unless a decision violates my conscience. In such case I will
      promptly disclose my unwillingness to comply and will transfer or try
      to transfer patient care to another provider who is willing to act in
      accordance with the representative's direction.</span></p>
    <p style="margin-top: 0.08in; margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Doctor Name (printed):
      _____________________________________________________</span></p>
    <p style="margin-top: 0.17in; margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Signature:
      _________________________________ Date: _________________________</span></p>
    <p style="margin-top: 0.08in; margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <br/>

    </p>
    <p style="margin-top: 0.08in; margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Address:
      ________________________________________________________________</span></p>
  </div>

</div>
<!-- Page 19-->

</div>
</body>
</html>
