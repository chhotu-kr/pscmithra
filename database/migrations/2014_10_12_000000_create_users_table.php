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
        Schema::create('users', function (Blueprint $table) {
           $table->id();
            $table->boolean('isVisble')->default('1');
<<<<<<< HEAD
           
=======
>>>>>>> 616bc6e2639ebe5d3d690478dcbef8fd1236b58f
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('contact')->unique()->nullable();
            $table->string('password');
            $table->string('slugid');
           $table->integer('amount');
           $table->string('image');
           $table->string('gender');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
