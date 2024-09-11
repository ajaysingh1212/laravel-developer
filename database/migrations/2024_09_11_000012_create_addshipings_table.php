<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddshipingsTable extends Migration
{
    public function up()
    {
        Schema::create('addshipings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->integer('price');
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
