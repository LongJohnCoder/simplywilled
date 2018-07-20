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
		Statutory Short form Power of Attorney of <br>{{$tellUsAboutYou['fullname']}}<br>
	</div>
</div>
	<p align="center" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><font size="5" style="font-size: 18pt"><b>STATUTORY
	SHORT FORM POWER OF ATTORNEY</b></font></font></p>
	<p align="center" style="margin-bottom: 0.17in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><b>MINNESOTA STATUTES, SECTION
	523.23</b></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">Before completing and signing
	this form, the principal must read and initial the IMPORTANT NOTICE
	TO PRINCIPAL that appears after the signature lines in this form.
	Before acting on behalf of the principal, the attorney(s)-in-fact
	must sign this form acknowledging having read and understood the
	IMPORTANT NOTICE TO ATTORNEY(S)-IN-FACT that appears after the notice
	to the principal.</font></p>
	<p align="center" style="margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<br/>
	</p>
	<p align="center" style="margin-top: 0.17in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><b>PRINCIPAL (Name and Address of
	Person Granting the Power)</b></font></p>
	<p align="center" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"></font>

	<font color="">
		<font face="Times New Roman, serif">{{strtoupper($tellUsAboutYou['fullname'])}},</font>
	</font>
	<font face="Times New Roman, serif"></font>
	</p>


	<p align="center" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">of </font>
	<font color="">
		<font face="Times New Roman, serif">{{$tellUsAboutYou['address']}},</font>
	</font>

	<font face="Times New Roman, serif"></font>

	</p>


	<p align="center" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font color="">
		<font face="Times New Roman, serif">{{ucwords($tellUsAboutYou['city'])}},</font>
	</font>

	<font face="Times New Roman, serif"></font>

	<font color="">
		<font face="Times New Roman, serif">{{ucwords($tellUsAboutYou['state'])}}</font>
	</font>

	</p>



	<table cellpadding="7" cellspacing="0">

	<tr valign="top">
		<td  height="38" style="border: none; padding: 0in">
			<p style="margin-right: -0.9in; orphans: 0; widows: 0"><font face="Times New Roman, serif"><b>ATTORNEY(S)-IN-FACT:</b></font></p>
		</td>
		<td width="250" style="border: none; padding: 0in">
			<p style="margin-right: -0.9in; margin-bottom: 0in; orphans: 0; widows: 0">
			<font face="Times New Roman, serif"><b>SUCCESSOR
			ATTORNEY(S)-IN-FACT:</b></font></p>
			<p style="orphans: 0; widows: 0"><font face="Times New Roman, serif"><font size="2" style="font-size: 10pt">(Optional)
			To act if any named attorney-in-fact dies, resigns, or is
			otherwise unable to serve.</font></font></p>
		</td>
	</tr>
	<tr valign="top">
		<td width="250" style="border: none; padding: 0in">
			<p align="justify" style="margin-right: -0.9in; margin-bottom: 0.08in; margin-top: 0.05in; orphans: 0; widows: 0">
			<font face="Times New Roman, serif"><font size="2" style="font-size: 11pt">(Name
			and Address)</font></font></p>
			<p align="justify" style="margin-right: -0.9in; margin-bottom: 0.08in; orphans: 0; widows: 0">
			<font face="Times New Roman, serif">
				<font size="2" style="font-size: 11pt"></font>
			</font>

			<font color="">
				<font face="Times New Roman, serif">
					<font size="2" style="font-size: 11pt">{{$attorneyHolders['fullname']}}</font>
				</font>
			</font>

			<font face="Times New Roman, serif">
				<font size="2" style="font-size: 11pt"></font>
			</font>
			</p>


			<p align="justify" style="margin-right: -0.9in; margin-bottom: 0.08in; orphans: 0; widows: 0">
				<font color="">
					<font face="Times New Roman, serif">
						<font size="2" style="font-size: 11pt"> {{$attorneyHolders['address']}}</font>
					</font>
				</font>
			</p>

			<p align="justify" style="margin-right: -0.9in; margin-bottom: 0.08in; orphans: 0; widows: 0">
				<font face="Times New Roman, serif">
					<font size="2" style="font-size: 11pt"></font>
				</font>

				<font color="">
					<font face="Times New Roman, serif">
						<font size="2" style="font-size: 11pt">{{$attorneyHolders['city']}}</font>
					</font>
				</font>

				<font face="Times New Roman, serif">
					<font size="2" style="font-size: 11pt">,</font>
				</font>

				<font color="">
					<font face="Times New Roman, serif">
						<font size="2" style="font-size: 11pt">{{$attorneyHolders['state']}}</font>
					</font>
				</font>

				<font face="Times New Roman, serif">
					<font size="2" style="font-size: 11pt"></font>
				</font>
			</p>
			<p align="justify" style="margin-right: -0.9in; margin-bottom: 0.08in; orphans: 0; widows: 0">

			</p>
			<p style="margin-right: -0.9in; orphans: 0; widows: 0"><br/>

			</p>
		</td>
		<td width="250" style="border: none; padding: 0in">
			<p style="margin-right: -0.9in; margin-top: 0.04in; margin-bottom: 0.08in; orphans: 0; widows: 0">
			<font face="Times New Roman, serif"><font size="2" style="font-size: 10pt">(Name
			and Address)</font></font></p>

			@if($financialPowerOfAttorney['is_backupattorney'] == 1)

			<p align="justify" style="margin-bottom: 0.08in; orphans: 0; widows: 0">
				<font color="">
					<font face="Times New Roman, serif">
						<font face="Times New Roman, serif">{{ucwords($attorneyBackup['fullname'])}}</font>
					</font>
				</font>
			</p>


			<p align="justify" style="margin-bottom: 0.08in; orphans: 0; widows: 0">
				<font face="Times New Roman, serif">
					<font size="2" style="font-size: 11pt"></font>
				</font>

				<font color="">
					<font face="Times New Roman, serif">
						<font face="Times New Roman, serif">{{$attorneyBackup['address']}}</font>
					</font>
				</font>
			</p>

			<p align="justify" style="margin-bottom: 0.08in; orphans: 0; widows: 0">

			<font face="Times New Roman, serif">
				<font size="2" style="font-size: 11pt"></font>
			</font>

			<font color="">
				<font face="Times New Roman, serif">
					<font size="2" style="font-size: 11pt">{{$attorneyBackup['city']}}</font>
				</font>
			</font>

			<font face="Times New Roman, serif">
				<font size="2" style="font-size: 11pt">, </font>
			</font>

			<font color="">
				<font face="Times New Roman, serif">
					<font size="2" style="font-size: 11pt">{{$attorneyBackup['state']}}</font>
				</font>
			</font>

			<font face="Times New Roman, serif">
				<font size="2" style="font-size: 11pt"> </font>
			</font>

			</p>
			<p align="justify" style="margin-right: -0.9in; orphans: 0; widows: 0">
			<br/>

			</p>

			@endif
		</td>
	</tr>
