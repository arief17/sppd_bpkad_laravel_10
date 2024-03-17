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
        Schema::create('tanda_tangans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('pegawai_id');
            $table->boolean('status')->default('1');
            $table->enum('jenis_ttd', ['pemberi_perintah', 'pptk', 'pengguna_anggaran', 'kuasa_pengguna_anggaran', 'kepala_badan']);
            $table->string('file_ttd')->nullable();
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
        Schema::table('tanda_tangans', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
