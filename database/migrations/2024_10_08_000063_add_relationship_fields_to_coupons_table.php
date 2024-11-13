<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCouponsTable extends Migration
{
    public function up()
    {
        Schema::table('coupons', function (Blueprint $table) {
            $table->unsignedBigInteger('select_product_id')->nullable();
            $table->foreign('select_product_id', 'select_product_fk_10169079')->references('id')->on('products');
        });
    }
}
