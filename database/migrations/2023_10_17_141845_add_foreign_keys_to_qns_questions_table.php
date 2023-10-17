<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToQnsQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('qns_questions', function (Blueprint $table) {
            $table->foreign('qns_id')->references('id')->on('qns')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('correct_option')->references('id')->on('qns_options')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('qns_questions', function (Blueprint $table) {
            $table->dropForeign('qns_id');
            $table->dropForeign('correct_option');
        });
    }
}
