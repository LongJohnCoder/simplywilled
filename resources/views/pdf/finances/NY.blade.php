<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

<body>
	
<p align="center" style="margin-bottom: 0.13in; line-height: 100%"><font face="Times New Roman, serif"><b>POWER
OF ATTORNEY</b></font></p>
<p align="center" style="margin-bottom: 0.19in; line-height: 100%"><font face="Times New Roman, serif"><b>NEW
YORK STATUTORY SHORT FORM</b></font></p>
<p align="justify" style="margin-top: 0.09in; margin-bottom: 0.09in; line-height: 100%">
<font face="Times New Roman, serif"><b>CAUTION TO THE PRINCIPAL:</b></font><font face="Times New Roman, serif">
Your Power of Attorney is an important document. As the “principal,”
you give the person whom you choose (your “agent”) authority to
spend your money and sell or dispose of your property during your
lifetime without telling you. You do not lose your authority to act
even though you have given your agent similar authority.</font></p>
<p align="justify" style="margin-top: 0.15in; margin-bottom: 0in; line-height: 100%">
<font face="Times New Roman, serif">When your agent exercises this
authority, he or she must act according to any instructions you have
provided or, where there are no specific instructions, in your best
interest. “Important Information for the Agent” at the end of
this document describes your agent’s responsibilities.</font></p>
<p align="justify" style="margin-top: 0.15in; margin-bottom: 0in; line-height: 100%">
<font face="Times New Roman, serif">Your agent can act on your behalf
only after signing the Power of Attorney before a notary public.</font></p>
<p align="justify" style="margin-top: 0.13in; margin-bottom: 0in; line-height: 100%">
<font face="Times New Roman, serif">You can request information from
your agent at any time. If you are revoking a prior Power of
Attorney, you should provide written notice of the revocation to your
prior agent(s) and to any third parties who have acted upon it,
including the financial institutions where your accounts are located.</font></p>
<p align="justify" style="margin-top: 0.15in; margin-bottom: 0in; line-height: 100%">
<font face="Times New Roman, serif">You can revoke or terminate your
Power of Attorney at any time for any reason as long as you are of
sound mind. If you are no longer of sound mind, a court can remove an
agent for acting improperly.</font></p>
<p align="justify" style="margin-top: 0.15in; margin-bottom: 0in; line-height: 100%">
<font face="Times New Roman, serif">Your agent cannot make health
care decisions for you. You may execute a “Health Care Proxy” to
do this.</font></p>
<p align="justify" style="margin-top: 0.13in; margin-bottom: 0in; line-height: 100%">
<font face="Times New Roman, serif">The law governing Powers of
Attorney is contained in the New York General Obligations Law,
Article 5, Title 15. This law is available at a law library, or
online through the New York State Senate or Assembly websites,
www.senate.state.ny.us or www.assembly.state.ny.us.</font></p>
<p align="justify" style="margin-top: 0.13in; margin-bottom: 0in; line-height: 100%">
<font face="Times New Roman, serif">If there is anything about this
document that you do not understand, you should ask a lawyer of your
own choosing to explain it to you.</font></p>
<p style="margin-bottom: 0.09in; line-height: 100%"><br/>
<br/>

</p>
<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font color="#000000"><font face="Times New Roman, serif"><b>DESIGNATION
OF AGENT</b></font></font><font color="#000000"><font face="Times New Roman, serif">.
I hereby designate and appoint </font></font><font color="#000000"><font face="Times New Roman, serif">my</font></font><font color="#000000"><font face="Times New Roman, serif">
</font></font>

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
<font color="#000000"><font face="Times New Roman, serif">, of </font></font>

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

<font color="#000000">
	<font face="Times New Roman, serif"> (Tel:  </font>
</font>

<font color="#0433ff">
	<font face="Times New Roman, serif">{{$attorneyHolders['phone']}}</font>
</font>

<font color="#000000">
	<font face="Times New Roman, serif">),
	as my Attorney-in-Fact (hereinafter referred to in this Power of
	Attorney as “my agent”) to have all of the powers hereinafter set
	forth.</font>
</font>
</p>

<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

</p>

@if($financialPowerOfAttorney['is_backupattorney'] == 1)


<p align="justify" style="margin-bottom: 0in; line-height: 100%">
	<font color="#000000">
		<font face="Times New Roman, serif">
			<b>DESIGNATION OF ALTERNATE AGENT</b>
		</font>
	</font>

	<font color="#000000">
		<font face="Times New Roman, serif">.If said </font>
	</font>

	<font color="#0433ff">
		<font face="Times New Roman, serif">{{ucwords($attorneyHolders['fullname'])}} </font>
	</font>

	<font color="#000000">
		<font face="Times New Roman, serif">is not available or becomes ineligible to act, or if I revoke their
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

	<font face="Times New Roman, serif"> </font>

	<font color="#000000">
		<font face="Times New Roman, serif">(Tel: </font>
	</font>

	<font color="#0433ff">
		<font face="Times New Roman, serif">{{ucwords($attorneyBackup['phone'])}}</font>
	</font>

	<font color="#000000">
		<font face="Times New Roman, serif">») as my alternate Agent to have all of the powers hereinafter set
			forth.&nbsp;</font>
	</font>
</p>

	@endif

	<p style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>



<p align="justify" style="margin-bottom: 0in; line-height: 100%; page-break-before: always">
<font face="Times New Roman, serif"><b>This POWER OF ATTORNEY </b></font>

<font face="Times New Roman, serif">shall
</font>


@if(array_key_exists('isDurable', $attorneyPowers) && $attorneyPowers['isDurable'] == 1)

<font face="Times New Roman, serif">not be affected </font>

@elseif(array_key_exists('isDurable', $attorneyPowers) && $attorneyPowers['isDurable'] == 0)

<font color="#000000">
	<font face="Times New Roman, serif">terminated </font>
</font>

@endif

<font face="Times New Roman, serif">by
my subsequent incapacity as further described below, under
“Modifications”.</font></p>

<p align="justify" style="margin-top: 0.13in; margin-bottom: 0.03in; line-height: 100%">

<font face="Times New Roman, serif"><b>This POWER OF ATTORNEY DOES
NOT REVOKE </b></font>

