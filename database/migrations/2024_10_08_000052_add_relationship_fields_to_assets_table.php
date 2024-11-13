<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAssetsTable extends Migration
{
    public function up()
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_10161416')->references('id')->on('asset_categories');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id', 'status_fk_10161420')->references('id')->on('asset_statuses');
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id', 'location_fk_10161421')->references('id')->on('asset_locations');
            $table->unsignedBigInteger('assigned_to_id')->nullable();
            $table->foreign('assigned_to_id', 'assigned_to_fk_10161423')->references('id')->on('users');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_10171302')->references('id')->on('users');
        });
    }
}
