<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestKredensialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_kredensials', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // <- add this
            $table->string('id_kredensial')->length(10)->primary();
            $table->string('nip')->length(12);
            $table->string('tempat_dinas_id')->length(3);
            $table->string('jenis_kredensial_id')->length(2);
            $table->date('tgl_request_kredensial');
            $table->date('tgl_terbit_surat')->nullable();
            $table->date('tgl_habis_berlaku')->nullable();
            $table->integer('status')->length(1);
            $table->string('ttd');
            $table->timestamps();
        });

        Schema::table('request_kredensials', function (Blueprint $table) {
            $table->foreign('nip')->references('nip')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tempat_dinas_id')->references('id_tempat_dinas')->on('tempat_dinas')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('request_kredensials');
    }
}
