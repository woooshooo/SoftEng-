<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('events', function (Blueprint $table) {
           $table->engine = 'InnoDB';
           $table->increments('events_id');
           $table->string('events_name');
           $table->string('events_details');
           $table->integer('events_startdate');
           $table->string('events_deadline');
           $table->string('events_status');
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
          Schema::dropIfExists('events');
      }
}
