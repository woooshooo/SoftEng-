<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCode extends Model
{
  //Table Name
  protected $table = 'equipment_codes';
  //Primary Key
  public $primaryKey = 'equipment_codes_id';
  //Timestamps
  public $timestamps = true;

  public function item()
  {
    return $this->belongsTo('App\Items', 'equipment_id');
  }

}
