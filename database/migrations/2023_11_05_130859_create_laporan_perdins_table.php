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
        Schema::create('laporan_perdins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tgl_laporan')->nullable();
            $table->text('latar_belakang')->nullable();
            $table->text('maksud')->nullable();
            $table->text('kegiatan')->nullable();
            $table->text('hasil')->nullable();
            $table->text('kesimpulan')->nullable();
            $table->string('file_laporan')->nullable();
            $table->unsignedBigInteger('author_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('laporan_perdins', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
