<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use App\Http\Requests;
use App\Project;
use App\Group;
use App\User;
use Auth;

class FtpController extends Controller
{
    public function setup(Request $request)
    {
      #TODO: Proper way to get the group a user belongs to than hard coding;
      if(Auth::check())
      {
        $user = Auth::user();
        $group = Group::find($user->group_id);
        $project = Project::find($group->project_id);
        if(Gate::denies('view-ftp', $project))
        {
          $admin = User::find($project->project_admin_id);
          return view('unathorized', [
            'admin_name' => $admin->name,
            'admin_email' => $admin->email,
          ]);
        }else {
          return view('ftp.setup', ['project_name' => $project->project_name]);
        }
      }else {
        return redirect('/login');
      }
    }



    public function update(Request $request)
    {
      if(Auth::check())
      {
        $server_url = $request->get('server_url');
        $server_port = $request->get('server_port');
        $server_username = $request->get('server_username');
        $server_password = $request->get('server_password');
        $server_type = $request->get('servertype');
        $project_selection = $request->get('project_selection');

        $this->validate($request,[
          'server_url' => 'required',
          'server_username' => 'required|min:2',
          'server_password' => 'required|min:5'
        ]);

        if($server_type == 'SFTP'){
          $server_type = true;
        }else{
          $server_type = false;
        }

        if(!isset($server_port) || trim($server_port) == '')
        {
          if($server_type == true){
            $server_port = 22;
          }else {
            $server_port = 21;
          }
        }
        $user = Auth::user();
        $group = Group::find($user->group_id);
        $project = Project::find($group->project_id);

        if(Gate::denies('update-ftp', $project))
        {
          $admin = User::find($project->project_admin_id);
          return view('unathorized', [
            'admin_name' => $admin->name,
            'admin_email' => $admin->email,
          ]);
        }

        $project->update([
          'storage_server_url' => $server_url,
          'storage_server_port' => $server_port,
          'storage_server_username' => $server_username,
          'storage_server_password' =>  $server_password,
          'storage_server_is_sftp' => $server_type
        ]);

        return view('ftp.show', [
          'server_url' => $server_url,
          'server_port' => $server_port,
          'server_username' => $server_username,
          'server_password' => $server_password,
          'project_name' => $project->project_name
        ]);
      }else {
        return redirect('/login');
      }
    }

    public function show(Request $request)
    {
      if(Auth::check())
      {
        $user = Auth::user();
        $group = Group::find($user->group_id);
        $project = Project::find($group->project_id);
        if(Gate::denies('view-ftp', $project))
        {
          $admin = User::find($project->project_admin_id);
          return view('unathorized', [
            'admin_name' => $admin->name,
            'admin_email' => $admin->email,
          ]);
        }else {
          return view('ftp.show', [
            'server_url' => $project->storage_server_url,
            'server_username' => $project->storage_server_username,
            'server_password' => $project->storage_server_password,
            'server_port' => $project->storage_server_port,
            'project_name' => $project->project_name,
          ]);
        }
      }else {
        return redirect('/login');
      }
    }
}
