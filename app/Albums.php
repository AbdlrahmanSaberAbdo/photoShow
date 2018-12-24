<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    protected $fillable = array('name', 'description', 'cover');

    public function photos() {
      return $this->hasMany('App\Photo');
    }
}
