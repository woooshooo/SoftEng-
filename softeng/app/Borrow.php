<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
  //Table Name
  protected $table = 'borrow';
  //Primary Key
  public $primaryKey = 'borrow_id';
  //Timestamps
  public $timestamps = true;

  public function profile()
  {
    return $this->belongsTo('App\Profile','profile_id');
  }

  public function item()
  {
    return $this->hasMany('App\Items','equipment_id');
  }

}
