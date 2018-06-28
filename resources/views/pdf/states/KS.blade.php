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
            <p  style="text-align:center;margin-bottom: 0.13in; line-height: 0.28in; page-break-before: auto; page-break-after: auto">
      <span  style="font-size: 17pt"><b>KANSAS DURABLE POWER OF
        ATTORNEY</b></span></p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 0.28in"><span  style="font-size: 17pt"><b>FOR
      HEALTH CARE</b></span></p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:center;margin-left: 0.19in; text-indent: -0.19in; margin-top: 0.13in; margin-bottom: 0.13in; line-height: 115%">
                <b>GENERAL STATEMENT OF AUTHORITY GRANTED
                    &nbsp;</b></p>
            <p  style="text-align:center;margin-bottom: 0.08in; line-height: 115%">
                @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                    <span style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</span>
                @else
                    <span>________________________________</span>
                @endif
            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                @if(isset($tellUsAboutYou) && array_key_exists('address',$tellUsAboutYou) && !is_null($tellUsAboutYou['address']))
                    <span style="font-family:'Times New Roman, serif'" >{{$tellUsAboutYou['address']}}</span>
                @else
                    <span>_________________________________________________________________
                    ___________________________________________________________________________________________
                    _________________________________________________________________________________</span>
                @endif
            </p>
            <!--<p  style="text-align:center;margin-bottom: 0in; line-height: 115%"><span color="#008f00"><span >«</span>IF
              ANSWERED( Address2 )<span >»</span></span></p>-->
            <!--<p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >«<span color="#0432ff">Address2</span>»</span></span></span></span></span></p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 115%"><span color="#008f00"><span >«</span>END
              IF<span >»</span></span></p>-->
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
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

                @if(isset($tellUsAboutYou) && array_key_exists('zip',$tellUsAboutYou) && !is_null($tellUsAboutYou['zip']))
                    <span style="text-transform: capitalize">{{$tellUsAboutYou['zip']}}</span>
                @else
                    <span style="text-transform: capitalize">(zip)_____________</span>
                @endif
      {{--</span></span>--}}{{--</span></span></span>--}}</p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 115%"><span color="#0432ff"><span >
                @if(isset($tellUsAboutYou) && array_key_exists('phone',$tellUsAboutYou) && !is_null($tellUsAboutYou['phone']))
                    <span style="text-transform: capitalize">{{$tellUsAboutYou['phone']}}</span>
                @else
                    <span style="text-transform: capitalize">(phone)_____________</span>
                @endif
      {{--<span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null">{{userDetails.tellUsAboutYou.phone !== null && userDetails.tellUsAboutYou.phone !== undefined ? userDetails.tellUsAboutYou.phone : '_______________________'}}</span>
      <span *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null">_______________________</span>--}}
    </span></span></p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >Pursuant
      to K.S.A. 58-625 to K.S.A. 58-632, I appoint the following person as
      my attorney-in-fact for health care decisions:</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 115%"><span color="#0432ff">{{--<span ><b><span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null"> {{userDetails.healthFinance.fullname !== null && userDetails.healthFinance.fullname !== undefined ? userDetails.healthFinance.fullname : '_______________________'}} </span> <span *ngIf="userDetails === undefined && userDetails.healthFinance === null"> _______________________ </span>, </b></span><span >(my
       <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.relation !== 'Other'"> {{userDetails.healthFinance.relation !== null && userDetails.healthFinance.relation !== undefined ? userDetails.healthFinance.relation : '_______________________'}} </span>
        <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.relation === 'Other'"> {{userDetails.healthFinance.relationOther !== null && userDetails.healthFinance.relationOther !== undefined ? userDetails.healthFinance.relationOther : '_______________________'}} </span>
        <span *ngIf="userDetails === undefined && userDetails.healthFinance === null"> _______________________ </span>)</span>--}}
                    @if(isset($healthFinance) && array_key_exists('relation',$healthFinance) && !is_null($healthFinance['relation'])  && $healthFinance['relation'] == 'Other')
                        <span style="font-family:'Times New Roman, serif'">{{$healthFinance['relationOther']}}</span>
                    @elseif (isset($healthFinance) && array_key_exists('relation',$healthFinance) && !is_null($healthFinance['relation']) && $healthFinance['relation'] != 'Other')
                        <span style="font-family:'Times New Roman, serif'">{{$healthFinance['relation']}}</span>
                    @else
                        <span>(relation)______________</span>
                    @endif
             </span></p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 115%">
                @if(isset($healthFinance) && array_key_exists('address',$healthFinance) && !is_null($healthFinance['address']))
                    <span style="font-family:'Times New Roman, serif'">{{$healthFinance['address']}}, </span>
                @else
                    <span>_________________________________________________________________
                        _______________________________________________________________________________,
                    </span>
                @endif
                {{--<span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null"> {{userDetails.healthFinance.address !== null && userDetails.healthFinance.address !== undefined ? userDetails.healthFinance.address : '_______________________'}} </span> <span *ngIf="userDetails === undefined && userDetails.healthFinance === null"> _______________________ </span>--}}
            </p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 115%">
      <span color="#0000ff">
        <span >
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
       {{--   <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null"> {{userDetails.healthFinance.city !== null && userDetails.healthFinance.city !== undefined ? userDetails.healthFinance.city : '_______________________'}} ,</span> <span *ngIf="userDetails === undefined && userDetails.healthFinance === null"> _______________________ </span>
          <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null"> {{userDetails.healthFinance.state !== null && userDetails.healthFinance.state !== undefined ? userDetails.healthFinance.state : '_______________________'}} </span> <span *ngIf="userDetails === undefined && userDetails.healthFinance === null"> _______________________ ,</span>
          <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null"> {{userDetails.healthFinance.zip !== null && userDetails.healthFinance.zip !== undefined ? userDetails.healthFinance.zip : '_______________________'}} </span> <span *ngIf="userDetails === undefined && userDetails.healthFinance === null"> _______________________ </span>--}}
        </span>
      </span>
            </p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 115%">
      <span color="#0432ff">
        <span >
            @if(isset($healthFinance) && array_key_exists('phone',$healthFinance) && !is_null($healthFinance['phone']))
                <span style="font-family:'Times New Roman, serif'">{{$healthFinance['phone']}}</span>
            @else
                <span>__________________</span>
            @endif
          {{--<span *ngIf="userDetails !== undefined && userDetails.healthFinance !== null"> {{userDetails.healthFinance.phone !== null && userDetails.healthFinance.phone !== undefined ? userDetails.healthFinance.phone : '_______________________'}} </span> <span *ngIf="userDetails === undefined && userDetails.healthFinance === null"> _______________________ </span>--}}
        </span>
      </span>
            </p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>

            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >If
      the above person should be unable to perform in this capacity due to
      death, disability, disqualification, or incapacity, then I appoint
      the following person as my attorney-in-fact:</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            @if(isset($healthFinance) && array_key_exists('anyBackupAgent',$healthFinance) && !is_null($healthFinance['anyBackupAgent']) && $healthFinance['anyBackupAgent'] == true)
            <p  style="text-align:center;margin-bottom: 0in; line-height: 115%">
              <span color="#0432ff">
                <span >
                  <b>
                      @if(isset($healthFinance) && array_key_exists('backupFullname',$healthFinance) && !is_null($healthFinance['backupFullname']))
                          <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupFullname']}}</span>
                      @else
                          <span style="font-family:'Times New Roman, serif'">_____________________________</span>
                      @endif
                  </b>
                </span>
                <span >(my
                    @if(isset($healthFinance) && array_key_exists('backupRelation',$healthFinance) && !is_null($healthFinance['backupRelation']) && $healthFinance['backupRelation'] == 'Other')
                        <span>{{$healthFinance['backupRelation']}}</span>
                    @elseif(isset($healthFinance) && array_key_exists('backupRelation',$healthFinance) && !is_null($healthFinance['backupRelation']) && $healthFinance['backupRelation'] != 'Other')
                        <span>{{$healthFinance['backupRelation']}}</span>
                    @else
                        <span>(relation)______________</span>
                    @endif
                   {{--   <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.backupRelation !== 'Other'"> {{userDetails.healthFinance.backupRelation !== null && userDetails.healthFinance.backupRelation !== undefined ? userDetails.healthFinance.backupRelation : '_______________________'}} </span>
                      <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.backupRelation === 'Other'"> {{userDetails.healthFinance.backupRelationOther !== null && userDetails.healthFinance.backupRelationOther !== undefined ? userDetails.healthFinance.backupRelationOther : '_______________________'}} </span>
                      <span *ngIf="userDetails === undefined && userDetails.healthFinance === null"> _______________________ </span>--}}

                  )
                </span>
              </span>
            </p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 115%">
              <span color="#0432ff">
                <span >
                     @if(isset($healthFinance) && array_key_exists('backupAddress',$healthFinance) && !is_null($healthFinance['backupAddress']))
                        <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupAddress']}}, </span>
                    @else
                        <span>
                            _________________________________________________________________
                            _______________________________________________________________________________,
                        </span>
                    @endif
                 {{-- <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null"> {{userDetails.healthFinance.backupAddress !== null && userDetails.healthFinance.backupAddress !== undefined ? userDetails.healthFinance.backupAddress : '_______________________'}} </span> <span *ngIf="userDetails === undefined && userDetails.healthFinance === null"> _______________________ ,</span>--}}
                </span>
              </span>
            </p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 115%" >
              <span color="#0000ff">
                <span >
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
                  {{--<span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null"> {{userDetails.healthFinance.backupCity !== null && userDetails.healthFinance.backupCity !== undefined ? userDetails.healthFinance.backupCity : '_______________________'}} ,</span> <span *ngIf="userDetails === undefined && userDetails.healthFinance === null"> _______________________ ,</span>
                  <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null"> {{userDetails.healthFinance.backupState !== null && userDetails.healthFinance.backupState !== undefined ? userDetails.healthFinance.backupState : '_______________________'}} </span> <span *ngIf="userDetails === undefined && userDetails.healthFinance === null"> _______________________ ,</span>
                  <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null"> {{userDetails.healthFinance.backupZip !== null && userDetails.healthFinance.backupZip !== undefined ? userDetails.healthFinance.backupZip : '_______________________'}} </span> <span *ngIf="userDetails === undefined && userDetails.healthFinance === null"> _______________________ </span>--}}
                </span>
              </span>
            </p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 115%">
              <span color="#0432ff">
                <span >
                    @if(isset($healthFinance) && array_key_exists('backupphone',$healthFinance) && !is_null($healthFinance['backupphone']))
                        <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupphone']}}</span>
                    @else
                        <span>__________________</span>
                    @endif
                {{--  <span *ngIf="userDetails !== undefined && userDetails.healthFinance !== null"> {{userDetails.healthFinance.backupphone !== null && userDetails.healthFinance.backupphone !== undefined ? userDetails.healthFinance.backupphone : '_______________________'}} </span> <span *ngIf="userDetails === undefined && userDetails.healthFinance === null"> _______________________ </span>--}}
                </span>
              </span>
            </p>
            @endif
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>

            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >This
      is a durable power of attorney, and the authority of my
      attorney-in-fact shall not terminate if I become disabled or in the
      event of later uncertainty as to whether I am alive or dead. This
      durable power of attorney shall become effective immediately. This
      authority shall not include the ability to revoke or invalidate any
      declaration made in accordance with the Natural Death Act (a “Living
      Will” or similarly-titled document). </span></span></span></span></span>
            </p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
        <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >My
        attorney-in-fact shall have the authority to, on my behalf:</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
        </div>
        @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Health Care Power by {{$tellUsAboutYou['fullname']}}<br>
                Page 1 of 6
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Health Care Power by «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 1 of 6
            </div>
        @endif
    </div>
    <!-- !Page 1 -->

    <!-- Page 2 -->
    <div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding: 40px;">
        <div class="docPageInner"
             style="box-sizing: border-box; height: 890px;">
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >(1)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Consent,
      refuse consent, or withdraw consent to any care, treatment, service
      or procedure to maintain, diagnose or treat a physical or mental
      condition, and to make decisions about organ donation, autopsy and
      disposition of the body;</span></span></span></span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >(2)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Make
      all necessary arrangements at any hospital, psychiatric hospital or
      psychiatric treatment facility, hospice, nursing home or similar
      institution; to employ or discharge health care personnel, to include
      physicians, psychiatrists, psychologists, dentists, nurses,
      therapists or any other person who is licensed, certified or
      otherwise authorized or permitted by the laws of this state to
      administer health care, as the agent shall deem necessary for my
      physical, mental and emotional well being; and,</span></span></span></span></span></p>
            <p  style="text-align:justify;margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0in; line-height: 115%">


            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >(3)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Request,
      receive, and review any verbal or written information regarding my
      personal affairs or physical or mental health, including medical and
      hospital records, to execute any releases that may be required to
      obtain this information, and to consent to the disclosure of this
      information. I hereby waive my patient-physician privileges in
      relation to this Durable Power of Attorney for Health Care Decisions.
      Further, I intend for my agent to be treated as I would be with
      respect to the use and disclosure of any individually-identifiable
      health information or other medical records pursuant to the Health
      Insurance Portability and Accountability Act of 1996 (HIPAA), 42
      U.S.C. 1320(d) and 45 C.F.R. 160-164.</span></span></span></span></span></p>
            <p  style="text-align:justify;text-align:justify;margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0in; line-height: 115%">


            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >In
      exercising the grant of authority set forth above, my agent for
      health care decisions shall:</span></span></span></span></span></p>
            <p  style="text-align:center;margin-bottom: 0.09in; line-height: 115%"><i>(Here
                    may be inserted any special instructions or statement of the
                    principal’s desires to be followed by the agent in exercising the
                    authority granted)</i></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >______________________________________________________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >______________________________________________________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >______________________________________________________________________________</span></span></span></span></span></p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 115%"><i>(Add
                    additional sheets if necessary.)</i></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%">

            </p>
        </div>
        @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Health Care Power by {{$tellUsAboutYou['fullname']}}<br>
                Page 2 of 6
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Health Care Power by «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 2 of 6
            </div>
        @endif

    </div>
    <!-- !Page 2 -->

    <!-- Page 3 -->
    <div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding: 40px;">
        <div class="docPageInner"
             style="box-sizing: border-box; height: 890px;">

            <p  style="text-align:center;margin-left: 0.19in; text-indent: -0.19in; margin-top: 0.13in; margin-bottom: 0.13in; line-height: 115%">
                <b>LIMITATIONS OF AUTHORITY</b></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >(1)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The
      powers of the agent herein shall be limited to the extent set out in
      writing in this durable power of attorney for health care decisions,
      and shall not include the power to revoke or invalidate any
      previously existing declaration made in accordance with the natural
      death act.</span></span></span></span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >(2)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The
      agent shall be prohibited from authorizing consent for the following
      items:</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >________________________________________________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >________________________________________________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >________________________________________________________________________</span></span></span></span></span></p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 115%"><i>(Add
                    additional sheets if necessary.)</i></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >(3)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This
      durable power of attorney for health care decisions shall be subject
      to the additional following limitations:</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >________________________________________________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >________________________________________________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >________________________________________________________________________</span></span></span></span></span></p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 115%"><i>(Add
                    additional sheets if necessary.)</i></p>
            <p  style="text-align:center;margin-left: 0.19in; text-indent: -0.19in; margin-top: 0.13in; margin-bottom: 0.13in; line-height: 115%">
                <b>EFFECTIVE TIME</b></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >This
      power of attorney for health care decisions shall become effective
      upon my disability or incapacity.</span></span></span></span></span></p>
            <p  style="text-align:center;margin-left: 0.19in; text-indent: -0.19in; margin-top: 0.13in; margin-bottom: 0.13in; line-height: 115%">
                <b>REVOCATION</b></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >I
      hereby revoke any previous Durable Power of Attorney for Health Care
      Decisions. This revocation does not extend to any previous General
      Durable Power of Attorney. I reserve the right to revoke this
      document by subsequent writing executed in the same manner as this
      document. This document shall continue in full effect until the
      earlier of the following: 1) my death; or 2) my revocation of this
      document.</span></span></span></span></span></p>
            <p  style="text-align:center;margin-left: 0.19in; text-indent: -0.19in; margin-top: 0.13in; margin-bottom: 0.13in; line-height: 115%">
                <b>EXECUTION</b></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%"><span style="text-decoration: none">Executed
      this </span><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><span style="text-decoration: none">
      day of </span><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><span style="text-decoration: none">,
      </span><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><span style="text-decoration: none">.</span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%"><b>(signature)
                    <span color="#0433ff">_______________________________________</span></b></p>
            <p  style="text-align:justify;margin-bottom: 0.08in; line-height: 115%">
      <span color="#0000ff">
         @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
              <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
          @else
              <b>________________________________</b>
          @endif
      </span>
            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%"><i>This
                    document must be: (1) Witnessed by two individuals of lawful age who
                    are not the agent, not related to the principal by blood, marriage or
                    adoption, not entitled to any portion of the principal’s estate and
                    not financially responsible for the principal’s health care; OR (2)
                    acknowledged by a notary public.</i></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%"><span  style="font-size: 9pt">STATE
      OF Kansas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</span></p>
            <p  style="text-align:justify;text-indent: 0.5in; margin-bottom: 0in; line-height: 115%">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span  style="font-size: 9pt">)
      ss.&nbsp;</span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%"><span  style="font-size: 9pt">COUNTY
      OF ________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%"><span  style="font-size: 9pt">This
      instrument was acknowledged before me on this _____ day of
      ________________, </span>
            </p>
            <p  style="text-align:justify;margin-bottom: 0.08in; line-height: 115%"><span color="#0000ff"><span  style="font-size: 9pt"><span >________________,
      by
            @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                <span style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</span>
            @else
                <span>________________________________</span>
            @endif.</span></span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:justify;text-indent: 0.5in; margin-bottom: 0in; line-height: 115%">
                <span  style="font-size: 9pt">______________________________________</span></p>
            <p  style="text-align:justify;text-indent: 0.5in; margin-bottom: 0in; line-height: 115%">
                <span  style="font-size: 9pt">NOTARY PUBLIC</span></p>
            <p  style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%"><span  style="font-size: 9pt">My
      appointment expires:  _________________</span></p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
        </div>
        @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Health Care Power by {{$tellUsAboutYou['fullname']}}<br>
                Page 3 of 6
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Health Care Power by «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 3 of 6
            </div>
        @endif

    </div>
    <!-- !Page 3 -->


    <!-- Page 4 -->
    <div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding: 40px;">
        <div class="docPageInner"
             style="box-sizing: border-box; height: 890px;">

            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%; page-break-before: always">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >The
      principal,
      @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
          <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
      @else
          <b>________________________________</b>
      @endif,
      has been personally known to me and I believe
      <span>{{isset($tellUsAboutYou) && array_key_exists('gender',$tellUsAboutYou) && !is_null($tellUsAboutYou['gender']) && $tellUsAboutYou['gender'] == 'M' ? 'him' : (isset($tellUsAboutYou) && array_key_exists('gender',$tellUsAboutYou) && !is_null($tellUsAboutYou['gender']) && $tellUsAboutYou['gender'] == 'F' ? 'her' : 'him/her')}}</span>
      to be of sound mind. I did not sign the
      principal’s signature above for or at the direction of the
      principal. I am not related to the principal by blood or marriage,
      entitled to any portion of the estate of the declarant according to
      the laws of intestate succession or under any will of the principal
      or codicil thereto, or directly financially responsible for the
      principal’s medical care.</span></span></span></span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%"><b>WITNESS 1</b>:
                ________________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dated:
                ___________________</p>
            <p style="margin-bottom: 0in; line-height: 115%">[signature]</p>
            <p  style="text-align:left;margin-bottom: 0.06in; line-height: 0.2in">


            </p>
            <p style="margin-bottom: 0in; line-height: 115%">____________________________________</p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >[name
      printed]</span></span></span></span></span></p>
            <p  style="text-align:left;margin-bottom: 0.06in; line-height: 0.2in">


            </p>
            <p style="margin-bottom: 0in; line-height: 115%">____________________________________</p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >[street
      address]</span></span></span></span></span></p>
            <p  style="text-align:justify;margin-left: 1.13in; text-indent: -0.38in; margin-bottom: 0in; line-height: 115%">


            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >____________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >[city,
      state]</span></span></span></span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:left;margin-bottom: 0.06in; line-height: 0.2in">


            </p>
            <p style="margin-bottom: 0in; line-height: 115%"><b>WITNESS 2:
                </b>________________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dated:
                ___________________</p>
            <p style="margin-bottom: 0in; line-height: 115%">[signature]</p>
            <p  style="text-align:left;margin-bottom: 0.06in; line-height: 0.2in">


            </p>
            <p style="margin-bottom: 0in; line-height: 115%">____________________________________</p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >[name
      printed]</span></span></span></span></span></p>
            <p  style="text-align:left;margin-bottom: 0.06in; line-height: 0.2in">


            </p>
            <p style="margin-bottom: 0in; line-height: 115%">____________________________________</p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >[street
      address]</span></span></span></span></span></p>
            <p  style="text-align:justify;margin-left: 1.13in; text-indent: -0.38in; margin-bottom: 0in; line-height: 115%">


            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >____________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >[city,
      state]</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
        </div>
        @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Health Care Power by {{$tellUsAboutYou['fullname']}}<br>
                Page 4 of 6
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Health Care Power by «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 4 of 6
            </div>
        @endif

    </div>
    <!-- !Page 4 -->

    <!-- Page 5 -->
    <div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding: 40px;">
        <div class="docPageInner"
             style="box-sizing: border-box; height: 890px;">

            <p  style="text-align:center;margin-bottom: 0in; line-height: 0.23in; page-break-before: always">
                <span  style="font-size: 13pt"><b>KANSAS DECLARATION</b></span></p>
            <p  style="margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%"><span style="text-decoration: none">DECLARATION
      made this </span><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><span style="text-decoration: none">
      day of </span><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><span style="text-decoration: none">,
      </span><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><span style="text-decoration: none">.</span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >I,
          @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
              <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
          @else
              <b>________________________________</b>
          @endif,
      being of sound mind, willfully and voluntarily make known my desire
      that my dying shall not be artificially prolonged under the
      circumstances set forth below, and do hereby declare:</span></span></span></span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >If
      at any time I should have an incurable injury, disease, or illness
      certified to be a terminal condition by two physicians who have
      personally examined me, one of whom shall be my attending physician,
      and the physicians have determined that my death will occur whether
      or not life-sustaining procedures are utilized and where the
      application of life-sustaining procedures would serve only to
      artificially prolong the dying process, I direct that such procedures
      be withheld or withdrawn, and that I be permitted to die naturally
      with only the administration of medication or the performance of any
      medical procedure deemed necessary to provide me with comfort care.</span></span></span></span></span></p>
            <p  style="text-align:justify;margin-left: 0.38in; margin-bottom: 0in; line-height: 115%">


            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >In
      the absence of my ability to give directions regarding the use of
      such life-sustaining procedures, it is my intention that this
      declaration shall be honored by my family and physician(s) as the
      final expression of my legal right to refuse medical or surgical
      treatment and accept the consequences from such refusal.</span></span></span></span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >I
      understand the full import of this declaration and I am emotionally
      and mentally competent to make this declaration.</span></span></span></span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >Other
      directions:</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >________________________________________________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >________________________________________________________________________</span></span></span></span></span></p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 115%"><i>(Add
                    additional sheets if necessary.)</i></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >_______________________________________</span></span></span></span></span></p>
            <p  style="text-align:justify;margin-bottom: 0.08in; line-height: 115%">
      <span color="#0000ff">
         @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
              <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
          @else
              <b>________________________________</b>
          @endif
      </span>
            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%"><span  style="font-size: 9pt">STATE
      OF Kansas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</span></p>
            <p  style="text-align:justify;text-indent: 0.5in; margin-bottom: 0in; line-height: 115%">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span  style="font-size: 9pt">)
      ss.&nbsp;</span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%"><span  style="font-size: 9pt">COUNTY
      OF ________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%"><span  style="font-size: 9pt">This
      instrument was acknowledged before me on this _____ day of
      ________________, </span>
            </p>
            <p style="margin-bottom: 0in; line-height: 115%"><span color="#0000ff"><span  style="font-size: 9pt"><span >________________,
      by </span>
        @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <span style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</span>
        @else
            <span>________________________________</span>
        @endif.
    </span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:justify;text-indent: 0.5in; margin-bottom: 0in; line-height: 115%">
                <span  style="font-size: 9pt">______________________________________</span></p>
            <p  style="text-align:justify;text-indent: 0.5in; margin-bottom: 0in; line-height: 115%">
                <span  style="font-size: 9pt">NOTARY PUBLIC</span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%"><span  style="font-size: 9pt">My
      appointment expires:  _________________
      &nbsp;</span></p>
        </div>
        @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Health Care Power by {{$tellUsAboutYou['fullname']}}<br>
                Page 5 of 6
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Health Care Power by «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 5 of 6
            </div>
        @endif

    </div>
    <!-- !Page 5 -->

    <!-- Page 6 -->
    <div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding: 40px;">
        <div class="docPageInner"
             style="box-sizing: border-box; height: 890px;">


            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >The
      declarant has been personally known to me and I believe
     <span>{{isset($tellUsAboutYou) && array_key_exists('gender',$tellUsAboutYou) && !is_null($tellUsAboutYou['gender']) && $tellUsAboutYou['gender'] == 'M' ? 'him' : (isset($tellUsAboutYou) && array_key_exists('gender',$tellUsAboutYou) && !is_null($tellUsAboutYou['gender']) && $tellUsAboutYou['gender'] == 'F' ? 'her' : 'him/her')}}</span>
       to be of sound mind. I did not sign the
      declarant’s signature above for or at the direction of the
      declarant. I am not related to the declarant by blood or marriage,
      entitled to any portion of the estate of the declarant according to
      the laws of intestate succession or under any will of declarant or
      codicil thereto, or directly financially responsible for the
      declarant’s medical care.</span></span></span></span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%"><b>WITNESS 1</b>:
                ________________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dated:
                ___________________</p>
            <p style="margin-bottom: 0in; line-height: 115%">[signature]</p>
            <p  style="text-align:left;margin-bottom: 0.06in; line-height: 0.2in">


            </p>
            <p style="margin-bottom: 0in; line-height: 115%">____________________________________</p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >[name
      printed]</span></span></span></span></span></p>
            <p  style="text-align:left;margin-bottom: 0.06in; line-height: 0.2in">


            </p>
            <p style="margin-bottom: 0in; line-height: 115%">____________________________________</p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >[street
      address]</span></span></span></span></span></p>
            <p  style="text-align:justify;margin-left: 1.13in; text-indent: -0.38in; margin-bottom: 0in; line-height: 115%">


            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >____________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >[city,
      state]</span></span></span></span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:left;margin-bottom: 0.06in; line-height: 0.2in">


            </p>
            <p style="margin-bottom: 0in; line-height: 115%"><b>WITNESS 2:
                </b>________________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dated:
                ___________________</p>
            <p style="margin-bottom: 0in; line-height: 115%">[signature]</p>
            <p  style="text-align:left;margin-bottom: 0.06in; line-height: 0.2in">


            </p>
            <p style="margin-bottom: 0in; line-height: 115%">____________________________________</p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >[name
      printed]</span></span></span></span></span></p>
            <p  style="text-align:left;margin-bottom: 0.06in; line-height: 0.2in">


            </p>
            <p style="margin-bottom: 0in; line-height: 115%">____________________________________</p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >[street
      address]</span></span></span></span></span></p>
            <p  style="text-align:justify;margin-left: 1.13in; text-indent: -0.38in; margin-bottom: 0in; line-height: 115%">


            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >____________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span >[city,
      state]</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; line-height: 115%">

            </p>
        </div>
        @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Health Care Power by {{$tellUsAboutYou['fullname']}}<br>
                Page 6 of 6
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Health Care Power by «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 6 of 6
            </div>
        @endif

    </div>
    <!-- !Page 6 -->


</div>

</body>
</html>
