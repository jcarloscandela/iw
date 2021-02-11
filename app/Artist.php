<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
//  protected $table = 'artists';
//  protected $primaryKey = 'name';
  protected $fillable = [
      'name', 'picture', 'biography'
  ];

  public function releases() {
    return $this->hasMany('Release');
  }
  public function users() {
    return $this->belongsToMany('User');
  }
}
