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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('nip')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('no_hp')->unique()->nullable();
            $table->unsignedBigInteger('jabatan_id');
            $table->unsignedBigInteger('seksi_id')->nullable();
            $table->unsignedBigInteger('bidang_id')->nullable();
            $table->unsignedBigInteger('golongan_id')->nullable();
            $table->unsignedBigInteger('pangkat_id')->nullable();
            $table->boolean('pptk');
            $table->unsignedBigInteger('ketentuan_id');
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
        Schema::table('pegawais', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
