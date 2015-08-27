<!doctype html>
<html lang="en">
<head>
    <title>@yield('title')</title>

    {{-- Meta --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSS --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/css/themes/bootstrap-readable.min.css" />
    <link rel="stylesheet" href="/css/master.css" />
    
</head>
<body>

    <header class="app-header">
        @yield('app-header')
    </header>

    <main class="app-main container">
        @yield('app-main')
    </main>

    <footer class="app-footer container text-center">
            &copy; Copyright <?php echo date('Y'); ?>, made in Bulgaria. <a href="">Terms of use</a>
    </footer>

	{{-- Scripts --}}
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="/libs/bootbox.min.js"></script>
    <script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
    <script src="/libs/jquery-confirm.js"></script>
    <script src="/libs/custom/script.js"></script>

</body>
</html>