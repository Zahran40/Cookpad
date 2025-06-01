<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResepTable extends Migration
{
    public function up()
    {
        Schema::create('resep', function (Blueprint $table) {
            $table->id();
            $table->string('nama_resep');
            $table->string('gambar_resep')->nullable();
            $table->unsignedBigInteger('id_pembuat');
            $table->text('deskripsi')->nullable();
            $table->text('bahan');
            $table->string('waktu_pembuatan')->nullable();
            $table->text('langkah');
            $table->string('status')->default('pending'); // status pending, approved, atau rejected
            $table->unsignedBigInteger('id_kategori'); // Foreign key to kategoris table
            

            // Foreign keys
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->onDelete('cascade');
            $table->foreign('id_pembuat')->references('id_pembuat')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('resep');
    }
}
