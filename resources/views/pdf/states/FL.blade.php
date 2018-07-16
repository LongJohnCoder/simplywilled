<!DOCTYPE html>
<html>
<head>
	<title></title>
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
<div>
	<!-- step 1 -->
<div class="docPage" style="page-break-after: always;">
  <div id="doc" class="docPageInner" style="">
      <p align="center" style="margin-bottom: 0in; margin-top: 0;"><span style="font:font-family;"><b>FLORIDA DESIGNATION OF HEALTH CARE SURROGATE</b></span></p>

      <p align="justify" style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
      </p>

      <p align="justify" style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
      <span style="font-family: 'Times New Roman', serif">I,

        <span style="font:font-family;"><b>{{$tellUsAboutYou['fullname']}}</b></span>
        designate as my health care surrogate under S. 765.202, Florida Statutes:

      </span></p>



      <p style=" margin-bottom: 0.1in; ">
        <span>
          <span style="font-family: 'Times New Roman', serif">
          <span  style="font-size: 9pt"><span ><span  style="font-size: 12pt">Name:</span></span><span ><span  style="font-size: 12pt">

          </span> </span>
          <span  style="font-size: 12pt">{{strtoupper($healthFinance['fullname'])}}</span>

          </span>
          </span>
        </span>
      </p>

      <p align="justify" style="">
      <span>
        <span style="font-family: 'Times New Roman', serif">
          <span  style="font-size: 9pt">
            <span >
              <span  style="font-size: 12pt">
                Address:
              </span>
            </span>
            <span style="font-size: 12pt">{{$healthFinance['address']}} </span>
          </span>

          <span style="font-size: 12pt">{{$healthFinance['city']}}, </span>

          <span style="font-size: 12pt">{{$healthFinance['state']}}, </span>

          <span style="font-size: 12pt">{{$healthFinance['zip']}}</span>

        </span>
      </span>
      </p>


        <span>
          <span style="font-family: 'Times New Roman', serif">
            <span  style="font-size: 9pt">
              <span >
                <span  style="font-size: 12pt">
                  Telephone:
                </span>
              </span>
              <span style="font-size: 12pt">{{$healthFinance['phone']}}</span>
            </span>
          </span>
        </span>



      	@if($healthFinance['anyBackupAgent'] == 'true')
		<p align="justify" style="margin-top: 0.13in; margin-bottom: 0.09in; ">
		<span style="font-family: 'Times New Roman', serif">
		  <span  style="font-size: 9pt">
		    <span  style="font-size: 12pt">If my health care surrogate is not willing, able, or reasonably
		available to perform his or her duties, I designate as my alternate
		health care surrogate:
		    </span>
		  </span>
		</span>
		</p>

		<p align="justify" style="margin-left: 0.38in; margin-bottom: 0.03in; ">
		<span>
		<span style="font-family: 'Times New Roman', serif">
		  <span  style="font-size: 9pt">
		    <span>
		      <span  style="font-size: 12pt">Name:</span>
		    </span>
		    <span >
		      <span  style="font-size: 12pt">

		      </span>
		    </span>

		    <span style="font-size: 12pt">{{strtoupper($healthFinance['backupFullname'])}}</span>

		  </span>
		</span>
		</span>
		</p>

	    <p align="justify" style="margin-left: 0.38in; margin-bottom: 0.03in; ">
	      <span>
	        <span style="font-family: 'Times New Roman', serif">
	          <span  style="font-size: 9pt">
	              <span>
	                <span  style="font-size: 12pt">Address:</span>
	              </span>
	              <span>
	                <span  style="font-size: 12pt">		</span>
	              </span>

	              <span style="font-size: 12pt">{{$healthFinance['backupAddress']}}</span>
	          </span>
	        </span>
	      </span>
	    </p>

	    <p style="margin-bottom: 0in; "><span >			</span>
	      <span style="font-family: 'Times New Roman', serif">
	      </span>
	      <span>
	        <span style="font-size: 12pt">{{$healthFinance['backupCity']}}</span>
	      </span>

	      <span>
	        <span style="font-family: 'Times New Roman', serif">{{$healthFinance['backupState']}}</span>
	      </span>

	      <span>
	        <span style="font-family: 'Times New Roman', serif">{{$healthFinance['backupZip']}}</span>

	      </span>
	    </p>

    	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; ">
      	<span>
        <span style="font-family: 'Times New Roman', serif">
          <span  style="font-size: 9pt">
            <span >
              <span  style="font-size: 12pt">
                Telephone:
              </span>
            </span>
            <span >
              <span  style="font-size: 12pt">	</span>
            </span>

            <span style="font-size: 12pt">{{$healthFinance['backupphone']}}</span>
            </span>
          </span>
        </span>
      	</p>

      	<p align="justify" style="margin-bottom: 0in; ">
          <br><br>
      	</p>


  		@endif

      <p align="center" style="margin-top: 0.13in; margin-bottom: 0.13in; ">
      <span style="font-family: 'Times New Roman', serif; font-size: 12pt;"><b>INSTRUCTIONS
      FOR HEALTH CARE</b></span></p>
      <p align="justify" style="margin-bottom: 0.09in; "><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span  style="font-size: 12pt">I
      authorize my health care surrogate to:</span></span></span></p>
      <p align="justify" style="margin-left: 0.75in; text-indent: -0.75in; margin-bottom: 0in; ">
      <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span  style="font-size: 12pt">_________</span><span  style="font-size: 12pt">	</span><span  style="font-size: 12pt"><b>(INITIALS)</b></span><span  style="font-size: 12pt">
      </span><span  style="font-size: 12pt">Receive any of my
      health information, whether oral or recorded in any form or</span><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span  style="font-size: 12pt">
      medium, that:</span></span></span></span></span></p>

      <p align="justify" style="margin-left: 0.75in; margin-top: 0.06in; margin-bottom: 0.06in; ">
      <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span  style="font-size: 12pt">1.</span><span  style="font-size: 12pt">	</span><span  style="font-size: 12pt">Is
      created or received by a health care provider, health care facility,
      health plan, public health authority, employer, life insurer, school
      or university, or health care clearinghouse; and</span></span></span></p>
      <p align="justify" style="margin-left: 0.75in; margin-bottom: 0in; ">
      <span  style="font-size: 12pt">2.</span><span  style="font-size: 12pt">Relates
      to my past, present, or future physical or mental health or
      condition; the provision of health care to me; or the past, present,
      or future payment for the provision of health care to me.</span></p>

      <p align="justify" style="margin-top: 0.13in; margin-bottom: 0.09in; ">
      <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 12pt">I
      further authorize my health care surrogate to:</span></span></p>
      <p align="justify" style="margin-left: 0.75in; text-indent: -0.75in; margin-bottom: 0in; ">
      <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span  style="font-size: 12pt">_________</span><span  style="font-size: 12pt">	</span><span  style="font-size: 12pt"><b>(INITIALS)</b></span><span  style="font-size: 12pt">
      </span><span  style="font-size: 12pt">Make all health care
      decisions for me, which means he or she has the authority to:
