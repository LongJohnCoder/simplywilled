<!DOCTYPE html>
<html>
<head>
	<title>Health Care Power of Attorney</title>
    <style type="text/css">
        
    </style>
</head>
<body>

<div>
	<div class="docPage" style="margin: 0; box-sizing: border-box; padding: 0px;">
  <div class="docPageInner" style="box-sizing: border-box; height: 875px;">
      <p align="center" style="margin-bottom: 0.13in; "><span size="4" style="font-size: 13pt"><span face="Times New Roman, serif"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>M</b></span></span></span><span size="4" style="font-size: 16pt"><b>ASSACHUSETTS</b></span><span size="4" style="font-size: 16pt">
        </span><span face="Times New Roman, serif"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>H</b></span></span></span><span size="4" style="font-size: 16pt"><b>EALTH
        </b></span><span face="Times New Roman, serif"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>C</b></span></span></span><span size="4" style="font-size: 16pt"><b>ARE
        </b></span><span face="Times New Roman, serif"><span size="5" style="font-size: 19pt"><span size="4" style="font-size: 16pt"><b>P</b></span></span></span><span size="4" style="font-size: 16pt"><b>ROXY</b></span></span></p>
        <p align="center" style="margin-bottom: 0.13in; "><br/>
        <br/>
        
        </p>
        <p class="western" align="justify" style="margin-bottom: 0in; ">
        <span color="#000000">1.</span><span color="#000000">	</span><span color="#000000">I,
        </span>
        
        <span color="#0000ff">
            <b style="text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}}</b>
        </span>
        
        <span color="#000000">, hereby appoint my </span>
        
        @if(strtolower($healthFinance['relation']) == 'other')
            @if(strlen(trim($healthFinance['relationOther'])) > 0)
                <span style="font-family:'Times New Roman, serif'">{{$healthFinance['relationOther']}}, </span>
            @else
                <span style="font-family:'Times New Roman, serif'">(relation) __________________ ,</span>
            @endif
		@else
            @if(strlen(trim($healthFinance['relation'])) > 0)
                <span style="font-family:'Times New Roman, serif'">{{$healthFinance['relation']}}, </span>
            @else
                <span style="font-family:'Times New Roman, serif'">(relation) __________________ ,</span>
            @endif
		@endif
        
        <span color="#000000">, </span>
        <span style="font-family:'Times New Roman, serif'">{{$healthFinance['fullname']}}</span>
        

        <span color="#000000"> of </span>
        
        <span style="font-family:'Times New Roman, serif'">{{$healthFinance['address']}}, </span>
        
        <span color="#000000"> </span>in 
        
        <span style="font-family:'Times New Roman, serif'">{{$healthFinance['city']}}, </span>
        
        
        <span style="text-transform: capitalize" style="font-family:'Times New Roman, serif'">{{$tellUsAboutYou['state']}}</span>
        
        
        <span style="font-family:'Times New Roman, serif'">{{$healthFinance['zip']}}, </span>
        
        
        <span color="#000000">(Tel: </span>
        
        <span style="font-family:'Times New Roman, serif'">{{$healthFinance['phone']}}</span>
        
        <span color="#000000">),
        
        </span>
        
        <span color="#000000">
          <span face="Times, serif">
            <span size="2" style="font-size: 9pt">
              <span face="Times New Roman, serif">
                <span size="3" style="font-size: 12pt">as </span>
              </span>
            </span>
          </span>
        </span>
        
        <span color="#000000">my agent to make health care decisions for me as authorized in this document.</span></p>
        <p align="justify" style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in; ">
        <br/>
        
        </p>

        <!-- if backup agent-->
        @if($healthFinance['anyBackupAgent'] == 'true')
        
              <p class="western" align="justify" style="margin-bottom: 0in; ">
	              If said agent is not available or becomes ineligible to act, or if I
	              revoke this appointment or authority to act as my agent, then I
	              designate 
	              <span color="#000000">my </span>

	              @if(strtolower($healthFinance['backupRelation']) == 'other')
                    @if(strlen(trim($healthFinance['backupRelationOther'])) > 0)
	                   <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupRelationOther']}}, </span>
                    @else
                        <span>(relation) ____________________</span>
                    @endif
	              @else
                    @if(strlen(trim($healthFinance['backupRelation'])) > 0)
                       <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupRelation']}}, </span>
                    @else
                        <span>(relation) ____________________</span>
                    @endif
	              @endif
	              
	              <span color="#000000">, </span>
	              
	              <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupFullname']}}</span>
	              
	              <span color="#000000">, of </span>
	              
	              <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupAddress']}}, </span>

	              <span>in </span> 
	              <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupCity']}}, </span>
	              
	              <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupState']}}, </span>
	                    
				  <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupZip']}}, </span>
              </p>
              
              <p align="justify" style="margin-bottom: 0in; "><span color="#000000">
              <span size="2" style="font-size: 9pt">
                <span size="3" style="font-size: 12pt">(Tel: </span>
              </span>
              
              <span color="#0433ff">
                  <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupphone']}}</span>
              </span>
              
              <span color="#000000">
                <span size="3" style="font-size: 12pt">), </span>
              </span>
              
				<span color="#000000">
        			<span face="Times, serif">
        				<span size="2" style="font-size: 9pt">
        					<span face="Times New Roman, serif">
        						<span size="3" style="font-size: 12pt">as</span>
        					</span>
        				</span>
        			</span>
				</span>

          		<span color="#000000">
          			<span size="3" style="font-size: 12pt">my alternate agent to make health care decisions for me as authorized in
              this document.</span>
          		</span>
          	</span></p>
        
        @endif


        <p class="western" style="margin-bottom: 0in; ">2.	My
        Agent shall have the authority to make all health care decisions for
        me, including decisions about life-sustaining treatment, subject to
        any limitations I state below, if I am unable to make health care
        decisions myself. My Agent’s authority becomes effective if my
        attending physician determines in writing that I lack the capacity to
        make or to communicate health care decisions. My Agent is then to
        have the same authority to make health care decisions as I would if I
        had the capacity to make them EXCEPT (here list the limitations, if
        any, you wish to place on your Agent’s authority):</p>
        <p align="justify" style="margin-left: 0.38in; margin-bottom: 0.09in; ">
        <br/>        
        </p>
        <p align="justify" style="margin-left: 0.38in; margin-bottom: 0.09in; ">
        <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></p>
        <p align="justify" style="margin-left: 0.38in; margin-bottom: 0.09in; ">
        <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></p>
        <p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; ">
        <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">________________________________________________________________________</span></span></p>
        <p align="center" style="margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="3" style="font-size: 12pt"><i>(Add
        additional sheets if necessary.)</i></span></span></p>
        <p align="justify" style="margin-bottom: 0in; "><br/>
        
        </p>
        <p class="western" style="margin-bottom: 0in; ">I
        direct my Agent to make health care decisions based on my Agent’s
        assessment of my personal wishes. If my personal wishes are unknown,
        my Agent is to make health care decisions based on my Agent’s
        assessment of my best interests. Photocopies of this Health Care
        Proxy shall have the same force and effect as the original and may be
        given to other health care providers.</p>
        <p align="justify" style="margin-bottom: 0in; "><br/>
        
        </p>
        <p align="justify" style="margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">3.	My
        agent shall make health care decisions for me in accordance with this
        instrument, and my other wishes to the extent known to my agent. To
        the extent my wishes are unknown, my agent shall make health care
        decisions for me in accordance with what my agent determines to be in
        my best interest. In determining my best interest, my agent shall
        consider my personal values to the extent known to my agent.</span></span></p>
        <p align="justify" style="margin-bottom: 0in; "><br/>
        
        </p>
        <p align="justify" style="margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">4.	This
        Health Care Proxy shall take effect in the event I become unable to
        make or communicate my own health care decisions.</span></span></p>
        
        
  </div>

  
