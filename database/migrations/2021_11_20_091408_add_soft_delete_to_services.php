<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftDeleteToServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('shipment_services', function (Blueprint $table) {
        $table->softDeletes();
      });
      Schema::table('clearance_services', function (Blueprint $table) {
        $table->softDeletes();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shipment_services', function (Blueprint $table) {
          $table->dropSoftDeletes();
        });
        Schema::table('clearance_services', function (Blueprint $table) {
          $table->dropSoftDeletes();
        });
    }
}
