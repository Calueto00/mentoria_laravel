@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Vendas</h1>
    </div>
    <div>
        <form action="{{route('venda.index')}}" method="get">
            <input type="text" name="pesquisar" placeholder="Digite o Nome">
            <button>Pesquisar</button>
            <a href="{{route('cadastrar.venda')}}" type="button" class="btn btn-success float-end">Incluir Venda</a>
        </form>

      <div class="table-responsive mt-4">
        @if ($findVenda->isEmpty())
                <p>Não existe dados</p>
        @else
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">Numeração</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Acções</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($findVenda as $venda)
                        <tr>
                            <td>{{$venda->numero_da_venda}}</td>
                            <td>{{$venda->produto->nome}}</td>
                            <td>{{$venda->cliente->nome}}</td>
                            <td>
                                <a href="{{route('enviaComprovantePorEmail.venda',$venda->id)}}" class="btn btn-light btn-sm">
                                    Enviar Email
                                </a>
                            </td>
                @endforeach
                </tbody>
            </table>
        @endif

    </div>
@endsection

