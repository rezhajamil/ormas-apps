<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQnsQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qns_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('qns_id');
            $table->string('type');
            $table->string('text');
            $table->unsignedBigInteger('correct_option')->nullable();
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
        Schema::dropIfExists('qns_questions');
    }
}
