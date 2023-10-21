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
            $table->string('regional', 50)->nullable();
            $table->string('branch', 50)->nullable();
            $table->string('cluster', 50)->nullable();
            $table->string('provinsi', 50)->nullable();
            $table->string('kabupaten', 50)->nullable();
            $table->string('kecamatan', 50)->nullable();
            $table->string('desa', 50)->nullable();
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
