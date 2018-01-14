<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('projects', function (Blueprint $table) {
          $table->engine = 'InnoDB';
          $table->increments('projects_id');
          $table->string('projects_name');
          $table->string('projects_details');
          $table->integer('projects_startdate');
          $table->string('projects_deadline');
          $table->string('projects_status');
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
         Schema::dropIfExists('projects');
     }
}
