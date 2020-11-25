<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Utilisateurs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('utilisateurs', function (Blueprint $table){
             $table->bigIncrements('id');
             $table->string('nom',25);
             $table->string('prenom',25);
             $table->string('email',50)->unique();
             $table->timestamps(); // date_creation et date_modification gérer automatique par Laravel
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     Schema::dropIfExists('utilisateurs');
    }
}
