@extends('layouts.app')

@section('content')

    <head>
        <title>Configurações</title>
        <!--Made with love by Mutiullah Samim -->

        <!--Bootsrap 4 CDN-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <!--Fontawesome CDN-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <!--Custom styles-->
    </head>
    <body>
    <div class="container">
        <div class=" col-md-16">
            <div class="card">
                <div class="card-header">
                    <h3>Perfil</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('upload') }}" enctype="multipart/form-data">

                        <div class="row">
                            <div class="input-group form-group col-md-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" placeholder="Nome" required autocomplete="name" autofocus>
                            </div>

                            <div class="input-group form-group col-md-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" placeholder="E-mail" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-group form-group col-md-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-music"></i></span>
                                </div>
                                <input id="favourite_bands" type="text" class="form-control" name="favourite_bands" value="{{ $user->favourite_bands }}" placeholder="Diz aí, quais suas bandas favoritas?" required autocomplete="favourite_bands">
                            </div>

                            <div class="input-group form-group col-md-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-film"></i></span>
                                </div>
                                <input id="favourite_movies" type="text" class="form-control" name="favourite_movies" value="{{ $user->favourite_movies }}" placeholder="Agora me diz, quais seus filmes preferidos?" required autocomplete="favourite_movies">
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-group form-group col-md-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-trophy"></i></span>
                                </div>
                                <input id="hobbies" type="text" class="form-control" name="hobbies" value="{{ $user->hobbies }}" placeholder="Quais são seus hobbies?" autocomplete="hobbies">
                            </div>

                            <div class="input-group form-group col-md-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                </div>
                                <input id="profession" type="text" class="form-control" name="profession" value="{{ $user->profession }}" placeholder="Qual sua profissão?" autocomplete="profession">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="birthday">
                                    Data de nascimento
                                </label>
                                <div class="input-group form-group">
                                    <input id="birthday" type="date" class="form-control" name="birthday" value="{{ $user->birthday }}" placeholder="Agora me diz, quais seus filmes preferidos?" required autocomplete="birthday">
                                </div>
                            </div>

                            <div class="input-group form-group col-md-6">
                                <textarea id="description"  class="form-control" name="description" placeholder="Use esse espaço para falar um pouco sobre você!" autocomplete="description">{{ $user->description }}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-group form-group col-md-6">
                                    <input class="form-control" id="avatar" onchange="loadFile(event)" style="max-width: 140px; border-radius: 40px; display: none" type="file" name="avatar">
                                <label for="avatar"><span class="btn btn-primary">Escolha uma foto de perfil</span></label>
                                <div class="row">
                                    <img  id="output" src="{{asset('/storage/users-avatar/'.Auth::user()->avatar)}}" alt="imagem"  class="ml-4 avatar-md rounded-circle" style="width: 110px; height: 90px" alt="Avatar" />
                                </div>
                            </div>

                            <div class="input-group form-group col-md-6">
                                <input class="form-control" id="background" onchange="loadFileBackground(event)" style="max-width: 140px; border-radius: 40px; display: none" type="file" name="background">
                                <label for="background"><span class="btn btn-primary">Escolha uma foto de capa</span></label>
                                <div class="row">
                                    <img  id="outputbg" src="{{asset('/storage/background/'.Auth::user()->background)}}" alt="imagem"  class="ml-4 avatar-md rounded-circle" style="width: 110px; height: 90px" alt="background" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn float-right login_btn">
                                Salvar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>

    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src)
            }
        };

        var loadFileBackground = function(event) {
            var output = document.getElementById('outputbg');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src)
            }
        };
    </script>

    <style>
        /* Made with love by Mutiullah Samim*/

        @import url('https://fonts.googleapis.com/css?family=Numans');

        html,body{
            background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            height: 100%;
            font-family: 'Numans', sans-serif;
        }

        .login_btn{
            color: black;
            background-color: #bdbcc0;
            width: 100px;
        }

        .login_btn:hover{
            color: black;
            background-color: white;
        }

        .links{
            color: white;
        }

        .links a{
            margin-left: 4px;
        }

    </style>
@endsection

