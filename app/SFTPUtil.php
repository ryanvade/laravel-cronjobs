<?php
use App\Project;
use phpseclib\Net\SFTP;

function sftpUpload(Project $project, $filename)
{
  $sftp = new SFTP($project['storage_server_url'], $project['storage_server_port'], 10);
  if($sftp->login($project['storage_server_username'], $project['storage_server_password']))
  {
    Log::info('Login successful on ' . $project['storage_server_url'] . 'with '. $project['storage_server_username']);
  }else {
    Log::error('Login not successful on ' . $project['storage_server_url'] . 'with '. $project['storage_server_username']);
    Log::error($sftp->getLastError());
    exit();
  }

  if($sftp->isConnected())
  {
    Log::info('sftp connection establised to ' . $project['storage_server_url']);
  }else {
    Log::error('Error establishing sftp connection to ' . $project['storage_server_url']);
    Log::error($sftp->getLastError());
    exit();
  }

  if($sftp->put($filename, 'storage/app/' . $filename))
  {
    Log::info('Succcesfully uploaded ' . $filename . 'to ' . $project['storage_server_url']);
  }else {
    Log::error('Could not upload ' . $filename . 'to ' . $project['storage_server_url']);
    Log::error($sftp->getLastError());
    exit();
  }
  $sftp->disconnect();

}
