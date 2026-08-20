<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Equipamento</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body>

<div class="container mt-5">

    <h1>Editar Equipamento</h1>

    <form
        action="{{ route('equipamentos.update', $equipamento) }}"
        method="POST"
    >

        @csrf

        @method('PUT')

        <div class="mb-3">

            <label class="form-label">Nome</label>

            <input
                type="text"
                name="nome"
                class="form-control"
                value="{{ $equipamento->nome }}"
                required
            >

        </div>

        <div class="mb-3">

            <label class="form-label">Patrimônio</label>

            <input
                type="text"
                name="patrimonio"
                class="form-control"
                value="{{ $equipamento->patrimonio }}"
                required
            >

        </div>

        <div class="mb-3">

            <label class="form-label">Setor</label>

            <select name="setor_id" class="form-select">

                <option value="">Selecione um setor</option>

                @foreach ($setores as $setor)

                    <option
                        value="{{ $setor->id }}"
                        {{ $equipamento->setor_id == $setor->id ? 'selected' : '' }}
                    >
                        {{ $setor->nome }}
                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">Status</label>

            <select name="status" class="form-select">

                <option
                    value="ativo"
                    {{ $equipamento->status == 'ativo' ? 'selected' : '' }}
                >
                    Ativo
                </option>

                <option
                    value="inativo"
                    {{ $equipamento->status == 'inativo' ? 'selected' : '' }}
                >
                    Inativo
                </option>

                <option
                    value="manutencao"
                    {{ $equipamento->status == 'manutencao' ? 'selected' : '' }}
                >
                    Em manutenção
                </option>

            </select>

        </div>

        <button type="submit" class="btn btn-primary">
            Atualizar
        </button>

    </form>

</div>

</body>

</html>