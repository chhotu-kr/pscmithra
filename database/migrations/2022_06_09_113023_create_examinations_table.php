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
            $table->string('startat');
            $table->float('rightmarks');
            $table->float('wrongmarks');
            $table->string('slugid');
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
        Schema::dropIfExists('examinations');
    }
};
