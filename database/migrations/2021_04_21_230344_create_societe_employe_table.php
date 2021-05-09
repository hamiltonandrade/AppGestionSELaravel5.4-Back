<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocieteEmployeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tsocemp', function (Blueprint $table) {
            $table->increments('Id_semp');
            $table->integer('id_emp')->unsigned();
            $table->integer('id_soc')->unsigned();
            $table->foreign('id_emp')->references('Id_emp')->on('TEMPLOYE')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_soc')->references('Id_soc')->on('TSOCIETE')->onDelete('cascade')->onUpdate('cascade');


            $table->rememberToken();
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
        Schema::dropIfExists('TSOCEMP');
    }
}
