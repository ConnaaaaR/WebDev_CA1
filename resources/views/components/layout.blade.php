<!DOCTYPE html>
<html lang="en" class="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    

    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Bootstrap --}}
    @if(Route::is('admin.project.create'))
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    @endif
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@500&display=swap" rel="stylesheet">


    <title>Projects 
        @if(Auth::check())
        {{-- Retrieve and capitalize the authed users name --}}
            - {{ucFirst(Auth::user()->name)}}
        @endif
    </title>
</head>
<body class="font-['Barlow']">

    {{-- Nav elements will only display if it is not the current route and the user is authed / not authed accordingly --}}
    <nav>
        <div class="w-screen bg-neutral-700 h-[5px]"></div>
        <div class="flex gap-10 items-center justify-between">

            <div class="flex items-center">
                <a href="/projects" class="bg-neutral-700 text-white"><img src="{{ asset('no-image.png') }}" alt="company logo" class="px-20 h-20 min-w-min"></a>
                <p class="pl-4 font-semibold capitalize">Welcome @auth {{Auth::user()->name}}@endauth!</p>
                <p class="ml-5 text-red-600">{{ (Auth::user()->hasRole('admin') ? 'Admin Account' : '')}}</p>
            </div>

            <ul class="flex text-xl gap-10 mr-24">
                {{-- if current route is projects, add hidden class, else nothing. Could've probably been done in JS too but oh well  --}}
                <li class="{{ (request()->is('*/projects')) ? 'hidden' : '' }}">
                    <a href="{{route('user.projects.index')}}" class="navElement"
                        > Home</a
                    >
                </li>
                @auth
                @php
                 $user = Auth::user()
                @endphp
                <li class="{{ (request()->is('admin/projects/create')) ? 'hidden' : '' }}{{ $user->hasRole('admin') ? '' : 'hidden' }}">
                    <a href="{{route('admin.projects.create')}}" class="navElement"
                        > Upload</a
                    >
                </li>
                
                <li class="{{ (request()->is('*/projects/userprojects')) ? 'hidden' : '' }} {{ $user->hasRole('admin') ? '' : 'hidden' }}">
                    <a href="{{route('admin.projects.userprojects')}}" class="navElement"
                        > Dashboard</a
                    >
                </li> 
                <li>
                    <a href="{{route('admin.projects.logout')}}" class=" btn-primary" onclick="return confirm('Are you sure you want to log out?')"
                    > Logout</a
                >
                   
                </li>
                @endauth
              
                @guest
                <li>
                    <a href="{{ route('login') }}" class="navElement"
                        > Login</a
                    >
                </li>
                
                <li>
                    <a href="{{ route('register') }}" class="navElement"
                        > Register</a
                    >
                </li>
                @endguest
                
            
            </ul>
        </div>
        <div class="w-screen bg-neutral-700 h-[5px]"></div>
    </nav>
    @auth
    {{-- Main Content --}}
        {{$slot}}
    {{-- Main Content End --}}
      @endauth  
      @guest
      <div class="min-h-screen mx-auto">
        <p class="text-center text-red-500 text-xl">You must log in to see this content!</p>
      </div>
      @endguest
    
    <footer class="w-full flex justify-between items-center  bg-neutral-700">
        <p class="my-10 text-xl ml-24 text-white">Connor Mattless (N00213409) CC 2 Web Dev </p>
        {{-- Footer links --}}
        <ul class="flex text-xl gap-4 mr-24">
            <li>
                <a href="/portfolio" target="_blank" class="text-white hover:underline"
                    >Twitter</a
                >
            </li>
            
            <li class="font-bold text-white">
                |
            </li>
            <li>
                <a href="/about" target="_blank" class="text-white hover:underline"
                    >
                    LinkedIn
                </a>
            </li>
            <li class="font-bold text-white">
                |
            </li>
            <li>
                <a href="/contact" target="_blank" class="text-white hover:underline"
                    >
                    Instagram
                </a>
            </li>
        </ul>
        {{-- Footer links end --}}
    </footer>
</body>

</html>


