<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
   protected $fillable = array('track_id', 'user_id');
    public function user() {
        return $this->belongsTo('User');
      }
      public function track() {
        return $this->belongsTo('Track');
      }
}
  