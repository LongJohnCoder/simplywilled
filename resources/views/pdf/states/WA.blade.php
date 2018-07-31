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
      Advance Directive of <br>{{ucwords(strtolower($tellUsAboutYou['fullname']))}}<br>
    </div>
  </div>
<div style="text-align: justify">
    <div>
        <div>
            <p style=" text-align: center;"><span  style="font-size: 13pt"><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span  style="font-size: 16pt"><b>W</b></span></span></span><span  style="font-size: 16pt"><b>ASHINGTON
        ADVANCE DIRECTIVE</b></span></span></p>

            <p style="margin-bottom: 0.13in;   text-align: center;"><span  style="font-size: 13pt"><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span  style="font-size: 14pt"><b>PART
        I:  D</b></span></span></span><span  style="font-size: 14pt"><b>URABLE
        </b></span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span  style="font-size: 14pt"><b>P</b></span></span></span><span  style="font-size: 14pt"><b>OWER
        OF </b></span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span  style="font-size: 14pt"><b>A</b></span></span></span><span  style="font-size: 14pt"><b>TTORNEY</b></span><span  style="font-size: 14pt">
        </span><span  style="font-size: 14pt"><b>FOR </b></span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span  style="font-size: 14pt"><b>H</b></span></span></span><span  style="font-size: 14pt"><b>EALTH
        </b></span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span  style="font-size: 14pt"><b>C</b></span></span></span><span  style="font-size: 14pt"><b>ARE</b></span></span></p><br>
            <p  style="margin-bottom: 0in;  "><span size="2" style=" "><span  style="font-size: 12pt">I
        understand that my wishes as expressed in my living will may not
        cover all possible aspects of my care if I become incapacitated or
        that it may not be at hand or accepted by my health care providers.
        Consequently, there may be a need for someone to accept or refuse
        medical intervention on my behalf, in consultation with my physician.</span></span></p>

            <p class="western"  style="margin-bottom: 0in;  ">
                Therefore, <span >I, </span>

        <span>
                @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                    <b style="text-transform: capitalize">{{ucwords(strtoupper($tellUsAboutYou['fullname']))}},</b>
                @else
                    <b>________________________________,</b>
                @endif

        </span>

                <span> of </span>

                @if(isset($tellUsAboutYou) && array_key_exists('address',$tellUsAboutYou) && !is_null($tellUsAboutYou['address']))
                    <span style="font-family:'Times New Roman, serif'" >{{ucwords(strtoupper($tellUsAboutYou['address']))}},</span>
                @else
                    <span>_________________________________________________________________
                    ___________________________________________________________________________________________
                    _________________________________________________________________________________,</span>
                @endif

                @if(isset($tellUsAboutYou) && array_key_exists('city',$tellUsAboutYou) && !is_null($tellUsAboutYou['city']))
                    <span style="text-transform: capitalize">{{ucwords(strtoupper($tellUsAboutYou['city']))}},</span>
                @else
                    <span style="text-transform: capitalize">(city)_____________,</span>
                @endif

                <span > </span>

                @if(isset($tellUsAboutYou) && array_key_exists('state',$tellUsAboutYou) && !is_null($tellUsAboutYou['state']))
                    <span style="text-transform: capitalize">{{ucwords(strtoupper($tellUsAboutYou['state']))}}</span>
                @else
                    <span style="text-transform: capitalize">(state)_____________</span>
                @endif

                @if(isset($tellUsAboutYou) && array_key_exists('zip',$tellUsAboutYou) && !is_null($tellUsAboutYou['zip']))
                    <span style="text-transform: capitalize">{{$tellUsAboutYou['zip']}},</span>
                @else
                    <span style="text-transform: capitalize">(zip)_____________,</span>
                @endif

                <span >as principal, designate and appoint my </span>

                {{--<span style="font-family:'Times New Roman, serif'" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.relation == 'Other'">{{userDetails.healthFinance.relationOther}}</span>
                <span style="font-family:'Times New Roman, serif'" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.relation != 'Other'">{{userDetails.healthFinance.relation}}</span>
                <span *ngIf="userDetails === undefined && userDetails.healthFinance === null">______________</span>

                <span >, </span>

                <span *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.fullname.length > 0" style="font-family:'Times New Roman, serif'">{{userDetails.healthFinance.fullname}}</span>
                <span *ngIf="userDetails === undefined && userDetails.healthFinance === null" style="font-family:'Times New Roman, serif'">_____________________________</span>

                <span>, of </span>

                <span style="font-family:'Times New Roman, serif'" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.address !== null">{{userDetails.healthFinance.address}}, </span>
        <span *ngIf="userDetails === undefined && userDetails.healthFinance === null">_________________________________________________________________
          _______________________________________________________________________________,
        </span>

                <span >, </span>

                <span style="font-family:'Times New Roman, serif'" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.city !== null">{{userDetails.healthFinance.city}}, </span>
                <span *ngIf="userDetails === undefined && userDetails.healthFinance === null">(city)__________________, </span>

                <span style="font-family:'Times New Roman, serif'" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.state !== null">{{userDetails.healthFinance.state}}, </span>
                <span *ngIf="userDetails === undefined && userDetails.healthFinance === null">(state)__________________, </span>

                <span style="font-family:'Times New Roman, serif'" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.zip !== null">{{userDetails.healthFinance.zip}}, </span>
                <span *ngIf="userDetails === undefined && userDetails.healthFinance === null">(zip)__________________, </span>

                <span> (Tel: </span>

                <span style="font-family:'Times New Roman, serif'" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.phone !== null">{{userDetails.healthFinance.phone}}</span>
                <span *ngIf="userDetails === undefined && userDetails.healthFinance === null">__________________</span>

        <span >),--}}
                @if(isset($healthFinance) && array_key_exists('relation',$healthFinance) && !is_null($healthFinance['relation'])  && $healthFinance['relation'] == 'Other')
                    <span style="font-family:'Times New Roman, serif'">{{$healthFinance['relationOther']}},</span>
                @elseif (isset($healthFinance) && array_key_exists('relation',$healthFinance) && !is_null($healthFinance['relation']) && $healthFinance['relation'] != 'Other')
                    <span style="font-family:'Times New Roman, serif'">{{$healthFinance['relation']}},</span>
                @else
                    <span>(relation)______________,</span>
                @endif


                @if(isset($healthFinance) && array_key_exists('fullname',$healthFinance) && !is_null($healthFinance['fullname']))
                    <span style="font-family:'Times New Roman, serif'">{{ucwords(strtolower($healthFinance['fullname']))}},</span>
                @else
                    <span style="font-family:'Times New Roman, serif'">_____________________________,</span>
                @endif

                <span > of </span>

                @if(isset($healthFinance) && array_key_exists('address',$healthFinance) && !is_null($healthFinance['address']))
                    <span style="font-family:'Times New Roman, serif'">{{$healthFinance['address']}}, </span>
                @else
                    <span>_________________________________________________________________
                        _______________________________________________________________________________,
                    </span>
                @endif


                @if(isset($healthFinance) && array_key_exists('city',$healthFinance) && !is_null($healthFinance['city']))
                    <span style="font-family:'Times New Roman, serif'">{{$healthFinance['city']}}, </span>
                @else
                    <span>(city)__________________, </span>
                @endif

                @if(isset($healthFinance) && array_key_exists('state',$healthFinance) && !is_null($healthFinance['state']))
                    <span style="font-family:'Times New Roman, serif'">{{$healthFinance['state']}}</span>
                @else
                    <span>(state)__________________</span>
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
        as my attorney-in-fact for health care decisions to the same extent
        that I could make such decisions for myself if I were capable of
        doing so, as recognized by RCW 11.125.010.</span><span >&nbsp;</span></p>

            <p  style="margin-bottom: 0in;  ">
          <span>
            <span size="2" style=" ">
              <span ><span  style="font-size: 12pt"></span></span>

              </span>
            </span>
            </p>

            @if(isset($healthFinance) && array_key_exists('anyBackupAgent',$healthFinance) && !is_null($healthFinance['anyBackupAgent']) && $healthFinance['anyBackupAgent'] == true)
            <div>
                <p  style="margin-bottom: 0in;  "><span size="2" style=" "><span  style="font-size: 12pt">If
                my primary attorneys-in-fact is unable, unavailable, or unwilling to
                serve, then I designate </span><span ><span  style="font-size: 12pt">my
                </span></span>


                @if(isset($healthFinance) && array_key_exists('backupRelation',$healthFinance) && !is_null($healthFinance['backupRelation']) && $healthFinance['backupRelation'] == 'Other')
                    <span>{{$healthFinance['backupRelation']}},</span>
                @elseif(isset($healthFinance) && array_key_exists('backupRelation',$healthFinance) && !is_null($healthFinance['backupRelation']) && $healthFinance['backupRelation'] != 'Other')
                    <span>{{$healthFinance['backupRelation']}},</span>
                @else
                    <span>(relation)______________,</span>
                @endif


                @if(isset($healthFinance) && array_key_exists('backupFullname',$healthFinance) && !is_null($healthFinance['backupFullname']))
                    <span style="font-family:'Times New Roman, serif'">{{ucwords(strtolower($healthFinance['backupFullname']))}},</span>
                @else
                    <span style="font-family:'Times New Roman, serif'">_____________________________,</span>
                @endif
                <span > of </span>

                @if(isset($healthFinance) && array_key_exists('backupAddress',$healthFinance) && !is_null($healthFinance['backupAddress']))
                    <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupAddress']}}, </span>
                @else
                    <span>_________________________________________________________________
                    _______________________________________________________________________________,
                    </span>
                @endif

                @if(isset($healthFinance) && array_key_exists('backupCity',$healthFinance) && !is_null($healthFinance['backupCity']))
                    <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupCity']}}, </span>
                @else
                    <span>(city)__________________, </span>
                @endif

                @if(isset($healthFinance) && array_key_exists('backupState',$healthFinance) && !is_null($healthFinance['backupState']))
                    <span style="font-family:'Times New Roman, serif'" >{{$healthFinance['backupState']}}</span>
                @else
                    <span>(state)__________________</span>
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

                <span  style="font-size: 12pt">as my alternate
                attorney-in-fact for health care decisions as authorized in this
                document.</span><span  style="font-size: 12pt">&nbsp;</span></span></span></p>

            </div>
            @endif
            {{--<p  style="margin-bottom: 0in;  "><span ><span size="2" style=" "><span ><span  style="font-size: 12pt"></span></span><span  style="font-size: 12pt">END
        IF</span><span ><span  style="font-size: 12pt"></span></span></span></span></p>--}}
            <p  style="margin-bottom: 0in;  "><span size="2" style=" "><span  style="font-size: 12pt">1.&nbsp;&nbsp;&nbsp;&nbsp;</span><span  style="font-size: 12pt">	</span><span  style="font-size: 12pt">This
        Power of Attorney shall take effect upon my incapacity to make my own
        health care decisions, as determined by my treating physician and one
        other physician, and shall continue as long as the incapacity lasts
        or until I revoke it, whichever happens first.</span></span></p>

            <p class="western"  style="margin-bottom: 0in;  ">
                2.&nbsp;&nbsp;&nbsp;&nbsp;My attorney-in-fact shall have all the powers necessary to make
                decisions about my health care on my behalf.  These powers shall
                include, but not be limited to, the power to obtain medical records
                protected by applicable federal and state regulations (including
                HIPAA), the power to have me admitted to a health care facility, and
                the power to order the withholding or withdrawal of life-sustaining
                treatment and artificially provided nutrition and hydration as
                directed by my Living Will, if any. The existence of this Durable
                Power of Attorney for Health Care shall have no effect upon the
                validity of any other Power of Attorney for other purposes that I
                have executed or may execute in the future.
            </p>

            <p class="western" style="margin-bottom: 0in;  ">3.&nbsp;&nbsp;&nbsp;&nbsp;
                My attorney-in-fact’s powers shall survive my death to the extent
                that my attorney-in-fact shall have all the powers necessary to
                direct the donation of my organs and the final disposition of my
                remains.
            </p>

            <p  style="margin-bottom: 0in;  "><span size="2" style=" "><span  style="font-size: 12pt">4.&nbsp;&nbsp;&nbsp;&nbsp;</span><span  style="font-size: 12pt">	</span><span  style="font-size: 12pt">In
        the event that a proceeding is initiated to appoint a guardian of my
        person under RCW 11.88, I nominate the person designated as my first
        choice (on page 1) to serve as my guardian. My second choice (on page
        1) will serve as my guardian if the first person is unable or
        unwilling.</span></span></p>
        </div>

    </div>


    <div >
        <div >
            <p class="western" style="margin-bottom: 0in;  ">5.
                When making health care decisions for me, my attorney-in-fact should
                think about what action would be consistent with past conversations
                we have had, my treatment preferences as expressed in this or any
                other clear expression of my desires, my religious and other beliefs
                and values, and how I have handled medical and other important issues
                in the past. If what I would decide is still unclear, then my
                attorney-in-fact should make decisions for me that my
                attorney-in-fact believes are in my best interest, considering the
                benefits, burdens, and risks of my current circumstances and
                treatment options.</p>

            <p  style="margin-bottom: 0.09in; page-break-before: justify"><span size="2" style=" "><span  style="font-size: 12pt">6.</span><span  style="font-size: 12pt">	</span><span  style="font-size: 12pt">I
      make the following additional instructions regarding my care:</span></span></p>
            <p  style="margin-left: 0.38in; margin-bottom: 0.09in;  ">
                <span size="2" style=" "><span  style="font-size: 12pt">________________________________________________________________________</span></span></p>
            <p  style="margin-left: 0.38in; margin-bottom: 0.09in;  ">
                <span size="2" style=" "><span  style="font-size: 12pt">________________________________________________________________________</span></span></p>
            <p  style="margin-left: 0.38in; margin-bottom: 0in;  ">
                <span size="2" style=" "><span  style="font-size: 12pt">________________________________________________________________________</span></span></p>
            <p align="left" style="margin-left: 0.38in; margin-bottom: 0in;  ">
      <span size="1" style="font-size: 7pt"><span size="2" style="font-size: 10pt"><i>(Add
      additional sheets if needed.)</i></span></span></p>

            <p  style="margin-bottom: 0in;  "><span size="2" style=" "><span  style="font-size: 12pt">7.</span><span  style="font-size: 12pt">	</span><span  style="font-size: 12pt">I
      revoke any prior Advance Health Care Directive and any prior Durable
      Power of Attorney for Health Care. The existence of this Durable
      Power of Attorney for Health Care shall have no effect upon the
      validity of any other Power of Attorney for other purposes that I
      have executed or may execute in the future.</span></span></p>

            <p  style="margin-bottom: 0in;  "><span size="2" style=" "><span  style="font-size: 12pt">7.</span><span  style="font-size: 12pt">	</span><span  style="font-size: 12pt">Persons
      dealing with my attorney-in-fact may rely fully on a photocopy of
      this document as though the photocopy was an original.</span><span  style="font-size: 12pt">&nbsp;</span></span></p>
              <br>

            <p  style="margin-bottom: 0in;  "><span size="2" style=" "><span  style="font-size: 12pt"><b>By
      signing this document, I indicate that I understand the purpose and
      effect of this Durable Power of Attorney for Health Care. I am
      competent to execute this document.</b></span></span></p>

            <p  style="margin-bottom: 0in;  "><span size="2" style=" "><span  style="font-size: 12pt">Date:
      </span><span  style="font-size: 12pt">_________________</span><span  style="font-size: 12pt">	</span></span></p>
      <br>
            <p  style="margin-bottom: 0in;  "><span size="2" style=" "><span  style="font-size: 12pt">Signature:
      </span><span  style="font-size: 12pt">_________________________________</span></span></p>
            <p class="western"  style="margin-bottom: 0.08in;   orphans: 0; widows: 0">


      <span >
            @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
              <b style="text-transform: capitalize">{{strtoupper(strtolower($tellUsAboutYou['fullname']))}}</b>
              @else
                  <b>________________________________</b>
              @endif

      </span>

            </p>
        </div>

    </div>


    <div >
        <div>
            <p align="center" style="margin-bottom: 0in;   page-break-before: always">
        <span  style="font-size: 13pt"><span  style="font-size: 14pt"><b>PART
        II: DECLARATION</b></span></span></p>
            <p  style="margin-top: 0.19in; margin-bottom: 0in;  ">
        <span ><span size="2" style=" "><span ><span  style="font-size: 12pt">DIRECTIVE
        made this </span></span><span ><span  style="font-size: 12pt">________</span></span><span ><span  style="font-size: 12pt">
        day of </span></span><span ><span  style="font-size: 12pt">_______________________</span></span><span ><span  style="font-size: 12pt">,
        </span></span><span ><span  style="font-size: 12pt">____________</span></span><span ><span  style="font-size: 12pt">.</span></span></span></span></p>

            <p class="western"  style="margin-bottom: 0.08in;   orphans: 0; widows: 0">
                I,

        <span>
              @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                <b style="text-transform: capitalize">{{strtoupper(strtolower($tellUsAboutYou['fullname']))}},</b>
            @else
                <b>________________________________,</b>
            @endif
           {{-- <b style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null">{{userDetails.tellUsAboutYou.fullname}}</b>
            <b *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null">(fullname)________________________________</b>--}}
        </span>
                of

                @if(isset($tellUsAboutYou) && array_key_exists('address',$tellUsAboutYou) && !is_null($tellUsAboutYou['address']))
                    <span style="font-family:'Times New Roman, serif'" >{{$tellUsAboutYou['address']}},</span>
                @else
                    <span>_________________________________________________________________
                    ___________________________________________________________________________________________
                    _________________________________________________________________________________,</span>
                @endif

                @if(isset($tellUsAboutYou) && array_key_exists('city',$tellUsAboutYou) && !is_null($tellUsAboutYou['city']))
                    <span style="text-transform: capitalize">{{$tellUsAboutYou['city']}},</span>
                @else
                    <span style="text-transform: capitalize">(city)_____________,</span>
                @endif
                <span > </span>

                @if(isset($tellUsAboutYou) && array_key_exists('state',$tellUsAboutYou) && !is_null($tellUsAboutYou['state']))
                    <span style="text-transform: capitalize">{{$tellUsAboutYou['state']}}</span>
                @else
                    <span style="text-transform: capitalize">(state)_____________</span>
                @endif
                @if(isset($tellUsAboutYou) && array_key_exists('zip',$tellUsAboutYou) && !is_null($tellUsAboutYou['zip']))
                    <span style="text-transform: capitalize">{{$tellUsAboutYou['zip']}},</span>
                @else
                    <span style="text-transform: capitalize">(zip)_____________,</span>
                @endif
                {{--<span *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.address !== null" style="font-family:'Times New Roman, serif'" >{{userDetails.tellUsAboutYou.address}}, </span>
        <span *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null">_________________________________________________________________
          ___________________________________________________________________________________________
        _________________________________________________________________________________, </span>

                <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.city !== null" style="font-family:'Times New Roman, serif'">{{userDetails.tellUsAboutYou.city}} ,</span>
                <span style="text-transform: capitalize" *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null">(city)_____________ ,</span>

                <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.state !== null" style="font-family:'Times New Roman, serif'">{{userDetails.tellUsAboutYou.state}}</span>&nbsp;
                <span style="text-transform: capitalize" *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null" style="font-family:'Times New Roman, serif'">(state)_____________________</span>&nbsp;

                <span style="font-family:'Times New Roman, serif'" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.zip !== null">{{userDetails.healthFinance.zip}}, </span>
                <span *ngIf="userDetails === undefined && userDetails.healthFinance === null">(zip)__________________, </span>--}}

                having the capacity to make health care decisions, willfully, and
                voluntarily make known my desire that my dying shall not be
                artificially prolonged under the circumstances set forth below, and
                do here by declare that:</p>

            <p  style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in;  ">
        <span size="2" style=" "><span  style="font-size: 12pt">(a)</span><span  style="font-size: 12pt">	</span><span  style="font-size: 12pt">If
        at any time I should be diagnosed in writing to be in a terminal
        condition by the attending physician, or in a permanent unconscious
        condition by two physicians, and where the application of
        life-sustaining treatment would serve only to artificially prolong
        the process of my dying, I direct that such treatment be withheld or
        withdrawn, and that I be permitted to die naturally. I understand by
        using this form that a terminal condition means an incurable and
        irreversible condition caused by injury, disease, or illness, that
        would within reasonable medical judgment cause death within a
        reasonable period of time in accordance with accepted medical
        standards, and where the application of life-sustaining treatment
        would serve only to prolong the process of dying. I further
        understand in using this form that a permanent unconscious condition
        means an incurable and irreversible condition in which I am medically
        assessed within reasonable medical judgment as having no reasonable
        probability of recovery from an irreversible coma or a persistent
        vegetative state.</span></span></p>

            <p  style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in;  ">
        <span size="2" style=" "><span  style="font-size: 12pt">(b)</span><span  style="font-size: 12pt">	</span><span  style="font-size: 12pt">In
        the absence of my ability to give directions regarding the use of
        such life-sustaining treatment, it is my intention that this
        directive shall be honored by my family and physician(s) as the final
        expression of my legal right to refuse medical or surgical treatment
        and I accept the consequences of such refusal. If another person is
        appointed to make these decisions for me, whether through a durable
        power of attorney or otherwise, I request that the person be guided
        by this directive and any other clear expressions of my desires.</span></span></p>

            <p  style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in; line-height: 200%">
        <span size="2" style=" "><span  style="font-size: 12pt">(c)</span><span  style="font-size: 12pt">	</span><span  style="font-size: 12pt">If
        I am diagnosed to be in a terminal condition or in a permanent
        unconscious condition: (</span><span  style="font-size: 12pt"><i>INITIAL
        one</i></span><span  style="font-size: 12pt">)</span></span></p>
            <p  style="margin-left: 1.13in; text-indent: -0.38in; margin-bottom: 0in; line-height: 200%">
        <span size="2" style=" "><span  style="font-size: 12pt">_______</span>	<span  style="font-size: 12pt">I
        DO want to have artificially provided nutrition and hydration.</span></span></p>
            <p  style="margin-left: 1.13in; text-indent: -0.38in; margin-bottom: 0in; line-height: 200%">
        <span size="2" style=" "><span  style="font-size: 12pt">_______</span>	<span  style="font-size: 12pt">I
        DO NOT want to have artificially provided nutrition and hydration.</span></span></p>

            <p  style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0.17in;  ">
        <span size="2" style=" "><span  style="font-size: 12pt">(d)</span><span  style="font-size: 12pt">	</span><span  style="font-size: 12pt">If
        I have been diagnosed as pregnant and that diagnosis is known to my
        physician, this directive shall have no force or effect during the
        course of my pregnancy.</span></span></p>
        </div>

    </div>


    <div>
        <div>
            <p  style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in;  ">
        <span size="2" style=" "><span  style="font-size: 12pt">(e)</span><span  style="font-size: 12pt">	I</span><span  style="font-size: 12pt">
        understand that before I sign this directive, I can add to or delete
        from or otherwise change the wording of this directive and that I may
        add to or delete from this directive at any time and that any changes
        shall be consistent with Washington state law or federal
        constitutional law to be legally valid.</span></span></p>

            <p  style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in;  ">
        <span size="2" style=" "><span  style="font-size: 12pt">(f)</span><span  style="font-size: 12pt">	</span><span  style="font-size: 12pt">It
        is my wish that every part of this directive be fully implemented. If
        for any reason any part is held invalid it is my wish that the
        remainder of my directive be implemented.</span></span></p>

            <p  style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0.09in; line-height: 150%">
        <span size="2" style=" "><span  style="font-size: 12pt">(g)</span><span  style="font-size: 12pt">	</span><span  style="font-size: 12pt">I
        make the following additional instructions regarding my care:</span></span></p>
            <p  style="margin-left: 0.75in; margin-bottom: 0.09in; line-height: 150%">
                <span size="2" style=" "><span  style="font-size: 12pt">__________________________________________________________________</span></span></p>
            <p  style="margin-left: 0.75in; margin-bottom: 0.09in; line-height: 150%">
                <span size="2" style=" "><span  style="font-size: 12pt">__________________________________________________________________</span></span></p>
            <p  style="margin-left: 0.75in; margin-bottom: 0in; line-height: 150%">
                <span size="2" style=" "><span  style="font-size: 12pt">__________________________________________________________________</span></span></p>
            <p  style="margin-left: 0.75in; margin-bottom: 0.09in; line-height: 150%">
                <span size="2" style=" "><span  style="font-size: 12pt">__________________________________________________________________</span></span></p>
            <p  style="margin-left: 0.75in; margin-bottom: 0.09in; line-height: 150%">
                <span size="2" style=" "><span  style="font-size: 12pt">__________________________________________________________________</span></span></p>
            <p  style="margin-left: 0.75in; margin-bottom: 0in; line-height: 150%">
                <span size="2" style=" "><span  style="font-size: 12pt">__________________________________________________________________</span></span></p>
            <p  style="margin-left: 0.75in; margin-bottom: 0.09in; line-height: 150%">
                <span size="2" style=" "><span  style="font-size: 12pt">__________________________________________________________________</span></span></p>
            <p  style="margin-left: 0.75in; margin-bottom: 0.09in; line-height: 150%">
                <span size="2" style=" "><span  style="font-size: 12pt">__________________________________________________________________</span></span></p>
            <p  style="margin-left: 0.75in; margin-bottom: 0in; line-height: 150%">
                <span size="2" style=" "><span  style="font-size: 12pt">__________________________________________________________________</span></span></p>
            <p align="left" style="margin-left: 0.75in; margin-bottom: 0in;  ">
        <span size="1" style="font-size: 7pt"><span  style="font-size: 12pt"><i>(Add
        additional sheets if needed.)</i></span></span></p>
        </div>

    </div>


    <div >
        <div >
            <p align="center" style="margin-bottom: 0in;   page-break-before: always">
        <span size="2" style=" "><span  style="font-size: 14pt"><b>PART
        III: ORGAN DONATION</b></span></span></p>

            <p class="western"  style="margin-bottom: 0in;  ">
                Initial the line next to the statement below that best reflects your
                wishes. You do not have to initial any of the statements. If you do
                not initial any of the statements, your attorney-in-fact, other
                agent, or your family, may have the authority to make a gift of all
                or part of your body.
            </p>

            <p class="western"  style="margin-left: 0.5in; margin-bottom: 0in;  ">
                _____ I do not want to make an organ or tissue donation and I do not
                want my
            </p>
            <p class="western"  style="margin-bottom: 0in;  ">
                attorney-in-fact, other agent, or family to do so.
            </p>

            <p class="western"  style="text-indent: 0.5in; margin-bottom: 0in;  ">
                _____ I have already signed a written agreement or donor card
                regarding organ
            </p>
            <p class="western"  style="margin-left: 0.5in; text-indent: 0.5in; margin-bottom: 0in;  ">
                and tissue donation with the following individual or institution:
            </p>

            <p class="western"  style="margin-left: 1in; text-indent: 0.5in; margin-bottom: 0in;  ">
                Name of individual/institution:_____________________
            </p>

            <p class="western"  style="margin-left: 0.5in; margin-bottom: 0in;  ">
                _____ Pursuant to Washington State law, I hereby give, effective on
                my death
            </p>

            <p class="western"  style="margin-left: 1in; text-indent: 0.5in; margin-bottom: 0in;  ">
                <i>(INITIAL one): </i>
            </p>

            <p class="western"  style="margin-left: 1.5in; margin-bottom: 0in; ">
                _____ Any needed organ or parts.
            </p>
            <p class="western"  style="margin-left: 1.5in; margin-bottom: 0in; ">
                _____ The following part or organs listed below:</p>
            <p  style="margin-left: 2in; margin-bottom: 0in; line-height: 200%">
                <span size="2" style=" "><span  style="font-size: 12pt"><u>																																</u></span></span></p>
            <p class="western" style="margin-left: 2.5in; margin-bottom: 0in;  ">
                For the following purposes:</p>

            <p class="western" style="margin-left: 2.5in; margin-bottom: 0in;  ">
                (<i>INITIAL one</i>)</p>

            <p class="western" style="margin-left: 2.5in; margin-bottom: 0in; ">
                _____ Any legally authorized purpose.
            </p>
            <p class="western" style="margin-left: 2.5in; margin-bottom: 0in; ">
                _____ Transplant or therapeutic purposes only.
            </p>

        </div>

    </div>


    <div>
        <div> <br>
            <p align="center" style="margin-bottom: 0in;">
        <span size="2" style=" "><span  style="font-size: 14pt"><b>PART
        IV:  EXECUTION</b></span></span></p>

            <p class="western"  style="margin-bottom: 0in;  ">
                I understand the full import of this directive and I am emotionally
                and mentally capable to make the health care decisions contained in
                this directive. I also understand that I can change or revoke all or
                part of this directive at any time</p>

            <p  style="margin-bottom: 0in;  "><span size="2" style=" "><span  style="font-size: 12pt">DATE:
        </span><span  style="font-size: 12pt">_________________</span><span  style="font-size: 12pt">	</span></span></p>
            <br>
            <p  style="margin-bottom: 0in;  "><span size="2" style=" "><span  style="font-size: 12pt">___________________________________</span></span></p>
            <p class="western"  style="margin-bottom: 0.08in;   orphans: 0; widows: 0">
                <b></b>

        <span >
              @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                <b style="text-transform: capitalize">{{strtoupper(strtolower($tellUsAboutYou['fullname']))}},</b>
            @else
                <b>________________________________,</b>
            @endif
            {{--<b style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null">{{userDetails.tellUsAboutYou.fullname}}</b>
            <b *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null">(fullname)________________________________</b>--}}
        </span>

            </p>

            <p  style="margin-bottom: 0in;  ">
          <span >
            <span size="2" style=" ">
              <span ><span  style="font-size: 12pt"></span></span>

             {{-- <span *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.address !== null" style="font-family:'Times New Roman, serif'" >{{userDetails.tellUsAboutYou.address}}</span>
              <span *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null">_________________________________________________________________
                ___________________________________________________________________________________________
              _________________________________________________________________________________</span>--}}
                @if(isset($tellUsAboutYou) && array_key_exists('address',$tellUsAboutYou) && !is_null($tellUsAboutYou['address']))
                    <span style="font-family:'Times New Roman, serif'" >{{$tellUsAboutYou['address']}},</span>
                @else
                    <span>_________________________________________________________________
                    ___________________________________________________________________________________________
                    _________________________________________________________________________________,</span>
                @endif

              <span ><span  style="font-size: 12pt"></span></span></span></span></p>
            <p  style="margin-bottom: 0in;  "></p>

            <p  style="margin-bottom: 0in;  "><span ><span size="2" style=" "><span >

          <span  style="font-size: 12pt"></span></span>

          {{--<span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.city !== null" style="font-family:'Times New Roman, serif'">{{userDetails.tellUsAboutYou.city}}</span>&nbsp;
          <span style="text-transform: capitalize" *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null" style="font-family:'Times New Roman, serif'">(city)_____________________</span>--}}
            @if(isset($tellUsAboutYou) && array_key_exists('city',$tellUsAboutYou) && !is_null($tellUsAboutYou['city']))
                <span style="text-transform: capitalize">{{$tellUsAboutYou['city']}},</span>
            @else
                <span style="text-transform: capitalize">(city)_____________,</span>

            @endif

          <span ><span  style="font-size: 12pt"><b>
        </b></span></span>

        {{--<span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.state !== null" style="font-family:'Times New Roman, serif'">{{userDetails.tellUsAboutYou.state}}</span>&nbsp;
        <span style="text-transform: capitalize" *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null" style="font-family:'Times New Roman, serif'">(state)_____________________</span>--}}

            @if(isset($tellUsAboutYou) && array_key_exists('state',$tellUsAboutYou) && !is_null($tellUsAboutYou['state']))
                <span style="text-transform: capitalize">{{$tellUsAboutYou['state']}}</span>
            @else
                <span style="text-transform: capitalize">(state)_____________</span>
            @endif

        <span ><span  style="font-size: 12pt"></span></span>

            @if(isset($tellUsAboutYou) && array_key_exists('zip',$tellUsAboutYou) && !is_null($tellUsAboutYou['zip']))
                <span style="text-transform: capitalize">{{$tellUsAboutYou['zip']}},</span>
            @else
                <span style="text-transform: capitalize">(state)_____________,</span>
            @endif

            {{--  <span style="font-family:'Times New Roman, serif'" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.zip !== null">{{userDetails.healthFinance.zip}}, </span>
              <span *ngIf="userDetails === undefined && userDetails.healthFinance === null">(zip)__________________, </span>--}}

        <span ><span  style="font-size: 12pt"><b></b></span></span></span></span></p>

            <br>
            <p class="western" align="center" style="margin-bottom: 0in; page-break-before: always">
                <b>WITNESS STATEMENTS</b></p>

            <p class="western"  style="margin-bottom: 0in;  ">
                The declarer, who signed the above Directive, is personally known to
                me and I believe him or her to be capable of making health care
                decisions. I agree that I am not related to the declarer by blood or
                marriage, the declarer has stated I am not mentioned in the
                declarer’s will, and I will not be entitled to any portion of the
                estate of the declarer upon declarer’s decease under any existing
                will of the declarer at the time of the execution of the above
                Directive. In addition, I am not the attending physician, an employee
                of the attending physician or a health care facility in which the
                declarer is a patient, or any person who has a claim against any
                portion of the estate of the declarer upon the declarer’s decease
                at the time of the execution of the above Directive.  I further
                attest that I am disinterested with regard to any anatomical gift
                made by declarer.</p>

            <p class="western" style="margin-bottom: 0in;  "><span ><b>WITNESS
        1</b></span><span >: </span><span >____________________</span><span style="padding-left: 50px;">	Dated:
        </span><span >______________________</span></p>
            <p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0.06in;  ">
                <span style="padding-left: 50px;">[signature]</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in;   padding-top: 15px;">
                <span >____________________________</span><span >		</span><span style="padding-left: 122px;">______________________</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in;  ">
                <span style="padding-left: 60px;">	[name printed]</span><span style="padding-left: 240px;">[street address]</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in;   padding:25px 0 0 350px;">
                <span >							</span><span >______________________</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in;   padding-left: 350px;">
                <span style="padding-left: 40px;">								[city, state, zip]</span></p>

            <br>
            <p class="western" style="margin-bottom: 0in;  "><span ><b>WITNESS
        2</b></span><span >: </span><span >____________________</span><span style="padding-left: 50px;">	Dated:
        </span><span >______________________</span></p>
            <p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0.06in;  ">
                <span style="padding-left: 50px;">[signature]</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in;   padding-top: 15px;">
                <span >____________________________</span><span >		</span><span style="padding-left: 122px;">______________________</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in;  ">
                <span style="padding-left: 60px;">	[name printed]</span><span style="padding-left: 240px;">[street address]</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in;   padding:25px 0 0 350px;">
                <span >							</span><span >______________________</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in;   padding-left: 350px;">
                <span style="padding-left: 40px;">								[city, state, zip]</span></p>
        </div>

    </div>


    <div >
        <div >
            <p class="western" align="center" style="margin-bottom: 0in; page-break-before: always">
                <span ><b>NOTARY ACKNOWLEDGEMENT </b></span>
            </p>
            <p class="western" align="center" style="margin-bottom: 0in;   background: #ffffff">
                <span ><b>(preferred but not required)</b></span></p>

            <p class="western" style="margin-bottom: 0in;   background: #ffffff">
                <span >State of Washington</span></p>

            <p class="western" style="margin-bottom: 0in;   background: #ffffff">
                <span >County of </span><span >_____________________________</span></p>


            <p class="western"  style="margin-bottom: 0.08in;   orphans: 0; widows: 0"><a name="_GoBack"></a>
                On this day personally appeared before me, <b></b>

        <span>
            <span style="font-family:'Times New Roman, serif'">
                @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                    <b style="text-transform: capitalize">{{strtoupper(strtolower($tellUsAboutYou['fullname']))}},</b>
                @else
                    <b>________________________________,</b>
                @endif

                {{--<b style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null">{{userDetails.tellUsAboutYou.fullname}}</b>
                <b *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null">(fullname)________________________________</b>--}}
            </span>
        </span>

                <b></b><span ><b> </b></span>to
                me known to be the individual described in and who executed the
                within and foregoing instrument and acknowledged that he/she signed
                the same as his/her free and voluntary act and deed for the uses and
                purposes therein mentioned.
            </p>

            <p class="western" style="margin-bottom: 0in;  ">Given
                under my hand and official seal this _____ day of _______________ in
                the year ______.
            </p>

            <p class="western" style="margin-left: 1.5in; margin-bottom: 0in;  ">
                __________________________________________
            </p>
            <p class="western" style="margin-left: 1.5in; margin-bottom: 0in;  ">
                Notary Public in and for the State of Washington
            </p>


            <p class="western" style="margin-left: 1in; text-indent: 0.5in; margin-bottom: 0in;  ">
                My appointment expires: ______________</p>
        </div>

    </div>
</div>
</body>
</html>
