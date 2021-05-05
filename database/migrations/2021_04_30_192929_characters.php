<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Characters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('characters',function (Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('power')->nullable();
            //$table->date('creation_date');
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
        //
        Schema::dropIfExists('character');

    }
}
