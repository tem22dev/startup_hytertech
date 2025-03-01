<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="{{env('APP_URL')}}/assets/systems/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @if (isset($metaTagsData))
    @include('outside.global.meta-tags')
    @endif
    @include('outside.global.style-import')
</head>
<body>
    @include('outside.global.body-import')
    @include('outside.global.header')
    @yield('content')
    @include('outside.global.footer')
    @yield('scripts')
    @include('outside.global.script-import')
</body>
</html>
