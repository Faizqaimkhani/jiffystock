<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnsInAdminWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin_wallets', function (Blueprint $table) {
          $table->renameColumn('deposits','deposit');
          $table->renameColumn('refunds','refund');
          $table->renameColumn('sell_products','sell_product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_wallets', function (Blueprint $table) {
            //
        });
    }
}
