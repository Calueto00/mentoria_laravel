<?php

namespace App\Http\Controllers;

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
        
    }
}
