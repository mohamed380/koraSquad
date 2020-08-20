<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="icon" href="{{asset('imgs')}}/favicon.png">
    <title>كورة سكواد</title>

    <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css')}}/touches.css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar-expand-lg navbar navbar-dark bg-dark fixed-top">
            
                

                    <!-- Collapsed Hamburger -->
                   
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/KoraSquadAdminsRoute') }}">
                       Korasquad
                    </a>
                       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>

              

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mr-auto " style="font-size:13px">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @else
                        <li class="nav-item"> <a href="/KoraSquadAdminsRoute/#addpost" class="nav-link">Add Post</a> </li>
                        <li class="nav-item"> <a href="/KoraSquadAdminsRoute/#addtag" class="nav-link">Add Tag</a> </li>
                        <li class="nav-item"> <a href="/allTags" class="nav-link">Tags</a> </li>
                        <li class="nav-item"> <a href="/KoraSquadAdminsRoute/#AddClubComp" class="nav-link">Add Club To comp</a> </li>
                        <li class="nav-item"> <a href="/KoraSquadAdminsRoute/#UpdateComp" class="nav-link">Update Competition</a> </li>
                        <li class="nav-item"> <a href="/allPosts/" class="nav-link">All Posts</a></li>
                        <li class="nav-item"> <a href="/KoraSquadAdminsRoute/#addvideo" class="nav-link">Add Video</a> </li>
                        <li class="nav-item"> <a href="/KoraSquadAdminsRoute/#addcomp" class="nav-link">Add Competition</a> </li>
                        <li class="nav-item"> <a href="/KoraSquadAdminsRoute/#addclub" class="nav-link">Add Club</a> </li>
                        <li class="nav-item"> <a href="/KoraSquadAdminsRoute/#updateclub" class="nav-link">update club</a> </li>
                        <li class="nav-item"> <a href="/KoraSquadAdminsRoute/#addmatch" class="nav-link">Add Match</a> </li>
                        <li class="nav-item"> <a href="/UpdateMatchView/" class="nav-link">Update Match</a> </li>
                        <li class="nav-item"> <a href="/UpdateMatchView/" class="nav-link">Update about</a> </li>
                        @if(Auth::user()->type == 0)
                            <li class="nav-item"> <a href="/ListUsers" class="nav-link">Users</a> </li>
                        @endif
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row" >
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/adminjs.js') }}"></script>
</body>
</html>

