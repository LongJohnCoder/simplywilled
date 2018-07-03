<!DOCTYPE html>
<html>
<head>
	<title>Financial Power Of Attorney</title>
</head>
<body>

<div>

	<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
		<br/>
	</p>

	

	<!-- check for district of columbia and if real estate -->
	@if(strtolower($tellUsAboutYou['state']) == 'district of columbia')
		<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>
		</p>

		<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<b>THIS POWER OF ATTORNEY AUTHORIZES THE PERSON NAMED BELOW AS MY
			ATTORNEY-IN-FACT TO DO ONE OR MORE OF THE FOLLOWING: TO SELL, LEASE,
			GRANT, ENCUMBER, RELEASE, OR OTHERWISE CONVEY ANY INTEREST IN MY REAL
			PROPERTY AND TO EXECUTE DEEDS AND ALL OTHER INSTRUMENTS ON MY BEHALF,
			UNLESS THIS POWER OF ATTORNEY IS OTHERWISE LIMITED HEREIN TO SPECIFIC
			REAL PROPERTY.</b>
		</p>
	@endif
	<br/>

	
	
	@if($attorneyPowers['isDurable'] == 1)
		<p class="western" align="center" style="margin-bottom: 0.06in; line-height: 100%">
			<span color="#0433ff">
				<span size="4" style="font-size: 14pt">
					<b>{{$state['name']}}</b>
				</span>
			</span>
		</p>

		<p class="western" align="center" style="margin-bottom: 0.06in; line-height: 100%">
			<span size="4" style="font-size: 14pt"><b>DURABLE GENERAL POWER OF ATTORNEY</b></span>
		</p>

		<p class="western" align="center" style="margin-bottom: 0.06in; line-height: 100%">
			<span size="4" style="font-size: 14pt">
				<b>FOR MANAGEMENT OF FINANCIAL AFFAIRS AND PROPERTY</b>
			</span>
		</p>
	

	@elseif($attorneyPowers['isDurable'] == 0)

	<p class="western" align="center" style="margin-bottom: 0.06in; line-height: 100%">
		<span size="4" style="font-size: 14pt"><b>«</b></span>

		<span color="#0433ff">
			<span size="4" style="font-size: 14pt">
				<b>{{$state['name']}}</b>
			</span>
		</span>
	</p>


	<p class="western" align="center" style="margin-bottom: 0.06in; line-height: 100%">
		<span size="4" style="font-size: 14pt">
			<b>POWER OF ATTORNEY</b>
		</span>
	</p>

		@if(strtolower($state['name']) == 'Wisconsin')
			<p class="western" align="center" style="margin-bottom: 0.06in; line-height: 100%">
				<span size="4" style="font-size: 14pt">
					<b>FOR FINANCES AND PROPERTY</b>
				</span>
			</p>
		@endif

	<p class="western" align="center" style="margin-bottom: 0.06in; line-height: 100%">
	<br/>
	<br/>
	</p>

	@endif



	@if(strtolower($state['name']) == 'maine')

	<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">

	<b>Notice to the Principal</b>: As the “Principal” you are using
		this power of attorney to grant power to another person (called the
		Agent) to make decisions about your property and to use your property
		on your behalf. Under this power of attorney you give your Agent
		broad and sweeping powers to sell or otherwise dispose of your
		property without notice to you. Under this document your Agent will
		continue to have these powers after you become incapacitated. The
		powers that you give your Agent are explained more fully in the Maine
		Uniform Power of Attorney Act, Maine Revised Statutes, Title 18-A,
		Article 5, Part 9. You have the right to revoke this power of
		attorney at any time as long as you are not incapacitated. If there
		is anything about this power of attorney that you do not understand,
		you should ask a lawyer to explain it to you.
	</p>

	<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
		<b>Notice to the Agent</b>: As the “Agent” you are given power
		under this power of attorney to make decisions about the property
		belonging to the Principal and to dispose of the Principal's property
		on the Principal's behalf in accordance with the terms of this power
		of attorney. This power of attorney is valid only if the Principal is
		of sound mind when the Principal signs it. When you accept the
		authority granted under this power of attorney a special legal
		relationship is created between you and the Principal. This
		relationship imposes upon you legal duties that continue until you
		resign or the power of attorney is terminated or revoked. The duties
		are more fully explained in the Maine Uniform Power of Attorney Act,
		Maine Revised Statutes, Title 18-A, Article 5, Part 9 and Title 18-B,
		§§802 to 807 and Title 18-B, chapter 9. As the Agent, you are
		generally not entitled to use the Principal's property for your own
		benefit or to make gifts to yourself or others unless the power of
		attorney gives you such authority. If you violate your duty under
		this power of attorney you may be liable for damages and may be
		subject to criminal prosecution. You must stop acting on behalf of
		the Principal if you learn of any event that terminates this power of
		attorney or your authority under this power of attorney. Events of
		termination are more fully explained in the Maine Uniform Power of
		Attorney Act and include, but are not limited to, revocation of your
		authority or of the power of attorney by the Principal, the death of
		the Principal or the commencement of divorce proceedings between you
		and the Principal. If there is anything about this power of attorney
		or your duties under it that you do not understand, you should ask a
		lawyer to explain it to you.
	</p>

	@else
		<p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

		</p>

		<p class="western" align="center" style="margin-top: 0.03in; margin-bottom: 0.06in; line-height: 100%">
			<b>Important Information</b>
		</p>

		<p class="western" align="justify" style="margin-top: 0.03in; margin-bottom: 0.06in; line-height: 100%">
			<b>THIS IS AN IMPORTANT LEGAL DOCUMENT. BY SIGNING THE </b>

			@if($attorneyPowers['isDurable'] == 1)
				<b>DURABLE</b>
			@endif

			<b>POWER OF ATTORNEY, YOU ARE AUTHORIZING ANOTHER PERSON TO ACT FOR YOU, THE
				PRINCIPAL.  BEFORE YOU SIGN THIS </b>

			<span color="#000000">
				<b></b>
			</span>

			@if($attorneyPowers['isDurable'] == 1)
				<b>DURABLE</b>
			@endif
			
			<b>POWER OF ATTORNEY, YOU SHOULD KNOW THESE IMPORTANT FACTS:</b>
		</p>
			
		<ol>
			<li>
				<p align="justify" style="margin-bottom: 0in; line-height: 100%">
					<span face="Calibri, serif">
						<span face="Times New Roman, serif">This
							power of attorney grants broad authority to another person (your
							agent) to make decisions concerning your property for you (the
							principal). Your agent will be able to make decisions and act with
							respect to your property (including your money) whether or not you
							are able to act for yourself. The meaning of authority over subjects
							listed on this form is explained in the </span>

						<span color="#0433ff">
							<span face="Times New Roman, serif">{{$state['act']}}</span>
						</span>

						<span face="Times New Roman, serif">, in </span>

						<span color="#0433ff">
							<span face="Times New Roman, serif">{{$state['code']}}</span>
						</span>
						<span face="Times New Roman, serif">.</span>
					</span>
				</p>
			</li>
		</ol>
		
		<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
			<br/>

		</p>

			<ol start="2">
				<li>
					<p align="justify" style="margin-bottom: 0in; line-height: 100%">
					<span face="Calibri, serif"><span face="Times New Roman, serif">This
					power of attorney does not authorize the agent to make health care
					decisions for you.</span></span></p>
				</li>
			</ol>

			<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>

			<ol start="3">
				<li>
				<p align="justify" style="margin-bottom: 0in; line-height: 100%">
				<span face="Calibri, serif"><span face="Times New Roman, serif">Your
				agent (attorney-in-fact) has no duty to act unless you and your
				agent agree otherwise in writing.</span></span></p>
				</li>
			</ol>

			<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			
			<ol start="4">
				<li>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%">
				<span face="Calibri, serif"><span face="Times New Roman, serif">This
				document does not give your agent the power to accept or receive any
				of your property, in trust or otherwise, as a gift, unless you
				specifically authorize the agent to accept or receive a gift.</span></span></p>
			</li>
			</ol>
			
			<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			
			<ol start="5">
				<li>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%">
				<span face="Calibri, serif"><span face="Times New Roman, serif">You
				should select someone you trust to serve as your agent. Unless you
				specify otherwise, generally the agent's authority will continue
				until you die or revoke the power of attorney or the agent resigns
				or is unable to act for you.</span></span></p>
			</li>
			</ol>
			
			<p align="justify" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			
			<ol start="6">
				<li>
				<p align="justify" style="margin-bottom: 0in; line-height: 100%">
				<span face="Calibri, serif"><span face="Times New Roman, serif">Your
				agent is entitled to reasonable compensation unless you state
				otherwise in the Special Instructions.</span></span></p>
				</li>
			</ol>
			
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			
			<ol start="7">
				<li>
				<p align="justify" style="margin-bottom: 0in; line-height: 100%">
				<span face="Calibri, serif"><span face="Times New Roman, serif">This
				form provides for designation of one agent.  If your agent is unable
				or unwilling to act for you, your power of attorney will end unless
				you have named a successor agent. </span></span>
				</p>
				</li>
			</ol>
			
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			
			<ol start="8">
				<li>
				<p align="justify" style="margin-bottom: 0in; line-height: 100%">
				<span face="Calibri, serif"><span face="Times New Roman, serif">This
				power of attorney becomes effective immediately unless you state
				otherwise in the Special Instructions.</span></span></p>
				</li>
			</ol>
			
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			
			<ol start="9">
				<li>
				<p align="justify" style="margin-bottom: 0in; line-height: 100%">
				<span face="Calibri, serif"><span face="Times New Roman, serif">You
				can amend or change this </span>
				
				<span color="#000000">
					<span face="Times New Roman, serif">«</span>
				</span>

				@if($attorneyPowers['isDurable'] == 1)
					<span face="Times New Roman, serif">durable</span>
				@endif

				<span face="Times New Roman, serif">
				Power of Attorney only by executing a new Power of Attorney or by
				executing an amendment through the same formalities as an original. </span>
				</span>
				</p>
				</li>
			</ol>
			
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			
			<ol start="10">
				<li>
				<p align="justify" style="margin-bottom: 0in; line-height: 100%">
				<span face="Calibri, serif"><span face="Times New Roman, serif">You
				have the right to revoke or terminate this Power of Attorney at any
				time, so long as you are competent.  </span><span face="Times New Roman, serif">This
				power of attorney may be revoked by you at any time. You can revoke
				it in writing, by telling your agent, or by tearing it up or
				crossing it out or any other act that shows you want it revoked.
				Tell your agent that you are revoking the power of attorney. You
				should also tell your bank and other financial institutions.</span></span></p>
				</li>
			</ol>
			
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>

			<ol start="11">
				<li>
				<p align="justify" style="margin-bottom: 0in; line-height: 100%">
				<span face="Calibri, serif"><span face="Times New Roman, serif">Pay
				careful attention to the signing instructions within the document. 
				Be certain to sign, date, and acknowledge this power of attorney
				before a notary public and the required number of witnesses.  The
				document may also require your agent’s signature, or your initials
				to confirm your election in certain provisions.</span></span></p>
				</li>
			</ol>
			
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			
			<ol start="12">
				<li>
				<p align="justify" style="margin-bottom: 0in; line-height: 100%">
				<span face="Calibri, serif"><span face="Times New Roman, serif">If
				you elect to grant powers over real property, this Power of Attorney
				may require recordation in the land records where the property is
				situate.</span></span></p>
				</li>
			</ol>
			
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>


			@if($attorneyPowers['isDurable'] == 1 && strtolower($state['name']) != 'texas')
				<ol start="13">
					<li>
						<p align="justify" style="margin-bottom: 0in; line-height: 100%">
							<span face="Calibri, serif"><span face="Times New Roman, serif">The
							powers you give your agent will continue to exist for your entire
							lifetime, unless you state that the Durable Power of Attorney will
							last for a shorter period of time or unless you otherwise terminate
							the Power of Attorney. The powers you give to your agent in this
							Durable Power of Attorney will continue to exist even if you can no
							longer make your own decisions respecting the management of your
							property. </span></span>
							</p>
					</li>
				</ol>
			@elseif($attorneyPowers['isDurable'] == 1 && strtolower($state['name']) == 'texas')
			<ol start="13">
				<li>
					<p align="justify" style="margin-bottom: 0in; line-height: 100%">
						<span face="Calibri, serif"><span color="#000000"><span face="Times New Roman, serif">You
						should select someone you trust to serve as your agent (attorney in
						fact). Unless you specify otherwise, generally the agent's (attorney
						in fact's) authority will continue until:</span></span></span></p>
				</li>
			</ol>


			<ul>
				<li>
				<p style="margin-bottom: 0in; line-height: 100%"><span color="#000000">you
				die or revoke the power of attorney;</span></p>
				</li>
				<li>
			<p style="margin-bottom: 0in; line-height: 100%"><span color="#000000">your
				agent (attorney in fact) resigns or is unable to act for you; or</span></p>
				</li>
				<li>
				<p align="justify" style="margin-bottom: 0in; line-height: 100%">
				<span color="#000000">a guardian is appointed for your estate.</span></p>
				</li>
			</ul>
			@endif


			<p align="justify" style="margin-left: 0.5in; margin-top: 0.08in; margin-bottom: 0in; line-height: 100%">
				<br/>
			</p>


			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
				<b>You should read this </b>
				@if($attorneyPowers['isDurable'] == 1)
					<b>durable</b>
				@endif
			</p>

			<b>Power of Attorney carefully. When effective, this </b>

			@if($attorneyPowers['isDurable'] == 1)
				<b>Durable</b>
			
				<b>Power of Attorney will give your agent the right to deal with property that you now
				have or might acquire in the future. </b>

				<b>If you have questions about this document or the authority you are granting to your agent,
				or if you do not understand this Power of Attorney or any provision
				of it, you should seek legal advice before signing this form.</b></p>
				
			@endif

		@endif
		
		

		<p class="western" align="center" style="margin-bottom: 0in; line-height: 100%; page-break-before: always">
		<span size="4" style="font-size: 14pt"><b>DESIGNATION OF AGENT</b></span></p>
		<p class="western" align="center" style="margin-bottom: 0in; line-height: 100%">
		<br/>

		</p>
		
		<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
		I, <span color="#0433ff">{{strtoupper($tellUsAboutYou['fullname'])}}</span>, <span color="#000000"></span>

			

				@if(strtolower($state['name']) == 'illinois')
					<span color="#000000"> </span>hereby
					revoke all prior powers of attorney for property executed by me
					and<span color="#000000"></span>
				@endif

				appoint my <span color="#000000"></span>


				@if(strtolower($attorneyHolders['relationship']) == 'other')
					<span color="#0433ff">{{ucwords(strtolower($attorneyHolders['other_relationship']))}}</span>
				@else
					<span color="#0433ff">{{ucwords(strtolower($attorneyHolders['relationship']))}}</span>
				@endif
					<span color="#000000">, </span>

					<span color="#0433ff">{{ucwords($attorneyHolders['fullname'])}}</span>, as my agent, to 

					<span color="#000000">have all of the powers hereinafter set forth and as permitted under the
					laws of </span>

				<span color="#0433ff">{{$state['name']}}</span>. The contact
				information for my agent is as follows:</p>
				<p class="western" align="justify" style="margin-top: 0.06in; margin-bottom: 0in; line-height: 100%">
				Name of Primary Agent: 
				<span color="#0433ff">{{ucwords($attorneyHolders['fullname'])}}</span></p>
				
				<p class="western" style="margin-bottom: 0in; line-height: 100%">Primary Agent’s Address:
					
					@if(array_key_exists('address', $attorneyHolders) &&
						array_key_exists('state', $attorneyHolders) &&
						array_key_exists('city', $attorneyHolders))
					<span color="#0000ff">$attorneyHolders['address']</span>, 
					<span color="#0000ff">$attorneyHolders['city']</span>, 
					<span color="#0000ff">$attorneyHolders['state']</span>
					@else
					<u>___________________________________________</u>
					@endif
				</p>

				<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
				Primary Agent’s Telephone Number:
				
				<span color="#008f00">
					@if(array_key_exists('phone', $attorneyHolders) && strlen($attorneyHolders['phone']) > 0) 
						{{$attorneyHolders['phone']}}
					@else
						<span>_________________</span>
					@endif
				</span>

				<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
				<br/>

				</p>

				@if($financialPowerOfAttorney['is_backupattorney'] == 1)
					
					<p class="western" align="center" style="margin-bottom: 0in; line-height: 100%">
						<span size="4" style="font-size: 14pt">
							<b>DESIGNATION OF SUCCESSOR AGENT</b>
						</span>
					</p>
					<p class="western" align="center" style="margin-bottom: 0in; line-height: 100%">
					<br/>

					</p>
					
					<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
						If and until my primary agent is unable or unwilling to act for me, I
						name my 

						@if(strtolower($attorneyBackup['relationship']) == 'other')
							<span color="#0433ff">{{$attorneyBackup['other_relationship']}}</span>
						@else
							<span color="#0433ff">{{$attorneyBackup['relationship']}}</span>
						@endif

						<span color="#000000">, </span>

						<span color="#0433ff">{{ucwords($attorneyBackup['fullname'])}}</span>, as my agent, to 

						<span color="#000000">have all of the powers hereinafter set forth and as permitted under the
						laws of </span>

						<span color="#0433ff">{{$attorneyBackup['state']}}</span>.  The contact
						information for my agent is as follows:
					</p>
				
					<p class="western" align="justify" style="margin-top: 0.06in; margin-bottom: 0in; line-height: 100%">
						Name of Successor Agent: 
						<span color="#0433ff">{{ucwords($attorneyBackup['fullname'])}}</span>
					</p>
					
					<p class="western" style="margin-bottom: 0in; line-height: 100%">Primary
						Agent’s Address:
						<span color="#008f00">{{$attorneyBackup['address']}}</span>, 

						<span color="#0000ff">{{$attorneyBackup['city']}}</span>, 

						<span color="#0000ff">{{$attorneyBackup['state']}}</span>»
					</p>
				
				@endif
				
				<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
				Primary Agent’s Telephone Number:

				@if(array_key_exists('phone', $attorneyBackup))
				<span color="#008f00"></span>
				<span color="#0433ff"> {{$attorneyBackup['phone']}}</span>

				@else
				<u>__________________</u>
				@endif
				<span color="#008f00"></span>&nbsp;
				</p>
			
			
			
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			
			<p class="western" align="center" style="margin-top: 0.13in; margin-bottom: 0.06in; line-height: 100%">
			<span size="4" style="font-size: 14pt"><b>GRANT OF GENERAL AUTHORITY</b></span></p>
			
			<p class="western" style="margin-top: 0.13in; margin-bottom: 0.06in; line-height: 100%">
			<br/>
			<br/>
			</p>


			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			I grant my agent and any successor agent general authority to act for
			me, with the powers and duties as more fully defined in the 

			<span color="#0433ff">{{$state['act']}}</span>, <span color="#0433ff">{{$state['code']}}</span>, 
			
			@if(strtolower($state['name']) == 'wisconsin')

			<span color="#000000">attached hereto and incorporated herein as </span>

			<span color="#000000"><u>Appendix A</u></span>

			<span color="#000000">,</span>

			@elseif(strtolower($state['name']) == 'new jersey')
			
				<span color="#000000"> including the authority to conduct banking transactions as
				specifically set forth in section 2 of P.L. 1991, c.95 C.46:2B-11,
				</span>

			@endif

			with respect to the following subjects:</p>
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			<b>(INITIAL each subject, below, you want to include in the agent's
			general authority.)</b></p>
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			<br/>
			<br/>

			</p>

			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			<span color="#000000"></span>

			@if(strtolower($state['name']) == 'illinois')
				<span color="#000000"><span style="background: #ffffff">(NOTE:
				You </span></span><span color="#000000"><u><span style="background: #ffffff">must</span></u></span><span color="#000000"><span style="background: #ffffff">
				strike out any one or more of the following categories of powers you
				</span></span><span color="#000000"><u><span style="background: #ffffff">do
				not</span></u></span><span color="#000000"><span style="background: #ffffff">
				want your agent to have. </span></span><span color="#000000"><b><span style="background: #ffffff">Failure
				to strike the title of any category will cause the powers described
				in that category to be granted to the agent.</span></b></span><span color="#000000"><span style="background: #ffffff">
				To strike out a category you must draw a line through the title of
				that category.)&nbsp;</span></span><span color="#000000"></span>
				<span color="#000000"></span>
			@endif
			
			</p>
			
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			<br/>
			<br/>

			</p>

			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			( _____ )	(A)	Real Property&nbsp;</p>
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			( _____ )	(B)	Tangible Personal Property</p>
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			( _____ )	(C)	Stocks and Bonds</p>
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			( _____ )	(D)	Trade Commodities and Options</p>
			<p class="western" style="margin-bottom: 0.06in; line-height: 100%">(
			_____ )	(E)	Banks and Other Financial Institutions 
			</p>
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			( _____ )	(F)	Operation of Entity or Business</p>
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			( _____ )	(G)	Insurance and Annuities</p>
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			( _____ )	(H)	Estates, Trusts, and Other Beneficial Interests</p>
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			( _____ )	(I)	Claims and Litigation</p>
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			( _____ )	(J)	Personal and Family Maintenance</p>
			<p class="western" align="justify" style="margin-left: 1in; text-indent: -1in; margin-bottom: 0.06in; line-height: 100%">
			( _____ )	(K)	Benefits from Governmental Programs or Civil or
			Military Service (TSP,  CSRS, FERS)</p>
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			( _____ )	(L)	Retirement Plans</p>
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			( _____ )	(M)	Taxes</p>
			<p class="western" style="margin-top: 0.13in; margin-bottom: 0.06in; line-height: 100%">
			<br/>
			<br/>

			</p>



			<p class="western" align="center" style="margin-top: 0.13in; margin-bottom: 0.06in; line-height: 100%">
			<span size="4" style="font-size: 14pt"><b>GRANT OF SPECIFIC AUTHORITY</b></span></p>
			


			@if(strtolower($state['name']) == 'illinois')

			<p class="western" align="justify" style="margin-top: 0.13in; margin-bottom: 0.06in; line-height: 100%">
			<span color="#000000">
				<span style="background: #ffffff">(NOTE: You</span>
			</span>

			<span color="#000000"><u><span style="background: #ffffff">must</span></u></span><span color="#000000"><span style="background: #ffffff">
			strike out any one or more of the following categories of powers you
			</span></span><span color="#000000"><u><span style="background: #ffffff">do
			not</span></u></span><span color="#000000"><span style="background: #ffffff">
			want your agent to have. </span></span><span color="#000000"><b><span style="background: #ffffff">Failure
			to strike the title of any category will cause the powers described
			in that category to be granted to the agent.</span></b></span><span color="#000000"><span style="background: #ffffff">
			To strike out a category you must draw a line through the title of
			that category.)&nbsp;</span></span></p>

			@elseif(strtolower($state['name']) != 'illinois')

			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			Subject to the laws of 
			<span color="#0433ff">{{$state['name']}}</span>, my
			agent MAY NOT do any of the following specific acts for me UNLESS I
			have INITIALED the specific authority listed below:</p>
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
				<b>(CAUTION: Granting any of the following will give your agent the
				authority to take actions that could significantly reduce your
				property or change how your property is distributed at your death.
				INITIAL ONLY the specific authority you WANT to give your agent.)</b>
			</p>
			@endif
			
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			<br/>
			<br/>
			</p>


			<p class="western" style="margin-bottom: 0.06in; line-height: 100%">(
			_____ )	Amend, revoke, or terminate an inter vivos trust</p>
			<p class="western" style="margin-left: 1in; text-indent: -1in; margin-bottom: 0.06in; line-height: 100%">
			( _____ )	Make a gift, subject to the limitations of the «<span color="#0433ff">UPOAA
			Act</span>» and any special instructions in this power of attorney</p>
			<p class="western" style="margin-bottom: 0.06in; line-height: 100%">(
			_____ )	Create or change rights of survivorship</p>
			<p class="western" style="margin-bottom: 0.06in; line-height: 100%">(
			_____ )	Create or change a beneficiary designation</p>
			<p class="western" style="margin-left: 1in; text-indent: -1in; margin-bottom: 0.06in; line-height: 100%">
			( _____ )	Authorize another person to exercise the authority granted
			under this power of attorney</p>
			<p class="western" style="margin-left: 1in; text-indent: -1in; margin-bottom: 0.06in; line-height: 100%">
			( _____ )	Waive the principal’s right to be a beneficiary of a
			joint and survivor annuity, including a survivor benefit under a
			retirement plan</p>
			<p class="western" style="margin-bottom: 0.06in; line-height: 100%">(
			_____ )	Exercise fiduciary powers that the principal has authority to
			delegate</p>
			<p class="western" style="margin-bottom: 0.06in; line-height: 100%">(
			_____ )	Disclaim or refuse an interest in property, including a power
			of appointment</p>
			<p class="western" style="margin-left: 1in; text-indent: -1in; margin-bottom: 0in; line-height: 100%">
			( _____ )	Take any actions in connection with any digital accounts,
			assets and/or rights, including the power to access, continue,
			modify, or terminate existing accounts; create or change any
			“passwords” and/or “user identification profiles”</p>
			<p class="western" style="margin-top: 0.13in; margin-bottom: 0.06in; line-height: 100%">
			<br/>
			<br/>

			</p>


			<p class="western" align="center" style="margin-top: 0.13in; margin-bottom: 0.06in; line-height: 100%">
			<span size="4" style="font-size: 14pt"><b>LIMITATION ON AGENT'S
			AUTHORITY</b></span></p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			
			
			@if(array_key_exists('isAuthorizeToMakeGift', $attorneyPowers) && $attorneyPowers['isAuthorizeToMakeGift'] == 1)
			
			I direct that there shall
			be no limitation to my agent’s authority except for those
			limitations stated expressly herein, or by law, and hereby authorize
			my agent to use my property as my agent sees fit

				@if(array_key_exists('isAuthorizeToOperategift', $attorneyPowers) && $attorneyPowers['isAuthorizeToOperategift'] == 1)

				<span color="#000000"></span>, to make
				gifts to benefit the agent or any person to whom the agent owes an
				obligation of support.

				@else
					<span color="#000000">.</span>
				
				@endif
			
			Whether my agent is my ancestor, spouse, or descendant shall pose no limitation to my
			agent’s authority hereunder

			@else
			I direct that my agent MAY NOT use my property to benefit the agent or
			a person to whom the agent owes an obligation of support UNLESS I
			have included that authority in the Special Instructions below.

			@endif

			</p>
			<p class="western" style="margin-top: 0.13in; margin-bottom: 0.06in; line-height: 100%">
			<br/>
			<br/>

			</p>


			<p class="western" align="center" style="margin-top: 0.13in; margin-bottom: 0.06in; line-height: 100%">
				<span size="4" style="font-size: 14pt">
					<b>SPECIAL INSTRUCTIONS</b>
				</span>
			</p>

			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			I give my 

			@if($financialPowerOfAttorney['is_backupattorney'] == 1)
				agents
			@else
				agent
			@endif

			 the powers specified in this Power with the understanding
			that they will be used for my benefit and on my behalf and will be
			exercised only in a fiduciary capacity.</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			
			

			@if(array_key_exists('isIncapacity', $attorneyPowers) && $attorneyPowers['isIncapacity'] == 1)

			<ol>
				<li>
				<p align="justify" style="margin-bottom: 0.06in; line-height: 100%">
				<span face="Calibri, serif"><span face="Times New Roman, serif">The
				above authority granted to my </span>
				

				@if($financialPowerOfAttorney['is_backupattorney'])
					<span face="Times New Roman, serif"> agents</span>
				@else
					<span face="Times New Roman, serif">agent</span>
				@endif

				<span face="Times New Roman, serif"> shall take effect </span>
				<span color="#191919"><span face="Times New Roman, serif">on
				my disability or incapacity, as </span></span>
				<span face="Times New Roman, serif">determined
				ONLY upon the occasion of the signing of a written statement EITHER:</span></span></p>
				</li>
			</ol>			<p class="western" align="justify" style="margin-left: 0.38in; margin-bottom: 0.06in; line-height: 100%">
			<br/>
			<br/>

			</p>



			<p class="western" align="justify" style="margin-left: 0.38in; margin-bottom: 0.06in; line-height: 100%">
			(INSTRUCTIONS: COMPLETE OR OMIT SECTION (I) <b>OR</b> SECTION (II)
			BELOW BUT NEVER COMPLETE BOTH SECTIONS (I) AND (II) BELOW. IF YOU DO
			NOT COMPLETE EITHER SECTION (I) OR SECTION (II) BELOW, IT SHALL BE
			PRESUMED THAT YOU WANT THE PROVISIONS OF SECTION (I) BELOW TO APPLY)</p>
			<ol type="I">
				<li>
				<p align="justify" style="margin-bottom: 0.06in; line-height: 100%">
				<span face="Calibri, serif"><span face="Times New Roman, serif">By a
				physician or physicians named herein by me at this point:</span></span></p>
				</li>
			</ol>
			<p class="western" align="justify" style="margin-left: 0.75in; margin-bottom: 0.06in; line-height: 100%">
			Dr. ______________________________________________________________</p>
			<p class="western" align="justify" style="margin-left: 0.75in; margin-bottom: 0.06in; line-height: 100%">
			_________________________________________________________________</p>
			<p class="western" align="justify" style="margin-left: 0.75in; margin-bottom: 0in; line-height: 100%">
			_________________________________________________________________</p>
			<p class="western" align="center" style="margin-left: 0.75in; margin-bottom: 0.06in; line-height: 100%">
			<span size="2" style="font-size: 10pt">(handwrite the full name(s)
			and address(es) of the certifying physician(s) chosen by you)</span></p>
			<p class="western" align="justify" style="margin-left: 0.75in; margin-bottom: 0.06in; line-height: 100%">
			or if no physician or physicians are named hereinabove, or if the
			physician or physicians named hereinabove are unable to act, by my
			regular physician, or by a physician who has treated me within one
			year preceding the date of such signing, or by a licensed
			psychologist or psychiatrist, certifying that I am suffering from
			diminished capacity that would preclude me from conducting my affairs
			in a competent manner;</p>
			<p class="western" style="margin-left: 0.38in; margin-bottom: 0.06in; line-height: 100%">
			<br/>
			<br/>

			</p>
			<p class="western" style="margin-left: 0.38in; margin-bottom: 0.06in; line-height: 100%">
			<b>--OR--</b></p>
			<p class="western" align="justify" style="margin-left: 0.38in; margin-bottom: 0.06in; line-height: 100%">
			<br/>
			<br/>

			</p>


			<p class="western" align="justify" style="margin-left: 0.38in; margin-bottom: 0.06in; line-height: 100%">
			(II)	By a person or persons named herein by me at this point:</p>
			<p class="western" align="justify" style="margin-left: 0.75in; margin-bottom: 0.06in; line-height: 100%">
			__________________________________________________________________</p>
			<p class="western" align="justify" style="margin-left: 0.75in; margin-bottom: 0in; line-height: 100%">
			__________________________________________________________________</p>
			<p class="western" style="margin-left: 0.75in; margin-bottom: 0.06in; line-height: 100%">
			<span size="2" style="font-size: 10pt">(handwrite the full name(s)
			and address(es) of the certifying person(s) chosen by you)</span></p>
			<p class="western" align="justify" style="margin-left: 0.75in; margin-bottom: 0.06in; line-height: 100%">
			<br/>
			<br/>

			</p>

			<p class="western" align="justify" style="margin-left: 0.75in; margin-bottom: 0.06in; line-height: 100%">
			CERTIFYING that the following specified event has occurred:</p>
			<p class="western" align="justify" style="margin-left: 0.75in; margin-bottom: 0.06in; line-height: 100%">
			__________________________________________________________________</p>
			<p class="western" align="justify" style="margin-left: 0.75in; margin-bottom: 0in; line-height: 100%">
			__________________________________________________________________</p>
			<p class="western" align="center" style="margin-left: 0.66in; margin-bottom: 0.06in; line-height: 100%">
			<span size="2" style="font-size: 10pt">(handwrite the specified event
			the certification of which will cause this power of attorney to take
			effect)</span></p>
			<p class="western" align="center" style="margin-left: 0.66in; margin-bottom: 0.06in; line-height: 100%">
			<br/>
			<br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>


			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			
			@else



			<p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
			1. 	This Power is effective immediately upon execution. 
			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			
			@endif


			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>

			<p class="western" align="justify" style="margin-left: 0.5in; margin-bottom: 0.06in; line-height: 100%">
			2.	My agent has the power and authority to request, review, and
			receive, to the extent I could do so individually, any information,
			verbal or written, regarding my physical or mental health, including,
			but not limited to, my individually identifiable health information
			or other medical records. This release authority applies to any
			information governed by the Health Insurance Portability and
			Accountability Act of 1996 (HIPAA), 42 U.S.C. 1320d and 45 CFR
			160-164. I hereby authorize any physician, health care professional,
			dentist, health plan, hospital, clinic, laboratory, pharmacy, or
			other covered health care provider, any insurance company, and the
			Medical Information Bureau, Inc., or other health care clearinghouse
			that has provided treatment or services to me, or that has paid for
			or is seeking payment from me for such services, to give, disclose,
			and release to my agent, without restriction, all of my individually
			identifiable health information and medical records regarding any
			past, present, or future medical or mental health condition. This
			authority given my agent shall supersede any other agreement which I
			may have made with my health care providers to restrict access to or
			disclosure of my individually identifiable health information. This
			authority given my agent shall be effective during all times that
			this Power of Attorney is effective, and shall terminate as provided
			herein or in the event that I revoke the authority in writing and
			deliver it to my health care provider.</p>
			<p class="western" align="justify" style="margin-left: 0.5in; margin-bottom: 0.06in; line-height: 100%">
			<br/>
			<br/>

			</p>
			<p class="western" align="justify" style="margin-left: 0.5in; margin-bottom: 0.06in; line-height: 100%">
			3.	My agent(s) shall not be entitled to compensation for services in
			handling my financial affairs; however, my agent(s) shall be entitled
			to reimbursement from my assets for reasonable expenses incurred on
			my behalf.</p>
			<p class="western" align="justify" style="margin-left: 0.5in; margin-bottom: 0.09in; line-height: 100%">
			<br/>
			<br/>

			</p>


			<p class="western" align="justify" style="margin-left: 0.5in; margin-bottom: 0.09in; line-height: 100%">
			4.	You may give additional special instructions on the following
			lines:</p>
			<p class="western" align="justify" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
			________________________________________________________________________</p>
			<p class="western" align="justify" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
			________________________________________________________________________</p>
			<p class="western" align="justify" style="margin-left: 0.38in; margin-bottom: 0in; line-height: 100%">
			________________________________________________________________________</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			<p class="western" align="center" style="margin-bottom: 0.06in; line-height: 100%">
			<span size="4" style="font-size: 14pt"><b>NOMINATION OF GUARDIAN
			(OPTIONAL)</b></span></p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			If it becomes necessary for a court to appoint a conservator or
			guardian of my estate or guardian of my person, I nominate the
			following person(s) for appointment:&nbsp;</p>
			<p class="western" style="margin-bottom: 0.06in; line-height: 100%"><br/>
			<br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			<b>CONSERVATOR OF MY ESTATE:</b> (SELECT OR OMIT EITHER OPTION BELOW,
			BUT NEVER SELECT BOTH.)</p>
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			<br/>
			<br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			<b>(If you select your above-named agent, please INITIAL below.)</b></p>
			<p class="western" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
			( _____ ) my Agent (or successor Agent) named above&nbsp;</p>
			<p class="western" style="margin-bottom: 0.06in; line-height: 100%"><b>--OR--</b></p>
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			 <b>(If you select someone other than your above-named agent, please
			HANDWRITE your designation below.)</b></p>
			<p class="western" style="margin-left: 0.38in; margin-bottom: 0.06in; line-height: 100%">
			<br/>
			<br/>

			</p>
			<p class="western" style="margin-left: 0.38in; margin-bottom: 0.06in; line-height: 100%">
			Nominee’s name:
			_________________________________________________________</p>
			<p class="western" style="margin-left: 0.38in; margin-bottom: 0.06in; line-height: 100%">
			<br/>
			<br/>

			</p>
			<p class="western" style="margin-left: 0.38in; margin-bottom: 0.06in; line-height: 100%">
			Nominee’s address:
			_______________________________________________________&nbsp;</p>
			<p class="western" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
			<br/>
			<br/>

			</p>
			<p class="western" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
			Nominee’s telephone number:
			__________________________________________&nbsp;</p>
			<p class="western" style="margin-top: 0.06in; margin-bottom: 0.06in; line-height: 100%">
			<br/>
			<br/>

			</p>
			<p class="western" style="margin-top: 0.06in; margin-bottom: 0.06in; line-height: 100%">
			<b>GUARDIAN OF MY PERSON:</b> (SELECT OR OMIT EITHER OPTION BELOW,
			BUT NEVER SELECT BOTH.)</p>
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			<br/>
			<br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			 <b>(If you select your above-named agent, please INITIAL below.)</b>&nbsp;</p>
			<p class="western" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
			( _____ ) my Agent (or successor Agent) named above&nbsp;</p>
			<p class="western" style="margin-bottom: 0.06in; line-height: 100%"><br/>
			<br/>

			</p>


			<p class="western" style="margin-bottom: 0.06in; line-height: 100%"><b>--OR--</b></p>
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			<b>(If you select someone other than your above-named agent, please
			HANDWRITE your designation below.)</b></p>
			<p class="western" style="margin-left: 0.38in; margin-bottom: 0.06in; line-height: 100%">
			<br/>
			<br/>

			</p>
			<p class="western" style="margin-left: 0.38in; margin-bottom: 0.06in; line-height: 100%">
			Nominee’s name:
			_________________________________________________________</p>
			<p class="western" style="margin-left: 0.38in; margin-bottom: 0.06in; line-height: 100%">
			<br/>
			<br/>

			</p>
			<p class="western" style="margin-left: 0.38in; margin-bottom: 0.06in; line-height: 100%">
			Nominee’s address:
			_______________________________________________________&nbsp;</p>
			<p class="western" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
			<br/>
			<br/>

			</p>
			<p class="western" style="margin-left: 0.38in; margin-bottom: 0.09in; line-height: 100%">
			Nominee’s telephone number:
			__________________________________________&nbsp;</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			
			<p class="western" align="center" style="margin-top: 0.13in; margin-bottom: 0.06in; line-height: 100%">
			<b>EFFECT OF INCAPACITY OR DISABILITY OF PRINCIPAL</b></p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			

			

			@if($attorneyPowers['isDurable'] == 1)

			<b>THIS
			POWER OF ATTORNEY IS A “DURABLE” POWER OF ATTORNEY </b><b>AND, TO
			THE MAXIMUM EXTENT PERMITTED BY LAW, SHALL NOT BE AFFECTED BY MY
			DISABILITY, INCAPACITY OR INCOMPETENCY, OR IN THE EVENT OF LATER
			UNCERTAINTY AS TO WHETHER I AM DEAD OR ALIVE, OR BY LAPSE OF TIME</b><span color="#000000"><b>,</b></span><span color="#000000">
			</span>

			<b>UNLESS OR UNTIL OTHERWISE ORDERED BY A COURT OF COMPETENT
			JURISDICTION.</b>

			@elseif($attorneyPowers['isDurable'] == 0)
			
			<b>THIS POWER OF
			ATTORNEY SHALL TERMINATE UPON MY DISABILITY OR INCAPACITY, OR UPON MY
			EARLIER REVOCATION OR TERMINATION OF THIS POWER.</b>

			@endif	

			</p>
			<p class="western" align="center" style="margin-top: 0.13in; margin-bottom: 0.06in; line-height: 100%">
			<br/>
			<br/>

			</p>


			<p class="western" align="center" style="margin-top: 0.13in; margin-bottom: 0.06in; line-height: 100%">
			<b>RELIANCE ON THIS POWER OF ATTORNEY</b></p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			Any person, including my agent, may rely upon the validity of this
			power of attorney or a copy of it unless that person knows it has
			terminated or is invalid.

			@if(strtolower($state['name']) == 'south carolina')
			
			<span>
				No person who may act in reliance upon the representation of my agent
				for the scope of authority granted to the agent shall incur any
				liability to me or to my estate as a result of permitting the agent
				to exercise this authority, nor is any person who deals with my agent
				responsible to determine or ensure the proper application of funds or
				property.
			</span>
			
			@endif
			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			
			@if(strtolower($state['name']) == 'illinois')
				<p class="western" align="center" style="margin-bottom: 0in; line-height: 100%">
				<b>NOTICE TO AGENT</b></p>
				<p class="western" style="margin-bottom: 0in; line-height: 100%"><span color="#000000"><span style="background: #ffffff">The
				Notice to Agent is incorporated by reference and included as part of
				this form.&nbsp;</span></span></p>
			@endif
			<p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>
			<p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>
			<p class="western" align="center" style="margin-top: 0.13in; margin-bottom: 0.06in; line-height: 100%; page-break-before: always">
			<b>SIGNATURE AND ACKNOWLEDGMENT</b></p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<span color="#000000"><u>					</u></span><span color="#000000">		</span><span color="#000000"><b>
			 DATE: </b></span><u>			</u> 
			</p>
			<p class="western" align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
			
				<span color="#000000"></span><b>«</b>

				<span color="#0000ff">
					<b>{{strtoupper($tellUsAboutYou['fullname'])}}</b>
				</span>

				<span color="#000000"><b>		</b></span>
			</p>

			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
				<span color="#0433ff">{{$tellUsAboutYou['address']}}</span>	
			</p>

			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<span color="#000000">«</span>
				<span color="#0433ff">{{$tellUsAboutYou['city']}}</span>
				<span color="#000000">, </span>

				<span color="#0433ff">{{$tellUsAboutYou['state']}}</span>
				<span color="#000000"> </span>

				<span color="#0433ff">{{$tellUsAboutYou['zip']}}</span>

				<span color="#000000"></span></p>
			<p class="western" align="justify" style="margin-bottom: 0.13in; line-height: 100%">
				<span color="#0433ff">{{$tellUsAboutYou['phone']}}</span>
			</p>
			
			<p class="western" align="justify" style="margin-bottom: 0.13in; line-height: 100%">
			<br/>
			<br/>

			</p>

			@if(strtolower($state['name']) != 'illinois') 

			<p class="western" align="justify" style="margin-bottom: 0.13in; line-height: 100%">
			<br/>
			<br/>

			</p>


			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><span color="#000000"><u>					</u></span><span color="#000000">		</span><span color="#000000"><u>					</u></span><span color="#000000">	</span></p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><span color="#000000"><b>(WITNESS
			1)</b></span><span color="#000000">						</span><span color="#000000"><b>(WITNESS
			2)</b></span></p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><span color="#000000">NAME:</span><span color="#000000">						</span><span color="#000000">NAME:</span></p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><span color="#000000">ADDRESS:</span><span color="#000000">						</span><span color="#000000">ADDRESS:</span></p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><span color="#000000">CITY/STATE:</span><span color="#000000">						</span><span color="#000000">CITY/STATE:</span></p>
			<p class="western" align="justify" style="margin-bottom: 0.13in; line-height: 100%">
			<br/>
			<br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0.13in; line-height: 100%">
			<br/>
			<br/>

			</p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><span color="#000000">STATE
			OF &nbsp;________________</span><span color="#000000">		</span><span color="#000000">)</span></p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><span color="#000000">						</span><span color="#000000">)
			ss. </span>
			</p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><span color="#000000">COUNTY
			OF ________________</span><span color="#000000">		</span><span color="#000000">)</span></p>
			<p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
			<span color="#000000">Subscribed, sworn and acknowledged before me by
			</span>

			<span color="#0000ff">
				<b>{{strtoupper($tellUsAboutYou['fullname'])}}</b>
			</span>

			<span color="#000000">,
			the principal, and _________________________________________, as
			witness, and _____________________________________, as witness, who
			personally appeared on this &nbsp;_________ day of
			&nbsp;________________________________, _______, and who are
			personally known to me or who have produced satisfactory photo
			identification, and whose names are signed to the foregoing
			instrument. </span>
			</p>
			<p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><span color="#000000">______________________________________
			 </span><b>(Seal, if any)</b></p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><span color="#000000">NOTARY
			PUBLIC</span></p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><span color="#000000">My
			commission expires: _________________</span></p>
			<p class="western" align="justify" style="margin-bottom: 0.13in; line-height: 100%">
			<br/>
			<br/>

			</p>


			<p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>

			@elseif(strtolower($state['name']) == 'illinois')
			

			<p class="western" align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
			
				<span face="Courier New, serif"><span size="2" style="font-size: 10pt"><span color="#000000"><span face="Times New Roman, serif"><span size="2" style="font-size: 11pt"><span style="background: #ffffff">The
			undersigned witness certifies that </span></span></span></span></span></span><span size="2" style="font-size: 11pt"></span>

			<span color="#0000ff">
				<span size="2" style="font-size: 11pt">
					<b>{{$tellUsAboutYou['fullname']}}</b>
				</span>
			</span>

			<span face="Courier New, serif">
				<span size="2" style="font-size: 10pt"><span color="#000000"><span face="Times New Roman, serif"><span size="2" style="font-size: 11pt"><span style="background: #ffffff">,
			known to me to be the same person whose name is subscribed as
			principal to the foregoing power of attorney, appeared before me and
			the notary public and acknowledged signing and delivering the
			instrument as the free and voluntary act of the principal, for the
			uses and purposes therein set forth. I believe him or her to be of
			sound mind and memory. The undersigned witness also certifies that
			the witness is not: (a) the attending physician or mental health
			service provider or a relative of the physician or provider; (b) an
			owner, operator, or relative of an owner or operator of a health care
			facility in which the principal is a patient or resident; (c) a
			parent, sibling, descendant, or any spouse of such parent, sibling,
			or descendant of either the principal or any agent or successor agent
			under the foregoing power of attorney, whether such relationship is
			by blood, marriage, or adoption; or (d) an agent or successor agent
			under the foregoing power of attorney.&nbsp;</span></span></span></span></span></span></p>
			
			<p class="western" align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
			<br/>
			<br/>
			</p>

			<p class="western" style="margin-bottom: 0in; line-height: 100%; background: #ffffff">
			<span face="Courier New, serif"><span size="2" style="font-size: 10pt"><span color="#000000"><span face="Times New Roman, serif"><span size="3" style="font-size: 12pt"><u>					</u></span></span></span></span></span><span face="Courier New, serif"><span size="2" style="font-size: 10pt"><span color="#000000"><span face="Times New Roman, serif"><span size="3" style="font-size: 12pt">	Dated:
			</span></span></span></span></span><span face="Courier New, serif"><span size="2" style="font-size: 10pt"><span color="#000000"><span face="Times New Roman, serif"><span size="3" style="font-size: 12pt"><u>						</u></span></span></span></span></span></p>
			<p class="western" align="justify" style="margin-bottom: 0.13in; line-height: 100%">
			<span face="Courier New, serif"><span size="2" style="font-size: 10pt"><span color="#000000"><span face="Times New Roman, serif"><span size="3" style="font-size: 12pt">Witness</span></span></span></span></span><span color="#0433ff">				</span></p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
			<span face="Courier New, serif"><span size="2" style="font-size: 10pt"><span color="#000000"><span face="Times New Roman, serif"><span size="2" style="font-size: 11pt"><span style="background: #ffffff">The
			undersigned witness certifies that </span></span></span></span></span></span>

			
			<span color="#0000ff">
				<span size="2" style="font-size: 11pt">
					<b>{{strtoupper(strtoupper($tellUsAboutYou['fullname']))}}</b>
				</span>
			</span>

			<span face="Courier New, serif"><span size="2" style="font-size: 10pt"><span color="#000000"><span face="Times New Roman, serif"><span size="2" style="font-size: 11pt"><span style="background: #ffffff">,
			known to me to be the same person whose name is subscribed as
			principal to the foregoing power of attorney, appeared before me and
			the notary public and acknowledged signing and delivering the
			instrument as the free and voluntary act of the principal, for the
			uses and purposes therein set forth. I believe him or her to be of
			sound mind and memory. The undersigned witness also certifies that
			the witness is not: (a) the attending physician or mental health
			service provider or a relative of the physician or provider; (b) an
			owner, operator, or relative of an owner or operator of a health care
			facility in which the principal is a patient or resident; (c) a
			parent, sibling, descendant, or any spouse of such parent, sibling,
			or descendant of either the principal or any agent or successor agent
			under the foregoing power of attorney, whether such relationship is
			by blood, marriage, or adoption; or (d) an agent or successor agent
			under the foregoing power of attorney.&nbsp;</span></span></span></span></span></span></p>
			<p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>

			<p class="western" style="margin-bottom: 0in; line-height: 100%; background: #ffffff">
			<span face="Courier New, serif"><span size="2" style="font-size: 10pt"><span color="#000000"><span face="Times New Roman, serif"><span size="3" style="font-size: 12pt"><u>					</u></span></span></span></span></span><span face="Courier New, serif"><span size="2" style="font-size: 10pt"><span color="#000000"><span face="Times New Roman, serif"><span size="3" style="font-size: 12pt">	Dated:
			</span></span></span></span></span><span face="Courier New, serif"><span size="2" style="font-size: 10pt"><span color="#000000"><span face="Times New Roman, serif"><span size="3" style="font-size: 12pt"><u>						</u></span></span></span></span></span></p>
			<p class="western" align="justify" style="margin-bottom: 0.13in; line-height: 100%">
			<span face="Courier New, serif"><span size="2" style="font-size: 10pt"><span color="#000000"><span face="Times New Roman, serif"><span size="3" style="font-size: 12pt">Witness</span></span></span></span></span><span color="#0433ff">		</span></p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><span color="#000000"><span size="2" style="font-size: 11pt">STATE
			OF &nbsp;________________</span></span><span color="#000000"><span size="2" style="font-size: 11pt">		</span></span><span color="#000000"><span size="2" style="font-size: 11pt">)</span></span></p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><span color="#000000"><span size="2" style="font-size: 11pt">						</span></span><span color="#000000"><span size="2" style="font-size: 11pt">)
			ss. </span></span>
			</p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><span color="#000000"><span size="2" style="font-size: 11pt">COUNTY
			OF ________________</span></span><span color="#000000"><span size="2" style="font-size: 11pt">		</span></span><span color="#000000"><span size="2" style="font-size: 11pt">)</span></span></p>
			<p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
			<span color="#000000"><span size="2" style="font-size: 11pt">Subscribed,
			sworn and acknowledged before me by </span></span>

			

			<span color="#0000ff">
				<span size="2" style="font-size: 11pt">
					<b>{{strtoupper($tellUsAboutYou['fullname'])}}</b>
				</span>
			</span>


			<span color="#000000"><span size="2" style="font-size: 11pt">,
			the principal, and _________________________________________, as
			witness, and _____________________________________, as witness, who
			personally appeared on this &nbsp;_________ day of
			&nbsp;________________________________, _______, and who are
			personally known to me or who have produced satisfactory photo
			identification, and whose names are signed to the foregoing
			instrument. </span></span>
			</p>
			<p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>



			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><span color="#000000"><span size="2" style="font-size: 11pt">_________________________________</span></span><span size="2" style="font-size: 11pt"><b>(Seal,
			if any)</b></span></p>
			<p align="justify" style="margin-bottom: 0in; line-height: 100%"><span color="#000000"><span size="2" style="font-size: 11pt">NOTARY
			PUBLIC					My commission expires: _________________</span></span></p>

			@endif



			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%; page-break-before: always">
			<i>The following optional form affidavit may be used by an agent to
			certify facts concerning a power of attorney: </i>
			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			
			<p class="western" align="center" style="margin-bottom: 0in; line-height: 100%">
			<b>AGENT'S CERTIFICATION AS TO THE VALIDITY OF POWER OF ATTORNEY </b>
			</p>
			<p class="western" align="center" style="margin-bottom: 0in; line-height: 100%">
			<b>AND AGENT'S AUTHORITY</b></p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			State of _____________________________ 
			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			[County] of___________________________</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
			I, _____________________________________________ (Name of Agent),
			certify under penalty of perjury that 
			
			<span color="#0000ff">
				<b>{{strtoupper($tellUsAboutYou['fullname'])}}</b>
			</span>

			 granted me authority as an agent or
			successor agent in a power of attorney dated
			________________________. 
			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			I further certify that to my knowledge: 
			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			(1) the principal is alive and has not revoked the power of attorney
			or my authority to act under the power of attorney and the power of
			attorney and my authority to act under the power of attorney have not
			terminated; 
			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			(2) if the power of attorney was drafted to become effective upon the
			happening of an event or contingency, the event or contingency has
			occurred; 
			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%"><a name="_GoBack"></a>
			(3) if I was named as a successor agent, the prior agent is no longer
			able or willing to serve; and
			(4)_____________________________________________________________________
			______________________________________________________________________________</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			______________________________________________________________________________
			_______________________________________________________________________
			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<span size="2" style="font-size: 10pt">(Insert other relevant
			statements) </span>
			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<b>SIGNATURE AND ACKNOWLEDGMENT </b>
			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			____________________________________________ 	__________ 
			</p>


			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			Agent's Signature 						Date 
			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			____________________________________________ 
			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			Agent's Name Printed 
			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			____________________________________________ 
			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			Agent's Address 
			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			____________________________________________ 
			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			Agent's Telephone Number 
			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			This document was acknowledged before me on
			__________________________, 20<u>	</u>,
			by______________________________________ (Name of Agent) 
			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			____________________________________________ (Seal, if any) 
			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			Signature of Notary 
			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			My commission expires: ________________________<span size="2" style="font-size: 9pt">
			</span>
			</p>
			

			

			@if(strtolower($state['name']) == 'illinois')

			<p class="western" align="center" style="margin-bottom: 0in; line-height: 100%; background: #ffffff">
			<span color="#000000"><span size="4" style="font-size: 14pt"><b>NOTICE
			TO THE INDIVIDUAL SIGNING THE ILLINOIS</b></span></span></p>
			<p class="western" align="center" style="margin-bottom: 0in; line-height: 100%; background: #ffffff">
			<span color="#000000"><span size="4" style="font-size: 14pt"><b>STATUTORY
			SHORT FORM POWER OF ATTORNEY FOR PROPERTY.</b></span></span></p>
			<p class="western" align="center" style="margin-bottom: 0in; line-height: 100%; background: #ffffff">
			<br/>

			</p>


			<p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
			<span color="#000000"><span size="4" style="font-size: 14pt"><span style="background: #ffffff">PLEASE
			READ THIS NOTICE CAREFULLY. The form that you will be signing is a
			legal document. It is governed by the Illinois Power of Attorney Act.
			 If there is anything about this form that you do not understand, you
			should ask a lawyer to explain it to you.</span></span></span></p>
			<p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
			<span color="#000000"><span size="4" style="font-size: 14pt"><span style="background: #ffffff">The
			purpose of this Power of Attorney is to give your designated &quot;agent&quot;
			broad powers to handle your financial affairs, which may include the
			power to pledge, sell, or dispose of any of your real or personal
			property, even without your consent or any advance notice to you.
			When using the Statutory Short Form, you may name successor agents,
			but you may not name co-agents.</span></span></span></p>
			<p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
			<span color="#000000"><span size="4" style="font-size: 14pt"><span style="background: #ffffff">This
			form does not impose a duty upon your agent to handle your financial
			affairs, so it is important that you select an agent who will agree
			to do this for you. It is also important to select an agent whom you
			trust, since you are giving that agent control over your financial
			assets and property. Any agent who does act for you has a duty to act
			in good faith for your benefit and to use due care, competence, and
			diligence. He or she must also act in accordance with the law and
			with the directions in this form. Your agent must keep a record of
			all receipts, disbursements, and significant actions taken as your
			agent.</span></span></span></p>
			<p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
			<span color="#000000"><span size="4" style="font-size: 14pt"><span style="background: #ffffff">Unless
			you specifically limit the period of time that this Power of Attorney
			will be in effect, your agent may exercise the powers given to him or
			her throughout your lifetime, both before and after you become
			incapacitated. A court, however, can take away the powers of your
			agent if it finds that the agent is not acting properly. You may also
			revoke this Power of Attorney if you wish.</span></span></span></p>
			<p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
			<span color="#000000"><span size="4" style="font-size: 14pt"><span style="background: #ffffff">This
			Power of Attorney does not authorize your agent to appear in court
			for you as an attorney-at-law or otherwise to engage in the practice
			of law unless he or she is a licensed attorney who is authorized to
			practice law in Illinois.&nbsp;</span></span></span></p>
			<p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
			<span color="#000000"><span size="4" style="font-size: 14pt"><span style="background: #ffffff">The
			powers you give your agent are explained more fully in Section 3-4 of
			the Illinois Power of Attorney Act. This form is a part of that law.
			The &quot;NOTE&quot; paragraphs throughout this form are
			instructions.</span></span></span></p>
			<p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
			<span color="#000000"><span size="4" style="font-size: 14pt"><span style="background: #ffffff">You
			are not required to sign this Power of Attorney, but it will not take
			effect without your signature. You should not sign this Power of
			Attorney if you do not understand everything in it, and what your
			agent will be able to do if you do sign it.</span></span></span></p>
			<p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			<p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
			<span color="#000000"><span size="4" style="font-size: 14pt"><span style="background: #ffffff">Please
			place your initials on the following line indicating that you have
			read this Notice:</span></span></span></p>
			<p class="western" align="right" style="margin-bottom: 0in; line-height: 100%; background: #ffffff">
			<span color="#000000"><span size="4" style="font-size: 14pt">.....................</span></span></p>
			<p class="western" align="right" style="margin-bottom: 0in; line-height: 100%; background: #ffffff">
			<span color="#000000"><span size="4" style="font-size: 14pt">Principal's
			initials</span></span></p>
			<p class="western" align="center" style="margin-bottom: 0in; line-height: 100%">
			<span size="4" style="font-size: 14pt"><b>NOTICE TO AGENT</b></span></p>
			<p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>
			<p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
			<span size="4" style="font-size: 14pt">When you accept the authority
			granted under this power of attorney a special legal relationship,
			known as agency, is created between you and the principal. Agency
			imposes upon you duties that continue until you resign or the power
			of attorney is terminated or revoked.</span></p>
			<p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<span size="4" style="font-size: 14pt">As agent you must:</span></p>
			<p class="western" align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
			<span size="4" style="font-size: 14pt">(1) do what you know the
			principal reasonably expects you to do with the principal’s
			property;</span></p>
			<p class="western" align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
			<span size="4" style="font-size: 14pt">(2) act in good faith for the
			best interest of the principal, using due care, competence, and
			diligence;</span></p>
			<p class="western" align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
			<span size="4" style="font-size: 14pt">(3) keep a complete and
			detailed record of all receipts, disbursements, and significant
			actions conducted for the principal;</span></p>
			<p class="western" align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
			<span size="4" style="font-size: 14pt">(4) attempt to preserve the
			principal's estate plan, to the extent actually known by the agent,
			if preserving the plan is consistent with the principal's best
			interest; and</span></p>
			<p class="western" align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
			<span size="4" style="font-size: 14pt">(5) cooperate with a person
			who has authority to make health care decisions for the principal to
			carry out the principal's reasonable expectations to the extent
			actually in the principal's best interest.</span></p>
			<p class="western" align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>


			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<span size="4" style="font-size: 14pt">As agent you must not do any
			of the following:</span></p>
			<p class="western" align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
			<span size="4" style="font-size: 14pt">(1) act so as to create a
			conflict of interest that is inconsistent with the other principles
			in this Notice to Agent;</span></p>
			<p class="western" align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
			<span size="4" style="font-size: 14pt">(2) do any act beyond the
			authority granted in this power of attorney;</span></p>
			<p class="western" align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
			<span size="4" style="font-size: 14pt">(3) commingle the principal's
			funds with your funds;</span></p>
			<p class="western" align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
			<span size="4" style="font-size: 14pt">(4) borrow funds or other
			property from the principal, unless otherwise authorized;</span></p>
			<p class="western" align="justify" style="margin-left: 1in; margin-bottom: 0in; line-height: 100%">
			<span size="4" style="font-size: 14pt">(5) continue acting on behalf
			of the principal if you learn of any event that terminates this power
			of attorney or your authority under this power of attorney, such as
			the death of the principal, your legal separation from the principal,
			or the dissolution of your marriage to the principal.</span></p>
			<p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			<p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
			<span size="4" style="font-size: 14pt">If you have special skills or
			expertise, you must use those special skills and expertise when
			acting for the principal. </span>
			</p>
			<p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			<p class="western" align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
			<span size="4" style="font-size: 14pt">You must disclose your
			identity as an agent whenever you act for the principal by writing or
			printing the name of the principal and signing your own name &quot;as
			Agent&quot; in the following manner:   </span><span size="4" style="font-size: 14pt"><b>&quot;</b></span>

			<span color="#0000ff">
				<span size="4" style="font-size: 14pt">
					<b>{{strtoupper($tellUsAboutYou['fullname'])}}</b>
				</span>
			</span>

			<span size="4" style="font-size: 14pt">

			<span size="4" style="font-size: 14pt"><b>by (Your Name)
			as Agent&quot;</b></span>
			</p>

			<p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
			<span size="4" style="font-size: 14pt">The meaning of the powers
			granted to you is contained in Section 3-4 of the Illinois Power of
			Attorney Act, which is incorporated by reference into the body of the
			power of attorney for property document.</span></p>
			<p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			<p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
			<span size="4" style="font-size: 14pt">If you violate your duties as
			agent or act outside the authority granted to you, you may be liable
			for any damages, including attorney's fees and costs, caused by your
			violation.</span></p>
			<p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>
			<p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 100%">
			<span size="4" style="font-size: 14pt"><b>If there is anything about
			this document or your duties that you do not understand, you should
			seek legal advice from an attorney.</b></span></p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<br/>

			</p>

			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<span color="#000000">«</span><span color="#008f00">ELSE IF State =
			! “Illinois”</span><span color="#000000">» </span>
			</p>

			@elseif(strtolower($state['name'] != 'illinois'))

			<p class="western" align="center" style="margin-bottom: 0.06in; line-height: 100%">
			<b>IMPORTANT INFORMATION FOR AGENT</b></p>
			<p class="western" align="center" style="margin-bottom: 0.06in; line-height: 100%">
			<i>Agent’s Duties</i></p>
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			When you accept the authority granted under this power of attorney, a
			special legal relationship is created between you and the principal.
			This relationship imposes upon you legal duties that continue until
			you resign or the power of attorney is terminated or revoked. You
			must:</p>
			<p class="western" align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0.06in; line-height: 100%">
			(1)	do what you know the principal reasonably expects you to do with
			the principal’s property or, if you do not know the principal’s
			expectations, act in the principal’s best interest;</p>
			<p class="western" align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0.06in; line-height: 100%">
			(2)	act in good faith;</p>
			<p class="western" align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0.06in; line-height: 100%">
			(3)	do nothing beyond the authority granted in this power of
			attorney; and,</p>
			<p class="western" align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0.06in; line-height: 100%">
			(4)	disclose your identity as an agent whenever you act for the
			principal by writing or printing the name of the principal and
			signing your own name as “Agent” in the following manner:</p>
			<p class="western" align="center" style="margin-left: 0.38in; margin-bottom: 0.13in; line-height: 100%">
			<span color="#0433ff">
				<u>
					<b>{{strtoupper($tellUsAboutYou['fullname'])}} </b>
				</u>
			</span>

			<u><b>by (Your Signature)
			as Agent</b></u></p>
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			Unless the Special Instructions in this power of attorney state
			otherwise, you must also:</p>
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			(1)	act loyally for the principal’s benefit;</p>
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			(2)	avoid conflicts that would impair your ability to act in the
			principal’s best interest;</p>
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			(3)	act with care, competence, and diligence;</p>
			<p class="western" align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0.06in; line-height: 100%">
			(4)	keep a record of all receipts, disbursements, and transactions
			made on behalf of the principal;</p>
			<p class="western" align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0.06in; line-height: 100%">
			(5)	cooperate with any person who has authority to make health-care
			decisions for the principal to do what you know the principal
			reasonably expects or, if you do not know the principal’s
			expectations, to act in the principal’s best interest; and,</p>
			<p class="western" align="justify" style="margin-left: 0.38in; text-indent: -0.38in; margin-bottom: 0in; line-height: 100%">
			(6)	attempt principal to preserve the principal’s estate plan do
			what you know the principal reasonably expects or, if you do not know
			the plan and preserving the plan is consistent with principal’s
			expectations, to act in the principal’s best interest.</p>
			<p class="western" align="center" style="margin-top: 0.06in; margin-bottom: 0.06in; line-height: 100%">
			<i>Termination of Agent's Authority</i></p>
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			You must stop acting on behalf of the principal if you learn of any
			event that terminates this power of attorney or your authority under
			this power of attorney. Events that terminate this power of attorney
			or your authority to act under it include:</p>
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			(1)	death of the principal;</p>
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			(2)	the principal’s revocation of the power of attorney or your
			authority;</p>
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			(3)	the occurrence of a termination event stated in the power of
			attorney;</p>
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			(4)	the purpose of the power of attorney is fully accomplished; or,</p>
			<p class="western" align="justify" style="margin-left: 0.5in; text-indent: -0.5in; margin-bottom: 0in; line-height: 100%">
			(5)	if you are married to the principal, a legal action is filed with
			a court to end your marriage, or for your legal separation, unless
			the Special Instructions in this power of attorney state that such an
			action will not terminate your authority.</p>
			<p class="western" align="center" style="margin-top: 0.06in; margin-bottom: 0.06in; line-height: 100%">
			<i>Liability of Agent</i></p>
			
			<p class="western" align="justify" style="margin-bottom: 0.06in; line-height: 100%">
			The meaning of the authority granted to you is defined in the 
			<span color="#0433ff">{{$state['act']}}</span>, 

			<span color="#0433ff">{{$state['code']}}</span><span color="#0433ff">.</span>»
			
			If you violate the <span color="#0433ff">{{$state['act']}}</span> or act
			outside the authority granted, you may be liable for any damages
			caused by your violation.</p>
			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
			<b>If there is anything about this document or your duties that you
			do not understand, you should seek legal advice.</b></p>
			
			@endif
			
			<p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

			</p>



			<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%; page-break-before: always">
			

			<span color="#008f00">IF STATE = “Delaware”</span>

			
			</p>


			@if(strtolower($state['name']) == 'delaware')
				<p class="western" align="center" style="margin-bottom: 0in; line-height: 100%">
				<span color="#000000"><b>NOTICE</b></span></p>
				<p class="western" align="center" style="margin-bottom: 0in; line-height: 100%">
				<br/>

				</p>
				<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
				<span color="#000000">As the person signing this </span>

				@if($attorneyPowers['isDurable'] == 1)

				<span color="#000000">durable </span>

				@endif

				<span color="#000000">power of attorney you are the
				Principal.  The purpose of this power of attorney is to give the
				person you designate (your &quot;Agent'') broad powers to handle your
				property, which may include powers to sell, dispose of, or encumber
				any real or personal property without advance notice to you or
				approval by you.</span></p>
				<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				<p align="justify" style="margin-bottom: 0in; line-height: 100%"><span color="#000000">This
				power of attorney does&nbsp;</span><span color="#000000"><u>not&nbsp;</u></span><span color="#000000">authorize
				your Agent to make health-care decisions for you.</span></p>
				<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				<p align="justify" style="margin-bottom: 0in; line-height: 100%"><span color="#000000">Unless
				you specify otherwise, your Agent's authority will continue even if
				you become incapacitated, or until you die or revoke the power of
				attorney, or until your Agent resigns or is unable to act for you.
				You should select someone you trust to serve as your Agent.</span></p>
				<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				<p align="justify" style="margin-bottom: 0in; line-height: 100%"><span color="#000000">This
				power of attorney does not impose a duty on your Agent to exercise
				granted powers, but when powers are exercised, your Agent must use
				due care to act for your benefit and in accordance with this power of
				attorney.</span></p>
				<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				<p align="justify" style="margin-bottom: 0in; line-height: 100%"><span color="#000000">Your
				Agent must keep your funds and other property separate from your
				Agent's funds and other property.</span></p>
				<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				<p align="justify" style="margin-bottom: 0in; line-height: 100%"><span color="#000000">A
				court can take away the powers of your Agent if it finds your Agent
				is not acting properly.</span></p>
				<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				<p align="justify" style="margin-bottom: 0in; line-height: 100%"><span color="#000000">The
				powers and duties of an Agent under a </span>

				@if($attorneyPowers['isDurable'] == 1)

					<span color="#000000">durable </span>

				@endif


				<span color="#000000">power of attorney are explained more
				fully in Delaware Code, Title 12, Chapter 49A, § 49A-114 and §§
				49A-201 through 49A-217.</span></p>
				<p align="justify" style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
			
				<p align="justify" style="margin-bottom: 0in; line-height: 100%"><span color="#000000">If
				there is anything about this form that you do not understand, you
				should ask a lawyer of your own choosing to explain it to you.</span></p>
				<p style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				<p style="margin-bottom: 0in; line-height: 100%"><span color="#000000"><b>I
				have read or had explained to me this notice and I understand its
				contents. (Acknowledge by signing below).</b></span></p>
				<p style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				<p style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				<p style="margin-bottom: 0in; line-height: 100%"><span color="#000000"><u>			</u></span><span color="#000000">    	_________</span></p>
				<p style="margin-bottom: 0in; line-height: 100%"><span color="#000000"><b>Principal					Date</b></span></p>
				<p style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				<p align="center" style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				<p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>



				<p align="center" style="margin-bottom: 0in; line-height: 100%; page-break-before: always">
				<span color="#000000"><b>AGENT'S CERTIFICATION </b></span>
				</p>
				<p align="center" style="margin-bottom: 0in; line-height: 100%"><span color="#000000"><b>(NOTE:
				Agent’s signature REQUIRED pursuant to 12 Del. C. § 49A-113</b></span><span color="#000000">)</span></p>
				<p align="center" style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
			
				<p style="margin-bottom: 0in; line-height: 100%"><span color="#000000">I,
				</span><span color="#000000"><u>				</u></span><span color="#000000">,
				have read the attached </span>

				@if($attorneyPowers['isDurable'] == 1)
					<span color="#000000">durable </span>
				@endif

				<span color="#000000">»personal power of attorney and I am
				the person identified as the Agent for the Principal.  To the best of
				my knowledge this power has not been revoked. I hereby acknowledge
				that, when I act as Agent, I shall:</span>
				</p>
				
				<p style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
			
				<p style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%"><span color="#000000">Act
				in accordance with the principal's reasonable expectations to the
				extent actually known to me and, otherwise, in the Principal's best
				interest;</span></p>
				<p style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				<p style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%"><span color="#000000">Act
				in good faith;</span></p>
				<p style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				<p style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%"><span color="#000000">Act
				only within the scope of authority granted in the personal power of
				attorney; and</span></p>
				<p style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				<p style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%"><span color="#000000">To
				the extent reasonably practicable under the circumstances, keep in
				regular contact with the principal and communicate with the
				principal.</span></p>
				<p style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				<p style="margin-bottom: 0in; line-height: 100%">
					<span color="#000000">In addition, in the absence of a specific provision to the contrary in
				the </span>

				@if($attorneyPowers['isDurable'] == 1)
					<span color="#000000">durable </span>
				@endif

				<span color="#000000">»personal
				power of attorney, when I act as Agent, I shall:</span></p>
				<p style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				<p style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%"><span color="#000000">Keep
				the assets of the Principal separate from my assets;</span></p>
				<p style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				<p style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%"><span color="#000000">Exercise
				reasonable caution and prudence; and</span></p>
				<p style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				<p style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%"><span color="#000000">Keep
				a full and accurate record of all actions, receipts and disbursements
				on behalf of the Principal.</span></p>
				<p style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				<p style="margin-bottom: 0in; line-height: 100%"><span color="#000000"><b>I
				hereby acknowledge and certify the foregoing by my signature below.</b></span></p>
				<p style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				<p style="margin-bottom: 0in; line-height: 100%"><span color="#000000"><u>			</u></span><span color="#000000">    	_________</span></p>
				<p style="margin-bottom: 0in; line-height: 100%"><span color="#000000"><b>Agent					Date</b></span></p>
				
			@endif
			

			@if(strtolower($state['name']) == 'michigan')
			
				<p class="western" align="center" style="margin-bottom: 0in; line-height: 100%">
				<span color="#000000"><b>AGENT ACKNOWLEDGEMENT</b></span></p>
				<p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>

				<p class="western" align="justify" style="margin-bottom: 0.08in; line-height: 100%; orphans: 0; widows: 0">
				<span color="#000000">I, ____________________, have been appointed as
				attorney-in-fact for </span>

				<span color="#0000ff">
					<u>
						<b>{{strtoupper($tellUsAboutYou['fullname'])}}</b>
					</u>
				</span>

				<span color="#000000">
				the principal, under a </span>

				@if($attorneyPowers['isDurable'] == 1)
					<span color="#000000">durable </span>
				@endif

				<span color="#000000">»power of attorney dated __________. 
				By signing this document, I acknowledge that if and when I act as
				attorney-in-fact, all of the following apply:</span></p>
				
				<p align="justify" style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%; background: #ffffff">
				<span color="#000000">(a) Except as provided in the </span>

				@if($attorneyPowers['isDurable'] == 1)
					<span color="#000000">durable </span>
				@endif

				<span color="#000000">»power of attorney, I must act in
				accordance with the standards of care applicable to fiduciaries
				acting under </span>

				@if($attorneyPowers['isDurable'] == 1)
					<span color="#000000">durable </span>
				@endif

				<span color="#000000">powers of attorney.</span></p>
				
				<p align="justify" style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%; background: #ffffff">
				<span color="#000000">(b) I must take reasonable steps to follow the
				instructions of the principal.</span></p>
				
				<p align="justify" style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%; background: #ffffff">
				<span color="#000000">(c) Upon request of the principal, I must keep
				the principal informed of my actions. I must provide an accounting to
				the principal upon request of the principal, to a guardian or
				conservator appointed on behalf of the principal upon the request of
				that guardian or conservator, or pursuant to judicial order.</span></p>
				<p align="justify" style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%; background: #ffffff">
				<span color="#000000">(d) I cannot make a gift from the principal's
				property, unless provided for in the </span>

				@if($attorneyPowers['isDurable'] == 1)
					<span color="#000000">durable </span>
				@endif

				<span color="#000000">»power of attorney or by judicial
				order.</span></p>
				<p align="justify" style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%; background: #ffffff">
				<span color="#000000">(e) Unless provided in the </span>

				@if($attorneyPowers['isDurable'] == 1)
					<span color="#000000">durable </span>
				@endif

				<span color="#000000">power of attorney or by judicial
				order, I, while acting as attorney-in-fact, shall not create an
				account or other asset in joint tenancy between the principal and me.</span></p>
				<p align="justify" style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%; background: #ffffff">
				<span color="#000000">(f) I must maintain records of my transactions
				as attorney-in-fact, including receipts, disbursements, and
				investments.</span></p>
				<p align="justify" style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%; background: #ffffff">
				<span color="#000000">(g) I may be liable for any damage or loss to
				the principal, and may be subject to any other available remedy, for
				breach of fiduciary duty owed to the principal. In the </span>

				@if($attorneyPowers['isDurable'] == 1)
					<span color="#000000">durable </span>
				@endif

				<span color="#000000">»power of attorney, the principal may
				exonerate me of any liability to the principal for breach of
				fiduciary duty except for actions committed by me in bad faith or
				with reckless indifference. An exoneration clause is not enforceable
				if inserted as the result of my abuse of a fiduciary or confidential
				relationship to the principal.</span></p>
				<p align="justify" style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%; background: #ffffff">
				<span color="#000000">(h) I may be subject to civil or criminal
				penalties if I violate my duties to the principal.</span></p>
				
				<p align="justify" style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%; background: #ffffff">
				<br/>
				<br/>

				</p>


				<p style="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%; background: #ffffff">
				<span color="#000000">Signature: _______________________ Date:
				______________________</span></p>
			
			@endif
				
				<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%; page-break-before: always">
				
				
			@if(strtolower($state['name']) == 'new hampshire')

				<p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				<p align="center" style="margin-bottom: 0in; line-height: 100%"><span color="#000000"><b>AGENT'S
				ACKNOWLEDGEMENT </b></span>
				</p>
				<p align="center" style="margin-bottom: 0in; line-height: 100%"><span color="#000000"><b>(Pursuant
				to N.H. Rev. </b></span><b>Stat. Ann. </b><b>§ </b><b>564-E:113)</b></p>
				<p align="center" style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				<p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
				I,________________________, have read the attached power of attorney
				and am the person identified as the agent for the principal. I hereby
				acknowledge that when I act as agent, I am given power under the
				power of attorney to make decisions about money, property, or both
				belonging to the principal, and to spend the principal’s money,
				property, or both on the principal’s behalf, in accordance with the
				terms of the power of attorney. When acting as agent, I have duties
				(called “fiduciary duties”) to act in the principal’s best
				interest, to act in good faith, and to act only within the scope of
				authority granted in the power of attorney, as well as other duties
				imposed by law to the extent not provided otherwise in the power of
				attorney. As an agent, I am not entitled to use the money or property
				for my own benefit or to make gifts to myself or others unless the
				power of attorney specifically gives me the authority to do so.  As
				an agent, my authority under the power of attorney will end when the
				principal dies and I will not have authority to manage or dispose of
				any property or administer the estate of the principal.  If I violate
				a fiduciary duty under the power of attorney, I may be liable for
				damages and may be subject to criminal prosecution.  If there is
				anything about the power of attorney, or my duties under it, that I
				do not understand, I understand that I should seek professional
				advice.</p>
				<p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				<p style="margin-bottom: 0in; line-height: 100%"><span color="#000000"><b>I
				hereby acknowledge and certify the foregoing by my signature below.</b></span></p>
				<p style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				<p style="margin-bottom: 0in; line-height: 100%"><span color="#000000"><u>			</u></span><span color="#000000">    	_________</span></p>
				<p style="margin-bottom: 0in; line-height: 100%"><span color="#000000"><b>Agent					Date</b></span></p>
				<p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				<p class="western" align="justify" style="margin-bottom: 0in; line-height: 100%">
				</p>
				
			@endif	
				
				<p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				<p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				<p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				


			@if(strtolower($state['name']) == 'pennsylvania')
				
				<p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>

				<p class="western" style="margin-bottom: 0in; line-height: 100%">I,
				<u>						</u>, have read the attached power of attorney and am the
				person identified as the agent for the principal.  I hereby
				acknowledge that when I act as agent:</p>
				<p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				<p class="western" style="margin-bottom: 0in; line-height: 100%">I
				shall act in accordance with the principal’s reasonable
				expectations to the extent actually known by me and, otherwise, in
				the principal’s best interest, act in good faith and act only
				within the scope of authority granted to me by the principal in the
				power of attorney.</p>
				<p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				<p style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				<p style="margin-bottom: 0in; line-height: 100%"><span color="#000000"><u>			</u></span><span color="#000000">    	_________</span></p>
				<p style="margin-bottom: 0in; line-height: 100%"><span color="#000000"><b>Agent					Date</b></span></p>
				<p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>

			@endif
				
				<p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>

			@if(strtolower($state['name']) == 'wisconsin')

				<p class="western" align="center" style="margin-bottom: 0in; line-height: 100%">
				<span size="5" style="font-size: 20pt"><u><b>APPENDIX A</b></u></span></p>
				<p class="western" align="center" style="margin-bottom: 0in; line-height: 100%">
				<span size="4" style="font-size: 14pt"><b>Wis. Stat. Ann. §§ 244.44
				- 244.56 (Definitions)</b></span></p>
				<p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>244.44</b></span><span color="#000000"> </span><span color="#000000"><b>&nbsp;Real
				property.</b></span><span color="#000000">&nbsp;Unless the power of
				attorney otherwise provides, language in a power of attorney granting
				general authority with respect to real property authorizes the agent
				to do all of the following:</span></p>
				
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(1)</b></span><span color="#000000"> Demand,
				buy, lease, receive, accept as a gift or as security for an extension
				of credit, or otherwise acquire or reject an interest in real
				property or a right incident to real property.</span></p>
				
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(2)</b></span><span color="#000000"> Sell;
				exchange; convey with or without covenants, representations, or
				warranties; quit claim; release; surrender; retain title for
				security; encumber; partition; consent to partitioning; subject to an
				easement or covenant; subdivide; apply for zoning or other
				governmental permits; plat or consent to platting; develop; grant an
				option concerning; lease; sublease; contribute to an entity in
				exchange for an interest in that entity; or otherwise grant or
				dispose of an interest in real property or a right incident to real
				property.</span></p>
				
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(3)</b></span><span color="#000000"> Pledge
				or mortgage an interest in real property or right incident to real
				property as security to borrow money or pay, renew, or extend the
				time of payment of a debt of the principal or a debt guaranteed by
				the principal.</span></p>
				
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(4)</b></span><span color="#000000"> Release,
				assign, satisfy, or enforce by any lawful means a mortgage, deed of
				trust, conditional sale contract, encumbrance, lien, or other claim
				to real property which exists or is asserted.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(5)</b></span><span color="#000000"> Manage
				or conserve an interest in real property or a right incident to real
				property owned or claimed to be owned by the principal, including by
				doing any of the following:</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(a)</b></span><span color="#000000">&nbsp;Insuring
				against liability or casualty or other loss.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(b)</b></span><span color="#000000">&nbsp;Obtaining
				or regaining possession of or protecting the interest or right by
				litigation or otherwise.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(c)</b></span><span color="#000000">&nbsp;Paying,
				assessing, compromising, or contesting taxes or assessments or
				applying for and receiving refunds in connection with taxes or
				assessments.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(d)</b></span><span color="#000000">&nbsp;Purchasing
				supplies, hiring assistance or labor, and making repairs or
				alterations to the real property.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(6)</b></span><span color="#000000"> Use,
				develop, alter, replace, remove, erect, or install structures or
				other improvements upon real property in or incident to which the
				principal has, or claims to have, an interest or right.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(7)</b></span><span color="#000000"> 
				Participate in a reorganization with respect to real property or an
				entity that owns an interest in or right incident to real property
				and receive, hold, and act with respect to stocks and bonds or other
				property received in a plan of reorganization, including by doing any
				of the following:</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(a)</b></span><span color="#000000">&nbsp;Selling
				or otherwise disposing of the stocks, bonds, or property.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(b)</b></span><span color="#000000">&nbsp;Exercising
				or selling an option, right of conversion, or similar right with
				respect to the stocks, bonds, or property.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(c)</b></span><span color="#000000">&nbsp;Exercising
				any voting rights in person or by proxy.</span></p>
				<p class="western" style="text-indent: -0.31in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(8)</b></span><span color="#000000"> Change
				the form of title of an interest in or right incident to real
				property.</span></p>
				<p class="western" style="text-indent: -0.31in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(9)</b></span><span color="#000000"> Dedicate
				to public use, with or without consideration, easements or other real
				property in which the principal has, or claims to have, an interest.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<br/>

				</p>

				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>244.445</b></span><span color="#000000"> </span><span color="#000000"><b>&nbsp;Digital
				property.</b></span><span color="#000000">&nbsp;Unless the power of
				attorney otherwise provides, language in a power of attorney granting
				general authority with respect to digital property authorizes the
				agent, subject to</span><span color="#000000">&nbsp;s.&nbsp;</span>711.06
				(1)<span color="#000000">, to do all of the following:</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(1)</b></span><span color="#000000"> Find,
				access, manage, protect, distribute, dispose of, transfer, transfer
				ownership rights in, or otherwise control digital devices, and any
				digital property stored thereon, with digital devices to include
				desktops, laptops, tablets, peripherals, storage devices, mobile
				telephones, smartphones, and any similar digital device, either
				currently in existence or that may exist as technology develops.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(2)</b></span><span color="#000000"> Access,
				manage, distribute, delete, terminate, transfer, transfer ownership
				rights in, or otherwise control [my] digital accounts, other than the
				content of electronic communications, as defined in</span><span color="#000000">&nbsp;s.&nbsp;</span>711.03
				(6)<span color="#000000">, with digital accounts to include [my] bank
				or other financial institution accounts, electronic mail accounts,
				blogs, software licenses, social network accounts, social media
				accounts, file-sharing and storage accounts, financial management
				accounts, domain registration accounts, domain name service accounts,
				Web hosting accounts, tax preparation service accounts, online store
				accounts, and affiliated programs currently in existence or that may
				exist as technology develops.</span></p>
				<p class="western" style="text-indent: -0.15in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>NOTE:&nbsp;</b></span><span color="#000000"><b>The
				word in brackets is unnecessary. Corrective legislation is pending.</b></span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(3)</b></span><span color="#000000"> Access,
				manage, distribute, delete, transfer, transfer ownership rights in,
				or otherwise control any digital property the principal may own or
				otherwise possess rights to, other than the content of electronic
				communications, as defined in</span><span color="#000000">&nbsp;s.&nbsp;</span>711.03
				(6)<span color="#000000">, regardless of the ownership of the digital
				device on which the digital property is stored or the ownership of
				the digital account within which the digital property is stored.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<br/>

				</p>

				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>244.45</b></span><span color="#000000"> </span><span color="#000000"><b>&nbsp;Tangible
				personal property.</b></span><span color="#000000">&nbsp;Unless the
				power of attorney otherwise provides, language in a power of attorney
				granting general authority with respect to tangible personal property
				authorizes the agent to do all of the following:</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(1)</b></span><span color="#000000"> Demand,
				buy, receive, accept as a gift or as security for an extension of
				credit, or otherwise acquire or reject ownership or possession of
				tangible personal property or an interest in tangible personal
				property.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(2)</b></span><span color="#000000"> Sell;
				exchange; convey with or without covenants, representations, or
				warranties; quit claim; release; surrender; create a security
				interest in; grant options concerning; lease; sublease; or otherwise
				dispose of tangible personal property or an interest in tangible
				personal property.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(3)</b></span><span color="#000000"> Grant
				a security interest in tangible personal property or an interest in
				tangible personal property as security to borrow money or pay, renew,
				or extend the time of payment of a debt of the principal or a debt
				guaranteed by the principal.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(4)</b></span><span color="#000000"> Release,
				assign, satisfy, or enforce by litigation or otherwise, a security
				interest, lien, or other claim on behalf of the principal, with
				respect to tangible personal property or an interest in tangible
				personal property.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(5)</b></span><span color="#000000"> Manage
				or conserve tangible personal property or an interest in tangible
				personal property on behalf of the principal, including by doing any
				of the following:</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(a)</b></span><span color="#000000">&nbsp;Insuring
				against liability or casualty or other loss.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(b)</b></span><span color="#000000">&nbsp;Obtaining
				or regaining possession of or protecting the property or interest, by
				litigation or otherwise.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(c)</b></span><span color="#000000">&nbsp;Paying,
				assessing, compromising, or contesting taxes or assessments or
				applying for and receiving refunds in connection with taxes or
				assessments.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(d)</b></span><span color="#000000">&nbsp;Moving
				the property from place to place.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(e)</b></span><span color="#000000">&nbsp;Storing
				the property for hire or under a gratuitous bailment.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(f)</b></span><span color="#000000">&nbsp;Using
				and making repairs, alterations, or improvements to the property.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(6)</b></span><span color="#000000"> Change
				the form of title of an interest in tangible personal property.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<br/>

				</p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>244.46</b></span><span color="#000000"> </span><span color="#000000"><b>&nbsp;Stocks
				and bonds.</b></span><span color="#000000">&nbsp;Unless the power of
				attorney otherwise provides, language in a power of attorney granting
				general authority with respect to stocks and bonds authorizes the
				agent to do all of the following:</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(1)</b></span><span color="#000000"> Buy,
				sell, and exchange stocks and bonds.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(2)</b></span><span color="#000000"> Establish,
				continue, modify, or terminate an account with respect to stocks and
				bonds.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(3)</b></span><span color="#000000"> Pledge
				stocks and bonds as security to borrow, pay, renew, or extend the
				time of payment of a debt of the principal.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(4)</b></span><span color="#000000"> Receive
				certificates and other evidences of ownership with respect to stocks
				and bonds.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(5)</b></span><span color="#000000"> Exercise
				voting rights with respect to stocks and bonds in person or by proxy,
				enter into voting trusts, and consent to limitations on the right to
				vote.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(6)</b></span><span color="#000000"> Exercise
				in person or by proxy, or enforce by litigation or otherwise, a
				right, power, privilege, or option the principal has or claims to
				have as the holder of stocks and bonds.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(7)</b></span><span color="#000000"> Initiate,
				participate in, submit to alternative dispute resolution, settle,
				oppose, or propose or accept a compromise with respect to litigation
				to which the principal is a party concerning stocks and bonds.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<br/>

				</p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>244.47</b></span><span color="#000000"> </span><span color="#000000"><b>&nbsp;Commodities
				and options.</b></span><span color="#000000">&nbsp;Unless the power
				of attorney otherwise provides, language in a power of attorney
				granting general authority with respect to commodities and options
				authorizes the agent to do all of the following:</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(1)</b></span><span color="#000000"> Buy,
				sell, exchange, assign, settle, and exercise commodity futures
				contracts and call or put options on stocks or stock indexes traded
				on a regulated option exchange.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(2)</b></span><span color="#000000"> Establish,
				continue, modify, and terminate option accounts.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<br/>

				</p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>244.48</b></span><span color="#000000"> </span><span color="#000000"><b>&nbsp;Banks
				and other financial institutions.</b></span><span color="#000000">&nbsp;Unless
				the power of attorney otherwise provides, language in a power of
				attorney granting general authority with respect to banks and other
				financial institutions authorizes the agent to do all of the
				following:</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(1)</b></span><span color="#000000"> Continue,
				modify, and terminate an account or other banking arrangement made by
				or on behalf of the principal.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(2)</b></span><span color="#000000"> Establish,
				modify, and terminate an account or other banking arrangement with a
				bank, trust company, savings and loan association, credit union,
				thrift company, brokerage firm, or other financial institution
				selected by the agent.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(3)</b></span><span color="#000000"> Contract
				for services available from a financial institution, including
				renting a safe deposit box or space in a vault.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(4)</b></span><span color="#000000"> Withdraw,
				by check, order, electronic funds transfer, or otherwise, money or
				property of the principal deposited with or left in the custody of a
				financial institution.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(5)</b></span><span color="#000000"> Receive
				statements of account, vouchers, notices, and similar documents from
				a financial institution and act with respect to them.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(6)</b></span><span color="#000000"> Enter
				a safe deposit box or vault and withdraw or add to the contents.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(7)</b></span><span color="#000000"> Borrow
				money and pledge as security personal property of the principal
				necessary to borrow money or pay, renew, or extend the time of
				payment of a debt of the principal or a debt guaranteed by the
				principal.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(8)</b></span><span color="#000000"> Make,
				assign, draw, endorse, discount, guarantee, and negotiate promissory
				notes, checks, drafts, and other negotiable or nonnegotiable paper of
				the principal or payable to the principal or the principal's order;
				transfer money, receive the cash or other proceeds of those
				transactions; and accept a draft drawn by a person upon the principal
				and pay it when due.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(9)</b></span><span color="#000000"> Receive
				for the principal and act upon a sight draft, warehouse receipt, or
				other document of title whether tangible or electronic, or other
				negotiable or nonnegotiable instrument.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(10)</b></span><span color="#000000"> Apply
				for, receive, and use letters of credit, credit and debit cards,
				electronic transaction authorizations, and traveler's checks from a
				financial institution and give an indemnity or other agreement in
				connection with letters of credit.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(11)</b></span><span color="#000000"> Consent
				to an extension of the time of payment with respect to commercial
				paper or a financial transaction with a financial institution.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<br/>

				</p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>244.49</b></span><span color="#000000"> </span><span color="#000000"><b>&nbsp;Operation
				of entity or business.</b></span><span color="#000000">&nbsp;Subject
				to the terms of a document or an agreement governing an entity or
				business or an entity or business ownership interest, and unless the
				power of attorney otherwise provides, language in a power of attorney
				granting general authority with respect to operation of an entity or
				business authorizes the agent to do all of the following:</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(1)</b></span><span color="#000000"> Operate,
				buy, sell, enlarge, reduce, or terminate an ownership interest.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(2)</b></span><span color="#000000"> Perform
				a duty or discharge a liability and exercise in person or by proxy a
				right, power, privilege, or option that the principal has, may have,
				or claims to have.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(3)</b></span><span color="#000000"> Enforce
				the terms of an ownership agreement.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(4)</b></span><span color="#000000"> Initiate,
				participate in, submit to alternative dispute resolution, settle,
				oppose, or propose or accept a compromise with respect to litigation
				to which the principal is a party because of an ownership interest.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(5)</b></span><span color="#000000"> Exercise
				in person or by proxy, or enforce by litigation or otherwise, a
				right, power, privilege, or option the principal has or claims to
				have as the holder of stocks and bonds.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(6)</b></span><span color="#000000"> Initiate,
				participate in, submit to alternative dispute resolution, settle,
				oppose, or propose or accept a compromise with respect to litigation
				to which the principal is a party concerning stocks and bonds.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(7)</b></span><span color="#000000"> With
				respect to an entity or business owned solely by the principal, do
				all of the following:</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(a)</b></span><span color="#000000">&nbsp;Continue,
				modify, renegotiate, extend, and terminate a contract made by or on
				behalf of the principal with respect to the entity or business before
				execution of the power of attorney.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(b)</b></span><span color="#000000">&nbsp;Determine
				all of the following:</span></p>
				<p class="western" style="margin-left: 0.67in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>1.</b></span><span color="#000000">&nbsp;The
				location of its operation.</span></p>
				<p class="western" style="margin-left: 0.67in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>2.</b></span><span color="#000000">&nbsp;The
				nature and extent of its business.</span></p>
				<p class="western" style="margin-left: 0.67in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>3.</b></span><span color="#000000">&nbsp;The
				methods of manufacturing, selling, merchandising, financing,
				accounting, and advertising employed in its operation.</span></p>
				<p class="western" style="margin-left: 0.67in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>4.</b></span><span color="#000000">&nbsp;The
				amount and types of insurance carried.</span></p>
				<p class="western" style="margin-left: 0.67in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>5.</b></span><span color="#000000">&nbsp;The
				mode of engaging, compensating, and dealing with its employees and
				accountants, attorneys, or other advisors.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(c)</b></span><span color="#000000">&nbsp;Change
				the name or form of organization under which the entity or business
				is operated and enter into an ownership agreement with other persons
				to take over all or part of the operation of the entity or business.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(d)</b></span><span color="#000000">&nbsp;Demand
				and receive money due or claimed by the principal or on the
				principal's behalf in the operation of the entity or business and
				control and disburse the money in the operation of the entity or
				business.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(8)</b></span><span color="#000000"> Put
				additional capital into an entity or business in which the principal
				has an interest.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(9)</b></span><span color="#000000"> Join
				in a plan of reorganization, consolidation, conversion, interest
				exchange, domestication, or merger of the entity or business.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(10)</b></span><span color="#000000"> Sell
				or liquidate all or part of an entity or business.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(11)</b></span><span color="#000000"> Establish
				the value of an entity or business under a buy-out agreement to which
				the principal is a party.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(12)</b></span><span color="#000000"> Prepare,
				sign, file, and deliver reports, compilations of information,
				returns, or other papers with respect to an entity or business and
				make related payments.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(13)</b></span><span color="#000000"> Pay,
				compromise, or contest taxes, assessments, fines, or penalties and
				perform any other act to protect the principal from illegal or
				unnecessary taxation, assessments, fines, or penalties, with respect
				to an entity or business, including attempts to recover, in any
				manner permitted by law, money paid before or after the execution of
				the power of attorney.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<br/>

				</p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>244.50</b></span><span color="#000000"> </span><span color="#000000"><b>&nbsp;Insurance
				and annuities.</b></span><span color="#000000">&nbsp;Unless the power
				of attorney otherwise provides, language in a power of attorney
				granting general authority with respect to insurance and annuities
				authorizes the agent to do all of the following:</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(1)</b></span><span color="#000000"> Continue,
				pay the premium or make a contribution on, modify, exchange, rescind,
				release, or terminate a contract procured by or on behalf of the
				principal which insures or provides an annuity to either the
				principal or another person, whether or not the principal is a
				beneficiary under the contract.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(2)</b></span><span color="#000000"> Procure
				new, different, and additional contracts of insurance and annuities
				for the principal and the principal's spouse or domestic partner,
				children, and other dependents, and select the amount, type of
				insurance or annuity, and mode of payment.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(3)</b></span><span color="#000000"> Pay
				the premium or make a contribution on, modify, exchange, rescind,
				release, or terminate a contract of insurance or annuity procured by
				the agent.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(4)</b></span><span color="#000000"> Apply
				for and receive a loan secured by a contract of insurance or annuity.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(5)</b></span><span color="#000000"> Surrender
				and receive the cash surrender value on a contract of insurance or
				annuity.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(6)</b></span><span color="#000000"> Exercise
				an election.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(7)</b></span><span color="#000000"> Exercise
				investment powers available under a contract of insurance or annuity.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(8)</b></span><span color="#000000"> Change
				the manner of paying premiums on a contract of insurance or annuity.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(9)</b></span><span color="#000000"> Change
				or convert the type of insurance or annuity with respect to which the
				principal has or claims to have authority described in this section.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(10)</b></span><span color="#000000"> Apply
				for and procure a benefit or assistance under a statute, rule, or
				regulation to guarantee or pay premiums of a contract of insurance on
				the life of the principal.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(11)</b></span><span color="#000000"> Collect,
				sell, assign, hypothecate, borrow against, or pledge the interest of
				the principal in a contract of insurance or annuity.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(12)</b></span><span color="#000000"> Select
				the form and timing of the payment of proceeds from a contract of
				insurance or annuity.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(13)</b></span><span color="#000000"> Pay,
				from proceeds or otherwise, compromise or contest, and apply for
				refunds in connection with, a tax or assessment levied by a taxing
				authority with respect to a contract of insurance or annuity or its
				proceeds or liability accruing by reason of the tax or assessment.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<br/>

				</p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>244.51</b></span><span color="#000000"> </span><span color="#000000"><b>&nbsp;Estates,
				trusts, and other beneficial interests.</b></span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(1)</b></span><span color="#000000"> In
				this section, “estates, trusts, and other beneficial interests&quot;
				means a trust, probate estate, guardianship, conservatorship, escrow,
				or custodianship or a fund from which the principal is, may become,
				or claims to be, entitled to a share or payment.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(2)</b></span><span color="#000000"> Unless
				the power of attorney otherwise provides, language in a power of
				attorney granting general authority with respect to estates, trusts,
				and other beneficial interests authorizes the agent to do all of the
				following:</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(a)</b></span><span color="#000000">&nbsp;Accept,
				receive, receipt for, sell, assign, pledge, or exchange a share in or
				payment from an estate, trust, or beneficial interest.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(b)</b></span><span color="#000000">&nbsp;Demand
				or obtain money or another thing of value to which the principal is,
				may become, or claims to be, entitled by reason of an estate, trust,
				or beneficial interest, by litigation or otherwise.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(c)</b></span><span color="#000000">&nbsp;Exercise
				for the benefit of the principal a presently exercisable general
				power of appointment held by the principal.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(d)</b></span><span color="#000000">&nbsp;Initiate,
				participate in, submit to alternative dispute resolution, settle,
				oppose, or propose or accept a compromise with respect to litigation
				to ascertain the meaning, validity, or effect of a deed, will,
				declaration of trust, or other instrument or transaction affecting
				the interest of the principal.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(e)</b></span><span color="#000000">&nbsp;Initiate,
				participate in, submit to alternative dispute resolution, settle,
				oppose, or propose or accept a compromise with respect to litigation
				to remove, substitute, or surcharge a fiduciary.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(f)</b></span><span color="#000000">&nbsp;Conserve,
				invest, disburse, or use anything received for an authorized purpose.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(g)</b></span><span color="#000000">&nbsp;Transfer
				an interest of the principal in real property, stocks and bonds,
				accounts with financial institutions or securities intermediaries,
				insurance, annuities, and other property to the trustee of a
				revocable trust created by the principal as settlor.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(h)</b></span><span color="#000000">&nbsp;Sign
				a waiver or consent in a probate matter.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(i)</b></span><span color="#000000">&nbsp;Reject,
				renounce, disclaim, release, or consent to a reduction in or
				modification of a share in or payment from an estate, trust, or
				beneficial interest.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<br/>

				</p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>244.52</b></span><span color="#000000"> </span><span color="#000000"><b>&nbsp;Claims
				and litigation.</b></span><span color="#000000">&nbsp;Unless the
				power of attorney otherwise provides, language in a power of attorney
				granting general authority with respect to claims and litigation
				authorizes the agent to do all of the following:</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(1)</b></span><span color="#000000"> Assert
				and maintain before a court or administrative agency a claim, claim
				for relief, cause of action, counterclaim, offset, recoupment, or
				defense, including an action to recover property or other thing of
				value, recover damages sustained by the principal, eliminate or
				modify tax liability, or seek an injunction, specific performance, or
				other relief.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(2)</b></span><span color="#000000"> Bring
				an action to determine adverse claims or intervene or otherwise
				participate in litigation.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(3)</b></span><span color="#000000"> Seek
				an attachment, garnishment, order of arrest, or other preliminary,
				provisional, or intermediate relief and use any available procedure
				to effect or satisfy a judgment, order, or decree.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(4)</b></span><span color="#000000"> Make
				or accept a tender, offer of judgment, or admission of facts, submit
				a controversy on an agreed statement of facts, consent to
				examination, and bind the principal in litigation.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(5)</b></span><span color="#000000"> Submit
				to alternative dispute resolution, settle, and propose or accept a
				compromise.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(6)</b></span><span color="#000000"> Waive
				the issuance and service of process upon the principal, accept
				service of process, appear for the principal, designate persons upon
				which process directed to the principal may be served, execute and
				file or deliver stipulations on the principal's behalf, verify
				pleadings, seek appellate review, procure and give surety and
				indemnity bonds, contract and pay for the preparation and printing of
				records and briefs, receive, execute, and file or deliver a consent,
				waiver, release, confession of judgment, satisfaction of judgment,
				notice, agreement, or other instrument in connection with the
				prosecution, settlement, or defense of a claim or litigation.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(7)</b></span><span color="#000000"> Act
				for the principal with respect to bankruptcy or insolvency, whether
				voluntary or involuntary, concerning the principal or some other
				person, or with respect to a reorganization, receivership, or
				application for the appointment of a receiver or trustee which
				affects an interest of the principal in property or other thing of
				value.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(8)</b></span><span color="#000000"> Pay a
				judgment, award, or order against the principal or a settlement made
				in connection with a claim or litigation.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(9)</b></span><span color="#000000"> Receive
				money or other thing of value paid in settlement of or as proceeds of
				a claim or litigation.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<br/>

				</p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>244.53</b></span><span color="#000000"> </span><span color="#000000"><b>&nbsp;Personal
				and family maintenance.</b></span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(1)</b></span><span color="#000000"> Unless
				the power of attorney otherwise provides, language in a power of
				attorney granting general authority with respect to personal and
				family maintenance authorizes the agent to do all of the following:</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(a)</b></span><span color="#000000">&nbsp;Perform
				the acts necessary to maintain the customary standard of living of
				the principal, the principal's spouse or the principal's domestic
				partner, and the following individuals, whether living when the power
				of attorney is executed or later born:</span></p>
				<p class="western" style="margin-left: 0.67in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>1.</b></span><span color="#000000">&nbsp;The
				principal's children.</span></p>
				<p class="western" style="margin-left: 0.67in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>2.</b></span><span color="#000000">&nbsp;Other
				individuals legally entitled to be supported by the principal.</span></p>
				<p class="western" style="margin-left: 0.67in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>3.</b></span><span color="#000000">&nbsp;The
				individuals whom the principal has customarily supported or indicated
				the intent to support.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(b)</b></span><span color="#000000">&nbsp;Make
				periodic payments of child support and other family maintenance
				required by a court or governmental agency or an agreement to which
				the principal is a party.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(c)</b></span><span color="#000000">&nbsp;Provide
				living quarters for the individuals described in&nbsp;</span><span color="#000000">par.&nbsp;(a)</span><span color="#000000">&nbsp;by
				doing any of the following:</span></p>
				<p class="western" style="margin-left: 0.67in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>1.</b></span><span color="#000000">&nbsp;Purchasing,
				leasing, or entering into a contract.</span></p>
				<p class="western" style="margin-left: 0.67in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>2.</b></span><span color="#000000">&nbsp;Paying
				the operating costs, including interest, amortization payments,
				repairs, improvements, and taxes, for premises owned by the principal
				or occupied by those individuals.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(d)</b></span><span color="#000000">&nbsp;Provide
				normal domestic help, usual vacations and travel expenses, and funds
				for shelter, clothing, food, appropriate education, including
				postsecondary and vocational education, and other current living
				costs for the individuals described in&nbsp;</span><span color="#000000">par.&nbsp;(a)</span><span color="#000000">.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(e)</b></span><span color="#000000">&nbsp;Pay
				expenses for necessary health care and custodial care on behalf of
				the individuals described in&nbsp;</span><span color="#000000">par.&nbsp;(a)</span><span color="#000000">.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(f)</b></span><span color="#000000">&nbsp;Act
				as the principal's personal representative under&nbsp;42 USC 1320d,
				the Health Insurance Portability and Accountability Act, and
				applicable regulations, in making decisions related to the past,
				present, or future payment for the provision of health care consented
				to by the principal or anyone authorized under the law of this state
				to consent to health care on behalf of the principal.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(g)</b></span><span color="#000000">&nbsp;Continue
				any provision made by the principal for motor vehicles or other means
				of transportation, including registering, licensing, insuring, and
				replacing the vehicles, for the individuals described in&nbsp;</span><span color="#000000">par.&nbsp;</span><a href="https://docs.legis.wisconsin.gov/document/statutes/244.53(1)(a)"><span color="#426986">(a)</span></a><span color="#000000">.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(h)</b></span><span color="#000000">&nbsp;Maintain
				credit and debit accounts for the convenience of the individuals
				described in&nbsp;</span><span color="#000000">par.&nbsp;</span><a href="https://docs.legis.wisconsin.gov/document/statutes/244.53(1)(a)"><span color="#426986">(a)</span></a><span color="#000000">&nbsp;and
				open new accounts.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(i)</b></span><span color="#000000">&nbsp;Continue
				payments incidental to the membership or affiliation of the principal
				in a religious institution, club, society, order, or other
				organization or to continue contributions to those organizations.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.65in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(2)</b></span><span color="#000000"> Authority
				with respect to personal and family maintenance is neither dependent
				upon, nor limited by, authority that an agent may or may not have
				with respect to gifts under this chapter.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<br/>

				</p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<br/>

				</p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<br/>

				</p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<br/>

				</p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>244.54</b></span><span color="#000000"> </span><span color="#000000"><b>&nbsp;Benefits
				from governmental programs or civil or military service.</b></span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(1)</b></span><span color="#000000"> In
				this section, “benefits from governmental programs or civil or
				military service&quot; means any benefit, program or assistance
				provided under a statute, rule, or regulation, including social
				security, medicare, and medicaid.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(2)</b></span><span color="#000000"> Unless
				the power of attorney otherwise provides, language in a power of
				attorney granting general authority with respect to benefits from
				governmental programs or civil or military service authorizes the
				agent to do all of the following:</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(a)</b></span><span color="#000000">&nbsp;Execute
				vouchers in the name of the principal for allowances and
				reimbursements payable by the United States or a foreign government
				or by a state or subdivision of a state to the principal, including
				allowances and reimbursements for transportation of the individuals
				described in</span><span color="#000000">&nbsp;s.&nbsp;244.53 (1)
				(a)</span><span color="#000000">, and for shipment of their household
				effects.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(b)</b></span><span color="#000000">&nbsp;Take
				possession and order the removal and shipment of property of the
				principal from a post, warehouse, depot, dock, or other place of
				storage or safekeeping, either governmental or private, and execute
				and deliver a release, voucher, receipt, bill of lading, shipping
				ticket, certificate, or other instrument for that purpose.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(c)</b></span><span color="#000000">&nbsp;Enroll
				in, apply for, select, reject, change, amend, or discontinue, on the
				principal's behalf, a benefit or program.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(d)</b></span><span color="#000000">&nbsp;Prepare,
				file, and maintain a claim of the principal for a benefit or
				assistance, financial or otherwise, to which the principal may be
				entitled under a statute, rule, or regulation.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(e)</b></span><span color="#000000">&nbsp;Initiate,
				participate in, submit to alternative dispute resolution, settle,
				oppose, or propose or accept a compromise with respect to litigation
				concerning any benefit or assistance the principal may be entitled to
				receive under a statute, rule, or regulation.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(f)</b></span><span color="#000000">&nbsp;Receive
				the financial proceeds of a claim described in&nbsp;</span><span color="#000000">par.&nbsp;(d)</span><span color="#000000">&nbsp;and
				conserve, invest, disburse, or use for a lawful purpose anything so
				received.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<br/>

				</p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>244.55</b></span><span color="#000000"> </span><span color="#000000"><b>&nbsp;Retirement
				plans.</b></span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(1)</b></span><span color="#000000"> In
				this section, “retirement plan&quot; means a plan or account
				created by an employer, the principal, or another individual to
				provide retirement benefits or deferred compensation of which the
				principal is a participant, beneficiary, or owner, including the
				following plans or accounts:</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(a)</b></span><span color="#000000">&nbsp;An
				individual retirement account under section&nbsp;408&nbsp;of the
				Internal Revenue Code.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(b)</b></span><span color="#000000">&nbsp;A
				Roth individual retirement account under section&nbsp;408A&nbsp;of
				the Internal Revenue Code.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(c)</b></span><span color="#000000">&nbsp;A
				deemed individual retirement account under section&nbsp;408&nbsp;(q)
				of the Internal Revenue Code.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(d)</b></span><span color="#000000">&nbsp;An
				annuity or mutual fund custodial account under section&nbsp;403&nbsp;(b)
				of the Internal Revenue Code.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(e)</b></span><span color="#000000">&nbsp;A
				pension, profit-sharing, stock bonus, or other retirement plan
				qualified under section&nbsp;401&nbsp;(a) of the Internal Revenue
				Code.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(f)</b></span><span color="#000000">&nbsp;A
				plan under section&nbsp;457&nbsp;(b) of the Internal Revenue Code.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(g)</b></span><span color="#000000">&nbsp;A
				nonqualified deferred compensation plan under section&nbsp;409A&nbsp;of
				the Internal Revenue Code.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(2)</b></span><span color="#000000"> Unless
				the power of attorney otherwise provides, language in a power of
				attorney granting general authority with respect to retirement plans
				authorizes the agent to do all of the following:</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(a)</b></span><span color="#000000">&nbsp;Select
				the form and timing of payments under a retirement plan and withdraw
				benefits from a plan.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(b)</b></span><span color="#000000">&nbsp;Make
				a rollover, including a direct trustee-to-trustee rollover, of
				benefits from one retirement plan to another.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(c)</b></span><span color="#000000">&nbsp;Establish
				a retirement plan in the principal's name.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(d)</b></span><span color="#000000">&nbsp;Make
				contributions to a retirement plan.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(e)</b></span><span color="#000000">&nbsp;Exercise
				investment powers available under a retirement plan.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(f)</b></span><span color="#000000">&nbsp;Borrow
				from, sell assets to, or purchase assets from a retirement plan.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<br/>

				</p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>244.56</b></span><span color="#000000"> </span><span color="#000000"><b>&nbsp;Taxes.</b></span><span color="#000000">&nbsp;Unless
				the power of attorney otherwise provides, language in a power of
				attorney granting general authority with respect to taxes authorizes
				the agent to do all of the following:</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(1)</b></span><span color="#000000"> Prepare,
				sign, and file federal, state, local, and foreign income, gift,
				payroll, property, Federal Insurance Contributions Act, and other tax
				returns, claims for refunds, requests for extension of time,
				petitions regarding tax matters, and any other tax-related documents,
				including receipts, offers, waivers, consents, including consents and
				agreements under section&nbsp;</span><a href="https://docs.legis.wisconsin.gov/document/usc/26%20USC%202032A"><span color="#426986">2032A</span></a><span color="#000000">&nbsp;of
				the Internal Revenue Code, closing agreements, and any power of
				attorney required by the Internal Revenue Service or other taxing
				authority with respect to a tax year upon which the statute of
				limitations has not run and the following 25 tax years.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(2)</b></span><span color="#000000"> Pay
				taxes due, collect refunds, post bonds, receive confidential
				information, and contest deficiencies determined by the Internal
				Revenue Service or other taxing authority.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(3)</b></span><span color="#000000"> Exercise
				any election available to the principal under federal, state, local,
				or foreign tax law.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(4)</b></span><span color="#000000"> Act
				for the principal in all tax matters for all periods before the
				Internal Revenue Service, or other taxing authority.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<br/>

				</p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>244.57</b></span><span color="#000000"> </span><span color="#000000"><b>&nbsp;Gifts.</b></span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(1)</b></span><span color="#000000"> In
				this section, a gift “for the benefit of&quot; a person includes a
				gift to a trust, an account under</span><span color="#000000">&nbsp;ss.&nbsp;</span><a href="https://docs.legis.wisconsin.gov/document/statutes/54.854"><span color="#426986">54.854</span></a><span color="#000000">&nbsp;to&nbsp;</span><a href="https://docs.legis.wisconsin.gov/document/statutes/54.898"><span color="#426986">54.898</span></a><span color="#000000">,
				and a tuition savings account or prepaid tuition plan as defined
				under section&nbsp;</span><a href="https://docs.legis.wisconsin.gov/document/usc/26%20USC%20529"><span color="#426986">529</span></a><span color="#000000">&nbsp;of
				the Internal Revenue Code.</span></p>
				<p class="western" style="text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(2)</b></span><span color="#000000"> Unless
				the power of attorney otherwise provides, language in a power of
				attorney granting general authority with respect to gifts authorizes
				the agent to do all of the following:</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(a)</b></span><span color="#000000">&nbsp;Make
				outright to, or for the benefit of, a person, a gift of any of the
				principal's property, including by the exercise of a presently
				exercisable general power of appointment held by the principal, in an
				amount per donee not to exceed the annual dollar limits of the
				federal gift tax exclusion under section&nbsp;2503&nbsp;(b) of the
				Internal Revenue Code, without regard to whether the federal gift tax
				exclusion applies to the gift, or if the principal's spouse agrees to
				consent to a split gift under section&nbsp;2513&nbsp;of the Internal
				Revenue Code, in an amount per donee not to exceed twice the annual
				federal gift tax exclusion limit.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(b)</b></span><span color="#000000">&nbsp;Consent,
				under section&nbsp;2513&nbsp;of the Internal Revenue Code, to the
				splitting of a gift made by the principal's spouse in an amount per
				donee not to exceed the aggregate annual gift tax exclusions for both
				spouses.</span></p>
				<p class="western" style="margin-left: 0.33in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>(c)</b></span><span color="#000000">&nbsp;Make
				a gift of the principal's property only as the agent determines is
				consistent with the principal's objectives if actually known by the
				agent and, if unknown, as the agent determines is consistent with the
				principal's best interest based on all relevant factors, including
				all of the following:</span></p>
				<p class="western" style="margin-left: 0.67in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>1.</b></span><span color="#000000">&nbsp;The
				value and nature of the principal's property.</span></p>
				<p class="western" style="margin-left: 0.67in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>2.</b></span><span color="#000000">&nbsp;The
				principal's foreseeable obligations and need for maintenance.</span></p>
				<p class="western" style="margin-left: 0.67in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>3.</b></span><span color="#000000">&nbsp;Minimization
				of taxes, including income, estate, inheritance, generation skipping
				transfer, and gift taxes.</span></p>
				<p class="western" style="margin-left: 0.67in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>4.</b></span><span color="#000000">&nbsp;Eligibility
				for a benefit, a program, or assistance under a statute, rule, or
				regulation.</span></p>
				
				<p class="western" style="margin-left: 0.67in; text-indent: -0.33in; margin-bottom: 0in; line-height: 100%; background: #ffffff">
				<span color="#000000"><b>5.</b></span><span color="#000000">&nbsp;The
				principal's personal history of making or joining in making gifts.</span></p>
				
				<p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
				
				<p class="western" style="margin-bottom: 0in; line-height: 100%"><br/>

				</p>
			
			@endif
		
	</div>

</body>
</html>