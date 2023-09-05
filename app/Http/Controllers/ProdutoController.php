<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestProduto;
use App\Models\Componentes;
use App\Models\Produto;
use Brian2694\Toastr\Facades\Toastr;
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
        //formatar os dados do campo valor
        $componentes = new Componentes();
        $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);
        Produto::create($data);
        Toastr::success('Gravado com sucesso');
        return redirect(route('produto.index'));
      }

      return view('pagina.produtos.create');
    }

    public function atualizarProduto(FormRequestProduto $request,$id){
       if($request->method()== 'PUT'){
        //ATUALIZAR PRODUTO
           $data = $request->all();
            //formatar os dados do campo valor
            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);

            $buscaRegistro = Produto::find($id);
            $buscaRegistro->update($data);
            return redirect(route('produto.index'));
          }
          //mostrar dados
            $findProduto = Produto::where('id','=',$id)->first();
          return view('pagina.produtos.atualiza',compact('findProduto'));
    }
}
