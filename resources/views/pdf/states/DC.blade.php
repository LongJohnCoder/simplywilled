<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Untitled Document</title>
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
<div style="text-align: justify">

    <div>
        <div>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 0.28in; page-break-before: auto; page-break-after: auto">
                <span  style="font-size: 17pt"><b>DISTRICT OF COLUMBIA</b></span></p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 0.28in"><span  style="font-size: 17pt"><b>POWER
                OF ATTORNEY FOR HEALTH CARE</b></span></p>
            <p  style="text-align:center;margin-bottom: 0.19in; line-height: 115%">


            </p>
            <p  style="text-align:center;margin-bottom: 0.19in; line-height: 115%">


            </p>
            <p  style="text-align:center;margin-bottom: 0.19in; line-height: 115%"><b>INFORMATION
                    ABOUT THIS DOCUMENT</b></p>
            <p style="margin-bottom: 0.09in; line-height: 115%"><span  style="font-size: 9pt">This
                is an important legal document. Before signing this document, it is
                  vital for you to know and understand these facts:</span></p>
            <p style="margin-bottom: 0.09in; line-height: 115%"><span  style="font-size: 9pt">This
                document gives the person you name as your attorney in fact the power
                  to make health-care decisions for you if you cannot make the
                  decisions for yourself.</span></p>
            <p style="margin-bottom: 0.09in; line-height: 115%"><span  style="font-size: 9pt">After
              you have signed this document, you have the right to make health care
              decisions for yourself if you are mentally competent to do so. In
              addition, after you have signed this document, no treatment may be
              given to you or stopped over your objection if you are mentally
              competent to make that decision.</span></p>
            <p style="margin-bottom: 0.09in; line-height: 115%"><span  style="font-size: 9pt">You
              may state in this document any type of treatment that you do not
              desire and any that you want to make sure you receive.</span></p>
            <p style="margin-bottom: 0.09in; line-height: 115%"><span  style="font-size: 9pt">You
              have the right to take away the authority of your attorney in fact,
              unless you have been adjudicated incompetent, by notifying your
              attorney in fact or health-care provider either orally or in writing.
              Should you revoke the authority of your attorney in fact, it is
              advisable to revoke in writing and to place copies of the revocation
              wherever this document is located.</span></p>
            <p style="margin-bottom: 0.09in; line-height: 115%"><span  style="font-size: 9pt">If
              there is anything in this document that you do not understand, you
              should ask a social worker, lawyer or other person to explain it to
              you.</span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in"><span  style="font-size: 9pt">You
              should keep a copy of this document after you have signed it. Give a
              copy to the person you name as your attorney in fact. If you are in a
              health-care facility, a copy of this document should be included in
              your medical record.</span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 0.33in">

            </p>
        </div>
    </div>
    <!-- !Page 1 -->

    <!-- Page 2 -->
    <div>
        <div>

            <p  style="text-align:center;margin-bottom: 0in; line-height: 0.28in; page-break-before: always">
                <span  style="font-size: 17pt"><b>DISTRICT OF COLUMBIA</b></span></p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 0.28in"><span  style="font-size: 17pt"><b>POWER
              OF ATTORNEY FOR HEALTH CARE</b></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">I,
              <b>
                <span style="text-transform: capitalize" >{{strtoupper(trim($tellUsAboutYou['fullname']))}},</span>
              </b>
              of
              <span style="text-transform: capitalize" >{{ucwords(strtolower(trim($tellUsAboutYou['address'])))}},</span>
              <span style="text-transform: capitalize" >{{ucwords(strtolower(trim($tellUsAboutYou['city'])))}},</span>
              <span style="text-transform: capitalize" >{{ucwords(strtolower(trim($tellUsAboutYou['state'])))}},</span> hereby appoint my
                @if(isset($healthFinance) && array_key_exists('relation',$healthFinance) && !is_null($healthFinance['relation'])  && $healthFinance['relation'] == 'Other')
                    <span style="font-family:'Times New Roman, serif'">{{ucwords(strtolower(trim($healthFinance['relationOther'])))}},</span>
                @elseif (isset($healthFinance) && array_key_exists('relation',$healthFinance) && !is_null($healthFinance['relation']) && $healthFinance['relation'] != 'Other')
                    <span style="font-family:'Times New Roman, serif'">{{ucwords(strtolower(trim($healthFinance['relation'])))}},</span>
                @endif
                
                <span style="text-transform: capitalize" > {{ucwords(strtolower(trim($healthFinance['fullname'])))}}, </span> of
                <span style="text-transform: capitalize" > {{ucwords(strtolower(trim($healthFinance['address'])))}},</span>  in
                <span style="text-transform: capitalize" > {{ucwords(strtolower(trim($healthFinance['city'])))}}, </span>
                <span style="text-transform: capitalize" > {{ucwords(strtolower(trim($healthFinance['state'])))}}, </span>
                <span style="text-transform: capitalize" > {{ucwords(strtolower(trim($healthFinance['zip'])))}}, </span>
                (Tel: <span > {{$healthFinance['phone']}} </span> )
                as my attorney in fact to make
                health care decisions for me if I become unable to make my own
                health-care decisions.  This gives my attorney in fact the power to
                grant, refuse, or withdraw consent on my behalf for any health-care
                service, treatment or procedure. My attorney in fact also has the
                authority to talk to health-care personnel, get information and sign
                forms necessary to carry out these decisions.</span></span></span></span></span>
            </p>

            @if(isset($healthFinance) && $healthFinance['anyBackupAgent'] == 'true')
              <p style="margin-bottom: 0in; line-height: 115%">
                  If the person named above as my attorney in fact is not available or becomes ineligible
                  to act, or if I revoke that person’s appointment or authority to
                  act, then I appoint my
                  @if(isset($healthFinance) && array_key_exists('backupRelation',$healthFinance) && !is_null($healthFinance['backupRelation']) && $healthFinance['backupRelation'] == 'Other')
                      <span>{{ucwords(strtolower(trim($healthFinance['backupRelation'])))}},</span>
                  @elseif(isset($healthFinance) && array_key_exists('backupRelation',$healthFinance) && !is_null($healthFinance['backupRelation']) && $healthFinance['backupRelation'] != 'Other')
                      <span>{{ucwords(strtolower(trim($healthFinance['backupRelation'])))}},</span>
                  @endif

                  <span style="text-transform: capitalize" > {{ucwords(strtolower(trim($healthFinance['backupFullname'])))}}, </span> of
                  <span style="text-transform: capitalize" > {{ucwords(strtolower(trim($healthFinance['backupAddress'])))}}, </span> in
                  <span style="text-transform: capitalize" > {{ucwords(strtolower(trim($healthFinance['backupCity'])))}}, </span>
                  <span style="text-transform: capitalize" > {{ucwords(strtolower(trim($healthFinance['backupState'])))}}, </span>
                  <span style="text-transform: capitalize" > {{$healthFinance['backupZip']}}, </span>
                  (Tel: <span> {{$healthFinance['backupphone']}} </span> ),
                  as my alternate attorney in fact to
                  make health care decisions for me if I become unable to make my own
                  health-care decisions.
              </p>
            @endif

            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">With this document,
                I intend to create a power of attorney for health care, which shall
                take effect if I become incapable of making my own health-care
                decisions and shall continue during that incapacity.  My attorney in
                fact shall make health-care decisions as I direct below or as I make
                known to my attorney in fact in some other way.</p>
            <p style="margin-bottom: 0.06in; line-height: 115%">


            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">Statement
              of desires concerning life-prolonging care, treatment, services, and
              procedures:</span></span></span></span></span></p>
            <p  style="text-align:center;margin-bottom: 0.09in; line-height: 115%"><span  style="font-size: 9pt"><i><b>(initial
            only the ONE option that applies)</b></i></span></p>
            <p style="margin-left: 1in; text-indent: -1in; margin-bottom: 0.09in; line-height: 115%">
            <span  style="font-size: 9pt">__________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I
              direct that treatment be withheld or withdrawn, and that I be
              permitted to die naturally with only the administration of medication
              or the performance of any medical treatment deemed necessary to
              alleviate pain.</span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in"><span  style="font-size: 9pt">__________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I
              DO NOT authorize that life-prolonging treatment be withheld or
              withdrawn.</span></p>
            <p  style="text-align:center;margin-bottom: 0.09in; line-height: 115%">


            </p>
            <p  style="text-align:center;margin-bottom: 0.09in; line-height: 115%"><span  style="font-size: 9pt"><i><b>(initial
                only the ONE option that applies)</b></i></span></p>
            <p style="margin-left: 1in; text-indent: -1in; margin-bottom: 0.09in; line-height: 115%">
              <span  style="font-size: 9pt">__________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I
                authorize the withholding or withdrawal of artificially provided
                food, water, or other artificially provided nourishment or fluids.</span></p>
            <p style="margin-left: 1in; text-indent: -1in; margin-bottom: 0.09in; line-height: 115%">
              <span  style="font-size: 9pt">__________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I
                DO NOT authorize the withholding or withdrawal of artificially
                provided food, water, or other artificially provided nourishment or
                fluids.</span></p>
            <p style="margin-left: 1in; text-indent: -1in; margin-bottom: 0in; line-height: 115%">
              <span  style="font-size: 9pt">__________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I
                authorize my agent to withhold or withdraw artificially provided
                nourishment or fluids, or other treatment if my agent determines that
                withholding or withdrawing is in my best interest; but I do not
                mandate that withholding or withdrawing.
                &nbsp;</span></p>
        </div>

    </div>
    <!-- !Page 2 -->

    <!-- Page 3 -->
    <div>
        <div>

            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">Additional
      statements of desires, special provisions, and limitations regarding
      health care decisions:</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">________________________________________________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">________________________________________________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">________________________________________________________________________</span></span></span></span></span></p>
            <p  style="text-align:center;margin-left: 0.38in; margin-bottom: 0in; line-height: 115%">
                <i>(You may attach additional pages if you need more space to
                    complete your statement)</i></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; page-break-before: always; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">Subject
      to any limitations in this document, my attorney in fact has the
      power and authority to do all of the following:</span></span></span></span></span></p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">(a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Request,
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
      for such services, to give, disclose, and release to my attorney in
      fact, without restriction, all of my individually identifiable health
      information and medical records regarding any past, present, or
      future medical or mental health condition. This authority given my
      attorney in fact shall supersede any other agreement which I may have
      made with my health care providers to restrict access to or
      disclosure of my individually identifiable health information. This
      authority given my attorney in fact shall be effective immediately,
      has no expiration date and shall expire only in the event that I
      revoke the authority in writing and deliver it to my health care
      provider.</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">(b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Execute
      on my behalf any releases or other documents that may be required in
      order to obtain this information;</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">(c)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Consent
      to the further disclosure of this information if necessary;</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">(d)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Execute
      documents titled or purporting to be a “Refusal to Permit
      Treatment” and “Leaving Hospital Against Medical Advice.”</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">(e)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Execute
      any necessary waiver or release from liability required by a hospital
      or physician.</span></span></span></span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in"><b>By
                    my signature I indicate that I understand the purpose and effect of
                    this document.</b></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in"><b>I
                    sign my name to this Statutory Form Durable Power of Attorney for
                    Health Care on this ____ day of <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>,
                    <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </u>, in the City of
                    Washington, District of Columbia.</b></p>
            <p style="margin-left: 0.5in; text-indent: 0.5in; margin-bottom: 0in; line-height: 115%">


            </p>
            <p style="margin-bottom: 0in; line-height: 115%">SIGNATURE:
                _______________________________________</p>
            <p style="text-indent: 0.5in; margin-bottom: 0.08in; line-height: 115%">
                <span style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</span>
            </p>

            <!--<p style="text-indent: 0.5in; margin-bottom: 0.08in; line-height: 115%">
              <span color="#0000ff"><span color="#000000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span  style="font-size: 9pt"><b><span color="#000000">«</span>CLIENT
                FIRST NAME<span color="#000000">» «</span>CLIENT MIDDLE NAME<span color="#000000">»
                  «</span>CLIENT LAST NAME<span color="#000000">»
                </span><span color="#000000"><span ><span  style="font-size: 13pt">&nbsp;</span></span></span></b></span></span></p>-->
            <p  style="text-align:center;margin-bottom: 0.13in; page-break-before: always; line-height: 0.23in"><span  style="font-size: 13pt"><b>STATEMENT
      OF WITNESSES</b></span></p>
            <p style="margin-bottom: 0in; line-height: 115%">I declare that the
                person who signed or acknowledged this document is personally known
                to me, that the person signed or acknowledged this durable power of
                attorney for health care in my presence, and that the person appears
                to be of sound mind and under no duress, fraud, or undue influence. I
                am not the person appointed as the attorney in fact by this document,
                nor am I the health-care provider of the principal or an employee of
                the health-care provider of the principal.</p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">_______________________________________________(WITNESS
                1)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></p>
            <p style="margin-bottom: 0in; line-height: 115%">NAME:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                DATE</p>
            <p style="margin-bottom: 0in; line-height: 115%">ADDRESS:</p>
            <p style="margin-bottom: 0in; line-height: 115%">CITY/STATE:</p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">_______________________________________________(WITNESS
                2)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></p>
            <p style="margin-bottom: 0in; line-height: 115%">NAME:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                DATE</p>
            <p style="margin-bottom: 0in; line-height: 115%">ADDRESS:</p>
            <p style="margin-bottom: 0in; line-height: 115%">CITY/STATE:</p>


            <p style="margin-bottom: 0in; line-height: 115%">Subscribed and sworn
                to before me by<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
                and
            </p>
            <p style="text-indent: 0.5in; margin-bottom: 0in; line-height: 115%"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><span style="text-decoration: none">
      as witnesses, on this </span><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><span style="text-decoration: none">day
      of </span>
            </p>
            <p style="text-indent: 0.5in; margin-bottom: 0in; line-height: 115%"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><span style="text-decoration: none">,
      </span><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     </u><span style="text-decoration: none">.</span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">______________________________________</p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in"><b>NOTARY
                    PUBLIC</b></p>
            <p style="margin-bottom: 0in; line-height: 115%">My <b>c</b>ommission
                expires: _________________</p>

            <p  style="text-align:center;margin-bottom: 0.09in; line-height: 115%"><i>(AT
                    LEAST ONE OF THE ABOVE WITNESSES MUST ALSO SIGN THE FOLLOWING
                    DECLARATION.)</i></p>
            <p style="margin-bottom: 0in; line-height: 115%">I further declare
                that I am not related to the principal by blood, marriage, or
                adoption, and, to the best of my knowledge, I am not entitled to any
                part of the estate of the principal under a currently existing will
                or by operation of law.</p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">_________________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[signature
      – please print name under this line]</span></span></span></span></span></p>

        </div>

    </div>
    <!-- !Page 4 -->

    <!-- Page 5 -->
    <div>
        <div>

            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">_________________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[signature
      – please print name under this line]</span></span></span></span></span></p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:center;margin-bottom: 0in; page-break-before: always; line-height: 115%"><span  style="font-size: 13pt"><b><span  style="font-size: 17pt">D</span>ISTRICT
      OF <span  style="font-size: 17pt">C</span>OLUMBIA <span  style="font-size: 17pt">D</span>ECLARATION</b></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in"><span style="text-decoration: none">Declaration
      made this </span><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><span style="text-decoration: none">
      day of </span><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><span style="text-decoration: none">,
      </span><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><span style="text-decoration: none">.</span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">I,
      <b>
        <span style="text-transform: capitalize">{{strtoupper(trim($tellUsAboutYou['fullname']))}},</span>
      </b>
      being of sound mind, willfully and voluntarily make known my desire
      that my dying shall not be artificially prolonged under the
      circumstances set forth below, do hereby declare:</span></span></span></span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">If at any time I
                should have an incurable injury, disease or illness certified to be a
                terminal condition by two physicians who have personally examined me,
                one of whom shall be my attending physician, and the physicians have
                determined that my death will occur whether or not life-sustaining
                procedures are utilized and where the application of life-sustaining
                procedures would serve only to artificially prolong the dying
                process, I direct that such procedures be withheld or withdrawn, and
                that I be permitted to die naturally with only the administration of
                medication or the performance of any medical procedure deemed
                necessary to provide me with comfort care or to alleviate pain.</p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">Other
      directions:</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">________________________________________________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">________________________________________________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">________________________________________________________________________</span></span></span></span></span></p>
            <p  style="text-align:center;margin-bottom: 0.09in; line-height: 115%"><i>(Add
                    additional sheets if necessary.)</i></p>
            <p style="margin-bottom: 0in; line-height: 115%">In the absence of my
                ability to give directions regarding the use of such life-sustaining
                procedures, it is my intention that this declaration shall be honored
                by my family and physician(s) as the final expression of my legal
                right to refuse medical or surgical treatment and accept the
                consequences from such refusal.</p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">I understand the
                full import of this declaration and I am emotionally and mentally
                competent to make this declaration.</p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">_______________________________________</span></span></span></span></span></p>
            <p style="text-indent: 0.5in; margin-bottom: 0.08in; line-height: 115%">
                <span style="text-transform: capitalize" >{{strtoupper(trim($tellUsAboutYou['fullname']))}}</span>
            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="text-transform: capitalize" >{{$tellUsAboutYou['address']}},</span>
            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="text-transform: capitalize" >{{$tellUsAboutYou['city']}},</span>
            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="text-transform: capitalize" >{{$tellUsAboutYou['state']}},</span>
            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="text-transform: capitalize" >{{$tellUsAboutYou['zip']}},</span>
            </p>
            <p style="margin-left: 0in; margin-bottom: 0in; line-height: 115%">
                <span style="text-transform: capitalize" >{{$tellUsAboutYou['phone']}}</span>
            </p>
        </div>
    </div>
    <!-- !Page 5 -->

    <!-- Page 6 -->
    <div>
        <div>

            <p style="margin-bottom: 0in; page-break-before: always; line-height: 115%">I believe the
                declarant to be of sound mind. I did not sign the declarant’s
                signature above for or at the direction of the declarant. I am at
                least eighteen years of age and am not related to the declarant by
                blood or marriage, entitled to any portion of the estate of the
                declarant according to the laws of intestate succession of the
                District of Columbia or under any will of the declarant or codicil
                thereto, or directly financially responsible for declarant’s
                medical care. I am not the declarant’s attending physician, an
                employee of the attending physician, or an employee of the health
                facility in which the declarant is a patient.</p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">_______________________________________________(WITNESS
                1)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></p>
            <p style="margin-bottom: 0in; line-height: 115%">NAME:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                DATE</p>
            <p style="margin-bottom: 0in; line-height: 115%">ADDRESS:</p>
            <p style="margin-bottom: 0in; line-height: 115%">CITY/STATE:</p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">_______________________________________________(WITNESS
                2)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></p>
            <p style="margin-bottom: 0in; line-height: 115%">NAME:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                DATE</p>
            <p style="margin-bottom: 0in; line-height: 115%">ADDRESS:</p>
            <p style="margin-bottom: 0in; line-height: 115%">CITY/STATE:</p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

            </p>
        </div>
    </div>
    <!-- !Page 6 -->


</div>

</body>
</html>
