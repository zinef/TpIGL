<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('moyenne');
            $table->float('ci');
            $table->float('cc');
            $table->float('cf');
            $table->bigInteger('etudiant_id')->unsigned()->nullable();
            $table->foreign('etudiant_id')->references('id')->on('etudiants');
            $table->unsignedBigInteger("module_id")->nullable();
            $table->foreign('module_id')->references('id')->on('modules');
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
        Schema::dropIfExists('notes');
    }
}
