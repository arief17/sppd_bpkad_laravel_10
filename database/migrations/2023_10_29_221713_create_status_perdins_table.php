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
        Schema::create('status_perdins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('approve')->nullable();
            $table->string('alasan_tolak')->nullable();
            $table->boolean('lap')->nullable();
            $table->boolean('kwitansi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('status_perdins', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
