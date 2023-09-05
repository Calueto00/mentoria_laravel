<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestClientes;
use App\Models\Cliente;
use App\Models\Componentes;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    protected $cliente;
    public function __construct(Cliente $cliente)
    {
       $this->cliente = $cliente;
    }



    public function index(Request $request){
       $pesquisar = $request->pesquisar;
        $findCliente =  $this->cliente->getClientesPesquisarIndex(search:$pesquisar ?? '');
        return view('pagina.clientes.paginacao',compact('findCliente'));
    }

    public function delete(Request $request){
        $id = $request->id;
        $buscaRegistro = Cliente::find($id);
        $buscaRegistro->delete();
        return response()->json([
            'success'=>true
        ]);
    }

    public function cadastrarCliente(FormRequestClientes $request){
      if($request->method()== 'POST'){
        $data = $request->all();
        Cliente::create($data);
        Toastr::success('Cliente salvo com sucesso');
        return redirect(route('cliente.index'));
      }

      return view('pagina.clientes.create');
    }

    public function atualizarCliente(FormRequestClientes $request,$id){
       if($request->method()== 'PUT'){
        //ATUALIZAR PRODUTO
           $data = $request->all();

            $buscaRegistro = Cliente::find($id);
            $buscaRegistro->update($data);
            return redirect(route('cliente.index'));
          }
          //mostrar dados
            $findCliente = Cliente::where('id','=',$id)->first();
          return view('pagina.clientes.atualiza',compact('findCliente'));
    }
}
