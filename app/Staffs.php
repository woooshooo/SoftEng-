<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staffs extends Model
{
  //Table Name
  protected $table = 'staffs';
  //Primary Key
  public $primaryKey = 'vol_id';
  //Timestamps
  public $timestamps = true;

  protected $fillable = [
      'staff_pos, cluster'
  ];

  public function profile()
  {
    return $this->belongsTo('App\Profile', 'profile_id');
  }
}
