<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<p align="center" style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif"><font size="5" style="font-size: 17pt"><b>FLORIDA</b></font></font><font color="#000000">
	</font><font face="Times New Roman, serif"><font size="5" style="font-size: 17pt"><b>DURABLE
	POWER OF ATTORNEY FOR MANAGEMENT OF PROPERTY AND PERSONAL AFFAIRS</b></font></font></p>
	<p align="center" style="margin-top: 0.08in; margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><font size="4" style="font-size: 14pt"><b>Pursuant
	to the Florida Power of Attorney Act</b></font></font></p>
	<p align="center" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><b>(§§709.2101, et seq.,
	Florida Statutes)</b></font></p>
	<p align="center" style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font color="#000000"><font face="Times New Roman, serif"><b>THE
	POWERS YOU GRANT BELOW ARE EFFECTIVE<br/>
	EVEN IF YOU BECOME DISABLED
	OR INCOMPETENT</b></font></font></p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font color="#000000"><font face="Times New Roman, serif">NOTICE:&nbsp;
	THE POWERS GRANTED BY THIS DOCUMENT ARE BROAD AND SWEEPING.&nbsp;
	THEY ARE EXPLAINED IN THE UNIFORM STATUTORY FORM POWER OF ATTORNEY
	ACT. IF YOU HAVE ANY QUESTIONS ABOUT THESE POWERS, OBTAIN COMPETENT
	LEGAL ADVICE.&nbsp; THIS DOCUMENT DOES NOT AUTHORIZE ANYONE TO MAKE
	MEDICAL AND OTHER HEALTH-CARE DECISIONS FOR YOU. YOU MAY REVOKE THIS
	POWER OF ATTORNEY IF YOU LATER WISH TO DO SO.<br/>
	</font></font><br/>
	<br/>

	</p>
	<p align="justify" style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font face="Times New Roman, serif"><font face="Times, serif">KNOW
	ALL BY THESE PRESENT:</font></font></p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times, serif">	<br/>
	That I, </font>
	<font color="#0000ff">
		<font face="Times, serif">
			<b>{{strtoupper($tellUsAboutYou['fullname'])}}</b>
		</font>
	</font>

	<font face="Times, serif">,
	of </font>

	<font color="#0000ff">
		<font face="Times, serif">{{$attorneyHolders['address']}}</font>
	</font>

	<font face="Times, serif">, </font>

	<font color="#0000ff">
		<font face="Times, serif">{{$attorneyHolders['city']}}</font>
	</font>

	<font face="Times, serif">, </font>

	<font color="#0000ff">
		<font face="Times, serif">{{$attorneyHolders['state']}}</font>
	</font>

	<font face="Times, serif">,	intend to create a Durable Power of Attorney (herein referred to as
	“this Power”). This Power is effective immediately upon its
	execution. THIS IS A DURABLE POWER OF ATTORNEY AND, EXCEPT AS
	PROVIDED IN SECTION 709.08, FLORIDA STATUTES, THE AUTHORITY OF MY
	AGENT (“ATTORNEY-IN-FACT”) SHALL NOT TERMINATE IF I BECOME
	DISABLED OR INCAPACITATED OR IN THE EVENT OF LATER UNCERTAINTY AS TO
	WHETHER I AM DEAD OR ALIVE.</font>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<br/>

	</p>
	

	<p align="center" style="margin-top: 0.17in; margin-bottom: 0.17in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><font size="4" style="font-size: 14pt"><b>I.	APPOINTMENT</b></font></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	
	<font face="Times New Roman, serif">
		<b>Designation of Agent.  </b>
	</font>

	<font face="Times New Roman, serif">I hereby designate and appoint my </font>

	<font color="#0000ff">
		@if(strtolower($attorneyHolders['relationship']) == 'other')
			<span color="#0433ff">{{ucwords(strtolower($attorneyHolders['other_relationship']))}}</span>
		@else
			<span color="#0433ff">{{ucwords(strtolower($attorneyHolders['relationship']))}}</span>
		@endif
	</font>

	<font face="Times New Roman, serif">, </font>

	<font color="#0000ff">
		<font face="Times New Roman, serif">{{$attorneyHolders['fullname']}}</font>
	</font>

	<font face="Times New Roman, serif"> [</font>

	<font color="#0000ff">
		<font face="Times New Roman, serif"> $attorneyHolders['address']</font>
	</font>

	<font face="Times New Roman, serif">, </font>

	<font color="#0000ff">
		<font face="Times New Roman, serif">{{$attorneyHolders['city']}}</font>
	</font>

	<font face="Times New Roman, serif">, </font>

	<font color="#0000ff">
		<font face="Times New Roman, serif">{{$attorneyHolders['state']}}</font>
	</font>

	<font face="Times New Roman, serif"> (</font>

	<font color="#0000ff">
		<font face="Times New Roman, serif">{{$attorneyHolders['phone']}}</font>
	</font>

	<font face="Times New Roman, serif">)]
	as my Attorney-in-Fact (hereinafter referred to in this Power of
	Attorney as “my agent”).</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<br/>

	</p>


	@if($financialPowerOfAttorney['is_backupattorney'] == 1)
	<p style="margin-bottom: 0in; line-height: 100%">

		<font face="Times New Roman, serif">
			<b>Alternate Agents</b>
		</font>

		<font face="Times New Roman, serif">. If said </font>

		<font color="#0000ff">
			<font face="Times New Roman, serif">{{$attorneyHolders['fullname']}}</font>
		</font>

		<font face="Times New Roman, serif"> is not
	available or becomes ineligible to act, or if I revoke the
	appointment or authority of said Agent to act, then I designate my </font>

	<font color="#0000ff">
		@if(strtolower($attorneyBackup['relationship']) == 'other')
			<span color="#0433ff">{{$attorneyBackup['other_relationship']}}</span>
		@else
			<span color="#0433ff">{{$attorneyBackup['relationship']}}</span>
		@endif
	</font>

	<font face="Times New Roman, serif">, </font>

	<font color="#0000ff">
		<font face="Times New Roman, serif">{{$attorneyBackup['fullname']}}</font>
	</font>

	<font face="Times New Roman, serif"> [</font>

	<font color="#0000ff">
		<font face="Times New Roman, serif">{{$attorneyBackup['address']}}</font>
	</font>

	<font face="Times New Roman, serif">, </font>

	<font color="#0000ff">
		<font face="Times New Roman, serif">{{$attorneyBackup['city']}}</font>
	</font>

	<font face="Times New Roman, serif">, </font>

	<font color="#0000ff">
		<font face="Times New Roman, serif">{{$attorneyBackup['state']}}</font>
	</font>

	<font face="Times New Roman, serif"> (</font>

	<font color="#0000ff">
		<font face="Times New Roman, serif">{{$attorneyBackup['phone']}}</font>
	</font>

	<font face="Times New Roman, serif">)]</font>

	<font color="#0000ff">
		<font face="Times New Roman, serif"></font>
	</font>

	<font face="Times New Roman, serif">as my successor
	Agent to have all of the powers hereinafter set forth.</font></p>
	
	@endif

	<p align="center" style="margin-top: 0.17in; margin-bottom: 0.17in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><font size="4" style="font-size: 14pt"><b>II.	POWERS</b></font></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>Broad
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
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><b>Specific Powers</b></font><font face="Times New Roman, serif">.
	My Agent shall be granted the powers and authority as provided in
	§§709.2201(2) and 709.2208, Florida Statutes.  In addition thereto,
	and not in limitation thereof, I give my Agent</font><font color="#000000"><font face="Times New Roman, serif">
	the power to act for me in any lawful way with respect to the
	following initialed subjects:</font></font></p>
	<p style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font color="#000000"><font face="Times New Roman, serif">TO GRANT
	ALL OF THE FOLLOWING POWERS, INITIAL THE LINE IN FRONT OF (N) AND
	IGNORE THE LINES IN FRONT OF THE OTHER POWERS.<br/>
	<br/>
	TO GRANT
	ONE OR MORE, BUT FEWER THAN ALL, OF THE FOLLOWING POWERS, INITIAL THE
	LINE IN FRONT OF EACH POWER YOU ARE GRANTING.<br/>
	<br/>
	TO WITHHOLD
	A POWER, DO NOT INITIAL THE LINE IN FRONT OF IT. YOU MAY, BUT NEED
	NOT, CROSS OUT EACH POWER WITHHELD.</font></font></p>
	<p align="justify" style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font color="#000000"><font face="Times New Roman, serif">(INITIAL)<br/>
	<br/>
	</font></font><font color="#000000"><font face="Times New Roman, serif"><b>_______
	(A) Real property transactions.</b></font></font><font color="#000000"><font face="Times New Roman, serif">&nbsp;
	To lease, sell, mortgage, purchase, exchange, and acquire, and to
	agree, bargain, and contract for the lease, sale, purchase, exchange,
	and acquisition of, and to accept, take, receive, and possess any
	interest in real property whatsoever, on such terms and conditions,
	and under such covenants, as my Agent shall deem proper; and to
	maintain, repair, tear down, alter, rebuild, improve manage, insure,
	move, rent, lease, sell, convey, subject to liens, mortgages, and
	security deeds, and in any way or manner deal with all or any part of
	any interest in real property whatsoever, including specifically, but
	without limitation, real property lying and being situated in the
	State of Florida, under such terms and conditions, and under such
	covenants, as my Agent shall deem proper and may for all deferred
	payments accept purchase money notes payable to me and secured by
	mortgages or deeds to secure debt, and may from time to time collect
	and cancel any of said notes, mortgages, security interests, or deeds
	to secure debt.	<br/>
	<br/>
	</font></font><font color="#000000"><font face="Times New Roman, serif"><b>_______
	(B) Tangible personal property transactions.</b></font></font><font color="#000000"><font face="Times New Roman, serif">&nbsp;
	To lease, sell, mortgage, purchase, exchange, and acquire, and to
	agree, bargain, and contract for the lease, sale, purchase, exchange,
	and acquisition of, and to accept, take, receive, and possess any
	personal property whatsoever, tangible or intangible, or interest
	thereto, on such terms and conditions, and under such covenants, as
	my Agent shall deem proper; and to maintain, repair, improve, manage,
	insure, rent, lease, sell, convey, subject to liens or mortgages, or
	to take any other security interests in said property which are
	recognized under the Uniform Commercial Code as adopted at that time
	under the laws of the State of Florida or any applicable state, or
	otherwise hypothecate (pledge), and in any way or manner deal with
	all or any part of any real or personal property whatsoever, tangible
	or intangible, or any interest therein, that I own at the time of
	execution or may thereafter acquire, under such terms and conditions,
	and under such covenants, as my Agent shall deem proper.</font></font></p>
	<p align="justify" style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font color="#000000"><font face="Times New Roman, serif"><b>_______
	(C) Stock and bond transactions.</b></font></font><font color="#000000"><font face="Times New Roman, serif">&nbsp;
	To purchase, sell, exchange, surrender, assign, redeem, vote at any
	meeting, or otherwise transfer any and all shares of stock, bonds, or
	other securities in any business, association, corporation,
	partnership, or other legal entity, whether private or public, now or
	hereafter belonging to me.</font></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<font color="#000000"><font face="Times New Roman, serif"><b>_______
	(D) Commodity and option transactions.</b></font></font><font color="#000000"><font face="Times New Roman, serif">&nbsp;To
	buy, sell, exchange, assign, convey, settle and exercise commodities
	futures contracts and call and put options on stocks and stock
	indices traded on a regulated options exchange and collect and
	receipt for all proceeds of any such transactions; establish or
	continue option accounts for the principal with any securities or
	futures broker; and, in general, exercise all powers with respect to
	commodities and options which the principal could if present and
	under no disability. 	<br/>
	<br/>
	</font></font><font color="#000000"><font face="Times New Roman, serif"><b>_______
	(E) Banking and other financial institution transactions.</b></font></font><font color="#000000"><font face="Times New Roman, serif">&nbsp;&nbsp;
	To make, receive, sign, endorse, execute, acknowledge, deliver and
	possess checks, drafts, bills of exchange, letters of credit, notes,
	stock certificates, withdrawal receipts and deposit instruments
	relating to accounts or deposits in, or certificates of deposit of
	banks, savings and loans, credit unions, or other institutions or
	associations.&nbsp; To pay all sums of money, at any time or times,
	that may hereafter be owing by me upon any account, bill of exchange,
	check, draft, purchase, contract, note, or trade acceptance made,
	executed, endorsed, accepted, and delivered by me or for me in my
	name, by my Agent.&nbsp; To borrow from time to time such sums of
	money as my Agent may deem proper and execute promissory notes,
	security deeds or agreements, financing statements, or other security
	instruments in such form as the lender may request and renew said
	notes and security instruments from time to time in whole or in
	part.&nbsp; To have free access at any time or times to any safe
	deposit box or vault to which I might have access.	<br/>
	<br/>
	</font></font><font color="#000000"><font face="Times New Roman, serif"><b>_______
	(F) Business operating transactions.</b></font></font><font color="#000000"><font face="Times New Roman, serif">&nbsp;
	To conduct, engage in, and otherwise transact the affairs of any and
	all lawful business ventures of whatever nature or kind that I may
	now or hereafter be involved in. To organize or continue and conduct
	any business which term includes, without limitation, any farming,
	manufacturing, service, mining, retailing or other type of business
	operation in any form, whether as a proprietorship, joint venture,
	partnership, corporation, trust or other legal entity; operate, buy,
	sell, expand, contract, terminate or liquidate any business; direct,
	control, supervise, manage or participate in the operation of any
	business and engage, compensate and discharge business managers,
	employees, agents, attorneys, accountants and consultants; and, in
	general, exercise all powers with respect to business interests and
	operations which the principal could if present and under no
	disability. 	<br/>
	<br/>
	</font></font><font color="#000000"><font face="Times New Roman, serif"><b>_______
	(G) Insurance and annuity transactions.</b></font></font><font color="#000000"><font face="Times New Roman, serif">&nbsp;
	To exercise or perform any act, power, duty, right, or obligation, in
	regard to any contract of life, accident, health, disability,
	liability, or other type of insurance or any combination of
	insurance; and to procure new or additional contracts of insurance
	for me and to designate the beneficiary of same; provided, however,
	that my Agent cannot designate himself or herself as beneficiary of
	any such insurance contracts.	<br/>
	<br/>
	</font></font><font color="#000000"><font face="Times New Roman, serif"><b>_______
	(H) Estate, trust, and other beneficiary transactions.</b></font></font><font color="#000000"><font face="Times New Roman, serif">&nbsp;
	To accept, receipt for, exercise, release, reject, renounce, assign,
	disclaim, demand, sue for, claim and recover any legacy, bequest,
	devise, gift or other property interest or payment due or payable to
	or for the principal; assert any interest in and exercise any power
	over any trust, estate or property subject to fiduciary control;
	establish a revocable trust solely for the benefit of the principal
	that terminates at the death of the principal and is then
	distributable to the legal representative of the estate of the
	principal; and, in general, exercise all powers with respect to
	estates and trusts which the principal could exercise if present and
	under no disability; provided, however, that the Agent may not make
	or change a will and may not revoke or amend a trust revocable or
	amendable by the principal or require the trustee of any trust for
	the benefit of the principal to pay income or principal to the Agent
	unless specific authority to that end is given.	<br/>
	<br/>
	</font></font><font color="#000000"><font face="Times New Roman, serif"><b>_______
	(I) Claims and litigation.</b></font></font><font color="#000000"><font face="Times New Roman, serif">&nbsp;
	To commence, prosecute, discontinue, or defend all actions or other
	legal proceedings touching my property, real or personal, or any part
	thereof, or touching any matter in which I or my property, real or
	personal, may be in any way concerned. To defend, settle, adjust,
	make allowances, compound, submit to arbitration, and compromise all
	accounts, reckonings, claims, and demands whatsoever that now are, or
	hereafter shall be, pending between me and any person, firm,
	corporation, or other legal entity, in such manner and in all
	respects as my Agent shall deem proper.	<br/>
	<br/>
	</font></font><font color="#000000"><font face="Times New Roman, serif"><b>_______
	(J) Personal and family maintenance.</b></font></font><font color="#000000"><font face="Times New Roman, serif">&nbsp;
	To hire accountants, attorneys at law, consultants, clerks,
	physicians, nurses, agents, servants, workmen, and others and to
	remove them, and to appoint others in their place, and to pay and
	allow the persons so employed such salaries, wages, or other
	remunerations, as my Agent shall deem proper.	<br/>
	<br/>
	</font></font><font color="#000000"><font face="Times New Roman, serif"><b>_______
	(K) Benefits from Social Security, Medicare, Medicaid, or other
	governmental programs, or military service.</b></font></font><font color="#000000"><font face="Times New Roman, serif">&nbsp;
	To prepare, sign and file any claim or application for Social
	Security, unemployment or military service benefits; sue for, settle
	or abandon any claims to any benefit or assistance under any federal,
	state, local or foreign statute or regulation; control, deposit to
	any account, collect, receipt for, and take title to and hold all
	benefits under any Social Security, unemployment, military service or
	other state, federal, local or foreign statute or regulation; and, in
	general, exercise all powers with respect to Social Security,
	unemployment, military service, and governmental benefits, including
	but not limited to Medicare and Medicaid, which the principal could
	exercise if present and under no disability. 	<br/>
	<br/>
	</font></font><font color="#000000"><font face="Times New Roman, serif"><b>_______
	(L) Retirement plan transactions.</b></font></font><font color="#000000"><font face="Times New Roman, serif">&nbsp;
	To contribute to, withdraw from and deposit funds in any type of
	retirement plan (which term includes, without limitation, any tax
	qualified or nonqualified pension, profit sharing, stock bonus,
	employee savings and other retirement plan, individual retirement
	account, deferred compensation plan and any other type of employee
	benefit plan); select and change payment options for the principal
	under any retirement plan; make rollover contributions from any
	retirement plan to other retirement plans or individual retirement
	accounts; exercise all investment powers available under any type of
	self-directed retirement plan; and, in general, exercise all powers
	with respect to retirement plans and retirement plan account balances
	which the principal could if present and under no
	disability.	<br/>
	<br/>
	</font></font><font color="#000000"><font face="Times New Roman, serif"><b>_______
	(M) Tax matters.</b></font></font><font color="#000000"><font face="Times New Roman, serif">&nbsp;
	To prepare, to make elections, to execute and to file all tax, social
	security, unemployment insurance, and informational returns required
	by the laws of the United States, or of any state or subdivision
	thereof, or of any foreign government; to prepare, to execute, and to
	file all other papers and instruments which the Agent shall think to
	be desirable or necessary for safeguarding of me against excess or
	illegal taxation or against penalties imposed for claimed violation
	of any law or other governmental regulation; and to pay, to
	compromise, or to contest or to apply for refunds in connection with
	any taxes or assessments for which I am or may be liable.<br/>
	<br/>
	</font></font><font color="#000000"><font face="Times New Roman, serif"><b>_______
	(N) ALL OF THE POWERS LISTED ABOVE.</b></font></font><font color="#000000"><font face="Times New Roman, serif">
	YOU NEED NOT INITIAL ANY OTHER LINES IF YOU INITIAL LINE (N).</font></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<br/>

	</p>
	
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<br/>

	</p>



	<p style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font face="Times New Roman, serif"><b>LIMITATIONS </b></font>
	</p>
	<p align="justify" style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font face="Times New Roman, serif">My agent MAY NOT do any of the
	following specific acts for me UNLESS I have INITIALED the specific
	authority listed below: </font>
	</p>
	<p align="justify" style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font face="Times New Roman, serif"><font color="#000000">(INITIAL)</font></font></p>
	<p align="justify" style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font face="Times New Roman, serif">_________ (a) To create an <i>inter
	vivos</i> trust on my behalf, whether revocable or irrevocable, under
	which I am a beneficiary; </font>
	</p>
	<p align="justify" style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font face="Times New Roman, serif">_________ (b) To modify, amend,
	revoke or terminate a trust under which I am a beneficiary, and to
	create, amend or revoke trusts for the benefit of others on my
	behalf; </font>
	</p>
	<p align="justify" style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font face="Times New Roman, serif">_________ (c) Make gifts or
	contributions from my assets to any donee, all as may be in my best
	interests with respect to my income tax, estate tax or long-term care
	planning, subject to subsection 709.2202(4), Florida Statutes; </font>
	</p>
	<p align="justify" style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font face="Times New Roman, serif">_________ (d) Create or change
	rights of survivorship; </font>
	</p>
	<p align="justify" style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font face="Times New Roman, serif">_________ (e) Create or change a
	beneficiary designation; </font>
	</p>
	<p align="justify" style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font face="Times New Roman, serif">_________ (f) Waive the
	principal’s right to be a beneficiary of a joint and survivor
	annuity, including a survivor benefit under a retirement plan; or </font>
	</p>
	<p align="justify" style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font face="Times New Roman, serif">_________ (g) Disclaim property
	and powers of appointment; or </font>
	</p>
	<p align="justify" style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font face="Times New Roman, serif">_________ (h) Create, amend,
	modify, or revoke any revocable or irrevocable trust agreement or
	document and transfer assets in which I have any interest, including
	but not limited to real property constituting my homestead or a
	homestead in which I have any interest, to an existing or newly
	created trust for estate, tax, long-term care or Medicaid planning
	purposes, including Qualified Income Trusts so I may be eligible for
	the Medicaid Institutional Care Program (ICP). </font>
	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>SPECIAL
	INSTRUCTIONS: </b></font><font face="Times New Roman, serif">On the
	following lines are any special instructions limiting or extending
	the powers you give to your Agent (Write “None” if no additional
	instructions are given):</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 200%"><font face="Times New Roman, serif"><u>																																																																																										</u></font><font face="Times New Roman, serif">.</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<br/>

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
	<p align="center" style="margin-top: 0.17in; margin-bottom: 0.17in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><font size="4" style="font-size: 14pt"><b>III.	GENERAL
	PROVISIONS</b></font></font></p>
	<p style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font color="#000000"><font face="Times New Roman, serif"><b>When
	Effective.</b></font></font><font color="#000000"><font face="Times New Roman, serif">
	THIS POWER OF ATTORNEY IS EFFECTIVE IMMEDIATELY AND WILL CONTINUE
	UNTIL IT IS REVOKED.</font></font></p>
	<p align="justify" style="margin-top: 0.13in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif"><b>Effect of Incapacity or
	Disability of Principal</b></font><font face="Times New Roman, serif"><b>.</b></font><font face="Times New Roman, serif">
	 My incapacity or disability shall be</font><font color="#212121"><font face="Times New Roman, serif">
	</font></font><font face="Times New Roman, serif">determined ONLY
	upon the occasion of the </font><font face="Times New Roman, serif">written
	certification by a physician licensed to practice under the laws of
	the state of my residency, that I am unable to properly care for
	myself or for my person or property.  After a determination of
	incapacity or disability, I shall be deemed to have regained capacity
	by written certification by a physician licensed to practice under
	the laws of the state of my residency that I am capable of properly
	caring for myself or am able to manage my person or property. </font><font face="Times New Roman, serif"><b>THIS
	POWER OF ATTORNEY IS A “DURABLE” POWER OF ATTORNEY </b></font><font face="Times New Roman, serif"><b>AND,
	TO THE MAXIMUM EXTENT PERMITTED BY LAW, SHALL NOT BE AFFECTED BY MY
	DISABILITY, INCAPACITY OR INCOMPETENCY, OR IN THE EVENT OF LATER
	UNCERTAINTY AS TO WHETHER I AM DEAD OR ALIVE, OR BY LAPSE OF TIME</b></font><font face="Times New Roman, serif"><b>.</b></font><font color="#000000"><font face="Times New Roman, serif">
	</font></font>
	</p>
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
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><b>Reliance by Third Parties</b></font><font face="Times New Roman, serif">.
	 Any person, including my agent, may rely upon the validity of this
	power of attorney or a photocopy of it unless that person knows it
	has terminated or is invalid.</font><font color="#000000"><font face="Times New Roman, serif">
	</font></font><font color="#008f00"><font face="Times New Roman, serif">
	</font></font><font face="Times New Roman, serif">I, for myself and
	on behalf of my heirs, successors, and assigns, hereby waive any
	privilege that may attach to information requested by my Agent in the
	exercise of any of the powers described herein, and agree to hold
	harmless any third party who acts in reliance upon this Power for
	damages or liability incurred as a result of that reliance.  My Agent
	is authorized, at the expense of my estate, to seek interpretation
	and/or enforcement of any power granted to my Agent under this
	document from a court of competent jurisdiction.  </font><font face="Times New Roman, serif">Pursuant
	to §709.2120(3), Florida Statutes, my Agent may seek any appropriate
	legal remedy including, but not limited to, declaratory judgments,
	temporary or permanent injunctions, and damages against any person or
	entity who unreasonably, negligently or willfully fails or refuses to
	follow my Agent's instructions with respect to a power granted to my
	Agent under this document, except as otherwise authorized in
	§709.2120, Florida Statutes.</font></p>
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
	<p style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; page-break-before: always">
	<font face="Times New Roman, serif"><b>NOMINATION OF
	GUARDIAN/CONSERVATOR (OPTIONAL)</b></font><font face="Times New Roman, serif">.</font><font face="Times New Roman, serif"><b>
	</b></font>
	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">If
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
	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">Nominee’s name: </font>
	</p>
	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">______________________________________________________________&nbsp;</font></p>
	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">Nominee’s address: </font>
	</p>
	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">_______________________________________________________&nbsp;</font></p>
	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">Nominee’s telephone number: </font>
	</p>
	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">__________________________________________&nbsp;</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
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
	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">Nominee’s name:  </font>
	</p>
	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">_______________________________________________________________&nbsp;</font></p>
	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">Nominee’s address: </font>
	</p>
	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">______________________________________________________&nbsp;</font></p>
	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">Nominee’s telephone number: </font>
	</p>
	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">__________________________________________&nbsp;</font></p>
	<p align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
	<br/>

	</p>
	<p align="justify" style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font color="#000000"><font face="Times New Roman, serif"><br/>
	</font></font><font color="#000000"><font face="Times New Roman, serif"><b>Choice
	of Law.</b></font></font><font color="#000000"><font face="Times New Roman, serif">&nbsp;
	THIS POWER OF ATTORNEY WILL BE GOVERNED BY THE LAWS OF THE STATE OF
	FLORIDA WITHOUT REGARD FOR CONFLICTS OF LAWS PRINCIPLES. IT WAS
	EXECUTED IN THE STATE OF FLORIDA AND IS INTENDED TO BE VALID IN ALL
	JURISDICTIONS OF THE UNITED STATES OF AMERICA AND ALL FOREIGN
	NATIONS.</font></font></p>
	<p align="justify" style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font face="Times New Roman, serif"><b>Severability</b></font><font face="Times New Roman, serif">.
	If any of the provisions of this Power are found to be invalid for
	any reason, such invalidity shall not affect any of the other
	provisions of this Power, and all invalid provisions shall be wholly
	disregarded.</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>Principal
	Acknowledgement</b></font><font face="Times New Roman, serif">. This
	Power is a legal document that I have prepared myself or that was
	prepared by another acting under my direction, and I understand and
	acknowledge that this document provides my Agent with broad powers to
	dispose of, sell, convey, and encumber my real and personal property;
	the powers granted in this Power will exist for an indefinite period
	of time unless I limit their duration by the terms of this Power or
	revoke this Power, and will continue to exist notwithstanding my
	subsequent disability or incapacity; and I have the right to revoke
	or terminate this Power at any time and must do so in writing.&nbsp;</font></p>
	<p style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="center" style="margin-bottom: 0in; line-height: 100%"><font color="#000000"><font face="Times New Roman, serif"><b>[signature
	and acknowledgement pages follow]</b></font></font></p>
	<p align="center" style="margin-top: 0.25in; margin-bottom: 0.17in; line-height: 100%; orphans: 0; widows: 0; page-break-before: always">
	<br/>
	<br/>

	</p>
	<p align="center" style="margin-top: 0.25in; margin-bottom: 0.17in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><font size="4" style="font-size: 14pt"><b>AFFIDAVIT
	OF PRINCIPAL</b></font></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">STATE OF FLORIDA	)</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">	) ss. </font>
	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">COUNTY OF  ________________	)</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<br/>

	</p>


	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">I, </font>

	<font color="#0000ff">
		<font face="Times New Roman, serif">{{strtoupper($tellUsAboutYou['fullname'])}}</font>
	</font>

	<font face="Times New Roman, serif">,
	</font><font face="Times New Roman, serif">declare to the officer
	taking my acknowledgment of this instrument, and to the subscribing
	witnesses, that I signed and executed this instrument as my Durable
	Power of Attorney.</font></p>
	<p align="justify" style="margin-top: 0.19in; margin-bottom: 0.17in; line-height: 100%">
	<font color="#000000"><font face="Times New Roman, serif">I am fully
	informed as to all the contents of this form and understand the full
	import of this grant of powers to my Agent.  I agree that any third
	party who receives a copy of this document may act under it.
	Revocation of the power of attorney is not effective as to a third
	party until the third party learns of the revocation. I agree to
	indemnify the third party for any claims that arise against the third
	party because of reliance on this power of attorney.</font></font></p>
	<p align="justify" style="margin-top: 0.19in; margin-bottom: 0.17in; line-height: 100%">
	<font color="#000000"><font face="Times New Roman, serif">Signed this
	_______ day of _______________, </font></font><font color="#000000"><font face="Times New Roman, serif"><u>		</u></font></font><font color="#000000"><font face="Times New Roman, serif">.</font></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">	______________________________________</font></p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">					</font><font face="Times New Roman, serif"><b>«</b></font><font color="#0000ff"><font face="Times New Roman, serif">
		<b>{{strtoupper($tellUsAboutYou['fullname'])}}</b>
	</p>
	

	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<br/>

	</p>
	<p style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font color="#000000"><font face="Times New Roman, serif">STATE OF
	FLORIDA <br/>
	COUNTY OF ________________<br/>
	<br/>
	Sworn to (or
	affirmed) and subscribed before me this ______day of _____________
	[month], _________ [year] by </font></font>

	<font color="#0000ff">
		<font face="Times New Roman, serif">{{strtoupper($tellUsAboutYou['fullname'])}}</font>
	</font>

	<font color="#000000"><font face="Times New Roman, serif">.
	The affiant is [choose one:] ____ personally known to me, or ____
	produced the following identification:
	________________________________.<br/>
	</font></font><br/>
	<br/>

	</p>
	<p style="margin-bottom: 0in; line-height: 100%"><font color="#000000"><font face="Times New Roman, serif"><u>						
	</u></font></font><font color="#000000"><font face="Times New Roman, serif">(Seal)</font></font></p>
	<p style="margin-bottom: 0in; line-height: 100%"><font color="#000000"><font face="Times New Roman, serif">Notary
	Public for the State of Florida</font></font></p>
	<p style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p style="margin-bottom: 0in; line-height: 100%"><font color="#000000"><font face="Times New Roman, serif">My
	commission expires: 	</font></font><font color="#000000"><font face="Times New Roman, serif"><u>			</u></font></font></p>
	<p align="justify" style="margin-top: 0.19in; margin-bottom: 0.17in; line-height: 100%">
	<br/>
	<br/>

	</p>
	<p style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="center" style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font color="#000000"><font face="Times New Roman, serif"><b>STATEMENT
	OF WITNESS</b></font></font></p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0"><a name="_GoBack"></a>
	<font color="#000000"><font face="Times New Roman, serif">On the date
	written above, </font></font>

	<font color="#0000ff">
		<font face="Times New Roman, serif">{{strtoupper($tellUsAboutYou['fullname'])}}</font>
	</font>

	<font face="Times New Roman, serif">,</font><font color="#000000"><font face="Times New Roman, serif">
	the principal, declared to me in my presence that this instrument is
	his general durable power of attorney and that he or she had
	willingly signed or directed another to sign for him or her, and that
	he or she executed it as his or her free and voluntary act for the
	purposes therein expressed.</font></font></p>
	<p style="margin-bottom: 0in; line-height: 100%"><font color="#000000"><font face="Times New Roman, serif">_______________________________________
	[Signature of Witness #1] <br/>
	_______________________________________
	[Printed or typed name of Witness #1]
	<br/>
	_______________________________________ [Address of Witness #1,
	Line 1]<br/>
	_______________________________________ [Address of
	Witness #1, Line 2]<br/>
	<br/>
	<br/>
	_______________________________________
	[Signature of Witness #2] <br/>
	_______________________________________
	[Printed or typed name of Witness #2]
	<br/>
	_______________________________________ [Address of Witness #2,
	Line 1]<br/>
	_______________________________________ [Address of
	Witness #2, Line 2]</font></font></p>
	<p style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>



	<table width="100%" cellpadding="10" cellspacing="1" bgcolor="#eeeeee" style="background: #eeeeee">
		<col width="256*">
		<tr>
			<td width="100%" bgcolor="#eeeeee" style="background: #eeeeee" style="border: 2.25pt outset #111111; padding-top: 0.1in; padding-bottom: 0.1in; padding-left: 0.12in; padding-right: 0.1in">
				<p align="justify"><font color="#000000"><font face="Times New Roman, serif"><b>A
				Note About Selecting Witnesses:</b></font></font><font color="#000000"><font face="Times New Roman, serif">&nbsp;
				The agent (attorney-in-fact) may not also serve as a witness.
				&nbsp;Each witness must be present at the time that principal
				signs the Power of Attorney in front of the notary. Each witness
				must be a mentally competent adult.&nbsp; Witnesses should ideally
				reside close by, so that they will be easily accessible in the
				event they are one day needed to affirm this document's validity.</font></font></p>
			</td>
		</tr>
	</table>
	<p align="center" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="center" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="center" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="center" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="center" style="margin-bottom: 0in; line-height: 100%"><font color="#000000"><font face="Times New Roman, serif"><b>ACKNOWLEDGMENT
	OF AGENT</b></font></font></p>
	<p style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font color="#000000"><font face="Times New Roman, serif">BY
	ACCEPTING OR ACTING UNDER THE APPOINTMENT, THE AGENT ASSUMES THE
	FIDUCIARY AND OTHER LEGAL RESPONSIBILITIES OF AN AGENT. </font></font>
	</p>
	<p style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<br/>
	<br/>

	</p>
	<p style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font color="#000000"><font face="Times New Roman, serif">________________________________________________<br/>
	[Typed
	or Printed Name of Agent]<br/>
	&nbsp;</font></font></p>
	<p style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font color="#000000"><font face="Times New Roman, serif">________________________________________________<br/>
	[Signature
	of Agent]</font></font></p>
	<p style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="center" style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%; page-break-before: always">
	<font color="#000000"><font face="Times New Roman, serif"><b>AFFIDAVIT
	OF AGENT (ATTORNEY IN FACT)</b></font></font></p>
	<p style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font color="#000000"><font face="Times New Roman, serif">STATE OF
	FLORIDA <br/>
	COUNTY OF ________________</font></font></p>
	<p style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font color="#000000"><font face="Times New Roman, serif">Before me,
	the undersigned authority, personally appeared
	______________________________<br/>
	(attorney in fact), (&quot;Affiant&quot;),
	who swore or affirmed that: </font></font>
	</p>
	<p style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font color="#000000"><font face="Times New Roman, serif">1. Affiant
	is the attorney in fact named in the Florida General Durable Power of
	Attorney executed by __________________________________ (principal)
	(&quot;Principal&quot;) on _______________ (date). </font></font>
	</p>
	<p style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font color="#000000"><font face="Times New Roman, serif">2. This
	Florida General Durable Power of Attorney is currently exercisable by
	Affiant. The principal is domiciled in
	_____________________________________________ (insert name of state,
	territory, or foreign country). </font></font>
	</p>
	<p style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font color="#000000"><font face="Times New Roman, serif">3. To the
	best of the Affiant's knowledge after diligent search and inquiry: </font></font>
	</p>
	<p style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font color="#000000"><font face="Times New Roman, serif">a. The
	Principal is not deceased; and </font></font>
	</p>
	<p style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font color="#000000"><font face="Times New Roman, serif">b. There
	has been no revocation, partial or complete termination by
	adjudication of incapacity or by the occurrence of an event
	referenced in the durable power of attorney, or suspension by
	initiation of proceedings to determine incapacity or to appoint a
	guardian. </font></font>
	</p>
	<p style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font color="#000000"><font face="Times New Roman, serif">4. Affiant
	agrees not to exercise any powers granted by the Florida General
	Durable Power of Attorney if Affiant attains knowledge that it has
	been revoked, partially or completely terminated, suspended, or is no
	longer valid because of the death or adjudication of incapacity of
	the Principal.</font></font></p>
	<p style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%">
	<font color="#000000"><font face="Times New Roman, serif"><br/>
	</font></font><font color="#000000"><font face="Times New Roman, serif"><b>________________________________________________<br/>
	[Signature
	of Affiant]</b></font></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<br/>

	</p>
	<p style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p style="margin-bottom: 0in; line-height: 100%"><font color="#000000"><font face="Times New Roman, serif">STATE
	OF FLORIDA <br/>
	COUNTY OF ________________<br/>
	<br/>
	Sworn to (or
	affirmed) and subscribed before me this ______day of _____________
	[month], _________ [year] by </font></font><font face="Times New Roman, serif"><u>						</u></font><font face="Times New Roman, serif">
	[agent’s name].  </font><font color="#000000"><font face="Times New Roman, serif">The
	affiant is [choose one:] ____ personally known to me, or ____
	produced the following identification:
	________________________________.<br/>
	</font></font><br/>

	</p>
	<p style="margin-bottom: 0in; line-height: 100%"><font color="#000000"><font face="Times New Roman, serif"><u>						
	</u></font></font><font color="#000000"><font face="Times New Roman, serif">(Seal)</font></font></p>
	<p style="margin-bottom: 0in; line-height: 100%"><font color="#000000"><font face="Times New Roman, serif">Notary
	Public for the State of Florida</font></font></p>
	<p style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p style="margin-bottom: 0in; line-height: 100%"><font color="#000000"><font face="Times New Roman, serif">My
	commission expires: 	</font></font><font color="#000000"><font face="Times New Roman, serif"><u>			</u></font></font></p>

</body>
</html>