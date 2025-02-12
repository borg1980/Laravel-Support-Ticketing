<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table): void {
            $table->id();
            $table->string('title');
            $table->longText('content')->nullable();
            $table->string('author_name')->nullable();
            $table->string('author_email')->nullable();
            $table->foreignId('status_id', 'status_fk_583763')->constrained()->references('id')->on('statuses')->onUpdate('cascade');
            $table->foreignId('priority_id', 'priority_fk_583764')->constrained()->references('id')->on('priorities')->onUpdate('cascade');
            $table->foreignId('category_id', 'category_fk_583765')->constrained()->references('id')->on('categories')->onUpdate('cascade');
            $table->foreignId('assigned_to_user_id', 'assigned_to_user_fk_583768')->nullable()->constrained()->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }
};
