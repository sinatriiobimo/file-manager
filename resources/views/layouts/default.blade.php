<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Manager | @yield('title')</title>

    {{-- style --}}
    @stack('before-style')
    @include('includes.style')
    @stack('after-style')

</head>
<body>
    
        @include('includes.sidebar')

    <div id="right-panel" class="right-panel">
        @include('includes.navbar')
        <div id="content-panel" class="content">
            @yield('nameContent')
            @yield('content')
        </div>
    </div>

    {{-- script --}}
    @stack('before-script')
    @include('includes.script')
    @stack('after-script')
</body>
</html>