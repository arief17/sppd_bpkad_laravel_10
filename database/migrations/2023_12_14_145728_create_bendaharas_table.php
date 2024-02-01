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
        Schema::create('bendaharas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->unique()->nullable();
            $table->unsignedBigInteger('pegawai_id');
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
        Schema::table('bendaharas', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
