<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubnetNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subnet__nodes', function (Blueprint $table) {

            //mine
            $table->increments('id'); //id of subnet node pk
            $table->ipAddress('ip_address');// ??? pk ??? probably not, but an index most likely

            $table->string('site_location_id'); // fk
            //$table->foreign('site_location_id')->references('id')->on('site_locations')->onDelete('cascade'); //fk constraints
            $table->string('entity_type_id'); // fk
            //$table->foreign('entity_type_id')->references('id')->on('entity_type')->onDelete('cascade'); //fk constraints

            $table->macAddress('mac_address')->unique();
            $table->string('name'); //??? name of what?
            $table->string('MAB_status'); //??? string? boolean? //MAC Authentication Bypass Status

            $table->timestamps();

            //schema
//            $table->increments('subnet_id');// pk
//            $table->ipAddress('ip_address');// pk
//
//            $table->macAddress('mac_address')->unique();
//            $table->string('name'); //??? name of what?
//            $table->string('MAB_status'); //??? string? boolean? //MAC Authentication Bypass Status
//
//            $table->integer('location'); //fk
//            $table->foreign('location')->references('...field...')->on('...table...');
//
//            $table->integer('entity_type'); //fk
//            $table->foreign('entity_type')->references('...field...')->on('...table...');
//
//            $table->timestamps();
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
        Schema::drop('subnet__nodes');
    }
}
