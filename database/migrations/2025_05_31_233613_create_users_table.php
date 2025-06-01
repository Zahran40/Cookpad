<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id_pembuat'); // id bigint auto increment primary key
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role')->default('user'); // role user, admin, atau superadmin
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
