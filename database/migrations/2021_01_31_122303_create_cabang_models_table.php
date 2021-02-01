<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabangModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_cabang', function (Blueprint $table) {
            $table->id('cabang_id');
            $table->string('cabang_nama');
            $table->string('cabang_alamat');
            $table->integer('cabang_kode');
            $table->string('cabanag_foto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_cabang');
    }
}
