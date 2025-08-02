<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->integer('nik')->unique();
            $table->string('name');
            $table->foreignId('departement_id')->nullable()->constrained('departement')->onUpdate('set null')->onDelete('cascade');
            $table->foreignId('role_id')->nullable()->constrained('roles')->onUpdate('set null')->onDelete('cascade');
            $table->enum('shift', ['Non-Shift', 'Shift 1', 'Shift 2', 'Shift 3']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
