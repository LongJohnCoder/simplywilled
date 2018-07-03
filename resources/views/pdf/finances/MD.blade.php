<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<p align="center" style="margin-top: 0.06in; margin-bottom: 0.06in; line-height: 100%">
<font face="Times New Roman, serif"><font size="5" style="font-size: 17pt"><b>MARYLAND
STATUTORY FORM </b></font></font>
</p>
<p align="center" style="margin-top: 0.06in; margin-bottom: 0.06in; line-height: 100%">
<font face="Times New Roman, serif"><font size="5" style="font-size: 17pt"><b>PERSONAL
FINANCIAL&nbsp;POWER OF ATTORNEY</b></font></font></p>
<p align="center" style="margin-bottom: 0.13in; line-height: 100%"><br/>
<br/>

</p>
<p align="center" style="margin-bottom: 0.13in; line-height: 100%"><font face="Times New Roman, serif"><b>IMPORTANT
INFORMATION AND WARNING</b></font></p>
<p align="justify" style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 100%">
<font face="Times New Roman, serif">You should be very careful in
deciding whether or not to sign this document. The powers granted by
you (the principal) in this document are broad and sweeping. This
power of attorney authorizes another person (your agent) to make
decisions concerning your property for you (the principal). Your
agent will be able to make decisions and act with respect to your
property (including your money) whether or not you are able to act
for yourself.&nbsp;</font></p>
<p align="justify" style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 100%">
<br/>
<br/>

</p>
<p align="justify" style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 100%">
<font face="Times New Roman, serif">You should select someone you
trust to serve as your agent. Unless you specify otherwise, generally
the agent’s authority will continue until you die or revoke the
power of attorney or the agent resigns or is unable to act for you.&nbsp;</font></p>
<p align="justify" style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 100%">
<br/>
<br/>

</p>
<p align="justify" style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 100%">
<font face="Times New Roman, serif">You need not grant all of the
powers listed below. If you choose to grant less than all of the
listed powers, you may instead use a Maryland Statutory Form Limited
Power of Attorney and mark on that Maryland Statutory Form Limited
Power of Attorney which powers you intend to delegate to your
attorney–in–fact (the agent) and which you do not want the agent
to exercise.&nbsp;</font></p>
<p align="justify" style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 100%">
<br/>
<br/>

</p>
<p align="justify" style="text-indent: 0.5in; margin-bottom: 0.06in; line-height: 100%">
<font face="Times New Roman, serif">This power of attorney becomes
effective immediately unless you state otherwise in the special
instructions.&nbsp;</font></p>
<p align="justify" style="text-indent: 0.5in; margin-bottom: 0.13in; line-height: 100%">
<br/>
<br/>

</p>
<p align="justify" style="text-indent: 0.5in; margin-bottom: 0.13in; line-height: 100%">
<font face="Times New Roman, serif">You should obtain competent legal
advice before you sign this power of attorney if you have any
questions about the document or the authority you are granting to
your agent.&nbsp;</font></p>
<p align="center" style="margin-top: 0.06in; margin-bottom: 0.13in; line-height: 100%">
<br/>
<br/>

</p>
<p align="center" style="margin-top: 0.06in; margin-bottom: 0.13in; line-height: 100%">
<font face="Times New Roman, serif"><b>DESIGNATION OF AGENT</b></font></p>
<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
<font face="Times New Roman, serif">I, </font>

<font color="#0000ff">
	<font face="Times New Roman, serif">{{strtoupper($tellUsAboutYou['fullname'])}}</font>
</font>

<font face="Times New Roman, serif">,</font>

<font color="#000000">
	<font face="Times New Roman, serif"></font>
</font>

<font face="Times New Roman, serif">appoint my </font>

<font color="#0433ff">
	@if(strtolower($attorneyHolders['relationship']) == 'other')
		<span color="#0433ff">{{ucwords(strtolower($attorneyHolders['other_relationship']))}}</span>
	@else
		<span color="#0433ff">{{ucwords(strtolower($attorneyHolders['relationship']))}}</span>
	@endif
</font>

<font color="#000000">
	<font face="Times New Roman, serif">, </font>
</font>

<font color="#0433ff">
	<font face="Times New Roman, serif">{{$attorneyHolders['fullname']}}</font>
</font>

<font face="Times New Roman, serif">, as my agent, to </font>

<font color="#000000">
	<font face="Times New Roman, serif">have all of the powers hereinafter set forth</font>
</font>

<font face="Times New Roman, serif">.
The contact information for my agent is as follows:</font>
</p>


<p style="margin-top: 0.06in; margin-bottom: 0in; line-height: 100%">

	<font face="Times New Roman, serif">Name of Primary Agent: </font>
	<font color="#0433ff">
		<font face="Times New Roman, serif">{{$attorneyHolders['fullname']}}</font>
	</font>

</p>

<p style="margin-bottom: 0in; line-height: 100%">

	<font face="Times New Roman, serif">Primary Agent’s Address:</font>

	@if(array_key_exists('address', $attorneyHolders) && strlen($attorneyHolders['address']) > 0)

		<font color="#008f00">
			<font color="#0433ff">
				<font face="Times New Roman, serif"> {{$attorneyHolders['address']}}</font>
			</font>
		</font>

		<font color="#0433ff">
			<font face="Times New Roman, serif">{{$attorneyHolders['city']}}</font>
		</font>

		<font face="Times New Roman, serif">, </font>

		<font color="#0433ff">
			<font face="Times New Roman, serif">{{$attorneyHolders['state']}}</font>
		</font>

	@else

		<font face="Times New Roman, serif">___________________________________________</font>

	@endif

	<font face="Times New Roman, serif">&nbsp;</font>
</p>

<p style="margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">Primary
	Agent’s Telephone Number:</font>

	@if(array_key_exists('phone', $attorneyHolders) && strlen($attorneyHolders['phone']) > 0)
	<font color="#0433ff">
		<font face="Times New Roman, serif"> {{$attorneyHolders['phone']}}</font>
	</font>

	@else

	<font face="Times New Roman, serif">__________________</font>

	@endif

	<font face="Times New Roman, serif">&nbsp;</font>
</p>

<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

