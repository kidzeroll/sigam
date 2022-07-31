<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tb_surat_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat');
            $table->string('no_agenda');
            $table->date('tanggal_surat');
            $table->date('tanggal_masuk');
            $table->string('perihal_surat');
            $table->string('tembusan');
            $table->string('pengirim');
            $table->text('keterangan')->nullable();
            $table->string('lampiran_path')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_surat_masuk');
    }
};
