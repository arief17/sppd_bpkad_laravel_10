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
        Schema::create('kwitansi_pegawai', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('kwitansi_perdin_id');
            $table->foreign('kwitansi_perdin_id')->references('id')->on('kwitansi_perdins');
            $table->unsignedBigInteger('pegawai_id');
            $table->foreign('pegawai_id')->references('id')->on('pegawais');
            $table->integer('uang_harian')->default('0');
            $table->integer('uang_transport')->default('0');
            $table->integer('uang_tiket')->default('0');
            $table->integer('uang_penginapan')->default('0');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perdin_pegawai', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
