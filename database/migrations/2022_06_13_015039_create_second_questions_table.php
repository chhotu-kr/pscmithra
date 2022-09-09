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
        Schema::create('second_questions', function (Blueprint $table) {
           $table->id();
            $table->boolean('isVisble')->default('1');
            $table->foreignId('language_id')->constrained();
            $table->foreignId('question_id')->constrained();
            $table->longtext('question');
            $table->longText('direction');
            $table->longText('explanation');
            $table->longtext('option1');
            $table->longtext('option2');
            $table->longtext('option3');
            $table->longtext('option4');
            $table->longtext('slugid');
            
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
        Schema::dropIfExists('second_questions');
    }
};
