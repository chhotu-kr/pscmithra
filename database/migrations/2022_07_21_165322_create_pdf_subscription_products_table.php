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
        Schema::create('pdf_subscription_products', function (Blueprint $table) {
           $table->id();
            $table->boolean('isVisble')->default('1');
            $table->foreignId('product_id')->constrained();
            $table->foreignId('pdf_subscriptions_id')->constrained();
            $table->string('slugid');
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
        Schema::dropIfExists('pdf_subscription_products');
    }
};
