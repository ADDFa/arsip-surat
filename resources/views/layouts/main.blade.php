<!doctype html>
<html lang="en">

<head>
    <script type="text/javascript" src="/js/resources/loader.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Arsip Surat' }}</title>

    {{-- My Css --}}
    <link rel="stylesheet" href="/css/index.css">
</head>

<body>
    {{-- notification --}}
    <span id="notification" data-icon="{{ session('icon') }}" data-message="{{ session('message') }}"></span>

    @include('partials.navbar')

    @include('partials.sidebar')

    <script src="/js/index.js"></script>
</body>

</html>