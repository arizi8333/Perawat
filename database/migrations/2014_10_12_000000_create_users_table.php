<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // <- add this
            $table->string('nip')->length(12)->primary();
            $table->string('role_id')->length(2);
            $table->string('perawat_klinik_id')->length(3);
            $table->string('nama')->length(25);
            $table->string('tempat_lahir')->length(25);
            $table->date('tanggal_lahir');
            $table->string('golongan')->length(5);
            $table->string('pangkat')->length(5);
            $table->string('mulai_dinas')->length(4);
            $table->string('pendidikan')->length(25);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('perawat_klinik_id')->references('id_perawat_klinik')->on('perawat_kliniks')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
