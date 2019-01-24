<html>
<head>
    <title>{{ $title }}</title>
    <script src="jquery.js"></script>
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

    @include('blocks.footer')
</body>
</html>