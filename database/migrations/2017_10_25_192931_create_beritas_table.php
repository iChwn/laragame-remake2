<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeritasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->string('judul_slug');
            $table->string('spoiler');
            $table->integer('categori_id')->unsigned();
            $table->text('deskripsi');
            $table->text('deskripsi2');
            $table->string('cover')->nullable();
            $table->integer('views');
            $table->timestamps();

            $table->foreign('categori_id')->references('id')->on('categoris')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beritas');
    }
}
