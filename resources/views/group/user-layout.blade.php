@extends('layout')
@section('content')
<h1>{{ $project_name }}</h1>
<div><a href="mailto:{{ $admin_email }}">{{ $admin_name }}</a></div>
@endsection
@stop
