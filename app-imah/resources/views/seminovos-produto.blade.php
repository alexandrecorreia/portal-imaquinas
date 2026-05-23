@extends('layouts.marketing')

@section('title', 'Seminovo INDEC CM - IMAH')
@section('meta_description', 'Equipamento seminovo INDEC CM revisado pela IMAH, com dados comerciais mockados para validacao do template.')
@section('og_image', asset('img/prod-impressora-index-cm01.png'))

@php
    $heroImages = [
        ['src' => asset('img/prod-impressora-index-cm01.png'), 'alt' => 'Impressora INDEC CM seminova'],
        ['src' => asset('img/prod-impressora-index-cm02.png'), 'alt' => 'Detalhe tecnico do equipamento seminovo'],
        ['src' => asset('img/prod-impressora-index-cm04.png'), 'alt' => 'Conjunto mecanico revisado'],
    ];
@endphp

@section('content')
    <section class="product-hero product-hero--carousel" aria-labelledby="product-title" data-product-carousel>
        <div class="hero-gallery hero-gallery--wide" aria-label="Galeria do seminovo">
            <div class="product-carousel-track" data-product-track>
                @foreach ($heroImages as $image)
                    <figure class="product-carousel-slide">
                        <img src="{{ $image['src'] }}" alt="{{ $image['alt'] }}">
                    </figure>
                @endforeach
            </div>
            <button class="hero-arrow hero-arrow--prev" type="button" aria-label="Imagem anterior" data-product-prev>‹</button>
            <button class="hero-arrow hero-arrow--next" type="button" aria-label="Proxima imagem" data-product-next>›</button>
            <button class="zoom-button" type="button" aria-label="Ampliar imagem" data-product-zoom>+</button>
        </div>

        <div class="hero-detail hero-detail--overlay">
            <article class="product-card product-card--floating">
                <div class="eyebrows">
                    <span>NT10-105</span>
                    <span>Seminovo revisado</span>
                </div>
                <p class="category">seminovo</p>
                <h1 id="product-title">INDEC CM</h1>
                <p>Equipamento revisado pela equipe IMAH para operacao imediata, com estrutura robusta, componentes verificados e excelente custo-beneficio para ampliar sua producao.</p>

                {{-- SEMINOVOS META: remover este bloco se o backend nao fornecer esses dados --}}
                <dl class="used-product-meta">
                    <div>
                        <dt>Preco</dt>
                        <dd>R$ 148.000,00</dd>
                    </div>
                    <div>
                        <dt>Estado</dt>
                        <dd>Revisado</dd>
                    </div>
                    <div>
                        <dt>Disponibilidade</dt>
                        <dd>Imediata</dd>
                    </div>
                    <div>
                        <dt>Ano / Modelo</dt>
                        <dd>2021 / INDEC CM</dd>
                    </div>
                </dl>
                {{-- /SEMINOVOS META --}}

                <div class="hero-actions">
                    <a href="https://wa.me/554135576008?text=Olá,%20gostaria%20de%20saber%20mais%20sobre%20o%20seminovo%20INDEC%20CM" target="_blank" rel="noopener">Falar com um consultor <span aria-hidden="true">↗</span></a>
                    <a href="{{ url('/contato') }}">Solicitar proposta <span aria-hidden="true">↗</span></a>
                </div>
            </article>
        </div>
    </section>

    <dialog class="image-modal" data-product-modal aria-label="Imagem ampliada">
        <button type="button" data-product-modal-close aria-label="Fechar imagem ampliada">×</button>
        <img src="{{ $heroImages[0]['src'] }}" alt="{{ $heroImages[0]['alt'] }}" data-product-modal-image>
    </dialog>

    <nav class="anchor-nav container" aria-label="Seções do produto">
        <a href="#descricao">Descrição <span aria-hidden="true">↗</span></a>
        <a href="#especificacoes">Especificações <span aria-hidden="true">↗</span></a>
        <a href="#condicoes">Condições <span aria-hidden="true">↗</span></a>
    </nav>

    <section class="intro-band" id="descricao">
        <div class="container">
            <div class="intro-copy">
                <p>Uma oportunidade para adquirir tecnologia IMAH com entrega mais rapida, suporte tecnico e historico de revisao documentado.</p>
                <a class="dark-button" href="{{ url('/contato') }}">Reservar equipamento <span aria-hidden="true">↗</span></a>
            </div>

            <div class="applications-panel">
                <span class="panel-mark">+</span>
                <h2>Condições do seminovo</h2>
                <p>Dados mockados para validar o modelo visual. A disponibilidade real deve ser confirmada pelo time comercial.</p>
                <dl>
                    <div>
                        <dt>Revisao tecnica</dt>
                        <dd>Checklist mecanico, eletrico e pneumatico antes da entrega.</dd>
                    </div>
                    <div>
                        <dt>Treinamento</dt>
                        <dd>Orientacao operacional inicial conforme escopo comercial.</dd>
                    </div>
                    <div>
                        <dt>Entrega</dt>
                        <dd>Disponibilidade imediata apos confirmacao de compra e logistica.</dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    <section class="specs-section" id="especificacoes">
        <div class="container">
            <h2>Especificações</h2>
            <details open>
                <summary>Ficha Tecnica</summary>
                <ul>
                    <li>Area util de impressao: 35 x 50 cm</li>
                    <li>Dimensoes maximas da matriz: 50 x 70 cm</li>
                    <li>Produtividade maxima: 1.000 IPH</li>
                </ul>
            </details>
            <details id="condicoes" open>
                <summary>Observacoes comerciais</summary>
                <ul>
                    <li>Preco, disponibilidade e estado sao dados demonstrativos.</li>
                    <li>A compra depende de vistoria final e confirmacao comercial.</li>
                </ul>
            </details>
        </div>
    </section>

    @include('partials.marketing.cta')
@endsection

@section('scripts')
    <script>
        (() => {
            const carousel = document.querySelector('[data-product-carousel]');
            if (!carousel) return;

            const track = carousel.querySelector('[data-product-track]');
            const slides = Array.from(track.children);
            const modal = document.querySelector('[data-product-modal]');
            const modalImage = document.querySelector('[data-product-modal-image]');
            let index = 0;
            const maxIndex = Math.max(slides.length - 2, 0);

            const update = () => {
                track.style.transform = `translateX(${-index * 50}%)`;
            };

            carousel.querySelector('[data-product-prev]').addEventListener('click', () => {
                index = index === 0 ? maxIndex : index - 1;
                update();
            });

            carousel.querySelector('[data-product-next]').addEventListener('click', () => {
                index = index === maxIndex ? 0 : index + 1;
                update();
            });

            carousel.querySelector('[data-product-zoom]').addEventListener('click', () => {
                const image = slides[index].querySelector('img');
                modalImage.src = image.src;
                modalImage.alt = image.alt;
                modal.showModal();
            });

            document.querySelector('[data-product-modal-close]').addEventListener('click', () => modal.close());
            modal.addEventListener('click', (event) => {
                if (event.target === modal) modal.close();
            });
        })();
    </script>
@endsection
