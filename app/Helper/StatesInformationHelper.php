<?php
/**
 * Functional Scope=> Helper class for datetime
 */
namespace App\Helper;
use \Carbon\Carbon;

class StatesInformationHelper {
	public static function getStatesInfo() {
		return [
				"Alabama" => [
							"code" => "Chapter 1A, Article 2 of Title 26 of the Alabama Code (§ 26-1A-201, et seq.)",
							"act" => "Alabama Uniform Power of Attorney Act",
							"executor" => "Personal Representative"
							],
				"Alaska" => [
							"code" => "AS 13.26.326 -13.26.359",
							"act" => "Alaska Uniform Recognition of Substitute Decision-Making Documents Act",
							"executor" => "Personal Representative"
							],
				"Arizona" => [
							"code" => "A.R.S. § 14-5501, et seq",
							"act" => "Arizona Uniform Durable Power of Attorney Act",
							"executor" => "Personal Representative"
							],
				"Arkansas" => [
							"code" => "Arkansas Code Title 28, Chapter 68, Subchapter 2 (§ 28-68-201, et seq.)",
							"act" => "Arkansas Uniform Power of Attorney Act",
							"executor" => "Personal Representative"
							],
				"California" => [
							"code" => "California Probate Code §§ 4000 - 4545",
							"act" => "California Uniform Statutory Form Power of Attorney Act ",
							"executor" => "Personal Representative"
							],
				"Colorado" => [
							"code" => "CO Rev. Stat. §§ 15-14-724 through 740",
							"act" => "Colorado Uniform Power of Attorney Act",
							"executor" => "Personal Representative"
							],
				"Connecticut" => [
							"code" => "Conn. Gen. Stat. Ann. §§ 1-350 – 1-353(b)",
							"act" => "Connecticut Statutory Short Form Power of Attorney Act",
							"executor" => "Executor"
							],
				"Delaware" => [
							"code" => "Delaware Code, Title 12, Chapter 49A (§§ 49A-204 to 217)",
							"act" => "Delaware Durable Personal Powers of Attorney Act",
							"executor" => "Personal Representative"
							],
				"District of Columbia" => [
							"code" => "D.C. Code § 21-2101, et seq",
							"act" => "District of Columbia Uniform Power of Attorney Act",
							"executor" => "Personal Representative"
							],
				"Florida" => [
							"code" => "FL Stat § 709.2101, et seq",
							"act" => "Florida Power of Attorney Act",
							"executor" => "Personal Representative"
							],
				"Georgia" => [
							"code" => "O.C.G.A Chapter 6B of Title 10",
							"act" => "Georgia Uniform Power of Attorney Act",
							"executor" => "Personal Representative"
							],
				"Hawaii" => [
							"code" => "Haw. Rev. Stat. §§ 551E-31 to 47",
							"act" => "Hawaii Uniform Power of Attorney Act",
							"executor" => "Personal Representative"
							],
				"Idaho" => [
							"code" => "Idaho Code §§ 15-12-201 to 15-12-217",
							"act" => "Idaho Uniform Power of Attorney Act",
							"executor" => "Personal Representative"
							],
				"Illinois" => [
							"code" => "755 ILCS 45",
							"act" => "Statutory Short Form Power of Attorney for Property Law",
							"executor" => "Executor"
							],
				"Indiana" => [
							"code" => "",
							"act" => "",
							"executor" => "Personal Representative"
							],
				"Iowa" => [
							"code" => "Iowa Code § 633B.201 to § 633B.217",
							"act" => "Iowa Uniform Power of Attorney Act",
							"executor" => "Personal Representative"
							],
				"Kansas" => [
							"code" => "K.S.A. 58-650 to K.S.A. 58-665",
							"act" => "",
							"executor" => "Personal Representative"
							],
				"Kentucky" => [
							"code" => "",
							"act" => "",
							"executor" => "Personal Representative"
							],
				"Louisiana" => [
							"code" => "",
							"act" => "Uniform Statutory Form Power of Attorney Act",
							"executor" => "Executor"
							],
				"Maine" => [
							"code" => "Maine Revised Statutes, Title 18-A § 5-931 to §5-947",
							"act" => "Maine Uniform Power of Attorney Act",
							"executor" => "Personal Representative"
							],
				"Maryland" => [
							"code" => "MD Est & Trusts Code § 17-101, et seq",
							"act" => "Maryland General and Limited Power of Attorney Act",
							"executor" => "Personal Representative"
							],
				"Massachusetts" => [
							"code" => "",
							"act" => "",
							"executor" => "Personal Representative"
							],
				"Michigan" => [
							"code" => "Mich. Comp. Laws § 700.5501, et seq",
							"act" => "Michigan Uniform Power of Attorney Act",
							"executor" => "Personal Representative"
							],
				"Minnesota" => [
							"code" => "Minnesota Statutes, §§ 523.23 and 523.24",
							"act" => "",
							"executor" => "Personal Representative"
							],
				"Mississippi" => [
							"code" => "MS Code §§ 87-3-101, et seq",
							"act" => "Mississippi Uniform Durable Power of Attorney Act",
							"executor" => "Executor"
							],
				"Missouri" => [
							"code" => "MO Rev. Stat. § 404.700 – § 404.735 (Laws may change this year to adopt Statutory Form POA)",
							"act" => "Durable Power of Attorney Law of Missouri",
							"executor" => "Personal Representative"
							],
				"Montana" => [
							"code" => "Title 72, chapter 31, part 3",
							"act" => "Montana Uniform Power of Attorney Act",
							"executor" => "Personal Representative"
							],
				"Nebraska" => [
							"code" => "Neb.  Rev. Stat. §§ 30-4027 to 30-4040",
							"act" => "Nebraska Uniform Power of Attorney Act",
							"executor" => "Personal Representative"
							],
				"Nevada" => [
							"code" => "NV Rev. Stat. §§ 162A.450- 162A.610",
							"act" => "Nevada Uniform Form Power of Attorney Act",
							"executor" => "Executor"
							],
				"New Hampshire" => [
							"code" => "N.H. Rev. Stat. Ann. § 564-E=>101, et seq. (Effective January 1, 2018)",
							"act" => "New Hampshire Uniform Power of Attorney Act",
							"executor" => "Executor"
							],
				"New Jersey" => [
							"code" => "Title 46 of the New Jersey Statutes",
							"act" => "Uniform Statutory Form Power of Attorney Act",
							"executor" => "Personal Representative"
							],
				"New Mexico" => [
							"code" => "N.M. Stat. § 45-5B-101 to § 45-5B-403",
							"act" => "New Mexico Uniform Power of Attorney Act",
							"executor" => "Personal Representative"
							],
				"New York" => [
							"code" => "N.Y. Gen. Oblig. § 5-1501",
							"act" => "Yes; defined in Sec. 5-1502A-N",
							"executor" => "Personal Representative"
							],
				"North Carolina" => [
							"code" => "",
							"act" => "",
							"executor" => "Executor"
							],
				"North Dakota" => [
							"code" => "N.D. Cent. Code § 30.1-30",
							"act" => "North Dakota Uniform Durable Power of Attorney Act",
							"executor" => "Personal Representative"
							],
				"Ohio" => [
							"code" => "Ohio Rev. Code §§ 1337.21-1337.64",
							"act" => "Ohio Uniform Power of Attorney Act",
							"executor" => "Executor"
							],
				"Oklahoma" => [
							"code" => "OK Stat. §§ 15-1001 to 15-1020",
							"act" => "Oklahoma Uniform Statutory Form Power of Attorney Act",
							"executor" => "Personal Representative"
							],
				"Oregon" => [
							"code" => "",
							"act" => "",
							"executor" => "Personal Representative"
							],
				"Pennsylvania" => [
							"code" => "20 Pa.C.S. §§ 5601 – 5612",
							"act" => "Pennsylvania Law of Powers of Attorney",
							"executor" => "Personal Representative"
							],
				"Rhode Island" => [
							"code" => "R.I. Gen. L. § § 18-16-1 to 18-16-12",
							"act" => "Rhode Island Short Form Power of Attorney Act",
							"executor" => "Personal Representative"
							],
				"South Carolina" => [
							"code" => "S.C. Code Ann. Title 62, Article 8, § 62-8-201 through 217",
							"act" => "South Carolina Uniform Power of Attorney Act",
							"executor" => "Personal Representative"
							],
				"South Dakota" => [
							"code" => "S.D. Codified Laws § 59-7-2.1",
							"act" => "South Dakota Codified Laws of Agency",
							"executor" => "Personal Representative"
							],
				"Tennessee" => [
							"code" => "Tenn. Code § 34-6-109",
							"act" => "Tennessee Uniform Durable Power of Attorney Act",
							"executor" => "Personal Representative"
							],
				"Texas" => [
							"code" => "Tex. Probate Code §§ 481 to 506",
							"act" => "Texas Durable Power of Attorney Act",
							"executor" => "Executor"
							],
				"Utah" => [
							"code" => "Utah Code §§ 75-9-101 to 75-9-403",
							"act" => "Utah Uniform Power of Attorney Act",
							"executor" => "Personal Representative"
							],
				"Vermont" => [
							"code" => "14 V.S.A. §§ 3501-3516",
							"act" => "",
							"executor" => "Executor"
							],
				"Virginia" => [
							"code" => "Va. Code §§ 64.2-1622 to 1638",
							"act" => "Virginia Uniform Power of Attorney Act",
							"executor" => "Executor"
							],
				"Washington" => [
							"code" => "Wash. Rev. Code § 11.125.010 to § 11.125.903",
							"act" => "Washington Uniform Power of Attorney Act",
							"executor" => "Personal Representative"
							],
				"West Virginia" => [
							"code" => "W.Va. Code §§ 39B-2-101 to 117",
							"act" => "West Virginia Uniform Power of Attorney Act",
							"executor" => "Executor"
							],
				"Wisconsin" => [
							"code" => "Wis. Stat. Ann. § 244.41 to § 244.57",
							"act" => "Wisconsin Uniform Power of Attorney for Finances and Property Act",
							"executor" => "Personal Representative"
							],
				"Wyoming" => [
							"code" => "W.S. § 3-9-201 to § 3-9-217",
							"act" => "Wyoming Uniform Power of Attorney Act",
							"executor" => "Personal Representative"
							],
				];
	}

