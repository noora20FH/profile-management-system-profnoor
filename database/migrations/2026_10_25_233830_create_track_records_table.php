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
        Schema::create('track_records', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // 'reviewer', 'assessor', 'award'
            $table->string('title'); // Nama Jurnal / Bidang Asesor / Nama Penghargaan
            $table->string('institution')->nullable(); // Institusi Penyelenggara / Pemberi
            $table->string('scope')->nullable(); // Internasional/Nasional (Untuk Reviewer)
            $table->string('details')->nullable(); // Keterangan tambahan (Tanda Kehormatan, dll)
            $table->year('year')->nullable(); // Tahun (Untuk Penghargaan)
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('track_records');
    }
};
