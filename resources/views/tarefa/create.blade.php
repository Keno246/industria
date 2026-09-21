@extends('layouts.app')

@section('title', isset($tarefa) ? 'Editar Tarefa' : 'Cadastrar Tarefa')

@section('content')

<div class="container mt-4">

    <h1>{{ isset($tarefa) ? 'Editar Tarefa' : 'Cadastrar Tarefa' }}</h1>

    <form
        action="{{ isset($tarefa) ? route('tarefa.update', $tarefa->id) : route('tarefa.store') }}"
        method="POST"
        class="container mt-4"
    >

        @csrf

        @if(isset($tarefa))
            @method('PUT')
        @endif

        <div class="mb-3">

            <label for="usuario_id" class="form-label">
                Nome
            </label>

            <select
                name="usuario_id"
                id="usuario_id"
                class="form-select"
                style="max-width: 600px; color: black; background-color: white;"
                required
            >

                <option value="">Selecione um usuário</option>

                @foreach($usuarios as $usuario)

                    <option
                        value="{{ $usuario->id }}"
                        {{ old('usuario_id', isset($tarefa) ? $tarefa->usuario_id : '') == $usuario->id ? 'selected' : '' }}
                    >
                        {{ $usuario->nome }}
                    </option>

                @endforeach

            </select>

        </div>


        <div class="mb-3">

            <label for="descricao" class="form-label">
                Descrição
            </label>

            <input
                type="text"
                name="descricao"
                id="descricao"
                class="form-control"
                maxlength="255"
                style="max-width: 600px;"
                value="{{ old('descricao', isset($tarefa) ? $tarefa->descricao : '') }}"
                required
            >

        </div>


        <div class="mb-3">

            <label for="nome_setor" class="form-label">
                Setor
            </label>

            <select
                name="nome_setor"
                id="nome_setor"
                class="form-select"
                style="max-width: 600px; color: black; background-color: white;"
                required
            >

                <option value="">Selecione um setor</option>

                <option value="RH" {{ old('nome_setor', isset($tarefa) ? $tarefa->nome_setor : '') == 'RH' ? 'selected' : '' }}>
                    RH
                </option>

                <option value="TI" {{ old('nome_setor', isset($tarefa) ? $tarefa->nome_setor : '') == 'TI' ? 'selected' : '' }}>
                    TI
                </option>

                <option value="Departamento" {{ old('nome_setor', isset($tarefa) ? $tarefa->nome_setor : '') == 'Departamento' ? 'selected' : '' }}>
                    Departamento
                </option>

                <option value="Maquinário" {{ old('nome_setor', isset($tarefa) ? $tarefa->nome_setor : '') == 'Maquinário' ? 'selected' : '' }}>
                    Maquinário
                </option>

            </select>

        </div>


        <div class="mb-3">

            <label for="prioridade" class="form-label">
                Prioridade
            </label>

            <select
                name="prioridade"
                id="prioridade"
                class="form-select"
                style="max-width: 600px; color: black; background-color: white;"
                required
            >

                <option value="">Selecione a prioridade</option>

                <option value="Alta" {{ old('prioridade', isset($tarefa) ? $tarefa->prioridade : '') == 'Alta' ? 'selected' : '' }}>
                    Alta
                </option>

                <option value="Média" {{ old('prioridade', isset($tarefa) ? $tarefa->prioridade : '') == 'Média' ? 'selected' : '' }}>
                    Média
                </option>

                <option value="Baixa" {{ old('prioridade', isset($tarefa) ? $tarefa->prioridade : '') == 'Baixa' ? 'selected' : '' }}>
                    Baixa
                </option>

            </select>

        </div>


        <div class="mb-3">

            <label for="data_cadastro" class="form-label">
                Data de cadastro
            </label>

            <input
                type="date"
                name="data_cadastro"
                id="data_cadastro"
                class="form-control"
                style="max-width: 600px;"
                value="{{ old('data_cadastro', isset($tarefa) ? $tarefa->data_cadastro : date('Y-m-d')) }}"
                required
            >

        </div>


        <div class="mb-3">

            <label for="status" class="form-label">
                Status
            </label>

            <select
                name="status"
                id="status"
                class="form-select"
                style="max-width: 600px; color: black; background-color: white;"
                required
            >

                <option value="">Selecione o status</option>

                <option value="A Fazer" {{ old('status', isset($tarefa) ? $tarefa->status : '') == 'A Fazer' ? 'selected' : '' }}>
                    A Fazer
                </option>

                <option value="Fazendo" {{ old('status', isset($tarefa) ? $tarefa->status : '') == 'Fazendo' ? 'selected' : '' }}>
                    Fazendo
                </option>

                <option value="Pronto" {{ old('status', isset($tarefa) ? $tarefa->status : '') == 'Pronto' ? 'selected' : '' }}>
                    Pronto
                </option>

            </select>

        </div>


        @if($errors->any())

            <div class="alert alert-danger">

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

        @endif


        <button type="submit" class="btn btn-primary">
            {{ isset($tarefa) ? 'Atualizar Tarefa' : 'Cadastrar Tarefa' }}
        </button>

        <a href="{{ route('tarefa.index') }}" class="btn btn-secondary">
            Voltar
        </a>

    </form>

</div>

@endsection