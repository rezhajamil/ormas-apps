<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerritoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('territory', function (Blueprint $table) {
            $table->id();
            $table->string('provinsi', 50)->nullable();
            $table->string('regional', 50)->nullable();
            $table->string('branch', 50)->nullable();
            $table->text('sub_branch')->nullable();
            $table->string('cluster', 50)->nullable();
            $table->text('kab_new')->nullable();
            $table->string('mitra', 50)->nullable();
            $table->text('dealer_code')->nullable();
            $table->tinyInteger('lbo_city')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('territory');
    }
}
