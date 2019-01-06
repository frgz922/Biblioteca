<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBibliotecaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biblioteca', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_libro');
            $table->integer('id_autor')->unsigned();
            $table->integer('id_clasificacion')->unsigned();
//            $table->date('fecha_pub');
            $table->string('url_libro');
            $table->string('url_thumbnail');
            $table->boolean('activo')->default(false);
            $table->timestamps();
        });

        Schema::table('biblioteca', function (Blueprint $table) {
            $table->foreign('id_autor')->references('id')->on('autor');
            $table->foreign('id_clasificacion')->references('id')->on('clasificacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biblioteca');
    }
}
