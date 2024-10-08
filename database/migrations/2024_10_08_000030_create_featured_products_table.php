<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturedProductsTable extends Migration
{
    public function up()
    {
        Schema::create('featured_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->string('product_title');
            $table->string('product_discription');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
