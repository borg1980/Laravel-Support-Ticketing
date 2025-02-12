<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permission_role', function (Blueprint $table): void {
            $table->foreignId('role_id', 'role_id_fk_583549')->constrained()->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('permission_id', 'permission_id_fk_583549')->constrained()->references('id')->on('permissions')->onUpdate('cascade')->onDelete('cascade');
        });
    }
};