</table>


	<p align="justify" style="margin-right: -0.9in; margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<br/>

	</p>

	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<font color="#000000"><font face="Times New Roman, serif"><b>EFFECTIVE
	DATE.</b></font></font>

	@if(array_key_exists('isIncapacity', $attorneyPowers) && $attorneyPowers['isIncapacity'] == 1)

	<font face="Times New Roman, serif">The above
	authority granted to my Attorney-in-fact shall take effect </font><font color="#212121"><font face="Times New Roman, serif">on
	my disability or incapacity, as defined herein or as otherwise
	determined by a court of competent jurisdiction.</font></font>

	@else

	<font color="#000000">
		<font face="Times New Roman, serif"></font>
	</font>

	<font color="#009c00">
		<font face="Times New Roman, serif"></font>
	</font>

	<font face="Times New Roman, serif">This Power is effective immediately upon execution.</font>

	@endif

	</p>
	<p align="justify" style="margin-right: -0.9in; margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<br/>

	</p>
	<p style="margin-top: 0.17in; margin-bottom: 0.13in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><b>EXPIRATION DATE (</b></font><font face="Times New Roman, serif">Optional)</font></p>
	<p style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">___________________________</font></p>
	<p style="margin-bottom: 0.17in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">Use Specific Month, Day and Year
	Only</font></p>

	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0; page-break-before: always">
	<font face="Times New Roman, serif">I, </font>

	<font color="">
		<font face="Times New Roman, serif">{{strtoupper($tellUsAboutYou['fullname'])}}</font>
	</font>

	<font face="Times New Roman, serif">
	(the above-named Principal), hereby appoint the above named
	Attorney(s)-in-Fact to act as my attorney(s)-in-fact:</font></p>

	<p align="justify" style="margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><b>FIRST: To act for me in any
	way that I could act with respect to the following matters, as each
	of them is defined in Minnesota Statutes, §523.24:</b></font></p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><b>(To grant to the
	attorney-in-fact any of the following powers, make a check or “x”
	on the line in front of each power being granted. You may, but need
	not, cross out each power not granted. Failure to make a check or “x”
	on the line in front of the power will have the effect of deleting
	the power unless the line in front of the power of (N) is checked or
	x-ed.)</b></font></p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><span>____</span></font><font face="Times New Roman, serif">(A)	real
	estate transactions; </font>
	</p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><span>____</span></font><font face="Times New Roman, serif">(B)	tangible
	personal property transactions;</font></p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><span>____</span></font><font face="Times New Roman, serif">(C)	bond,
	share and commodity transactions;</font></p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><span>____</span></font><font face="Times New Roman, serif">(D)	banking
	transactions;</font></p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><span>____</span></font><font face="Times New Roman, serif">(E)	business
	operating transactions;</font></p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><span>____</span></font><font face="Times New Roman, serif">(F)	insurance
	transactions;</font></p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><span>____</span></font><font face="Times New Roman, serif">(G)	beneficiary
	transactions;</font></p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><span>____</span></font><font face="Times New Roman, serif">(H)	gift
	transactions;</font></p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><span>____</span></font><font face="Times New Roman, serif">(I)	fiduciary
	transactions;</font></p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><span>____</span></font><font face="Times New Roman, serif">(J)	claims
	and litigation;</font></p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><span>____</span></font><font face="Times New Roman, serif">(K)	family
	maintenance;</font></p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><span>____</span></font><font face="Times New Roman, serif">(L)	benefits
	from military service;</font></p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><span>____</span></font><font face="Times New Roman, serif">(M)	records,
	reports and statements;</font></p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">	</font><font face="Times New Roman, serif"><span>____</span></font><font face="Times New Roman, serif">(N)	all
	of the powers listed (A) through (M) above and all other matters,
	other than health care decisions under a health care directive that
	complies with Minnesota Statutes, chapter 145C.</font></p>

	<br>
	<p align="justify" style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><b>SECOND: </b></font>
	</p>
	<p align="justify" style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">

	@if(array_key_exists('isDurable', $attorneyPowers) && $attorneyPowers['isDurable'] == 1)

	<font face="Times New Roman, serif"><b>THIS
	POWER OF ATTORNEY IS A “DURABLE” POWER OF ATTORNEY UNDER
	MINNESOTA STATUTES, SECTION 523.07, </b></font>

	<font face="Times New Roman, serif"><b>AND,
	TO THE MAXIMUM EXTENT PERMITTED BY LAW, SHALL NOT BE AFFECTED BY MY
	DISABILITY, ABSENCE, INCAPACITY OR INCOMPETENCY, OR IN THE EVENT OF
	LATER UNCERTAINTY AS TO WHETHER I AM DEAD OR ALIVE, OR BY LAPSE OF
	TIME</b></font>

	<font color="#000000"><font face="Times New Roman, serif"><b>,</b></font></font>


	<font color="#000000"><font face="Times New Roman, serif">
	</font></font>

	<font face="Times New Roman, serif"><b>UNLESS OR UNTIL
	OTHERWISE ORDERED BY A COURT OF COMPETENT JURISDICTION.</b></font>

	@elseif(array_key_exists('isDurable', $attorneyPowers) && $attorneyPowers['isDurable'] == 0)

	<font face="Times New Roman, serif"><b>THIS
	POWER OF ATTORNEY SHALL TERMINATE UPON MY DISABILITY, ABSENCE, OR
	INCAPACITY, OR UPON MY EARLIER REVOCATION OR TERMINATION OF THIS
	POWER.</b>
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


	<p align="justify" style="margin-bottom: 0.08in; page-break-before: always; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><b>THIRD</b></font><font face="Times New Roman, serif">:
	</font><font face="Times New Roman, serif"><b>(My attorney(s)-in-fact
	MAY NOT make gifts to the attorney(s)-in-fact, or anyone the
	attorney(s)-in-fact are legally obligated to support, UNLESS I have
	made a check or an “x” on the line in front of the second
	statement below and I have written in the name(s) of the
	attorney(s)-in-fact. The second option allows you to limit the
	gifting power to only the attorney(s)-in-fact you name in the
	statement.  Minnesota Statutes, section 523.24, subdivision 8, clause
	(2), limits the annual gift(s) made to my attorney(s)-in-fact, or to
	anyone the attorney(s)-in-fact are legally obligated to support, to
	an amount, in the aggregate, that does not exceed the federal annual
	gift tax exclusion amount in the year of the gift.)</b></font></p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">	</font><font face="Times New Roman, serif"><span>____</span></font><font face="Times New Roman, serif">I
	do not authorize any of my attorney(s)-in-fact to make gifts to
	themselves or to anyone the attorney(s)-in-fact have a legal
	obligation to support. </font>
	</p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">	</font><font face="Times New Roman, serif"><span>____</span></font><font face="Times New Roman, serif">I
	authorize _________________________________________________________
	(</font><font face="Times New Roman, serif"><b>handwrite in name(s)</b></font><font face="Times New Roman, serif">),
	as my attorney(s)-in-fact, to make gifts to themselves or to anyone
	the attorney(s)-in-fact have a legal obligation to support. </font>
	</p>
	<p align="justify" style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<br/>
	<br/>

	</p>


	<p align="justify" style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><b>FOURTH: (You may indicate
	below whether or not the attorney-in-fact is required to make an
	accounting. Make a check or “x” on the line in front of the
	statement that expresses your intent.)</b></font></p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><span>____</span></font><font face="Times New Roman, serif">My
	attorney-in-fact need not render an accounting unless I request it or
	the accounting is otherwise required by Minnesota Statutes, section
	523.21. </font>
	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">	</font><font face="Times New Roman, serif"><span>____</span></font><font face="Times New Roman, serif">My
	attorney-in-fact must render a _________________________ accountings
	to me or</font></p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">	             (Monthly,
	Quarterly, Annual)</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">to
	________________________________________________________________________</font></p>
	<p align="center" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">(Name and Address)</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">during my lifetime, and a final
	accounting to the personal representative of my estate, if any is
	appointed, after my death.</font></p>

	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>GENERAL
	PROVISIONS: </b></font>
	</p>

	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>Compensation
	and Reimbursement.  </b></font><font face="Times New Roman, serif">My
	Attorney-in-fact shall not be entitled to compensation for services
	in handling my financial affairs; however, my Attorney-in-fact shall
	be entitled to reimbursement from my assets for reasonable expenses
	incurred on my behalf, upon providing proof of any such expense.</font></p>

	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>Reliance
	by Third Parties</b></font><font face="Times New Roman, serif">.  Any
	person, including my </font><font face="Times New Roman, serif">Attorney-in-fact</font><font face="Times New Roman, serif">,
	may rely upon the validity of this power of attorney or a photocopy
	of it unless that person knows it has terminated or is invalid.</font><font color="#000000"><font face="Times New Roman, serif">
	</font></font><font color="#008f00"><font face="Times New Roman, serif">
	</font></font><font face="Times New Roman, serif">I, for myself and
	on behalf of my heirs, successors, and assigns, hereby waive any
	privilege that may attach to information requested by my
	</font><font face="Times New Roman, serif">Attorney-in-fact </font><font face="Times New Roman, serif">in
	the exercise of any of the powers described herein, and agree to hold
	harmless any third party who acts in reliance upon this Power for
	damages or liability incurred as a result of that reliance.  My
	</font><font face="Times New Roman, serif">Attorney-in-fact </font><font face="Times New Roman, serif">is
	authorized, at the expense of my estate, to seek interpretation
	and/or enforcement of any power granted to my </font><font face="Times New Roman, serif">Attorney-in-fact
	</font><font face="Times New Roman, serif">under this document from a
	court of competent jurisdiction. My </font><font face="Times New Roman, serif">Attorney-in-fact
	</font><font face="Times New Roman, serif">may seek any appropriate
	legal remedy including, but not limited to, declaratory judgments,
	temporary or permanent injunctions, and actual or punitive damages
	against any person or entity who unreasonably, negligently or
	willfully fails or refuses to follow my </font><font face="Times New Roman, serif">Attorney-in-fact’s
	</font><font face="Times New Roman, serif">instructions with respect
	to a power granted to my </font><font face="Times New Roman, serif">Attorney-in-fact
	</font><font face="Times New Roman, serif">under this document.</font></p>

	<p align="justify" style="margin-bottom: 0in; page-break-before: always; line-height: 100%"><font face="Times New Roman, serif"><b>Ratification</b></font><font face="Times New Roman, serif">.
	I hereby ratify and confirm all that my </font><font face="Times New Roman, serif">Attorney-in-fact
	</font><font face="Times New Roman, serif">does or causes to be done
	under the authority granted in this Power. All instruments of any
	sort entered into in any manner by my </font><font face="Times New Roman, serif">Attorney-in-fact
	</font><font face="Times New Roman, serif">shall bind me, my estate,
	my heirs, successors, and assigns.</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>Attorney-in-fact</b></font><font face="Times New Roman, serif">
	</font><font face="Times New Roman, serif"><b>Liability</b></font><font face="Times New Roman, serif">.
	My </font><font face="Times New Roman, serif">Attorney-in-fact </font><font face="Times New Roman, serif">shall
	not be liable to me or any of my successors in interest for any
	action taken or not taken in good faith, but shall be liable for
	breach of fiduciary duty.</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>




	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>Revocation
	and Amendment</b></font><font face="Times New Roman, serif">. I
	revoke all prior General Powers of Attorney and retain the right to
	revoke or amend this document and to substitute other
	</font><font face="Times New Roman, serif">attorney-in-fact </font><font face="Times New Roman, serif">in
	place of the </font><font face="Times New Roman, serif">Attorney-in-fact
	</font><font face="Times New Roman, serif">appointed herein.
	Revocations and amendments to this document shall be made in writing
	by me personally (not by my </font><font face="Times New Roman, serif">Attorney-in-fact</font><font face="Times New Roman, serif">).
	 </font>
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
	Power shall be determined in accordance with the laws of the State of
	Minnesota.</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%"><font face="Times New Roman, serif"><b>Principal
	Acknowledgement</b></font><font face="Times New Roman, serif">. This
	Power is a legal document that I have prepared myself or that was
	prepared by another acting under my direction, and I understand and
	acknowledge that this document provides my </font><font face="Times New Roman, serif">Attorney-in-fact
	</font><font face="Times New Roman, serif">with broad powers to
	dispose of, sell, convey, and encumber my real and personal property;
	the powers granted in this Power will exist for an indefinite period
	of time unless I limit their duration by the terms of this Power or
	revoke this Power</font>

	@if(array_key_exists('isDurable', $attorneyPowers) && $attorneyPowers['isDurable'] == 1)

	<font face="Times New Roman, serif"> and will
	continue to exist notwithstanding my subsequent disability or
	incapacity</font>

	@endif

	<font face="Times New Roman, serif">; and I have
	the right to revoke or terminate this Power at any time and must do
	so in writing.&nbsp;</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<br/>

	</p>



	<p align="center" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><b>[SIGNATURE PAGE FOLLOWS]</b></font></p>


	<p align="justify" style="margin-bottom: 0in; page-break-before: always; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">In Witness Whereof, I have
	hereunto signed my name this ____ day of </font><font face="Times New Roman, serif">__________</font><font face="Times New Roman, serif">,
	</font><font face="Times New Roman, serif">__________</font><font face="Times New Roman, serif">.</font></p>

	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">______________________________________________</font></p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">


	<font color="">
		<font face="Times New Roman, serif">
			<b>{{strtoupper($tellUsAboutYou['fullname'])}}</b>
		</font>
	</font>

	<font face="Times New Roman, serif"><b>
	(Acknowledgment of Principal)</b></font></p>

	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">STATE OF MINNESOTA	)</font></p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">	) ss.</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">COUNTY OF </font><font face="Times New Roman, serif"><span>_________________</span></font><font face="Times New Roman, serif">	)
	</font>
	</p>



	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">The foregoing instrument was
	acknowledged before me this </font><font face="Times New Roman, serif">__________</font><font face="Times New Roman, serif">
	day of </font><font face="Times New Roman, serif">__________</font><font face="Times New Roman, serif">,
	</font><font face="Times New Roman, serif">__________</font><font face="Times New Roman, serif">,
	by </font><font face="Times New Roman, serif"></font>

	<font color="">
		<font face="Times New Roman, serif">{{strtoupper($tellUsAboutYou['fullname'])}}</font>
	</font>

	<font face="Times New Roman, serif">.</font></p>

	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">_________________________________________</font></p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">Signature of notarial officer</font></p>
	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">Notary Public</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">My commission expires: </font><font face="Times New Roman, serif"><span>__________</span></font><font face="Times New Roman, serif">
	</font>
	</p>

	<p style="margin-top: 0.17in; margin-bottom: 0.13in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><b>Acknowledgement of Notice to
	Attorney(s)-In-Fact and Specimen Signature of Attorney(s)-In-Fact:</b></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">By signing below, I acknowledge I
	have read and understand the IMPORTANT NOTICE TO ATTORNEY(S)-IN-FACT
	required by Minnesota Statutes, section 523.23, and understand and
	accept the scope of any limitations to the powers and duties
	delegated to me by this instrument.</font></p>

	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">______________________________________________</font></p>
	<p align="justify" style="margin-bottom: 0.17in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><b>ATTORNEY-IN-FACT SIGNATURE
	(Notarization not required)</b></font></p>
	<p style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><b>Specimen Signature of
	Attorney(s)-In-Fact</b></font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">	(Notarization not required)</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<br/>

	</p>

	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">____________________________________</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<br/>

	</p>

	<p align="center" style="margin-bottom: 0.17in; line-height: 100%; orphans: 0; widows: 0; page-break-before: always">
	<font face="Times New Roman, serif"><font size="4" style="font-size: 14pt"><b>IMPORTANT
	NOTICE TO THE PRINCIPAL</b></font></font></p>
	<p align="justify" style="text-indent: 0.5in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><b>READ THIS NOTICE CAREFULLY</b></font><font face="Times New Roman, serif">.
	The power of attorney form that you will be signing is a legal
	document. It is governed by Minnesota Statutes, chapter 523. If there
	is anything about this form that you do not understand, you should
	seek legal advice.</font></p>
	<p align="justify" style="text-indent: 0.5in; margin-bottom: 0.13in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><b>PURPOSE</b></font><font face="Times New Roman, serif">:
	The purpose of the power of attorney is for you, the principal, to
	give broad and sweeping powers to your attorney(s)-in-fact, who is
	the person you designate to handle your affairs. Any action taken by
	your attorney(s)-in-fact pursuant to the powers you designate in this
	power of attorney form binds you, your heirs and assigns, and the
	representative of your estate in the same manner as though you took
	the action yourself.</font></p>
	<p align="justify" style="text-indent: 0.5in; margin-bottom: 0.13in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><b>POWERS GIVEN</b></font><font face="Times New Roman, serif">:
	You will be granting the attorney(s)-in-fact power to enter into
	transactions relating to any of your real or personal property, even
	without your consent or any advance notice to you. The powers granted
	to the attorney(s)-in-fact are broad and not supervised. </font><font face="Times New Roman, serif"><b>THIS
	POWER OF ATTORNEY DOES NOT GRANT ANY POWERS TO MAKE HEALTH CARE
	DECISIONS FOR YOU. TO GIVE SOMEONE THOSE POWERS, YOU MUST USE A
	HEALTH CARE DIRECTIVE THAT COMPLIES WITH MINNESOTA STATUTES, CHAPTER
	145C.</b></font></p>
	<p align="justify" style="text-indent: 0.5in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><b>DUTIES OF YOUR
	ATTORNEY(S)-IN-FACT</b></font><font face="Times New Roman, serif">:
	Your attorney(s)-in-fact must keep complete records of all
	transactions entered into on your behalf. You may request that your
	attorney(s)-in-fact provide you or someone else that you designate a
	periodic accounting, which is a written statement that gives
	reasonable notice of all transactions entered into on your behalf.
	Your attorney(s)-in-fact must also render an accounting if the
	attorney-in-fact reimburses himself or herself for any expenditure
	they made on behalf of you.</font></p>
	<p align="justify" style="margin-bottom: 0.13in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">An attorney-in-fact is personally
	liable to any person, including you, who is injured by an action
	taken by an attorney-in-fact in bad faith under the power of attorney
	or by an attorney-in-fact's failure to account when the
	attorney-in-fact has a duty to account under this section. The
	attorney(s)-in-fact must act with your interests utmost in mind.</font></p>
	<p align="justify" style="text-indent: 0.5in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><b>TERMINATION</b></font><font face="Times New Roman, serif">:
	If you choose, your attorney(s)-in-fact may exercise these powers
	throughout your lifetime, both before and after you become
	incapacitated. However, a court can take away the powers of your
	attorney(s)-in-fact because of improper acts. You may also revoke
	this power of attorney if you wish. This power of attorney is
	automatically terminated if the power is granted to your spouse and
	proceedings are commenced for dissolution, legal separation, or
	annulment of your marriage.</font></p>
	<p align="justify" style="text-indent: 0.5in; margin-bottom: 0.13in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">This power of attorney
	authorizes, but does not require, the attorney(s)-in-fact to act for
	you. You are not required to sign this power of attorney, but it will
	not take effect without your signature. You should not sign this
	power of attorney if you do not understand everything in it, and what
	your attorney(s)-in-fact will be able to do if you do sign it.</font></p>
	<p align="justify" style="text-indent: 0.5in; margin-bottom: 0.04in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><b>Please place your initials on
	the following line indicating you have read this IMPORTANT NOTICE TO
	THE PRINCIPAL: </b></font>
	</p>
	<br>




	<p align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0"><a name="_GoBack"></a>
	<font face="Times New Roman, serif"><b>_________ (INITIALS of </b></font>

	<font color="">
		<font face="Times New Roman, serif">
			<b>{{$tellUsAboutYou['fullname']}}</b>
		</font>
	</font>

	<font face="Times New Roman, serif"><b>)</b></font></p>

	<p align="center" style="margin-bottom: 0in; line-height: 100%; page-break-before: always">
	<font face="Times New Roman, serif"><font size="4" style="font-size: 14pt"><b>IMPORTANT
	NOTICE TO THE ATTORNEY(S)-IN-FACT</b></font></font></p>
	<p align="center" style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
	<p align="justify" style="text-indent: 0.5in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">You have been nominated by the
	principal to act as an attorney-in-fact. You are under no duty to
	exercise the authority granted by the power of attorney. However,
	when you do exercise any power conferred by the power of attorney,
	you must:</font></p>
	<p align="justify" style=" margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">(1)	act with the interests of the
	principal utmost in mind;</font></p>
	<p align="justify" style=" margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">(2)	exercise the power in the
	same manner as an ordinarily prudent person of discretion and
	intelligence would exercise in the management of the person's own
	affairs;</font></p>
	<p align="justify" style=" margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">(3)	render accountings as
	directed by the principal or whenever you reimburse yourself for
	expenditures made on behalf of the principal;</font></p>
	<p align="justify" style=" margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">(4)	act in good faith for the
	best interest of the principal, using due care, competence, and
	diligence;</font></p>
	<p align="justify" style=" margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">(5)	cease acting on behalf of the
	principal if you learn of any event that terminates this power of
	attorney or terminates your authority under this power of attorney,
	such as revocation by the principal of the power of attorney, the
	death of the principal, or the commencement of proceedings for
	dissolution, separation, or annulment of your marriage to the
	principal;</font></p>
	<p align="justify" style=" margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">(6)	disclose your identity as an
	attorney-in-fact whenever you act for the principal by signing in
	substantially the following manner:</font></p>
	<p style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif"><b>Signature by a person as
	“attorney-in-fact for (name of the principal)” or “(name of the
	principal) by (name of the attorney-in-fact) the principal’s
	attorney-in-fact”;</b></font></p>
	<p align="justify" style=" margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">(7)	</font><font face="Times New Roman, serif"><u>acknowledge
	that you have read and understood this IMPORTANT NOTICE TO THE
	ATTORNEY(S)-IN-FACT by signing the power of attorney form.</u></font><font face="Times New Roman, serif">
	</font>
	</p>
	<p align="justify" style="text-indent: 0.5in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">You are personally liable to any
	person, including the principal, who is injured by an action taken by
	you in bad faith under the power of attorney or by your failure to
	account when the duty to account has arisen.</font></p>
	<p align="justify" style="text-indent: 0.5in; margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
	<font face="Times New Roman, serif">The meaning of the powers granted
	to you is contained in Minnesota Statutes, chapter 523. If there is
	anything about this document or your duties that you do not
	understand, you should seek legal advice.</font></p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<br/>

	</p>
	<p align="justify" style="margin-bottom: 0in; line-height: 100%; orphans: 0; widows: 0">
	<br/>

	</p>
	<p style="margin-bottom: 0in; line-height: 100%"><br/>

	</p>
</body>


</html>
