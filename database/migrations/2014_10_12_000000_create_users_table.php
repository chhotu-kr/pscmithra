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
            
            $table->string('name');
            $table->string('email')->unique();
            $table->string('contact')->unique();
            $table->string('password');
            $table->string('slugid')->nullable();
           $table->integer('amount')->nullable();
           $table->string('image')->nullable();
           $table->string('gender')->nullable();
           
           $table->enum('type',['mobile', 'gmail'])->default('mobile');
           $table->enum('user_type',['user','bot'])->default('user');
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
