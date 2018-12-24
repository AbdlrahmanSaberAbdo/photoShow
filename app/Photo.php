<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = array('album_id', 'title', 'description', 'size', 'photo');

    public function albums() {
        return $this->belongsTo('App\Albums');
    }
}
