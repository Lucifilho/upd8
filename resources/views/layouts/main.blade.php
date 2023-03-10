<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="/css/styles.css">



       
    </head>
    
    <body>
        <header>
            
            <div class="container">

                <div class="logo">

                    <a href="/"><img src="/imagens/logo.png" alt="logo"></a>

                </div>

                <div class="back"><a href="/"><i class="fa fa-arrow-circle-left	"></a></i></div>



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
