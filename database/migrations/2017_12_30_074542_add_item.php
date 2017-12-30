<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('equipments', function (Blueprint $table) {
          $table->engine = 'InnoDB';
          $table->increments('equipment_id');
          $table->string('item_name');
          $table->string('item_type');
          $table->integer('item_quantity');
          $table->string('item_notes')->nullable();
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
        Schema::dropIfExists('equipments');
    }
}
