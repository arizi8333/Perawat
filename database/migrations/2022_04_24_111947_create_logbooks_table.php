<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logbooks', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // <- add this
            $table->string('id_logbook')->length(10)->primary();
            $table->string('credential_id')->length(10);
            $table->string('kegiatan')->length(25);
            $table->timestamps();
        });

        Schema::table('logbooks', function (Blueprint $table) {
            $table->foreign('credential_id')->references('id_kredensial')->on('request_kredensials')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logbooks');
    }
}