</div>

<div class="docPage" style="margin:0; box-sizing: border-box; padding: 0px;">
    <div class="docPageInner" style="box-sizing: border-box; height: 875px;">
        
        <p align="justify" style="margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">5.	My
        Agent shall have the authority to exercise at any time or times the
        following powers, authorities, and discretions for me and in my name:</span></span></p>
        <p align="justify" style="margin-bottom: 0in; "><br/>
        
        </p>
        <p align="justify" style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in; ">
        <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(a)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">Request,
        review, and receive, to the extent I could do so individually, any
        information, verbal or written, regarding my physical or mental
        health, including, but not limited to, my individually identifiable
        health information or other medical records. This release authority
        applies to any information governed by the Health Insurance
        Portability and Accountability Act of 1996 (HIPAA), 42 U.S.C. 1320d
        and 45 CFR 160-164. I hereby authorize any physician, health care
        professional, dentist, health plan, hospital, clinic, laboratory,
        pharmacy, or other covered health care provider, any insurance
        company, and the Medical Information Bureau, Inc. or other health
        care clearinghouse that has provided treatment or services to me, or
        that has paid for or is seeking payment from me for such services, to
        give, disclose, and release to my agent, without restriction, all of
        my individually identifiable health information and medical records
        regarding any past, present, or future medical or mental health
        condition. This authority given my agent shall supersede any other
        agreement which I may have made with my health care providers to
        restrict access to or disclosure of my individually identifiable
        health information. This authority given my agent shall be effective
        immediately, has no expiration date and shall expire only in the
        event that I revoke the authority in writing and deliver it to my
        health care provider.</span></span></p>
        <p align="justify" style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in; ">
        <br/>
        
        </p>
        <p align="justify" style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in; ">
        <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(b)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">To
        employ and discharge physicians, psychiatrists, dentists, nurses,
        therapists, and other professionals as my Agent may deem necessary
        for my physical, mental, and emotional well-being; and to pay them,
        or any of them, reasonable compensation;</span></span></p>
        <p align="justify" style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in; ">
        <br/>
        
        </p>
        <p align="justify" style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in; ">
        <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(c)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">To
        give or withhold consent to my medical care, surgery, or any other
        medical procedures or tests; to arrange for my hospitalization,
        convalescent care, or home care; and to revoke, withdraw, modify, or
        change consent to my medical care, surgery, or any other medical
        procedures or tests, hospitalization, convalescent care, or home care
        which I or my Agent may have previously allowed or consented to which
        may have been implied due to emergency conditions. I ask my Agent to
        be guided in making such decisions by what I have told my Agent about
        my personal preferences regarding such care. Based on those same
        preferences, my Agent may also summon paramedics or other emergency
        medical personnel and seek emergency treatment for me, or choose not
        to do so, as my Agent deems appropriate given my wishes and my
        medical status at the time of the decision. My Agent is authorized,
        when dealing with hospitals and physicians, to sign documents titled
        or purporting to be a &quot;Refusal to Permit Treatment&quot; and
        &quot;Leaving Hospital Against Medical Advice&quot; as well as any
        necessary waivers of or releases from liability required by the
        hospitals or physicians to implement my wishes regarding medical
        treatment or non-treatment;</span></span></p>
        
        
    </div>

   
