<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableauEnseignantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tableau_enseignants', function (Blueprint $table) {
            $table->id();
            $table->string('nom_enseignant');
            $table->string('nom_ue');
            $table->integer('credit');
            $table->integer('ct');
            $table->integer('td');
            $table->integer('tp');
            $table->integer('tpe');
            $table->string('gpe');
            $table->integer('mp');
            $table->integer('me');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tableau_enseignants');
    }
}
