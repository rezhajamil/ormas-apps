<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQnsResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qns_responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('qns_id');
            $table->string('id_digipos')->nullable();
            $table->string('telp')->nullable();
            $table->string('telp_responder')->nullable();
            $table->dateTime('time_start')->nullable();
            $table->boolean('finish')->default(0);
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
        Schema::dropIfExists('qns_responses');
    }
}
