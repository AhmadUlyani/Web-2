<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('member', function (Blueprint $table) {
            $table->increments('id_member');
            $table->string('nama_member', 250);
            $table->string('nomor_member', 15);
            $table->text('alamat')->nullable();
            $table->dateTime('tgl_mendaftar')->nullable();
            $table->date('tgl_terakhir_bayar')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('member');
    }
};