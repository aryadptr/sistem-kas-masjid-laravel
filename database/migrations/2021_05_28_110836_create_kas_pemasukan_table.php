<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasPemasukanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kas_pemasukan', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_users');
            $table->string('sumber');
            $table->bigInteger('jumlah');
            $table->date('tanggal');
            $table->string('keterangan');
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('kas_pemasukan');
    }
}
