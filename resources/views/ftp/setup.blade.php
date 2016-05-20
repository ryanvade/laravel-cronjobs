<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="container">
            <div class="content">
                <form method="POST" action="/ftp/update">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group">
                    <textarea name="server_url" class="form-control" placeholder="Server IP" required></textarea>
                  </div>
                  <div class="form-group">
                    <textarea name="server_port" class="form-control" placeholder="Server Port, 21"></textarea>
                  </div>
                  <div class="form-group">
                    <textarea name="server_username" class="form-control" placeholder="Server Username" required></textarea>
                  </div>
                  <div>
                    <textarea name="server_password" class="form-control" placeholder="Server Password" required></textarea>
                  </div>
                  <div cladd="form-group">
                    Select a project:
                    <select name="project_selection">
                      @foreach ($projects as $project)
                      <option value="{{ $project->project_name }}">{{ $project->project_name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                      Submit
                    </button>
                  </div>
                </form>

                @if(count($errors))
                @foreach ($errors->all() as $error)
                    <ul>
                      <li>{{$error}}</li>
                    </ul>
                @endforeach
                @endif
            </div>
        </div>
    </body>
</html>
