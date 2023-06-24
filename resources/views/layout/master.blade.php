<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List Project</title>
  
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn {
            @apply rounded-md px-2 py-1 text-center font-medium shadow-sm text-slate-700 ring-1 ring-slate-700/10 hover:bg-slate-50
        }

        label {

            @apply block uppercase text-slate-700 mb-2
        }


        input , textarea {

            @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
        }

        .error {

            @apply text-red-500 text-sm
        }
    </style>
     {{-- blade-formatter-enable --}}
    @yield('styles')
</head>
<body class="container mx-auto mt-10 max-w-lg font-serif">
    <h1 style="margin:1rem" class="text-2xl">@yield('title')</h1>
    <div style="margin:0 1rem">

        @if(session()->has('success'))

        <div>{{session('success')}}</div>

        @endif
        
        @yield('content')
    </div>
    
   
   
</body>
</html>