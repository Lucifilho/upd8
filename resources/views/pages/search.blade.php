@extends('layouts.main')
@section('content')

<div class="container">

    <div class="busca">
        
        <form action="/pages/search" method="get">
            
            <div class="text">
                <h1 class="title roxo">Consulta Cliente</h3>
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
                                    <input class="peq" type="date" name="dataNasc" id="dataNasc">
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

                                        <option value="{{$estado -> sigla}}">{{$estado->nome }}</option>

                                    @endforeach                                  

                                    </select>

                                </div>

                                                    
                
                                <div class="grupo">
                
                                    <label>Cidade:</label>
                                    <select class="med" name="cidade" id="cidade">
                                        
                                    @foreach($cidades as $cidade)

                                       <option value="{{$cidade -> nome}}">{{$cidade -> nome}}</option>

                                    @endforeach
                                    <option value="0">ola</option>

                
                
                                    </select>                        
                                </div>
                
                            </div>

                                  
                
                            <div class="botoes">
                
                                <input class="azul" type="submit" value="Pesquisar">
                
                                <button class="cinza" href="#">Limpar</button>
                
                            </div>


        </form>

        <div class="resultado">
            <div class="text">
            </div>

            @if($search)
                <h1>Buscando por: {{$search}}</h1>
                <h1 class="title azul">Resultado da Pesquisa</h3>
            
            @else
                <h1 class="title azul">Resultado da Pesquisa</h3>

            
            @endif

            <table >
                <tr>
                    <th></th>
                    <th></th>
                    <th>Cliente</th>
                    <th>CPF</th>
                    <th>Data Nasc.</th>
                    <th>Estado</th>
                    <th>Cidade</th>
                    <th>Sexo</th>
                </tr>
                
                @foreach($clientes as $cliente)

                @php 
                
                $data = $cliente -> dataNasc ;
                $data_str= strtotime($data);
                $dataBr = date("d/m/Y", $data_str);

                if(strlen($cliente -> cpf) == 11){
                $cpf = $cliente -> cpf;

                $cpfcerto = substr($cpf, 0, 3) . "." . substr($cpf, 3, 3) . "." . substr($cpf, 6, 3) . "-" . substr($cpf, 9, 2);}
                else{
                $cpfcerto = $cliente -> cpf;}
                
                @endphp

                <tr>
                    <td><a class="fundoVerde" href="editar/{{ $cliente -> id}}">Editar</a></td>
                    <td>
                        <form action="excluir/{{ $cliente -> id}}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button class="fundoVermelho" type="submit">Excluir</button>

                        </form>
                    </td>
                    <td>{{ $cliente -> nome}}</td>
                    <td>{{ $cpfcerto }}</td>
                    <td>{{ $dataBr }}</td>
                    <td>{{ $cliente -> estado}}</td>
                    <td>{{ $cliente -> cidade}}</td>
                    <td>{{ $cliente -> sexo}}</td>
                </tr>
                @endforeach
                
            </table>

            <div class="navigation">
                {{$clientes -> links()}}
            </div>

           

        </div>

    </div>

</div>

@endsection