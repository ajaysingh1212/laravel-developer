<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('view_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('total_price');
            $table->string('quantity');
            $table->date('delevery_date')->nullable();
            $table->string('order_status');
            $table->string('order_number')->nullable();
            $table->string('user_name')->nullable();
            $table->string('user_email');
            $table->string('user_phone');
            $table->string('user_state');
            $table->string('user_city');
            $table->string('user_pincode');
            $table->string('user_address');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
