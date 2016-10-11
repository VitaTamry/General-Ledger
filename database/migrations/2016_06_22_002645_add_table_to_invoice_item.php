<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableToInvoiceItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoice_item', function (Blueprint $table) {

            $table->double('uniteprice', 10, 2)->nullable();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('invoice_item', function (Blueprint $table) {
            $table->dropColumn('uniteprice');
        });
        
    }
}
