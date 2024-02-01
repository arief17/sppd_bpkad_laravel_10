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
        Schema::create('perdin_pegawai', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('data_perdin_id');
            $table->foreign('data_perdin_id')->references('id')->on('data_perdins');
            $table->unsignedBigInteger('pegawai_id');
            $table->foreign('pegawai_id')->references('id')->on('pegawais');
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
