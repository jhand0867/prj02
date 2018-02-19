<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Handschu Blog</title>

    <!-- Bootstrap core CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" 
   integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('css/blog.css') }}" rel="stylesheet" type="text/css" >
    
    <script type="text/javascript" 
            src="{{ URL::asset('resources/assets/js/ie-emulation-modes-warning.js') }}" ></script>

  </head>

  <body>

    @include('layouts.nav')

    <div class="container">

      <div class="row">
        
        @yield ('content')
        



        @include('layouts.sidebar')

      </div>
      
    </div>
 

    @include('layouts.footer')


  </body>

</html>
