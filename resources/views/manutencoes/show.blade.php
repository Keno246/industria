<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Manutenção</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container mt-5">

    <h1>Detalhes da Manutenção</h1>

    <p>
        <strong>ID:</strong>
        {{ $manutencao->id }}
    </p>

    <p>
        <strong>Equipamento:</strong>
        {{ $manutencao->equipamento->nome ?? 'N/A' }}
    </p>

    <p>
        <strong>Funcionário:</strong>
        {{ $manutencao->funcionario->nome ?? 'N/A' }}
    </p>

    <p>
        <strong>Tipo:</strong>
        {{ $manutencao->tipo }}
    </p>

    <p>
        <strong>Descrição:</strong>
        {{ $manutencao->descricao }}
    </p>

    <p>
        <strong>Data:</strong>
        {{ $manutencao->data_manutencao }}
    </p>

    <p>
        <strong>Próxima manutenção:</strong>
        {{ $manutencao->proxima_manutencao }}
    </p>

    <p>
        <strong>Custo:</strong>
        R$ {{ number_format($manutencao->custo, 2, ',', '.') }}
    </p>

    <p>
        <strong>Status:</strong>
        {{ $manutencao->status }}
    </p>

    <a
        href="{{ route('manutencoes.index') }}"
        class="btn btn-secondary"
    >
        Voltar
    </a>

</div>

</body>
</html>