<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  protected $fillalble = [
    'server_url', 'server_username', 'server_password', 'server_is_anonymous'
  ];
}
