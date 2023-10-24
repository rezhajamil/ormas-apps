<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fm', function (Blueprint $table) {
            $table->id();
            $table->string('id_outlet');
            $table->integer('trx');
            $table->integer('rev');
            $table->string('jenis');
            $table->string('produk');
            $table->string('deskripsi_produk')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('f_m_s');
    }
}
