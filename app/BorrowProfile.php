<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowProfile extends Model
{
  //Table Name
  protected $table = 'borrow_profile';
  //Primary Key
  public $primaryKey = 'borrow_profile_id';
  //Timestamps
  public $timestamps = false;
}
