<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNormalisasiMatriksKeputusanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('normalisasi_matriks_keputusan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mahasiswa_id')->unsigned();
            $table->double('ipk', 15, 9)->default(123.4567);
            $table->double('pendapatan', 15, 9)->default(123.4567);
            $table->double('prestasi', 15, 9)->default(123.4567);
            $table->tinyInteger('is_select')->unsigbed()->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('normalisasi_matriks_keputusan');
    }
}
