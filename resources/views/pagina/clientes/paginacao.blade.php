@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Clientes</h1>
    </div>
    <div>
        <form action="{{route('cliente.index')}}" method="get">
            <input type="text" name="pesquisar" placeholder="Digite o Nome">
            <button>Pesquisar</button>
            <a href="{{route('cadastrar.cliente')}}" type="button" class="btn btn-success float-end">Incluir Cliente</a>
        </form>

      <div class="table-responsive mt-4">
        @if ($findCliente->isEmpty())
                <p>Não existe dados</p>
        @else
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Logradouro</th>
                    <th scope="col">Cep</th>
                    <th scope="col">Bairro</th>
                    <th scope="col">Acções</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($findCliente as $cliente)
                        <tr>
                            <td>{{$cliente->nome}}</td>
                            <td>{{$cliente->email}}</td>
                            <td>{{$cliente->endereco}}</td>
                            <td>{{$cliente->logradouro}}</td>
                            <td>{{$cliente->cep}}</td>
                            <td>{{$cliente->bairro}}</td>
                            <td>
                                <a href="{{route('atualizar.cliente',$cliente->id)}}" class="btn btn-light btn-sm">
                                    Editar
                                </a>
                                <meta name='csrf-token' content="{{csrf_token()}}">
                                <a onclick="deleteRegistroPaginacao('{{route('cliente.delete')}}',{{$cliente->id}})" class="btn btn-danger btn-sm">Deletar</a>
                            </td>
                        </tr>
                @endforeach
                </tbody>
            </table>
        @endif

    </div>
@endsection

