@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h1>Editar Manutenção</h1>

    {{-- Mensagem de sucesso --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Erros de validação --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Corrija os seguintes erros:</strong>

            <ul class="mb-0">
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('manutencoes.update', ['manutencao' => $manutencao->id]) }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        {{-- Equipamento --}}
        <div class="mb-3">
            <label for="equipamento_id" class="form-label">
                Equipamento
            </label>

            <select
                name="equipamento_id"
                id="equipamento_id"
                class="form-select"
                required
            >
                <option value="">Selecione um equipamento</option>

                @foreach($equipamentos as $equipamento)
                    <option
                        value="{{ $equipamento->id }}"
                        {{ old('equipamento_id', $manutencao->equipamento_id) == $equipamento->id ? 'selected' : '' }}
                    >
                        {{ $equipamento->nome }}
                    </option>
                @endforeach

            </select>
        </div>

        {{-- Funcionário --}}
        <div class="mb-3">
            <label for="funcionario_id" class="form-label">
                Funcionário
            </label>

            <select
                name="funcionario_id"
                id="funcionario_id"
                class="form-select"
                required
            >
                <option value="">Selecione um funcionário</option>

                @foreach($funcionarios as $funcionario)
                    <option
                        value="{{ $funcionario->id }}"
                        {{ old('funcionario_id', $manutencao->funcionario_id) == $funcionario->id ? 'selected' : '' }}
                    >
                        {{ $funcionario->nome }}
                    </option>
                @endforeach

            </select>
        </div>

        {{-- Tipo --}}
        <div class="mb-3">
            <label for="tipo" class="form-label">
                Tipo de manutenção
            </label>

            <input
                type="text"
                name="tipo"
                id="tipo"
                class="form-control"
                value="{{ old('tipo', $manutencao->tipo) }}"
                maxlength="50"
                required
            >
        </div>

        {{-- Descrição --}}
        <div class="mb-3">
            <label for="descricao" class="form-label">
                Descrição
            </label>

            <textarea
                name="descricao"
                id="descricao"
                class="form-control"
                rows="4"
            >{{ old('descricao', $manutencao->descricao) }}</textarea>
        </div>

        {{-- Data da manutenção --}}
        <div class="mb-3">
            <label for="data_manutencao" class="form-label">
                Data da manutenção
            </label>

            <input
                type="date"
                name="data_manutencao"
                id="data_manutencao"
                class="form-control"
                value="{{ old('data_manutencao', $manutencao->data_manutencao) }}"
            >
        </div>

        {{-- Próxima manutenção --}}
        <div class="mb-3">
            <label for="proxima_manutencao" class="form-label">
                Próxima manutenção
            </label>

            <input
                type="date"
                name="proxima_manutencao"
                id="proxima_manutencao"
                class="form-control"
                value="{{ old('proxima_manutencao', $manutencao->proxima_manutencao) }}"
            >
        </div>

        {{-- Custo --}}
        <div class="mb-3">
            <label for="custo" class="form-label">
                Custo
            </label>

            <input
                type="number"
                name="custo"
                id="custo"
                class="form-control"
                step="0.01"
                min="0"
                value="{{ old('custo', $manutencao->custo) }}"
            >
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label for="status" class="form-label">
                Status
            </label>

            <select
                name="status"
                id="status"
                class="form-select"
                required
            >
                <option
                    value="aberto"
                    {{ old('status', $manutencao->status) == 'aberto' ? 'selected' : '' }}
                >
                    Aberto
                </option>

                <option
                    value="em_andamento"
                    {{ old('status', $manutencao->status) == 'em_andamento' ? 'selected' : '' }}
                >
                    Em andamento
                </option>

                <option
                    value="concluido"
                    {{ old('status', $manutencao->status) == 'concluido' ? 'selected' : '' }}
                >
                    Concluído
                </option>
            </select>
        </div>

        {{-- Botões --}}
        <button type="submit" class="btn btn-primary">
            Atualizar
        </button>

        <a
            href="{{ route('manutencoes.index') }}"
            class="btn btn-secondary"
        >
            Voltar
        </a>

    </form>

</div>

@endsection