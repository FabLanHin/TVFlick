<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->id();
            $table->string('nameSerie');
            $table->integer('seasonSerie');
            $table->string('platform')->nullable();
            $table->string('genreSerie')->nullable();
            $table->text('actorsSerie')->nullable();
            $table->float('rateSerie')->nullable();
            $table->string('statusSerie')->nullable();
            $table->text('synopsisSerie')->nullable();
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
        Schema::dropIfExists('series');
    }
}
