@extends('layouts.marketing')

@section('title', 'IMAH - Tecnologia em Serigrafia')
@section('meta_description', 'Tecnologia em serigrafia que dura gerações. Máquinas industriais IMAH para aplicações gráficas, têxteis, automotivas e técnicas.')

@php
    $segments = [
        ['title' => 'Gráfico & Promocional', 'icon' => asset('img/Gráfico & Promocional.svg')],
        ['title' => 'Têxtil & Calçadista', 'icon' => asset('img/Têxtil & Calçadista.svg')],
        ['title' => 'Indústria & Técnico', 'icon' => asset('img/Indústria & Técnico.svg')],
        ['title' => 'Vidros & Automotivo', 'icon' => asset('img/Vidros &  Automotivo.svg')],
        ['title' => 'Gráfico & Promocional', 'icon' => asset('img/Gráfico & Promocional.svg')],
        ['title' => 'Têxtil & Calçadista', 'icon' => asset('img/Têxtil & Calçadista.svg')],
        ['title' => 'Indústria & Técnico', 'icon' => asset('img/Indústria & Técnico.svg')],
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
            <img src="{{ asset('img/video01.png') }}" alt="Linha industrial de produção IMAH">
            <div class="home-hero-content">
                <h1 id="home-title">Tecnologia em Serigrafia que dura gerações.</h1>
                <div class="home-hero-copy">
                    <p>We empower organizations across industries to unlock digital opportunities through strategy, consulting.</p>
                    <a class="btn-imah btn-imah--primary" href="{{ url('/equipamentos') }}">Encontre sua solução <span aria-hidden="true">↗</span></a>
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
            <div class="section-controls" aria-hidden="true">
                <button type="button">‹</button>
                <button type="button">›</button>
            </div>
            <a href="{{ url('/equipamentos') }}">Conheça todas as soluções <span aria-hidden="true">↗</span></a>
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
            <a class="all-products" href="{{ url('/equipamentos') }}">Conheça todas as máquinas <span aria-hidden="true">↗</span></a>
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
                <div class="section-controls" aria-hidden="true">
                    <button type="button">‹</button>
                    <button type="button">›</button>
                </div>
                <a href="{{ url('/equipamentos') }}">Conheça todas as soluções <span aria-hidden="true">↗</span></a>
            </div>
        </div>
    </section>

    @include('partials.marketing.cta')
@endsection
