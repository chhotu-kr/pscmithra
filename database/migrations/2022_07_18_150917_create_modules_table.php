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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained();
            $table->string('slugid');
            $table->enum('type',['voice','text','test'])->default('text');
            $table->string('name');
            $table->string('url')->nullable();
            $table->text('text')->nullable();
            $table->integer('quiz_id')->nullable();
            $table->enum('isfree',['true','false'])->default('false');
            $table->integer('index');
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
        Schema::dropIfExists('modules');
    }
};
