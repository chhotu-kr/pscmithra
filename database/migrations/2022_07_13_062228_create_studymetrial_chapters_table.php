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
        Schema::create('studymetrial_chapters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('studymetrialcategory_id')->constrained('studymetrial_Chapters');
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
        Schema::dropIfExists('studymetrial_chapters');
    }
};