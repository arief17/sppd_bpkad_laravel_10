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
        Schema::create('kwitansi_perdins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tgl_bayar')->nullable();
            $table->string('no_rek')->nullable();
            $table->integer('bbm')->default('0');
            $table->integer('tol')->default('0');
            $table->unsignedBigInteger('kegiatan_sub_id')->nullable();
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
        Schema::table('kwitansi_perdins', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
