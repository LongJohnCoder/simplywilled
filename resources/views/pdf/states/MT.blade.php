<!DOCTYPE html>
<html>
<head>
	<title>Health Care Power of Attorney</title>
</head>
<body>

<div>
	<!-- Page 1-->
<div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding: 40px;">
  <div class="docPageInner" style="box-sizing: border-box; height: 875px;">
    <p  style="margin-bottom: 0.13in; line-height: 100%; text-align:center;"><span size="4" style="font-size: 13pt"><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>M</b></span></span></span><span size="4" style="font-size: 16pt"><b>ONTANA
      </b></span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>ADVANCE
      DIRECTIVE </b></span></span></span></span>
    </p>
    <p  style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%; text-align:center;"><span ><span size="2" style="font-size: 9pt"><span ><span size="4" style="font-size: 14pt"><b>PART
      1:  HEALTH CARE REPRESENTATIVE </b></span></span></span></span>
    </p>
    <p  style="margin-bottom: 0in; line-height: 100%; text-align:center;"><span ><span size="2" style="font-size: 9pt"><span ><span size="4" style="font-size: 14pt"><b>DURABLE
      POWER OF ATTORNEY FOR HEALTH CARE</b></span></span></span></span></p>
    <p  style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p class="western"  style="margin-bottom: 0in; line-height: 100%">
      I, <b> <span style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</span></b>,
      <span face="Times, serif"><span size="2" style="font-size: 9pt"><span style="font-family:'Times New Roman, serif'"><span size="3" style="font-size: 12pt">I
      hereby appoint </span></span></span></span>my
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
      
      (Tel: <span> {{$healthFinance['phone']}} </span> ,
      as my agent to make 

      <span face="Times, serif">
      	<span size="2" style="font-size: 9pt">
      		<span style="font-family:'Times New Roman, serif'">
      			<span size="3" style="font-size: 12pt">decisions
			      on my behalf regarding withholding or withdrawal of treatment that
			      only prolongs the process of dying and is not necessary for my
			      comfort or to alleviate pain, pursuant to the Montana Rights of the
			      Terminally Ill Act</span>
  			</span>
  		</span>
  		</span>.&nbsp;</p>
    
    <p  style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
   

   @if($healthFinance['anyBackupAgent'] == 'true')
    <p style="margin-bottom: 0in; line-height: 100%"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">If
    said agent becomes unwilling or unable to act for me, or if I revoke
    my primary agent’s appointment or authority to act, or if my
    representative is my spouse and I become legally separated or
    divorced, then I designate my 
    

	<span size="3" style="font-size: 12pt">
		@if(strtolower($healthFinance['backupRelation'] == 'other'))
			<span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupRelationOther']}}, </span>
		@else
			<span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupRelation']}}, </span>
		@endif
	</span>


    <span style="text-transform: capitalize"> {{$healthFinance['backupFullname']}} </span> of
    
    <span style="text-transform: capitalize"> {{$healthFinance['backupAddress']}} </span> in
    
    <span style="text-transform: capitalize"> {{$healthFinance['backupCity']}} ,</span>
    
    <span style="text-transform: capitalize"> {{$healthFinance['backupState']}} </span>
    
    <span style="text-transform: capitalize"> {{$healthFinance['backupZip']}} </span>
    
    (Tel: {{$healthFinance['backupphone']}} </span> ),
    
    as my alternate agent to make health care decisions for me as
    authorized in this document.</span><span size="3" style="font-size: 12pt">&nbsp;</span></span></p>
    
    <p  style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    @endif
    
    <p style="margin-bottom: 0in; line-height: 100%"><span face="Times, serif"><span size="2" style="font-size: 9pt"><span style="font-family:'Times New Roman, serif'"><span size="3" style="font-size: 12pt">If
      the individual(s) I have appointed are not reasonably available or
      are unwilling to serve, I direct my attending physician or attending
      advance practice registered nurse, pursuant to the Montana Rights of
      the Terminally Ill Act, to withhold or withdraw treatment that only
      prolongs the process of dying and is not necessary for my comfort or
      to alleviate pain.</span></span></span></span></p>
    <p  style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p class="western"  style="margin-bottom: 0in; line-height: 100%">
      This health care power of attorney becomes effective upon my
      disability or incapacity. My representative has authority to make any
      health care decision that I could make, including decisions regarding
      the withholding or withdrawing of life-sustaining treatment and
      artificial administration of nutrition or hydration. My
      representative's authority to make these decisions is operative at
      any time I am unable to make or communicate my health care decisions,
      regardless of whether I am expected to recover or not.</p>
    <p class="western"  style="margin-bottom: 0in; line-height: 100%">
      <br/>

    </p>
    <p class="western"  style="margin-bottom: 0in; line-height: 100%">
      If, at any time, I am unable to make or communicate decisions
      concerning my medical care and treatment, by virtue of physical,
      mental or emotional disability, incompetency, incapacity, illness or
      otherwise, my said attorney-in-fact shall have the authority to make
      all health care decisions and all medical care and treatment
      decisions for me and on my behalf, including consenting or refusing
      to consent to any care, treatment, service or procedure to maintain,
      diagnose or treat my mental or physical condition.
    </p>
    <p class="western"  style="margin-bottom: 0in; line-height: 100%">
      <br/>

    </p>
    <p class="western"  style="margin-bottom: 0in; line-height: 100%">
      I grant may agent complete and full authority to do and perform all
      and every act and thing whatsoever requisite, proper and necessary to
      be done in the exercise of the rights herein granted, as fully for
      all intents and purposes as I might or could do if personally present
      and able with full power of substitution or revocation, hereby
      ratifying and confirming all that said attorney-in-fact shall
      lawfully do or cause to be done by virtue of this power of attorney
      and the rights and powers granted herein.
    </p>
  </div>
  
</div>
<!-- Page 1-->

<!-- Page 2-->
<div>
  <div>
    <p  style="margin-bottom: 0in; line-height: 100%"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">My
      agent also has the full and immediate power and authority to request,
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
      give, disclose, and release to my agent, without restriction, all of
      my individually identifiable health information and medical records
      regarding any past, present, or future medical or mental health
      condition. This authority given my agent shall supersede any other
      agreement which I may have made with my health care providers to
      restrict access to or disclosure of my individually identifiable
      health information. This authority given my agent shall be effective
      immediately, has no expiration date and shall expire only in the
      event that I revoke the authority in writing and deliver it to my
      health care provider.</span></span></p>
    <p class="western"  style="margin-bottom: 0in; line-height: 100%">
      <br/>

    </p>
    <p class="western"  style="margin-bottom: 0in; line-height: 100%">
      When making health care decisions for me, my representative should
      think about what action would be consistent with past conversations
      we have had, my treatment preferences as expressed in this document,
      my religious and other beliefs and values, and how I have handled
      medical and other important issues in the past. In the absence of my
      ability to give directions regarding my health care, it is my
      intention that my said attorney-in-fact shall exercise this specific
      grant of authority and that such exercise shall be honored by my
      family, physicians, nurses, and any other health care provider(s) or
      facility in which or by which I may be treated, as a final expression
      of my legal rights. If what I would decide is still unclear, then my
      representative should make decisions for me that my representative
      believes are in my best interest, considering the benefits, burdens,
      and risks of my current circumstances and treatment options.</p>
    <p  style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p  style="margin-bottom: 0.09in; line-height: 100%"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">I
      direct that my agent comply with the following instructions and/or
      limitations (optional):</span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
      <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
      <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
      <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></p>
    <p  style="margin-bottom: 0in; line-height: 100%; text-align:center;"><span size="1" style="font-size: 7pt"><span size="3" style="font-size: 12pt"><i>(Add
      additional sheets if necessary.)</i></span></span></p>
    <p  style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%">If,
      for any reason, I should need a guardian of my person designated by a
      court, I nominate my agent or alternate agent appointed herein.</p>
    <p  style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">Persons
    dealing with my agent may rely fully on a photocopy of this document
    as though the photocopy was an original.</span><span size="3" style="font-size: 12pt">&nbsp;</span></span></p>
   </div>
</div>
<!-- Page 2-->


<!-- Page 3-->
<div>
  <div>
    <p class="western" style="margin-bottom: 0in; line-height: 100%">This
      durable power of attorney is effective in any state that I may seek
      or receive medical-treatment and health care.
    </p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p class="western"  style="margin-bottom: 0in; line-height: 100%; text-align:center;">
      <span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 18pt"><span size="4" style="font-size: 14pt"><b>PART
      2:  M</b></span></span></span><span size="4" style="font-size: 14pt"><b>ONTANA
      </b></span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 18pt"><span size="4" style="font-size: 14pt"><b>D</b></span></span></span><span size="4" style="font-size: 14pt"><b>ECLARATION</b></span></p>
    <p  style="margin-bottom: 0in; line-height: 100%; text-align:center;"><span size="4" style="font-size: 13pt"><span size="4" style="font-size: 14pt"><b>TERMINAL
      CONDITIONS (LIVING WILL)</b></span></span></p>
    <p class="western"  style="margin-bottom: 0in; line-height: 100%">
      <br/>

    </p>
    <p class="western"  style="margin-bottom: 0in; line-height: 100%">
      I provide these directions in accordance with the Montana Rights of
      the Terminally Ill Act. These are my wishes for the kind of treatment
      I want if I cannot communicate or make my own decisions. These
      directions are only valid if both of the following two conditions
      exist:
    </p>
    <p class="western"  style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
      <br/>

    </p>
    <ol>
      <li>
      <p  style="margin-bottom: 0in; line-height: 100%">
        I have a terminal condition, and
      </p>
      </li>
      <li>
      <p  style="margin-bottom: 0in; line-height: 100%">
        in the opinion of my attending physician, I will die in a relatively
        short time without life sustaining treatment that only prolongs the
        dying process.
      </p>
      </li>
    </ol>
    <p class="western"  style="margin-bottom: 0in; line-height: 100%">
      <br/>

    </p>
    <p class="western"  style="margin-bottom: 0in; line-height: 100%">
      I authorize my Representative, if I have appointed one, to make the
      decision to provide, withhold, or withdraw any health care treatment.
    </p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%"><span size="4" style="font-size: 14pt"><b>General
      Treatment Directions </b></span>
    </p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%"><i>(Check
      only one box) </i>
    </p>
    <p class="western"  style="margin-left: 0.63in; text-indent: -0.19in; margin-bottom: 0in; line-height: 100%">
      □ I provide no directions at this time.
    </p>
    <p class="western"  style="margin-left: 0.63in; text-indent: -0.19in; margin-bottom: 0in; line-height: 100%">
      □ I direct my attending physician to withdraw or withhold treatment
      that merely prolongs the dying process.
    </p>
    <p class="western"  style="margin-left: 0.63in; text-indent: -0.19in; margin-bottom: 0in; line-height: 100%">
      □ I direct my attending physician to provide life-sustaining
      treatment if I have a terminal condition, even though it may only
      serve to prolong the dying process.
    </p>
    <p class="western"  style="margin-bottom: 0in; line-height: 100%">
      <br/>

    </p>
    <p class="western"  style="margin-bottom: 0in; line-height: 100%">
      <br/>

    </p>
    <p class="western"  style="margin-bottom: 0in; line-height: 100%">
      I further direct that:</p>
    <p class="western"  style="margin-bottom: 0in; line-height: 100%">
      <i>(Check all boxes that apply)</i></p>
    <p class="western"  style="margin-left: 0.63in; text-indent: -0.19in; margin-bottom: 0in; line-height: 100%">
      □ Treatment be given to maintain my dignity, keep me comfortable
      and relieve pain even if it shortens my life.
    </p>
    <p class="western"  style="margin-left: 0.63in; text-indent: -0.19in; margin-bottom: 0in; line-height: 100%">
      □ If I cannot drink, I do not want to receive fluids through a
      needle or catheter placed in my body unless for comfort.
    </p>
    <p class="western"  style="margin-left: 0.63in; text-indent: -0.19in; margin-bottom: 0in; line-height: 100%">
      □ If I cannot eat, I do not want a tube inserted in my nose or
      mouth, or surgically placed in my stomach to give me food.
    </p>
    <p class="western"  style="margin-left: 0.63in; text-indent: -0.19in; margin-bottom: 0in; line-height: 100%">
      □ If I have a serious infection, I do not want antibiotics to
      prolong my life. Antibiotics may be used to treat a painful
      infection.</p>
  </div>
  
