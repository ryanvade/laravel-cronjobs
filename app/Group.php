<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function admin()
    {
      return $this->hasOne('App\User', 'project_admin_id');
    }

    public function users()
    {
      return this->belongsToMany('App\User')
    }
}
