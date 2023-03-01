<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cliente;


class EventController extends Controller
{


    public function main(){


        return view('pages.home');

    }


    public function busca(){

        $cpf = request('cpf');
        $nome = request('nome');
        $dataNasc = request('dataNasc');
        $estado = request('estado');
        $cidade = request('cidade');
        $sexo = request('sexo');
        $endereco = request('endereco');
        $nome = request('nome');

        /** captação da url para as cidade, URL coletada do IBGE */

         
        $urlEstados = "https://servicodados.ibge.gov.br/api/v1/localidades/estados";
        $dadosEstados = file_get_contents($urlEstados);
        $dadosEstados =str_replace('},

        ]',"}

        ]",$dadosEstados);
        $estados = json_decode($dadosEstados);
        
                
   
        


        
        $link = "rj/distritos";

        $urlCidades = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/rj/distritos";
        $dadosCidade = file_get_contents($urlCidades);
        $dadosCidade=str_replace('},


        ]',"}

        ]",$dadosCidade);
        $cidades = json_decode($dadosCidade);
        

        if( $cpf != "" or  $nome != "" or $dataNasc != "" or  $estado != "" or $cidade != "" or $endereco != "" or $nome != "" ){
            if($cpf != ""){

                $clientes = Cliente::where([
                    ['cpf','like','%'.$cpf.'%'  ]
                ])->paginate(4);
                $search = $cpf;
            }
            
            if($nome != "" ){

                $clientes = Cliente::where([
                    ['nome','like','%'.$nome.'%'  ]
                ])->paginate(4);
                $search = $nome;
            }
            
            if($dataNasc != "" ){

                $clientes = Cliente::where([
                    ['dataNasc','like','%'.$dataNasc.'%'  ]
                ])->paginate(4);

                $data = $dataNasc ;
                $data_str= strtotime($data);
                $dataBr = date("d/m/Y", $data_str);

                $search = $dataBr;
            }
            
            if($estado!= "" ){

                $clientes = Cliente::where([
                    ['estado','like','%'.$estado.'%'  ]
                ])->paginate(4);
                $search = $estado;
            }

            if($sexo!= "" ){

                if($sexo == 'F'){

                    $clientes = Cliente::where([
                        ['sexo','like','%'.$sexo.'%'  ]
                    ])->paginate(4);
                    $search = $sexo;
                }else{

                    $sexo = "Masculino";

                    $clientes = Cliente::where([
                        ['sexo','like','%'.$sexo.'%'  ]
                    ])->paginate(4);
                    $search = $sexo;
                    
                }

               
            }            
            if($cidade != "" && $cpf=="" ){

                $clientes = Cliente::where([
                    ['cidade','like','%'.$cidade.'%'  ]
                ])->paginate(4);
                $search = $cidade;  
            }
            
            if($endereco != "" ){

                $clientes = Cliente::where([
                    ['endereco','like','%'.$endereco.'%'  ]
                ])->paginate(4);
                $search = $endereco;
            }
        }else{
       
        $search = $cpf;
        $clientes = Cliente::paginate(4);


        }

        

        return view('pages.search',['clientes' => $clientes, 'urlCidades' => $urlCidades , 'search'=>$search, 'estados'=> $estados ,'cidades'=> $cidades, 'link'=> $link,]);

    }

    public function create(){

        /** captação da url para os estados, URL coletada do IBGE */

        
        $urlEstados = "https://servicodados.ibge.gov.br/api/v1/localidades/estados";
        $dadosEstados = file_get_contents($urlEstados);
        $dadosEstados =str_replace('},

        ]',"}

        ]",$dadosEstados);
        $estados = json_decode($dadosEstados);      

       

        $link = "";

        $urlCidades = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/rj/distritos';
        $dadosCidade = file_get_contents($urlCidades);
        $dadosCidade=str_replace('},

        ]',"}

        ]",$dadosCidade);
        $cidades = json_decode($dadosCidade);

        return view('pages.registrar',['estados'=> $estados,'cidades'=> $cidades, 'link'=> $link]);

    }

    public function store (Request $request){

        $cliente = new Cliente;

        $cliente -> cpf = $request -> cpf;

        $cliente -> nome = $request -> nome;

        $cliente -> dataNasc = $request -> dataNasc;

        $cliente -> sexo = $request -> sexo;

        $cliente -> endereco = $request -> endereco;

        $cliente -> estado = $request -> estado;

        $cliente -> cidade = $request -> cidade;


        
        $cliente -> save();

        return redirect('/')-> with('msg','Cliente cadastrado com sucesso');
    }


    public function edit($id){

        /** captação da url para os estados e cidades, URL coletada do IBGE */


        $urlEstados = "https://servicodados.ibge.gov.br/api/v1/localidades/estados";
        $dadosEstados = file_get_contents($urlEstados);
        $dadosEstados =str_replace('},

        ]',"}

        ]",$dadosEstados);
        $estados = json_decode($dadosEstados);      

       

        $link = "";

        $urlCidades = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/rj/distritos';
        $dadosCidade = file_get_contents($urlCidades);
        $dadosCidade=str_replace('},

        ]',"}

        ]",$dadosCidade);
        $cidades = json_decode($dadosCidade);

  
        $cliente = Cliente::findOrFail($id);

        return view('pages.editar', ['cliente'=> $cliente,'estados'=> $estados,'cidades'=> $cidades, 'link'=> $link]);

        return redirect('/')->with('msg','Cliente editado com sucesso');

    }

    public function update(Request $request){
        

        Cliente::findOrFail($request -> id) -> update($request->all());

        return redirect('/')->with('msg','Cliente editado com sucesso');

    }

    public function destroy($id){


        Cliente::findOrFail($id)->delete();

        return redirect('/')->with('msg','Cliente excluído com sucesso');
    }
}
