<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- style --}}
    @stack('before-style')
    @include('includes.style')
    @stack('after-style')

</head>
<body>
    <div class="row login-section">
        <div class="col-lg-4 reglo-section">
            @include('includes.navbegin')
            @yield('name-content')
            @yield('content')
        </div>
        <div class="col big-banner"></div>
    </div>
    {{-- script --}}
    @stack('before-script')
    @include('includes.script')
    @stack('after-script')
</body>
</html>