<br>
<br>
1. Provide informed consent, refusal of consent, or withdrawal of consent to any
      and all of my health care, including life-prolonging procedures.
      </span><span  style="font-size: 12pt">&nbsp;</span></span></span></p>

  </div>
</div>
<!-- step 1 -ends -->

<!-- step 2 -->
<div class="docPage" style="page-break-after: always;">
    <div id="doc" class="docPageInner" style="">
        <p align="justify" style="margin-left: 0.75in; margin-top: 0.06in; margin-bottom: 0.06in; ">
        <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span  style="font-size: 12pt">2.</span><span  style="font-size: 12pt">	</span><span  style="font-size: 12pt">Apply
        on my behalf for private, public, government, or veterans’ benefits
        to defray the cost of health care.</span></span></span></p>
        <p align="justify" style="margin-left: 0.75in; margin-top: 0.06in; margin-bottom: 0.06in; ">
        <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span  style="font-size: 12pt">3.</span><span  style="font-size: 12pt">	</span><span  style="font-size: 12pt">Access
        my health information reasonably necessary for the health care
        surrogate to make decisions involving my health care and to apply for
        benefits for me.</span></span></span></p>
        <p align="justify" style="margin-left: 0.75in; margin-bottom: 0in; ">
        <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span  style="font-size: 12pt">4.</span><span  style="font-size: 12pt">	</span><span  style="font-size: 12pt">Decide
        to make an anatomical gift pursuant to part V of chapter 765, Florida
        Statutes.</span></span></span></p>
        <p align="justify" style="margin-left: 1.5in; text-indent: -0.75in; margin-top: 0.13in; margin-bottom: 0in; ">
        <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span  style="font-size: 12pt"><b>_________
        (INITIALS)</b></span><span  style="font-size: 12pt"><b>	</b></span></span></span></p>
        <p align="justify" style="margin-left: 1.5in; text-indent: -0.75in; margin-top: 0.13in; margin-bottom: 0in; ">
        <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span  style="font-size: 12pt">Specific
        instructions and restrictions:</span><span  style="font-size: 12pt">	</span></span></span></p>
        <p align="justify" style="margin-left: 1.5in; text-indent: -0.5in; margin-top: 0.13in; margin-bottom: 0in; ">
        <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span  style="font-size: 12pt">______________________________________________________	</span></span></span></p>
        <p align="justify" style="margin-bottom: 0in; ">

        </p>
        <p align="justify" style="margin-left: 0.75in; margin-bottom: 0in; ">
        <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span  style="font-size: 12pt">	</span><span  style="font-size: 12pt">______________________________________________________</span></span></span></p>
        <p align="justify" style="margin-left: 0.75in; margin-top: 0.13in; margin-bottom: 0.13in; ">
        <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span  style="font-size: 12pt">	</span><span  style="font-size: 12pt">______________________________________________________</span></span></span></p>
        <p align="justify" style="margin-bottom: 0in; "><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span  style="font-size: 12pt">While
        I have decision-making capacity, my wishes are controlling and my
        physicians and health care providers must clearly communicate to me
        the treatment plan or any change to the treatment plan prior to its
        implementation.</span></span></span></p>
        <p align="justify" style="margin-top: 0.13in; margin-bottom: 0.13in; ">
        <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span  style="font-size: 12pt">To
        the extent I am capable of understanding, my health care surrogate
        shall keep me reasonably informed of all decisions that he or she has
        made on my behalf and matters concerning me.</span></span></span></p>
        <p align="justify" style="margin-bottom: 0.13in; "><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span  style="font-size: 12pt">This
        health care surrogate designation is not affected by my subsequent
        incapacity except as provided in Chapter 765, Florida Statutes.</span></span></span></p>
        <p align="justify" style="margin-bottom: 0.06in; "><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span  style="font-size: 12pt">Pursuant
        to section 765.104, Florida Statutes, I understand that I may, at any
        time while I retain my capacity, revoke or amend this designation by:</span></span></span></p>
        <p align="justify" style="margin-left: 0.38in; margin-bottom: 0.06in; ">
        <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span  style="font-size: 12pt">1.
        signing a written and dated instrument which expresses my intent to
        amend or revoke this designation;</span></span></span></p>
        <p align="justify" style="margin-left: 0.38in; margin-bottom: 0.06in; ">
        <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span  style="font-size: 12pt">2.
        physically destroying this designation through my own action or by
        that of another person in my presence and under my direction;</span></span></span></p>
        <p align="justify" style="margin-left: 0.38in; margin-bottom: 0.06in; ">
        <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span  style="font-size: 12pt">3.
        verbally expressing my intention to amend or revoke this
        designation; or,</span></span></span></p>
        <p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; ">
        <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span  style="font-size: 12pt">4.
        signing a new designation that is materially different from this
        designation.</span></span></span></p>
        <p align="justify" style="margin-top: 0.13in; margin-bottom: 0.06in; ">
        <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span  style="font-size: 12pt">My
        health care surrogate’s authority becomes effective when my primary
        physician determines that i am unable to make my own health care
        decisions unless i initial either or both of the following boxes:</span></span></span></p>
        <p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; ">
        <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span  style="font-size: 12pt"><b>
        If
        I initial this box [________], my health care surrogate’s authority
        to receive my health information takes effect immediately.</b></span></span></span></p>
        <p align="justify" style="margin-left: 0.38in; margin-top: 0.06in; margin-bottom: 0.13in; ">


        </p>
    </div>
