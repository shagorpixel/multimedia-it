<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body class="font-body text-gray-900">
    @include('website.partials.navigation')
        @yield('content')
    @include('website.partials.footer')
    <script src="{{asset('website/website/index.js')}}"></script>
</body>
</html>
