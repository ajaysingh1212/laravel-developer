<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageReturnsRefundUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('manage_returns_refund_user', function (Blueprint $table) {
            $table->unsignedBigInteger('manage_returns_refund_id');
            $table->foreign('manage_returns_refund_id', 'manage_returns_refund_id_fk_10169017')->references('id')->on('manage_returns_refunds')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_10169017')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
