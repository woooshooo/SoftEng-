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
  public function profileeventassigned()
  {
    return $this->belongsTo('App\ProfileEventsAssigned','profile_events_assigned_id');
  }
  public function profileeventworked()
  {
    return $this->belongsTo('App\ProfileEventsWorked','profile_events_worked_id');
  }
  public function itemdetails()
  {
    return $this->hasMany('App\ItemsProject', 'equipment_details_id');
  }
}
