<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToViewOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('view_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('order_related_by_id')->nullable();
            $table->foreign('order_related_by_id', 'order_related_by_fk_10168914')->references('id')->on('users');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id', 'product_fk_10168915')->references('id')->on('products');
        });
    }
}