</div>

<div class="docPage" style="margin: 0; box-sizing: border-box; padding: 0px;">
    <div class="docPageInner" style="box-sizing: border-box; height: 875px; page-break-after: always;">
        <p align="justify" style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in; ">
            <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(d)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">To
            consent to and arrange for the administration of pain-relieving drugs
            of any type, or other surgical or medical procedures calculated to
            relieve my pain even though their use may lead to permanent physical
            damage, addiction, or even hasten the moment of (but not
            intentionally cause) my death. My Agent may also consent to and
            arrange for unconventional pain-relief therapies such as biofeedback,
            guided imagery, relaxation therapy, acupuncture, skin stimulation, or
            cutaneous stimulation, and other therapies which I or my Agent
            believe may be helpful to me;</span></span></p>
            <p align="justify" style="margin-bottom: 0in; "><br/>
            
            </p>
            <p align="justify" style="margin-left: 0.75in; text-indent: -0.38in; margin-bottom: 0in; ">
            <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">(e)</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">To
            sign, execute, deliver, acknowledge, and make declarations in any
            document or documents that may be necessary, desirable, convenient,
            or proper in order to exercise any of the powers described in this
            document; to enter into contracts; and to pay reasonable compensation
            or costs in the exercise of any such powers.</span></span></p>
            <p align="justify" style="margin-bottom: 0in; "><br/>
            
            </p>
            <p align="justify" style="margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">6.	In
            no event shall my Agent be held personally liable for any exercise of
            the powers herein contained or for any expenses in connection with
            the exercise of such powers, except in the case of gross misconduct
            or fraud.</span></span></p>
            <p align="justify" style="margin-bottom: 0in; "><br/>
            
            </p>
            <p align="justify" style="margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">7.	If
            proceedings are initiated for the appointment of a Guardian of my
            person, I appoint my Agent to serve as such Guardian.</span></span></p>
            <p align="justify" style="margin-bottom: 0in; "><br/>
            
            </p>
            <p style="margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">8.	Unless
            I revoke it, this proxy shall remain in effect indefinitely.</span></span></p>
            <p style="margin-bottom: 0in; "><br/>
            
            </p>
            <p class="western" style="margin-bottom: 0in; ">9.	DONATION
            OF ORGANS (OPTIONAL). Initial the line next to the statements below
            that best reflect your wishes. If you do not complete this section,
            your spouse, adult children, parents, adult siblings, or health care
            agent, in that order of priority, will have the authority to make a
            gift of a part of your body pursuant to law unless you give them
            notice orally or in writing that you do not want a gift made. The
            donation elections you make below survive your death. I hereby make
            this organ and tissue gift, if medically acceptable, to take effect
            upon my death. The words and marks (or notations) below indicate my
            desires: 
            </p>
            <p class="western" style="margin-bottom: 0in; "><br/>
            
            </p>

    </div>

