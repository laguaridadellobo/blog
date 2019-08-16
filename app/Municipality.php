<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
  public function dependences() {
    return $this->hasMany('App\Dependence');
  }
}
