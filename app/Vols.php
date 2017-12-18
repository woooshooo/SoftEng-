<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vols extends Model
{
    //Table Name
    protected $table = 'vols';
    //Primary Key
    public $primaryKey = 'vol_id';
    //Timestamps
    public $timestamps = true;

    protected $fillable = [
        'cluster', 'course', 'yearlvl','section',
    ];

    public function profile()
    {
      return $this->belongsTo('App\Profile', 'profile_id');
    }
}
?>
