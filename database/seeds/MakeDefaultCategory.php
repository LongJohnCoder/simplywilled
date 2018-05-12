<?php

use Illuminate\Database\Seeder;
use \Carbon\Carbon;
use App\Categories;
use App\FaqCategories;


class MakeDefaultCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$data = [
			'name' => 'Uncategorized',
			'slug' => 'uncategorized',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
			'deleted_at' => null
		];

		Categories::updateOrCreate(
			['id' => '1'],
			$data
		);

		FaqCategories::updateOrCreate(
			['id' => '1'],
			$data
		);
    }
}
