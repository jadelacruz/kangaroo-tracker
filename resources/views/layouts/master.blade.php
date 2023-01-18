<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body class="dx-viewport">

    @include('partials.nav')
    
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

    @include('partials.script')
</body>
</html>