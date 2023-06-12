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
        Schema::create('plastics', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_plastik');
            $table->string('masa_pakai');
            $table->string('tingkat_bahaya');
            $table->text('detail_jenis_plastik');
            $table->text('detail_masa_pakai');
            $table->text('detail_tingkat_bahaya');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plastics');
    }
};