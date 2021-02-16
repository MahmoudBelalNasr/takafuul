<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->string('username');
            $table->string('identity_number');
            $table->date('birth_date');
            $table->string('phone1');
            $table->integer('city_id');
            //$table->unsignedBigInteger('city_id');
            $table->string('title');
            $table->integer('status')->default('0');
            $table->softDeletes();
            $table->timestamps();

            //$table->foreign('city_id')->references('id')->on('cities');
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
}
