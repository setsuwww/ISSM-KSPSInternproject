<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employee_history', function (Blueprint $table) {
            $table->id();

            $table->foreignId('employee_id')
                ->constrained('employees')
                ->cascadeOnDelete();

            $table->foreignId('role_id')
                ->constrained('roles')
                ->restrictOnDelete();

            $table->foreignId('location_id')
                ->constrained('locations')
                ->restrictOnDelete();

            $table->foreignId('jabatan_id')
                ->constrained('jabatans')
                ->restrictOnDelete();

            $table->foreignId('fungsi_id')
                ->constrained('fungsis')
                ->restrictOnDelete();

            $table->date('tanggal_mulai_efektif');
            $table->date('tanggal_akhir_efektif')->nullable();

            $table->boolean('current_flag')->default(true);

            $table->timestamps();

            // Optimasi query utama
            $table->index(['employee_id', 'current_flag']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_history');
    }
};
