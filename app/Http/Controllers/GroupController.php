<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Gate;
use App\Group;
use App\User;
use App\Project;
use App\Http\Requests;

class GroupController extends Controller
{
    public function show(Request $request)
    {
        $user = Auth::user();
        $group = Group::find($user->group_id);
        $project = Project::find($group->project_id);
        $admin = User::find($group->project_admin_id);

        if(Gate::denies('view-group', $group))
        {
            return view('unathorized', [
            'admin_name' => $admin->name,
            'admin_email' => $admin->email,
          ]);
        }else {
          if(Gate::denies('edit-group', $group))
          {
            return view('group.user-layout', [
              'project_name' => $project->project_name,
              'admin_email' =>  $admin->email,
              'admin_name' => $admin->name,
            ]);
          }else {
            $users = User::where('group_id',  $group->id)->get();
              return view('group.admin-layout', [
                'project_name' => $project->project_name,
                'users' => $users,
              ]);
          }
        }
    }

    public function edit(Request $request)
    {
      $user = Auth::user();
      $group = Group::find($user->group_id);
      $project = Project::find($group->project_id);

      if(Gate::denies('edit-group', $group))
      {
        return view('unathorized', [
        'admin_name' => $admin->name,
        'admin_email' => $admin->email,
      ]);
      }else {
        $users = User::where('group_id',  $group->id)->get();
          return view('group.admin-layout', [
            'project_name' => $project->project_name,
            'users' => $users,
          ]);
      }
    }

}
