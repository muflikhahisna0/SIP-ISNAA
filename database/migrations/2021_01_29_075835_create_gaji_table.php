<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGajiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gaji', function (Blueprint $table) {
            $table->id();
            $table->integer('karyawan_id');
            $table->bigInteger('absensi_id');
            $table->date('tanggal');
            $table->integer('gaji_pokok');
            $table->integer('tunjangan_jabatan');
            $table->integer('tunjangan_makan');
            $table->integer('tunjangan_transport');
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
        Schema::dropIfExists('gaji');
    }
}