</div>
<!-- Page 3-->

<!-- Page 4-->
<div>
  <div>
    <p class="western" style="margin-bottom: 0in; line-height: 100%; page-break-before: always">
      <span size="4" style="font-size: 14pt"><b>Special Directions </b></span>
    </p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%"><i>(Check
      only one box) </i>
    </p>
    <p  style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%"><u><b>Spiritual
      Preferences </b></u>
    </p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p class="western" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
      My religion <u>_____________________________________</u> 	</p>
    <p class="western" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
    </p>
    <p class="western" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
      <br/>

    </p>
    <p class="western" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
      My faith community <u>______________________________</u></p>
    <p class="western" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
      <br/>

    </p>
    <p class="western" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
      Contact person <u>__________________________________</u> <br/>
      <br/>

    </p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%">I
      would like spiritual support <i>(check one box) </i>
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
      □ Yes	 <span size="5" style="font-size: 20pt">□</span> No
    </p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%"><u><b>Where
      I Would Like to be When I Die</b></u></p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%"><i>(check
      one box)</i></p>
    <p class="western" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
      □ My home
    </p>
    <p class="western" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
      □ Hospital
    </p>
    <p class="western" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
      □ Nursing home
    </p>
    <p class="western" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
      □ Other
    </p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%"><u><b>Donation
      of Organs at My Death </b></u>
    </p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%"><i>(check
      one of the following boxes): </i>
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
      □ I do not wish to donate any of my body, organs, or tissue.
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
      <br/>

    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
      OR</p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
      <br/>

    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
      □ I wish to donate my entire body.
    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
      <br/>

    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
      OR</p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
      <br/>

    </p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
      □ I wish to donate only the following <i>(check all that apply)</i>:
    </p>
    <div id="TextSection" dir="ltr" gutter="54" style="column-count: 2">
      <p class="western" style="margin-left: 1.5in; margin-right: -0.38in; text-indent: -0.13in; margin-bottom: 0in; line-height: 100%">
        □ Any organs, tissues, or body parts
      </p>
      <p class="western" style="margin-left: 1.5in; margin-right: -0.38in; text-indent: -0.13in; margin-bottom: 0in; line-height: 100%">
        □ Heart
      </p>
      <p class="western" style="margin-left: 1.5in; margin-right: -0.38in; text-indent: -0.13in; margin-bottom: 0in; line-height: 100%">
        □ Kidneys
      </p>
      <p class="western" style="margin-left: 1.5in; margin-right: -0.38in; text-indent: -0.13in; margin-bottom: 0in; line-height: 100%">
        □ Lungs
      </p>
      <p class="western" style="margin-left: 1.5in; margin-right: -0.38in; text-indent: -1.44in; margin-bottom: 0in; line-height: 100%">
        □ Bone Marrow
      </p>
      <p class="western" style="margin-left: 1.5in; margin-right: -0.38in; text-indent: -1.44in; margin-bottom: 0in; line-height: 100%">
        □ Eyes
      </p>
      <p class="western" style="margin-left: 1.5in; margin-right: -0.38in; text-indent: -1.44in; margin-bottom: 0in; line-height: 100%">
        □ Skin
      </p>
      <p class="western" style="margin-left: 1.5in; margin-right: -0.38in; text-indent: -1.44in; margin-bottom: 0in; line-height: 100%">
        □ Liver
      </p>
      <p class="western" style="margin-left: 1.5in; margin-right: -0.38in; text-indent: -1.44in; margin-bottom: 0in; line-height: 100%">
        □ Other(s):<u>_________________________</u>
      </p>
    </div>
  </div>

