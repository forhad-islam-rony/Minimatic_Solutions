<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="/admino/vendors/base/vendor.bundle.base.js"></script>
    <script src="/admino/vendors/chart.js/Chart.min.js"></script>
    <script src="/admino/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="/admino/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="/admino/js/off-canvas.js"></script>
    <script src="/admino/js/hoverable-collapse.js"></script>
    <script src="/admino/js/template.js"></script>
    <script src="/admino/js/dashboard.js"></script>
    <script src="/admino/js/data-table.js"></script>
    <script src="/admino/js/jquery.dataTables.js"></script>
    <script src="/admino/js/dataTables.bootstrap4.js"></script>
    <script src="/admino/js/tablejs.js"></script>
    <script src="/admino/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>


    <!-- Fonts -->


    <!-- CSS -->
    <link rel="stylesheet" href="/admino/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/admino/vendors/base/vendor.bundle.base.css">
    <link rel="stylesheet" href="/admino/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="/admino/css/style.css">
    <link rel="stylesheet" href="/admino/css/tableStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="shortcut icon" href="/admino/images/favicon.png" />

    <style>
        div.dataTables_wrapper div.dataTables_length select {
            width: auto;
            display: inline-block;
        }
    </style>

    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>

<body>
    @yield('content')
    <script>
        @if (Session::has('message'))
            toastr.{{ Session::get('alert-type', 'info') }}("{{ Session::get('message') }}");
        @endif
    </script>
</body>

</html>
