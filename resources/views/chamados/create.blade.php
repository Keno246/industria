<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Novo Chamado</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container mt-5">

    <h1>Novo Chamado</h1>

    {{-- MENSAGENS DE ERRO DA VALIDAÇÃO --}}
    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Corrija os seguintes erros:</strong>

            <ul class="mb-0 mt-2">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form action="{{ route('chamados.store') }}" method="POST">

        @csrf

        {{-- TÍTULO --}}
        <div class="mb-3">

            <label for="titulo" class="form-label">
                Título
            </label>

            <input
                type="text"
                name="titulo"
                id="titulo"
                class="form-control"
                maxlength="150"
                value="{{ old('titulo') }}"
            >

        </div>

        {{-- EQUIPAMENTO --}}
        <div class="mb-3">

            <label for="equipamento_id" class="form-label">
                Equipamento
            </label>

            <select
                name="equipamento_id"
                id="equipamento_id"
                class="form-select"
            >

                <option value="">
                    Selecione um equipamento
                </option>

                @foreach ($equipamentos as $equipamento)

                    <option
                        value="{{ $equipamento->id }}"
                        {{ old('equipamento_id') == $equipamento->id ? 'selected' : '' }}
                    >
                        {{ $equipamento->nome }}
                        - {{ $equipamento->patrimonio }}
                    </option>

                @endforeach

            </select>

        </div>

        <button
            type="submit"
            class="btn btn-success"
        >
            Abrir chamado
        </button>

        <a
            href="{{ route('chamados.index') }}"
            class="btn btn-secondary"
        >
            Voltar
        </a>

    </form>

</div>

</body>

</html>