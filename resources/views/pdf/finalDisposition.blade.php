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
			Advance Directive of <br>{{$tellUsAboutYou['fullname']}}<br>
		</div>
	</div>
<div style="text-align: justify">

	<div>
      <div>
        <div>
          <div>
            <h1 style="font-size: 28px; text-align: center; margin: 0 0 30px; font-family: Garamond;">Final Disposition Authorization and Instructions</h1>


            <p style="font-size: 15px; margin: 0 0 15px; font-family: Garamond;">
              I,<span style="text-transform: uppercase;"> {{strtoupper($tellUsAboutYou['fullname'])}},</span>of<span style="text-transform: uppercase;"> {{$tellUsAboutYou['address']}},</span><span style="text-transform: uppercase;"> {{$tellUsAboutYou['city']}},</span><span style="text-transform: uppercase;"> {{$tellUsAboutYou['state']}}, {{$tellUsAboutYou['zip']}}</span>
              being of sound mind, willfully and voluntarily make known by this document

              @if(strtolower($state['name']) == 'new jersey')
              	<span>my desires concerning, upon my death, the final disposition of my remains</span>
              @else
              	<span>my desire that, upon my death, the final disposition of my remains be under the control of my</span>
							@endif
              	@if(strtolower($state['name']) == 'wisconsin')
                	<span>representative under the requirements of §154.30, Wisconsin Statutes</span>
                @elseif(strtolower($state['name']) == 'michigan')
                	<span>funeral representative pursuant to §700.3206, MCL</span>
                @else
                	<span>representative</span>
                @endif

                named in this document. All decisions made by my representative with respect to my funeral and the final disposition of my remains shall be binding and, for the guidance of my representative, I am making my wishes known as follows:
            </p>



            <p style="font-size: 15px; margin: 0 0 15px; font-family: Garamond;">

            @if(isset($finalArrangements) && $finalArrangements['ashes'] == 1)
              <span>

                1. I wish to be cremated. I would like my ashes to be managed and disposed of in the following manner:

                @if(isset($finalArrangements) && strlen($finalArrangements['ashes']) > 0 )
                	<span> {{userDetails.finalArrangements.ashes}}.</span>

                @else

                <span>: __________________________________________________

                ______________________________________________________________________

                ______________________________________________________________________

                </span>

                @endif
              </span>

            @elseif(isset($finalArrangements) && $finalArrangements['ashes'] == 0)
              <span>

                1. I wish to be buried. I would like my remains interred

                @if( isset($finalArrangements) && strlen($finalArrangements['ashes']) > 0)
                <span> {{$finalArrangements['ashes']}}.</span>

                @else
                <span>: ___________________________________________

                ______________________________________________________________________

                ______________________________________________________________________

                </span>

                @endif
              </span>

            @elseif(isset($finalArrangements) && $finalArrangements['type'] == 2)
              <span>

              	@if(strlen($finalArrangements['some_other_way']) > 0 )
	                1. I wish for my representative to control and dispose of my remains in the following manner: <span> {{$finalArrangements['some_other_way']}}.</span>
                @else
	                <span>: ___________________________________________

	                ______________________________________________________________________

	                ______________________________________________________________________

	                </span>
                @endif

              </span>

            @endif
            </p>


            <p style="font-size: 15px; margin: 0 0 15px; font-family: Garamond;">
              2. I have made pre-arrangements at

              @if(strlen($finalArrangements['arrangements']) > 0)

              <span> {{$finalArrangements['arrangements']}}.</span>

              @else
                <span>: ______________________________________

                ______________________________________________________________________

                ______________________________________________________________________

                </span>

               @endif
            </p>

            <p style="font-size: 15px; margin: 0 0 15px; font-family: Garamond;">
                  3. I wish for my representative to honor the following instructions with regard to my funeral or other ceremony for the final disposition of my remains: ______________________________________

              ______________________________________________________________________

              ______________________________________________________________________

            </p>

            <p style="font-size: 15px; margin: 0 0 15px; font-family: Garamond;">

                <span>
                   4. My funeral representative shall be:
                </span>

                <span>

                ________________________________________________

                (Name)

                </span>

                <span>

                ________________________________________________

                (Address)

                </span>

                <span>

                ________________________________________________

                (Telephone)

                </span>
            </p>
            <br>
            <p style="font-size: 15px; margin: 0 0 15px; font-family: Garamond;">

              If my funeral representative dies, becomes incapacitated, resigns, refuses to act, ceases to be qualified, or cannot be located within the time necessary to control the final disposition of my remains, I hereby appoint the following individual to serve as my successor funeral representative:

              ________________________________________________

              (Name)

              ________________________________________________

              (Address)

              ________________________________________________

              (Telephone)
            </p>
            <br>
            <p style="font-size: 15px; margin: 0 0 15px; font-family: Garamond;">
              5. This authorization becomes effective upon my death. I hereby revoke any prior final disposition authorizations or instructions that I may have signed before the date that this document is signed. I hereby agree that any funeral director, crematory authority, or cemetery authority that receives a copy of this document may act under it. Any modification or revocation of this document is not effective as to a funeral director, crematory authority, or cemetery authority until the funeral director, crematory authority, or cemetery authority receives actual notice of the modification or revocation. No funeral director, crematory authority, or cemetery authority may be liable because of reliance on a copy of this document.
            </p>
          </div>
        </div>
 				@if(strtolower($state['name']) == 'wisconsin' || strtolower($state['name']) == 'michigan')
        <div>
          <div>
            <p style="font-size: 15px; margin: 0 0 15px; font-family: Garamond;">

            @if(strtolower($state['name']) == 'wisconsin')
              <span>
                The representative and any successor representative, by accepting appointment under this document, assume the powers and duties specified for a representative under §154.30, Wisconsin Statutes.
              </span>
            @elseif(strtolower($state['name']) == 'michigan')
              <span>
                The funeral representative and any successor funeral representative, by accepting appointment under this document, assume the powers and duties specified for a funeral representative under §700.3206(1), MCL and acknowledge that he/she is not a prohibited person pursuant to §700.3206(2)(c), MCL.
              </span>
            @endif
            </p>
          </div>
        </div>
				@endif
        <div>
          <div>
            <p style="font-size: 15px; page-break-before: always; margin: 0 0 15px; font-family: Garamond;">
              <h1 style="font-size: 28px; text-align: center; margin: 50px 0 30px; font-family: Garamond;">SIGNATURE AND ACKNOWLEDGMENT</h1>

              <p>Dated: _______________________________________</p>

              <p>Signed: _________________________________________</p>

              <span>{{$tellUsAboutYou['fullname']}}</span>

              <p>{{$tellUsAboutYou['address']}}</p>

              <p><span>{{$tellUsAboutYou['city']}}</span>, <span>{{$tellUsAboutYou['state']}} <span>{{$tellUsAboutYou['zip']}}</span></span></p>

              <p>{{$tellUsAboutYou['phone']}}</p>

              <p>
                By my signature below, I attest that <span style="text-transform: uppercase;"> {{$tellUsAboutYou['fullname']}} </span>, the person who signed this document, did so or acknowledged signing this document in my presence and that

                {{$genderTxt3}}

                appears to be of sound mind and not subject to duress, fraud, or undue influence. I further attest that I am not the representative or the successor representative appointed under this document, that I am at least eighteen (18) years of age, and that I am not related to the person who signed this document by blood, marriage, or adoption
