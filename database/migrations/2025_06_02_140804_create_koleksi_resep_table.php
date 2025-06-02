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

    public function down()
    {
        Schema::dropIfExists('koleksi_resep');
    }
}