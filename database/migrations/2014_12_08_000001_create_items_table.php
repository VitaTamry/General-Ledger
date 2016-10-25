<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('items', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name')->unique();
            $table->double('cost',5,2);
            $table->double('unite_price',5,2);
            $table->double('package_price',5,2);
            $table->integer('package');
            $table->integer('instock');
            $table->integer('alarm');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('items');
    }
}
