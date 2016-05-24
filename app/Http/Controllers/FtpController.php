<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use App\Http\Requests;
use App\Project;
use App\Group;
use Auth;

class FtpController extends Controller
{
    public function setup(Request $request)
    {
      #TODO: Proper way to get the group a user belongs to than hard coding;
      $user = Auth::user();
      $group = Group::find($user->group_id);
      $project = Project::find($group->project_id);
      if(Gate::denies('view-ftp', $project))
      {
        echo 'nope';
      }else {
        return view('ftp.setup', ['project_name' => $project->project_name]);
      }
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

      $project = Project::where('project_name', '=', $project_selection)->firstOrFail();
      if(Gate::denies('update-ftp', $project))
      {
        echo 'nope';
      }

      $project->update([
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
