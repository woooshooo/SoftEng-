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

  protected $fillable = [
      'profile_id, milestone_name'
  ];
  public function event()
  {
    return $this->belongsTo('App\Events', 'events_id');
  }
}
