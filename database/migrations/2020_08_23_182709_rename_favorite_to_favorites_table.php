<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameFavoriteToFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorite_to_favorites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
        });
        
        //テーブルの名前ミスがあったので変更
        Schema::rename('favorite', 'favorites');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorite_to_favorites');
        //テーブルの名前ミスがあったので変更
        Schema::rename('favorites','favorite');
    }
}
