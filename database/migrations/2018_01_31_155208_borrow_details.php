<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BorrowDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('borrow_details', function (Blueprint $table) {
           $table->engine = 'InnoDB';
           $table->increments('borrow_details_id');
           $table->integer('borrow_id');
           $table->integer('equipment_details_id');
           $table->double('numberofdays');
           $table->date('returndate');
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
         Schema::dropIfExists('borrow_details');
     }
}
