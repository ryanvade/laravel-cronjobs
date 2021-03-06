<!DOCTYPE html>
<html>
    <head>
        <title>{{ $project_name }}</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
                color: black;
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
                padding: 10px;
                border-style: solid;
                text-emphasis-color: black;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
            <div>
              <h1>{{ $project_name }}<h1>
            </div>
            <div>
              Server URl:  {{ $server_url }}
            </div>
            <div>
              Server Port:  {{ $server_port }}
            </div>
            <div>
              Server Username: {{ $server_username }}
            </div>
            <div>
              Server Password: {{ $server_password }}
            </div>
            <div>
              <a href="/ftp/setup">Update These Settings</a>
            </div>
            </div>
        </div>
    </body>
</html>
