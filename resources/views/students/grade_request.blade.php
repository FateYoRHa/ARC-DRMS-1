<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>Request Form-137</title>
    <link href="{{ public_path('css/app.css') }}" rel="stylesheet">
    <link href="{{ public_path('css/custom.css') }}" rel="stylesheet">
    <link href="{{ public_path('css/media-query.css') }}" rel="stylesheet"> --}}
    <link href="{{ public_path('css/bootstrap.css') }}" rel="stylesheet" type="text/css" >
</head>
<body>
    <div class="primary-details container-fluid">

        <header class="d-flex justify-content-center header-center">
            <img src="{{ public_path('images/ubseal.png') }}" alt="ubseal" class="img-fluid" style="width: 5rem">
            <h5>HEADER STUFF</h5>
        </header>

        <div class="table-responsive">
            <table class="table table-hover table-sm table-md compact">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Date Requested</td>
                        <td>Date Recieved</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $name }}</td>
                        <td>{{ $date }}</td>
                        <td></td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>
</body>
</html>
