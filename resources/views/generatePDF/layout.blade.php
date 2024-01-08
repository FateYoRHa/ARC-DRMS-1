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
    <link href="{{ public_path('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <style>
        .text-align-center {
            text-align: center;
        }

        .table-margin {
            margin-top: 50px;
        }

        .table-margin-name {
            padding-top: 20%;
        }

        .margin-all {
            margin-top: 100px;
            margin-bottom: 100px;
            margin-right: 100px;
            margin-left: 100px;

        }

        td {
            text-align: left;
            border: 2px solid;
            font-size: 25px
        }


        th {
            text-align: center;
            text-transform: uppercase;
            border: 2px solid;
            font-size: 11px;
        }

        table {
            width: 100%;
            border: 2px solid;
        }

        .img {
            display: block;
            margin-left: auto;
            margin-right: auto;

        }

        .bodytd {
            padding: 10px;
            text-align: left;
            border: 1px solid;
            font-size: 25px
        }


        .bodyth {
            text-align: center;
            text-transform: uppercase;
            border: 1px solid;
            font-size: 20px;
        }

        .bodytable {
            width: 100%;
            border: 1px solid;
        }

        .column {
            float: left;
            width: 50%;
            padding: 10px;
            height: 300px;
            /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .rectangle {
            height: 10px;
            width: 20px;
            border: 1px black;
            float: left;
        }
    </style>
</head>

<body>

    {{-- @include('generatePDF._header') --}}

    @yield('content')

    {{-- @include('generatePDF._footer') --}}
</body>

</html>
