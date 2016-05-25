<!DOCTYPE html>
<html>
    <head>
        <title>groups</title>

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
                align-content: center;
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
           @yield('content')
       </div>
    </body>
</html>
