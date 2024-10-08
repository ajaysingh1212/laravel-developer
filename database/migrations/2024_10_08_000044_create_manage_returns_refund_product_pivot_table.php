<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageReturnsRefundProductPivotTable extends Migration
{
    public function up()
    {
        Schema::create('manage_returns_refund_product', function (Blueprint $table) {
            $table->unsignedBigInteger('manage_returns_refund_id');
            $table->foreign('manage_returns_refund_id', 'manage_returns_refund_id_fk_10169018')->references('id')->on('manage_returns_refunds')->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'product_id_fk_10169018')->references('id')->on('products')->onDelete('cascade');
        });
    }
}
