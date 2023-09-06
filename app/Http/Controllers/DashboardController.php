<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\User;
use App\Models\Venda;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $totalProdutos =$this->buscaTotalProdutosCadastrados();
        $totalClientes =$this->buscaTotalClientesCadastrados();
        $totalVendas =$this->buscaTotalVendasCadastrados();
        $totalUsuarios =$this->buscaTotalUsuariosCadastrados();
        return view('pagina.dashboard.dashboard',compact('totalProdutos','totalClientes','totalVendas','totalUsuarios'));
    }

    public function buscaTotalProdutosCadastrados(){
        $findProduto = Produto::all()->count();
        return $findProduto;
    }

    public function buscaTotalClientesCadastrados(){
        $find = Cliente::all()->count();
        return $find;
    }

    public function buscaTotalVendasCadastrados(){
        $find = Venda::all()->count();
        return $find;
    }
    public function buscaTotalUsuariosCadastrados(){
        $find = User::all()->count();
        return $find;
    }
}
