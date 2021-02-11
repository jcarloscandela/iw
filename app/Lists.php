<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
  protected $fillable = [
      'name', 'creation_date'
  ];

  public function tracks() {
    return $this->belongsToMany('Track');
  }
  public funtion user() {
    return $this->belongsTo('User');
  }
}
