<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('description');
            $table->boolean('isCoupon');
            $table->dateTime('deleteAt')->nullable();
            $table->dateTime('startsAt')->nullable();
            $table->dateTime('expiresAt')->nullable();
            $table->boolean('active');
            $table->string('productGroups');
            $table->string('tags');
            $table->boolean('isTake');
            $table->boolean('isDelivery');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
