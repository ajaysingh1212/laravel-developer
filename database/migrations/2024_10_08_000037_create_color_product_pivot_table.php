<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorProductPivotTable extends Migration
{
    public function up()
    {
        Schema::create('color_product', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'product_id_fk_10168405')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('color_id');
            $table->foreign('color_id', 'color_id_fk_10168405')->references('id')->on('colors')->onDelete('cascade');
        });
    }
}
