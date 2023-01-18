<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body class="dx-viewport">

    @include('partials.nav')

    @yield('content')

    @include('partials.script')

</body>
</html>