</div>
<!-- Page 4-->

<!-- Page 5-->
<div>
  <div>

    <p class="western" style="text-indent: -0.13in; margin-bottom: 0in; line-height: 100%">
      <br/>

    </p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%"><u><b>Additional
      Directions</b></u><b>: </b>
    </p>
    <p class="western" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 150%">
      <u>
        _____________________________________________________________________<br>
        _____________________________________________________________________<br>
        _____________________________________________________________________<br>
        _____________________________________________________________________<br>
        _____________________________________________________________________<br>
        _____________________________________________________________________<br>
        _____________________________________________________________________<br>
        ___________________________________________________
      </u></p>
    <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
      <i>(Attach additional pages if needed).</i><i><u><b> </b></u></i>
    </p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%"><span face="Times, serif"><span size="2" style="font-size: 9pt"><span style="font-family:'Times New Roman, serif'"><span size="3" style="font-size: 12pt">If
      I should have an incurable or irreversible condition that, without
      the administration of life-sustaining treatment, will, in the
      opinion of my attending physician or attending advanced practice
      registered nurse, cause my death within a relatively short time and
      I am no longer able to make decisions regarding my medical
      treatment, I direct my attending physician or attending advanced
      practice registered nurse, pursuant to the Montana Rights of the
      Terminally Ill Act, to withhold or withdraw treatment that only
      prolongs the process of dying and is not necessary for my comfort or
      to alleviate pain.</span></span></span></span></p>
    <p  style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">If
	    I am in the condition(s) described above I direct the following:</span></span></p>
    <p align="left" style="margin-top: 0.06in; margin-bottom: 0.06in; line-height: 100%">
      <br/>
      <br/>

    </p>
    <p align="left" style="margin-top: 0.06in; margin-bottom: 0.06in; line-height: 100%">
      <span size="1" style="font-size: 7pt"><span size="3" style="font-size: 12pt"><i><b>(INITIAL
      all those that apply)</b></i></span></span></p>
    <p  style="margin-left: 0.94in; text-indent: -0.56in; margin-bottom: 0.06in; line-height: 100%">
      <span size="2" style="font-size: 9pt"><span size="2" style="font-size: 11pt">_______</span><span size="2" style="font-size: 11pt">	</span><span size="2" style="font-size: 11pt">I
      DO NOT want cardiopulmonary resuscitation (CPR).</span></span></p>
    <p  style="margin-left: 0.94in; text-indent: -0.56in; margin-bottom: 0.06in; line-height: 100%">
      <span size="2" style="font-size: 9pt"><span size="2" style="font-size: 11pt">_______</span><span size="2" style="font-size: 11pt">	</span><span size="2" style="font-size: 11pt">I
      DO NOT want mechanical respiration.</span></span></p>
    <p  style="margin-left: 0.94in; text-indent: -0.56in; margin-bottom: 0.06in; line-height: 100%">
      <span size="2" style="font-size: 9pt"><span size="2" style="font-size: 11pt">_______</span><span size="2" style="font-size: 11pt">	</span><span size="2" style="font-size: 11pt">I
      DO NOT want tube feeding.</span></span></p>
    <p  style="margin-left: 0.94in; text-indent: -0.56in; margin-bottom: 0.06in; line-height: 100%">
      <span size="2" style="font-size: 9pt"><span size="2" style="font-size: 11pt">_______</span><span size="2" style="font-size: 11pt">	</span><span size="2" style="font-size: 11pt">I
      DO NOT want tube hydration.</span></span></p>
    <p  style="margin-left: 0.94in; text-indent: -0.56in; margin-bottom: 0.06in; line-height: 100%">
      <span size="2" style="font-size: 9pt"><span size="2" style="font-size: 11pt">_______</span><span size="2" style="font-size: 11pt">	</span><span size="2" style="font-size: 11pt">I
      DO NOT want antibiotics.</span></span></p>
    <p  style="margin-left: 0.94in; text-indent: -0.56in; margin-bottom: 0in; line-height: 100%">
      <span size="2" style="font-size: 9pt"><span size="2" style="font-size: 11pt">_______</span><span size="2" style="font-size: 11pt">	</span><span size="2" style="font-size: 11pt">I
      </span><span size="2" style="font-size: 11pt">DO</span><span size="2" style="font-size: 11pt"><b>
      </b></span><span size="2" style="font-size: 11pt">want maximum pain
      relief, even if it may hasten my death.</span></span></p>
    <p  style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p  style="margin-bottom: 0.09in; line-height: 100%"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">Additional,
	    specific directions (if any):</span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
      <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
      <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></p>
    <p  style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
      <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></p>
  </div>
  
