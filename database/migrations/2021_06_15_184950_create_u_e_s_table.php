<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUESTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('u_e_s', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->nullable();
            $table->string('appelation') ;
            $table->string('abreviation') ;
            $table->integer('code') ;
            $table->integer('semestreCycle') ;
            $table->string('typeUE_id')->nullable() ;
            $table->string('natureUE_id')->nullable();
            $table->integer('CT');
            $table->integer('TD');
            $table->integer('TP'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('u_e_s');
    }
}
