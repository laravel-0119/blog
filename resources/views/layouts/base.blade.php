<html>
<head>
    <title>{{ $title }}</title>

    @section('head_scripts')
        <script src="jquery.js"></script>
    @show
</head>

<body>
    <header>
        @section('header')
            This is the default header.
        @show
    </header>

    <div class="content">
        @yield('content', 'I`m content!')
    </div>

    <footer>
        @include('blocks.footer')
    </footer>
</body>
</html>