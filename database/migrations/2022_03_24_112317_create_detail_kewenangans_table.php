<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailKewenangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_kewenangans', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // <- add this
            $table->string('credential_id')->length(10);
            $table->string('kewenangan_id')->length(3);
            $table->string('keterangan')->length(25);
            $table->timestamps();
        });

        Schema::table('detail_kewenangans', function (Blueprint $table) {
            $table->foreign('credential_id')->references('id_kredensial')->on('request_kredensials')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('kewenangan_id')->references('id_kewenangan')->on('kewenangan_klinis')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_kewenangans');
    }
}
