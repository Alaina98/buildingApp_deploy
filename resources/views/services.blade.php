<!DOCTYPE html>
<html>
    <head>
</head>
<body>
    @if(Auth::check())
    Your name is : {{ Auth::user()->name}}
    <br>
    Your Email is : {{ Auth::user()->email}}
    @else
    You are not logged in..
    @endif

    </body>
</html>
