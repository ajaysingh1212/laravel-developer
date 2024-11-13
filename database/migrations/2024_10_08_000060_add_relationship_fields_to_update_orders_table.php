<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUpdateOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('update_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('order_number_id')->nullable();
            $table->foreign('order_number_id', 'order_number_fk_10168932')->references('id')->on('view_orders');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id', 'status_fk_10168933')->references('id')->on('view_orders');
        });
    }
}
