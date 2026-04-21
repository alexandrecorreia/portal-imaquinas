<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Painel Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    @yield('styles')
    <style>
        body { background-color: #f8f9fa; }
        .navbar { 
            background-color: #00858D;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1); 
        }
        .container { margin-top: 2rem; }
        
        /* Moldura para páginas admin */
        .page-container {
            padding: 30px 20px; /* Aumentei o padding pra dar mais espaço interno */
            border: 1px solid #E6F0FA; /* Borda clara pra criar o efeito de moldura */
            border-radius: 10px; /* Bordas arredondadas pra combinar com o design */
            background-color: #FFFFFF; /* Fundo branco pra destacar o conteúdo */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra suave */
            margin-bottom: 20px; /* Espaço abaixo da moldura */
        }

        /* Ajuste pra mobile */
        @media (max-width: 768px) {
            .page-container {
                padding: 20px 10px; /* Reduz o padding em mobile */
                border-radius: 8px; /* Bordas um pouco menores em mobile */
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Painel de Controle - Administrador</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.imagens') }}">Imagens</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.videos') }}">Vídeos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.pdfs') }}">PDFs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.pages.index') }}">Páginas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.logout') }}">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @yield('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const alerts = document.querySelectorAll('.alert-danger, .alert-error, .alert-success');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 3000);
            });
        });
    </script>    
</body>
</html>