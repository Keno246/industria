@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h1>Detalhes da Ordem de Produção</h1>

    <div class="card">

        <div class="card-body">

            {{-- ID --}}
            <p>
                <strong>ID:</strong>
                {{ $ordemProducao->id }}
            </p>

            {{-- Código da ordem --}}
            <p>
                <strong>Código da Ordem:</strong>
                {{ $ordemProducao->codigo_ordem }}
            </p>

            {{-- Produto --}}
            <p>
                <strong>Produto:</strong>
                {{ $ordemProducao->produto }}
            </p>

            {{-- Setor --}}
            <p>
                <strong>Setor:</strong>
                {{ $ordemProducao->setor_id }}
            </p>

            {{-- Responsável --}}
            <p>
                <strong>Responsável:</strong>
                {{ $ordemProducao->responsavel_id }}
            </p>

            {{-- Quantidade planejada --}}
            <p>
                <strong>Quantidade Planejada:</strong>
                {{ $ordemProducao->quantidade_planejada }}
            </p>

            {{-- Quantidade produzida --}}
            <p>
                <strong>Quantidade Produzida:</strong>
                {{ $ordemProducao->quantidade_produzida }}
            </p>

            {{-- Data de início --}}
            <p>
                <strong>Data de Início:</strong>

                @if($ordemProducao->data_inicio)
                    {{ $ordemProducao->data_inicio->format('d/m/Y H:i') }}
                @else
                    -
                @endif
            </p>

            {{-- Data de fim --}}
            <p>
                <strong>Data de Fim:</strong>

                @if($ordemProducao->data_fim)
                    {{ $ordemProducao->data_fim->format('d/m/Y H:i') }}
                @else
                    -
                @endif
            </p>

            {{-- Status --}}
            <p>
                <strong>Status:</strong>
                {{ $ordemProducao->status }}
            </p>

            {{-- Observações --}}
            <p>
                <strong>Observações:</strong>
                {{ $ordemProducao->observacoes ?? '-' }}
            </p>

            <hr>

            {{-- Botões --}}

            <a
                href="{{ route('ordens_producao.edit', ['ordemProducao' => $ordemProducao->id]) }}"
                class="btn btn-primary"
            >
                Editar
            </a>

            <a
                href="{{ route('ordens_producao.index') }}"
                class="btn btn-secondary"
            >
                Voltar
            </a>

        </div>

    </div>

</div>

@endsection