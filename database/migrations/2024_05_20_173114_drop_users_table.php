<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('FirstName');
            $table->string('LastName');
            $table->enum('Rolee', ['1', '2', '3','4','5'])->default('5');            
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->enum('NoteStatus', ['Added', 'In process', 'not add'])->default('not add'); 
            $table->enum('BoolNote', ['1', '2', '3'])->default('3');                       
            $table->timestamps();
            $table->unsignedBigInteger('filiere_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->foreign('filiere_id')->references('id')->on('filieres')->onDelete('set null');
            $table->foreign('department_id')->references('id')->on('departements')->onDelete('set null');
        });
    }
}
