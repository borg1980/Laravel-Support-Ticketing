<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTicketsTable extends Migration
{
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id', 'status_fk_583763')->references('id')->on('statuses');
            $table->unsignedBigInteger('priority_id');
            $table->foreign('priority_id', 'priority_fk_583764')->references('id')->on('priorities');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id', 'category_fk_583765')->references('id')->on('categories');
            $table->unsignedBigInteger('assigned_to_user_id')->nullable();
            $table->foreign('assigned_to_user_id', 'assigned_to_user_fk_583768')->references('id')->on('users');
        });
    }
}
