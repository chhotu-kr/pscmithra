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
        Schema::create('product_plans', function (Blueprint $table) {
           $table->id();
            $table->boolean('isVisble')->default('1');
            $table->bigInteger('product');
            $table->bigInteger('category')->nullable();
            $table->bigInteger('subcategory')->nullable();
            $table->string('freemocktest')->nullable();
            $table->string('livetest')->nullable();
            $table->enum('type',['quiz','studymetrial','mocktest','liveexam']);
            $table->bigInteger('subject')->nullable();
            $table->bigInteger('topic')->nullable();
            $table->bigInteger('examduration')->nullable();
           
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
        Schema::dropIfExists('product_plans');
    }
};
