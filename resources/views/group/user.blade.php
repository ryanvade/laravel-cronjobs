@extends('group.layout')
@section('content')
<h1>{{ $user->name }} - Edit</h1>

  <div>
      <div>
          <form method="POST" action="/group/edit/{{ $user->id }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              User Name: <textarea rows="1" name="user_name" class="form-control" placeholder="{{ $user->name }}">{{ $user->name }}</textarea>
            </div>
            <div class="form-group">
            User Email:  <textarea rows="1" name="user_email" class="form-control" placeholder="{{ $user->email }}">{{ $user->email }}</textarea>
            </div>
            <div class="form-group">
              <input type="checkbox" name="remove-from-group" value="RG">Remove From Group?</input>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">
                Submit
              </button>
            </div>
          </form>
        </div>
      </div>
@stop
