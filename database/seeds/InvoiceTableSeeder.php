<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Invoice;
use App\Item;
use App\User;
use App\Customer;

class InvoiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	$total="";
        DB::table('invoices')->delete();
    	 $faker = Faker::create();
        $limit =20;
        for ($i=0; $i < $limit ; $i++) 
        {
        	$customer = Customer::all()->random(1);
        	$user = User::all()->random(1);
        	$invoice =  Invoice::create([
                'invoice No' => $faker->unique()->ean8,
                'customer_id' => $customer->id,
                'User_id'=> $user->id,
                ]);
	        for ($x=0; $x <10 ; $x++) { 
	          	$item = Item::all()->random(1);
	          	$invoice->items()->attach($item->id);
                $itemSold = $invoice->items()->find($item->id);
	            $qnt= $itemSold->pivot->qnty = $faker->numberBetween($min=1,$max=10);
                $itemSold->pivot->price=$item->unite_price;
                $itemSold->pivot->save();
	          	$total += $item->unite_price * $qnt;
                $invoice->save();
	          }
	          $invoice->total = $total;
	          $paid= $invoice->paid= $faker->numberBetween($min=0,$max=$total);
	          $remain= $invoice->remain= $total-$paid;
	          if ($remain>0) {
	          	$invoice->pending = true;
	          	$customer->account += $remain;  
	          }else{
				$invoice->pending = false;

	          }         
              $customer->save();
              $invoice->save();

        }
    }
}
