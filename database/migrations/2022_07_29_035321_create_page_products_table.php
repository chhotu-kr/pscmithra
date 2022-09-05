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
        Schema::create('page_products', function (Blueprint $table) {
           $table->id();
            $table->boolean('isVisble')->default('1');
            $table->string('pagename');
            $table->foreignId('products_id')->constrained();
            $table->string('slugid')->nullable();
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
        Schema::dropIfExists('page_products');
    }
};
