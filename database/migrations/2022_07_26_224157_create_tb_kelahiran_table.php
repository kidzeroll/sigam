<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tb_kelahiran', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bayi');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->text('keterangan')->nullable();
            $table->enum('status', ['lahir', 'meninggal'])->default('lahir');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_kelahiran');
    }
};
