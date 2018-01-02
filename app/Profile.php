<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  //Table Name
  protected $table = 'profiles';
  //Primary Key
  public $primaryKey = 'profile_id';
  //Timestamps
  public $timestamps = true;

  public function volunteer()
  {
    return $this->hasOne('App\Vols','profile_id');
  }
  public function staff()
  {
    return $this->hasOne('App\Staffs','profile_id');
  }
  public function borrow()
  {
    return $this->hasMany('App\Borrow','profile_id');
  }
}
?>
