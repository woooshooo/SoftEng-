<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Items extends Model
{
  //Table Name
  protected $table = 'equipments';
  //Primary Key
  public $primaryKey = 'equipment_id';
  //Timestamps
  public $timestamps = true;

  public function borrow()
  {
    return $this->belongsTo('App\Borrow', 'equipment_id');
  }

}
