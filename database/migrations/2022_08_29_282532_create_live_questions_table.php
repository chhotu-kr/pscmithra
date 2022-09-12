<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_questions', function (Blueprint $table) {
           $table->id();
            $table->boolean('isVisble')->default('1');

            $table->foreignId('live_exams_id')->constrained();
            $table->foreignId('question_id')->constrained();
            $table->string('slugid');
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
        Schema::dropIfExists('live_questions');
    }
};
