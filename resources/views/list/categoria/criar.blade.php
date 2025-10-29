<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Categoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Gerenciador de Tarefas</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="{{ route('categorias.index') }}" class="nav-link">Início</a></li>
                    <li class="nav-item"><a href="{{ route('categorias.create') }}" class="nav-link active">Nova Categoria</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow border-0">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Criar Nova Categoria</h4>
                    </div>

                    <div class="card-body">

                        @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $erro)
                                <li>{{ $erro }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ route('categorias.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome da Categoria</label>
                                <input type="text" name="nome" id="nome" class="form-control shadow-sm"
                                    placeholder="Digite o nome da categoria" required>
                            </div>

                            <button type="submit" class="btn btn-success w-100 shadow-sm">Salvar Categoria</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-5 shadow-sm">
        Sistema de Tarefas Laravel
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
