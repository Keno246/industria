<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Manutenções</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container mt-5">

    <h1>Manutenções</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a
        href="{{ route('manutencoes.create') }}"
        class="btn btn-success mb-3"
    >
        Nova Manutenção
    </a>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>ID</th>
                <th>Equipamento</th>
                <th>Funcionário</th>
                <th>Tipo</th>
                <th>Data</th>
                <th>Custo</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

        @forelse ($manutencoes as $manutencao)

            <tr>

                <td>
                    {{ $manutencao->id }}
                </td>

                <td>
                    {{ $manutencao->equipamento->nome ?? 'N/A' }}
                </td>

                <td>
                    {{ $manutencao->funcionario->nome ?? 'N/A' }}
                </td>

                <td>
                    {{ $manutencao->tipo }}
                </td>

                <td>
                    {{ $manutencao->data_manutencao }}
                </td>

                <td>
                    R$ {{ number_format($manutencao->custo, 2, ',', '.') }}
                </td>

                <td>
                    {{ $manutencao->status }}
                </td>

                <td>

                    <a
                        href="{{ route('manutencoes.show', $manutencao) }}"
                        class="btn btn-info btn-sm"
                    >
                        Ver
                    </a>

                    <a
                        href="{{ route('manutencoes.edit', $manutencao) }}"
                        class="btn btn-warning btn-sm"
                    >
                        Editar
                    </a>

                    <form
                        action="{{ route('manutencoes.destroy', $manutencao) }}"
                        method="POST"
                        style="display:inline"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Deseja excluir?')"
                        >
                            Excluir
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="8" class="text-center">
                    Nenhuma manutenção cadastrada.
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

</body>
</html>