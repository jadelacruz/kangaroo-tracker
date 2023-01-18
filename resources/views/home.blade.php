<!DOCTYPE html>
<html lang="en">
<head>
    <title> Vokke - Kangaroo Tracker</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"   content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/22.2.3/css/dx.light.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/app.css') }}" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn3.devexpress.com/jslib/22.2.3/js/dx.all.js"></script>
</head>
<body class="dx-viewport">

    <nav class="navbar bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand textLogo" href="#">Vokke</a>
        </div>
    </nav>
    
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <p class="h3">Kangaroo Tracker</p>
                <hr />
            </div>

            <div class="col-md-4 mb-3">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-success">Add <i class="fa fa-plus"></i></button>
                    <button type="button" class="btn btn-primary">Update <i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-warning">Delete <i class="fa fa-trash"></i></button>
                </div>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div id="gridContainer"></div>
            </div>

        </div>
    </div>

    <script type="text/javascript" src="{{ Vite::asset('resources/js/app.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>