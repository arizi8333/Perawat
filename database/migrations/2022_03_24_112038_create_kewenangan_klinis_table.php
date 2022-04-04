<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewenanganKlinisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewenangan_klinis', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // <- add this
            $table->string('id_kewenangan')->length(3)->primary();
            $table->string('perawat_klinik_id')->length(3);
            $table->string('rincian_kewenangan')->length(25);
            $table->string('jenis_kewenangan')->length(5);
            $table->timestamps();
        });

        Schema::table('kewenangan_klinis', function (Blueprint $table) {
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
        Schema::dropIfExists('kewenangan_klinis');
    }
}
