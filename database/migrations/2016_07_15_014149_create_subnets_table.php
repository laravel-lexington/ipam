<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubnetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subnets', function (Blueprint $table) {

            //mine
            $table->increments('id'); //id of subnet pk

            $table->integer('site_id'); //fk
            $table->foreign('site_id')->references('id')->on('sites'); //fk constraint

            $table->integer('subnet_node_id'); //fk
            $table->foreign('subnet_node_id')->references('id')->on('subnet_nodes'); //fk constraint

            $table->ipAddress('ip_address');
            $table->smallInteger('prefix_length');
            $table->string('name'); //??? name of what?
            $table->ipAddress('default_gateway');

            $table->timestamps();


            //schema
//            $table->increments('vlan_id'); //pk
//
//            $table->integer('site_id'); //fk
//            $table->foreign('site_id')->references('...field...')->on('...table...'); //fk constraint
//
//            $table->integer('subnet_id'); //fk
//            $table->foreign('subnet_id')->references('...field...')->on('...table...'); //fk constraint
//
//            $table->ipAddress('ip_address');
//            $table->smallInteger('prefix_length');
//            $table->string('name');
//            $table->ipAddress('default_gateway');
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
        Schema::drop('subnets');
    }
}
