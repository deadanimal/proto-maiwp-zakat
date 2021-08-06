<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePungutanZakatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pungutan_zakats', function (Blueprint $table) {
            $table->id();
            $table->string('pegawai_id');
            $table->float('jumlah');
            $table->string('tarikh');
            $table->string('jenis_pungutan');
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
        Schema::dropIfExists('pungutan_zakats');
    }
}
