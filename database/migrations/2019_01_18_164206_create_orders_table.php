<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code') -> nullable(false);
            $table->string('customer_name') -> nullable(false);
            $table->string('customer_email') -> nullable(false);
            $table->string('customer_phone') -> nullable(false);
            $table->integer('customer_city') -> nullable(false);
            $table->integer('customer_district') -> nullable(false);
            $table->text('customer_address') -> nullable(false);
            $table->integer('payment_method')->default(0);
            $table->integer('price') -> nullable(false);
            $table->text('notes');
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
        Schema::dropIfExists('orders');
    }
}
