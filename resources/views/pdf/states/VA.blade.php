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
<div style="text-align: justify;">

    <div class="docPageInner" style="box-sizing: border-box; height: 875px;">
        <p style="margin-bottom: 0.06in; line-height: 100%; text-align: center;"><span  style="font-size: 13pt"><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span  style="font-size: 16pt"><b>V</b></span></span></span><span  style="font-size: 16pt"><b>IRGINIA</b></span><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 15pt"><span  style="font-size: 16pt"><b>
        </b></span></span></span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span  style="font-size: 16pt"><b>A</b></span></span></span><span  style="font-size: 16pt"><b>DVANCE
        </b></span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span  style="font-size: 16pt"><b>M</b></span></span></span><span  style="font-size: 16pt"><b>EDICAL</b></span><span style="font-family:'Times New Roman, serif'"><span  style="font-size: 15pt"><span  style="font-size: 16pt"><b>
        </b></span></span></span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 19pt"><span  style="font-size: 16pt"><b>D</b></span></span></span><span  style="font-size: 16pt"><b>IRECTIVE</b></span></span></p>
        <p  style="margin-bottom: 0in; line-height: 100%"><br/>

        </p>

        <p class="western"  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
            I, <b></b>

        <span>
           {{-- <b style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null">{{userDetails.tellUsAboutYou.fullname}} , </b>
            <b *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null">(fullname)________________________________ , </b>--}}
            @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                <b style="text-transform: capitalize">{{strtoupper(strtolower($tellUsAboutYou['fullname']))}}</b>
            @else
                <b>________________________________</b>
            @endif
        </span>

            of
         {{--   <span *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.address !== null" style="font-family:'Times New Roman, serif'" >{{userDetails.tellUsAboutYou.address}}, </span>
        <span *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null">_________________________________________________________________
          ___________________________________________________________________________________________
        _________________________________________________________________________________ , </span>

            <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.city !== null" style="font-family:'Times New Roman, serif'">{{userDetails.tellUsAboutYou.city}} ,</span>
            <span style="text-transform: capitalize" *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null">(city)_____________ ,</span>

            <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.state !== null" style="font-family:'Times New Roman, serif'">{{userDetails.tellUsAboutYou.state}}, </span>&nbsp;
            <span style="text-transform: capitalize" *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null" style="font-family:'Times New Roman, serif'">(state)_____________________, </span>--}}
            @if(isset($tellUsAboutYou) && array_key_exists('address',$tellUsAboutYou) && !is_null($tellUsAboutYou['address']))
                <span style="font-family:'Times New Roman, serif'" >{{$tellUsAboutYou['address']}},</span>
            @else
                <span>_________________________________________________________________
                    ___________________________________________________________________________________________
                    _________________________________________________________________________________,</span>
            @endif

            @if(isset($tellUsAboutYou) && array_key_exists('city',$tellUsAboutYou) && !is_null($tellUsAboutYou['city']))
                <span style="text-transform: capitalize">{{ucwords(strtolower($tellUsAboutYou['city']))}},</span>
            @else
                <span style="text-transform: capitalize">(city)_____________,</span>
            @endif
            <span ></span>

            @if(isset($tellUsAboutYou) && array_key_exists('state',$tellUsAboutYou) && !is_null($tellUsAboutYou['state']))
                <span style="text-transform: capitalize">{{ucwords(strtolower($tellUsAboutYou['state']))}}</span>
            @else
                <span style="text-transform: capitalize">(state)_____________</span>
            @endif

            willfully and voluntarily
            make known my wishes in the event that I am incapable of making an
            informed decision about my health care, as follows:</p>
        <p style="margin-top: 0.06in; margin-bottom: 0.09in; line-height: 100%; text-align: center;">
            <br/>
            <br/>

        </p>
        <p style="margin-top: 0.06in; margin-bottom: 0.09in; line-height: 100%; text-align: center;">
        <span  style="font-size: 10pt"><span  style="font-size: 14pt"><b>SECTION
        I:  APPOINTMENT AND POWERS OF MY AGENT </b></span></span>
        </p>
        <p  style="text-indent: 0.38in; margin-bottom: 0in; line-height: 100%">
        <span ><span><span><span>I
        hereby appoint my </span></span>
       {{-- <span>
            <span style="font-family:'Times New Roman, serif'" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.relation == 'Other'">{{userDetails.healthFinance.relationOther}}</span>
            <span style="font-family:'Times New Roman, serif'" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.relation != 'Other'">{{userDetails.healthFinance.relation}}</span>
            <span *ngIf="userDetails === undefined && userDetails.healthFinance === null">______________</span>
        </span>

        <span>
            <span *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.fullname.length > 0" style="font-family:'Times New Roman, serif'">{{userDetails.healthFinance.fullname}}</span>
            <span *ngIf="userDetails === undefined && userDetails.healthFinance === null" style="font-family:'Times New Roman, serif'">_____________________________</span>
        </span>

        <span>
            <span style="font-family:'Times New Roman, serif'" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.address !== null">{{userDetails.healthFinance.address}}, </span>
            <span *ngIf="userDetails === undefined && userDetails.healthFinance === null">_________________________________________________________________
              _______________________________________________________________________________,
            </span>
        </span>

        <span style="font-size: 12pt"></span><span >

            <span style="font-family:'Times New Roman, serif'" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.city !== null">{{userDetails.healthFinance.city}}, </span>
            <span *ngIf="userDetails === undefined && userDetails.healthFinance === null">(city)__________________, </span>

        </span>

        <span>
            <span style="font-family:'Times New Roman, serif'" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.state !== null">{{userDetails.healthFinance.state}}, </span>
            <span *ngIf="userDetails === undefined && userDetails.healthFinance === null">(state)__________________, </span>
        </span>

        <span>
            <span style="font-family:'Times New Roman, serif'" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.zip !== null">{{userDetails.healthFinance.zip}}, </span>
            <span *ngIf="userDetails === undefined && userDetails.healthFinance === null">(zip)__________________, </span>
        </span>

        <span  style="font-size: 12pt"></span><span><span  style="font-size: 12pt">
        (Tel:  </span>

        </span>

        <span>
            <span *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.phone !== null" style="font-family:'Times New Roman, serif'">{{userDetails.healthFinance.phone}}</span>
            <span *ngIf="userDetails === undefined && userDetails.healthFinance === null" style="font-family:'Times New Roman, serif'">_____________________________</span>
        </span>

        <span><span  style="font-size: 12pt">),--}}

        @if(isset($healthFinance) && array_key_exists('relation',$healthFinance) && !is_null($healthFinance['relation'])  && $healthFinance['relation'] == 'Other')
            <span style="font-family:'Times New Roman, serif'">{{ucwords(strtolower($healthFinance['relationOther']))}},</span>
        @elseif (isset($tellUsAboutYou) && array_key_exists('relation',$healthFinance) && !is_null($healthFinance['relation']) && $healthFinance['relation'] != 'Other')
            <span style="font-family:'Times New Roman, serif'">{{$healthFinance['relation']}},</span>
        @else
            <span>(relation)______________,</span>
        @endif
        <span > </span>

        @if(isset($healthFinance) && array_key_exists('fullname',$healthFinance) && !is_null($healthFinance['fullname']))
            <span style="font-family:'Times New Roman, serif'">{{ucwords(strtolower($healthFinance['fullname']))}},</span>
        @else
            <span style="font-family:'Times New Roman, serif'">_____________________________,</span>
        @endif
        <span >of </span>

        @if(isset($healthFinance) && array_key_exists('address',$healthFinance) && !is_null($healthFinance['address']))
            <span style="font-family:'Times New Roman, serif'">{{$healthFinance['address']}}, </span>
        @else
            <span>_________________________________________________________________
                _______________________________________________________________________________,
            </span>
        @endif


        @if(isset($healthFinance) && array_key_exists('city',$healthFinance) && !is_null($healthFinance['city']))
            <span style="font-family:'Times New Roman, serif'">{{ucwords(strtolower($healthFinance['city']))}}, </span>
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
        as my agent to make health care decisions on my behalf as authorized
        in this document.  </span></span></span></span>
        </p>
        <p  style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
            <br/>

        </p>
        {{--<p  style="margin-bottom: 0in; line-height: 100%">

          <span>
            <span  style="font-size: 9pt">
              <span>
                <span  style="font-size: 12pt"></span></span>
                <span  style="font-size: 12pt">IF
        Rx Alternate Agents?
                </span>
                <span>
                  <span  style="font-size: 12pt"></span>
                </span>
              </span>
            </span>
        </p>--}}

        @if(isset($healthFinance) && array_key_exists('anyBackupAgent',$healthFinance) && !is_null($healthFinance['anyBackupAgent']) && $healthFinance['anyBackupAgent'] == true)
        <!-- if alternate agent -->
        <div>
            <p  style="margin-bottom: 0in; line-height: 100%"><span  style="font-size: 9pt"><span  style="font-size: 12pt">	</span><span  style="font-size: 12pt">If
                the primary agent named above is not reasonably available or is
                unable or unwilling to act as my agent, then I appoint as successor
                agent my </span><span><span  style="font-size: 12pt"></span></span>

                <span style="font-size: 12pt">{{$healthFinance['backupRelation'] == 'Other' ? ucwords(strtolower($healthFinance['backupRelationOther'])) : $healthFinance['backupRelation']}}, {{ucwords(strtolower($healthFinance['backupFullname']))}}, of {{$healthFinance['backupAddress']}}, {{ucwords(strtolower($healthFinance['backupCity']))}}, {{ucwords(strtolower($healthFinance['backupState']))}} {{ucwords(strtolower($healthFinance['backupZip']))}}, (Tel: {{ucwords(strtolower($healthFinance['backupphone']))}}),</span>

                {{--<span>
                    <span style="font-family:'Times New Roman, serif'" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.backupRelation == 'Other'">{{userDetails.healthFinance.backupRelationOther}}</span>

                    <span style="font-family:'Times New Roman, serif'" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.backupRelation != 'Other'">{{userDetails.healthFinance.backupRelation}}</span>

                    <span *ngIf="userDetails === undefined && userDetails.healthFinance === null">______________</span>
                </span>

                <span>
                    <span *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.backupFullname.length > 0" style="font-family:'Times New Roman, serif'">{{userDetails.healthFinance.backupFullname}}</span>
                    <span *ngIf="userDetails === undefined && userDetails.healthFinance === null" style="font-family:'Times New Roman, serif'">_____________________________</span>
                </span>

                <span><span  style="font-size: 12pt">, of </span></span>

                <span>
                    <span style="font-family:'Times New Roman, serif'" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.backupAddress !== null">{{userDetails.healthFinance.backupAddress}}, </span>
                    <span *ngIf="userDetails === undefined && userDetails.healthFinance === null">_________________________________________________________________
                      _______________________________________________________________________________,
                    </span>
                </span>

                <span><span  style="font-size: 12pt">,
                </span></span>

                <span  style="font-size: 12pt"></span><span >
                    <span style="font-family:'Times New Roman, serif'" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.backupCity !== null">{{userDetails.healthFinance.backupCity}}, </span>
                    <span *ngIf="userDetails === undefined && userDetails.healthFinance === null">(city)__________________, </span>
                </span>

                <span  style="font-size: 12pt">,
                </span>
                <span>
                    <span style="font-family:'Times New Roman, serif'" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.backupState !== null">{{userDetails.healthFinance.backupState}}, </span>
                    <span *ngIf="userDetails === undefined && userDetails.healthFinance === null">(state)__________________, </span>
                </span>

                <span>
                    <span style="font-family:'Times New Roman, serif'" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.backupZip !== null">{{userDetails.healthFinance.backupZip}}, </span>
                    <span *ngIf="userDetails === undefined && userDetails.healthFinance === null">(zip)__________________, </span>
                </span>

                <span  style="font-size: 12pt"></span><span><span  style="font-size: 12pt">
                (Tel:  </span></span><span>
                    <span style="font-family:'Times New Roman, serif'" *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.backupphone !== null">{{userDetails.healthFinance.backupphone}}</span>
                    <span *ngIf="userDetails === undefined && userDetails.healthFinance === null">__________________</span>
                </span>

                <span><span  style="font-size: 12pt">),
                </span></span>--}}
                <span  style="font-size: 12pt">to make health
                care decisions </span><span><span  style="font-size: 12pt">on
                my behalf as authorized in this document.  </span></span></span>
            </p>
            <p  style="margin-bottom: 0in; line-height: 100%"><br/>

            </p>
        </div>
        @endif



        <p class="western"  style="text-indent: 0.38in; margin-bottom: 0in; line-height: 100%">
            I grant to my agent full authority to make health care decisions on
            my behalf as described below. My agent shall have this authority
            whenever and for as long as I have been determined to be incapable of
            making an informed decision.
        </p>
        <p class="western"  style="text-indent: 0.38in; margin-bottom: 0in; line-height: 100%">
            <br/>

        </p>
        <p class="western"  style="text-indent: 0.38in; margin-bottom: 0in; line-height: 100%">
            In making health care decisions on my behalf, I want my agent to
            follow my desires and preferences as stated in this document or as
            otherwise known to him or her. If my agent cannot determine what
            health care choice I would have made on my own behalf, then I want my
            agent to make a choice for me based upon what he or she believes to
            be in my best interests.
        </p>
        <p  style="margin-bottom: 0in; line-height: 100%"><br/>

        </p>
        <p class="western" style="text-indent: 0.38in; margin-bottom: 0in; line-height: 100%">
            The phrase &quot;incapable of making an informed decision&quot; means
            unable to understand the nature, extent and probable consequences of
            a proposed health care decision or unable to make a rational
            evaluation of the risks and benefits of a proposed health care
            decision as compared with the risks and benefits of alternatives to
            that decision, or unable to communicate such understanding in any
            way.
        </p>
        <p  style="margin-bottom: 0in; line-height: 100%"><br/>

        </p>
        <p class="western"  style="text-indent: 0.38in; margin-bottom: 0in; line-height: 100%">
            The determination that I am incapable of making an informed decision
            shall be made by my attending physician and a second physician or
            licensed clinical psychologist after a personal examination of me and
            shall be certified in writing. Such certification shall be required
            before treatment is withheld or withdrawn, and before, or as soon as
            reasonably practicable after, treatment is provided, and every 180
            days thereafter while the health care continues.  If, at any time, I
            am determined to be incapable of making an informed decision, I shall
            be notified, to the extent I am capable of receiving such notice,
            that such determination has been made before health care is provided,
            continued, withheld, or withdrawn. Such notice shall also be
            provided, as soon as practical, to my named agent or person
            authorized by § 54.1-2986 to make health care decisions on my
            behalf. If I am later determined to be capable of making an informed
            decision by a physician, in writing, upon personal examination, any
            further health care decisions will require my informed consent.
        </p>
    </div>
</div>


<div >
    <div style="text-align: justify">
        <p  style="text-indent: 0.38in; margin-bottom: 0in; line-height: 100%">
        <span><span>In
        exercising the power to make health care decisions on my behalf, my
        agent shall follow my desires and preferences as stated in this
        document or as otherwise known to my agent. My agent shall be guided
        by my medical diagnosis and prognosis and any information provided by
        my physicians as to the intrusiveness, pain, risks, and side effects
        associated with treatment or non-treatment. My agent shall not
        authorize a course of treatment which he knows, or upon reasonable
        inquiry ought to know, is contrary to my religious beliefs or my
        basic values, whether expressed orally or in writing. If my agent
        cannot determine what treatment choice I would have made on my own
        behalf, then my agent shall make a choice for me based upon what he
        believes to be in my best interests.</span></span></p>
        <p  style="margin-bottom: 0in; line-height: 100%"><br/>

        </p>
        <p style="margin-bottom: 0in; line-height: 100%; text-align: center;"><span  style="font-size: 9pt"><span  style="font-size: 12pt"><b>POWERS
        OF MY AGENT</b></span></span></p>
        <p  style="margin-bottom: 0in; line-height: 100%"><br/>

        </p>
        <p  style="margin-bottom: 0in; line-height: 100%"><span size="1" style="font-size: 7pt"><span  style="font-size: 11pt"><i>[YOU
        MAY CROSS THROUGH ANY POWERS LISTED BELOW THAT YOU DO NOT WANT TO
        GIVE YOUR AGENT AND ADD ANY ADDITIONAL POWERS YOU DO WANT TO GIVE
        YOUR AGENT.]</i></span></span></p>
        <p  style="margin-bottom: 0in; line-height: 100%"><br/>

        </p>
        <p  style="text-indent: 0.38in; margin-bottom: 0.09in; line-height: 100%">
        <span  style="font-size: 9pt"><span  style="font-size: 12pt">The
        powers of my agent shall include the following:</span></span></p>
        <p class="western" style="margin-bottom: 0.17in; line-height: 100%">1.
            To consent to or refuse or withdraw consent to any type of health
            care, including, but not limited to, artificial respiration
            (breathing machine), artificially administered nutrition (tube
            feeding) and hydration (IV fluids), and cardiopulmonary resuscitation
            (CPR). This authorization specifically includes the power to consent
            to dosages of pain-relieving medication in excess of recommended
            dosages in an amount sufficient to relieve pain. This applies even if
            this medication carries the risk of addiction or of inadvertently
            hastening my death.
        </p>
        <p class="western" style="margin-bottom: 0.17in; line-height: 100%">2.
            To request, receive and review any oral or written information
            regarding my physical or mental health, including but not limited to
            medical and hospital records, and to consent to the disclosure of
            this information as necessary to carry out my directions as stated in
            this advance directive.
        </p>
        <p class="western" style="margin-bottom: 0.17in; line-height: 100%">3.
            To employ and discharge my health care providers.
        </p>
        <p class="western" style="margin-bottom: 0.17in; line-height: 100%">4.
            To authorize my admission, transfer, or discharge to or from a
            hospital, hospice, nursing home, assisted living facility or other
            medical care facility.
        </p>
        <p class="western" style="margin-bottom: 0.17in; line-height: 100%">5.
            To authorize my admission to a health care facility for treatment of
            mental illness as permitted by law. (If I have other instructions for
            my agent regarding treatment for mental illness, they are stated in a
            supplemental document.)
        </p>
        <p class="western" style="margin-bottom: 0.17in; line-height: 100%">6.
            To continue to serve as my agent if I object to the agent’s
            authority after I have been determined to be incapable of making an
            informed decision.
        </p>
    </div>
</div>


<div style="text-align: justify">
    <div>
        <p class="western" style="margin-bottom: 0.17in; line-height: 100%">7.
            To authorize my participation in any health care study approved by an
            institutional review board or research review committee according to
            applicable federal or state law if the study offers the prospect of
            direct therapeutic benefit to me.
        </p>
        <p class="western" style="margin-bottom: 0.17in; line-height: 100%">8.
            To authorize my participation in any health care study approved by an
            institutional review board or research review committee according to
            applicable federal or state law that aims to increase scientific
            understanding of any condition that I may have or otherwise to
            promote human well-being, even though it offers no prospect of direct
            benefit to me.
        </p>
        <p class="western" style="margin-bottom: 0in; line-height: 100%; page-break-before: always;">9.
            To make decisions regarding visitation during any time that I am
            admitted to any health care facility, consistent with the following
            directions:</p>
        <p class="western" style="margin-bottom: 0in; line-height: 150%">
                __________________________________________________________________________<br>
                __________________________________________________________________________<br>
                __________________________________________________________________________<br>
            </p>

        <p><span><span>10.
        To take any lawful actions that may be necessary to carry out these
        decisions, including the granting of releases of liability to medical
        providers.  </span><span>Further, my
        agent shall not be liable for the costs of treatment pursuant to his
        authorization, based solely on that authorization.</span></span></p>

        <p class="western" style="margin-bottom: 0in; line-height: 100%">ADDITIONAL
            POWERS OR LIMITATIONS, IF ANY:</p>


        <p  style="margin-bottom: 0in; line-height: 0.3in"><span  style="font-size: 12pt">
        __________________________________________________________________________<br>
        __________________________________________________________________________<br>
        __________________________________________________________________________<br>
        __________________________________________________________________________<br>
        __________________________________________________________________________<br>
        __________________________________________________________________________<br>
        __________________________________________________________________________<br>
        </span></p>
        <p class="western" style="margin-bottom: 0in; line-height: 200%"><span  style="font-size: 10pt"><i>(Attach
        additional pages if needed.)</i></span></p>
    </div>

</div>


<div style="text-align: justify">
    <div >
        <p style="margin-top: 0.06in; margin-bottom: 0.09in; line-height: 100%; page-break-before: always; text-align: center;">
        <span  style="font-size: 10pt"><span  style="font-size: 14pt"><b>SECTION
        II:  MY HEALTH CARE INSTRUCTIONS </b></span></span>
        </p>
        <p  style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
            <br/>

        </p>
        <p class="western"  style="margin-bottom: 0in; line-height: 100%">
        <span  style="font-size: 11pt"><i>[YOU MAY USE ANY OR ALL OF
        PARTS 1, 2 OR 3 IN THIS SECTION TO DIRECT YOUR HEALTH CARE EVEN IF
        YOU DO NOT HAVE AN AGENT. IF YOU CHOOSE NOT TO PROVIDE WRITTEN
        INSTRUCTIONS, DECISIONS WILL BE BASED ON YOUR VALUES AND WISHES, IF
        KNOWN, AND OTHERWISE ON YOUR BEST INTERESTS. IF YOU ARE AN EYE, ORGAN
        OR TISSUE DONOR, YOUR INSTRUCTIONS WILL BE APPLIED SO AS TO ENSURE
        THE MEDICAL SUITABILITY OF YOUR ORGANS, EYES AND TISSUE FOR
        DONATION.] </i></span>
        </p>

        <ol >
            <li>
                <span style="display:inline-block;">
                    I provide the following instructions in the event my attending
                    physician determines that my death is imminent (very close) and
                    medical treatment will not help me recover:</span>
            </li>
        </ol>

        <p class="western" style="margin-bottom: 0in; line-height: 100%"><b>[check
            </b><u><b>only one</b></u><b> box in this part 1.]</b></p>

        <p class="western"  style="margin-bottom: 0in; line-height: 100%">
            <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span>  I do not want any treatments to prolong my life. This includes
            tube feeding, IV fluids, cardiopulmonary resuscitation (CPR),
            ventilator/respirator (breathing machine), kidney dialysis or
            antibiotics. I understand that I still will receive treatment to
            relieve pain and make me comfortable.
        </p>

        <p class="western"  style="margin-bottom: 0in; line-height: 100%">
            <b>(OR) </b>
        </p>
        <p class="western"  style="margin-bottom: 0in; line-height: 100%">
            <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span> I want all treatments to prolong my life as long as possible
            within the limits of generally accepted health care standards. I
            understand that I will receive treatment to relieve pain and make me
            comfortable.
        </p>

        <p class="western"  style="margin-bottom: 0in; line-height: 100%">
            <b>(OR)</b></p>
        <p class="western"  style="margin-bottom: 0in; line-height: 100%">
            <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span> <i>[YOU MAY WRITE HERE YOUR OWN INSTRUCTIONS ABOUT YOUR CARE
                WHEN YOU ARE DYING, INCLUDING SPECIFIC INSTRUCTIONS ABOUT TREATMENTS
                THAT YOU DO WANT, IF MEDICALLY APPROPRIATE, OR DON’T WANT. IT IS
                IMPORTANT THAT YOUR INSTRUCTIONS HERE DO NOT CONFLICT WITH OTHER
                INSTRUCTIONS YOU HAVE GIVEN IN THIS ADVANCE DIRECTIVE.]:</i></p>
        <p  style="margin-bottom: 0in; line-height: 0.3in"><span  style="font-size: 12pt">
        __________________________________________________________________________<br>
        __________________________________________________________________________<br>
        __________________________________________________________________________<br>
        __________________________________________________________________________<br>
        __________________________________________________________________________<br>
        __________________________________________________________________________<br>
        __________________________________________________________________________<br>
        </span></p>
        <p  style="margin-bottom: 0in; line-height: 100%"><span  style="font-size: 9pt"><u>													</u></span></p>
        <p class="western" style="margin-bottom: 0in; line-height: 200%">
        <span  style="font-size: 10pt"><i>(Attach additional pages if
        needed.)</i></span></p>

        <p class="western" style="margin-bottom: 0in; line-height: 100%; text-align: center;">
            <span  style="font-size: 10pt">(continues onto next page)</span></p>
    </div>

</div>


<div style="text-align: justify">
    <div style="page-break-before: always">
        <ol start="2">
            <li>
                <span style="margin-bottom: 0in; line-height: 100%; display: inline-block;">
                    I provide the following instructions if my condition makes me
                    unaware of myself or my surroundings or unable to interact with
                    others, and it is reasonably certain that I will never recover this
                    awareness or ability even with medical treatment:</span>
            </li>
        </ol>

        <p class="western" style="margin-bottom: 0in; line-height: 100%"><i><b>[check
                </b></i><i><u><b>only one</b></u></i><i><b> box in this part 2.]</b></i></p>

        <p class="western"  style="margin-bottom: 0in; line-height: 100%">
            <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span> I do not want any treatments to prolong my life. This includes
            tube feeding, IV fluids, cardiopulmonary resuscitation (CPR),
            ventilator/respirator (breathing machine), kidney dialysis or
            antibiotics. I understand that I still will receive treatment to
            relieve pain and make me comfortable.
        </p>

        <p class="western"  style="margin-bottom: 0in; line-height: 100%">
            <b>(OR)</b></p>
        <p class="western"  style="margin-bottom: 0in; line-height: 100%">
            <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span>I want all treatments to prolong my life as long as possible
            within the limits of generally accepted health care standards. I
            understand that I will receive treatment to relieve pain and make me
            comfortable.<b> </b>
        </p>

        <p class="western"  style="margin-bottom: 0in; line-height: 100%">
            <b>(OR) </b>
        </p>
        <p class="western"  style="margin-bottom: 0in; line-height: 100%">
            <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span>I want to try treatments for a period of time in the hope of some
            improvement of my condition. I suggest _________________________ as
            the period of time after which such treatment should be stopped if my
            condition has not improved. The exact time period is at the
            discretion of my agent or surrogate in consultation with my
            physician. I understand that I still will receive treatment to
            relieve pain and make me comfortable.
        </p>

        <p class="western"  style="margin-bottom: 0in; line-height: 100%">
            <b>(OR) </b>
        </p>
        <p class="western"  style="margin-bottom: 0in; line-height: 100%">
            <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span><span  style="font-size: 11pt"><i>[YOU MAY WRITE HERE
        YOUR INSTRUCTIONS ABOUT YOUR CARE WHEN YOU ARE UNABLE TO INTERACT
        WITH OTHERS AND ARE NOT EXPECTED TO RECOVER THIS ABILITY. THIS
        INCLUDES SPECIFIC INSTRUCTIONS ABOUT TREATMENTS YOU DO WANT, IF
        MEDICALLY APPROPRIATE, OR DON’T WANT. IT IS IMPORTANT THAT YOUR
        INSTRUCTIONS HERE DO NOT CONFLICT WITH OTHER INSTRUCTIONS YOU HAVE
        GIVEN IN THIS ADVANCE DIRECTIVE.]</i></span></p>
        <p  style="margin-bottom: 0in; line-height: 0.3in"><span  style="font-size: 12pt">
        __________________________________________________________________________<br>
        __________________________________________________________________________<br>
        __________________________________________________________________________<br>
        __________________________________________________________________________<br>
        __________________________________________________________________________<br>
        __________________________________________________________________________<br>
        __________________________________________________________________________<br>
        </span></p>
        <p class="western" style="margin-bottom: 0in; line-height: 100%">
        <span  style="font-size: 10pt"><i>(Attach additional pages if
        needed.)</i></span>
        </p>
    </div>

</div>


<div style="text-align: justify">
    <div style="page-break-before: always;">
        <ol start="3">
            <li>
                <span  style="display: inline-block">
        <span><span>I
        provide the following other instructions concerning my health care:</span></span></span>
            </li>
        </ol>
        <p  style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
        <span  style="font-size: 11pt"><i>[YOU MAY WRITE HERE
        STATEMENTS AND INSTRUCTIONS ABOUT TREATMENTS THAT YOU DO WANT, IF
        MEDICALLY APPROPRIATE, OR ABOUT TREATMENTS YOU DO NOT WANT UNDER
        SPECIFIC CIRCUMSTANCES OR ANY CIRCUMSTANCES. IT IS IMPORTANT YOUR
        INSTRUCTIONS HERE DO NOT CONFLICT WITH OTHER INSTRUCTIONS YOU HAVE
        GIVEN IN THIS ADVANCE DIRECTIVE.]</i></span></p>

        <p  style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
            <span  style="font-size: 9pt"><span  style="font-size: 12pt">________________________________________________________________________</span></span></p>
        <p  style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
            <span  style="font-size: 9pt"><span  style="font-size: 12pt">________________________________________________________________________</span></span></p>
        <p  style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
            <span  style="font-size: 9pt"><span  style="font-size: 12pt">________________________________________________________________________</span></span></p>
        <p class="western" style="text-indent: 0.38in; margin-bottom: 0in; line-height: 200%">
        <span  style="font-size: 10pt"><i>(Attach additional pages if
        needed.)</i></span>
        </p>
        <p style="margin-bottom: 0in; line-height: 100%; page-break-before: always; text-align: center;"><span  style="font-size: 9pt"><span  style="font-size: 14pt"><b>SECTION
        III: ANATOMICAL GIFTS</b></span></span></p>
        <p style="margin-bottom: 0in; line-height: 100%; text-align: center;"><br/>

        </p>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><span  style="font-size: 11pt"><i>(OPTIONAL:
        YOU MAY USE THIS DOCUMENT TO RECORD YOUR DECISION TO DONATE YOUR
        ORGANS, EYES AND TISSUES OR YOUR WHOLE BODY AFTER YOUR DEATH. IF YOU
        DO NOT MAKE THIS DECISION HERE OR IN ANY OTHER DOCUMENT, YOUR AGENT
        CAN MAKE THE DECISION FOR YOU UNLESS YOU SPECIFICALLY PROHIBIT
        HIM/HER FROM DOING SO, WHICH YOU MAY DO IN THIS OR SOME OTHER
        DOCUMENT.)</i></span><span > </span>
        </p>

        <p><span ><span >Upon
        my death, I direct that an anatomical gift of all or any part of my
        body may be made pursuant to §32.1-291.1 </span><span ><i>et
        seq</i></span><span>. of the Code of
        Virginia and in accordance with my directions below. I hereby
        authorize my agent to make any such anatomical gift following my
        death.</span></span></p>

        <p class="western" style="margin-bottom: 0in; line-height: 100%"><i><b>[check
                </b></i><i><u><b>one</b></u></i><i><b> of the boxes below if you wish
                    to use this section to make your donation decision]</b></i></p>

        <p class="western"><span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span>
            I donate my organs, eyes and tissues for use in transplantation,
            therapy, research and education. I direct that all necessary measures
            be taken to ensure the medical suitability of my organs, eyes or
            tissues for donation. I understand that I may register my directions
            at the Department of Motor Vehicles or directly on the donor
            registry, www.DonateLifeVirginia.org, and that I may use the donor
            registry to amend or revoke my directions;
        </p>

        <p class="western" style="margin-bottom: 0in; line-height: 100%"><b>(OR)
            </b>
        </p>

        <p class="western" style="margin-bottom: 0in; line-height: 100%"><span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span>
            I donate my whole body for research and education.
        </p>

        <p  style="margin-bottom: 0.09in; line-height: 100%"><span  style="font-size: 9pt"><span  style="font-size: 12pt">I
        further direct that: </span><span  style="font-size: 12pt"><i>[Write
        here any specific instructions you wish to give about anatomical
        gifts.]:</i></span></span></p>
        <p  style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
            <span  style="font-size: 9pt"><span  style="font-size: 12pt">________________________________________________________________________</span></span></p>
        <p  style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
            <span  style="font-size: 9pt"><span  style="font-size: 12pt">________________________________________________________________________</span></span></p>
        <p  style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
            <span  style="font-size: 9pt"><span  style="font-size: 12pt">________________________________________________________________________</span></span></p>
        <p class="western" style="text-indent: 0.38in; margin-bottom: 0in; line-height: 200%">
        <span  style="font-size: 10pt"><i>(Attach additional pages if
        needed.)</i></span></p>
    </div>
</div>


<div style="text-align: justify">
    <div>
        <p  style="margin-bottom: 0in; line-height: 100%"><span  style="font-size: 9pt"><span  style="font-size: 12pt">This
        advance directive shall not terminate in the event of my disability.</span></span></p>

        <p  style="margin-bottom: 0in; line-height: 100%"><span  style="font-size: 9pt"><span  style="font-size: 12pt">I
        revoke any prior health care directives, “Living Wills” and any
        prior powers of attorney for health care.</span><span  style="font-size: 12pt">&nbsp;</span></span></p>

        <p  style="margin-bottom: 0in"><span  ><span  >Persons
        dealing with my agent may rely fully on a photocopy of this document
        as though the photocopy was an original.</span><span  style="font-size: 12pt">&nbsp;</span></span></p>

        <p class="western"  style="page-break-before: always;">
            <b>AFFIRMATION AND RIGHT TO REVOKE:</b>  By signing below, I indicate
            that I am emotionally and mentally competent to make this advance
            directive and that I understand the purpose and effect of this
            document.  I indicate that I understand this document and that I am
            willingly and voluntarily executing it. I also understand that I may
            revoke all or any part of it at any time as provided by law.
        </p>

        <p  style="margin-bottom: 0in; line-height: 100%"><span  style="font-size: 9pt"><span  style="font-size: 12pt">Date:
        </span><span  style="font-size: 12pt">_____________________</span><span  style="font-size: 12pt">	</span></span></p>

        <p  style="margin-bottom: 0in; line-height: 100%"><span  style="font-size: 9pt"><span  style="font-size: 12pt">Signature:
        </span><span  style="font-size: 12pt">______________________________________</span></span></p>
        <p class="western"  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
            <b>	</b>

        <span>
            @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                <b style="text-transform: capitalize">{{strtoupper(strtolower($tellUsAboutYou['fullname']))}}</b>
            @else
                <b>________________________________</b>
            @endif

        </span>

        </p>
        <br>
        <p><span  ><span >The
        declarant signed the foregoing advance directive in my presence. I am
        not the spouse or a blood relative of the declarant.</span></span></p>

        <p class="western" style="margin-bottom: 0in; line-height: 100%"><span ><b>WITNESS
        1</b></span><span >: </span><span >____________________</span><span style="padding-left: 50px;">	Dated:
        </span><span >______________________</span></p>
        <p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 100%">
            <span style="padding-left: 50px;">[signature]</span></p>
        <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%; padding-top: 15px;">
            <span >____________________________</span><span >		</span><span style="padding-left: 122px;">______________________</span></p>
        <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
            <span style="padding-left: 60px;">	[name printed]</span><span style="padding-left: 240px;">[street address]</span></p>
        <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%; padding:25px 0 0 350px;">
            <span >							</span><span >______________________</span></p>
        <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%; padding-left: 350px;">
            <span style="padding-left: 40px;">								[city, state, zip]</span></p>
            <br>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><span ><b>WITNESS
        2</b></span><span >: </span><span >____________________</span><span style="padding-left: 50px;">	Dated:
        </span><span >______________________</span></p>
        <p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 100%">
            <span style="padding-left: 50px;">[signature]</span></p>
        <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%; padding-top: 15px;">
            <span >____________________________</span><span >		</span><span style="padding-left: 122px;">______________________</span></p>
        <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
            <span style="padding-left: 60px;">	[name printed]</span><span style="padding-left: 240px;">[street address]</span></p>
        <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%; padding:25px 0 0 350px;">
            <span >							</span><span >______________________</span></p>
        <p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%; padding-left: 350px;">
            <span style="padding-left: 40px;">								[city, state, zip]</span></p>
    </div>

</div>
</body>
</html>
