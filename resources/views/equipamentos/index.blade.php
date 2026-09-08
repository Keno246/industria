@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="mb-4">Equipamentos</h1>

    <form method="GET" action="{{ route('equipamentos.index') }}" class="mb-4">

        <div class="row">

            <div class="col-md-3">
                <label for="nome" class="form-label">Nome</label>

                <input
                    type="text"
                    name="nome"
                    id="nome"
                    class="form-control"
                    value="{{ request('nome') }}"
                >
            </div>

            <div class="col-md-3">
                <label for="status" class="form-label">Status</label>

                <select
                    name="status"
                    id="status"
                    class="form-select"
                >
                    <option value="">Todos</option>

                    <option
                        value="ativo"
                        {{ request('status') == 'ativo' ? 'selected' : '' }}
                    >
                        Ativo
                    </option>

                    <option
                        value="manutencao"
                        {{ request('status') == 'manutencao' ? 'selected' : '' }}
                    >
                        Manutenção
                    </option>

                    <option
                        value="inativo"
                        {{ request('status') == 'inativo' ? 'selected' : '' }}
                    >
                        Inativo
                    </option>

                </select>
            </div>

            <div class="col-md-3">
                <label for="setor_id" class="form-label">Setor</label>

                <select
                    name="setor_id"
                    id="setor_id"
                    class="form-select"
                >
                    <option value="">Todos</option>

                    @foreach($setores as $setor)

                        <option
                            value="{{ $setor->id }}"
                            {{ request('setor_id') == $setor->id ? 'selected' : '' }}
                        >
                            {{ $setor->nome }}
                        </option>

                    @endforeach

                </select>
            </div>

            <div class="col-md-3">
                <label for="patrimonio" class="form-label">
                    Patrimônio
                </label>

                <input
                    type="text"
                    name="patrimonio"
                    id="patrimonio"
                    class="form-control"
                    value="{{ request('patrimonio') }}"
                >
            </div>

        </div>

        <div class="mt-3">

            <button
                type="submit"
                class="btn btn-primary"
            >
                Filtrar
            </button>

            <a
                href="{{ route('equipamentos.index') }}"
                class="btn btn-secondary"
            >
                Limpar
            </a>

        </div>

    </form>

    @if($setorSelecionado)
        <div class="alert alert-info">
            Setor selecionado:
            <strong>{{ $setorSelecionado->nome }}</strong>
        </div>
    @endif

    <table class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Patrimônio</th>
                <th>Setor</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

            @forelse($equipamentos as $equipamento)

                <tr>

                    <td>
                        {{ $equipamento->id }}
                    </td>

                    <td>
                        {{ $equipamento->nome }}
                    </td>

                    <td>
                        {{ $equipamento->patrimonio }}
                    </td>

                    <td>
                        {{ $equipamento->setor_id }}
                    </td>

                    <td>
                        {{ $equipamento->status }}
                    </td>

                    <td>

                        <a
                            href="{{ route('equipamentos.show', $equipamento->id) }}"
                            class="btn btn-info btn-sm"
                        >
                            Ver
                        </a>

                        <a
                            href="{{ route('equipamentos.edit', $equipamento->id) }}"
                            class="btn btn-warning btn-sm"
                        >
                            Editar
                        </a>

                        <form
                            action="{{ route('equipamentos.destroy', $equipamento->id) }}"
                            method="POST"
                            class="d-inline"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Tem certeza que deseja excluir?')"
                            >
                                Excluir
                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="6" class="text-center">
                        Nenhum equipamento encontrado.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection