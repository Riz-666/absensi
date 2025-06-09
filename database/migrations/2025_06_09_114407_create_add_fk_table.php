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
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('set null');
        });

        Schema::table('kelas', function (Blueprint $table) {
            $table->foreign('prodi_id')->references('id')->on('prodi')->onDelete('cascade');
            $table->foreign('wali_kelas_id')->references('id')->on('users')->onDelete('set null');
        });

        Schema::table('matkul', function (Blueprint $table) {
            $table->foreign('dosen_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('prodi_id')->references('id')->on('prodi')->onDelete('cascade');
        });

        Schema::table('jadwal', function (Blueprint $table) {
            $table->foreign('matkul_id')->references('id')->on('matkul')->onDelete('cascade');
            $table->foreign('dosen_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('prodi_id')->references('id')->on('prodi')->onDelete('cascade');
        });

        Schema::table('absen', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('jadwal_id')->references('id')->on('jadwal')->onDelete('cascade');
        });

        Schema::table('mading', function (Blueprint $table) {
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('set null');
            $table->foreign('dibuat_oleh')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropForeign(['kelas_id']);
    });

    Schema::table('kelas', function (Blueprint $table) {
        $table->dropForeign(['prodi_id']);
        $table->dropForeign(['wali_kelas_id']);
    });

    Schema::table('matkul', function (Blueprint $table) {
        $table->dropForeign(['dosen_id']);
        $table->dropForeign(['prodi_id']);
    });

    Schema::table('jadwal', function (Blueprint $table) {
        $table->dropForeign(['matkul_id']);
        $table->dropForeign(['dosen_id']);
        $table->dropForeign(['prodi_id']);
    });

    Schema::table('absen', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
        $table->dropForeign(['jadwal_id']);
    });

    Schema::table('mading', function (Blueprint $table) {
        $table->dropForeign(['kelas_id']);
        $table->dropForeign(['dibuat_oleh']);
    });
}

};
