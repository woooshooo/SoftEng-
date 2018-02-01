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
  public $timestamps = false;


  public function itemdetail()
  {
    return $this->hasMany('App\ItemDetails', 'equipment_id');
  }

}
