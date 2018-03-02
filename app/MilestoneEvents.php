<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MilestoneEvents extends Model
{
  //Table Name
  protected $table = 'milestone_events';
  //Primary Key
  public $primaryKey = 'milestone_events_id';
  //Timestamps
  public $timestamps = true;

  public function events()
  {
    return $this->belongsTo('App\Events', 'events_id');
  }
}
