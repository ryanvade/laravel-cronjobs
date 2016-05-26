<?php

function sftpUpload(Project $project, $filename)
{
  if($connection == true){
      $connection = ssh2_connect('storage_server_url', 'storage_server_port');
      Log::info('Valid connection.');
    }else{
      Log::error('Could not make connection on server' . $project['storage_server_url']);
      exit('Connection Error');
    }

  if($connection == true){
     ssh2_auth_password($connection, 'storage_server_username', 'storage_server_password');
     Log::info('Valid username and password.');
    }else{
     Log::error('Could not authorize password on server' . $project['storage_server_password']);
     exit('Connection Error');
  }

  if($connection == true){
    ssh2_scp_send($connection, '/storage/app/ . $filename, 'filename', 0644);
    Log::info('Sent to server.');
    }else{
    Log::error('Could not send to  server' . $project['storage_server_url']);
    exit('Connection Error');
  }
  ssh2_exec($connection, 'exit');
  unset($connection);
  }