</p>



	@if($financialPowerOfAttorney['is_backupattorney'] == 1)

		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">If
		and until my primary agent is unable or unwilling to act for me, I
		name my </font>

		<font color="#0433ff">
			@if(strtolower($attorneyBackup['relationship']) == 'other')
				<span color="#0433ff">{{$attorneyBackup['other_relationship']}}</span>
			@else
				<span color="#0433ff">{{$attorneyBackup['relationship']}}</span>
			@endif
		</font>

		<font color="#000000">
			<font face="Times New Roman, serif">, </font>
		</font>

		<font color="#0433ff">
			<font face="Times New Roman, serif">{{ucwords($attorneyBackup['fullname'])}}</font>
		</font>

		<font face="Times New Roman, serif">, as
		my agent, to </font>

		<font color="#000000">
			<font face="Times New Roman, serif">have
			all of the powers hereinafter set forth.  </font>
		</font>


		<font face="Times New Roman, serif">The
			contact information for my agent is as follows:</font></p>
		<p style="margin-top: 0.06in; margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">Name
		of Successor Agent: </font>

		<font color="#0433ff">
			<font face="Times New Roman, serif">{{ucwords($attorneyBackup['fullname'])}}</font>
		</font>
		
		</p>
	

		<p style="margin-bottom: 0in; line-height: 100%">

			<font face="Times New Roman, serif">Primary Agent’s Address:</font>

			@if(array_key_exists('address',$attorneyBackup) && strlen($attorneyBackup['address']) > 0)

				<font color="#0433ff">
					<font face="Times New Roman, serif"> {{$attorneyBackup['address']}}</font>
				</font>

				<font color="#008f00">
					<font face="Times New Roman, serif">,</font>
				</font>

				<font color="#0433ff">
					<font face="Times New Roman, serif"> {{$attorneyBackup['city']}}</font>
				</font>

				<font face="Times New Roman, serif">, </font>

				<font color="#0433ff">
					<font face="Times New Roman, serif">{{$attorneyBackup['state']}}</font>

				</font>

			@else

				<font face="Times New Roman, serif">___________________________________________</font>

			@endif

				<font face="Times New Roman, serif">&nbsp;</font>
		</p>
	

		<p style="margin-bottom: 0in; line-height: 100%">
			<font face="Times New Roman, serif">Primary
			Agent’s Telephone Number:</font>

			@if(array_key_exists('phone', $attorneyBackup) && strlen($attorneyBackup['phone']) > 0)

			<font color="#0433ff">
				<font face="Times New Roman, serif">{{$attorneyBackup['phone']}}</font>
			</font>

			@else

			<font face="Times New Roman, serif">__________________</font>

			@endif

			<font face="Times New Roman, serif">&nbsp;</font>
		</p>

	@endif
	
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>

	

	<p align="center" style="margin-top: 0.06in; margin-bottom: 0.13in; line-height: 100%">
	<font face="Times New Roman, serif"><b>GRANT OF GENERAL AUTHORITY</b></font></p>
	<p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">I
	(“the principal”) grant my agent and any successor agent, with
	respect to each subject listed below, the authority to do all acts
	that I could do to:&nbsp;</font></p>
	<p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">(1)	contract with another person,
	on terms agreeable to the agent, to accomplish a purpose of a
	transaction and perform, rescind, cancel, terminate, reform, restate,
	release, or modify the contract or another contract made by or on
	behalf of the principal;&nbsp;</font></p>
	<p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">(2)	execute, acknowledge, seal,
	deliver, file, or record any instrument or communication the agent
	considers desirable to accomplish a purpose of a transaction;&nbsp;</font></p>
	<p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">(3)	seek on the principal’s
	behalf the assistance of a court or other governmental agency to
	carry out an act authorized in this power of attorney;&nbsp;</font></p>
	<p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">(4)	initiate, participate in,
	submit to alternative dispute resolution, settle, oppose, or propose
	or accept a compromise with respect to a claim existing in favor of
	or against the principal or intervene in litigation relating to the
	claim;&nbsp;</font></p>
	<p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">(5)	engage, compensate, and
	discharge an attorney, accountant, discretionary investment manager,
	expert witness, or other advisor;&nbsp;</font></p>
	<p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">(6)	prepare, execute, and file a
	record, report, or other document to safeguard or promote the
	principal’s interest under a statute or regulation and communicate
	with representatives or employees of a government or governmental
	subdivision, agency, or instrumentality, on behalf of the principal;
	and&nbsp;</font></p>
	<p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">(7)	do lawful acts with respect
	to the subject and all property related to the subject.&nbsp;</font></p>
	<p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><br/>
	<br/>

	</p>


	<p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">My
	agent’s authority shall include the authority to act as stated
	below with regard to each of the following subjects:&nbsp;</font></p>
	<p align="center" style="margin-top: 0.13in; margin-bottom: 0.13in; line-height: 100%">
	<font face="Times New Roman, serif"><b>SUBJECTS AND AUTHORITY</b></font></p>
	<p align="justify" style="margin-bottom: 0.17in; line-height: 100%"><font face="Times New Roman, serif"><u><b>Real
	Property</b></u></font><font face="Times New Roman, serif"> – with
	respect to this subject, I authorize my Agent to: demand, buy, </font><font face="Times New Roman, serif"><i>sell,
	convey, </i></font><font face="Times New Roman, serif">lease,
	receive, accept as a gift or as security for an extension of credit,
	or otherwise acquire or reject an interest in real property or a
	right incident to real property; pledge or mortgage an interest in
	real property or right incident to real property as security to
	borrow money or pay, renew, or extend the time of payment of a debt
	of the principal or a debt guaranteed by the principal, including a
	reverse mortgage; release, assign, satisfy, or enforce by litigation
	or otherwise a mortgage, deed of trust, conditional sale contract,
	encumbrance, lien, or other claim to real property that exists or is
	asserted; and manage or conserve an interest in real property or a
	right incident to real property owned or claimed to be owned by the
	principal, including: (1) insuring against liability or casualty or
	other loss; (2) obtaining or regaining possession of or protecting
	the interest or right by litigation or otherwise; (3) paying,
	assessing, compromising, or contesting taxes or assessments or
	applying for and receiving refunds in connection with them; and (4)
	purchasing supplies, hiring assistance or labor, and making repairs
	or alterations to the real property.&nbsp;</font></p>
	<p align="justify" style="margin-bottom: 0.17in; line-height: 100%"><font face="Times New Roman, serif"><u><b>Stocks
	and Bonds</b></u></font><font face="Times New Roman, serif"> – with
	respect to this subject, I authorize my Agent to: buy, sell, and
	exchange stocks and bonds; establish, continue, modify, or terminate
	an account with respect to stocks and bonds; pledge stocks and bonds
	as security to borrow, pay, renew, or extend the time of payment of a
	debt of the principal; receive certificates and other evidences of
	ownership with respect to stocks and bonds; exercise voting rights
	with respect to stocks and bonds in person or by proxy, enter into
	voting trusts, and consent to limitations on the right to vote.&nbsp;</font></p>
	<p align="justify" style="margin-bottom: 0.17in; line-height: 100%"><font face="Times New Roman, serif"><u><b>Banks
	and Other Financial Institutions</b></u></font><font face="Times New Roman, serif">
	– with respect to this subject, I authorize my agent to: continue,
	modify, and terminate an account or other banking arrangement made by
	or on behalf of the principal; establish, modify, and terminate an
	account or other banking arrangement with a bank, trust company,
	savings and loan association, credit union, thrift company, brokerage
	firm, or other financial institution selected by the agent; contract
	for services available from a financial institution, including
	renting a safe deposit box or space in a vault; withdraw, by check,
	money order, electronic funds transfer, or otherwise, money or
	property of the principal deposited with or left in the custody of a
	financial institution; receive statements of account, vouchers,
	notices, and similar documents from a financial institution and act
	with respect to them; enter a safe deposit box or vault and withdraw
	or add to the contents; borrow money and pledge as security personal
	property of the principal necessary to borrow money or pay, renew, or
	extend the time of payment of a debt of the principal or a debt
	guaranteed by the principal; make, assign, draw, endorse, discount,
	guarantee, and negotiate promissory notes, checks, drafts, and other
	negotiable or nonnegotiable paper of the principal or payable to the
	principal or the principal’s order, transfer money, receive the
	cash or other proceeds of those transactions; and apply for, receive,
	and use credit cards and debit cards, electronic transaction
	authorizations, and traveler’s checks from a financial
	institution.&nbsp;</font></p>
	<p align="justify" style="margin-bottom: 0.17in; line-height: 100%"><font face="Times New Roman, serif"><u><b>Insurance
	and Annuities</b></u></font><font face="Times New Roman, serif"> –
	with respect to this subject, I authorize my agent to: continue, pay
	the premium or make a contribution on, modify, exchange, rescind,
	release, or terminate a contract procured by or on behalf of the
	principal that insures or provides an annuity to either the principal
	or another person, whether or not the principal is a beneficiary
	under the contract; procure new, different, and additional contracts
	of insurance and annuities for the principal and select the amount,
	type of insurance or annuity, and mode of payment; pay the premium or
	make a contribution on, modify, exchange, rescind, release, or
	terminate a contract of insurance or annuity procured by the agent;
	apply for and receive a loan secured by a contract of insurance or
	annuity; surrender and receive the cash surrender value on a contract
	of insurance or annuity; exercise an election; exercise investment
	powers available under a contract of insurance or annuity; change the
	manner of paying premiums on a contract of insurance or annuity;
	change or convert the type of insurance or annuity with respect to
	which the principal has or claims to have authority described in this
	section; apply for and procure a benefit or assistance under a
	statute or regulation to guarantee or pay premiums of a contract of
	insurance on the life of the principal; collect, sell, assign,
	hypothecate, borrow against, or pledge the interest of the principal
	in a contract of insurance or annuity; select the form and timing of
	the payment of proceeds from a contract of insurance or annuity; pay,
	from proceeds or otherwise, compromise or contest, and apply for
	refunds in connection with a tax or assessment levied by a taxing
	authority with respect to a contract of insurance or annuity or the
	proceeds or liability from the contract of insurance or annuity
	accruing by reason of the tax or assessment.&nbsp;</font></p>
	<p align="justify" style="margin-bottom: 0.17in; line-height: 100%"><font face="Times New Roman, serif"><u><b>Claims
	and Litigation</b></u></font><font face="Times New Roman, serif"> –
	with respect to this subject, I authorize my Agent to: assert and
	maintain before a court or administrative agency a claim, claim for
	relief, cause of action, counterclaim, offset, recoupment, or
	defense, including an action to recover property or other thing of
	value, recover damages sustained by the principal, eliminate or
	modify tax liability, or seek an injunction, specific performance, or
	other relief; act for the principal with respect to bankruptcy or
	insolvency, whether voluntary or involuntary, concerning the
	principal or some other person, or with respect to a reorganization,
	receivership, or application for the appointment of a receiver or
	trustee that affects an interest of the principal in property or
	other thing of value; pay a judgment, award, or order against the
	principal or a settlement made in connection with a claim or
	litigation; and receive money or other thing of value paid in
	settlement of or as proceeds of a claim or litigation.&nbsp;</font></p>
	<p align="justify" style="margin-bottom: 0.17in; line-height: 100%"><font face="Times New Roman, serif"><u><b>Benefits
	from Governmental Programs or Civil or Military Service (Including
	any Benefit, Program, or Assistance Provided Under a Statute or
	Regulation Including Social Security, Medicare, and Medicaid)</b></u></font><font face="Times New Roman, serif">
	– with respect to this subject, I authorize my Agent to: execute
	vouchers in the name of the principal for allowances and
	reimbursements payable by the united states or a foreign government
	or by a state or subdivision of a state to the principal; enroll in,
	apply for, select, reject, change, amend, or discontinue, on the
	principal’s behalf, a benefit or program; prepare, file, and
	maintain a claim of the principal for a benefit or assistance,
	financial or otherwise, to which the principal may be entitled under
	a statute or regulation; initiate, participate in, submit to
	alternative dispute resolution, settle, oppose, or propose or accept
	a compromise with respect to litigation concerning a benefit or
	assistance the principal may be entitled to receive under a statute
	or regulation; and receive the financial proceeds of a claim
	described above and conserve, invest, disburse, or use for a lawful
	purpose anything so received.&nbsp;</font></p>
	<p align="justify" style="margin-bottom: 0.17in; line-height: 100%"><font face="Times New Roman, serif"><u><b>Retirement
	Plans (including a plan or account created by an employer, the
	principal, or another individual to provide retirement benefits or
	deferred compensation of which the principal is a participant,
	beneficiary, or owner, including a plan or account under the
	following sections of the Internal Revenue Code: (1) an Individual
	Retirement Account under Internal Revenue Code Section 408, 26 U.S.C.
	§ 408; (2) a Roth Individual Retirement Account under Internal
	Revenue Code Section 408(a), 26 U.S.C. § 408(a); (3) a deemed
	Individual Retirement Account under Internal Revenue Code Section
	408(q), 26 U.S.C. § 408(q); (4) an annuity or mutual fund custodial
	account under Internal Revenue Code Section 403(b), 26 U.S.C. §
	403(b); (5) a pension, profit–sharing, stock bonus, or other
	retirement plan qualified under Internal Revenue Code Section 401(a),
	26 U.S.C. § 401(a); (6) a plan under Internal Revenue Code Section
	457(b), 26 U.S.C. § 457(b); and (7) a nonqualified deferred
	compensation plan under Internal Revenue Code Section 409(a), 26
	U.S.C. § 409(a)</b></u></font><font face="Times New Roman, serif"><b>
	</b></font><font face="Times New Roman, serif">– with respect to
	this subject, I authorize my Agent to: select the form and timing of
	payments under a retirement plan and withdraw benefits from a plan;
	make a rollover, including a direct trustee–to–trustee rollover,
	of benefits from one retirement plan to another; establish a
	retirement plan in the principal’s name; make contributions to a
	retirement plan; exercise investment powers available under a
	retirement plan; borrow from, sell assets to, or purchase assets from
	a retirement plan.&nbsp;</font></p>
	<p align="justify" style="margin-bottom: 0.17in; line-height: 100%"><font face="Times New Roman, serif"><u><b>Taxes</b></u></font><font face="Times New Roman, serif">
	– with respect to this subject, I authorize my Agent to: prepare,
	sign, and file federal, state, local, and foreign income, gift,
	payroll, property, federal insurance contributions act, and other tax
	returns, claims for refunds, requests for extension of time,
	petitions regarding tax matters, and other tax–related documents,
	including receipts, offers, waivers, consents, including consents and
	agreements under Internal Revenue Code section 2032(a), 26 U.S.C.
	§2032(a), closing agreements, and other powers of attorney required
	by the internal revenue service or other taxing authority with
	respect to a tax year on which the statute of limitations has not run
	and the following 25 tax years; pay taxes due, collect refunds, post
	bonds, receive confidential information, and contest deficiencies
	determined by the internal revenue service or other taxing authority;
	exercise elections available to the principal under federal, state,
	local, or foreign tax law; and act for the principal in all tax
	matters for all periods before the internal revenue service, or other
	taxing authority.&nbsp;</font></p>
	<p align="justify" style="margin-bottom: 0.17in; line-height: 100%"><font face="Times New Roman, serif"><u><b>Beneficial
	Interests</b></u></font><font face="Times New Roman, serif"> – with
	respect to this subject, I authorize my Agent to take any actions
	with respect to any probate estate, trust, conservatorship,
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



	@if(array_key_exists('isAuthorizeToMakeGift', $attorneyPowers) && $attorneyPowers['isAuthorizeToMakeGift'] == 1)

	<p align="justify" style="margin-bottom: 0.17in; line-height: 100%">
		<font face="Times New Roman, serif"><u>
			<b>Gifts</b>
		</u>
		</font>
		<font face="Times New Roman, serif">
			– with respect to this subject, I authorize my Agent to continue
			any payments to a dependent person, the amount and extent of such
			support in my Agent’s sole and absolute discretion; to make gifts,
			grants, or other transfers without consideration, of cash or other
			property, including the power to forgive indebtedness and consent to
			gift splitting under Internal Revenue Code §2513 or successor
			sections </font>


		


		@if(array_key_exists('isAuthorizeToOperategift', $attorneyPowers) && $attorneyPowers['isAuthorizeToOperategift'] == 1)
			<font face="Times New Roman, serif">;
			to make gifts to themselves or to anyone the agent has a legal
			obligation to support </font>
		@endif

		<font face="Times New Roman, serif">.</font>

		<font color="#000000">
			<font face="Times New Roman, serif"> </font>
		</font>

		<font face="Times New Roman, serif"> The gifting powers
		granted under this paragraph shall be exercised, if at all, in favor
		of </font>

		@if($tellUsAboutYou['marital_status'] == 'M')
			<font face="Times New Roman, serif">my spouse, </font>
		@elseif($tellUsAboutYou['marital_status'] == 'R')
			<font face="Times New Roman, serif">my Partner, </font>
		@endif

		<font face="Times New Roman, serif">my issue, any
		spouse of my issue and any other of my dependents, including my
		Agent. Any gifts made pursuant to this paragraph shall not be future
		interests within the meaning of Internal Revenue Code §2503, and the
		aggregate amount of any gifts made in any one calendar year to any
		one individual shall not exceed the amount that may be made free of
		federal gift tax. The limitations in the preceding sentence shall not
		apply to any gifts which incur no federal gift tax, such as, for
		example, gifts that qualify for the unlimited federal gift tax
		marital deduction or charitable deduction.</font></p>

	@endif
	<p align="justify" style="margin-bottom: 0.17in; line-height: 100%"><br/>
	<br/>

	</p>

	


	<p align="center" style="margin-top: 0.13in; margin-bottom: 0.03in; line-height: 100%">
	<font face="Times New Roman, serif"><b>SPECIAL INSTRUCTIONS</b></font></p>
	<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><br/>
	<br/>
	</p>


	@if($attorneyPowers['isIncapacity'] == 1)

		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%">
			<font face="Times New Roman, serif">1.	</font>
			<font face="Times New Roman, serif"><b>EFFECTIVE
		DATE.  </b></font>
		<font face="Times New Roman, serif">The above
		authority granted to my agent shall take effect on my disability or
		incapacity, as determined ONLY upon the occasion of the signing of a
		written statement EITHER:</font></p>
		
		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><br/>
		<br/>

		</p>


		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">(INSTRUCTIONS:
		COMPLETE OR OMIT SECTION (I) </font><font face="Times New Roman, serif"><b>OR</b></font><font face="Times New Roman, serif">
		SECTION (II) BELOW BUT NEVER COMPLETE BOTH SECTIONS (I) AND (II)
		BELOW. IF YOU DO NOT COMPLETE EITHER SECTION (I) OR SECTION (II)
		BELOW, IT SHALL BE PRESUMED THAT YOU WANT THE PROVISIONS OF SECTION
		(I) BELOW TO APPLY)</font></p>


		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">(I)	By
		a physician or physicians named herein by me at this point:</font></p>
		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">Dr.
		______________________________________________________________</font></p>
		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">_________________________________________________________________</font></p>
		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">_________________________________________________________________</font></p>
		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">(Insert
		the full name(s) and address(es) of the certifying physician(s)
		chosen by you)</font></p>
		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">or
		if no physician or physicians are named hereinabove, or if the
		physician or physicians named hereinabove are unable to act, by my
		regular physician, or by a physician who has treated me within one
		year preceding the date of such signing, or by a licensed
		psychologist or psychiatrist, certifying that I am suffering from
		diminished capacity that would preclude me from conducting my affairs
		in a competent manner;</font></p>

		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif"><b>--OR--</b></font></p>
		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">(II)	By
		a person or persons named herein by me at this point:</font></p>
		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">__________________________________________________________________</font></p>
		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">__________________________________________________________________</font></p>
		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">(Insert
		the full name(s) and address(es) of the certifying person(s) chosen
		by you)</font></p>
		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">CERTIFYING
		that the following specified event has occurred:</font></p>
		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">__________________________________________________________________</font></p>
		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">__________________________________________________________________</font></p>
		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">(Insert
		hereinabove the specified event the certification of which will cause
		this power of attorney to take effect)</font></p>

	@else

		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">1.
			</font><font face="Times New Roman, serif"><b>EFFECTIVE DATE.</b></font><font face="Times New Roman, serif">
		 This Power is effective immediately upon execution. </font>
		</p>

	@endif


	<p align="justify" style="margin-top: 0.13in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">2.</font><font face="Times New Roman, serif"><b>	EFFECT
	OF INCAPACITY OR DISABILITY OF PRINCIPAL</b></font><font face="Times New Roman, serif"><b>.</b></font><font face="Times New Roman, serif">
	 My incapacity or disability shall be</font><font color="#212121"><font face="Times New Roman, serif">
	</font></font><font face="Times New Roman, serif">determined ONLY
	upon the occasion of the </font><font face="Times New Roman, serif">written
	certification by a physician licensed to practice under the laws of
	the state of my residency, that I am unable to properly care for
	myself or for my person or property.  After a determination of
	incapacity or disability, I shall be deemed to have regained capacity
	by written certification by a physician licensed to practice under
	the laws of the state of my residency that I am capable of properly
	caring for myself or am able to manage my person or property. </font>

	@if(array_key_exists('isDurable', $attorneyPowers) && $attorneyPowers['isDurable'] == 1)
		<font face="Times New Roman, serif">
			<b>THIS POWER OF ATTORNEY IS A “DURABLE” POWER OF ATTORNEY </b>
		</font>
		<font face="Times New Roman, serif"><b>AND,
		TO THE MAXIMUM EXTENT PERMITTED BY LAW, SHALL NOT BE AFFECTED BY MY
		DISABILITY, INCAPACITY OR INCOMPETENCY, OR IN THE EVENT OF LATER
		UNCERTAINTY AS TO WHETHER I AM DEAD OR ALIVE, OR BY LAPSE OF TIME</b></font><font color="#000000"><font face="Times New Roman, serif"><b>,</b></font></font><font color="#000000"><font face="Times New Roman, serif">
		</font></font><font face="Times New Roman, serif"><b>UNLESS OR UNTIL
		OTHERWISE ORDERED BY A COURT OF COMPETENT JURISDICTION.</b></font>
	@elseif(array_key_exists('isDurable', $attorneyPowers) && $attorneyPowers['isDurable'] == 0)
		<font face="Times New Roman, serif">
			<b>THIS POWER OF ATTORNEY SHALL TERMINATE UPON MY DISABILITY OR INCAPACITY,
		OR UPON MY EARLIER REVOCATION OR TERMINATION OF THIS POWER.</b>
		</font>
	@endif
	</p>
	
	<p align="justify" style="margin-top: 0.13in; margin-bottom: 0.06in; line-height: 100%">
	<br/>
	<br/>

	</p>


	<p align="justify" style="margin-top: 0.13in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">3.	</font><font face="Times New Roman, serif"><b>HIPAA
	RELEASE AND WAIVER.</b></font><font face="Times New Roman, serif"> 
	My agent has the power and authority to request, review, and receive,
	to the extent I could do so individually, any information, verbal or
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
	or future medical or mental health condition. This authority given my
	agent shall supersede any other agreement which I may have made with
	my health care providers to restrict access to or disclosure of my
	individually identifiable health information. This authority given my
	agent shall be effective during all times that this Power of Attorney
	is effective, and shall terminate as provided herein or in the event
	that I revoke the authority in writing and deliver it to my health
	care provider.</font></p>
	<p align="justify" style="margin-top: 0.13in; margin-bottom: 0.06in; line-height: 100%">
	<br/>
	<br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">4.</font><font face="Times New Roman, serif"><b>	COMPENSATION
	AND REIMBURSEMENT.  </b></font><font face="Times New Roman, serif">My
	Agent shall not be entitled to compensation for services in handling
	my financial affairs; however, my Agent shall be entitled to
	reimbursement from my assets for reasonable expenses incurred on my
	behalf, upon providing proof of any such expense.</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">5.	</font><font face="Times New Roman, serif"><b>DIGITAL
	ASSETS.  </b></font><font face="Times New Roman, serif">My agent has
	the power and authority to access, continue, modify, maintain,
	terminate, or take any other action in connection with any of my
	digital accounts, assets or rights, including the power to create or
	change any passwords and user identification profiles.</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">6.	</font><font face="Times New Roman, serif"><b>I
	GIVE THE FOLLOWING ADDITIONAL INSTRUCTIONS (OPTIONAL):&nbsp;</b></font></p>
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
	<font face="Times New Roman, serif">________________________________________________________________________</font></p>
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
	<font face="Times New Roman, serif">________________________________________________________________________</font></p>
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
	<font face="Times New Roman, serif">________________________________________________________________________</font></p>
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0.13in; line-height: 100%">
	<font face="Times New Roman, serif">________________________________________________________________________</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="center" style="margin-top: 0.13in; margin-bottom: 0.03in; line-height: 100%">
	<font face="Times New Roman, serif"><b>NOMINATION OF GUARDIAN</b></font></p>
	<p align="center" style="margin-bottom: 0.13in; line-height: 100%"><font face="Times New Roman, serif"><b>(OPTIONAL)</b></font></p>
	<p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">If
	it becomes necessary for a court to appoint a guardian of my estate
	or guardian of my person, I nominate the following person(s) for
	appointment:&nbsp;</font></p>
	<p style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">Name
	of nominee for guardian of my property:&nbsp;</font></p>
	<p style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">(</font><font face="Times New Roman, serif"><u>	</u></font><font face="Times New Roman, serif">)
	my Agent (or successor Agent) named above&nbsp;</font></p>
	<p style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">OR&nbsp;</font></p>
	<p style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">______________________________________________________________________________&nbsp;</font></p>
	<p style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">Nominee’s
	address:
	_____________________________________________________________&nbsp;</font></p>
	<p style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">Nominee’s
	telephone number: __________________________________________&nbsp;</font></p>
	<p style="margin-top: 0.06in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">Name of nominee for guardian of
	my person:&nbsp;</font></p>
	<p style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">(</font><font face="Times New Roman, serif"><u>	</u></font><font face="Times New Roman, serif">)
	my Agent (or successor Agent) named above&nbsp;</font></p>
	<p style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">OR&nbsp;</font></p>
	<p style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">______________________________________________________________________________&nbsp;</font></p>
	<p style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">Nominee’s
	address:
	_____________________________________________________________&nbsp;</font></p>
	<p style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">Nominee’s
	telephone number: __________________________________________&nbsp;</font></p>
	<p align="center" style="margin-top: 0.13in; margin-bottom: 0.13in; line-height: 100%">
	<br/>
	<br/>

	</p>
	<p align="center" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>GENERAL
	PROVISIONS</b></font></p>
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
	<p style="margin-bottom: 0in; line-height: 100%"><br/>

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
	Power shall be determined in accordance with the laws of State of
	Maryland.</font></p>
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
	
	<p style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	
	<p align="center" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	
	<p align="center" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>[signature
	and acknowledgement on next page]</b></font></p>
	<p align="center" style="margin-top: 0.13in; margin-bottom: 0.13in; line-height: 100%; page-break-before: always">
	<font face="Times New Roman, serif"><b>SIGNATURE AND ACKNOWLEDGMENT</b></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>


	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font color="#000000"><font face="Times New Roman, serif"><u>					</u></font></font><font color="#000000"><font face="Times New Roman, serif">		</font></font><font color="#000000"><font face="Times New Roman, serif"><b>DATE:
	</b></font></font><font color="#000000"><font face="Times New Roman, serif"><u>					</u></font></font></p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">

	<font color="#0000ff">
		<font face="Times New Roman, serif">
			<b>{{strtoupper($tellUsAboutYou['fullname'])}}</b>
		</font>
	</font>

	<font color="#000000"><font face="Times New Roman, serif"><b>		</b></font></font></p>
	
	<p align="justify" style="margin-bottom: 0in; line-height: 100%">
		<font color="#0433ff">
			<font face="Times New Roman, serif">{{$tellUsAboutYou['address']}}</font>
		</font>
	</p>

	<p align="justify" style="margin-bottom: 0in; line-height: 100%">
		<font color="#0433ff">
			<font face="Times New Roman, serif">{{$tellUsAboutYou['city']}}</font>
		</font>

		<font color="#000000">
			<font face="Times New Roman, serif">, </font>
		</font>

		<font color="#0433ff">
			<font face="Times New Roman, serif">{{$tellUsAboutYou['state']}}</font>
		</font>

		<font color="#000000">
			<font face="Times New Roman, serif"> </font>
		</font>

		<font color="#0433ff">
			<font face="Times New Roman, serif">{{$tellUsAboutYou['zip']}}</font>
		</font>
	</p>
	

	<p align="justify" style="margin-bottom: 0.13in; line-height: 100%">
		<font color="#0433ff">
			<font face="Times New Roman, serif">{{$tellUsAboutYou['phone']}}</font>
		</font>
	</p>

	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>


	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font color="#000000"><font face="Times New Roman, serif">STATE
	OF MARYLAND		)</font></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">					)
	ss.&nbsp;</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font color="#000000"><font face="Times New Roman, serif">COUNTY
	OF ________________	)</font></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font color="#000000"><font face="Times New Roman, serif">This
	document was acknowledged before me on this </font></font><font color="#000000"><font face="Times New Roman, serif"><u>	</u></font></font><font color="#000000"><font face="Times New Roman, serif">
	day of </font></font><font color="#000000"><font face="Times New Roman, serif"><u>			</u></font></font><font color="#000000"><font face="Times New Roman, serif">,
	</font></font><font color="#000000"><font face="Times New Roman, serif"><u>	</u></font></font><font color="#000000"><font face="Times New Roman, serif">,
	by </font></font>

	<font color="#0433ff">
		<font face="Times New Roman, serif">{{strtoupper($tellUsAboutYou['fullname'])}}</font>
	</font>

	<font color="#000000">
		<font face="Times New Roman, serif"> to be </font>
	</font>

	<font color="#0433ff">

		<font face="Times New Roman, serif">{{$genderTxt4}}</font>
	</font>

	<font color="#000000">
		<font face="Times New Roman, serif"> own act.</font>
	</font>
	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">	______________________________________</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">	NOTARY
	PUBLIC</font></p>
	<p style="margin-bottom: 0.06in; line-height: 100%"><br/>
	<br/>

	</p>
	<p style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">My
	commission expires: _________________</font></p>
	<p align="center" style="margin-bottom: 0.03in; line-height: 100%; page-break-before: always">
	<font face="Times New Roman, serif"><b>WITNESS ATTESTATION</b></font></p>
	<p align="center" style="margin-bottom: 0.13in; line-height: 100%"><font face="Times New Roman, serif">(one
	of whom may be the notary taking the acknowledgment)</font></p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">The foregoing Power of Attorney
	was, on the date written above, published and declared by </font>

	<font color="#0000ff">
		<font face="Times New Roman, serif">{{$tellUsAboutYou['fullname']}}</font>
	</font>

	<font face="Times New Roman, serif">
	in our presence to be </font>

	<font color="#0433ff">
		<font face="Times New Roman, serif">{{$genderTxt4}}</font>
	</font>

	<font face="Times New Roman, serif">
	Power of Attorney. We, in </font>

	<font color="#0433ff">
		<font face="Times New Roman, serif">{{$genderTxt4}}</font>
	</font>

	<font face="Times New Roman, serif">
	presence and at </font>

	<font color="#0433ff">
		<font face="Times New Roman, serif">{{$genderTxt4}}</font>
	</font>

	<font face="Times New Roman, serif">
	request, and in the presence of each other, have attested to the same
	and have signed our names as attesting witnesses.&nbsp;</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>_______________________________________</b></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>WITNESS
	1 [signature – please print name under this line]</b></font></p>
	<p align="justify" style="margin-bottom: 0.13in; line-height: 100%"><br/>
	<br/>

	</p>



	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">____________________________________</font></p>
	<p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">[street
	address]</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">____________________________________</font></p>
	<p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">[city,
	state zip]</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">____________________________________</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">[telephone
	number]</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>_______________________________________</b></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>WITNESS
	2 [signature – please print name under this line]</b></font></p>
	<p align="justify" style="margin-bottom: 0.13in; line-height: 100%"><br/>
	<br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">____________________________________</font></p>
	<p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">[street
	address]</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">____________________________________</font></p>
	<p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">[city,
	state zip]</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">____________________________________</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">[telephone
	number]</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="center" style="margin-top: 0.06in; margin-bottom: 0.06in; line-height: 100%; page-break-before: always">
	<font face="Times New Roman, serif"><b>IMPORTANT INFORMATION FOR
	AGENT&nbsp;</b></font></p>
	<p align="center" style="margin-bottom: 0.13in; line-height: 100%"><br/>
	<br/>

	</p>


	<p align="center" style="margin-bottom: 0.13in; line-height: 100%"><font face="Times New Roman, serif"><b>AGENT’S
	DUTIES</b></font></p>
	<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">WHEN
	YOU ACCEPT THE AUTHORITY GRANTED UNDER THIS POWER OF ATTORNEY, A
	SPECIAL LEGAL RELATIONSHIP IS CREATED BETWEEN YOU AND THE PRINCIPAL.
	THIS RELATIONSHIP IMPOSES ON YOU LEGAL DUTIES THAT CONTINUE UNTIL YOU
	RESIGN OR THE POWER OF ATTORNEY IS TERMINATED OR REVOKED. YOU MUST:&nbsp;</font></p>
	<p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">(1)	do what you know the
	principal reasonably expects you to do with the principal’s
	property or, if you do not know the principal’s expectations, act
	in the principal’s best interest;&nbsp;</font></p>
	<p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">(2)	act with care, competence,
	and diligence for the best interest of the principal;&nbsp;</font></p>
	<p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">(3)	do nothing beyond the
	authority granted in this power of attorney; and&nbsp;</font></p>
	<p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">(4)	disclose your identity as an
	agent whenever you act for the principal by writing or printing the
	name of the principal and signing your own name as “agent” in the
	following manner:&nbsp;</font></p>
	<p style="margin-left: 0.75in; margin-top: 0.06in; margin-bottom: 0.13in; line-height: 100%">
	<br/>
	<br/>

	</p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	“

	<font color="#0000ff">
		<font face="Times New Roman, serif">
			<b>{{$tellUsAboutYou['fullname']}}</b>
		</font>
	</font>

	<font face="Times New Roman, serif">
	</font><font face="Times New Roman, serif"><b>by (your signature) as
	agent”</b></font></p>
	<p style="margin-left: 0.75in; margin-top: 0.06in; margin-bottom: 0.13in; line-height: 100%">
	<br/>
	<br/>

	</p>

	<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">Unless
	the special instructions in this power of attorney state otherwise,
	you must also:&nbsp;</font></p>


	<ol>
		<ol>
			<li>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%">
			<font face="Times New Roman, serif">(1)	act loyally for the
			principal’s benefit;&nbsp;</font></p>
			</li>
			<li>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%">
			<font face="Times New Roman, serif">(2)	avoid conflicts that would
			impair your ability to act in the principal’s best interest;&nbsp;</font></p>
			</li>
			
			<li>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%">
			<font face="Times New Roman, serif">(3)	keep a record of all
			receipts, disbursements, and transactions made on behalf of the
			principal;&nbsp;</font></p>
			</li>
			<li>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%">
			<font face="Times New Roman, serif">(4)	cooperate with any person
			that has authority to make health care decisions for the principal
			to do what you know the principal reasonably expects or, if you do
			not know the principal’s expectations, to act in the principal’s
			best interest; and&nbsp;</font></p>
			</li>
			<li>
	<p align="justify" style="margin-bottom: 0.13in; line-height: 100%">
			<font face="Times New Roman, serif">(5)	attempt to preserve the
			principal’s estate plan if you know the plan and preserving the
			plan is consistent with the principal’s best interest.&nbsp;</font></p>
			</li>
		</ol>
	</ol>
	<p align="center" style="margin-bottom: 0.13in; line-height: 100%"><font face="Times New Roman, serif"><b>Termination
	of agent’s authority</b></font></p>
	<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">You
	must stop acting on behalf of the principal if you learn of any event
	that terminates this power of attorney or your authority under this
	power of attorney. Events that terminate a power of attorney or your
	authority to act under a power of attorney include:&nbsp;</font></p>
	<ol>
		<ol type="a">
			<li>
	<p align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			<font face="Times New Roman, serif">(1)	death of the principal;&nbsp;</font></p>
			</li>
			<li>
	<p align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			<font face="Times New Roman, serif">(2)	the principal’s
			revocation of the power of attorney or your authority;&nbsp;</font></p>
			</li>
			<li>
	<p align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			<font face="Times New Roman, serif">(3)	the occurrence of a
			termination event stated in the power of attorney;&nbsp;</font></p>
			</li>
			<li>
	<p align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			<font face="Times New Roman, serif">(4)	the purpose of the power of
			attorney is fully accomplished; or&nbsp;</font></p>
			</li>
			<li>
	<p align="justify" style="margin-bottom: 0.13in; line-height: 100%">
			<font face="Times New Roman, serif">(5)	if you are married to the
			principal, a legal action is filed with a court to end your
			marriage, or for your legal separation, unless the special
			instructions in this power of attorney state that such an action
			will not terminate your authority.&nbsp;</font></p>
			</li>
		</ol>
	</ol>


	<p align="center" style="margin-bottom: 0.09in; line-height: 100%"><br/>
	<br/>

	</p>


	<p align="center" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif"><b>Liability
	of agent&nbsp;</b></font></p>
	<p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">The
	meaning of the authority granted to you is defined in the maryland
	power of attorney act, title 17 of the estates and trusts article. If
	you violate the maryland power of attorney act, title 17 of the
	estates and trusts article, or act outside the authority granted, you
	may be liable for any damages caused by your violation.</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">If
	there is anything about this document or your duties that you do not
	understand, you should seek legal advice.&nbsp;</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">The
	following optional form may be used by an agent to certify facts
	concerning a power of attorney:&nbsp;</font></p>
	<p align="center" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="center" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="center" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>Agent’s
	certification as to the validity of power of attorney and agent’s
	authority&nbsp;</b></font></p>
	<p align="center" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="center" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">State
	of _________________________	)</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">						)
	ss.&nbsp;</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">County
	of _______________________	)</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0"><a name="_GoBack"></a>
	<font face="Times New Roman, serif">I,
	__________________________________________ (name of agent), certify
	under penalty of perjury that </font>



	<font color="#0000ff">
		<font face="Times New Roman, serif">{{strtoupper($tellUsAboutYou['fullname'])}}</font>
	</font>

	<font face="Times New Roman, serif">
	granted me authority as an agent or successor agent in a Power of
	Attorney dated </font>

	<font face="Times New Roman, serif"><u>				</u></font><font face="Times New Roman, serif">,
	</font><font face="Times New Roman, serif"><u>		</u></font><font face="Times New Roman, serif">.</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">I
	further certify that, to my knowledge:&nbsp;</font></p>
	<ol>
		<ol type="a">
			<li>
	<p align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			<font face="Times New Roman, serif">(1)	the principal is alive and
			has not revoked the power of attorney or my authority to act under
			the power of attorney and the power of attorney and my authority to
			act under the power of attorney have not terminated;&nbsp;</font></p>
			</li>
			<li>
	<p align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			<font face="Times New Roman, serif">(2)	if the power of attorney
			was drafted to become effective on the happening of an event or
			contingency, the event or contingency has occurred;&nbsp;</font></p>
			</li>
			<li>
	<p align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			<font face="Times New Roman, serif">(3)	if i was named as a
			successor agent, the prior agent is no longer able or willing to
			serve; and&nbsp;</font></p>
			</li>
			<li>
	<p align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			<font face="Times New Roman, serif">(4)	_________________________________________________________
			</font>
			</p>
			</li>
		</ol>
	</ol>
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">_______________________________________________________________________</font></p>
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">_______________________________________________________________________</font></p>
	<p align="center" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
	<font face="Times New Roman, serif">(insert other relevant
	statements)</font></p>
	<p style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="center" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%; page-break-before: always">
	<br/>
	<br/>

	</p>
	<p align="center" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
	<font face="Times New Roman, serif"><b>Agent Signature and
	Acknowledgment</b></font></p>
	<p align="center" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
	<br/>
	<br/>

	</p>
	<p style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><u>								</u></font><font face="Times New Roman, serif">	</font><font face="Times New Roman, serif"><u>				</u></font></p>
	<p style="margin-bottom: 0.13in; line-height: 100%"><font face="Times New Roman, serif">	Agent’s
	signature							Date&nbsp;</font></p>
	<p style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><u>								</u></font><font face="Times New Roman, serif">&nbsp;</font></p>
	<p style="margin-bottom: 0.13in; line-height: 100%"><font face="Times New Roman, serif">	Agent’s
	name printed&nbsp;</font></p>
	<p style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><u>								</u></font><font face="Times New Roman, serif">&nbsp;</font></p>
	<p style="margin-bottom: 0.13in; line-height: 100%"><font face="Times New Roman, serif">	Agent’s
	address&nbsp;</font></p>
	<p style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><u>								</u></font><font face="Times New Roman, serif">&nbsp;</font></p>
	<p style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">	Agent’s
	telephone number&nbsp;</font></p>
	<p style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font color="#000000"><font face="Times New Roman, serif">STATE
	OF MARYLAND		)</font></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">				)
	ss.&nbsp;</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font color="#000000"><font face="Times New Roman, serif">COUNTY
	OF ________________	)</font></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-top: 0.13in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">This document was acknowledged
	before me on this ____ day of </font><font face="Times New Roman, serif"><u>				</u></font><font face="Times New Roman, serif">,
	</font>
	</p>
	<p align="justify" style="margin-top: 0.13in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif"><u>		</u></font><font face="Times New Roman, serif">,
	by</font><font face="Times New Roman, serif"><u>					</u></font><font face="Times New Roman, serif">
	to be his/her own act.</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">	</font><font face="Times New Roman, serif"><u>								</u></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">	NOTARY
	PUBLIC</font></p>
	<p style="margin-bottom: 0.06in; line-height: 100%"><br/>
	<br/>

	</p>
	<p style="margin-bottom: 0.06in; line-height: 100%"><br/>
	<br/>

	</p>
	<p style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">My
	commission expires: ___________________</font></p>
	<p style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>

	

</body>
</html>