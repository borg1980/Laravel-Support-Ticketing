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
            $table->string('author_name')->nullable();
            $table->string('author_email')->nullable();
            $table->longText('comment_text');
            $table->timestamps();
            $table->softDeletes();
        });
    }
};
