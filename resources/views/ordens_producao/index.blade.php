@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h1>Ordens de Produção</h1>

        <a
            href="{{ route('ordens_producao.create') }}"
            class="btn btn-success"
        >
            Nova Ordem
        </a>

    </div>

    {{-- Mensagem de sucesso --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Mensagens de erro --}}
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

    @if($ordens->count() > 0)

        <div class="table-responsive">

            <table class="table table-bordered table-striped">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Código</th>
                        <th>Produto</th>
                        <th>Quantidade Planejada</th>
                        <th>Quantidade Produzida</th>
                        <th>Data de Início</th>
                        <th>Data de Fim</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($ordens as $ordem)

                        <tr>

                            {{-- ID --}}
                            <td>
                                {{ $ordem->id }}
                            </td>

                            {{-- Código --}}
                            <td>
                                {{ $ordem->codigo_ordem }}
                            </td>

                            {{-- Produto --}}
                            <td>
                                {{ $ordem->produto }}
                            </td>

                            {{-- Quantidade planejada --}}
                            <td>
                                {{ $ordem->quantidade_planejada }}
                            </td>

                            {{-- Quantidade produzida --}}
                            <td>
                                {{ $ordem->quantidade_produzida }}
                            </td>

                            {{-- Data de início --}}
                            <td>
                                @if($ordem->data_inicio)
                                    {{ $ordem->data_inicio->format('d/m/Y H:i') }}
                                @else
                                    -
                                @endif
                            </td>

                            {{-- Data de fim --}}
                            <td>
                                @if($ordem->data_fim)
                                    {{ $ordem->data_fim->format('d/m/Y H:i') }}
                                @else
                                    -
                                @endif
                            </td>

                            {{-- Status --}}
                            <td>
                                {{ $ordem->status }}
                            </td>

                            {{-- Ações --}}
                            <td>

                                <a
                                    href="{{ route('ordens_producao.show', ['ordemProducao' => $ordem->id]) }}"
                                    class="btn btn-info btn-sm"
                                >
                                    Ver
                                </a>

                                <a
                                    href="{{ route('ordens_producao.edit', ['ordemProducao' => $ordem->id]) }}"
                                    class="btn btn-primary btn-sm"
                                >
                                    Editar
                                </a>

                                <form
                                    action="{{ route('ordens_producao.destroy', ['ordemProducao' => $ordem->id]) }}"
                                    method="POST"
                                    style="display:inline;"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Tem certeza que deseja excluir esta ordem?')"
                                    >
                                        Excluir
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    @else

        <div class="alert alert-info">
            Nenhuma ordem de produção cadastrada.
        </div>

    @endif

</div>

@endsection