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
        Schema::create('addresses', function (Blueprint $table) {
           $table->id();
            $table->boolean('isVisble')->default('1');
            $table->foreignId("user_id")->constrained();
            $table->foreignId('product_id')->constrained();
            $table->string('name');
            $table->string('slugid');
            $table->string('state');
            $table->string('city');
            $table->string("street")->nullable();
            $table->string("landmark")->nullable();
            $table->enum("type",["office","home"])->default("home");
            $table->string('pincode');
            
           
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
        Schema::dropIfExists('addresses');
    }
};
