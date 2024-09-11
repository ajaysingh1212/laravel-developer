<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandProductPivotTable extends Migration
{
    public function up()
    {
        Schema::create('brand_product', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'product_id_fk_10113453')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id', 'brand_id_fk_10113453')->references('id')->on('brands')->onDelete('cascade');
        });
    }
}
