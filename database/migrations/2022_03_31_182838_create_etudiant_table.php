<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\QueryException ;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('Etudiant', function (Blueprint $table) {
            $table->id('ID_Etudaint');
            $table->string('Nom');
            $table->string('Prenom');
            $table->string('CIN')->unique();
            $table->string('Email')->unique();
            $table->string('Adresse');
            $table->bigInteger('Apogee')->unique();
            $table->bigInteger('F_ID')->unsigned();
            $table->string('Niveau');
            $table->foreign('F_ID')->references('ID_F')->on('Filiere')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('Etudiant');
    }
};
