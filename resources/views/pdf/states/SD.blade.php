<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Untitled Document</title>
    <style>
     /*   *{
            margin: 0;
            padding: 0;
        }
        body{
            margin: 0;
            padding: 0;
            font-family: Garamond;
        }
        !* width *!
        ::-webkit-scrollbar {
            width: 14px;
        }

        !* Track *!
        ::-webkit-scrollbar-track {
            background: #0f69bb;

        }

        !* Handle *!
        ::-webkit-scrollbar-thumb {
            background: #99cc33;
            border-radius: 5px;
        }

        !* Handle on hover *!
        ::-webkit-scrollbar-thumb:hover {
            background: #57ab2a;
        }

        .docContainer{
            width: 700px;
            margin: 0 auto;
        }
        .docPage{
            width: 700px !important;
            height: 991px!important;
            background: #fff;
            box-shadow: 0 0 7px rgba(0,0,0,0.3);
            margin: 20px 0;
            box-sizing: border-box;
            padding: 40px;
        }


*/

    </style>
</head>

<body>

<div class="docContainer" id="doc">

    <!-- Page 1-->
    <div class="docPage" style="margin: 0; box-sizing: border-box; padding: 0px;">
        <div class="docPageInner" style="box-sizing: border-box; height: 800px;">
            <p  style="margin-bottom: 0in; line-height: 22px; text-align: center;"><span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 13pt"><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>S</b></span></span></span><span size="4" style="font-size: 16pt"><b>OUTH
    </b></span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>D</b></span></span></span><span size="4" style="font-size: 16pt"><b>AKOTA</b></span></span></span></p>
            <p  style="margin-bottom: 0in; line-height: 22px; text-align: center;"><span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 13pt"><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>D</b></span></span></span><span size="4" style="font-size: 16pt"><b>URABLE
    </b></span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>P</b></span></span></span><span size="4" style="font-size: 16pt"><b>OWER
    OF </b></span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>A</b></span></span></span><span size="4" style="font-size: 16pt"><b>TTORNEY</b></span></span></span></p>
            <p  style="margin-bottom: 0in; line-height: 22px; text-align: center;"><span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 13pt"><span size="4" style="font-size: 16pt"><b>FOR
    </b></span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>H</b></span></span></span><span size="4" style="font-size: 16pt"><b>EALTH
    </b></span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>C</b></span></span></span><span size="4" style="font-size: 16pt"><b>ARE</b></span></span></span></p>
            <p  style="margin-bottom: 0in; ">

            </p>
            <p style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'">I,
      </span></span><span style="font-family:'Times New Roman, serif'">
          @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
          @else
            <b>________________________________</b>
          @endif
      </span><span ><span style="font-family:'Times New Roman, serif'">,
      of
        @if(isset($tellUsAboutYou) && array_key_exists('address',$tellUsAboutYou) && !is_null($tellUsAboutYou['address']))
            <span style="font-family:'Times New Roman, serif'" >{{$tellUsAboutYou['address']}}</span>
        @else
            <span>_________________________________________________________________
            ___________________________________________________________________________________________
            _________________________________________________________________________________</span>
        @endif

        @if(isset($tellUsAboutYou) && array_key_exists('city',$tellUsAboutYou) && !is_null($tellUsAboutYou['city']))
            <span style="text-transform: capitalize">{{$tellUsAboutYou['city']}}</span>
        @else
            <span style="text-transform: capitalize">(city)_____________</span>
        @endif
        <span >, </span>

        @if(isset($tellUsAboutYou) && array_key_exists('state',$tellUsAboutYou) && !is_null($tellUsAboutYou['state']))
            <span style="text-transform: capitalize">{{$tellUsAboutYou['state']}}</span>
        @else
            <span style="text-transform: capitalize">(state)_____________</span>
        @endif
        <span >, </span> being an adult of sound mind, hereby appoint my
        @if(isset($healthFinance) && array_key_exists('relation',$healthFinance) && !is_null($healthFinance['relation'])  && $healthFinance['relation'] == 'Other')
            @if(strlen(trim($healthFinance['relationOther'])) > 0)
                <span style="font-family:'Times New Roman, serif'">{{$healthFinance['relationOther']}}</span>
            @else
                <span style="font-family:'Times New Roman, serif'">__________________</span>
            @endif
        @elseif (isset($healthFinance) && array_key_exists('relation',$healthFinance) && !is_null($healthFinance['relation']) && $healthFinance['relation'] != 'Other')
            @if(strlen(trim($healthFinance['relation'])) > 0)
                <span style="font-family:'Times New Roman, serif'">{{$healthFinance['relation']}}</span>
            @else
                <span style="font-family:'Times New Roman, serif'">__________________</span>
            @endif
        @else
            <span>(relation)______________</span>
        @endif
        <span >, </span>

        @if(isset($healthFinance) && array_key_exists('fullname',$healthFinance) && !is_null($healthFinance['fullname']))
            <span style="font-family:'Times New Roman, serif'">{{$healthFinance['fullname']}}</span>
        @else
            <span style="font-family:'Times New Roman, serif'">_____________________________</span>
        @endif
        <span >, of </span>

        @if(isset($healthFinance) && array_key_exists('address',$healthFinance) && !is_null($healthFinance['address']))
            <span style="font-family:'Times New Roman, serif'">{{$healthFinance['address']}}, </span>
        @else
            <span>
                _________________________________________________________________
                _______________________________________________________________________________,
            </span>
        @endif


        @if(isset($healthFinance) && array_key_exists('city',$healthFinance) && !is_null($healthFinance['city']))
            <span style="font-family:'Times New Roman, serif'">{{$healthFinance['city']}}, </span>
        @else
            <span>(city)__________________, </span>
        @endif

        @if(isset($healthFinance) && array_key_exists('state',$healthFinance) && !is_null($healthFinance['state']))
            <span style="font-family:'Times New Roman, serif'">{{$healthFinance['state']}}, </span>
        @else
            <span>(state)__________________, </span>
        @endif

        @if(isset($healthFinance) && array_key_exists('zip',$healthFinance) && !is_null($healthFinance['zip']))
            <span style="font-family:'Times New Roman, serif'">{{$healthFinance['zip']}}, </span>
        @else
            <span >(zip)__________________, </span>
        @endif

        <span >
        (Tel: </span>
            @if(isset($healthFinance) && array_key_exists('phone',$healthFinance) && !is_null($healthFinance['phone']))
                <span style="font-family:'Times New Roman, serif'">{{$healthFinance['phone']}}</span>
            @else
                <span>__________________</span>
            @endif

        <span >),
      as my attorney in fact (“agent”) to consent to, to reject, or to
      withdraw consent for medical procedures, treatment or intervention.
      In the event the person I appoint above is unable, unwilling or
      unavailable to act as my health care agent, I appoint as my successor
      agent</span></span>
      @if(isset($healthFinance) && array_key_exists('anyBackupAgent',$healthFinance) && !is_null($healthFinance['anyBackupAgent']) && $healthFinance['anyBackupAgent'] == 'true')

        @if(isset($healthFinance) && array_key_exists('backupRelation',$healthFinance) && !is_null($healthFinance['backupRelation']) && $healthFinance['backupRelation'] == 'Other')
            @if(strlen(trim($healthFinance['backupRelationOther'])) > 0)
                <span>{{$healthFinance['backupRelationOther']}}</span>
            @else
                <span>(relation) __________________</span>
            @endif
        @else
            @if(strlen(trim($healthFinance['backupRelation'])) > 0)
                <span>{{$healthFinance['backupRelation']}}</span>
            @else
                <span>(relation) _________________</span>
            @endif
        @endif
        <span>, </span>

        @if(isset($healthFinance) && array_key_exists('backupFullname',$healthFinance) && !is_null($healthFinance['backupFullname']))
            <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupFullname']}}</span>
        @else
            <span style="font-family:'Times New Roman, serif'">_____________________________</span>
        @endif
        <span >, of </span>

        @if(isset($healthFinance) && array_key_exists('backupAddress',$healthFinance) && !is_null($healthFinance['backupAddress']))
            <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupAddress']}}, </span>
        @else
            <span>
                _________________________________________________________________
                _______________________________________________________________________________,
            </span>
        @endif

        @if(isset($healthFinance) && array_key_exists('backupCity',$healthFinance) && !is_null($healthFinance['backupCity']))
            <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupCity']}}, </span>
        @else
            <span>(city)__________________, </span>
        @endif

        @if(isset($healthFinance) && array_key_exists('backupState',$healthFinance) && !is_null($healthFinance['backupState']))
            <span style="font-family:'Times New Roman, serif'" >{{$healthFinance['backupState']}}, </span>
        @else
            <span>(state)__________________, </span>
        @endif

        @if(isset($healthFinance) && array_key_exists('backupZip',$healthFinance) && !is_null($healthFinance['backupZip']))
            <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupZip']}}, </span>
        @else
            <span>(zip)__________________, </span>
        @endif

        <span >
        (Tel: </span>

            @if(isset($healthFinance) && array_key_exists('backupphone',$healthFinance) && !is_null($healthFinance['backupphone']))
                <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupphone']}}</span>
            @else
                <span>__________________</span>
            @endif


        <span  style="font-size: 12pt">),
      </span></span>
      @endif
      </p>
      @if(isset($healthFinance) && array_key_exists('anyBackupAgent',$healthFinance) && !is_null($healthFinance['anyBackupAgent']) && $healthFinance['anyBackupAgent'] == 'false')
        <div>
            <p style="margin-bottom: 0in; ">
                <span ><span style="font-family:'Times New Roman, serif'">
                The following persons as my alternate attorney in fact to make health
                care decisions for me as authorized by this document, in the order
                listed below:</span></span>
            </p>
            <p  style="margin-bottom: 0in; ">

            </p>
            <p  style="margin-left: 1in; margin-bottom: 0in; ">
                <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span ><span size="3" style="font-size: 12pt"><u>Alternate
                Agent 1</u></span></span></span></span></p>
            <p  style="margin-left: 1in; margin-bottom: 0in; line-height: 150%">
                

            </p>
            <p  style="margin-left: 1in; margin-bottom: 0in; line-height: 150%">
                <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span ><span size="3" style="font-size: 12pt">Name:		</span></span><span ><span size="3" style="font-size: 12pt">_________________________________</span></span></span></span></p>
            <p  style="margin-left: 1in; margin-bottom: 0in; line-height: 150%">
                <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span ><span size="3" style="font-size: 12pt">Address:	</span></span><span ><span size="3" style="font-size: 12pt">_________________________________</span></span></span></span></p>
            <p  style="margin-left: 1in; margin-bottom: 0in; line-height: 150%">
                <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span ><span size="3" style="font-size: 12pt">Telephone:	</span></span><span ><span size="3" style="font-size: 12pt">_________________________________</span></span></span></span></p>
            <p  style="margin-left: 1in; margin-bottom: 0in; ">
                

            </p>
            <p  style="margin-left: 1in; margin-bottom: 0in; ">
                <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span ><span size="3" style="font-size: 12pt"><u>Alternate
                Agent 1</u></span></span></span></span></p>
            <p  style="margin-left: 1in; margin-bottom: 0in; line-height: 150%">
                

            </p>
            <p  style="margin-left: 1in; margin-bottom: 0in; line-height: 150%">
                <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span ><span size="3" style="font-size: 12pt">Name:		</span></span><span ><span size="3" style="font-size: 12pt">_________________________________</span></span></span></span></p>
            <p  style="margin-left: 1in; margin-bottom: 0in; line-height: 150%">
                <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span ><span size="3" style="font-size: 12pt">Address:	</span></span><span ><span size="3" style="font-size: 12pt">_________________________________</span></span></span></span></p>
            <p  style="margin-left: 1in; margin-bottom: 0in; line-height: 150%">
                <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span ><span size="3" style="font-size: 12pt">Telephone:	</span></span><span ><span size="3" style="font-size: 12pt">_________________________________</span></span></span></span></p>
            <p  style="margin-left: 0.38in; margin-bottom: 0in; ">
                

            </p>
        </div>
      @endif
            <p  style="margin-bottom: 0in; ">

            </p>
            <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">This
      durable power of attorney for health care is effective only during
      any period in which my physician has determined in good faith that I
      do not have decisional capacity.  </span></span></span>
            </p>
            <p  style="margin-bottom: 0in; ">

            </p>
            <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'">I
      have discussed my wishes with my agent, and authorize my agent to
      make all and any health care decisions for me </span><span face="Times, serif">which
      I could make individually if I had decisional capacity (except for
      any limitations given below)</span><span style="font-family:'Times New Roman, serif'">,
      including decisions to withhold or withdraw any form of life support,
      artificial nutrition, and hydration, which shall be made in
      accordance with my instructions in my Living Will if I have executed
      one.  </span><span face="Times, serif">All such decisions shall be
      made in accordance with accepted medical standards and the agent (or
      any successor agent) may not authorize the withholding or withdrawal
      of comfort care from me.  Whenever making any health care decision
      for me, my agent (or any successor agent) shall consider the
      recommendation of my attending physician, the decision I would have
      made if I then had decisional capacity (if known) and the decision
      that would be in my best interests. </span>
            </p>
        </div>
        <!-- @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Power of Attorney for Health Care and Living Will of {{$tellUsAboutYou['fullname']}}<br>
                Page 1 of 7
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Power of Attorney for Health Care and Living Will of «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 1 of 7
            </div>
        @endif -->
    </div>
    <!-- Page 1-->


    <!-- Page 2-->
    <div class="docPage" style="margin: 0; box-sizing: border-box; padding: 40px;">
        <div class="docPageInner" style="box-sizing: border-box; height: 800px;">
            <p  style="margin-bottom: 0in; "><span face="Times, serif">I
      give the following instructions to help guide my agent (or any
      successor agent): </span><span face="Times, serif"><i>(You may write
      additional instructions or limitations below.)</i></span></p>
            
            <p  style="margin-bottom: 0in; line-height: 120%"><span face="Times, serif">____________________________________________________________________________</span></p>
            <p  style="margin-bottom: 0in; line-height: 120%"><span face="Times, serif">____________________________________________________________________________</span></p>
            <p  style="margin-bottom: 0in; line-height: 120%"><span face="Times, serif">____________________________________________________________________________</span></p>
            <p  style="margin-bottom: 0in; line-height: 120%"><span face="Times, serif">____________________________________________________________________________</span></p>
            <p  style="margin-bottom: 0in; line-height: 120%"><span face="Times, serif">____________________________________________________________________________</span></p>
            <p style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><i>(Attach
      additional pages if needed).</i></span></span></span></p>
            <p style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">Subject
      to any limitations in this document, my attorney in fact has the
      power and authority to do all of the following:</span></span></span></p>
            
            <p  style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(a)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">Request,
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
      authority given my attorney in fact shall be immediate, has no
      expiration date and shall expire only in the event that I revoke the
      authority in writing and deliver it to my health care provider.</span></span></span></p>
            <p  style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(b)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">Execute
      on my behalf any releases or other documents that may be required in
      order to obtain this information;</span></span></span></p>
            <p  style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(c)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">Consent
      to the further disclosure of this information if necessary;</span></span></span></p>
            <p  style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(d)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">Execute
      documents titled or purporting to be a “Refusal to Permit
      Treatment” and “Leaving Hospital Against Medical Advice.”</span></span></span></p>
            <p  style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(e)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">Execute
      any necessary waiver or release from liability required by a hospital
      or physician.</span></span></span></p>
        </div>
        <!-- @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Power of Attorney for Health Care and Living Will of {{$tellUsAboutYou['fullname']}}<br>
                Page 2 of 7
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Power of Attorney for Health Care and Living Will of «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 2 of 7
            </div>
        @endif -->
    </div>
    <!-- Page 2-->


    <!-- Page 3-->
    <div class="docPage" style="margin:0; box-sizing: border-box; padding: 0px;">
        <div class="docPageInner" style="box-sizing: border-box; height: 875px;">
            <p  style="margin-bottom: 0in;  text-align: center;">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>NOTICE
      TO PERSON MAKING A DURABLE POWER OF ATTORNEY</b></span></span></span></p>
            <p  style="margin-bottom: 0in;  text-align: center;"><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>FOR
      HEALTH CARE</b></span></span></span></p>
            
            <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">This
      is an important legal document. Prepare this durable power of
      attorney for health care carefully. If you use this form, read it
      completely. You may want to seek professional help to make sure the
      form does what you intend and is completed without mistakes.</span></span></span></p>
            
            <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">You
      have the right to revoke this document in whole or in part at any
      time you have not been determined to be incapable. A revocation is
      effective when it is communicated to your attending physician or
      other health care provider.</span></span></span></p>
            <p  style="margin-bottom: 0in; "><br/>

            </p>
            
            <p  style="margin-bottom: 0in;  text-align: center;"><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>SIGNATURE
      AND ACKNOWLEDGEMENT</b></span></span></span></p>
            
        
            <p  style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
                <span style="font-family:'Times New Roman, serif'">I, </span><span style="font-family:'Times New Roman, serif'">
                    @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                        <b>{{$tellUsAboutYou['fullname']}}</b>
                    @else
                        <b>(fullname)________________________________</b>
                    @endif,
                </span><span style="font-family:'Times New Roman, serif'">the
                  principal, sign my name to this instrument on this </span><span style="font-family:'Times New Roman, serif'">____________</span><span style="font-family:'Times New Roman, serif'">
                  day of </span><span style="font-family:'Times New Roman, serif'">__________________</span><span style="font-family:'Times New Roman, serif'">,
                  </span><span style="font-family:'Times New Roman, serif'">_____________</span><span style="font-family:'Times New Roman, serif'">,
                  and do hereby declare that I sign it willingly (or willingly direct
                  another to sign for me), that I execute it as my free and voluntary
                  act for the purposes therein expressed, and that I am eighteen years
                  of age or older, of sound mind, and under no constraint or undue
                  influence.</span></p>
            
           
            <p  style="margin-left: 0.5in; margin-bottom: 0in; ">
                <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">_______________________________________</span></span></span></p>
            <p  style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
          <span style="font-family:'Times New Roman, serif'"><b>
              @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                  <span>{{$tellUsAboutYou['fullname']}}</span>
              @else
                  <span>(fullname)________________________________</span>
              @endif
          </b>
          </span></p>
            <p style="margin-bottom: 0in; "><br/>

            </p>
            
            <p  style="margin-bottom: 0in;  text-align: center;"><span style="font-family:'Times New Roman, serif'"><b>NOTARY
      ACKNOWLEDGEMENT (OPTIONAL)</b></span></p>
            <p  style="margin-bottom: 0in; "><br/>

            </p>
            <p  style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span ><span size="3" style="font-size: 12pt">STATE
      OF SOUTH DAKOTA</span></span><span ><span size="3" style="font-size: 12pt">	</span></span><span ><span size="3" style="font-size: 12pt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</span></span></span></span></span></p>
            <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">					</span><span size="3" style="font-size: 12pt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
      ss.</span><span size="3" style="font-size: 12pt">&nbsp;</span></span></span></p>
            <p  style="margin-bottom: 0in; "><span color="#008f00"><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span ><span size="3" style="font-size: 12pt">COUNTY
      OF ________________</span></span><span ><span size="3" style="font-size: 12pt">	</span></span><span ><span size="3" style="font-size: 12pt">)</span></span></span></span></span></p>
            <p  style="margin-bottom: 0in; "><br/>

            </p>
            <p  style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">Subscribed, sworn to and
      acknowledged before me by </span><span style="font-family:'Times New Roman, serif'">
            @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                <span>{{$tellUsAboutYou['fullname']}}</span>
            @else
                <span>(fullname)________________________________</span>
            @endif
            </span><span style="font-family:'Times New Roman, serif'">,
      the principal, this </span><span style="font-family:'Times New Roman, serif'">_______</span><span style="font-family:'Times New Roman, serif'">
      day of </span><span style="font-family:'Times New Roman, serif'">___________________</span><span style="font-family:'Times New Roman, serif'">,
      </span><span style="font-family:'Times New Roman, serif'">________________________</span><span style="font-family:'Times New Roman, serif'">.</span></p>
            
            
            <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">______________________________________</span></span></span></p>
            <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">NOTARY
      PUBLIC</span></span></span></p>
      <p  style="margin-bottom: 0in; "><br/>

            </p>
            <p style="margin-top: 0.06in; margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">My
      commission expires: _________________</span></span></span></p>
        </div>
       <!--  @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Power of Attorney for Health Care and Living Will of {{$tellUsAboutYou['fullname']}}<br>
                Page 3 of 7
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Power of Attorney for Health Care and Living Will of «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 3 of 7
            </div>
        @endif -->
    </div>
    <!-- Page 3-->


    <!-- Page 4-->
    <div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding: 40px;">
        <div class="docPageInner" style="box-sizing: border-box; height: 700px;">
            <p  style="margin-bottom: 0.13in;  text-align: center;"><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt"><span size="3" style="font-size: 12pt"><b>STATEMENT
      OF WITNESSES (REQUIRED)</b></span></span></span></p>
            <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">I
      declare that the person who signed or acknowledged this Durable Power
      of Attorney for Health Care is personally known to me, that </span><span ><span size="3" style="font-size: 12pt">{{--<span *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null">{{userDetails.tellUsAboutYou.gender !== null && userDetails.tellUsAboutYou.gender !== undefined ? (userDetails.tellUsAboutYou.gender === 'M' ? 'he' : 'she' ): 'he' }}</span>--}}
        <span>{{isset($tellUsAboutYou) && array_key_exists('gender',$tellUsAboutYou) && !is_null($tellUsAboutYou['gender']) && $tellUsAboutYou['gender'] == 'M' ? 'he' : (isset($tellUsAboutYou) && array_key_exists('gender',$tellUsAboutYou) && !is_null($tellUsAboutYou['gender']) && $tellUsAboutYou['gender'] == 'F' ? 'she' : 'he/she')}}</span>
      </span></span><span size="3" style="font-size: 12pt">
      signed or acknowledged this durable power of attorney in my presence,
      and that </span><span ><span size="3" style="font-size: 12pt">{{--<span *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null">{{userDetails.tellUsAboutYou.gender !== null && userDetails.tellUsAboutYou.gender !== undefined ? (userDetails.tellUsAboutYou.gender === 'M' ? 'he' : 'she' ): 'he' }}</span>--}}
        <span>{{isset($tellUsAboutYou) && array_key_exists('gender',$tellUsAboutYou) && !is_null($tellUsAboutYou['gender']) && $tellUsAboutYou['gender'] == 'M' ? 'he' : (isset($tellUsAboutYou) && array_key_exists('gender',$tellUsAboutYou) && !is_null($tellUsAboutYou['gender']) && $tellUsAboutYou['gender'] == 'F' ? 'she' : 'he/she')}}</span>
      </span></span><span size="3" style="font-size: 12pt">
      appears to be of sound mind and under no duress, fraud, or undue
      influence.</span></span></span></p>
            <p  style="margin-bottom: 0in; "><br/>

            </p>
            <p  style="margin-bottom: 0in; "><br/>

            </p>
            <p  style="margin-bottom: 0in; "><br/>

            </p>
            <p class="western" style="margin-bottom: 0in; "><span ><b>WITNESS
      1</b></span><span >: </span><span >____________________</span><span style="padding-left: 50px;">	Dated:
      </span><span >______________________</span></p>
            <p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0.06in; ">
                <span style="padding-left: 50px;">[signature]</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in;  padding-top: 15px;">
                <span >____________________________</span><span >		</span><span style="padding-left: 122px;">______________________</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in; ">
                <span style="padding-left: 60px;">	[name printed]</span><span style="padding-left: 240px;">[street address]</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in;  padding:25px 0 0 350px;">
                <span >							</span><span >______________________</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in;  padding-left: 350px;">
                <span style="padding-left: 40px;">								[city, state, zip]</span></p>
            <p class="western" style="margin-bottom: 0in; "><br/>

            </p>
           
            <p class="western" style="margin-bottom: 0in; "><span ><b>WITNESS
      2</b></span><span >: </span><span >____________________</span><span style="padding-left: 50px;">	Dated:
      </span><span >______________________</span></p>
            <p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0.06in; ">
                <span style="padding-left: 50px;">[signature]</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in;  padding-top: 15px;">
                <span >____________________________</span><span >		</span><span style="padding-left: 122px;">______________________</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in; ">
                <span style="padding-left: 60px;">	[name printed]</span><span style="padding-left: 240px;">[street address]</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in;  padding:25px 0 0 350px;">
                <span >							</span><span >______________________</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in;  padding-left: 350px;">
                <span style="padding-left: 40px;">								[city, state, zip]</span></p>
        </div>
        <!-- @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Power of Attorney for Health Care and Living Will of {{$tellUsAboutYou['fullname']}}<br>
                Page 4 of 7
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Power of Attorney for Health Care and Living Will of «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 4 of 7
            </div>
        @endif -->
    </div>
    <!-- Page 4-->


    <!-- Page 5-->
    <div class="docPage" style="margin: 0; box-sizing: border-box; padding: 0;">
        <div class="docPageInner" style="box-sizing: border-box; height: 875px;">
            <p  style="margin-bottom: 0in;  text-align: center;">
      <span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 13pt"><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>S</b></span></span></span><span size="4" style="font-size: 16pt"><b>OUTH
      </b></span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>D</b></span></span></span><span size="4" style="font-size: 16pt"><b>AKOTA</b></span></span></span></p>
            <p  style="margin-bottom: 0in;  text-align: center;"><span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 13pt"><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>L</b></span></span></span><span size="4" style="font-size: 16pt"><b>IVING
      </b></span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>W</b></span></span></span><span size="4" style="font-size: 16pt"><b>ILL
      </b></span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 18pt"><span size="4" style="font-size: 16pt"><b>D</b></span></span></span><span size="4" style="font-size: 16pt"><b>ECLARATION</b></span></span></span></p>
            <p  style="margin-top: 0.19in; margin-bottom: 0.06in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">This
      is an important legal document. A living will directs the medical
      treatment you are to receive in the event you are in a terminal
      condition and are unable to participate in your own medical
      decisions. This living will may state what kind of treatment you want
      or do not want to receive.</span></span></span></p>
            <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">Prepare
      this living will carefully. If you use this form, read it completely.
      You may want to seek professional help to make sure the form does
      what you intend and is completed without mistakes.</span></span></span></p>
            <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">This
      living will remains valid and in effect until and unless you revoke
      it. Review this living will periodically to make sure it continues to
      reflect your wishes. You may amend or revoke this living will at any
      time by notifying your physician and other health care providers. You
      should give copies of this living will to your family, your
      physician, and your health care facility. This form is entirely
      optional. If you choose to use this form, please note that the form
      provides signature lines for you, the two witnesses whom you have
      selected, and a notary public.</span></span></span></p>
            <p  style="margin-bottom: 0in; "><br/>

            </p>
            <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 10pt"><span size="3" style="font-size: 12pt"><b>TO
      MY FAMILY, PHYSICIANS, AND ALL THOSE CONCERNED WITH MY CARE:</b></span></span></span></p>
            
            <p  style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
                <span style="font-family:'Times New Roman, serif'">I, </span><span style="font-family:'Times New Roman, serif'"><b>
            @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                <span>{{$tellUsAboutYou['fullname']}}</span>
            @else
                <span>(fullname)________________________________</span>
            @endif
    </b></span><span style="font-family:'Times New Roman, serif'">,</span><span style="font-family:'Times New Roman, serif'">
      direct you to follow my wishes for care if I am in a terminal
      condition, my death is imminent, and I am unable to communicate my
      decisions about my medical care.</span></p>
            
            <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>LIFE-SUSTAINING
    TREATMENT.</b></span><span size="3" style="font-size: 12pt"> With
    respect to any life-sustaining treatment, I direct the following:</span></span></span></p>
            
            <p align="left" style="margin-bottom: 0.09in; "><span style="font-family:'Times New Roman, serif'"><span size="1" style="font-size: 7pt"><span size="3" style="font-size: 12pt"><i>(</i></span><span size="3" style="font-size: 12pt"><i><u>Initial
    only one</u></i></span><span size="3" style="font-size: 12pt"><i> of
    the following options. If you do not agree with either of the
    following options, space is provided below for you to write your own
    instructions.)</i></span></span></span></p>
            
            <p  style="margin-left: 1in; text-indent: -1in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">__________</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">If
      my death is imminent or I am permanently unconscious, I choose not to
      prolong my life. If life sustaining treatment has been started, stop
      it, but keep me comfortable and control my pain.</span></span></span></p>
            <p  style="margin-left: 1in; text-indent: -1in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">__________</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">Even
      if my death is imminent or I am permanently unconscious, I choose to
      prolong my life.</span></span></span></p>
            <p  style="margin-left: 1in; text-indent: -1in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">__________</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">I
      choose neither of the above options, and here are my instructions
      should I become terminally ill and my death is imminent:</span></span></span></p>
            <p  style="margin-left: 0.38in; margin-bottom: 0.09in; ">
                <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
            <p  style="margin-left: 0.38in; margin-bottom: 0.09in; ">
                <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
            <p  style="margin-left: 0.38in; margin-bottom: 0.09in; ">
                <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
            <p  style="margin-bottom: 0.13in;  text-align: center;">
      <span style="font-family:'Times New Roman, serif'"><span size="1" style="font-size: 7pt"><span size="3" style="font-size: 12pt"><i>(Add
      additional sheets if necessary.)</i></span><span size="3" style="font-size: 12pt">
      </span></span></span>
            </p>
        </div>
        <!-- @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Power of Attorney for Health Care and Living Will of {{$tellUsAboutYou['fullname']}}<br>
                Page 5 of 7
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Power of Attorney for Health Care and Living Will of «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 5 of 7
            </div>
        @endif -->
    </div>
    <!-- Page 5-->


    <!-- Page 6-->
    <div class="docPage" style="margin: 0; box-sizing: border-box; padding: 0;">
        <div class="docPageInner" style="box-sizing: border-box; height: 875px;">
            <p align="left" style="margin-bottom: 0.09in; "><span style="font-family:'Times New Roman, serif'"><span size="1" style="font-size: 7pt"><span size="3" style="font-size: 12pt">With
      respect to artificial nutrition and hydration, I direct the
      following:</span><span size="3" style="font-size: 12pt"><i>
      (Artificial nutrition and hydration</i></span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">:</span></span></span><span size="3" style="font-size: 12pt"><i>
      food and water provided by means of a tube inserted into the stomach
      or intestine or needle into a vein.)</i></span></span></span></p>
            <p  style="margin-bottom: 0.03in; "> </p>
            <p  style="margin-bottom: 0.09in; "><span style="font-family:'Times New Roman, serif'"><span size="1" style="font-size: 7pt"><span size="3" style="font-size: 12pt"><i><b>(Initial
      only </b></i></span><span size="3" style="font-size: 12pt"><i><u><b>one</b></u></i></span><span size="3" style="font-size: 12pt"><b>)</b></span></span></span></p>
            <p  style="margin-left: 1in; text-indent: -1in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">__________</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">If
      my death is imminent or I am permanently unconscious, I do not want
      artificial nutrition and hydration. If it has been started, stop it.</span></span></span></p>
            
            <p  style="margin-left: 1in; text-indent: -1in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">__________</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">Even
      if my death is imminent or I am permanently unconscious, I want
      artificial nutrition and hydration.</span></span></span></p>
            
            <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>ORGAN
      DONATION.</b></span><span size="3" style="font-size: 12pt">  With
      respect to organ donation, I direct the following:</span></span></span></p>
            
            <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">You
      do not have to initial any of the statements. If you do not initial
      any of the statements, your attorney for health care, proxy, or other
      agent, or your family, may have the authority to make a gift of all
      or part of your body under South Dakota law.</span></span></span></p>
            
            <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><i><b>(Initial
      the line next to the statement below that best reflects your wishes.)</b></i></span></span></span></p>
            
            <p  style="margin-left: 1in; text-indent: -0.96in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">__________	I
      do not want to make an organ or tissue donation and I do not want my
      attorney for health care, proxy, or other agent or family to do so. </span></span></span>
            </p>
            
            <p  style="margin-left: 1in; text-indent: -1in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">__________	I
      have already signed a written agreement or donor card regarding organ
      and tissue donation with the following individual or institution: </span></span></span>
            </p>
            
            <p  style="margin-left: 1in; text-indent: 0.5in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">Name
      of individual/institution: </span><span size="3" style="font-size: 12pt"><u>						</u></span><span size="3" style="font-size: 12pt">
      </span></span></span>
            </p>
            
            <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">__________	Pursuant
      to South Dakota law, I hereby give, effective on my death: </span></span></span>
            </p>
           
            <p  style="margin-left: 1in; text-indent: 0.5in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">_____
      Any needed organ or parts. </span></span></span>
            </p>
            <p  style="margin-left: 1in; text-indent: 0.5in; margin-bottom: 0in; ">
                <br/>

            </p>
            <p  style="margin-left: 1in; text-indent: 0.5in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">_____
      The following part or organs listed below: </span></span></span>
            </p>
            <p  style="margin-left: 2in; margin-bottom: 0in; line-height: 150%">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">______________________________________________________
      ______________________________________________________</span></span></span></p>
            <p  style="margin-left: 0.5in; text-indent: 0.5in; margin-bottom: 0in; ">
                <br/>

            </p>
            <p  style="margin-left: 1in; text-indent: 0.5in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">For
      the following purpose:  </span><span size="3" style="font-size: 12pt"><b>(</b></span><span size="3" style="font-size: 12pt"><i><b>initial
      </b></i></span><span size="3" style="font-size: 12pt"><i><u><b>one</b></u></i></span><span size="3" style="font-size: 12pt"><b>)</b></span><span size="3" style="font-size: 12pt">:
      </span></span></span>
            </p>
            <p  style="margin-left: 0.5in; text-indent: 0.5in; margin-bottom: 0in; ">
                <br/>

            </p>
            <p  style="margin-left: 1.5in; text-indent: 0.5in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">_____
      Any legally authorized purpose. </span></span></span>
            </p>
            <p  style="margin-left: 1.5in; text-indent: 0.5in; margin-bottom: 0in; ">
                <br/>

            </p>
            <p  style="margin-left: 1.5in; text-indent: 0.5in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">_____
      Transplant or therapeutic purposes only. </span></span></span>
            </p>
        </div>
        <!-- @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Power of Attorney for Health Care and Living Will of {{$tellUsAboutYou['fullname']}}<br>
                Page 6 of 7
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Power of Attorney for Health Care and Living Will of «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 6 of 7
            </div>
        @endif -->
    </div>
    <!-- Page 6--><!-- Page 1-->


    <!-- Page 7-->
    <div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding:0;">
        <div class="docPageInner" style="box-sizing: border-box; height: 875px;">
            <p  style="margin-bottom: 0in;  text-align: center;">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>SIGNATURE
      AND ACKNOWLEDGEMENT</b></span></span></span></p>
            <p  style="margin-bottom: 0in; "><br/>

            </p>
        
            <p  style="margin-bottom: 0.06in; "><span color="#008f00"><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span ><span size="3" style="font-size: 12pt">Date
      Signed:</span></span><span ><span size="3" style="font-size: 12pt">&nbsp;
      </span></span><span ><span size="3" style="font-size: 12pt">____________________</span></span><span ><span size="3" style="font-size: 12pt">	</span></span></span></span></span></p>
            
            <p  style="margin-bottom: 0.06in; "><span color="#008f00"><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span ><span size="3" style="font-size: 12pt">______________________________________________</span></span></span></span></span></p>
            <p  style="margin-bottom: 0.08in;  orphans: 0; widows: 0; margin-top: 0;">
      <span style="font-family:'Times New Roman, serif'"><b>
      @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
          <span>{{$tellUsAboutYou['fullname']}}</span>
      @else
          <span>(fullname)________________________________</span>
      @endif
      </b></span></p>
            <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"></span><span color="#0432ff"><span style="font-family:'Times New Roman, serif'">
            @if(isset($tellUsAboutYou) && array_key_exists('address',$tellUsAboutYou) && !is_null($tellUsAboutYou['address']))
                <span style="font-family:'Times New Roman, serif'" >{{$tellUsAboutYou['address']}}</span>
            @else
                <span>_________________________________________________________________
                      ___________________________________________________________________________________________
                      _________________________________________________________________________________
                </span>
            @endif
        </span></span><span style="font-family:'Times New Roman, serif'"></span></p>
            <p  style="margin-bottom: 0in; margin-top: 0;"><span style="font-family:'Times New Roman, serif'"></span><span color="#0432ff"><span style="font-family:'Times New Roman, serif'">
            @if(isset($tellUsAboutYou) && array_key_exists('city',$tellUsAboutYou) && !is_null($tellUsAboutYou['city']))
                <span style="text-transform: capitalize">{{$tellUsAboutYou['city']}}</span>
            @else
                <span style="text-transform: capitalize">(city)_____________</span>
                <span >, </span>
            @endif
        </span></span><span style="font-family:'Times New Roman, serif'">,
        </span><span color="#0432ff"><span style="font-family:'Times New Roman, serif'">
                @if(isset($tellUsAboutYou) && array_key_exists('state',$tellUsAboutYou) && !is_null($tellUsAboutYou['state']))
                    <span style="text-transform: capitalize">{{$tellUsAboutYou['state']}}</span>
                @else
                    <span style="text-transform: capitalize">(state)_____________</span>
                    <span >, </span>
                @endif
        </span></span><span style="font-family:'Times New Roman, serif'">
            </span><span color="#0432ff"><span style="font-family:'Times New Roman, serif'">
                  @if(isset($tellUsAboutYou) && array_key_exists('zip',$tellUsAboutYou) && !is_null($tellUsAboutYou['zip']))
                    <span style="text-transform: capitalize">{{$tellUsAboutYou['zip']}}</span>
                  @else
                    <span style="text-transform: capitalize">(zip)_____________</span>
                  @endif
            </span></span><span style="font-family:'Times New Roman, serif'"></span></p>
                <p  style="margin-bottom: 0in;  margin-top: 0;"><span style="font-family:'Times New Roman, serif'"></span><span color="#0432ff"><span style="font-family:'Times New Roman, serif'">
                @if(isset($tellUsAboutYou) && array_key_exists('phone',$tellUsAboutYou) && !is_null($tellUsAboutYou['phone']))
                    <span style="text-transform: capitalize">{{$tellUsAboutYou['phone']}}</span>
                @else
                    <span style="text-transform: capitalize">(phone)_____________</span>
                @endif

           
            <p  style="margin-bottom: 0in;  text-align: center; line-height: 18px;"><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="2" style="font-size: 12pt"><b>WITNESS
      STATEMENTS</b></span></span></span></p>
            
            <p  style="margin-bottom: 0in; line-height: 18px;"><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">The
      declarant voluntarily signed this document in my presence.</span></span></span></p>
            
            <p class="western" style="margin-bottom: 0in; line-height: 10px;"><span ><b>WITNESS
      1</b></span><span >: </span><span >____________________</span><span style="padding-left: 50px;">	Dated:
      </span><span >______________________</span></p>
            <p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0in;  margin-top: 0;line-height: 18px;">
                <span style="padding-left: 50px;">[signature]</span></p>
            <p class="western" align="justify" style="margin-bottom: 0in;  padding-top: 15px;line-height: 10px;">
                <span >____________________________</span><span >		</span><span style="padding-left: 122px;">______________________</span></p>
            <p class="western" align="justify" style="margin-bottom: 0in;  margin-top: 0;line-height: 18px;">
                <span style="padding-left: 60px;">	[name printed]</span><span style="padding-left: 240px;">[street address]</span></p>
            <p class="western" align="justify" style="margin-bottom: 0in;  padding:15px 0 0 350px;line-height: 10px;">
                <span >							</span><span >______________________</span></p>
            <p class="western" align="justify" style="margin-bottom: 0in;  padding-left: 350px; margin-top: 0;line-height: 18px;">
                <span style="padding-left: 40px;">								[city, state, zip]</span></p>
            <p class="western" style="margin-bottom: 0in; "><br/>

            </p>
            
            <p class="western" style="margin-bottom: 0in; line-height: 10px;"><span ><b>WITNESS
      2</b></span><span >: </span><span >____________________</span><span style="padding-left: 50px;">	Dated:
      </span><span >______________________</span></p>
            <p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0in;  margin-top: 0;">
                <span style="padding-left: 50px;">[signature]</span></p>
            <p class="western" align="justify" style="margin-bottom: 0in;  padding-top: 15px;line-height: 10px;">
                <span >____________________________</span><span >		</span><span style="padding-left: 122px;">______________________</span></p>
            <p class="western" align="justify" style="margin-bottom: 0in;  margin-top: 0;">
                <span style="padding-left: 60px;">	[name printed]</span><span style="padding-left: 240px;">[street address]</span></p>
            <p class="western" align="justify" style="margin-bottom: 0in;  padding:15px 0 0 350px;line-height: 10px;">
                <span >							</span><span >______________________</span></p>
            <p class="western" align="justify" style="margin-bottom: 0in;  padding-left: 350px; margin-top: 0;">
                <span style="padding-left: 40px;">								[city, state, zip]</span></p>
            <p  style="margin-bottom: 0in; "><a name="_GoBack"></a>
                <br/>

            </p>
            <p  style="margin-bottom: 0in;  text-align: center;"><span style="font-family:'Times New Roman, serif'"><b>NOTARY
      ACKNOWLEDGEMENT (OPTIONAL)</b></span></p>
            
            <p  style="margin-bottom: 0in; line-height: 14px;"><span ><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span ><span size="2" style="font-size: 10pt">STATE
      OF SOUTH DAKOTA</span></span><span ><span size="2" style="font-size: 10pt">	</span></span><span ><span size="2" style="font-size: 10pt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</span></span></span></span></span></p>
            <p  style="margin-bottom: 0in; line-height: 14px; margin-top: 0;"><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="2" style="font-size: 10pt">					</span><span size="2" style="font-size: 10pt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
      ss.</span><span size="2" style="font-size: 10pt">&nbsp;</span></span></span></p>
            <p  style="margin-bottom: 0in; line-height: 14px;margin-top: 0;"><span color="#008f00"><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span ><span size="2" style="font-size: 10pt">COUNTY
      OF ________________</span></span><span ><span size="2" style="font-size: 10pt">	</span></span><span ><span size="2" style="font-size: 10pt">)</span></span></span></span></span></p>
            
            <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="2" style="font-size: 10pt">Subscribed,
      sworn to and acknowledged before me by «</span><span ><span size="2" style="font-size: 10pt">CLIENT'S
      NAME</span></span><span size="2" style="font-size: 10pt">», the
      principal, this </span><span size="2" style="font-size: 10pt">_____</span><span size="2" style="font-size: 10pt">
      day of </span><span size="2" style="font-size: 10pt">________________</span><span size="2" style="font-size: 10pt">,
      </span><span size="2" style="font-size: 10pt">________________________</span><span size="2" style="font-size: 10pt">.</span></span></span></p>
            
            <p  style="margin-left: 3in; margin-bottom: 0in; ">
                <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="2" style="font-size: 10pt">	</span><span size="2" style="font-size: 10pt">______________________________________</span></span></span></p>
            <p  style="margin-left: 3in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="2" style="font-size: 10pt">	</span><span size="2" style="font-size: 10pt">NOTARY
      PUBLIC</span></span></span></p>
            <p style="margin-left: 3in; margin-top: 0.06in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 9pt"><span size="2" style="font-size: 10pt">My
      commission expires: _________________</span></span></span></p>
        </div>
        <!-- @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Power of Attorney for Health Care and Living Will of {{$tellUsAboutYou['fullname']}}<br>
                Page 7 of 7
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Power of Attorney for Health Care and Living Will of «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 7 of 7
            </div>
        @endif -->
    </div>
    <!-- Page 7-->


</div>

</body>
</html>
