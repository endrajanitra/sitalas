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
        Schema::create('tambah_surat_keluars', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_surat');
            $table->foreignId('klasifikasi_id')->nullable()->constrained('klasifikasis')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('no_urut')->nullable();
            $table->foreignId('kode_id')->nullable()->constrained('kode_surats')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('no_surat')->nullable();
            $table->foreignId('sifat_surat_id')->constrained('sifat_surats')->cascadeOnUpdate()->cascadeOnDelete();
            $table->text('perihal');
            $table->foreignId('direktorat_id')->nullable()->constrained('unit_pengolahs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('kontak_person');
            $table->string('kepada');
            $table->text('keterangan')->nullable();
            $table->string('upload_file')->nullable();
            $table->text('lampiran')->nullable();

            /**
             * Kolom untuk sistem SOPD Approval
             */
            $table->string('status')->default('pending');
            // pending | diterima | ditolak

            $table->text('alasan_penolakan')->nullable();
            // diisi jika status = ditolak

            $table->boolean('is_requested')->default(false);
            // menandakan sudah pernah di request atau belum

            /**
             * Kolom untuk SOPD Report
             */
            $table->boolean('dokumen_asli')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tambah_surat_keluars');
    }
};