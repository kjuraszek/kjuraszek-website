<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" value="{{ csrf_token() }}" />
    <title>kjuraszek - a tale about developer and his portfolio</title>
	<meta name="description" content="My name is Chris and here you can find my projects.">
    <link rel="icon" href="{{ url('favicon.ico') }}">
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
  </head>
  <body>
    <noscript>
      <strong>I'm sorry but this website doesn't work properly without JavaScript enabled. Please enable it to continue or vist <a href="https://github.com/kjuraszek/">my Github</a>.</strong>
    </noscript>
    <div id="app"></div>
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    <!-- built files will be auto injected -->
  </body>
</html>