<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileProjectsWorked extends Model
{
  //Table Name
  protected $table = 'profile_projects_worked';
  //Primary Key
  public $primaryKey = 'profile_projects_worked_id';
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
