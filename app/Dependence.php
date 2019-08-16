<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependence extends model
{
        public function municipality() {
        return $this->belongsTo('App/Municipality', 'municipality_id');
        }
}
