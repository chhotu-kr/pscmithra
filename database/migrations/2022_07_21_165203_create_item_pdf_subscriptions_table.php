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
        Schema::create('item_pdf_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('pdf_subscriptions_id')->constrained();
            $table->string('url');
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
        Schema::dropIfExists('item_pdf_subscriptions');
    }
};
