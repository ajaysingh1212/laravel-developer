<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToManageReturnsRefundsTable extends Migration
{
    public function up()
    {
        Schema::table('manage_returns_refunds', function (Blueprint $table) {
            $table->unsignedBigInteger('order_by_id')->nullable();
            $table->foreign('order_by_id', 'order_by_fk_10169019')->references('id')->on('view_orders');
        });
    }
}
