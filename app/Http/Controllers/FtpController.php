<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FtpController extends Controller
{
    public function setup()
    {
      return view('ftp.setup');
    }
}
