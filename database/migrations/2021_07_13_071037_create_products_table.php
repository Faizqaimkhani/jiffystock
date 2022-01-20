<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->integer('sub_category_id');
            $table->string('brand');
            $table->integer('color');
            $table->integer('average_market_price');
            $table->integer('price');
            $table->string('unit');
            $table->mediumText('little_describe');
            $table->longText('description');
            $table->integer('stock_quantity');
            $table->integer('user_id');
            $table->integer('add_durations')->default(0);
            $table->string('video')->default('');
            $table->string('image1')->default('');
            $table->string('image2')->default('');
            $table->string('image3')->default('');
            $table->string('image4')->default('');
            $table->string('image5')->default('');
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
        Schema::dropIfExists('products');
    }
}
