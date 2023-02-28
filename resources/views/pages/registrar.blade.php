@extends('layouts.main')
@section('content')


    <div class="registro">

        <form action="/pages" method="post">
            @csrf
    
            <div class="text">
                <h1 class="title roxo">Cadastro Cliente</h3>
            </div>
                    
                    
            <div class="row">
                                
                <div class="grupo">
                  
                    <label for="cpf">CPF:</label>
                                    
                    <input placeholder="111.111.111.11" class="peq" type="number" name="cpf" id="cpf">
                 
            
                </div>


                <div class="grupo">

                    <label for="username">Nome:</label>
                    
                    <input type="text" class="med" name="nome" id="nome">

                </div>


                <div class="grupo">

                    <label for="dataNasc">Data de nascimento:</label>
                    <input class="peq"  type="date" name="dataNasc" id="dataNasc">
                </div>

                <div class="grupo">

                    <label>Sexo:</label>
                    <p class="rad"><input name="sexo" value="M" type="radio">Masculino</p>
                    <p class="rad"><input name="sexo" value="F" type="radio">Feminino</p>

                </div>

            </div>
            <div class="row">
                
                <div class="grupo">

                    <label for="logradouro">Endereço:</label>
                    <input class="grande" type="text" name="endereco" id="endereco">
                
                </div>

                <div class="grupo">

                    
                    <label for="convenio">Estado:</label>
                    <select class="med" name="estado" id="estado">

                    @foreach($estados as $estado)

                        <option value="{{$estado -> sigla}}">{{$estado -> nome}}</option>

                    @endforeach
                    </select>
                </div>

                <div class="grupo">


                    <label for="cidade">Cidade:</label>
                    <select class="med" name="cidade" id="cidade">

                        @foreach($cidades as $cidade)

                        $link = rj/distritos;
                    
                         <option value="{{$cidade -> nome}}">{{$cidade -> nome}}</option> 

                        @endforeach


                    </select>                        
                </div>

            </div>
                    
                  

            <div class="botoes">

                <input class="azul" type="submit" value="Salvar">

                <button class="cinza" href="#">Limpar</button>

            </div>


        </form>
        
    </div>
    
@endsection