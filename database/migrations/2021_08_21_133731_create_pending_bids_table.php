<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendingBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pending_bids', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->nullable();
            $table->integer('auction_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('price')->nullable();
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
        Schema::dropIfExists('pending_bids');
    }
}
