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
        Schema::create('karir', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lowongan');
            $table->text('deskripsi_pekerjaan');
            $table->text('syarat_ketentuan');
            $table->string('tahap_rekrutmen');
            $table->date('tanggal_upload');
            $table->date('formulir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karir');
    }
};
