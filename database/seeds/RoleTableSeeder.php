<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles=array(
        	array('name' => 'admin' ),
        	array('name' => 'assistant'),
        	array('name' => 'user')

        );
		DB::table('roles')->insert($roles);
    }
}
