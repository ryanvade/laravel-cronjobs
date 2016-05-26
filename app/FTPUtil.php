<?php
use App\Project;
function createprojectfile(Project $project)
{
    $date = new DateTime;
    $filename = $project['project_name'] . '-' . $date->format('mdY') . '.txt';
    $content = getContentFromProject($project);
    Storage::disk('local')->put($filename, $content);
    return $filename;
}

function ftpUpload(Project $project, $filename)
{
    $conn_id = ftp_connect($project['storage_server_url'], $project['storage_server_port']);
    if(!$conn_id)
    {
      Log::error('Could not connect to the FTP server '. $project['storage_server_url']);
      exit('Connection Error');
    }

      if(!ftp_login($conn_id, $project['storage_server_username'], $project['storage_server_password']))
      {
        Log::error('Could not login to FTP server ' . $project['storage_server_url']);
        exit('Connection Error');
      }

      /* Need this for testing, since ITS is blocking normal FTP connections,
       * turning on passive connections fixes it but not all servers allow it.
       */
       #TODO: Determine if passive connections are needed for each server
      if(!ftp_pasv($conn_id, $project['isPassive']))
      {
        Log::error('Could not setup Passive connection on server' . $project['storage_server_url']);
        exit('Connection Error');
      }else {
        Log::info('Set passive connection to ' . $project['isPassive']);
      }

    // Send the file
    if(ftp_put($conn_id, $filename, 'storage/app/' . $filename, FTP_BINARY))
    {
      Log::info('Sent ' . $filename . ' to ' . $project['storage_server_url']);
    }
    else{
      Log::error('Did not send ' . $filename . ' to ' . $project['storage_server_url']);
      exit('Connection Error');
    }https://duckduckgo.com/?q=aurh&t=ffab&ia=web
    ftp_close($conn_id);
    #TODO: Delete the temporary file
}

function getContentFromProject(Project $project)
{
  # TODO: Return actual project data
  return $project['project_name'];
}
