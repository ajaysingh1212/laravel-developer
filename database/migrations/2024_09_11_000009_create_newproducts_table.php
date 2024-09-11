<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewproductsTable extends Migration
{
    public function up()
    {
        Schema::create('newproducts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_sell_tye');
            $table->string('product_discription');
            $table->integer('quantity');
            $table->string('price');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
