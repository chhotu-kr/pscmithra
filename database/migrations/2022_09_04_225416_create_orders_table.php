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
        Schema::create('orders', function (Blueprint $table) {
           $table->id();
            $table->boolean('isVisble')->default('1');
            $table->foreignId("user_id")->constrained();
            $table->foreignId("address_id")->nullable()->constrained();
            $table->foreignId("coupon_id")->nullable()->constrained();
            $table->enum('payment',['Done','Pending',])->default('Pending');
            
            $table->double('gst', 10, 5);
            $table->double('discount', 10, 5);
            $table->double('total', 10, 5);
            $table->string("dateofordered")->nullable();
            $table->string("slugid");
            $table->boolean("ordered")->default(0);
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
        Schema::dropIfExists('orders');
    }
};
