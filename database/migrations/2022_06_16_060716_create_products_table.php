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
        Schema::create('products', function (Blueprint $table) {
           $table->id();
            $table->boolean('isVisble')->default('1');
            $table->foreignId('subject_id')->constrained();
            $table->foreignId('topic_id')->nullable()->constrained();
            $table->string('slugid');
            $table->string('title');
            $table->text('description');
          
           $table->enum('type', ['pdf', 'course','book','plan','ebook'])->default('pdf');
            $table->float('price');
            $table->integer('bycount');
            $table->string('bannerimage');
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
        Schema::dropIfExists('products');
    }
};
