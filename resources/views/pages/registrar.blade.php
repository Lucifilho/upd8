@extends('layouts.main')
@section('content')

<div class="container">

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

                        <option value="">Selecione</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espirito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>

                    </select>
                </div>

                <div class="grupo">

                    <label for="cidade">Cidade:</label>
                    <select class="med" name="cidade" id="cidade">

                        <option class="value" value="Rio de janeiro">Rio de janeiro</option>
                        <option class="value" value="São Tomé">São Tomé</option>
                        <option class="value" value="São Paulo">São Paulo</option>
                        <option class="value" value="Outro">Outra</option>


                    </select>                        
                </div>

            </div>
                    
                  

            <div class="botoes">

                <input type="submit" value="Salvar">

                <button class="cinza" href="busca.php">Limpar</button>

            </div>


        </form>
        
    </div>

</div>


@endsection