<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable(false);
            $table->string('url')->nullable(false)->unique();
            $table->text('description')->nullable(false);
            $table->string('code')->nullable(false)->comment('ma san pham');
            $table->integer('old_price')->nullable(false);
            $table->integer('price')->nullable(false)->comment('gia san pham');
            $table->string('image')->nullable(false)->comment(' link anh san pham');
            $table->integer('category_id')->unsigned();

            $table->foreign('category_id')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