</div>
<!-- Page 5-->

<!-- Page 6-->
<div>
  <div>
    <p  style="margin-bottom: 0in; line-height: 100%; text-align:center;">
      <span size="2" style="font-size: 9pt"><span size="4" style="font-size: 14pt"><b>SIGNATURE
      AND ACKNOWLEDGEMENT</b></span></span></p>
    <p  style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%"><i><b>[</b></i><b>INSTRUCTIONS:
    </b><i><b>Ask two people to watch you sign and have them sign
      below.] </b></i>
    </p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <ol>
      <li>
      <p  style="margin-bottom: 0in; line-height: 100%">
        I revoke any prior health care advance directive or directions.
      </p>
      </li>
    </ol>
    <p  style="margin-left: 0.64in; margin-bottom: 0in; line-height: 100%">
      <br/>

    </p>
    <ol start="2">
      <li>
      <p  style="margin-bottom: 0in; line-height: 100%">
        This document is intended to be valid in any jurisdiction in which
        it is presented.</p>
      </li>
    </ol>
    <p class="western"  style="margin-left: 0.25in; margin-bottom: 0in; line-height: 100%">

    </p>
    <ol start="3">
      <li>
      <p  style="margin-bottom: 0in; line-height: 100%">
        A copy of this document is intended to have the same effect as the
        original.</p>
      </li>
    </ol>
    <p  style="margin-left: 0.64in; margin-bottom: 0in; line-height: 100%">
      <br/>

    </p>
    <ol start="4">
      <li>
      <p  style="margin-bottom: 0in; line-height: 100%">
        Those who act as I have directed in this document shall be free
        from legal liability for having followed my directions.
      </p>
      </li>
    </ol>
    <p  style="margin-left: 0.64in; margin-bottom: 0in; line-height: 100%">
      <br/>

    </p>
    <ol start="5">
      <li>
      <p  style="margin-bottom: 0in; line-height: 100%">
        If my attending physician is unwilling or unable to comply with my
        wishes as stated in this document, I direct my care be transferred
        to a physician who will.</p>
      </li>
    </ol>
    <p  style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%"><span ><span size="2" style="font-size: 9pt"><span ><span size="3" style="font-size: 12pt">Signed
      this </span></span><span ><span size="3" style="font-size: 12pt"><u>___________</u></span></span><span ><span size="3" style="font-size: 12pt">
      day of </span></span><span ><span size="3" style="font-size: 12pt"><u>__________________________</u></span></span><span ><span size="3" style="font-size: 12pt">,
      </span></span><span ><span size="3" style="font-size: 12pt"><u>_________________</u></span></span><span ><span size="3" style="font-size: 12pt">.</span></span></span></span></p>
    <p  style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p  style="margin-left: 0.5in; text-indent: 0.06in; margin-bottom: 0in; line-height: 100%">
      <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><u>_______________________________________</u></span></span></p>
    <p class="western"  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <b>
      <span style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</span>
      </b>
  	</p>
    
    <p  style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
      <span ><span size="2" style="font-size: 9pt"><span face="Times, serif"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"></span></span></span><span size="3" style="font-size: 12pt">
        <span style="text-transform: capitalize">{{$tellUsAboutYou['address']}}</span>
        
      </span><span face="Times, serif"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"></span></span></span></span></span></p>
    
    <p  style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
      <span>
      	<span size="2" style="font-size: 9pt">
      		<span face="Times, serif">
      			<span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"></span></span>
      		</span>

      		<span size="3" style="font-size: 12pt"> <span style="text-transform: capitalize">{{$tellUsAboutYou['city']}}</span> ,
      </span><span face="Times, serif"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">
      </span></span></span>

      <span size="3" style="font-size: 12pt">
          <span style="text-transform: capitalize">{{$tellUsAboutYou['state']}}</span>
          
      </span><span face="Times, serif"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"></span></span></span><span ><span size="3" style="font-size: 12pt">&nbsp;
      </span></span><span face="Times, serif"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"></span></span></span><span size="3" style="font-size: 12pt">
          
          <span style="text-transform: capitalize">{{$tellUsAboutYou['zip']}}</span>
          
      </span><span face="Times, serif"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"></span></span></span></span></span></p>
    <p  style="margin-left: 2.94in; text-indent: 0.06in; margin-bottom: 0in; line-height: 100%">
      <br/>

    </p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p class="western"  style="margin-bottom: 0in; line-height: 100%">
      <b>NOTARY</b></p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%">STATE
      OF MONTANA
    </p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%">County
      of <u>_________________________</u>
    </p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p class="western"  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      This document was acknowledged before me this <u>________</u> day of <u>________________________</u>,
      <u>_______________</u>, by <b>
      <span style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</span>
    </b>.</p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%">(Notarial
      Seal)
    </p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%"><u>_________________________________</u></p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%">Notary
      Signature</p>
  </div>
  
