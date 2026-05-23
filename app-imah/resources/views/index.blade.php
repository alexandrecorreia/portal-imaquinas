@extends('layouts.marketing')

@section('title', 'IMAH - Tecnologia em Serigrafia')
@section('meta_description', 'Tecnologia em serigrafia que dura gerações. Máquinas industriais IMAH para aplicações gráficas, têxteis, automotivas e técnicas.')

@php
    $segments = [
        ['title' => 'Gráfico & Promocional', 'icon' => asset('img/Gráfico & Promocional.svg'), 'href' => url('/solucoes-e-equipamentos?segmento=grafico')],
        ['title' => 'Têxtil & Calçadista', 'icon' => asset('img/Têxtil & Calçadista.svg'), 'href' => url('/solucoes-e-equipamentos?segmento=textil')],
        ['title' => 'Indústria & Técnico', 'icon' => asset('img/Indústria & Técnico.svg'), 'href' => url('/solucoes-e-equipamentos?segmento=industria')],
        ['title' => 'Vidros & Automotivo', 'icon' => asset('img/Vidros &  Automotivo.svg'), 'href' => url('/solucoes-e-equipamentos?segmento=vidro')],
        ['title' => 'Gráfico & Promocional', 'icon' => asset('img/Gráfico & Promocional.svg'), 'href' => url('/solucoes-e-equipamentos?segmento=grafico')],
        ['title' => 'Têxtil & Calçadista', 'icon' => asset('img/Têxtil & Calçadista.svg'), 'href' => url('/solucoes-e-equipamentos?segmento=textil')],
        ['title' => 'Indústria & Técnico', 'icon' => asset('img/Indústria & Técnico.svg'), 'href' => url('/solucoes-e-equipamentos?segmento=industria')],
    ];

    $machines = array_fill(0, 6, [
        'title' => 'Impressora INDEC CM',
        'image' => asset('img/produtos-relacionados01.png'),
        'code' => 'NTHO-105',
        'href' => url('/produto'),
    ]);

    $applications = [
        ['title' => 'Teclado de Membrana', 'image' => asset('img/teclado01.png')],
        ['title' => 'Junta de Motor', 'image' => asset('img/junta-motor01.png')],
        ['title' => 'Micro-ondas', 'image' => asset('img/microondas01.png')],
        ['title' => 'Chinelo', 'image' => asset('img/chinelo01.png')],
        ['title' => 'Canecas', 'image' => asset('img/canecas01.png')],
        ['title' => 'Teclado de Membrana', 'image' => asset('img/teclado01.png')],
        ['title' => 'Junta de Motor', 'image' => asset('img/junta-motor01.png')],
        ['title' => 'Micro-ondas', 'image' => asset('img/microondas01.png')],
        ['title' => 'Chinelo', 'image' => asset('img/chinelo01.png')],
        ['title' => 'Canecas', 'image' => asset('img/canecas01.png')],
    ];
@endphp

