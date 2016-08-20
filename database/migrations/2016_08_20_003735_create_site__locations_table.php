<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site__locations', function (Blueprint $table) {

            //mine
            $table->increments('id'); //pk

            $table->integer('site_id'); //fk
            //$table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade'); //fk constraint

            $table->string('building_name');
            $table->integer('room_number');

            $table->timestamps();

            //schema
//            $table->increments('vlan_id'); //pk
//            $table->integer('site_id'); //fk
//
//            $table->string('building_name');
//            $table->integer('room_number');
//
//            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('site__locations');
    }
}
