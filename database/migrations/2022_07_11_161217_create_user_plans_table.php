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
        Schema::create('user_plans', function (Blueprint $table) {
           $table->id();
            $table->boolean('isVisble')->default('1');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('category_id')->constrained()->nullable();
            $table->foreignId('subcategory_id')->constrained('sub_categories')->nullable();
            $table->string('isfree')->nullable();
            $table->string('isused')->nullable();
            $table->string('time');
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
        Schema::dropIfExists('user_plans');
    }
};
