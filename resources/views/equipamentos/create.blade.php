<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastrar Equipamento</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container mt-5">

    <h1>Cadastrar Equipamento</h1>

    <form action="{{ route('equipamentos.store') }}" method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">Nome</label>

            <input
                type="text"
                name="nome"
                class="form-control"
                required
            >

        </div>

        <div class="mb-3">

            <label class="form-label">Patrimônio</label>

            <input
                type="text"
                name="patrimonio"
                class="form-control"
                required
            >

        </div>

        <div class="mb-3">

            <label class="form-label">Setor</label>

            <select name="setor_id" class="form-select">

                <option value="">Selecione um setor</option>

                @foreach ($setores as $setor)

                    <option value="{{ $setor->id }}">
                        {{ $setor->nome }}
                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">Status</label>

            <select name="status" class="form-select">

                <option value="ativo">Ativo</option>
                <option value="inativo">Inativo</option>
                <option value="manutencao">Em manutenção</option>

            </select>

        </div>

        <button type="submit" class="btn btn-success">
            Cadastrar
        </button>

    </form>

</div>

</body>
</html>