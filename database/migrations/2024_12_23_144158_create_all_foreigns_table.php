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
            $table->foreign('level_admin_id')->references('id')->on('level_admins');
            $table->foreign('bidang_id')->references('id')->on('bidangs');
            $table->foreign('jabatan_id')->references('id')->on('jabatans');
        });

        Schema::table('bidangs', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('kegiatans', function (Blueprint $table) {
            $table->foreign('seksi_id')->references('id')->on('seksis');
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('kegiatan_subs', function (Blueprint $table) {
            $table->foreign('kegiatan_id')->references('id')->on('kegiatans');
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('pegawais', function (Blueprint $table) {
            $table->foreign('seksi_id')->references('id')->on('seksis');
            $table->foreign('bidang_id')->references('id')->on('bidangs');
            $table->foreign('jabatan_id')->references('id')->on('jabatans');
            $table->foreign('golongan_id')->references('id')->on('golongans');
            $table->foreign('pangkat_id')->references('id')->on('pangkats');
            $table->foreign('ketentuan_id')->references('id')->on('ketentuans');
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('tanda_tangans', function (Blueprint $table) {
            $table->foreign('pegawai_id')->references('id')->on('pegawais');
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('alat_angkuts', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('jabatans', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('ketentuans', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('golongans', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('jenis_perdins', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('seksis', function (Blueprint $table) {
            $table->foreign('bidang_id')->references('id')->on('bidangs');
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('wilayahs', function (Blueprint $table) {
            $table->foreign('jenis_perdin_id')->references('id')->on('jenis_perdins');
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('kabupatens', function (Blueprint $table) {
            $table->foreign('wilayah_id')->references('id')->on('wilayahs');
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('uang_harians', function (Blueprint $table) {
            $table->foreign('wilayah_id')->references('id')->on('wilayahs');
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('uang_transports', function (Blueprint $table) {
            $table->foreign('alat_angkut_id')->references('id')->on('alat_angkuts');
            $table->foreign('wilayah_id')->references('id')->on('wilayahs');
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('uang_penginapans', function (Blueprint $table) {
            $table->foreign('wilayah_id')->references('id')->on('wilayahs');
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('data_perdins', function (Blueprint $table) {
            $table->foreign('tanda_tangan_id')->references('id')->on('tanda_tangans');
            $table->foreign('pptk_id')->references('id')->on('tanda_tangans');
            $table->foreign('pa_kpa_id')->references('id')->on('tanda_tangans');
            $table->foreign('alat_angkut_id')->references('id')->on('alat_angkuts');
            $table->foreign('tujuan_id')->references('id')->on('wilayahs');
            $table->foreign('tujuan_lain_id')->references('id')->on('wilayahs');
            $table->foreign('kabupaten_id')->references('id')->on('kabupatens');
            $table->foreign('kabupaten_lain_id')->references('id')->on('kabupatens');
            $table->foreign('jenis_perdin_id')->references('id')->on('jenis_perdins');
            $table->foreign('pegawai_diperintah_id')->references('id')->on('pegawais');
            $table->foreign('status_id')->references('id')->on('status_perdins');
            $table->foreign('laporan_perdin_id')->references('id')->on('laporan_perdins');
            $table->foreign('kwitansi_perdin_id')->references('id')->on('kwitansi_perdins');
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('laporan_perdins', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('kwitansi_perdins', function (Blueprint $table) {
            $table->foreign('kegiatan_sub_id')->references('id')->on('kegiatan_subs');
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('bendaharas', function (Blueprint $table) {
            $table->foreign('pegawai_id')->references('id')->on('pegawais');
            $table->foreign('author_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('bidangs');
        Schema::dropIfExists('kegiatans');
        Schema::dropIfExists('kegiatan_subs');
        Schema::dropIfExists('pegawais');
        Schema::dropIfExists('tanda_tangans');
        Schema::dropIfExists('alat_angkuts');
        Schema::dropIfExists('jabatans');
        Schema::dropIfExists('ketentuans');
        Schema::dropIfExists('golongans');
        Schema::dropIfExists('jenis_perdins');
        Schema::dropIfExists('wilayahs');
        Schema::dropIfExists('seksis');
        Schema::dropIfExists('uang_harians');
        Schema::dropIfExists('uang_transports');
        Schema::dropIfExists('uang_penginapans');
        Schema::dropIfExists('data_perdins');
        Schema::dropIfExists('laporan_perdins');
        Schema::dropIfExists('kwitansi_perdins');
        Schema::dropIfExists('bendaharas');
    }
};
