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
        Schema::create('penjahitan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_produksi_id')->constrained('job_produksi');
            $table->foreignId('user_id')->constrained('users'); // penjahit
            $table->enum('status', [
                'dikerjakan',
                'setengah_jadi',
                'selesai',
            ])->default('dikerjakan');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjahitan');
    }
};
