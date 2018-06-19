@php
	$genderTxt = $tellUsAboutYou['gender'] == "M" ? "he" : "she";
	$genderTxtCaps = $tellUsAboutYou['gender'] == "M" ? "He" : "She";

	$gender2Txt = $tellUsAboutYou['gender'] == "M" ? "his" : "her";
	$gender2TxtCaps = $tellUsAboutYou['gender'] == "M" ? "His" : "Her";

	$gender3Txt = $tellUsAboutYou['gender'] == "M" ? "him" : "her";
	$gender3TxtCaps = $tellUsAboutYou['gender'] == "M" ? "Him" : "Her";

	$partnerOrSpouse = $tellUsAboutYou['marital_status'] == "M" ? "spouse" : "partner";

	$stateTxt = $tellUsAboutYou['state'] == "California" ? "by right of representation" : "per stirpes";
@endphp


<!DOCTYPE html>
<html>
<head>
	<title>last will testament</title>
</head>
<body>
	<div>
		
		

		<div class="pdf-container">
			<label>LAST WILL AND TESTAMENT OF {{$tellUsAboutYou['fullname']}}</label>
			<div class="client-details">
				
				<p>
					@if($tellUsAboutYou != null)
						I, {{strtoupper($tellUsAboutYou['fullname'])}} residing at {{strtoupper($tellUsAboutYou['address'])}}, {{strtoupper($tellUsAboutYou['city'])}}, {{strtoupper($tellUsAboutYou['state'])}}, {{$tellUsAboutYou['zip']}}, being over the age of eighteen (18) years and of sound and disposing mind and memory, and not being under any duress, fraud, mistake, or undue influence, do make, publish, and declare this to be my Last Will and Testament, hereby revoking all prior Last Wills, Testaments, and Codicils.
					@endif
				</p>

			</div>

			<div class="article-1">
				
				<b>ARTICLE I: INTRODUCTION</b>
				<p>
				A. Domicile. I am a resident of and domiciled in the
					@if($state == "District Of Columbia")
						District of Columbia.
					@elseif($state =="Massachusetts" || $state == "Virginia" || $state == "Kentucky" || $state == "Pennsylvania")  
						CONTAINS Commonwealth of {{$state}}.
					@else
						State of {{$state}}.
					@endif
				</p>
				
				<p>				
					@if($tellUsAboutYou['marital_status'] == "M")

						B. Marital Status. I am legally married to {{strtoupper($tellUsAboutYou['partner_fullname'])}} and all references to “my spouse” or to {{strtoupper($tellUsAboutYou['partner_firstname'])}} shall be to {{$gender3Txt}}.
					
					@elseif($tellUsAboutYou['marital_status'] == "R")

						B. Marital Status. I am in a long-term relationship (as a registered Domestic Couple under the laws of the 

						@if($state == "District Of Columbia")
							District of Columbia) 
						@elseif($state =="Massachusetts" || $state == "Virginia" || $state == "Kentucky" || $state == "Pennsylvania")  
							CONTAINS Commonwealth of {{$state}}  
						@else
							State of {{$state}}) 
						@endif

						 	with {{strtoupper($tellUsAboutYou['partner_fullname'])}} and all references to “my partner” or to {{strtoupper($tellUsAboutYou['partner_firstname'])}} shall be to {{$gender3Txt}}

					@elseif($tellUsAboutYou['marital_status'] == "D")

						B. Marital Status. I am a single person, previously married but now legally divorced.

					@elseif($tellUsAboutYou['marital_status'] == "S")

						B. Marital Status. I am a single person, never married.

					@elseif($tellUsAboutYou['marital_status'] == "W")

						B. Marital Status. I am widowed, my spouse having predeceased me.

					@endif
				</p>
				
				<p>
					@if($tellUsAboutYou['children'] == 0 || $tellUsAboutYou['children'] == null)
					
						C. Children. I have no children. 
					
					@elseif($tellUsAboutYou['children'] == 1)
					
						C. Children. I have one child now living. My child’s name is 
						@foreach($children as $child)
							<p>Only Child: {{strtoupper($child['fullname'])}}, who was born on {{date('F d, Y', strtotime($child['dob']))}}</p>
						@endforeach
					
					@elseif($tellUsAboutYou['children'] > 1)
					
						C. Children. I have {{$tellUsAboutYou['children']}} children now living; their names and dates of birth are:
						
						@foreach($children as $child)
							<p>CHILD'S NAME : {{strtoupper($child['fullname'])}}, born {{date('F d, Y', strtotime($child['dob']))}}</p>
						@endforeach
					
					@endif

					@if($tellUsAboutYou['deceased_children'] == '1')
						I have the following deceased children:
						@foreach(explode($tellUsAboutYou['deceased_children_names']) as $key => $each_deceased_children)
							<p>NAME : {{strtoupper(trim($each_deceased_children))}}</p>
						@endforeach
					@endif
				</p>
				
				<p>
					D. Afterborn Children. Unless specifically stated otherwise, any provision in this Will for “my children” shall be interpreted to include any child of mine born or adopted after the date of this Will.
				</p>
				
			</div>

			<div class="article-2">
				
				<b>ARTICLE II: FIDUCIARIES</b>

				<p>
					A. {{ucwords($executor_title)}}. I nominate my
				
					@if(strtolower(trim($personalRepresentative['relationship_with'])) == 'other')
						{{ucwords($personalRepresentative['relationship_other'])}}
					@else
						{{ucwords($personalRepresentative['relationship_with'])}}
					@endif

					{{ ucwords($personalRepresentative['fullname']) }} of {{ $personalRepresentative['address'] }}, {{ ucwords($personalRepresentative['city']) }}, {{ ucwords($personalRepresentative['state']) }} {{ $personalRepresentative['zip'] }}, as {{ucwords($executor_title)}} of my Estate. 

					@if($backupPersonalRepresentative)

						If {{ ucwords($personalRepresentative['fullname']) }} fails to qualify or ceases to act, I nominate my 

						@if(strtolower(trim($backupPersonalRepresentative['relationship_with'])) == 'other')
							{{$backupPersonalRepresentative['relationship_other']}}
						@else
							{{$backupPersonalRepresentative['relationship_with']}}
						@endif

						{{ ucwords($backupPersonalRepresentative['fullname']) }} of {{ $backupPersonalRepresentative['address'] }}, {{ ucwords($backupPersonalRepresentative['city']) }}, {{ ucwords($backupPersonalRepresentative['state']) }} {{ $backupPersonalRepresentative['zip'] }}, as {{ucwords($executor_title)}} of my Estate. 

					@endif
				</p>

				<p>
					B. No Bond Required. I direct that my {{ucwords($executor_title)}} and any fiduciary nominated under this Article shall serve without bond. In the event bond is required, I hereby waive any requirement to furnish security on such bond.
				</p>
				
				<p>
					C. Final Disposition. I direct that my {{ucwords($executor_title)}} nominated above shall also control the final disposition of my remains. In doing so, I request that my representative honor any separate memorandum or other written instruction I may leave concerning my wishes for my final disposition. All decisions made by my representative with respect to the final disposition of my remains shall be binding.
				</p>


				@if($tellUsAboutYou['guardian_minor_children'] == '1')

					D. Guardian/Conservator. I nominate my 

					@if(strtolower($guardian['relationship_with']) == "other")
						{{$guardian['relationship_other']}},
					@else
						{{$guardian['relationship_with']}}, 
					@endif

					{{strtoupper($guardian['fullname'])}} of {{$guardian['address']}}, {{ucwords($guardian['city'])}}, {{ucwords($guardian['state'])}} {{$guardian['zip']}}, as Guardian of the person and Conservator of the estate of any minor child of mine.

					@if($backupGuardian)
						If said nominee fails to qualify or ceases to act, I nominate my 
						
						@if(strtolower($backupGuardian['relationship_with']) == "other")
							{{ucwords($backupGuardian['relationship_other'])}}, 
						@else
							{{ucwords($backupGuardian['relationship_with'])}}
						@endif

						{{strtoupper($backupGuardian['fullname'])}} of {{$backupGuardian['address']}}, {{ucwords($backupGuardian['city'])}}, {{ucwords($backupGuardian['state'])}} {{$backupGuardian['zip']}}, as the successor Guardian and/or Conservator for any minor child of mine.
					@endif
				@endif

				
			</div>

			<div class="article-3">
				
				
				<b>ARTICLE III: DISTRIBUTIONS</b>
				<p>
					A. Payment of Estate Expenses. My {{$executor_title}} may pay from my Estate all debts which are then due and enforceable against my Estate, the expenses of my last illness, the expenses of my final disposition without the necessity of prior court approval, the expenses of administering my Estate, and all death taxes and governmental charges imposed upon and made payable from my Estate under the laws of the United States or of any state or country by reason of my death.
				</p>

				<p>
					B. Tangible Personal Property. It is my intention that any separate memorandum or written instructions I may leave expressing my wishes for the disposition of certain articles of my tangible personal property will be followed by my {{$executor_title}}, subject to any specific gifts of certain articles of my tangible personal property made in this Last Will & Testament below, which shall be absolute and unaffected by any such memorandum or written instruction. Excepting any articles of my tangible personal property that are otherwise gifted specifically herein or included in my separate written instructions, I give my tangible personal property, or the remainder thereof, to be distributed 
				
				
					@if($provideYourLovedOnes['is_tangible_property_distribute'] == 2)
						@if($tellUsAboutYou['marital_status'] == "M")
							to my spouse
						@elseif($tellUsAboutYou['marital_status'] == "D")
							to my partner
						@endif

					
					@elseif($provideYourLovedOnes['is_tangible_property_distribute'] == 1)

						@if($tellUsAboutYou['children'] > 1)
							to my surviving children in equal shares
						@elseif($tellUsAboutYou['children'] == 1)
							to my child
						@endif

					
					@elseif($provideYourLovedOnes['is_tangible_property_distribute'] == 3)
						with the residue of my Estate


					
					@elseif($provideYourLovedOnes['is_tangible_property_distribute'] == 4)
						
						as follows: {{$provideYourLovedOnes['tangible_property_distribute']}}

					@endif

					I direct that all costs of safeguarding, insuring, storing and delivering my tangible personal property to the beneficiaries entitled thereto be paid out of my Estate as an expense of administration. If a beneficiary designated in this provision does not survive me, my tangible personal property shall be distributed with the residue of my estate.
				</p>

				<p>
					C. Confirmation of Joint Tenancy. I hereby confirm that all of my interest in any jointly titled assets held in my name with any other person or persons as “Joint Tenants” or as “Joint Tenants with Rights of Survivorship” shall pass to said co-tenant(s) if I predecease said co-tenant(s).
				</p>

				<p>
					D. Specific Distributions. 

					@if(count($gifts) == 0)
						I decline to make any specific gifts or requests and intend for all of my Estate to be distributed in the manner hereinafter set forth for the distribution of the residue of my Estate. 
					@else
						I direct the following specific distributions at my death:

						@php
							$i = 1;
						@endphp

						@foreach($gifts as $key => $gift)
							@if(isset($gift[0]) && isset($gift[0]['statement']) && strlen($gift[0]['statement']) > 0)
								<p>({{$i++}}) {{$gift[0]['statement']}}</p>
							@endif
						@endforeach
					@endif
				</p>

				@if(isset($estateDistribute))

					@if($estateDistribute['distribute_type'] == 2)

						@if(isset($toMultipleBeneficiary['isEstateIntoEqualShares']) && $toMultipleBeneficiary['isEstateIntoEqualShares'] == "Yes")
						<p>
							E. Residuary Estate. I direct that my {{$executor_title}} divide and distribute the rest, residue and remainder of my Estate (real, personal, and mixed, of every kind and description, and wherever located, including all benefits payable to my estate and all lapsed or void legacies, bequests, or devises)
							
							@if(isset($provideYourLovedOnes) && $provideYourLovedOnes['residue_to_partner_first'] == 1)
								@if($tellUsAboutYou['marital_status'] == "M")
									to my {{$partnerOrSpouse}}, and if my {{$partnerOrSpouse}} predeceases me, then
								@elseif($tellUsAboutYou['marital_status'] == "R")
									to my {{$partnerOrSpouse}}, and if my {{$partnerOrSpouse}} predeceases me, then
								@endif
							@endif

							in equal shares; 

							@if($toMultipleBeneficiary['isEstateIntoEqualShares'] == 'Yes')
								@foreach($toMultipleBeneficiary['beneficiaryYes'][0] as $key => $eachBeneficiary)
									<p>one share shall be distributed to my $eachBeneficiary['beneficiaryRelationship'] $eachBeneficiary['beneficiaryFullName']</p>
								@endforeach
								If any named residuary beneficiary shall not be living at my death, such beneficiary’s share shall be distributed

								@if($toMultipleBeneficiary['deceasedBeneficiaryShareToKids'] == "Yes") 
									to his or her then-living issue, {{$stateTxt}} provided, however, if such deceased beneficiary is not survived by issue, the deceased beneficiary’s share shall be added 
								@endif
								equally to the other shares.
							@endif
						</p>
						@endif


						@if(isset($toMultipleBeneficiary['isEstateIntoEqualShares']) && $toMultipleBeneficiary['isEstateIntoEqualShares'] == "No")
						<p>	
							E. Residuary Estate. I direct that my {{$executor_title}} divide and distribute the rest, residue and remainder of my Estate (real, personal, and mixed, of every kind and description, and wherever located, including all benefits payable to my estate and all lapsed or void legacies, bequests, or devises)
							
							@if(isset($provideYourLovedOnes) && $provideYourLovedOnes['residue_to_partner_first'] == 1)
								@if($tellUsAboutYou['marital_status'] == "M")
									to my {{$partnerOrSpouse}}, and if my {{$partnerOrSpouse}} predeceases me, then
								@elseif($tellUsAboutYou['marital_status'] == "R")
									to my {{$partnerOrSpouse}}, and if my {{$partnerOrSpouse}} predeceases me, then
								@endif
							@endif

							in equal shares;

							@if($toMultipleBeneficiary['isEstateIntoEqualShares'] == 'Yes')
								@foreach($toMultipleBeneficiary['beneficiaryYes'][0] as $key => $eachBeneficiary)
									<p>$eachBeneficiary['beneficiaryNoPercentageToEstate'] one share shall be distributed to my $eachBeneficiary['beneficiaryNoRelationship'] $eachBeneficiary['beneficiaryNoFullName']</p>
								@endforeach
								If any named residuary beneficiary shall not be living at my death, such beneficiary’s share shall be distributed
								@if($toMultipleBeneficiary['deceasedBeneficiaryShareToKids'] == "Yes")
									to his or her then-living issue, {{$stateTxt}} provided, however, if such deceased beneficiary is not survived by issue, the deceased beneficiary’s share shall be added 
								@endif
								equally to the other shares.
							@endif
						</p>
						@endif

					<!-- Distribution type 1 is for single beneficicary -->
					@elseif($estateDistribute['distribute_type'] == 1)
						<p>
						E. Residuary Estate. I direct that my {{$executor_title}} distribute the rest, residue and remainder of my Estate (real, personal, and mixed, of every kind and description, and wherever located, including all benefits payable to my estate and all lapsed or void legacies, bequests, or devises)

						@if(isset($provideYourLovedOnes) && $provideYourLovedOnes['residue_to_partner_first'] == 1)
							@if($tellUsAboutYou['marital_status'] == "M")
								to my {{$partnerOrSpouse}}, and if my {{$partnerOrSpouse}} predeceases me, then
							@elseif($tellUsAboutYou['marital_status'] == "R")
								to my {{$partnerOrSpouse}}, and if my {{$partnerOrSpouse}} predeceases me, then
							@endif
						@endif

						@if(isset($toSingleBeneficiary))
							@if(strtolower($toSingleBeneficiary['relationship']) == 'other')
								to my {{$toSingleBeneficiary['otherRelationship']}}
							@else
								to my {{$toSingleBeneficiary['relationship']}}
							@endif
						@endif

						{{$toSingleBeneficiary['fullName']}}. If {{$genderTxt}} is not living at the time of distribution,
					
						@if(isset($toSingleBeneficiary['ifPassesbeforeyou']))

							{{-- Distribute to beneficicary's issue --}}
							@if($toSingleBeneficiary['ifPassesbeforeyou'] == 1)
							this gift shall be distributed to  {{$gender2Txt}} then-living issue, {{$stateTxt}} 

							{{-- Distribute to rest of my heirs --}}
							however, if {{$gender2Txt}} is not survived by issue, then to my heirs at law.
							@elseif($toSingleBeneficiary['ifPassesbeforeyou'] == 2)
							to my heirs at law.

							{{-- Some other way --}}
							@elseif($toSingleBeneficiary['ifPassesbeforeyou'] == 3)
							in the following manner: 
								<p>{{$toSingleBeneficiary['someotherway']}}</p>
							@endif
						@endif
						</p>

					<!-- Distribution type 3 is for heirs at law -->
					@elseif($estateDistribute['distribute_type'] == 3)
						<p>
							E. Residuary Estate. I direct that my {{$executor_title}} distribute the rest, residue and remainder of my Estate (real, personal, and mixed, of every kind and description, and wherever located, including all benefits payable to my estate and all lapsed or void legacies, bequests, or devises)
							@if(isset($provideYourLovedOnes) && $provideYourLovedOnes['residue_to_partner_first'] == 1)
								to my {{$partnerOrSpouse}}, and if my {{$partnerOrSpouse}} predeceases me, then 
							@endif
							to my to my heirs at law.
						</p>
					@elseif($estateDistribute['distribute_type'] == 4)
						<p>
							E. Residuary Estate. I direct that my {{$executor_title}} distribute the rest, residue and remainder of my Estate (real, personal, and mixed, of every kind and description, and wherever located, including all benefits payable to my estate and all lapsed or void legacies, bequests, or devises)
							@if(isset($provideYourLovedOnes) && $provideYourLovedOnes['residue_to_partner_first'] == 1)
								to my {{$partnerOrSpouse}}, and if my {{$partnerOrSpouse}} predeceases me, then 
							@endif
							in the following manner: {{$toSingleBeneficiary['someotherway']}}
						</p>
					@endif

				@endif


				
				@if($tellUsAboutYou['has_pet'] == 1)
				<p>
					F. Pet Care Directive. It is my desire that upon my death, my pets now living, and any other pets I may then own, shall be provided for with the same standard of care, maintenance, and comfort as I provided my pets during my lifetime. My pets now living are:

					@foreach($petNames as $key => $pet)
						<p>My {{ucwords(strtolower($pet['petType']))}} {{ucwords(strtolower($pet['petName']))}}</p> 
					@endforeach

					I nominate my 

					@if(strtolower($petGuardian['relationship_with']) == "other")
						@if(strlen(trim($petGuardian['relationship_other'])) > 0)
							{{ucwords(strtolower($petGuardian['relationship_other']))}}, 
						@endif
					@else
						{{ucwords(strtolower($petGuardian['relationship_with']))}}, 
					@endif

					 {{ucwords(strtolower($petGuardian['fullname']))}} of {{$petGuardian['address']}}, {{ucwords(strtolower($petGuardian['city']))}}, {{ucwords(strtolower($petGuardian['state']))}}, {{$petGuardian['zip']}}, to serve as the Pet Caretaker
					for my pets, to accept possession of them and to care for them. 

					@if($backupPetGuardian != null)
						If {{ucwords(strtolower($petGuardian['fullname']))}} is unavailable or unwilling to serve as my Pet Caretaker, I nominate my 
						@if(strtolower($backupPetGuardian['relationship_with']) == "other")
							@if(strlen(trim($backupPetGuardian['relationship_other'])) > 0)
								{{$backupPetGuardian['relationship_other']}}, 
							@endif
						@else
							{{$backupPetGuardian['relationship_with']}}, 
						@endif

						{{ucwords(strtolower($backupPetGuardian['fullname']))}} of {{$backupPetGuardian['address']}}, {{ucwords(strtolower($backupPetGuardian['city']))}}, {{ucwords(strtolower($backupPetGuardian['state']))}}, {{$backupPetGuardian['zip']}}, as alternate Pet Caretaker for my pets.
					@endif

					@if($tellUsAboutYou['leaveMoney'] == 1)
						I give and bequeath to my Pet Caretaker who takes possession of my pets the sum of $tellUsAboutYou['petAmount'] Dollars ({{'$'.$tellUsAboutYou['petAmount']}}) on the condition that my Pet Caretaker agrees to provide a suitable home for my pets, to keep them well fed and clean, and to provide them with appropriate medical care.
					@endif
				</p>
				@endif

				
				@php
					$point = '';
					if($toMultipleBeneficiary['minorBeneficiaryShareToBeHeldInTrust'] == 'Yes')
					{
						if($tellUsAboutYou['has_pet'] == 1)
							$point = 'G.';
						else
							$point = 'F.';
					}
				@endphp


				@if($estateDistribute['distribute_type'] == 2 && $toMultipleBeneficiary['minorBeneficiaryShareToBeHeldInTrust'] == 'Yes')
				<p>
					{{$point}} Distributions to Minor Beneficiaries.  If any beneficiary provided for herein has not yet attained the age of majority under the applicable Transfer to Minors Act or Gift to Minors Act, the distribution shall be held for said beneficiary in a custodial account under the provisions of the applicable Transfer to Minors Act or Gift to Minors Act with

					@if($toMultipleBeneficiary['minorParentsTrustee'] == "Yes")
						the parent of such beneficiary
					@else
						{{$toMultipleBeneficiary['whoServeAsTrusteeAccount']}}
				@php
					$point = '';
					if(isset($contingentBeneficiary) && $contingentBeneficiary['is_contingent_beneficiary'] == 1) {
						if($tellUsAboutYou['has_pet'] == 0 && $toMultipleBeneficiary['minorBeneficiaryShareToBeHeldInTrust'] == 'No')
							$point = 'F.';
						elseif($tellUsAboutYou['has_pet'] == 0 && $toMultipleBeneficiary['minorBeneficiaryShareToBeHeldInTrust'] == 'Yes')
							$point = 'G.';

						elseif($tellUsAboutYou['has_pet'] == 1 && $toMultipleBeneficiary['minorBeneficiaryShareToBeHeldInTrust'] == 'No')
							$point = 'G.';

						elseif($tellUsAboutYou['has_pet'] == 1 && $toMultipleBeneficiary['minorBeneficiaryShareToBeHeldInTrust'] == 'Yes')
							$point = 'H.';
					}
				@endphp

				@if(isset($contingentBeneficiary) && $contingentBeneficiary['is_contingent_beneficiary'] == 1) 
					<p>
						{{$point}} Contingent Disposition of My Estate.  If I have no living beneficiaries or issue prior to the distribution of the entirety of my estate, I give the undistributed portion of my estate to my heirs at law, their distributions to be determined according to the laws of the
						@if(strtolower($state) == "district of columbia")
							{{$state}}
						@elseif(strtolower($state) == "Massachusetts" || strtolower($state) == "Virginia" || strtolower($state) == "Kentucky" || strtolower($state) == "Pennsylvania")
							Commonwealth of {{$state}}
						@else
							State of {{$state}}
						@endif
						in effect at the date of execution of this Will
					</p>
				@endif
				
				@php
					$point = '';
					if(isset($disinherit) && count($disinherit) > 0 && isset($disinherit['disinherit']) && $disinherit['disinherit'] == 1) {
						if($tellUsAboutYou['has_pet'] == 0 && $toMultipleBeneficiary['minorBeneficiaryShareToBeHeldInTrust'] == 'No' && $contingentBeneficiary['is_contingent_beneficiary'] == 0)
							$point = 'F. ';

						elseif($tellUsAboutYou['has_pet'] == 0 && $toMultipleBeneficiary['minorBeneficiaryShareToBeHeldInTrust'] == 'No' && $contingentBeneficiary['is_contingent_beneficiary'] == 1)
							$point = 'G. ';

						elseif($tellUsAboutYou['has_pet'] == 0 && $toMultipleBeneficiary['minorBeneficiaryShareToBeHeldInTrust'] == 'Yes' && $contingentBeneficiary['is_contingent_beneficiary'] == 0)
							$point = 'G. ';

						elseif($tellUsAboutYou['has_pet'] == 1 && $toMultipleBeneficiary['minorBeneficiaryShareToBeHeldInTrust'] == 'No' && $contingentBeneficiary['is_contingent_beneficiary'] == 0)
							$point = 'G. ';

						elseif($tellUsAboutYou['has_pet'] == 0 && $toMultipleBeneficiary['minorBeneficiaryShareToBeHeldInTrust'] == 'Yes' && $contingentBeneficiary['is_contingent_beneficiary'] == 1)
							$point = 'H. ';

						elseif($tellUsAboutYou['has_pet'] == 1 && $toMultipleBeneficiary['minorBeneficiaryShareToBeHeldInTrust'] == 'No' && $contingentBeneficiary['is_contingent_beneficiary'] == 1)
							$point = 'H. ';				

						elseif($tellUsAboutYou['has_pet'] == 1 && $toMultipleBeneficiary['minorBeneficiaryShareToBeHeldInTrust'] == 'Yes' && $contingentBeneficiary['is_contingent_beneficiary'] == 0)
							$point = 'H. ';

						elseif($tellUsAboutYou['has_pet'] == 1 && $toMultipleBeneficiary['minorBeneficiaryShareToBeHeldInTrust'] == 'Yes' && $contingentBeneficiary['is_contingent_beneficiary'] == 1)
							$point = 'I. ';
					}
				@endphp

				@if(isset($disinherit) && count($disinherit) > 0 && isset($disinherit['disinherit']) && $disinherit['disinherit'] == 1)
					<p>
						{{$point}} Disinheritance. I specifically make no provision for the following persons or their issue (if any) upon my death with the intent to disinherit: My 
						@if(strtolower($disinherit['relationship']) == 'other')
							{{$disinherit['other_relationship']}}, 
						@else
							{{$disinherit['relationship']}}, 
						@endif
						{{$disinherit['fullname']}}
					</p>
				@endif
					@endif
					as the custodian until the beneficiary reaches the age of {{$toMultipleBeneficiary['whatAgeMinorShareDistributed']}}, and no earlier, unless required by applicable law.
				</p>
				@endif


				{{--
				«IF Pets?»
					
					«IF Will Contingent Beneficiaries?»
						«IF (!Pets? AND !Sum UTMA? AND Will Contingent Beneficiaries?)»F.
							
							«ELSE IF (!Pets? AND Sum UTMA? AND Will Contingent Beneficiaries?)»G.
							«ELSE IF (Pets? AND !Sum UTMA? AND Will Contingent Beneficiaries?)»G.
							ELSE IF (Pets? AND Sum UTMA? AND Will Contingent Beneficiaries?)»H.
						«END IF»	
						Contingent Disposition of My Estate.  If I have no living beneficiaries or issue prior to the distribution of the entirety of my estate, I give the undistributed portion of my estate to my heirs at law, their distributions to be determined according to the laws of the 
						«IF State = "District of Columbia"»
							District of Columbia
							«ELSE IF "Massachusetts Virginia Kentucky Pennsylvania" CONTAINS State»
								Commonwealth of «State»
							«ELSE»
								State of «State»
						«END IF» 
						in effect at the date of execution of this Will
					«END IF»«.»

					«IF Will Disinherit?»
						«IF (!Pets? AND !Sum UTMA? AND !Will Contingent Beneficiaries? AND Will Disinherit?)»F.
						
							«ELSE IF (!Pets? AND !Sum UTMA? AND Will Contingent Beneficiaries? AND Will Disinherit?)»G.
							
							«ELSE IF (!Pets? AND Sum UTMA? AND !Will Contingent Beneficiaries? AND Will Disinherit?)»G.
							
							«ELSE IF (Pets? AND !Sum UTMA? AND !Will Contingent Beneficiaries? AND Will Disinherit?)»G.
							
							«IF (!Pets? AND Sum UTMA? AND Will Contingent Beneficiaries? AND Will Disinherit?)»H.
							
							«IF (Pets? AND !Sum UTMA? AND Will Contingent Beneficiaries? AND Will Disinherit?)»H.
							
							«IF (Pets? AND Sum UTMA? AND !Will Contingent Beneficiaries? AND Will Disinherit?)»H.
							
							«ELSE IF (Pets? AND Sum UTMA? AND Will Contingent Beneficiaries? AND Will Disinherit?)»I.
						«END IF»	
						Disinheritance. I specifically make no provision for the following persons or their issue (if any) upon my death with the intent to disinherit:  
						«Will Disinherited Heirs»  
					«END IF»

				«END IF»
				--}}
				
			</div>

			<div class="article-4">
				
				
				<b>ARTICLE IV: FIDUCIARY POWERS</b>

				<p>
					A. General Powers. I intend that my {{$executor_title}} shall have broad and reasonable discretion in the administration and settlement of my estate. In addition to all powers conferred on my {{$executor_title}} by law, and any powers enumerated elsewhere in this Will, and subject to any limitations specifically stated in this Will, my {{$executor_title}} shall have the power to take the following actions without the necessity of court approval:

					(1) To take possession or control of my estate, real or personal, and receive rents, income, interest, and profits therefrom prior to distribution to my heirs or beneficiaries;

					(2) To deposit money belonging to my estate in an insured account in a financial institution;

					(3) To collect, pursue payment of, and sue for all debts due to me or to my estate;

					(4) To take any action necessary or proper to recover possession of any real or personal property in my Estate, including an action to quiet title; and,

					(5) To take any action reasonably necessary to safeguard, protect, preserve, and manage my estate property, including payment of taxes and insurance using estate funds;

					(6) To lease any estate property on such terms and conditions as my {{$executor_title}} deems advisable;

					(7) To retain any property of my estate (real or personal) as my {{$executor_title}} deems advisable, and to invest and reinvest in any kind of property and in any kind of investment, regardless of the extent of diversification of the assets held hereunder.

					(8) To borrow on behalf of my estate and to pledge or mortgage any property as collateral;

					(9) To make secured or unsecured loans on behalf of my estate, including loans without interest to any beneficiary of my estate;

					(10) To exercise any option and use any property in my estate to acquire the property covered by the option;

					(11) To sell and grant options to purchase all or any part of my Estate (real or personal) upon terms as my {{$executor_title}} deems advisable, and to execute, acknowledge and deliver deeds or other instruments in connection therewith;

					(12) To hold any securities (including “street certificates”) or other property (real or personal) in the name of my {{$executor_title}} or in the name of any nominee selected by my {{$executor_title}}, without having to disclose that the property is held in a fiduciary capacity, and to indemnify any such nominee against loss resulting from holding such property as nominee;



					(13) To exercise any voting rights with respect to any stock, membership in a company, membership in a nonprofit corporation, or other property in my Estate, and to authorize, ratify, approve, or confirm any action that could be taken by shareholders, members, or property owners, either in person or by proxy;

					(14) To make any elections permitted under any pension, profit sharing, employee stock ownership or other benefit plan;

					(15) To enter into, ratify, and perform any contract with any third party or entity on behalf of my estate;

					(16) To sue or be sued on behalf of my estate, and to participate in any mediation or arbitration proceeding on behalf of my estate;

					(17) To disclaim any legacy, devise, or interest in any Will, trust, or other disposition provided for my benefit that creates an interest for my estate, and to renounce any privilege or power granted to me under any Will or Trust that creates an interest for my estate;

					(18) To dispose of, donate to any charitable organization, or abandon my tangible personal property, except any item of tangible personal property that is subject to a specific gift herein or subject to disposition under any separate written instructions I may leave, unless such specific gift or disposition is disclaimed or fails;

					(19) To employ or retain the services of any professional in connection with the administration of my Estate, including legal counsel, investment advisors, brokers, accountants, realtors, and agents, and to pay reasonable compensation for such services in addition to any compensation to my {{$executor_title}};

					(20) To insure my {{$executor_title}} against liability to third persons, the cost of which shall be included as an estate expense.


					@if($provideYourLovedOnes['business_interest'])
						(21) To continue the operation of, sell, or liquidate any business or interest in any business that I or my estate may own, at any time, on any terms, and in any manner as my {{$executor_title}} deems advisable and in the best interests of my estate.
					@endif

					@if($provideYourLovedOnes['farm_or_ranch'])
						(22) To continue to hold, operate, sell, purchase, acquire, invest in, or liquidate any farming or ranching property, or any interest that I or my estate may own in farming or ranching property, at any time, on any terms, and in any manner as my «ExecutorTitle» deems advisable and in the best interests of my estate.
					@endif
				</p>

				<p>
					B. Distribution in Cash or in Kind. I direct that my {{$executor_title}} shall, in satisfying any bequest herein, have the discretion to distribute any assets in kind, or in undivided interests, or to sell all or any part of any assets and distribute the proceeds thereof, or distribute any assets partly in cash and partly in kind, with or without regard to tax basis, and in valuing such asset at its fair market value at the time of distribution.
				</p>

				<p>
					C. Tax Elections. My {{$executor_title}} shall have all powers permissible under the law to make any elections for state or federal tax purposes, including, but not limited to, choosing a valuation date, choosing the methods to pay any taxes, electing to treat or use any item as a deduction, and disclaiming all or any portion of any interest in property passing at or after my death to my estate or to a trust created by me or established for my benefit. 
					
					@if($tellUsAboutYou['state'] == "Oregon")
						As used in this Will, the term “Estate tax” shall include any “Inheritance Tax” imposed on the Estate of a decedent pursuant to Chapter 118 of the Oregon Revised Statutes. 
					@endif

					@if($tellUsAboutYou['marital_status'] == "M")
						To the extent and in the manner authorized by §2010(c)(2) of the Internal Revenue Code (the “Code”) and any applicable regulations thereto, my {{$executor_title}} is specifically authorized to elect the allocation to my spouse of any unused portion of my “applicable exclusion amount” for federal Estate tax purposes. It is my intent that my {{$executor_title}} may affirmatively elect “portability” of the “deceased spousal unused exclusion amount” [as said term is defined in §2010(c)(4) of the Code] pursuant to §2010(c)(5)(A) of the Code.
					@endif
				</p>

				<p>
					D. Digital Assets. My {{$executor_title}} shall have the power to access, manage, and control all of my digital assets at my death, including email accounts and social media.
					
					@if($tellUsAboutYou['state'] == "Oregon")
					“Digital asset” means an electronic record in which an individual has a right or interest. “Digital asset” does not include an underlying asset or liability unless the asset or liability is itself an electronic record.
					@else
					pursuant to the Revised Uniform Fiduciary Access to Digital Assets Act (2015), Chapter 19 ORS.
					@endif
				</p>

				<p>
					E. Liability. My {{$executor_title}} shall not be liable for any acts or omissions or the acts or omissions of any co-{{$executor_title}} or prior {{$executor_title}}, excepting the {{$executor_title}}’s own willful default or gross negligence.
				</p>

				<p>
					F. Compensation of {{$executor_title}}. 
					
					@if($provideYourLovedOnes['is_getcompensate'] == 1) 
						In addition to reimbursement for all necessary expenses incurred in the administration of my estate and the discharge of my {{$executor_title}}’s duties, I direct that my {{$executor_title}} be entitled to reasonable compensation from the net value of my Estate for services in the administration of my Estate, which amount shall be equally divided between the {{$executor_title}} and any successor {{$executor_title}}.
					@else
						It is my desire that my {{$executor_title}} serve without compensation from my Estate, and shall only be entitled to reimbursement for all necessary expenses incurred in the administration of my estate and the discharge of my {{$executor_title}}’s duties.
					@endif
				</p>
				
				<p>
					@if($tellUsAboutYou['state'] == "Washington")
						G. Court Intervention. I intend that my Estate be managed, administered, distributed, and settled without Court intervention to the maximum extent permissible by law, and that the Court grant Nonintervention Powers pursuant to §11.68.011 of the Revised Code of Washington.
					@elseif($tellUsAboutYou['state'] == "Georgia")
						G. Court Supervision. Pursuant to §53-7-33 and §53-7-69 of the Official Code of Georgia Annotated, I hereby relieve my {{$executor_title}} from all reporting requirements in the administration of my Estate. I intend that my Estate be administered and settled with the minimum Court intervention permitted by law.
					@elseif($tellUsAboutYou['state'] == "Texas")
						G. Court Supervision. Pursuant to Subtitle I of Title 2 of the Texas Estates Code, I direct that no other action shall be had in the probate court in relation to the administration and settlement of my Estate other than the probating and recording of this Last Will and Testament, and the return of any required inventory, appraisement and list of claims of my Estate.
					@else
						G. Court Supervision. I intend that my Estate administration be unsupervised and settled with the minimum Court intervention permitted by law.
					@endif
				</p>

			</div>

			<div class="article-5">
				
				ARTICLE V: GENERAL PROVISIONS

				<p>
					A. Captions. All captions and headings are for convenience of reference only and shall be disregarded in determining the meaning and effect of the provisions of this Will.
				</p>

				<p>
					B. Savings Clause. If a Court of competent jurisdiction invalidates any portion of any provision this Will, that portion shall be disregarded without invalidation of the whole of the Will. To the extent possible, the remainder of the provision shall be construed as if the invalid portion had not been included, and the whole of the Will will remain in full force and effect.
				</p>

				<p>
					C. Governing Law. All questions concerning the validity and interpretation of this Will shall be governed by the laws of 

					@if($tellUsAboutYou['state'] == "District Of Columbia")
						District of Columbia
					@elseif($tellUsAboutYou['state'] == "Massachusetts" || $tellUsAboutYou['state'] == "Virginia" || $tellUsAboutYou['state'] == "Kentucky" || 	$tellUsAboutYou['state'] == "Pennsylvania")
						the Commonwealth of {{$tellUsAboutYou['state']}}
					@else
						State of {{$tellUsAboutYou['state']}}
					@endif
					 in effect at the date of execution of this Will.
				</p>

				<p>
					D. No Contest. 
					@if($tellUsAboutYou['state'] != "California")
						To the extent permitted under the laws of the 
						
						@if($tellUsAboutYou['state'] != "District of Columbia")
							District of Columbia 

						@elseif($tellUsAboutYou['state'] == "Massachusetts" || $tellUsAboutYou['state'] == "Virginia" || $tellUsAboutYou['state'] == "Kentucky" || $tellUsAboutYou['state'] == "Pennsylvania")
							Commonwealth of {{$tellUsAboutYou['state']}} 
						@else
							State of {{$tellUsAboutYou['state']}}
						@endif

					@else
						Pursuant to §21310, et seq., of the California Probate Code
					@endif 

					, in the event any person or persons named as beneficiary or disinherited hereunder commence any proceeding to challenge the dispositions in this Will, or contest in any Court the validity of this Will or any of its provisions without probable cause, then such person or persons shall forfeit any interest in my estate as if the person or persons predeceased me without being survived by issue. My {{$executor_title}} is hereby authorized to defend, at the expense of my Estate, any contest or other attack of any nature on my Estate, this Will or any of its provisions.
				</p>

				@if($tellUsAboutYou['marital_status'] == "M" || $tellUsAboutYou['marital_status'] == "R")
				<p>
					E. Simultaneous Death. In the event I die under circumstances in which it cannot be readily ascertained as to whether I or my {{$partnerOrSpouse}} died first, then it shall be conclusively presumed for the purposes of this Will that my {{$partnerOrSpouse}} predeceased me, and my {{$partnerOrSpouse}}'s bequests hereunder shall be deemed to have lapsed and shall be distributed with the residue of my Estate.
				</p>
				@endif

				
				@if($tellUsAboutYou['state'] == "New Mexico")
				<p>
					F. Definition of “Issue”. At my death, my "heirs" or “issue” shall include only individuals who are born at the time of my death (or within ten (10) months thereafter) and not those conceived later through assisted reproduction or as a gestational child, as those terms are defined and used in Sections 45-2-115 and 45-2-121, NMSA 1978, as amended and as they may be further amended. The purpose of this exclusion is to override the forty-five (45) month time period for delayed vesting of interests which might otherwise apply when administering my Estate, pursuant to applicable sections of the Uniform Probate Code including but not limited to §45- 2-120 NMSA 1978.
				</p>
				@endif
				
			</div>

			<div class="doc-sign">
				
				<b>[signature and attestation pages follow]</b>

				IN WITNESS WHEREOF, I have on this _____ day of ____________________________, __________, signed, sealed, published and declared the foregoing instrument as and for my Last Will and Testament, in the presence of each and all of the subscribing witnesses, each of whom I have requested, in the presence of each of the others, to subscribe his or her name as an attesting witness, in my presence and in the presence of the others. I am of legal age, of sound mind, and under no constraint or undue influence.

				______________________________________

				{{$tellUsAboutYou['fullname']}}

				On the date last above written, {{$tellUsAboutYou['fullname']}} declared to us, the undersigned, that the foregoing instrument was {{$gender2Txt}}. Last Will and Testament and requested us to act as witnesses to it. To the best of our knowledge, {{$tellUsAboutYou['fullname']}} was of legal age, of sound mind, and under no constraint or undue influence. {{$tellUsAboutYou['fullname']}} thereupon signed this Will in our presence, all of us being present at the same time. We now, at 
				{{$gender2Txt}} request, in {{$gender2Txt}} presence and in the presence of each other, subscribe our names as witnesses. We declare under penalty of perjury that the foregoing is true and correct.

				Executed on this _____ day of ____________________________, __________.

				_____________________________ _____________________________ (WITNESS 1) (WITNESS 2)

				NAME: NAME:

				ADDRESS: ADDRESS:

				CITY/STATE: CITY/STATE:

				STATE OF ________________ )

				) ss.

				COUNTY OF ________________ )

				Subscribed, sworn and acknowledged before me by {{$tellUsAboutYou['fullname']}}, the testator, and _________________________________________, as witness, and _____________________________________, as witness, who personally appeared on this _________ day of ________________________________, _______, and who are personally known to me or who have produced satisfactory photo identification, and whose names are signed to the foregoing instrument and, all of these persons being under oath and by me first duly sworn, {{$tellUsAboutYou['fullname']}}, the testator, declared to me and to the witnesses in my presence that the instrument is {{$gender2Txt}} Last Will and Testament and that {{$gender2Txt}} had willingly signed (or directed another to sign for {{$gender2Txt}}), and that the testator executed it as a free and voluntary act for the purposes therein expressed; and each of the witnesses stated to me, in the presence and hearing of the testator, that the witness signed the Will as witness and that to the best of the witness’ knowledge the testator was eighteen years of age or over, of sound mind and under no constraint or undue influence.

				______________________________________

				NOTARY PUBLIC

				My commission expires: ________________

				AFFIDAVIT FOR LAST WILL AND TESTAMENT OF

				{{$tellUsAboutYou['fullname']}}

				UNDER OATH AND PENALTIES FOR PERJURY, WE, {{$tellUsAboutYou['fullname']}}, the Testator, and ______________________, and ______________________, the witnesses, whose names are signed to the attached or foregoing instrument, declare:

				1. That the Testator executed this instrument as {{$gender2Txt}}

				Last Will and Testament;

				2. That, in the presence of all witnesses, {{$gender2Txt}} signed {{$gender2Txt}}

				Last Will and Testament, and declared to all witnesses that {{$gender2Txt}} 
				intended the attached or foregoing document to be {{$gender2Txt}}
				Last Will and Testament;

				3. That {{$genderTxt}} executed the Will as {{$gender2Txt}} free and voluntary act for the purposes expressed in it;

				4. That each of the witnesses, in the presence of the Testator and of each other, signed the Will as a witness;

				5. That the Testator was of sound mind; and

				6. That the Testator was, at the time, eighteen (18) or more years of age.

				______________________________________ DATED:

				{{$tellUsAboutYou['fullname']}}, Testator

				_______________________________________________ (WITNESS 1)

				NAME:

				ADDRESS:

				CITY/STATE:

				_______________________________________________ (WITNESS 2)

				NAME:

				ADDRESS:

				CITY/STATE:

				STATE OF ________________ )

				) ss.

				COUNTY OF ________________ )

				Subscribed, sworn and acknowledged before me by {{$tellUsAboutYou['fullname']}}, the testator, and subscribed, sworn, and acknowledged before me by _____________________________ and _____________________________, witnesses, this ____ day of ________________ , ________ .

				______________________________________

				NOTARY PUBLIC

				My commission expires: _________________

				LAST WILL AND TESTAMENT

				OF

				{{$tellUsAboutYou['fullname']}}
				
			</div>
		</div>

		
		

		

	</div>
</body>
</html>


