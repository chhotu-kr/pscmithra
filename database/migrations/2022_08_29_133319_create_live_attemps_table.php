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
        Schema::create('live_attemps', function (Blueprint $table) {
           $table->id();
            $table->boolean('isVisble')->default('1');
            $table->foreignId('users_id')->constrained();
            $table->foreignId('live_exams_id')->constrained();
            $table->enum('type', ['resume', 'result'])->default('resume');
            $table->enum('testtype', ['normal', 'reattemp'])->default('normal');
            $table->integer('lastQues')->default(0);
            $table->string('slugid');
            $table->foreignId('language_id')->constrained();
            $table->integer('remain_time')->default('0');
            $table->integer('totalmarks')->default('0');
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
        Schema::dropIfExists('live_attemps');
    }
};
