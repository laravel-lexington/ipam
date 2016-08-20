<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntityTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity__types', function (Blueprint $table) {

            //mine
            $table->increments('id'); //pk

            $table->string('entity_type_table_name'); //reference table as string

            $table->timestamps();

            //schema
//            $table->increments('entity_type'); //pk
//
//            $table->string('table_name'); //name of equipment table
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
        Schema::drop('entity__types');
    }
}
