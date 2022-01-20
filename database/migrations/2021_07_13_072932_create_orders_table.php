<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_no')->nullable();
            $table->integer('country')->nullable();
            $table->integer('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('address')->nullable();
            $table->integer('product_quantity')->nullable();
            $table->integer('shipping_price')->nullable();
            $table->integer('total_price')->nullable();
            $table->string('status')->nullable();
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
