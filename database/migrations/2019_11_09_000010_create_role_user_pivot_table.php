<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('role_user', function (Blueprint $table): void {
            $table->foreignId('user_id', 'user_id_fk_583558')->constrained()->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('role_id', 'role_id_fk_583558')->constrained()->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
        });
    }
};
