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
				return json_encode($cashDescription);
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

			return json_encode($cashDescription);
		}

		//With the residue of my estate : _re
		//To their issue : _tti
		//To someone else : _se
		//To surviving gift beneficiaries : _sgb

		/* *
		* This function generates the gift statement for specific gift and returns the object to the calling function
		* @param cashDescription : propertyDetails object, userId : user id
		* @return json object
		*/


		public static function generateStatement($data, $tuay, $option) {
			//dd($data, $option);
			if(!array_key_exists('gift_to',$data)) {
				$data['statement'] = '';
				return json_encode($data);
			}

			$statement = '';
			$term = '';

			/*****************************************************
			* BUSINESS DETAILS ONLY EXTRA FOR REAL PROPERTY GIFTS :
			* 
			* state : state of the property,
			* city : city of the property,
			* street_address : street address of this property,
			* residence : '1/0' -> if this is users primary residence or not
			* free_mortgage : '1/0' -> if this property is free of any mortgage
			*
			******************************************************/


			switch ($option) {

				case 'real property'	: 	if(!array_key_exists('city', $data) || 
												!array_key_exists('state', $data) ||
												!array_key_exists('street_address', $data) ||
												!array_key_exists('residence', $data) ||
												!array_key_exists('free_mortgage', $data)) {
												
												$data['statement'] = '';
												return json_encode($data);
											}

											$statement .= $data['residence'] == '1' 
													? "My principal residence located at ".$data['street_address'].", ".$data['city'].", ".$data['state']
													: "That certain real property located at ".$data['street_address'].", ".$data['city'].", ".$data['state'];

											$statement .= " shall be distributed to ";
											$term = 'property';
											break;
				
				case 'specific asset' 	:  	if(!array_key_exists('full_legal_name',$data)) {
												$data['statement'] = '';
												return json_encode($data);
											}

											$statement .= $data['full_legal_name']." shall be distributed to ";
											$term = 'asset';
											break;

				case 'business interest':	if(!array_key_exists('full_legal_name',$data)) {
												$data['statement'] = '';
												return json_encode($data);
											}

											$statement .= "I direct that all of my interest in that business entity known as ".ucwords(strtolower($data['full_legal_name'])). 
											", including, but not be limited to, goodwill, accounts receivable, equipment, inventory, bank accounts and all other assets of the business of whatever manner, wherever located, and whenever acquired, shall be distributed to ";
											$term = 'interest';
											break;

				default 				: 	$data['statement'] = '';
											return json_encode($data);
			}

			switch ($data['gift_to']) {
				
				case 'CH': /*******************************************************
							* BUSINESS DETAILS FOR REAL PROPERTY :
							* 
							* FIELDS CONCERNED :
							* organization_name : 'organisation name',
							* organization_address : 'organisation address',
							*
							********************************************************/
							

							if(array_key_exists('organization_name',$data) && 
								isset($data['organization_name']) && 
								array_key_exists('organization_address', $data) &&
								isset($data['organization_address'])) {

								$statement .= $data['organization_name']." at ".$data['organization_address'];

								if ($option == 'real property') {
										$statement .= $data['free_mortgage'] == "1"
														? ". Said gift shall be distributed free of any encumbrances and liens"
														: ". Subject to all encumbrances and/or liens of record";
								}

								$statement .= ". If said organization does not exist at the time of distribution, this ".$term." shall be distributed with the residue of my estate.";
							}
							
							$data['statement'] = $statement;
							break;
							
				case 'IN':	/*****************************************************
							* BUSINESS DETAILS FOR REAL PROPERTY :
							* 
							* FIELDS CONCERNED :
							* full_legal_name : 'full legal name of business',
							* organization_name : 'organisation name',
							* organization_address : 'organisation address',
							* beneficiary : _si : (single beneficiary), _mu : (multiple beneficiary)
							*
							******************************************************/

							if(array_key_exists('beneficiary', $data) && isset($data['beneficiary']) && 
								array_key_exists('passed_by',$data) && isset($data['passed_by'])) 
							{

								switch ($data['beneficiary']) {
									case '_si': 	if(array_key_exists('beneficiary_legal_name',$data) && 
													isset($data['beneficiary_legal_name'])) {

														if(array_key_exists('beneficiary_legal_relation',$data) && $data['beneficiary_legal_relation'] != 'Other')
														{
															$statement .= strlen(trim($data['beneficiary_legal_relation'])) > 0 
															? " My ".ucwords(strtolower(trim($data['beneficiary_legal_relation']))) . ","
															: "" ; 
														}
														elseif(array_key_exists('beneficiary_legal_relation_other',$data) && 
															strlen($data['beneficiary_legal_relation']) > 0 ) {

															$statement .= strlen(trim($data['beneficiary_legal_relation_other'])) > 0 
															? " My ".ucwords(strtolower(trim($data['beneficiary_legal_relation_other']))) . ","
															: "" ;
														}
														$statement .= " ".ucwords(strtolower($data['beneficiary_legal_name']));
													}
													break;
									
									case '_mu':		if(array_key_exists('multiple_beneficiaries', $data) &&
														isset($data['multiple_beneficiaries'])) {

														$statement .= " the following persons in equal shares:";
														$index = 0;
														
														$substatement = '';
														foreach($data['multiple_beneficiaries'] as $key => $beneficiary)
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
													break;
									
									default:		break;
								}

								//dd($option, $data['free_mortgage']);
								if ($option == 'real property') {
									$statement .= $data['free_mortgage'] == "1"
													? ". Said gift shall be distributed free of any encumbrances and liens"
													: ". Subject to all encumbrances and/or liens of record";
								}
								$statement .= ". If a distributee named in this provision does not survive me, the deceased distributee's share of this gift shall instead be distributed";
								
								/*****************************************************
								* BUSINESS DETAILS FOR REAL PROPERTY :
								* 
								* FIELDS CONCERNED :
								* passed_by : ,
								* organization_name : 'organisation name',
								* organization_address : 'organisation address',
								* beneficiary : _si : (single beneficiary), _mu : (multiple beneficiary)
								*
								******************************************************/

								switch ($data['passed_by']) {
									
									case "_sgb": 	$statement .= " equally among the surviving distributees of this gift.";
													break;

									case "_re" : 	$statement .= " with the residue of my Estate.";
													break;
									
									case "_se" :	$statement .= " to";
													if(strtolower($data['individual_relationship']) != 'other' && 
														array_key_exists('individual_relationship', $data))
													{
														$statement .= " my " . ucwords(strtolower($data['individual_relationship'])). ", ";
														
													}
													elseif(strlen(trim($data['individual_relationship_other'])) > 0 &&
														array_key_exists('individual_relationship_other', $data))
													{
														$statement .= " my " . ucwords(strtolower($data['individual_relationship_other'])).",";
													}
													$statement .= ucwords(strtolower($data['individual_name'])).".";
													break;

									case "_tti":	$statement .= " to his or her then-living issue, ";
									
													if(trim(strtolower($tuay->state)) == "california")
													{
														$statement .= " by right of representation";
													} 
													else 
													{
														$statement .= " per stirpes";
													}

													$statement .= "; however, if said distributee is not survived by issue, the property (or the net sale proceeds of the property) shall be distributed";
													
													if($data['passed_by_child'] == "_re")
													{
														$statement .= " in the manner hereinafter set forth for the distribution of the residue of my Estate.";
													}
													
													elseif($data['passed_by_child'] == "_se")
													{
														$statement .= " to";
														if(strtolower($data['individual_relationship']) != 'other' &&
															array_key_exists('individual_relationship', $data))
														{
															$statement .= " my " . $data['individual_relationship']. ", ";
														}
														elseif(strlen(trim($data['individual_relationship_other'])) > 0 && 
															array_key_exists('individual_relationship_other', $data)) 
														{
															$statement .= " my " . $data['individual_relationship_other'].", ";
														}
														$statement .= ucwords(strtolower($data['individual_name'])).".";
													}
													break;
									
									case "_tth":	$statement .= " to his or her then-living issue, ";
									
													if(trim(strtolower($tuay->state)) == "california")
													{
														$statement .= " by right of representation";
													} 
													else 
													{
														$statement .= " per stirpes";
													}
													
													$statement .= "; however, if said distributee is not survived by issue, the " . $term 
																	. " (or the net sale proceeds of the " . $term . ") shall be distributed";
													
													if($data['passed_by_child'] == "_re")
													{
														$statement .= " in the manner hereinafter set forth for the distribution of the residue of my Estate.";
													} 
													
													elseif($data['passed_by_child'] == "_se")
													{
														$statement .= " to";
														if(strtolower($data['individual_relationship']) != 'other' &&
															array_key_exists('individual_relationship', $data))
														{
															$statement .= " my " . ucwords(strtolower(trim($data['individual_relationship']))) . ", ";
															
														} 
														elseif(strlen(trim($data['individual_relationship_other'])) > 0)
														{
															$statement .= " my " . ucwords(strtolower(trim($data['individual_relationship_other']))) .",";
														}
														$statement .= " ".ucwords(strtolower($data['individual_name'])).".";
													}
													break;

									default 	:	break;
								}
							}
							break;
				
				default: break;
			}

			$data['statement'] = $statement;
			return json_encode($data);
		
		}
	}
?>