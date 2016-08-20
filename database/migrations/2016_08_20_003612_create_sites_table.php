<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {

            //mine
            $table->increments('id'); //id of site: pk

            $table->string('name'); //
            $table->string('abbreviation')->unique(); //a unique index
            $table->string('address');

            $table->integer('vlan_id')->unsigned(); //id of a vlan at a site

            $table->timestamps();


            //schema
//            $table->increments('vlan_id')->primary();
//            $table->integer('site_id')->unsigned();
//            $table->foreign('site_id')->reference('...field...')->on('...table...');
//
//            $table->string('abbreviation')->unique();
//
//            $table->string('name');
//            $table->string('address');

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
        Schema::drop('sites');
    }
}
