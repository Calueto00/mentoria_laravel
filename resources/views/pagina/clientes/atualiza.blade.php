@extends('index')

@section('content')
<form method="POST" action="{{route('atualizar.cliente',$findCliente->id)}}">
    @csrf
    @method('PUT')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Editar Cliente</h1>
    </div>
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" value="{{isset($findCliente->nome) ? $findCliente->nome : old('nome')}}" class="form-control @error('nome')is-invalid @enderror" name="nome">
                @if ($errors->has('nome'))
                        <div class="invalid-feedback">{{$errors->first('nome')}}</div>
                @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input  value="{{isset($findCliente->email) ? $findCliente->email : old('valor')}}" name="valor" class="form-control @error('email')is-invalid @enderror" >
            @if ($errors->has('eail'))
            <div class="invalid-feedback">{{$errors->first('email')}}</div>
    @endif
        </div>

        <button type="submit" class="btn btn-success">Gravar</button>
  </form>
@endsection

