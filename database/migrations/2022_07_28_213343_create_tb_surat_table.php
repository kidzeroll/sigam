<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tb_surat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pekerjaan_id');
            $table->unsignedBigInteger('agama_id');
            $table->string('no_surat')->nullable();
            $table->string('jenis_surat');
            $table->string('nik');
            $table->string('nama');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->text('alamat');
            $table->text('keperluan');
            $table->string('no_hp');
            $table->string('surat_path')->nullable();
            $table->enum('status', ['menunggu', 'ditandatangani', 'selesai'])->default('menunggu');

            // untuk meninggal
            $table->date('tanggal_meninggal')->nullable();
            $table->date('tanggal_dikebumikan')->nullable();
            $table->string('tempat_dikebumikan')->nullable();
            $table->string('pukul_meninggal')->nullable();
            $table->string('pukul_dikebumikan')->nullable();
            $table->string('penyebab')->nullable();

            // untuk pindah
            $table->text('tujuan_pindah')->nullable();
            $table->date('tanggal_pindah')->nullable();

            // untuk usaha
            $table->string('bidang_usaha')->nullable();
            $table->text('alamat_usaha')->nullable();
            $table->timestamps();

            // untuk upload ktp dan kk
            $table->string('ktp_path')->nullable();
            $table->string('kk_path')->nullable();

            $table->foreign('pekerjaan_id')->references('id')->on('tb_pekerjaan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('agama_id')->references('id')->on('tb_agama')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_surat');
    }
};
