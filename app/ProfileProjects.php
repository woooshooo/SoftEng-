<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileProjects extends Model
{
  //Table Name
  protected $table = 'profile_projects';
  //Primary Key
  public $primaryKey = 'profile_projects_id';
  //Timestamps
  public $timestamps = false;

  protected $fillable = [
      'profile_id'
  ];

  public function profile()
  {
    return $this->belongsTo('App\Profile', 'profile_id');
  }
  public function projects()
  {
    return $this->hasMany('App\Projects','Projects_id');
  }
}
