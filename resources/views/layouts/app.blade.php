<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
@if(Auth::user())
<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fa fa-home"></i>
                    Laravel
                    <span class="sr-only">(current)</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav dropdown">
            <li class="nav-item">
                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bell">
                        <span class="badge badge-info">11</span>
                    </i>
                    Notificações
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}">
                        Texto da notificação
                    </a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="avatar-md rounded-circle" style="width: 50px;" alt="Avatar" />
                    <i>
                        {{ Auth::user()->name }}
                    </i>
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="right: 0; left: auto; text-align: center;">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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
<style>
    @import url("//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
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
