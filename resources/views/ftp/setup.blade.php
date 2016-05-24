<!DOCTYPE html>
<html>
    <head>
        <title>FTP Setup</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    </head>
    <body>
      <h1>{{ $project_name }}</h1>
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
