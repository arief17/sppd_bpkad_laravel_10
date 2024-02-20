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
        Schema::create('ketentuans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('jumlah_perdin')->default(0);
            $table->integer('max_perdin')->default(108);
            $table->boolean('tersedia')->default(1);
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
        Schema::table('ketentuans', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
