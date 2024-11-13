<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentViewOrderPivotTable extends Migration
{
    public function up()
    {
        Schema::create('shipment_view_order', function (Blueprint $table) {
            $table->unsignedBigInteger('shipment_id');
            $table->foreign('shipment_id', 'shipment_id_fk_10168939')->references('id')->on('shipments')->onDelete('cascade');
            $table->unsignedBigInteger('view_order_id');
            $table->foreign('view_order_id', 'view_order_id_fk_10168939')->references('id')->on('view_orders')->onDelete('cascade');
        });
    }
}
