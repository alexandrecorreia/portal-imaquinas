@extends('layouts.marketing')

@section('title', 'Projetos Especiais - IMAH')
@section('meta_description', 'Projetos especiais IMAH para necessidades industriais sob medida.')

@php
    $projectCards = array_fill(0, 6, [
        'title' => 'Double Action Actuator',
        'image' => asset('img/worker.jpg'),
        'description' => 'Projeto sob medida para aplicações industriais com requisitos técnicos especificos.',
    ]);
@endphp

@section('content')
    <section class="special-hero">
        <div>
            <h1>Engenharia dedicada à sua necessidade.</h1>
            <p>Lorem ipsum dolor sit amet consectetur. Lacus ut volutpat ultrices dignissim donec. Leo sit vel amet vulputate nunc facilisis.</p>
        </div>
        <img src="{{ asset('img/fundo-máquina-desenho.jpg') }}" alt="Projeto industrial sob medida">
    </section>

    <section class="special-callout">
        <p>Chain Lub Off-Road is a high-performance adhesive grease, resistant to water, mud and gravel. Its exclusive formula guarantees prolonged lubrication and protection against corrosion, increasing the durability of chains, cables, pedals, bearings and parts.</p>
        <a class="dark-button" href="{{ url('/downloads') }}">Baixar catálogo <span aria-hidden="true">↗</span></a>
    </section>

    <section class="process-section container">
        <h2>Como transformamos sua necessidade em máquina</h2>
        <div class="process-list">
            <article>
                <span aria-hidden="true">□</span>
                <h3>Diagnóstico e Viabilidade</h3>
                <p>Specializing in tailored software solutions for the automotive industry, our team comprehends the sector's challenges.</p>
            </article>
            <article>
                <span aria-hidden="true">◇</span>
                <h3>Engenharia e Desenvolvimento</h3>
                <p>Our software engineering is finely tuned to address specific needs, from optimizing supply chains to revolutionizing.</p>
            </article>
            <article>
                <span aria-hidden="true">⬡</span>
                <h3>Fabricação e Entrega Técnica</h3>
                <p>Specializing in tailored software solutions for the automotive industry, our team comprehends the sector's challenges.</p>
            </article>
        </div>
    </section>

    <section class="quality-section special-quality">
        <div class="container quality-showcase">
            <div class="quality-grid">
                <img src="{{ asset('img/prod-impressora-index-cm02.png') }}" alt="Detalhe técnico de máquina IMAH">
                <article class="quality-card">
                    <h2>Por que uma <span>Imah dura muitos anos?</span></h2>
                    <p>Lorem ipsum dolor sit amet consectetur. Lacus ut volutpat ultrices dignissim donec. Leo sit vel amet vulputate nunc facilisis.</p>
                    <a class="btn-imah btn-imah--primary" href="{{ url('/sobre') }}">Conheça mais sobre a IMAH <span aria-hidden="true">↗</span></a>
                </article>
            </div>
        </div>
    </section>

    <section class="projects-delivered">
        <div class="container">
            <div class="section-heading">
                <h2>Projetos <span>entregues</span></h2>
                <div class="section-controls" data-scroll-controls=".projects-scroller">
                    <button type="button" data-scroll-direction="prev" aria-label="Projetos anteriores">‹</button>
                    <button type="button" data-scroll-direction="next" aria-label="Proximos projetos">›</button>
                </div>
            </div>
            <div class="projects-scroller">
                @foreach ($projectCards as $project)
                    <article>
                        <img src="{{ $project['image'] }}" alt="{{ $project['title'] }}">
                        <h3>{{ $project['title'] }}</h3>
                        <p>{{ $project['description'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    @include('partials.marketing.cta')
@endsection
