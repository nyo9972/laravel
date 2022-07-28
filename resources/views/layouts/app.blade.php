<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet"/>
<script src="https://unpkg.com/gridjs/dist/gridjs.umd.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/app.js') }}"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>


<!------ Include the above in your HEAD tag ---------->
@if(Auth::user())
<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse ml-4" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">
                   <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/50px-Laravel.svg.png">
                    Laravel
                    <span class="sr-only">(current)</span>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav dropdown">

            <li class="nav-item">
                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bell">
                        <span class="badge badge-info">{{count(Auth::user()->getNotification())}}</span>
                    </i>
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @forelse(Auth::user()->getNotification() as $notification)
                        <a class="dropdown-item" onclick="viewNotification({{$notification->id}}, '{{$notification->action_url}}')">{{$notification->text}}
                        @empty
                                <div align="center"> Nada por aqui... </div>
                        @endforelse
                    </a>
                </div>
            </li>

            <li class="nav-item dropdown mr-4">
                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    <img src="{{asset('/storage/images/'.Auth::user()->image)}}" class="avatar-md rounded-circle" style="width: 50px; height: 50px" alt="Avatar" />
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="right: 0; left: auto; text-align: center;">
                    <a class="dropdown-item" href="{{ route('configuration') }}">
                        Configurações
                    </a>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Sair
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </div>
            </li>

        </ul>

    </div>

</nav>
@endif

<main class="py-4">
    @yield('content')
</main>
<div class="chat-mini">
    @include('vendor/Chatify/mini-chat')
</div><script>
    function viewNotification(notificationId, action){
        $.ajax({
            url: "{{Route('viewNotification')}}",
            method: "POST",
            data: { 'notificationId': notificationId },
            success: () => {
                window.location.href = action;
            },
            error: (erro) => {
                swal.fire(
                    'Erro!',
                    'Erro ao visualizar notificação!',
                    'error'
                )
            },
        });
    }
</script>

<style>
    @import url("//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
    @import url('https://fonts.googleapis.com/css?family=Numans');

    html,body{
        background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        height: 100%;
        font-family: 'Numans', sans-serif;
    }

    .card-header{
        color:white;
        margin-top: auto;
        margin-bottom: auto;
        background-color: rgba(0,0,0,0.5) !important;
    }

    .card{
        color:white;
        margin-top: auto;
        margin-bottom: auto;
        background-color: rgba(0,0,0,0.5) !important;
    }

    .navbar{
        height: 68px;
    }
    .navbar-icon-top .navbar-nav .nav-link > .fa {
        position: relative;
        width: 36px;
        font-size: 24px;
    }

    .navbar-icon-top .navbar-nav .nav-link > .fa > .badge {
        font-size: 0.75rem;
        position: absolute;
        right: 0;
        font-family: sans-serif;
    }

    .navbar-icon-top .navbar-nav .nav-link > .fa {
        top: 3px;
        line-height: 12px;
    }

    .navbar-icon-top .navbar-nav .nav-link > .fa > .badge {
        top: -10px;
    }

    @media (min-width: 576px) {
        .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link {
            text-align: center;
            display: table-cell;
            height: 70px;
            vertical-align: middle;
            padding-top: 0;
            padding-bottom: 0;
        }

        .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link > .fa {
            display: block;
            width: 48px;
            margin: 2px auto 4px auto;
            top: 0;
            line-height: 24px;
        }

        .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link > .fa > .badge {
            top: -7px;
        }
    }

    @media (min-width: 768px) {
        .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link {
            text-align: center;
            display: table-cell;
            height: 70px;
            vertical-align: middle;
            padding-top: 0;
            padding-bottom: 0;
        }

        .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link > .fa {
            display: block;
            width: 48px;
            margin: 2px auto 4px auto;
            top: 0;
            line-height: 24px;
        }

        .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link > .fa > .badge {
            top: -7px;
        }
    }

    @media (min-width: 992px) {
        .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link {
            text-align: center;
            display: table-cell;
            height: 70px;
            vertical-align: middle;
            padding-top: 0;
            padding-bottom: 0;
        }

        .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link > .fa {
            display: block;
            width: 48px;
            margin: 2px auto 4px auto;
            top: 0;
            line-height: 24px;
        }

        .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link > .fa > .badge {
            top: -7px;
        }
    }

    @media (min-width: 1200px) {
        .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link {
            text-align: center;
            display: table-cell;
            height: 70px;
            vertical-align: middle;
            padding-top: 0;
            padding-bottom: 0;
        }

        .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link > .fa {
            display: block;
            width: 48px;
            margin: 2px auto 4px auto;
            top: 0;
            line-height: 24px;
        }

        .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link > .fa > .badge {
            top: -7px;
        }
    }

</style>
