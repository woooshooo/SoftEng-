<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MilestoneProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('milestone_projects', function (Blueprint $table) {
           $table->engine = 'InnoDB';
           $table->increments('milestone_projects_id');
           $table->integer('projects_id');
           $table->integer('milestone_name');
           $table->string('milestone_status');
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
         Schema::dropIfExists('milestone_projects');
     }
}
