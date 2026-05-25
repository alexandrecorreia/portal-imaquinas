@extends('layouts.marketing')

@section('title', 'OLYMPIC OLG - IMAH')
@section('meta_description', 'OLYMPIC OLG da IMAH: impressora serigráfica automática para vidros planos e substratos rígidos, integrada a linhas de produção.')
@section('og_image', asset('img/olympic-olg/pdf-image-002.png'))

@php
    $heroImages = [
        ['src' => asset('img/olympic-olg/pdf-image-002.png'), 'alt' => 'Linha automática OLYMPIC OLG integrada ao forno'],
        ['src' => asset('img/olympic-olg/pdf-image-006.png'), 'alt' => 'OLYMPIC OLG com esteira e estação de impressão'],
        ['src' => asset('img/olympic-olg/pdf-image-004.png'), 'alt' => 'Detalhe do cabeçote e da mesa de impressão OLYMPIC OLG'],
        ['src' => asset('img/olympic-olg/pdf-image-008.png'), 'alt' => 'Aplicação serigráfica em substrato rígido na OLYMPIC OLG'],
    ];
@endphp

@section('content')
    <section class="product-hero product-hero--carousel product-hero--olympic" aria-labelledby="product-title" data-product-carousel>
        <div class="hero-gallery hero-gallery--wide" aria-label="Galeria do produto">
            <div class="product-carousel-track" data-product-track>
                @foreach ($heroImages as $image)
                    <figure class="product-carousel-slide">
                        <img src="{{ $image['src'] }}" alt="{{ $image['alt'] }}">
                    </figure>
                @endforeach
            </div>
            <button class="hero-arrow hero-arrow--prev" type="button" aria-label="Imagem anterior" data-product-prev>‹</button>
            <button class="hero-arrow hero-arrow--next" type="button" aria-label="Próxima imagem" data-product-next>›</button>
            <button class="zoom-button" type="button" aria-label="Ampliar imagem" data-product-zoom>+</button>
        </div>

        <div class="hero-detail hero-detail--overlay">
            <article class="product-card product-card--floating">
                <div class="eyebrows">
                    <span>OLG75105</span>
                    <span>OLG75120</span>
                </div>
                <p class="category">Impressora automática</p>
                <h1 id="product-title">OLYMPIC OLG</h1>
                <p>Impressora serigráfica automática projetada para vidros planos e substratos rígidos, com integração total em linhas de produção, registro automático, rodo flutuante e IHM touch screen colorida.</p>
                <div class="hero-actions">
                    <a href="https://wa.me/554135576008?text=Olá,%20gostaria%20de%20saber%20mais%20sobre%20a%20OLYMPIC%20OLG" target="_blank" rel="noopener">Falar com um consultor <span aria-hidden="true">↗</span></a>
                    <a href="{{ url('/contato') }}">Solicitar orçamento <span aria-hidden="true">↗</span></a>
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
        <a href="#aplicacoes">Aplicações <span aria-hidden="true">↗</span></a>
        <a href="#diferenciais">Diferenciais <span aria-hidden="true">↗</span></a>
        <a href="#especificacoes">Especificações <span aria-hidden="true">↗</span></a>
    </nav>

    <section class="intro-band" id="descricao">
        <div class="container">
            <div class="intro-copy">
                <p>Projetada para alta produtividade em vidro, MDF, alumínio, aço e PVC expandido, a OLYMPIC OLG combina set-up ágil, precisão absoluta e produção de até 1.000 IPH.</p>
                <a class="dark-button" href="{{ url('/downloads') }}">Baixar catálogo <span aria-hidden="true">↗</span></a>
            </div>

            <div class="applications-panel" id="aplicacoes">
                <span class="panel-mark">+</span>
                <h2>Aplicações</h2>
                <p>Solução automática para impressão serigráfica de alta produtividade em vidros planos e substratos rígidos, com acoplamento direto a linhas industriais.</p>
                <dl>
                    <div>
                        <dt>Vidros de Alta Resistência</dt>
                        <dd>Linha branca, micro-ondas, cooktops, geladeiras, peças automotivas e componentes especiais.</dd>
                    </div>
                    <div>
                        <dt>Substratos Rígidos</dt>
                        <dd>MDF, alumínio, aço e placas técnicas com espessura de até 16 mm.</dd>
                    </div>
                    <div>
                        <dt>PVC Expandido</dt>
                        <dd>Painéis decorativos, sinalização, comunicação visual e aplicações industriais.</dd>
                    </div>
                    <div>
                        <dt>Linha Automática</dt>
                        <dd>Integração com forno DRYER GL ou curadora TERMO UV para produção em série.</dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    <section class="features-section" id="diferenciais">
        <div class="container">
            <h2>Diferenciais</h2>
            <div class="feature-grid">
                <article>
                    <img src="{{ asset('img/olympic-olg/pdf-image-004.png') }}" alt="Mesa de pré-posicionamento da OLYMPIC OLG">
                    <h3>Pré-Posicionamento Automático</h3>
                    <p>A mesa de alimentação centraliza automaticamente o substrato, reduz o tempo de set-up e melhora a precisão desde o primeiro ciclo.</p>
                </article>
                <article>
                    <img src="{{ asset('img/olympic-olg/pdf-image-008.png') }}" alt="Registro automático da OLYMPIC OLG em operação">
                    <h3>Registro Automático Total</h3>
                    <p>Ajuste micrométrico preciso em três eixos, com registro 100% automático na estação de impressão e consistência em grande escala.</p>
                </article>
                <article>
                    <img src="{{ asset('img/olympic-olg/pdf-image-006.png') }}" alt="OLYMPIC OLG acoplada à linha automática">
                    <h3>Integração em Linha</h3>
                    <p>Acoplamento direto com forno DRYER GL ou curadora TERMO UV, transporte sincronizado e alto rendimento operacional.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="specs-section" id="especificacoes">
        <div class="container">
            <h2>Especificações</h2>
            <details open>
                <summary>Controle de Produção</summary>
                <ul>
                    <li>IHM touch screen colorida com armazenamento de centenas de relatórios de produção.</li>
                    <li>Registro de Ordem de Serviço alfanumérica com salvamento automático dos dados do lote.</li>
                    <li>Exibição de tempo de produção, quantidade produzida, tempo de máquina parada e produtividade média em IPH.</li>
                </ul>
            </details>
            <details open>
                <summary>Sistema de Impressão</summary>
                <ul>
                    <li>Ponte com rodo flutuante para pressão uniforme e melhor qualidade em toda a área impressa.</li>
                    <li>Conjunto impressor basculante que permite retirar a tela sem remover rodo e espátula.</li>
                    <li>Pressão controlada por manômetro independente e velocidade regulável eletronicamente pela IHM.</li>
                </ul>
            </details>
            <details open>
                <summary>Ficha Técnica</summary>
                <ul>
                    <li>Área útil de impressão: 75 x 105 cm (OLG75105) / 75 x 120 cm (OLG75120)</li>
                    <li>Dimensões máximas da matriz: 110 x 140 cm / 110 x 165 cm</li>
                    <li>Espessura máxima do substrato: 16 mm</li>
                    <li>Ajuste micrométrico: ±10 mm</li>
                    <li>Velocidade do rodo: 0,15 a 0,80 m/s</li>
                    <li>Produtividade máxima: 1.000 IPH (OLG75105) / 800 IPH (OLG75120)</li>
                    <li>Alimentação: 65A / 220-380V (OLG75105) / 80A / 220-380V (OLG75120)</li>
                    <li>Dimensões externas: 215 x 340 x 145 cm / 235 x 340 x 145 cm</li>
                    <li>Peso aproximado: 840 kg / 1.100 kg</li>
                </ul>
            </details>
            <details open>
                <summary>Opcionais e Garantia</summary>
                <ul>
                    <li>Acoplamento automático com forno DRYER GL ou curadora TERMO UV.</li>
                    <li>Mesa de pré-posicionamento integrada.</li>
                    <li>Configuração completa para linha automática de produção em série.</li>
                    <li>Garantia de 1 ano contra defeitos de fabricação e materiais, conforme termo de garantia.</li>
                </ul>
            </details>
        </div>
    </section>

    <section class="related-section">
        <div class="container">
            <div class="section-heading">
                <h2>Produtos <span>relacionados</span></h2>
                <div class="section-controls" aria-hidden="true">
                    <button type="button">‹</button>
                    <button type="button">›</button>
                </div>
            </div>
            <div class="related-grid">
                @foreach (['DRYER GL', 'TERMO UV', 'INDEC CM', 'INDECORR'] as $product)
                    @include('partials.marketing.product-card', [
                        'title' => $product,
                        'image' => asset('img/produtos-relacionados01.png'),
                        'code' => 'IMAH',
                        'href' => url('/solucoes-e-equipamentos'),
                    ])
                @endforeach
            </div>
            <a class="all-products" href="{{ url('/solucoes-e-equipamentos') }}">Conheça todas as máquinas <span aria-hidden="true">↗</span></a>
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
            const modal = document.querySelector('[data-product-modal]');
            const modalImage = document.querySelector('[data-product-modal-image]');
            let isAnimating = false;

            const resetTrack = () => {
                track.classList.remove('is-sliding');
                track.style.transform = 'translateX(0)';
            };

            carousel.querySelector('[data-product-prev]').addEventListener('click', () => {
                if (isAnimating) return;
                isAnimating = true;
                track.classList.remove('is-sliding');
                track.insertBefore(track.lastElementChild, track.firstElementChild);
                track.style.transform = 'translateX(-50%)';
                requestAnimationFrame(() => {
                    track.classList.add('is-sliding');
                    track.style.transform = 'translateX(0)';
                });
            });

            carousel.querySelector('[data-product-next]').addEventListener('click', () => {
                if (isAnimating) return;
                isAnimating = true;
                track.classList.add('is-sliding');
                track.style.transform = 'translateX(-50%)';
            });

            track.addEventListener('transitionend', () => {
                if (track.style.transform === 'translateX(-50%)') {
                    track.appendChild(track.firstElementChild);
                }
                resetTrack();
                isAnimating = false;
            });

            carousel.querySelector('[data-product-zoom]').addEventListener('click', () => {
                const image = track.firstElementChild.querySelector('img');
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
