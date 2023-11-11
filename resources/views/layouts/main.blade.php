<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <!--Bootstrap -->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


        <!-- Google fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!-- CSS da aplicação -->
        <link rel="stylesheet" href="/css/style.css">
        <script src="/js/script"></script>

        <title>@yield('title')</title>
    </head>
    <body>
    <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="nav-bar" id="navbar">
                            <img src="/img/meeting-icon.png" alt="Conecta Events">
                        </a>
                    
                    <ul class="navbar-nav mr-auto">
                        
                        <li class="nav-item active">
                            <a href="/" class="nav-link">Eventos</a>
                        </li>
                        <li class="nav-item active">
                            <a href="/events/create" class="nav-link">Criar Eventos</a>
                        </li>

                        <!-- Diretiva que faz os elementos aparecerem quando está logado -->
                        @auth
                        <li class="nav-item active">
                            <a href="/dashboard" class="nav-link">Meus eventos</a>
                        </li>
                        <li class="nav-item active">
                            <form action="/logout" method="post">
                                @csrf 

                                <!-- Impede o envio automático de um formulário ao clicar em um botão -->
                                <a href="/logout" class="nav-link" 
                                onclick="event.preventDefault(); this.closest('form').submit();"> Sair</a>
                            </form>
                        </li>
                        @endauth

                        <!-- Diretiva que faz aparecer quando não há conta logada -->
                        @guest
                        <li class="nav-item active">
                            <a href="/login" class="nav-link">Entrar</a>
                        </li>
                        <li class="nav-item active">
                            <a href="/register" class="nav-link">Cadastrar</a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>
    </header>
        <main>
            <div class="container-fluid">
                <div class="row">

                    <!-- Aqui está verificando se tem um return com a session msg. Caso não tenha ele segue com o layout padrão da tela inicial, caso tenha criado um evento ele aparece a msg -->
                    @if(session('msg'))
                        <p class="msg">{{ session('msg')}}</p>
                    @endif
                    @yield('content')
                </div>
            </div>
        </main>
        

        
        <footer>
            <p>Conecta Events &copy; 2023</p>
        </footer>

        <!-- Links para ter acesso aos icones do ion icons --> 
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>

</html>
