<!doctype html>
<html lang="en">

<head>
    <script type="text/javascript" src="/js/resources/loader.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Arsip Surat' }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    {{-- My Css --}}
    <link rel="stylesheet" href="/css/main.css">
    @if ($style ?? false)
    <link rel="stylesheet" href="/css/{{ $style }}.css">
    @endif
</head>

<body>
    @include('partials.navbar')

    @include('partials.sidebar')

    <script src="/js/main.js"></script>
    @if ($script ?? false)
    <script src="/js/{{ $script }}.js"></script>
    @endif
</body>

</html>