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
        Schema::create('shop_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('order_date');
            $table->unsignedBigInteger('payment_method_id');
            $table->unsignedBigInteger('shipping_address');
            $table->unsignedBigInteger('shipping_method');
            $table->integer('order_total');
            $table->unsignedBigInteger('order_status');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('payment_method_id')->references('id')->on('user_payment_method')
                ->onDelete('cascade');
            $table->foreign('shipping_address')->references('id')->on('user_address')
                ->onDelete('cascade');
            $table->foreign('shipping_method')->references('id')->on('shipping_method')
                ->onDelete('cascade');
            $table->foreign('order_status')->references('id')->on('order_status')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_order');
    }
};
