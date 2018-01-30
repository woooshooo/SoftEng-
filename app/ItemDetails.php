<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemDetails extends Model
{
  //Table Name
  protected $table = 'equipment_details';
  //Primary Key
  public $primaryKey = 'equipment_details_id';
  //Timestamps
  public $timestamps = true;

  public function item()
  {
    return $this->belongsToMany('App\Items', 'equipment_id');
  }

}
