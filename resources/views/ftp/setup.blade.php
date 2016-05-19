<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <form method="POST" action="#">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group">
                    <textarea name="server_url" class="form-control" placeholder="Server IP">
                      {{ old('server_url') }}
                    </textarea>
                  </div>
                  <div class="form-group">
                    <textarea name="server_username" class="form-control" placeholder="Server Username">

                    </textarea>
                  </div>
                  <div>
                    <textarea name="server_password" class="form-control" placeholder="Server Password">

                    </textarea>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                      Submit
                    </button>
                  </div>
                </form>
            </div>
        </div>
    </body>
</html>
