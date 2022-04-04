<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerawatKliniksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perawat_kliniks', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // <- add this
            $table->string('id_perawat_klinik')->length(3)->primary();
            $table->string('jabatan')->length(25);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perawat_kliniks');
    }
}