</div>

<div class="docPage" style="margin: 0; box-sizing: border-box; padding: 0px;">
  <div class="docPageInner" style="box-sizing: border-box; height: 875px;">
      <p class="western" style="margin-left: 1in; margin-bottom: 0in; ">
          Upon my death, I wish to donate: 
          </p>
          <p class="western" style="margin-left: 1in; margin-bottom: 0in; ">
          ________ My body for anatomical study if needed. 
          </p>
          <p class="western" style="margin-left: 1in; margin-bottom: 0in; ">
          ________ Any needed organs, tissues, or eyes. 
          </p>
          <p class="western" style="margin-left: 1in; margin-bottom: 0in; ">
          ________ Only the following organs, tissues, or eyes:</p>
          <p class="western" style="margin-left: 1in; margin-bottom: 0in; ">
                <u>				</u></p>
          <p class="western" style="margin-left: 1in; margin-bottom: 0in; ">
                <u>				</u></p>
          <p class="western" style="margin-left: 1in; margin-bottom: 0in; ">
                <u>				</u></p>
          <p class="western" style="margin-left: 1in; margin-bottom: 0in; ">
                <u>				</u></p>
          <p class="western" style="margin-left: 1in; margin-bottom: 0in; ">
          <br/>
          
          </p>
          <p class="western" style="margin-left: 1in; margin-bottom: 0in; ">
          I authorize the use of my organs, tissues, or eyes: 
          </p>
          <p class="western" style="margin-left: 1in; margin-bottom: 0in; ">
          ________ For transplantation 
          </p>
          <p class="western" style="margin-left: 1in; margin-bottom: 0in; ">
          ________ For therapy 
          </p>
          <p class="western" style="margin-left: 1in; margin-bottom: 0in; ">
          ________ For research 
          </p>
          <p class="western" style="margin-left: 1in; margin-bottom: 0in; ">
          ________ For medical education 
          </p>
          <p class="western" style="margin-left: 1in; margin-bottom: 0in; ">
          ________ For any purpose authorized by law. 
          </p>
          <p class="western" style="margin-bottom: 0in; "><br/>
          
          </p>
          <p class="western" style="margin-bottom: 0in; "><br/>
          
          </p>
          <p class="western" style="margin-bottom: 0in; ">
          Limitations or special wishes, if any, list below: 
          </p>
          <p class="western" style="margin-bottom: 0in; ">_____________________________________________________________
          _____________________________________________________________
          _____________________________________________________________
          _____________________________________________________________ 
          </p>
          <p class="western" style="margin-bottom: 0in; ">_____________________________________________________________
          _____________________________________________________________
          _____________________________________________________________
          _____________________________________________________________ 
          </p>
          <p class="western" style="margin-bottom: 0in; ">(Attach
          additional pages, if needed.)</p>
          <p class="western" style="margin-bottom: 0in; "><br/>
          
          </p>
          <p class="western" align="center" style="margin-bottom: 0in; ">
          <br/>
          
          </p>
          
          <p class="western" align="center" style="margin-bottom: 0in; ">
          <b>[signature pages follow]</b></p>
          
  </div>

</div>

