<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('tb_pengaduan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('judul');
            $table->text('isi');
            $table->string('no_hp');
            $table->enum('status', ['menunggu', 'ditanggapi', 'selesai'])->default('menunggu');
            $table->string('lampiran_path')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('tb_pengaduan');
    }
};
