<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenerimaZakatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerima_zakats', function (Blueprint $table) {
            $table->id();
            $table->foreignid('user_id');
            $table->string('alamat');
            $table->string('jenis_bantuan');
            $table->string('status');
            $table->float('pendapatan');
            $table->string('barang_keperluan');
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
        Schema::dropIfExists('penerima_zakats');
    }
}