<div class="docPage" style="margin: 0; box-sizing: border-box; padding: 0;">
  <div class="docPageInner" style="box-sizing: border-box; height: 875px;">
      <p class="western" align="justify" style="margin-bottom: 0.08in; ; orphans: 0; widows: 0; page-break-before: always">
          I, 
          <span color="#0000ff">
              <span style="text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}}</span>
              
          </span>
          
          , by signing this Health Care Proxy, declare that I understand its
          contents and the effect of this grant of authority to my Agent, that
          I sign it willingly in the presence of each of the undersigned
          witnesses, and that I sign it as my voluntary act for the purposes
          expressed, this <u>	</u> day of <u>				</u>, <u>		</u>.</p>
          <p align="justify" style="margin-bottom: 0in; "><br/>
          
          </p>
          <p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; ">
          <span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">_______________________________________</span></span></p>
          <p class="western" align="justify" style="margin-bottom: 0.08in; ; orphans: 0; widows: 0">
          
          
          <span color="#0000ff">
              <b style="text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}}</b>
              
          </span>
          </p>
          
          <p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; ">
          <span color="#0433ff"><span size="2" style="font-size: 9pt"><span color="#000000">
            </span>
            
            <span style="font-family:'Times New Roman, serif'" >{{$tellUsAboutYou['address']}}</span>
           
            </span></span></p>
          
          
            <!-- <p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; ">
            <span color="#008f00">
              <span size="2" style="font-size: 9pt">
                <span size="3" style="font-size: 12pt">IF ANSWERED( Address2 )

                </span>  
              </span>
            </span>
          </p>
          <p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; ">
          <span color="#0433ff"><span size="2" style="font-size: 9pt"><span color="#000000"><span size="3" style="font-size: 12pt"></span></span><span size="3" style="font-size: 12pt">Address2</span></span></span></p>
          
          <p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; ">
          <span color="#008f00"><span size="2" style="font-size: 9pt"><span color="#000000"><span size="3" style="font-size: 12pt"></span></span><span size="3" style="font-size: 12pt">END
          IF</span> -->
          
          
          <p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; ">
          <span color="#0433ff"><span size="2" style="font-size: 9pt"><span color="#000000"><span size="3" style="font-size: 12pt"></span></span>
          
          <span size="3" style="font-size: 12pt">City</span>
          
          <span size="3" style="font-size: 12pt">State</span>
          
          <span color="#000000"><span size="3" style="font-size: 12pt">&nbsp;</span></span>
          
          <span color="#000000"><span size="3" style="font-size: 12pt"></span></span>
          
          <span size="3" style="font-size: 12pt">ZIP</span>
        
          </span></span></p>
          <p align="justify" style="margin-bottom: 0in; "><br/>
          
          </p>
          
          <p class="western" align="justify" style="margin-bottom: 0.08in; ; orphans: 0; widows: 0">
          We, the witnesses who sign below, each declare in the presence of
          
          <span style="text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}}</span>
          
          <span color="#0000ff">, </span>

          that neither of us has been named as Agent or alternate Agent in this
          Health Care Proxy and neither of us is related to 

          <span color="#0433ff">{{$genderTxt}}</span> 
          
          by blood or marriage. We further declare
          that the Principal signed this instrument as 
          
          <span color="#0433ff">{{$genderTxt4}}</span> 
          
          Health Care Proxy in the presence of each
          of us, that 
          
          <span color="#0433ff">{{$genderTxt3}}</span> 

          signed it willingly, that each of us signs this Health Care Proxy as
          witness in the presence of 
          
          <span style="text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}}</span>, and that to the
          best of our knowledge 
          
          
          <span color="#0433ff">{{$genderTxt3}}</span> is eighteen (18) years of age or over, of
          sound mind and under no constraint or undue influence.</p>
          <p align="justify" style="margin-bottom: 0in; "><br/>
          
          </p>
          <p align="left" style="margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 10pt"><b>WITNESS
          1</b></span><span size="2" style="font-size: 10pt">:
          ________________________________	Dated: ___________________</span></span></p>
          <p align="left" style="margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 10pt">[signature]</span></span></p>
         
          <p align="left" style="margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 10pt">____________________________________</span></span></p>
          <p align="justify" style="margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 10pt">	</span><span size="2" style="font-size: 10pt">[name
          printed]</span></span></p>
          
          <p align="left" style="margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 10pt">____________________________________	____________________________________</span></span></p>
          <p align="justify" style="margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 10pt">	</span><span size="2" style="font-size: 10pt">[street
          address]  				</span><span size="2" style="font-size: 10pt">	</span><span size="2" style="font-size: 10pt">[city,
          state]</span></span></p>
          <p align="justify" style="margin-bottom: 0in; "><br/>
          
          </p>
          <p align="center" style="margin-bottom: 0in; "><br/>
          
          </p>
          
          <p align="left" style="margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 10pt"><b>WITNESS
          2: </b></span><span size="2" style="font-size: 10pt">________________________________	Dated:
          ___________________</span></span></p>
          <p align="left" style="margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 10pt">[signature]</span></span></p>
          
          <p align="left" style="margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 10pt">____________________________________</span></span></p>
          <p align="justify" style="margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 10pt">	</span><span size="2" style="font-size: 10pt">[name
          printed]</span></span></p>
          
          <p align="left" style="margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 10pt">____________________________________	____________________________________</span></span></p>
          <p align="justify" style="margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 10pt">	</span><span size="2" style="font-size: 10pt">[street
          address]  				</span><span size="2" style="font-size: 10pt">	</span><span size="2" style="font-size: 10pt">[city,
          state]</span></span></p>
          <p align="left" style="margin-bottom: 0in; "><br/>
          
          </p>
          
  </div>
  
