<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductStockPivotTable extends Migration
{
    public function up()
    {
        Schema::create('product_stock', function (Blueprint $table) {
            $table->unsignedBigInteger('stock_id');
            $table->foreign('stock_id', 'stock_id_fk_10169046')->references('id')->on('stocks')->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'product_id_fk_10169046')->references('id')->on('products')->onDelete('cascade');
        });
    }
}
