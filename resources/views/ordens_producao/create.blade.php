@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h1>Nova Ordem de Produção</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Corrija os seguintes erros:</strong>

            <ul>
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('ordens_producao.store') }}"
        method="POST"
    >

        @csrf

        {{-- Setor --}}
        <div class="mb-3">
            <label for="setor_id" class="form-label">
                Setor
            </label>

            <select
                name="setor_id"
                id="setor_id"
                class="form-select"
                required
            >
                <option value="">Selecione um setor</option>

                @foreach($setores as $setor)
                    <option
                        value="{{ $setor->id }}"
                        {{ old('setor_id') == $setor->id ? 'selected' : '' }}
                    >
                        {{ $setor->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Responsável --}}
        <div class="mb-3">
            <label for="responsavel_id" class="form-label">
                Responsável
            </label>

            <select
                name="responsavel_id"
                id="responsavel_id"
                class="form-select"
                required
            >
                <option value="">Selecione um responsável</option>

                @foreach($funcionarios as $funcionario)
                    <option
                        value="{{ $funcionario->id }}"
                        {{ old('responsavel_id') == $funcionario->id ? 'selected' : '' }}
                    >
                        {{ $funcionario->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Código --}}
        <div class="mb-3">
            <label for="codigo_ordem" class="form-label">
                Código da Ordem
            </label>

            <input
                type="text"
                name="codigo_ordem"
                id="codigo_ordem"
                class="form-control"
                value="{{ old('codigo_ordem') }}"
                maxlength="30"
                required
            >
        </div>

        {{-- Produto --}}
        <div class="mb-3">
            <label for="produto" class="form-label">
                Produto
            </label>

            <input
                type="text"
                name="produto"
                id="produto"
                class="form-control"
                value="{{ old('produto') }}"
                maxlength="100"
                required
            >
        </div>

        {{-- Quantidade planejada --}}
        <div class="mb-3">
            <label for="quantidade_planejada" class="form-label">
                Quantidade Planejada
            </label>

            <input
                type="number"
                name="quantidade_planejada"
                id="quantidade_planejada"
                class="form-control"
                value="{{ old('quantidade_planejada') }}"
                min="1"
                required
            >
        </div>

        {{-- Quantidade produzida --}}
        <div class="mb-3">
            <label for="quantidade_produzida" class="form-label">
                Quantidade Produzida
            </label>

            <input
                type="number"
                name="quantidade_produzida"
                id="quantidade_produzida"
                class="form-control"
                value="{{ old('quantidade_produzida', 0) }}"
                min="0"
                required
            >
        </div>

        {{-- Data início --}}
        <div class="mb-3">
            <label for="data_inicio" class="form-label">
                Data de Início
            </label>

            <input
                type="datetime-local"
                name="data_inicio"
                id="data_inicio"
                class="form-control"
                value="{{ old('data_inicio') }}"
            >
        </div>

        {{-- Data fim --}}
        <div class="mb-3">
            <label for="data_fim" class="form-label">
                Data de Fim
            </label>

            <input
                type="datetime-local"
                name="data_fim"
                id="data_fim"
                class="form-control"
                value="{{ old('data_fim') }}"
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
                <option value="">Selecione</option>

                <option value="Aberta">
                    Aberta
                </option>

                <option value="Em produção">
                    Em produção
                </option>

                <option value="Finalizada">
                    Finalizada
                </option>
            </select>
        </div>

        {{-- Observações --}}
        <div class="mb-3">
            <label for="observacoes" class="form-label">
                Observações
            </label>

            <textarea
                name="observacoes"
                id="observacoes"
                class="form-control"
                rows="4"
            >{{ old('observacoes') }}</textarea>
        </div>

        <button
            type="submit"
            class="btn btn-success"
        >
            Cadastrar
        </button>

        <a
            href="{{ route('ordens_producao.index') }}"
            class="btn btn-secondary"
        >
            Voltar
        </a>

    </form>

</div>

@endsection