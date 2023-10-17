<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToQnsSelectedOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('qns_selected_options', function (Blueprint $table) {
            $table->foreign('response_id')->references('id')->on('qns_responses')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('question_id')->references('id')->on('qns_questions')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('option_id')->references('id')->on('qns_options')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('qns_selected_options', function (Blueprint $table) {
            $table->dropForeign('response_id');
            $table->dropForeign('question_id');
            $table->dropForeign('option_id');
        });
    }
}