</div>
<!-- step 2 -ends -->

<!-- step 3 -->
<div class="docPage" style="page-break-after: always;">
    <div id="doc" class="docPageInner" style="">
        <p align="justify" style="margin-left: 0.38in; margin-top: 0.06in; margin-bottom: 0.13in; ">
            <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span  style="font-size: 12pt">
              <b>If
            I initial this box [________], my health care surrogate’s authority
            to make health care decisions for me takes effect immediately.
            Pursuant to section 765.204(3), Florida Statutes, any instructions or
            health care decisions I make, either verbally or in writing, while I
            possess capacity shall supersede any instructions or health care
            decisions made by my surrogate that are in material conflict with
            those made by me.
            </b></span></span></span>
          </p>
            <p align="justify" style="margin-bottom: 0in; ">
            </p>

            <p align="justify" style="margin-bottom: 0in; ">Executed on this ________ day of __________, ____________, in _______________________ County in Florida.</p>
            <p align="justify" style="margin-bottom: 0in; ">
            </p>

            <p align="justify" style="text-indent: 0.5in; margin-bottom: 0in; ">
            <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span  style="font-size: 12pt">_______________________________________</span></span></span></p>
            <p align="justify" style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
            <span style="font-family: 'Times New Roman', serif"><b></b></span>

            <span>
              <span style="font-family: 'Times New Roman', serif">
                <b>
                    {{$tellUsAboutYou['fullname']}}
                </b>
              </span>
            </span>



            <span style="font-family: 'Times New Roman', serif"><b></b></span></p>
            <p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; ">
            <span ><span style="font-family: 'Times New Roman', serif"><span size="1" style="font-size: 8pt"><span ><span  style="font-size: 12pt"></span></span>
            <span style="font-size: 12pt">{{$tellUsAboutYou['address']}}</span>
            <span ><span  style="font-size: 12pt"></span></span></span></span></span></p>

            <p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; ">
            <span>
            	<span style="font-family: 'Times New Roman', serif">
            		<span size="1" style="font-size: 8pt">
            			<span></span>
            			<span  style="font-size: 12pt">City</span>
            			<span  style="font-size: 12pt">State:FL</span>
            			<span>
            				<span  style="font-size: 12pt"></span>
            			</span>
            		</span>
            	</span>
            </span>
        	</p>

            <p align="justify" style="margin-bottom: 0in; ">

            </p>
            <p align="justify" style="margin-bottom: 0in; ">

            </p>
            <p align="justify" style="margin-bottom: 0.08in;  orphans: 0; widows: 0">


            <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 11pt">We,
            the witnesses hereunder, certify that each of us is 18 years of age
            or older and each personally witnessed </span></span>
            <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 11pt"></span></span>

            <span style="font:font-family;"><b>{{$tellUsAboutYou['fullname']}}</b></span>


            <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 11pt">,
            </span></span>

            <span style="letter-spacing: 0.1pt"><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 11pt">the
            principal, </span></span></span>

            <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 11pt">sign
            or direct the signing of this Designation; that we are acquainted
            with the principal and believe </span></span>

            <span ><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 11pt">{{$genderTxt}}</span></span></span><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 11pt">
            to be of sound mind; that neither of us is a person who signed the
            above Designation on behalf of the principal; that we are not named
            as surrogate or alternate surrogate by this Designation; that we are
            not related to the principal by blood or marriage nor are we entitled
            to any portion of </span></span><span ><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 11pt">{{$genderTxt}}</span></span></span><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 11pt">
            estate according to the laws of intestate succession of this state or
            under any will or codicil of the principal; that we are not directly
            financially responsible for </span></span><span ><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 11pt">{{$genderTxt}}</span></span></span><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 11pt">
            medical care; and that we are not agents of any health care facility
            in which </span></span><span ><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 11pt">{{$genderTxt}}</span></span></span><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 11pt">
            may be a patient at the time of signing this Designation.</span></span></p>
            <p align="justify" style="margin-bottom: 0in; ">

            </p>
            <p align="justify" style="margin-top: 0.03in; margin-bottom: 0.03in; ">
            <span style="font-family: 'Times New Roman', serif"><span  style=""><span  >WITNESS
            1: ________________________________ <span style="padding-left: 50px;"></span>Dated: ___________________</span></span></span></p>
            <p align="justify" style="margin-left: 0.38in; margin-top: 0.03in; margin-bottom: 0.03in; ">

            <br>

            </p>
            <p align="justify" style="margin-top: 0.03in; margin-bottom: 0.03in; ">
            <span style="font-family: 'Times New Roman', serif"><span  style=""><span  style="">____________________________________</span></span></span></p>
            <p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0in; ">
            <span style="font-family: 'Times New Roman', serif"><span  style=""><span  style="">[name
            printed]</span></span></span></p>
            <p align="justify" style="margin-left: 0.38in; margin-top: 0.03in; margin-bottom: 0.03in; ">

            <br>

            </p>
            <p align="justify" style="margin-top: 0.03in; margin-bottom: 0.03in; ">
            <span style="font-family: 'Times New Roman', serif"><span  style=""><span  style="">____________________________________  <span style="padding-left: 35px;"></span>____________________________________</span></span></span></p>
            <p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0in; ">
            <span style="font-family: 'Times New Roman', serif"><span  style=""><span  style="">[street
            address]<span style="padding-left: 230px;"></span>[city, state]</span></span></span></p>
            <p align="justify" style="margin-left: 0.38in; margin-top: 0.03in; margin-bottom: 0.03in; ">
            <br>
            <br>
            </p>
            <p align="justify" style="margin-top: 0.03in; margin-bottom: 0.03in; ">
            <span style="font-family: 'Times New Roman', serif"><span  style=""><span  >WITNESS
            2: ________________________________<span style="padding-left: 50px;"></span> Dated: ___________________</span></span></span></p>
            <p align="justify" style="margin-left: 0.38in; margin-top: 0.03in; margin-bottom: 0.03in; ">

           <br>

            </p>
            <p align="justify" style="margin-top: 0.03in; margin-bottom: 0.03in; ">
            <span style="font-family: 'Times New Roman', serif"><span  style=""><span  style="">____________________________________</span></span></span></p>
            <p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0in; ">
            <span style="font-family: 'Times New Roman', serif"><span  style=""><span  style="">[name
            printed]</span></span></span></p>
            <p align="justify" style="margin-left: 0.38in; margin-top: 0.03in; margin-bottom: 0.03in; ">
            <br>
            <p align="justify" style="margin-top: 0.03in; margin-bottom: 0.03in; ">
          <span style="font-family: 'Times New Roman', serif"><span  style=""><span  style="">____________________________________  <span style="padding-left: 35px;"></span>____________________________________</span></span></span></p>
          <p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0in; ">

          <span style="font-family: 'Times New Roman', serif"><span  style=""><span  style="">[street
          address]<span style="padding-left: 230px;"></span>[city, state]</span></span></span></p>



    </div>
