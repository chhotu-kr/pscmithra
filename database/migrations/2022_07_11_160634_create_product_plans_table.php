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
            $table->foreignId('product_id')->constrained();
            $table->foreignId('category_id')->constrained()->nullable();
            $table->foreignId('subcategory_id')->constrained('sub_categories')->nullable();
            $table->string('freemocktest')->nullable();
            $table->string('livetest')->nullable();
            $table->bigInteger('examduration');
            $table->bigInteger('liveexamduration');
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
