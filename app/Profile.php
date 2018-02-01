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
  public function borrows()
  {
    return $this->hasMany('App\Borrow','borrow_id','profile_id');
  }
  public function borrowprofile()
  {
    return $this->hasOne('App\BorrowProfile','profile_id');
  }
  public function projects()
  {
    return $this->hasMany('App\ProfileProjects','profile_id');
  }
  public function events()
  {
    return $this->hasMany('App\ProfileEvents','profile_id');
  }
}
?>
