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
            <div>
              {{ $server_url }}
            </div>
            <div>
              {{ $server_port }}
            </div>
            <div>
              {{ $server_username }}
            </div>
            <div>
              {{ $server_password }}
            </div>
            <div>
              {{ $project_selection }}
            </div>
            </div>
        </div>
    </body>
</html>
