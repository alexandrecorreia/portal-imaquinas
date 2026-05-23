@extends('layouts.marketing')

@section('title', 'Sobre a IMAH')
@section('meta_description', 'Conheca a trajetória da IMAH Indústria de Máquinas e sua tecnologia nacional.')

@section('content')
    <section class="about-hero">
        <div>
            <h1>30 Anos de <span>Inovação Industrial</span></h1>
            <p>Lorem ipsum dolor sit amet consectetur. Lacus ut volutpat ultrices dignissim donec. Leo sit vel amet vulputate nunc facilisis.</p>
        </div>
        <img src="{{ asset('img/worker.jpg') }}" alt="Processo industrial IMAH">
    </section>

    <section class="trajectory-section container">
        <div class="video-profile">
            <img src="{{ asset('img/sobre-imah.jpg') }}" alt="Representante IMAH">
            <button type="button" aria-label="Vídeo institucional indisponível no momento">
                <span aria-hidden="true">▶</span> Assistir o Vídeo
            </button>
            <strong>Harry Vogt</strong>
            <small>CEO & Founder</small>
        </div>
        <div>
            <h2>Nossa <span>Trajetória</span></h2>
            <p>Lorem ipsum dolor sit amet consectetur. Lacus ut volutpat ultrices dignissim donec. Leo sit vel amet vulputate nunc facilisis. Sit nec tellus volutpat nunc facilisis.</p>
            <p>Lorem ipsum dolor sit amet consectetur. Lacus ut volutpat ultrices dignissim donec. Leo sit vel amet vulputate nunc facilisis. Sit nec tellus venenatis amet fringilla varius turpis nunc.</p>
        </div>
    </section>

    @include('partials.marketing.marquee')

    <section class="about-dna">
        <div class="container about-dna-grid">
            <article class="about-dna-menu">
                <h2>O que faz uma imah a melhor</h2>
                <p>At ILI Digital, we aim to embody these values in everything we do.</p>
                <button type="button" class="is-active">Durabilidade Extrema</button>
                <button type="button">Tecnologia Nacional</button>
                <button type="button">Suporte Permanente</button>
            </article>
            <img src="{{ asset('img/worker.jpg') }}" alt="Tecnologia industrial IMAH">
            <article class="about-dna-copy">
                <h3>Durabilidade Extrema</h3>
                <p>Lorem ipsum dolor sit amet consectetur. Lacus ut volutpat ultrices dignissim donec. Leo sit vel amet vulputate nunc facilisis.</p>
                <p>Lorem ipsum dolor sit amet consectetur. Lacus ut volutpat ultrices dignissim donec. Leo sit vel amet vulputate nunc facilisis.</p>
            </article>
        </div>
    </section>

    <section class="stats-section about-stats" aria-label="Numeros IMAH">
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
                    <p class="stat-copy">Equipamentos ativos diariamente nas maiores linhas de produção do Brasil.</p>
                </article>
            </div>
            <p class="stats-footnote">1 - Estimativas baseadas em benchmarks de mercado e impacto estrategico da marca.<br>2 - Os valores refletem eficiencia estrategica ao longo dos projetos.</p>
        </div>
    </section>

    @include('partials.marketing.cta')
@endsection