<font face="Times New Roman, serif">any prior
Powers of Attorney previously executed by me unless I have stated
otherwise below, under “Modifications”.  If you do NOT intend to
revoke your prior Powers of Attorney, and if you have granted the
same authority in this Power of Attorney as you granted to another
agent in a prior Power of Attorney, each agent can act separately
unless you indicate under “Modifications” that the agents with
the same authority are to act together.</font></p>


<p style="margin-top: 0.13in; margin-bottom: 0.09in; line-height: 100%">
<font face="Times New Roman, serif"><b>GRANT OF AUTHORITY:</b></font><font face="Times New Roman, serif">&nbsp;</font></p>

<p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">To
grant your agent some or all of the authority below, either</font></p>
<ol>
	<li/>
<p align="justify" style="margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">Initial the bracket at each
	authority you grant, or</font></p>
	<li/>
<p align="justify" style="margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">Write or type the letters for
	each authority you grant on the blank line at (P), and initial the
	bracket at (P). If you initial (P), you do not need to initial the
	other lines.</font></p>
</ol>
<p align="justify" style="margin-left: 0.75in; margin-bottom: 0in; line-height: 100%">
<br/>

</p>
<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">I
grant authority to my agent(s) with respect to the following subjects
as defined in §§5-1502A through 5-1502N of the New York General
Obligations Law:</font></p>
<p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">(	)
(A)	real estate transactions;</font></p>
<p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">(	)
(B)	chattel and goods transactions;</font></p>
<p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">(	)
(C)	bond, share, and commodity transactions;</font></p>
<p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">(	)
(D)	banking transactions;</font></p>
<p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">(	)
(E)	business operating transactions;</font></p>
<p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">(	)
(F)	insurance transactions;</font></p>
<p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">(	)
(G)	estate transactions;</font></p>
<p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">(	)
(H)	claims and litigation;</font></p>
<p align="justify" style="margin-left: 0.5in; text-indent: -0.5in; margin-bottom: 0.06in; line-height: 100%">
<font face="Times New Roman, serif">(	) (I)	personal and family
maintenance. If you grant your agent this authority, it will allow
the agent to make gifts that you customarily have made to
individuals, including the agent, and charitable organizations. The
total amount of all such gifts in any one calendar year cannot exceed
five hundred dollars;</font></p>
<p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">(	)
(J)	benefits from governmental programs or civil or military service;</font></p>
<p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">(	)
(K)	health care billing and payment matters; records, reports, and
statements;</font></p>
<p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">(	)
(L)	retirement benefit transactions;</font></p>
<p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">(	)
(M)	tax matters;</font></p>
<p align="justify" style="margin-left: 0.5in; text-indent: -0.5in; margin-bottom: 0.06in; line-height: 100%">
<font face="Times New Roman, serif">(	) (N)	all other matters;</font></p>
<p align="justify" style="margin-left: 0.5in; text-indent: -0.5in; margin-bottom: 0.06in; line-height: 100%">
<font face="Times New Roman, serif">(	) (O)	full and unqualified
authority to my agent(s) to delegate any or all of the foregoing
powers to any person or persons whom my agent(s) select;</font></p>
<p align="justify" style="margin-left: 0.5in; text-indent: -0.5in; margin-bottom: 0.06in; line-height: 100%">
<font face="Times New Roman, serif">(	) (P)	EACH of the matters
identified by the following letters: __________________.</font></p>
<p align="justify" style="margin-bottom: 0.13in; line-height: 100%"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">You
need not initial the other lines if you initial line (P).</font></font></p>
<p style="margin-bottom: 0in; line-height: 100%"><br/>

</p>
<p style="margin-bottom: 0.09in; line-height: 100%; page-break-before: always">
<font face="Times New Roman, serif"><b>MODIFICATIONS: (OPTIONAL)</b></font><font face="Times New Roman, serif">&nbsp;</font></p>
<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">In
this section, you may make additional provisions, including language
to limit or supplement authority granted to your agent. However, you
cannot use this Modifications section to grant your agent authority
to make gifts or changes to interests in your property. If you wish
to grant your agent such authority, you MUST complete the Statutory
Gifts Rider.</font></p>

<p align="justify" style="margin-bottom: 0.06in; line-height: 100%">
	<font color="#000000">
		<font face="Times New Roman, serif">«</font>
	</font>

	<font color="#008f00">
		<font face="Times New Roman, serif">IF PofA Springing?</font>
	</font>

	<font color="#000000">
		<font face="Times New Roman, serif">»</font>
	</font>
</p>

