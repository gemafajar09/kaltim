<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_detail', function (Blueprint $table) {
            $table->id('id_detail');
            $table->integer('id_data');
            $table->integer('id_biro');
            $table->integer('sim_a_baru');
            $table->integer('sim_c_baru');
            $table->integer('sim_ac_baru');
            $table->integer('sim_a_perpanjang');
            $table->integer('sim_c_perpanjang');
            $table->integer('sim_ac_perpanjang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_detail');
    }
}
