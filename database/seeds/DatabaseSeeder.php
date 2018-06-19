<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(MakeDefaultCategory::class);  
        $this->call(FaqTableSeeder::class);
        $this->call(StatesInformationTableSeeder::class);
    }
}
