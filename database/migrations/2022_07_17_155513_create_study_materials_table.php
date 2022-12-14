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
        Schema::create('study_materials', function (Blueprint $table) {
        
           $table->id();
            $table->boolean('isVisble')->default('1');
            $table->string('slugid')->nullable();
            $table->foreignId('sm_categories_id')->constrained();
            $table->foreignId('sm_chapters_id')->constrained();
            $table->text('name');
            $table->text('content');
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
        Schema::dropIfExists('study_materials');
    }
};
