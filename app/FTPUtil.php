<?

use Storage;
// May need to find where Storage is located in the project
public function createprojectfile(Project $project)
{
    $date = new DateTime;
    $filename = $project->get('project_name') . '-' . $date->format('mdY');
    $content = $project->get('project_name');

    Storage::disk('local')->put($filename, $contents);

    return $filename;
}

public function upload(Project $project, $filename)
{
    $conn_id = ftp_connect($project->get('storage_server_url'));
    $login_result = ftp_login($conn_id,$project->get('storage_server_username'),$project->get('storage_server_password'));

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
