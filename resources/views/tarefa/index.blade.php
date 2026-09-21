@extends('layouts.app')

@section('title', 'Gerenciamento de Tarefas')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Gerenciamento de Tarefas</h1>

        <a href="{{ route('tarefa.create') }}" class="btn btn-primary">
            Cadastrar Tarefa
        </a>
    </div>

    <div class="row">

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>A Fazer</h4>
                </div>

                <div class="card-body">

                    @forelse($aFazer as $tarefa)

                        <div class="card mb-3">
                            <div class="card-body">

                                <p>
                                    <strong>Descrição:</strong>
                                    {{ $tarefa->descricao }}
                                </p>

                                <p>
                                    <strong>Setor:</strong>
                                    {{ $tarefa->nome_setor }}
                                </p>

                                <p>
                                    <strong>Prioridade:</strong>
                                    {{ $tarefa->prioridade }}
                                </p>

                                <p>
                                    <strong>Usuário vinculado:</strong>
                                    {{ $tarefa->usuario_nome }}
                                </p>

                                <p>
                                    <strong>Status:</strong>
                                    {{ $tarefa->status }}
                                </p>

                                <div class="d-flex gap-2 mb-3">

                                    <a
                                        href="{{ route('tarefa.edit', $tarefa->id) }}"
                                        class="btn btn-warning btn-sm"
                                    >
                                        Editar
                                    </a>

                                    <form
                                        action="{{ route('tarefa.destroy', $tarefa->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Excluir
                                        </button>
                                    </form>

                                </div>

                                <form
                                    action="{{ route('tarefa.status', $tarefa->id) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('PATCH')

                                    <div class="d-flex gap-2">

                                        <select
                                            name="status"
                                            class="form-select form-select-sm"
                                        >
                                            <option value="A Fazer">A Fazer</option>
                                            <option value="Fazendo">Fazendo</option>
                                            <option value="Pronto">Pronto</option>
                                        </select>

                                        <button
                                            type="submit"
                                            class="btn btn-primary btn-sm"
                                        >
                                            Alterar Status
                                        </button>

                                    </div>

                                </form>

                            </div>
                        </div>

                    @empty

                        <p>Nenhuma tarefa nesta coluna.</p>

                    @endforelse

                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Fazendo</h4>
                </div>

                <div class="card-body">

                    @forelse($fazendo as $tarefa)

                        <div class="card mb-3">
                            <div class="card-body">

                                <p>
                                    <strong>Descrição:</strong>
                                    {{ $tarefa->descricao }}
                                </p>

                                <p>
                                    <strong>Setor:</strong>
                                    {{ $tarefa->nome_setor }}
                                </p>

                                <p>
                                    <strong>Prioridade:</strong>
                                    {{ $tarefa->prioridade }}
                                </p>

                                <p>
                                    <strong>Usuário vinculado:</strong>
                                    {{ $tarefa->usuario_nome }}
                                </p>

                                <p>
                                    <strong>Status:</strong>
                                    {{ $tarefa->status }}
                                </p>

                                <div class="d-flex gap-2 mb-3">

                                    <a
                                        href="{{ route('tarefa.edit', $tarefa->id) }}"
                                        class="btn btn-warning btn-sm"
                                    >
                                        Editar
                                    </a>

                                    <form
                                        action="{{ route('tarefa.destroy', $tarefa->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Excluir
                                        </button>
                                    </form>

                                </div>

                                <form
                                    action="{{ route('tarefa.status', $tarefa->id) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('PATCH')

                                    <div class="d-flex gap-2">

                                        <select
                                            name="status"
                                            class="form-select form-select-sm"
                                        >
                                            <option value="A Fazer">A Fazer</option>
                                            <option value="Fazendo" selected>Fazendo</option>
                                            <option value="Pronto">Pronto</option>
                                        </select>

                                        <button
                                            type="submit"
                                            class="btn btn-primary btn-sm"
                                        >
                                            Alterar Status
                                        </button>

                                    </div>

                                </form>

                            </div>
                        </div>

                    @empty

                        <p>Nenhuma tarefa nesta coluna.</p>

                    @endforelse

                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Pronto</h4>
                </div>

                <div class="card-body">

                    @forelse($pronto as $tarefa)

                        <div class="card mb-3">
                            <div class="card-body">

                                <p>
                                    <strong>Descrição:</strong>
                                    {{ $tarefa->descricao }}
                                </p>

                                <p>
                                    <strong>Setor:</strong>
                                    {{ $tarefa->nome_setor }}
                                </p>

                                <p>
                                    <strong>Prioridade:</strong>
                                    {{ $tarefa->prioridade }}
                                </p>

                                <p>
                                    <strong>Usuário vinculado:</strong>
                                    {{ $tarefa->usuario_nome }}
                                </p>

                                <p>
                                    <strong>Status:</strong>
                                    {{ $tarefa->status }}
                                </p>

                                <div class="d-flex gap-2 mb-3">

                                    <a
                                        href="{{ route('tarefa.edit', $tarefa->id) }}"
                                        class="btn btn-warning btn-sm"
                                    >
                                        Editar
                                    </a>

                                    <form
                                        action="{{ route('tarefa.destroy', $tarefa->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Excluir
                                        </button>
                                    </form>

                                </div>

                                <form
                                    action="{{ route('tarefa.status', $tarefa->id) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('PATCH')

                                    <div class="d-flex gap-2">

                                        <select
                                            name="status"
                                            class="form-select form-select-sm"
                                        >
                                            <option value="A Fazer">A Fazer</option>
                                            <option value="Fazendo">Fazendo</option>
                                            <option value="Pronto" selected>Pronto</option>
                                        </select>

                                        <button
                                            type="submit"
                                            class="btn btn-primary btn-sm"
                                        >
                                            Alterar Status
                                        </button>

                                    </div>

                                </form>

                            </div>
                        </div>

                    @empty

                        <p>Nenhuma tarefa nesta coluna.</p>

                    @endforelse

                </div>
            </div>
        </div>

    </div>

</div>

@endsection