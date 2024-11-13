<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserViewOrderPivotTable extends Migration
{
    public function up()
    {
        Schema::create('user_view_order', function (Blueprint $table) {
            $table->unsignedBigInteger('view_order_id');
            $table->foreign('view_order_id', 'view_order_id_fk_10168283')->references('id')->on('view_orders')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_10168283')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
