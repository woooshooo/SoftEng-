<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowDetails extends Model
{
  //Table Name
  protected $table = 'borrow_details';
  //Primary Key
  public $primaryKey = 'borrow_details_id';
  //Timestamps
  public $timestamps = true;


  public function borrow()
  {
    return $this->belongsTo('App\Borrow','borrow_id');
  }
  public function itemdetails()
  {
    return $this->hasMany('App\ItemDetails', 'equipment_details_id');
  }

}
