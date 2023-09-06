<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormUsuarioRequest;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    protected $user;
    public function __construct(User $user)
    {
       $this->user = $user;
    }



    public function index(FormUsuarioRequest $request){
       $pesquisar = $request->pesquisar;
        $findUsuario =  $this->user->getUsuariosPesquisarIndex(search:$pesquisar ?? '');
        return view('pagina.usuarios.paginacao',compact('findUsuario'));
    }

    public function delete(Request $request){
        $id = $request->id;
        $buscaRegistro = User::find($id);
        $buscaRegistro->delete();
        return response()->json([
            'success'=>true
        ]);
    }

    public function cadastrarUsuario(FormUsuarioRequest $request){
      if($request->method()== 'POST'){
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        Toastr::success('Gravado com sucesso');
        return redirect(route('usuario.index'));
      }

      return view('pagina.usuarios.create');
    }

    public function atualizarUsuario(FormUsuarioRequest $request,$id){
       if($request->method()== 'PUT'){
        //ATUALIZAR User
           $data = $request->all();
            //formatar os dados do campo valor

            $buscaRegistro = User::find($id);
            $buscaRegistro->update($data);
            return redirect(route('usuario.index'));
          }
          //mostrar dados
            $findUsuario = User::where('id','=',$id)->first();
            Toastr::success('Atualizado com sucesso');
          return view('pagina.usuarios.atualiza',compact('findUsuario'));
    }
}
