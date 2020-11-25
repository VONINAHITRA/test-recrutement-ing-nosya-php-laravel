<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cheques extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('cheques', function (Blueprint $table) {
            $table->bigIncrements('idCheq');
             $table->string('numCheq',35)->unique();
            $table->string('montantCheq');
            $table->string('datePayeCheq');
            $table->string('nomBanq');
            $table->text('descCheq',50);
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
         Schema::dropIfExists('cheques');
    }
}
