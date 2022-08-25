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
        Schema::create('examinations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('subcategory_id')->constrained('sub_categories');
            $table->string('exam_name');
            $table->string('slugid');
            $table->float('marks');
            $table->float('noQues');
            $table->float('rightmarks');
            $table->float('wrongmarks');
            $table->integer('time_duration');
            $table->enum('isFree',['true','false'])->default('false');
            $table->enum('type',['live','not'])->default('not');
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
        Schema::dropIfExists('examinations');
    }
};
