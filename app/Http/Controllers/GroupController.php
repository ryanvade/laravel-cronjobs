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
        if(Auth::check())
        {
          $user = Auth::user();
          $group = Group::find($user->group_id);
          $project = Project::find($group->project_id);

          if(Gate::denies('view-group', $group))
          {
            $admin = User::find($project->project_admin_id);
              return view('unathorized', [
              'admin_name' => $admin->name,
              'admin_email' => $admin->email,
            ]);
          }else {
            if(Gate::denies('edit-group', $group))
            {
              $admin = User::find($project->project_admin_id);
              return view('group.user-layout', [
                'project_name' => $project->project_name,
                'admin_email' =>  $admin->email,
                'admin_name' => $admin->name,
              ]);
            }else {
              $users = $group->users;
              return view('group.admin-layout', [
                  'project_name' => $project->project_name,
                  'users' => $users,
                ]);
            }
          }
        }else {
          return redirect('/login');
        }
    }

  public function editGroup(Request $request)
    {
      if(Auth::check())
      {
        $user = Auth::user();
        $group = Group::findOrFail($user->group_id);
        $project = Project::findOrFail($group->project_id);

        if(Gate::denies('edit-group', $group))
        {
          $admin = User::find($project->project_admin_id);
          return view('unathorized', [
          'admin_name' => $admin->name,
          'admin_email' => $admin->email,
        ]);
        }else {
          $users = $group->users;
            return view('group.edit', [
              'project_name' => $project->project_name,
              'users' => $users,
            ]);
        }
      }else {
        return redirect('/login');
      }
    }

    public function editUser(Request $request, $id)
    {
      if(Auth::check())
      {
        $user = Auth::user();
        $group = Group::find($user->group_id);
        $project = Project::find($group->project_id);

        if(Gate::denies('edit-group', $group))
        {
          $admin = User::find($project->project_admin_id);
          return view('unathorized', [
          'admin_name' => $admin->name,
          'admin_email' => $admin->email,
        ]);
        }else {
          $user = User::findOrFail($id);
            return view('group.user', [
              'user' => $user,
            ]);
        }
      }else {
        return redirect('/login');
      }
    }

    public function updateUser(Request $request, $id)
    {
      if(Auth::check())
      {
        $user = Auth::user();
        $group = Group::find($user->group_id);
        $project = Project::find($group->project_id);

        if(Gate::denies('edit-group', $group))
        {
          $admin = User::find($project->project_admin_id);
          return view('unathorized', [
          'admin_name' => $admin->name,
          'admin_email' => $admin->email,
        ]);
        }else {
          $user_name = $request->get('user_name');
          $user_email = $request->get('user_email');
          $remove_from_group = $request->get('remove-from-group');
          $edited_user = User::find($id);
          if(isset($remove_from_group))
          {
            $edited_user->update([
              'name' => $user_name,
              'email' => $user_email,
              'group_id' => 0
            ]);
            $group->users()->detach('group_id');
          }else {
            $edited_user->update([
              'name' => $user_name,
              'email' => $user_email
            ]);
          }
        }
        return redirect('/group');
      }else {
        return redirect('/login');
      }
    }
}
