<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKoleksiResepTable extends Migration
{
    public function up()
    {
        Schema::create('koleksi_resep', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pembuat'); // FK ke users.id_pembuat
            $table->unsignedBigInteger('resep_id');   // FK ke resep.id
            $table->timestamps();

            $table->foreign('id_pembuat')->references('id_pembuat')->on('users')->onDelete('cascade');
            $table->foreign('resep_id')->references('id')->on('resep')->onDelete('cascade');
            $table->unique(['id_pembuat', 'resep_id']);
        });
    }
//     CREATE TABLE koleksi_resep (
//     id BIGINT AUTO_INCREMENT PRIMARY KEY,
//     id_pembuat BIGINT UNSIGNED NOT NULL,
//     resep_id BIGINT UNSIGNED NOT NULL,
//     created_at TIMESTAMP NULL,
//     updated_at TIMESTAMP NULL,
//     CONSTRAINT fk_koleksi_user FOREIGN KEY (id_pembuat) REFERENCES users(id_pembuat) ON DELETE CASCADE,
//     CONSTRAINT fk_koleksi_resep FOREIGN KEY (resep_id) REFERENCES resep(id) ON DELETE CASCADE,
//     UNIQUE KEY unique_koleksi (id_pembuat, resep_id)
// );

    public function down()
    {
        Schema::dropIfExists('koleksi_resep');
        // DROP TABLE IF EXISTS koleksi_resep;
    }
}