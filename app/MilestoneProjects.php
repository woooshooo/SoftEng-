<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MilestoneProjects extends Model
{
  //Table Name
  protected $table = 'milestone_projects';
  //Primary Key
  public $primaryKey = 'milestone_projects_id';
  //Timestamps
  public $timestamps = true;

  protected $fillable = [
      'profile_id, milestone_name'
  ];
  public function project()
  {
    return $this->belongsTo('App\Projects', 'projects_id');
  }
}
