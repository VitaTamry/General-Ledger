<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {		DB::table('items')->delete();
    	 $faker = Faker::create();
        $limit =50;;
        for ($i=0; $i < $limit ; $i++) 
        {
            Item::create([
                'name' => $faker->unique()->word,
                'cost' => $faker->randomFloat($nbMaxDecimals=2,$min=2, $max= 10),
                'unite_price'=> $faker->randomFloat($nbMaxDecimals=2,$min=5, $max= 20),
                'package_price'=> $faker->randomFloat($nbMaxDecimals=2,$min=60, $max= 200),
                'package'=>$faker->randomElement($array = array(12,30,24)),
                'instock'=> $faker->numberBetween($min=3, $max= 300),
                'alarm'=> $faker->numberBetween($min=2,$max=20)
            ]);
        }
    }
}
