<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('items_project', function (Blueprint $table) {
           $table->engine = 'InnoDB';
           $table->increments('items_project_id');
           $table->integer('projects_id');
           $table->integer('equipment_details_id');
       });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('items_project');
     }
}
