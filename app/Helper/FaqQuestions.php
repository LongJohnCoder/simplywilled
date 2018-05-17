<?php
/**
 * Functional Scope: Helper class for datetime
 */
namespace App\Helper;
use \Carbon\Carbon;

class FaqQuestions {

	/**
	* return general category questions for faq
	*/
	public static function getGeneralQuestions(){
		return [
		    [
		    	'question' 	=> 	'Can I save my information so I can finish or edit/update my documents later?',
		    	'answer'	=>	'Yes. All of your information is automatically saved after you complete each section when you click “Next”. If you need to edit or update your documents, login with your email address and password to continue entering your information when you are ready. As long as your account is active, you can update or edit your documents at any time and at no additional cost.',
		    	'status'	=>	'1',
		    	'created_at'	=> 	Carbon::now(),
		    	'updated_at'	=>	Carbon::now()
		    ],
		    [
		    	'question' 	=> 	'Can I upgrade to a different estate-planning package?',
		    	'answer'	=>	'You can upgrade to different plan at any time and will be instantly credited the value of your existing plan.',
		    	'status'	=>	'1',
		    	'created_at'	=> 	Carbon::now(),
		    	'updated_at'	=>	Carbon::now()
		    ],
		    [
		    	
		    	'question' 	=> 	'I have a significant other, but am not married. Should I still purchase the Married Plan?',
		    	'answer'	=>	'Yes, in the interview process, select domestic partners and the system will draft your documents for a domestic
		    						partnership, same-sex couple or couple living together but not married.',
		    	'status'	=>	'1',
		    	'created_at'	=> 	Carbon::now(),
		    	'updated_at'	=>	Carbon::now()
		    ],
		    [
		    	'question' 	=> 	'How do I create an account?',
		    	'answer'	=>	'To create an account, go to SimplyWilled.com and click "Get Started". Enter your email address and choose a password 
		    						to create your account and begin drafting your custom documents.',
		    	'status'	=>	'1',
		    	'created_at'	=> 	Carbon::now(),
		    	'updated_at'	=>	Carbon::now()
		    ],
		    [
		    	'question' 	=> 	'How do I log in to my existing account?',
		    	'answer'	=>	'To login to an existing account, go to SimplyWilled.com and click on Login at the top of the homepage. Enter the email and password used to create your account and click "Log In" to access your account.',
		    	'status'	=>	'1',
		    	'created_at'	=> 	Carbon::now(),
		    	'updated_at'	=>	Carbon::now()
		    ],
		    [
		    	'question' 	=> 	'How do I change the email on my account?',
		    	'answer'	=>	'To change the email associated with your SimplyWilled account, login into your account and you can change the email address associated with your account in the customer profile section.',
		    	'status'	=>	'1',
		    	'created_at'	=> 	Carbon::now(),
		    	'updated_at'	=>	Carbon::now()
		    ],
		    [
		    	'question' 	=> 	'How do I view my estate plan documents?',
		    	'answer'	=>	'To access and print your estate planning documents, log in to your account using the email and password you used when you created your account. Once you are logged in at your Dashboard, scroll down and click the green "Print and Sign Your Documents" button. This will take you to a page that lists your estate planning documents, from this page you can select which documents you would like to view or print by clicking on them.

					If you are using a desktop computer, you will be able to view your document and use one of the buttons above the document to print, download, or email the document to yourself. If you are on a tablet or smartphone, your document will open in another window. The cover page of each document will include signing instructions specific to your state.',
		    	'status'	=>	'1',
		    	'created_at'	=> 	Carbon::now(),
		    	'updated_at'	=>	Carbon::now()
		    ],
		    [
		    	
		    	'question' 	=> 	'How do I print my estate plan documents?',
		    	'answer'	=>	"To review and print your documents, login to your SimplyWilled account at SimplyWilled.com using the email and password you used when you created your account. Once you are logged in at your Dashboard, scroll down and click the green 'Print and Sign Your Documents' button. This will take you to a page that lists your estate planning documents, which you can access by clicking on the document's respective 'View' button.

					If you are using a desktop computer, you will be able to view your document and use one of the buttons above the document to print, download, or email the document to yourself. If you are on a tablet or smartphone, your document will open in another window. The cover page of each document will include signing instructions specific to your state.",
		    	'status'	=>	'1',
		    	'created_at'	=> 	Carbon::now(),
		    	'updated_at'	=>	Carbon::now()
		    ],
		    [
		    	'question' 	=> 	"How do I view my spouse's documents?",
		    	'answer'	=>	"You can view your spouse's documents by logging into your SimplyWilled account at SimplyWilled.com using the email and password you used when you created your account. Once you are logged in, click on your spouse's name on the left side of the page to reach his or her Dashboard. Scroll down and click the green 'Print and Sign Your Documents' button. This will take you to a page that lists your spouse's estate planning documents, which you can access by clicking on the document's respective 'View' button.

					If you are using a desktop computer, you will be able to view their estate planning document and use one of the buttons above the document to print, download, or email the document to yourself. If you are on a tablet or smartphone, the document will open in another window. The cover page of each document will include signing instructions specific to your state.",
		    	'status'	=>	'1',
		    	'created_at'	=> 	Carbon::now(),
		    	'updated_at'	=>	Carbon::now()
		    ],
		    [
		    	'question' 	=> 	"How can I edit different sections of my documents?",
		    	'answer'	=>	"You can edit your family's information such as your name, your spouse's name, your children, and your home by logging into your account on SimplyWilled.com and once on the Dashboard page, click 'Edit Personal Details' at the top of the page. Once updated, click 'Next' until you reach the Dashboard to save your choices.

					You can also edit other sections of your estate plan by clicking on the Get Started or Make Changes links corresponding to the various sections of your Dashboard (e.g., Leave property to your loved ones, Choose your final arrangements, etc.)",
		    	'status'	=>	'1',
		    	'created_at'	=> 	Carbon::now(),
		    	'updated_at'	=>	Carbon::now()
		    ],
		    [
		    	'question' 	=> 	"How do I create estate plan documents for someone else?",
		    	'answer'	=>	"Its Simple. To create documents for someone other than you or your spouse, you need to create a separate account for that person using a different email address from the one used to create your account with us. Once the new account is created, answer SimplyWilled’s interview questions as if you were that person. The rest is simple.",
		    	'status'	=>	'1',
		    	'created_at'	=> 	Carbon::now(),
		    	'updated_at'	=>	Carbon::now()
		    ],
		    [
		    	'question' 	=> 	"Is my data safe on your website?",
		    	'answer'	=>	"We do our best to keep your data is safe. We use triple layer, bank-level security on our site and we never share your personal information with third parties without your permission.",
		    	'status'	=>	'1',
		    	'created_at'	=> 	Carbon::now(),
		    	'updated_at'	=>	Carbon::now()
		    ],
		    [
		    	'question' 	=> 	"Is online estate planning safe?",
		    	'answer'	=>	"Each year hundreds of thousands of Americans across all 50 states prepare their estate plans using online estate planning platforms. Here at SimplyWilled.com we are committed to making online estate planning safe, affordable and easy for everyone.",
		    	'status'	=>	'1',
		    	'created_at'	=> 	Carbon::now(),
		    	'updated_at'	=>	Carbon::now()
		    ],
		    [
		    	'question' 	=> 	"How do I cancel/delete my SimplyWilled account?",
		    	'answer'	=>	"f you wish to cancel or delete your account, email Info@SimplyWilled.com with the information below.
								Your full legal name
								The email you used to sign up for Willing
								Brief explanation of why we did not meet your expectations (optional)",
		    	'status'	=>	'1',
		    	'created_at'	=> 	Carbon::now(),
		    	'updated_at'	=>	Carbon::now()
		    ],
		    [
		    	'question' 	=> 	"Are SimplyWilled.com estate planning documents legally valid?",
		    	'answer'	=>	"Yes, SimplyWilled.com estate planning documents are legally valid in all 50 states. Our proprietary estate planning software drafts custom estate planning documents in accordance with the laws of your state of residence.",
		    	'status'	=>	'1',
		    	'created_at'	=> 	Carbon::now(),
		    	'updated_at'	=>	Carbon::now()
		    ],
		    [
		    	'question' 	=> 	"Can I use SimplyWilled if I am outside of the U.S.?",
		    	'answer'	=>	"Yes, our service was specifically designed with American citizens living overseas in mind. Members of the United States Armed Services often use our service when deploying. For more information regarding using SimplyWilled.com from outside the United States please email Info@SimplyWilled.com.",
		    	'status'	=>	'1',
		    	'created_at'	=> 	Carbon::now(),
		    	'updated_at'	=>	Carbon::now()
		    ],
		    [
		    	'question' 	=> 	"Can my estate planning documents be mailed to me?",
		    	'answer'	=>	"While we do not mail the documents to you, all your documents are immediately available for viewing, downloading, emailing, and printing. If you do not have a printer at home, you can access your account from any computer with internet access so you can print your offices at work, a loved one's home, or even the public library.",
		    	'status'	=>	'1',
		    	'created_at'	=> 	Carbon::now(),
		    	'updated_at'	=>	Carbon::now()
		    ],
		    [
		    	'question' 	=> 	"Can I obtain blank forms to fill in offline?",
		    	'answer'	=>	"Unfortunately, SimplyWilled does not provide blank estate planning forms or templates to be completed by hand. SimplyWilled’s proprietary software asks simple questions about you, your family, and your wishes to instantly create your custom estate planning documents, which can be reviewed, downloaded, and printed at any time.",
		    	'status'	=>	'1',
		    	'created_at'	=> 	Carbon::now(),
		    	'updated_at'	=>	Carbon::now()
		    ],
		    [
		    	'question' 	=> 	"Will my estate plan documents or account expire?",
		    	'answer'	=>	"No, there is no expiration on your account or estate plan documents. Once you have signed your estate plan documents according to the instructions included on the cover page, your estate plan documents are legally valid until you choose to revoke them.",
		    	'status'	=>	'1',
		    	'created_at'	=> 	Carbon::now(),
		    	'updated_at'	=>	Carbon::now()
		    ],
		];
	}