</div>
<!-- step 3 - ends -->


<!-- step 4 now -->
<div class="docPage" style="">
  <div id="doc" class="docPageInner" style="">

          <p align="center" style="margin-top: 0.19in; margin-bottom: 0.13in; ">
          <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 10pt"><span  style="font-size: 12pt"><b>AFFIDAVIT</b></span></span></span></p>
         <p align="justify" style="margin-bottom: 0in; "><span ><span style="font-family: 'Times New Roman', serif"><span  style=""><span ><span  >STATE
          OF FLORIDA</span></span><span ><span  > </span></span><span ><span style="padding-left: 45px;">)</span></span></span></span></span></p>
          <p align="justify" style="margin-bottom: 0in; "><span style="font-family: 'Times New Roman', serif"><span  style=""><span  >        </span><span  style="padding-left: 190px;">)
          ss.</span><span  >&nbsp;</span></span></span></p>
          <p align="justify" style="margin-bottom: 0in; "><span ><span style="font-family: 'Times New Roman', serif"><span  style=""><span ><span  >COUNTY
          OF ____________)</span></span></span></span></span></p>
          <p align="justify" style="margin-bottom: 0in; ">

          </p>
          <p align="justify" style="margin-bottom: 0in; "><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span  style="font-size: 12pt">I,
          </span><span >

          	<span  style="font-size: 12pt">{{strtoupper($tellUsAboutYou['fullname'])}}</span></span><span  style="font-size: 12pt">, the
          principal, declare to the officer taking my acknowledgment of this
          instrument, and to the subscribing witnesses, that I signed and
          executed this instrument as my Designation of Health Care Surrogate.</span></span></span></p>
          <p align="justify" style="margin-bottom: 0in; ">

          </p>
          <p align="justify" style="margin-bottom: 0in; "><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span  style="font-size: 12pt">	</span><span  style="font-size: 12pt">______________________________________</span></span></span></p>


          <p align="justify" style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
              <span style="font:font-family;"><b>{{$tellUsAboutYou['fullname']}}</b></span>
          </p>

          <p align="justify" style="margin-bottom: 0in; ">

          </p>
          <p align="justify" style="margin-bottom: 0in; ">

          </p>
          <p style="margin-bottom: 0in; "><span style="font-family: 'Times New Roman', serif">We,
          </span><span style="font-family: 'Times New Roman', serif"><u>					</u></span><span style="font-family: 'Times New Roman', serif">
          and </span><span style="font-family: 'Times New Roman', serif"><u>					</u></span><span style="font-family: 'Times New Roman', serif">,
          the witnesses, have been sworn by the officer signing below, and
          declare to that officer on our oaths that </span><span ><span style="font-family: 'Times New Roman', serif"></span></span>

          <span style="font:font-family;"><b>{{$tellUsAboutYou['fullname']}},</b></span>



          <span style="font-family: 'Times New Roman', serif">
          the principal, signed this Designation in our presence, and that we
          each signed the instrument as a witness in the presence of the
          principal and of each other.</span><span style="font-family: 'Times New Roman', serif">&nbsp;</span></p>
          <p align="justify" style="margin-bottom: 0in; ">

          </p>
          <p align="justify" style="margin-bottom: 0in; ">

          </p>
          <p align="justify" style="margin-top: 0.03in; margin-bottom: 0.03in; ">
          <span style="font-family: 'Times New Roman', serif"><span  style=""><span  >WITNESS
          1: ________________________________ <span style="padding-left: 50px;"></span>Dated: ___________________</span></span></span></p>

          <p align="justify" style="margin-top: 0.03in; margin-bottom: 0.03in; ">
          <span style="font-family: 'Times New Roman', serif"><span  style=""><span  style="">____________________________________</span></span></span></p>
          <p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0in; ">
          <span style="font-family: 'Times New Roman', serif"><span  style=""><span  style="">[name
          printed]</span></span></span></p>

          <p align="justify" style="margin-left: 0.38in; margin-top: 0.03in; margin-bottom: 0.03in; ">
          <br>
          <br>
          </p>
          <p align="justify" style="margin-top: 0.03in; margin-bottom: 0.03in; ">
          <span style="font-family: 'Times New Roman', serif"><span  style=""><span  >WITNESS
          2: ________________________________ <span style="padding-left: 50px;"></span>Dated: ___________________</span></span></span></p>

          <p align="justify" style="margin-top: 0.03in; margin-bottom: 0.03in; ">
          <span style="font-family: 'Times New Roman', serif"><span  style=""><span  style="">____________________________________</span></span></span></p>
          <p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0in; ">
          <span style="font-family: 'Times New Roman', serif"><span  style=""><span  style="">[name
          printed]</span></span></span></p>
          <p align="justify" style="margin-bottom: 0in; ">

          </p>
          <p align="justify" style="margin-bottom: 0in; ">

          </p>
          <p align="justify" style="margin-bottom: 0in; ">
          <br>
          </p>
          <p align="justify" style="margin-bottom: 0in; "><span ><span style="font-family: 'Times New Roman', serif"><span  style=""><span ><span  >STATE
          OF FLORIDA</span></span><span ><span  > </span></span><span ><span style="padding-left: 45px;">)</span></span></span></span></span></p>
          <p align="justify" style="margin-bottom: 0in; "><span style="font-family: 'Times New Roman', serif"><span  style=""><span  >        </span><span  style="padding-left: 190px;">)
          ss.</span><span  >&nbsp;</span></span></span></p>
          <p align="justify" style="margin-bottom: 0in; "><span ><span style="font-family: 'Times New Roman', serif"><span  style=""><span ><span  >COUNTY
          OF ____________)</span></span></span></span></span></p>
          <p align="justify" style="margin-bottom: 0in; ">

          </p>
          <p align="justify" style="margin-bottom: 0in; "><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt">Acknowledged
          and subscribed before me by <span >{{strtoupper($tellUsAboutYou['fullname'])}},</span>
          the principal, who is personally known to me or who has produced
          satisfactory photo identification, to wit:
          ________________________________, and sworn to and subscribed before
          me by the witnesses, ______________________________, who is
          personally known to me or who has produced satisfactory photo
          identification, to wit: ________________________________, and
          ______________________________, who is personally known to me or who
          has produced satisfactory photo identification, to wit:
          ________________________________, and subscribed before me in the
          presence of the principal and the subscribing witnesses, all on this
          ______ day of _______________, ____________________.</span></span></p>
          <p align="justify" style="margin-bottom: 0in; ">

          </p>

    <p align="justify" style="margin-bottom: 0in; "><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt">	______________________________________</span></span></p>
    <p align="justify" style="margin-bottom: 0in; "><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt">	NOTARY
    PUBLIC (State of Florida)</span></span></p>
    <p align="justify" style="margin-bottom: 0in; ">

    </p>
    <p align="justify" style="margin-bottom: 0in; "><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt">My
    commission expires:</span></span></p>
  </div>
