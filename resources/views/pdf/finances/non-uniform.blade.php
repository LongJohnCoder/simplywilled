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
		@if($attorneyPowers['isDurable'] == 1)
			Durable
		@endif
		Power of Attorney for Management of Finances, Property, and Personal Affairs of <br>{{ucwords(strtolower($tellUsAboutYou['fullname']))}}<br>
	</div>
</div>
<p align="center" style="margin-bottom: 0.06in; ">


		<span style="font-family:'Times New Roman, serif';">
			<span size="4" style="font-size: 13pt"><b>
			@if($attorneyPowers['isDurable'] == 1)
				DURABLE
			@endif
				POWER OF ATTORNEY FOR MANAGEMENT OF FINANCES, PROPERTY, AND PERSONAL
				AFFAIRS</b>
			</span>
		</span>
	</p>



	@if(strtolower($state['name']) == 'massachusetts')


	<p align="center" style="margin-top: 0.06in; margin-bottom: 0.06in; ">
	<span style="font-family:'Times New Roman, serif';"><b>(Pursuant to Chapter 190B of
	the Massachusetts General Laws)</b></span></p>

	@endif

	<p align="justify" style="margin-bottom: 0in; "><br/>

	</p>


	<p align="justify" style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
	<span style="font-family:'Times New Roman, serif';">I,</span>
	<span color="#0000ff">
		<span style="font-family:'Times New Roman, serif';">
			<b>{{strtoupper($tellUsAboutYou['fullname'])}},</b>
		</span>
	</span>

	<span style="font-family:'Times New Roman, serif';"> of </span>

	<span color="#0433ff">
		<span style="font-family:'Times New Roman, serif';">{{$tellUsAboutYou['address']}},</span>
	</span>

	<span style="font-family:'Times New Roman, serif';"> </span>

	<span color="#0433ff">
		<span style="font-family:'Times New Roman, serif';">{{ucwords($tellUsAboutYou['city'])}},</span>
	</span>

	<span style="font-family:'Times New Roman, serif';"> </span>

	<span color="#0433ff">
		<span style="font-family:'Times New Roman, serif';">{{ucwords($tellUsAboutYou['state'])}},</span>
	</span>

	<span style="font-family:'Times New Roman, serif';"> intend to create a </span>

	@if($attorneyPowers['isDurable'] == 1)

	<span style="font-family:'Times New Roman, serif';"> Durable </span>

	@endif

	<span style="font-family:'Times New Roman, serif';"> Power of
	Attorney (herein referred to as “this Power”).</span>

	@if($attorneyPowers['isDurable'] == 1)

	<span style="font-family:'Times New Roman, serif';">THIS IS A
	DURABLE POWER OF ATTORNEY AND THE AUTHORITY OF MY AGENT
	(“ATTORNEY-IN-FACT”) SHALL NOT TERMINATE IF I BECOME DISABLED OR
	INCAPACITATED OR IN THE EVENT OF LATER UNCERTAINTY AS TO WHETHER I AM
	DEAD OR ALIVE. IT SHALL ALSO NOT BE AFFECTED BY LAPSE OF TIME. </span>

	@endif

	</p>

	<br>
	<p align="center" style="margin-top: 0.02in; margin-bottom: 0.05in; ">
	<span style="font-family:'Times New Roman, serif';"><b>Important Information</b></span></p>
	<br>
	<p align="justify" style="margin-top: 0.02in; margin-bottom: 0.05in; ">
	<span style="font-family:'Times New Roman, serif';"><b>THIS IS AN IMPORTANT LEGAL
	DOCUMENT. BY SIGNING THE </b></span>



	@if($attorneyPowers['isDurable'] == 1)

	<span style="font-family:'Times New Roman, serif';">
		<b>DURABLE</b>
	</span>

	@endif

	<span style="font-family:'Times New Roman, serif';"><b>POWER
	OF ATTORNEY, YOU ARE AUTHORIZING ANOTHER PERSON TO ACT FOR YOU, THE
	PRINCIPAL.&nbsp; BEFORE YOU SIGN THIS </b></span>

	@if($attorneyPowers['isDurable'] == 1)
		<span style="font-family:'Times New Roman, serif';">
			<b>DURABLE </b>
		</span>
	@endif

	<span style="font-family:'Times New Roman, serif';">
		<b>POWER OF ATTORNEY, YOU SHOULD KNOW THESE IMPORTANT FACTS:</b>
	</span>
	</p>
	<p align="justify" style="margin-top: 0.02in; margin-bottom: 0.05in; ">
	<br/>
	<br/>

	</p>


	<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';">(1) 	This power of attorney
	grants broad authority to another person (your agent) to make
	decisions concerning your property for you (the principal). Your
	agent will be able to make decisions and act with respect to your
	property (including your money) whether or not you are able to act
	for yourself. </span>
	</p>



	<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';">(2) 	This power of attorney does
	not authorize the agent to make health care decisions for you.</span></p>



	<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';">(3) 	Your agent
	(attorney-in-fact) has no duty to act unless you and your agent agree
	otherwise in writing.</span></p>




	<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';">(4) 	This document does not give
	your agent the power to accept or receive any of your property, in
	trust or otherwise, as a gift, unless you specifically authorize the
	agent to accept or receive a gift.</span></p>



	<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';">(5) 	You should select someone
	you trust to serve as your agent. Unless you specify otherwise,
	generally the agent's authority will continue until you die or revoke
	the power of attorney or the agent resigns or is unable to act for
	you.</span></p>


	<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';">(6) 	Your agent is entitled to
	reasonable compensation unless you state otherwise in the Special
	Instructions.</span></p>


	<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';">(7) 	This form provides for
	designation of one agent.&nbsp; If your agent is unable or unwilling
	to act for you, your power of attorney will end unless you have named
	a successor agent.&nbsp;</span></p>


	<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';">(8) 	This power of attorney
	becomes effective immediately unless you state otherwise herein.</span></p>

	<p align="justify" style="margin-left: 0.5in; page-break-before: always; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';">(9) 	You can amend or change this
	</span>

	@if($attorneyPowers['isDurable'] == 1)
		<span style="font-family:'Times New Roman, serif';">durable </span>
	@endif

	<span style="font-family:'Times New Roman, serif';"> Power of
	Attorney only by executing a new Power of Attorney or by executing an
	amendment through the same formalities as an original.&nbsp;</span></p>



	<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';">(10) 	You have the right to
	revoke or terminate this Power of Attorney at any time, so long as
	you are competent.&nbsp; This power of attorney may be revoked by you
	at any time. You can revoke it in writing, by telling your agent, or
	by tearing it up or crossing it out or any other act that shows you
	want it revoked. Tell your agent that you are revoking the power of
	attorney. You should also tell your bank and other financial
	institutions.</span></p>


	<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';">(11) 	Pay careful attention to
	the signing instructions within the document.  Be certain to sign,
	date, and acknowledge this power of attorney before a notary public
	and the required number of witnesses.  The document may also require
	your agent’s signature, or your initials to confirm your election
	in certain provisions.</span></p>


	<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';">(12) 	If you elect to grant
	powers over real property, this Power of Attorney may require
	recordation in the land records where the property is located.</span></p>
	<p align="justify" style="text-indent: 0.38in; margin-bottom: 0in; ">




	<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';"><b>You
	should read this </b></span>

	@if($attorneyPowers['isDurable'] == 1)
	<span style="font-family:'Times New Roman, serif';">
		<b>durable </b>
	</span>
	@endif

	<span style="font-family:'Times New Roman, serif';">
		<b>Power of
	Attorney carefully. When effective, this </b></span>

	@if($attorneyPowers['isDurable'] == 1)
	<span style="font-family:'Times New Roman, serif';">
		<b>Durable </b>
	</span>
	@endif


	<span style="font-family:'Times New Roman, serif';">
		<b>Power of
	Attorney will give your agent the right to deal with property that
	you now have or might acquire in the future. If you have questions
	about this document or the authority you are granting to your agent,
	or if you do not understand this Power of Attorney or any provision
	of it, you should seek legal advice before signing this form.</b>
	</span>
	</p>


	<p align="center" style="margin-top: 0.13in; margin-bottom: 0.13in; ">
	<span style="font-family:'Times New Roman, serif';">
		<b>I.	APPOINTMENT OF AGENT</b>
	</span>
	</p>

	<p align="justify" style="margin-bottom: 0in; ">
		<span color="#000000"><span style="font-family:'Times New Roman, serif';"><b>Designation
		of Agent</b></span></span><span color="#000000"><span style="font-family:'Times New Roman, serif';">.
		I hereby designate and appoint </span></span><span color="#000000"><span style="font-family:'Times New Roman, serif';">my</span></span>

		<span color="#0433ff">
			@if(strtolower($attorneyHolders['relationship']) == 'other')
				<span style="font-family:'Times New Roman, serif';">{{ucwords(strtolower($attorneyHolders['other_relationship']))}},</span>
			@else
				<span style="font-family:'Times New Roman, serif';">{{ucwords(strtolower($attorneyHolders['relationship']))}},</span>
			@endif
		</span>

		<span color="#0433ff">
			<span style="font-family:'Times New Roman, serif';">{{ucwords($attorneyHolders['fullname'])}},</span>
		</span>

		<span color="#000000">
			<span style="font-family:'Times New Roman, serif';">of</span>
		</span>

		<span color="#0000ff">
			<span style="font-family:'Times New Roman, serif';">{{ucwords($attorneyHolders['address'])}},</span>
		</span>

		<span color="#0000ff">
			<span style="font-family:'Times New Roman, serif';">{{ucwords($attorneyHolders['city'])}},</span>
		</span>

		<span color="#0000ff">
			<span style="font-family:'Times New Roman, serif';">{{ucwords($attorneyHolders['state'])}}</span>
		</span>

		<span style="font-family:'Times New Roman, serif';">(Tel:  </span>
		</span>

		<span color="#0433ff">
			<span style="font-family:'Times New Roman, serif';">{{ucwords(trim($attorneyHolders['phone']))}}</span>
			<span style="font-family:'Times New Roman, serif';">),
			as my Attorney-in-Fact (hereinafter referred to in this Power of
			Attorney as “my agent”) to have all of the powers hereinafter set
			forth.</span>
		</span>
	</p>

	{{--<p align="justify" style="margin-bottom: 0in; ">--}}{{--<span color="#000000">--}}
	{{--<span style="font-family:'Times New Roman, serif';">(Tel:  </span>
	</span>

	<span color="#0433ff">
		<span style="font-family:'Times New Roman, serif';">{{ucwords(trim($attorneyHolders['phone']))}}</span>
		<span style="font-family:'Times New Roman, serif';">),
		as my Attorney-in-Fact (hereinafter referred to in this Power of
		Attorney as “my agent”) to have all of the powers hereinafter set
		forth.</span>
	</span>--}}

	{{--</p>--}}
	<p align="justify" style="margin-bottom: 0in; "><br/>

	</p>


	@if($financialPowerOfAttorney['is_backupattorney'] == 1)

	<p align="justify" style="margin-bottom: 0in; ">
		<span color="#000000">
			<span style="font-family:'Times New Roman, serif';">
				<b>Alternate Agent.</b>
			</span>
		</span>

		<span color="#000000">
			<span style="font-family:'Times New Roman, serif';">If said </span>
		</span>

		<span color="#0433ff">
			<span style="font-family:'Times New Roman, serif';">{{ucwords($attorneyHolders['fullname'])}}</span>
		</span>

		<span color="#000000">
			<span style="font-family:'Times New Roman, serif';"> is not available or becomes ineligible to act, or if I revoke their
			appointment or authority to act, then I designate my </span>
		</span>

		<span color="#0433ff">
			@if(strtolower($attorneyBackup['relationship']) == 'other')
				<span style="font-family:'Times New Roman, serif';">{{$attorneyBackup['other_relationship']}},</span>
			@else
				<span style="font-family:'Times New Roman, serif';">{{$attorneyBackup['relationship']}},</span>
			@endif
		</span>

		<span color="#000000">
			<span style="font-family:'Times New Roman, serif';"> </span>
		</span>

		<span color="#0433ff">
			<span style="font-family:'Times New Roman, serif';">{{ucwords($attorneyBackup['fullname'])}}</span>
		</span>

		<span color="#000000">
			<span style="font-family:'Times New Roman, serif';"> of </span>
		</span>

		<span color="#0000ff">
			<span style="font-family:'Times New Roman, serif';">{{ucwords($attorneyBackup['address'])}},</span>
		</span>

		<span style="font-family:'Times New Roman, serif';"> </span>

		<span color="#0000ff">
			<span style="font-family:'Times New Roman, serif';">{{ucwords(strtolower($attorneyBackup['city']))}},</span>
		</span>

		<span style="font-family:'Times New Roman, serif';"> </span>

		<span color="#0000ff">
			<span style="font-family:'Times New Roman, serif';">{{ucwords(strtolower($attorneyBackup['state']))}}</span>
		</span>

		<span color="#000000">
			<span style="font-family:'Times New Roman, serif';">
				(Tel: </span>
		</span>

		<span color="#0433ff">
			<span style="font-family:'Times New Roman, serif';">{{ucwords(trim($attorneyBackup['phone']))}}</span>
			<span style="font-family:'Times New Roman, serif';">)
				as my alternate Agent to have all of the powers hereinafter set
				forth.&nbsp;</span>
		</span>
	</p>

	@endif
	<p align="justify" style="margin-bottom: 0in; page-break-after: always;"><br/>

	</p>


	<p align="center" style="margin-top: 0.13in; margin-bottom: 0.13in;  ">
	<span style="font-family:'Times New Roman, serif';"><b>II.	AGENT POWERS</b></span></p>

	<p align="justify" style="margin-bottom: 0in; ">
		<span style="font-family:'Times New Roman, serif';">
			<b>Broad
	Grant of Powers</b></span><span style="font-family:'Times New Roman, serif';">. It is
	my intention to give my Agent the broadest possible powers to
	represent my interests in all aspects of any transactions or dealings
	involving me or my property to the fullest extent permitted by law.
	I give the powers specified herein with the understanding that they
	will be used for my benefit and on my behalf and will be exercised
	only in a fiduciary capacity.  In exercising these powers, my Agent
	shall not use my assets to satisfy any legal obligations of my Agent,
	including but not limited to the support of any dependents of my
	Agent, unless I am the dependent of the Agent or I am otherwise
	legally obligated to support such dependent or dependents.</span></p>

	<p align="justify" style="margin-bottom: 0in; "><br/>

	</p>

	<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';"><b>Specific
	Powers</b></span><span style="font-family:'Times New Roman, serif';">. I grant to my
	Agent full power and authority to do and perform every and any act,
	power, duty, right or obligation whatsoever that I now have for
	property, real or personal, tangible or intangible, now owned or
	hereafter acquired by me, including, without limitation, the
	following specifically enumerated powers.  In connection with the
	exercise of any of the powers described in the below paragraphs, I
	give my Agent full authority, to the extent that a principal can act
	through an agent, to take all actions that my Agent believes
	necessary, proper, or convenient, to the extent that I could take
	such actions myself, including, without limitation, the power to
	prepare, execute, and file all documents and maintain records; enter
	into contracts; hire, discharge, and pay reasonable compensation to
	attorneys, accountants, expert witnesses, or other assistants;
	execute, acknowledge, seal, and deliver any instrument.  I grant to
	my Agent full power and authority to do every and all acts required,
	necessary or appropriate in exercising any of the powers herein
	granted as fully as I might or could do if personally present, with
	full power of substitution or revocation, hereby ratifying and
	confirming all that my Agent shall lawfully do or cause to be done by
	virtue of this Power of Attorney and the powers herein granted:</span></p>
	<p align="justify" style="margin-bottom: 0in; "><br/>

	</p>


	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; ">
	{{--<li>--}}
		<span style="font-family:'Times New Roman, serif';">(1)	</span>
		{{--<p align="justify" style="margin-bottom: 0in;  margin-top: 0;">--}}
		<span style="font-family:'Times New Roman, serif';">
			<u>Real Property.</u>
		</span>
		<span style="font-family:'Times New Roman, serif';">
		 To take any actions for the management or maintenance of any real
		property in which I own an interest when this Power is executed, or
		in which I later acquire an interest, including the power to
		acquire, maintain, repair, alter, improve, demolish, rebuild, lease,
		rent, sell, grant options to sell, bargain, contract for, and convey
		ownership of property; control the manner in which property is
		managed, maintained, and used; satisfy and grant security interests
		and other encumbrances on property (including a &quot;reverse
		mortgage&quot;); obtain and make claims on insurance policies
		covering risks of loss or damage to property; accept or remove
		tenants; collect proceeds generated by property; exercise rights of
		participation in real estate syndicates or other real estate
		ventures; invest in property; and in any manner deal with any real
		property or any interest therein, that I now own or may hereafter
		acquire, in my name and for my benefit, upon such terms and
		conditions, including credit arrangements, as my Agent shall deem
		proper; and to execute, acknowledge and deliver, under seal or
		otherwise, any and all assignments, transfers, deeds, papers,
		documents or instruments which my Agent shall deem necessary in
		connection therewith.  My agent shall have no authority to change
		the form of title in which property is held.</span>{{--</p>--}}
	</p>


	<p align="justify" style="margin-bottom: 0in; page-break-before: always">
	</p>


	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; ">
		<span style="font-family:'Times New Roman, serif';">(2)	</span>
		{{--<p align="justify" style="margin-bottom: 0in; margin-top: 0; ">--}}
		<span style="font-family:'Times New Roman, serif';"><u>Personal Property</u></span><span style="font-family:'Times New Roman, serif';">.
		 To take any actions for the management or maintenance of any
		personal property in which I own an interest when this Power is
		executed, tangible or intangible, or in which I later acquire an
		interest, including the power to acquire, purchase, repair, improve,
		restore, exchange, lease, grant options to sell, sell, donate,
		dispose of, assign, and convey ownership of personal property;
		control the manner in which property is managed, maintained, and
		used; change the form of title in which property is held (including
		creating or severing a “joint tenancy” with right of
		survivorship); satisfy and grant security interests thereon; obtain
		and make claims on insurance policies covering risks of loss or
		damage to property; collect proceeds generated by property; ensure
		that any needed repairs are made to property; invest or reinvest in
		property; and in any manner deal with any of my personal property or
		any interest therein, that I now own or may hereafter acquire, in my
		name and for my benefit, upon such terms and conditions, including
		credit arrangements, as my Agent shall deem proper; and to execute,
		acknowledge and deliver, under seal or otherwise, any and all
		assignments, transfers, titles, papers, documents or instruments
		which my Agent shall deem necessary in connection therewith.</span>{{--</p>--}}
	</p>
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; ">
	<br/>

	</p>

	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';">(3)	</span>

	<span style="font-family:'Times New Roman, serif';"><u>Motor Vehicles</u></span>
	<span style="font-family:'Times New Roman, serif';">. To sell,
	purchase, apply for a Certificate of Title upon, and endorse and
	transfer title thereto, any motor vehicle, and to represent in such
	transfer assignment that the title to said motor vehicle is free and
	clear of all liens and encumbrances except those specifically set
	forth in such transfer assignment.</span></p>

	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; ">
	<br/>

	</p>


	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';">(4)	</span><span style="font-family:'Times New Roman, serif';"><u>Banking
	/ Financial Institutions</u></span><span style="font-family:'Times New Roman, serif';">.
	To take any and all actions in connection with any financial
	institution in which I have an account or an interest in an account
	when this Power is executed, or in which I later acquire an account
	or an interest in an account, including the power to deposit funds in
	any financial institution, and to withdraw funds by check or
	otherwise to pay for goods, services, and any other personal and
	business expenses for my benefit; to execute any document required to
	be signed by such banking institution if necessary to effect these
	powers; to continue, modify, or terminate existing accounts; create
	“joint tenancy” accounts for convenience and management purposes
	only, so long as such account is established for my beneficial
	interest only; open new accounts; withdraw funds; draw, endorse, and
	deposit checks, drafts and other negotiable instruments (including,
	but not limited to, Social Security, government and insurance checks
	made payable to me); apply for and receive credit cards and use
	and/or terminate existing credit cards in my name; prepare financial
	statements; borrow money; and, execute or release any security
	documents that may be needed in the exercise of the rights granted by
	this Power of Attorney, as well as the authority to conduct banking
	transactions as set forth in the laws of </span>

	<span color="#0433ff">
		<span style="font-family:'Times New Roman, serif';">{{$state['name']}}</span>
	</span>

	<span color="#000000"><span style="font-family:'Times New Roman, serif';">
	and any </span></span><span style="font-family:'Times New Roman, serif';">other State
	or foreign country. For the purposes of this paragraph, the term
	&quot;financial institution&quot; includes, but is not limited to,
	banks, trust companies, savings banks, commercial banks, building and
	loan associations, savings and loan companies or associations, credit
	unions, industrial loan companies, thrift companies and brokerage
	firms or other financial institution selected by my Agent. My Agent
	shall not have the power to terminate or change the beneficiary of
	any beneficiary or “pay on death” accounts.</span></p>
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; ">
	<br/>

	</p>



	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; page-break-before: always">
		<span style="font-family:'Times New Roman, serif';">(5)	</span>
		<span style="font-family:'Times New Roman, serif';"><u>Stock
		and Bond Transactions</u></span><span style="font-family:'Times New Roman, serif';">.
		To buy, sell, exchange, surrender, assign, redeem, or otherwise
		transfer any stocks, bonds, mutual funds, and all other types of
		securities and financial instruments</span>

		<span color="#008f00">
			<span style="font-family:'Times New Roman, serif';"></span>
		</span>

		@if(array_key_exists('isAuthorizeTotrade', $attorneyPowers) && $attorneyPowers['isAuthorizeTotrade'] != 1)

		<span style="font-family:'Times New Roman, serif';">
		except commodity futures contracts and call and put options on stocks
		and stock indexes</span>

		@else

		<span style="font-family:'Times New Roman, serif';">;
		to buy, sell, exchange, assign, settle and exercise commodity futures
		contracts and call and put options on stocks and stock indexes trade
		on a regulated option exchange</span>

		@endif

		<span style="font-family:'Times New Roman, serif';">; to receive
		and hold certificates and other evidences of ownership with respect
		to securities; to exercise voting rights with respect to securities
		in person or by proxy, and, to enter into voting trusts and consent
		to limitations on the right to vote.</span>
	</p>



	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';">(6) 	</span><span style="font-family:'Times New Roman, serif';"><u>Loans</u></span><span style="font-family:'Times New Roman, serif';">.
	 To make loans in my name for my benefit; to borrow money in my name
	for my benefit; to give promissory notes or other obligations
	therefor; and to deposit or mortgage as collateral or for security
	for the payment thereof any or all of my securities, real estate,
	personal property, or other property of whatever nature and wherever
	situated, held by me personally or in trust for my benefit.</span></p>

	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';">(7)	</span><span style="font-family:'Times New Roman, serif';"><u>Safe
	Deposit Boxes</u></span><span style="font-family:'Times New Roman, serif';">. To hire
	a safe deposit box or space in a vault; to have access at any time or
	times to any safe deposit box rented by me or to which I may have
	access, wheresoever located, including drilling, if necessary, and to
	remove all or any part of the contents thereof, and to surrender or
	relinquish said safe deposit box; and any institution in which any
	such safe deposit box may be located shall not incur any liability to
	me or my estate as a result of permitting my Agent to exercise this
	power; to have access at any time or times to any safe deposit box
	rented to me, wherever located, and to remove all or any part of the
	contents thereof, and to surrender or relinquish any safe deposit
	box. </span>
	</p>




	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';">(8)	</span><span style="font-family:'Times New Roman, serif';"><u>Insurance
	and Annuities</u></span><span style="font-family:'Times New Roman, serif';">. To take
	any actions with respect to any insurance or annuity contracts in
	which I have an interest when this Power is executed, or in which I
	later acquire an interest, including the power to purchase or
	otherwise acquire additional insurance coverage of any type or
	additional annuities; pay premiums and make claims  on life,  health,
	automobile and homeowners’ insurance on my behalf; continue
	existing insurance or annuity contracts; agree to modifications in
	the terms of insurance or annuity contracts in which I have an
	interest; borrow against insurance or annuity contracts in which I
	have an interest, to the extent allowed under the contract terms;
	receive dividends, proceeds, and other benefits generated by the
	contracts; and transfer interests in insurance or annuity contracts
	to the extent permitted under the terms of those contracts.  My Agent
	shall not have the power to cash in or change the beneficiary of any
	life insurance policy.</span></p>


	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';">(8)	</span><span style="font-family:'Times New Roman, serif';"><u>Beneficial
	Interests</u></span><span style="font-family:'Times New Roman, serif';">. To take any
	actions with respect to any probate estate, trust, conservatorship,
	guardianship, escrow, custodianship, or other fund/entity in which I
	have a beneficial interest when this Power is executed, or in which I
	later acquire an interest, including the power to accept, reject,
	disclaim, receive, receipt for, sell, assign, release, pledge,
	exchange, or consent to a reduction in or modification of a share in
	or payment from the fund/entity; demand or obtain by litigation or
	otherwise money or other things of value to which I am, may become,
	or claim to be entitled by reason of the fund/entity; initiate,
	participate in, and oppose litigation to ascertain the meaning,
	validity, or effect of a deed, will, declaration of trust, or other
	instrument or transaction affecting my interest; initiate,
	participate in, and oppose litigation to remove, substitute, or
	surcharge a fiduciary; and, conserve, invest, disburse and use
	anything received for an authorized purpose.</span></p>

	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';">(9)	</span><span style="font-family:'Times New Roman, serif';"><u>Digital
	Assets</u></span><span style="font-family:'Times New Roman, serif';">. To take any
	actions in connection with any and all forms of electronic
	communications and/or digital assets in which I have an interest when
	this Power is executed, or in which I later acquire an interest,</span>

	@if(strtolower($state['name']) != 'oregon')
		<span style="font-family:'Times New Roman, serif';">
		including the power to access, continue, modify, or terminate
		existing accounts; create or change any “passwords” and/or “user
		identification profiles”. “Digital asset” means an electronic
		record in which an individual has a right or interest. “Digital
		asset” does not include an underlying asset or liability unless the
		asset or liability is itself an electronic record.</span>
	@else

		<span style="font-family:'Times New Roman, serif';">
		pursuant to the Revised Uniform Fiduciary Access to Digital Assets
		Act (2015), Chapter 19 ORS.</span>

	@endif

	</p>



	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0.06in; page-break-before: always">
	<span style="font-family:'Times New Roman, serif';">(10)	</span><span style="font-family:'Times New Roman, serif';"><u>Retirement
	Plans and Benefits</u></span><span style="font-family:'Times New Roman, serif';">. In
	connection with any pension, profit sharing or stock bonus plan,
	individual retirement account (IRA), Roth IRA, §403(b) annuity or
	account, §457 plan, </span>
	<span color="#008f00">
		<span style="font-family:'Times New Roman, serif';"></span>
	</span>

	@if($attorneyPowers['isAuthorizeToAccessOthers'] == 1)

	<span style="font-family:'Times New Roman, serif';">Federal
	Thrift Savings Plan (TSP), Civil Service Retirement System (CSRS),
	Federal Employee Retirement System (FERS),</span>

	@endif

	<span style="font-family:'Times New Roman, serif';"> or any other
	retirement plan, arrangement or annuity [including any plans that may
	be governed by the Employee Retirement Income Security Act of 1974
	(ERISA)] in which I am a participant or of which I am a beneficiary
	(whether established by my Agent or otherwise) (each of which is
	referred to in this document as a “Plan” or “such Plan”), my
	Agent shall have the following powers, in addition to all other
	applicable powers granted by this document:</span></p>
	<p align="justify" style="margin-left: 1in; margin-top: 0.06in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';">(a)	To manage and maintain any
	such Plan in which I am a participant or of which I am a beneficiary
	as of the date of this Power, except that my Agent shall not have
	power to change the beneficiary designations therein.</span></p>
	<p align="justify" style="margin-left: 1in; margin-top: 0.06in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';">(b)	To contribute to, select
	payment option of, roll-over, and receive benefits of any retirement
	plan or IRA I may own, and to establish one or more Plans in my name
	and to designate one or more beneficiaries or contingent
	beneficiaries for any benefits payable under such Plan on account of
	my death, except that my Agent shall have no power to designate my
	Agent directly or indirectly as a beneficiary or contingent
	beneficiary to receive a greater share or proportion of any such
	benefits than my Agent would have otherwise received, unless such
	change is consented to by all other beneficiaries who would have
	received the benefits but for the proposed change; the preceding
	limitation shall not apply to any designation of my Agent as
	beneficiary in a fiduciary capacity, with no beneficial interest.</span></p>
	<p align="justify" style="margin-left: 1in; margin-top: 0.06in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';">(c)	 To elect a form of payment
	of benefits, to withdraw benefits, to make, exercise, waive or
	consent to any and all elections and/or options that I may have
	regarding contributions to, investments or administration of,
	distribution from, or benefits under, such Plan.</span></p>

	<p align="justify" style="margin-left: 1in; margin-top: 0.06in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';"></span>


	<span style="font-family:'Times New Roman, serif';"> </span>
	</p>

	@if(array_key_exists('isAuthorizeToAccessOthers', $attorneyPowers) && $attorneyPowers['isAuthorizeToAccessOthers'] == 1)

		<p align="justify" style="margin-left: 1in; margin-top: 0.06in; margin-bottom: 0in; ">
		<span style="font-family:'Times New Roman, serif';">(d)	To have the power to perform
		any and all acts that may be authorized or permitted by 5 CFR §1690.2
		with respect to any interest I have in a Federal Thrift Savings Plan.</span><span style="font-family:'Times New Roman, serif';">
		</span>
		</p>

	@endif



	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';">(11)	</span><span style="font-family:'Times New Roman, serif';"><u>Claims
	and Litigation</u></span><span style="font-family:'Times New Roman, serif';">. To
	obtain and pay for legal advice for my benefit; to commence, defend,
	or discontinue legal and administrative proceedings on my behalf,
	including actions against third parties who refuse, without cause, to
	honor this instrument; to take any actions with respect to any claim
	that I may have or that has been asserted against me and with respect
	to any legal proceeding in which I have an interest when this Power
	is executed, or in which I later acquire an interest, including the
	power to institute, prosecute, and defend legal proceedings and
	claims on my behalf; file actions to determine adverse claims, seek
	preliminary, provisional, or intermediate relief on my behalf; apply
	for the enforcement or satisfaction of judgments that have been
	rendered in my favor; participate fully in the development of claims
	and proceedings; submit any dispute in which I have an interest to
	arbitration; submit and accept settlement offers and participate in
	settlement negotiations; handle all procedural aspects, such as
	service of process, filing of appeals, stipulations, verifications,
	waivers, and all other matters in any way affecting the process of
	any claim or litigation; and, satisfy judgments that have been
	rendered against me.</span></p>

	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; page-break-before: always">
	<span style="font-family:'Times New Roman, serif';">(12)	</span><span style="font-family:'Times New Roman, serif';"><u>Tax
	Matters</u></span><span style="font-family:'Times New Roman, serif';">. To prepare,
	complete, sign, and file any local, state and federal tax returns on
	my behalf, pay any taxes and assessments due and receive credits and
	refunds owed to me and to sign any tax agency documents necessary to
	effectuate these powers; to exercise my rights to protest and appeal
	assessments; to pay amounts due to the appropriate taxing authority;
	to execute waivers, consents (including, but not limited to, consents
	and agreements under Internal Revenue Code §2032A, or any successor
	section thereto), closing agreements, and similar documents related
	to my tax liability and to execute any Power of Attorney designation
	on forms required by the Internal Revenue Service or any state
	department of revenue or taxation for all open tax years; to
	participate in all procedural matters connected with my tax
	liability, including audits; and, to exercise any elections that may
	be available to me under applicable state or federal tax laws or
	regulations.</span></p>

	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';">(13)	</span><span style="font-family:'Times New Roman, serif';"><u>Personal
	and Family Maintenance</u></span><span style="font-family:'Times New Roman, serif';">.
	To hire accountants, attorneys at law, consultants, clerks,
	physicians, nurses, agents, workmen, and other and to remove them,
	and to appoint others in their place, and to pay and allow the
	persons so employed such salaries, wages, or compensation as my Agent
	shall deem proper; to conduct my personal affairs and to discharge
	any and all obligations I may owe to myself and to family members and
	other third persons who are customarily or legally entitled to my
	support when this Power is executed, or that are undertaken
	thereafter, including the power to take steps to ensure that our
	customary standard of living is maintained; continue existing charge
	accounts, open new charge accounts, and make payments thereon;
	provide for transportation; maintain correspondence; prepare,
	maintain, and preserve personal records and documents; and, maintain
	membership in any social, religious, or professional organization and
	make contributions thereto.</span></p>

	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';">(14)	</span><span style="font-family:'Times New Roman, serif';"><u>Government
	Benefits</u></span><span style="font-family:'Times New Roman, serif';">. To apply for
	and receive any government benefits for which I may be eligible or
	become eligible, including but not limited to, Social Security,
	Medicare and Medicaid, or other governmental programs, or civil or
	military service</span>

	@if(array_key_exists('isAuthorizeToAccessOthers', $attorneyPowers) && $attorneyPowers['isAuthorizeToAccessOthers'] == 1)

	<span style="font-family:'Times New Roman, serif';">
	[including but not limited to the Federal Thrift Savings Plan (TSP),
	the Civil Service Retirement System (CSRS), the Federal Employee
	Retirement System (FERS), the Federal Employees Group Life Insurance
	(FEGLI) program, and/or the Federal Employee Health Benefits (FEHB)
	program]</span>

	@endif

	<span style="font-family:'Times New Roman, serif';">, existing when
	this Power is executed or accruing thereafter, whether existing or
	accruing in the state or elsewhere. My Agent is appointed as my
	“Representative Payee” for the purpose of receiving Social
	Security benefits and may collect all benefits to or for my benefit
	by any governmental agency or body, such as Supplemental Social
	Security (SSI), Medicaid, Medicare and Social Security Disability
	Insurance (SSDI). My Agent shall have the full power to represent me
	and deal in all ways necessary concerning rights or benefits payable
	to me by any governmental agency and shall have the full power to
	sign, execute, deliver, process and acknowledge applications,
	documents, checks and such other instruments in writing, of every
	kind and nature, as may be necessary or proper to obtain and receive
	any benefits to which I or any of my dependents may be entitled
	through any governmental agency and to communicate on my behalf with
	any governmental agency from whom I am receiving or from whom I may
	be eligible to receive benefits.</span></p>





	@if(array_key_exists('isAuthorisedToOperateBusiness', $attorneyPowers) && $attorneyPowers['isAuthorisedToOperateBusiness'] == 1)

	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';">(15)	</span><span style="font-family:'Times New Roman, serif';"><u>Business
	Interests</u></span><span style="font-family:'Times New Roman, serif';">. To operate
	and maintain in my stead any business interests I  may have at the
	time of this Power or later acquired by me; to conduct or participate
	in any lawful business of whatever nature for me and in my name; to
	execute partnership agreements and amendments thereto; to
	incorporate, reorganize, merge, consolidate, recapitalize, sell,
	liquidate or dissolve any business; to elect or employ officers,
	directors and attorneys; to carry out the provisions of any agreement
	for the sale of any business interest or the stock therein; and to
	exercise voting rights with respect to stock, either in person or by
	proxy, and exercise stock options.</span></p>

	@endif



	@if(array_key_exists('isAuthorizeToMakeGift', $attorneyPowers) && $attorneyPowers['isAuthorizeToMakeGift'] == 1)
	<div>
		<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in;">
			<span style="page-break-after: always;"></span>
			@if(array_key_exists('isAuthorizeToMakeGift', $attorneyPowers) && $attorneyPowers['isAuthorizeToMakeGift'] == 1
				&& array_key_exists('isAuthorisedToOperateBusiness', $attorneyPowers) && $attorneyPowers['isAuthorisedToOperateBusiness'] == 1)

			<span style="font-family:'Times New Roman, serif';">(16)		</span>

			@elseif(array_key_exists('isAuthorizeToMakeGift', $attorneyPowers) && $attorneyPowers['isAuthorizeToMakeGift'] == 1
				&& (!array_key_exists('isAuthorisedToOperateBusiness', $attorneyPowers) || $attorneyPowers['isAuthorisedToOperateBusiness'] == 0))

			<span style="" color="#000000">
				<span style="font-family:'Times New Roman, serif';">(15)	</span>
			</span>

			@endif

		<span style="font-family:'Times New Roman, serif';"></span>

		<span style="font-family:'Times New Roman, serif';"><u>Gifts.</u></span>

		<span style="font-family:'Times New Roman, serif';">
		If I have initialed below, I grant my Agent the authority and power
		to make gifts, grants, or other transfers without consideration, of
		cash or other property, including the power to forgive indebtedness
		and consent to gift splitting under Internal Revenue Code §2513 or
		successor sections</span>


			@if(array_key_exists('isAuthorizeToOperategift', $attorneyPowers) && $attorneyPowers['isAuthorizeToOperategift'] == 1)

			<span style="font-family:'Times New Roman, serif';">
			to make gifts to themselves or to anyone the agent has a legal
			obligation to support </span>

			@else

			<span style="font-family:'Times New Roman, serif';">.</span>

			@endif

		<span style="font-family:'Times New Roman, serif';"> My Agent may honor
		any pledges which I may have made and make donations to charitable
		organizations consistent with my prior donations. My Agent may also
		make special occasion gifts in equal or unequal amounts at my Agent’s
		discretion. My Agent may make gifts of the cost of tuition, including
		making payments directly to the educational institution and/or
		contributing to a qualified tuition program established under §529
		of the Internal Revenue Code. My Agent may also pay medical expenses
		and shall make such payments directly to the medical provider(s).
		These gifting powers granted under this subparagraph shall be
		exercised, if at all, in favor of </span>

			@if($tellUsAboutYou['marital_status'] == 'M')
				<span style="font-family:'Times New Roman, serif';">my Spouse, </span>

			@elseif($tellUsAboutYou['marital_status'] == 'R')
				<span style="font-family:'Times New Roman, serif';">my Partner, </span>

			@endif

		<span style="font-family:'Times New Roman, serif';">my issue, any
		spouse of my issue and any other of my dependents, including my
		Agent.  Any gifts made pursuant to this subparagraph shall not be
		future interests within the meaning of Internal Revenue Code §2503,
		and the aggregate amount of any gifts made in any one calendar year
		to any one individual shall not exceed the amount that may be made
		free of federal gift tax. The limitations in the preceding sentence
		shall not apply to any gifts which incur no federal gift tax, such
		as, for example, gifts that qualify for the unlimited federal gift
		tax marital deduction or charitable deduction.</span>
		</p>

			@if(strtolower($state['name']) == 'arizona')

			<p style="margin-bottom: 0in; "><br/>

			</p>

			<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; ">
			&nbsp;<span style="font-family:'Times New Roman, serif';"><i>Advisory Notice to
			Agent: ARS § 14-5506 governs the exercise of powers of attorney.
			Under that statute, an agent cannot receive ANY benefits from the
			principal unless those benefits are specifically identified in detail
			within this instrument or within a written contract. Otherwise, the
			agent could be subject to criminal prosecution or subject to the
			penalty provisions of ARS § 46-456, which authorizes the loss of the
			agent’s right to inherit from the principal as well as payment of
			treble damages and attorneys’ fees. An agent should carefully
			review these statutes or consult with a knowledgeable attorney prior
			to exercising the authority granted by this power of attorney.&nbsp;</i></span></p>
			<p style="margin-left: 0.38in; margin-bottom: 0in; ">
			<br/>

			</p>

			<p style="margin-left: 0.38in; margin-top: 0.06in; margin-bottom: 0in; ">
			<span style="font-family:'Times New Roman, serif';">Initials of
			Principal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Initials of Witness</span></p>



			<p style="margin-left: 0.38in; margin-bottom: 0in; ">
			<span style="font-family:'Times New Roman, serif';">_______________	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ______________</span></p>

			@else

			<p style="margin-top: 0.06in; margin-bottom: 0in; "><br/>

			</p>

			<p style="margin-left: 0.38in; margin-top: 0.06in; margin-bottom: 0in; ">
			<span style="font-family:'Times New Roman, serif';">Initials of Principal</span></p>


			<p style="margin-left: 0.38in; margin-bottom: 0in; ">
			<span style="font-family:'Times New Roman, serif';">_______________</span></p>
				<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; ">
				<br/>

				</p>

			@endif
		</div>
		@endif



	<p align="justify" style="margin-bottom: 0in; page-break-before: always"><span style="font-family:'Times New Roman, serif';"><b>SPECIAL
	INSTRUCTIONS: </b></span><span style="font-family:'Times New Roman, serif';">On the
	following lines are any special instructions limiting or extending
	the powers you give to your agent (Write “None” if no additional
	instructions are given):</span></p>

	<p align="justify" style="margin-bottom: 0in; line-height: 200%">
		<span style="font-family:'Times New Roman, serif';">_________________________________________________________________________________________</span><br>
		<span style="font-family:'Times New Roman, serif';">_________________________________________________________________________________________</span><br>
		<span style="font-family:'Times New Roman, serif';">_________________________________________________________________________________________</span><br>
		<span style="font-family:'Times New Roman, serif';">_________________________________________________________________________________________</span><br>
		<span style="font-family:'Times New Roman, serif';">_________________________________________________________________________________________</span><br>
		<span style="font-family:'Times New Roman, serif';">_________________________________________________________________________________________</span><br>
		<span style="font-family:'Times New Roman, serif';">___________________________________________________ .</span><br>
	</p>

	<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';"><b>Inspection
	and Disclosure of Information Relating to My Physical or Mental
	Health</b></span><span style="font-family:'Times New Roman, serif';">. My agent has
	the power and authority to request, review, and receive, to the
	extent I could do so individually, any information, verbal or
	written, regarding my physical or mental health, including, but not
	limited to, my individually identifiable health information or other
	medical records. This release authority applies to any information
	governed by the Health Insurance Portability and Accountability Act
	of 1996 (HIPAA), 42 U.S.C. 1320d and 45 CFR 160-164. I hereby
	authorize any physician, health care professional, dentist, health
	plan, hospital, clinic, laboratory, pharmacy, or other covered health
	care provider, any insurance company, and the Medical Information
	Bureau, Inc., or other health care clearinghouse that has provided
	treatment or services to me, or that has paid for or is seeking
	payment from me for such services, to give, disclose, and release to
	my agent, without restriction, all of my individually identifiable
	health information and medical records regarding any past, present,
	or future medical or mental health condition.  This authority given
	my agent shall supersede any other agreement which I may have made
	with my health care providers to restrict access to or disclosure of
	my individually identifiable health information.  </span><span style="font-family:'Times New Roman, serif';">This
	authority given my agent shall be effective during all times that
	this Power of Attorney is effective, and shall terminate as provided
	herein or in the event that I revoke the authority in writing and
	deliver it to my health care provider.</span></p>
	<p align="justify" style="margin-bottom: 0in; "><br/>

	</p>
	<p align="center" style="margin-top: 0.13in; margin-bottom: 0.13in; ">
	<span style="font-family:'Times New Roman, serif';"><b>III.	GENERAL PROVISIONS</b></span></p>

	<p align="justify" style="margin-bottom: 0in; "><span color="#000000"><span style="font-family:'Times New Roman, serif';"><b>When
	Effective.</b></span></span>

	@if(array_key_exists('isIncapacity', $attorneyPowers) && $attorneyPowers['isIncapacity'] == 1)

	<span style="font-family:'Times New Roman, serif';">The above
	authority granted to my Agent shall take effect </span>

	<span color="#212121">

	<span style="font-family:'Times New Roman, serif';">on
	my disability or incapacity, as defined herein or as otherwise
	determined by a court of competent jurisdiction.</span></span>

	@else

	<span color="#009c00"><span style="font-family:'Times New Roman, serif';">
	 </span></span>

	 <span style="font-family:'Times New Roman, serif';">This Power is
	effective immediately upon execution.</span>

	@endif
	</p>


	<p align="justify" style="margin-top: 0.13in; margin-bottom: 0.06in; ">
	<span style="font-family:'Times New Roman, serif';"><b>Effect of Incapacity or
	Disability of Principal</b></span><span style="font-family:'Times New Roman, serif';"><b>.</b></span><span style="font-family:'Times New Roman, serif';">
	</span>

	@if(array_key_exists('isDurable', $attorneyPowers) && $attorneyPowers['isDurable'] == 1)

		<span style="font-family:'Times New Roman, serif';">
			<b>THIS POWER OF ATTORNEY IS A “DURABLE” POWER OF ATTORNEY </b>
		</span>

		<span style="font-family:'Times New Roman, serif';">
			<b>AND,
			TO THE MAXIMUM EXTENT PERMITTED BY LAW, SHALL NOT BE AFFECTED BY MY
			DISABILITY, INCAPACITY OR INCOMPETENCY, OR IN THE EVENT OF LATER
			UNCERTAINTY AS TO WHETHER I AM DEAD OR ALIVE, OR BY LAPSE OF TIME, UNLESS OR UNTIL
		OTHERWISE ORDERED BY A COURT OF COMPETENT JURISDICTION.</b></span>

	@elseif(array_key_exists('isDurable', $attorneyPowers) && $attorneyPowers['isDurable'] == 0)
		<span style="font-family:'Times New Roman, serif';">
			<b>THIS POWER OF ATTORNEY SHALL TERMINATE UPON MY DISABILITY OR INCAPACITY, OR UPON MY
		EARLIER REVOCATION OR TERMINATION OF THIS POWER.</b>
		</span>
	@endif



	<span style="font-family:'Times New Roman, serif';">My incapacity or
	disability shall be</span><span color="#212121"><span style="font-family:'Times New Roman, serif';">
	</span></span><span style="font-family:'Times New Roman, serif';">determined ONLY
	upon the occasion of the </span><span style="font-family:'Times New Roman, serif';">written
	certification by a physician licensed to practice under the laws of
	the state of my residency, that I am unable to properly care for
	myself or for my person or property.  After a determination of
	incapacity or disability, I shall be deemed to have regained capacity
	by written certification by a physician licensed to practice under
	the laws of the state of my residency that I am capable of properly
	caring for myself or am able to manage my person or property.</span></p>
	<p align="justify" style="margin-bottom: 0in; "><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';"><b>Compensation
	and Reimbursement.  </b></span><span style="font-family:'Times New Roman, serif';">My
	Agent shall not be entitled to compensation for services in handling
	my financial affairs; however, my Agent shall be entitled to
	reimbursement from my assets for reasonable expenses incurred on my
	behalf, upon providing proof of any such expense.</span></p>
	<p align="justify" style="margin-bottom: 0in; "><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';"><b>Reliance
	by Third Parties</b></span><span style="font-family:'Times New Roman, serif';">.  Any
	person, including my agent, may rely upon the validity of this power
	of attorney or a photocopy of it unless that person knows it has
	terminated or is invalid.</span><span color="#000000"><span style="font-family:'Times New Roman, serif';">
	</span></span><span color="#008f00"><span style="font-family:'Times New Roman, serif';">
	</span></span><span style="font-family:'Times New Roman, serif';">I, for myself and
	on behalf of my heirs, successors, and assigns, hereby waive any
	privilege that may attach to information requested by my Agent in the
	exercise of any of the powers described herein, and agree to hold
	harmless any third party who acts in reliance upon this Power for
	damages or liability incurred as a result of that reliance.  My Agent
	is authorized, at the expense of my estate, to seek interpretation
	and/or enforcement of any power granted to my Agent under this
	document from a court of competent jurisdiction. My Agent may seek
	any appropriate legal remedy including, but not limited to,
	declaratory judgments, temporary or permanent injunctions, and actual
	or punitive damages against any person or entity who unreasonably,
	negligently or willfully fails or refuses to follow my Agent's
	instructions with respect to a power granted to my Agent under this
	document.</span></p>
	<p align="justify" style="margin-bottom: 0in; "><br/>

	</p>

	<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';"><b>Ratification</b></span><span style="font-family:'Times New Roman, serif';">.
	I hereby ratify and confirm all that my Agent does or causes to be
	done under the authority granted in this Power. All instruments of
	any sort entered into in any manner by my Agent shall bind me, my
	estate, my heirs, successors, and assigns.</span></p>
	<p align="justify" style="margin-bottom: 0in; "><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';"><b>Agent
	Liability</b></span><span style="font-family:'Times New Roman, serif';">. My Agent
	shall not be liable to me or any of my successors in interest for any
	action taken or not taken in good faith, but shall be liable for
	breach of fiduciary duty.</span></p>
	<p align="justify" style="margin-bottom: 0in; "><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; page-break-before: always"><span style="font-family:'Times New Roman, serif';"><b>Revocation
	and Amendment</b></span><span style="font-family:'Times New Roman, serif';">. I
	revoke all prior General Powers of Attorney and retain the right to
	revoke or amend this document and to substitute other agent in place
	of the Agent appointed herein. Revocations and amendments to this
	document shall be made in writing by me personally (not by my Agent).
	 </span>
	</p>
	<p align="justify" style="margin-bottom: 0in; "><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';"><b>Nomination
	of Guardian/Conservator (OPTIONAL)</b></span><span style="font-family:'Times New Roman, serif';">.</span><span style="font-family:'Times New Roman, serif';"><b>
	</b></span>

	@if(strtolower($state['name']) == 'massachusetts')
		<span style="font-family:'Times New Roman, serif';">Pursuant
		to G.L. c. 190B, §5-503(b), if </span>
	@else
		<span style="font-family:'Times New Roman, serif';">If</span>
	@endif

	<span style="font-family:'Times New Roman, serif';">
	it becomes necessary for a court to appoint a conservator or guardian
	of my estate or guardian of my person, I nominate the following
	person(s) for appointment, who shall serve without bond being
	required, or if required to give bond, shall be exempt from
	furnishing any surety thereon:&nbsp;</span></p>


	<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';"><b>CONSERVATOR OF MY ESTATE:</b></span><span style="font-family:'Times New Roman, serif';">
	</span>
	</p>

	<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';">(SELECT OR OMIT EITHER OPTION
	BELOW, BUT NEVER SELECT BOTH.)</span></p>

	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';"><b>(If you select your
	above-named agent, please INITIAL below.)</b></span></p>
	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';">( _____ ) my Agent (or successor
	Agent) named above&nbsp;</span></p>


	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';"><b>--OR--</b></span></p>


	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';"><b>(If you select someone other
	than your above-named agent, please HANDWRITE your designation
	below.)</b></span></p>


	<p style="margin-left: 1in; margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';">Nominee’s
	name: ______________________________________________________________&nbsp;</span></p>
	<p style="margin-left: 1in; margin-bottom: 0in; "><br/>

	</p>
	<p style="margin-left: 1in; margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';">Nominee’s
	address: _______________________________________________________&nbsp;</span></p>
	<p style="margin-left: 1in; margin-bottom: 0in; "><br/>

	</p>
	<p style="margin-left: 1in; margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';">Nominee’s
	telephone number: __________________________________________&nbsp;</span></p>
	<p style="margin-bottom: 0in; "><br/>

	</p>
	<p align="justify" style="text-indent: 0.5in; margin-bottom: 0in;  page-break-before: always">
	<span style="font-family:'Times New Roman, serif';"><b>GUARDIAN OF MY PERSON:</b></span><span style="font-family:'Times New Roman, serif';">
	</span>
	</p>
	<p align="justify" style="text-indent: 0.5in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';">(SELECT OR OMIT EITHER OPTION
	BELOW, BUT NEVER SELECT BOTH.)</span></p>

	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';"><b>(If you select your
	above-named agent, please INITIAL below.)</b></span><span style="font-family:'Times New Roman, serif';">&nbsp;</span></p>
	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';">( _____ ) my Agent (or successor
	Agent) named above&nbsp;</span></p>

	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';"><b>--OR--</b></span></p>

	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; ">
	<span style="font-family:'Times New Roman, serif';"><b>(If you select someone other
	than your above-named agent, please HANDWRITE your designation
	below.)</b></span></p>
	<p style="margin-left: 1in; margin-bottom: 0in; "><br/>

	</p>
	<p style="margin-left: 1in; margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';">Nominee’s
	name:
	_______________________________________________________________&nbsp;</span></p>
	<p style="margin-left: 1in; margin-bottom: 0in; "><br/>

	</p>
	<p style="margin-left: 1in; margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';">Nominee’s
	address: ______________________________________________________&nbsp;</span></p>
	<p style="margin-left: 1in; margin-bottom: 0in; "><br/>

	</p>


	<p style="margin-left: 1in; margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';">Nominee’s
	telephone number: __________________________________________&nbsp;</span></p>
	<p align="justify" style="margin-bottom: 0in; "><br/>

	</p>

	<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';"><b>Severability</b></span><span style="font-family:'Times New Roman, serif';">.
	If any of the provisions of this Power are found to be invalid for
	any reason, such invalidity shall not affect any of the other
	provisions of this Power, and all invalid provisions shall be wholly
	disregarded.</span></p>

	<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';"><b>Governing
	Law</b></span><span style="font-family:'Times New Roman, serif';">. All questions
	pertaining to validity, interpretation, and administration of this
	Power shall be determined in accordance with the laws of the </span>

	<span color="#008f00">
		<span style="font-family:'Times New Roman, serif';"></span>

	</span>
	@if(strtolower($state['name']) == 'massachusetts' && strtolower($state['name']) == 'kentucky')

	<span style="font-family:'Times New Roman, serif';">Commonwealth
	of </span>

	@else

	<span style="font-family:'Times New Roman, serif';">State
	of </span>

	@endif
	<span color="#0433ff">
		<span style="font-family:'Times New Roman, serif';">{{$state['name']}}.</span>
	</span>
	</p>


	<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';"><b>Principal
	Acknowledgement</b></span><span style="font-family:'Times New Roman, serif';">. This
	Power is a legal document that I have prepared myself or that was
	prepared by another acting under my direction, and I understand and
	acknowledge that this document provides my Agent with broad powers to
	dispose of, sell, convey, and encumber my real and personal property;
	the powers granted in this Power will exist for an indefinite period
	of time unless I limit their duration by the terms of this Power or
	revoke this Power</span>

	@if(array_key_exists('isDurable', $attorneyPowers) && $attorneyPowers['isDurable'] == 1)

	<span style="font-family:'Times New Roman, serif';">, and will
	continue to exist notwithstanding my subsequent disability or
	incapacity</span>

	@endif

	<span style="font-family:'Times New Roman, serif';">; and I have
	the right to revoke or terminate this Power at any time and must do
	so in writing.&nbsp;</span>
	</p>
	<br><br>



	<p align="center" style="margin-bottom: 0in; page-break-before: always">
	<span style="font-family:'Times New Roman, serif';"><b>SIGNATURE AND ACKNOWLEDGMENT</b></span></p>



	@if(strtolower($state['name']) == 'massachusetts')

		<p align="justify" style="margin-bottom: 0.05in;  orphans: 0; widows: 0">
		<span style="font-family:'Times New Roman, serif';">IN WITNESS WHEREOF, I, {{strtoupper($tellUsAboutYou['fullname'])}},</span>

		<span style="font-family:'Times New Roman, serif';">
		the principal, sign my name to this instrument on this </span>
		<span style="font-family:'Times New Roman, serif';">_________________________</span>
		<span style="font-family:'Times New Roman, serif';">
		day of </span>
		</p>


		<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';">___________________________</span><span style="font-family:'Times New Roman, serif';">,
		</span><span style="font-family:'Times New Roman, serif';">_________________________</span><span style="font-family:'Times New Roman, serif';">,
		and being first duly sworn, do hereby declare to the undersigned
		authority and below-named witnesses that I sign and execute this
		instrument as my Power of Attorney, that I execute it as my free and
		voluntary act for the purposes expressed herein and that I am
		eighteen years of age or older, of sound mind and under no constraint
		or undue influence.&nbsp;</span></p>



		<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';">______________________________________</span></p>
		<p align="justify" style="margin-bottom: 0.08in;  orphans: 0; widows: 0">

		<span color="#0000ff">
			<span style="font-family:'Times New Roman, serif';">
				<b>{{strtoupper($tellUsAboutYou['fullname'])}}</b>
			</span>
		</span>

		<span style="font-family:'Times New Roman, serif';">,
		Principal</span></p>
		<p align="justify" style="margin-top: 0.04in; margin-bottom: 0in; ">


		<span color="#0433ff">
			<span style="font-family:'Times New Roman, serif';">{{$tellUsAboutYou['address']}},</span>
		</span>
		</p>

		<p align="justify" style="margin-bottom: 0in; ">

			<span color="#0433ff">
				<span style="font-family:'Times New Roman, serif';">{{ucwords(strtolower($tellUsAboutYou['city']))}}</span>
			</span>

			<span color="#0433ff">
				<span style="font-family:'Times New Roman, serif';"> {{ucwords(strtolower($tellUsAboutYou['state']))}}</span>
			</span>

			<span color="#0433ff">
				<span style="font-family:'Times New Roman, serif';"> {{ucwords($tellUsAboutYou['zip'])}}</span>
			</span>

		</p>



		<p align="justify" style="margin-bottom: 0.08in;">
		<span style="font-family:'Times New Roman, serif';">We, the witnesses who sign below,
		each declare in the presence of </span>

		<span style="font-family:'Times New Roman, serif';"></span>

		<span color="#0000ff">
			<span style="font-family:'Times New Roman, serif';">{{strtoupper($tellUsAboutYou['fullname'])}},</span>
		</span>

		<span style="font-family:'Times New Roman, serif';">
		that </span>
		<span color="#0433ff">
			<span style="font-family:'Times New Roman, serif';">{{$genderTxt3}}</span>
		</span>

		<span style="font-family:'Times New Roman, serif';">
		signed this instrument as </span>

		<span color="#0433ff">
			<span style="font-family:'Times New Roman, serif';">{{$genderTxt4}}</span>
		</span>
		<span style="font-family:'Times New Roman, serif';">
		Durable Power of Attorney in the presence of each of us, that </span>
		<span color="#0433ff">
			<span style="font-family:'Times New Roman, serif';">{{$genderTxt3}}</span>
		</span>

		<span style="font-family:'Times New Roman, serif';">
		signed it willingly, that each of us signs this Durable Power of
		Attorney as witness in the presence of </span>

		<span color="#0000ff">
			<span style="font-family:'Times New Roman, serif';">{{strtoupper($tellUsAboutYou['fullname'])}},</span>
		</span>

		<span style="font-family:'Times New Roman, serif';">
		and that to the best of our knowledge </span>

		<span color="#0433ff">
			<span style="font-family:'Times New Roman, serif';">{{$genderTxt3}}</span>
		</span>

		<span style="font-family:'Times New Roman, serif';">
		is eighteen (18) years of age or over, of sound mind and under no
		constraint or undue influence.</span>
		</p>



		<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';">______________________________</span><span style="font-family:'Times New Roman, serif';">		</span><span style="font-family:'Times New Roman, serif';">_____________________________</span><span style="font-family:'Times New Roman, serif';">	</span></p>
		<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';"><b>(WITNESS
		1)</b></span><span style="font-family:'Times New Roman, serif';">						</span><span style="font-family:'Times New Roman, serif';"><b>(WITNESS
		2)</b></span></p>
		<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';">NAME:							NAME:</span></p>
		<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';">ADDRESS:						ADDRESS:</span></p>
		<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';">CITY/STATE:						CITY/STATE:</span></p>
		<p align="justify" style="margin-bottom: 0in; "><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; "><span color="#000000"><span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">Commonwealth
		of Massachusetts </span></span></span>
		</p>
		<p align="justify" style="margin-bottom: 0in; "><span color="#000000"><span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">County
		of ___________ </span></span></span>
		</p>

		<p align="justify" style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
		<span color="#000000"><span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">On
		this </span></span></span><span color="#000000"><span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">______________________________</span></span></span><span color="#000000"><span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">
		day of </span></span></span><span color="#000000"><span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">____________________________</span></span></span><span color="#000000"><span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">,
		</span></span></span><span color="#000000"><span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">____________________________</span></span></span><span color="#000000"><span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">,
		before me, the undersigned notary public, personally appeared </span></span></span>

		<span color="#0000ff">
			<span style="font-family:'Times New Roman, serif';">
				<span size="2" style="font-size: 9pt">{{strtoupper($tellUsAboutYou['fullname'])}}</span>
			</span>
		</span>


		<span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">,
		as principal, and </span></span><span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">___________________________</span></span><span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">
		and </span></span><span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">______________________________</span></span><span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">
		as witnesses, who each </span></span><span color="#000000"><span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">proved
		to me through satisfactory evidence of identification to be the
		persons whose names are signed on the preceding or attached document,
		and acknowledged to me that they each signed it voluntarily for its
		stated purpose. </span></span></span>
		</p>
		<p align="justify" style="margin-bottom: 0in; "><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; "><span color="#000000"><span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">(seal)
		</span></span></span><span color="#000000"><span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">____________________________</span></span></span></p>
		<p align="justify" style="text-indent: 0.5in; margin-bottom: 0in; ">
		<span color="#000000"><span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">Notary
		Public </span></span></span>
		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 115%"><span style="font-family:'Times New Roman, serif';"><span color="#000000"><span size="2" style="font-size: 9pt">My
		commission expires: _________________</span></span></span></p>


	@elseif(strtolower($state['name']) == 'arizona')

		<p align="justify" style="margin-bottom: 0in; "><br/>

		</p>

		<p align="justify" style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
		<span style="font-family:'Times New Roman, serif';">I, </span>
		<span color="#0000ff">
			<span style="font-family:'Times New Roman, serif';">{{strtoupper($tellUsAboutYou['fullname'])}},</span>
		</span>

		<span style="font-family:'Times New Roman, serif';">
		the principal, sign my name to this power of attorney this </span><span style="font-family:'Times New Roman, serif';">________________________________</span><span style="font-family:'Times New Roman, serif';">
		day of </span><span style="font-family:'Times New Roman, serif';">________________________</span><span style="font-family:'Times New Roman, serif';">,
		</span><span style="font-family:'Times New Roman, serif';">_______________________________</span><span style="font-family:'Times New Roman, serif';">
		and, being first duly sworn, do declare to the undersigned authority
		that I sign and execute this instrument as my power of attorney and
		that I sign it willingly, or willingly direct another to sign for me,
		that I execute it as my free and voluntary act for the purposes
		expressed in the power of attorney and that I am eighteen years of
		age or older, of sound mind and under no constraint or undue
		influence.</span>
		</p>
		<p align="justify" style="margin-bottom: 0in; "><br/>

		</p>



		<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';"><u>______________________</u></span></p>
		<p align="justify" style="margin-bottom: 0.08in;  orphans: 0; widows: 0">


		<span color="#0000ff">
			<span style="font-family:'Times New Roman, serif';">{{strtoupper($tellUsAboutYou['fullname'])}},</span>
		</span>

		<span style="font-family:'Times New Roman, serif';">
		Principal</span></p>
		<p align="justify" style="margin-top: 0.04in; margin-bottom: 0in; ">


		<span color="#0433ff">
			<span style="font-family:'Times New Roman, serif';">{{$tellUsAboutYou['address']}}</span>
		</span>

		</p>

		<p align="justify" style="margin-bottom: 0in; ">
			<span color="#000000">
				<span style="font-family:'Times New Roman, serif';"></span>
			</span>
			<span color="#0433ff">
				<span style="font-family:'Times New Roman, serif';">{{ucwords(strtolower($tellUsAboutYou['city']))}},</span>
			</span>

			<span color="#0433ff">
				<span style="font-family:'Times New Roman, serif';">{{ucwords(strtolower($tellUsAboutYou['state']))}}</span>
			</span>

			<span color="#0433ff">
				<span style="font-family:'Times New Roman, serif';"> {{ucwords(strtolower($tellUsAboutYou['zip']))}}</span>
			</span>

			<span color="#000000">
				<span style="font-family:'Times New Roman, serif';"></span>
			</span>
		</p>

		<p align="justify" style="margin-bottom: 0in; "><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; "><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; "><br/>

		</p>

		<p align="justify" style="margin-bottom: 0in; ">

			<span style="font-family:'Times New Roman, serif';">I, </span>

			<span style="font-family:'Times New Roman, serif';">_______________________</span>
			<span style="font-family:'Times New Roman, serif';">,
			the witness, sign my name to the foregoing power of attorney being
			first duly sworn and do declare to the undersigned authority that the
			principal signs and executes this instrument as the principal’s
			power of attorney and that the principal signs it willingly, or
			willingly directs another to sign for the principal, and that I, in
			the presence and hearing of the principal, sign this power of
			attorney as witness to the principal’s signing and that to the best
			of my knowledge the principal is eighteen years of age or older, of
			sound mind and under no constraint or undue influence.</span></p>
			<p align="justify" style="margin-bottom: 0in; "><br/>

			</p>


			<p align="justify" style="margin-bottom: 0in; "><br/>

			</p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif';"><span>_____________________________</span></span><span style="font-family:'Times New Roman, serif';"> &nbsp;&nbsp;&nbsp;&nbsp; </span><span style="font-family:'Times New Roman, serif';"><span>________________</span></span></p>
      <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif';">Witness
      (Signature) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Street Address</span></p>
      <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

      </p>
      <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif';"><span>_____________________________</span></span><span style="font-family:'Times New Roman, serif';"> &nbsp;&nbsp;&nbsp;&nbsp;	</span><span style="font-family:'Times New Roman, serif';"><span>________________</span></span></p>
      <p align="justify" style="margin-bottom: 0in; line-height: 100%"><span style="font-family:'Times New Roman, serif';">Print
      Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; City, State, Zip</span></p>
      <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

      </p>
			<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">The
			state of Arizona</span></span></p>
			<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">County
			of _________________</span></span></p>
			<p align="justify" style="margin-bottom: 0in; "><br/>

			</p>

			<p align="justify" style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
			<span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">Subscribed,
			sworn to and acknowledged before me by </span></span>

			<span color="#0000ff">
				<span style="font-family:'Times New Roman, serif';">
					<span size="2" style="font-size: 9pt">{{strtoupper($tellUsAboutYou['fullname'])}},</span>
				</span>
			</span>

			<span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">
			the principal, and subscribed and sworn to before me by </span></span>
			</p>

			<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">_________________________________</span></span><span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">,
			witness, this </span></span><span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">__________________________________</span></span><span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">
			day of </span></span><span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">_____________________________</span></span><span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">,
			</span></span><span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">______________________________</span></span><span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">.</span></span></p>
			<p align="justify" style="margin-bottom: 0in; "><br/>

			</p>
			<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">(seal)</span></span></p>
			<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">(signed)
			___________________________________________________</span></span></p>
			<p align="justify" style="text-indent: 0.5in; margin-bottom: 0in; ">
			<span style="font-family:'Times New Roman, serif';"><span size="2" style="font-size: 9pt">(notary
			public)</span></span></p>
			<p align="justify" style="margin-bottom: 0in; "><br/>

			</p>
			<p align="justify" style="margin-bottom: 0in; line-height: 115%"><br/>

			</p>
			<p align="justify" style="margin-bottom: 0in; line-height: 115%"><span style="font-family:'Times New Roman, serif';"><span color="#000000"><span size="2" style="font-size: 9pt">My
			commission expires: _________________</span></span></span></p>


	@else

		<p align="justify" style="margin-bottom: 0in; "><br/>

		</p>


		<p align="justify" style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
		<span style="font-family:'Times New Roman, serif';">I, </span>



		<span color="#0000ff">
			<span style="font-family:'Times New Roman, serif';">{{strtoupper($tellUsAboutYou['fullname'])}},</span>
		</span>

		<span style="font-family:'Times New Roman, serif';">
		the principal, sign my name to this power of attorney and do hereby
		declare to the undersigned witnesses that I sign and execute this
		instrument as my Power of Attorney and that I sign it willingly (or
		willingly direct another to sign for me), that I execute it as my
		free and voluntary act for the purposes therein expressed, and that I
		am of legal age, of sound mind, and under no constraint or undue
		influence.&nbsp;</span>
		</p>
		<p align="justify" style="margin-bottom: 0in; "><br/>

		</p>

		<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';">_____________________</span><span style="font-family:'Times New Roman, serif'; padding-left: 200px">		</span><span style="font-family:'Times New Roman, serif'; "><b>DATE:
		</b></span><span style="font-family:'Times New Roman, serif';">______________________</span><span style="font-family:'Times New Roman, serif';">
		</span>
		</p>

		<p align="justify" style="margin-bottom: 0.08in;  orphans: 0; widows: 0">

		<span color="#0000ff">
			<span style="font-family:'Times New Roman, serif';">
				<b>{{strtoupper($tellUsAboutYou['fullname'])}}</b>
			</span>
		</span>

		</p>

		<p align="justify" style="margin-bottom: 0in; ">
			<span color="#0432ff">
				<span style="font-family:'Times New Roman, serif';">{{$tellUsAboutYou['address']}}</span>
			</span>
		</p>

		<p align="justify" style="margin-bottom: 0in; ">

			<span color="#0432ff">
				<span style="font-family:'Times New Roman, serif';">{{ucwords(strtolower($tellUsAboutYou['city']))}}</span>
			</span>

		<span color="#0432ff">
			<span style="font-family:'Times New Roman, serif';">{{ucwords(strtolower($tellUsAboutYou['state']))}}</span>
		</span>

		<span color="#0432ff">
			<span style="font-family:'Times New Roman, serif';">{{$tellUsAboutYou['zip']}}</span>
		</span>

		<span style="font-family:'Times New Roman, serif';"></span>

		</p>


		<p align="justify" style="margin-bottom: 0in;">
			<span color="#0432ff">
				<span style="font-family:'Times New Roman, serif';">{{$tellUsAboutYou['phone']}}</span>
			</span>
		</p>



		<p align="justify" style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
		<span style="font-family:'Times New Roman, serif';">We, the witnesses, sign our names
		to this instrument, and at least one of us, being first duly sworn,
		do hereby declare that </span>

		<span color="#0000ff">
			<span style="font-family:'Times New Roman, serif';">{{strtoupper($tellUsAboutYou['fullname'])}},</span>
		</span>

		<span style="font-family:'Times New Roman, serif';">
		the principal, signs and executes this instrument as </span>

		<span color="#0433ff">
			<span style="font-family:'Times New Roman, serif';">{{$genderTxt4}}</span>
		</span>

		<span style="font-family:'Times New Roman, serif';">
		Power of Attorney and that the principal signs it willingly (or
		willingly directs another to sign for </span>

		<span color="#0433ff">
			<span style="font-family:'Times New Roman, serif';">{{$genderTxt4}}</span>
		</span>

		<span style="font-family:'Times New Roman, serif';">,
		and that each of us, in the presence and hearing of the principal,
		hereby signs this instrument as witness to the principal’s signing,
		and that to the best of our knowledge the principal is of legal age,
		of sound mind, and under no constraint or undue influence.&nbsp;</span>
		</p>

		<p align="justify" style="margin-bottom: 0in; "><br/>

		</p>


		<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';">________________________</span><span style="font-family:'Times New Roman, serif';">		</span><span style="font-family:'Times New Roman, serif'; padding-left: 200px;">__________________________</span><span style="font-family:'Times New Roman, serif';">	</span></p>
		<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';"><b>(WITNESS
		1)</b></span><span style="font-family:'Times New Roman, serif';">						</span><span style="font-family:'Times New Roman, serif'; padding-left: 300px; display: inline-block;"><b> (WITNESS
		2)</b></span></p>
		<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';">NAME:_____________________<span style="padding-left: 170px; display: inline-block;"></span>NAME:______________________</span></p>
		<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';">ADDRESS:______________________<span style="padding-left: 135px; display: inline-block;"></span>ADDRESS:________________________</span></p>
		<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';">CITY/STATE:________________________<span style="padding-left: 100px; display: inline-block;"></span>CITY/STATE:________________________	</span></p>
		<p style="margin-bottom: 0in; "><br/>

		</p>
		<p style="margin-bottom: 0in; "><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 115%; page-break-before: always">
		<span style="font-family:'Times New Roman, serif';"><span color="#000000">STATE OF
		&nbsp;________________</span><span color="#000000">		</span><span color="#000000">)</span></span></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 115%"><span style="font-family:'Times New Roman, serif';"><span color="#000000">					</span><span color="#000000">)
		ss. </span></span>
		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 115%"><span style="font-family:'Times New Roman, serif';"><span color="#000000">COUNTY
		OF ________________</span><span color="#000000">		</span><span color="#000000">)</span></span></p>
		<p style="margin-bottom: 0in; line-height: 115%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0.08in;  orphans: 0; widows: 0">

		<span color="#000000"><span style="font-family:'Times New Roman, serif';">Subscribed,
		sworn and acknowledged before me by </span></span>

		<span color="#0000ff">
			<span style="font-family:'Times New Roman, serif';">{{strtoupper($tellUsAboutYou['fullname'])}},</span>
		</span>

		<span color="#000000"><span style="font-family:'Times New Roman, serif';">
		the principal, and _________________________________________, as
		witness, and _____________________________________, as witness, who
		personally appeared on this &nbsp;_________ day of
		&nbsp;________________________________, _______, and who are
		personally known to me or who have produced satisfactory photo
		identification, and whose names are signed to the foregoing
		instrument,</span></span>

		<span style="font-family:'Times New Roman, serif';"> </span>

		<span color="#000000"><span style="font-family:'Times New Roman, serif';">and,
		all of said persons being by me first duly sworn, the principal
		declared to me and to the said witnesses in my presence that the
		instrument is </span></span>

		<span color="#0432ff">
			<span style="font-family:'Times New Roman, serif';">{{$genderTxt4}}</span>
		</span>

		<span color="#000000"><span style="font-family:'Times New Roman, serif';">
		Power of Attorney, and that the principal has willingly and
		voluntarily made and executed it as </span>
		</span>

		<span color="#0432ff"><span style="font-family:'Times New Roman, serif';">{{$genderTxt4}}</span></span>

		<span color="#000000"><span style="font-family:'Times New Roman, serif';">
		free act and deed for the purposes therein expressed, and the
		witnesses declared to me that they were each eighteen (18) years of
		age or over, and that neither of them is related to the principal by
		blood or marriage, or related to the attorney-in-fact by blood or
		marriage.</span></span>
		</p>

		<p style="margin-bottom: 0in; line-height: 115%"><br/>

		</p>


		<p align="justify" style="margin-bottom: 0in; line-height: 115%"><span style="font-family:'Times New Roman, serif';"><span color="#000000">______________________________________
		 </span>(Seal)</span></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 115%"><span style="font-family:'Times New Roman, serif';"><span color="#000000">NOTARY
		PUBLIC</span></span></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 115%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 115%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 115%"><span style="font-family:'Times New Roman, serif';"><span color="#000000">My
		commission expires: _________________</span></span></p>
		<p align="justify" style="margin-bottom: 0in; "><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; "><br/>

		</p>


	@endif


		<p align="center" style="margin-bottom: 0in;  page-break-before: always">
		<span style="font-family:'Times New Roman, serif';"><b>NOTICE TO AGENT&nbsp;</b></span></p>

		<p align="justify" style="margin-bottom: 0.09in; "><span style="font-family:'Times New Roman, serif';">When
		you accept the authority granted under this power of attorney a
		special legal relationship, known as agency, is created between you
		and the principal. Agency imposes upon you duties that continue until
		you resign or the power of attorney is terminated or revoked.</span></p>
		<p align="justify" style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif';">As
		agent you must:</span></p>
		<p align="justify" style="margin-left: 0.5in; margin-bottom: 0.06in; ">
		<span style="font-family:'Times New Roman, serif';">(1) do what you know the
		principal reasonably expects you to do with the principal's property;</span></p>
		<p align="justify" style="margin-left: 0.5in; margin-bottom: 0.06in; ">
		<span style="font-family:'Times New Roman, serif';">(2) act in good faith for the
		best interest of the principal, using due care, competence, and
		diligence;</span></p>
		<p align="justify" style="margin-left: 0.5in; margin-bottom: 0.06in; ">
		<span style="font-family:'Times New Roman, serif';">(3) keep a complete and detailed
		record of all receipts, disbursements, and significant actions
		conducted for the principal;</span></p>
		<p align="justify" style="margin-left: 0.5in; margin-bottom: 0.06in; ">
		<span style="font-family:'Times New Roman, serif';">(4) attempt to preserve the
		principal's estate plan, to the extent actually known by the agent,
		if preserving the plan is consistent with the principal's best
		interest; and,</span></p>
		<p align="justify" style="margin-left: 0.5in; margin-bottom: 0.09in; ">
		<span style="font-family:'Times New Roman, serif';">(5) cooperate with a person who
		has authority to make health care decisions for the principal to
		carry out the principal's reasonable expectations to the extent
		actually in the principal's best interest.&nbsp;</span></p>
		<p align="justify" style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif';">As
		agent you must not do any of the following:</span></p>
		<p align="justify" style="margin-left: 0.5in; margin-bottom: 0.06in; ">
		<span style="font-family:'Times New Roman, serif';">(1) act so as to create a
		conflict of interest that is inconsistent with the other principles
		in this Notice to Agent;</span></p>
		<p align="justify" style="margin-left: 0.5in; margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif';">	(2)
		do any act beyond the authority granted in this power of attorney;</span></p>
		<p align="justify" style="margin-left: 0.5in; margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif';">	(3)
		commingle the principal's funds with your funds;</span></p>
		<p align="justify" style="margin-left: 0.5in; margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif';">	(4)
		borrow funds or other property from the principal, unless otherwise
		authorized; or,</span></p>
		<p align="justify" style="margin-left: 0.5in; margin-bottom: 0.09in; ">
		<span style="font-family:'Times New Roman, serif';">(5) continue acting on behalf of
		the principal if you learn of any event that terminates this power of
		attorney or your authority under this power of attorney, such as the
		death of the principal, your legal separation from the principal, or
		the dissolution of your marriage to the principal.</span></p>
		<p align="justify" style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif';">If
		you have special skills or expertise, you must use those special
		skills and expertise when acting for the principal. You must disclose
		your identity as an agent whenever you act for the principal by
		writing or printing the name of the principal and signing your own
		name &quot;as Agent&quot; in the following manner:</span></p>


		<p align="justify" style="margin-left: 0.5in; margin-bottom: 0.08in;  orphans: 0; widows: 0">
		“<span color="#0000ff">
			<span style="font-family:'Times New Roman, serif';">{{strtoupper($tellUsAboutYou['fullname'])}}</span>
		</span>

		<span style="font-family:'Times New Roman, serif';">by
		(Your Name) as Agent”</span></p>
		{{--<p align="justify" style="margin-bottom: 0.09in; "><span style="font-family:'Times New Roman, serif';">The
		meaning of the powers granted to you is contained in Section 3&#8209;4
		of the Illinois Power of Attorney Act, which is incorporated by
		reference into the body of the power of attorney for property
		document.</span></p>--}}
		<p align="justify" style="margin-bottom: 0.09in; "><span style="font-family:'Times New Roman, serif';">If
		you violate your duties as agent or act outside the authority granted
		to you, you may be liable for any damages, including attorney's fees
		and costs, caused by your violation.</span></p>
		<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';">If
		there is anything about this document or your duties that you do not
		understand, you should seek legal advice from an attorney.</span></p>
		<p style="margin-bottom: 0in; "><br/>

		</p>
		<p align="center" style="margin-bottom: 0.13in; "><span style="font-family:'Times New Roman, serif';"><b>AGENT'S
		CERTIFICATION AND ACCEPTANCE OF AUTHORITY&nbsp;</b></span></p>
		<p align="justify" style="margin-bottom: 0.08in;  orphans: 0; widows: 0">
		<span style="font-family:'Times New Roman, serif';">I,
		__________________________________, certify that the attached is a
		true copy of a power of attorney naming the undersigned as agent or
		successor agent for </span>

		<span color="#0000ff">
			<span style="font-family:'Times New Roman, serif';">{{strtoupper($tellUsAboutYou['fullname'])}}</span>
		</span>

		<span style="font-family:'Times New Roman, serif';">.</span></p>

		<p style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif';">I
		certify that to the best of my knowledge the principal had the
		capacity to execute the power of attorney, is alive, and has not
		revoked the power of attorney; that my powers as agent have not been
		altered or terminated; and that the power of attorney remains in full
		force and effect.</span></p>
		<p align="justify" style="margin-bottom: 0.06in; "><br/>
		<br/>

		</p>
		<p align="justify" style="margin-bottom: 0.06in; "><span style="font-family:'Times New Roman, serif';">If
		I am a successor agent, I certify that to the best of my knowledge
		_______________________ is unavailable due to
		____________________________________________________________.</span></p>
		<p align="justify" style="margin-bottom: 0in; "><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';">I
		accept appointment as agent under this power of attorney.</span></p>
		<p align="justify" style="margin-bottom: 0in; "><br/>

		</p>

		<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';">This
		certification and acceptance is made under penalty of perjury.</span></p>
		<p align="justify" style="margin-bottom: 0in; "><br/>

		</p>

		<p align="justify" style="margin-bottom: 0in; "><a name="_GoBack"></a>
		<span style="font-family:'Times New Roman, serif';">Dated: ______________________</span></p>
		<p align="justify" style="margin-bottom: 0in; "><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';">	______________________________________</span></p>
		<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';">	(Agent's
		Signature)</span></p>
		<p align="justify" style="margin-bottom: 0in; "><br/>

		</p>

		<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';">	______________________________________</span></p>
		<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';">	(Print
		Agent's Name)</span></p>
		<p align="justify" style="margin-bottom: 0in; "><br/>

		</p>

		<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';">	______________________________________</span></p>
		<p align="justify" style="margin-bottom: 0in; "><span style="font-family:'Times New Roman, serif';">	(Agent's
		Address)</span></p>


</body>


</html>
