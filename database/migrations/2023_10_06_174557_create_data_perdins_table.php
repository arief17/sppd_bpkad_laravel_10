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
        Schema::create('data_perdins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->unique();
            $table->string('surat_dari')->nullable();
            $table->string('nomor_surat')->nullable();
            $table->date('tgl_surat')->nullable();
            $table->text('perihal')->nullable();
            $table->string('no_spt')->nullable();
            $table->unsignedBigInteger('tanda_tangan_id');
            $table->unsignedBigInteger('pptk_id');
            $table->unsignedBigInteger('pa_kpa_id');
            $table->text('maksud');
            $table->integer('lama');
            $table->date('tgl_berangkat');
            $table->date('tgl_kembali');
            $table->unsignedBigInteger('alat_angkut_id');
            $table->string('kedudukan')->default('Kota Serang');
            $table->unsignedBigInteger('jenis_perdin_id');
            $table->unsignedBigInteger('tujuan_id');
            $table->unsignedBigInteger('tujuan_lain_id')->nullable();
            $table->unsignedBigInteger('kabupaten_id');
            $table->unsignedBigInteger('kabupaten_lain_id')->nullable();
            $table->text('lokasi');
            $table->unsignedBigInteger('pegawai_diperintah_id');
            $table->string('jumlah_pegawai');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('laporan_perdin_id');
            $table->unsignedBigInteger('kwitansi_perdin_id');
            $table->unsignedBigInteger('author_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_perdins', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