</div>
<!-- step 5 - end-->

<!-- step 6 start -->
<div class="docPage" style="">
  <div id="doc" class="docPageInner" style="">
      <p align="center" style="margin-bottom: 0in;  page-break-before: always">
          <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 13pt"><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 19pt"><b>F</b></span></span><b>LORIDA
          </b><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 19pt"><b>L</b></span></span><b>IVING
          </b><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 19pt"><b>W</b></span></span><b>ILL</b></span></span></p>
          <p align="justify" style="text-indent: 0.38in; margin-bottom: 0.13in; ">



          </p>
          <p align="justify" style="margin-bottom: 0in; "><span ><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 10pt"><span ><span style="letter-spacing: 0.3pt"><span  style="font-size: 12pt">Declaration
          made this </span></span></span><span ><span  style="font-size: 12pt">_____
          day of ____________________, ________.</span></span></span></span></span></p>
          <p align="justify" style="margin-bottom: 0in; ">

          </p>

          <p align="justify" style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
          <span style="letter-spacing: 0.3pt"><span style="font-family: 'Times New Roman', serif">I,</span></span><span face="Times, serif"><span  style="font-size: 9pt"><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 12pt">
          </span></span></span></span><span style="font-family: 'Times New Roman', serif"></span>

          <span style="font:font-family;"><b>{{$tellUsAboutYou['fullname']}},</b></span>



            <span face="Times, serif"><span  style="font-size: 9pt"><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 12pt"></span></span></span></span><span style="letter-spacing: 0.3pt"><span style="font-family: 'Times New Roman', serif">
          willfully </span></span><span style="letter-spacing: 0.2pt"><span style="font-family: 'Times New Roman', serif">and
          voluntarily make known my desire that my dying not be artificially</span></span><span style="letter-spacing: 0.3pt"><span style="font-family: 'Times New Roman', serif">
          prolonged under the circumstances set forth below, and I do hereby
          declare that:</span></span></p>
          <p align="justify" style="margin-bottom: 0.09in; "><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span style="letter-spacing: 0.3pt"><span  style="font-size: 12pt">1.</span></span><span  style="font-size: 12pt"><span style="letter-spacing: 0.3pt">	</span></span><span style="letter-spacing: 0.3pt"><span  style="font-size: 12pt">If
          at any time I am incapacitated and</span></span></span></span></p>
          <p align="justify" style="margin-left: 0.38in; margin-bottom: 0.06in; ">
          <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span style="letter-spacing: 0.3pt"><span  style="font-size: 12pt">_______
          </span></span><span style="font-family: 'Times New Roman', serif"><span size="1" style="font-size: 7pt"><span style="letter-spacing: 0.3pt"><span  style="font-size: 12pt">(initial)</span></span></span></span><span  style="font-size: 12pt"><span style="letter-spacing: 0.3pt">	</span></span><span style="letter-spacing: 0.3pt"><span  style="font-size: 12pt">I
          have a terminal condition, or</span></span></span></span></p>
          <p align="justify" style="margin-left: 0.38in; margin-bottom: 0.06in; ">
          <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span style="letter-spacing: 0.3pt"><span  style="font-size: 12pt">_______
          </span></span><span style="font-family: 'Times New Roman', serif"><span size="1" style="font-size: 7pt"><span style="letter-spacing: 0.3pt"><span  style="font-size: 12pt">(initial)</span></span></span></span><span  style="font-size: 12pt"><span style="letter-spacing: 0.3pt">	</span></span><span style="letter-spacing: 0.3pt"><span  style="font-size: 12pt">I
          have an end-stage condition, or</span></span></span></span></p>
          <p align="justify" style="margin-left: 0.38in; margin-bottom: 0.09in; ">
          <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span style="letter-spacing: 0.3pt"><span  style="font-size: 12pt">_______
          </span></span><span style="font-family: 'Times New Roman', serif"><span size="1" style="font-size: 7pt"><span style="letter-spacing: 0.3pt"><span  style="font-size: 12pt">(initial)</span></span></span></span><span  style="font-size: 12pt"><span style="letter-spacing: 0.3pt">	</span></span><span style="letter-spacing: 0.3pt"><span  style="font-size: 12pt">I
          am in a persistent vegetative state,</span></span></span></span></p>
          <p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; ">
          <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span style="letter-spacing: 0.3pt"><span  style="font-size: 12pt">and
          if my attending or treating physician and another consulting
          physician have determined that there is no reasonable medical
          probability of my recovery from such condition, I direct that
          life-</span></span><span style="letter-spacing: 0.1pt"><span  style="font-size: 12pt">prolonging
          procedures be withheld or withdrawn when the application of</span></span><span style="letter-spacing: 0.3pt"><span  style="font-size: 12pt">
          such procedures would serve only to prolong artificially the process
          of dying, and that I be permitted to die naturally with only the
          administration of medication or the performance of any medical
          procedure deemed necessary to provide me with comfort care or to
          alleviate pain.</span></span></span></span></p>
          <p align="justify" style="margin-bottom: 0in; ">

          </p>
          <p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0in; ">
          <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span face="Times, serif"><span  style="font-size: 9pt"><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 12pt">2.</span></span></span></span><span  style="font-size: 12pt">	</span><span style="letter-spacing: 0.3pt"><span  style="font-size: 12pt">It
          is my intention that this Declaration be honored by my family and
          physician as the final expression of my legal right to refuse medical
          or surgical treatment and to accept the consequences for such
          refusal.</span></span></span></span></p>
          <p align="justify" style="margin-bottom: 0in; ">

          </p>
          <p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0in; ">
          <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span style="letter-spacing: 0.1pt"><span  style="font-size: 12pt">3.</span></span><span  style="font-size: 12pt"><span style="letter-spacing: 0.1pt">	</span></span><span style="letter-spacing: 0.1pt"><span  style="font-size: 12pt">I
          have executed a Designation of Health Care Surrogate concurrently
          herewith. In the event that I have been determined to be unable to
          provide express</span></span><span style="letter-spacing: 0.3pt"><span  style="font-size: 12pt">
          and informed consent regarding the withholding, withdrawal, or
          continuation of life-prolonging procedures, I authorize my
          then-acting </span></span><span  style="font-size: 12pt">surrogate
          </span><span style="letter-spacing: 0.3pt"><span  style="font-size: 12pt">as
          named in that document to carry out the provisions of this
          Declaration.</span></span></span></span></p>
          <p align="justify" style="margin-bottom: 0in; ">

          </p>
          <p align="justify" style="margin-bottom: 0in; ">

          </p>
          <p align="justify" style="margin-bottom: 0in; "><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span style="letter-spacing: 0.1pt"><span  style="font-size: 12pt">Additional
          Instructions: (Optional)</span></span></span></span></p>
          <p align="justify" style="margin-bottom: 0in; "><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span style="letter-spacing: 0.1pt"><span  style="font-size: 12pt; line-height: 25px;">
            _____________________________________________________________________________
          _____________________________________________________________________________
          _____________________________________________________________________________
          _____________________________________________________________________________
          _____________________________________________________________________________
          _____________________________________________________________________________
          _____________________________________________________________________________
          _____________________________________________________________________________
          _____________________________________________________________________________.
          </span></span><span style="letter-spacing: 0.1pt"><span  style="font-size: 12pt"></span></span></span></span></p>
          <p style="margin-bottom: 0in; ">

          </p>
          <p align="justify" style="margin-bottom: 0in;  page-break-before: always">


          </p>
  </div>
