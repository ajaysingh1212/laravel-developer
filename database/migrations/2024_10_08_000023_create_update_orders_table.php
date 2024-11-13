<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpdateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('update_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('message')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
