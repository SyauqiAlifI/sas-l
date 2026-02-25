<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
        @livewireStyles
    </head>
    <body class="block! overflow-x-hidden">
        <x-app.navbar />
        {{ $slot }}
        <x-app.footer />
        @fluxScripts
        @livewireScripts
    </body>
</html>
