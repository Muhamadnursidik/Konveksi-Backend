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
        Schema::create('finishing', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_produksi_id')->constrained('job_produksi');
            $table->foreignId('user_id')->constrained('users'); // finishing
            $table->enum('qc_status', ['lulus', 'tidak_lulus']);
            $table->enum('status', ['finishing', 'packing', 'siap_jadi'])->default('finishing');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finishing');
    }
};
