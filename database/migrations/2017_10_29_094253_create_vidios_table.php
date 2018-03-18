<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVidiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vidios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->string('link');
            $table->string('link_id');
            // $table->integer('categori_id')->unsigned();
            $table->integer('berita_id')->unsigned();
            $table->string('cover')->nullable();
            $table->timestamps();

            $table->foreign('berita_id')->references('id')->on('beritas')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('categori_id')->references('id')->on('categoris')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vidios');
    }
}
