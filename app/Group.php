<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded = [

    ];

    public function users()
    {
      return $this->belongsToMany('App\User')->withPivot('user_id', 'group_id');
    }
}
