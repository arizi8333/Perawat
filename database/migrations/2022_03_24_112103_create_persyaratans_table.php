<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersyaratansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persyaratans', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // <- add this
            $table->string('id_persyaratan')->length(3)->primary();
            $table->string('jenis_kredensial_id')->length(2);
            $table->string('nama_persyaratan')->length(25);
            $table->timestamps();
        });

        Schema::table('persyaratans', function (Blueprint $table) {
            $table->foreign('jenis_kredensial_id')->references('id_jenis_kredensial')->on('jenis_kredentials')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persyaratans');
    }
}
