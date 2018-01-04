<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
  protected $fillable = [
      'title', 'bpm', 'key', 'duration', 'price'
  ];

  public function release() {
    return $this->belongsTo('Release');
  }
  public function lists() {
    return $this->belongsToMany('List');
  }
  public function genre() {
    return $this->belongsTo('Genre');
  }
}
