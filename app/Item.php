<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

	
         public function invoices()
    {
    	return $this->belongsToMany('app\Invoice','invoice_item','item_id','invoice_id')->withPivot('qnty','price');
    }
}
