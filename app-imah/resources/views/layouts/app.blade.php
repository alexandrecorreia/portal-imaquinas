<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Indústria de Máquinas IMAH - Tradição e inovação desde 1993 na fabricação de equipamentos industriais.">
    <meta name="keywords" content="máquinas industriais, IMAH, serigrafia, impressão, inovação">
    <meta property="og:title" content="Indústria de Máquinas IMAH">
    <meta property="og:description" content="Tradição e inovação desde 1993 na fabricação de máquinas serigráficas.">
    <meta property="og:image" content="{{ asset('img/logo-original-imah.png') }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">
    <link rel="canonical" href="{{ url('/') }}">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <link rel="preload" href="{{ asset('img/fundo-maquina-desenho.jpg') }}" as="image">
    <link rel="preload" href="{{ asset('video/loja-imah.mp4') }}" as="video">
    <link rel="preload" href="{{ asset('img/linea-uv.png') }}" as="image">
    <title>@yield('title', 'Indústria de Máquinas - IMAH')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand logo-highlight" href="{{ url('/') }}" aria-label="Página inicial da Indústria de Máquinas IMAH">
                <picture>
                    <source media="(max-width: 768px)" srcset="{{ asset('img/logo-original-mobile-imah.png') }}" type="image/png">
                    <img src="{{ asset('img/logo-original-imah.png') }}" alt="Indústria de Máquinas - IMAH" class="logo-desktop" width="275" height="auto">
                </picture>
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav nav-menu-custom">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}#inicio">Principal</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ url('/') }}#equipamentos" id="equipamentosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Equipamentos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="equipamentosDropdown">
                            <li><a class="dropdown-item" href="{{ url('/equipamentos') }}#impressoras">Impressoras</a></li>
                            <li><a class="dropdown-item" href="{{ url('/equipamentos') }}#envernizadoras">Envernizadoras</a></li>
                            <li><a class="dropdown-item" href="{{ url('/equipamentos') }}#secagem">Secagem</a></li>
                            <li><a class="dropdown-item" href="{{ url('/equipamentos') }}#laboratorios">Laboratórios</a></li>
                            <li><a class="dropdown-item" href="{{ url('/equipamentos') }}#laminadoras">Laminadoras</a></li>
                            <li><a class="dropdown-item" href="{{ url('/equipamentos') }}#acessorios">Acessórios</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}#about-section">Empresa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}#ecommerce">E-commerce</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/contato') }}">Contato</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Botão Voltar ao Topo -->
    <button class="back-to-top" aria-label="Voltar ao topo da página">
        <i class="bi bi-arrow-up"></i>
    </button>

    <!-- Conteúdo da página -->
    @yield('content')

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Navegação</h5>
                    <ul>
                        <li><a href="{{ url('/') }}#inicio">Principal</a></li>
                        <li><a href="{{ url('/') }}#equipamentos">Equipamentos</a></li>
                        <li><a href="{{ url('/') }}#about-section">Empresa</a></li>
                        <li><a href="{{ url('/') }}#ecommerce">E-commerce</a></li>
                        <li><a href="{{ url('/contato') }}">Contato</a></li>
                        <li><a href="{{ url('/downloads') }}">Downloads</a></li>
                        <li><a href="{{ url('/admin') }}" target="_blank">Reservado</a></li>
                        <li><a href="https://webmail.imah.com.br" target="_blank">Webmail</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Siga-nos</h5>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/IMAHOficial" target="_blank" title="Facebook">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.95v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
                            </svg>
                        </a>
                        <a href="https://www.youtube.com/@IMAHOfficial" target="_blank" title="YouTube">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104C.013 8.724.005 7.833.005 7.657v-.075c.001-.194.01-1.108.082-2.06L.09 5.417l-.008-.104c.05-.572.124-1.14.235-1.558a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"></path>
                            </svg>
                        </a>
                        <a href="https://www.instagram.com/imah_oficial/" target="_blank" title="Instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C2.556 15.99 2.827 16 4.701 16c2.172 0 2.444-.01 3.298-.048.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8c0-2.172-.01-2.444-.048-3.297-.04-.852-.174-1.433-.372-1.941-.205-.526-.478-.972-.923-1.417-.444-.445-.89-.719-1.416-.923-.51-.198-1.09-.333-1.942-.372C10.445.01 10.173 0 8 0zM8 1.442c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.282.24.705.275 1.485.039.844.046 1.096.046 3.233s-.007 2.389-.046 3.232c-.035.78-.166 1.203-.275 1.485-.145.373-.319.64-.599.92-.28.28-.546.453-.92.598-.282.11-.705.24-1.485.275-.844.039-1.096.046-3.232.046s-2.39-.007-3.233-.046c-.78-.035-1.203-.166-1.485-.275a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.598-.92c-.11-.282-.24-.705-.275-1.485-.039-.843-.046-1.096-.046-3.232s.007-2.39.046-3.233c.035-.78.166-1.203.275-1.485.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.275.844-.039 1.096-.046 3.233-.046zM8 4.257c-2.01 0-3.743 1.632-3.743 3.743 0 2.01 1.632 3.743 3.743 3.743 2.01 0 3.743-1.632 3.743-3.743 0-2.01-1.632-3.743-3.743-3.743zm0 1.5c1.268 0 2.243.975 2.243 2.243 0 1.268-.975 2.243-2.243 2.243-1.268 0-2.243-.975-2.243-2.243 0-1.268.975-2.243 2.243-2.243zM11.757 3.743a.5.5 0 1 1 0 1 .5.5 0 0 1 0-1z"></path>
                            </svg>
                        </a>
                        <a href="https://www.linkedin.com/company/imah-oficial/" target="_blank" title="LinkedIn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5>Atendimento</h5>
                    <div class="contact-info">
                        <p>
                            <a href="tel:+554135576008">
                                <i class="bi bi-whatsapp"></i>
                                +55 41-3557-6008
                            </a>
                        </p>
                        <p>
                            <a href="mailto:imah@imah.com.br">
                                <i class="bi bi-envelope"></i>                                
                                imah@imah.com.br
                            </a>
                        </p>
                        <p>
                            <a href="https://www.google.com.br/maps/place/Av. Professor Alberto Piekarz, 1937 - Colônia Vila Prado, Alm. Tamandaré - PR, 83504-595" target="_blank" rel="noopener noreferrer">
                                <i class="bi bi-geo-alt-fill"></i>                            
                                Av. Professor Alberto Piekarz, 1937<br>Alm. Tamandaré-PR
                            </a>                            
                        </p>
                    </div>
                </div>
            </div>
            <div class="bottom-bar">
                <p id="footer-year">© <span></span> Indústria de Máquinas - <a href="{{ url('/') }}">imah.com.br</a></p>
            </div>
        </div>
    </footer>

    <!-- Botão flutuante de WhatsApp -->
    <a href="https://wa.me/554135576008" class="whatsapp-btn" target="_blank" title="Fale conosco no WhatsApp">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
            <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.926A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"></path>
        </svg>
    </a>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // Navbar scroll effect
        let ticking = false;
        window.addEventListener('scroll', () => {
            if (!ticking) {
                window.requestAnimationFrame(() => {
                    const navbar = document.querySelector('.navbar-custom');
                    const backToTop = document.querySelector('.back-to-top');
                    if (window.scrollY > 100) {
                        navbar.classList.add('scrolled');
                        backToTop.classList.add('show');
                    } else {
                        navbar.classList.remove('scrolled');
                        backToTop.classList.remove('show');
                    }
                    ticking = false;
                });
                ticking = true;
            }
        });

        // Voltar ao topo
        document.querySelector('.back-to-top').addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Dynamic footer year
        document.querySelector('#footer-year').innerHTML = `© ${new Date().getFullYear()} Indústria de Máquinas - <a href="{{ url('/') }}">imah.com.br</a>`;

        // Ajustar margem da primeira seção com base na altura da navbar
        window.addEventListener('load', () => {
            const navbarHeight = document.querySelector('.navbar-custom').offsetHeight;
            const firstSection = document.querySelector('section');
            if (firstSection) {
                firstSection.style.marginTop = `${navbarHeight}px`;
            }
        });
        window.addEventListener('resize', () => {
            const navbarHeight = document.querySelector('.navbar-custom').offsetHeight;
            const firstSection = document.querySelector('section');
            if (firstSection) {
                firstSection.style.marginTop = `${navbarHeight}px`;
            }
        });
    </script>
    @yield('scripts')
</body>
</html>