@section('content')
    <section class="home-hero" aria-labelledby="home-title">
        <div class="home-hero-frame">
            <video
                class="home-hero-media"
                poster="{{ asset('img/video01.png') }}"
                muted
                loop
                playsinline
                preload="none"
                aria-label="Linha industrial de produção IMAH"
                data-video-src="{{ asset('video/homepage-header-video-optimized.mp4') }}"
            ></video>
            <button class="home-hero-video-toggle" type="button" aria-label="Reproduzir vídeo" data-home-hero-video-toggle>
                <span class="home-hero-video-toggle__play" aria-hidden="true"></span>
                <span class="home-hero-video-toggle__pause" aria-hidden="true"></span>
            </button>
            <div class="home-hero-content">
                <h1 id="home-title">Tecnologia em Serigrafia que dura gerações.</h1>
                <div class="home-hero-copy">
                    <p>We empower organizations across industries to unlock digital opportunities through strategy, consulting.</p>
                    <a class="btn-imah btn-imah--primary" href="{{ url('/solucoes-e-equipamentos') }}">Encontre sua solução <span aria-hidden="true">↗</span></a>
                </div>
            </div>
        </div>
    </section>

    <section class="segments-section" aria-labelledby="segments-title">
        <div class="container">
            <h2 id="segments-title">O que você <span>imprime?</span></h2>
            <p class="subtitle">Temos a solução perfeita para seu negócio</p>
        </div>
        <div class="segment-scroller">
            @foreach ($segments as $segment)
                @include('partials.marketing.segment-card', $segment)
            @endforeach
        </div>
        <div class="container section-link-row">
            <div class="section-controls" data-scroll-controls=".segment-scroller">
                <button type="button" data-scroll-direction="prev" aria-label="Segmentos anteriores">‹</button>
                <button type="button" data-scroll-direction="next" aria-label="Próximos segmentos">›</button>
            </div>
            <a href="{{ url('/solucoes-e-equipamentos') }}">Conheça todas as soluções <span aria-hidden="true">↗</span></a>
        </div>
    </section>

    <section class="demand-section" aria-labelledby="demand-title">
        <div class="container">
            <h2 id="demand-title"><span>Máquinas</span> de Alta Demanda</h2>
            <div class="machine-grid">
                @foreach ($machines as $machine)
                    @include('partials.marketing.product-card', $machine)
                @endforeach
            </div>
            <a class="all-products" href="{{ url('/solucoes-e-equipamentos') }}">Conheça todas as máquinas <span aria-hidden="true">↗</span></a>
        </div>
    </section>

    @include('partials.marketing.marquee')

    <section class="quality-section" id="sobre" aria-labelledby="quality-title">
        <div class="container quality-showcase">
            <div class="quality-grid">
                <img src="{{ asset('img/prod-impressora-index-cm02.png') }}" alt="Detalhe técnico de máquina IMAH">
                <article class="quality-card">
                    <h2 id="quality-title">Por que uma <span>Imah dura muitos anos?</span></h2>
                    <p>Lorem ipsum dolor sit amet consectetur. Lacus ut volutpat ultrices dignissim donec. Leo sit vel amet vulputate nunc facilisis.</p>
                    <a class="btn-imah btn-imah--primary" href="{{ url('/contato') }}">Conheça mais sobre a IMAH <span aria-hidden="true">↗</span></a>
                </article>
            </div>
        </div>
    </section>

    <section class="stats-section" aria-label="Números IMAH">
        <div class="container">
            <div class="stats-row">
                <article>
                    <span class="stat-value" data-count-to="30" data-prefix="+">+0</span>
                    <p class="stat-copy">Anos desenvolvendo equipamentos que definem o padrão de qualidade da indústria brasileira.</p>
                </article>
                <article>
                    <span class="stat-value" data-count-to="100" data-suffix="%">0%</span>
                    <p class="stat-copy">Tecnologia Nacional. Engenharia própria e peças de reposição sempre disponíveis.</p>
                </article>
                <article>
                    <span class="stat-value" data-count-to="5000" data-prefix="+" data-format="thousands">+0</span>
                    <p class="stat-copy">Equipamentos ativos diariamente nas maiores linhas de produção do Brasil e da América Latina.</p>
                </article>
            </div>
            <p class="stats-footnote">1 - Estimativas baseadas em benchmarks de mercado e impacto estratégico da marca.<br>2 - Os valores refletem eficiência estratégica ao longo dos projetos, não participação societária ou resultados financeiros diretos.</p>
        </div>
    </section>

    <section class="solutions-section" aria-labelledby="solutions-title">
        <div class="container">
            <div class="solutions-head">
                <h2 id="solutions-title">Soluções para qualquer aplicação.</h2>
                <p>Não importa o substrato ou formato. Temos a tecnologia certa para estampar o seu produto com precisão.</p>
            </div>
            <div class="application-scroller">
                @foreach ($applications as $application)
                    @include('partials.marketing.application-card', $application)
                @endforeach
            </div>
            <div class="section-link-row">
                <div class="section-controls" data-scroll-controls=".application-scroller">
                    <button type="button" data-scroll-direction="prev" aria-label="Aplicações anteriores">‹</button>
                    <button type="button" data-scroll-direction="next" aria-label="Próximas aplicações">›</button>
                </div>
                <a href="{{ url('/solucoes-e-equipamentos') }}">Conheça todas as soluções <span aria-hidden="true">↗</span></a>
            </div>
        </div>
    </section>

    @include('partials.marketing.cta')
@endsection

@section('scripts')
    <script>
        (() => {
            const video = document.querySelector('.home-hero-media');
            const toggle = document.querySelector('[data-home-hero-video-toggle]');
            if (!video || !toggle) return;

            const canAutoplay = window.matchMedia('(min-width: 769px)').matches
                && !window.matchMedia('(prefers-reduced-motion: reduce)').matches;

            const setPlayingState = (isPlaying) => {
                toggle.classList.toggle('is-playing', isPlaying);
                toggle.setAttribute('aria-label', isPlaying ? 'Pausar vídeo' : 'Reproduzir vídeo');
            };

            const loadVideo = () => {
                if (video.querySelector('source')) return;

                const source = document.createElement('source');
                source.src = video.dataset.videoSrc;
                source.type = 'video/mp4';
                video.appendChild(source);
                video.load();
            };

            const unloadVideo = () => {
                video.pause();
                video.removeAttribute('src');
                video.querySelectorAll('source').forEach((source) => source.remove());
                video.load();
                setPlayingState(false);
            };

            const playVideo = async () => {
                loadVideo();

                try {
                    await video.play();
                    setPlayingState(true);
                } catch (error) {
                    setPlayingState(false);
                }
            };

            toggle.addEventListener('click', () => {
                if (toggle.classList.contains('is-playing')) {
                    unloadVideo();
                    return;
                }

                playVideo();
            });

            window.addEventListener('load', () => {
                if (canAutoplay) playVideo();
            }, { once: true });
        })();
    </script>
@endsection
