<!doctype html>
<html lang="en">
<head>
  @include('parts._head')
</head>

  <body>

    @include('parts._nav')

    <!--default bootstrap Navbar-->


    <div class="container">
      
      @include('parts._messages')


       @yield('content')

       @include('parts._footer')


    </div> <!-- end of .container -->

    @include('parts._javascript')

    @yield('scripts')

    
  </body>
</html>