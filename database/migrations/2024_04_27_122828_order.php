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
        Schema::create('ordert', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('order_items_id');
            $table->foreignId('product_id');
            $table->text('vendor_id');
            $table->text('address');
            $table->integer('quantity');
            $table->string('status')->default('pending');
            $table->integer('total');
            $table->timestampTz('time', 0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('order_items_id')->references('id')->on('order_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
};
