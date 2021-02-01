<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_data_user', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('user_nama');
            $table->integer('cabang_id');
            $table->integer('user_level');
            $table->string('user_username');
            $table->string('user_password');
            $table->string('user_ulangi_password');
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
        Schema::dropIfExists('tb_data_user');
    }
}
