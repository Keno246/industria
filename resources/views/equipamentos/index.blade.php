<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Equipamentos</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body>

<div class="container mt-5">

    <h1>Equipamentos</h1>

    <a
        href="{{ route('equipamentos.create') }}"
        class="btn btn-success mb-3"
    >
        Novo Equipamento
    </a>

    <table class="table table-bordered table-striped">

        <thead>

            <tr>

                <th>Nome</th>
                <th>Patrimônio</th>
                <th>Setor</th>
                <th>Status</th>
                <th>Ações</th>

            </tr>

        </thead>

        <tbody>

            @foreach ($equipamentos as $equipamento)

                <tr>

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
                            href="{{ route('equipamentos.edit', $equipamento) }}"
                            class="btn btn-primary btn-sm"
                        >
                            Editar
                        </a>

                        <form
                            action="{{ route('equipamentos.destroy', $equipamento) }}"
                            method="POST"
                            style="display:inline;"
                        >

                            @csrf

                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
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

</body>

</html>