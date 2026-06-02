<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->increments('id_peminjaman');

            $table->unsignedInteger('id_member')->nullable();
            $table->unsignedBigInteger('id_buku')->nullable();

            $table->date('tgl_pinjam');
            $table->date('tgl_kembali')->nullable();

            $table->foreign('id_member')
                ->references('id_member')
                ->on('member')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->foreign('id_buku')
                ->references('id')
                ->on('buku')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};