<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Admin','email' => 'admin@domain.com','password' => bcrypt('123456') ,'status' => 1, 'parent_id' => 0]
        ]);
        $user = DB::table('users')->where('email', 'admin@domain.com')->first();
        $roles = DB::table('roles')->where('name','Admin')->first();

        DB::table('role_user')->insert([
            ['role_id' => $roles->id,'user_id' => $user->id ]
        ]);
    }
}
