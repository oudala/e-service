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
            $table->unsignedBigInteger('etudient_id');
            $table->foreign('etudient_id')->references('id')->on('users')->onDelete('set null');     
            $table->unsignedBigInteger('Prof_id');
            $table->foreign('Prof_id')->references('id')->on('users')->onDelete('set null');     
            $table->unsignedBigInteger('Modul_id')->nullable();
            $table->foreign('Modul_id')->references('id')->on('modules')->onDelete('cascade');
            $table->unsignedBigInteger('filiers_id')->nullable();
            $table->foreign('filiers_id')->references('id')->on('filieres')->onDelete('cascade');
            $table->float('Note');
            $table->boolean('is_sauvgarde_prof')->default(false);
            $table->boolean('is_submitted_prof')->default(false);
            $table->boolean('is_submitted_coordinateur')->default(false);
            $table->string('created_by')->nullable();
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
