<!doctype html>
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
      Advance Directive for Health Care of <br>{{$tellUsAboutYou['fullname']}}<br>
    </div>
  </div>
    <div>
        <!-- Page 1 -->
        <div style="page-break-after: always;">
            <div>
                <p class="western" style="margin-top: 0.02in; margin-bottom: 0in; line-height: 0.26in; text-align:center;">
                    <span size="4" style="font-size: 16pt"><b>GEORGIA ADVANCE DIRECTIVE FOR HEALTH CARE</b></span></p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p>
                <p class="western" style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
                    <span>By:	{{ucwords($tellUsAboutYou['fullname'])}}</p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-bottom: 0in; ">
                    <span>Date of Birth: {{date('m/d/Y', strtotime($tellUsAboutYou['dob']))}}</p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-bottom: 0in; ">
                    This advance directive for health care has four parts:</p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-left: 1.5in; text-indent: -1.5in; margin-bottom: 0in; ">
                    <b>PART ONE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Health Care Agent</b>. <i>This part allows you to choose someone to make health care decisions for you when you cannot (or do not want to) make health care decisions for yourself. The person you choose is called a health care agent. You may also have your health care agent make decisions for you after your death with respect to an autopsy, organ donation, body donation, and final disposition of your body. You should talk to your health care agent about this important role.&nbsp;</i></p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-left: 1.5in; text-indent: -1.5in; margin-bottom: 0in; ">
                    <b>PART TWO	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Treatment Preferences</b>. <i>This part allows you to state your treatment preferences if you have a terminal condition or if you are in a state of permanent unconsciousness. PART TWO will become effective only if you are unable to communicate your treatment preferences. Reasonable and appropriate efforts will be made to communicate with you about your treatment preferences before PART TWO becomes effective. You should talk to your family and others close to you about your treatment preferences.&nbsp;</i></p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-left: 1.5in; text-indent: -1.5in; margin-bottom: 0in; ">
                    <b>PART THREE	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Guardianship</b>. <i>This part allows you to nominate a person to be your guardian should one ever be needed.&nbsp;</i></p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-left: 1.5in; text-indent: -1.5in; margin-bottom: 0in; ">
                    <b>PART FOUR	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Effectiveness And Signatures</b>. <i>This part requires your signature and the signatures of two witnesses. You must complete PART FOUR if you have filled out any other part of this form.&nbsp;</i><i><b>This document may be signed by you or signed by someone else for you in your presence and at your express direction.</b></i></p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-bottom: 0in; ">
                    You may fill out any or all of the first three parts listed above. You must fill out PART FOUR of this form in order for this form to be effective.&nbsp;
                </p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-bottom: 0in; ">
                    You should give a copy of this completed form to people who might need it, such as your health care agent, your family, and your physician. Keep a copy of this completed form at home in a place where it can easily be found if it is needed. Review this completed form periodically to make sure it still reflects your preferences. If your preferences change, complete a new advance directive for health care.&nbsp;
                </p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-bottom: 0in; ">
                    This completed form will replace any advance directive for health care, durable power of attorney for health care, health care proxy, or living will that you have completed before completing this form. You may revoke this completed form at any time.</p>
            </div>
            <!-- <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Advance Directive for Health Care of
                <br> {{ucwords($tellUsAboutYou['fullname'])}}
                <br> Page 1 of 10
            </div> -->
        </div>
        <!-- Page 1 End-->

        <!-- Page 2 -->
        <div style="page-break-after: always;">
            <div>
                <p class="western" style="margin-top: 0.13in; margin-bottom: 0.03in;  text-align:center;">
                    <span size="4" style="font-size: 14pt"><b>PART ONE: HEALTH CARE AGENT</b></span></p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-bottom: 0in; ">
                    [PART ONE will be effective even if PART TWO is not completed. A physician or health care provider who is directly involved in your health care may not serve as your health care agent. If you are married, a future divorce or annulment of your marriage will revoke the selection of your current spouse as your health care agent. If you are not married, a future marriage will revoke the selection of your health care agent unless the person you selected as your health care agent is your new spouse.]&nbsp;</p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <ol>
                    <li>
                      <p style="margin-top: 0.19in; margin-bottom: 0.13in; margin-top: 0;">
                          <span style="font-family:'Calibri, serif'"><span style="font-family:'Times New Roman, serif'"><b>HEALTH CARE AGENT</b></span></span>
                      </p>
                    </li>
                </ol>
                <p class="western" style="margin-bottom: 0in; ">
                    I select the following person as my health care agent to make health care decisions for me:</p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-left: 1.13in; text-indent: -1.13in; margin-bottom: 0in; ">
                    <span>Name:	{{ucwords($healthFinance['fullname'])}}</span></p>
                <p class="western" style="margin-left: 1.13in; text-indent: -1.13in; margin-bottom: 0in; ">
                    @if( array_key_exists('relation', $healthFinance) && $healthFinance['relation'] == 'Other')
                        @if(array_key_exists('relationOther', $healthFinance) && strlen(trim($healthFinance['relationOther'])) > 0)
                            <span>Relationship:	{{ucwords($healthFinance['relationOther'])}}</span>
                        @else
                            <span>Relationship: ________________</span>
                        @endif
                    @else
                        @if(array_key_exists('relation', $healthFinance) && strlen(trim($healthFinance['relation'])) > 0)
                            <span>Relationship: {{ucwords($healthFinance['relation'])}}</span>
                        @else
                            <span>Relationship: ________________</span>
                        @endif
                    @endif
                </p>
                <p class="western" style="margin-left: 1.13in; text-indent: -1.13in; margin-bottom: 0in; ">
                    <span>Address: {{ucwords($healthFinance['address'])}}</span></p>
                <p class="western" style="margin-bottom: 0in; ">
                  <span>{{ucwords($healthFinance['city'])}}, {{ucwords($healthFinance['state'])}}, {{ucwords($healthFinance['zip'])}}</span></p>
                <p class="western" style="margin-left: 1.13in; text-indent: -1.13in; margin-bottom: 0in; ">
                    <span>Telephone Number:	{{$healthFinance['phone']}}</span></p>
                <p class="western" style="margin-top: 0.19in; margin-bottom: 0.13in; ">
                    <b>(2) BACK-UP HEALTH CARE AGENT</b></p>
                <p class="western" style="margin-bottom: 0in; ">
                    This section is optional. PART ONE will be effective even if this section is left blank.</p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                @if($healthFinance['anyBackupAgent'] == 'true')
                    <p class="western" style="margin-bottom: 0in; ">
                        If my health care agent cannot be contacted in a reasonable time period and cannot be located with reasonable efforts or for any reason my health care agent is unavailable or unable or unwilling to act as my health care agent, then I select the following as my back-up health care agent:</p>
                    <!-- <p class="western" style="margin-bottom: 0in; ">
                        <br/>

                    </p> -->
                    <p class="western" style="margin-left: 1.13in; text-indent: -1.13in; margin-bottom: 0in;">
                        <span>Name:	{{ucwords($healthFinance['backupFullname'])}}</span>
                    </p>
                    <p class="western" style="margin-left: 1.13in; text-indent: -1.13in; margin-bottom: 0in; ">
                        @if( array_key_exists('backupRelation', $healthFinance) && $healthFinance['backupRelation'] == 'Other')
                            @if(array_key_exists('backupRelationOther', $healthFinance) && strlen(trim($healthFinance['backupRelationOther'])) > 0)
                                <span>Relationship: {{ucwords($healthFinance['backupRelationOther'])}}</span>
                            @else
                                <span>Relationship: ________________</span>
                            @endif
                        @else
                            @if(array_key_exists('backupRelation', $healthFinance) && strlen(trim($healthFinance['backupRelation'])) > 0)
                                <span>Relationship: {{ucwords($healthFinance['backupRelation'])}}</span>
                            @else
                                <span>Relationship: ________________</span>
                            @endif
                        @endif
                    </p>
                    <p class="western" style="margin-left: 1.13in; text-indent: -1.13in; margin-bottom: 0in; ">
                        <span>Address: {{ucwords($healthFinance['backupAddress'])}}</span></p>
                    <p class="western" style="margin-bottom: 0in; "><span>{{ucwords($healthFinance['backupCity'])}}, {{ucwords($healthFinance['backupState'])}}, {{ucwords($healthFinance['backupZip'])}}</span></p>
                    <p class="western" style="margin-left: 1.13in; text-indent: -1.13in; margin-bottom: 0in; ">
                        <span>Telephone Number:	{{ucwords($healthFinance['backupphone'])}}</span></p>
                @else
                    <p class="western" style="margin-bottom: 0in; ">
                        NONE.</p>
                @endif

                <p class="western" style="margin-top: 0.19in; margin-bottom: 0.13in; ">
                    <b>(3)	GENERAL POWERS OF HEALTH CARE AGENT</b></p>
                <p class="western" style="margin-bottom: 0in; ">
                    My health care agent will make health care decisions for me when I am unable to communicate my health care decisions or I choose to have my health care agent communicate my health care decisions.</p>
            </div>
            <!-- <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Advance Directive for Health Care of
                <br> {{ucwords($tellUsAboutYou['fullname'])}}
                <br> Page
                2 of 10
            </div> -->
        </div>
        <!-- Page 2 End -->

        <!-- Page 3 -->
        <div style="page-break-after: always;">
            <div>
                <p class="western" style="margin-bottom: 0.06in; ">
                    My health care agent will have the same authority to make any health care decision that I could make. My health care agent's authority includes the following powers:</p>
                <p class="western" style="margin-bottom: 0.06in; ">
                    <br/>

                </p>
                <ul>
                    <li>
                    <p style="margin-bottom: 0.17in; margin-top: 0;"><span style="font-family:'Calibri, serif'"><span style="font-family:'Times New Roman, serif'">To authorize my admission to or discharge (including transfers) from any hospital, skilled nursing facility, hospice, or other health care facility or service; </span></span>
                    </p></li>
                </ul>
                <p style="margin-left: 0.5in; margin-bottom: 0.17in; ">

                </p>
                <ul>
                    <li>
                    <p style="margin-bottom: 0.17in; margin-top: 0;"><span style="font-family:'Calibri, serif'"><span style="font-family:'Times New Roman, serif'">To	request, consent to, withhold, or withdraw any type of health care; and to</span></span>
                    </p></li>
                </ul>
                <p style="margin-left: 0.5in; margin-bottom: 0.17in; ">
                </p>
                <ul>
                    <li>
                    <p style="margin-bottom: 0.17in; margin-top: 0;"><span style="font-family:'Calibri, serif'"><span style="font-family:'Times New Roman, serif'">Contract for any health care facility or service for me, and to obligate me to pay for these services (and my health care agent, acting in this official capacity, will not be financially liable for any services or care contracted for me or on my behalf).</span></span>
                    </p></li>
                </ul>
                <p class="western" style="margin-bottom: 0in; ">
                    My health care agent will be my personal representative for all purposes of federal or state law related to privacy of medical records. <u>This includes the Health Insurance Portability and Accountability Act of 1996</u>. My health care agent will have the same access to my medical records that I have and can disclose the contents of my medical records to others for my ongoing health care.</p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-bottom: 0in; ">
                    My health care agent may accompany me in an ambulance or air ambulance if in the opinion of the ambulance personnel protocol permits a passenger and my health care agent may visit or consult with me in person while I am in a hospital, skilled nursing facility, hospice, or other health care facility or service if its protocol permits visitation.</p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-bottom: 0in; ">
                    My health care agent may present a copy of this advance directive for health care in lieu of the original and the copy will have the same meaning and effect as the original.</p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-bottom: 0.06in; ">
                    I understand that under Georgia law:</p>
                <ul>
                    <li>
                    <p style="margin-bottom: 0.06in; margin-top: 0;">
                        <span style="font-family:'Calibri, serif'"><span style="font-family:'Times New Roman, serif'">
                          My health care agent may refuse to act as my health care agent;&nbsp;</span></span>
                    </p></li>
                    <li>
                    <p style="margin-bottom: 0.06in; margin-top: 0;">
                        <span style="font-family:'Calibri, serif'"><span style="font-family:'Times New Roman, serif'">A court can take away the powers of my health care agent if it finds that my health care agent is not acting properly; and&nbsp;</span></span>
                    </p></li>
                    <li>
                    <p style="margin-bottom: 0in; margin-top: 0;">
                        <span style="font-family:'Calibri, serif'"><span style="font-family:'Times New Roman, serif'">My	health care agent does not have the power to make health care	decisions for me regarding psychosurgery, sterilization, or treatment or involuntary hospitalization for mental or emotional	illness, mental retardation, or addictive disease.</span></span>
                    </p></li>
                </ul>
                <p class="western" style="margin-top: 0.19in; margin-bottom: 0.13in; ">
                    <b>(4)	GUIDANCE FOR HEALTH CARE AGENT</b></p>
                <p class="western" style="margin-bottom: 0in; ">
                    When making health care decisions for me, my health care agent should think about what action would be consistent with past conversations we have had, my treatment preferences as expressed in PART TWO (if I have filled out PART TWO), my religious and other beliefs and values, and how I have handled medical and other important issues in the past. If what I would decide is still unclear, then my health care agent should make decisions for me that my health care agent believes are in my best interest, considering the benefits, burdens, and risks of my current circumstances and treatment options.</p>
            </div>
            <!-- <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Advance Directive for Health Care of
                <br> {{ucwords($tellUsAboutYou['fullname'])}}
                <br> Page 3 of 10
            </div> -->
        </div>
        <!-- Page 3 End-->

        <!-- Page 4 -->
        <div style="page-break-after: always;">
            <div>
                <p class="western" style="margin-top: 0.19in; margin-bottom: 0.13in; ">
                    <b>(5)	POWERS OF HEALTH CARE AGENT AFTER DEATH</b></p>
                <p class="western" style="margin-bottom: 0in; ">
                    <b>(A)	AUTOPSY</b></p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-bottom: 0.06in; ">
                    My health care agent will have the power to authorize an autopsy of my body unless I have limited my health care agent's power by initialing below.</p>
                <p class="western" style="margin-left: 1.5in; text-indent: -1.5in; margin-bottom: 0.06in; ">
                    _________ (Initials) My health care agent will not have the power to authorize an autopsy of my body (unless an autopsy is required by law).
                </p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-bottom: 0in; ">
                    <b>(B)	ORGAN DONATION AND DONATION OF BODY</b></p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-bottom: 0.06in; ">
                    My health care agent will have the power to make a disposition of any part or all of my body for medical purposes pursuant to the Georgia Revised Uniform Anatomical Gift Act, unless I have limited my health care agent's power by initialing below.</p>
                <p class="western" style="margin-bottom: 0.06in; ">
                    <br/>

                </p>
                <p class="western" style="margin-bottom: 0.06in; ">
                    <i><b>[Initial each statement that you want to apply.]</b></i></p>
                <p class="western" style="margin-bottom: 0.06in; ">
                    <br/>

                </p>
                <p class="western" style="margin-left: 2.5in; text-indent: -1.5in; margin-bottom: 0.06in; ">
                    _________ (Initials) My health care agent will not have the power to make a disposition of my body for use in a medical study program.</p>
                <p class="western" style="margin-left: 1.5in; text-indent: -0.5in; margin-bottom: 0.06in; ">
                    <br/>

                </p>
                <p class="western" style="margin-left: 2.5in; text-indent: -1.5in; margin-bottom: 0.06in; ">
                    _________ (Initials) My health care agent will not have the power to donate and of my organs.</p>
                <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p>
                <p class="western" style="margin-bottom: 0in; ">
                    <b>(C)	FINAL DISPOSITION OF BODY</b></p>
                <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p>
                <p class="western" style="margin-bottom: 0in; ">I have provided instructions for the final disposition of my body in a separate written document.</p>
                <p class="western" style="margin-top: 0.25in; margin-bottom: 0.03in; ">
                    <br/>

                </p>
                <p class="western" style="margin-top: 0.25in; margin-bottom: 0.03in;  text-align:center;">
                    <span size="4" style="font-size: 14pt"><b>PART TWO:  TREATMENT PREFERENCES</b></span></p>

                <p class="western" style="margin-bottom: 0in; ">
                    [PART TWO will be effective only if you are unable to communicate your treatment preferences after reasonable and appropriate efforts have been made to communicate with you about your treatment preferences. PART TWO will be effective even if PART ONE is not completed. If you have not selected a health care agent in PART ONE, or if your health care agent is not available, then PART TWO will provide your physician and other health care providers with your treatment preferences. If you have selected a health care agent in PART ONE, then your health care agent will have the authority to make all health care decisions for you regarding matters covered by PART TWO. Your health care agent will be guided by your treatment preferences and other factors described in Section (4) of PART ONE.]</p>
            </div>
            <!-- <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Advance Directive for Health Care of
                <br> {{ucwords($tellUsAboutYou['fullname'])}}
                <br> Page 4 of 10
            </div> -->
        </div>
        <!-- Page 4 End-->

        <!-- Page 5 -->
        <div style="page-break-after: always;">
            <div>
                <p class="western" style="margin-top: 0.19in; margin-bottom: 0.13in; ">
                    <b>(6)	CONDITIONS</b></p>
                <p class="western" style="margin-bottom: 0.06in; ">
                    PART TWO will be effective if I am in any of the following conditions:
                </p>
                <p class="western" style="margin-bottom: 0.06in; ">
                    <br/>
                    <br/>

                </p>
                <p class="western" style="text-indent: 0.5in; margin-bottom: 0.06in; ">
                    <b>[Initial each condition in which you want PART TWO to be effective.]</b></p>
                <p class="western" style="margin-left: 1.5in; text-indent: -1.5in; margin-bottom: 0.06in; ">
                    <br/>
                    <br/>

                </p>
                <p class="western" style="margin-left: 1.5in; text-indent: -1.5in; margin-bottom: 0.06in; ">
                    _________ (Initials) A terminal condition, which means I have an incurable or irreversible condition that will result in my death in a relatively short period of time.</p>
                <!-- <p class="western" style="margin-left: 1.5in; text-indent: -1.5in; margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-left: 1.5in; text-indent: -1.5in; margin-bottom: 0in; ">
                    _________ (Initials) A state of permanent unconsciousness, which means I am in an incurable or irreversible condition in which I am not aware of myself or my environment and I show no behavioral response to my environment.</p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-bottom: 0in; ">
                    My condition will be determined in writing after personal examination by my attending physician and a second physician in accordance with currently accepted medical standards.</p>
                <p class="western" style="margin-top: 0.19in; margin-bottom: 0.13in; ">
                    <b>(7)	TREATMENT PREFERENCES</b></p>
                <p class="western" style="margin-bottom: 0in; ">
                    [State your treatment preference by initialing (A), (B), or (C). If you choose (C), state your additional treatment preferences by initialing one or more of the statements following (C). You may provide additional instructions about your treatment preferences in the next section. You will be provided with comfort care, including pain relief, but you may also want to state your specific preferences regarding pain relief in the next section.]</p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-bottom: 0.06in; ">
                    If I am in any condition that I initialed in Section (6) above and I can no longer communicate my treatment preferences after reasonable and appropriate efforts have been made to communicate with me about my treatment preferences, then:</p>
                <p class="western" style="margin-left: 0.5in; text-indent: -0.5in; margin-bottom: 0.06in; ">
                    (A) _________ (Initials) <i><b>Try to extend my life for as long as possible</b></i>, using all medications, machines, or other medical procedures that in reasonable medical judgment could keep me alive. If I am unable to take nutrition or fluids by mouth, then I want to receive nutrition or fluids by tube or other medical means.</p>
                <p class="western" style="margin-left: 1.5in; text-indent: -1.5in; margin-bottom: 0.06in; ">
                    <br/>
                    <br/>

                </p>
                <p class="western" style="margin-left: 1.5in; text-indent: -1in; margin-bottom: 0.06in; ">
                    <u><b>OR</b></u></p>
            </div>
            <!-- <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Advance Directive for Health Care of
                <br> «CLIENT FULL NAME»
                <br> Page 5 of 10
            </div> -->
        </div>
        <!-- Page 5 End-->

        <!-- Page 6 -->
        <div style="page-break-after: always;">
            <div>
                <p class="western" style="margin-left: 0.5in; text-indent: -0.5in; margin-bottom: 0.06in; ">
                    (B) _________ (Initials) <i><b>Allow my natural death to occur</b></i>. I do not want any medications, machines, or other medical procedures that in reasonable medical judgment could keep me alive but cannot cure me. I do not want to receive nutrition or fluids by tube or other medical means except as needed to provide pain medication.</p>
                <p class="western" style="margin-left: 1.5in; text-indent: -1.5in; margin-bottom: 0.06in; ">
                    <br/>

                </p>
                <p class="western" style="margin-left: 1.5in; text-indent: -1in; margin-bottom: 0.06in; ">
                    <u><b>OR</b></u></p>
                <p class="western" style="margin-left: 1.5in; text-indent: -1.5in; margin-bottom: 0.06in; ">
                    <br/>

                </p>
                <p class="western" style="margin-left: 0.5in; text-indent: -0.5in; margin-bottom: 0.06in; ">
                    (C) _________ (Initials) I do not want any medications, machines, or other medical procedures that in reasonable medical judgment could keep me alive but cannot cure me, except as follows:</p>
                <p class="western" style="margin-left: 1.38in; text-indent: 0.13in; margin-bottom: 0.06in; ">
                    <br/>

                </p>
                <p class="western" style="margin-left: 1in; text-indent: 0.13in; margin-bottom: 0.06in; ">
                    <i><b>[Initial each statement that you want to apply to option (C).]</b></i></p>
                <!-- <p class="western" style="margin-left: 1.5in; text-indent: -1.5in; margin-bottom: 0.06in; ">
                </p> -->
                <p class="western" style="margin-left: 1.5in; margin-bottom: 0.06in; ">
                    _________ (Initials) If I am unable to take nutrition by mouth, I want to receive nutrition by tube or other medical means.</p>
                <p class="western" style="margin-left: 1.5in; text-indent: -1.5in; margin-bottom: 0.06in; ">
                    <br/>

                </p>
                <p class="western" style="margin-left: 1.5in; text-indent: -1.5in; margin-bottom: 0.06in; ">
                    _________ (Initials) If I am unable to take fluids by mouth, I want to receive fluids by tube or other medical means.</p>
                <p class="western" style="margin-left: 1.5in; text-indent: -1.5in; margin-bottom: 0.06in; ">
                    <br/>

                </p>
                <p class="western" style="margin-left: 1.5in; text-indent: -1.5in; margin-bottom: 0.06in; ">
                    _________ (Initials) If I need assistance to breathe, I want to have a ventilator used.</p>
                <p class="western" style="margin-left: 1.5in; text-indent: -1.5in; margin-bottom: 0.06in; ">
                    <br/>

                </p>
                <p class="western" style="margin-left: 1.5in; text-indent: -1.5in; margin-bottom: 0in; ">
                    _________ (Initials) If my heart or pulse has stopped, I want to have cardiopulmonary resuscitation (CPR) used.</p>
                <!-- <p class="western" style="margin-left: 1.5in; text-indent: -1.5in; margin-bottom: 0in; ">
                    <br/>

                </p> -->

                <p class="western" style="margin-left: 1.5in; text-indent: -1.5in; margin-bottom: 0in; ">
                    <br/>

                </p>
                <p class="western" style="margin-top: 0.19in; margin-bottom: 0.13in; ">
                    <b>(8)	ADDITIONAL STATEMENTS </b>
                </p>
                <p class="western" style="margin-bottom: 0in; ">
                    <i><b>[This section is optional.</b></i> PART TWO will be effective even if this section is left blank. This section allows you to state additional treatment preferences, to provide additional guidance to your health care agent (if you have selected a health care agent in PART ONE), or to provide information about your personal and religious values about your medical treatment. For example, you may want to state your treatment preferences regarding medications to fight infection, surgery, amputation, blood transfusion, or kidney dialysis. Understanding that you cannot foresee everything that could happen to you after you can no longer communicate your treatment preferences, you may want to provide guidance to your health care agent (if you have selected a health care agent in PART ONE) about following your treatment preferences. You may want to state your specific preferences regarding pain relief.]</p>
            </div>
            <!-- <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Advance Directive for Health Care of
                <br> {{ucwords($tellUsAboutYou['fullname'])}}
                <br> Page 6 of 10
            </div> -->
        </div>
        <!-- Page 6 End -->

        <!-- Page 7 -->
        <div style="page-break-after: always;">
            <div>
                <p class="western" style="margin-left: 0.38in; margin-bottom: 0.09in; ">
                    ________________________________________________________________________</p>
                <p class="western" style="margin-left: 0.38in; margin-bottom: 0.09in; ">
                    ________________________________________________________________________</p>
                <p class="western" style="margin-left: 0.38in; margin-bottom: 0in; ">
                    ________________________________________________________________________</p>
                <p class="western" style="margin-top: 0.19in; margin-bottom: 0.13in; ">
                    <b>(9)	IN CASE OF PREGNANCY</b></p>
                <p class="western" style="margin-left: 0.5in; text-indent: 0.5in; margin-bottom: 0in; ">
                    <b>[PART TWO will be effective even if this section is left blank.]</b></p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-bottom: 0.06in; ">
                    I understand that under Georgia law, PART TWO generally will have no force and effect if I am pregnant unless the fetus is not viable and I indicate by initialing below that I want PART TWO to be carried out.
                </p>
                <p class="western" style="margin-bottom: 0.06in; ">
                    <br/>
                    <br/>

                </p>
                <p class="western" style="margin-bottom: 0in; ">
                    _________ (Initials) I want PART TWO to be carried out if my fetus is not viable.</p>
                <p class="western" style="margin-top: 0.19in; margin-bottom: 0.03in; ">
                    <br/>
                    <br/>

                </p>
                <p class="western" style="margin-top: 0.19in; margin-bottom: 0.03in;  text-align:center;">
                    <span size="4" style="font-size: 14pt"><b>PART THREE:  GUARDIANSHIP</b></span></p>
                <p class="western" style="margin-top: 0.19in; margin-bottom: 0.13in; ">
                    <span><b>(10)	GUARDIANSHIP</b></span></p>
                <p class="western" style="margin-bottom: 0in; ">
                    [<b>PART THREE is optional. </b>This advance directive for health care will be effective even if PART THREE is left blank. If you wish to nominate a person to be your guardian in the event a court decides that a guardian should be appointed, complete PART THREE. A court will appoint a guardian for you if the court finds that you are not able to make significant responsible decisions for yourself regarding your personal support, safety, or welfare. A court will appoint the person nominated by you if the court finds that the appointment will serve your best interest and welfare. If you have selected a health care agent in PART ONE, you may (but are not required to) nominate the same person to be your guardian. If your health care agent and guardian are not the same person, your health care agent will have priority over your guardian in making your health care decisions, unless a court determines otherwise.]</p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-bottom: 0.06in; ">
                    <b>[State your preference by initialing (A) or (B). Choose (A) only if you have also completed PART ONE.]</b></p>
                <p class="western" style="margin-bottom: 0.06in; ">
                    <br/>
                    <br/>

                </p>
                <p class="western" style="margin-left: 1.69in; text-indent: -1.69in; margin-bottom: 0.06in; ">
                    (A) _________ (Initials) I nominate the person serving as my health care agent under PART ONE to serve as my guardian.</p>
                <p class="western" style="text-indent: 0.5in; margin-bottom: 0.06in; ">
                    <br/>
                    <br/>

                </p>
                <p class="western" style="text-indent: 0.5in; margin-bottom: 0.06in; ">
                    <u><b>OR</b></u></p>
            </div>
            <!-- <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Advance Directive for Health Care of
                <br> {{ucwords($tellUsAboutYou['fullname'])}}
                <br> Page 7 of 10
            </div> -->
        </div>
        <!-- Page 7 End -->

        <!-- Page 8 -->
        <div style="page-break-after: always;">
            <div>
                <p class="western" style="margin-bottom: 0.13in; ">
                    (B) _________ (Initials) I nominate the following person to serve as my guardian:</p>
                <p class="western" style="margin-top: 0.19in; margin-bottom: 0in; ">
                    <b>Name: </b><br>


                    <b>Address:</b><br>

                    <b>Telephone Number:</b><br>

                    <b>Email Address:  </b>
                </p>
                <p class="western" style="margin-top: 0in; margin-bottom: 0in; ">
                    <br/>

                </p>
                <p class="western" style="margin-top: 0.19in; margin-bottom: 0.03in;  text-align:center;">
                    <span size="4" style="font-size: 14pt"><b>PART FOUR:  EFFECTIVENESS AND SIGNATURES</b></span></p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-bottom: 0in; ">
                    This advance directive for health care will become effective only if I am unable or choose not to make or communicate my own health care decisions.
                </p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-bottom: 0in; ">
                    <u><b>Completing this form revokes and replaces any advance directive for health care, durable power of attorney for health care, health care proxy, or living will that I have completed before this date.</b></u></p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-bottom: 0.06in; ">
                    Unless I have initialed below and have provided alternative future dates or events, this advance directive for health care will become effective at the time I sign it and will remain effective until my death (and after my death to the extent authorized in Section (5) of PART ONE).</p>
                <!-- <p class="western" style="margin-left: 1.5in; text-indent: -1.5in; margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-left: 1.5in; text-indent: -1.5in; margin-bottom: 0in; ">
                    _________ (Initials) This advance directive for health care will become effective on or upon __________________________________________ and will terminate on or upon __________________________________________. <span size="2" style="font-size: 10pt">(specify dates or events for each blank)</span></p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-bottom: 0in; ">
                    <b>[You must sign and date or acknowledge signing and dating this form in the presence of two witnesses.] </b>
                </p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-bottom: 0in; ">
                    Both witnesses must be of sound mind and must be at least 18 years of age, but the witnesses do not have to be together or present with you when you sign this form.</p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-bottom: 0.06in; ">
                    A witness:</p>
                <p class="western" style="margin-left: 0.19in; text-indent: -0.19in; margin-bottom: 0.06in; ">
                    • Cannot be a person who was selected to be your health care agent or back-up health care agent in PART ONE;&nbsp;</p>
                <p class="western" style="margin-left: 0.19in; text-indent: -0.19in; margin-bottom: 0.06in; ">
                    • Cannot be a person who will knowingly inherit anything from you or otherwise knowingly gain a financial benefit from your death; or</p>
                <p class="western" style="margin-left: 0.19in; text-indent: -0.19in; margin-bottom: 0in; ">
                    • Cannot be a person who is directly involved in your health care.</p>

                     <p class="western" style="margin-bottom: 0in; ">
                    <b>Only one of the witnesses may be an employee, agent, or medical staff member of the hospital, skilled nursing facility, hospice, or other health care facility in which you are receiving health care (but this witness cannot be directly involved in your health care).</b></p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-bottom: 0in; ">
                    By signing below, I state that I am emotionally and mentally capable of making this advance directive for health care and that I understand its purpose and effect.</p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->

                <p class="western" style="margin-bottom: 0in; ">
                    <span>_____________________________________________</span><span>    </span><span><b>    </b></span><span>(Date)</span><span>___________________</span></p>
                <p class="western" style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
                    <a name="_GoBack"></a>
                    <span>{{ucwords($tellUsAboutYou['fullname'])}}<br>(Signature of Declarant)</span></p>

            </div>
            <!-- <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Advance Directive for Health Care of
                <br> {{ucwords($tellUsAboutYou['fullname'])}}
                <br> Page 8 of 10
            </div> -->
        </div>
        <!-- Page 8 End -->

        <!-- Page 9 -->
        <div style="">
            <div>


                <p class="western" style="margin-bottom: 0in;  text-align:center;">
                    <span size="4" style="font-size: 14pt"><b>WITNESSES</b></span></p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->
                <p class="western" style="margin-bottom: 0in; ">
                    The declarant signed this form in my presence or acknowledged signing this form to me. Based upon my personal observation, the declarant appeared to be emotionally and mentally capable of making this advance directive for health care and signed this form willingly and voluntarily.
                </p>
                <!-- <p class="western" style="margin-bottom: 0in; ">
                    <br/>

                </p> -->

                <p align="left" style="margin-left: 0.19in; text-indent: -0.19in; margin-bottom: 0in; ">
                    <br/>

                </p>
                <p style=" "><span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt"><b>WITNESS 1</b></span></span>
                    </span><span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">: ________________________________	<span style="padding-left: 50px; display: inline-block;"></span>Dated: ___________________</span></span>
                    </span>
                </p>
                <p style="margin-top: 0;"><span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">[signature]</span></span>
                    </span>
                </p>

                <p style=" "><span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">____________________________________</span></span>
                    </span>
                </p>
                <p style="margin-top: 0;"><span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">	[name printed]</span></span>
                    </span>
                </p>

                <p style=""><span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">____________________________________</span></span>
                    </span>
                </p>
                <p style="margin-top: 0;"><span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">	[street address]</span></span>
                    </span>
                </p>

                <p style=""><span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">____________________________________</span></span>
                    </span>
                </p>
                <p style="margin-top: 0;"><span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">	[city, state]</span></span>
                    </span>
                </p>
                <p style="">
                    <br/>

                </p>
                <p style=""><span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt"><b>WITNESS 2: </b></span></span>
                    </span><span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">________________________________	<span style="padding-left: 50px; display: inline-block;"></span>Dated: ___________________</span></span>
                    </span>
                </p>
                <p style="margin-top: 0;"><span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">[signature]</span></span>
                    </span>
                </p>

                <p style=""><span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">____________________________________</span></span>
                    </span>
                </p>
                <p style="margin-top: 0;"><span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">	[name printed]</span></span>
                    </span>
                </p>

                <p style=""><span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">____________________________________</span></span>
                    </span>
                </p>
                <p style="margin-top: 0;"><span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">	[street address]</span></span>
                    </span>
                </p>

                <p style=""><span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">____________________________________</span></span>
                    </span>
                </p>
                <p style="margin-top: 0;"><span><span style="font-family:'Times New Roman, serif'"><span size="2" style="font-size: 11pt">	[city, state]</span></span>
                    </span>
                </p>

                <p class="western" style="margin-bottom: 0in; "><i><b>[This form does not need to be notarized and a copy of a validly executed advance directive for health care carries the same meaning and effect as the original document.]</b></i></p>
            </div>
            <!-- <div style="text-align: center; padding-top: 5px; border-top: 1px solid #000; font-size: 12px; font-family: Times New Roman, serif;">
                Advance Directive for Health Care of
                <br> {{ucwords($tellUsAboutYou['fullname'])}}
                <br> Page 10 of 10
            </div> -->
        </div>
        <!-- Page 10 End -->

    </div>

</body>

</html>
