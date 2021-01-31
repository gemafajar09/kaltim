<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPolresModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_data_polres', function (Blueprint $table) {
            $table->id('data_polres_id');
            $table->integer('polres_id');
            $table->date('data_polres_tgl');
            $table->integer('data_polres_sim_a_baru')->nullable();
            $table->integer('data_polres_sim_a_perpanjang')->nullable();
            $table->integer('data_polres_sim_c_baru')->nullable();
            $table->integer('data_polres_sim_c_perpanjang')->nullable();
            $table->integer('data_polres_surat_pengantar_dari_biro')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_data_polres');
    }
}
