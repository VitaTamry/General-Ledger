<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{


	
    public function customers()
    {
    	return $this->belongsTo('app\Customer','customer_id');
    }

     public function users()
    {
    	return $this->belongsTo('app\User','user_id');
    }

         public function items()
    {
    	return $this->belongsToMany('app\Item','invoice_item','invoice_id','item_id')->withPivot('qnty','price');
    }
}
