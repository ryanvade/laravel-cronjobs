<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Project;

class FtpController extends Controller
{
    public function setup()
    {
      return view('ftp.setup');
    }

    public function update(Request $request)
    {
      // Update Database with values HERE
      $server_url = $request->get('server_url');
      $server_username = $request->get('server_username');
      $server_password = $request->get('server_password');

      // Find the Project given the User ID? Project Name?
      $project = Project::find(1);
      //$project->update($request->all());
      $project->save();

      return view('ftp.show', [
        'server_url' => $server_url,
        'server_username' => $server_username,
        'server_password' => $server_password
      ]);
    }

    public function show(Request $request)
    {
      // TESTING
      return view('ftp.show', [
        'server_url' => $request->get('server_url'),
        'server_username' => $request->get('server_username'),
        'server_password' => $request->get('server_password')
      ]);
    }
}
