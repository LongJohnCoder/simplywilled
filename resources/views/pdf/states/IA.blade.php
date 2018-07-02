<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Untitled Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            margin: 0;
            padding: 0;
            font-family: Garamond;
        }
        /* width */
        ::-webkit-scrollbar {
            width: 14px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #0f69bb;

        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #99cc33;
            border-radius: 5px;
        }

        /* Handle on hover */
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




    </style>
</head>

<body>

<div class="docContainer" id="doc">
    <div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding: 40px;">
        <div id="doc" class="docPageInner"
             style="box-sizing: border-box; height: 890px;">
            <p  style="text-align:center;margin-bottom: 0in; line-height: 0.28in; page-break-before: auto; page-break-after: auto">
      <span  style="font-size: 17pt"><b>IOWA DURABLE POWER OF
        ATTORNEY </b></span>
            </p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 115%"><span  style="font-size: 17pt"><b>FOR
      HEALTH CARE DECISIONS<span  style="font-size: 13pt"> </span></b></span>
            </p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 0.23in"><span  style="font-size: 13pt"><b>(Medical
      Power of Attorney)</b></span></p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 0.23in"><span  style="font-size: 13pt"><b>AND</b></span></p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 0.28in"><span  style="font-size: 17pt"><b>DECLARATION
      RELATING TO </b></span>
            </p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 115%"><span  style="font-size: 17pt"><b>LIFE-SUSTAINING
      PROCEDURES<span  style="font-size: 13pt"> </span></b></span>
            </p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 0.23in"><span  style="font-size: 13pt"><b>(Living
      Will) </b></span>
            </p>
            <p  style="text-align:center;margin-bottom: 0.13in; line-height: 115%">


            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">I,
      @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
          <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
      @else
          <b>________________________________</b>
      @endif,
      of
          @if(isset($tellUsAboutYou) && array_key_exists('address',$tellUsAboutYou) && !is_null($tellUsAboutYou['address']))
              <span style="font-family:'Times New Roman, serif'" >{{$tellUsAboutYou['address']}}</span>
          @else
              <span>
                    _________________________________________________________________
                    ___________________________________________________________________________________________
                    _________________________________________________________________________________
              </span>
          @endif

          @if(isset($tellUsAboutYou) && array_key_exists('city',$tellUsAboutYou) && !is_null($tellUsAboutYou['city']))
              <span style="text-transform: capitalize">{{$tellUsAboutYou['city']}}</span>
          @else
              <span style="text-transform: capitalize">(city)_____________</span>
              <span >, </span>
          @endif


          @if(isset($tellUsAboutYou) && array_key_exists('state',$tellUsAboutYou) && !is_null($tellUsAboutYou['state']))
              <span style="text-transform: capitalize">{{$tellUsAboutYou['state']}}</span>
          @else
              <span style="text-transform: capitalize">(state)_____________</span>
          @endif
          , hereby appoint my
          @if(isset($healthFinance) && array_key_exists('relation',$healthFinance) && !is_null($healthFinance['relation'])  && $healthFinance['relation'] == 'Other')
              <span style="font-family:'Times New Roman, serif'">{{$healthFinance['relationOther']}}</span>
          @elseif (isset($healthFinance) && array_key_exists('relation',$healthFinance) && !is_null($healthFinance['relation']) && $healthFinance['relation'] != 'Other')
              <span style="font-family:'Times New Roman, serif'">{{$healthFinance['relation']}}</span>
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

          <span >),</span> as my attorney in fact (my “agent”)
        to make health care decisions for me. This power exists only when I
        am unable, in the judgment of my attending physician, to make those
        health care decisions. The attorney in fact must act consistently
        with my desires as stated in this document or otherwise made known.</span></span></span></span></span></p>
            <p style="margin-bottom: 0.13in; line-height: 115%">


            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">If
      said agent is unable, unwilling or unavailable to act, or if I revoke
      this appointment or authority to act, then I designate my
      @if(isset($healthFinance) && array_key_exists('backupRelation',$healthFinance) && !is_null($healthFinance['backupRelation']) && $healthFinance['backupRelation'] == 'Other')
          <span>{{$healthFinance['backupRelation']}}</span>
      @elseif(isset($healthFinance) && array_key_exists('backupRelation',$healthFinance) && !is_null($healthFinance['backupRelation']) && $healthFinance['backupRelation'] != 'Other')
          <span>{{$healthFinance['backupRelation']}}</span>
      @else
          <span>(relation)______________</span>
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

      <span  style="font-size: 12pt">),</span>
      as my alternate attorney in fact to
      make health care decisions for me as authorized in this document.</span></span></span></span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">Except
      as otherwise specified in this document, this document gives my agent
      the power, where otherwise consistent with the law of this state, to
      consent to my physician not giving health care or stopping health
      care which is necessary to keep me alive.</span></span></span></span></span></p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">This
      document gives my agent the power to make health care decisions on my
      behalf, including to consent, to refuse to consent, or to withdraw
      consent to the provision of any care, treatment, service, or
      procedure to maintain, diagnose, or treat a physical or mental
      condition. This power is subject to any statement of my desires and
      any limitations included in this document.</span></span></span></span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">My
      agent has the right to examine my medical records and to consent to
      the disclosure of such records, for all purposes under federal or
      state law related to privacy of medical records, including the Health
      Insurance Portability and Accountability Act of 1996. </span></span></span></span></span>
            </p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000"><b>AUTHORIZATION
      TO RELEASE INFORMATION:</b> I authorize any physician, health care
      professional, dentist, health plan, hospital, clinic, laboratory,
      pharmacy, or other covered health care provider, any insurance
      company and the Medical Information Bureau, Inc., or other health
      care clearinghouse that has provided treatment or services to me or
      that has paid for or is seeking payment from me for such services, to
      give, disclose, and release to the person or persons designated in
      this document to act as my agent such of my individually identifiable
      health information and medical records regarding any past, present or
      future medical or mental health condition (including all specially
      protected health information relating to each of the following
      conditions specifically authorized by me to be disclosed by marking
      the box with an &quot;X&quot; or a check mark: </span></span></span></span></span>
            </p>
            <!-- <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif; margin-top: 20px;">
               Durable Power of Attorney for Health Care Decisions and Living Will of«CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»
               Page 1 of 12
             </div>-->
        </div>
        @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Power of Attorney for Health Care Decisions and Living Will of {{$tellUsAboutYou['fullname']}}<br>
                Page 1 of 7
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Power of Attorney for Health Care Decisions and Living Will of «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 1 of 7
            </div>
        @endif
    </div>
    <!-- !Page 1 -->

    <!-- Page 2 -->
    <div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding: 40px;">
        <div class="docPageInner"
             style="box-sizing: border-box; height: 890px;">

            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">___
      sexually transmitted diseases, acquired immunodeficiency syndrome
      (AIDS), and human immunodeficiency virus (HIV);</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">___
      behavioral and mental health; </span></span></span></span></span>
            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">___
      alcohol, drug and other substance abuse; and</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">___
      genetic-related information); </span></span></span></span></span>
            </p>
            <p  style="text-align:left;margin-left: 1in; text-indent: 0.5in; margin-bottom: 0in; line-height: 115%">


            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">_________________________________
      Date</span></span></span></span></span></p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">__________________________
      Signature of Principal </span></span></span></span></span>
            </p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">relating to my
                ability to make health care decisions. The purpose of this request is
                to assist in determining whether the person designated to act as my
                agent should act as my agent. This authorization expires when I die
                or when revoked by me by a written revocation signed by me and
                delivered to the entity from which information is being requested
                prior to the time information is being requested. I understand I can
                revoke this authorization by delivering a written statement of
                revocation to any entity I have authorized to give, disclose and
                release information. The revocation is effective only as to those
                entities to whom the written statement revocation is given and only
                after the time of delivery. I also understand that I have the right
                to inspect the disclosed information at any time. My treatment,
                payment, enrollment or eligibility for benefits with an entity that I
                have authorized to release information is not conditioned on my
                signing this authorization. I know that once the information I have
                authorized to be released is released it is subject to re-disclosure
                by the recipient and is no longer protected by the Health Insurance
                Portability and Accountability Act of 1996 and regulations
                promulgated pursuant thereto, as amended from time to time.</p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000"><b>ADDITIONAL
      INSTRUCTIONS:  </b>I direct that my agent comply with the following
      additional instructions and/or limitations (optional):</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">________________________________________________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">________________________________________________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">________________________________________________________________________</span></span></span></span></span></p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 115%"><span  style="font-size: 9pt">(add
      additional sheets if necessary)</span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%"><b>REVOCATION OF
                    PRIOR POWERS: </b>I hereby revoke any prior durable power of attorney
                for health care.</p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 115%">

            </p>
            <!--<div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif; margin-top: 20px;">
              Durable Power of Attorney for Health Care Decisions and Living Will of«CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»
              Page 1 of 12
            </div>-->
        </div>
        @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Power of Attorney for Health Care Decisions and Living Will of {{$tellUsAboutYou['fullname']}}<br>
                Page 2 of 7
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Power of Attorney for Health Care Decisions and Living Will of «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 2 of 7
            </div>
        @endif
    </div>
    <!-- !Page 2 -->

    <!-- Page 3 -->
    <div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding: 40px;">
        <div class="docPageInner"
             style="box-sizing: border-box; height: 890px;">

            <p style="margin-bottom: 0in; line-height: 115%"><b>EFFECT OF COPY:
                </b>Persons dealing with my agent may rely fully on a photocopy of
                this document as though the photocopy was an original.</p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 115%"><b>SIGNATURE
                    AND ACKNOWLEDGEMENT</b></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">IMPORTANT NOTE: THIS
                DOCUMENT MUST BE SIGNED BEFORE A NOTARY PUBLIC OR TWO WITNESSES. IF
                YOU HAVE QUESTIONS REGARDING THIS FORM OR NEED ASSISTANCE TO COMPLETE
                IT, YOU SHOULD CONSULT AN ATTORNEY.</p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in">
        <span style="font-family:Times New Roman, serif">
          <span  style="font-size: 12pt">
            <span style="background: #ffffff">
              <span color="#000000">I,
                  @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                      <span style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</span>
                  @else
                      <span>________________________________</span>
                  @endif,
                the principal, sign my name to this instrument on <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>,
                <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>, do hereby declare to the
                undersigned that I am eighteen years of age or older, of sound mind,
                and under no undue constraint or influence.
              </span>
            </span>
          </span>
        </span>
      </span>
            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">_______________________________________</p>
            <p style="margin-bottom: 0.08in; line-height: 115%">
      <span color="#0000ff">
        @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
              <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
          @else
              <b>________________________________</b>
          @endif
      </span>
            </p>
            <p style="margin-bottom: 0in; line-height: 115%">
                @if(isset($tellUsAboutYou) && array_key_exists('address',$tellUsAboutYou) && !is_null($tellUsAboutYou['address']))
                    <span style="font-family:'Times New Roman, serif'" >{{$tellUsAboutYou['address']}}</span>
                @else
                    <span>_________________________________________________________________
                    ___________________________________________________________________________________________
                    _________________________________________________________________________________</span>
                @endif
                <span>,</span>
            </p>
            <p style="margin-bottom: 0in; line-height: 115%">
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

                @if(isset($tellUsAboutYou) && array_key_exists('zip',$tellUsAboutYou) && !is_null($tellUsAboutYou['zip']))
                    <span style="text-transform: capitalize">{{$tellUsAboutYou['zip']}}</span>
                @else
                    <span style="text-transform: capitalize">(zip)_____________</span>
                @endif
            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">
                @if(isset($tellUsAboutYou) && array_key_exists('phone',$tellUsAboutYou) && !is_null($tellUsAboutYou['phone']))
                    <span style="text-transform: capitalize">{{$tellUsAboutYou['phone']}}</span>
                @else
                    <span style="text-transform: capitalize">(phone)_____________</span>
                @endif
            </p>
            <p style="margin-left: 2.44in; margin-bottom: 0.06in; line-height: 115%">



            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">STATE OF
                IOWA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="background: #ffffff"><span color="#000000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt">)
      ss.&nbsp;</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; line-height: 115%">COUNTY OF
                ________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">Signed
      and sworn to before me by
              @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                  <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
              @else
                  <b>________________________________</b>
              @endif, the principal, this _____ day of </span></span></span></span></span>
            </p>
            <p style="text-indent: 0.5in; margin-bottom: 0in; line-height: 115%"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><span style="text-decoration: none">,
      </span><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><span style="text-decoration: none">.</span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">______________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">NOTARY
      PUBLIC</span></span></span></span></span></p>
            <p  style="text-align:center;margin-bottom: 0.13in; line-height: 115%">


            </p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

            </p>
            <!--  <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif; margin-top: 20px;">
                Durable Power of Attorney for Health Care Decisions and Living Will of«CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»
                Page 1 of 12
              </div>-->
        </div>
        @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Power of Attorney for Health Care Decisions and Living Will of {{$tellUsAboutYou['fullname']}}<br>
                Page 3 of 7
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Power of Attorney for Health Care Decisions and Living Will of «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 3 of 7
            </div>
        @endif
    </div>
    <!-- !Page 3 -->


    <!-- Page 4 -->
    <div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding: 40px;">
        <div class="docPageInner"
             style="box-sizing: border-box; height: 890px;">

            <p  style="text-align:center;margin-bottom: 0.13in; line-height: 115%; page-break-before: always">
                <b>STATEMENT OF WITNESSES</b></p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">We, the undersigned,
                hereby state that we signed this document in the presence of each
                other and the Declarant/Principal and we witnessed the signing of the
                document by the Declarant/Principal or by another person acting on
                behalf of the Declarant/Principal at the direction of the Declarant/
                Principal; that neither of us is appointed as attorney in fact by
                this document; that neither of us are health care providers who are
                presently treating the Declarant/Principal, or employees of such a
                health care provider. We further state that we are both at least 18
                years of age, and that at least one of us is not related to the
                Declarant/Principal by blood, marriage or adoption.</p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:left;margin-left: 0.38in; margin-bottom: 0.09in; line-height: 115%">
                <b>WITNESS 1: _______________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dated:
                    ___________________</b></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[signature]</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">____________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[name
      printed]</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">____________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[street
      address]</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">____________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[city,
      state]</span></span></span></span></span></p>
            <p  style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 115%">



            </p>
            <p  style="text-align:left;margin-left: 0.38in; margin-bottom: 0.09in; line-height: 115%">
                <b>WITNESS 2: _______________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dated:
                    ___________________</b></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[signature]</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">____________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[name
      printed]</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">____________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[street
      address]</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">____________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[city,
      state]</span></span></span></span></span></p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">I
      further declare that I am not a relative of the principal by blood,
      marriage or adoption (within the third degree of consanguinity).</span></span></span></span></span></p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">____________________________________</span></span></span></span></span></p>
            <p  style="text-indent: 0.5in; margin-bottom: 0in; line-height: 115%">
                <i>(first or second witness’ signature)</i></p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 0.28in">

            </p>
        </div>
        @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Power of Attorney for Health Care Decisions and Living Will of {{$tellUsAboutYou['fullname']}}<br>
                Page 4 of 7
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Power of Attorney for Health Care Decisions and Living Will of «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 4 of 7
            </div>
        @endif
    </div>
    <!-- !Page 4 -->

    <!-- Page 5 -->
    <div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding: 40px;">
        <div class="docPageInner"
             style="box-sizing: border-box; height: 890px;">

            <p  style="text-align:center;margin-bottom: 0in; line-height: 0.28in; page-break-before: always">
                <span  style="font-size: 17pt"><b>IOWA DECLARATION</b></span></p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 0.28in"><span  style="font-size: 17pt"><b>(Living
      Will)</b></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">If I should have an
                incurable or irreversible condition that will result either in death
                within a relatively short period of time or a state of permanent
                unconsciousness from which, to a reasonable degree of medical
                certainty, there can be no recovery, it is my desire that my life not
                be prolonged by the administration of life-sustaining procedures. If
                I am unable to participate in my health care decisions, I direct my
                attending physician to withhold or withdraw life-sustaining
                procedures that merely prolong the dying process and are not
                necessary to my comfort or freedom from pain.  This declaration is
                subject to any specific instructions or statement of desires I have
                added in “Additional Provisions” below.</p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">Additional
      Provisions:</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">________________________________________________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">________________________________________________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">________________________________________________________________________</span></span></span></span></span></p>
            <p style="margin-left: 0.38in; margin-bottom: 0.06in; line-height: 115%">



            </p>
            <p style="margin-bottom: 0in; line-height: 115%">YES__ NO__ (Mark the
                ONE that applies).  In the event that medical professionals determine
                that I may be an organ donor, I agree to the use of life-sustaining
                procedures, including a ventilator, for the sole purpose and time
                period required to complete the organ donation. Nothing in this
                paragraph shall be construed to expand or detract from the laws
                related to anatomical gifts as outlined in the Iowa Code, Chapter
                142C. The purpose of this paragraph is to practically and medically
                make organ donation possible.</p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in"><span style="text-decoration: none">Signed
      this </span><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><span style="text-decoration: none">
      day of </span><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><span style="text-decoration: none">,
      </span><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><span style="text-decoration: none">.</span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="text-indent: 0.5in; margin-bottom: 0in; line-height: 115%"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></p>
            <p style="margin-bottom: 0.08in; line-height: 115%">
                @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                    <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
                @else
                    <b>________________________________</b>
                @endif
            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in"><span  style="font-size: 9pt">STATE
      OF IOWA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</span></p>
            <p style="text-indent: 0.5in; margin-bottom: 0in; line-height: 115%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span  style="font-size: 9pt">)
      ss.&nbsp;</span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in"><span  style="font-size: 9pt">COUNTY
      OF ________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0.08in; line-height: 115%"><span  style="font-size: 9pt">Signed
      and sworn to before me by
        @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <span style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</span>
        @else
            <span>________________________________</span>
        @endif, the principal, this _____ day of
      <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>,
      <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>.</span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="text-indent: 0.5in; margin-bottom: 0in; line-height: 115%"><span  style="font-size: 9pt">______________________________________</span></p>
            <p style="text-indent: 0.5in; margin-bottom: 0in; line-height: 115%"><span  style="font-size: 9pt">NOTARY
      PUBLIC</span></p>
        </div>
        @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Power of Attorney for Health Care Decisions and Living Will of {{$tellUsAboutYou['fullname']}}<br>
                Page 5 of 7
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Power of Attorney for Health Care Decisions and Living Will of «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 5 of 7
            </div>
        @endif
    </div>
    <!-- !Page 5 -->

    <!-- Page 6 -->
    <div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding: 40px;">
        <div class="docPageInner"
             style="box-sizing: border-box; height: 890px;">

            <p  style="text-align:center;margin-bottom: 0.13in; line-height: 115%"><b>STATEMENT
                    OF WITNESSES</b></p>
            <p style="margin-bottom: 0in; line-height: 115%">We, the undersigned,
                hereby state that we signed this document in the presence of each
                other and the Declarant/Principal and we witnessed the signing of the
                document by the Declarant/Principal or by another person acting on
                behalf of the Declarant/Principal at the direction of the Declarant/
                Principal; that neither of us is appointed as attorney in fact by
                this document; that neither of us are health care providers who are
                presently treating the Declarant/Principal, or employees of such a
                health care provider. We further state that we are both at least 18
                years of age, and that at least one of us is not related to the
                Declarant/Principal by blood, marriage or adoption.<span face="Calibri, serif">
      </span>
            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:left;margin-left: 0.38in; margin-bottom: 0.09in; line-height: 115%">
                <b>WITNESS 1: _______________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dated:
                    ___________________</b></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[signature]</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">____________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[name
      printed]</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">____________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[street
      address]</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">____________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[city,
      state]</span></span></span></span></span></p>
            <p  style="text-align:left;margin-left: 0.38in; margin-bottom: 0.09in; line-height: 115%">



            </p>
            <p  style="text-align:left;margin-left: 0.38in; margin-bottom: 0.09in; line-height: 115%">
                <b>WITNESS 2: _______________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dated:
                    ___________________</b></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[signature]</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">____________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[name
      printed]</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">____________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[street
      address]</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">____________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[city,
      state]</span></span></span></span></span></p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">I
      further declare that I am not a relative of the declarant by blood,
      marriage or adoption (within the third degree of consanguinity).</span></span></span></span></span></p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">____________________________________</span></span></span></span></span></p>
            <p  style="text-align:left;text-indent: 0.5in; margin-bottom: 0in; line-height: 115%">
                <i>(first or second witness’ signature)</i></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

            </p>
        </div>
        @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Power of Attorney for Health Care Decisions and Living Will of {{$tellUsAboutYou['fullname']}}<br>
                Page 6 of 7
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Power of Attorney for Health Care Decisions and Living Will of «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 6 of 7
            </div>
        @endif
    </div>
    <!-- !Page 6 -->

    <!-- Page 7 -->
    <div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding: 40px;">
        <div class="docPageInner"
             style="box-sizing: border-box; height: 890px;">


            <p  style="text-align:center;margin-bottom: 0in; line-height: 115%; page-break-before: always">
                <b>GENERAL INFORMATION REGARDING THIS DOCUMENT</b></p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">1. &quot;Health
                care&quot; means any care, treatment, service, or procedure to
                maintain, diagnose, or treat an individual's physical or mental
                condition. &quot;Life-sustaining procedure&quot; means any medical
                procedure, treatment, or intervention which utilizes mechanical or
                artificial means to sustain, restore, or supplement a spontaneous
                vital function, and when applied to a person in a terminal condition,
                would serve only to prolong the dying process. &quot;Life sustaining
                procedure&quot; does not include administration of medication or
                performance of any medical procedure deemed necessary to provide
                comfort care or to alleviate pain.
            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">2. The terms &quot;health
                care&quot; and &quot;life-sustaining procedure&quot; include
                nutrition and hydration (food and water) only when provided
                parenterally or through intubation (intravenously or by feeding
                tube). Thus, this document authorizes withholding nutrition or
                hydration that is provided intravenously or by feeding tube. If this
                is not what you want, you should set forth your specific instructions
                in the space provided.
            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">3. The following
                individuals shall not be designated as the attorney in fact to make
                health care decisions under a durable power of attorney for health
                care:
            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="text-indent: 0.5in; margin-bottom: 0in; line-height: 115%"><span  style="font-size: 9pt">a.
      A health care provider attending the principal on the date of
      execution. </span>
            </p>
            <p style="margin-left: 0.5in; margin-bottom: 0in; line-height: 115%"><span  style="font-size: 9pt">b.
      An employee of such a health care provider unless the individual to
      be designated is related to the principal by blood, marriage, or
      adoption within the third degree of consanguinity. </span>
            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">4. The power of
                attorney for health care decisions or the declaration relating to use
                of life-sustaining procedures may be revoked at any time and in any
                manner by which the principal/declarant is able to communicate the
                intent to revoke, without regard to mental or physical condition. A
                revocation is only effective as to the attending health care provider
                upon its communication to the provider by the principal/declarant or
                by another to whom the principal/declarant has communicated the
                revocation.
            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">5. It is the
                responsibility of the principal/declarant to provide the attending
                health care provider with a copy of this document.
            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">6. A declaration
                relating to use of life-sustaining procedures will be given effect
                only when the declarant's condition is determined to be terminal or
                the declarant is in a state of permanent unconsciousness, and the
                declarant is not able to make treatment decisions.
            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in"><b>SUGGESTIONS
                    AFTER FORM IS PROPERLY </b>
            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in"><b>SIGNED,
                    WITNESSED OR NOTARIZED </b>
            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-left: 0.5in; margin-bottom: 0in; line-height: 115%"><span  style="font-size: 9pt">1.
      Place original in a safe place known and accessible to family members
      or close friends. </span>
            </p>
            <p style="margin-left: 0.5in; margin-bottom: 0in; line-height: 115%"><span  style="font-size: 9pt">2.
      Provide a copy to your doctor. </span>
            </p>
            <p style="margin-left: 0.5in; margin-bottom: 0in; line-height: 115%"><span  style="font-size: 9pt">3.
      Provide a copy(s) to family member(s). </span>
            </p>
            <p style="margin-left: 0.5in; margin-bottom: 0in; line-height: 115%"><span  style="font-size: 9pt">4.
      Provide a copy to the designated attorney in fact (agent) and to
      alternate designated attorneys in fact (if any).</span></p>
        </div>
        @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Power of Attorney for Health Care Decisions and Living Will of {{$tellUsAboutYou['fullname']}}<br>
                Page 7 of 7
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Power of Attorney for Health Care Decisions and Living Will of «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 7 of 7
            </div>
        @endif
    </div>
    <!-- !Page 7 -->
</div>

</body>
</html>