</div>
<!-- Page 6-->


<!-- Page 7-->
<div>
  <div>
    <p class="western"  style="margin-bottom: 0in; line-height: 100%; text-align:center;">
      <b>STATEMENT OF WITNESSES</b></p>
    <p class="western"  style="margin-bottom: 0in; line-height: 100%">
      <br/>

    </p>
    <p class="western"  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0"><a name="_GoBack"></a>
      I declare that I am over the age of 18 and that <b>
        <span style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</span>
        
        </b><span style="letter-spacing: 0.1pt">,
      </span>the person who signed this document, voluntarily signed this
      document in my presence, and appeared to be of sound mind and under
      no duress, fraud or undue influence.
    </p>
    <p  style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p  style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

    </p>
    <p  style="margin-bottom: 0.06in; line-height: 100%"><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt"><b>WITNESS
      1</b></span></span></span><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">:
      ________________________________	Dated: ___________________</span></span></span></p>
    <p  style="margin-bottom: 0.06in; line-height: 100%"><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">[signature]</span></span></span></p>
    <p  style="margin-bottom: 0.06in; line-height: 100%"><br/>
      <br/>

    </p>
    <p  style="margin-bottom: 0.06in; line-height: 100%"><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">____________________________________</span></span></span></p>
    <p  style="margin-bottom: 0.06in; line-height: 100%"><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">	[name
      printed]</span></span></span></p>
    <p  style="margin-bottom: 0.06in; line-height: 100%"><br/>
      <br/>

    </p>
    <p  style="margin-bottom: 0.06in; line-height: 100%"><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">____________________________________</span></span></span></p>
    <p  style="margin-bottom: 0.06in; line-height: 100%"><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">	[street
      address]</span></span></span></p>
    <p  style="margin-bottom: 0.06in; line-height: 100%"><br/>
      <br/>

    </p>
    <p  style="margin-bottom: 0.06in; line-height: 100%"><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">____________________________________</span></span></span></p>
    <p  style="margin-bottom: 0.06in; line-height: 100%"><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">	[city,
      state, Zip]</span></span></span></p>
    <p  style="margin-bottom: 0.06in; line-height: 100%"><br/>
      <br/>

    </p>
    <p  style="margin-bottom: 0.06in; line-height: 100%"><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt"><b>WITNESS
      2: </b></span></span></span><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">________________________________	Dated:
      ___________________</span></span></span></p>
    <p  style="margin-bottom: 0.06in; line-height: 100%"><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">[signature]</span></span></span></p>
    <p  style="margin-bottom: 0.06in; line-height: 100%"><br/>
      <br/>

    </p>
    <p  style="margin-bottom: 0.06in; line-height: 100%"><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">____________________________________</span></span></span></p>
    <p  style="margin-bottom: 0.06in; line-height: 100%"><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">	[name
      printed]</span></span></span></p>
    <p  style="margin-bottom: 0.06in; line-height: 100%"><br/>
      <br/>

    </p>
    <p  style="margin-bottom: 0.06in; line-height: 100%"><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">____________________________________</span></span></span></p>
    <p  style="margin-bottom: 0.06in; line-height: 100%"><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">	[street
      address]</span></span></span></p>
    <p  style="margin-bottom: 0.06in; line-height: 100%"><br/>
      <br/>

    </p>
    <p  style="margin-bottom: 0.06in; line-height: 100%"><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">____________________________________</span></span></span></p>
    <p  style="margin-bottom: 0.06in; line-height: 100%"><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">	[city,
      state, Zip]</span></span></span></p>
  </div>
  
</div>
<!-- Page 7-->

</div>

</body>
</html>