</div>

<div class="docPage" style="margin: 0; box-sizing: border-box; padding: 0px;">
  <div class="docPageInner" style="box-sizing: border-box; height: 875px; page-break-after: always;">
      <p class="western" style="margin-bottom: 0in; "><br/>

      </p>
      <p align="left" style="margin-bottom: 0in; ; page-break-before: always">
      <span color="#008f00"><span size="2" style="font-size: 9pt"><span color="#000000"><span size="3" style="font-size: 12pt"><b>Commonwealth
      of Massachusetts</b></span></span></span></span></p>
      <p align="justify" style="margin-bottom: 0in; "><br/>
      
      </p>
      <p align="justify" style="margin-bottom: 0in; "><span color="#008f00"><span size="2" style="font-size: 9pt"><span color="#000000"><span size="3" style="font-size: 12pt"><b>County
      of __________________, ss.</b></span></span></span></span></p>
      <p align="justify" style="margin-bottom: 0in; "><br/>
      
      </p>
      <p class="western" align="justify" style="margin-bottom: 0.08in; ; orphans: 0; widows: 0">
      Before me, the undersigned authority, on this ____ day of
      ____________, ________,  personally appeared 
      
      

      <span style="text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}}</span>, the principal, and
      the two witnesses, respectively, proved to me through satisfactory
      evidence of identification, to be the persons whose names are
      subscribed to the foregoing instrument in their respective
      capacities, and, all of said persons being by me first duly sworn,
      the principal declared to me and to the said witnesses in my presence
      that the instrument is 
      
      <span color="#0433ff">{{$genderTxt4}}</span> 
      
      Health Care Proxy, and that the principal has
      willingly and voluntarily made and executed it as 

      <span color="#0433ff">{{$genderTxt4}}</span> 
      
      free act and deed for the purposes therein
      expressed, and the witnesses declared to me that they were each
      eighteen (18) years of age or over, and that neither of them is
      related to the principal by blood or marriage, or related to the
      designated Agents by blood or marriage.</p>
      <p align="justify" style="margin-bottom: 0in; "><br/>
      </p>
      <p align="justify" style="margin-bottom: 0in; "><br/>
      
      </p>
      <p align="justify" style="margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">______________________________________</span></span></p>
      <p align="justify" style="margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">[SEAL]</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">NOTARY
      PUBLIC</span></span></p>
      <p align="justify" style="margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">	</span></span></p>
      <p align="justify" style="margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">My
      commission expires: _________________</span></span></p>
      <p align="center" style="margin-bottom: 0in; "><br/>
      
      </p>
      
  </div>

</div>

