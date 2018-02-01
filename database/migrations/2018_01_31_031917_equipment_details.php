<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EquipmentDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('equipment_details', function (Blueprint $table) {
           $table->engine = 'InnoDB';
           $table->increments('equipment_details_id');
           $table->integer('equipment_id');
           $table->string('item_code');
           $table->string('item_warranty');
           $table->string('item_status');
           $table->string('item_notes');
           $table->string('item_dateofpurchase');
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
         Schema::dropIfExists('equipment_details');
     }
}
