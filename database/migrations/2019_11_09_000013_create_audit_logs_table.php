<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('audit_logs', function (Blueprint $table): void {
            $table->id();
            $table->text('description');
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->string('subject_type')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->text('properties')->nullable();
            $table->string('host', 45)->nullable();
            $table->timestamps();
        });
    }
};
