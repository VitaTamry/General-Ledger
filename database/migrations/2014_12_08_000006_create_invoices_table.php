<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
       public function up()
    {
        Schema::enableForeignKeyConstraints();

        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('invoice_no')->unique();
            $table->integer('customer_id')->unsigned();
            $table->integer('user_id')->unsigned();          
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('user_id')->references('id')->on('users');
            $table->double('total', 7, 2)->nullable();
            $table->double('paid', 7, 2)->nullable();
            $table->double('remain', 7, 2)->nullable();
            $table->boolean('pending')->nullable();
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
        Schema::drop('invoices');
    }
}
