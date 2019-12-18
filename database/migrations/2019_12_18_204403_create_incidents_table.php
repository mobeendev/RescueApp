<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_search')->unsigned();
            $table->string('person')->nullable();
            $table->string('description')->nullable();         
            $table->string('photo')->default('default.jpg');
            $table->dateTime('date_incident_heppened')->nullable();
            $table->timestamps();
        });

        Schema::table('incidents', function (Blueprint $table) {
            $table->foreign('id_search')->references('id')->on('searches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidents');
    }
}
