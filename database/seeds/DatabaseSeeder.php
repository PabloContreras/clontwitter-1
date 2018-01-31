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
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
        	'name' => 'Pablo', 
        	'nickname' => 'principe_dote', 
        	'email' => 'pablo_contreras_1997@outlook.com', 
        	'password' => bcrypt('Lapatita9'),
    	]);
    	DB::table('users')->insert([
        	'name' => 'Humberto', 
        	'nickname' => 'humberto.gay', 
        	'email' => 'humberto_es_gay@hotmail.com', 
        	'password' => bcrypt('Lapatita9'),
    	]);
    }
}
