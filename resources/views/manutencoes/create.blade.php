<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Nova Manutenção</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container mt-5">

    <h1>Nova Manutenção</h1>

    @if ($errors->any())

        <div class="alert alert-danger">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif

    <form
        action="{{ route('manutencoes.store') }}"
        method="POST"
    >

        @csrf

        <div class="mb-3">

            <label>Equipamento</label>

            <select
                name="equipamento_id"
                class="form-select"
            >

                <option value="">
                    Selecione
                </option>

                @foreach ($equipamentos as $equipamento)

                    <option value="{{ $equipamento->id }}">
                        {{ $equipamento->nome }}
                        - {{ $equipamento->patrimonio }}
                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Funcionário</label>

            <select
                name="funcionario_id"
                class="form-select"
            >

                <option value="">
                    Selecione
                </option>

                @foreach ($funcionarios as $funcionario)

                    <option value="{{ $funcionario->id }}">
                        {{ $funcionario->nome }}
                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Tipo</label>

            <select
                name="tipo"
                class="form-select"
            >

                <option value="Preventiva">
                    Preventiva
                </option>

                <option value="Corretiva">
                    Corretiva
                </option>

                <option value="Preditiva">
                    Preditiva
                </option>

            </select>

        </div>

        <div class="mb-3">

            <label>Descrição</label>

            <textarea
                name="descricao"
                class="form-control"
            ></textarea>

        </div>

        <div class="mb-3">

            <label>Data da manutenção</label>

            <input
                type="date"
                name="data_manutencao"
                class="form-control"
            >

        </div>

        <div class="mb-3">

            <label>Próxima manutenção</label>

            <input
                type="date"
                name="proxima_manutencao"
                class="form-control"
            >

        </div>

        <div class="mb-3">

            <label>Custo</label>

            <input
                type="number"
                step="0.01"
                name="custo"
                class="form-control"
            >

        </div>

        <div class="mb-3">

            <label>Status</label>

            <select
                name="status"
                class="form-select"
            >

                <option value="Pendente">
                    Pendente
                </option>

                <option value="Em andamento">
                    Em andamento
                </option>

                <option value="Concluída">
                    Concluída
                </option>

            </select>

        </div>

        <button
            type="submit"
            class="btn btn-success"
        >
            Salvar
        </button>

        <a
            href="{{ route('manutencoes.index') }}"
            class="btn btn-secondary"
        >
            Voltar
        </a>

    </form>

</div>

</body>
</html>