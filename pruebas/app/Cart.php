<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function user() {
        return $this->belongsTo('User');
      }
      public function track() {
        return $this->belongsTo('Track');
      }
}