<div class="docPage" style="margin: 0; box-sizing: border-box; padding: 0px;">
  <div class="docPageInner" style="box-sizing: border-box; height: 875px;">
      
      <p align="center" style="margin-bottom: 0in;">
      <span size="4" style="font-size: 13pt"><span face="Times New Roman, serif"><span size="5" style="font-size: 18pt"><span size="3" style="font-size: 12pt"><b>M</b></span></span></span><span size="3" style="font-size: 12pt"><b>ASSACHUSETTS
      </b></span><span face="Times New Roman, serif"><span size="5" style="font-size: 18pt"><span size="3" style="font-size: 12pt"><b>L</b></span></span></span><span size="3" style="font-size: 12pt"><b>IVING
      </b></span><span face="Times New Roman, serif"><span size="5" style="font-size: 18pt"><span size="3" style="font-size: 12pt"><b>W</b></span></span></span><span size="3" style="font-size: 12pt"><b>ILL</b></span></span></p>
      <p align="justify" style="margin-bottom: 0in; "><br/>
      
      </p>
      <p class="western" align="justify" style="margin-bottom: 0.08in; ; orphans: 0; widows: 0">
      1.	I, 
      <span style="text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}}</span>,
      being of sound mind, willfully and voluntarily make known my desire
      that my life not be artificially prolonged by life-sustaining
      procedures except as I may otherwise provide in this directive.</p>
      <p align="justify" style="margin-bottom: 0in; "><br/>
      
      </p>
      <p align="justify" style="margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">2.</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">I
      declare that if at any time I should have an injury, disease, or
      illness, which is certified in writing to be a terminal condition or
      persistent vegetative state by two physicians who have personally
      examined me, and in the opinion of those physicians the application
      of life-sustaining procedures would serve only to unnaturally prolong
      the moment of my death and to unnaturally postpone or prolong the
      dying process, I direct that these procedures be withheld or
      withdrawn and my death be permitted to occur naturally.</span></span></p>
      <p align="justify" style="margin-bottom: 0in; "><br/>
      
      </p>
      <p align="justify" style="margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">3.</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">I
      expressly intend this directive to be a final expression of my legal
      right to refuse medical or surgical treatment and to accept the
      consequences from this refusal which shall remain in effect
      notwithstanding my future inability to give current medical
      directions to treating physicians and other providers of medical
      services.</span></span></p>
      <p align="justify" style="margin-bottom: 0in; "><br/>
      
      </p>
      <p align="justify" style="margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">4.</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">I
      understand that the term &quot;life-sustaining procedure&quot;
      includes artificial nutrition and hydration and any other procedures
      that I specify below to be considered life-sustaining but does not
      include the administration of medication or the performance of any
      medical procedure which is intended to provide comfort care or to
      alleviate pain:</span></span></p>
      <p align="justify" style="margin-bottom: 0in; "><br/>
      
      </p>
      <p align="justify" style="margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">5.</span><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">I
      reserve the right to give current medical directions to physicians
      and other providers of medical services so long as I am able, even
      though these directions may conflict with the above written directive
      that life-sustaining procedures be withheld or withdrawn.</span></span></p>
      <p align="justify" style="margin-bottom: 0in; "><br/>
      
      </p>
      <p align="justify" style="margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">I
      understand the full import of this directive and declare that I am
      emotionally and mentally competent to make this directive.</span></span></p>
      <p align="justify" style="margin-bottom: 0in; "><br/>
      
      </p>
      <p align="justify" style="margin-bottom: 0in; "><span color="#008f00"><span size="2" style="font-size: 9pt"><span color="#000000"><span size="3" style="font-size: 12pt">Executed
      on this </span></span><span color="#000000"><span size="3" style="font-size: 12pt">_________________</span></span><span color="#000000"><span size="3" style="font-size: 12pt">
      day of </span></span><span color="#000000"><span size="3" style="font-size: 12pt">_______________________</span></span><span color="#000000"><span size="3" style="font-size: 12pt">,
      </span></span><span color="#000000"><span size="3" style="font-size: 12pt">_______________________</span></span><span color="#000000"><span size="3" style="font-size: 12pt">
      in this ________________ County of Massachusetts.</span></span></span></span></p>
      <p align="justify" style="margin-bottom: 0in; "><br/>
      
      </p>

      
      <p align="justify" style="margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="3" style="font-size: 12pt">	</span><span size="3" style="font-size: 12pt">_______________________________________</span></span></p>
      <p class="western" align="justify" style="margin-bottom: 0.08in; ; orphans: 0; widows: 0">
      <span color="#000000"><b>	</b></span>
      
        <span color="#0000ff">
            <b style="text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}}</b>
        </span>
      </p>
      <p align="justify" style="margin-bottom: 0in; "><br/>
      
      </p>
      
  </div>
  
</div>

