<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no made_by_sandev">
    <title>{{ env('APP_NAME') }} - {{ $title ?? ' ' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('style')
</head>

<body>
    @include('pages.partials.nav')
    {{ $content }}
    @include('pages.partials.footer')
    @stack('script')
</body>

</html>
