<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestProduto;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    protected $produto;
    public function __construct(Produto $produto)
    {
       $this->produto = $produto;
    }



    public function index(Request $request){
       $pesquisar = $request->pesquisar;
        $findProduto =  $this->produto->getProdutosPesquisarIndex(search:$pesquisar ?? '');
        return view('pagina.produtos.paginacao',compact('findProduto'));
    }

    public function delete(Request $request){
        $id = $request->id;
        $buscaRegistro = Produto::find($id);
        $buscaRegistro->delete();
        return response()->json([
            'success'=>true
        ]);
    }

    public function cadastrarProduto(FormRequestProduto $request){
      if($request->method()== 'POST'){
        $data = $request->all();
        Produto::create($data);

        return redirect(route('produto.index'));
      }

      return view('pagina.produtos.create');
    }
}
