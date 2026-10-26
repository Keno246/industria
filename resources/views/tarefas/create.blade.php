@extends('layouts.app')
@section('title','Cadastro de tarefa')
@section('content')
<h1>Cadastrar tarefa</h1>
<form action="{{ route('tarefa.store') }}" method="post" class="container mt-4">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Descrição</label>
        <input type="text" name="descricao" id="descricao"  class="form-control w-50">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Setor</label>
        <input type="text" name="setor" id="setor" class="form-control w-50">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Prioridade</label>
       <select name="prioridade" id="prioridade">
            <option value="baixa">baixa</option>
            <option value="média">média</option>
            <option value="alta">alta</option>
       </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Usuário</label>
       <select name="usuario_id" id="usuario_id">
            @foreach($usuarios as $usuario)
                <option value="{{$usuario->id}}">{{$usuario->nome}}</option>
            @endforeach
            
       </select>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Status</label>
       <select name="status" id="status">
            <option value="A Fazer">A Fazer</option>
            <option value="Fazendo">Fazendo</option>
            <option value="Pronto">Pronto</option>
       </select> 
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>


@endsection