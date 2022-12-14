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
        Schema::create('pdf_subscriptions', function (Blueprint $table) {
           $table->id();
            $table->boolean('isVisble')->default('1');
            $table->string('name');
            $table->string('slugid');
            $table->enum('type',['weekly','monthly'])->default('monthly');
            $table->bigInteger('Date');
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
        Schema::dropIfExists('pdf_subscriptions');
    }
};
