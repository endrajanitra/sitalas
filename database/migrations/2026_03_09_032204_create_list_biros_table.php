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
        Schema::create('list_biros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tambah_surat_keluar_id')
                ->unique()
                ->constrained('tambah_surat_keluars')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

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
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_biros');
    }
};