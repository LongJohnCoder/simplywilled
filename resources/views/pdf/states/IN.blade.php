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
<div class="docContainer" id="doc">

    <div class="docPage" style="page-break-after: always;">
        <div id="doc" class="docPageInner">
            <p  style="text-align:center;margin-bottom: 0.13in; line-height: 0.28in; page-break-before: auto; page-break-after: auto">
                <span  style="font-size: 17pt"><b>INDIANA ADVANCE DIRECTIVE</b></span></p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 0.23in"><span  style="font-size: 13pt"><b>PART
      I: APPOINTMENT OF HEALTH CARE REPRESENTATIVE</b></span></p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%"><span  style="font-size: 12pt">1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I,
      <b>
        <span style="text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}},</span>
      </b>
      of
        <span style="text-transform: capitalize">{{$tellUsAboutYou['address']}},</span>
        <span style="text-transform: capitalize" >{{$tellUsAboutYou['city']}},</span>
        <span style="text-transform: capitalize" >{{$tellUsAboutYou['state']}}</span>
          being at least eighteen (18) years of age, of sound mind, and capable
          of consenting to my health care, hereby appoint my
            @if(isset($healthFinance) && array_key_exists('relation',$healthFinance) && !is_null($healthFinance['relation'])  && $healthFinance['relation'] == 'Other')

                  <span style="font-family:'Times New Roman, serif'">{{$healthFinance['relationOther']}}</span>

            @else
                  <span style="font-family:'Times New Roman, serif'">{{$healthFinance['relation']}}</span>

            @endif
            <span>,</span>
            <span style="text-transform: capitalize" > {{$healthFinance['fullname']}}, </span> of
            <span style="text-transform: capitalize" > {{$healthFinance['address']}}, </span> in
            <span style="text-transform: capitalize" > {{$healthFinance['city']}},
            <span style="text-transform: capitalize" > {{$healthFinance['state']}}</span>,
            <span style="text-transform: capitalize" > {{$healthFinance['zip']}}, </span>
            (Tel: <span > {{$healthFinance['phone']}} </span> ), as my lawful health care representative
      (agent) to make health care decisions on my behalf whenever I am
      incapable of making my own health care decisions. </span></span>
            </p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>

            @if(isset($healthFinance) && array_key_exists('anyBackupAgent',$healthFinance) && !is_null($healthFinance['anyBackupAgent']) && $healthFinance['anyBackupAgent'] == 'true')
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%"><span  style="font-size: 12pt">
              If the above-named is not available or becomes ineligible to act as my
              attorney-in-fact, or if I revoke this appointment or authority to
              act, then I designate my
                @if(isset($healthFinance) && array_key_exists('backupRelation',$healthFinance) && !is_null($healthFinance['backupRelation']) && $healthFinance['backupRelation'] == 'Other')

                  @if(strlen(trim($healthFinance['backupRelationOther'])) > 0)
                    <span>{{$healthFinance['backupRelationOther']}},</span>
                  @else
                    <span>_____________________,</span>
                  @endif

                @else

                  @if(strlen(trim($healthFinance['backupRelation'])) > 0)
                    <span>{{$healthFinance['backupRelation']}},</span>
                  @else
                    <span>_____________________,</span>
                  @endif
                    <span>(relation)______________,</span>
                @endif
              <span style="text-transform: capitalize" > {{$healthFinance['backupFullname']}}, </span>  of
              <span style="text-transform: capitalize" > {{$healthFinance['backupAddress']}}, </span> in
              <span style="text-transform: capitalize" > {{$healthFinance['backupCity']}}, </span>
              <span style="text-transform: capitalize" > {{$healthFinance['backupState']}}, </span>
              <span style="text-transform: capitalize" > {{$healthFinance['backupZip']}}, </span>
              (Tel: <span > {{$healthFinance['backupphone']}} </span> ), as my alternate attorney-in-fact to make
              the health care decisions for me as authorized in this document.&nbsp;</span>
            </p>
            @endif

            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%"><span  style="font-size: 12pt">This
      appointment shall become effective at such time and from time to time
      as my attending physician determines that I am incapable of
      consenting to my health care.  I understand that if I have previously
      named a health care representative the designation herein replaces
      any prior named Health Care Representative.   </span>
            </p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%"><span  style="font-size: 12pt">2.
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I authorize my representative to
      make decisions in my best interest concerning withdrawal or
      withholding of health care. This authority shall apply to all matters
      affecting my health care, including but not limited to providing
      consent or refusing to provide consent to medical care, surgery,
      and/or placement in health care facilities, including extended care
      facilities, unless otherwise provided in this appointment. If at any
      time, based on my previously expressed preferences and the diagnosis
      and prognosis, my health care representative is satisfied that
      certain health care is not or would not be beneficial, or that such
      health care is or would be excessively burdensome, then my health
      care representative may express my will that such health care be
      withheld or withdrawn and may consent on my behalf that any or all
      health care be discontinued or not instituted, even if death may
      result. My health care representative must try to discuss this
      decision with me. However, if I am unable to communicate, my health
      care representative may make such a decision for me, after
      consultation with my physician or physicians and other relevant
      health care givers. To the extent appropriate, my health care
      representative may also discuss this decision with my family and
      others, to the extent they are available.</span></p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>

        </div>
       {{-- <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif; margin-top: 20px;">
            <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null && userDetails.tellUsAboutYou.fullname !== undefined"> Advance Directives of {{userDetails.tellUsAboutYou.fullname}} </span>
            <br>Page 1 of 6
        </div>--}}
    </div>
    <!-- !Page 1 -->

    <!-- Page 2 -->
    <div class="docPage">
        <div class="docPageInner">
          <p style="text-indent: 0.38in; margin-bottom: 0in; line-height: 115%">
      <span  style="font-size: 12pt">My representative’s powers
        shall include the following:</span></p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in; line-height: 115%">
      <span  style="font-size: 12pt">(a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;to
        employ or contract with servants, companions, or health care
        providers involved in my health care;</span></p>
            <p style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in; line-height: 115%">


            </p>
            <p style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in; line-height: 115%">
      <span  style="font-size: 12pt">(b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;to
        admit or release me from a hospital or health care facility;</span></p>
            <p style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in; line-height: 115%">


            </p>
            <p style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in; line-height: 115%">
      <span  style="font-size: 12pt">(c)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;to
        make anatomical gifts on my behalf;</span></p>
            <p style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in; line-height: 115%">


            </p>
            <p style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in; line-height: 115%">
      <span  style="font-size: 12pt">(d)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;to
        request an autopsy; and,</span></p>
            <p style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in; line-height: 115%">


            </p>
            <p style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in; line-height: 115%">
      <span  style="font-size: 12pt">(e)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;to
        request, review, and receive, to the extent I could do so
        individually, any information, verbal or written, regarding my
        physical or mental health, including, but not limited to, my
        individually identifiable health information or other medical records
        (including information governed by the Health Insurance Portability
        and Accountability Act of 1996 (HIPAA), 42 U.S.C. 1320d and 45 CFR
        160-164).</span></p>

            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%"><span  style="font-size: 12pt">3.
      My representative’s powers shall be subject to the following
      limitations:</span></p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; line-height: 0.25in">________________________________________<span  style="font-size: 12pt"><span style="text-decoration: none">.</span></span></p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%"><i>(Attach
                    additional pages as needed).</i></p>

        </div>
       {{-- <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif; margin-top: 20px;">
            <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null && userDetails.tellUsAboutYou.fullname !== undefined"> Advance Directives of {{userDetails.tellUsAboutYou.fullname}} </span>
            <br>Page 2 of 6
        </div>--}}
    </div>
    <!-- !Page 2 -->

    <!-- Page 3 -->
    <div class="docPage">
        <div class="docPageInner" style="page-break-after: always;">

            <p align="center" style="margin-bottom: 0in; line-height: 115%; page-break-before: always">
      <span size="3" style="font-size: 12pt"><b>SIGNATURE AND
        ACKNOWLEDGEMENT</b></span></p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0.08in; line-height: 115%"><span size="3" style="font-size: 12pt">I,
      <span style="text-transform: capitalize" >{{strtoupper($tellUsAboutYou['fullname'])}}</span>,
      the principal, sign my name to this instrument on this <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
      day of <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>,
      and do hereby declare to the undersigned witness that I sign it
      willingly, and I execute it as my free and voluntary act for the
      purposes herein expressed, and that I am eighteen years of age or
      older, of sound mind, and under no constraint or undue influence.</span></p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%"><span size="3" style="font-size: 12pt">_______________________________________</span></p>
            <p style="margin-bottom: 0in; line-height: 115%">
                <b>
                    <span style="text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}}</span>
                </b>
            </p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">
            </p>
            <p style="margin-bottom: 0in; line-height: 115%"><span  style="font-size: 12pt">STATE
      OF INDIANA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</span></p>
            <p style="margin-bottom: 0in; line-height: 115%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span  style="font-size: 12pt; padding-left: 100px;">)
      ss.&nbsp;</span></p>
            <p style="margin-bottom: 0in; line-height: 115%"><span  style="font-size: 12pt">COUNTY
      OF ________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</span></p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0.08in; line-height: 115%"><span  style="font-size: 12pt">Before
      me, the undersigned, a Notary Public, in and for said County and
      State, this ____ day of &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>,
      <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>,
      personally appeared
      <span style="text-transform: capitalize" >{{strtoupper($tellUsAboutYou['fullname'])}}</span>, said person being over the age of 18 years, and
      acknowledged the execution of the foregoing instrument.</span></p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%"><span  style="font-size: 12pt">______________________________________</span></p>
            <p style="margin-bottom: 0in; line-height: 115%"><span  style="font-size: 12pt">NOTARY
      PUBLIC</span></p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%"><span  style="font-size: 12pt">______________________________________</span></p>
            <p style="margin-bottom: 0in; line-height: 115%"><span  style="font-size: 12pt">PRINTED
      NAME</span></p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%"><span  style="font-size: 12pt">My
      Commission Expires: _________________</span></p>
            <p style="margin-top: 0.13in; margin-bottom: 0in; line-height: 115%"><span  style="font-size: 12pt">My
      County of Residence: _________________</span></p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 115%">

            </p>
        </div>
       {{-- <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif; margin-top: 20px;">
            <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null && userDetails.tellUsAboutYou.fullname !== undefined"> Advance Directives of {{userDetails.tellUsAboutYou.fullname}} </span>
            <br>Page 3 of 6
        </div>--}}
    </div>
    <!-- !Page 3 -->


    <!-- Page 4 -->
    <div class="docPage" >
        <div class="docPageInner">

            <p style="margin-bottom: 0.08in; line-height: 115%"><span  style="font-size: 12pt">We,
      the witnesses hereunder, certify that each of us is 18 years of age
      or older and each personally witnessed <span style="text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}},</span>
      the principal, sign
      or direct the signing of this appointment of health care
      representative; that we are acquainted with the principal and believe
      the principal to be of sound mind; that the principal’s desires are
      as expressed above; that neither of us is a person who signed the
      above directive on behalf of the principal; that we are not related
      to the principal by blood or marriage nor are we entitled to any
      portion of principal’s estate according to the laws of intestate
      succession of this state or under any will or codicil of principal;
      that we are not directly financially responsible for the principal’s
      medical care; and that we are not agents of any health care facility
      in which the principal may be a patient at the time of signing this
      directive.</span></p>
            <p  style="text-align:left;text-indent: -0.19in; margin-bottom: 0in; line-height: 115%">


            </p>


        </div>
       {{-- <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif; margin-top: 20px;">
            <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null && userDetails.tellUsAboutYou.fullname !== undefined"> Advance Directives of {{userDetails.tellUsAboutYou.fullname}} </span>
            <br>Page 4 of 6
        </div>--}}
    </div>
    <!-- !Page 4 -->

<div class="docPage">
        <div class="docPageInner">

<p  style="text-align:left;margin-bottom: 0in; line-height: 115%">
<br>
            </p>
            <p align="left" style="margin-bottom: 0in; line-height: 115%;">
    <span  ><b>WITNESS 1: </b>__________________________</span><span style="text-decoration: none; padding-left: 20px;">Dated: __________________________</span>
      </p>
    <p style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 115%; margin-top: 0;">
      <span  style="font-size: 11pt">[signature]</span></p>
    <p style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 115%">
      __________________________<span style="text-decoration: none; padding-left: 70px;">__________________________</span></p>
    <p style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 115%; margin-top: 0;">
      <span  style="font-size: 11pt">[name printed]<span style="padding-left: 200px; display: inline-block;"></span>[street address]</span></p>
    <p style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 115%">
      <span style="text-decoration: none; padding-left: 278px; display: inline-block;"></span>__________________________</p>
    <p style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 115%; margin-top: 0;">
        <span  style="font-size: 11pt; padding-left: 288px;">[city,
      state, zip]</span></p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">
<br>
            </p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">
<br>
            </p>
            <p align="left" style="margin-bottom: 0in; line-height: 115%;">
    <span  ><b>WITNESS 2: </b>__________________________</span><span style="text-decoration: none; padding-left: 20px;">Dated: __________________________</span>
      </p>
    <p style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 115%; margin-top: 0;">
      <span  style="font-size: 11pt">[signature]</span></p>
    <p style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 115%">
      __________________________<span style="text-decoration: none; padding-left: 70px;">__________________________</span></p>
    <p style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 115%; margin-top: 0;">
      <span  style="font-size: 11pt">[name printed]<span style="padding-left: 200px; display: inline-block;"></span>[street address]</span></p>
    <p style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 115%">
      <span style="text-decoration: none; padding-left: 278px; display: inline-block;"></span>__________________________</p>
    <p style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 115%; margin-top: 0;">
        <span  style="font-size: 11pt; padding-left: 288px;">[city,
      state, zip]</span></p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 0.23in">

            </p>
</div>
</div>



    <!-- Page 5 -->
    <div class="docPage">
        <div class="docPageInner">

            <p  style="text-align:center;margin-bottom: 0in; line-height: 0.23in; page-break-before: always">
      <span  style="font-size: 13pt"><b>PART II:  INDIANA LIVING
        WILL DECLARATION</b></span></p>
            <p  style="text-align:center;margin-top: 0.06in; margin-bottom: 0in; line-height: 0.23in">
      <span  style="font-size: 13pt"><b>TO WITHHOLD OR WITHDRAW
        LIFE-PROLONGING PROCEDURES</b></span></p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%"><span  style="font-size: 12pt"><span style="text-decoration: none">Declaration
      made on this </span><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><span style="text-decoration: none">
      day of </span><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><span style="text-decoration: none">,
      </span><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><span style="text-decoration: none">.</span></span></p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0.08in; line-height: 115%"><span  style="font-size: 12pt">I,
      <b>
        <span style="text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}}</span>,
      </b>being at least eighteen (18) years old and of sound mind,
      willfully and voluntarily make known my desires that my dying shall
      not be artificially prolonged under the circumstances set forth
      below, and I declare:</span></p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-left: 0.38in; margin-bottom: 0in; line-height: 115%">
      <span  style="font-size: 12pt">If at any time my attending
        physician certifies in writing that: </span>
            </p>
            <p style="margin-left: 0.5in; margin-bottom: 0in; line-height: 115%"><span  style="font-size: 12pt">(1)
      I have an incurable injury, disease, or illness; </span>
            </p>
            <p style="margin-left: 0.5in; margin-bottom: 0in; line-height: 115%"><span  style="font-size: 12pt">(2)
      my death will occur within a short time; and </span>
            </p>
            <p style="margin-left: 0.5in; margin-bottom: 0in; line-height: 115%"><span  style="font-size: 12pt">(3)
      the use of life prolonging procedures would serve only to
      artificially prolong the dying process, </span>
            </p>
            <p style="margin-left: 0.38in; margin-bottom: 0in; line-height: 115%">


            </p>
            <p style="margin-bottom: 0in; line-height: 115%"><span  style="font-size: 12pt">I
      direct that such procedures be withheld or withdrawn, and that I be
      permitted to die naturally with only the performance or provision of
      any medical procedure or medication necessary to provide me with
      comfort care or to alleviate pain, and, if I have so indicated below,
      the provision of artificially supplied nutrition and hydration. </span>
            </p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%"><span  style="font-size: 12pt"><i>(Indicate
      your choice by initialing ONE option before signing this
      declaration):</i></span></p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-left: 0.94in; text-indent: -0.56in; margin-bottom: 0in; line-height: 115%">
      <span  style="font-size: 12pt">_______&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I
        wish to receive artificially supplied nutrition and hydration, even
        if the effort to sustain life is futile or excessively burdensome to
        me. I request the use of life prolonging procedures that would extend
        my life, including artificial nutrition and hydration, the
        administration of medication, and the performance of all other
        medical procedures necessary to extend my life, to provide comfort
        care, or to alleviate pain.</span></p>
            <p style="margin-left: 0.94in; text-indent: -0.56in; margin-bottom: 0in; line-height: 115%">


            </p>
            <p style="margin-left: 0.94in; text-indent: -0.56in; margin-bottom: 0in; line-height: 115%">
                <span  style="font-size: 12pt"><b>OR</b></span></p>
            <p style="margin-left: 0.94in; text-indent: -0.56in; margin-bottom: 0in; line-height: 115%">


            </p>
            <p style="margin-left: 0.94in; text-indent: -0.56in; margin-bottom: 0in; line-height: 115%">
      <span  style="font-size: 12pt">_______&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I
        do not wish to receive artificially supplied nutrition and hydration,
        if the effort to sustain life is futile or excessively burdensome to
        me.</span></p>
            <p style="margin-left: 0.94in; text-indent: -0.56in; margin-bottom: 0in; line-height: 115%">


            </p>
            <p style="margin-left: 0.94in; text-indent: -0.56in; margin-bottom: 0in; line-height: 115%">
                <span  style="font-size: 12pt"><b>OR</b></span></p>
            <p style="margin-left: 0.94in; text-indent: -0.56in; margin-bottom: 0in; line-height: 115%">


            </p>
            <p style="margin-left: 0.94in; text-indent: -0.56in; margin-bottom: 0in; line-height: 115%">
      <span  style="font-size: 12pt">_______&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I
        intentionally make no decision concerning artificially supplied
        nutrition and hydration, leaving the decision to my health care
        representative appointed under Indiana Code 16-36-1-7 or my attorney
        in fact with health care powers under Indiana Code 30-5-5.</span></p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

            </p>
        </div>
   {{--     <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif; margin-top: 20px;">
            <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null && userDetails.tellUsAboutYou.fullname !== undefined"> Advance Directives of {{userDetails.tellUsAboutYou.fullname}} </span>
            <br>Page 5 of 6
        </div>--}}
    </div>
    <!-- !Page 5 -->

    <!-- Page 6 -->
    <div class="docPage" style="">
        <div class="docPageInner">

            <p style="margin-left: 0.38in; margin-bottom: 0in; line-height: 115%">
      <span  style="font-size: 12pt">In the absence of my ability
        to give directions regarding the use of life prolonging procedures,
        it is my intention that this declaration be honored by my family and
        physician as the final expression of my legal right to refuse medical
        or surgical treatment and accept the consequences of the refusal.</span></p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%"><span  style="font-size: 12pt"><b>I
      understand the full import of this declaration.</b></span></p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><span style="text-decoration: none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span  style="font-size: 12pt">Date:</span><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></span></p>
            <p style="margin-bottom: 0.08in; line-height: 115%">
                <span style="text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}}</span>
            </p>
            <p style="margin-bottom: 0in; line-height: 115%">
                <span style="text-transform: capitalize" >{{$tellUsAboutYou['address']}},</span>
            </p>
            <p style="margin-bottom: 0in; line-height: 115%"><span  style="font-size: 12pt">
              <span style="text-transform: capitalize" >{{$tellUsAboutYou['city']}},</span>
              <span style="text-transform: capitalize" >{{$tellUsAboutYou['state']}},</span>
              <span style="text-transform: capitalize" >{{$tellUsAboutYou['zip']}}</span>
            </span>
            </p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0.08in; line-height: 115%"><span  style="font-size: 12pt">We,
      the witnesses hereunder, certify that each of us is 18 years of age
      or older and each personally witnessed
      <span style="text-transform: capitalize" >{{strtoupper($tellUsAboutYou['fullname'])}},</span>
      sign or direct the signing of this directive; that we are acquainted
      with the declarant and believe the declarant to be of sound mind;
      that the declarant's desires are as expressed above; that neither of
      us is a person who signed the above directive on behalf of the
      declarant; that we are not related to the declarant by blood or
      marriage nor are we entitled to any portion of declarant's estate
      according to the laws of intestate succession of this state or under
      any will or codicil of declarant; that we are not directly
      financially responsible for declarant's medical care; and that we are
      not agents of any health care facility in which the declarant may be
      a patient at the time of signing this directive.</span></p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">
<br>
            </p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">
<br>
            </p>
            <p align="left" style="margin-bottom: 0in; line-height: 115%;">
    <span  ><b>WITNESS 1: </b>__________________________</span><span style="text-decoration: none; padding-left: 20px;">Dated: __________________________</span>
      </p>
    <p style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 115%; margin-top: 0;">
      <span  style="font-size: 11pt">[signature]</span></p>
    <p style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 115%">
      __________________________<span style="text-decoration: none; padding-left: 70px;">__________________________</span></p>
    <p style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 115%; margin-top: 0;">
      <span  style="font-size: 11pt">[name printed]<span style="padding-left: 200px; display: inline-block;"></span>[street address]</span></p>
    <p style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 115%">
      <span style="text-decoration: none; padding-left: 278px; display: inline-block;"></span>__________________________</p>
    <p style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 115%; margin-top: 0;">
        <span  style="font-size: 11pt; padding-left: 288px;">[city,
      state, zip]</span></p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">
<br>
            </p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">
<br>
            </p>
            <p align="left" style="margin-bottom: 0in; line-height: 115%;">
    <span  ><b>WITNESS 2: </b>__________________________</span><span style="text-decoration: none; padding-left: 20px;">Dated: __________________________</span>
      </p>
    <p style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 115%; margin-top: 0;">
      <span  style="font-size: 11pt">[signature]</span></p>
    <p style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 115%">
      __________________________<span style="text-decoration: none; padding-left: 70px;">__________________________</span></p>
    <p style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 115%; margin-top: 0;">
      <span  style="font-size: 11pt">[name printed]<span style="padding-left: 200px; display: inline-block;"></span>[street address]</span></p>
    <p style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 115%">
      <span style="text-decoration: none; padding-left: 278px; display: inline-block;"></span>__________________________</p>
    <p style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 115%; margin-top: 0;">
        <span  style="font-size: 11pt; padding-left: 288px;">[city,
      state, zip]</span></p>
        </div>
       {{-- <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif; margin-top: 20px;">
            <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null && userDetails.tellUsAboutYou.fullname !== undefined"> Advance Directives of {{userDetails.tellUsAboutYou.fullname}} </span>
            <br>Page 6 of 6
        </div>--}}
    </div>
    <!-- !Page 6 -->

</div>

</body>
</html>
