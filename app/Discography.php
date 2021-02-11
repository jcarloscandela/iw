<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discography extends Model
{
  protected $fillable = [
      'name', 'logo'
  ];

  public function releases() {
    return $this->hasMany('Release');
  }
  //añadir usuario sigue_a(?)
}
