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
//     CREATE TABLE resep (
//     id BIGINT AUTO_INCREMENT PRIMARY KEY,
//     nama_resep VARCHAR(255) NOT NULL,
//     gambar_resep VARCHAR(255) NULL,
//     id_pembuat BIGINT UNSIGNED NOT NULL,
//     deskripsi TEXT NULL,
//     bahan TEXT NOT NULL,
//     waktu_pembuatan VARCHAR(255) NULL,
//     langkah TEXT NOT NULL,
//     status VARCHAR(255) NOT NULL DEFAULT 'pending',
//     id_kategori BIGINT UNSIGNED NOT NULL,
//     CONSTRAINT fk_resep_kategori FOREIGN KEY (id_kategori) REFERENCES kategori(id_kategori) ON DELETE CASCADE,
//     CONSTRAINT fk_resep_user FOREIGN KEY (id_pembuat) REFERENCES users(id_pembuat) ON DELETE CASCADE
// );

    public function down()
    {
        Schema::dropIfExists('resep');
        // DROP TABLE IF EXISTS resep;
    }
}
