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
        /*body{
            margin: 0;
            padding: 0;
            font-family: Garamond;
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
        }*/




    </style>
    <style>
  	#footer { position: fixed; left: 0px; bottom: -80px; right: 0px; height: 150px;
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
      Advance Directive for Health Care of <br>{{$tellUsAboutYou['fullname']}}<br>
    </div>
  </div>

<div class="docContainer" id="doc">
    <!-- Page 1-->
    <div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding: 40px;">
        <div class="docPageInner" style="box-sizing: border-box; height: 875px;">
            <p  style="margin-bottom: 0.13in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 16pt"><b>OKLAHOMA
    ADVANCE DIRECTIVE FOR HEALTH CARE</b></span></span></p>
            <p  style="margin-bottom: 0in; "><br/>

            </p>
            <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><b>NOTICE:
      The powers granted by this document are broad and sweeping. If you
      have any questions about these powers, obtain competent legal advice.
      Free legal information regarding construction of the powers granted
      by this document and completion of this form may be obtained by
      calling the Legal Services Developer, Aging Services, Oklahoma
      Department of Human Services, (405) 522-3069, or your local legal aid
      or legal services office. This document authorizes your agent to make
      medical and other health care decisions for you. You may revoke this
      power of attorney if you later wish to do so. </b></span>
            </p>
            <p  style="margin-bottom: 0.13in; "><br/>
                <br/>

            </p>
            <p  style="margin-bottom: 0.13in; "><span style="font-family:'Times New Roman, serif'">If
      I am incapable of making an informed decision regarding my health
      care, I direct my health care providers to follow my instructions
      below.</span></p>
            <p  style="margin-bottom: 0.13in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 14pt"><b>I.
      LIVING WILL</b></span></span></p>
            <p  style="margin-bottom: 0.13in; "><span style="font-family:'Times New Roman, serif'">If
      my attending physician and another physician determine that I am no
      longer able to make decisions regarding my medical treatment, I
      direct my attending physician and other health care providers,
      pursuant to the Oklahoma Advance Directive Act, to follow my
      instructions as set forth below.</span></p>
            <p  style="margin-bottom: 0.06in; "><br/>
                <br/>

            </p>
            <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'">(1)	If
      I have a terminal condition, that is, an incurable and irreversible
      condition that even with the administration of life-sustaining
      treatment will, in the opinion of the attending physician and another
      physician, result in death within six (6) months:</span></p>
            <p  style="margin-bottom: 0.13in; "><br/>
                <br/>

            </p>
            <p  style="margin-bottom: 0.13in; "><span style="font-family:'Times New Roman, serif'"><b>(Initial
      only one option)</b></span></p>
            <p  style="margin-bottom: 0.17in; "><span style="font-family:'Times New Roman, serif'">_______
      I direct that my life not be extended by life-sustaining treatment,
      except that if I am unable to take food and water by mouth, I wish to
      receive artificially administered nutrition and hydration</span></p>
            <p  style="margin-bottom: 0.17in; "><span style="font-family:'Times New Roman, serif'">______
      I direct that my life not be extended by life-sustaining treatment,
      including artificially administered nutrition and hydration</span></p>
            <p  style="margin-bottom: 0.17in; "><span style="font-family:'Times New Roman, serif'">_______
      I direct that I be given life-sustaining treatment and, if I am
      unable to take food and water by mouth, I wish to receive
      artificially administered nutrition and hydration</span></p>
            <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'"><b>(Initial
      if applicable)</b></span></p>
            <p  style="margin-left: 0.75in; text-indent: -0.75in; margin-bottom: 0in; ">
                <br/>

            </p>
            <p  style="margin-left: 0.75in; text-indent: -0.75in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'">_______ See my more specific
      instructions in paragraph (4). </span>
            </p>
        </div>
       {{-- <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
            <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null && userDetails.tellUsAboutYou.fullname !== undefined">Advance Directive for Health Care of <br> {{userDetails.tellUsAboutYou.fullname}} <br></span>
            Page 1 of 6
        </div>--}}
    </div>
    <!-- Page 1-->

    <!-- Page 2-->
    <div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding: 40px;">
        <div class="docPageInner" style="box-sizing: border-box; height: 875px;">
            <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'">(2)	If
      I am persistently unconscious, that is, I have an irreversible
      condition, as determined by my attending physician and another
      physician, in which thought and awareness of self and environment are
      absent:</span></p>
            <p  style="margin-bottom: 0.17in; "><br/>
                <br/>

            </p>
            <p  style="margin-bottom: 0.17in; "><span style="font-family:'Times New Roman, serif'"><b>(Initial
      only one option)</b></span></p>
            <p  style="margin-bottom: 0.17in; "><span style="font-family:'Times New Roman, serif'">_______
      I direct that my life not be extended by life-sustaining treatment,
      except that if I am unable to take food and water by mouth, I wish to
      receive artificially administered nutrition and hydration</span></p>
            <p  style="margin-bottom: 0.17in; "><span style="font-family:'Times New Roman, serif'">______
      I direct that my life not be extended by life-sustaining treatment,
      including artificially administered nutrition and hydration</span></p>
            <p  style="margin-bottom: 0.17in; "><span style="font-family:'Times New Roman, serif'">_______
      I direct I be given life-sustaining treatment and, if I am unable to
      take food and water by mouth, I wish to receive artificially
      administered nutrition and hydration</span></p>
            <p  style="margin-left: 0.75in; text-indent: -0.75in; margin-bottom: 0in; ">
                <br/>

            </p>
            <p  style="margin-left: 0.75in; text-indent: -0.75in; margin-bottom: 0in; ">
                <span style="font-family:'Times New Roman, serif'"><b>(Initial if applicable)</b></span></p>
            <p  style="margin-left: 0.75in; text-indent: -0.75in; margin-bottom: 0in; ">
                <br/>

            </p>
            <p  style="margin-left: 0.75in; text-indent: -0.75in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'">_______ See my more specific
      instructions in paragraph (4).</span></p>
            <p  style="margin-left: 0.75in; text-indent: -0.75in; margin-bottom: 0in; ">
                <br/>

            </p>
            <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'">(3)	If
      I have an end-stage condition, that is a condition caused by injury,
      disease or illness, which results in severe and permanent
      deterioration indicated by incompetency and complete physical
      dependency for which treatment of the irreversible condition would be
      medically ineffective:</span></p>
            <p  style="margin-bottom: 0.13in; "><br/>
                <br/>

            </p>
            <p  style="margin-bottom: 0.13in; "><span style="font-family:'Times New Roman, serif'"><b>(Initial
      only one option)</b></span></p>
            <p  style="margin-bottom: 0.17in; "><span style="font-family:'Times New Roman, serif'">_______
      I direct that my life not be extended by life-sustaining treatment,
      except that if I am unable to take food and water by mouth, I wish to
      receive artificially administered nutrition and hydration</span></p>
            <p  style="margin-bottom: 0.17in; "><span style="font-family:'Times New Roman, serif'">______
      I direct that my life not be extended by life-sustaining treatment,
      including artificially administered nutrition and hydration</span></p>
            <p  style="margin-bottom: 0.17in; "><span style="font-family:'Times New Roman, serif'">_______
      I direct I be given life-sustaining treatment and, if I am unable to
      take food and water by mouth, I wish to receive artificially
      administered nutrition and hydration</span></p>
            <p  style="margin-left: 0.75in; text-indent: -0.75in; margin-bottom: 0in; ">
                <br/>

            </p>
            <p  style="margin-left: 0.75in; text-indent: -0.75in; margin-bottom: 0in; ">
                <span style="font-family:'Times New Roman, serif'"><b>(Initial if applicable)</b></span></p>
            <p  style="margin-left: 0.75in; text-indent: -0.75in; margin-bottom: 0in; ">
                <br/>

            </p>
            <p  style="margin-left: 0.75in; text-indent: -0.75in; margin-bottom: 0in; ">
      <span style="font-family:'Times New Roman, serif'">_______ See my more specific
      instructions in Paragraph (4) below. </span>
            </p>
        </div>
       {{-- <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
            <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null && userDetails.tellUsAboutYou.fullname !== undefined">Advance Directive for Health Care of <br> {{userDetails.tellUsAboutYou.fullname}} <br></span>
            Page 2 of 6
        </div>--}}
    </div>
    <!-- Page 2-->

    <!-- Page 3-->
    <div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding: 40px;">
        <div class="docPageInner" style="box-sizing: border-box; height: 875px;">
            <p  style="margin-bottom: 0.06in; ">
                <span style="font-family:'Times New Roman, serif'">(4)	OTHER. Here you may:</span></p>
            <p  style="margin-left: 1in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'">(a)	Describe other conditions in
      which you would want life-sustaining treatment or artificially
      administered nutrition and hydration provide, withheld or withdrawn.</span></p>
            <p  style="margin-left: 1in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'">(b)	Give more specific
      instructions about your wishes concerning life-sustaining treatment
      or artificially administered nutrition and hydration if you have a
      terminal condition, are persistently unconscious, or have an
      end-stage condition, or</span></p>
            <p  style="margin-left: 1in; margin-bottom: 0.13in; ">
                <span style="font-family:'Times New Roman, serif'">(c)	Do both of these:</span></p>
            <p  style="margin-left: 0.38in; margin-bottom: 0.13in; ">
                <span style="font-family:'Times New Roman, serif'">________________________________________________________________________</span></p>
            <p  style="margin-left: 0.38in; margin-bottom: 0.13in; ">
                <span style="font-family:'Times New Roman, serif'">________________________________________________________________________</span></p>
            <p  style="margin-left: 0.38in; margin-bottom: 0.13in; ">
                <span style="font-family:'Times New Roman, serif'">________________________________________________________________________</span></p>
            <p  style="margin-left: 0.38in; margin-bottom: 0.06in; ">
                <span style="font-family:'Times New Roman, serif'">________________________________________________________________________</span></p>
            <p  style="margin-top: 0.06in; margin-bottom: 0.13in; ">
                <br/>
                <br/>

            </p>
            <p  style="margin-top: 0.06in; margin-bottom: 0.13in; ">
                <br/>
                <br/>

            </p>
            <p  style="margin-top: 0.06in; margin-bottom: 0.13in;  text-align:center;">
      <span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 14pt"><b>II.
      MY APPOINTMENT OF MY HEALTH CARE PROXY</b></span></span></p>
            <p  style="margin-bottom: 0.13in; "><span ><span style="font-family:'Times New Roman, serif'">If
      my attending physician and another physician determine that I am no
      longer able to make decisions regarding my medical treatment, I
      direct my attending physician and other health care providers
      pursuant to the Oklahoma Advance Directive Act to follow the
      instructions my </span></span>
        @if(isset($healthFinance) && array_key_exists('relation',$healthFinance) && !is_null($healthFinance['relation'])  && $healthFinance['relation'] == 'Other')
            <span style="font-family:'Times New Roman, serif'">{{$healthFinance['relationOther']}}</span>
        @elseif (isset($healthFinance) && array_key_exists('relation',$healthFinance) && !is_null($healthFinance['relation']) && $healthFinance['relation'] != 'Other')
            <span style="font-family:'Times New Roman, serif'">{{$healthFinance['relation']}}</span>
        @endif
            <span style="font-family:'Times New Roman, serif';text-transform: capitalize" > {{$healthFinance['fullname']}} </span> , of
            <span style="font-family:'Times New Roman, serif';text-transform: capitalize" > {{$healthFinance['address']}} </span> , in
            <span style="font-family:'Times New Roman, serif';text-transform: capitalize" > {{$healthFinance['city']}} , </span>
            <span style="font-family:'Times New Roman, serif';text-transform: capitalize" > {{$healthFinance['state']}} </span>
            <span style="font-family:'Times New Roman, serif';text-transform: capitalize" > {{$healthFinance['zip']}} </span>
            <span style="font-family:'Times New Roman, serif';">(Tel: <span > {{$healthFinance['phone']}} </span> ),</span>
            <span style="font-family:'Times New Roman, serif';"> whom I appoint as my health care proxy to make health care decisions
            for me as authorized in this document.</span>

            @if(isset($healthFinance) && array_key_exists('anyBackupAgent',$healthFinance) && !is_null($healthFinance['anyBackupAgent']) && $healthFinance['anyBackupAgent'] == true)
            <span>
                  <span ><span style="font-family:'Times New Roman, serif'">
                  </span></span><span style="font-family:'Times New Roman, serif'">If my health care
                  proxy is or becomes unable or unwilling to serve, I appoint my
                    @if(isset($healthFinance) && array_key_exists('backupRelation',$healthFinance) && !is_null($healthFinance['backupRelation']) && $healthFinance['backupRelation'] == 'Other')
                        <span>{{$healthFinance['backupRelation']}}</span>
                    @elseif(isset($healthFinance) && array_key_exists('backupRelation',$healthFinance) && !is_null($healthFinance['backupRelation']) && $healthFinance['backupRelation'] != 'Other')
                        <span>{{$healthFinance['backupRelation']}}</span>
                    @else
                        <span>(relation)______________</span>
                    @endif
                  <span style="text-transform: capitalize" > {{$healthFinance['backupFullname']}} </span>  of
                  <span style="text-transform: capitalize" > {{$healthFinance['backupAddress']}} </span>  in
                  <span style="text-transform: capitalize" > {{$healthFinance['backupCity']}} </span>,
                  <span style="text-transform: capitalize" > {{$healthFinance['backupState']}} </span>
                  <span style="text-transform: capitalize" > {{$healthFinance['backupZip']}} </span>
                  <span style="font-family:'Times New Roman, serif';"> (Tel: <span > {{$healthFinance['backupphone']}} </span> ),</span>
                  as my alternate health care proxy with the same authority.  </span><span ></span>
            </span>
            @endif
            </p>
            <p  style="margin-bottom: 0.13in; "><br/>
                <br/>

            </p>
            <p  style="margin-bottom: 0.13in; "><span ><span style="font-family:'Times New Roman, serif'">My
      health care proxy is authorized to make whatever medical treatment
      decisions I could make if I were able, except that decisions
      regarding life-sustaining treatment and artificially administered
      nutrition and hydration can be made by my health care proxy or
      alternate health care proxy only as I have indicated in the foregoing
      sections.</span></span></p>
            <p  style="margin-bottom: 0.13in; "><br/>
                <br/>

            </p>
            <p  style="margin-bottom: 0.13in; "><span ><span style="font-family:'Times New Roman, serif'">If
      I fail to designate a health care proxy in this section, I am
      deliberately declining to designate a health care proxy.</span></span></p>
        </div>
      {{--  <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
            <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null && userDetails.tellUsAboutYou.fullname !== undefined">Advance Directive for Health Care of <br> {{userDetails.tellUsAboutYou.fullname}} <br></span>
            Page 3 of 6
        </div>--}}
    </div>
    <!-- Page 3-->


    <!-- Page 4-->
    <div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding: 40px;">
        <div class="docPageInner" style="box-sizing: border-box; height: 875px;">
            <p  style="margin-bottom: 0.13in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 14pt"><b>III.
      ANATOMICAL GIFTS</b></span></span></p>
            <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'">	Pursuant
      to the provisions of the Uniform Anatomical Gift Act, I direct that
      at the time of my death my entire body or designated body organs or
      body parts be donated for the purpose of:</span></p>
            <p  style="margin-bottom: 0.09in; "><span style="font-family:'Times New Roman, serif'"><b>(Initial
      all that apply)</b></span></p>
            <p  style="margin-left: 0.38in; margin-bottom: 0.09in; ">
                <span style="font-family:'Times New Roman, serif'">_______ transplantation</span></p>
            <p  style="margin-left: 0.38in; margin-bottom: 0.09in; ">
                <span style="font-family:'Times New Roman, serif'">_______ therapy</span></p>
            <p  style="margin-left: 0.38in; margin-bottom: 0.09in; ">
      <span style="font-family:'Times New Roman, serif'">_______ advancement of medical
      science or research or education.</span></p>
            <p  style="margin-left: 0.38in; margin-bottom: 0.13in; ">
      <span style="font-family:'Times New Roman, serif'">_______ advancement of dental
      science or research or education.</span></p>
            <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'">Death
      means either irreversible cessation of circulatory and respiratory
      functions or irreversible cessation of all functions of the entire
      brain, including the brain stem. I specifically donate:</span></p>
            <p  style="margin-bottom: 0.06in; "><br/>
                <br/>

            </p>
            <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'"><b>(Initial
      your choice)</b></span></p>
            <p  style="margin-left: 0.38in; margin-top: 0.01in; margin-bottom: 0.06in; ">
                <br/>

            </p>
            <p  style="margin-left: 0.38in; margin-top: 0.01in; margin-bottom: 0.06in; ">
                <span style="font-family:'Times New Roman, serif'">_______ My entire body; </span>
            </p>
            <p  style="margin-left: 0.38in; margin-top: 0.01in; margin-bottom: 0.06in; ">
                <br/>

            </p>
            <p  style="margin-left: 0.38in; margin-top: 0.01in; margin-bottom: 0.06in; ">
                <span style="font-family:'Times New Roman, serif'"><u><b>OR</b></u></span></p>
            <p  style="margin-left: 0.38in; margin-bottom: 0.06in; ">
                <br/>

            </p>
            <p  style="margin-left: 0.38in; margin-bottom: 0.06in; ">
      <span style="font-family:'Times New Roman, serif'">The following organs or body
      parts: </span>
            </p>
            <p  style="margin-left: 0.38in; margin-bottom: 0.06in; ">
                <br/>

            </p>
            <p  style="margin-top: 0.01in; margin-bottom: 0.06in; ">
      <span style="font-family:'Times New Roman, serif'">_______ lungs <span style="padding-left: 120px; display:inline-block;"></span> _______
      liver<span style="padding-left: 120px;display:inline-block;"></span>	_______ arteries</span></p>
            <p  style="margin-top: 0.01in; margin-bottom: 0.06in; ">
      <span style="font-family:'Times New Roman, serif'">_______ pancreas	<span style="padding-left: 100px;display:inline-block;"></span>_______
      heart<span style="padding-left: 120px;display:inline-block;"></span>	_______ glands</span></p>
            <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'">_______
      kidneys	<span style="padding-left: 105px;display:inline-block;"></span>_______ brain	<span style="padding-left: 120px;display:inline-block;"></span>	_______ tissue</span></p>
            <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'">_______
    skin	<span style="padding-left: 130px;display:inline-block;"></span>	_______ bones/marrow<span style="padding-left: 63px;display:inline-block;"></span>_______ eyes/cornea/lens</span></p>
            <p  style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif'">_______
      bloods/fluids<span style="padding-left: 78px;display:inline-block;"></span>_______ tissues<span style="padding-left: 113px;display:inline-block;"></span>_______ other	</span></p>
            <p  style="margin-top: 0.06in; margin-bottom: 0.13in; ">
                <br/>

            </p>
            <p  style="margin-top: 0.06in; margin-bottom: 0.13in;  text-align:center;">
      <span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 14pt"><b>IV.
      GENERAL PROVISIONS</b></span></span></p>
            <p  style="margin-bottom: 0.13in; "><span style="font-family:'Times New Roman, serif'">a.&nbsp;&nbsp;&nbsp;&nbsp;I
      understand that I must be eighteen (18) years of age or older to
      execute this form</span></p>
            <p  style="margin-bottom: 0.13in; "><span style="font-family:'Times New Roman, serif'">b.	&nbsp;&nbsp;&nbsp;&nbsp;I
      understand that my witnesses must be eighteen (18) years of age or
      older and shall not be related to me and shall not inherit from me.</span></p>
            <p  style="margin-bottom: 0.13in; "><span style="font-family:'Times New Roman, serif'">c.	&nbsp;&nbsp;&nbsp;&nbsp;I
      understand that if I have been diagnosed as pregnant and that
      diagnosis is known to my attending physician, I will be provided with
      life-sustaining treatment and artificially administered hydration and
      nutrition unless I have, in my own words, specifically authorized
      that during a course of pregnancy, life-sustaining treatment and/or
      artificially administered hydration and/or nutrition shall be
      withheld or withdrawn.</span></p>
        </div>
       {{-- <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
            <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null && userDetails.tellUsAboutYou.fullname !== undefined">Advance Directive for Health Care of <br> {{userDetails.tellUsAboutYou.fullname}} <br></span>
            Page 4 of 6
        </div>--}}
    </div>
    <!-- Page 4-->


    <!-- Page 5-->
    <div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding: 40px;">
        <div class="docPageInner" style="box-sizing: border-box; height: 875px;">
            <p  style="margin-bottom: 0.13in; "><span ><span style="font-family:'Times New Roman, serif'">d.	&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style="font-family:'Times New Roman, serif'">In
      the absence of my ability to give directions regarding the use of
      life-sustaining procedures, it is my intention that this advance
      directive shall be honored by my family and physicians as the final
      expression of my legal right to refuse medical or surgical treatment
      including, but not limited to, the administration of any
      life-sustaining procedures, and I accept the consequences of such
      choice or refusal.</span></p>
            <p  style="margin-bottom: 0.13in; "><span style="font-family:'Times New Roman, serif'">e.	&nbsp;&nbsp;&nbsp;&nbsp;This
      advance directive shall be in effect until it is revoked.</span></p>
            <p  style="margin-bottom: 0.13in; "><span style="font-family:'Times New Roman, serif'">f.	&nbsp;&nbsp;&nbsp;&nbsp;I
      understand that I may revoke this advance directive at any time.</span></p>
            <p  style="margin-bottom: 0.13in; "><span style="font-family:'Times New Roman, serif'">g.	&nbsp;&nbsp;&nbsp;&nbsp;I
      understand and agree that if I have any prior directives, and if I
      sign this advance directive, my prior directives are revoked.</span></p>
            <p  style="margin-bottom: 0.13in; "><span style="font-family:'Times New Roman, serif'">h.	&nbsp;&nbsp;&nbsp;&nbsp;I
      understand the full importance of this advance directive and I am
      emotionally and mentally competent to make this advance directive.</span></p>
            <p  style="margin-bottom: 0.13in; "><span style="font-family:'Times New Roman, serif'">i.	&nbsp;&nbsp;&nbsp;&nbsp;I
      understand that my physician(s) shall make all decisions based upon
      his or her best judgment applying with ordinary care and diligence
      the knowledge and skill that is possessed and used by members of the
      physician's profession in good standing engaged in the same field of
      practice at that time, measured by national standards.</span></p>
            <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'">j.	&nbsp;&nbsp;&nbsp;&nbsp;I
      agree to, authorize and allow full release of information by any
      government agency, medical provider, business, creditor or third
      party who may have information pertaining to my health care, to my
      agent named herein, pursuant to the Health Insurance Portability and
      Accountability Act of 1996 (HIPAA), Public Law 104-191, as amended,
      and applicable regulations.</span></p>
            <p  style="margin-bottom: 0.13in; "><br/>
                <br/>

            </p>
            <p  style="margin-bottom: 0in; "><br/>

            </p>
            <p  style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'">Signed
      this </span></span><span ><span style="font-family:'Times New Roman, serif'">____________</span></span><span ><span style="font-family:'Times New Roman, serif'">
      day of </span></span><span ><span style="font-family:'Times New Roman, serif'">_____________________________</span></span><span ><span style="font-family:'Times New Roman, serif'">,
      </span></span><span ><span style="font-family:'Times New Roman, serif'">________________</span></span><span ><span style="font-family:'Times New Roman, serif'">.</span></span></p>
            <p  style="margin-bottom: 0in; "><br/>

            </p>
            <p  style="margin-bottom: 0in; "><br/>

            </p>
            <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'">	_______________________________________</span></p>
            <p  style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
                <span ><span style="font-family:'Times New Roman, serif'">	</span></span><span style="font-family:'Times New Roman, serif'"><b>
        <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null">{{$tellUsAboutYou['fullname']}}</span>
                        <!--«</b></span><span ><span style="font-family:'Times New Roman, serif'"><b>CLIENT
                        FIRST NAME</b></span></span><span style="font-family:'Times New Roman, serif'"><b>»--></b></span></p>
            <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'">	Declarant/Principal</span></p>
            <p  style="margin-bottom: 0in; "><br/>

            </p>
            <p  style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'">	</span></span><span ><span style="font-family:'Times New Roman, serif'">____________________________</span></span><span style="font-family:'Times New Roman, serif'">
    County, Oklahoma</span></p>
            <p  style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'">
        <span style="text-transform: capitalize" >{{$tellUsAboutYou['dob']}}</span>
                        <!--«</span></span><span ><span style="font-family:'Times New Roman, serif'">Client
                        DOB</span></span><span ><span style="font-family:'Times New Roman, serif'">»--></span></span></p>
            <p  style="margin-bottom: 0in; "><br/>

            </p>
            <p  style="margin-bottom: 0in; "><br/>

            </p>
            <p  style="margin-bottom: 0in; "><br/>

            </p>
            <p  style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif'"><b>[Be
    certain to sign this Directive in the presence of two witnesses, who
    are 18 years of age or older, are not related to you, are not your
    agent or successor agent named herein, and who will not inherit from
    you.  Be certain your witnesses sign their names on the next page].</b></span></p>
        </div>
     {{--   <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
            <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null && userDetails.tellUsAboutYou.fullname !== undefined">Advance Directive for Health Care of <br> {{userDetails.tellUsAboutYou.fullname}} <br></span>
            Page 5 of 6
        </div>--}}
    </div>
    <!-- Page 5-->

    <!-- Page 6-->
    <div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding: 40px;">
        <div class="docPageInner" style="box-sizing: border-box; height: 875px;">
            <p  style="margin-bottom: 0in;  text-align:center;"><span style="font-family:'Times New Roman, serif'"><b>This
    advance directive was signed in my presence.</b></span></p>
            <p  style="margin-bottom: 0in; "><br/>

            </p>
            <p  style="margin-bottom: 0in; "><br/>

            </p>
            <p style="margin-bottom: 0in; "><br/>

            </p>
            <p style="margin-bottom: 0in; "><span ><span style="font-family:'Times New Roman, serif'"><b>WITNESS
      1</b></span></span><span ><span style="font-family:'Times New Roman, serif'">:
      ________________________________	Dated: ___________________</span></span></p>
            <p  style="text-indent: 0.5in; margin-bottom: 0.06in; ">
                <span ><span style="font-family:'Times New Roman, serif'">[signature]</span></span></p>
            <p  style="margin-bottom: 0.06in; "><span ><span style="font-family:'Times New Roman, serif'">____________________________________</span></span></p>
            <p  style="margin-bottom: 0.06in; "><span ><span style="font-family:'Times New Roman, serif'">	[name
      printed]</span></span></p>
            <p  style="margin-bottom: 0.06in; "><span ><span style="font-family:'Times New Roman, serif'">____________________________________</span></span></p>
            <p  style="margin-bottom: 0.06in; "><span ><span style="font-family:'Times New Roman, serif'">	[street
      address]</span></span></p>
            <p  style="margin-bottom: 0.06in; "><span ><span style="font-family:'Times New Roman, serif'">____________________________________</span></span></p>
            <p  style="margin-bottom: 0.06in; "><span ><span style="font-family:'Times New Roman, serif'">	[city,
      state]</span></span></p>
            <p  style="margin-bottom: 0.06in; "><br/>
                <br/>

            </p>
            <p  style="margin-bottom: 0.06in; "><br/>
                <br/>

            </p>
            <p  style="margin-bottom: 0.06in; "><span ><span style="font-family:'Times New Roman, serif'"><b>WITNESS
    2: </b></span></span><span ><span style="font-family:'Times New Roman, serif'">________________________________	Dated:
    ___________________</span></span></p>
            <p  style="text-indent: 0.5in; margin-bottom: 0.06in; ">
                <span ><span style="font-family:'Times New Roman, serif'">[signature]</span></span></p>
            <p  style="margin-bottom: 0.06in; "><span ><span style="font-family:'Times New Roman, serif'">____________________________________</span></span></p>
            <p  style="margin-bottom: 0.06in; "><span ><span style="font-family:'Times New Roman, serif'">	[name
    printed]</span></span></p>
            <p  style="margin-bottom: 0.06in; "><span ><span style="font-family:'Times New Roman, serif'">____________________________________</span></span></p>
            <p  style="margin-bottom: 0.06in; "><span ><span style="font-family:'Times New Roman, serif'">	[street
    address]</span></span></p>
            <p  style="margin-bottom: 0.06in; "><span ><span style="font-family:'Times New Roman, serif'">____________________________________</span></span></p>
            <p  style="margin-bottom: 0.06in; "><span ><span style="font-family:'Times New Roman, serif'">	[city,
    state]</span></span></p>
        </div>
       {{-- <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
            <span style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null && userDetails.tellUsAboutYou.fullname !== undefined">Advance Directive for Health Care of <br> {{userDetails.tellUsAboutYou.fullname}} <br></span>
            Page 6 of 6
        </div>--}}
    </div>
    <!-- Page 6-->


</div>

</body>
</html>
