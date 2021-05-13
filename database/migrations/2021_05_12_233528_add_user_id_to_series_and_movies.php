<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToSeriesAndMovies extends Migration
{
    
    public function up()
    {
        Schema::table('series', function (Blueprint $table) {
            $table->integer('user_id')->after('id')->nullable()->unsigned();
        });

        Schema::table('movies', function (Blueprint $table) {
            $table->integer('user_id')->after('id')->nullable()->unsigned();
        });
    }

    
    public function down()
    {
        Schema::table('series', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });

        Schema::table('movies', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
