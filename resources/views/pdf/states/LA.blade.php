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

            <p class="western"  style="text-align:center;margin-bottom: 0in; line-height: 100%">
      <span size="4" style="font-size: 16pt"><b>Louisiana Durable Health
        Care Power of Attorney</b></span></p>
            <p class="western"  style="text-align:center;margin-bottom: 0in; line-height: 100%">
                <span size="4" style="font-size: 16pt"><b>and Declaration</b></span></p>
            <p class="western"  style="text-align:center;margin-bottom: 0.13in; line-height: 100%">



            </p>
            <p class="western"  style="text-align:center;margin-bottom: 0in; line-height: 100%">
                <span size="4" style="font-size: 14pt"><b>Personal Information</b></span></p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">


            </p>
            <p class="western"  style="text-align:center;margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
                <span color="#000000">Name: 	</span>
                @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                    <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
                @else
                    <b>________________________________</b>
                @endif
            </p>
            <p class="western"  style="text-align:center;margin-bottom: 0in; line-height: 100%">
                Date of Birth:
                @if(isset($tellUsAboutYou) && array_key_exists('dob',$tellUsAboutYou) && !is_null($tellUsAboutYou['dob']))
                    <span>{{$tellUsAboutYou['dob']}}</span>
                @else
                    <span>________________________________</span>
                @endif
            </p>
            <p class="western"  style="text-align:center;margin-bottom: 0in; line-height: 100%">
                Address:
                @if(isset($tellUsAboutYou) && array_key_exists('address',$tellUsAboutYou) && !is_null($tellUsAboutYou['address']))
                    <span style="font-family:'Times New Roman, serif'" >{{$tellUsAboutYou['address']}}</span>
                @else
                    <span>_________________________________________________________________
                    ___________________________________________________________________________________________
                    _________________________________________________________________________________</span>
                @endif
            </p>
            <p class="western"  style="text-align:center;margin-bottom: 0in; line-height: 100%">
                Address:
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
                <span >, </span>
                @if(isset($tellUsAboutYou) && array_key_exists('zip',$tellUsAboutYou) && !is_null($tellUsAboutYou['zip']))
                    <span style="text-transform: capitalize">{{$tellUsAboutYou['zip']}}</span>
                @else
                    <span style="text-transform: capitalize">(zip)_____________</span>
                @endif
            </p>
            <p class="western"  style="text-align:center;margin-bottom: 0in; line-height: 100%">
              <span color="#000000">Telephone:
                  @if(isset($tellUsAboutYou) && array_key_exists('phone',$tellUsAboutYou) && !is_null($tellUsAboutYou['phone']))
                      <span style="text-transform: capitalize">{{$tellUsAboutYou['phone']}}</span>
                  @else
                      <span style="text-transform: capitalize">(phone)_____________</span>
                  @endif
              </span>
            </p>
            <p class="western"  style="text-align:center;margin-bottom: 0in; line-height: 100%">


            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western"  style="text-align:center;margin-bottom: 0in; line-height: 100%">


            </p>
            <p class="western"  style="text-align:center;margin-bottom: 0in; line-height: 100%">
                <span size="4" style="font-size: 14pt"><b>PART 1: POWER OF ATTORNEY</b></span></p>
            <p class="western"  style="text-align:center;margin-bottom: 0in; line-height: 100%">


            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">
                1. 	I,
              <span color="#000000">
                @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                      <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
                  @else
                      <b>________________________________</b>
                  @endif
              </span>
              <span color="#000000">,
                hereby appoint the following person as my agent to make health care
                decisions for me if I become unable to make my own health decisions:
              </span>
            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western"  style="text-align:justify;margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
                <span color="#000000">Name:
                    @if(isset($healthFinance) && array_key_exists('fullname',$healthFinance) && !is_null($healthFinance['fullname']))
                        <span style="text-transform: capitalize">{{$healthFinance['fullname']}}</span>
                    @else
                        <span> _______________________ </span>
                    @endif
                </span></p>
            <p class="western"  style="text-align:justify;margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
              <span color="#000000">Relation:
                  @if(isset($healthFinance) && array_key_exists('relation',$healthFinance) && !is_null($healthFinance['relation'])  && $healthFinance['relation'] == 'Other')
                      <span style="font-family:'Times New Roman, serif'">{{$healthFinance['relationOther']}}</span>
                  @elseif (isset($healthFinance) && array_key_exists('relation',$healthFinance) && !is_null($healthFinance['relation']) && $healthFinance['relation'] != 'Other')
                      <span style="font-family:'Times New Roman, serif'">{{$healthFinance['relation']}}</span>
                  @else
                      <span>(relation)______________</span>
                  @endif
              </span>
            </p>
            <p class="western"  style="text-align:justify;margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
              <span color="#000000">Phone #:
                  @if(isset($healthFinance) && array_key_exists('phone',$healthFinance) && !is_null($healthFinance['phone']))
                      <span style="font-family:'Times New Roman, serif'">{{$healthFinance['phone']}}</span>
                  @else
                      <span>__________________</span>
                  @endif
              </span>
            </p>
            <p class="western"  style="text-align:justify;margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
              <span color="#000000">Address:
                  @if(isset($healthFinance) && array_key_exists('address',$healthFinance) && !is_null($healthFinance['address']))
                      <span style="font-family:'Times New Roman, serif'">{{$healthFinance['address']}}, </span>
                  @else
                      <span>_________________________________________________________________
                        _______________________________________________________________________________,
                    </span>
                  @endif
              </span>
            </p>
            <p class="western"  style="text-align:justify;margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
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
            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>

            @if(isset($healthFinance) && array_key_exists('anyBackupAgent',$healthFinance) && !is_null($healthFinance['anyBackupAgent']) && $healthFinance['anyBackupAgent'] == true)
            <div>
                <p class="western" style="margin-bottom: 0.09in; line-height: 100%">If
                    the person named above is not available or is unable to act as my
                    agent, I appoint the following person to serve as my alternate agent:</p>
                <p class="western"  style="text-align:justify;margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
                    <span color="#000000">Name:
                        @if(isset($healthFinance) && array_key_exists('backupFullname',$healthFinance) && !is_null($healthFinance['backupFullname']))
                            <span style="text-transform: capitalize"> {{$healthFinance['backupFullname'] !== null && $healthFinance['backupFullname'] !== undefined ? $healthFinance['backupFullname'] : '_______________________'}} </span>
                        @else
                            <span > _______________________ </span>
                        @endif
                    </span>
                </p>
                <p class="western"  style="text-align:justify;margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
                  <span color="#000000">Relation:
                      @if(isset($healthFinance) && array_key_exists('backupRelation',$healthFinance) && !is_null($healthFinance['backupRelation']) && $healthFinance['backupRelation'] == 'Other')
                          <span>{{$healthFinance['backupRelation']}}</span>
                      @elseif(isset($healthFinance) && array_key_exists('backupRelation',$healthFinance) && !is_null($healthFinance['backupRelation']) && $healthFinance['backupRelation'] != 'Other')
                          <span>{{$healthFinance['backupRelation']}}</span>
                      @else
                          <span>(relation)______________</span>
                      @endif
                  </span>
                </p>
                <p class="western"  style="text-align:justify;margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
                  <span color="#000000">Phone #:
                      @if(isset($healthFinance) && array_key_exists('backupphone',$healthFinance) && !is_null($healthFinance['backupphone']))
                          <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupphone']}}</span>
                      @else
                          <span>__________________</span>
                      @endif
                  </span>
                </p>
                <p class="western"  style="text-align:justify;margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
                  <span color="#000000">Address:
                      @if(isset($healthFinance) && array_key_exists('backupAddress',$healthFinance) && !is_null($healthFinance['backupAddress']))
                          <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupAddress']}}, </span>
                      @else
                          <span>
                              _________________________________________________________________
                              _______________________________________________________________________________,
                          </span>
                      @endif
                  </span>
                </p>
                <p class="western"  style="text-align:justify;margin-left: 0.88in; text-indent: 0.13in; margin-bottom: 0in; line-height: 100%">
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
                </p>
            </div>
            @endif
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">
                2.	My agent has, without limitation as to other health care powers,
                the following specific powers that I have marked below:</p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
        </div>
        @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Health Care Power of Attorney and Declaration of {{$tellUsAboutYou['fullname']}}<br>
                Page 1 of 7
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Health Care Power of Attorney and Declaration of «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 1 of 7
            </div>
        @endif
    </div>
    <!-- !Page 1 -->

    <!-- Page 2 -->
    <div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding: 40px;">
        <div class="docPageInner"
             style="box-sizing: border-box; height: 890px;">


            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">
                □  A. Grant, refuse, or withdraw consent on my behalf for any
                health care&nbsp;service, treatment or procedure, even though my
                death may ensue.&nbsp;</p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">
                □  B. Talk to health care personnel, get information, have access
                to medical records and sign forms necessary to carry out these
                decisions.&nbsp;</p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">
                □  C. Authorize my admission to or discharge from any hospital,
                nursing home,&nbsp;residential care, assisted living or similar
                facility or service.&nbsp;</p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">
                □  D. Contract on my behalf for any health-care related services or
                facility&nbsp;(without my agent incurring personal financial
                liability for such contracts) such as&nbsp;surgery, medical expenses
                and prescriptions.&nbsp;</p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">
                □  E. Make decisions regarding surgery, medical expenses and
                prescriptions.&nbsp;</p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">
                3. 	With this document, I intend to create a durable power of
                attorney for health&nbsp;care, which shall take effect upon and only
                during any period in which, in the opinion of&nbsp;my attending
                physician, I am unable to make or communicate a choice regarding
                a&nbsp;particular health-care decision. My agent shall make
                health-care decisions as I direct&nbsp;below or as I make known to
                him/her in some other way. If my agent is unable to&nbsp;determine
                the choice I would want to make, then my agent shall make a choice
                for me&nbsp;based upon what my agent believes to be in my best
                interest.&nbsp;</p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">
                4. 	With this document, I authorize any person, organization, or
                entity&nbsp;involved with my health care to disclose and release to
                my agent any and all of my&nbsp;individually identifiable health
                information and medical records in accordance with&nbsp;HIPAA.&nbsp;</p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">5.
                <b>SPECIAL PROVISIONS AND LIMITATIONS. </b>
            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">I do
                NOT want the following&nbsp;treatments:&nbsp;


            </p>
            <p class="western"  style="text-align:justify;text-indent: 0.5in; margin-bottom: 0.09in; line-height: 200%">
                ________________________________________________________________________</p>
            <p class="western"  style="text-align:justify;margin-bottom: 0.09in; line-height: 200%">
                ________________________________________________________________________</p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 200%">
                ________________________________________________________________________</p>
            <p class="western"  style="margin-bottom: 0in; line-height: 100%">
                &nbsp;<span size="2" style="font-size: 10pt"><i>(Attach additional
      sheets if needed.)</i></span></p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">
                6. 	To the extent that I am permitted by law to do so, I herewith
                nominate my&nbsp;agent to serve as the curator of my person, and/or
                in any similar representative&nbsp;capacity. If I am not permitted by
                law to make a nomination, then I request in the&nbsp;strongest
                possible terms that any court consider this nomination.&nbsp;</p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
        </div>
        @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Health Care Power of Attorney and Declaration of {{$tellUsAboutYou['fullname']}}<br>
                Page 2 of 7
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Health Care Power of Attorney and Declaration of «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 2 of 7
            </div>
        @endif
    </div>
    <!-- !Page 2 -->

    <!-- Page 3 -->
    <div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding: 40px;">
        <div class="docPageInner"
             style="box-sizing: border-box; height: 890px;">


            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">
                7. 	No person who relies in good faith upon representations by my
                agent or&nbsp;alternate agent shall be liable to me, my estate, my
                heirs or assigns for recognizing the&nbsp;agent’s authority.&nbsp;</p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">
                8. 	The powers delegated under this power of attorney are separable,
                so that the&nbsp;invalidity of one or more powers shall not affect
                any others.&nbsp;</p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%"><b>BY
                    MY SIGNATURE I INDICATE THAT I UNDERSTAND THE PURPOSE AND&nbsp;</b></p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%"><b>EFFECT
                    OF THIS DOCUMENT.</b></p>
            <p class="western" style="margin-bottom: 0in; line-height: 200%">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 200%">I
                sign my name to this form on&nbsp;this <u>		</u> day of <u>			</u>,
                <u>		</u>, at <u>
                    (City), 			</u>(State).</p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%"><b>_______________________________________&nbsp;</b></p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%"><b>(Signature)&nbsp;</b></p>
            <p class="western"  style="text-align:justify;margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
                @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                    <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
                @else
                    <b>________________________________</b>
                @endif
            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western"  style="text-align:center;margin-bottom: 0in; line-height: 100%">


            </p>
            <p class="western"  style="text-align:center;margin-bottom: 0in; line-height: 100%">
                <b>NOTARIZATION</b></p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">STATE
                OF&nbsp;LOUISIANA	)</p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">				)
                ss</p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">PARISH
                OF&nbsp;			)</p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western"  style="text-align:justify;margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
                I, a Notary Public in and for the State and&nbsp;Parish aforesaid, do
                hereby certify that
                @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                    <span>{{$tellUsAboutYou['fullname']}}</span>
                @else
                    <span>________________________________</span>
                @endif
                personally
                came and appeared before me as the Principal, and executed the
                foregoing Durable Power of Attorney for Health-Care in said State and
                Parish, and acknowledged said Durable Power of Attorney for
                Health-Care as the Principal’s voluntary act.&nbsp;</p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-left: 2.5in; margin-bottom: 0in; line-height: 100%">
                Witness my signature this ______ day of, ______.&nbsp;</p>
            <p class="western" style="margin-left: 2.5in; margin-bottom: 0in; line-height: 100%">


            </p>
            <p class="western" style="margin-left: 2.5in; margin-bottom: 0in; line-height: 100%">


            </p>
            <p class="western" style="margin-left: 2.5in; margin-bottom: 0in; line-height: 100%">
                ______________________________&nbsp;</p>
            <p class="western" style="margin-left: 2.5in; margin-bottom: 0in; line-height: 100%">
                NOTARY PUBLIC&nbsp;</p>
        </div>
        @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Health Care Power of Attorney and Declaration of {{$tellUsAboutYou['fullname']}}<br>
                Page 3 of 7
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Health Care Power of Attorney and Declaration of «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 3 of 7
            </div>
        @endif
    </div>
    <!-- !Page 3 -->


    <!-- Page 4 -->
    <div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding: 40px;">
        <div class="docPageInner"
             style="box-sizing: border-box; height: 890px;">


            <p class="western"  style="text-align:center;margin-bottom: 0in; line-height: 100%; page-break-before: always">
                <b>WITNESSES</b></p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western"  style="text-align:justify;margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
                @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                    <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
                @else
                    <b>________________________________</b>
                @endif
                the
                person who signed or acknowledged this document, is personally known
                to&nbsp;me and I believe him/her to be of sound mind.&nbsp;</p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%"><i>First
                    Witness:&nbsp;</i></p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%"><span color="#000000"><b>WITNESS
      1</b></span><span color="#000000">: </span><span color="#000000"><u>					</u></span><span color="#000000">	Dated:
    </span><span color="#000000"><u>				</u></span></p>
            <p class="western"  style="text-align:justify;text-indent: 0.5in; margin-bottom: 0.06in; line-height: 100%">
                <span color="#000000">[signature]</span></p>
            <p class="western"  style="text-align:justify;margin-bottom: 0.06in; line-height: 100%">
                <span color="#000000"><u>					</u></span><span color="#000000">		</span><span color="#000000"><u>						</u></span></p>
            <p class="western"  style="text-align:justify;margin-bottom: 0.06in; line-height: 100%">
                <span color="#000000">	[name printed]						[street address]</span></p>
            <p class="western"  style="text-align:justify;margin-bottom: 0.06in; line-height: 100%">
                <span color="#000000">							</span><span color="#000000"><u>						</u></span></p>
            <p class="western"  style="text-align:justify;margin-bottom: 0.06in; line-height: 100%">
                <span color="#000000">								[city, state, zip]</span></p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%"><i>Second
                    Witness:&nbsp;</i></p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%"><span color="#000000"><b>WITNESS
      2</b></span><span color="#000000">: </span><span color="#000000"><u>					</u></span><span color="#000000">	Dated:
    </span><span color="#000000"><u>				</u></span></p>
            <p class="western"  style="text-align:justify;text-indent: 0.5in; margin-bottom: 0.06in; line-height: 100%">
                <span color="#000000">[signature]</span></p>
            <p class="western"  style="text-align:justify;margin-bottom: 0.06in; line-height: 100%">
                <span color="#000000"><u>					</u></span><span color="#000000">		</span><span color="#000000"><u>						</u></span></p>
            <p class="western"  style="text-align:justify;margin-bottom: 0.06in; line-height: 100%">
                <span color="#000000">	[name printed]						[street address]</span></p>
            <p class="western"  style="text-align:justify;margin-bottom: 0.06in; line-height: 100%">
                <span color="#000000">							</span><span color="#000000"><u>						</u></span></p>
            <p class="western"  style="text-align:justify;margin-bottom: 0.06in; line-height: 100%">
                <span color="#000000">								[city, state, zip]</span></p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western"  style="text-align:center;margin-bottom: 0in; line-height: 100%">


            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
        </div>
        @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Health Care Power of Attorney and Declaration of {{$tellUsAboutYou['fullname']}}<br>
                Page 4 of 7
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Health Care Power of Attorney and Declaration of «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 4 of 7
            </div>
        @endif
    </div>
    <!-- !Page 4 -->

    <!-- Page 5 -->
    <div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding: 40px;">
        <div class="docPageInner"
             style="box-sizing: border-box; height: 890px;">


            <p class="western"  style="text-align:center;margin-bottom: 0in; line-height: 100%; page-break-before: always">
      <span size="4" style="font-size: 14pt"><b>PART 2: “LIVING WILL”
        DECLARATION</b></span></p>
            <p class="western"  style="text-align:center;margin-bottom: 0in; line-height: 100%">


            </p>
            <p class="western"  style="text-align:center;margin-bottom: 0in; border: 1px solid #00000a; padding: 0.01in 0.06in; line-height: 100%">


            </p>
            <p class="western"  style="text-align:center;margin-bottom: 0in; border: 1px solid #00000a; padding: 0.01in 0.06in; line-height: 100%">
      <span style="font-family:Times New Roman, serif"><span size="2" style="font-size: 10pt"><b>INSTRUCTIONS
        FOR &quot;LIVING WILL&quot; DECLARATION</b></span></span></p>
            <p class="western"  style="text-align:center;margin-bottom: 0in; border: 1px solid #00000a; padding: 0.01in 0.06in; line-height: 100%">
      <span style="font-family:Times New Roman, serif"><span size="2" style="font-size: 10pt">(R.S.
        40: 1151 </span></span><span style="font-family:Times New Roman, serif"><span size="2" style="font-size: 10pt"><i>et
      seq</i></span></span><span style="font-family:Times New Roman, serif"><span size="2" style="font-size: 10pt">.)</span></span></p>
            <p class="western"  style="text-align:center;margin-bottom: 0in; border: 1px solid #00000a; padding: 0.01in 0.06in; line-height: 100%">


            </p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; border: 1px solid #00000a; padding: 0.01in 0.06in; line-height: 100%">
      <span style="font-family:Times New Roman, serif"><span size="2" style="font-size: 10pt">Per
        R.S. 40: l 151 </span></span><span style="font-family:Times New Roman, serif"><span size="2" style="font-size: 10pt"><i>et
      seq</i></span></span><span style="font-family:Times New Roman, serif"><span size="2" style="font-size: 10pt">.
      the Secretary of State’s Office has established a registry in which
      a person, or his attorney, if authorized by the person to do so, may
      register the original, multiple original, or a certified copy of the
      declaration. The filing fee is $20.00 to register the Declaration and
      receive a laminated identification card and ID bracelet. The filing
      fee for a revocation is $5.00. If a certified copy is requested from
      this office, there is an additional fee of $10.00. Mail the
      declaration, with the filing fee, to: Secretary of State, Attn:
      Publications, P.O. Box 94125, Baton Rouge, LA 70804-9125.</span></span></p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; border: 1px solid #00000a; padding: 0.01in 0.06in; line-height: 100%">


            </p>
            <p class="western"  style="text-align:center;margin-bottom: 0in; line-height: 100%">


            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">Declaration
                made this <u>	</u> day of <u>			</u>, <u>		</u>.</p>
            <p class="western"  style="text-align:justify;text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">


            </p>
            <p class="western"  style="text-align:justify;text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">


            </p>
            <p class="western"  style="text-align:justify;margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
                I,
                @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                    <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
                @else
                    <b>________________________________</b>
                @endif,
                being of sound mind, willfully and voluntarily make known my desire
                that my dying shall not be artificially prolonged under the
                circumstances set forth below and do hereby declare:
            </p>
            <p class="western"  style="text-align:justify;text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">


            </p>
            <p class="western"  style="text-align:justify;text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
                If at any time I should have an incurable injury, disease or illness
                , or be in a continual</p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">
                profound comatose state with no reasonable chance of recovery,
                certified to be a terminal and</p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">
                irreversible condition by two physicians who have personally examined
                me, one of whom shall be my attending physician , and the physicians
                have determined that my death will occur whether or not
                life-sustaining procedures are utilized and where the application of
                life-sustaining procedure would serve only to prolong artificially
                the dying process , I direct:
            </p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">


            </p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">
                <b>(Initial ONE only)</b></p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">


            </p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">
                _______ That all life-sustaining procedures, including nutrition and
                hydration, be withheld or
            </p>
            <p class="western"  style="text-align:justify;margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
                withdrawn so that food and water will not be administered invasively.</p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">


            </p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">
                <b>OR</b></p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">


            </p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">
                _______ That life-sustaining procedures, except nutrition and
                hydration, be withheld or withdrawn
            </p>
            <p class="western"  style="text-align:justify;text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
                so that food and water can be administered invasively.
            </p>
            <p class="western"  style="text-align:justify;text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">


            </p>
            <p class="western"  style="text-align:justify;text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">


            </p>
            <p class="western"  style="text-align:justify;text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
                I further direct that I be permitted to die naturally with only the
                administration of medication or the performance of any medical
                procedure deemed necessary to provide me with</p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">
                comfort care.</p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
        </div>
        @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Health Care Power of Attorney and Declaration of {{$tellUsAboutYou['fullname']}}<br>
                Page 5 of 7
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Health Care Power of Attorney and Declaration of «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 5 of 7
            </div>
        @endif
    </div>
    <!-- !Page 5 -->

    <!-- Page 6 -->
    <div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding: 40px;">
        <div class="docPageInner"
             style="box-sizing: border-box; height: 890px;">


            <p class="western"  style="text-align:justify;text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
                In the absence of my ability to give directions regarding the use of
                such life-sustaining</p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">
                procedures, it is my intention that this declaration shall be honored
                by my family and physician(s) as the final expression of my legal
                right to refuse medical or surgical treatment and accept the
                consequences from such refusal.</p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">


            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">ADDITIONAL
                INSTRUCTIONS:&nbsp;


            </p>
            <p class="western"  style="text-align:justify;text-indent: 0.5in; margin-bottom: 0.09in; line-height: 200%">
                ________________________________________________________________________</p>
            <p class="western"  style="text-align:justify;margin-bottom: 0.09in; line-height: 100%">
                ________________________________________________________________________</p>
            <p class="western"  style="text-align:center;margin-bottom: 0in; line-height: 100%">
                &nbsp;<span size="2" style="font-size: 10pt"><i>(Attach additional
      sheets if needed.)</i></span></p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">


            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">
                <b>ORGAN DONATION (OPTIONAL):  </b>Initial the line next to the
                statement below that best reflects your wishes. You do not have to
                initial any of the statements. If you do not initial any of the
                statements, your guardian, agent, or family may have the authority to
                make a gift of all or part of your body under Louisiana law.</p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">
                <b>(Initial ONE only)</b></p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">_______
                I do not want to make an organ or tissue donation and I do not want
                my guardian,
            </p>
            <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
                agent, or family to do so.
            </p>
            <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">


            </p>
            <p class="western" style="margin-left: 0.5in; text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
                <b>OR</b></p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">_______
                I have already signed a written agreement or donor card regarding
                organ and tissue
            </p>
            <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
                donation with the following individual or institution:
            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-left: 0.5in; text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
                Name of individual/institution: ____________________
            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-left: 0.5in; text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
                <b>OR</b></p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">_______
                Pursuant to Louisiana law, I hereby give, effective on my death:
            </p>
            <p class="western" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">


            </p>
            <p class="western" style="margin-left: 0.5in; text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
      <span size="2" style="font-size: 10pt">_____Any needed organ or
        parts. </span>
            </p>
            <p class="western" style="margin-left: 0.5in; text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">


            </p>
            <p class="western" style="margin-left: 0.5in; text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
      <span size="2" style="font-size: 10pt">_____The following part or
        organs listed below: </span>
            </p>
            <p class="western" style="margin-left: 0.5in; text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">


            </p>
            <p class="western" style="margin-left: 1.5in; text-indent: 0.5in; margin-bottom: 0in; line-height: 200%">
                <span size="2" style="font-size: 10pt">________________________________________</span></p>
            <p class="western" style="margin-left: 1in; text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
                For <b>(initial one)</b>:
            </p>
            <p class="western" style="margin-left: 1in; text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">


            </p>
            <p class="western" style="margin-left: 1in; text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
      <span size="2" style="font-size: 10pt">_____ Any legally authorized
        purpose. </span>
            </p>
            <p class="western" style="margin-left: 1in; text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">


            </p>
        </div>
        @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Health Care Power of Attorney and Declaration of {{$tellUsAboutYou['fullname']}}<br>
                Page 6 of 7
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Health Care Power of Attorney and Declaration of «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 6 of 7
            </div>
        @endif
    </div>
    <!-- !Page 6 -->

    <!-- Page 7 -->
    <div class="docPage" style="margin: 20px 0; box-sizing: border-box; padding: 40px;">
        <div class="docPageInner"
             style="box-sizing: border-box; height: 890px;">
            <p class="western" style="margin-bottom: 0in; line-height: 100%">ADDITIONAL
                INSTRUCTIONS:&nbsp;


            </p>
            <p class="western"  style="text-align:justify;text-indent: 0.5in; margin-bottom: 0.09in; line-height: 200%">
                ________________________________________________________________________</p>
            <p class="western"  style="text-align:justify;margin-bottom: 0.09in; line-height: 200%">
                ________________________________________________________________________</p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">
                ________________________________________________________________________</p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">
                &nbsp;<span size="2" style="font-size: 10pt"><i>(Attach additional
      sheets if needed.)</i></span></p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western"  style="text-align:justify;text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
                <b>I understand the full import of this declaration and I am
                    emotionally and mentally</b></p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">
                <b>competent to make this declaration.</b></p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">
                Date:		<u>				</u>
            </p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">


            </p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">
                Signature: 	<u>				</u>		</p>
            <p class="western"  style="text-align:justify;margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
                @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                    <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
                @else
                    <b>________________________________</b>
                @endif
            </p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">
                City and Parish:	<u>				</u>
            </p>
            <p class="western"  style="text-align:justify;margin-left: 0.56in; text-indent: 0.44in; margin-bottom: 0.13in; line-height: 100%">



            </p>
            <p class="western"  style="text-align:justify;margin-left: 0.56in; text-indent: 0.44in; margin-bottom: 0.13in; line-height: 100%">



            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%"><b>The
                    declarant has been personally known to me and I believe him or her to
                    be of sound mind. I am not related by blood or marriage to the
                    declarant. I am not entitled to any portion of the declarant's
                    estate.</b></p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%"><a name="_GoBack"></a>


            </p>
            <p class="western"  style="text-align:justify;margin-bottom: 0in; line-height: 100%">


            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%"><span color="#000000"><span size="2" style="font-size: 10pt"><b>WITNESS
                  1</b></span></span><span color="#000000"><span size="2" style="font-size: 10pt">:
                </span></span><span color="#000000"><span size="2" style="font-size: 10pt"><u>					</u></span></span><span color="#000000"><span size="2" style="font-size: 10pt">	Dated:
                </span></span><span color="#000000"><span size="2" style="font-size: 10pt"><u>				</u></span></span></p>
            <p class="western"  style="text-align:justify;text-indent: 0.5in; margin-bottom: 0.06in; line-height: 100%">
                <span color="#000000"><span size="2" style="font-size: 10pt">[signature]</span></span></p>
            <p class="western"  style="text-align:justify;margin-bottom: 0.06in; line-height: 100%">
                <span color="#000000"><span size="2" style="font-size: 10pt"><u>					</u></span></span><span color="#000000"><span size="2" style="font-size: 10pt">		</span></span><span color="#000000"><span size="2" style="font-size: 10pt"><u>						</u></span></span></p>
            <p class="western"  style="text-align:justify;margin-bottom: 0.06in; line-height: 100%">
              <span color="#000000"><span size="2" style="font-size: 10pt">	[name
                printed]						[street address]</span></span></p>
            <p class="western"  style="text-align:justify;margin-bottom: 0.06in; line-height: 100%">
                <span color="#000000"><span size="2" style="font-size: 10pt">							</span></span><span color="#000000"><span size="2" style="font-size: 10pt"><u>						</u></span></span></p>
            <p class="western"  style="text-align:justify;margin-bottom: 0.06in; line-height: 100%">
              <span color="#000000"><span size="2" style="font-size: 10pt">								[city,
                state, zip]</span></span></p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%"><span color="#000000"><span size="2" style="font-size: 10pt"><b>WITNESS
                  2</b></span></span><span color="#000000"><span size="2" style="font-size: 10pt">:
                </span></span><span color="#000000"><span size="2" style="font-size: 10pt"><u>					</u></span></span><span color="#000000"><span size="2" style="font-size: 10pt">	Dated:
                </span></span><span color="#000000"><span size="2" style="font-size: 10pt"><u>				</u></span></span></p>
            <p class="western"  style="text-align:justify;text-indent: 0.5in; margin-bottom: 0.06in; line-height: 100%">
                <span color="#000000"><span size="2" style="font-size: 10pt">[signature]</span></span></p>
            <p class="western"  style="text-align:justify;margin-bottom: 0.06in; line-height: 100%">
                <span color="#000000"><span size="2" style="font-size: 10pt"><u>					</u></span></span><span color="#000000"><span size="2" style="font-size: 10pt">		</span></span><span color="#000000"><span size="2" style="font-size: 10pt"><u>						</u></span></span></p>
            <p class="western"  style="text-align:justify;margin-bottom: 0.06in; line-height: 100%">
              <span color="#000000"><span size="2" style="font-size: 10pt">	[name
                printed]						[street address]</span></span></p>
            <p class="western"  style="text-align:justify;margin-bottom: 0.06in; line-height: 100%">
                <span color="#000000"><span size="2" style="font-size: 10pt">							</span></span><span color="#000000"><span size="2" style="font-size: 10pt"><u>						</u></span></span></p>
            <p class="western"  style="text-align:justify;margin-bottom: 0.06in; line-height: 100%">
              <span color="#000000"><span size="2" style="font-size: 10pt">								[city,
                state, zip]</span></span></p>

        </div>
        @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Health Care Power of Attorney and Declaration of {{$tellUsAboutYou['fullname']}}<br>
                Page 7 of 7
            </div>
        @else
            <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Durable Health Care Power of Attorney and Declaration of «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
                Page 7 of 7
            </div>
        @endif
    </div>
    <!-- !Page 7 -->

</div>

</body>
</html>
