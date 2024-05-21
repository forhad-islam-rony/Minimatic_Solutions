<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Minimatic Solutions') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery-1.11.1.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>

<body>
    <?php
    $rightAdvts = App\Models\Advertisment::where('position', 'right')
        ->limit(5)
        ->get();
    $leftAdvts = App\Models\Advertisment::where('position', 'left')
        ->limit(5)
        ->get();
    
    ?>
    @include('partial.header')
    <div id="app" style="margin-top: 120px;display:flex;">
        <section class="left"
            style="min-height:100vh;min-width: 15vw;max-width: 15vw;word-wrap:break-word;background: rgba(240, 231, 231, 0.5);">
            <div style="padding: 5px;">
                @foreach ($leftAdvts as $advertisement)
                    <br /><br />
                    <a href="{{ $advertisement->url }}" target="_blank">
                        <img src="{{ $advertisement->image }}" alt="" id="{{ $advertisement->id }}"
                            style="display:block;padding: 40px;">
                    </a>
                @endforeach
            </div>
        </section>
        <main class="py-4 center-main" style="max-width: 70vw;overflow: hidden;">
            @yield('content')
        </main>
        <section class="right"
            style="min-height:100vh;min-width: 15vw;max-width: 15vw;word-wrap:break-word;background: rgba(240, 231, 231, 0.5);">
            <div id="hide1" style="display:block">
                @foreach ($rightAdvts as $advertisement)
                    <br /><br />
                    <a href="{{ $advertisement->url }}" target="_blank">
                        <img src="{{ $advertisement->image }}" alt="" id="{{ $advertisement->id }}"
                            style="display:block;padding: 40px;">
                    </a>
                @endforeach
            </div>
        </section>
    </div>
    @include('partial.footer')

    <script>
        @foreach ($rightAdvts as $advertisement)
            setTimeout(function() {
                $('#{{ $advertisement->id }}').hide()
            }, {{ $advertisement->duration }});
        @endforeach
        @foreach ($leftAdvts as $advertisement)
            setTimeout(function() {
                $('#{{ $advertisement->id }}').hide()
            }, {{ $advertisement->duration }});
        @endforeach
        @if (Session::has('message'))
            toastr.{{ Session::get('alert-type', 'error') }}("{{ Session::get('message') }}");
        @endif
        @if ($errors->any())
            toastr.error('{{ $errors->first() }}');
        @endif
    </script>
</body>

</html>
