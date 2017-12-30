<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
  //Table Name
  protected $table = 'equipments';
  //Primary Key
  public $primaryKey = 'equipment_id';
  //Timestamps
  public $timestamps = true;

}
