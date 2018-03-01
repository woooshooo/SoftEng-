<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemsProject extends Model
{
  //Table Name
  protected $table = 'items_project';
  //Primary Key
  public $primaryKey = 'items_project_id';
  //Timestamps
  public $timestamps = false;
}
