@extends('layouts.app')
@section('title','Lista de Usuarios')
@section('content')


<h1>Cadastrar Usuario</h1>
<form action="{{ route('usuarios.store') }}" method="post" class="container mt-4">
  @csrf
  <div class="mb-3">
    <label for="Nome" class="form-label">
             Nome
            </label>

            <input
                type="text"
                name="nome"
                id="nome"
                class="form-control"
                style="max-width: 600px; color: black; background-color: white;"
                maxlength="60"
                value="{{ old('nome') }}"
            >

        </div>

        <div class="mb-3">
    <label for="Email" class="form-label">
             Email
            </label>

            <input
                type="text"
                name="email"
                id="email"
                class="form-control"
                style="max-width: 600px; color: black; background-color: white;"
                maxlength="70"
                value="{{ old('email') }}"
            >

        </div>
    
    
  <button type="submit" class="btn btn-primary">Salvar</button>
</form>


@endsection