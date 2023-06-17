<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List Project</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    @yield('styles')
</head>
<body>
    <h1 style="margin:1rem">@yield('title')</h1>
    <div style="margin:0 1rem">

        @if(session()->has('success'))

        <div>{{session('success')}}</div>

        @endif
        
        @yield('content')
    </div>
    
   
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>