@extends('layouts.main')
@section('content')

<div class="container">

    <div class="editar">

        <form action="/pages/update/{{$cliente -> id}}" method="post">
            @csrf
            @method('PUT')
    
            <div class="text">
                <h1 class="title roxo">Editar dados do cliente</h3>
            </div>
                    
                    
            <div class="row">
                                
                <div class="grupo">
                  
                    <label for="cpf">CPF:</label>
                                    
                    <input placeholder="111.111.111.11" class="peq" type="number" value="{{$cliente ->cpf}}" name="cpf" id="cpf">
                 
            
                </div>


                <div class="grupo">

                    <label for="username">Nome:</label>
                    
                    <input type="text" class="med" value="{{$cliente ->nome}}" name="nome" id="nome">

                </div>


                <div class="grupo">

                    <label for="dataNasc">Data de nascimento:</label>
                    <input class="peq" type="date" value="{{$cliente ->dataNasc}}" name="dataNasc" id="dataNasc">
                </div>

                <div class="grupo">
                <label>Sexo:</label>
                @if($cliente ->sexo == "F") 

                    <p class="rad"><input name="sexo" value="M" type="radio">Masculino</p>

                    <p class="rad"><input name="sexo" checked value="F" type="radio">Feminino</p>
                @else 
                
                    <p class="rad"><input name="sexo" checked value="M" type="radio">Masculino</p>
                    <p class="rad"><input name="sexo"  value="F" type="radio">Feminino</p>

                @endif 
                    

                </div>

            </div>
            <div class="row">
                
                <div class="grupo">

                    <label for="logradouro">Endereço:</label>
                    <input class="grande" value="{{$cliente ->endereco}}" type="text" name="endereco" id="endereco">
                
                </div>

                <div class="grupo">

                    <label for="convenio">Estado:</label>
                    <select class="med" value="{{$cliente ->estado}}" name="estado" id="estado">

                    @foreach($estados as $estado)
                
                        <option value="{{$estado -> sigla}}">{{$estado -> nome}}</option> 


                    @endforeach

                    </select>
                </div>

                <div class="grupo">

                    <label for="cidade">Cidade:</label>
                    <select class="med" value="{{$cliente ->cidade}}" name="cidade" id="cidade">

                        <option class="value" value="Rio de janeiro">Rio de janeiro</option>
                        <option class="value" value="São Tomé">São Tomé</option>
                        <option class="value" value="São Paulo">São Paulo</option>
                        <option class="value" value="Outro">Outra</option>


                    </select>                        
                </div>

            </div>
                    
                  

            <div class="botoes">

                <input class="azul" type="submit" value="Salvar">

                <button class="cinza" href="busca.php">Limpar</button>

            </div>


        </form>
        
    </div>

</div>


@endsection