</div>
<!-- step 6 end-->

<!-- step 7 start -->
<div class="docPage" style="">
  <div id="doc" class="docPageInner" style="">
      <p align="justify" style="margin-bottom: 0in; "><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span style="letter-spacing: 0.1pt"><span  style="font-size: 12pt">I
          understand the full import of this Declaration, and I am emotionally
          and mentally competent to make this Declaration.</span></span></span></span></p>
          <p align="justify" style="margin-bottom: 0in; ">

          </p>
          <p align="justify" style="margin-left: 0.5in; text-indent: 0.5in; margin-bottom: 0in; ">
          <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span  style="font-size: 12pt">_______________________________________</span></span></span></p>

          <p align="justify" style="margin-bottom: 0.08in;  orphans: 0; widows: 0"><a name="_GoBack"></a>
          <span style="font-family: 'Times New Roman', serif">		</span>

          <span style="font-family: 'Times New Roman', serif"><b></b></span>

          <span style="font:font-family;"><b>{{$tellUsAboutYou['fullname']}}</b></span>


          <span style="font-family: 'Times New Roman', serif"></span>
          <p align="justify" style="margin-bottom: 0in; ">

          </p>
          <p align="justify" style="margin-bottom: 0in; ">

          </p>
          <p align="justify" style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
          <span style="font-family: 'Times New Roman', serif">We, the witnesses hereunder,
          certify that each of us is 18 years of age or older and each
          personally witnessed </span>

          <span>{{$tellUsAboutYou['fullname']}},</span>

          <span style="font-family: 'Times New Roman', serif"></span><span style="letter-spacing: 0.1pt"><span style="font-family: 'Times New Roman', serif">
          the declarant, </span></span><span style="font-family: 'Times New Roman', serif">sign
          or direct the signing of this directive; that we are acquainted with
          the declarant and believe </span>

          <span>
            <span style="font-family: 'Times New Roman', serif">{{$genderTxt}}</span>
          </span>

          <span style="font-family: 'Times New Roman', serif">
          to be of sound mind; that neither of us is a person who signed the
          above directive on behalf of the declarant; that we are not named as
          </span>

          <span >
            <span style="font-family: 'Times New Roman', serif">{{$genderTxt}}</span>
          </span>

          <span style="font-family: 'Times New Roman', serif">
          surrogate or alternate surrogate by any Designation of Health Care
          Surrogate; that we are not related to the declarant by blood or
          marriage nor are we entitled to any portion of </span>

          <span ><span style="font-family: 'Times New Roman', serif">{{$genderTxt}}</span></span>

          <span style="font-family: 'Times New Roman', serif">
          estate according to the laws of intestate succession of this state or
          under any will or codicil of the declarant; that we are not directly
          financially responsible for </span><span >

          <span style="font-family: 'Times New Roman', serif">{{$genderTxt}}</span>

          </span><span style="font-family: 'Times New Roman', serif">
          medical care; and that we are not agents of any health care facility
          in which </span><span>

          <span style="font-family: 'Times New Roman', serif">{{$genderTxt}}</span>

          </span><span style="font-family: 'Times New Roman', serif">
          may be a patient at the time of signing this directive.</span></p>
          <p align="justify" style="margin-top: 0.03in; margin-bottom: 0.03in; ">


          <br>
          </p>
          <p align="justify" style="margin-top: 0.03in; margin-bottom: 0.03in; ">
            <span style="font-family: 'Times New Roman', serif"><span  style=""><span  >WITNESS
            1: ________________________________ <span style="padding-left: 50px;"></span>Dated: ___________________</span></span></span></p>
            <p align="justify" style="margin-left: 0.38in; margin-top: 0.03in; margin-bottom: 0.03in; ">

            <br>

            </p>
            <p align="justify" style="margin-top: 0.03in; margin-bottom: 0.03in; ">
            <span style="font-family: 'Times New Roman', serif"><span  style=""><span  style="">____________________________________</span></span></span></p>
            <p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0in; ">
            <span style="font-family: 'Times New Roman', serif"><span  style=""><span  style="">[name
            printed]</span></span></span></p>
            <p align="justify" style="margin-left: 0.38in; margin-top: 0.03in; margin-bottom: 0.03in; ">

            <br>

            </p>
            <p align="justify" style="margin-top: 0.03in; margin-bottom: 0.03in; ">
            <span style="font-family: 'Times New Roman', serif"><span  style=""><span  style="">____________________________________  <span style="padding-left: 35px;"></span>____________________________________</span></span></span></p>
            <p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0in; ">
            <span style="font-family: 'Times New Roman', serif"><span  style=""><span  style="">[street
            address]<span style="padding-left: 230px;"></span>[city, state]</span></span></span></p>
            <p align="justify" style="margin-left: 0.38in; margin-top: 0.03in; margin-bottom: 0.03in; ">
            <br>
            <br>
            </p>
            <p align="justify" style="margin-top: 0.03in; margin-bottom: 0.03in; ">
            <span style="font-family: 'Times New Roman', serif"><span  style=""><span  >WITNESS
            2: ________________________________<span style="padding-left: 50px;"></span> Dated: ___________________</span></span></span></p>
            <p align="justify" style="margin-left: 0.38in; margin-top: 0.03in; margin-bottom: 0.03in; ">

           <br>

            </p>
            <p align="justify" style="margin-top: 0.03in; margin-bottom: 0.03in; ">
            <span style="font-family: 'Times New Roman', serif"><span  style=""><span  style="">____________________________________</span></span></span></p>
            <p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0in; ">
            <span style="font-family: 'Times New Roman', serif"><span  style=""><span  style="">[name
            printed]</span></span></span></p>
            <p align="justify" style="margin-left: 0.38in; margin-top: 0.03in; margin-bottom: 0.03in; ">
            <br>
            <p align="justify" style="margin-top: 0.03in; margin-bottom: 0.03in; ">
          <span style="font-family: 'Times New Roman', serif"><span  style=""><span  style="">____________________________________  <span style="padding-left: 35px;"></span>____________________________________</span></span></span></p>
          <p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0in; ">

          <span style="font-family: 'Times New Roman', serif"><span  style=""><span  style="">[street
          address]<span style="padding-left: 230px;"></span>[city, state]</span></span></span></p>


  </div>
