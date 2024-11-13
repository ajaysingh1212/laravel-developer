<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductReviewsTable extends Migration
{
    public function up()
    {
        Schema::table('product_reviews', function (Blueprint $table) {
            $table->unsignedBigInteger('product_name_id')->nullable();
            $table->foreign('product_name_id', 'product_name_fk_10169065')->references('id')->on('products');
        });
    }
}
