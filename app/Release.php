<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
  protected $fillable = [
      'title', 'creation_date', 'description','picture', 'catalog'
  ];

  public function tracks() {
    return $this->hasMany('Track');
  }
  public function discography() {
    return $this->belongsTo('Discography');
  }
  //añadir artistas
}
