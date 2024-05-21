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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <!-- Fonts -->


    <!-- CSS -->
    <link rel="stylesheet" href="/admino/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/admino/vendors/base/vendor.bundle.base.css">
    <link rel="stylesheet" href="/admino/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="/admino/css/style.css">
    <link rel="stylesheet" href="/admino/css/tableStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="shortcut icon" href="/admino/images/favicon.png" />


    <style>
        div.dataTables_wrapper div.dataTables_length select {
            width: 50px;
            display: inline-block;
        }
    </style>



</head>

<body>
    <div class="container-scroller">
        @include('admin.partial.header')
        <div class="container-fluid pt-5 page-body-wrapper">
            @include('admin.partial.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('admin.partial.footer')
            </div>
        </div>
    </div>
    <script>
        var brand = document.getElementById('brand');
        var parts = ['orders', 'brand', 'category', 'discount', 'attributes', 'product', 'user', 'paymentMethod'];
        for (var i = 0; i < parts.length; i++) {
            if (window.location.href.includes(parts[i])) {
                var tmp = document.getElementById(parts[i]);
                tmp.classList.add('active');
            }
        }
        @if (Session::has('message'))
            toastr.{{ Session::get('alert-type', 'info') }}("{{ Session::get('message') }}");
        @endif
    </script>
</body>

</html>
