<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemsEvent extends Model
{
  //Table Name
  protected $table = 'items_event';
  //Primary Key
  public $primaryKey = 'items_event_id';
  //Timestamps
  public $timestamps = false;
}
