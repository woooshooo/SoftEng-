<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileEventsAssigned extends Model
{
  //Table Name
  protected $table = 'profile_events_assigned';
  //Primary Key
  public $primaryKey = 'profile_events_assigned_id';
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
