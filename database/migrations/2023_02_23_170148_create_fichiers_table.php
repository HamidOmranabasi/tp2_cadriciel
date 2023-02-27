<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichiers', function (Blueprint $table) {
            $table->id();
            $table->text('titre', 10);
            $table->text('titre_fr', 10);
            $table->text('path',100);
            $table->text('ext',10);
            $table->float('size');
            $table->integer('etudientsId');
            $table->foreign('etudientsId')->references('id')->on('etudients');
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
        Schema::dropIfExists('fichiers');
    }
}
