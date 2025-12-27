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
        Schema::create('job_produksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('model_pakaian_id')->constrained('model_pakaian');
            $table->integer('jumlah_target');
            $table->enum('status', [
                'menunggu',
                'dipotong',
                'dijahit',
                'finishing',
                'selesai',
            ])->default('menunggu');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_produksi');
    }
};
