<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Chamados de Manutenção</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>Chamados de Manutenção</h1>

        <a
            href="{{ route('chamados.create') }}"
            class="btn btn-success"
        >
            Novo Chamado
        </a>

    </div>

    @if (session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <table class="table table-bordered table-striped">

        <thead>

            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Status</th>
                <th>Equipamento</th>
                <th>Usuário</th>
            </tr>

        </thead>

        <tbody>

            @forelse ($chamados as $chamado)

                <tr>

                    <td>
                        {{ $chamado->id }}
                    </td>

                    <td>
                        {{ $chamado->titulo }}
                    </td>

                    <td>
                        {{ $chamado->status }}
                    </td>

                    <td>
                        {{ $chamado->equipamento->nome ?? 'N/A' }}
                    </td>

                    <td>
                        {{ $chamado->user->name ?? 'N/A' }}
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center">
                        Nenhum chamado encontrado.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

</body>

</html>