<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tb_penduduk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agama_id');
            $table->unsignedBigInteger('pendidikan_id');
            $table->unsignedBigInteger('pekerjaan_id');
            $table->unsignedBigInteger('dusun_id');
            $table->unsignedBigInteger('perkawinan_id');
            $table->unsignedBigInteger('hubungan_id');

            $table->string('no_kk');
            $table->string('nik');
            $table->string('nama');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->text('alamat');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->enum('kewarganegaraan', ['WNI', 'WNA', 'GANDA']);
            $table->string('golongan_darah')->nullable();
            $table->string('penghasilan')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('no_hp')->nullable();
            $table->enum('status', ['ada', 'meninggal', 'pindah'])->default('ada');
            $table->string('ktp_path')->nullable();
            $table->timestamps();

            $table->foreign('agama_id')->references('id')->on('tb_agama')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('pendidikan_id')->references('id')->on('tb_pendidikan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('pekerjaan_id')->references('id')->on('tb_pekerjaan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('dusun_id')->references('id')->on('tb_dusun')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('perkawinan_id')->references('id')->on('tb_perkawinan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('hubungan_id')->references('id')->on('tb_hubungan')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_penduduk');
    }
};
