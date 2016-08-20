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
            $table->increments('id');
            $table->integer('vlan_id');
            $table->integer('site_id');
            $table->string('abbreviation');
            $table->string('name');
            $table->string('address');
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
        Schema::drop('sites');
    }
}

//
//    public function up()
//    {
//        Schema::create('sessions', function (Blueprint $table) {
//            //TODO: determine need for foreign key constraints and indexes
//            //hasMany
//            //downloads
//            //pageviews
//            //orders
//            //payments
//            //payment_methods
//            $table->increments('id');
//            $table->integer('user_id')->unsigned(); //foreign key
//            //$table->foreign('user_id')->references('id')->on('users');
//            $table->string('source');
//            $table->string('entrance');
//            $table->string('exit');
//            $table->string('device_type');
//            $table->integer('pixel_width');
//            $table->integer('pixel_height');
//            $table->string('country');
//            $table->timestamps();
//        });
//    }
//
//    /**
//     * Reverse the migrations.
//     *
//     * @return void
//     */
//    public function down()
//    {
//        Schema::drop('sessions');
//    }
//}
