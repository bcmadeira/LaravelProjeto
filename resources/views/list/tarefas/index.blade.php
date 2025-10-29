<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Gerenciador de Tarefas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="{{ route('tarefas.index') }}" class="nav-link active">Início</a></li>
                    <li class="nav-item"><a href="{{ route('tarefas.create') }}" class="nav-link">Nova Tarefa</a></li>
                    <li class="nav-item"><a href="{{ route('categorias.index') }}" class="nav-link">Categorias</a></li>
                    <li class="nav-item"><a href="{{ route('categorias.create') }}" class="nav-link">Nova Categoria</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold">Lista de Tarefas</h1>
            <a href="{{ route('tarefas.create') }}" class="btn btn-primary shadow-sm">+ Nova Tarefa</a>
        </div>

        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($tarefas->isEmpty())
        <div class="alert alert-warning">Nenhuma tarefa cadastrada ainda.</div>
        @else
        <div class="card shadow border-0">
            <div class="card-body p-0">
                <table class="table table-striped mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Título</th>
                            <th>Descrição</th>
                            <th>Categoria</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tarefas as $tarefa)
                        <tr>
                            <td>{{ $tarefa->nome }}</td>
                            <td>{{ $tarefa->observacao ?? '—' }}</td>
                            <td>{{ $tarefa->categoria->nome ?? 'Sem categoria' }}</td>
                            <td>
                                @if ($tarefa->status)
                                <span class="badge bg-success">Concluída</span>
                                @else
                                <span class="badge bg-secondary">Pendente</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('tarefas.toggleStatus', $tarefa->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="btn btn-sm {{ $tarefa->status ? 'btn-warning' : 'btn-success' }}">
                                        {{ $tarefa->status ? 'Marcar como pendente' : 'Concluir' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-5 shadow-sm">
        Sistema de Tarefas Laravel
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
