<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  protected $fillable = [
    'storage_server_url', 'storage_server_username', 'storage_server_password',
    'server_is_anonymous', 'storage_server_port', 'storage_server_is_sftp'
  ];

  public function group()
  {
    return $this->belongsTo('App\Group', 'project_id');
  }
}
