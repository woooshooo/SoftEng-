<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemDetails extends Model
{
  //Table Name
  protected $table = 'equipment_details';
  //Primary Key
  public $primaryKey = 'equipment_details_id';
  //Timestamps
  public $timestamps = false;
  protected $fillable = ['item_status'];
  public function item()
  {
    return $this->belongsTo('App\Items', 'equipment_id');
  }
  public function borrow()
  {
    return $this->belongsToMany('App\Borrow', 'borrow_id');
  }
  public function borrowdetail()
  {
    return $this->belongsToMany('App\BorrowDetails', 'borrow_id');
  }
  public function projects()
  {
    return $this->belongsToMany('App\Projects','items_project','projects_id','equipment_details_id');
  }
  public function events()
  {
    return $this->belongsToMany('App\Events','items_event','events_id','equipment_details_id');
  }

}
