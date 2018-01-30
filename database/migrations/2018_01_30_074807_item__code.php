<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('equipment_codes', function (Blueprint $table) {
           $table->engine = 'InnoDB';
           $table->increments('equipment_codes_id');
           $table->integer('equipment_id');
           $table->integer('item_code');
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
         Schema::dropIfExists('equipment_codes');
     }
}
