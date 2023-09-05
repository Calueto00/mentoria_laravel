@extends('index')

@section('content')
<form method="POST" action="{{route('cadastrar.venda')}}">
    @csrf
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Criar nova Venda</h1>
    </div>
        <div class="mb-3">
            <label class="form-label">Numeração</label>
            <input type="text" value="{{$findNumeracao}}" disabled
            class="form-control @error('numero_da_venda')is-invalid @enderror" name="numero_da_venda">
                @if ($errors->has('numero_da_venda'))
                        <div class="invalid-feedback">{{$errors->first('numero_da_venda')}}</div>
                @endif
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Produto</label>
            <select class="form-select" name="produto_id">
                <option selected>Clique para selecionar</option>
                @foreach ($findProduto as $item)
                        <option value="{{$item->id}}">{{$item->nome}}</option>
                @endforeach

              </select>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Cliente</label>
            <select class="form-select" name="cliente_id">
                <option selected>Clique para selecionar</option>
                @foreach ($findCliente as $item)
                        <option value="{{$item->id}}">{{$item->nome}}</option>
                @endforeach

              </select>
        </div>

        <button type="submit" class="btn btn-success">Cadastrar</button>
  </form>
@endsection
