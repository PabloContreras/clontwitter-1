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
        /*
            Default access

            Default users for main testing
        */
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
        
        /*
            Testing purposes
        */
        factory(App\User::class, 50)->create();
        factory(App\Tweet::class, 300)->create();
    }
}
