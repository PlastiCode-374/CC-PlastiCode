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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('url_image');

            $table->string('jenis_plastik')->nullable();
            $table->string('masa_pakai')->nullable();
            $table->string('tingkat_bahaya')->nullable();
            $table->text('detail_jenis_plastik')->nullable();
            $table->text('detail_masa_pakai')->nullable();
            $table->text('detail_tingkat_bahaya')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};