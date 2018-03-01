<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
  //Table Name
  protected $table = 'borrow';
  //Primary Key
  public $primaryKey = 'borrow_id';
  //Timestamps
  public $timestamps = false;


  public function profile()
  {
    return $this->belongsToMany('App\Profile','borrow_profile','borrow_id','profile_id');
  }
  public function borrowdetail()
  {
    return $this->hasMany('App\BorrowDetails','borrow_id');
  }
  public function itemdetails()
  {
    return $this->hasMany('App\ItemDetails', 'equipment_details_id');
  }

}
