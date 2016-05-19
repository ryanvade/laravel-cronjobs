<?php
use App\Project;
// May need to find where Storage is located in the project
function createprojectfile(Project $project)
{
    $date = new DateTime;
    $filename = $project['project_name'] . '-' . $date->format('mdY') . '.txt';
    $content = $project['project_name'];

    Storage::disk('local')->put($filename, $content);

    return $filename;
}

function upload(Project $project, $filename)
{
    $conn_id = ftp_connect($project['storage_server_url']);
    $login_result = ftp_login($conn_id,
        $project['storage_server_username'],
        $project['storage_server_password']
      );

    // Send the file
    if(ftp_put($conn_id, $filename, 'storage/app' . $filename, FTP_ASCII))
    {
      echo 'success';
    }
    else{
      echo 'failure';
    }

    ftp_close($conn_id);
}
