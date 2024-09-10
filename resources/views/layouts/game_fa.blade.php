@php
  session_start();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl" class="@stack('html-class')">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Geneva Space Cruiser</title>

    {{-- Scripts --}}
    @stack('head-scripts')

    {{-- Fonts --}}
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    {{-- Styles --}}
    <link rel="icon" href="{{ url('css/lives.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">

    <style>

      .elements-centered{
        text-align: center !important;
      }

      .instruction__example{

        width: 50%;
        margin: auto;
        margin-top:10px;

      }

    </style>

    @stack('head-after')
</head>
<body>

<div id="app">

 @yield('content')

</div>

@stack('bottom')
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
<script
  src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
  integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
  crossorigin="anonymous"></script>
<script>
  $("#showModal").click(function() {
    $(".modal").addClass("is-active");
  });

  $(".delete").click(function() {
     $(".modal").removeClass("is-active");
  });

</script>
</body>
</html>
