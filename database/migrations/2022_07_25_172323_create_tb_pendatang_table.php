<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tb_pendatang', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('no_kk')->nullable();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->text('alamat_asal');
            $table->date('tanggal_datang');
            $table->string('tujuan_kedatangan');
            $table->string('lama_kedatangan');
            $table->enum('status', ['menetap', 'selesai', 'proses'])->default('proses');
            $table->string('no_hp')->nullable();
            $table->string('photo_path')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_pendatang');
    }
};
