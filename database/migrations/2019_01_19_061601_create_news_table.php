<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable(false);
            $table->text('subtitle')->comment('phan chu hien thi duoi tieu de');
            $table->string('url')->nullable(false)->unique();
            $table->string('image') ->comment('anh bai viet');
            $table->text('content');
            $table->integer('url_type')->nullable(false)->default(0)->comment('0: internal link, 1:external link');
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
        Schema::dropIfExists('news');
    }
}