<div class="docPage" style="margin: 0; box-sizing: border-box; padding: 0px;">
  <div class="docPageInner" style="box-sizing: border-box; height: 875px;">
      <p class="western" align="justify" style="margin-bottom: 0.08in; ; orphans: 0; widows: 0; page-break-before: always">
          We, the witnesses who sign below, each declare in the presence of
          
          <span style="text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}}</span>that 

          <b style="text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}}</b>

          signed this Declaration in the presence of each of us, that 
          
          <span color="#0433ff">{{$genderTxt3}}</span> signed it willingly, that each of us signs
          this Declaration as witness in the presence of 
          
          <span style="text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}}</span> , and that to the
          best of our knowledge 
          
          <span color="#0433ff">{{$genderTxt3}}</span>
           
          is eighteen (18) years of age or over, of
          sound mind and under no constraint or undue influence.</p>
          <p align="justify" style="margin-bottom: 0in; "><br/>
          
          </p>
          <p align="left" style="margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 10pt"><b>WITNESS
          1</b></span><span size="2" style="font-size: 10pt">:
          ________________________________	Dated: ___________________</span></span></p>
          <p align="left" style="margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 10pt">[signature]</span></span></p>
          
          <p align="left" style="margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 10pt">____________________________________</span></span></p>
          <p align="justify" style="margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 10pt">	</span><span size="2" style="font-size: 10pt">[name
          printed]</span></span></p>
          
          <p align="left" style="margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 10pt">____________________________________	____________________________________</span></span></p>
          <p align="justify" style="margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 10pt">	</span><span size="2" style="font-size: 10pt">[street
          address]  				</span><span size="2" style="font-size: 10pt">	</span><span size="2" style="font-size: 10pt">[city,
          state]</span></span></p>
          <p align="justify" style="margin-bottom: 0in; "><br/>
          
          </p>
          
          <p align="left" style="margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 10pt"><b>WITNESS
          2: </b></span><span size="2" style="font-size: 10pt">________________________________	Dated:
          ___________________</span></span></p>
          <p align="left" style="margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 10pt">[signature]</span></span></p>
          
          <p align="left" style="margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 10pt">____________________________________</span></span></p>
          <p align="justify" style="margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 10pt">	</span><span size="2" style="font-size: 10pt">[name
          printed]</span></span></p>
          
          <p align="left" style="margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 10pt">____________________________________	____________________________________</span></span></p>
          <p align="justify" style="margin-bottom: 0in; "><span size="1" style="font-size: 7pt"><span size="2" style="font-size: 10pt">	</span><span size="2" style="font-size: 10pt">[street
          address]  				</span><span size="2" style="font-size: 10pt">	</span><span size="2" style="font-size: 10pt">[city,
          state]</span></span></p>
          <p align="left" style="margin-bottom: 0in; "><br/>
          
          </p>
          
          <p align="left" style="margin-bottom: 0in; "><span color="#008f00"><span size="2" style="font-size: 9pt"><span color="#000000"><span size="2" style="font-size: 10pt"><b>Commonwealth
          of Massachusetts</b></span></span></span></span></p>
          
          <p align="justify" style="margin-bottom: 0in; "><span color="#008f00"><span size="2" style="font-size: 9pt"><span color="#000000"><span size="2" style="font-size: 10pt"><b>County
          of __________________, ss.</b></span></span></span></span></p>
          <p align="justify" style="margin-bottom: 0in; "><br/>
          
          </p>
          <p class="western" align="justify" style="margin-bottom: 0in; "><a name="_GoBack"></a>
          <span size="2" style="font-size: 10pt">Before me, the undersigned
          authority, on this ____ day of ____________, ________,  personally
          appeared </span><span color="#767171"></span>
          
          <span color="#0432ff">
              <span style="text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}}</span>
          </span>

          
          <span size="2" style="font-size: 10pt">the
          principal, and the two witnesses, respectively, proved to me through
          satisfactory evidence of identification, to be the persons whose
          names are subscribed to the foregoing instrument in their respective
          capacities, and, all of said persons being by me first duly sworn,
          the principal declared to me and to the said witnesses in my presence
          that the instrument is </span><span color="#0433ff">
            
          <span color="#0433ff">{{$genderTxt4}}</span> 
          
        
          </span><span size="2" style="font-size: 10pt">
          Health Care Proxy, and that the principal has willingly and
          voluntarily made and executed it as </span><span color="#0433ff">
            
          <span color="#0433ff">{{$genderTxt4}}</span> 
          
        
        
          </span><span size="2" style="font-size: 10pt">
          free act and deed for the purposes therein expressed, and the
          witnesses declared to me that they were each eighteen (18) years of
          age or over, and that neither of them is related to the principal by
          blood or marriage, or related to the designated Agents by blood or
          marriage.</span></p>
          <p align="justify" style="margin-bottom: 0in; "><br/>
          
          </p>
          
          <p align="justify" style="margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="2" style="font-size: 10pt">	</span><span size="2" style="font-size: 10pt">______________________________________</span></span></p>
          <p align="justify" style="margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="2" style="font-size: 10pt">	</span><span size="2" style="font-size: 10pt">[SEAL]</span><span size="2" style="font-size: 10pt">	</span><span size="2" style="font-size: 10pt">NOTARY
          PUBLIC</span></span></p>
          <p align="justify" style="margin-bottom: 0in; "><span size="2" style="font-size: 9pt"><span size="2" style="font-size: 10pt">	</span></span></p>
          <p class="western" style="margin-bottom: 0in; "><span size="2" style="font-size: 10pt">My
          commission expires: _________________</span></p>
  </div>
  
</div>
</div>

</body>
</html>