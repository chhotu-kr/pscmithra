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
        Schema::create('live_tests', function (Blueprint $table) {
            $table->id();
            $table->string('exam_name');
            $table->string('startat');
            $table->float('rightmarks');
            $table->float('wrongmarks');
            $table->string('slugid')->nullable();
            $table->integer('time_duration');
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
        Schema::dropIfExists('live_tests');
    }
};
