@extends('layouts.app')

@section('title', 'Indústria de Máquinas - IMAH')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section" id="inicio">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="animate-title">Tradição e Inovação em Máquinas Serigráficas</h1>
                    <p class="animate-text">Desde 1993, a IMAH desenvolve e fabrica máquinas, equipamentos e acessórios de alta qualidade para serigrafia e indústria gráfica. Com mais de três décadas de experiência, combinamos tradição e inovação para oferecer soluções duráveis, eficientes e pensadas para a produtividade dos nossos clientes.</p>
                    <a href="{{ url('/contato') }}" class="btn btn-primary animate-button">Entre em Contato</a>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('img/linea-uv.png') }}" alt="Máquina Serigráfica IMAH Linea UV" class="hero-image">
                </div>
            </div>
        </div>
    </section>

    <!-- Carousel Section -->
    <section class="carousel-section">
        <div class="container-fluid p-0">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000" data-bs-pause="hover">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="{{ url('/equipamentos') }}" aria-label="Saiba mais sobre impressoras">
                            <picture>
                                <source media="(max-width: 768px)" srcset="{{ asset('img/banner-1-mobile.png') }}">
                                <img src="{{ asset('img/banner-1-desktop.png') }}" class="d-block w-100 carousel-img" alt="Impressora serigráfica de alta precisão" loading="lazy">
                            </picture>
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="{{ url('/equipamentos') }}" aria-label="Saiba mais sobre envernizadoras">
                            <picture>
                                <source media="(max-width: 768px)" srcset="{{ asset('img/banner-2-mobile.png') }}">
                                <img src="{{ asset('img/banner-2-desktop.png') }}" class="d-block w-100 carousel-img" alt="Envernizadora para acabamento gráfico" loading="lazy">
                            </picture>
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="{{ url('/equipamentos') }}" aria-label="Saiba mais sobre secagem">
                            <picture>
                                <source media="(max-width: 768px)" srcset="{{ asset('img/banner-3-mobile.png') }}">
                                <img src="{{ asset('img/banner-3-desktop.png') }}" class="d-block w-100 carousel-img" alt="Sistema de secagem industrial" loading="lazy">
                            </picture>
                        </a>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev" aria-label="Anterior">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next" aria-label="Próximo">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Próximo</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Cards Section -->
    <section class="cards-section" id="equipamentos">
        <div class="container">
            <h2>Equipamentos</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('img/card-1-impressora.png') }}" class="card-img-top" alt="Impressoras serigráficas" loading="lazy">
                        <div class="card-body">
                            <h5 class="card-title">Impressoras</h5>
                            <p class="card-text">Impressoras de alta precisão para indústria.</p>
                            <a href="{{ url('/equipamentos') }}" class="btn btn-primary">Ver Todos</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('img/card-2-envernizadora.png') }}" class="card-img-top" alt="Envernizadoras industriais" loading="lazy">
                        <div class="card-body">
                            <h5 class="card-title">Envernizadoras</h5>
                            <p class="card-text">Equipamentos para acabamento com verniz.</p>
                            <a href="{{ url('/equipamentos') }}" class="btn btn-primary">Ver Todos</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('img/card-3-secagem.png') }}" class="card-img-top" alt="Sistemas de secagem" loading="lazy">
                        <div class="card-body">
                            <h5 class="card-title">Secagem</h5>
                            <p class="card-text">Sistemas de secagem rápidos e seguros.</p>
                            <a href="{{ url('/equipamentos') }}" class="btn btn-primary">Ver Todos</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('img/card-4-laboratorio.png') }}" class="card-img-top" alt="Equipamentos de laboratório" loading="lazy">
                        <div class="card-body">
                            <h5 class="card-title">Laboratórios</h5>
                            <p class="card-text">Equipamentos para testes industriais.</p>
                            <a href="{{ url('/equipamentos') }}" class="btn btn-primary">Ver Todos</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('img/card-5-laminadora.png') }}" class="card-img-top" alt="Laminadoras industriais" loading="lazy">
                        <div class="card-body">
                            <h5 class="card-title">Laminadoras</h5>
                            <p class="card-text">Máquinas para laminação de alta qualidade.</p>
                            <a href="{{ url('/equipamentos') }}" class="btn btn-primary">Ver Todos</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('img/card-6-acessorios.png') }}" class="card-img-top" alt="Acessórios para máquinas" loading="lazy">
                        <div class="card-body">
                            <h5 class="card-title">Acessórios</h5>
                            <p class="card-text">Peças para otimizar seus equipamentos.</p>
                            <a href="{{ url('/equipamentos') }}" class="btn btn-primary">Ver Todos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section" id="about-section">
        <div class="container">
            <h2 class="animate-title text-center">Empresa</h2>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h3 class="animate-title">Nossa Equipe</h3>
                    <p class="animate-text">Com uma equipe de profissionais experientes e dedicados, que asseguram a qualidade final dos seus produtos e serviços, a IMAH é reconhecida pela liderança tecnológica e pelo espírito inovador dos seus produtos, que incorporam soluções de última geração, para atender às reais necessidades dos seus clientes, de qualidade e produtividade.</p>
                    <h3 class="animate-title">Qualidade, Garantia e Assistência Técnica</h3>
                    <p class="animate-text">Os produtos IMAH incorporam insumos de qualidade reconhecida internacionalmente, homologados pela norma CE, DIN e ISO. Desde o projeto, nossos produtos seguem as recomendações de manufatura das normas DIN, que asseguram intercambiabilidade de peças, durabilidade e fácil reposição.</p>
                    <p class="animate-text">Adicionalmente à garantia legal, oferecemos garantia de 1 ano contra defeitos de fabricação e de materiais, nas condições constantes do nosso termo de garantia. Oferecemos assistência técnica direta da fábrica, acompanhada do melhor atendimento em serviços de apoio dos nossos consultores e técnicos, sempre à sua disposição com peças e serviços de qualidade.</p>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('img/sobre-imah.jpg') }}" alt="Imah-Indústria de Máquinas" class="about-image">
                </div>
            </div>
        </div>
    </section>

    <!-- E-commerce Section -->
    <section class="ecommerce-section" id="ecommerce">
        <div class="container">
            <h2>Explore Nossa Loja Online</h2>
            <p class="section-subtitle">Encontre máquinas, acessórios e soluções industriais com a qualidade IMAH, diretamente do nosso e-commerce.</p>
            <div class="ecommerce-parallax">
                <video class="parallax-video" autoplay muted loop playsinline preload="metadata">
                    <source src="{{ asset('video/loja-imah.mp4') }}" type="video/mp4">
                    Seu navegador não suporta vídeos.
                </video>
            </div>
            <div class="text-center mt-4">
                <a href="https://www.loja.imah.com.br" class="btn btn-primary btn-lg" target="_blank">Visite a Loja Completa</a>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        // Efeito parallax suave para vídeo com IntersectionObserver
        const parallaxVideo = document.querySelector('.parallax-video');
        if (parallaxVideo) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        parallaxVideo.play().catch(error => console.log('Erro ao reproduzir vídeo:', error));
                    } else {
                        parallaxVideo.pause();
                    }
                });
            }, { threshold: 0.1 });
            observer.observe(parallaxVideo);

            window.addEventListener('scroll', () => {
                const scrollPosition = window.pageYOffset;
                const offset = parallaxVideo.getBoundingClientRect().top + scrollPosition;
                const speed = 0.3;
                parallaxVideo.style.transform = `translate(-50%, calc(-50% + ${(scrollPosition - offset) * speed}px))`;
            });
        }

        // Tentar reproduzir o vídeo ao carregar a página
        window.addEventListener('load', () => {
            if (parallaxVideo) {
                parallaxVideo.play().catch(error => console.log('Erro ao iniciar o vídeo:', error));
            }
        });
    </script>
@endsection