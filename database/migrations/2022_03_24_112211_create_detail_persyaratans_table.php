<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPersyaratansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_persyaratans', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // <- add this
            $table->string('credential_id')->length(10);
            $table->string('persyaratan_id')->length(3);
            $table->string('file')->length(2);
            $table->integer('status');
            $table->string('note')->nullable();
            $table->timestamps();
        });

        Schema::table('detail_persyaratans', function (Blueprint $table) {
            $table->foreign('credential_id')->references('id_kredensial')->on('request_kredensials')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('persyaratan_id')->references('id_persyaratan')->on('persyaratans')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_persyaratans');
    }
}
