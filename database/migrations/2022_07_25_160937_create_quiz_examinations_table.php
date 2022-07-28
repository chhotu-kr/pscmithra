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
        Schema::create('quiz_examinations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_categories_id')->constrained();
            $table->foreignId('quiz_sub_categories_id')->nullable()->constrained();
            $table->foreignId('quiz_chapters_id')->nullable()->constrained();
            $table->foreignId('quiz_topics_id')->nullable()->constrained();
            $table->string('exam_name');
            $table->float('rightmarks');
            $table->float('wrongmarks');
            $table->string('slugid')->nullable();
            $table->integer('time_duration');
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
        Schema::dropIfExists('quiz_examinations');
    }
};
