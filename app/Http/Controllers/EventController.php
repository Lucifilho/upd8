<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cliente;

class EventController extends Controller
{


    public function main(){


        return view('/pages/home',);

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



        

        if( $cpf != "" or  $nome != "" or $dataNasc != "" or  $estado != "" or $cidade != "" or $endereco != "" or $nome != "" ){
            if($cpf != ""){

                $clientes = Cliente::where([
                    ['cpf','like','%'.$cpf.'%'  ]
                ])->paginate(5);
                $search = $cpf;
            }
            
            if($nome != "" ){

                $clientes = Cliente::where([
                    ['nome','like','%'.$nome.'%'  ]
                ])->paginate(5);
                $search = $nome;
            }
            
            if($dataNasc != "" ){

                $clientes = Cliente::where([
                    ['dataNasc','like','%'.$dataNasc.'%'  ]
                ])->paginate(5);

                $data = $dataNasc ;
                $data_str= strtotime($data);
                $dataBr = date("d/m/Y", $data_str);

                $search = $dataBr;
            }
            
            if($estado!= "" ){

                $clientes = Cliente::where([
                    ['estado','like','%'.$estado.'%'  ]
                ])->paginate(5);
                $search = $estado;
            }

            if($sexo!= "" ){

                if($sexo == 'F'){

                    $clientes = Cliente::where([
                        ['sexo','like','%'.$sexo.'%'  ]
                    ])->paginate(5);
                    $search = $sexo;
                }else{

                    $sexo = "Masculino";

                    $clientes = Cliente::where([
                        ['sexo','like','%'.$sexo.'%'  ]
                    ])->paginate(5);
                    $search = $sexo;
                    
                }

               
            }            
            if($cidade != "" ){

                $clientes = Cliente::where([
                    ['cidade','like','%'.$cidade.'%'  ]
                ])->paginate(5);
                $search = $cidade;  
            }
            
            if($endereco != "" ){

                $clientes = Cliente::where([
                    ['endereco','like','%'.$endereco.'%'  ]
                ])->paginate(5);
                $search = $endereco;
            }
        }else{
        echo "nada";
        
        $search = $cpf;
        $clientes = Cliente::paginate(5);


        }


        return view('pages/search',['clientes' => $clientes, 'search'=>$search]);

    }

    public function create(){


        return view('pages.registrar');

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


        $cliente = Cliente::findOrFail($id);

        return view('pages.editar', ['cliente'=> $cliente]);

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
