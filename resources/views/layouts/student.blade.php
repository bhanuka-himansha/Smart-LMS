<html>

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>{{ env('APP_NAME') }} - {{ $title ?? ' ' }}</title>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('student.partials.css')
    @stack('style')
</head>

<body class="min-h-screen bg-white dark:bg-slate-900 font-dm-sans">
    <!-- Preloader -->
    @include('student.partials.preloader')

    <div id="inner-section" class="hidden">
        <!-- Nav -->
        @include('student.partials.nav')

        <!-- Content -->
        {{ $content }}

        <!-- Footer -->
        @include('student.partials.footer')
    </div>

    <!-- Scripts -->
    @include('student.partials.js')
    @stack('script')

    <!-- Notifications -->
    @include('partials.notify');
</body>

</html>
