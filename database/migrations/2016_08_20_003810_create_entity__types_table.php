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

        });

        DB::table('entity__types')->insert([

            'entity_type_table_name' => "computer"

        ]);

        DB::table('entity__types')->insert([

            'entity_type_table_name' => "printer"

        ]);

        DB::table('entity__types')->insert([

            'entity_type_table_name' => "placeholder"

        ]);
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
