@extends('index')

@section('content')
<form method="POST" action="{{route('atualizar.usuario',$findUsuario->id)}}">
    @csrf
    @method('PUT')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Editar Usuario</h1>
    </div>
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" value="{{isset($findUsuario->name) ? $findUsuario->name : old('name')}}" class="form-control @error('name')is-invalid @enderror" name="name">
                @if ($errors->has('name'))
                        <div class="invalid-feedback">{{$errors->first('name')}}</div>
                @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input id="mascara_email" value="{{isset($findUsuario->email) ? $findUsuario->email : old('email')}}" name="email" class="form-control @error('email')is-invalid @enderror" >
            @if ($errors->has('email'))
            <div class="invalid-feedback">{{$errors->first('email')}}</div>
    @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Nova Senha</label>
            <input type="password" id="mascara_password" name="password" class="form-control @error('password')is-invalid @enderror" >
            @if ($errors->has('password'))
            <div class="invalid-feedback">{{$errors->first('password')}}</div>
    @endif
        </div>

        <button type="submit" class="btn btn-success">Gravar</button>
  </form>
@endsection

