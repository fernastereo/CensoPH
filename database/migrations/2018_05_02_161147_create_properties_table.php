<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('tower_id')->unsigned();
            $table->string('phone_number')->nullable();
            $table->boolean('live_householder')->default(false);
            $table->string('rent_agency')->nullable();
            $table->date('move_date')->nullable();
            $table->string('idnumber')->nullable()->comments('Numero de Matricula Inmobiliaria');
            $table->double('coefficient', 8, 4);
            $table->double('area', 8, 4);
            $table->timestamps();

            $table->foreign('tower_id')->references('id')->on('towers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
