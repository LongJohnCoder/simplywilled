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
    	//StatesInfo::truncate();
        // uniform states array
		$uniformStateArray = array('Alabama', 'Alaska', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'District of Columbia', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Iowa', 'Louisiana', 'Maine', 'Michigan', 'Mississippi', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'North Dakota', 'Ohio', 'Oklahoma', 'Pennsylvania', 'Rhode Island', 'South Carolina', 'Tennessee', 'Texas', 'Utah', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming');

		// non uniform states array
		$nonUniformStateArray = array('Arizona', 'Indiana', 'Kansas', 'Kentucky', 'Massachusetts', 'Missouri', 'North Carolina', 'Oregon', 'South Dakota', 'Vermont');

		$noTypeStateArray = array("Florida","Maryland","Minnesota","New York");

		$states = StatesInformationHelper::getStatesInfo();
		$statesAbbreviation = StatesInformationHelper::getStatesAbbreviation();
		$insertArray = [];
		foreach ($states as $eachState => $stateInfo) {
			$type = "none";
			if (in_array($eachState, $noTypeStateArray)) {
				$type = "none";
			}
			elseif (in_array($eachState, $uniformStateArray)) {
				$type = "uniform";
			}
			else {
				$type = "non-uniform";
			}
			array_push($insertArray,[
				'name'	=>	$eachState,
				'code' 	=> 	$stateInfo['code'],
				'act'	=>	$stateInfo['act'],
				'type'	=>	$type,
				'abr'   =>  $statesAbbreviation[$eachState],
				'executor_title' => $stateInfo['executor']
			]);
		}
		StatesInfo::truncate();
		StatesInfo::insert($insertArray);
    }
}
