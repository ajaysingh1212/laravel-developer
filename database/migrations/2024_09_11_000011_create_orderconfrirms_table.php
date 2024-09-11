<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderconfrirmsTable extends Migration
{
    public function up()
    {
        Schema::create('orderconfrirms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_no');
            $table->string('name');
            $table->string('email');
            $table->integer('quantity');
            $table->string('charge');
            $table->integer('total_amount');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
