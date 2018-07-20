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
      Advance Health Care Directive of <br>{{$tellUsAboutYou['fullname']}}<br>
    </div>
  </div>
<div class="docContainer" id="doc">
    <div class="docPage" style="page-break-after: always;">
        <div id="doc" class="docPageInner" style="">


            <p  style="text-align:center;margin-bottom: 0.13in; ">HAWAII ADVANCE</p>
            <p  style="text-align:center;margin-bottom: 0.13in; ">HEALTH CARE DIRECTIVE</p>
            <p  style="text-align:center;margin-bottom: 0in; ">—————————————</p>
            <p  style="text-align:center;margin-bottom: 0in; "><span size="4" style="font-size: 14pt"><b>Explanation</b></span></p>
            <p style="margin-bottom: 0in; ">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">Under
      the law, you have the right to give instructions about your own
      health care. You also have the right to name someone else to make
      health-care decisions for you. This form lets you do either or both
      of these things. It also lets you express your wishes regarding the
      designation of your health care provider. If you use this form, you
      may complete or modify all or any part of it. You are free to use a
      different form.</span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">Part
      1 of this form is a power of attorney for health care. Part 1 lets
      you name another individual as agent to make health-care decisions
      for you if you become incapable of making your own decisions or if
      you want someone else to make those decisions for you now even though
      you are still capable. You may name an alternate agent to act for you
      if your first choice is not willing, able or reasonably available to
      make decisions for you. Unless related to you, your agent may not be
      an owner, operator, or employee of a health-care institution where
      you are receiving care.</span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:justify;margin-bottom: 0.09in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">Unless
      the form you sign limits the authority of your agent, your agent may
      make all healthcare decisions for you. This form has a place for you
      to limit the authority of your agent. You need not limit the
      authority of your agent if you wish to rely on your agent for all
      health-care decisions that may have to be made. If you choose not to
      limit the authority of your agent, your agent will have the right to:</span></span></p>
            <p  style="text-align:justify;margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0.09in; ">
      <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(a)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">Consent
        or refuse consent to any care, treatment, service, or procedure to
        maintain, diagnose, or otherwise affect a physical or mental
        condition;</span></span></p>
            <p  style="text-align:justify;margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0.09in; ">
      <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(b)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">Select
        or discharge health-care providers and institutions;</span></span></p>
            <p  style="text-align:justify;margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0.09in; ">
      <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(c)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">Approve
        or disapprove diagnostic tests, surgical procedures, programs of
        medication, and orders not to resuscitate; and</span></span></p>
            <p  style="text-align:justify;margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in; ">
      <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(d)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">Direct
        the provision, withholding, or withdrawal of artificial nutrition and
        hydration and all other forms of health care.</span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">Part
      2 of this form lets you give specific instructions about any aspect
      of your health care. Choices are provided for you to express your
      wishes regarding the provision, withholding, or withdrawal of
      treatment to keep you alive, including the provision of artificial
      nutrition and hydration, as well as the provision of pain relief
      medication. Space is provided for you to add to the choices you have
      made or for you to write out any additional wishes.</span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">Part
      3 of this form lets you indicate your desires for organ donation.</span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>

        </div>
        <!-- @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Advance Health Care Directive of {{$tellUsAboutYou['fullname']}}<br>
                Page 1 of 8
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Advance Health Care Directive of «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 1 of 8
            </div>
        @endif -->
    </div>
    <!-- !Page 1 -->

    <!-- Page 2 -->
    <div class="docPage" style="page-break-after: always;">
        <div class="docPageInner" style="">


            <p  style="text-align:justify;margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">Part
      4 of this form lets you specify instructions for your personal care
      if you become incapacitated.</span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">Part
      5 of this form pertains to religious or spiritual information you may
      wish to provide.</span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">After
      completing this form, sign and date the form at the end and have the
      form witnessed by one of the two alternative methods listed below.
      Give a copy of the signed and completed form</span><span size="3" style="font-size: 12pt">
    </span><span size="3" style="font-size: 12pt">to your physician, to
      any other health-care providers you may have, to any health-care
      institution at which you are receiving care, and to any health-care
      agents you have named.</span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">You
      should talk to the person you have named as agent to make sure that
      he or she understands your wishes and is willing to take the
      responsibility.</span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">You
      have the right to revoke this advance health-care directive or
      replace this form at any time.</span></span></p>
            <p  style="text-align:justify;text-indent: 0.38in; margin-bottom: 0in; ">


            </p>
            <p  style="text-align:center;margin-left: 0.19in; text-indent: -0.19in; margin-top: 0.06in; margin-bottom: 0.13in; ">
      <span size="2" style="font-size: 10pt"><span size="4" style="font-size: 14pt"><b>PART
        1</b></span></span></p>
            <p  style="text-align:center;margin-left: 0.19in; text-indent: -0.19in; margin-top: 0.06in; margin-bottom: 0.13in; ">
      <span size="2" style="font-size: 10pt"><span size="4" style="font-size: 14pt"><b>DURABLE
        POWER OF ATTORNEY FOR HEALTH CARE</b></span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p class="western"  style="text-align:justify;margin-bottom: 0.08in;  orphans: 0; widows: 0">
                <span color="#000000"><b>MY NAME IS:</b></span><span color="#000000"></span>
                @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                    <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
                @else
                    <b>________________________________</b>
                @endif
            </p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; ">
                <span color="#000000"><b>My ADDRESS IS:  </b></span>
                @if(isset($tellUsAboutYou) && array_key_exists('address',$tellUsAboutYou) && !is_null($tellUsAboutYou['address']))
                    <span style="font-family:'Times New Roman, serif'" >{{$tellUsAboutYou['address']}},</span>
                @else
                    <span>_________________________________________________________________
                    ___________________________________________________________________________________________
                    _________________________________________________________________________________,</span>
                @endif
                <span > </span>

                @if(isset($tellUsAboutYou) && array_key_exists('city',$tellUsAboutYou) && !is_null($tellUsAboutYou['city']))
                    <span style="text-transform: capitalize">{{$tellUsAboutYou['city']}},</span>
                @else
                    <span style="text-transform: capitalize">(city)_____________,</span>

                @endif
                <span > </span>

                @if(isset($tellUsAboutYou) && array_key_exists('state',$tellUsAboutYou) && !is_null($tellUsAboutYou['state']))
                    <span style="text-transform: capitalize">{{$tellUsAboutYou['state']}},</span>
                @else
                    <span style="text-transform: capitalize">(state)_____________,</span>
                @endif
                <span > </span>

                @if(isset($tellUsAboutYou) && array_key_exists('zip',$tellUsAboutYou) && !is_null($tellUsAboutYou['zip']))
                    <span style="text-transform: capitalize">{{$tellUsAboutYou['zip']}},</span>
                @else
                    <span style="text-transform: capitalize">(zip)_____________,</span>
                @endif
            </p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p class="western" style="margin-bottom: 0in; "><span color="#000000">(1)</span><span color="#000000">	</span><span color="#000000"><b>DESIGNATION
      OF AGENT</b></span><span color="#000000">.</span><span color="#000000">&nbsp;
    </span><span color="#000000">I,
    </span>
      <span color="#000000">
            @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
              <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}},</b>
            @else
              <b>________________________________,</b>
            @endif
      </span>
      <span color="#000000">
      designate my
          @if(isset($healthFinance) && array_key_exists('relation',$healthFinance) && !is_null($healthFinance['relation'])  && $healthFinance['relation'] == 'Other')
                <span style="font-family:'Times New Roman, serif'">{{$healthFinance['relationOther']}}</span>
          @elseif (isset($healthFinance) && array_key_exists('relation',$healthFinance) && !is_null($healthFinance['relation']) && $healthFinance['relation'] != 'Other')
              <span style="font-family:'Times New Roman, serif'">{{$healthFinance['relation']}},</span>
          @else
              <span>(relation)______________,</span>
          @endif
          <span > </span>

          @if(isset($healthFinance) && array_key_exists('fullname',$healthFinance) && !is_null($healthFinance['fullname']))
              <span style="font-family:'Times New Roman, serif'">{{$healthFinance['fullname']}},</span>
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

          <span >),</span>
            as my agent to make health care decisions for me.</span></p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
        </div>
       <!--  @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Advance Health Care Directive of {{$tellUsAboutYou['fullname']}}<br>
                Page 2 of 8
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Advance Health Care Directive of «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 2 of 8
            </div>
        @endif -->
    </div>
    <!-- !Page 2 -->

    <!-- Page 3 -->
    <div class="docPage" style="page-break-after: always;">
        <div class="docPageInner"
             style="">


            <!--<p  style="text-align:justify;margin-bottom: 0in; "><span color="#008f00"><span size="2" style="font-size: 9pt"><span color="#000000"><span size="3" style="font-size: 12pt">«</span></span><span size="3" style="font-size: 12pt">IF
              Rx Alternate Agents?</span><span color="#000000"><span size="3" style="font-size: 12pt">»</span></span></span></span></p>-->
            @if(isset($healthFinance) && array_key_exists('anyBackupAgent',$healthFinance) && !is_null($healthFinance['anyBackupAgent']) && $healthFinance['anyBackupAgent'] == true)
            <p class="western" style="margin-bottom: 0in; "  *ngIf="userDetails !== undefined && userDetails.healthFinance !== null && userDetails.healthFinance.anyBackupAgent === 'true'">If I
                revoke my agent’s authority or if my agent is not willing, able, or
                reasonably available to make a health care decision for me, I
                designate my    @if(isset($healthFinance) && array_key_exists('backupRelation',$healthFinance) && !is_null($healthFinance['backupRelation']) && $healthFinance['backupRelation'] == 'Other')
                    <span>{{$healthFinance['backupRelation']}},</span>
                @elseif(isset($healthFinance) && array_key_exists('backupRelation',$healthFinance) && !is_null($healthFinance['backupRelation']) && $healthFinance['backupRelation'] != 'Other')
                    <span>{{$healthFinance['backupRelation']}},</span>
                @else
                    <span>(relation)______________,</span>
                @endif
                <span> </span>

                @if(isset($healthFinance) && array_key_exists('backupFullname',$healthFinance) && !is_null($healthFinance['backupFullname']))
                    <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupFullname']}},</span>
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
                as my alternate agent to make health care decisions for me.&nbsp;
            </p>
            @endif
            <!-- <p  style="text-align:justify;margin-bottom: 0in; "><span color="#008f00"><span size="2" style="font-size: 9pt"><span color="#000000"><span size="3" style="font-size: 12pt">«</span></span><span size="3" style="font-size: 12pt">END
               IF</span><span color="#000000"><span size="3" style="font-size: 12pt">»</span></span></span></span></p>-->
            <p  style="text-align:justify;margin-bottom: 0.09in; ">


            </p>
            <p class="western" style="margin-bottom: 0in; ">(2)	<b>AGENT'S
                    AUTHORITY</b>.&nbsp; <b>(Strike through any of the following
                    provisions you do not want. You can add provisions on the form or
                    attach additional pages.)  </b>
            </p>
            <p class="western" style="margin-bottom: 0in; ">

            </p>
            <p class="western" style="margin-bottom: 0in; ">My
                agent is authorized to make all of the following health care
                decisions for me:</p>
            <p  style="text-align:justify;margin-bottom: 0.09in; ">


            </p>
            <ul>
                <!--<li/>-->
                <p style="margin-bottom: 0in; ">To consent or
                    refuse consent to any care, treatment, service, or procedure to
                    maintain, diagnose, or otherwise affect a physical or mental
                    condition, including admission to or discharge from a health care
                    facility or program, approval or disapproval of diagnostic tests,
                    medical or surgical procedures, programs of medication, the use of
                    alternative or complementary therapies as well as decisions to
                    participate in education, research and experimental programs.
                </p>
                <!--<li/>-->
                <p style="margin-bottom: 0in; ">To make
                    decisions regarding orders not to resuscitate, including
                    out-of-hospital “Comfort Care Only” documents, as well as
                    decisions to provide, withhold, or withdraw nutrition and hydration,
                    and all other forms of health care to keep me alive.
                </p>
            </ul>
            <p class="western" style="margin-left: 0.25in; margin-bottom: 0in; ">


            </p>
            <ul>
                <!--<li/>-->
                <p style="margin-bottom: 0in; ">To request,
                    receive, examine, copy, and consent to the disclosure of medical or
                    any other health care information, including medical files and
                    records. This includes my delegated authority for my agent to act as
                    my personal representative for release of all individually
                    identifiable health information concerning me by both covered and
                    non-covered entities under the provisions of the Health Insurance
                    Portability and Accountability Act (HIPAA) and/or other Federal and
                    State laws pertaining to healthcare and healthcare information.
                </p>
            </ul>
            <p class="western" style="margin-bottom: 0in; ">

            </p>
            <ul>
                <!--<li/>-->
                <p style="margin-bottom: 0in; ">To
                    communicate with, select and discharge health care providers,
                    organizations, institutions and programs, including hospice programs
                    and to make and change health care choices and options relating to
                    plans, services, and benefits.
                </p>
            </ul>
            <p class="western" style="margin-bottom: 0in; ">

            </p>
            <ul>
                <!--<li/>-->
                <p style="margin-bottom: 0in; ">To apply for
                    public or private health care programs and benefits, to include
                    Medicare, Medicaid, Med-Quest or other federal, state, local or
                    private programs without my agent incurring any personal financial
                    liability.
                </p>
            </ul>
            <p class="western" style="margin-bottom: 0in; ">

            </p>
            <ul>
                <!--<li/>-->
                <p style="margin-bottom: 0in; ">To make all
                    other health care decisions for me, except as I state here:</p>
            </ul>
            <p  style="text-align:justify;margin-bottom: 0.09in; ">


            </p>
            <p  style="text-align:justify;margin-left: 0.38in; margin-bottom: 0.09in; ">
                <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></p>
            <p  style="text-align:justify;margin-left: 0.38in; margin-bottom: 0.09in; ">
                <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></p>
            <p  style="text-align:justify;margin-left: 0.38in; margin-bottom: 0in; ">
                <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></p>
            <p  style="text-align:center;margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 10pt">(Add
      additional sheets if needed.)</span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.15in"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(3)	</span><span size="3" style="font-size: 12pt"><b>WHEN
      AGENT’S AUTHORITY BECOMES EFFECTIVE: </b></span><span size="3" style="font-size: 12pt">My
      agent’s authority becomes effective when my primary physician
      determines that I am unable to make my own health-care decisions
      unless I mark the following box. </span></span>
            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.15in">

            </p>
            <p class="western" style="margin-left: 0.5in; margin-bottom: 0in; ">
                <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span> If I mark this box, my agent’s authority to make health-care
                decisions for me takes effect immediately.  However, I always retain
                the right to make my own decisions about my health care and to revoke
                this authority as long as I am mentally capacitated.</p>
            <p  style="text-align:justify;text-indent: 0.5in; margin-bottom: 0in; line-height: 0.15in">


            </p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
        </div>
        <!-- @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Advance Health Care Directive of {{$tellUsAboutYou['fullname']}}<br>
                Page 3 of 8
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Advance Health Care Directive of «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 3 of 8
            </div>
        @endif -->
    </div>
    <!-- !Page 3 -->


    <!-- Page 4 -->
    <div class="docPage" style="page-break-after: always;">
        <div class="docPageInner"
             style="">


            <p  style="text-align:justify;margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(4)	</span><span size="3" style="font-size: 12pt"><b>AGENT’S
      OBLIGATION</b></span><span size="3" style="font-size: 12pt">: My
      agent shall make health-care decisions for me in accordance with this
      power of attorney for health care, any instructions I give in Part 2
      of this form, and my other wishes to the extent known to my agent.
      To the extent my wishes are unknown, my agent shall make health-care
      decisions for me in accordance with what my agent determines to be in
      my best interest. In determining my best interest, my agent shall
      consider my personal values to the extent known to my agent.  My
      agent shall not be obligated to assume any personal financial
      responsibility when making decisions in accordance with this
      document.</span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(5)	</span><span size="3" style="font-size: 12pt"><b>NOMINATION
      OF GUARDIAN: </b></span><span size="3" style="font-size: 12pt">If a
      guardian of my person needs to be appointed for me by a court, I
      nominate my then-acting agent.  If another person is appointed as
      guardian and my agent is willing and able to act, I would prefer my
      agent to have precedent in making health care decisions for me.</span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:center;margin-left: 0.19in; text-indent: -0.19in; margin-top: 0.13in; margin-bottom: 0.13in; ">
      <span size="2" style="font-size: 10pt"><span size="4" style="font-size: 14pt"><b>PART
        2</b></span></span></p>
            <p  style="text-align:center;margin-left: 0.19in; text-indent: -0.19in; margin-top: 0.13in; margin-bottom: 0.13in; ">
      <span size="2" style="font-size: 10pt"><span size="4" style="font-size: 14pt"><b>INSTRUCTIONS
        FOR HEALTH CARE</b></span></span></p>
            <p  style="text-align:center;margin-left: 0.19in; text-indent: -0.19in; margin-top: 0.13in; margin-bottom: 0.13in; ">



            </p>
            <p  style="text-align:justify;margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">If
      you are satisfied to allow your agent to determine what is best for
      you in making end-of-life decisions, you need not fill out this part
      of the form. If you do fill out this part of the form, you may strike
      any wording you do not want.</span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(6)	</span><span size="3" style="font-size: 12pt"><b>END-OF-LIFE
      DECISIONS: </b></span><span size="3" style="font-size: 12pt">I direct
      that my health-care providers and others involved in my care provide,
      withhold or withdraw treatment in accordance with the choice I have
      marked below: </span><span size="3" style="font-size: 12pt"><b>(Check
      only one of the following two boxes.  You may cross out any unwanted
      provisions.)</b></span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:justify;margin-left: 0.38in; margin-bottom: 0in; ">
                <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span> <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(a)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt"><b>Choice
      NOT TO Prolong Life</b></span></span></p>
            <p  style="text-align:justify;margin-left: 1in; margin-bottom: 0.09in; ">
      <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">I
        do not want my life to be prolonged if </span></span>
            </p>
            <ul>
                <!--<li/>-->
                <p style="margin-bottom: 0in; ">I am close to
                    death and life support would only postpone the moment of my death or
                    I have an incurable and irreversible condition that will result in
                    my death within a relatively short time; or
                </p>
                <!--<li/>-->
                <p style="margin-bottom: 0in; ">I am in an
                    unconscious state such as an irreversible coma or a persistent
                    vegetative state and it is unlikely that I will ever become
                    conscious again; or
                </p>
                <!--<li/>-->
                <p style="margin-bottom: 0in; ">I have brain
                    damage or a brain disease that makes me permanently unable to
                    interact and make and communicate health care decisions about myself
                    and the likely risks and burdens of treatment would outweigh the
                    expected benefits.</p>
            </ul>
            <p  style="text-align:justify;margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>OR</b></span></span></p>
            <p  style="text-align:justify;margin-left: 0.38in; margin-bottom: 0in; ">
                <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span> <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(b)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt"><b>Choice
      TO Prolong Life</b></span></span></p>
            <p  style="text-align:justify;margin-left: 1in; margin-bottom: 0in; ">
      <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">I
        want my life to be prolonged as long as possible within the limits of
        generally accepted health-care standards.</span></span></p>
            <p style="margin-bottom: 0in; ">

            </p>
        </div>
        <!-- @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Advance Health Care Directive of {{$tellUsAboutYou['fullname']}}<br>
                Page 4 of 8
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Advance Health Care Directive of «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 4 of 8
            </div>
        @endif -->
    </div>
    <!-- !Page 4 -->

    <!-- Page 5 -->
    <div class="docPage" style="page-break-after: always;">
        <div class="docPageInner"
             style="">


            <p  style="text-align:justify;margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(7)	</span><span size="3" style="font-size: 12pt"><b>ARTIFICIAL
      NUTRITION AND HYDRATION: </b></span><span size="3" style="font-size: 12pt">Artificial
      nutrition and hydration must be provided, withheld or withdrawn in
      accordance with the choice I have made in paragraph (6) unless I mark
      the following box.</span></span></p>
            <p class="western" style="margin-left: 0.38in; margin-bottom: 0in; ">
                <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span> If I mark this box, artificial nutrition and hydration must be
                provided regardless of my condition and regardless of the choice I
                have made in paragraph (6).</p>
            <p class="western" style="margin-left: 0.5in; margin-bottom: 0in; ">


            </p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(8)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt"><b>RELIEF
      FROM PAIN: </b></span><span size="3" style="font-size: 12pt">If I
      mark the following box, </span></span>
            </p>
            <p class="western" style="margin-left: 0.5in; margin-bottom: 0in; ">
                <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span> I direct that treatment to alleviate pain or discomfort should be
                provided to me even if it hastens my death.</p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:justify;margin-bottom: 0.09in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(9)	</span><span size="3" style="font-size: 12pt"><b>OTHER
      WISHES: </b></span><span size="3" style="font-size: 12pt">(If you do
      not agree with any of the optional choices above and wish to write
      your own, or if you wish to add to the instructions you have given
      above, you may do so here.  Examples of additional instructions
      include preferences to receive Hospice Care and/or to die at home.) I
      direct that:</span></span></p>
            <p  style="text-align:justify;margin-left: 0.38in; margin-bottom: 0.09in; ">
                <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></p>
            <p  style="text-align:justify;margin-left: 0.38in; margin-bottom: 0.09in; ">
                <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></p>
            <p  style="text-align:justify;margin-left: 0.38in; margin-bottom: 0in; ">
                <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></p>
            <p  style="text-align:center;margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 10pt">(Add
      additional sheets if needed.)</span></span></p>
            <p  style="text-align:center;margin-left: 0.19in; text-indent: -0.19in; margin-top: 0.13in; margin-bottom: 0.13in; ">



            </p>
            <p  style="text-align:center;margin-left: 0.19in; text-indent: -0.19in; margin-top: 0.13in; margin-bottom: 0.13in; ">
      <span size="2" style="font-size: 10pt"><span size="4" style="font-size: 14pt"><b>PART
        III</b></span></span></p>
            <p  style="text-align:center;margin-left: 0.19in; text-indent: -0.19in; margin-top: 0.13in; margin-bottom: 0.13in; ">
      <span size="2" style="font-size: 10pt"><span size="4" style="font-size: 14pt"><b>DONATION
        OF ORGANS AT DEATH</b></span></span></p>
            <p  style="text-align:center;margin-left: 0.19in; text-indent: -0.19in; margin-top: 0.13in; margin-bottom: 0.13in; ">



            </p>
            <p style="margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(10)	Upon
      my death: </span><span size="3" style="font-size: 12pt"><b>(Initial
      and mark the applicable boxes).</b></span></span></p>
            <p style="margin-bottom: 0in; ">

            </p>
            <p  style="text-align:justify;margin-left: 3.38in; text-indent: -3in; margin-bottom: 0in; line-height: 0.16in">
                <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span>  <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>_______
      (Initial)</b></span><span size="3" style="font-size: 12pt">  I make
    </span><span size="3" style="font-size: 12pt">no</span><span size="3" style="font-size: 12pt"><b>
    </b></span><span size="3" style="font-size: 12pt">anatomical gift at
      this time. </span></span>
            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.16in"><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt"><b>OR</b></span></span></p>
            <p  style="text-align:left;margin-left: 0.38in; margin-bottom: 0in; line-height: 0.16in">
                <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span><span size="2" style="font-size: 9pt"><span style="font-family:Times New Roman, serif"><span size="5" style="font-size: 18pt"><span size="5" style="font-size: 20pt"><b>	</b></span></span></span><span size="3" style="font-size: 12pt"><b>_______
      (Initial)</b></span><span size="3" style="font-size: 12pt">  I hereby
      make the following anatomical gift, if medically acceptable, to take
      effect upon my death.</span><span size="3" style="font-size: 12pt">	</span></span></p>
            <p  style="text-align:justify;margin-left: 0.38in; margin-bottom: 0in; ">


            </p>
            <p  style="text-align:justify;margin-left: 0.88in; margin-bottom: 0in; line-height: 0.16in">
      <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">I
        give: (check one)</span></span></p>
            <p  style="text-align:justify;margin-left: 1.25in; margin-bottom: 0in; line-height: 0.16in">
                <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span> <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(a)
      I give any needed organs, tissues or parts, OR</span></span></p>
        </div>
        <!-- @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Advance Health Care Directive of {{$tellUsAboutYou['fullname']}}<br>
                Page 5 of 8
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Advance Health Care Directive of «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 5 of 8
            </div>
        @endif -->
    </div>
    <!-- !Page 5 -->

    <!-- Page 6 -->
    <div class="docPage" style="page-break-after: always;">
        <div class="docPageInner"
             style="">

            <p  style="text-align:justify;margin-left: 1.25in; margin-bottom: 0.09in; ">
                <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span>&nbsp;<span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(b)
      I give the following organs, tissues or parts only: </span><span size="3" style="font-size: 12pt"><u>			</u></span></span></p>
            <p  style="text-align:justify;margin-left: 1.25in; margin-bottom: 0.09in; ">
                <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span> <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(c)
      My gift is for the following purposes (Strike through any of the
      following you do not want):</span></span></p>
            <ul style="margin-left: 200px;">
                <!--<li/>-->
                <p  style="text-align:justify;margin-bottom: 0in; ">
                    <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">Transplant</span></span></p>
                <!--<li/>-->
                <p  style="text-align:justify;margin-bottom: 0in; ">
                    <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">Therapy</span></span></p>
                <!--<li/>-->
                <p  style="text-align:justify;margin-bottom: 0in; ">
                    <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">Research</span></span></p>
                <!--<li/>-->
                <p  style="text-align:justify;margin-bottom: 0in; ">
                    <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">Education</span></span></p>
            </ul>
            <p  style="text-align:justify;margin-left: 1.25in; margin-bottom: 0in; line-height: 0.16in">
                <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span> <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(d)
      Other: ________________________________________________</span></span></p>
            <p style="margin-left: 0.38in; margin-bottom: 0.03in; ">



            </p>
            <p style="margin-left: 0.75in; margin-bottom: 0in; ">


            </p>
            <p  style="text-align:center;margin-left: 0.19in; text-indent: -0.19in; margin-top: 0.13in; margin-bottom: 0.13in; ">
      <span size="2" style="font-size: 10pt"><span size="4" style="font-size: 14pt"><b>PART
        IV</b></span></span></p>
            <p  style="text-align:center;margin-left: 0.19in; text-indent: -0.19in; margin-top: 0.13in; margin-bottom: 0.13in; ">
      <span size="2" style="font-size: 10pt"><span size="4" style="font-size: 14pt"><b>INSTRUCTIONS
        FOR PERSONAL CARE</b></span></span></p>
            <p class="western" style="margin-bottom: 0in; ">(11)	<b>PRIMARY
                    PHYSICIAN.  </b>I designate the following physician as my primary
                physician:
            </p>
            <p class="western" style="margin-bottom: 0in; ">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 150%"><b>Name
                    of physician: </b>
            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 150%"><b>Address:
                    City,
                    State, Zip code:</b></p>
            <p class="western" style="margin-bottom: 0in; line-height: 150%"><b>Phone:</b></p>
            <p class="western" style="margin-bottom: 0in; ">

            </p>
            <p class="western" style="margin-bottom: 0in; ">OPTIONAL:
                If the physician I have designated above is not willing, able, or
                reasonably available to act as my primary physician, I designate the
                following physician as my primary physician:
            </p>
            <p class="western" style="margin-bottom: 0in; ">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 150%"><b>Name
                    of physician: </b>
            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 150%"><b>Address:
                    City,
                    State, Zip code:</b></p>
            <p class="western" style="margin-bottom: 0in; line-height: 150%"><b>Phone:</b></p>
            <p class="western" style="margin-bottom: 0in; ">

            </p>
            <p class="western" style="margin-bottom: 0in; ">(12)
                I have the following preference of hospitals and/or nursing homes if
                I require such care: (You may name a facility, or you may indicate a
                preference for hospice care administered at home or in a hospice
                facility, a preference not to be institutionalized, a preference to
                remain at home, etc.)</p>
            <p class="western" style="margin-bottom: 0in; ">

            </p>
        </div>
        <!-- @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Advance Health Care Directive of {{$tellUsAboutYou['fullname']}}<br>
                Page 6 of 8
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Advance Health Care Directive of «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 6 of 8
            </div>
        @endif -->
    </div>
    <!-- !Page 6 -->

    <!-- Page 7 -->
    <div class="docPage" style="page-break-after: always;">
        <div class="docPageInner"
             style="">

            <p  style="text-align:justify;margin-left: 0.38in; margin-bottom: 0.09in; ">
                <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></p>
            <p  style="text-align:justify;margin-left: 0.38in; margin-bottom: 0.09in; ">
                <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></p>
            <p  style="text-align:justify;margin-left: 0.38in; margin-bottom: 0in; ">
                <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></p>
            <p class="western" style="margin-bottom: 0in; ">

            </p>
            <p class="western" style="margin-bottom: 0in; ">(13)	<b>RELIGIOUS
                    OR SPIRITUAL INFORMATION (OPTIONAL)</b>.  I identify with the
                following church, temple, or other spiritual group and would like to
                receive my spiritual care from:
            </p>
            <p class="western" style="margin-bottom: 0in; ">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 150%"><b>Name
                    of individual or group: </b>
            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 150%"><b>Address:
                    City,
                    State, Zip code:</b></p>
            <p class="western" style="margin-bottom: 0in; line-height: 150%"><b>Phone:</b></p>
            <p class="western" style="margin-bottom: 0in; ">

            </p>
            <p  style="text-align:justify;margin-bottom: 0.09in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(15)	</span><span size="3" style="font-size: 12pt"><b>OTHER
      INSTRUCTIONS</b></span><span size="3" style="font-size: 12pt">.</span></span></p>
            <p  style="text-align:justify;margin-left: 0.38in; margin-bottom: 0.09in; ">
                <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></p>
            <p  style="text-align:justify;margin-left: 0.38in; margin-bottom: 0.09in; ">
                <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></p>
            <p  style="text-align:justify;margin-left: 0.38in; margin-bottom: 0in; ">
                <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></p>
            <p  style="text-align:center;margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="3" style="font-size: 12pt"><i>(Add
      additional sheets if necessary.)</i></span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(16)	</span><span size="3" style="font-size: 12pt"><b>EFFECT
      OF A COPY</b></span><span size="3" style="font-size: 12pt">.</span><span size="3" style="font-size: 12pt">&nbsp;
    </span><span size="3" style="font-size: 12pt">A copy of this form has
      the same effect as the original.</span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:left;margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span color="#0433ff"><span color="#00000a"><span size="3" style="font-size: 12pt">(17)	</span></span></span><span color="#0433ff"><span color="#00000a"><span size="3" style="font-size: 12pt"><b>SIGNATURE.</b></span></span></span><span color="#0433ff"><span color="#00000a"><span size="3" style="font-size: 12pt">
      Sign and date the form here:</span></span></span></span></p>
            <p  style="text-align:left;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; ">
                <span size="2" style="font-size: 9pt"><u>					</u></span><span size="2" style="font-size: 9pt">		</span><b>DATE:
                </b><span size="2" style="font-size: 9pt"><u>			</u></span><span size="2" style="font-size: 9pt">
    </span>
            </p>
            <p class="western"  style="text-align:justify;margin-bottom: 0.08in;  orphans: 0; widows: 0">
                @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                    <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}},</b>
                @else
                    <b>________________________________,</b>
                @endif
            </p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; ">
                @if(isset($tellUsAboutYou) && array_key_exists('address',$tellUsAboutYou) && !is_null($tellUsAboutYou['address']))
                    <span style="font-family:'Times New Roman, serif'" >{{$tellUsAboutYou['address']}},</span>
                @else
                    <span>_________________________________________________________________
                    ___________________________________________________________________________________________
                    _________________________________________________________________________________,</span>
                @endif
                <span></span>
            </p>
            <!--<p class="western"  style="text-align:justify;margin-bottom: 0in; ">
              «<span color="#008f00">IF ANSWERED( Address2 )</span>»</p>-->
            <!-- <p class="western"  style="text-align:justify;margin-bottom: 0in; ">
               «<span color="#0432ff">Address2</span>»</p>-->
            <!--<p class="western"  style="text-align:justify;margin-bottom: 0in; ">
              «<span color="#008f00">END IF</span>»</p>-->
            <p class="western"  style="text-align:justify;margin-bottom: 0in; ">
                @if(isset($tellUsAboutYou) && array_key_exists('city',$tellUsAboutYou) && !is_null($tellUsAboutYou['city']))
                    <span style="text-transform: capitalize">{{$tellUsAboutYou['city']}},</span>
                @else
                    <span style="text-transform: capitalize">(city)_____________,</span>
                @endif
                <span > </span>

                @if(isset($tellUsAboutYou) && array_key_exists('state',$tellUsAboutYou) && !is_null($tellUsAboutYou['state']))
                    <span style="text-transform: capitalize">{{$tellUsAboutYou['state']}},</span>
                @else
                    <span style="text-transform: capitalize">(state)_____________,</span>
                @endif

                @if(isset($tellUsAboutYou) && array_key_exists('zip',$tellUsAboutYou) && !is_null($tellUsAboutYou['zip']))
                    <span style="text-transform: capitalize">{{$tellUsAboutYou['zip']}},</span>
                @else
                    <span style="text-transform: capitalize">(zip)_____________,</span>
                @endif

            </p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; ">
                @if(isset($tellUsAboutYou) && array_key_exists('phone',$tellUsAboutYou) && !is_null($tellUsAboutYou['phone']))
                    <span style="text-transform: capitalize">{{$tellUsAboutYou['phone']}}</span>
                @else
                    <span style="text-transform: capitalize">(phone)_____________</span>
                @endif
            </p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="2" style="font-size: 10pt">STATE
      OF HAWAII</span><span size="2" style="font-size: 10pt">			</span><span size="2" style="font-size: 10pt">)</span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="2" style="font-size: 10pt">					</span><span size="2" style="font-size: 10pt">)
      ss.</span><span size="2" style="font-size: 10pt">&nbsp;</span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; "><span color="#008f00"><span size="2" style="font-size: 9pt"><span color="#000000"><span size="2" style="font-size: 10pt">COUNTY
      OF ________________</span></span><span color="#000000"><span size="2" style="font-size: 10pt">	</span></span><span color="#000000"><span size="2" style="font-size: 10pt">)</span></span></span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
        </div>
        <!-- @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Advance Health Care Directive of {{$tellUsAboutYou['fullname']}}<br>
                Page 7 of 8
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Advance Health Care Directive of «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 7 of 8
            </div>
        @endif -->
    </div>
    <!-- !Page 7 -->




    <!-- Page 8 -->
    <div class="docPage" style="">
        <div class="docPageInner"
             style="">

            <p class="western" style="margin-bottom: 0in; "><span size="2" style="font-size: 10pt">On
      this </span><span size="2" style="font-size: 10pt"><u>		</u></span><span size="2" style="font-size: 10pt">
      day of </span><span size="2" style="font-size: 10pt"><u>					</u></span><span size="2" style="font-size: 10pt">,
    </span><span size="2" style="font-size: 10pt"><u>		</u></span><span size="2" style="font-size: 10pt">,
      before me, the undersigned, appeared </span>
        @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <span style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}},</span>
        @else
            <span style="text-transform: capitalize">_____________,</span>
        @endif
      <span size="2" style="font-size: 10pt">
      personally known to me (or proved to me on the basis of satisfactory
      evidence) to be the person whose name is subscribed to this
      instrument, and acknowledged that
      <span>{{isset($tellUsAboutYou) && array_key_exists('gender',$tellUsAboutYou) && !is_null($tellUsAboutYou['gender']) && $tellUsAboutYou['gender'] == 'M' ? 'he' : (isset($tellUsAboutYou) && array_key_exists('gender',$tellUsAboutYou) && !is_null($tellUsAboutYou['gender']) && $tellUsAboutYou['gender'] == 'F' ? 'she' : 'he/she')}}</span>
      executed it.</span></p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="2" style="font-size: 10pt">	</span><span size="2" style="font-size: 10pt">______________________________________</span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="2" style="font-size: 10pt">	</span><span size="2" style="font-size: 10pt">NOTARY
      PUBLIC</span></span></p>
            <p class="western" style="margin-bottom: 0in; ">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(18)	</span><span size="3" style="font-size: 12pt"><b>WITNESSES:
    </b></span><span size="3" style="font-size: 12pt"><b>This power of
      attorney will not be valid for making health-care decisions unless it
      is either:</b></span><span size="3" style="font-size: 12pt"><b> </b></span><span size="3" style="font-size: 12pt"><b>(a)
      signed by two (2) qualified adult witnesses who are personally known
      to you and who are present when you sign or acknowledge your
      signature: or (b) acknowledged before a notary public in the state.</b></span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:center;margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="4" style="font-size: 14pt"><b>STATEMENT
      OF WITNESSES</b></span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p class="western"  style="text-align:justify;margin-bottom: 0.08in;  orphans: 0; widows: 0"><a name="_GoBack"></a>
                I declare under penalty of false swearing pursuant to Section
                710-1062, Hawaii Revised Statues, that
                @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                    <span style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}},</span>
                @else
                    <span style="text-transform: capitalize">_____________,</span>
                @endif
                <span style="letter-spacing: 0.1pt"></span>
                the principal, is personally known to me, that <span>{{isset($tellUsAboutYou) && array_key_exists('gender',$tellUsAboutYou) && !is_null($tellUsAboutYou['gender']) && $tellUsAboutYou['gender'] == 'M' ? 'he' : (isset($tellUsAboutYou) && array_key_exists('gender',$tellUsAboutYou) && !is_null($tellUsAboutYou['gender']) && $tellUsAboutYou['gender'] == 'F' ? 'she' : 'he/she')}}</span>
                signed or acknowledged this advance health
                care directive in my presence, that <span>{{isset($tellUsAboutYou) && array_key_exists('gender',$tellUsAboutYou) && !is_null($tellUsAboutYou['gender']) && $tellUsAboutYou['gender'] == 'M' ? 'he' : (isset($tellUsAboutYou) && array_key_exists('gender',$tellUsAboutYou) && !is_null($tellUsAboutYou['gender']) && $tellUsAboutYou['gender'] == 'F' ? 'she' : 'he/she')}}</span>
                appears to be of sound mind and under no
                duress, fraud or undue influence, that I am not the person appointed
                as agent by this document, and that I am not a health-care provider,
                nor an employee of a health-care provider or facility. I am not
                related to the principal by blood, marriage or adoption, and to the
                best of my knowledge, I am not entitled to any part of the estate of
                the principal upon <span>{{isset($tellUsAboutYou) && array_key_exists('gender',$tellUsAboutYou) && !is_null($tellUsAboutYou['gender']) && $tellUsAboutYou['gender'] == 'M' ? 'his' : (isset($tellUsAboutYou) && array_key_exists('gender',$tellUsAboutYou) && !is_null($tellUsAboutYou['gender']) && $tellUsAboutYou['gender'] == 'F' ? 'her' : 'his/her')}}</span>
                death under a will now existing or by operation of law.</p>
            <p  style="text-align:left;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:left;margin-bottom: 0in; "><span color="#008f00"><span size="2" style="font-size: 9pt"><span color="#00000a"><span size="2" style="font-size: 11pt">WITNESS
      1: ________________________________	Dated: ___________________</span></span></span></span></p>
            <p  style="text-align:left;margin-bottom: 0in; "><span color="#008f00"><span size="2" style="font-size: 9pt"><span color="#00000a"><span size="2" style="font-size: 11pt">[signature]</span></span></span></span></p>
            <p  style="text-align:left;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:left;margin-bottom: 0in; "><span color="#008f00"><span size="2" style="font-size: 9pt"><span color="#00000a"><span size="2" style="font-size: 11pt">____________________________________</span></span></span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 11pt">	</span><span size="2" style="font-size: 11pt">[name
      printed]</span></span></p>
            <p  style="text-align:left;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:left;margin-bottom: 0in; "><span color="#008f00"><span size="2" style="font-size: 9pt"><span color="#00000a"><span size="2" style="font-size: 11pt">____________________________________</span></span></span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 11pt">	</span><span size="2" style="font-size: 11pt">[street
      address]</span></span></p>
            <p  style="text-align:center;margin-left: 0.19in; text-indent: -0.19in; margin-top: 0.06in; margin-bottom: 0.13in; ">



            </p>
            <p  style="text-align:justify;margin-bottom: 0in; "><span color="#008f00"><span size="2" style="font-size: 9pt"><span color="#00000a"><span size="2" style="font-size: 11pt">____________________________________</span></span></span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 11pt">	</span><span size="2" style="font-size: 11pt">[city,
      state]</span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:left;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:left;margin-bottom: 0in; "><span color="#008f00"><span size="2" style="font-size: 9pt"><span color="#00000a"><span size="2" style="font-size: 11pt">WITNESS
      2: ________________________________	Dated: ___________________</span></span></span></span></p>
            <p  style="text-align:left;margin-bottom: 0in; "><span color="#008f00"><span size="2" style="font-size: 9pt"><span color="#00000a"><span size="2" style="font-size: 11pt">[signature]</span></span></span></span></p>
            <p  style="text-align:left;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:left;margin-bottom: 0in; "><span color="#008f00"><span size="2" style="font-size: 9pt"><span color="#00000a"><span size="2" style="font-size: 11pt">____________________________________</span></span></span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 11pt">	</span><span size="2" style="font-size: 11pt">[name
      printed]</span></span></p>
            <p  style="text-align:left;margin-bottom: 0in; ">

            </p>
            <p  style="text-align:left;margin-bottom: 0in; "><span color="#008f00"><span size="2" style="font-size: 9pt"><span color="#00000a"><span size="2" style="font-size: 11pt">____________________________________</span></span></span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 11pt">	</span><span size="2" style="font-size: 11pt">[street
      address]</span></span></p>
            <p  style="text-align:center;margin-left: 0.19in; text-indent: -0.19in; margin-top: 0.06in; margin-bottom: 0.13in; ">



            </p>
            <p  style="text-align:justify;margin-bottom: 0in; "><span color="#008f00"><span size="2" style="font-size: 9pt"><span color="#00000a"><span size="2" style="font-size: 11pt">____________________________________</span></span></span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 11pt">	</span><span size="2" style="font-size: 11pt">[city,
      state]</span></span></p>
        </div>
        <!-- @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Advance Health Care Directive of {{$tellUsAboutYou['fullname']}}<br>
                Page 8 of 8
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Advance Health Care Directive of «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 8 of 8
            </div>
        @endif -->
    </div>
    <!-- !Page 8 -->

</div>

</body>
</html>
