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
<div style="text-align: justify">
    <div>
        <div>
            <p align="center" style="margin-bottom: 0in;  ">
        <span size="4" style="font-size: 13pt">
          <span style="font-family:'Times New Roman, serif'">
            <span size="5" style="font-size: 19pt">
              <span size="4" style="font-size: 16pt"><b>WYOMING DURABLE POWER OF ATTORNEY <br>FOR HEALTH CARE</b></span>
            </span>
          </span>
        </span>
            </p>

            <p align="center" style="margin-bottom: 0in;  "><br/>

            </p>
            <p class="western" align="justify" style="margin-bottom: 0.08in;  ; orphans: 0; widows: 0">
                <span ><b>(1) DESIGNATION OF AGENT.</b></span><span >	</span><span >I,</span>

              <span color="#0000ff">
                  @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                    <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
                  @else
                    <b>________________________________</b>
                  @endif
                  ,
              </span>

                <span> of </span>

                @if(isset($tellUsAboutYou) && array_key_exists('address',$tellUsAboutYou) && !is_null($tellUsAboutYou['address']))
                    <span style="font-family:'Times New Roman, serif'" >{{$tellUsAboutYou['address']}}</span>
                @else
                    <span>_________________________________________________________________
                    ___________________________________________________________________________________________
                    _________________________________________________________________________________</span>
                @endif
                ,
                @if(isset($tellUsAboutYou) && array_key_exists('city',$tellUsAboutYou) && !is_null($tellUsAboutYou['city']))
                    <span style="text-transform: capitalize">{{$tellUsAboutYou['city']}}</span>
                @else
                    <span style="text-transform: capitalize">(city)_____________</span>
                @endif
                ,

                @if(isset($tellUsAboutYou) && array_key_exists('state',$tellUsAboutYou) && !is_null($tellUsAboutYou['state']))
                    <span style="text-transform: capitalize">{{$tellUsAboutYou['state']}}</span>
                @else
                    <span style="text-transform: capitalize">(state)_____________</span>
                @endif
                ,
                <span > hereby appoint my </span>

                @if(isset($healthFinance) && array_key_exists('relation',$healthFinance) && !is_null($healthFinance['relation'])  && $healthFinance['relation'] == 'Other')
                    <span style="font-family:'Times New Roman, serif'">{{$healthFinance['relationOther']}}</span>
                @elseif (isset($healthFinance) && array_key_exists('relation',$healthFinance) && !is_null($healthFinance['relation']) && $healthFinance['relation'] != 'Other')
                    <span style="font-family:'Times New Roman, serif'">{{$healthFinance['relation']}}</span>
                @else
                    <span>(relation)______________</span>
                @endif
                ,

                @if(isset($healthFinance) && array_key_exists('fullname',$healthFinance) && !is_null($healthFinance['fullname']))
                <span style="font-family:'Times New Roman, serif'">{{$healthFinance['fullname']}}</span>
                @else
                <span style="font-family:'Times New Roman, serif'">_____________________________</span>
                @endif
                ,
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

                <span >)
                as my agent to consent to, or reject, or to withdraw consent for any
                medical care, treatment, service or procedure.</span>
            </p>

            <p  style="margin-bottom: 0in;  ; text-align:justify;">

        @if(isset($healthFinance) && array_key_exists('anyBackupAgent',$healthFinance) && !is_null($healthFinance['anyBackupAgent']) && $healthFinance['anyBackupAgent'] == true)
        <span >
          <span  style="font-size: 12pt">If
          my primary agent is not willing, able, or reasonably available to
          make a health care decision for me, then I designate my </span>

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


          <span  style="font-size: 12pt">),

              as my alternate agent to make health care decisions for me as
              authorized in this document.</span>
              <span  style="font-size: 12pt">&nbsp;</span>
          </span>
        @endif
            </p>
            <p  style="margin-bottom: 0in;  ; text-align:justify;"><span   ><span  style="font-size: 12pt"><b>(2)
              AGENT AUTHORITY.</b></span><span  style="font-size: 12pt">
              My agent is authorized to make health care decisions for me,
              including decisions to provide, withhold or withdraw artificial
              nutrition and hydration and all other forms of health care to keep me
              alive, except as I state here:</span></span>
            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 150%">
                _____________________________________________________________________________<br>
                _____________________________________________________________________________<br>
                _____________________________________________________________________________<br>
                _____________________________________________________________________________<br>_____________________________________________________________________________<br>
                _____________________________________________________________________________<br>_____________________________________________________________________________<br>
                _____________________________________________________________________________<br>_____________________________________________________________________________<br>
                _____________________________________________________________________________<br>
            </p>
            <p  style="margin-bottom: 0in;  ; text-align:justify;"><span   ><span  style="font-size: 10pt"><i>(Attach
                additional sheets if needed).</i></span></span></p>

            <p class="western"  style="margin-bottom: 0in;  ; text-align:justify;">
                <b>(3)  WHEN AGENT’S AUTHORITY BECOMES EFFECTIVE.  </b>My agent’s
                authority becomes effective when my primary physician or supervising
                health care provider determines that I lack the capacity to make my
                own health care decisions unless I initial the following box. If I
                initial this box <b>[ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]</b>, my agent’s authority to make health
                care decisions for me takes effect immediately.
            </p>
        </div>

    </div>

    <div >
        <div >
            <p class="western"  style="margin-bottom: 0in;  ; text-align:justify;">
                <b>(4)  AGENT’S OBLIGATION.</b>  My agent shall make health care
                decisions for me in accordance with this Power of Attorney for Health
                Care, any instructions I give in Part 2 of this form, and my other
                wishes to the extent known to my agent. To the extent my wishes are
                unknown, my agent shall make health care decisions for me in
                accordance with what my agent determines to be in my best interest.
                In determining my best interest, my agent shall consider my personal
                values to the extent known to my agent.</p>

            <p class="western" style="margin-bottom: 0in; page-break-before: always;"><b>(5)
                    NOMINATION OF GUARDIAN.  </b>If a guardian of my person needs to be
                appointed for me by a court, <i>(please initial one of the
                    following)</i>:
            </p>

            <p class="western" style="margin-bottom: 0in;  "><strong>[&nbsp;&nbsp;&nbsp;&nbsp;]</strong>
                I nominate the agent(s) whom I named in this form in the order
                designated to act as guardian.
            </p>

            <p class="western" style="margin-bottom: 0in;  "><strong>[&nbsp;&nbsp;&nbsp;&nbsp;]</strong>
                I nominate the following to be guardian in the order designated:
            </p>

            <p class="western" style="margin-left: 0.5in; text-indent: 0.5in; margin-bottom: 0in;  ">
                ___________________________________________________________
            </p>
            <p class="western" style="margin-left: 1in; margin-bottom: 0in;  ">
                (name, address and phone of individual designated as guardian)
            </p>

            <p class="western" style="margin-left: 1in; margin-bottom: 0in;  ">
                ___________________________________________________________
            </p>
            <p class="western" style="margin-left: 1in; margin-bottom: 0in;  ">
                (name, address and phone of alternate designated as guardian)
            </p>
            <p class="western" style="margin-left: 1in; margin-bottom: 0in;  ">
                ___________________________________________________________
            </p>
            <p class="western" style="margin-left: 1in; margin-bottom: 0in;  ">
                (name, address and phone of second alternate designated as guardian)
            </p>

            <p class="western" style="margin-bottom: 0in;  "><strong>[&nbsp;&nbsp;&nbsp;&nbsp;]</strong>
                I do not nominate anyone to be guardian.</p>

            <p style="margin-bottom: 0in;  "><span   ><span  style="font-size: 12pt"><b>(6)
              HIPAA WAIVER AND MEDICAL RECORDS RELEASE.  </b></span><span  style="font-size: 12pt">Subject
              to any limitations in this document, my agent has the power and
              authority to do all of the following:</span></span></p>

            <p align="justify" style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0.09in;  ">
              <span   ><span  style="font-size: 12pt">(a)</span><span  style="font-size: 12pt">	</span><span  style="font-size: 12pt">Request,
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
              authority in writing and deliver it to my health care provider.</span></span>
            </p>
            <p align="justify" style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0.09in;  ">
              <span   ><span  style="font-size: 12pt">(b)</span><span  style="font-size: 12pt">	</span><span  style="font-size: 12pt">Execute
              on my behalf any releases or other documents that may be required in
              order to obtain this information;</span></span>
            </p>
            <p align="justify" style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in;  ">
              <span   ><span  style="font-size: 12pt">(c)</span><span  style="font-size: 12pt">	</span><span  style="font-size: 12pt">Consent
              to the disclosure of this information.</span></span>
            </p>

            <p  style="margin-bottom: 0in;  ; text-align:justify;"><span   ><span  style="font-size: 12pt"><b>(7)</b></span><span  style="font-size: 12pt"><b>
                PRIOR POWERS REVOKED.</b></span><span  style="font-size: 12pt">
                </span><span  style="font-size: 12pt">I revoke any prior
                advance health care directive and any prior durable power of attorney
                for health care.</span><span  style="font-size: 12pt">&nbsp;</span></span>
            </p>

            <p  style="margin-bottom: 0in; page-break-before: always; text-align:justify;"><span   ><span  style="font-size: 12pt"><b>(8)
              EFFECT OF COPY.</b></span><span  style="font-size: 12pt"><b>
              </b></span><span  style="font-size: 12pt"> </span><span  style="font-size: 12pt">Persons
              dealing with my agent may rely fully on a photocopy of this document
              as though the photocopy was an original.</span><span  style="font-size: 12pt">&nbsp;</span></span>
            </p>

            <p align="center" style="margin-bottom: 0in;  "><span   ><span  style="font-size: 12pt"><b>SIGNATURE
                AND ACKNOWLEDGEMENT</b></span></span></p>

            <p class="western" align="justify" style="margin-bottom: 0.08in;  ; orphans: 0; widows: 0">
                I, <span color="#0000ff">

            @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                 <b>{{$tellUsAboutYou['fullname']}}</b>
            @else
                <b>(fullname)________________________________</b>
            @endif


            </span>

                the principal, sign my name to this instrument and do hereby declare
                that I am eighteen years of age or older, of sound mind, and under no
                undue constraint or influence.</p>

            <p  style="margin-bottom: 0in;  ; text-align:justify;"><span   ><span  style="font-size: 12pt">Date:
                </span><span  style="font-size: 12pt">_______________</span><span  style="font-size: 12pt">	</span></span></p>

            <p  style="margin-bottom: 0in;  ; text-align:justify;"><span   ><span  style="font-size: 12pt">Signature:
                </span><span  style="font-size: 12pt">__________________________________</span></span></p>
            <p class="western" align="justify" style="margin-bottom: 0.08in;  ; orphans: 0; widows: 0">
              <span color="#0000ff">
                  @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                      <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
                  @else
                      <b>(fullname)________________________________</b>
                  @endif
              </span>
            </p>

            <p  style="margin-bottom: 0in;  ; text-align:justify;"><span ><span   ><span ><span  style="font-size: 12pt">STATE
                OF WYOMING	</span></span><span style="padding-right: 65px;"></span><span ><span  style="font-size: 12pt;">)</span></span></span></span></p>
            <p align="justify" style="margin-left: 1.88in; text-indent: 0.5in; margin-bottom: 0in;  ">
              <span   ><span  style="font-size: 12pt">)
              ss.</span><span  style="font-size: 12pt">&nbsp;</span></span></p>
                    <p  style="margin-bottom: 0in;  ; text-align:justify;"><span color="#008f00"><span   ><span ><span  style="font-size: 12pt">COUNTY
              OF ________________</span></span><span ><span  style="font-size: 12pt">	</span></span><span ><span  style="font-size: 12pt">)</span></span></span></span></p>
            <p  style="margin-bottom: 0in;  ; text-align:justify;"><br/>

            </p>
            <p class="western" align="justify" style="margin-bottom: 0.08in;  ; orphans: 0; widows: 0">
                Signed and sworn to before me by
              <span color="#0000ff">
                  @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                      <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
                  @else
                      <b>(fullname)________________________________</b>
                  @endif
              </span>, the principal, this _____ day of
              <span   ><span  style="font-size: 12pt"> _________________________ </span><span  style="font-size: 12pt">,
                </span><span  style="font-size: 12pt"> _______________ </span><span  style="font-size: 12pt">.</span></span></p>

            <p  style="margin-bottom: 0in;  ; text-align:justify;"><span   ><span  style="font-size: 12pt">	</span><span  style="font-size: 12pt">______________________________________</span></span></p>
            <p  style="margin-bottom: 0in;  ; text-align:justify;"><span   ><span  style="font-size: 12pt">	</span><span  style="font-size: 12pt">NOTARY PUBLIC</span></span></p>
        </div>

    </div>




    <div >
        <div>
            <p align="center" style="margin-bottom: 0.13in;  ; page-break-before: always">
              <span  style="font-size: 10pt"><span  style="font-size: 12pt"><b>STATEMENT
              OF WITNESSES</b></span></span></p>
            <p class="western" align="justify" style="margin-bottom: 0.08in;  ; orphans: 0; widows: 0">
                I declare under penalty of perjury under the laws of Wyoming that

                @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                    <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
                @else
                    <b>(fullname)________________________________</b>
                @endif
                {{--<b style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null">{{userDetails.tellUsAboutYou.fullname}}</b>
                <b *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null">(fullname)________________________________</b>--}}

               <span style="letter-spacing: 0.1pt">,
               </span>the person who signed or acknowledged this document, is
                personally known to me to be the principal, that

                <span>{{isset($tellUsAboutYou) && array_key_exists('gender',$tellUsAboutYou) && !is_null($tellUsAboutYou['gender']) && $tellUsAboutYou['gender'] == 'M' ? 'he' : (isset($tellUsAboutYou) && array_key_exists('gender',$tellUsAboutYou) && !is_null($tellUsAboutYou['gender']) && $tellUsAboutYou['gender'] == 'F' ? 'she' : 'he/she')}}</span>
                {{--<span>he/she</span>--}}

                signed or acknowledged this durable power
                of attorney in my presence, that
                <span>{{isset($tellUsAboutYou) && array_key_exists('gender',$tellUsAboutYou) && !is_null($tellUsAboutYou['gender']) && $tellUsAboutYou['gender'] == 'M' ? 'he' : (isset($tellUsAboutYou) && array_key_exists('gender',$tellUsAboutYou) && !is_null($tellUsAboutYou['gender']) && $tellUsAboutYou['gender'] == 'F' ? 'she' : 'he/she')}}</span>
                {{--<span>he/she</span>--}}
                appears to be of sound mind and under no
                duress, fraud or undue influence; that I am not the person appointed
                as agent by this document, and I am not the person appointed as agent
                by this document, and that I am not a treating health care provider,
                an employee of a treating health care provider, the operator of a
                community care facility, and employee of an operator of a community
                care facility, the operator of a residential care facility, nor an
                employee of an operator of a residential care facility.</p>
            <p  style="margin-bottom: 0in;  ; text-align:justify;"><br/>

            </p>
            <p  style="margin-bottom: 0in;  ; text-align:justify;"><br/>

            </p>
            <p class="western" style="margin-bottom: 0in;  "><span ><b>WITNESS
              1</b></span><span >: </span><span > ____________________ </span><span style="padding-left: 50px;">	Dated:
              </span><span > ______________________ </span></p>
            <p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0.06in;  ">
                <span style="padding-left: 50px;">[signature]</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in;  ; padding-top: 15px;">
                <span > ____________________________ </span><span >		</span><span style="padding-left: 122px;"> ______________________ </span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in;  ">
                <span style="padding-left: 60px;">	[name printed]</span><span style="padding-left: 240px;">[street address]</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in;  ; padding:25px 0 0 350px;">
                <span >							</span><span > ______________________ </span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in;  ; padding-left: 350px;">
                <span style="padding-left: 40px;">								[city, state, zip]</span></p>
            <p class="western" style="margin-bottom: 0in;  "><br/>

            </p>
            <p class="western" style="margin-bottom: 0in;  "><br/>

            </p>
            <p class="western" style="margin-bottom: 0in;  "><span ><b>WITNESS
              2</b></span><span >: </span><span > ____________________ </span><span style="padding-left: 50px;">	Dated:
              </span><span > ______________________ </span></p>
            <p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0.06in;  ">
                <span style="padding-left: 50px;">[signature]</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in;  ; padding-top: 15px;">
                <span > ____________________________ </span><span >		</span><span style="padding-left: 122px;"> ______________________ </span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in;  ">
                <span style="padding-left: 60px;">	[name printed]</span><span style="padding-left: 240px;">[street address]</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in;  ; padding:25px 0 0 350px;">
                <span >							</span><span > ______________________ </span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in;  ; padding-left: 350px;">
                <span style="padding-left: 40px;">								[city, state, zip]</span></p>
        </div>

    </div>




    <div>
        <div>
            <p align="center" style="margin-bottom: 0in;  ; page-break-before: always">
      <span size="4" style="font-size: 13pt">
        <span style="font-family:'Times New Roman, serif'">
          <span size="5" style="font-size: 18pt">
            <span size="4" style="font-size: 16pt">
              <b>WYOMING DECLARATION (LIVING WILL)</b>
            </span>
          </span>
        </span>
      </span>
            </p>

            <p  style="margin-bottom: 0in;  ; text-align:justify;"><span ><span   ><span ><span  style="font-size: 12pt">DECLARATION
              made this </span></span><span ><span  style="font-size: 12pt"> _________ </span></span><span ><span  style="font-size: 12pt">
              day of </span></span><span ><span  style="font-size: 12pt"> ______________________ </span></span><span ><span  style="font-size: 12pt">,
              </span></span><span ><span  style="font-size: 12pt"> __________ </span></span><span ><span  style="font-size: 12pt">.</span></span></span></span>
            </p>

            <p class="western" align="justify" style="margin-bottom: 0.08in;  ; orphans: 0; widows: 0">
                        I,
              <span color="#0000ff">
                  @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                      <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
                  @else
                      <b>(fullname)________________________________</b>
                  @endif
                  {{--<b style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null">{{userDetails.tellUsAboutYou.fullname}}</b>
                  <b *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null">________________________________</b>--}}
              </span>

                ,
                being of sound mind, willfully, and voluntarily make known my desire
                that, if at any time I should have an incurable injury, disease or
                other illness certified to be a terminal condition by two (2)
                physicians who have personally examined me, and preferably one (1) of
                whom shall be my attending physician, and the physicians have
                determined that my death will occur whether or not life-sustaining
                procedures are utilized and where the application of life-sustaining
                procedures would serve only to artificially prolong the dying
                process, I direct the following with respect to such procedures and
                treatment:</p>

            <p class="western" style="margin-bottom: 0in;  "><b>(9)
                    END-OF-LIFE DECISIONS.</b> I direct that my health-care providers and
                others involved in my care provide, withhold, or withdraw treatment
                in accordance with the choice I have initialed below:</p>

            <p class="western" style="margin-bottom: 0in;  "><strong>[&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]</strong>	(a) Choice Not To Prolong Life</p>

            <p class="western" style="margin-bottom: 0in;  ">I do
                not want my life to be prolonged if (i) I have an incurable and
                irreversible condition that will result in my death within a
                relatively short time, (ii) I become unconscious and, to a reasonable
                degree of medical certainty, I will not regain consciousness, or
                (iii) the likely risks and burdens of treatment would outweigh the
                expected benefits,
            </p>

            <p class="western" style="margin-bottom: 0in;  "><b>OR
                </b>
            </p>

            <p class="western" style="margin-bottom: 0in;  "><strong>[&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]</strong>
                (b) Choice To Prolong Life
            </p>

            <p class="western" style="margin-bottom: 0in;  ">I
                want my life to be prolonged as long as possible within the limits of
                generally accepted health-care standards.</p>

            <p class="western" style="margin-bottom: 0in;  "><b>(10)
                    ARTIFICIAL NUTRITION AND HYDRATION.</b> Artificial nutrition and
                hydration must be provided, withheld, or withdrawn in accordance with
                the choice I have made in paragraph (6) unless I initial the
                following box.
            </p>

            <p class="western" style="margin-bottom: 0in;  "><strong>[&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]</strong>	<b>Artificial Nutrition.</b>  If I initial this box, artificial
                nutrition must be provided regardless of my condition and regardless
                of the choice I have made in paragraph(6).
            </p>

            <p class="western" style="margin-bottom: 0in;  "><strong>[&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]</strong>	<b>Artificial Hydration.</b>  If I initial this box <strong>[&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]</strong>,
                artificial hydration must be provided regardless of my condition and
                regardless of the choice I have made in paragraph(6).
            </p>
        </div>

    </div>

    <div>
        <div>
            <p class="western" style="margin-bottom: 0in;  "><b>(11)
                    RELIEF FROM PAIN.</b> Except as I state in the following space, I
                direct that treatment for alleviation of pain or discomfort be
                provided at all times:
            </p>

            <p align="justify" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
                <span   ><span  style="font-size: 12pt">________________________________________________________________________</span></span></p>
            <p align="justify" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
                <span   ><span  style="font-size: 12pt">________________________________________________________________________</span></span></p>
            <p align="justify" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
                <span   ><span  style="font-size: 12pt">________________________________________________________________________</span></span></p>
            <p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
                <span   ><span  style="font-size: 12pt">________________________________________________________________________</span></span></p>
            <p align="justify" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
                <span   ><span  style="font-size: 12pt">________________________________________________________________________</span></span></p>

            <p align="justify" style="margin-bottom: 0.09in; page-break-before: always"><span   ><span  style="font-size: 12pt"><b>(12)
                OTHER WISHES.</b></span><span  style="font-size: 12pt">
                Additional, specific directions (if any):</span></span>
            </p>
            <p align="justify" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
                <span   ><span  style="font-size: 12pt">________________________________________________________________________</span></span></p>
            <p align="justify" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
                <span   ><span  style="font-size: 12pt">________________________________________________________________________</span></span></p>
            <p align="justify" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
                <span   ><span  style="font-size: 12pt">________________________________________________________________________</span></span></p>

            <p  style="margin-bottom: 0in;  ; text-align:justify;"><span   ><span  style="font-size: 12pt"><b>(13)
                ORGAN DONATION.  </b></span><span  style="font-size: 12pt">Upon
                death (initial applicable box): </span></span>
            </p>

            <p  style="margin-bottom: 0in;  ; text-align:justify;"><span   ><span  style="font-size: 12pt"><strong>[&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]</strong>	(a) I give my body, </span><span  style="font-size: 12pt"><b>OR</b></span><span  style="font-size: 12pt">
                </span></span>
            </p>

            <p  style="margin-bottom: 0in;  ; text-align:justify;"><span   ><span  style="font-size: 12pt"><strong>[&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]</strong> 	(b) I give any needed organs, tissues, or parts, </span><span  style="font-size: 12pt"><b>OR</b></span><span  style="font-size: 12pt">
                </span></span>
            </p>

            <p align="justify" style="margin-left: 0.54in; text-indent: -0.54in; margin-bottom: 0in;  ">
                <span   ><span  style="font-size: 12pt"><strong>[&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]</strong>	(c) I give the following organs, tissues, or parts only </span></span>
            </p>

            <p align="justify" style="margin-left: 1in; margin-bottom: 0in;  ">
                <span   ><span  style="font-size: 12pt">____________________________________________________________,
                </span><span  style="font-size: 12pt"><b>OR</b></span></span></p>

            <p align="justify" style="margin-left: 0.45in; margin-bottom: 0in;  ">
                <span   ><span  style="font-size: 12pt">(d)
                I decline to make an anatomical gift (organ donation) upon my death.</span></span></p>

            <p  style="margin-bottom: 0in;  ; text-align:justify;"><span   ><span  style="font-size: 12pt">If
                I elect above to make an anatomical gift, my gift is for the
                following purposes (</span><span  style="font-size: 12pt"> strike </span><span  style="font-size: 12pt">
                any of the following you </span><span  style="font-size: 12pt"> do
                not </span><span  style="font-size: 12pt"> want): </span></span>
            </p>

            <p align="justify" style="text-indent: 0.5in; margin-bottom: 0in;  ">
                <span   ><span  style="font-size: 12pt">(i)
                Any purpose authorized by law; </span></span>
            </p>
            <p align="justify" style="text-indent: 0.5in; margin-bottom: 0in;  ">
                <span   ><span  style="font-size: 12pt">(ii)
                Transplantation; </span></span>
            </p>
            <p align="justify" style="text-indent: 0.5in; margin-bottom: 0in;  ">
                <span   ><span  style="font-size: 12pt">(iii)
                Therapy; </span></span>
            </p>
            <p align="justify" style="text-indent: 0.5in; margin-bottom: 0in;  ">
                <span   ><span  style="font-size: 12pt">(iv)
                Research; </span></span>
            </p>
            <p align="justify" style="text-indent: 0.5in; margin-bottom: 0in;  ">
                <span   ><span  style="font-size: 12pt">(v)
                Medical education.</span></span></p>
        </div>

    </div>

    <div>
        <div>
            <p  style="margin-bottom: 0in;  ; text-align:justify;"><span   ><span  style="font-size: 12pt">In
              the absence of my ability to give directions regarding the use of
              life-sustaining procedures, it is my intention that this declaration
              shall be honored by my family and physician(s) and agent as the final
              expression of my legal right to refuse medical or surgical treatment
              and accept the consequences from this refusal. I understand the full
              import of this declaration and I am emotionally and mentally
              competent to make this declaration.</span></span>
            </p>

            <p  style="margin-bottom: 0in;  ; text-align:justify;"><span   ><span  style="font-size: 12pt">Date:
                </span><span  style="font-size: 12pt"> ___________________ </span><span  style="font-size: 12pt">	</span></span></p>

            <p  style="margin-bottom: 0in;  ; text-align:justify;"><span   ><span  style="font-size: 12pt">Signature:
                </span><span  style="font-size: 12pt"> ____________________________________ </span></span></p>
            <p class="western" align="justify" style="margin-bottom: 0.08in;  ; orphans: 0; widows: 0">
                <span color="#0000ff">
                    @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                        <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
                    @else
                        <b>(fullname)________________________________</b>
                    @endif
                    {{--<b style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null">{{userDetails.tellUsAboutYou.fullname}}</b>
                    <b *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null">________________________________</b>--}}
                </span>
            </p>
            <p  style="margin-bottom: 0in;  ; text-align:justify;"><br/>

            </p>
            <p  style="margin-bottom: 0in;  ; text-align:justify;"><br/>

            </p>

            <p class="western" align="center" style="margin-bottom: 0in; page-break-before: always; ">
                <b>STATEMENT OF WITNESSES</b></p>
            <p class="western" align="center" style="margin-bottom: 0in;  ">
                <br/>

            </p>
            <p class="western" align="justify" style="margin-bottom: 0.08in;  ; orphans: 0; widows: 0">


                <span color="#0000ff">
                    @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                        <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
                    @else
                        <b>(fullname)________________________________</b>
                    @endif
                 {{-- <b style="text-transform: capitalize" *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null">{{userDetails.tellUsAboutYou.fullname}}</b>
                  <b *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null">________________________________</b>--}}
                </span>

                <span style="letter-spacing: 0.1pt">,</span>

                the declarant, has been personally known to me and I believe
              {{--  <span *ngIf="genderTxt !== null">{{genderTxt}}</span>
                <span *ngIf="genderTxt === null">(him/her)______</span>--}}
                <span>{{isset($tellUsAboutYou) && array_key_exists('gender',$tellUsAboutYou) && !is_null($tellUsAboutYou['gender']) && $tellUsAboutYou['gender'] == 'M' ? 'he' : (isset($tellUsAboutYou) && array_key_exists('gender',$tellUsAboutYou) && !is_null($tellUsAboutYou['gender']) && $tellUsAboutYou['gender'] == 'F' ? 'she' : 'he/she')}}</span>
                to be of
                sound mind. I did not sign the declarant’s signature above for or
                at the direction of the declarant. I am not related to the declarant
                by blood or marriage, entitled to any portion of the estate of the
                declarant according to the laws of intestate succession or under any
                will of the declarant or codicil thereto, or directly financially
                responsible for the declarant’s medical care.</p>
            <p class="western" style="margin-bottom: 0in;  "><br/>

            </p>

            <p class="western" style="margin-bottom: 0in;  "><br/>

            </p>
            <p class="western" style="margin-bottom: 0in;  "><span ><b>WITNESS
              1</b></span><span >: </span><span > ____________________ </span><span style="padding-left: 50px;">	Dated:
              </span><span > ______________________ </span></p>
            <p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0.06in;  ">
                <span style="padding-left: 50px;">[signature]</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in;  ; padding-top: 15px;">
                <span > ____________________________ </span><span >		</span><span style="padding-left: 122px;"> ______________________ </span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in;  ">
                <span style="padding-left: 60px;">	[name printed]</span><span style="padding-left: 240px;">[street address]</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in;  ; padding:25px 0 0 350px;">
                <span >							</span><span > ______________________ </span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in;  ; padding-left: 350px;">
                <span style="padding-left: 40px;">								[city, state, zip]</span></p>
            <p class="western" style="margin-bottom: 0in;  "><br/>

            </p>
            <p class="western" style="margin-bottom: 0in;  "><br/>

            </p>
            <p class="western" style="margin-bottom: 0in;  "><span ><b>WITNESS
              2</b></span><span >: </span><span > ____________________ </span><span style="padding-left: 50px;">	Dated:
              </span><span > ______________________ </span></p>
            <p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0.06in;  ">
                <span style="padding-left: 50px;">[signature]</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in;  ; padding-top: 15px;">
                <span > ____________________________ </span><span >		</span><span style="padding-left: 122px;"> ______________________ </span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in;  ">
                <span style="padding-left: 60px;">	[name printed]</span><span style="padding-left: 240px;">[street address]</span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in;  ; padding:25px 0 0 350px;">
                <span >							</span><span > ______________________ </span></p>
            <p class="western" align="justify" style="margin-bottom: 0.06in;  ; padding-left: 350px;">
                <span style="padding-left: 40px;">								[city, state, zip]</span></p>
        </div>

      </div>
    </div>
</body>
</html>
