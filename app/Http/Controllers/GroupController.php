<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Group;
use App\User;
use App\Project;
use App\Http\Requests;

class GroupController extends Controller
{
    public function show(Request $request)
    {
        $user = Auth::user();
        $group = $user->group_id;
        $project = Project::find($group->project_id);
        if(Gate::denies('view-group', $group))
        {
          $admin = User::find($group->project_admin_id);
          return view('unathorized', [
            'admin_name' => $admin->name,
            'admin_email' => $admin->email,
          ]);
        }else {
          if(Gate::denies('edit-group', $group))
          {
            
          }else {

          }
        }
    }

    public function update(Request $request)
    {

    }

    public function remove(Request $request)
    {


    }
}
