<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataBiroModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_data_biro', function (Blueprint $table) {
            $table->id('data_biro_id');
            $table->integer('biro_id');
            $table->date('data_biro_tgl');
            $table->integer('data_biro_sim_a_baru')->nullable();
            $table->integer('data_biro_sim_c_baru')->nullable();
            $table->integer('data_biro_sim_ac_baru')->nullable();
            $table->integer('data_biro_sim_a_perpanjang')->nullable();
            $table->integer('data_biro_sim_c_perpanjang')->nullable();
            $table->integer('data_biro_sim_ac_perpanjang')->nullable();
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
        Schema::dropIfExists('tb_data_biro');
    }
}
