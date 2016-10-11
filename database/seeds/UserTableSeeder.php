<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $limit =3;
       

        // for ($i=0; $i < $limit ; $i++) 
        // { $role = Role::all()->random(1);
        //    $user= User::create([
        //         'name' => $faker->unique()->name(),
        //         'email' => $faker->safeEmail(),
        //         'password'=> Hash::make($faker->password()),
           
        //     ]);
        //    var_dump($role->id);
        	$user = User::find(1);
            $user->roles()->attach(1);
            $user->save();
     //}
    }
}