</div>
<!-- step 7 end -->

<!-- step 8 start -->
<div class="docPage" style="">
  <div id="doc" class="docPageInner" style="">
      <p align="center" style="margin-top: 0.19in; margin-bottom: 0.13in;  page-break-before: always">
          <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 10pt"><span  style="font-size: 14pt"><b>AFFIDAVIT</b></span></span></span></p>
          <p align="justify" style="margin-bottom: 0in; "><span ><span style="font-family: 'Times New Roman', serif"><span  style=""><span >STATE
          OF FLORIDA</span><span >  </span><span style="padding-left: 45px;">)</span></span></span></span></p>
          <p align="justify" style="margin-bottom: 0in; "><span style="font-family: 'Times New Roman', serif"><span  style="padding-left: 190px;">        )
          ss.&nbsp;</span></span></p>
          <p align="justify" style="margin-bottom: 0in; "><span ><span style="font-family: 'Times New Roman', serif"><span  style=""><span >COUNTY
          OF ____________)</span></span></span></span></p>
          <p align="justify" style="margin-bottom: 0in; ">

          </p>
          <p align="justify" style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
          <span style="font-family: 'Times New Roman', serif">I, </span><span style="font-family: 'Times New Roman', serif"></span>

          <span>{{$tellUsAboutYou['fullname']}},</span>


          <span style="font-family: 'Times New Roman', serif"></span>

          <span style="font-family: 'Times New Roman', serif">
          declare to the officer taking my acknowledgment of this instrument,
          and to the subscribing witnesses, that I signed and executed this
          instrument as my Living Will.</span></p>
          <p align="justify" style="margin-bottom: 0in; ">

          </p>
          <p align="justify" style="margin-bottom: 0in; "><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"><span  style="font-size: 12pt">	</span><span  style="font-size: 12pt">______________________________________</span></span></span></p>
          <p align="justify" style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
              <span>{{$tellUsAboutYou['fullname']}}</span>
          </p>
          <p align="justify" style="margin-bottom: 0in; ">

          </p>
          <p align="justify" style="margin-bottom: 0in; ">

          </p>
          <p align="justify" style="margin-bottom: 0in; ">

          </p>
          <p align="justify" style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
          <span style="font-family: 'Times New Roman', serif">We, </span><span style="font-family: 'Times New Roman', serif"><u>					</u></span><span style="font-family: 'Times New Roman', serif">
          and </span><span style="font-family: 'Times New Roman', serif"><u>					</u></span><span style="font-family: 'Times New Roman', serif">,
          the witnesses, have been sworn by the officer signing below, and
          declare to that officer on our oaths that </span><span style="font-family: 'Times New Roman', serif"></span>

          <span>{{$tellUsAboutYou['fullname']}},</span>


          <span style="font-family: 'Times New Roman', serif"></span><span style="font-family: 'Times New Roman', serif">
          the declarant, signed this Declaration in our presence, and that we
          each signed the instrument as a witness in the presence of the
          declarant and of each other.</span><span style="font-family: 'Times New Roman', serif">&nbsp;</span></p>
          <p align="justify" style="margin-bottom: 0in; ">

          </p>
          <p align="justify" style="margin-bottom: 0in; ">

          </p>
          <p align="justify" style="margin-top: 0.03in; margin-bottom: 0.03in; ">
            <span style="font-family: 'Times New Roman', serif"><span  style=""><span  >WITNESS
            1: ________________________________ <span style="padding-left: 50px;"></span>Dated: ___________________</span></span></span></p>
            <p align="justify" style="margin-left: 0.38in; margin-top: 0.03in; margin-bottom: 0.03in; ">

            <br>

            </p>
            <p align="justify" style="margin-top: 0.03in; margin-bottom: 0.03in; ">
            <span style="font-family: 'Times New Roman', serif"><span  style=""><span  style="">____________________________________</span></span></span></p>
            <p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0in; ">
            <span style="font-family: 'Times New Roman', serif"><span  style=""><span  style="">[name
            printed]</span></span></span></p>
            <p align="justify" style="margin-left: 0.38in; margin-top: 0.03in; margin-bottom: 0.03in; ">

            <br>

            </p>

            <p align="justify" style="margin-left: 0.38in; margin-top: 0.03in; margin-bottom: 0.03in; ">
            <br>
            <br>
            </p>
            <p align="justify" style="margin-top: 0.03in; margin-bottom: 0.03in; ">
            <span style="font-family: 'Times New Roman', serif"><span  style=""><span  >WITNESS
            2: ________________________________<span style="padding-left: 50px;"></span> Dated: ___________________</span></span></span></p>
            <p align="justify" style="margin-left: 0.38in; margin-top: 0.03in; margin-bottom: 0.03in; ">

           <br>

            </p>
            <p align="justify" style="margin-top: 0.03in; margin-bottom: 0.03in; ">
            <span style="font-family: 'Times New Roman', serif"><span  style=""><span  style="">____________________________________</span></span></span></p>
            <p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0in; ">
            <span style="font-family: 'Times New Roman', serif"><span  style=""><span  style="">[name
            printed]</span></span></span></p>
            <p align="justify" style="margin-left: 0.38in; margin-top: 0.03in; margin-bottom: 0.03in; ">
            <br>
            </p>

          <p align="justify" style="margin-bottom: 0in; ">

          </p>
          <p align="justify" style="margin-bottom: 0in; ">

          </p>
          <p align="justify" style="margin-bottom: 0in; "><span ><span style="font-family: 'Times New Roman', serif"><span  style=""><span >STATE
          OF FLORIDA</span><span >  </span><span style="padding-left: 45px;">)</span></span></span></span></p>
          <p align="justify" style="margin-bottom: 0in; "><span style="font-family: 'Times New Roman', serif"><span  style="padding-left: 190px;">        )
          ss.&nbsp;</span></span></p>
          <p align="justify" style="margin-bottom: 0in; "><span ><span style="font-family: 'Times New Roman', serif"><span  style=""><span >COUNTY
          OF ____________)</span></span></span></span></p>
          <p align="justify" style="margin-bottom: 0in; ">

          </p>
          <p style="margin-bottom: 0in; "><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt">Acknowledged
          and subscribed before me by </span></span><span ><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"></span></span></span>

          <span>{{$tellUsAboutYou['fullname']}},</span>


          <span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt"></span></span><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt">
          the principal, who is personally known to me or who has produced
          satisfactory photo identification, to wit:
          ________________________________, and sworn to and subscribed before
          me by the witnesses, ______________________________, who is
          personally known to me or who has produced satisfactory photo
          identification, to wit: ________________________________, and
          ______________________________, who is personally known to me or who
          has produced satisfactory photo identification, to wit:
          ________________________________, and subscribed before me in the
          presence of the principal and the subscribing witnesses, all on this
          ______ day of </span></span><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt">___________</span></span><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt">,
          </span></span><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt">_________________</span></span><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt">.</span></span></p>
          <p align="justify" style="margin-bottom: 0in; ">

          </p>
  </div>
</div>
<!-- step 8 end -->

<!-- step 9 start -->
<div class="docPage" style="">
  <div id="doc" class="docPageInner" style="">
      <p align="justify" style="margin-bottom: 0in; "><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt">	______________________________________</span></span></p>
      <p align="justify" style="margin-bottom: 0in; "><span style="font-family: 'Times New Roman', serif"><span  style="font-size: 9pt">	NOTARY
      PUBLIC (State of Florida)			My commission expires:</span></span></p>
  </div>
</div>
<!-- step 9 end -->


</div>
</body>
</html>
