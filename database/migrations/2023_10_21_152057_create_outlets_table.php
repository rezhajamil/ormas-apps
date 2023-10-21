<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outlets', function (Blueprint $table) {
            $table->id();
            $table->string('no_rs');
            $table->string('id_outlet');
            $table->string('nama_outlet');
            $table->string('telp_pemilik');
            $table->string('nama_sf');
            $table->string('regional')->nullable();
            $table->string('branch')->nullable();
            $table->string('sub_branch')->nullable();
            $table->string('cluster')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('tap_kcp')->nullable();
            $table->string('side_id_cover')->nullable();
            $table->string('kategori')->nullable();
            $table->string('pareto')->nullable();
            $table->string('frekuensi_kunjungan')->nullable();
            $table->string('hari_kunjungan')->nullable();
            $table->string('remark_fisik')->nullable();
            $table->string('pjp')->nullable();
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
        Schema::dropIfExists('outlets');
    }
}
