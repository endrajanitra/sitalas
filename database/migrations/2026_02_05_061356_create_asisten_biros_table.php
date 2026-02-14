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
        Schema::create('asisten_biros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asisten_unit_pengolah_id')->constrained('unit_pengolahs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('biro_unit_pengolah_id')->constrained('unit_pengolahs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asisten_biros');
    }
};
