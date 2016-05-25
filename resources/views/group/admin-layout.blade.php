@extends('group.layout')
@section('content')
<h1>{{ $project_name }}</h1>
<div>
  <ul>
    @foreach ($users as $user)
      <li><a href="/group/edit/{{ $user->id }}">{{ $user->name }}</a></li>
    @endforeach
</ul>
</div>
<div>
  <a href="/ftp">FTP Settings</a>
</div>

@stop
