<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
  //Table Name
  protected $table = 'events';
  //Primary Key
  public $primaryKey = 'events_id';
  //Timestamps
  public $timestamps = true;

  protected $fillable = [
      'events_name, events_details,	events_startdate,	events_deadline,	events_status'
  ];
  public function profileevent()
  {
    return $this->belongsTo('App\ProfileEvents','profile_events_id');
  }
  public function milestoneevent()
  {
    return $this->hasMany('App\MilestoneEvents', 'milestone_events_id');
  }
  public function itemdetails()
  {
    return $this->hasMany('App\ItemsProject', 'equipment_details_id');
  }
}
