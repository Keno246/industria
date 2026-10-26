@extends('layouts.app')
@section('title','Cadastro de usuário')
@section('content')
<h1>Cadastrar usuário</h1>
<form action="{{ route('usuario.store') }}" method="post" class="container mt-4">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Nome</label>
        <input type="text" name="nome" id="nome"  class="form-control w-50">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control w-50">
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>


@endsection