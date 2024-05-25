<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffictationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affictations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('Prof_id')->nullable();
            $table->foreign('Prof_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('set null');     
            $table->unsignedBigInteger('Modul_id')->nullable();
            $table->foreign('Modul_id')->references('id')->on('modules')->onDelete('cascade')->onUpdate('set null');
            $table->unsignedBigInteger('filiers_id')->nullable();
            $table->foreign('filiers_id')->references('id')->on('filieres')->onDelete('cascade')->onUpdate('set null');
            $table->string('description')->nullable();
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
        Schema::dropIfExists('affictations');
    }
}
