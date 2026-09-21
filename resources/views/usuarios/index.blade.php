@extends('Layouts.app')
@section('title', 'Lista de usuarios')
@section('content')
 <div class="text-center">
<h1>Lista de usuarios para {{ Auth::user()->name }}</h1>
<form action="{{ route('usuarios.index') }}" method="get">
    @csrf
<div class="d-flex">
        <label for="">id</label> 
        <input type="text" name="id" id="id">
        <label for="">nome</label> 
        <input type="text" name="nome" id="nome">
        <label for="">email</label> 
        <input type="text" name="email" id="email">
        <button class="btn btn-success" type="submit">Buscar</button>
</div>
</div>
    </form>
<a class="btn btn-primary" href="{{ route('usuarios.create')}}" role="button">Novo</a>
<table class="table">
    <thead class="table-info">
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        
    </thead>
    <tbody>    
       
    </tbody>
</table>
    @endsection