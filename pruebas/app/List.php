<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrackList extends Model
{
  protected $fillable = [
      'name', 'creation_date'
  ];

  public function tracks() {
    return $this->belongsToMany('Track');
  }
}
