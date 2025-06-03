<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriTable extends Migration
{
    public function up()
    {
        Schema::create('kategori', function (Blueprint $table) {
            $table->bigIncrements('id_kategori'); // id bigint auto increment primary key
            $table->string('kategori');      
        });
    }
//     CREATE TABLE kategori (
//     id_kategori BIGINT AUTO_INCREMENT PRIMARY KEY,
//     kategori VARCHAR(255) NOT NULL
// );

    public function down()
    {
        Schema::dropIfExists('kategori');
    }
    // DROP TABLE IF EXISTS kategori;
}
