<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeadersTable extends Migration
{
    public function up()
    {
        Schema::create('headers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('meta_dis')->nullable();
            $table->string('footer_about')->nullable();
            $table->string('facebook')->nullable();
            $table->string('insta')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkdin')->nullable();
            $table->integer('phone')->nullable();
            $table->string('email')->nullable();
            $table->longText('address')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
