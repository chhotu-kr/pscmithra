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
        Schema::create('Plan_Products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product');
            $table->bigInteger('category')->nullable();
            $table->bigInteger('subcategory')->nullable();
            $table->string('freemocktest')->nullable();
            $table->string('livetest')->nullable();
            $table->enum('type',['quiz','studymetrial','mocktest','liveexam']);
            $table->bigInteger('subject');
            $table->bigInteger('topic');
            $table->bigInteger('examduration');
           
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