@if(array_key_exists('isIncapacity', $attorneyPowers) && $attorneyPowers['isIncapacity'] == 1)

	<p align="justify" style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif">1.	</font><font color="#000000"><font face="Times New Roman, serif">The
	above authority granted to my </font> </font>

	@if($financialPowerOfAttorney['is_backupattorney'] == 1)

	<font color="#000000">
		<font face="Times New Roman, serif">agents</font>
	</font>

	@else

	<font color="#000000">
		<font face="Times New Roman, serif">agent</font>
	</font>

	@endif

	<font color="#000000"><font face="Times New Roman, serif">
	shall take effect on my disability or incapacity, as determined ONLY
	upon the occasion of the signing of a written statement EITHER:</font></font></p>
	<p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-top: 0.06in; margin-bottom: 0.06in; line-height: 100%">
	<br/>
	<br/>

	</p>


	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">(INSTRUCTIONS: COMPLETE OR OMIT
	SECTION (I) </font><font face="Times New Roman, serif"><b>OR</b></font><font face="Times New Roman, serif">
	SECTION (II) BELOW BUT NEVER COMPLETE BOTH SECTIONS (I) AND (II)
	BELOW. IF YOU DO NOT COMPLETE EITHER SECTION (I) OR SECTION (II)
	BELOW, IT SHALL BE PRESUMED THAT YOU WANT THE PROVISIONS OF SECTION
	(I) BELOW TO APPLY)</font></p>

	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">(I)	By a physician or physicians
	named herein by me at this point:</font></p>


	<p align="justify" style="margin-left: 0.75in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">Dr.
	______________________________________________________________</font></p>

	<p align="justify" style="margin-left: 0.75in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">_________________________________________________________________</font></p>

	<p align="justify" style="margin-left: 0.75in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">_________________________________________________________________</font></p>

	<p align="center" style="margin-left: 0.75in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">(Insert the full name(s) and
	address(es) of the certifying physician(s) chosen by you)</font></p>

	<p align="justify" style="margin-left: 0.75in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">or if no physician or physicians
	are named hereinabove, or if the physician or physicians named
	hereinabove are unable to act, by my regular physician, or by a
	physician who has treated me within one year preceding the date of
	such signing, or by a licensed psychologist or psychiatrist,
	certifying that I am suffering from diminished capacity that would
	preclude me from conducting my affairs in a competent manner;</font></p>


	<p align="center" style="margin-left: 0.38in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif"><b>--OR--</b></font></p>

	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">(II)	By a person or persons named
	herein by me at this point:</font></p>

	<p align="justify" style="margin-left: 0.75in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">__________________________________________________________________</font></p>
	<p align="justify" style="margin-left: 0.75in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">__________________________________________________________________</font></p>
	<p align="center" style="margin-left: 0.75in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">(Insert the full name(s) and
	address(es) of the certifying person(s) chosen by you)</font></p>
	<p align="justify" style="margin-left: 0.75in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">CERTIFYING that the following
	specified event has occurred:</font></p>
	<p align="justify" style="margin-left: 0.75in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">__________________________________________________________________</font></p>
	<p align="justify" style="margin-left: 0.75in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">__________________________________________________________________</font></p>
	<p align="center" style="margin-left: 0.66in; margin-bottom: 0.09in; line-height: 100%">
	<font face="Times New Roman, serif">(Insert hereinabove the specified
	event the certification of which will cause this power of attorney to
	take effect)</font></p>
	
	@else
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font color="#000000"><font face="Times New Roman, serif">1.
			This Power is effective immediately upon execution. </font></font>
		</p>
	@endif





	<p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-top: 0.13in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif"><b>2.	</b></font>

	
	@if(array_key_exists('isDurable', $attorneyPowers) && $attorneyPowers['isDurable'] == 1)

	<font face="Times New Roman, serif"><b>THIS POWER OF
	ATTORNEY IS A “DURABLE” POWER OF ATTORNEY </b></font><font face="Times New Roman, serif"><b>AND,
	TO THE MAXIMUM EXTENT PERMITTED BY LAW, SHALL NOT BE AFFECTED BY MY
	DISABILITY, INCAPACITY OR INCOMPETENCY, OR IN THE EVENT OF LATER
	UNCERTAINTY AS TO WHETHER I AM DEAD OR ALIVE, OR BY LAPSE OF TIME</b></font><font color="#000000"><font face="Times New Roman, serif"><b>,</b></font></font><font color="#000000"><font face="Times New Roman, serif">
	</font></font><font face="Times New Roman, serif"><b>UNLESS OR UNTIL
	OTHERWISE ORDERED BY A COURT OF COMPETENT JURISDICTION.</b></font>

	@elseif(array_key_exists('isDurable', $attorneyPowers) && $attorneyPowers['isDurable'] == 0)

	<font face="Times New Roman, serif"><b>THIS POWER OF
	ATTORNEY SHALL TERMINATE UPON MY DISABILITY OR INCAPACITY, OR UPON MY
	EARLIER REVOCATION OR TERMINATION OF THIS POWER.</b></font>

	@endif

	<font color="#000000">
		<font face="Times New Roman, serif"> </font>
	</font>

	<font face="Times New Roman, serif">My incapacity or
	disability shall be</font>

	<font face="Times New Roman, serif">determined ONLY
	upon the occasion of the </font>

	<font face="Times New Roman, serif">written
	certification by a physician licensed to practice under the laws of
	the state of my residency, that I am unable to properly care for
	myself or for my person or property.  After a determination of
	incapacity or disability, I shall be deemed to have regained capacity
	by written certification by a physician licensed to practice under
	the laws of the state of my residency that I am capable of properly
	caring for myself or am able to manage my person or property.</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">2.	My agent has the power and
	authority to request, review, and receive, to the extent I could do
	so individually, any information, verbal or written, regarding my
	physical or mental health, including, but not limited to, my
	individually identifiable health information or other medical
	records. This release authority applies to any information governed
	by the Health Insurance Portability and Accountability Act of 1996
	(HIPAA), 42 U.S.C. 1320d and 45 CFR 160-164. I hereby authorize any
	physician, health care professional, dentist, health plan, hospital,
	clinic, laboratory, pharmacy, or other covered health care provider,
	any insurance company, and the Medical Information Bureau, Inc., or
	other health care clearinghouse that has provided treatment or
	services to me, or that has paid for or is seeking payment from me
	for such services, to give, disclose, and release to my agent,
	without restriction, all of my individually identifiable health
	information and medical records regarding any past, present, or
	future medical or mental health condition. This authority given my
	agent shall supersede any other agreement which I may have made with
	my health care providers to restrict access to or disclosure of my
	individually identifiable health information. This authority given my
	agent shall be effective during all times that this Power of Attorney
	is effective, and shall terminate as provided herein or in the event
	that I revoke the authority in writing and deliver it to my health
	care provider.</font></p>
	<p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0in; line-height: 100%">
	<br/>

	</p>
	<p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">3.	My agent has the power and
	authority to access, continue, modify, maintain, terminate, or take
	any other action in connection with any of my digital accounts,
	assets or rights, including the power to create or change any
	passwords and user identification profiles.</font></p>
	<p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0in; line-height: 100%">
	<br/>

	</p>
	<p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">4.	In addition, I make the
	following additional modifications:</font></p>
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
	<font face="Times New Roman, serif">________________________________________________________________________</font></p>
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
	<font face="Times New Roman, serif">________________________________________________________________________</font></p>
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
	<font face="Times New Roman, serif">________________________________________________________________________</font></p>
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0.13in; line-height: 100%">
	<font face="Times New Roman, serif">________________________________________________________________________</font></p>
	<p style="margin-bottom: 0.09in; line-height: 100%"><br/>
	<br/>

	</p>



	<p style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif"><b>CERTAIN
	GIFT TRANSACTIONS: STATUTORY GIFTS RIDER (OPTIONAL)</b></font></p>
	<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">In
	order to authorize your agent to make gifts in excess of an annual
	total of $500 for all gifts described in (I) of the grant of
	authority section of this document (under personal and family
	maintenance), you must initial the statement below and execute a
	Statutory Gifts Rider at the same time as this instrument. Initialing
	the statement below by itself does not authorize your agent to make
	gifts. The preparation of the Statutory Gifts Rider should be
	supervised by a lawyer.</font></p>

	@if(array_key_exists('isAuthorizeToOperategift', $attorneyPowers) && $attorneyPowers['isAuthorizeToOperategift'] == 1)
	
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0.13in; line-height: 100%">
	 <font face="Times New Roman, serif">(		) (INITIAL) (SGR) I grant my
	agent authority to make gifts in accordance with the terms and
	conditions of the Statutory Gifts Rider that supplements this
	Statutory Power of Attorney.</font></p>
	
	@elseif(!array_key_exists('isAuthorizeToOperategift', $attorneyPowers) || $attorneyPowers['isAuthorizeToOperategift'] == 0)

	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0.13in; line-height: 100%">
	<font color="#000000">
		<font face="Times New Roman, serif">«</font>
	</font>
	</p>
	

	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0.13in; line-height: 100%">
	<font face="Times New Roman, serif">I decline to grant my agent
	authority to make gifts in excess of the annual total of $500 for all
	gifts described in (I) of the grant of authority section of this
	document (under personal and family maintenance).</font></p>
	
	@endif

	<p style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif"><b>DESIGNATION
	OF MONITOR(S): (OPTIONAL)</b></font><font face="Times New Roman, serif">&nbsp;</font></p>
	<p align="justify" style="margin-bottom: 0.13in; line-height: 100%"><font face="Times New Roman, serif">I
	wish to designate ____________________________________, whose address
	is, as monitor. Upon the request of the monitor, my agent(s) must
	provide the monitor with a copy of the power of attorney and a record
	of all transactions done or made on my behalf; unless reasonable
	cause exists to require otherwise, the agent shall not be obligated
	by the monitor to provide financial details or accountings more
	frequently than annually. Third parties holding records of such
	transactions shall provide the records to the monitor upon request.</font></p>
	<p style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif"><b>COMPENSATION
	OF AGENT(S): (OPTIONAL)</b></font><font face="Times New Roman, serif">&nbsp;</font></p>
	<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">Your
	agent is entitled to be reimbursed from your assets for reasonable
	expenses incurred on your behalf. If you ALSO wish your agent(s) to
	be compensated from your assets for services rendered on your behalf,
	initial the statement below. If you wish to define “reasonable
	compensation”, you may do so above, under “Modifications”.</font></p>
	<p align="justify" style="margin-left: 0.38in; margin-bottom: 0.13in; line-height: 100%">
	<font face="Times New Roman, serif">(	) My agent(s) shall be entitled
	to reasonable compensation for services rendered.</font></p>
	<p style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif"><b>ACCEPTANCE
	BY THIRD PARTIES:</b></font><font face="Times New Roman, serif">&nbsp;</font></p>
	<p align="justify" style="margin-bottom: 0.13in; line-height: 100%"><font face="Times New Roman, serif">I
	agree to indemnify the third party for any claims that may arise
	against the third party because of reliance on this Power of
	Attorney. I understand that any termination of this Power of
	Attorney, whether the result of my revocation of the Power of
	Attorney or otherwise, is not effective as to a third party until the
	third party has actual notice or knowledge of the termination.</font></p>
	<p style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif"><b>TERMINATION:</b></font><font face="Times New Roman, serif">&nbsp;</font></p>
	<p align="justify" style="margin-bottom: 0.13in; line-height: 100%"><font face="Times New Roman, serif">This
	Power of Attorney continues until I revoke it or it is terminated by
	my death or other event described in §5-1511 of the General
	Obligations Law. §5-1511 of the General Obligations Law describes
	the manner in which you may revoke your Power of Attorney, and the
	events which terminate the Power of Attorney.</font><font face="Times New Roman, serif"><b>
	</b></font>
	</p>
	<p style="margin-bottom: 0.09in; line-height: 100%; page-break-before: always">
	<br/>
	<br/>

	</p>
	<p align="center" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif"><b>SIGNATURE
	AND ACKNOWLEDGMENT:</b></font></p>
	<p align="center" style="margin-bottom: 0.09in; line-height: 100%"><br/>
	<br/>

	</p>



	<p align="justify" style="margin-bottom: 0in; line-height: 100%">
		<font color="#000000"><font face="Times New Roman, serif">In Witness Whereof, I have hereunto signed my name on this </font>
	</font>

	<font color="#000000"><font face="Times New Roman, serif"><u>	</u></font></font><font color="#000000"><font face="Times New Roman, serif">
	day of </font></font><font color="#000000"><font face="Times New Roman, serif"><u>				</u></font></font><font color="#000000"><font face="Times New Roman, serif">,
	</font></font><font color="#000000"><font face="Times New Roman, serif"><u>	</u></font></font><font color="#000000"><font face="Times New Roman, serif">.</font></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
	<font face="Times New Roman, serif">_______________________________________</font></p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	
	<font color="#0000ff">
		<font face="Times New Roman, serif">
			<b>{{strtoupper($tellUsAboutYou['fullname'])}}</b>
		</font>
	</font>
	

	<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
	<font color="#0433ff">
		<font face="Times New Roman, serif">{{$tellUsAboutYou['address']}}</font>
	</font>
	</p>


	<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">

		<font color="#0433ff">
			<font face="Times New Roman, serif">{{ucwords($tellUsAboutYou['city'])}}</font>
		</font>

		<font color="#000000">
			<font face="Times New Roman, serif">, </font>
		</font>

		<font color="#0433ff">
			<font face="Times New Roman, serif">{{ucwords($tellUsAboutYou['state'])}}</font>
		</font>


		<font color="#0433ff">
			<font face="Times New Roman, serif">{{ucwords($tellUsAboutYou['zip'])}}</font>
		</font>
	
	</p>
	

	<p align="justify" style="margin-left: 0.5in; margin-bottom: 0.13in; line-height: 100%">
	<font color="#0433ff">
		<font face="Times New Roman, serif">{{$tellUsAboutYou['phone']}}</font>
	</font><font color="#000000"><font face="Times New Roman, serif">»</font></font></p>
	<p align="justify" style="margin-left: 2.44in; margin-bottom: 0in; line-height: 100%">
	<br/>

	</p>
	
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">STATE
	OF NEW YORK</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">COUNTY
	OF ___________________</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">On the ____________ day of
	_________________ in the year __________ before me, the undersigned,
	personally appeared </font>


	<font color="#0000ff">
		<font face="Times New Roman, serif">
			<b>{{strtoupper($tellUsAboutYou['fullname'])}}</b>
		</font>
	</font>

	<font face="Times New Roman, serif">,
	personally known to me or proved to me on the basis of satisfactory
	evidence to be the individual whose name is subscribed to the within
	instrument and acknowledged to me that he/she/they executed the same
	in his/her/their capacity, and that by his/her/their signature(s) on
	the instrument, the individual(s), or the person upon behalf of which
	the individual acted, executed the instrument.</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">______________________________</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">Notary
	Public</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">Printed
	Name: _________________</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>



	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">My
	Commission Expires: _____________________</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="center" style="margin-bottom: 0.09in; line-height: 100%; page-break-before: always">
	<font face="Times New Roman, serif"><b>IMPORTANT INFORMATION FOR THE
	AGENT</b></font></p>
	<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><br/>
	<br/>

	</p>


	<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">When
	you accept the authority granted under this Power of Attorney, a
	special legal relationship is created between you and the principal.
	This relationship imposes on you legal responsibilities that continue
	until you resign or the Power of Attorney is terminated or revoked.
	You must:</font></p>
	<p style="margin-left: 0.56in; text-indent: -0.19in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">1.	act according to any
	instructions from the principal, or, where there are no instructions,
	in the principal’s best interest;</font></p>
	<p style="margin-left: 0.56in; text-indent: -0.19in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">2.	avoid conflicts that would
	impair your ability to act in the principal’s best interest;&nbsp;</font></p>
	<p style="margin-left: 0.56in; text-indent: -0.19in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">3.	keep the principal’s
	property separate and distinct from any assets you own or control,
	unless otherwise permitted by law;&nbsp;</font></p>
	<p style="margin-left: 0.56in; text-indent: -0.19in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">4.	keep a record or all receipts,
	payments, and transactions conducted for the principal; and</font></p>
	<p style="margin-left: 0.56in; text-indent: -0.19in; margin-bottom: 0.06in; line-height: 100%">
	<font face="Times New Roman, serif">5.	disclose your identity as an
	agent whenever you act for the principal by writing or printing the
	principal’s name and signing your own name as “agent” in either
	of the following manners: (Principal’s Name) by (Your Signature) as
	Agent, or (Your Signature) as Agent for (Principal’s Name).&nbsp;</font></p>
	<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><br/>
	<br/>

	</p>


	<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">You
	may not use the principal’s assets to benefit yourself or anyone
	else or make gifts to yourself or anyone else unless the principal
	has specifically granted you that authority in this document, which
	is either a Statutory Gifts Rider attached to a Statutory Short Form
	Power of Attorney or a Non-Statutory Power of Attorney. If you have
	that authority, you must act according to any instructions of the
	principal or, where there are no such instructions, in the
	principal’s best interest. You may resign by giving written notice
	to the principal and to any co-agent, successor agent, monitor if one
	has been named in this document, or the principal’s guardian if one
	has been appointed. If there is anything about this document or your
	responsibilities that you do not understand, you should seek legal
	advice.</font></p>
	<p align="center" style="margin-bottom: 0.06in; line-height: 100%"><br/>
	<br/>

	</p>


	<p align="center" style="margin-bottom: 0.06in; line-height: 100%"><font face="Times New Roman, serif"><u>Liability
	of agent</u></font><font face="Times New Roman, serif">:</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">The
	meaning of the authority given to you is defined in New York’s
	General Obligations Law, Article 5, Title 15. If it is found that you
	have violated the law or acted outside the authority granted to you
	in the Power of Attorney, you may be liable under the law for your
	violation.</font></p>
	<p style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>


	<p align="justify" style="margin-top: 0.13in; margin-bottom: 0.09in; line-height: 100%; page-break-before: always">
	<font face="Times New Roman, serif"><b>AGENT’S SIGNATURE AND
	ACKNOWLEDGMENT OF APPOINTMENT: </b></font><font face="Times New Roman, serif">It
	is not required that the principal and the agent(s) sign at the same
	time, nor that multiple agents sign at the same time.</font></p>
	<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">I, </font><font color="#0433ff"><font face="Times New Roman, serif">
	{{$attorneyHolders['fullname']}}</font></font><font face="Times New Roman, serif">,
	have read the foregoing Power of Attorney. I am the person identified
	therein as agent for the principal named therein.</font></p>
	
	<p align="justify" style="margin-bottom: 0.13in; line-height: 100%"><font face="Times New Roman, serif">I
	acknowledge my legal responsibilities.</font></p>
	
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	
	<p align="justify" style="margin-bottom: 0.19in; line-height: 100%"><font face="Times New Roman, serif">Agent
	signs here:	__________________________________________</font></p>
	
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">STATE
	OF NEW YORK</font></font></p>
	
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">COUNTY
	OF ___________________</font></font></p>
	
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">On
	the ____________ day of _________________ in the year __________
	before me, the undersigned, personally appeared,</font></font>
	<font color="#0433ff">
		<font face="Times New Roman, serif">
			<font size="2" style="font-size: 9pt">{{$attorneyHolders['fullname']}}</font>
		</font>
	</font>

	<font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">»,
	personally known to me or proved to me on the basis of satisfactory
	evidence to be the individual(s) whose name(s) is (are) subscribed to
	the within instrument and acknowledged to me that he/she/they
	executed the same in his/her/their capacity (ies), and that by
	his/her/their signature(s) on the instrument, the individual(s), or
	the person upon behalf of which the individual(s) acted, executed the
	instrument.</font></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">______________________________</font></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">Notary
	Public</font></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">Printed
	Name: _________________</font></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">My
	Commission Expires: _____________________</font></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>


	<p style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif"><b>SUCCESSOR
	AGENT’S SIGNATURE AND ACKNOWLEDGMENT OF APPOINTMENT: </b></font><font face="Times New Roman, serif">It
	is not required that the principal and the SUCCESSOR agent sign at
	the same time, nor that multiple SUCCESSOR agents sign at the same
	time. Furthermore, successor agents can not use this power of
	attorney unless the agent(s) designated above is/are unable or
	unwilling to serve.</font></p>
	<p style="margin-bottom: 0.09in; line-height: 100%">
	
	<font face="Times New Roman, serif">I </font>

	@if($financialPowerOfAttorney['is_backupattorney'] == 1)
		<font color="#0433ff">
			<font face="Times New Roman, serif">{{$attorneyBackup['fullname']}}</font>
		</font>
	@else
		<font color="#0433ff">
			<font face="Times New Roman, serif">________________________</font>
		</font>
	@endif

	
	<font face="Times New Roman, serif">, have
	read the foregoing Power of Attorney. I am the person identified
	therein as SUCCESSOR agent(s) for the principal named therein.</font></p>
	<p align="justify" style="margin-top: 0.09in; margin-bottom: 0.09in; line-height: 100%">
	<font face="Times New Roman, serif">I acknowledge my legal
	responsibilities.</font></p>
	<p align="justify" style="margin-bottom: 0.13in; line-height: 100%"><font face="Times New Roman, serif">Agent
	signs here:	__________________________________________</font></p>
	<p align="justify" style="margin-bottom: 0.13in; line-height: 100%"><br/>
	<br/>

	</p>

	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">STATE
	OF NEW YORK</font></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">COUNTY
	OF ___________________</font></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">On
	the ____________ day of _________________ in the year __________
	before me, the undersigned, personally appeared,</font></font>

	@if($financialPowerOfAttorney['is_backupattorney'] == 1)
		<font color="#0433ff">
			<font face="Times New Roman, serif">{{$attorneyBackup['fullname']}}</font>
		</font>
	@else
		<font color="#0433ff">
			<font face="Times New Roman, serif">________________________</font>
		</font>
	@endif

	<font face="Times New Roman, serif">
		<font size="2" style="font-size: 9pt">,
	personally known to me or proved to me on the basis of satisfactory
	evidence to be the individual(s) whose name(s) is (are) subscribed to
	the within instrument and acknowledged to me that he/she/they
	executed the same in his/her/their capacity (ies), and that by
	his/her/their signature(s) on the instrument, the individual(s), or
	the person upon behalf of which the individual(s) acted, executed the
	instrument.</font>
	</font>
	</p>
	
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>


	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">______________________________</font></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">Notary
	Public</font></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">Printed
	Name: _________________</font></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">My
	Commission Expires: _____________________</font></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>

	@if(array_key_exists('isAuthorizeToMakeGift', $attorneyPowers) && $attorneyPowers['isAuthorizeToMakeGift'] == 1)

		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="center" style="margin-bottom: 0.13in; line-height: 100%"><font face="Times New Roman, serif"><font size="4" style="font-size: 13pt"><b>POWER
		OF ATTORNEY</b></font></font></p>
		<p align="center" style="margin-top: 0.06in; margin-bottom: 0.06in; line-height: 100%">
		<font face="Times New Roman, serif"><b>STATUTORY GIFTS RIDER</b></font></p>
		<p align="center" style="margin-top: 0.06in; margin-bottom: 0.13in; line-height: 100%">
		<font face="Times New Roman, serif"><b>AUTHORIZATION FOR CERTAIN GIFT
		TRANSACTIONS</b></font></p>
		<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
		<font face="Times New Roman, serif">Attached to a New York Statutory
		Short Form Power of Attorney dated <br/>
		</font><font face="Times New Roman, serif"><u>			</u></font><font face="Times New Roman, serif">,
		</font><font face="Times New Roman, serif"><u>		</u></font><font face="Times New Roman, serif">,
		made by </font>
		<font color="#0000ff">
			<font face="Times New Roman, serif">{{strtoupper($tellUsAboutYou['fullname'])}}</font>
		</font>

		<font face="Times New Roman, serif">.</font>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>CAUTION
		TO THE PRINCIPAL: </b></font><font face="Times New Roman, serif">This
		OPTIONAL rider allows you to authorize your agent to make gifts in
		excess of an annual total of $500 for all gifts described in (I) of
		the Grant of Authority section of the statutory short form Power of
		Attorney (under personal and family maintenance), or certain other
		gift transactions during your lifetime. You do not have to execute
		this rider if you only want your agent to make gifts described in (I)
		of the Grant of Authority section of the statutory short form Power
		of Attorney and you initialed “(I)” on that section of that form.
		Granting any of the following authority to your agent gives your
		agent the authority to take actions which could significantly reduce
		your property or change how your property is distributed at your
		death. “Certain gift transactions” are described in §5-1514 of
		the General Obligations Law. This Gifts Rider does not require your
		agent to exercise granted authority, but when he or she exercises
		this authority, he or she must act according to any instructions you
		provide, or otherwise in your best interest.</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>



		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif">This
		Statutory Gifts Rider and the Power of Attorney it supplements must
		be read together as a single instrument.</font></p>
		<p align="justify" style="margin-bottom: 0.13in; line-height: 100%"><font face="Times New Roman, serif">Before
		signing this document authorizing your agent to make gifts, you
		should seek legal advice to ensure that your intentions are clearly
		and properly expressed.</font></p>
		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif"><b>(a)	GRANT
		OF LIMITED AUTHORITY TO MAKE GIFTS:</b></font></p>
		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif"><i>Granting
		gifting authority to your agent gives your agent the authority to
		take actions which could significantly reduce your property. If you
		wish to allow your agent to make gifts to himself or herself, you
		must separately grant that authority in subdivision (c) below.</i></font></p>
		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif"><i>To
		grant your agent the gifting authority provided below, </i></font><font face="Times New Roman, serif"><i><u><b>initial</b></u></i></font><font face="Times New Roman, serif"><i>
		the bracket to the left of the authority.</i></font></p>
		<p align="justify" style="margin-left: 0.5in; margin-bottom: 0.13in; line-height: 100%">
		<font face="Times New Roman, serif">(	) I grant authority to my agent
		to make gifts to my spouse, children and more remote descendants, and
		parents, not to exceed, for each donee, the annual federal gift tax
		exclusion amount pursuant to the Internal Revenue Code. For gifts to
		my children and more remote descendants, and parents, the maximum
		amount of the gift to each donee shall not exceed twice the gift tax
		exclusion amount, if my spouse agrees to split gift treatment
		pursuant to the Internal Revenue Code. </font>
		</p>
		<p align="justify" style="margin-bottom: 0.13in; line-height: 100%"><font face="Times New Roman, serif">This
		authority must be exercised pursuant to my instructions, or otherwise
		for purposes which the agent reasonably deems to be in my best
		interest.</font></p>
		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif"><b>(b)
			MODIFICATIONS:</b></font></p>
		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif"><i>Use
		this section if you wish to authorize gifts in excess of the above
		amount, gifts to other beneficiaries or other types of transfers. 
		</i></font><font face="Times New Roman, serif"><i><u><b>Initial</b></u></i></font><font face="Times New Roman, serif"><i>
		the bracket to the left of each specific authorization you intend to
		grant your agent to make gifts on your behalf from your estate.</i></font></p>
		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif"><i>Granting
		such authority to your agent gives your agent the authority to take
		actions which could significantly reduce your property and/or change
		how your property is distributed at your death. If you wish to
		authorize your agent to make gifts or transfers to himself or
		herself, you must separately grant that authority in subdivision (c)
		below.</i></font></p>
		<p align="justify" style="margin-left: 0.38in; margin-bottom: 0.13in; line-height: 100%">
		<font face="Times New Roman, serif">(		) (</font><font face="Times New Roman, serif"><b>INITIAL</b></font><font face="Times New Roman, serif">)
		I grant the following authority to my agent to make gifts or
		transfers pursuant to my instructions, or otherwise for purposes
		which the agent reasonably deems to be in my best interest:</font></p>
		<p align="justify" style="text-indent: 0.38in; margin-bottom: 0in; line-height: 100%">
		<u>            </u>  <font face="Times New Roman, serif">Make gifts
		to any person or persons in such amounts as my agent deems
		appropriate</font><font color="#000000"><font face="Times New Roman, serif">;</font></font></p>
		<p align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
		<br/>

		</p>
		<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
		<u>           </u>  <font face="Times New Roman, serif">Open, modify
		or terminate a deposit account in the name of the principal and other
		joint tenants;</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
		<u>           </u>  <font face="Times New Roman, serif">Open, modify
		or terminate any other joint account in the name of the principal and
		other joint tenants;</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
		<u>           </u>  <font face="Times New Roman, serif">Open, modify
		or terminate a bank account in trust form as described in §7-5.1 of
		the Estates, Powers and Trusts Law, and designate or change the
		beneficiary or beneficiaries of such account;</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
		<u>           </u>  <font face="Times New Roman, serif">Open, modify
		or terminate a “transfer on death account” as described in Part
		Four of Article Thirteen of the Estates, Powers and Trusts Law, and
		designate or change the beneficiary or beneficiaries of such account;</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
		<u>           </u>  <font face="Times New Roman, serif">Change the
		beneficiary or beneficiaries of any contract of insurance on the life
		of the principal or annuity contract for the benefit of the
		principal;</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>




		<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
		<u>           </u>  <font face="Times New Roman, serif">Procure new,
		different or additional contracts of insurance on the life of the
		principal or annuity contracts for the benefit of the principal and
		designate the beneficiary or beneficiaries of any such contract;</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
		<u>           </u>  <font face="Times New Roman, serif">Designate or
		change the beneficiary or beneficiaries of any type of retirement
		benefit or plan;</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
		<u>           </u>  <font face="Times New Roman, serif">Create,
		amend, revoke, or terminate an </font><font face="Times New Roman, serif"><i>inter
		vivos</i></font><font face="Times New Roman, serif"> trust, and
		transfer and convey to the trustee or trustees then acting of any
		trust of which I am the Grantor all assets, real or personal, now or
		at any time hereafter in my name (or owned jointly, commonly or
		otherwise with any person or persons); and </font>
		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
		<u>           </u>  <font face="Times New Roman, serif">Create,
		change or terminate other property interests or rights of
		survivorship, and designate or change the beneficiary or
		beneficiaries therein.</font></p>
		<p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0.09in; line-height: 100%">
		<br/>
		<br/>

		</p>
		
		<p align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0.09in; line-height: 100%">
		<font face="Times New Roman, serif"><b>(c)	GRANT OF SPECIFIC
		AUTHORITY FOR AN AGENT TO MAKE GIFTS TO HIMSELF OR HERSELF:
		(OPTIONAL)</b></font></p>
		
		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif"><i>If
		you wish to authorize your agent to make gifts to himself or herself,
		you must grant that authority in this section, indicating to which
		agent(s) the authorization is granted, and any limitations and
		guidelines.</i></font></p>
		
		@if(array_key_exists('isAuthorizeToOperategift', $attorneyPowers) && $attorneyPowers['isAuthorizeToOperategift'] == 1)

		<p align="justify" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
		
		<font face="Times New Roman, serif">(		) (INITIAL) I grant specific
		authority for </font>
		

		<font color="#0433ff">
			<font face="Times New Roman, serif">{{$attorneyHolders['fullname']}}</font>
		</font>

		<font color="#000000">
			<font face="Times New Roman, serif"> and </font>
		</font>

		<font color="#0433ff">
			@if($financialPowerOfAttorney['is_backupattorney'] == 1)
				<font color="#0433ff">
					<font face="Times New Roman, serif">{{$attorneyBackup['fullname']}}</font>
				</font>
			@else
				<font color="#0433ff">
					<font face="Times New Roman, serif">________________________</font>
				</font>
			@endif
		</font>

		<font color="#000000"><font face="Times New Roman, serif">
		</font></font><font face="Times New Roman, serif">to make the
		following gifts to himself or herself:</font></p>
		<p align="justify" style="margin-left: 0.75in; margin-bottom: 0.09in; line-height: 100%">
		<font face="Times New Roman, serif">____________________________________________________________________
		</font>
		</p>
		<p align="justify" style="margin-left: 0.75in; margin-bottom: 0.09in; line-height: 100%">
		<font face="Times New Roman, serif">____________________________________________________________________</font></p>
		<p align="justify" style="margin-left: 0.75in; margin-bottom: 0.09in; line-height: 100%">
		<font face="Times New Roman, serif">____________________________________________________________________</font></p>
		<p align="justify" style="margin-left: 0.75in; margin-bottom: 0.13in; line-height: 100%">
		<font face="Times New Roman, serif">____________________________________________________________________</font></p>
		<p align="justify" style="margin-bottom: 0.13in; line-height: 100%"><font face="Times New Roman, serif">This
		authority must be exercised pursuant to my instructions, or otherwise
		for purposes which the agent reasonably deems to be in my best
		interest.</font></p>


		@elseif(array_key_exists('isAuthorizeToOperategift', $attorneyPowers) && $attorneyPowers['isAuthorizeToOperategift'] == 0)

		<p align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
		<font face="Times New Roman, serif">I decline to grant specific
		authority for </font>

	
		<font color="#0433ff">
			<font face="Times New Roman, serif">{{$attorneyHolders['fullname']}}</font>
		</font>

		<font color="#000000"><font face="Times New Roman, serif">
		and </font></font>

		<font color="#0433ff">
			@if($financialPowerOfAttorney['is_backupattorney'] == 1)
				<font color="#0433ff">
					<font face="Times New Roman, serif">{{$attorneyBackup['fullname']}}</font>
				</font>
			@else
				<font color="#0433ff">
					<font face="Times New Roman, serif">________________________</font>
				</font>
			@endif
		</font>


		<font face="Times New Roman, serif">to make gifts to
		him or herself, or to persons to whom he or she has a legal
		obligation to support.</font></p>
		
		@endif


		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif"><b>(d)	ACCEPTANCE
		BY THIRD PARTIES: </b></font><font face="Times New Roman, serif">I
		agree to indemnify the third party for any claims that may arise
		against the third party because of reliance on this Statutory Gifts
		Rider.</font></p>
		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><br/>
		<br/>

		</p>


		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><font face="Times New Roman, serif"><b>(e)	SIGNATURE
		OF PRINCIPAL AND ACKNOWLEDGMENT:</b></font></p>
		
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font color="#000000"><font face="Times New Roman, serif">In
		Witness Whereof, I have hereunto signed my name on this</font></font><font color="#008f00"><font face="Times New Roman, serif">
		</font></font><font color="#000000"><font face="Times New Roman, serif">____
		day of </font></font><font color="#000000"><font face="Times New Roman, serif"><u>			</u></font></font><font color="#000000"><font face="Times New Roman, serif">,<br/>

		</font></font><font color="#000000"><font face="Times New Roman, serif"><u>		</u></font></font><font color="#000000"><font face="Times New Roman, serif">.</font></font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
		<font face="Times New Roman, serif">_______________________________________</font></p>
		<p align="justify" style="margin-left: 0.5in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
		<font face="Times New Roman, serif"></font>

		<font color="#0000ff">
			<font face="Times New Roman, serif">
				<b>{{strtoupper($tellUsAboutYou['fullname'])}}</b>
			</font>
		</font>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">STATE
		OF NEW YORK</font></font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">COUNTY
		OF ___________________</font></font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
		<font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">On
		the ____________ day of _________________ in the year __________
		before me, the undersigned, personally appeared </font></font>


		<font color="#0000ff">
			<font face="Times New Roman, serif">
				<font size="2" style="font-size: 9pt">
					<b>{{strtoupper($tellUsAboutYou['fullname'])}}</b>
				</font>
			</font>
		</font>


		<font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">,
		personally known to me or proved to me on the basis of satisfactory
		evidence to be the individual whose name is subscribed to the within
		instrument and acknowledged to me that he/she/they executed the same
		in his/her/their capacity, and that by his/her/their signature(s) on
		the instrument, the individual(s), or the person upon behalf of which
		the individual acted, executed the instrument.</font></font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">______________________________</font></font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">Notary
		Public</font></font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><font size="2" style="font-size: 9pt">Printed
		Name: _________________			My Commission Expires:
		_____________________</font></font></p>
		<p style="margin-top: 0.26in; margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>(f)	SIGNATURES
		OF WITNESSES:</b></font></p>
		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><br/>
		<br/>

		</p>



		<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0"><a name="_GoBack"></a>
		<font face="Times New Roman, serif">By signing as a witness, I
		acknowledge that </font>

		

		<font color="#0000ff">
			<font face="Times New Roman, serif">
				<b>{{strtoupper($tellUsAboutYou['fullname'])}}</b>
			</font>
		</font>

		<font face="Times New Roman, serif">signed the Statutory
		Gifts Rider in my presence and the presence of the other witness, or
		that the principal acknowledged to me that the principal's signature
		was affixed by </font>

		<font color="#0433ff">
			<font face="Times New Roman, serif">{{$genderTxt4}}</font>
		</font>

		<font face="Times New Roman, serif">
		or at </font>

		<font color="#0433ff">
			<font face="Times New Roman, serif">{{$genderTxt4}}</font>
		</font>

		<font face="Times New Roman, serif">»
		direction. I also acknowledge that the principal has stated that this
		Statutory Gifts Rider reflects </font>

		<font color="#0433ff">
			<font face="Times New Roman, serif">{{$genderTxt4}}</font>
		</font>

		<font face="Times New Roman, serif">»
		wishes and that </font>
		<font color="#0433ff">
			<font face="Times New Roman, serif">{{$genderTxt3}}</font>
		</font>

		<font face="Times New Roman, serif">
		has signed it voluntarily. </font><font face="Times New Roman, serif"><u><b>I
		am not named herein as a permissible recipient of gifts</b></u></font><font face="Times New Roman, serif"><b>.</b></font></p>
		<p align="justify" style="margin-bottom: 0.09in; line-height: 100%"><br/>
		<br/>

		</p>



		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font color="#000000"><font face="Times New Roman, serif">Dated:
		____ day of </font></font><font color="#000000"><font face="Times New Roman, serif"><u>			</u></font></font><font color="#000000"><font face="Times New Roman, serif">,
		</font></font><font color="#000000"><font face="Times New Roman, serif"><u>		</u></font></font><font color="#000000"><font face="Times New Roman, serif">.</font></font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">_______________________________________	____________________________________</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">signature
		– please print name under this line]	[street address]</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">(WITNESS
		1)</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">							____________________________________</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">							[city,
		state]</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">_______________________________________	____________________________________</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">signature
		– please print name under this line]	[street address]</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">(WITNESS
		2)</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">							____________________________________</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">							[city,
		state]</font></p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>
		<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif">	</font></p>
		
		@endif

		<p style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>

</body>

</html>