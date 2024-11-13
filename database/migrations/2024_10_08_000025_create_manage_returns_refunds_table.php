<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageReturnsRefundsTable extends Migration
{
    public function up()
    {
        Schema::create('manage_returns_refunds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cancled_status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
