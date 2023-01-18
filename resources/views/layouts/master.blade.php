<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body class="dx-viewport">

    @include('partials.nav')
    @include('partials.breadcrumb')

    @yield('content')

    @include('partials.script')

</body>
</html>