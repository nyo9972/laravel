@include('base/header-links')

<!------ Include the above in your HEAD tag ---------->
@if(Auth::user())
<nav class="navbar navbar-icon-top navbar-expand-lg">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <img src="https://www.freeiconspng.com/uploads/white-down-arrow-png-2.png" width="30" height="30">
    </button>

    <div class="collapse navbar-collapse ml-4" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link text-white" href="{{route('home')}}">
                    Chatto
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
                <a class="nav-link text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    <img src="{{asset('/storage/users-avatar/'.Auth::user()->avatar)}}" class="avatar-md rounded-circle" style="width: 50px; height: 50px" alt="Avatar" />
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

<main>
    @yield('content')
</main>
{{--<div class="chat-mini">--}}
{{--    @include('vendor/Chatify/mini-chat')--}}
{{--</div>--}}
<script>
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
