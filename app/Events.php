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
}
