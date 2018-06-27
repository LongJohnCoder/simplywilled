<!DOCTYPE html>
<html>
<head>
	<title>Health Care Power of Attorney</title>
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

	<div>
		<div>
    <div>
      <p  style="margin-bottom: 0.13in; line-height: 100%; text-align: center;"><span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 16pt"><b>TENNESSEE</b></span></span></p>
      <p  style="margin-bottom: 0.13in; line-height: 100%; text-align: center;"><span style="font-family:'Times New Roman, serif'"><span size="4" style="font-size: 16pt"><b>ADVANCE
      DIRECTIVE</b></span></span></p>
      <p  style="margin-bottom: 0in; border: 1px solid #00000a; padding: 0.01in 0.06in; line-height: 100%">
      <span style="font-family:'Times New Roman, serif'"><i>Instructions: Competent adults
      and emancipated minors may give advance instructions using this form
      or any form of their own choosing. To be legally binding the Advance
      Care Plan must be signed and either witnessed or notarized.</i></span></p>
      <p  style="margin-bottom: 0in; line-height: 100%"><br/>

      </p>
      <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      <span style="font-family:'Times New Roman, serif'">I, </span><span style="font-family:'Times New Roman, serif'"><b></b></span>
      
      <span color="#0000ff">
        <span style="font-family:'Times New Roman, serif'">
          <b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
        </span>
      </span>
      

      <span style="font-family:'Times New Roman, serif'">,
      of </span>
      
      <span color="#0433ff">
        <span style="font-family:'Times New Roman, serif'" >{{$tellUsAboutYou['address']}}</span>
      </span>
      
      <span style="font-family:'Times New Roman, serif'">, </span>
      
      <span color="#0433ff">
        <span style="text-transform: capitalize" style="font-family:'Times New Roman, serif'">{{$tellUsAboutYou['city']}}</span>
      </span>
      
      
      <span style="font-family:'Times New Roman, serif'">, 
      </span>
      
      <span color="#0433ff">
        <span style="text-transform: capitalize" style="font-family:'Times New Roman, serif'">{{$tellUsAboutYou['state']}}</span>
      </span>

      <span style="font-family:'Times New Roman, serif'">,
      hereby give these advance instructions on how I want to be treated by
      my doctors and other health care providers when I can no longer make
      those treatment decisions myself.</span></p>
      <p  style="margin-bottom: 0in; line-height: 100%"><br/>

      </p>
      
      
      <p  style="margin-bottom: 0.09in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><b>AGENT:&nbsp;
        </b></span><span style="font-family:'Times New Roman, serif'">I want the following
        person to make health care decisions for me:</span>
      </p>
      
      <p  style="margin-left: 0.38in; text-indent: 0.13in; margin-bottom: 0in; line-height: 100%">
        <span color="#000000">
          <span style="font-family:'Times New Roman, serif'">Name: 		</span>
        </span>
        
        <span color="#0433ff">
          <span style="font-family:'Times New Roman, serif'">{{$healthFinance['fullname']}}</span>
        </span>
        
        <span color="#000000">
          <span style="font-family:'Times New Roman, serif'">	</span>
        </span>
      </p>

      <p  style="margin-left: 0.38in; text-indent: 0.13in; margin-bottom: 0in; line-height: 100%">
        <span color="#000000"><span style="font-family:'Times New Roman, serif'">Relation:</span></span>
        
        <span color="#0433ff">
          <span>

          </span>

          	@if(strtolower($healthFinance['relation']) == 'other')
				<span style="font-family:'Times New Roman, serif'">{{$healthFinance['relationOther']}}, </span>
			@else
				<span style="font-family:'Times New Roman, serif'" >{{$healthFinance['relation']}}, </span>
			@endif

        </span>
        <span color="#000000"><span style="font-family:'Times New Roman, serif'">	</span></span>
      </p>

      <p  style="margin-left: 0.38in; text-indent: 0.13in; margin-bottom: 0in; line-height: 100%">
        <span color="#000000"><span style="font-family:'Times New Roman, serif'">Phone :</span></span>
        
        <span color="#0433ff">
          <span style="font-family:'Times New Roman, serif'">{{$healthFinance['phone']}}</span>
      </p>

      <p  style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
        <span color="#000000"><span style="font-family:'Times New Roman, serif'">Address:</span></span>
        
        <span color="#0433ff">
            <span style="font-family:'Times New Roman, serif'">{{$healthFinance['address']}}, </span>
        </span>
        
        <span color="#000000"><span style="font-family:'Times New Roman, serif'"></span></span>
      </p>

      <p style="margin-bottom: 0in; line-height: 100%">
        <span color="#000000"><span style="font-family:'Times New Roman, serif'">			</span></span>
        
        <span color="#0000ff">
          <span style="font-family:'Times New Roman, serif'">{{$healthFinance['city']}}, </span>
        </span>
        
        <span color="#0000ff">
          <span style="font-family:'Times New Roman, serif'">{{$healthFinance['state']}}, </span>
        </span>
      
      <span style="font-family:'Times New Roman, serif'"></span>
        <span color="#0000ff">
          <span style="font-family:'Times New Roman, serif'">{{$healthFinance['zip']}}, </span>
        </span>
        <span style="font-family:'Times New Roman, serif'"></span>
      </p>
      <p  style="margin-bottom: 0in; line-height: 100%"><br/>

      </p>
      
      @if($healthFinance['anyBackupAgent'] == 'true')
      
      <p  style="margin-bottom: 0.09in; line-height: 100%">
        <span style="font-family:'Times New Roman, serif'">
          <b>ALTERNATE AGENT:&nbsp; </b>
        </span>
        <span style="font-family:'Times New Roman, serif'">If the
      person named above is unable or unwilling to make health care
      decisions for me, I appoint as alternate agent:
        </span>
      </p>
      
      <p style="margin-left: 0.38in; text-indent: 0.13in; margin-bottom: 0in; line-height: 100%">
          <span color="#000000">
            <span style="font-family:'Times New Roman, serif'">Name: 		</span>
          </span>
          
          <span color="#0433ff">
            <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupFullname']}}</span>
          </span>
          
          <span color="#000000">
            <span style="font-family:'Times New Roman, serif'">	</span>
          </span>
        </p>
  
        <p  style="margin-left: 0.38in; text-indent: 0.13in; margin-bottom: 0in; line-height: 100%">
          <span color="#000000"><span style="font-family:'Times New Roman, serif'">Relation :</span></span>
          
          <span color="#0433ff">
            <span>
            </span>
			@if(strtolower($healthFinance['backupRelation']) == 'other')
				<span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupRelationOther']}}, </span>
			@else
				<span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupRelation']}}, </span>
			@endif
          </span>
          <span color="#000000"><span style="font-family:'Times New Roman, serif'">	</span></span>
        </p>
  
        <p  style="margin-left: 0.38in; text-indent: 0.13in; margin-bottom: 0in; line-height: 100%">
          <span color="#000000"><span style="font-family:'Times New Roman, serif'">Phone :</span></span>
          
          <span color="#0433ff">
            <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupphone']}}</span>
          </span>
        </p>
  
        <p  style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
          <span color="#000000"><span style="font-family:'Times New Roman, serif'">Address :</span></span>
          
          <span color="#0433ff">
              <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupAddress']}}, </span>
          </span>
          
          <span color="#000000"><span style="font-family:'Times New Roman, serif'"></span></span>
        </p>
  
        <p style="margin-bottom: 0in; line-height: 100%">
          <span color="#000000"><span style="font-family:'Times New Roman, serif'">			</span></span>
          
          <span color="#0000ff">
            <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupCity']}}, </span>
          </span>
          
          
          <span color="#0000ff">
            <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupState']}}, </span>
          </span>
        
        <span style="font-family:'Times New Roman, serif'"></span>
        
          <span color="#0000ff">
            <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupZip']}}, </span>
          </span>
          
          <span style="font-family:'Times New Roman, serif'"></span>
        </p>
        <p  style="margin-bottom: 0in; line-height: 100%"><br/>
  
      	@endif
      
      <p  style="margin-bottom: 0in; line-height: 100%"><br/>

      </p>
      <p  style="margin-bottom: 0.06in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><b>QUALITY
      OF LIFE:</b></span></p><br>
      <p  style="margin-bottom: 0.06in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">I
      want my doctors to help me maintain an acceptable quality of life
      including adequate pain management. A quality of life that is
      unacceptable to me means when I have any of the following conditions
      </span><span style="font-family:'Times New Roman, serif'"><b>(you can check as many
      of these items as you want)</b></span><span style="font-family:'Times New Roman, serif'">:</span></p><br>
      <p  style="margin-left: 0.38in; margin-bottom: 0.03in; line-height: 0.15in">
      &EmptySmallSquare; <span style="font-family:'Times New Roman, serif'"><b>Permanent Unconscious
      Condition: </b></span><span style="font-family:'Times New Roman, serif'">I become
      totally unaware of people or surroundings with little chance of ever
      waking up from the coma.</span></p><br>
      <p  style="margin-left: 0.38in; margin-bottom: 0.03in; line-height: 0.15in">
      □ <span style="font-family:'Times New Roman, serif'"><b>Permanent Confusion: </b></span><span style="font-family:'Times New Roman, serif'">I
      become unable to remember, understand or make decisions. I do not
      recognize loved ones or cannot have a clear conversation with them.</span></p><br>
      <p  style="margin-left: 0.38in; margin-bottom: 0.03in; line-height: 0.15in">
      □ <span style="font-family:'Times New Roman, serif'"><b>Dependent in all
      Activities of Daily Living: </b></span><span style="font-family:'Times New Roman, serif'">I
      am no longer able to talk clearly or move by myself. I depend on
      others for feeding, bathing, dressing and walking. Rehabilitation or
      any other restorative treatment will not help.</span></p>
    </div>

    {{--
    <div *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null" 
    style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
      Advance Directive of {{userDetails.tellUsAboutYou.fullname}}<br>
      Page 1 of 4
    </div>

    <div *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null" style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
      Advance Directive of  «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
      Page 1 of 4
    </div>
    --}}
  </div>
  
  
  <div>
    <div>
      <p  style="margin-left: 0.38in; margin-bottom: 0in; line-height: 0.15in">
        □ <span style="font-family:'Times New Roman, serif'"><b>End-Stage Illnesses: </b></span><span style="font-family:'Times New Roman, serif'">I
        have an illness that has reached its final stages in spite of full
        treatment. Examples:&nbsp; Widespread cancer that does not respond
        anymore to treatment; chronic and/or damaged heart and lungs, where
        oxygen needed most of the time and activities are limited due to the
        feeling of suffocation.</span>
      </p>
      
      <p  style="margin-bottom: 0in; line-height: 100%"><br/></p>

      <p  style="margin-bottom: 0.06in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><b>TREATMENT:</b></span></p>
      <p  style="margin-bottom: 0.13in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">If
        my quality of life becomes unacceptable to me and my condition is
        irreversible (that is, it will not improve), I direct that medically
        appropriate treatment be provided as follows. </span><span style="font-family:'Times New Roman, serif'"><b>Checking
        “yes” means I WANT the treatment. Checking “no” means I DO
        NOT want the treatment.</b></span>
      </p>
      <table width="628" cellpadding="5" cellspacing="0">
        
        <tr valign="top">
          <td width="85" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #000001; border-right: 1px solid #000001; padding: 0in 0.05in">
            <p  style="margin-left: 0.19in; margin-bottom: 0in">
            <span size="5" style="font-size: 18pt">□</span><span style="font-family:'Times New Roman, serif'">	</span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 18pt">□</span></span></p>
            <p  style="margin-left: 0.19in"><span style="font-family:'Times New Roman, serif'">Yes	No</span></p>
          </td>
          <td width="521" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #000001; border-right: 1px solid #000001; padding: 0in 0.05in">
            <p ><span style="font-family:'Times New Roman, serif'"><u><b>CPR
            (Cardiopulmonary Resuscitation)</b></u></span><span style="font-family:'Times New Roman, serif'"><b>:
            </b></span><span style="font-family:'Times New Roman, serif'">To make the heart
            beat again and restore breathing after it has stopped. Usually
            this involves electric shock, chest compressions, and breathing
            assistance.</span></p>
          </td>
        </tr>
        <tr valign="top">
          <td width="85" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #000001; border-right: 1px solid #000001; padding: 0in 0.05in">
            <p  style="margin-left: 0.19in; margin-bottom: 0in">
              <span size="5" style="font-size: 18pt">□</span><span style="font-family:'Times New Roman, serif'">	</span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 18pt">□</span></span></p>
            <p  style="margin-left: 0.19in"><span style="font-family:'Times New Roman, serif'">Yes	No</span></p>
          </td>
          <td width="521" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #000001; border-right: 1px solid #000001; padding: 0in 0.05in">
            <p ><span style="font-family:'Times New Roman, serif'"><u><b>Life
            Support / Other Artificial Support</b></u></span><span style="font-family:'Times New Roman, serif'"><b>:
            </b></span><span style="font-family:'Times New Roman, serif'">Continuous use of
            breathing machine, IV fluids, medications, and other equipment
            that helps the lungs, heart, kidneys and other organs to continue
            to work.</span></p>
          </td>
        </tr>
        <tr valign="top">
          <td width="85" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #000001; border-right: 1px solid #000001; padding: 0in 0.05in">
            <p  style="margin-left: 0.19in; margin-bottom: 0in">
            <span size="5" style="font-size: 18pt">□</span><span style="font-family:'Times New Roman, serif'">	</span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 18pt">□</span></span></p>
            <p  style="margin-left: 0.19in"><span style="font-family:'Times New Roman, serif'">Yes	No</span></p>
          </td>
          <td width="521" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #000001; border-right: 1px solid #000001; padding: 0in 0.05in">
            <p ><span style="font-family:'Times New Roman, serif'"><u><b>Treatment
            of New Conditions</b></u></span><span style="font-family:'Times New Roman, serif'"><b>:
            </b></span><span style="font-family:'Times New Roman, serif'">Use of surgery,
            blood transfusions, or antibiotics that will deal with a new
            condition but will not help the main illness.</span></p>
          </td>
        </tr>
        <tr valign="top">
          <td width="85" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #000001; border-right: 1px solid #000001; padding: 0in 0.05in">
            <p  style="margin-left: 0.19in; margin-bottom: 0in">
            <span size="5" style="font-size: 18pt">□</span><span style="font-family:'Times New Roman, serif'">	</span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 18pt">□</span></span></p>
            <p  style="margin-left: 0.19in"><span style="font-family:'Times New Roman, serif'">Yes	No</span></p>
          </td>
          <td width="521" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #000001; border-right: 1px solid #000001; padding: 0in 0.05in">
            <p ><span style="font-family:'Times New Roman, serif'"><u><b>Tube
            feeding/IV fluids</b></u></span><span style="font-family:'Times New Roman, serif'"><b>:
            </b></span><span style="font-family:'Times New Roman, serif'">Use of tubes to
            deliver food and water to patient’s stomach or use of IV fluids
            into a vein which would include artificially delivered nutrition
            and hydration.</span></p>
          </td>
        </tr>
      </table>
      <p  style="margin-bottom: 0.06in; line-height: 100%"></p>
      
        <p  style="margin-bottom: 0.06in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><b>OTHER
        INSTRUCTIONS, SUCH AS BURIAL ARRANGEMENTS, HOSPICE CARE, ETC.:</b></span></p>
        <p  style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
        <span style="font-family:'Times New Roman, serif'">_________________________________________________________________________</span></p>
        <p  style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
        <span style="font-family:'Times New Roman, serif'">_________________________________________________________________________</span></p>
        <p  style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
        <span style="font-family:'Times New Roman, serif'">_________________________________________________________________________</span></p>
        <p style="text-indent: 0.38in; margin-bottom: 0in; line-height: 100%">
        <span style="font-family:'Times New Roman, serif'"><i>(Add additional pages if
        necessary.)</i></span></p><br><br>
        <p  style="margin-bottom: 0.06in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><b>ORGAN
        DONATION</b></span><span style="font-family:'Times New Roman, serif'"> (optional):
        Upon my death, I wish to make the following anatomical gift (please
        mark one):</span></p>
        <p  style="margin-bottom: 0.06in; line-height: 100%">
        	<span size="5" style="font-size: 18pt">&EmptySmallSquare;</span>
        <span style="font-family:'Times New Roman, serif'">Any organ/tissue&nbsp; </span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 18pt">□</span></span><span style="font-family:'Times New Roman, serif'">
        My entire body&nbsp; </span><span style="font-family:'Times New Roman, serif'"><span size="5" style="font-size: 18pt">□</span></span><span style="font-family:'Times New Roman, serif'">
        Only the following organs/tissues:</span></p><br>
        <p  style="margin-left: 0.75in; margin-bottom: 0.09in; line-height: 100%">
        <span style="font-family:'Times New Roman, serif'">_____________________________________________________________________</span></p>
        <p  style="margin-left: 0.75in; margin-bottom: 0.09in; line-height: 100%">
        <span style="font-family:'Times New Roman, serif'">_____________________________________________________________________</span></p>
        <p  style="margin-left: 0.75in; margin-bottom: 0in; line-height: 100%">
        <span style="font-family:'Times New Roman, serif'">_____________________________________________________________________</span></p>
        </div>

        {{--
        <div *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null" 
        style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
          Advance Directive of {{userDetails.tellUsAboutYou.fullname}}<br>
          Page 2 of 4
        </div>
        <div *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null" style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
          Advance Directive of  «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
          Page 2 of 4
        </div>
        --}}
  </div>
  
  
  <div>
    <div>
      <p  style="margin-bottom: 0.06in; line-height: 100%; text-align: center;">
      <span style="font-family:'Times New Roman, serif'"><u><b>SIGNATURE</b></u></span></p>
      <p  style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">Your
      signature should either be witnessed by two competent adults or
      notarized. If witnessed, neither witness should be the person you
      appointed as your agent, and at least one of the witnesses should be
      someone who is not related to you or entitled to any part of your
      estate.</span></p>
      <p style="margin-bottom: 0in; line-height: 100%"><br/>

      </p>
      <p  style="margin-bottom: 0in; line-height: 100%"><br/>

      </p>
      <p style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'"><u>							</u></span></p>
      <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
      
      <span color="#0000ff">
      	<span style="font-family:'Times New Roman, serif'">
      		<b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
      	</span>
      </span>

      <span color="#000000">
      	<span style="font-family:'Times New Roman, serif'">,</span></span><span color="#0433ff"><span style="font-family:'Times New Roman, serif'">
      </span></span>
      </p>
      <p style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">Declarant</span></p>
      <p  style="margin-bottom: 0in; line-height: 100%"><br/>

      </p>
      <p  style="margin-bottom: 0in; line-height: 100%"><span color="#000000"><span style="font-family:'Times New Roman, serif'">DATE:
      </span></span><span color="#000000"><span style="font-family:'Times New Roman, serif'"><u>_____________________________</u></span></span></p>
      <p  style="margin-bottom: 0in; line-height: 100%"><br/>

      </p>
      <p  style="margin-bottom: 0in; line-height: 100%"><br/>

      </p>
      <p  style="margin-bottom: 0in; line-height: 100%"><br/>

      </p>
      <p  style="margin-bottom: 0.13in; line-height: 100%"><br/>
      <br/>

      </p>
      <p  style="margin-bottom: 0.13in; line-height: 100%"><br/>
      <br/>

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
    </div>

    {{--
    <div *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null" 
    style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
      Advance Directive of {{userDetails.tellUsAboutYou.fullname}}<br>
      Page 3 of 4
        
    </div>

    <div *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null" style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
      Advance Directive of  «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
      Page 3 of 4
    </div>
    --}}
  </div>
  
  
  <div>
    <div>
      <p  style="margin-bottom: 0in; line-height: 100%; page-break-before: always">
        <span style="font-family:'Times New Roman, serif'"><i>This document may be notarized
        instead of witnessed</i></span><span style="font-family:'Times New Roman, serif'">:</span></p>
        <p  style="margin-bottom: 0in; line-height: 100%"><br/>

        </p>
        <p  style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">STATE
        OF TENNESSEE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</span></p>
        <p  style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
        ss.&nbsp;</span></p>
        <p  style="margin-bottom: 0in; line-height: 100%"><span color="#000000"><span style="font-family:'Times New Roman, serif'">COUNTY
        OF ________________	)</span></span></p>
        <p  style="margin-bottom: 0in; line-height: 100%"><br/>

        </p>
        <p  style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
        <span style="font-family:'Times New Roman, serif'">I am a Notary Public in and for
        the State and County named above. </span>

        <span color="#0000ff">
        	<span style="font-family:'Times New Roman, serif'">
        		<b style="text-transform: capitalize">{{$tellUsAboutYou['fullname']}}</b>
        	</span>
        </span>


        <span style="font-family:'Times New Roman, serif'">, the person who signed this instrument, is personally known to me (or
        proved to me on the basis of satisfactory evidence) to be the person
        who signed as the “Declarant”. The Declarant personally appeared
        before me and signed above or acknowledged the signature above as
        </span>

        <span color="#0433ff">
        	<span style="font-family:'Times New Roman, serif'">{{$genderTxt4}}</span>
        </span>

        <span style="font-family:'Times New Roman, serif'">
        own. I declare under penalty of perjury that the Declarant appears to
        be of sound mind and under no duress, fraud, or undue influence.</span></p>
        <p  style="margin-bottom: 0in; line-height: 100%"><br/>

        </p>
        <p  style="margin-bottom: 0in; line-height: 100%"><br/>

        </p>
        <p  style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">	______________________________________</span></p>
        <p  style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">	</span><span style="font-family:'Times New Roman, serif'"><b>NOTARY
        PUBLIC</b></span></p>
        <p  style="margin-bottom: 0in; line-height: 100%"><br/>

        </p>
        <p  style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif'">My
        Commission expires: _________________</span></p>
        <p  style="margin-bottom: 0in; line-height: 100%"><br/>

        </p>
        <p  style="margin-bottom: 0in; line-height: 100%"><br/>

        </p>
        <p  style="margin-bottom: 0.06in; line-height: 100%"><br/>
        <br/>

        </p>
        <p  style="margin-bottom: 0.06in; line-height: 100%"><br/>
        <br/>

        </p>
        <p  style="margin-bottom: 0.06in; line-height: 100%"><br/>
        <br/>

        </p>
        <p  style="margin-bottom: 0.06in; line-height: 100%"><br/>
        <br/>

        </p>
        <p  style="margin-bottom: 0.06in; line-height: 100%"><br/>
        <br/>

        </p>
        <p  style="margin-bottom: 0.06in; line-height: 100%; text-align: center;"><span style="font-family:'Times New Roman, serif'"><b>WHAT
        TO DO WITH THIS ADVANCE DIRECTIVE</b></span></p>
        <p  style="margin-bottom: 0.06in; line-height: 100%"><br/>
        <br/>

        </p>
        <p  style="margin-left: 0.38in; margin-bottom: 0in; line-height: 150%">
        • <span style="font-family:'Times New Roman, serif'">Provide a copy to your
        physician(s)</span></p>
        <p  style="margin-left: 0.38in; margin-bottom: 0in; line-height: 150%">
        • <span style="font-family:'Times New Roman, serif'">Keep a copy in your personal
        files where it is accessible to others</span></p>
        <p  style="margin-left: 0.38in; margin-bottom: 0in; line-height: 150%">
        • <span style="font-family:'Times New Roman, serif'">Tell your closest relatives
        and friends what is in the document</span></p>
        <p  style="margin-left: 0.38in; margin-bottom: 0.06in; line-height: 150%">
        • <span style="font-family:'Times New Roman, serif'">Provide a copy to the
        person(s) you named as your health care agent</span></p>
    </div>
    {{--
	    <div *ngIf="userDetails !== undefined && userDetails.tellUsAboutYou !== null && userDetails.tellUsAboutYou.fullname !== null" 
	    style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
	      Advance Directive of {{userDetails.tellUsAboutYou.fullname}}<br>
	      Page 4 of 4
	        
	    </div>

	    <div *ngIf="userDetails === undefined && userDetails.tellUsAboutYou === null" style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
	      Advance Directive of  «CLIENT FIRST NAME» «CLIENT MIDDLE NAME» «CLIENT LAST NAME»<br>
	      Page 4 of 4
	    </div>
	    --}}
  </div>
	</div>

</body>
</html>