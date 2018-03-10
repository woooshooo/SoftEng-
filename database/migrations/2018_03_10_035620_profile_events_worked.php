<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProfileEventsWorked extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('profile_events_worked', function (Blueprint $table) {
           $table->engine = 'InnoDB';
           $table->increments('profile_events_worked_id');
           $table->integer('profile_id');
           $table->integer('events_id')->unsigned();
           $table->boolean('pre_setup');
           $table->boolean('actual_event');
           $table->boolean('pack_up');
       });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('profile_events_worked');
     }
}
