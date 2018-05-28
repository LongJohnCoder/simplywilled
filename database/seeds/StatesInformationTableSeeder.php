<?php

use Illuminate\Database\Seeder;
use App\Helper\StatesInformationHelper;
use App\StatesInfo;

class StatesInformationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	StatesInfo::truncate();
        // uniform states array
		$uniformStateArray = array('Alabama', 'Alaska', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'District Of Columbia', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Iowa', 'Louisiana', 'Maine', 'Michigan', 'Mississippi', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'North Dakota', 'Ohio', 'Oklahoma', 'Pennsylvania', 'Rhode Island', 'South Carolina', 'Tennessee', 'Texas', 'Utah', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming','Florida','Minnesota','Maryland','New York');
		
		// non uniform states array
		$nonUniformStateArray = array('Arizona', 'Indiana', 'Kansas', 'Kentucky', 'Massachusetts', 'Missouri', 'North Carolina', 'Oregon', 'South Dakota', 'Vermont');

		$states = StatesInformationHelper::getStatesInfo();
		$insertArray = [];
		foreach ($states as $eachState => $stateInfo) {
			array_push($insertArray,[
				'name'	=>	$eachState,
				'code' 	=> 	$stateInfo['code'],
				'act'	=>	$stateInfo['act'],
				'type'	=>	in_array($eachState, $nonUniformStateArray) ? 'non-uniform' : 'uniform'
			]);
		}
		StatesInfo::insert($insertArray);
    }
}