<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>


<body lang="en-US" dir="ltr">
<p align="center" style="margin-bottom: 0.06in; line-height: 100%">
	
		@if($attorneyPowers['isDurable'] == 1)

		<font face="Times New Roman, serif">
			<font size="4" style="font-size: 13pt">»</font>
		</font>

		<font face="Times New Roman, serif">
			<font size="4" style="font-size: 13pt">
				<b>DURABLE</b>
			</font>
		</font>

		<font face="Times New Roman, serif">
			<font size="4" style="font-size: 13pt">«</font>
		</font>

		@endif

		<font face="Times New Roman, serif">
			<font size="4" style="font-size: 13pt">»</font>
		</font>

		<font face="Times New Roman, serif">
			<font size="4" style="font-size: 13pt"><b>
				POWER OF ATTORNEY FOR MANAGEMENT OF FINANCES, PROPERTY, AND PERSONAL
				AFFAIRS</b>
			</font>
		</font>
	</p>



	@if(strtolower($state['name']) == 'massachusetts')


	<p align="center" style="margin-top: 0.06in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif"><b>(Pursuant to Chapter 190B of
	the Massachusetts General Laws)</b></font></p>
	
	@endif
	
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>


	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">I, </font>

	

	<font color="#0000ff">
		<font face="Times New Roman, serif">
			<b>{{strtoupper($tellUsAboutYou['fullname'])}}</b>
		</font>
	</font>

	<font face="Times New Roman, serif">, of </font>

	<font color="#0433ff">
		<font face="Times New Roman, serif">{{$tellUsAboutYou['address']}}</font>
	</font>

	<font face="Times New Roman, serif">, </font>

	<font color="#0433ff">
		<font face="Times New Roman, serif">{{ucwords($tellUsAboutYou['city'])}}</font>
	</font>

	<font face="Times New Roman, serif">, </font>

	<font color="#0433ff">
		<font face="Times New Roman, serif">{{ucwords($tellUsAboutYou['state'])}}</font>
	</font>

	<font face="Times New Roman, serif"> , intend to create a </font>

	@if($attorneyPowers['isDurable'] == 1)

	<font face="Times New Roman, serif"> Durable </font>

	@endif
	
	<font face="Times New Roman, serif"> Power of
	Attorney (herein referred to as “this Power”).</font>

	@if($attorneyPowers['isDurable'] == 1)

	<font face="Times New Roman, serif">»THIS IS A
	DURABLE POWER OF ATTORNEY AND THE AUTHORITY OF MY AGENT
	(“ATTORNEY-IN-FACT”) SHALL NOT TERMINATE IF I BECOME DISABLED OR
	INCAPACITATED OR IN THE EVENT OF LATER UNCERTAINTY AS TO WHETHER I AM
	DEAD OR ALIVE. IT SHALL ALSO NOT BE AFFECTED BY LAPSE OF TIME. </font>

	@endif
	
	</p>
	

	<p align="center" style="margin-top: 0.02in; margin-bottom: 0.05in; line-height: 100%">
	<font face="Times New Roman, serif"><b>Important Information</b></font></p>
	<p align="justify" style="margin-top: 0.02in; margin-bottom: 0.05in; line-height: 100%">
	<font face="Times New Roman, serif"><b>THIS IS AN IMPORTANT LEGAL
	DOCUMENT. BY SIGNING THE </b></font>

	

	@if($attorneyPowers['isDurable'] == 1)

	<font face="Times New Roman, serif">
		<b>DURABLE</b>
	</font>

	@endif

	<font face="Times New Roman, serif"><b>POWER
	OF ATTORNEY, YOU ARE AUTHORIZING ANOTHER PERSON TO ACT FOR YOU, THE
	PRINCIPAL.&nbsp; BEFORE YOU SIGN THIS </b></font>

	@if($attorneyPowers['isDurable'] == 1)
		<font face="Times New Roman, serif">
			<b>DURABLE </b>
		</font>
	@endif

	<font face="Times New Roman, serif">
		<b>POWER OF ATTORNEY, YOU SHOULD KNOW THESE IMPORTANT FACTS:</b>
	</font>
	</p>
	<p align="justify" style="margin-top: 0.02in; margin-bottom: 0.05in; line-height: 100%">
	<br/>
	<br/>

	</p>


	<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">(1) 	This power of attorney
	grants broad authority to another person (your agent) to make
	decisions concerning your property for you (the principal). Your
	agent will be able to make decisions and act with respect to your
	property (including your money) whether or not you are able to act
	for yourself. </font>
	</p>
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
	<br/>

	</p>


	<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">(2) 	This power of attorney does
	not authorize the agent to make health care decisions for you.</font></p>
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
	<br/>

	</p>


	<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">(3) 	Your agent
	(attorney-in-fact) has no duty to act unless you and your agent agree
	otherwise in writing.</font></p>


	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
	<br/>

	</p>


	<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">(4) 	This document does not give
	your agent the power to accept or receive any of your property, in
	trust or otherwise, as a gift, unless you specifically authorize the
	agent to accept or receive a gift.</font></p>


	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
	<br/>

	</p>


	<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">(5) 	You should select someone
	you trust to serve as your agent. Unless you specify otherwise,
	generally the agent's authority will continue until you die or revoke
	the power of attorney or the agent resigns or is unable to act for
	you.</font></p>
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
	<br/>

	</p>



	<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">(6) 	Your agent is entitled to
	reasonable compensation unless you state otherwise in the Special
	Instructions.</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>


	<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">(7) 	This form provides for
	designation of one agent.&nbsp; If your agent is unable or unwilling
	to act for you, your power of attorney will end unless you have named
	a successor agent.&nbsp;</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>


	<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">(8) 	This power of attorney
	becomes effective immediately unless you state otherwise herein.</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">(9) 	You can amend or change this
	</font>
	
	@if($attorneyPowers['isDurable'] == 1)
		<font face="Times New Roman, serif">durable </font>
	@endif

	<font face="Times New Roman, serif"> Power of
	Attorney only by executing a new Power of Attorney or by executing an
	amendment through the same formalities as an original.&nbsp;</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	

	<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">(10) 	You have the right to
	revoke or terminate this Power of Attorney at any time, so long as
	you are competent.&nbsp; This power of attorney may be revoked by you
	at any time. You can revoke it in writing, by telling your agent, or
	by tearing it up or crossing it out or any other act that shows you
	want it revoked. Tell your agent that you are revoking the power of
	attorney. You should also tell your bank and other financial
	institutions.</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	
	<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">(11) 	Pay careful attention to
	the signing instructions within the document.  Be certain to sign,
	date, and acknowledge this power of attorney before a notary public
	and the required number of witnesses.  The document may also require
	your agent’s signature, or your initials to confirm your election
	in certain provisions.</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	
	<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">(12) 	If you elect to grant
	powers over real property, this Power of Attorney may require
	recordation in the land records where the property is located.</font></p>
	<p align="justify" style="text-indent: 0.38in; margin-bottom: 0in; line-height: 100%">
	<br/>

	</p>



	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>You
	should read this </b></font>

	@if($attorneyPowers['isDurable'] == 1)
	<font face="Times New Roman, serif">
		<b>durable </b>
	</font>
	@endif

	<font face="Times New Roman, serif">
		<b>Power of
	Attorney carefully. When effective, this «</b></font>

	@if($attorneyPowers['isDurable'] == 1)
	<font face="Times New Roman, serif">
		<b>Durable </b>
	</font>
	@endif


	<font face="Times New Roman, serif">
		<b>Power of
	Attorney will give your agent the right to deal with property that
	you now have or might acquire in the future. If you have questions
	about this document or the authority you are granting to your agent,
	or if you do not understand this Power of Attorney or any provision
	of it, you should seek legal advice before signing this form.</b>
	</font>
	</p>


	<p align="center" style="margin-top: 0.13in; margin-bottom: 0.13in; line-height: 100%">
	<font face="Times New Roman, serif">
		<b>I.	APPOINTMENT OF AGENT</b>
	</font>
	</p>
	
	<p align="justify" style="margin-bottom: 0in; line-height: 100%">
		<font color="#000000"><font face="Times New Roman, serif"><b>Designation
	of Agent</b></font></font><font color="#000000"><font face="Times New Roman, serif">.
	I hereby designate and appoint </font></font><font color="#000000"><font face="Times New Roman, serif">my</font></font>

	<font color="#0433ff">	
		@if(strtolower($attorneyHolders['relationship']) == 'other')
			<span face="Times New Roman, serif">{{ucwords(strtolower($attorneyHolders['other_relationship']))}}</span>
		@else
			<span face="Times New Roman, serif">{{ucwords(strtolower($attorneyHolders['relationship']))}}</span>
		@endif
	</font>

	<font color="#000000">
		<font face="Times New Roman, serif">, </font>
	</font>

	<font color="#0433ff">
		<font face="Times New Roman, serif">{{ucwords($attorneyHolders['fullname'])}}</font>
	</font>

	<font color="#000000">
		<font face="Times New Roman, serif">, of </font>
	</font>

	<font color="#0000ff">
		<font face="Times New Roman, serif">{{ucwords($attorneyHolders['address'])}}</font>
	</font>

	<font face="Times New Roman, serif">, </font>

	<font color="#0000ff">
		<font face="Times New Roman, serif">{{ucwords($attorneyHolders['city'])}}</font>
	</font>

	<font face="Times New Roman, serif">, </font>

	<font color="#0000ff">
		<font face="Times New Roman, serif">{{ucwords($attorneyHolders['state'])}}</font>
	</font>

	</p>
	
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font color="#000000">
	<font face="Times New Roman, serif">(Tel:  </font>
	</font>

	<font color="#0433ff">
		<font face="Times New Roman, serif">{{ucwords($attorneyHolders['phone'])}}</font>
	</font>

	<font color="#000000"><font face="Times New Roman, serif">),
	as my Attorney-in-Fact (hereinafter referred to in this Power of
	Attorney as “my agent”) to have all of the powers hereinafter set
	forth.</font></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>


	@if($financialPowerOfAttorney['is_backupattorney'] == 1)

	<p align="justify" style="margin-bottom: 0in; line-height: 100%">
		<font color="#000000">
			<font face="Times New Roman, serif">
				<b>Alternate Agent</b>
			</font>
		</font>

		<font color="#000000">
			<font face="Times New Roman, serif">. If said </font>
		</font>

		<font color="#0433ff">
			<font face="Times New Roman, serif">{{ucwords($attorneyHolders['fullname'])}}</font>
		</font>

		<font color="#000000">
			<font face="Times New Roman, serif"> is not available or becomes ineligible to act, or if I revoke their
			appointment or authority to act, then I designate my </font>
		</font>

		<font color="#0433ff">
			@if(strtolower($attorneyBackup['relationship']) == 'other')
				<span face="Times New Roman, serif">{{$attorneyBackup['other_relationship']}}</span>
			@else
				<span face="Times New Roman, serif">{{$attorneyBackup['relationship']}}</span>
			@endif
		</font>

		<font color="#000000">
			<font face="Times New Roman, serif">, </font>
		</font>

		<font color="#0433ff">
			<font face="Times New Roman, serif">{{ucwords($attorneyBackup['fullname'])}}</font>
		</font>

		<font color="#000000">
			<font face="Times New Roman, serif"> of </font>
		</font>

		<font color="#0000ff">
			<font face="Times New Roman, serif">{{ucwords($attorneyBackup['address'])}}</font>
		</font>

		<font face="Times New Roman, serif">, </font>

		<font color="#0000ff">
			<font face="Times New Roman, serif">{{ucwords($attorneyBackup['city'])}}</font>
		</font>

		<font face="Times New Roman, serif">, </font>

		<font color="#0000ff">
			<font face="Times New Roman, serif">{{ucwords($attorneyBackup['state'])}}</font>
		</font>

		<font color="#000000">
			<font face="Times New Roman, serif">
				(Tel: «</font>
		</font>

		<font color="#0433ff">
			<font face="Times New Roman, serif">{{ucwords($attorneyBackup['phone'])}}</font>
		</font>

		<font color="#000000">
			<font face="Times New Roman, serif">)
				as my alternate Agent to have all of the powers hereinafter set
				forth.&nbsp;</font>
		</font>
	</p>

	@endif
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>


	<p align="center" style="margin-top: 0.13in; margin-bottom: 0.13in; line-height: 100%">
	<font face="Times New Roman, serif"><b>II.	AGENT POWERS</b></font></p>
	
	<p align="justify" style="margin-bottom: 0in; line-height: 100%">
		<font face="Times New Roman, serif">
			<b>Broad
	Grant of Powers</b></font><font face="Times New Roman, serif">. It is
	my intention to give my Agent the broadest possible powers to
	represent my interests in all aspects of any transactions or dealings
	involving me or my property to the fullest extent permitted by law. 
	I give the powers specified herein with the understanding that they
	will be used for my benefit and on my behalf and will be exercised
	only in a fiduciary capacity.  In exercising these powers, my Agent
	shall not use my assets to satisfy any legal obligations of my Agent,
	including but not limited to the support of any dependents of my
	Agent, unless I am the dependent of the Agent or I am otherwise
	legally obligated to support such dependent or dependents.</font></p>
	
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>Specific
	Powers</b></font><font face="Times New Roman, serif">. I grant to my
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
	virtue of this Power of Attorney and the powers herein granted:</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>


	<ol>
	<li>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%">
		<font face="Times New Roman, serif">
			<u>Real Property</u>
		</font>
		<font face="Times New Roman, serif">.
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
		the form of title in which property is held.</font></p>
	</li>
	</ol>


	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>


	<ol start="2">
		<li>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%">
		<font face="Times New Roman, serif"><u>Personal Property</u></font><font face="Times New Roman, serif">.
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
		which my Agent shall deem necessary in connection therewith.</font></p>
		</li>
	</ol>
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
	<br/>

	</p>
	
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">(3)	</font>

	<font face="Times New Roman, serif"><u>Motor Vehicles</u></font>
	<font face="Times New Roman, serif">. To sell,
	purchase, apply for a Certificate of Title upon, and endorse and
	transfer title thereto, any motor vehicle, and to represent in such
	transfer assignment that the title to said motor vehicle is free and
	clear of all liens and encumbrances except those specifically set
	forth in such transfer assignment.</font></p>
	
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
	<br/>

	</p>


	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">(4)	</font><font face="Times New Roman, serif"><u>Banking
	/ Financial Institutions</u></font><font face="Times New Roman, serif">.
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
	transactions as set forth in the laws of </font>

	<font color="#0433ff">
		<font face="Times New Roman, serif">{{$state['name']}}</font>
	</font>
	
	<font color="#000000"><font face="Times New Roman, serif">
	and any </font></font><font face="Times New Roman, serif">other State
	or foreign country. For the purposes of this paragraph, the term
	&quot;financial institution&quot; includes, but is not limited to,
	banks, trust companies, savings banks, commercial banks, building and
	loan associations, savings and loan companies or associations, credit
	unions, industrial loan companies, thrift companies and brokerage
	firms or other financial institution selected by my Agent. My Agent
	shall not have the power to terminate or change the beneficiary of
	any beneficiary or “pay on death” accounts.</font></p>
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
	<br/>

	</p>



	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
		<font face="Times New Roman, serif">(5)	</font>
		<font face="Times New Roman, serif"><u>Stock
		and Bond Transactions</u></font><font face="Times New Roman, serif">.
		To buy, sell, exchange, surrender, assign, redeem, or otherwise
		transfer any stocks, bonds, mutual funds, and all other types of
		securities and financial instruments</font>

		<font color="#008f00">
			<font face="Times New Roman, serif">IF !PofA Options?</font>
		</font>

		@if(array_key_exists('isAuthorizeTotrade', $attorneyPowers) && $attorneyPowers['isAuthorizeTotrade'] == 1)

		<font face="Times New Roman, serif">
		except commodity futures contracts and call and put options on stocks
		and stock indexes</font>
		
		@else

		<font face="Times New Roman, serif">»;
		to buy, sell, exchange, assign, settle and exercise commodity futures
		contracts and call and put options on stocks and stock indexes trade
		on a regulated option exchange</font>

		@endif

		<font face="Times New Roman, serif">; to receive
		and hold certificates and other evidences of ownership with respect
		to securities; to exercise voting rights with respect to securities
		in person or by proxy, and, to enter into voting trusts and consent
		to limitations on the right to vote.</font>
	</p>
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
	<br/>

	</p>


	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">(6) 	</font><font face="Times New Roman, serif"><u>Loans</u></font><font face="Times New Roman, serif">.
	 To make loans in my name for my benefit; to borrow money in my name
	for my benefit; to give promissory notes or other obligations
	therefor; and to deposit or mortgage as collateral or for security
	for the payment thereof any or all of my securities, real estate,
	personal property, or other property of whatever nature and wherever
	situated, held by me personally or in trust for my benefit.</font></p>
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
	<br/>

	</p>
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">(7)	</font><font face="Times New Roman, serif"><u>Safe
	Deposit Boxes</u></font><font face="Times New Roman, serif">. To hire
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
	box. </font>
	</p>
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
	<br/>

	</p>



	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">(8)	</font><font face="Times New Roman, serif"><u>Insurance
	and Annuities</u></font><font face="Times New Roman, serif">. To take
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
	life insurance policy.</font></p>
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
	<br/>

	</p>

	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">(8)	</font><font face="Times New Roman, serif"><u>Beneficial
	Interests</u></font><font face="Times New Roman, serif">. To take any
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
	anything received for an authorized purpose.</font></p>
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
	<br/>

	</p>
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">(9)	</font><font face="Times New Roman, serif"><u>Digital
	Assets</u></font><font face="Times New Roman, serif">. To take any
	actions in connection with any and all forms of electronic
	communications and/or digital assets in which I have an interest when
	this Power is executed, or in which I later acquire an interest</font>

	@if(strtolower($state['name']) == 'oregon')
		<font face="Times New Roman, serif">,
		including the power to access, continue, modify, or terminate
		existing accounts; create or change any “passwords” and/or “user
		identification profiles”. “Digital asset” means an electronic
		record in which an individual has a right or interest. “Digital
		asset” does not include an underlying asset or liability unless the
		asset or liability is itself an electronic record</font>
	@else

		<font face="Times New Roman, serif">
		pursuant to the Revised Uniform Fiduciary Access to Digital Assets
		Act (2015), Chapter 19 ORS</font>
	
	@endif

	<font face="Times New Roman, serif">.</font></p>
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
	<br/>

	</p>


	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">(10)	</font><font face="Times New Roman, serif"><u>Retirement
	Plans and Benefits</u></font><font face="Times New Roman, serif">. In
	connection with any pension, profit sharing or stock bonus plan,
	individual retirement account (IRA), Roth IRA, §403(b) annuity or
	account, §457 plan, </font>
	<font color="#008f00">
		<font face="Times New Roman, serif">IF POA FedEmployee?</font>
	</font>

	@if($attorneyPowers['isAuthorizeToAccessOthers'] == 1)

	<font face="Times New Roman, serif">Federal
	Thrift Savings Plan (TSP), Civil Service Retirement System (CSRS),
	Federal Employee Retirement System (FERS),</font>

	@endif

	<font face="Times New Roman, serif"> or any other
	retirement plan, arrangement or annuity [including any plans that may
	be governed by the Employee Retirement Income Security Act of 1974
	(ERISA)] in which I am a participant or of which I am a beneficiary
	(whether established by my Agent or otherwise) (each of which is
	referred to in this document as a “Plan” or “such Plan”), my
	Agent shall have the following powers, in addition to all other
	applicable powers granted by this document:</font></p>
	<p align="justify" style="margin-left: 1in; margin-top: 0.06in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">(a)	To manage and maintain any
	such Plan in which I am a participant or of which I am a beneficiary
	as of the date of this Power, except that my Agent shall not have
	power to change the beneficiary designations therein.</font></p>
	<p align="justify" style="margin-left: 1in; margin-top: 0.06in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">(b)	To contribute to, select
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
	beneficiary in a fiduciary capacity, with no beneficial interest.</font></p>
	<p align="justify" style="margin-left: 1in; margin-top: 0.06in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">(c)	 To elect a form of payment
	of benefits, to withdraw benefits, to make, exercise, waive or
	consent to any and all elections and/or options that I may have
	regarding contributions to, investments or administration of,
	distribution from, or benefits under, such Plan.</font></p>
	
	<p align="justify" style="margin-left: 1in; margin-top: 0.06in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif"></font>

	
	<font face="Times New Roman, serif"> </font>
	</p>
	
	@if(array_key_exists('isAuthorizeToAccessOthers', $attorneyPowers) && $attorneyPowers['isAuthorizeToAccessOthers'] == 1)

		<p align="justify" style="margin-left: 1in; margin-top: 0.06in; margin-bottom: 0in; line-height: 100%">
		<font face="Times New Roman, serif">(d)	To have the power to perform
		any and all acts that may be authorized or permitted by 5 CFR §1690.2
		with respect to any interest I have in a Federal Thrift Savings Plan.</font><font face="Times New Roman, serif">
		</font>
		</p>
	
	@endif
	
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
	<br/>

	</p>



	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">(11)	</font><font face="Times New Roman, serif"><u>Claims
	and Litigation</u></font><font face="Times New Roman, serif">. To
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
	rendered against me.</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">(12)	</font><font face="Times New Roman, serif"><u>Tax
	Matters</u></font><font face="Times New Roman, serif">. To prepare,
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
	regulations.</font></p>
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
	<br/>

	</p>
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">(13)	</font><font face="Times New Roman, serif"><u>Personal
	and Family Maintenance</u></font><font face="Times New Roman, serif">.
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
	make contributions thereto.</font></p>
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
	<br/>

	</p>
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">(14)	</font><font face="Times New Roman, serif"><u>Government
	Benefits</u></font><font face="Times New Roman, serif">. To apply for
	and receive any government benefits for which I may be eligible or
	become eligible, including but not limited to, Social Security,
	Medicare and Medicaid, or other governmental programs, or civil or
	military service</font>

	@if(array_key_exists('isAuthorizeToAccessOthers', $attorneyPowers) && $attorneyPowers['isAuthorizeToAccessOthers'] == 1)

	<font face="Times New Roman, serif">
	[including but not limited to the Federal Thrift Savings Plan (TSP),
	the Civil Service Retirement System (CSRS), the Federal Employee
	Retirement System (FERS), the Federal Employees Group Life Insurance
	(FEGLI) program, and/or the Federal Employee Health Benefits (FEHB)
	program]</font>

	@endif

	<font face="Times New Roman, serif">, existing when
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
	be eligible to receive benefits.</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>




	@if(array_key_exists('isAuthorisedToOperateBusiness', $attorneyPowers) && $attorneyPowers['isAuthorisedToOperateBusiness'] == 1)

	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">(15)	</font><font face="Times New Roman, serif"><u>Business
	Interests</u></font><font face="Times New Roman, serif">. To operate
	and maintain in my stead any business interests I  may have at the
	time of this Power or later acquired by me; to conduct or participate
	in any lawful business of whatever nature for me and in my name; to
	execute partnership agreements and amendments thereto; to
	incorporate, reorganize, merge, consolidate, recapitalize, sell,
	liquidate or dissolve any business; to elect or employ officers,
	directors and attorneys; to carry out the provisions of any agreement
	for the sale of any business interest or the stock therein; and to
	exercise voting rights with respect to stock, either in person or by
	proxy, and exercise stock options.</font></p>
	
	@endif
	
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	
	@if(array_key_exists('isAuthorizeToMakeGift', $attorneyPowers) && $attorneyPowers['isAuthorizeToMakeGift'] == 1)

		<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">

			@if(array_key_exists('isAuthorizeToMakeGift', $attorneyPowers) && $attorneyPowers['isAuthorizeToMakeGift'] == 1
				&& array_key_exists('isAuthorisedToOperateBusiness', $attorneyPowers) && $attorneyPowers['isAuthorisedToOperateBusiness'] == 1)

			<font face="Times New Roman, serif">(16)		</font>

			@elseif(array_key_exists('isAuthorizeToMakeGift', $attorneyPowers) && $attorneyPowers['isAuthorizeToMakeGift'] == 1
				&& (!array_key_exists('isAuthorisedToOperateBusiness', $attorneyPowers) || $attorneyPowers['isAuthorisedToOperateBusiness'] == 0))

			<font color="#000000">
				<font face="Times New Roman, serif">(15)	</font>
			</font>

			@endif

		<font face="Times New Roman, serif"></font>

		<font face="Times New Roman, serif"><u>Gifts</u></font>

		<font face="Times New Roman, serif">.
		If I have initialed below, I grant my Agent the authority and power
		to make gifts, grants, or other transfers without consideration, of
		cash or other property, including the power to forgive indebtedness
		and consent to gift splitting under Internal Revenue Code §2513 or
		successor sections</font>

		
			@if(array_key_exists('isAuthorizeToOperategift', $attorneyPowers) && $attorneyPowers['isAuthorizeToOperategift'] == 1)

			<font face="Times New Roman, serif">
			to make gifts to themselves or to anyone the agent has a legal
			obligation to support </font>

			@else

			<font face="Times New Roman, serif">.</font>

			@endif

		<font face="Times New Roman, serif"> My Agent may honor
		any pledges which I may have made and make donations to charitable
		organizations consistent with my prior donations. My Agent may also
		make special occasion gifts in equal or unequal amounts at my Agent’s
		discretion. My Agent may make gifts of the cost of tuition, including
		making payments directly to the educational institution and/or
		contributing to a qualified tuition program established under §529
		of the Internal Revenue Code. My Agent may also pay medical expenses
		and shall make such payments directly to the medical provider(s).
		These gifting powers granted under this subparagraph shall be
		exercised, if at all, in favor of </font>

			@if($tellUsAboutYou['marital_status'] == 'M')
				<font face="Times New Roman, serif">my Spouse, </font>

			@elseif($tellUsAboutYou['marital_status'] == 'R')
				<font face="Times New Roman, serif">my Partner, </font>

			@endif

		<font face="Times New Roman, serif">my issue, any
		spouse of my issue and any other of my dependents, including my
		Agent.  Any gifts made pursuant to this subparagraph shall not be
		future interests within the meaning of Internal Revenue Code §2503,
		and the aggregate amount of any gifts made in any one calendar year
		to any one individual shall not exceed the amount that may be made
		free of federal gift tax. The limitations in the preceding sentence
		shall not apply to any gifts which incur no federal gift tax, such
		as, for example, gifts that qualify for the unlimited federal gift
		tax marital deduction or charitable deduction.</font></p>
	
			@if(strtolower($state['name']) == 'arizona') 
			
			<p style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>
			
			<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
			&nbsp;<font face="Times New Roman, serif"><i>Advisory Notice to
			Agent: ARS § 14-5506 governs the exercise of powers of attorney.
			Under that statute, an agent cannot receive ANY benefits from the
			principal unless those benefits are specifically identified in detail
			within this instrument or within a written contract. Otherwise, the
			agent could be subject to criminal prosecution or subject to the
			penalty provisions of ARS § 46-456, which authorizes the loss of the
			agent’s right to inherit from the principal as well as payment of
			treble damages and attorneys’ fees. An agent should carefully
			review these statutes or consult with a knowledgeable attorney prior
			to exercising the authority granted by this power of attorney.&nbsp;</i></font></p>
			<p style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>

			<p style="margin-left: 0.38in; margin-top: 0.06in; margin-bottom: 0in; line-height: 100%">
			<font face="Times New Roman, serif">Initials of
			Principal						Initials of Witness</font></p>
			
			<p style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
			<br/>
			</p>

			<p style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
			<font face="Times New Roman, serif">_______________						______________</font></p>

			@else

			<p style="margin-top: 0.06in; margin-bottom: 0in; line-height: 100%"><br/>

			</p>
			
			<p style="margin-left: 0.38in; margin-top: 0.06in; margin-bottom: 0in; line-height: 100%">
			<font face="Times New Roman, serif">Initials of Principal</font></p>
			<p style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			
			<p style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
			<font face="Times New Roman, serif">_______________</font></p>
			<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			
			@endif
		@endif

	
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>SPECIAL
	INSTRUCTIONS: </b></font><font face="Times New Roman, serif">On the
	following lines are any special instructions limiting or extending
	the powers you give to your agent (Write “None” if no additional
	instructions are given):</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 200%"><font face="Times New Roman, serif"><u>																																																																																										</u></font><font face="Times New Roman, serif">.</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>Inspection
	and Disclosure of Information Relating to My Physical or Mental
	Health</b></font><font face="Times New Roman, serif">. My agent has
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
	my individually identifiable health information.  </font><font face="Times New Roman, serif">This
	authority given my agent shall be effective during all times that
	this Power of Attorney is effective, and shall terminate as provided
	herein or in the event that I revoke the authority in writing and
	deliver it to my health care provider.</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="center" style="margin-top: 0.13in; margin-bottom: 0.13in; line-height: 100%">
	<font face="Times New Roman, serif"><b>III.	GENERAL PROVISIONS</b></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font color="#000000"><font face="Times New Roman, serif"><b>When
	Effective.</b></font></font>

	@if(array_key_exists('isIncapacity', $attorneyPowers) && $attorneyPowers['isIncapacity'] == 1)

	<font face="Times New Roman, serif">The above
	authority granted to my Agent shall take effect </font>
	
	<font color="#212121">

	<font face="Times New Roman, serif">on
	my disability or incapacity, as defined herein or as otherwise
	determined by a court of competent jurisdiction.</font></font>

	@else

	<font color="#009c00"><font face="Times New Roman, serif">
	 </font></font>

	 <font face="Times New Roman, serif">This Power is
	effective immediately upon execution.</font>

	@endif
	</p>
	

	<p align="justify" style="margin-top: 0.13in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif"><b>Effect of Incapacity or
	Disability of Principal</b></font><font face="Times New Roman, serif"><b>.</b></font><font face="Times New Roman, serif">
	</font>

	@if(array_key_exists('isDurable', $attorneyPowers) && $attorneyPowers['isDurable'] == 1)

		<font face="Times New Roman, serif">
			<b>THIS POWER OF ATTORNEY IS A “DURABLE” POWER OF ATTORNEY </b>
		</font>

		<font face="Times New Roman, serif">
			<b>AND,
			TO THE MAXIMUM EXTENT PERMITTED BY LAW, SHALL NOT BE AFFECTED BY MY
			DISABILITY, INCAPACITY OR INCOMPETENCY, OR IN THE EVENT OF LATER
			UNCERTAINTY AS TO WHETHER I AM DEAD OR ALIVE, OR BY LAPSE OF TIME</b>
		</font>

		<font color="#000000">
			<font face="Times New Roman, serif"><b>,</b>
			</font>
		</font>

		<font color="#000000">
			<font face="Times New Roman, serif"> </font>
		</font>
		<font face="Times New Roman, serif"><b>UNLESS OR UNTIL
		OTHERWISE ORDERED BY A COURT OF COMPETENT JURISDICTION.</b></font>

	@elseif(array_key_exists('isDurable', $attorneyPowers) && $attorneyPowers['isDurable'] == 0)
		<font face="Times New Roman, serif">
			<b>THIS POWER OF ATTORNEY SHALL TERMINATE UPON MY DISABILITY OR INCAPACITY, OR UPON MY
		EARLIER REVOCATION OR TERMINATION OF THIS POWER.</b>
		</font>
	@endif



	<font face="Times New Roman, serif">My incapacity or
	disability shall be</font><font color="#212121"><font face="Times New Roman, serif">
	</font></font><font face="Times New Roman, serif">determined ONLY
	upon the occasion of the </font><font face="Times New Roman, serif">written
	certification by a physician licensed to practice under the laws of
	the state of my residency, that I am unable to properly care for
	myself or for my person or property.  After a determination of
	incapacity or disability, I shall be deemed to have regained capacity
	by written certification by a physician licensed to practice under
	the laws of the state of my residency that I am capable of properly
	caring for myself or am able to manage my person or property.</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>Compensation
	and Reimbursement.  </b></font><font face="Times New Roman, serif">My
	Agent shall not be entitled to compensation for services in handling
	my financial affairs; however, my Agent shall be entitled to
	reimbursement from my assets for reasonable expenses incurred on my
	behalf, upon providing proof of any such expense.</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>Reliance
	by Third Parties</b></font><font face="Times New Roman, serif">.  Any
	person, including my agent, may rely upon the validity of this power
	of attorney or a photocopy of it unless that person knows it has
	terminated or is invalid.</font><font color="#000000"><font face="Times New Roman, serif">
	</font></font><font color="#008f00"><font face="Times New Roman, serif">
	</font></font><font face="Times New Roman, serif">I, for myself and
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
	document.</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>

	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>Ratification</b></font><font face="Times New Roman, serif">.
	I hereby ratify and confirm all that my Agent does or causes to be
	done under the authority granted in this Power. All instruments of
	any sort entered into in any manner by my Agent shall bind me, my
	estate, my heirs, successors, and assigns.</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>Agent
	Liability</b></font><font face="Times New Roman, serif">. My Agent
	shall not be liable to me or any of my successors in interest for any
	action taken or not taken in good faith, but shall be liable for
	breach of fiduciary duty.</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>Revocation
	and Amendment</b></font><font face="Times New Roman, serif">. I
	revoke all prior General Powers of Attorney and retain the right to
	revoke or amend this document and to substitute other agent in place
	of the Agent appointed herein. Revocations and amendments to this
	document shall be made in writing by me personally (not by my Agent).
	 </font>
	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>Nomination
	of Guardian/Conservator (OPTIONAL)</b></font><font face="Times New Roman, serif">.</font><font face="Times New Roman, serif"><b>
	</b></font>

	@if(strtolower($state['name']) == 'massachusetts')
		<font face="Times New Roman, serif">Pursuant
		to G.L. c. 190B, §5-503(b), if </font>	
	@else
		<font face="Times New Roman, serif">If</font>
	@endif

	<font face="Times New Roman, serif">
	it becomes necessary for a court to appoint a conservator or guardian
	of my estate or guardian of my person, I nominate the following
	person(s) for appointment, who shall serve without bond being
	required, or if required to give bond, shall be exempt from
	furnishing any surety thereon:&nbsp;</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	
	<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif"><b>CONSERVATOR OF MY ESTATE:</b></font><font face="Times New Roman, serif">
	</font>
	</p>
	
	<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">(SELECT OR OMIT EITHER OPTION
	BELOW, BUT NEVER SELECT BOTH.)</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif"><b>(If you select your
	above-named agent, please INITIAL below.)</b></font></p>
	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">( _____ ) my Agent (or successor
	Agent) named above&nbsp;</font></p>
	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
	<br/>

	</p>
	
	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif"><b>--OR--</b></font></p>
	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
	<br/>

	</p>
	
	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif"><b>(If you select someone other
	than your above-named agent, please HANDWRITE your designation
	below.)</b></font></p>
	
	<p style="margin-left: 1in; margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p style="margin-left: 1in; margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">Nominee’s
	name: ______________________________________________________________&nbsp;</font></p>
	<p style="margin-left: 1in; margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p style="margin-left: 1in; margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">Nominee’s
	address: _______________________________________________________&nbsp;</font></p>
	<p style="margin-left: 1in; margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p style="margin-left: 1in; margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">Nominee’s
	telephone number: __________________________________________&nbsp;</font></p>
	<p style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%; page-break-before: always">
	<font face="Times New Roman, serif"><b>GUARDIAN OF MY PERSON:</b></font><font face="Times New Roman, serif">
	</font>
	</p>
	<p align="justify" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">(SELECT OR OMIT EITHER OPTION
	BELOW, BUT NEVER SELECT BOTH.)</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif"><b>(If you select your
	above-named agent, please INITIAL below.)</b></font><font face="Times New Roman, serif">&nbsp;</font></p>
	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">( _____ ) my Agent (or successor
	Agent) named above&nbsp;</font></p>
	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
	<br/>

	</p>
	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif"><b>--OR--</b></font></p>
	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
	<br/>

	</p>
	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif"><b>(If you select someone other
	than your above-named agent, please HANDWRITE your designation
	below.)</b></font></p>
	<p style="margin-left: 1in; margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p style="margin-left: 1in; margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">Nominee’s
	name: 
	_______________________________________________________________&nbsp;</font></p>
	<p style="margin-left: 1in; margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p style="margin-left: 1in; margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">Nominee’s
	address: ______________________________________________________&nbsp;</font></p>
	<p style="margin-left: 1in; margin-bottom: 0in; line-height: 100%"><br/>

	</p>


	<p style="margin-left: 1in; margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">Nominee’s
	telephone number: __________________________________________&nbsp;</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>Severability</b></font><font face="Times New Roman, serif">.
	If any of the provisions of this Power are found to be invalid for
	any reason, such invalidity shall not affect any of the other
	provisions of this Power, and all invalid provisions shall be wholly
	disregarded.</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>Governing
	Law</b></font><font face="Times New Roman, serif">. All questions
	pertaining to validity, interpretation, and administration of this
	Power shall be determined in accordance with the laws of the </font>

	<font color="#008f00">
		<font face="Times New Roman, serif">IF State = &quot;Massachusetts” OR “Kentucky&quot;</font>

	</font>
	@if(strtolower($state['name']) == 'massachusetts' && strtolower($state['name']) == 'kentucky')

	<font face="Times New Roman, serif">Commonwealth
	of </font>

	<font color="#0433ff">
		<font face="Times New Roman, serif">State</font>
	</font>

	@else

	<font face="Times New Roman, serif">State
	of </font>

	<font color="#0433ff">
		<font face="Times New Roman, serif">{{$state['name']}}</font>
	</font>

	@endif

	<font face="Times New Roman, serif">.</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>

	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>Principal
	Acknowledgement</b></font><font face="Times New Roman, serif">. This
	Power is a legal document that I have prepared myself or that was
	prepared by another acting under my direction, and I understand and
	acknowledge that this document provides my Agent with broad powers to
	dispose of, sell, convey, and encumber my real and personal property;
	the powers granted in this Power will exist for an indefinite period
	of time unless I limit their duration by the terms of this Power or
	revoke this Power</font>

	@if(array_key_exists('isDurable', $attorneyPowers) && $attorneyPowers['isDurable'] == 1)

	<font face="Times New Roman, serif">, and will
	continue to exist notwithstanding my subsequent disability or
	incapacity</font>

	@endif

	<font face="Times New Roman, serif">; and I have
	the right to revoke or terminate this Power at any time and must do
	so in writing.&nbsp;</font>
	</p>


	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="center" style="margin-bottom: 0in; line-height: 100%; page-break-before: always">
	<font face="Times New Roman, serif"><b>SIGNATURE AND ACKNOWLEDGMENT</b></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	

	@if(strtolower($state['name']) == 'massachusetts')

		<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
		<font face="Times New Roman, serif">IN WITNESS WHEREOF, I, </font>

		<font color="#0000ff">
			<font face="Times New Roman, serif">{{strtoupper($tellUsAboutYou['fullname'])}}</font>
		</font>

		<font face="Times New Roman, serif">,
		the principal, sign my name to this instrument on this </font><font face="Times New Roman, serif"><u>		</u></font><font face="Times New Roman, serif">
		day of </font>
		</p>


		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><u>			</u></font><font face="Times New Roman, serif">,
		</font><font face="Times New Roman, serif"><u>		</u></font><font face="Times New Roman, serif">,
		and being first duly sworn, do hereby declare to the undersigned
		authority and below-named witnesses that I sign and execute this
		instrument as my Power of Attorney, that I execute it as my free and
		voluntary act for the purposes expressed herein and that I am
		eighteen years of age or older, of sound mind and under no constraint
		or undue influence.&nbsp;</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>



		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">______________________________________</font></p>
		<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
		
		<font color="#0000ff">
			<font face="Times New Roman, serif">
				<b>{{strtoupper($tellUsAboutYou['fullname'])}}</b>
			</font>
		</font>

		<font face="Times New Roman, serif">,
		Principal</font></p>
		<p align="justify" style="margin-top: 0.04in; margin-bottom: 0in; line-height: 100%">
		

		<font color="#0433ff">
			<font face="Times New Roman, serif">{{$tellUsAboutYou['address']}}</font>
		</font>
		</p>

		<p align="justify" style="margin-bottom: 0in; line-height: 100%">
			<font color="#000000">
				<font face="Times New Roman, serif">«</font>
			</font>

			<font color="#0433ff">
				<font face="Times New Roman, serif">{{ucwords($tellUsAboutYou['city'])}}</font>
			</font>

			<font color="#000000">
				<font face="Times New Roman, serif">, </font>
			</font>

			<font color="#0433ff">
				<font face="Times New Roman, serif">{{ucwords($tellUsAboutYou['state'])}}</font>
			</font>

			<font color="#000000">
				<font face="Times New Roman, serif"></font>
			</font>

			<font color="#0433ff">
				<font face="Times New Roman, serif">{{ucwords($tellUsAboutYou['zip'])}}</font>
			</font>
			<font color="#000000">
				<font face="Times New Roman, serif">»</font>
			</font>
		</p>


		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
		<font face="Times New Roman, serif">We, the witnesses who sign below,
		each declare in the presence of </font>

		<font face="Times New Roman, serif">«</font>

		<font color="#0000ff">
			<font face="Times New Roman, serif">{{strtoupper($tellUsAboutYou['fullname'])}}</font>
		</font>

		<font face="Times New Roman, serif">,
		that </font>
		<font color="#0433ff">
			<font face="Times New Roman, serif">{{$genderTxt3}}</font>
		</font>

		<font face="Times New Roman, serif">
		signed this instrument as </font>

		<font color="#0433ff">
			<font face="Times New Roman, serif">{{$genderTxt4}}</font>
		</font>
		<font face="Times New Roman, serif">
		Durable Power of Attorney in the presence of each of us, that </font>
		<font color="#0433ff">
			<font face="Times New Roman, serif">{{$genderTxt3}}</font>
		</font>

		<font face="Times New Roman, serif">
		signed it willingly, that each of us signs this Durable Power of
		Attorney as witness in the presence of </font>

		<font color="#0000ff">
			<font face="Times New Roman, serif">{{strtoupper($tellUsAboutYou['fullname'])}}</font>
		</font>

		<font face="Times New Roman, serif">,
		and that to the best of our knowledge </font>

		<font color="#0433ff">
			<font face="Times New Roman, serif">{{$genderTxt3}}</font>
		</font>

		<font face="Times New Roman, serif">
		is eighteen (18) years of age or over, of sound mind and under no
		constraint or undue influence.</font>
		</p>
	
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>

		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><u>					</u></font><font face="Times New Roman, serif">		</font><font face="Times New Roman, serif"><u>					</u></font><font face="Times New Roman, serif">	</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>(WITNESS
		1)</b></font><font face="Times New Roman, serif">						</font><font face="Times New Roman, serif"><b>(WITNESS
		2)</b></font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">NAME:							NAME:</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">ADDRESS:						ADDRESS:</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">CITY/STATE:						CITY/STATE:</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font color="#000000"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">Commonwealth
		of Massachusetts </font></font></font>
		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font color="#000000"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">County
		of ___________ </font></font></font>
		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
		<font color="#000000"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">On
		this </font></font></font><font color="#000000"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt"><u>		</u></font></font></font><font color="#000000"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">
		day of </font></font></font><font color="#000000"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt"><u>			</u></font></font></font><font color="#000000"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">,
		</font></font></font><font color="#000000"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt"><u>	</u></font></font></font><font color="#000000"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">,
		before me, the undersigned notary public, personally appeared </font></font></font>

		<font face="Times New Roman, serif">
			<font size="2" style="font-size: 9pt">«</font>
		</font>

		<font color="#0000ff">
			<font face="Times New Roman, serif">
				<font size="2" style="font-size: 9pt">{{strtoupper($tellUsAboutYou['fullname'])}}</font>
			</font>
		</font>
	

		<font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">,
		as principal, and </font></font><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt"><u>					</u></font></font><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">
		and </font></font><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt"><u>					</u></font></font><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">
		as witnesses, who each </font></font><font color="#000000"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">proved
		to me through satisfactory evidence of identification to be the
		persons whose names are signed on the preceding or attached document,
		and acknowledged to me that they each signed it voluntarily for its
		stated purpose. </font></font></font>
		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font color="#000000"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">(seal)
		</font></font></font><font color="#000000"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt"><u>					</u></font></font></font></p>
		<p align="justify" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
		<font color="#000000"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">Notary
		Public </font></font></font>
		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 115%"><font face="Times New Roman, serif"><font color="#000000"><font size="2" style="font-size: 9pt">My
		commission expires: _________________</font></font></font></p>
	

	@elseif(strtolower($state['name']) == 'arizona')

		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		
		<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
		<font face="Times New Roman, serif">I, </font>
		<font color="#0000ff">
			<font face="Times New Roman, serif">{{strtoupper($tellUsAboutYou['fullname'])}}</font>
		</font>

		<font face="Times New Roman, serif">,
		the principal, sign my name to this power of attorney this </font><font face="Times New Roman, serif"><u>	</u></font><font face="Times New Roman, serif">
		day of </font><font face="Times New Roman, serif"><u>			</u></font><font face="Times New Roman, serif">,
		</font><font face="Times New Roman, serif"><u>	</u></font><font face="Times New Roman, serif">
		and, being first duly sworn, do declare to the undersigned authority
		that I sign and execute this instrument as my power of attorney and
		that I sign it willingly, or willingly direct another to sign for me,
		that I execute it as my free and voluntary act for the purposes
		expressed in the power of attorney and that I am eighteen years of
		age or older, of sound mind and under no constraint or undue
		influence.</font>
		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>



		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><u>_____________________		_</u></font></p>
		<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
		

		<font color="#0000ff">
			<font face="Times New Roman, serif">{{strtoupper($tellUsAboutYou['fullname'])}}</font>
		</font>

		<font face="Times New Roman, serif">,
		Principal</font></p>
		<p align="justify" style="margin-top: 0.04in; margin-bottom: 0in; line-height: 100%">
		

		<font color="#0433ff">
			<font face="Times New Roman, serif">{{$tellUsAboutYou['address']}}</font>
		</font>

		</p>

		<p align="justify" style="margin-bottom: 0in; line-height: 100%">
			<font color="#000000">
				<font face="Times New Roman, serif"></font>
			</font>
			<font color="#0433ff">
				<font face="Times New Roman, serif">{{ucwords($tellUsAboutYou['city'])}}</font>
			</font>

			<font color="#000000">
				<font face="Times New Roman, serif">, </font>
			</font>

			<font color="#0433ff">
				<font face="Times New Roman, serif">{{ucwords($tellUsAboutYou['state'])}}</font>
			</font>

			<font color="#000000">
				<font face="Times New Roman, serif"> </font>
			</font>

			<font color="#0433ff">
				<font face="Times New Roman, serif">{{ucwords($tellUsAboutYou['zip'])}}</font>
			</font>

			<font color="#000000">
				<font face="Times New Roman, serif"></font>
			</font>
		</p>

		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
	
		<p align="justify" style="margin-bottom: 0in; line-height: 100%">

			<font face="Times New Roman, serif">I, </font>

			<font face="Times New Roman, serif"><u>			</u></font>
			<font face="Times New Roman, serif">,
			the witness, sign my name to the foregoing power of attorney being
			first duly sworn and do declare to the undersigned authority that the
			principal signs and executes this instrument as the principal’s
			power of attorney and that the principal signs it willingly, or
			willingly directs another to sign for the principal, and that I, in
			the presence and hearing of the principal, sign this power of
			attorney as witness to the principal’s signing and that to the best
			of my knowledge the principal is eighteen years of age or older, of
			sound mind and under no constraint or undue influence.</font></p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>
	

			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><u>				</u></font><font face="Times New Roman, serif">	</font><font face="Times New Roman, serif"><u>					</u></font></p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">Witness
			(Signature)				Street Address</font></p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>
		
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><u>				</u></font><font face="Times New Roman, serif">	</font><font face="Times New Roman, serif"><u>					</u></font></p>
			
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">Print
			Name				City, State, Zip</font></p>
			
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">The
			state of Arizona</font></font></p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">County
			of _________________</font></font></p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>

			<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
			<font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">Subscribed,
			sworn to and acknowledged before me by </font></font>

			<font face="Times New Roman, serif">
				<font size="2" style="font-size: 9pt">«</font>
			</font>

			<font color="#0000ff">
				<font face="Times New Roman, serif">
					<font size="2" style="font-size: 9pt">{{strtoupper($tellUsAboutYou['fullname'])}}</font>
				</font>
			</font>

			<font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">,
			the principal, and subscribed and sworn to before me by </font></font>
			</p>
		
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt"><u>				</u></font></font><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">,
			witness, this </font></font><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt"><u>	</u></font></font><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">
			day of </font></font><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt"><u>				</u></font></font><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">,
			</font></font><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt"><u>		</u></font></font><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">.</font></font></p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">(seal)</font></font></p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">(signed)
			___________________________________________________</font></font></p>
			<p align="justify" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
			<font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">(notary
			public)</font></font></p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>
			<p align="justify" style="margin-bottom: 0in; line-height: 115%"><br/>

			</p>
			<p align="justify" style="margin-bottom: 0in; line-height: 115%"><font face="Times New Roman, serif"><font color="#000000"><font size="2" style="font-size: 9pt">My
			commission expires: _________________</font></font></font></p>
		

		@else

			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>


			<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
			<font face="Times New Roman, serif">I, </font>

			

			<font color="#0000ff">
				<font face="Times New Roman, serif">{{strtoupper($tellUsAboutYou['fullname'])}}</font>
			</font>

			<font face="Times New Roman, serif">,
			the principal, sign my name to this power of attorney and do hereby
			declare to the undersigned witnesses that I sign and execute this
			instrument as my Power of Attorney and that I sign it willingly (or
			willingly direct another to sign for me), that I execute it as my
			free and voluntary act for the purposes therein expressed, and that I
			am of legal age, of sound mind, and under no constraint or undue
			influence.&nbsp;</font>
			</p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>
		
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><u>					</u></font><font face="Times New Roman, serif">		</font><font face="Times New Roman, serif"><b>DATE:
			</b></font><font face="Times New Roman, serif"><u>			</u></font><font face="Times New Roman, serif">
			</font>
			</p>
			
			<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">		

			<font color="#0000ff">
				<font face="Times New Roman, serif">
					<b>{{strtoupper($tellUsAboutYou['fullname'])}}</b>
				</font>
			</font>

			</p>
			
			<p align="justify" style="margin-bottom: 0in; line-height: 100%">
				<font color="#0432ff">
					<font face="Times New Roman, serif">{{$tellUsAboutYou['address']}}</font>
				</font>
			</p>

			<p align="justify" style="margin-bottom: 0in; line-height: 100%">

				<font color="#0432ff">
					<font face="Times New Roman, serif">{{$tellUsAboutYou['city']}}</font>
				</font>

			<font color="#0432ff">
				<font face="Times New Roman, serif">{{$tellUsAboutYou['states']}}</font>
			</font>

			<font color="#0432ff">
				<font face="Times New Roman, serif">{{$tellUsAboutYou['zip']}}</font>
			</font>

			<font face="Times New Roman, serif"></font>

			</p>
		

			<p align="justify" style="margin-bottom: 0in; line-height: 100%">
				<font color="#0432ff">
					<font face="Times New Roman, serif">{{$tellUsAboutYou['phone']}}</font>
				</font>
			</p>

			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>


			<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
			<font face="Times New Roman, serif">We, the witnesses, sign our names
			to this instrument, and at least one of us, being first duly sworn,
			do hereby declare that </font>

			<font color="#0000ff">
				<font face="Times New Roman, serif">{{strtoupper($tellUsAboutYou['fullname'])}}</font>
			</font>

			<font face="Times New Roman, serif">,
			the principal, signs and executes this instrument as </font>

			<font color="#0433ff">
				<font face="Times New Roman, serif">{{$genderTxt4}}</font>
			</font>

			<font face="Times New Roman, serif">
			Power of Attorney and that the principal signs it willingly (or
			willingly directs another to sign for </font>

			<font color="#0433ff">
				<font face="Times New Roman, serif">{{$genderTxt4}}</font>
			</font>

			<font face="Times New Roman, serif">,
			and that each of us, in the presence and hearing of the principal,
			hereby signs this instrument as witness to the principal’s signing,
			and that to the best of our knowledge the principal is of legal age,
			of sound mind, and under no constraint or undue influence.&nbsp;</font>
			</p>

			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>
		

			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><u>					</u></font><font face="Times New Roman, serif">		</font><font face="Times New Roman, serif"><u>					</u></font><font face="Times New Roman, serif">	</font></p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>(WITNESS
			1)</b></font><font face="Times New Roman, serif">						</font><font face="Times New Roman, serif"><b>(WITNESS
			2)</b></font></p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">NAME:						NAME:</font></p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">ADDRESS:						ADDRESS:</font></p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">CITY/STATE:						CITY/STATE:	</font></p>
			<p style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>
			<p style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>
			<p align="justify" style="margin-bottom: 0in; line-height: 115%; page-break-before: always">
			<font face="Times New Roman, serif"><font color="#000000">STATE OF
			&nbsp;________________</font><font color="#000000">		</font><font color="#000000">)</font></font></p>
			<p align="justify" style="margin-bottom: 0in; line-height: 115%"><font face="Times New Roman, serif"><font color="#000000">					</font><font color="#000000">)
			ss. </font></font>
			</p>
			<p align="justify" style="margin-bottom: 0in; line-height: 115%"><font face="Times New Roman, serif"><font color="#000000">COUNTY
			OF ________________</font><font color="#000000">		</font><font color="#000000">)</font></font></p>
			<p style="margin-bottom: 0in; line-height: 115%"><br/>

			</p>
			<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
			
			<font color="#000000"><font face="Times New Roman, serif">Subscribed,
			sworn and acknowledged before me by </font></font>

			<font color="#0000ff">
				<font face="Times New Roman, serif">{{strtoupper($tellUsAboutYou['fullname'])}}</font>
			</font>

			<font color="#000000"><font face="Times New Roman, serif">,
			the principal, and _________________________________________, as
			witness, and _____________________________________, as witness, who
			personally appeared on this &nbsp;_________ day of
			&nbsp;________________________________, _______, and who are
			personally known to me or who have produced satisfactory photo
			identification, and whose names are signed to the foregoing
			instrument,</font></font>

			<font face="Times New Roman, serif"> </font>

			<font color="#000000"><font face="Times New Roman, serif">and,
			all of said persons being by me first duly sworn, the principal
			declared to me and to the said witnesses in my presence that the
			instrument is </font></font>

			<font color="#0432ff">
				<font face="Times New Roman, serif">{{$genderTxt4}}</font>
			</font>

			<font color="#000000"><font face="Times New Roman, serif">
			Power of Attorney, and that the principal has willingly and
			voluntarily made and executed it as </font>
			</font>

			<font color="#0432ff"><font face="Times New Roman, serif">{{$genderTxt4}}</font></font>

			<font color="#000000"><font face="Times New Roman, serif">
			free act and deed for the purposes therein expressed, and the
			witnesses declared to me that they were each eighteen (18) years of
			age or over, and that neither of them is related to the principal by
			blood or marriage, or related to the attorney-in-fact by blood or
			marriage.</font></font>
			</p>
			
			<p style="margin-bottom: 0in; line-height: 115%"><br/>

			</p>


			<p align="justify" style="margin-bottom: 0in; line-height: 115%"><font face="Times New Roman, serif"><font color="#000000">______________________________________
			 </font>(Seal)</font></p>
			<p align="justify" style="margin-bottom: 0in; line-height: 115%"><font face="Times New Roman, serif"><font color="#000000">NOTARY
			PUBLIC</font></font></p>
			<p align="justify" style="margin-bottom: 0in; line-height: 115%"><br/>

			</p>
			<p align="justify" style="margin-bottom: 0in; line-height: 115%"><br/>

			</p>
			<p align="justify" style="margin-bottom: 0in; line-height: 115%"><font face="Times New Roman, serif"><font color="#000000">My
			commission expires: _________________</font></font></p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>
		
		
		@endif

		

		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>

		<p style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		
		<p align="center" style="margin-bottom: 0in; line-height: 100%; page-break-before: always">
		<font face="Times New Roman, serif"><b>NOTICE TO AGENT&nbsp;</b></font></p>
		<p align="center" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">When
		you accept the authority granted under this power of attorney a
		special legal relationship, known as agency, is created between you
		and the principal. Agency imposes upon you duties that continue until
		you resign or the power of attorney is terminated or revoked.</font></p>
		<p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">As
		agent you must:</font></p>
		<p align="justify" style="margin-left: 0.5in; margin-bottom: 0.06in; line-height: 100%">
		<font face="Times New Roman, serif">(1) do what you know the
		principal reasonably expects you to do with the principal's property;</font></p>
		<p align="justify" style="margin-left: 0.5in; margin-bottom: 0.06in; line-height: 100%">
		<font face="Times New Roman, serif">(2) act in good faith for the
		best interest of the principal, using due care, competence, and
		diligence;</font></p>
		<p align="justify" style="margin-left: 0.5in; margin-bottom: 0.06in; line-height: 100%">
		<font face="Times New Roman, serif">(3) keep a complete and detailed
		record of all receipts, disbursements, and significant actions
		conducted for the principal;</font></p>
		<p align="justify" style="margin-left: 0.5in; margin-bottom: 0.06in; line-height: 100%">
		<font face="Times New Roman, serif">(4) attempt to preserve the
		principal's estate plan, to the extent actually known by the agent,
		if preserving the plan is consistent with the principal's best
		interest; and,</font></p>
		<p align="justify" style="margin-left: 0.5in; margin-bottom: 0.09in; line-height: 100%">
		<font face="Times New Roman, serif">(5) cooperate with a person who
		has authority to make health care decisions for the principal to
		carry out the principal's reasonable expectations to the extent
		actually in the principal's best interest.&nbsp;</font></p>
		<p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">As
		agent you must not do any of the following:</font></p>
		<p align="justify" style="margin-left: 0.5in; margin-bottom: 0.06in; line-height: 100%">
		<font face="Times New Roman, serif">(1) act so as to create a
		conflict of interest that is inconsistent with the other principles
		in this Notice to Agent;</font></p>
		<p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">	(2)
		do any act beyond the authority granted in this power of attorney;</font></p>
		<p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">	(3)
		commingle the principal's funds with your funds;</font></p>
		<p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">	(4)
		borrow funds or other property from the principal, unless otherwise
		authorized; or,</font></p>
		<p align="justify" style="margin-left: 0.5in; margin-bottom: 0.09in; line-height: 100%">
		<font face="Times New Roman, serif">(5) continue acting on behalf of
		the principal if you learn of any event that terminates this power of
		attorney or your authority under this power of attorney, such as the
		death of the principal, your legal separation from the principal, or
		the dissolution of your marriage to the principal.</font></p>
		<p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">If
		you have special skills or expertise, you must use those special
		skills and expertise when acting for the principal. You must disclose
		your identity as an agent whenever you act for the principal by
		writing or printing the name of the principal and signing your own
		name &quot;as Agent&quot; in the following manner:</font></p>
		

		<p align="justify" style="margin-left: 0.5in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
		“<font color="#0000ff">
			<font face="Times New Roman, serif">{{strtoupper($tellUsAboutYou['fullname'])}}</font>
		</font>

		<font face="Times New Roman, serif">by
		(Your Name) as Agent”</font></p>
		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">The
		meaning of the powers granted to you is contained in Section 3&#8209;4
		of the Illinois Power of Attorney Act, which is incorporated by
		reference into the body of the power of attorney for property
		document.</font></p>
		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">If
		you violate your duties as agent or act outside the authority granted
		to you, you may be liable for any damages, including attorney's fees
		and costs, caused by your violation.</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">If
		there is anything about this document or your duties that you do not
		understand, you should seek legal advice from an attorney.</font></p>
		<p style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="center" style="margin-bottom: 0.13in; line-height: 100%"><font face="Times New Roman, serif"><b>AGENT'S
		CERTIFICATION AND ACCEPTANCE OF AUTHORITY&nbsp;</b></font></p>
		<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
		<font face="Times New Roman, serif">I,
		__________________________________, certify that the attached is a
		true copy of a power of attorney naming the undersigned as agent or
		successor agent for </font>

		<font color="#0000ff">
			<font face="Times New Roman, serif">{{strtoupper($tellUsAboutYou['fullname'])}}</font>
		</font>

		<font face="Times New Roman, serif">.</font></p>
		<p style="margin-bottom: 0.06in; line-height: 100%"><br/>
		<br/>

		</p>
		<p style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">I
		certify that to the best of my knowledge the principal had the
		capacity to execute the power of attorney, is alive, and has not
		revoked the power of attorney; that my powers as agent have not been
		altered or terminated; and that the power of attorney remains in full
		force and effect.</font></p>
		<p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><br/>
		<br/>

		</p>
		<p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">If
		I am a successor agent, I certify that to the best of my knowledge
		_______________________ is unavailable due to
		____________________________________________________________.</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">I
		accept appointment as agent under this power of attorney.</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">This
		certification and acceptance is made under penalty of perjury.</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><a name="_GoBack"></a>
		<font face="Times New Roman, serif">Dated: ______________________</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">	______________________________________</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">	(Agent's
		Signature)</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">	______________________________________</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">	(Print
		Agent's Name)</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">	______________________________________</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">	(Agent's
		Address)</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		
</body>


</html>