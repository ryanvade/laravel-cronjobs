@extends('group.layout')
@section('content')
<h1>{{ $project_name }}</h1>
<div>
  <ul>
  @foreach ($users as $user)
    <li>{{ $user->name }}</li>
  @endforeach
</ul>
</div>
<div>
  <a href="/group/edit">Edit Group</a>
</div>
<div>
  <a href="/ftp">FTP Settings</a>
</div>

@stop
