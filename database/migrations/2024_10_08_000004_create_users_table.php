<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('phone')->nullable();
            $table->boolean('approved')->default(0)->nullable();
            $table->string('addhar_number')->nullable();
            $table->string('pan_number')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('pincode')->nullable();
            $table->longText('present_address')->nullable();
            $table->longText('permanent_address')->nullable();
            $table->string('shop_name')->nullable();
            $table->string('shop_gst_number')->nullable();
            $table->string('shop_pan_number')->nullable();
            $table->string('shop_state')->nullable();
            $table->string('shop_city')->nullable();
            $table->string('shop_pincode')->nullable();
            $table->longText('shop_address')->nullable();
            $table->datetime('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
