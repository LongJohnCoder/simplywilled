<?php
	/**
	 * 
	 */
	namespace App\Helper;
	use App\TellUsAboutYou;

	class GiftStatement
	{
		
		// function __construct($argument)
		// {
		// 	# code...
		// }

		/* *
		* This function generates the gift statement for cash gift and returns the object to the calling function
		* @param cashDescription : cashDescription object, tuay : TellUsAboutYou object
		* @return json object
		*/
		public static function cashDescription($cashDescription, $tuay) {
			
			if(!array_key_exists('gift_to',$cashDescription)) {
				$cashDescription['statement'] = '';
				return json_encode([$cashDescription]);
			}
			
			$statement = '';	
			if($cashDescription['gift_to'] == 'CH') {

				/********************************************************
				* CASH GIFT FOR CHARITY :
				* 
				* FIELDS CONCERNED :
				* gift_to : 'CH',
				* charity_gift_amt : (int),
				* organization_name : 'name of organization or charity',
				* organization_address : 'address of organization'
				*
				*********************************************************/

				if(!array_key_exists('charity_gift_amt',$cashDescription) ||
					!array_key_exists('organization_name',$cashDescription) ||
					!array_key_exists('organization_address',$cashDescription)) {

					$statement = '';
				} else {

					$statement .= "The sum of $" . (int)$cashDescription['charity_gift_amt'] . " shall be distributed to " . 
								$cashDescription['organization_name']
								." at ".$cashDescription['organization_address'];
				}
				$cashDescription['statement'] = $statement;
			
			} elseif ($cashDescription['gift_to'] == 'IN') {

				/******************************************************
				* CASH GIFT FOR CHARITY : (EXAMPLE RESPONSE RECEIVED)
				* 
				* FIELDS CONCERNED :
				* gift_to	: "IN",
				* b_gender	: "Male",
				* gift_amt 	: "100",
				* passed_by	: "Yes", (OR NO SOMETIMES)
				* relationship 		: "Friend",
				* full_legal_name	: "beneficiary full legal name",
				* other_relationship_string: null
				*
				********************************************************/

				if(!array_key_exists('b_gender',$cashDescription) || 
					!array_key_exists('gift_amt',$cashDescription) || 
					!array_key_exists('passed_by',$cashDescription) || 
					!array_key_exists('relationship',$cashDescription) || 
					!array_key_exists('full_legal_name',$cashDescription) || 
					!array_key_exists('other_relationship_string',$cashDescription)) {

					$cashDescription['statement'] = '';
				} else {

					//generating related variables
					$relationName = $cashDescription['other_relationship_string'] == null 
								? $cashDescription['relationship'] 
								: $cashDescription['other_relationship_string'];

					$beneficiaryName = $cashDescription['full_legal_name'];

					$salutation1 = $cashDescription['b_gender'] == 'Male' ? 'He' : 'She';
					$salutation2 = $cashDescription['b_gender'] == 'Male' ? 'His' : 'Her';

					$amount = $cashDescription['gift_amt'];

					$passedBy = strtolower($cashDescription['passed_by']) == "yes" ? true : false;
					//generating related variables ends

					//generating statement
					$statement .= "The sum of $" . (int)$amount . " shall be distributed to My " . ucwords(strtolower($relationName)) . " , " 
									. ucwords(strtolower($beneficiaryName)) . ". If " . $salutation1 . " is not living at the time of distribution ";

					if($passedBy) {
						$statement .= "this gift shall be distributed to " . ucwords(strtolower($beneficiaryName)) . "'s then living issue, ";
						$state 	= $tuay->state;

						//different legislation statement for state of california
						if($state == 'California') {
							$statement .= "by the right of representation. ";
						} else {
							$statement .= "per stripes. ";
						}
						$statement .= "However if " . ucwords(strtolower($beneficiaryName)) . " is not survived by issue this distribution shall fail and be added to the residue of my Estate. ";
					} else {
						$statement .= "this gift shall be distributed with the residue of my Estate.";
					}
					$cashDescription['statement'] = $statement;
				}
				
			} else {
				
				$cashDescription['statement'] = '';
			}

			return json_encode([$cashDescription]);
		}

		//With the residue of my estate : _re
		//To their issue : _tti
		//To someone else : _se
		//To surviving gift beneficiaries : _sgb

		/* *
		* This function generates the gift statement for property detail gift and returns the object to the calling function
		* @param cashDescription : propertyDetails object, userId : user id
		* @return json object
		*/
		public static function businessDetails($businessDetails, $tuay) {
			if(!array_key_exists('gift_to',$businessDetails) ||
				!array_key_exists('full_legal_name',$businessDetails)) {
				$businessDetails['statement'] = '';
				return json_encode([$businessDetails]);
			}

			$statement = "I direct that all of my interest in that business entity known as ".ucwords(strtolower($businessDetails['full_legal_name'])).", including, but not be limited to, goodwill, accounts receivable, equipment, inventory, bank accounts and all other assets of the business of whatever manner, wherever located, and whenever acquired, shall be distributed to ";


			//.$propertyDetails['organization_name']." at ".$propertyDetails['organization_address'].". If said organization does not exist at the time of distribution, this asset shall be distributed with the residue of my estate."

			if($businessDetails['gift_to'] == 'CH') 
			{	
				/*******************************************************
				* CASH GIFT FOR CHARITY :
				* 
				* FIELDS CONCERNED :
				* organization_name : 'organisation name',
				* organization_address : 'organisation address',
				*
				********************************************************/

				if(array_key_exists('organization_name',$businessDetails) && 
					isset($businessDetails['organization_name']) && 
					array_key_exists('organization_address',$businessDetails) &&
					isset($businessDetails['organization_address'])) {

					$statement .= $businessDetails['organization_name']." at ".$businessDetails['organization_address'].". If said organization does not exist at the time of distribution, this asset shall be distributed with the residue of my estate.";
				}
				$cashDescription['statement'] = $statement;
			
			} 
			elseif($businessDetails['gift_to'] == 'IN') 
			{

				/*****************************************************
				* CASH GIFT FOR CHARITY :
				* 
				* FIELDS CONCERNED :
				* full_legal_name : 'full legal name of business',
				* organization_name : 'organisation name',
				* organization_address : 'organisation address',
				*
				******************************************************/

				// if(!array_key_exists('beneficiary',$businessDetails) ||
				// 	!array_key_exists('passed_by',$businessDetails) || 
				// 	!array_key_exists('beneficiary_legal_relation', $businessDetails) ||
				// 	!array_key_exists('individual_relationship', $businessDetails)) {
				// }

				if(array_key_exists('beneficiary', $businessDetails) && isset($businessDetails['beneficiary']) && 
					array_key_exists('passed_by',$businessDetails) && isset($businessDetails['passed_by'])) 
				{

					if($businessDetails['beneficiary'] == "_si")
					{
						if(array_key_exists('beneficiary_legal_relation',$businessDetails) && isset($businessDetails['beneficiary_legal_relation']) &&
						//array_key_exists('individual_relationship',$businessDetails) && isset($businessDetails['individual_relationship']) && 
						array_key_exists('beneficiary_legal_name',$businessDetails) && isset($businessDetails['beneficiary_legal_name'])) {

							//dd('came here');
							if($businessDetails['beneficiary_legal_relation'] != '')
							{
								$statement .= " My ".$businessDetails['beneficiary_legal_relation'];
							}
							$statement .= ", ".ucwords(strtolower($businessDetails['beneficiary_legal_name']));
						}
												
					}
					elseif($businessDetails['beneficiary'] == "_mu") 
					{
						if(array_key_exists('multiple_beneficiaries', $businessDetails) &&
							isset($businessDetails['multiple_beneficiaries'])) {

							$statement .= "the following persons in equal shares:";
							$index = 0;
							
							$substatement = '';
							foreach($businessDetails['multiple_beneficiaries'] as $key => $beneficiary)
							{
								if(array_key_exists('multiple_beneficiary_name', $beneficiary) &&
									isset($beneficiary['multiple_beneficiary_name']) &&  
									array_key_exists('multiple_beneficiary_relationship', $beneficiary) &&
									isset($beneficiary['multiple_beneficiary_relationship'])) {

									$substatement .= $substatement != '' ? ' and' : '';
									$substatement .= ' (My ' . ucwords(strtolower($beneficiary['multiple_beneficiary_relationship'])) . ', ' . 
														ucwords(strtolower($beneficiary['multiple_beneficiary_name'])) . ')';
								}
							}
							$statement .= $substatement;
						}
					}

					$statement .= ". If a distributee named in this provision does not survive me, the deceased distributee's share of this gift shall instead be distributed";

					
					if($businessDetails['passed_by'] == "_sgb")
					{
						$statement .= " equally among the surviving distributees of this gift.";
					
					}

					elseif ($businessDetails['passed_by'] == "_re")
					{
						$statement .= " with the residue of my Estate.";
					
					}
					
					elseif($businessDetails['passed_by'] == "_se") 
					{
						$statement .= " to";
						if(strtolower($businessDetails['individual_relationship']) == 'other')
						{
							$statement .= " my " . ucwords(strtolower($businessDetails['individual_relationship_other'])).",";
						} 
						else 
						{
							$statement .= " my " . ucwords(strtolower($businessDetails['individual_relationship'])). ", ";
						}
						$statement .= ucwords(strtolower($businessDetails['individual_name'])).".";
					}
					
					elseif ($businessDetails['passed_by'] == "_tth" || $businessDetails['passed_by'] == "_tti") 
					{
						$statement .= " to his or her then-living issue, ";
						
						if(trim(strtolower($tuay->state)) == "california")
						{
							$statement .= " by right of representation";
						} 
						else 
						{
							$statement .= " per stirpes";
						}
						
						$statement .= "; however, if said distributee is not survived by issue, the interest (or the net sale proceeds of the interest) shall be distributed";
						
						if($businessDetails['passed_by_child'] == "_re")
						{
							$statement .= " in the manner hereinafter set forth for the distribution of the residue of my Estate.";
						} 
						
						elseif($businessDetails['passed_by_child'] == "_se")
						{
							$statement .= " to";
							if(strtolower($businessDetails['individual_relationship']) == 'other')
							{
								$statement .= " my " . $businessDetails['individual_relationship_other'].",";
							} 
							else 
							{
								$statement .= " my " . $businessDetails['individual_relationship']. ", ";
							}
							$statement .= " ".ucwords(strtolower($businessDetails['individual_name'])).".";
						}
					}
				}
			}

			$businessDetails['statement'] = $statement;
			return json_encode([$businessDetails]);
		}
	}
?>