	public static function getStatesAbbreviation() {
		return
			[ 
				"Alaska" => "AK", 
				"Alabama" => "AL", 
				"Arkansas" => "AR", 
				"American Samoa" => "AS", 
				"Arizona" => "AZ", 
				"California" => "CA", 
				"Colorado" => "CO", 
				"Connecticut" => "CT", 
				"District of Columbia" => "DC", 
				"Delaware" => "DE", 
				"Florida" => "FL", 
				"Georgia" => "GA", 
				"Guam" => "GU", 
				"Hawaii" => "HI", 
				"Iowa" => "IA", 
				"Idaho" => "ID", 
				"Illinois" => "IL", 
				"Indiana" => "IN", 
				"Kansas" => "KS", 
				"Kentucky" => "KY", 
				"Louisiana" => "LA", 
				"Massachusetts" => "MA", 
				"Maryland" => "MD", 
				"Maine" => "ME", 
				"Michigan" => "MI", 
				"Minnesota" => "MN", 
				"Missouri" => "MO", 
				"Mississippi" => "MS", 
				"Montana" => "MT", 
				"North Carolina" => "NC", 
				"North Dakota" => "ND", 
				"Nebraska" => "NE", 
				"New Hampshire" => "NH", 
				"New Jersey" => "NJ", 
				"New Mexico" => "NM", 
				"Nevada" => "NV", 
				"New York" => "NY", 
				"Ohio" => "OH", 
				"Oklahoma" => "OK", 
				"Oregon" => "OR", 
				"Pennsylvania" => "PA", 
				"Puerto Rico" => "PR", 
				"Rhode Island" => "RI", 
				"South Carolina" => "SC", 
				"South Dakota" => "SD", 
				"Tennessee" => "TN", 
				"Texas" => "TX", 
				"Utah" => "UT", 
				"Virginia" => "VA", 
				"Virgin Islands" => "VI", 
				"Vermont" => "VT", 
				"Washington" => "WA", 
				"Wisconsin" => "WI", 
				"West Virginia" => "WV", 
				"Wyoming" => "WY"
			];
	}
}
?>