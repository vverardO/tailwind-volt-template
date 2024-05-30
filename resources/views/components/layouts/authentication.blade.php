<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Page Title' }}</title>
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/images/favicon.png')}}"/>
        @livewireStyles
    </head>
    <body class="bg-gray-100">
        {{ $slot }}
        @livewireScripts
    </body>
</html>

