<?php

use Illuminate\Database\Seeder;

use App\FaqCategories;
use App\Faqs;
use App\FaqCategoryMapping;
use \Carbon\Carbon;
use App\Helper\FaqQuestions;

class FaqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	//first truncate all 3 tables   	
    	\DB::table('faqCategoryMapping')->delete();
    	\DB::table('faqCategories')->delete();
    	\DB::table('faqs')->delete();   	
    	
    	//Insert all default categories in faq categories
    	FaqCategories::insert([[
            'id' => 1,
            'name' => 'Uncategorized',
            'slug' => 'uncategorized',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'deleted_at' => null
        ],[
            'id' => 2,
            'name' => 'General',
            'slug' => 'general',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'deleted_at' => null
        ],[
            'id' => 3,
            'name' => 'Pricing',
            'slug' => 'pricing',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'deleted_at' => null
        ],[
            'id' => 4,
            'name' => 'Wills & Trusts',
            'slug' => 'wills-trusts',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'deleted_at' => null
        ],[
            'id' => 5,
            'name' => 'Protect Your Family',
            'slug' => 'protect-your-family',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'deleted_at' => null
        ],[
            'id' => 6,
            'name' => 'Provide For Your Loved Ones',
            'slug' => 'provide-for-your-loved-ones',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'deleted_at' => null
        ],[
            'id' => 7,
            'name' => 'Make Final Arrangements',
            'slug' => 'make-final-arrangements',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'deleted_at' => null
        ],[
            'id' => 8,
            'name' => 'Plan For A Medical Emergency',
            'slug' => 'plan-for-a-medical-emergency',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'deleted_at' => null
        ]]);


    	$map = [
			'general' 						=> 	FaqQuestions::getGeneralQuestions(),
			'pricing'						=>	FaqQuestions::getPricingQuestions(),
			'wills-trusts'					=> 	FaqQuestions::getWillsAndTrustQuestions(),
			'protect-your-family'			=> 	FaqQuestions::getProtectYourFamilyQuestions(),
			'provide-for-your-loved-ones'	=> 	FaqQuestions::getProvideYourLovedOnesQuestions(),
			'make-final-arrangements'		=> 	FaqQuestions::getFinalArrangementQuestions(),
			'plan-for-a-medical-emergency'	=> 	FaqQuestions::getMedicalEmergencyQuestions(),
		];

    	foreach ( $map as $key => $questions) {
	    	$faqCategory 	= FaqCategories::where('slug',$key)->first();
	    	if($faqCategory) {
	    		$faqCategoryId = $faqCategory->id;
	    		foreach($questions as $key =>$eachQuestion) {
		    		$lastFaqId = Faqs::insertGetId($eachQuestion);
		    		FaqCategoryMapping::insert([
		    			'faq_id' => $lastFaqId,
		    			'faq_category_id'	=> 2,
		    			'created_at'	=> Carbon::now(),
		    			'updated_at'	=> Carbon::now()
		    		]);
		    	}
	    	}
    	}

    }
}
