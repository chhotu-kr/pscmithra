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
        Schema::create('questions', function (Blueprint $table) {
           $table->id();
            $table->boolean('isVisble')->default('1');
            
            $table->foreignId("subject_id")->constrained();
            $table->foreignId("topic_id")->constrained();
            
            $table->longText('name');
            $table->string('rightans');
            $table->string('slugid')->nullable();
            $table->string('isVerified')->nullable();
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
        Schema::dropIfExists('questions');
    }
};
