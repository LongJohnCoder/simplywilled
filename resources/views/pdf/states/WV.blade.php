<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Untitled Document</title>
    <style>
       /* *{
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

    <div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding: 40px;">
        <div class="docPageInner" style="box-sizing: border-box; height: 875px;">
            <p style="margin-bottom: 0.13in; line-height: 100%; text-align: center;"><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 16pt"><b>WEST VIRGINIA MEDICAL POWER OF ATTORNEY</b></span></span></p>
            <p align="center" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p style="margin-bottom: 0in; line-height: 100%; text-align: center;"><span style="font-family:'Times, serif'"><span  style="font-size: 7pt"><span style="font-family:'Times New Roman, serif'"><span style="font-size: 12pt"><b>THE
          PERSON I WANT TO MAKE HEALTH CARE DECISIONS FOR ME WHEN I CAN</b></span></span><span style="font-family:'Times, serif'"><span  style="font-size: 9pt"><span style="font-family:'Times New Roman, serif'"><span style="font-size: 12pt"><b>’</b></span></span></span></span><span style="font-family:'Times New Roman, serif'"><span style="font-size: 12pt"><b>T
          MAKE THEM FOR MYSELF</b></span></span></span></span></p>
            <p align="justify" style="margin-top: 0.19in; margin-bottom: 0in; line-height: 100%">
          <span><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 9pt"><span ><span style="font-size: 12pt">Dated
          this </span></span><span ><span style="font-size: 12pt"><u>____________</u></span></span><span ><span style="font-size: 12pt">
          day of </span></span><span ><span style="font-size: 12pt"><u>__________________________</u></span></span><span ><span style="font-size: 12pt">,
          </span></span><span ><span style="font-size: 12pt"><u>___________________</u></span></span><span ><span style="font-size: 12pt">.</span></span></span></span></span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span ><span style="font-family:'Times New Roman, serif'">I,
      </span></span><span style="font-family:'Times New Roman, serif'"><b></b></span>
      <span>
        <span style="font-family:'Times New Roman, serif'">
             @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
            @else
                <b>________________________________</b>
            @endif
        </span>
      </span>

                <span style="font-family:'Times New Roman, serif'"></span><span ><span style="font-family:'Times New Roman, serif'">,
      of </span></span>


      <span>
         @if(isset($tellUsAboutYou) && array_key_exists('address',$tellUsAboutYou) && !is_null($tellUsAboutYou['address']))
              <span style="font-family:'Times New Roman, serif'" >{{$tellUsAboutYou['address']}}</span>
          @else
              <span>_________________________________________________________________
                    ___________________________________________________________________________________________
                    _________________________________________________________________________________</span>
          @endif
      </span>

                <span ><span style="font-family:'Times New Roman, serif'">,</span></span>


      <span>
          @if(isset($tellUsAboutYou) && array_key_exists('city',$tellUsAboutYou) && !is_null($tellUsAboutYou['city']))
              <span style="text-transform: capitalize">{{$tellUsAboutYou['city']}}</span>
          @else
              <span style="text-transform: capitalize">(city)_____________</span>
          @endif
      </span>

      <span ><span style="font-family:'Times New Roman, serif'">,</span></span>

      <span>
           @if(isset($tellUsAboutYou) && array_key_exists('state',$tellUsAboutYou) && !is_null($tellUsAboutYou['state']))
              <span style="text-transform: capitalize">{{$tellUsAboutYou['state']}}</span>
           @else
              <span style="text-transform: capitalize">(state)_____________</span>
           @endif
      </span>

      <span>
        <span style="font-family:'Times New Roman, serif'"> , hereby appoint my </span>
      </span>

      <span>
          @if(isset($healthFinance) && array_key_exists('relation',$healthFinance) && !is_null($healthFinance['relation'])  && $healthFinance['relation'] == 'Other')
              <span style="font-family:'Times New Roman, serif'">{{$healthFinance['relationOther']}}</span>
          @elseif (isset($healthFinance) && array_key_exists('relation',$healthFinance) && !is_null($healthFinance['relation']) && $healthFinance['relation'] != 'Other')
              <span style="font-family:'Times New Roman, serif'">{{$healthFinance['relation']}}</span>
          @else
              <span>(relation)______________</span>
          @endif
      </span>

      <span>
        <span style="font-family:'Times New Roman, serif'">, </span>
      </span>

      <span>
          @if(isset($healthFinance) && array_key_exists('fullname',$healthFinance) && !is_null($healthFinance['fullname']))
              <span style="font-family:'Times New Roman, serif'">{{$healthFinance['fullname']}}</span>
          @else
              <span style="font-family:'Times New Roman, serif'">_____________________________</span>
          @endif
      </span>

      <span style="font-family:'Times New Roman, serif'"></span>

      <span ><span style="font-family:'Times New Roman, serif'">of
      </span></span>

      <span>
          @if(isset($healthFinance) && array_key_exists('address',$healthFinance) && !is_null($healthFinance['address']))
              <span style="font-family:'Times New Roman, serif'">{{$healthFinance['address']}}, </span>
          @else
              <span>_________________________________________________________________
                        _______________________________________________________________________________,
                    </span>
          @endif
      </span>

      <span>
        <span style="font-family:'Times New Roman, serif'">,</span>
      </span>

      <span>
          @if(isset($healthFinance) && array_key_exists('city',$healthFinance) && !is_null($healthFinance['city']))
              <span style="font-family:'Times New Roman, serif'">{{$healthFinance['city']}}, </span>
          @else
              <span>(city)__________________, </span>
          @endif
      </span>

                <span style="font-family:'Times New Roman, serif'">, </span>

      <span>
          @if(isset($healthFinance) && array_key_exists('state',$healthFinance) && !is_null($healthFinance['state']))
              <span style="font-family:'Times New Roman, serif'">{{$healthFinance['state']}}, </span>
          @else
              <span>(state)__________________, </span>
          @endif
      </span>

      <span>
         @if(isset($healthFinance) && array_key_exists('zip',$healthFinance) && !is_null($healthFinance['zip']))
              <span style="font-family:'Times New Roman, serif'">{{$healthFinance['zip']}}, </span>
          @else
              <span >(zip)__________________, </span>
          @endif

      </span>

      <span>
        <span style="font-family:'Times New Roman, serif'">
      (Tel: </span>
      </span>

      <span>
         @if(isset($healthFinance) && array_key_exists('phone',$healthFinance) && !is_null($healthFinance['phone']))
              <span style="font-family:'Times New Roman, serif'">{{$healthFinance['phone']}}</span>
          @else
              <span>__________________</span>
          @endif
      </span>

      <span>
        <span style="font-family:'Times New Roman, serif'">),</span>
      </span>

      <span>
        <span style="font-family:'Times, serif'">
          <span  style="font-size: 9pt">
            <span style="font-family:'Times New Roman, serif'"><span style="font-size: 12pt">as
      my representative to act on my behalf to give, withhold or withdraw
      informed consent to health care decisions in the event that I am not
      able to do so myself</span></span></span></span>
      </span>

      <span >
        <span style="font-family:'Times New Roman, serif'">.</span></span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>

    @if(isset($healthFinance) && array_key_exists('anyBackupAgent',$healthFinance) && !is_null($healthFinance['anyBackupAgent']) && $healthFinance['anyBackupAgent'] == true)
    <p align="justify" style="margin-bottom: 0in; line-height: 100%">
        <span style="font-family:'Times New Roman, serif'">If</span>
        <span style="font-family:'Times, serif'">
          <span  style="font-size: 9pt">
            <span style="font-family:'Times New Roman, serif'">
              <span style="font-size: 12pt">my representative is unable, unwilling or disqualified to serve,</span>
            </span>
          </span>
        </span>
        <span style="font-family:'Times New Roman, serif'">
      then I appoint </span>
      <span>
        @if(isset($healthFinance) && array_key_exists('backupRelation',$healthFinance) && !is_null($healthFinance['backupRelation']) && $healthFinance['backupRelation'] == 'Other')
              <span>{{$healthFinance['backupRelation']}}</span>
          @elseif(isset($healthFinance) && array_key_exists('backupRelation',$healthFinance) && !is_null($healthFinance['backupRelation']) && $healthFinance['backupRelation'] != 'Other')
              <span>{{$healthFinance['backupRelation']}}</span>
          @else
              <span>(relation)______________</span>
          @endif
      </span>

      <span>
          @if(isset($healthFinance) && array_key_exists('backupFullname',$healthFinance) && !is_null($healthFinance['backupFullname']))
              <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupFullname']}}</span>
          @else
              <span style="font-family:'Times New Roman, serif'">_____________________________</span>
          @endif
      </span>

                <span style="font-family:'Times New Roman, serif'">, of </span>

      <span>
          @if(isset($healthFinance) && array_key_exists('backupAddress',$healthFinance) && !is_null($healthFinance['backupAddress']))
              <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupAddress']}}, </span>
          @else
              <span>_________________________________________________________________
                _______________________________________________________________________________,
                </span>
          @endif
      </span>

                <span style="font-family:'Times New Roman, serif'">, </span>

      <span>
          @if(isset($healthFinance) && array_key_exists('backupCity',$healthFinance) && !is_null($healthFinance['backupCity']))
              <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupCity']}}, </span>
          @else
              <span>(city)__________________, </span>
          @endif
      </span>

      <span style="font-family:'Times New Roman, serif'">,
      </span>

      <span>
           @if(isset($healthFinance) && array_key_exists('backupState',$healthFinance) && !is_null($healthFinance['backupState']))
              <span style="font-family:'Times New Roman, serif'" >{{$healthFinance['backupState']}}, </span>
          @else
              <span>(state)__________________, </span>
          @endif
      </span>

      <span>
         @if(isset($healthFinance) && array_key_exists('backupZip',$healthFinance) && !is_null($healthFinance['backupZip']))
              <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupZip']}}, </span>
          @else
              <span>(zip)__________________, </span>
          @endif
      </span>

      <span style="font-family:'Times New Roman, serif'">
      (Tel: </span>

      <span>
            @if(isset($healthFinance) && array_key_exists('backupphone',$healthFinance) && !is_null($healthFinance['backupphone']))
              <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupphone']}}</span>
          @else
              <span>__________________</span>
          @endif
      </span>

      <span style="font-family:'Times New Roman, serif'">),
      as my alternate representative for health care decisions.</span>
    </p>
    @endif
            <p align="justify" style="margin-bottom: 0in; line-height: 100%">
            <span>
              <span style="font-family:'Times New Roman, serif'">
                <span  style="font-size: 9pt">
                  <span>

                  </span>
                </span>
              </span>
            </span>
            </p>




            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times, serif'"><span  style="font-size: 9pt"><span style="font-family:'Times New Roman, serif'"><span style="font-size: 12pt">This
          appointment shall extend to, but not be limited to, health care
          decisions relating to medical treatment, surgical treatment, nursing
          care, medication, hospitalization, care and treatment in a nursing
          home or other facility, and home health care. The representative
          appointed by this document is specifically authorized to act on my
          behalf to consent to, refuse or withdraw any and all medical
          treatment or diagnostic procedures, or autopsy if my representative
          determines that I, if able to do so, would consent to, refuse or
          withdraw such treatment or procedures. Such authority shall include,
          but not be limited to, decisions regarding the withholding or
          withdrawal of life-prolonging interventions.</span></span></span></span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times, serif'"><span  style="font-size: 9pt"><span style="font-family:'Times New Roman, serif'"><span style="font-size: 12pt">I
          appoint this representative because I believe this person understands
          my wishes and values and will act to carry into effect the health
          care decisions that I would make if I were able to do so, and because
          I also believe that this person will act in my best interests when my
          wishes are unknown. It is my intent that my family, my physician and
          all legal authorities be bound by the decisions that are made by the
          representative appointed by this document, and it is my intent that
          these decisions should not be the subject of review by any health
          care provider, or administrative or judicial agency.</span></span></span></span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times, serif'"><span  style="font-size: 9pt"><span style="font-family:'Times New Roman, serif'"><span style="font-size: 12pt">It
          is my intent that this document be legally binding and effective and
          that this document be taken as a formal statement of my desire
          concerning the method by which any health care decisions should be
          made on my behalf during any period when I am unable to make such
          decisions.</span></span></span></span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times, serif'"><span  style="font-size: 9pt"><span style="font-family:'Times New Roman, serif'"><span style="font-size: 12pt">In
          exercising the authority under this medical power of attorney, my
          representative shall act consistently with my special directives or
          limitations as stated below.</span></span></span></span></p>
        </div>

        @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Medical Power of Attorney and Living Will of <span style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</span><br>
                Page 1 of 5

            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Medical Power of Attorney and Living Will of  «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 1 of 5
            </div>
        @endif
    </div>


    <div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding: 40px;">
        <div class="docPageInner" style="box-sizing: border-box; height: 875px;">
            <p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><span style="font-family:'Times, serif'"><span  style="font-size: 9pt"><span style="font-family:'Times New Roman, serif'"><span style="font-size: 12pt">I
        am giving the following SPECIAL DIRECTIVES OR LIMITATIONS ON THIS
        POWER: (Comments about tube feedings, breathing machines,
        cardiopulmonary resuscitation, dialysis, funeral arrangements,
        autopsy and organ donation may be placed here. My failure to provide
        special directives or limitations does not mean that I want or refuse
        certain treatments).</span></span></span></span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">1.
        If I am very sick and not able to communicate my wishes for myself
        and I am certified by one physician who has personally examined me,
        to have a terminal condition or to be in a persistent vegetative
        state (I am unconscious and am neither aware of my environment nor
        able to interact with others,) I direct that life-prolonging medical
        intervention that would serve solely to prolong the dying process or
        maintain me in a persistent vegetative state be withheld or
        withdrawn. I want to be allowed to die naturally and only be given
        medications or other medical procedures necessary to keep me
        comfortable. I want to receive as much medication as is necessary to
        alleviate my pain.</span></p>
            <p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><br/>
                <br/>

            </p>
            <p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><span style="font-family:'Times, serif'"><span  style="font-size: 9pt"><span style="font-family:'Times New Roman, serif'"><span style="font-size: 12pt">2.
        Other directives:</span></span></span></span></p>
            <p align="justify" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
                <span style="font-family:'Times New Roman, serif'"><span  style="font-size: 9pt"><span style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
            <p align="justify" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
                <span style="font-family:'Times New Roman, serif'"><span  style="font-size: 9pt"><span style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
            <p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
                <span style="font-family:'Times New Roman, serif'"><span  style="font-size: 9pt"><span style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
            <p align="left" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 7pt"><span style="font-size: 12pt"><i>(Add
        additional sheets if necessary.)</i></span></span></span></p>
            <p style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 9pt"><span style="font-size: 12pt">My
        representative has the full and immediate power and authority to
        request, review, and receive, to the extent I could do so
        individually, any information, verbal or written, regarding my
        physical or mental health, including, but not limited to, my
        individually identifiable health information or other medical
        records. This release authority applies to any information governed
        by the Health Insurance Portability and Accountability Act of 1996
        (HIPAA), 42 U.S.C. 1320d and 45 CFR 160-164. I hereby authorize any
        physician, health care professional, dentist, health plan, hospital,
        clinic, laboratory, pharmacy, or other covered health care provider,
        any insurance company, and the Medical Information Bureau, Inc. or
        other health care clearinghouse that has provided treatment or
        services to me, or that has paid for or is seeking payment from me
        for such services, to give, disclose, and release to my
        representative, without restriction, all of my individually
        identifiable health information and medical records regarding any
        past, present, or future medical or mental health condition. This
        authority given my representative shall supersede any other agreement
        which I may have made with my health care providers to restrict
        access to or disclosure of my individually identifiable health
        information. This authority given my representative shall be
        effective immediately, has no expiration date and shall expire only
        in the event that I revoke the authority in writing and deliver it to
        my health care provider.</span></span></span></p>
            <p align="justify" style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in; line-height: 100%">
                <br/>

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times, serif'"><span  style="font-size: 9pt"><span style="font-family:'Times New Roman, serif'"><span style="font-size: 12pt">THIS
        MEDICAL POWER OF ATTORNEY SHALL BECOME EFFECTIVE ONLY UPON MY
        INCAPACITY TO GIVE, WITHHOLD OR WITHDRAW INFORMED CONSENT TO MY OWN
        MEDICAL CARE.</span></span></span></span></p>
        </div>
        @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Medical Power of Attorney and Living Will of <span style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</span><br>
                Page 2 of 5
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Medical Power of Attorney and Living Will of  «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 2 of 5
            </div>
        @endif
    </div>


    <div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding: 40px;">
        <div class="docPageInner" style="box-sizing: border-box; height: 875px;">
            <p align="center" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 9pt"><span style="font-size: 12pt"><b>SIGNATURE
      AND ACKNOWLEDGEMENTS</b></span></span></span></p>
            <p align="center" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 9pt"><span style="font-size: 12pt">Signature:
            _______________________________________</span></span></span></p>
            <p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
                <span style="font-family:'Times New Roman, serif'"></span>

          <span >
            <span style="font-family:'Times New Roman, serif'">
                @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                    <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
                @else
                    <b>________________________________</b>
                @endif
                {{--<b style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null">{{userDetails.tellUsAboutYou.fullname}}</b>
                <b *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null">________________________________</b>--}}
            </span>
          </span>

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p align="center" style="margin-bottom: 0.13in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 10pt"><span style="font-size: 12pt"><b>DECLARATION
            OF WITNESSES</b></span></span></span></p>
            <p style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times, serif'"><span  style="font-size: 9pt"><span style="font-family:'Times New Roman, serif'"><span style="font-size: 12pt">I
          did not sign the principal’s signature above. I am at least
          eighteen years of age and am not related to the principal by blood or
          marriage. I am not entitled to any portion of the estate of the
          principal or to the best of my knowledge under any will of the
          principal or codicil thereto, or legally responsible for the costs of
          the principal’s medical or other care. I am not the principal’s
          attending physician, nor am I the representative or successor
          representative of the principal.</span></span></span></span></p>
            <p style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%"><span ><b>WITNESS
      1</b></span><span >: </span><span ><u>____________________</u></span><span style="padding-left: 50px;">	Dated:
      </span><span ><u>______________________</u></span></p>
            <p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 100%">
                <span style="padding-left: 50px;">[signature]</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%; padding-top: 15px;">
                <span ><u>____________________________</u></span><span >		</span><span style="padding-left: 122px;"><u>______________________</u></span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
                <span style="padding-left: 60px;">	[name printed]</span><span style="padding-left: 240px;">[street address]</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%; padding:15px 0 0 350px;">
                <span >							</span><span ><u>______________________</u></span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%; padding-left: 350px;">
                <span style="padding-left: 40px;">								[city, state, zip]</span></p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%"><span ><b>WITNESS
          2</b></span><span >: </span><span ><u>____________________</u></span><span style="padding-left: 50px;">	Dated:
          </span><span ><u>______________________</u></span></p>
            <p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 100%">
                <span style="padding-left: 50px;">[signature]</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%; padding-top: 15px;">
                <span ><u>____________________________</u></span><span >		</span><span style="padding-left: 122px;"><u>______________________</u></span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
                <span style="padding-left: 60px;">	[name printed]</span><span style="padding-left: 240px;">[street address]</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%; padding:15px 0 0 350px;">
                <span >							</span><span ><u>______________________</u></span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%; padding-left: 350px;">
                <span style="padding-left: 40px;">								[city, state, zip]</span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 9pt"><span  style="font-size: 10pt">STATE
            OF WEST VIRGINIA</span><span  style="font-size: 10pt">	</span><span  style="font-size: 10pt">)</span></span></span></p>
            <p align="justify" style="margin-left: 1in; text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
          <span style="font-family:'Times New Roman, serif'"><span  style="font-size: 9pt"><span  style="font-size: 10pt">	</span><span  style="font-size: 10pt">)
          ss.</span><span  style="font-size: 10pt">&nbsp;</span></span></span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span ><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 9pt"><span ><span  style="font-size: 10pt">COUNTY
            OF ________________</span></span><span  style="font-size: 10pt">	</span><span ><span  style="font-size: 10pt">)</span></span></span></span></span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times, serif'"><span  style="font-size: 9pt"><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 10pt">I,
            the undersigned, a Notary Public of said County, do certify that
        </span></span></span></span>

                {{--<b style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null">{{userDetails.tellUsAboutYou.fullname}}</b>
                <b *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null">(fullname)________________________________</b>--}}
                @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                    <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
                @else
                    <b>________________________________</b>
                @endif


                <span style="font-family:'Times New Roman, serif'"><span  style="font-size: 10pt"></span></span><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 10pt">,
              as principal, and __________________________ and
              __________________________, </span></span><span style="font-family:'Times, serif'"><span  style="font-size: 9pt"><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 10pt">as
              witnesses, whose names are signed to the writing above bearing date
              on the </span></span></span></span><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 10pt"><u>____</u></span></span><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 10pt">
              day of </span></span><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 10pt"><u>_____________</u></span></span><span style="font-family:'Times, serif'"><span  style="font-size: 9pt"><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 10pt">have
              this day acknowledged the same before me.</span></span></span></span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 9pt"><span ><span style="font-family:'Times, serif'"><span  style="font-size: 9pt"><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 10pt">Given
          under my hand </span></span></span></span></span><span ><span  style="font-size: 10pt">this
          </span></span><span ><span  style="font-size: 10pt"><u>____________</u></span></span><span ><span  style="font-size: 10pt">
          day of </span></span><span ><span  style="font-size: 10pt"><u>________________________</u></span></span><span ><span  style="font-size: 10pt">.</span></span></span></span></span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 9pt"><span  style="font-size: 10pt">	</span><span  style="font-size: 10pt">______________________________________</span></span></span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 9pt"><span  style="font-size: 10pt">	</span><span  style="font-size: 10pt"><b>NOTARY
            PUBLIC</b></span></span></span></p>
            <p align="justify" style="margin-left: 3in; text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
        <span style="font-family:'Times New Roman, serif'"><span  style="font-size: 9pt"><span  style="font-size: 10pt">My
        Commission expires: _________________</span></span></span></p>
        </div>
        @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Medical Power of Attorney and Living Will of <span style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</span><br>
                Page 3 of 5
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Medical Power of Attorney and Living Will of  «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 3 of 5
            </div>
        @endif
    </div>


    <div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding: 40px;">
        <div class="docPageInner" style="box-sizing: border-box; height: 875px;">
            <p align="center" style="margin-bottom: 0in; line-height: 100%">
        <span style="font-family:'Times New Roman, serif'">
          <span style="font-size: 13pt">
            <span style="font-family:'Times New Roman, serif'">
              <span size="5" style="font-size: 18pt">
                <span style="font-size: 16pt">
                  <b>WEST VIRGINIA LIVING WILL</b>
                </span>
              </span>
            </span>
          </span>
        </span>
            </p>
            <p align="center" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p align="center" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p align="center" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times, serif'"><span  style="font-size: 7pt"><span style="font-family:'Times, serif'"><span  style="font-size: 9pt"><span style="font-family:'Times New Roman, serif'"><span style="font-size: 12pt"><b>T</b></span></span></span></span><span style="font-family:'Times New Roman, serif'"><span style="font-size: 12pt"><b>HE
        KIND OF MEDICAL TREATMENT </b></span></span><span style="font-family:'Times, serif'"><span  style="font-size: 9pt"><span style="font-family:'Times New Roman, serif'"><span style="font-size: 12pt"><b>I
        </b></span></span></span></span><span style="font-family:'Times New Roman, serif'"><span style="font-size: 12pt"><b>WANT
        AND DON</b></span></span><span style="font-family:'Times, serif'"><span  style="font-size: 9pt"><span style="font-family:'Times New Roman, serif'"><span style="font-size: 12pt"><b>’</b></span></span></span></span><span style="font-family:'Times New Roman, serif'"><span style="font-size: 12pt"><b>T
        WANT IF I HAVE A TERMINAL CONDITION OR AM IN A PERSISTENT VEGETATIVE
        STATE</b></span></span></span></span></p>
            <p align="justify" style="margin-top: 0.13in; margin-bottom: 0in; line-height: 100%">
                <br/>

            </p>
            <p align="justify" style="margin-top: 0.13in; margin-bottom: 0in; line-height: 100%">
        <span><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 9pt"><span ><span style="font-size: 12pt">LIVING
        WILL made this </span></span><span ><span style="font-size: 12pt"><u>	</u></span></span><span ><span style="font-size: 12pt">
        day of </span></span><span ><span style="font-size: 12pt"><u>				</u></span></span><span ><span style="font-size: 12pt">,
        </span></span><span ><span style="font-size: 12pt"><u>		</u></span></span><span ><span style="font-size: 12pt">.</span></span></span></span></span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'"><span  style="font-size: 9pt"><span style="font-size: 12pt">I,
        </span></span></span><span style="font-family:'Times New Roman, serif'"></span>

               {{-- <b style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null">{{userDetails.tellUsAboutYou.fullname}}</b>
                <b *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null">________________________________</b>--}}
                @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                    <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
                @else
                    <b>________________________________</b>
                @endif

        <span style="font-family:'Times New Roman, serif'"><span  style="font-size: 9pt"><span style="font-size: 12pt">,
        </span></span></span><span style="font-family:'Times New Roman, serif'">being of
        sound mind, willfully and voluntarily declare that I want my wishes
        to be respected if I am very sick and not able to communicate my
        wishes for myself. In the absence of my ability to give directions
        regarding the use of life-prolonging medical intervention, it is my
        desire that my dying shall not be prolonged under the following
        circumstances:</span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times, serif'"><span  style="font-size: 9pt"><span style="font-family:'Times New Roman, serif'"><span style="font-size: 12pt">If
        I am very sick and not able to communicate my wishes for myself and I
        am certified by one physician who has personally examined me, to have
        a terminal condition or to be in a persistent vegetative state (I am
        unconscious and am neither aware of my environment nor able to
        interact with others,) I direct that life-prolonging medical
        intervention that would serve solely to prolong the dying process or
        maintain me in a persistent vegetative state be withheld or
        withdrawn. I want to be allowed to die naturally and only be given
        medications or other medical procedures necessary to keep me
        comfortable. I want to receive as much medication as is necessary to
        alleviate my pain.</span></span></span></span></p>
            <p style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><span style="font-family:'Times, serif'"><span  style="font-size: 9pt"><span style="font-family:'Times New Roman, serif'"><span style="font-size: 12pt">I
        give the following SPECIAL DIRECTIVES OR LIMITATIONS: (Comments about
        tube feedings, breathing machines, cardiopulmonary resuscitation,
        dialysis, and mental health treatment may be placed here. My failure
        to provide special directives or limitations does not mean that I
        want or refuse certain treatments.)</span></span></span></span></p>
            <p align="justify" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
                <span style="font-family:'Times New Roman, serif'"><span  style="font-size: 9pt"><span style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
            <p align="justify" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
                <span style="font-family:'Times New Roman, serif'"><span  style="font-size: 9pt"><span style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
            <p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
                <span style="font-family:'Times New Roman, serif'"><span  style="font-size: 9pt"><span style="font-size: 12pt">________________________________________________________________________</span></span></span></p>
            <p align="left" style="margin-left: 0.38in; margin-bottom: 0.13in; line-height: 100%">
        <span style="font-family:'Times New Roman, serif'"><span  style="font-size: 7pt"><span  style="font-size: 10pt"><i>(Add
        additional sheets if needed.)</i></span></span></span></p>
            <p style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times, serif'"><span  style="font-size: 9pt"><span style="font-family:'Times New Roman, serif'"><span style="font-size: 12pt">It
        is my intention that this living will be honored as the final
        expression of my legal right to refuse medical or surgical treatment
        and accept the consequences resulting from such refusal.</span></span></span></span></p>
            <p style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times, serif'"><span  style="font-size: 9pt"><span style="font-family:'Times New Roman, serif'"><span style="font-size: 12pt">I
        understand the full import of this living will</span></span></span></span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 9pt"><span style="font-size: 12pt">Signature:
        </span><span style="font-size: 12pt"><u>_____________________________________</u></span><span style="font-size: 12pt">	Date:	</span><span style="font-size: 12pt"><u>___________________</u></span></span></span></p>
            <p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
                <span style="font-family:'Times New Roman, serif'"><b>	</b></span>

        <span>
          <span style="font-family:'Times New Roman, serif'">
          {{--  <b style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null">{{userDetails.tellUsAboutYou.fullname}}</b>
            <b *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null">________________________________</b>--}}
              @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                  <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
              @else
                  <b>________________________________</b>
              @endif
          </span>
        </span>


                <span style="font-family:'Times New Roman, serif'"><b></b></span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%">
          <span style="font-family:'Times New Roman, serif'"><span  style="font-size: 9pt"><span style="font-size: 12pt">My
            Address: </span><span>
                       @if(isset($tellUsAboutYou) && array_key_exists('address',$tellUsAboutYou) && !is_null($tellUsAboutYou['address']))
                          <span style="font-family:'Times New Roman, serif'" >{{$tellUsAboutYou['address']}}</span>
                       @else
                          <span>_________________________________________________________________
                            ___________________________________________________________________________________________
                            _________________________________________________________________________________</span>
                       @endif
            {{--<span *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.address !== null" style="font-family:'Times New Roman, serif'" >{{userDetails.tellUsAboutYou.address}}</span>
            <span *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null">_________________________________________________________________
            ___________________________________________________________________________________________
            _________________________________________________________________________________</span>--}}
        </span><span style="font-size: 12pt">,
        </span>

        <span>
             @if(isset($tellUsAboutYou) && array_key_exists('city',$tellUsAboutYou) && !is_null($tellUsAboutYou['city']))
                <span style="text-transform: capitalize">{{$tellUsAboutYou['city']}}</span>
             @else
                <span style="text-transform: capitalize">(city)_____________</span>
                <span >, </span>
             @endif

            {{--  <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.city !== null" style="font-family:'Times New Roman, serif'">{{userDetails.tellUsAboutYou.city}}</span>
              <span style="text-transform: capitalize" *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null">(city)_____________</span>--}}
        </span>

        <span style="font-size: 12pt">, </span>

        <span>
            @if(isset($tellUsAboutYou) && array_key_exists('state',$tellUsAboutYou) && !is_null($tellUsAboutYou['state']))
                <span style="text-transform: capitalize">{{$tellUsAboutYou['state']}}</span>
            @else
                <span style="text-transform: capitalize">(state)_____________</span>
            @endif

            {{-- <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.state !== null" style="font-family:'Times New Roman, serif'">{{userDetails.tellUsAboutYou.state}}</span>
             <span style="text-transform: capitalize" *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null" style="font-family:'Times New Roman, serif'">(state)_____________________</span>--}}
        </span>

      </span></span></p>
        </div>
        @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Medical Power of Attorney and Living Will of <span style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</span><br>
                Page 4 of 5
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Medical Power of Attorney and Living Will of  «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 4 of 5
            </div>
        @endif
    </div>


    <div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding: 40px;">
        <div class="docPageInner" style="box-sizing: border-box; height: 875px;">
            <p align="center" style="margin-bottom: 0.13in; line-height: 100%; page-break-before: always">
          <span style="font-family:'Times New Roman, serif'"><span  style="font-size: 10pt"><span style="font-size: 12pt"><b>DECLARATION
          OF WITNESSES</b></span></span></span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times, serif'"><span  style="font-size: 9pt"><span style="font-family:'Times New Roman, serif'"><span style="font-size: 12pt">I
          did not sign the principal’s signature above. I am at least
          eighteen years of age and am not related to the principal by blood or
          marriage. I am not entitled to any portion of the estate of the
          principal or to the best of my knowledge under any will of the
          principal or codicil thereto, or legally responsible for the costs of
          the principal’s medical or other care. I am not the principal’s
          attending physician, nor am I the representative or successor
          representative of the principal.</span></span></span></span></p>
            <p style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%"><span ><b>WITNESS
          1</b></span><span >: </span><span ><u>____________________</u></span><span style="padding-left: 50px;">	Dated:
          </span><span ><u>______________________</u></span></p>
            <p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 100%">
                <span style="padding-left: 50px;">[signature]</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%; padding-top: 15px;">
                <span ><u>____________________________</u></span><span >		</span><span style="padding-left: 122px;"><u>______________________</u></span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
                <span style="padding-left: 60px;">	[name printed]</span><span style="padding-left: 240px;">[street address]</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%; padding:25px 0 0 350px;">
                <span >							</span><span ><u>______________________</u></span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%; padding-left: 350px;">
                <span style="padding-left: 40px;">								[city, state, zip]</span></p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%"><span ><b>WITNESS
          2</b></span><span >: </span><span ><u>____________________</u></span><span style="padding-left: 50px;">	Dated:
          </span><span ><u>______________________</u></span></p>
            <p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 100%">
                <span style="padding-left: 50px;">[signature]</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%; padding-top: 15px;">
                <span ><u>____________________________</u></span><span >		</span><span style="padding-left: 122px;"><u>______________________</u></span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
                <span style="padding-left: 60px;">	[name printed]</span><span style="padding-left: 240px;">[street address]</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%; padding:25px 0 0 350px;">
                <span >							</span><span ><u>______________________</u></span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%; padding-left: 350px;">
                <span style="padding-left: 40px;">								[city, state, zip]</span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 9pt"><span  style="font-size: 10pt">STATE
            OF WEST VIRGINIA</span><span  style="font-size: 10pt">	</span><span  style="font-size: 10pt">)</span></span></span></p>
            <p align="justify" style="margin-left: 1in; text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
          <span style="font-family:'Times New Roman, serif'"><span  style="font-size: 9pt"><span  style="font-size: 10pt">	</span><span  style="font-size: 10pt">)
          ss.</span><span  style="font-size: 10pt">&nbsp;</span></span></span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span ><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 9pt"><span ><span  style="font-size: 10pt">COUNTY
            OF ________________</span></span><span  style="font-size: 10pt">	</span><span ><span  style="font-size: 10pt">)</span></span></span></span></span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
            <span style="font-family:'Times, serif'"><span  style="font-size: 9pt"><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 10pt">I,
            the undersigned, a Notary Public of said County, do certify that
            </span></span></span></span><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 10pt"></span></span>

            <span>
                <span style="font-family:'Times New Roman, serif'">
                     @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                        <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
                     @else
                        <b>________________________________</b>
                     @endif
                    {{--<span  style="text-transform: capitalize; font-size: 10pt" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null">{{userDetails.tellUsAboutYou.fullname}}</span>
                    <span *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null">________________________________</span>--}}
                </span>
            </span>

                <span style="font-family:'Times New Roman, serif'"></span><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 10pt">,
                  as principal, and __________________________ and
                  __________________________, </span></span><span style="font-family:'Times, serif'"><span  style="font-size: 9pt"><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 10pt">as
                  witnesses, whose names are signed to the writing above bearing date
                  on the </span></span></span></span><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 10pt"><u>____</u></span></span><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 10pt">
                  day of </span></span><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 10pt"><u>				</u></span></span><span style="font-family:'Times, serif'"><span  style="font-size: 9pt"><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 10pt">have
                  this day acknowledged the same before me.</span></span></span></span>
            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 9pt"><span ><span style="font-family:'Times, serif'"><span  style="font-size: 9pt"><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 10pt">Given
          under my hand </span></span></span></span></span><span ><span  style="font-size: 10pt">this
          </span></span><span ><span  style="font-size: 10pt"><u>_____________</u></span></span><span ><span  style="font-size: 10pt">
          day of </span></span><span ><span  style="font-size: 10pt"><u>______________________</u></span></span><span ><span  style="font-size: 10pt">.</span></span></span></span></span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 9pt"><span  style="font-size: 10pt">	</span><span  style="font-size: 10pt">______________________________________</span></span></span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 9pt"><span  style="font-size: 10pt">	</span><span  style="font-size: 10pt"><b>NOTARY
            PUBLIC</b></span></span></span></p>
            <p align="justify" style="margin-left: 3in; text-indent: 0.5in; margin-bottom: 0in; line-height: 100%"><a name="_GoBack"></a>
          <span style="font-family:'Times New Roman, serif'"><span  style="font-size: 9pt"><span  style="font-size: 10pt">My
          Commission expires: _________________</span></span></span></p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
            <p style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>

        </div>
        @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Medical Power of Attorney and Living Will of <span style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</span><br>
                Page 5 of 5
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Medical Power of Attorney and Living Will of  «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 5 of 5
            </div>
        @endif
      </div>
  </div>
</body>
</html>