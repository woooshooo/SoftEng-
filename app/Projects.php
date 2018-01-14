<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
  //Table Name
  protected $table = 'projects';
  //Primary Key
  public $primaryKey = 'projects_id';
  //Timestamps
  public $timestamps = true;

  protected $fillable = [
      'projects_name, projects_details,	projects_startdate,	projects_deadline,	projects_status'
  ];
}
