<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="/css/styles.css">



       
    </head>
    
    <body>
        <header>
            
            <div class="container">

                <img src="/imagens/logo.png" alt="logo" style="width: 300px;">

            </div>
        </header>
    
        <Main>

        <div class="container">
            @if(session('msg'))
                <p class="msg">{{session('msg')}}</p>
            @endif
            @yield('content')

        </div>
            
        </Main>
        <footer>

            <div class="container">

                <span class="description">Copyright &copy  LF Tech.
                    Todos os direitos reservados a <a  href="https://www.lftech.com.br" rel="noopener" target="_blank" >LF Tech</a>.
                </span>

            </div>

        </footer>

    </body>

</html>
