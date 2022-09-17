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
        Schema::create('user_course_modules', function (Blueprint $table) {
            $table->id();
            
            $table->boolean('isVisble')->default('1');
            $table->foreignId('user_courses_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('modules_id')->constrained();
            $table->boolean('isCompleted')->default(0);
            $table->text('slugid');
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
        Schema::dropIfExists('user_course_modules');
    }
};
