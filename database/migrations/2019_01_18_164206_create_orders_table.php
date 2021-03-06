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
            $table->string('code')->unique()->nullable(false)->comment('ma don hang');
            $table->string('customer_name')->nullable(false);
            $table->string('customer_email')->nullable(false);
            $table->string('customer_phone')->nullable(false);
            $table->string('customer_city')->nullable(false);
            $table->string('customer_district')->nullable(false);
            $table->text('customer_address')->nullable(false);
            $table->integer('payment_method')->default(0)->comment('0: tai nha, 1: tai cua hang');
            $table->integer('price')->nullable(false)->comment('tong gia tri don hang');
            $table->text('notes')->nullable(true)->comment('ghi chu cua khach hang');
            $table->integer('status')->default(0)->comment('0: chua xong; 1: da xong');
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
