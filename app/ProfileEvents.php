<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileEvents extends Model
{
  //Table Name
  protected $table = 'profile_events';
  //Primary Key
  public $primaryKey = 'profile_events_id';
  //Timestamps
  public $timestamps = false;

  protected $fillable = [
      'profile_id'
  ];

  public function profile()
  {
    return $this->belongsTo('App\Profile', 'profile_id');
  }
  public function events()
  {
    return $this->hasMany('App\Events','events_id');
  }
}
