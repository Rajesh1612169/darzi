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
        Schema::create('shop_order_new', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->longText('products');
            $table->integer('total_price');
            $table->string('name');
            $table->string('email');
            $table->bigInteger('phone');
            $table->string('country');
            $table->string('city');
            $table->string('postal_code');
            $table->string('permanent_address');
            $table->string('shipping_address');
            $table->string('shipping_type');
            $table->string('order_status');
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
        Schema::dropIfExists('shop_order');
    }
};
