<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Untitled Document</title>
    <style>
        
        
        




    </style>
</head>

<body>

<div class="docContainer" id="doc">

    <div class="docPage">
        <div id="doc" class="docPageInner">

            <p  style="text-align:center;margin-bottom: 0.06in; line-height: 0.23in; page-break-before: auto; page-break-after: auto">
                <span  style="font-size: 13pt"><b>LIVING WILL DIRECTIVE AND</b></span></p>
            <p  style="text-align:center;margin-bottom: 0.06in; line-height: 0.23in"><span  style="font-size: 13pt"><b>HEALTH
      CARE SURROGATE DESIGNATION OF</b></span></p>
            <p style="margin-bottom: 0.08in; line-height: 115%">
              <span color="#0000ff">
                  @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                      <b style="text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}}</b>
                  @else
                      <b>________________________________</b>
                  @endif
              </span>
            </p>
            
            <p  style="text-align:center;margin-bottom: 0.06in; line-height: 0.23in">
              <span style="font-size: 13pt"><b>(date of birth:
                @if(isset($tellUsAboutYou) && array_key_exists('dob',$tellUsAboutYou) && !is_null($tellUsAboutYou['dob']))
                    {{date('jS M, Y', strtotime($tellUsAboutYou['dob']))}}
                @else
                    ________________________________
                @endif)</b>
              </span>
            </p>

            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>

            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>

            <p style="margin-bottom: 0in; line-height: 115%">My wishes regarding
                life-prolonging treatment and artificially provided nutrition and
                hydration to be provided to me if I no longer have decisional
                capacity, have a terminal condition, or become permanently
                unconscious have been indicated by checking and initiating the
                appropriate lines below.</p>
            
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            
            <p  style="text-align:center;margin-bottom: 0in; border: 1.00pt solid #000001; padding: 0.01in 0.06in; line-height: 115%">
                <b>HEALTH CARE SURROGATE DESIGNATION</b></p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 115%">

            </p>
            
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">By
      checking and initialing the line below, I specifically:</span></span></span></span></span></p>
            <p style="margin-bottom: 0.06in; line-height: 115%">


            </p>
            <p style="margin-bottom: 0.06in; line-height: 115%">&nbsp;<span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span  style="font-size: 11pt">_______
      (Check box and initial line, if you desire to name a surrogate)</span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">Designate
      my
      
      @if(isset($healthFinance) && array_key_exists('relation',$healthFinance) && !is_null($healthFinance['relation'])  && $healthFinance['relation'] == 'Other')

          @if(strlen(trim($healthFinance['relationOther'])) > 0)
            <span style="font-family:'Times New Roman, serif'">{{$healthFinance['relationOther']}}</span>
          @else
            <span style="font-family:'Times New Roman, serif'">(relation) _______________</span>
          @endif
      @else
          @if(strlen(trim($healthFinance['relation'])) > 0)
            <span style="font-family:'Times New Roman, serif'">{{$healthFinance['relation']}}</span>
          @else
            <span style="font-family:'Times New Roman, serif'">(relation) _______________</span>
          @endif
      @endif
      <span >, </span>

      @if(isset($healthFinance) && array_key_exists('fullname',$healthFinance) && !is_null($healthFinance['fullname']))
          <span style="font-family:'Times New Roman, serif'">{{$healthFinance['fullname']}}</span>
      @else
          <span style="font-family:'Times New Roman, serif'">_____________________________</span>
      @endif
      <span >, of </span>

      @if(isset($healthFinance) && array_key_exists('address',$healthFinance) && !is_null($healthFinance['address']))
          <span style="font-family:'Times New Roman, serif'">{{$healthFinance['address']}}, </span>
      @else
          <span>
                _________________________________________________________________
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

      as my health care surrogate to make
      health care decisions for me in accordance with this directive when I
      no longer have decisional capacity.</span></span></span></span></span></p>

            @if(isset($healthFinance) && array_key_exists('anyBackupAgent',$healthFinance) && !is_null($healthFinance['anyBackupAgent']) && $healthFinance['anyBackupAgent'] == 'true')
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">If
              said surrogate refuses or is unable to act for me, or if I revoke
              this appointment or authority to act as my surrogate, then I
              designate my

              @if(isset($healthFinance) && array_key_exists('backupRelation',$healthFinance) && !is_null($healthFinance['backupRelation']) && $healthFinance['backupRelation'] == 'Other')

                  @if(strlen(trim($healthFinance['backupRelationOther'])) > 0)
                    <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupRelationOther']}}</span>
                  @else
                    <span style="font-family:'Times New Roman, serif'">(relation) _______________</span>
                  @endif
              @else
                  @if(strlen(trim($healthFinance['backupRelation'])) > 0)
                    <span style="font-family:'Times New Roman, serif'">{{$healthFinance['backupRelation']}}</span>
                  @else
                    <span style="font-family:'Times New Roman, serif'">(relation) _______________</span>
                  @endif
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
                  <span>
                        _________________________________________________________________
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
              as my alternate health care surrogate.</span></span></span></span></span></p>
            @endif
            <p style="margin-left: 0.38in; margin-top: 0.06in; margin-bottom: 0in; line-height: 115%">


            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
              <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">Any
              prior designation is revoked.</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">

            </p>
        </div>
    </div>
    <!-- !Page 1 -->

    <!-- Page 2 -->
    <div class="docPage">
        <div class="docPageInner">

            <p  style="text-align:center;margin-bottom: 0in; border: 1.00pt solid #000001; padding: 0.01in 0.06in; line-height: 115%; page-break-before: always">
                <b>LIVING WILL DIRECTIVE</b></p>
            <p  style="text-align:center;margin-top: 0.13in; margin-bottom: 0.06in; line-height: 115%">
                <span color="#ffffff"><b>LIVING WILL DIRECTIVE</b></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">If
      I do not designate a surrogate, the following are my directions to my
      attending physician. If I have designated a surrogate, my surrogate
      shall comply with my wishes as indicated below. By checking and
      initialing the lines below, I specifically:</span></span></span></span></span></p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000"><b>Life
      Prolonging Treatment </b>(check and initial only one)</span></span></span></span></span></p>
            <p  style="text-align:justify;argin-bottom: 0in; line-height: 0.2in">&nbsp;<span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span  style="font-size: 11pt">_______
        (Check box and initial line, if you desire the option below)</span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">Direct
      that treatment be withheld or withdrawn, and that I be permitted to
      die naturally with only the administration of medication or the
      performance of any medical treatment deemed necessary to alleviate
      pain.</span></span></span></span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in"><span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span>&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span  style="font-size: 11pt">_______
        (Check box and initial line, if you desire the option below)</span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">DO
      NOT authorize that life-prolonging treatment be withheld or
      withdrawn.</span></span></span></span></span></p>
            <p style="margin-bottom: 0.06in; line-height: 115%">


            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000"><b>Nourishment
      and/or Fluids</b> (check and initial only one)</span></span></span></span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in"><span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span>&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span  style="font-size: 11pt">_______
        (Check box and initial line, if you desire the option below)</span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">Authorize
      the withholding or withdrawal of artificially provided food, water,
      or other artificially provided nourishment or fluids.</span></span></span></span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">&nbsp;<span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span  style="font-size: 11pt">_______
      (Check box and initial line, if you desire the option below)</span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">DO
      NOT authorize the withholding or withdrawal of artificially provided
      food, water, or other artificially provided nourishment or fluids.</span></span></span></span></span></p>
            <p  style="text-align:left;margin-bottom: 0.06in; line-height: 115%">


            </p>
            <p  style="text-align:left;margin-bottom: 0.06in; line-height: 115%"><b>Surrogate
                    Determination of Best Interest</b></p>
            <p style="margin-bottom: 0.06in; line-height: 115%"><b>NOTE: If you
                    desire this option, DO NOT choose any of the preceding options
                    regarding Life Prolonging Treatment and Nourishment and/or Fluids</b></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">&nbsp;<span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span  style="font-size: 11pt">_______
      (Check box and initial line, if you desire the option below)</span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">I
      authorize my surrogate, as hereinabove designated, to withhold or
      withdraw artificially provided nourishment or fluids, or other
      treatment if the surrogate determines that withholding or withdrawing
      is in my best interest; but I do not mandate that withholding or
      withdrawing.</span></span></span></span></span></p>
            <p style="margin-bottom: 0.06in; line-height: 115%">


            </p>
        </div>
    </div>
    <!-- !Page 2 -->

    <!-- Page 3 -->
    <div class="docPage">
        <div class="docPageInner">

            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0.06in; line-height: 115%; page-break-before: always">
                <b>ORGAN/TISSUE/EYE DONATION</b></p>
            <p style="margin-bottom: 0.06in; line-height: 115%">


            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">I
      certify that I am eighteen (18) years of age or older and of sound
      mind, and that upon my death, I hereby give:</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">Check
      appropriate box and initial the line beside that box:</span></span></span></span></span></p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">&nbsp;<span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span>&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span  style="font-size: 11pt">_______&nbsp;
        Authorize the giving of all or any part of my body upon death for any
        purpose specified in KRS 311.1929.&nbsp;</span></p>
            <p style="margin-top: 0.06in; margin-bottom: 0.06in; line-height: 115%">



            </p>
            <p style="margin-top: 0.06in; margin-bottom: 0.06in; line-height: 115%">
                <b>OR</b></p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">&nbsp;<span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span>&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span  style="font-size: 11pt">_______&nbsp;
        The following organs or tissues only (check and initial all that
        apply): </span>
            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">_______
      All needed organs </span></span></span></span></span>
            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">_______
      All needed tissues </span></span></span></span></span>
            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">_______
      Corneas </span></span></span></span></span>
            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">_______
      Eyes </span></span></span></span></span>
            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
        <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">_______
        Only the following specified organs (Organs that can be donated:
        heart, lungs, liver, pancreas, kidneys, and small bowel):</span></span></span></span></span></p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:left;margin-left: 2in; margin-bottom: 0in; line-height: 0.27in">
      ___________________________________________
      <span style="padding-left: 48px; display: inline-block;"></span>___________________________________________
      <span style="padding-left: 48px; display: inline-block;"></span>___________________________________________
      <span style="padding-left: 48px; display: inline-block;"></span>___________________________________________
      <span style="padding-left: 48px; display: inline-block;"></span>___________________________________________
      <span style="padding-left: 48px; display: inline-block;"></span>_______________________
      </p>
    <p  style="text-align:left;margin-left: 2in; margin-bottom: 0in; line-height: 0.27in">
    ___________________________________________
    <span style="padding-left: 48px; display: inline-block;"></span>______________________
    </p>
            <p style="margin-top: 0.06in; margin-bottom: 0.06in; line-height: 115%">
                <b>OR</b></p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%"><span style="display:inline-block; width:10px; height:10px; border:1px solid #000; margin:0 5px;"></span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span  style="font-size: 11pt">_______&nbsp;
        DO NOT authorize the giving of all or any part of my body upon
        death.&nbsp;</span></p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:center;margin-top: 0.13in; margin-bottom: 0.06in; line-height: 115%">
                <span color="#ffffff"><b>OTHER DIRECTIONS</b></span></p>
            <p  style="text-align:center;margin-bottom: 0.09in; line-height: 115%"><i>(in
                    the following space, indicate any other instructions regarding the
                    receipt or non-receipt of any health care)</i></p>
        </div>
    </div>
    <!-- !Page 3 -->


    <!-- Page 4 -->
    <div class="docPage">
        <div class="docPageInner">

            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">______________________________________________________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">______________________________________________________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; line-height: 115%">______________________________________________________________________________</p>
            <p  style="text-align:center;margin-bottom: 0in; line-height: 115%"><i>(Add
                    additional sheets if necessary.)</i></p>
            <p  style="text-align:center;margin-top: 0.13in; margin-bottom: 0.06in; line-height: 115%">
                <span color="#ffffff"><b>MISCELLANEOUS MATTERS</b></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">My
      surrogate has the specific power and authority to request, review,
      and receive, to the extent I could do so individually, any
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
      give, disclose, and release to my surrogate, without restriction, all
      of my individually identifiable health information and medical
      records regarding any past, present, or future medical or mental
      health condition. This authority given my surrogate shall supersede
      any other agreement which I may have made with my health care
      providers to restrict access to or disclosure of my individually
      identifiable health information. This authority given my surrogate
      has no expiration date and shall expire only in the event that I
      revoke the authority in writing and deliver it to my health care
      provider. </span></span></span></span></span>
            </p>
            <p style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0in; line-height: 115%">


            </p>
            <p style="margin-bottom: 0in; line-height: 115%">Persons dealing with
                my surrogate may rely fully on a photocopy of this document as though
                the photocopy was an original.&nbsp;</p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">In the absence of my
                ability to give directions regarding the use of life-prolonging
                treatment and artificially provided nutrition and hydration, it is my
                intention that this directive shall be honored by my attending
                physician, my family, and any surrogate designation pursuant to this
                directive as the final expression of my legal right to refuse medical
                or surgical treatment and I accept the consequences of the refusal.</p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">If I have been
                diagnosed as pregnant and that diagnosis is known to my attending
                physician, this directive shall have no force or effect during the
                course of my pregnancy.</p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">I understand the
                full import of this directive and I am emotionally and mentally
                competent to make this directive.</p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0.06in; line-height: 115%"><i>NOTICE:
                    Execution of this document restricts withholding and withdrawing of
                    some medical procedures. Consult Kentucky Revised Statutes or your
                    attorney.&nbsp;</i></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in"><i>A
                    person designated as a surrogate pursuant to an advance directive may
                    resign at any time by giving written notice to the grantor; to the
                    immediate successor surrogate, if any; to the attending physician;
                    and to any health care facility which is then waiting for the
                    surrogate to make a health care decision.</i></p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
        </div>
      </div>
    <!-- !Page 4 -->

    <!-- Page 5 -->
    <div class="docPage">
        <div class="docPageInner">

            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in"><span style="text-decoration: none">Signed
      this </span><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><span style="text-decoration: none">
      day of </span><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><span style="text-decoration: none">,
      </span><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.</u></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">_______________________________________</span></span></span></span></span></p>
            <p style="text-indent: 0.5in; margin-bottom: 0.08in; line-height: 115%">
      <span>
          @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
              <b style="text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}}</b>
          @else
              <b>________________________________</b>
          @endif
      </span>
            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif">
        <span  style="font-size: 12pt">
            @if(isset($tellUsAboutYou) && array_key_exists('address',$tellUsAboutYou) && !is_null($tellUsAboutYou['address']))
                <span style="font-family:'Times New Roman, serif'" >{{$tellUsAboutYou['address']}}</span>
            @else
                <span>_________________________________________________________________
                    ___________________________________________________________________________________________
                    _________________________________________________________________________________</span>
            @endif
        </span>
      </span>
      </span>
            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in">
        <span style="font-family:Times New Roman, serif">
          <span  style="font-size: 12pt"><span style="background: #ffffff">
              <span color="#000000">
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

                  @if(isset($tellUsAboutYou) && array_key_exists('zip',$tellUsAboutYou) && !is_null($tellUsAboutYou['zip']))
                    <span style="text-transform: capitalize">{{$tellUsAboutYou['zip']}}</span>
                  @else
                    <span style="text-transform: capitalize">(zip)_____________</span>
                  @endif
              </span>
            </span>
          </span>
        </span>
      </span>
            </p>
            <p  style="text-align:left;margin-left: 0.5in; margin-bottom: 0in; line-height: 115%">
                @if(isset($tellUsAboutYou) && array_key_exists('phone',$tellUsAboutYou) && !is_null($tellUsAboutYou['phone']))
                    <span style="text-transform: capitalize">{{$tellUsAboutYou['phone']}}</span>
                @else
                    <span style="text-transform: capitalize">(phone)_____________</span>
                @endif
            </p>
            <p style="margin-left: 2.44in; margin-bottom: 0in; line-height: 115%">


            </p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

            </p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%"><i><b>[This
                        advance directive shall be either witnessed by two (2) adults in the
                        presence of the grantor and in the presence of each other OR
                        acknowledged before a notary public or other person authorized to
                        administer oaths]</b></i></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:left;margin-bottom: 0in; line-height: 115%">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">STATE OF KENTUCKY</p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">COUNTY OF
                __________________</p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0in; line-height: 115%">Before me, the
                undersigned authority, came
                @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
                    <span>{{strtoupper($tellUsAboutYou['fullname'])}}</span>
                @else
                    <span>________________________________</span>
                @endif,
                the grantor, who is of sound mind and eighteen (18) years of age, or
                older, and acknowledged that
                <span>{{isset($tellUsAboutYou) && array_key_exists('gender',$tellUsAboutYou) && !is_null($tellUsAboutYou['gender']) && $tellUsAboutYou['gender'] == 'M' ? 'he' : (isset($tellUsAboutYou) && array_key_exists('gender',$tellUsAboutYou) && !is_null($tellUsAboutYou['gender']) && $tellUsAboutYou['gender'] == 'F' ? 'she' : 'he/she')}}</span>
                voluntarily dated and signed this writing or
                directed it to be dated and signed as above.</p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p style="margin-bottom: 0.25in; line-height: 115%"><span style="text-decoration: none">Done
      this </span><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><span style="text-decoration: none">
      day of </span><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><span style="text-decoration: none">,
      </span><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><span style="text-decoration: none">.</span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">______________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%; margin-top: 0;">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">NOTARY
      PUBLIC</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">My
      commission expires: _________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">We,
      the witnesses hereunder, on the date hereinabove set forth, certify
      that each of us is 18 years of age or older and each personally
      witnessed
        @if(isset($tellUsAboutYou) && array_key_exists('fullname',$tellUsAboutYou) && !is_null($tellUsAboutYou['fullname']))
            <b style="text-transform: capitalize">{{strtoupper($tellUsAboutYou['fullname'])}}</b>
        @else
            <b>________________________________</b>
        @endif
        ,
      the grantor, sign or direct the signing of this directive and in the
      presence of each other; that we are acquainted with the grantor and
      believe the grantor to be of sound mind; that the grantor's desires
      are as expressed above; that neither of us is a person who signed the
      above directive on behalf of the grantor; that we are not the agent,
      not related to the grantor by blood, not a beneficiary of the grantor
      under the descent and distribution statutes of the Commonwealth, not
      an employee of a health care facility in which the grantor is a
      patient, not an attending physician of the grantor and not directly
      financially responsible for the grantor’s health care.</span></span></span></span></span></p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
            <p  style="text-align:justify;margin-bottom: 0in; line-height: 0.2in">

            </p>
        </div>
    </div>
    <!-- !Page 5 -->

    <!-- Page 6 -->
    <div class="docPage">
        <div class="docPageInner">

            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%; margin-top: 0;">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000"><b>WITNESS
      1</b>: _______________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dated:
      ___________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%; margin-top: 0;">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[signature]</span></span></span></span></span></p>
            <p  style="text-align:left;margin-left: 1.88in; text-indent: -1.5in; margin-bottom: 0in; line-height: 115%">


            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">____________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%; margin-top: 0;">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[name
      printed]</span></span></span></span></span></p>
            <p  style="text-align:left;margin-left: 1.88in; text-indent: -1.5in; margin-bottom: 0in; line-height: 115%">


            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">____________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%; margin-top: 0;">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[street
      address]</span></span></span></span></span></p>
            <p style="margin-left: 0.38in; margin-bottom: 0.06in; line-height: 115%">



            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">____________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%; margin-top: 0;">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[city,
      state]</span></span></span></span></span></p>
            

            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000"><b>WITNESS
      2: </b>_______________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dated:
      ___________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%; margin-top: 0;">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[signature]</span></span></span></span></span></p>
            <p  style="text-align:left;margin-left: 1.88in; text-indent: -1.5in; margin-bottom: 0in; line-height: 115%">


            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">____________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%; margin-top: 0;">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[name
      printed]</span></span></span></span></span></p>
            <p  style="text-align:left;margin-left: 1.88in; text-indent: -1.5in; margin-bottom: 0in; line-height: 115%">


            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">____________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%; margin-top: 0;">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[street
      address]</span></span></span></span></span></p>
            <p style="margin-left: 0.38in; margin-bottom: 0.06in; line-height: 115%">



            </p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%">
                <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">____________________________________</span></span></span></span></span></p>
            <p style="margin-bottom: 0in; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 115%; margin-top: 0;">
      <span style="display: inline-block; border: none; padding: 0in"><span style="font-family:Times New Roman, serif"><span  style="font-size: 12pt"><span style="background: #ffffff"><span color="#000000">[city,
      state]</span></span></span></span></span></p>
        </div>
    </div>
    <!-- !Page 6 -->

</div>

</body>
</html>
