<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Stupid Simple Passphrase</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('/img/icon.jpg') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <!-- Icons -->
    <link href="{{ asset('/icons/boxicons-2.1.4/css/boxicons.css') }}" rel="stylesheet"/>

    <!-- Styles -->
    <link href="{{ asset('/css/toastify.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/css/normalize.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/css/skeleton.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/css/utils.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet"/>

</head>
<body data-csrf='{{ csrf_token() }}'>
<div class="wrapper">
    <div class="container full-view">
        <div class="row centered">
            <div class="twelve columns">
                <img class="center" src="{{ asset('/img/password-generator.gif') }}"/>
                <h1>Stupid Simple Passphrase</h1>

                <form id="passwordGeneratorForm">
                    <sup>Words <span id="wordRangeValue"></span></sup>
                    <div id="input">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <div class="slideContainer">
                            <input name="words" type="range" min="3" max="12" value="6" class="w-100" id="wordRange">
                        </div>
                    </div>
                    <div id="output">
                        <div class="passwordContainer">
                            <input type="text" class="disabled u-full-width" readonly="readonly" id="passwordOutput"/>
                        </div>
                    </div>
                    <div id="actions">
                        <span>
                            <a href="#" id="actionRegenerate" class="button">Regenerate</a>
                            <a href="#" id="actionCopy" class="button">Copy</a>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<footer>
    &copy; 2024 Brett Spaulding
</footer>

<!-- Scripts -->
<script defer src="{{ asset('/js/alpine.min.js') }}"></script>
<script src="{{ asset('/js/htmx.min.js') }}"></script>
<script src="{{ asset('/js/jquery.min.js') }}"></script>
<script src="{{ asset('/js/toastify.min.js') }}"></script>
<script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>
