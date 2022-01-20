<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNameOfColumnsInServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
          $table->renameColumn('heading', 'title');
          $table->renameColumn('describe', 'data');
          $table->renameColumn('image', 'thumbnail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
          $table->renameColumn('title', 'heading');
          $table->renameColumn('data', 'describe');
          $table->renameColumn('thumbnail', 'image');
        });
    }
}
