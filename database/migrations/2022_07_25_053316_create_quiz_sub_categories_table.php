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
        Schema::create('quiz_sub_categories', function (Blueprint $table) {
           $table->id();
            $table->boolean('isVisble')->default('1');
            $table->foreignId('quiz_categories')->constrained();
            $table->string('name');
            $table->string('image')->nullable();
            $table->enum('ifnested',['true','false'])->default('false');
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
        Schema::dropIfExists('quiz_sub_categories');
    }
};
