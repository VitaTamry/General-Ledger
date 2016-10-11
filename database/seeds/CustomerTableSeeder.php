<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Customer;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        	//DB::table('customers')->delete();
    	 $faker = Faker::create();
        $limit =40;
        for ($i=0; $i < $limit ; $i++) 
        {
            Customer::create([
                'name' => $faker->unique()->name(),
                'phone' => $faker->phoneNumber(),
                'company'=> $faker->company(),
                'account'=> $faker->optional($weight = 0.7)->randomFloat($nbMaxDecimals=2,$min=100, $max= 5000),
           
            ]);
        }
    }
}
