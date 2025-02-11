<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_id', 'ticket_fk_583774')->nullable()->constrained()->references('id')->on('tickets')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id', 'user_fk_583777')->nullable()->constrained()->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('author_name')->nullable();
            $table->string('author_email')->nullable();
            $table->longText('comment_text');
            $table->timestamps();
            $table->softDeletes();
        });
    }
};
