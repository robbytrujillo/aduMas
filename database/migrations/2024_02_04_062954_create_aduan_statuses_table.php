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
        Schema::create('aduan_status', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aduan_id');
            $table->string('status');
            $table->string('daftar_desa');
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->foreign('aduan_id')->references('id')->on('aduans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aduan_status');
    }
};
