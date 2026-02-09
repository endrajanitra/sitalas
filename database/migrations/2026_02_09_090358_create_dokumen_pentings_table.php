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
        Schema::create('dokumen_pentings', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_terima');
            $table->date('tgl_surat');
            $table->string('no_surat');
            $table->integer('jumlah_sk');
            $table->unsignedBigInteger('direktorat_id')->nullable()->index();
            $table->string('pengirim');
            $table->string('perihal');
            $table->string('kontak_person');
            $table->text('catatan');
            $table->string('upload_file');
            $table->boolean('kirim_ke_tujuan')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen_pentings');
    }
};