<br>

                @if(strtolower($state['name']) == 'michigan')
                	<span>, nor am I a prohibited witness pursuant to §700.3206(2)(b)(i), MCL.</span>
                @endif
                <div style="display: inline-block; width: 46%; padding-top: 50px;">
                  <p>WITNESS 1: ____________________________</p>

                  <p> ______________________________<br>[print name]</p>

                  <p> ______________________________<br>[address]</p>

                  <p>_______________________________<br>[city/state]</p>
                  </div>
<div style="display: inline-block; width: 46%; padding-left: 50px; padding-top: 50px;">
                <p>WITNESS 2: ____________________________</p>

                  <p> ______________________________<br>[print name]</p>

                  <p> ______________________________<br>[address]</p>

                  <p>_______________________________<br>[city/state]</p>
                  </div>

                  <span>STATE OF ________________ )<br>

                    _____________________________) ss.</span><br>

                  <span>COUNTY OF ________________ )</span><br><br>

                  <span>Subscribed, sworn and acknowledged before me by

                  <span style="text-transform: uppercase;"> {{$tellUsAboutYou['fullname']}} </span>

                  , and _________________________________________, as witness, and _____________________________________, as witness, who personally appeared on this _________ day of ________________________________, _______, and who are personally known to me or who have produced satisfactory photo identification, and whose names are signed to the foregoing instrument.<br><br>

                    ______________________________________ (Seal, if any)<br>

                    NOTARY PUBLIC

                My commission expires: _________________</span>
              </p>
          </div>
        </div>


     @if(strtolower($state['name']) == 'wisconsin' || strtolower($state['name']) == 'michigan')
        <div style="page-break-before: always;">
          <div>
            <p style="font-size: 15px; margin: 0 0 15px; font-family: Garamond;">


              <span>

                 <h1 style="font-size: 28px; text-align: center; margin: 50px 0 30px; font-family: Garamond;">AGENT ACCEPTANCE AND ACKNOWLEDGMENT</h1>

                    I hereby accept appointment as

                    @if(strtolower($state['name']) == 'michigan')
                    	<span> funeral </span>
                    @endif

                    representative for the control of final disposition of the declarant’s remains.

                    Signature: ___________________________________ Dated: _______________________


                    STATE OF ________________ )

                    ) ss.

                    COUNTY OF ________________ )

                    Subscribed, sworn and acknowledged before me by ______________________________________ , who is personally known to me or who has produced satisfactory photo identification, and whose name is signed to the foregoing instrument.

                    ______________________________________ (Seal, if any)

                    NOTARY PUBLIC

                    My commission expires: _________________


                    I hereby accept appointment as successor


                    @if(strtolower($state['name']) == 'michigan' )
                    	<span> funeral </span>
                    @endif

                    representative for the control of final disposition of the declarant’s remains.

                    Signature: ___________________________________ Dated: _______________________

                STATE OF ________________ )

                ) ss.

                COUNTY OF ________________ )

                Subscribed, sworn and acknowledged before me by ___________________________________, who is personally known to me or who has produced satisfactory photo identification, and whose name is signed to the foregoing instrument.

                ______________________________________ (Seal, if any)

                NOTARY PUBLIC

                My commission expires: _________________
              </span>

            </p>
          </div>
        </div>
        @endif
      </div>
    </div>

</div>

</body>
</html>
