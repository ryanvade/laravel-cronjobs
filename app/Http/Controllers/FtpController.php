<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Project;

class FtpController extends Controller
{
    public function setup(Request $request)
    {
      // With Login
      // $projects = Project::where('user_id', '=', Auth::id());
      // Without Login
      $projects = Project::all();
      return view('ftp.setup', compact('projects'));
    }



    public function update(Request $request)
    {
      // Update Database with values HERE
      $server_url = $request->get('server_url');
      $server_port = $request->get('server_port');
      $server_username = $request->get('server_username');
      $server_password = $request->get('server_password');
      $project_selection = $request->get('project_selection');

      $this->validate($request,[
        'server_url' => 'required',
        'server_username' => 'required|min:2',
        'server_password' => 'required|min:5',
        'project_selection' => 'required'
      ]);

      if(!isset($server_port) || trim($server_port) == '')
      {
        $server_port = 21;
      }

      Project::where('project_name', '=', $project_selection)->firstOrFail()->update([
        'storage_server_url' => $server_url,
        'storage_server_port' => $server_port,
        'storage_server_username' => $server_username,
        'storage_server_password' =>  $server_password
      ]);

      return view('ftp.show', [
        'server_url' => $server_url,
        'server_port' => $server_port,
        'server_username' => $server_username,
        'server_password' => $server_password,
        'project_selection' => $request->get('project_selection')
      ]);
    }

    public function show(Request $request)
    {
      // TESTING
      return view('ftp.show', [
        'server_url' => $request->get('server_url'),
        'server_username' => $request->get('server_username'),
        'server_password' => $request->get('server_password'),
        'project_selection' => $request->get('project_selection')
      ]);
    }
}
