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
        Schema::create('onsite_hd', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('hd_onsite_name');
            $table->date('tanggal_mulai_efektif');
            $table->date('tanggal_akhir_efektif')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('onsite_hd');
    }
};
