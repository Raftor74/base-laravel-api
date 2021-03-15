<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title ?? config('app.name') }}</title>
        {{-- Styles --}}
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
        @stack('styles')
    </head>
    <body>
        <div id="app">
            @yield('content')
        </div>
        {{-- Scripts --}}
        <script src="{{ mix('/js/app.js') }}"></script>
        @stack('scripts')
    </body>
</html>
