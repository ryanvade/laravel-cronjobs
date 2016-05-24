@extends('layout')
@section('content')
<h1>{{ $project_name }}</h1>
<div>
  <ul>
  @foreach $user as $users
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
@endsection
@stop