	/**
	* return pricing category questions for faq
	*/
    public static function getPricingQuestions() {
    	return [
    		[
    			'question' 	=> 	"What are the prices of your paid plans and what do they include?",
	        	'answer'	=>	"See pricing page",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
    		[
    			'question' 	=> 	"Are there any hidden or recurring charges?",
	        	'answer'	=>	"No, there are no hidden fees, recurring charges, or subscriptions. The purchase price of our plans is a one-time fee.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
    		[
    			'question' 	=> 	"How can I get a refund?",
	        	'answer'	=>	"If you are not satisfied and would like a refund, please email info@SimplyWilled.com with the following information.
								Your full legal name
								The email you used to sign up for SimplyWilled.com
								Brief explanation of why we did not meet your expectations (optional)",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
    		[
    			'question' 	=> 	"Can I choose a plan now and upgrade later?",
	        	'answer'	=>	"Yes, you can choose one plan now, and then upgrade to a different plan when you are ready. When upgrading, you 
	        						only pay the difference in price between your current plan and the plan to which you are upgrading.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
    		[
    			'question' 	=> 	"Can I use SimplyWilled to make a will for my mom or dad?",
	        	'answer'	=>	"Yes, you can use SimplyWilled.com to prepare a last will and testament for an elderly parent, a child or a loved one.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		]
    	];
    }

	/**
	* return final arrangements category questions for faq
	*/
	public static function getFinalArrangementQuestions() {
		return [
    		[
    			'question' 	=> 	"Where do I state my wishes for final arrangements?",
	        	'answer'	=>	"Your wishes regarding final arrangements are contained in the burial instruction document, which specifies what you would like to happen to your remains. You can specify whether your would like to be buried or cremated, what you would like to happen to your ashes and set out other instructions regarding your final arrangements.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
    		[
    			'question' 	=> 	"Can I enter custom wishes for my final arrangements?",
	        	'answer'	=>	"Yes, SimplyWilled’s system is specifically designed to allow you to customize your final arrangements",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		]
    	];
	}

	/**
	* return medical emergency questions for faq
	*/
	public static function getMedicalEmergencyQuestions() {
		return [
    		[
    			'question' 	=> 	"What is a living will?",
	        	'answer'	=>	"A living will is written legal document that indicates your desire to withhold or withdraw certain medical care based on your health circumstances.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
    		[
    			'question' 	=> 	"How is a living will made?",
	        	'answer'	=>	"Anyone who is competent and 18 years of age or older can make a living will by creating a living will using simplywilled.com. Once our system has created your living will, you must sign and date the document, before two witnesses. The witnesses must be at least 18 years of age and, in order to avoid legal issues, should not be related to the person signing the declaration, a beneficiary of his or her estate, or financially responsible for his or her medical care. Consider that while it is important to prepare a living will before any hospitalization or impending surgery, you should avoid deciding in a short period of time.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
    		[
    			'question' 	=> 	"How is a living will different from a last will and testament?",
	        	'answer'	=>	"A living will is an advanced directive document that sets out an individual’s instructions regarding medical treatment that take effect during you’re their life time if they become incapacitated or otherwise unable to make medical decisions for themself. In your living will, you can make certain healthcare decisions in advance, and/or select a healthcare agent who can make these decisions for you.

					In contrast, a last will and testament is a testamentary document, meaning it takes effect once you have passed and is used to express your final wishes regarding your estate. In your last will and testament, you can name your beneficiaries, direct the disposition of your estate assets as well as, nominate a guardian(s) for your minor children, and set out your final arrangements and appoint a personal representative to carry out your wishes.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
    		[
    			'question' 	=> 	"Can I customize my living will to include specific instruction?",
	        	'answer'	=>	"Yes, our system will allow you to provide custom instructions in your living will and in your healthcare power of attorney.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
    		[
    			'question' 	=> 	"Who make medical decisions if I don’t have a living will or healthcare power of attorney?",
	        	'answer'	=>	"If you haven’t appointed a healthcare agent, don’t have a healthcare power of attorney or don't have a living will, your healthcare decisions will be dictated the applicable laws of your state of residence. If no health care agent is nominated, the court system might decide who gets to make your healthcare decisions.  This can result in a stranger making healthcare decisions for you if you are incapacitated.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
    		[
    			'question' 	=> 	"What is a healthcare power of attorney?",
	        	'answer'	=>	"Generally, a Health Care Power of Attorney permits another person (an agent) to make healthcare decisions on behalf of the individual granting the instrument (the principal) when the principal becomes incapacitated and is no longer able to make important decisions regarding his or her healthcare.

					The Health Care Power of Attorney gives the agent the power to make healthcare decisions for the principal to the degree set forth in the instrument. The decisions made by the agent are binding on the principal’s healthcare providers, as if the principal was making the decision himself or herself.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
    		[
    			'question' 	=> 	"Who should I choose to be my agent under a Health Care Power of Attorney?",
	        	'answer'	=>	"Individuals executing a Health Care Power of Attorney usually choose a close family member to act as their agent. 
	        					However, any qualified person chosen by a principal can serve as the individual’s agent. Some clients feel more comfortable choosing a close friend as their guardian, and the law allows clients to make this decision. Individuals can also nominate alternate agents to serve under the instrument, in case the first agent is unwilling or unable to act.

								An agent must act in the individual’s best interest when making decisions. It is extremely important that the individual nominates someone that they can trust and depend on to make difficult decisions.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
    		[
    			'question' 	=> 	"How long is a Healthcare Power of Attorney valid?",
	        	'answer'	=>	"Generally, a Health Care Power of Attorney lasts until it is revoked. The principal only loses the ability to revoke or amend the instrument when they become incapacitated. The agent’s authority to act on your behalf terminates when you die.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
    		[
    			'question' 	=> 	"What happens if I become incapacitated before a Health Care Power of Attorney is created?",
	        	'answer'	=>	"When the incapacitated individual has not nominated an agent through a durable power of attorney, most states appoint an individual (called a guardian) to make healthcare decisions during the period of incapacity. The incapacitated individual no longer has any control over who is appointed. Most states have provisions that detail the order in which individuals must be considered by the courts.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
    		[
    			'question' 	=> 	"Is a Health Care Power of Attorney revocable? Can it be changed?",
	        	'answer'	=>	"Yes, a Health Care Power of Attorney is both revocable and amendable. The principal only loses the ability to revoke or amend the instrument when they become incapacitated.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
    		[
    			'question' 	=> 	"If I have a Durable Power of Attorney, do I still need a Living Will?",
	        	'answer'	=>	"A durable power of attorney does not eliminate the need for a living will or other advance directive. These 
	        					instruments will provide your agent with guidance on the types of decisions you want them to make. It is possible to combine a power of attorney, living will, and other advance directives in one document to ensure that your wishes are clear and properly carried out.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
    		[
    			'question' 	=> 	"How do I Revoking a living will?",
	        	'answer'	=>	"A living will or advance directive may be easily revoked or cancelled. Either an oral or written statement may revoke your wishes. It is best to gather and destroy all copies to prevent any confusion. Many state statutes require that a note of revocation of a living will be placed in the medical records.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		]
    	];
	}

	/**
	* return protect your family questions for faq
	*/
	public static function getProtectYourFamilyQuestions() {
		return [
			[
    			'question' 	=> 	"Where do I appoint guardians for our minor children?",
	        	'answer'	=>	"Your wishes regarding who should be the guardian of your minor children are contained in a stand-alone document called a Nomination of Guardian For Minor Children.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
    		[
    			'question' 	=> 	"How do I choose more than one guardian for my minor children?",
	        	'answer'	=>	"You can name a guardian for your minor children through our software as well as an alternate guardian in case the first is unable to serve. This guardian would be both legally and financially responsible for your minor children upon your passing. To accomplish this, log in to your account and once on the Dashboard, click 'Get Started' or 'Make Changes' corresponding to the section titled 'Choosing Guardians for you minor children.' You can then enter the names of the guardians you wish to choose and click 'Next' to save your information.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
    		[
    			'question' 	=> 	"Where are my guardianship wishes expressed?",
	        	'answer'	=>	"The selection of a guardian for your minor children is contained in a standalone document called the Nomination of Guardians for Minor Children.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
    		[
    			'question' 	=> 	"How do I select more than one guardian for my minor children?",
	        	'answer'	=>	"Using Simplywilled.com you can appoint a guardian for your minor children through our software as well as nominate a backup guardian in case the first is unable to serve. The individual that you select as guardian will be both legally and financially responsible for your minor children in the event of your death.

					To nominate a guardian for minor children, log in to your Simplywilled.com account and go to your Dashboard, click 'Get Started' or 'Make Changes' corresponding to the section titled 'Protect Your Family' You can then enter the names of the guardians you wish to choose and click 'Next' to save your information.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
		];
	}

	/**
	* return provide your loved ones questions for faq
	*/
	public static function getProvideYourLovedOnesQuestions() {
		return [
			[
    			'question' 	=> 	"Can I include my stepchildren in my estate plan?",
	        	'answer'	=>	"For purposes of your estate plan documents 'my children' refers only to your biological children. As a default stepchildren will be excluded from your estate. In order to provide for your stepchildren in your documents, you must not select the option to add additional beneficiaries, and then enter the names of your stepchildren into the interview.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
    		
    		[
    			'question' 	=> 	"I am in the process of getting divorced, my spouse and I are legally separated, how do I keep them from receiving any of my property?",
	        	'answer'	=>	"Laws regarding divorce differ from state to state. If you are presently legally married, even if you and your spouse are now separated, specific state laws may make disinheriting a current spouse difficult. If you wish to disinherit your spouse, it may be a good idea to get the counsel of a family law attorney licensed to practice in your state of residence.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
    		
    		[
    			'question' 	=> 	"I have property outside of the United States. Will SimplyWilled’s documents provide for its distribution?",
	        	'answer'	=>	"Yes you can provide for how property located outside of the United States will pass. It is important to note that different countries have different inheritance and property laws and your United States estate plan may be superseded by these local laws. If you own property outside the United States is recommended that you rely on the advise of an attorney familiar with the laws of the applicable country regarding disposition of your estate.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],

    		[
    			'question' 	=> 	"What is the difference between my personal representative and my trustee?",
	        	'answer'	=>	"Whether your estate plan simply includes a will or a living trust as well, it is critically important to select someone to be responsible for the disposition of your estate. An executor or personal representative, depending on the jurisdiction, is responsible for disposition of assets under a will. A trustee is responsible for disposition of assets according to the terms of your trust. An individual such as a relative, a close friend or a professional advisor such as an attorney or accountant can serve in these capacities.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
    		[
    			'question' 	=> 	"What does the executor or personal representative do?",
	        	'answer'	=>	"The answer is, he or she serves after your death and has several major responsibilities, including:
								1) administering your estate and distributing the assets to your beneficiaries,
								2) making certain tax decisions,
								3) paying any estate debts or expenses,
								4) ensuring all life insurance and retirement plan benefits are received, and
								5) filing the necessary tax returns and paying the appropriate federal and state taxes.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
    		[
    			'question' 	=> 	"What considerations should I make in selecting a personal representative?",
	        	'answer'	=>	"Whatever your choice, make sure that the executor; personal representative or trustee is willing to serve.

								In addition, it is good practice to have primary and secondary choices in the event that someone is either unable or unwilling to serve. Further, it is also good practice to consider paying a reasonable fee for these services. 

								The task of serving as personal representative, executor or trustee isn’t easy and not everyone will want to accept the responsibility. 

								Finally, make sure the executor, personal representative or trustee you select does not have a conflict of interest with your estate. For example, selecting a second spouse, children from a prior marriage or an individual who owns part of your business may result in an unintended conflict of interest between the selected party and your beneficiaries. The personal desires and objectives of a stepparent and stepchildren may conflict and result in an unintended feud, and a co-owner’s personal goal regarding your business may differ from those of your family and beneficiaries.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
    		[
    			'question' 	=> 	"How do I include my financial accounts (bank accounts, savings, life insurance, retirement, stocks, etc.) in my will?",
	        	'answer'	=>	"Financial accounts — including retirement, investment, life insurance, checking, savings, and so on — usually do not pass according to one's will. Instead, these assets pass to beneficiaries named directly in your contract with the financial institution. For each account, contact the institution to determine if there are any beneficiaries already designated. If not, you can add them using the institution's form. This way, the account will pass quickly outside of probate court.

					However, if you wish for a financial account to pass according to your will, you must ensure that there are no beneficiaries named with institution, and then your will controls. To leave an account as a specific gift, separate from the rest of your property, log in to your account using the same email and password used to create your account. Once you are on the Dashboard that reads 'Lets get your affairs in order', you should click on the 'Get Started' or 'Make Changes' link corresponding to the section titled 'Leave property to your loved ones.' Click 'Next' until you are asked how you would like to leave the rest of your property. It is here that you can select to leave specific gifts by creating a custom plan. Once you select this option, you will be able to add gifts such as your financial accounts.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
    		[
    			'question' 	=> 	"Do I need witnesses and/or notarization for my documents?",
	        	'answer'	=>	"Each state has its own set of laws regarding the signing, witnessing, and notarization of a will to make it 
	        						legally valid.
								To make signing your estate plan documents simple, we provide you with a set of state-specific directions for executing you estate plan on the cover page of your estate plan documents. The instructions outline how to sign the documents to make them legally valid. Once you have followed the instructions, your estate plan documents will be legally valid and simply need to be stored in a safe place.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
		];
	}

	/**
	* return wills-and-trust questions for faq
	*/
	public static function getWillsAndTrustQuestions() {
		return [
			[
    			'question' 	=> 	"What is the difference between a 'Last Will and Testament' and a 'Living Revocable Trust'?",
	        	'answer'	=>	"The main difference between a last will and testament and a revocable living trust is that a last will and testament 
	        				becomes effective only after you pass. In contrast, a revocable living trust becomes effective as soon as you sign the trust agreement.

							In addition, a last will and testament is a document that provides instruction on who will receive your property when you pass and it appoints a legal representative known as a personal representative to carry out your wishes.

							By contrast, a revocable living trust can provide for the distribution of property before you pass, at your death or even many years after you have passed. A revocable living trust is a legal arrangement through which one person (or an institution, such as a bank or law firm), called a 'trustee,' holds legal title to property for another person, called a 'beneficiary.' A revocable living trust usually has two types of beneficiaries -- one set that receives income from the trust during their lives and another set that receives whatever is left over after the first set of beneficiaries dies.

							A last will and testament governs any assets that is exclusively in your name when you die. It does not govern assets held in joint tenancy or in a revocable trust. It is important to remember that a trust, on the only governs assets that have been transferred to the trust. In order for assets to be included in a revocable trust, those assets must be put in the name of the revocable trust.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
    		[
    			'question' 	=> 	"Do I need an attorney to make a will?",
	        	'answer'	=>	"No. With SimplyWilled.com you don’t need an attorney to create a legally valid will. We make it simple for you to create your will and other estate planning documents in just a few clicks.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
    		
    		[
    			'question' 	=> 	"Can I create a joint will with my spouse using SimplyWilled.com?",
	        	'answer'	=>	"Here at SimplyWilled.com we believe everyone should have their own estate planning documents. We do not provide for the creation of a joint will for married couples on our service. However, married couples can make their individual estate planning documents including a last will and testament for each spouse using the same SimplyWilled.com account.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],

    		[
    			'question' 	=> 	"I have a last will and testament I had prepared somewhere else, can I use SimplyWilled.com to update or replace it?",
	        	'answer'	=>	"Updating or editing an existing last will and testament by way of a codicil can be a tricky process, which often requires hiring an attorney. At SimplyWilled.com we like to keep things simple where possible. Replacing an existing will is Simple —use our service to create a new last will and testament and avoid the hassle of editing. Be sure to execute the new will in accordance with the instructions on its cover page. You should also make sure to destroy your old will to avoid any confusion.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
    		[
    			'question' 	=> 	"I own real estate in several different states. Where should I prepare my last will testament?",
	        	'answer'	=>	"Your last will and testament, and other estate planning documents should be drafted based on your state of primary residence. Your state of primary residence is the state where you live the majority of time, where you have a driver’s license from and where you vote.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
    		[
    			'question' 	=> 	"Why do I need an estate plan?",
	        	'answer'	=>	"Having an estate plan allows you to provide for your family and loved ones. A comprehensive estate plan which includes a last will and testament, a revocable living trust, healthcare power of attorney, durable general power of attorney and living will,  can ensure that your property goes to the right beneficiaries, make sure that individuals have been appointed to carry out your wishes as well as provide direction on what to do in the event of your incapacity.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
    		[
    			'question' 	=> 	"What happens if I don’t have an estate plan?",
	        	'answer'	=>	"Your estate may be governed by the laws of the state where you reside. This can result in the probate court deciding how your estate gets distributed and can sometime result in lengthy and expensive court cases to settle your estate.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
    		[
    			'question' 	=> 	"What happens if I pass without a valid last will and testament?",
	        	'answer'	=>	"If you die without a will, the distribution of your estate will be subject of the probate court and will be governed by the law of intestacy in your local jurisdiction. This can result in a distribution of your estate assets under the laws of intestacy, which may be counter to your wishes.",
	        	'status'	=>	'1',
	        	'created_at'	=> 	Carbon::now(),
	        	'updated_at'	=>	Carbon::now()
    		],
		];
	}
}
?>