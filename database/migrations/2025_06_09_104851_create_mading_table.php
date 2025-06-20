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
        Schema::create('mading', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('isi');
            $table->unsignedBigInteger('kelas_id')->nullable();
            $table->unsignedBigInteger('dibuat_oleh');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mading');
    }
};
