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
        Schema::create('live_attemp_questions', function (Blueprint $table) {
           $table->id();
            $table->boolean('isVisble')->default('1');
            $table->foreignId('users_id')->constrained();
            $table->foreignId('questions_id')->constrained();
            $table->foreignId('live_attemps_id')->constrained();
            $table->enum('QuesSeen',['true','false'])->default('false');
            $table->string('QuesSelect')->nullable();
            $table->integer('time')->default(0);
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
        Schema::dropIfExists('live_attemp_questions');
    }
};
